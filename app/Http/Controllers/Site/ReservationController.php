<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\ReservationForm;
use App\Mail\{ReservationComplated, VideoRequestMail};
use App\Models\{ClientInfo, Hour, PaymentInfo, Price, RequestVideo, Reservation, Room, VideoPrice};
use App\Services\PromotionServices;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Illuminate\Http\{RedirectResponse, Request};
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\{Auth, Mail, Session};
use Jenssegers\Agent\Agent;
use stdClass;

class ReservationController extends Controller
{

    private string $ACCESS_TOKEN;
    private string $ORDER_REFERENCE;
    private string $ORDER_PAGE_URL;
    private string $PAYMENT_REFERENCE;
    private string $OUTLET_ID;
    private string $PAYMENT_API_KEY;
    private string $PAYMENT_URL;
    protected PromotionServices $promotionServices;


    public function __construct(PromotionServices $promotionServices)
    {
        $this->OUTLET_ID = config('app.PAYMENT_REFERENCE_CODE');
        $this->PAYMENT_API_KEY = config('app.PAYMENT_API_KEY');
        $this->PAYMENT_URL = config('app.PAYMENT_URL');
        $this->promotionServices = $promotionServices;
    }


    public function index(Request $request)
    {


        $room_id = $request->room_id;
        $player_number = $request->player;
        $price = $request->price;
        $totalPrice = $request->price * $request->player;
        $hour_id = $request->hour_id;
        $time = $request->time;
        $date = $request->date;

        list($actualRoomId, $queryString) = explode('?', $room_id);
        parse_str($queryString, $queryParams);

        $date = $queryParams['date'] ?? null;

        $room = Room::where('id', $room_id)->first();


        if ($room) {
            $roomTitle = $room->title; // Assuming 'title' is the column name for the room's title.
        }


        return view("site.abudhabi.reservation", ['time' => $time, 'roomtitle' => $room->title, 'player_number' => $player_number, 'price' => $price, 'totalPrice' => $totalPrice, 'date' => $date, 'room_id' => $room->id, 'place_id' => $room->place_id, 'hour_id' => $request->hour_id, 'reservation_date' => $date, 'players' => $player_number,]);
    }


    private function generateToken(): void
    {

        $client = new Client();
        $headers = ['Content-Type' => 'application/vnd.ni-identity.v1+json', 'Authorization' => 'Basic ' . $this->PAYMENT_API_KEY,];

        try {
            // POST isteğini yap ve yanıtı al
            $response = $client->post('https://api-gateway.ngenius-payments.com/identity/auth/access-token', ['headers' => $headers,]);

            // Yanıt gövdesini JSON olarak decode et
            $body = json_decode((string)$response->getBody(), true);

            // access_token değerini elde et ve ekrana yazdır
            if (isset($body['access_token'])) {
                $this->ACCESS_TOKEN = $body['access_token'];
                \Session::put('ACCESS_TOKEN', $this->ACCESS_TOKEN);
            } else {
                echo 'Access token bulunamadı.';
            }
        } catch (GuzzleException $e) {
            // HTTP isteği sırasında bir hata oluştu
            echo 'HTTP isteği sırasında bir hata oluştu: ' . $e->getMessage();
        }
    }

    /**
     * @throws Exception
     */
    public function createBasket($datas)
    {
        $this->generateToken();

        extract($datas);

        $price = Price::select('price')->where(['room_id' => $room_id, 'player' => $players])->first();
        $room = Room::select('title')->findOrFail($room_id);
        $hour = Hour::select('start', 'end')->findOrFail($hour_id);


        $postData = new StdClass();
        $postData->amount = new StdClass();
        $postData->merchantAttributes = new StdClass();
        $postData->merchantDefinedData = new StdClass();
        $postData->billingAddress = new StdClass();

        if ($promocode) {
            $allCodes = $this->promotionServices->fetchPromotionCodes();
            $promo = $this->promotionServices->findPromotionCode($allCodes, $promocode);

            if (!$promo) {
                $postData->amount->value = (intval($price->price) * $players) * 100;
            }
            try {

                $discountData = $this->promotionServices->calculateDiscount($price->price, $players, $promo);

                if ($discountData) {
                    $postData->amount->value = $discountData['discounted_price'] * 100;
                    $postData->merchantDefinedData->promoCode = $discountData['promocode'];
                    $postData->merchantDefinedData->discountRate = "%" . $discountData['rate'];
                    $postData->merchantDefinedData->discountAmount = "AED " . $discountData['discount_amount'];
                }
            } catch (Exception $e) {
                return $this->sendError($e->getMessage(), $e->getCode());
            }
        } else {
            $postData->amount->value = (intval($price->price) * $players) * 100;
        }

        $postData->amount->currencyCode = "AED";

        $postData->action = "PURCHASE";
        $postData->emailAddress = $email;
        $postData->merchantAttributes->redirectUrl = config('app.url') . 'payments/success';
        $postData->merchantAttributes->cancelUrl = config('app.url') . 'payments/failed';
        $postData->merchantAttributes->cancelText = "Back to reservation";
        $postData->merchantAttributes->skipConfirmationPage = true;
        $postData->merchantAttributes->skip3DS = true;
        $postData->merchantAttributes->maskPaymentInfo = true;

        $postData->billingAddress->firstName = $first_name;
        $postData->billingAddress->lastName = $last_name;
        $postData->billingAddress->address1 = $address;
        $postData->billingAddress->city = $city;
        $postData->billingAddress->countryCode = $country;

        $postData->merchantDefinedData->customerName = $first_name . " " . $last_name;
        $postData->merchantDefinedData->customerPhone = $phone;
        $postData->merchantDefinedData->customerEmail = $email;
        $postData->merchantDefinedData->reservationRoom = $room->title;
        $postData->merchantDefinedData->reservationDate = $reservation_date;
        $postData->merchantDefinedData->reservationTime = $hour->start->format('H:i') . '/' . $hour->end->format('H:i');
        $postData->merchantDefinedData->numberOfPlayer = $players;
        $postData->merchantDefinedData->created_at = date("F jS, Y : H:i:s", time());

        return $postData;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ReservationForm $request
     * @return RedirectResponse
     * @throws Exception
     */
    public function store(ReservationForm $request)
    {

        $payment = new PaymentInfo();
        $client = new ClientInfo();
        $reservation = new Reservation();
        $reservation_info = $client_info = $payment_info = [];

        Session::put('rotate', 'reservation');

        if ($reservation::where(['room_id' => $request->room_id, 'hour_id' => $request->hour_id, 'reservation_date' => $request->reservation_date])->exists()) {
            Session::flash('message', 'Selected date and hours already taken! It\'is not available anymore!');
            return redirect()->back();
        }

        if ($request->get('payment_method') == 2) {
            try {
                $order = $this->createBasket($request->all());
                $this->generateToken();
                Session::put('ACCESS_TOKEN', $this->ACCESS_TOKEN);

                $paymentResponse = $this->sendPaymentRequest($order);

                if (isset($paymentResponse['reference'])) {
                    $this->ORDER_REFERENCE = $paymentResponse['reference'];
                    $this->ORDER_PAGE_URL = $paymentResponse['_links']['payment']['href'];
                    $this->PAYMENT_REFERENCE = $paymentResponse['_embedded']['payment'][0]['reference'];

                    // Payment info array preparation
                    $payment_info = [
                        'outlet_id' => $this->OUTLET_ID,
                        'order_id' => $this->ORDER_REFERENCE,
                        'payment_id' => $this->PAYMENT_REFERENCE,
                        'amount' => $paymentResponse['_embedded']['payment'][0]['amount']['value'],
                        'currencyCode' => $paymentResponse['_embedded']['payment'][0]['amount']['currencyCode'],
                        'state' => $paymentResponse['_embedded']['payment'][0]['state']
                    ];


                    $payment = new PaymentInfo();
                    $payment->fill($payment_info)->save();
                    $reservation_info['payment_info_id'] = $payment->id;
                }
            } catch (Exception $e) {
                // Ödeme işlemi sırasında bir hata oluşursa, kullanıcıya hata mesajı göster
                return redirect()->back()->with('message', 'Ödeme işlemi sırasında bir hata oluştu: ' . $e->getMessage());
            }
        }


        foreach ($request->only(array_keys($request->rules())) as $key => $value) $reservation_info[$key] = $value;
        foreach ($request->only(array_values($client->getFillable())) as $key => $value) $client_info[$key] = $value;
        $reservation_info['created_by'] = $reservation_info['updated_by'] = Auth::user()->id ?? null;

        session([
            'client_info' => $client_info,
            'payment_info' => $payment_info,
            'reservation_info' => $reservation_info,
            'ORDER_PAGE_URL' => $this->ORDER_PAGE_URL ?? null
        ]);

        return (isset($this->ORDER_PAGE_URL)) ? redirect()->to($this->ORDER_PAGE_URL) : $this->saveReservation();
    }

    public function RetrieveOrderStatus(Request $request)
    {
        
		/*
        session([
            'client_info' =>  [
                'first_name' => 'Graf',
                'last_name' => 'Studios',
                'email' => 'anil.gundal@grafstudios.com.tr',
                'phone' => '+905324000000',
                'ipAddress' => '159.146.16.201',
                'device' => 'WebKit',
                'browser' => 'Chrome',
                'browser_version' => '122.0.0.0',
                'platform' => 'Windows',
                'platform_version' => '10',
                'language' => 'tr-TR',
            ],
            'payment_info' => [
                'outlet_id' => '70776d83-c1dc-4fb1-84c2-8273dca9a070',
                'order_id' => 'b25976d2-d469-4353-933c-e2ec12f3535e',
                'payment_id' => 'ee81381e-b955-43a2-872a-08b6ff00239c',
                'amount' => 100,
                'currencyCode' => 'AED',
                'state' => 'PURCHASED'
            ],
            'request_video' =>  [
                'firstname'=>'Graf',
                'lastname'=>'Studios',
                'email'=>'anil.gundal@grafstudios.com.tr',
                'phoneNumber'=>'+905324000000',
                'store'=>1,
                'room'=>1,
                'date'=>'2024-03-27',
                'time' => '01:00',
                'payment_method'=>2,
                'address_country'=>'Turkey',
                'address_city'=>'Istanbul',
                'video_type' => 1,
                'video_description' => 'Short Video',
            ],
			'rotate' => 'video'
        ]);
		
		*/

       

/*
       session([
           'client_info' => [
               'first_name' => 'Graf',
               'last_name' => 'Studios',
               'email' => 'anil.gundal@grafstudios.com.tr',
               'phone' => '+905324000000',
               'ipAddress' => '159.146.16.201',
               'device' => 'WebKit',
               'browser' => 'Chrome',
               'browser_version' => '122.0.0.0',
               'platform' => 'Windows',
               'platform_version' => '10',
               'language' => 'tr-TR',
           ],
           'payment_info' => [
               'outlet_id' => '70776d83-c1dc-4fb1-84c2-8273dca9a070',
               'order_id' => 'b25976d2-d469-4353-933c-e2ec12f3535e',
               'payment_id' => 'dcc46f71-388a-48b0-94ef-728b2ec75525',
               'amount' => 100,
               'currencyCode' => 'AED',
               'state' => 'PURCHASED'
           ],
           'reservation_info' => [
               'first_name'=>'Graf',
               'last_name'=>'Studios',
               'email'=>'a.gundal92@gmail.com',
               'phone'=>'+905324000000',
               'place_id'=>1,
               'room_id'=>1,
               'hour_id'=>1,
               'payment_method'=>2,
               'reservation_date'=>'2030-12-30',
               'players'=>5,
           ],
		   'rotate' => 'reservation'
       ]);
       */

        $payment = new PaymentInfo();
        $ref = $request->query('ref');
        $this->generateToken();
        $output = $this->sendRetrieveRequest(url: "/transactions/outlets/{$this->OUTLET_ID}/orders/{$ref}");

        if (isset($output['status']) && $output['status'] == 401) {
            $this->generateToken(); // Token'i yeniden oluştur
            $response = $this->sendRetrieveRequest(url: "/transactions/outlets/{$this->OUTLET_ID}/orders/{$ref}");
            //$output = json_decode((string)$response->getBody(), true);
        }

        if (isset($output['_embedded']['payment'][0]['state'])) {
            $state = $output['_embedded']['payment'][0]['state'];
            $paymentResponse = $output['_embedded']['payment'][0];
            $payment->where(['order_id' => $ref])->update(['state' => $state]);

            if ($state == "FAILED" || !$state) {
                $this->failed($paymentResponse);
            } else {
                if (Session::get('rotate') == 'video') {
                    $this->saveVideoRequest();
                } elseif (Session::get('rotate') == 'reservation') {
                    $this->saveReservation();
                }
            }
        } else {
            throw new Exception('Unexpected response from payment gateway.');
        }

        Session::flash('message', 'Your reservation has been submitted successfully.');
        return redirect('/abudhabi/rooms');
    }


    public function failed($paymentResponse = false)
    {
        if (isset($paymentResponse->resultMessage)) {
            Session::flash('message', $paymentResponse->resultMessage . ' resultCode: ' . $paymentResponse->resultCode);
        } else {
            Session::flash('message', "Payment is failed! Please try another card.");
        }
    }

    public function saveReservation()
    {
        $reservation = new Reservation();
        $client = new ClientInfo();

        $reservation_info = $client_info = [];

        if (Session::has('client_info')) {
            $client_info = Session::pull('client_info');
            $agent = $this->getAgentInfos();
            $agent['first_name'] = $client_info['first_name'];
            $agent['last_name'] = $client_info['last_name'];
            $agent['email'] = $client_info['email'];
            $agent['phone'] = $client_info['phone'];
            $client->fill($agent)->save();
        }

        if (Session::has('reservation_info')) {
            $reservation_info = Session::pull('reservation_info');
            $reservation_info["client_info_id"] = $client->id;
            $reservation->fill($reservation_info)->save();
        }

        $hour = Hour::select(['start', 'start_period', 'end', 'end_period'])->find($reservation->hour->id);
        $price = Price::where(['place_id' => $reservation->place->id, 'room_id' => $reservation->room->id, 'player' => $reservation->players])->first();

        $this->sendMail(["toEmail" => $reservation->clientInfo->email, "client_info" => $client_info, "payment_method" => ($reservation->payment_method == 2) ? 'Online' : 'Upon Arrival', "total_price" => $price->price * $reservation_info['players'], "per_price" => $price->price, "players" => $reservation->players, "hours" => $hour->start->format("H:i") . $hour->start_period . " - " . $hour->end->format("H:i") . $hour->end_period, "date" => $reservation->reservation_date->format("d/m/Y"), "room" => $reservation->room->title, "location" => $reservation->place->title]);


        if ($reservation->payment_method != 2) {
            return redirect()->back()->with('success', 'Your reservation has been submitted successfully.');
        }
    }

    // new save Request Video write
    public function saveVideoRequest()
    {
        $requestVideo = new RequestVideo();
        $client = new ClientInfo();
        $request_video_datas = [];

        Session::put('rotate', 'video');

        if (Session::has('request_video')) {
            $request_video_datas = Session::get('request_video');

            $agent = $this->getAgentInfos();
            $agent['first_name'] = $request_video_datas['firstname'] ?? 'Default FirstName';
            $agent['last_name'] = $request_video_datas['lastname'] ?? 'Default LastName';
            $agent['email'] = $request_video_datas['email'] ?? 'default@email.com';
            $agent['phone'] = $request_video_datas['phoneNumber'] ?? '000-000-0000';
            $agent['address'] = ($request_video_datas['address_city'] ?? 'Default City') . "/" . ($request_video_datas['address_country'] ?? 'Default Country');
            $agent['city'] = $request_video_datas['address_city'] ?? 'Default City';
            $agent['country'] = $request_video_datas['address_country'] ?? 'Default Country';

            if ($client->fill($agent)->save()) {
                $request_video_datas["client_info_id"] = $client->id;


        //             // Add logic based on video type, payment method, store, and room
        // $storeName = ($request_video_datas['store'] == '1') ? 'Dubai' : 'Abu Dhabi';
        // $videoLength = ($request_video_datas['video_type'] == '1') ? 'Short Video' : 'Long Video';
        // $paymentMethod = ($request_video_datas['payment_method'] == '1') ? 'Upon Arrival' : 'Online';

        // // Fetch room details
        // $room = Room::where('id', $request_video_datas['room'])->first();
        // $roomTitle = $room->title ?? 'Unknown Room';

        // // Set additional data for request video
        // $request_video_datas['store'] = $storeName;
        // $request_video_datas['video_type'] = $videoLength;
        // $request_video_datas['payment_method'] = $paymentMethod;
        // $request_video_datas['room'] = $roomTitle;
        

            } else {
                // Log error or handle it as necessary
                return redirect()->back()->with('error', 'Failed to save client information.');
            }

            
			$datas = $request_video_datas->toArray();

            if (!$requestVideo->fill($datas)->save()) {
                // Log error or handle it as necessary
                return redirect()->back()->with('error', 'Failed to save video request.');
            }
        }

        $price = VideoPrice::where('id', $request_video_datas['video_type'] ?? 0)->first();
        if (!$price) {
            // Log this error or handle it, and use a default price or skip processing
            $price = new stdClass();
            $price->price = 0; // Default price if not found
        }

        $room = Room::where('id', $request_video_datas['room'] ?? 0)->first();
        if (!$room) {
            // Handle missing room data
            return redirect()->back()->with('error', 'Room information is missing.');
        }

        $hour = Hour::where('id', $request_video_datas['time'] ?? 0)->first();
        if (!$hour) {
            // Handle missing hour data
            return redirect()->back()->with('error', 'Time information is missing.');
        }

        // Proceed with mailing the details
        $this->sendMail([
            "toEmail" => $requestVideo->email,
            "client_info" => [
                "first_name" => $requestVideo->clientInfo->first_name,
                "last_name" => $requestVideo->clientInfo->last_name,
                "email" => $requestVideo->clientInfo->email,
                "phone" => $requestVideo->clientInfo->phone,
                "city" => $requestVideo->clientInfo->city,
                "country" => $requestVideo->clientInfo->country,
            ],
            "payment_method" => $requestVideo->payment_method == 2 ? 'Online' : 'Upon Arrival',
            "total_price" => $price->price,
            "hours" => $hour->start->format("H:i") . $hour->start_period . " - " . $hour->end->format("H:i") . $hour->end_period,
            "date" => $request_video_datas['date'] ?? 'Date not provided',
            "room" => $room->title ?? 'Room title not available',
            "location" => $room->place->title ?? 'Location not available'
        ]);

        return redirect()->back()->with('success', 'Your video request has been submitted successfully.');
    }

    // end of new save requesst write from  me




    // ol video request from anıl

    // public function saveVideoRequest()
    // {


    //     $requestVideo = new RequestVideo();
    //     $client = new ClientInfo();

    //     $request_video_datas = [];

    //     Session::put('rotate', 'video');


    //     if (Session::has('request_video')) {
    //         $request_video_datas = Session::pull('request_video');

    //         $agent = $this->getAgentInfos();
    //         $agent['first_name'] = $request_video_datas['firstname'];
    //         $agent['last_name'] = $request_video_datas['lastname'];
    //         $agent['email'] = $request_video_datas['email'];
    //         $agent['phone'] = $request_video_datas['phoneNumber'];
    //         $agent['address'] = $request_video_datas['address_city'] . "/" . $request_video_datas['address_country'];
    //         $agent['city'] = $request_video_datas['address_city'];
    //         $agent['country'] = $request_video_datas['address_country'];
    //         $client->fill($agent)->save();

    //         $request_video_datas["client_info_id"] = $client->id;
    //         $requestVideo->fill($request_video_datas)->save();
    //     }


    //     $price = VideoPrice::where('id', $request_video_datas['video_type'])->first();
    //     $room = Room::where('id', $request_video_datas['room'])->first();
    //     $hour = Hour::where('id', $request_video_datas['time'])->first();


    //     $this->sendMail([
    //         "toEmail" => $requestVideo->email,
    //         "client_info" => [
    //             "first_name" => $requestVideo->clientInfo->first_name,
    //             "last_name" => $requestVideo->clientInfo->last_name,
    //             "email" => $requestVideo->clientInfo->email,
    //             "phone" => $requestVideo->clientInfo->phone,
    //             "city" => $requestVideo->clientInfo->city,
    //             "country" => $requestVideo->clientInfo->country,
    //         ],
    //         "payment_method" => ($requestVideo->payment_method == 2) ? 'Online' : 'Upon Arrival',
    //         "total_price" => $price->price,
    //         "hours" => $hour->start->format("H:i") . $hour->start_period . " - " . $hour->end->format("H:i") . $hour->end_period,
    //         "date" => $request_video_datas['date'],
    //         "room" => $room->title,
    //         "location" => $room->place->title
    //     ]);


    //     return redirect()->back()->with('success', 'Your video request has been submitted successfully.');
    // }

    // end of old save video Request from Anıl

    /**
     * @param array $info
     * @return array
     */
    public function getAgentInfos(array $info = []): array
    {
        $agent = new Agent();
        $info['device'] = $agent->device();
        $info['platform'] = $agent->platform();
        $info['platform_version'] = $agent->version($info['platform']);
        $info['browser'] = $agent->browser();
        $info['browser_version'] = $agent->version($info['browser']);
        $info['language'] = $agent->languages()[0];
        $info['ipAddress'] = \Request::getClientIp(true);

        return $info;
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function sendMail($datas)
    {
        extract($datas);
        $mailDatas = ["client" => $client_info];
        $mailDatas = Arr::prepend($mailDatas, $payment_method, 'payment');
        $mailDatas = Arr::prepend($mailDatas, $total_price, 'total');
        $mailDatas = Arr::prepend($mailDatas, $hours, 'hour');
        $mailDatas = Arr::prepend($mailDatas, $date, 'date');
        $mailDatas = Arr::prepend($mailDatas, $room, 'room');
        $mailDatas = Arr::prepend($mailDatas, $location, 'location');
        if (isset($per_price) or isset($players)) {
            $mailDatas = Arr::prepend($mailDatas, $per_price, 'price');
            $mailDatas = Arr::prepend($mailDatas, $players, 'players');
        }

		$cc = match($location) {
            'Abu Dhabi' => 'info.ad@black-out.ae',
            'Dubai' => 'info.dxb@black-out.ae',
            default => 'a.gundal92@gmail.com'
        };

        return match (Session::get('rotate')) {
            'video' => Mail::to($toEmail)->cc(["$cc"])->send(new VideoRequestMail($mailDatas)),
            'reservation' => Mail::to($toEmail)->cc(["$cc"])->send(new ReservationComplated($mailDatas)),
            default => redirect()->back()->with('success', 'Your video request has been submitted successfully.'),
        };
    }

    protected function sendError($message, $statusCode = 400)
    {
        return back()->with('message', 'error.' . $message);
    }


    private function sendPaymentRequest($order)
    {
        $json = json_encode($order);
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $this->PAYMENT_URL . "/transactions/outlets/{$this->OUTLET_ID}/orders");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $this->ACCESS_TOKEN, 'Content-Type: application/vnd.ni-payment.v2+json', 'Accept: application/vnd.ni-payment.v2+json',));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Yanıtın bir dize olarak döndürülmesini sağlar.
        curl_setopt($ch, CURLOPT_POST, true); // HTTP POST isteğini belirtir.
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json); // Gönderilecek veriyi belirtir.

        $response = curl_exec($ch);


        if (curl_errno($ch)) {
            throw new Exception('cURL error: ' . curl_error($ch));
        }


        $httpStatusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);


        if ($httpStatusCode != 201) {
            throw new Exception("HTTP request failed with status code $httpStatusCode");
        }

        curl_close($ch);

        return json_decode($response, true);
    }

    private function sendRetrieveRequest($url)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $this->PAYMENT_URL . $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $this->ACCESS_TOKEN));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_TIMEOUT, 80);

        $response = curl_exec($ch);


        if (curl_errno($ch)) {
            throw new Exception('cURL error: ' . curl_error($ch));
        }


        $httpStatusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);


        if ($httpStatusCode != 200) {
            throw new Exception("HTTP request failed with status code $httpStatusCode");
        }

        curl_close($ch);

        return json_decode($response, true);
    }
}
