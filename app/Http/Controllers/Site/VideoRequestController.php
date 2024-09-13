<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\VideoRequestForm;
use App\Mail\ReservationComplated;
use App\Mail\VideoRequestMail;
use App\Models\{ClientInfo, Hour, PaymentInfo, Price, RequestVideo, Reservation, Room, VideoPrice};
use App\Services\PromotionServices;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\{RedirectResponse, Request};
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\{Auth, Mail, Session};
use Jenssegers\Agent\Agent;
use stdClass;

class VideoRequestController extends Controller
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
    public function index_abudhabi()
    {

        $hours = Hour::where('place_id', 2)->get();
        $rooms = Room::where('place_id', 2)->get(['id', 'title']);
        $video_prices = VideoPrice::where('place_id', 2)->get(['id', 'price', 'place_id', 'title']);

        return view("site.abudhabi.videorequest", [
            'hours' => $hours,
            "roomData" => $rooms,
            "video_prices" => $video_prices
        ]);
    }
    public function index_dubai()
    {

        $hours = Hour::where('place_id', 1)->get();
        $rooms = Room::where('place_id', 1)->get();
        $video_prices = VideoPrice::where('place_id', 1)->get();

        return view("site.dubai.videorequest", [
            'hours' => $hours,
            "roomData" => $rooms,
            "video_prices" => $video_prices
        ]);
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
                Session::put('ACCESS_TOKEN', $this->ACCESS_TOKEN);
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

        $price = VideoPrice::select('price')->where(['id' => $video_type])->first();
        $price = (int)$price->price * 100;

        $postData = new StdClass();
        $postData->amount = new StdClass();
        $postData->merchantAttributes = new StdClass();
        $postData->merchantDefinedData = new StdClass();
        $postData->billingAddress = new StdClass();

        $postData->amount->currencyCode = "AED";
        $postData->amount->value = $price;
        $postData->action = "PURCHASE";
        $postData->emailAddress = $email;
        $postData->merchantAttributes->redirectUrl = getenv('APP_URL') . 'payments/success';
        $postData->merchantAttributes->cancelUrl = getenv('APP_URL') . 'payments/failed';
        $postData->merchantAttributes->cancelText = "Back to reservation";
        $postData->merchantAttributes->skipConfirmationPage = true;
        $postData->merchantAttributes->skip3DS = true;
        $postData->merchantAttributes->maskPaymentInfo = true;

        $postData->billingAddress->firstName = $firstname;
        $postData->billingAddress->lastName = $lastname;
        $postData->billingAddress->address1 = $address_country . " " . $address_city;
        $postData->billingAddress->city = $address_city;
        $postData->billingAddress->countryCode = $address_country;


        return $postData;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param VideoRequestForm $request
     * @return RedirectResponse
     * @throws Exception
     */
    public function store(VideoRequestForm $request)
    {

        

        Session::put('rotate', 'video');

        $payment = new PaymentInfo();
        $client = new ClientInfo();
        $request_video = new RequestVideo();
        $request_video_info = $client_info = $payment_info = [];

        $datas = $request->except(['_token', '_method', 'privacy', 'liability', 'terms']);

        if ($request->get('payment_method') == 2) {
            try {
                $order = $this->createBasket($datas);

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
                }
            } catch (Exception $e) {
                // Ödeme işlemi sırasında bir hata oluşursa, kullanıcıya hata mesajı göster
                return redirect()->back()->with('message', 'Ödeme işlemi sırasında bir hata oluştu: ' . $e->getMessage());
            }
        }


        foreach ($request->only(array_keys($request->rules())) as $key => $value) $request_video[$key] = $value;


        $request_video['created_by'] = $request_video['updated_by'] = Auth::user()->id ?? null;

        session([
            'payment_info' => $payment_info,
            'request_video' => $request_video,
            'time' => $datas['time'],
            'ORDER_PAGE_URL' => $this->ORDER_PAGE_URL ?? null
        ]);

        return (isset($this->ORDER_PAGE_URL)) ? redirect()->to($this->ORDER_PAGE_URL) : $this->saveVideoRequest();
    }

    public function saveVideoRequest()
    {
        $requestVideo = new RequestVideo();
        $client = new ClientInfo();

        $request_video_datas = [];



        if (Session::has('request_video')) {
            $request_video_datas = Session::pull('request_video')->toArray();

            $agent = $this->getAgentInfos();
            $agent['first_name'] = $request_video_datas['firstname'];
            $agent['last_name'] = $request_video_datas['lastname'];
            $agent['email'] = $request_video_datas['email'];
            $agent['phone'] = $request_video_datas['phoneNumber'];
            $agent['address'] = $request_video_datas['address_city'] . "/" . $request_video_datas['address_country'];
            $agent['city'] = $request_video_datas['address_city'];
            $agent['country'] = $request_video_datas['address_country'];
            $client->fill($agent)->save();

            $request_video_datas["client_info_id"] = $client->id;

             // Add logic based on video type, payment method, store, and room
        $storeName = ($request_video_datas['store'] == '1') ? 'Dubai' : 'Abu Dhabi';
        $videoLength = ($request_video_datas['video_type'] == '1') ? 'Short Video' : 'Long Video';
        $paymentMethod = ($request_video_datas['payment_method'] == '1') ? 'Upon Arrival' : 'Online';

        // Fetch room details
        $room = Room::where('id', $request_video_datas['room'])->first();
        $roomTitle = $room->title ?? 'Unknown Room';

        // Set additional data for request video
        $request_video_datas['store'] = $storeName;
        $request_video_datas['video_type'] = $videoLength;
        $request_video_datas['payment_method'] = $paymentMethod;
        $request_video_datas['room'] = $roomTitle;

      


            $requestVideo->fill($request_video_datas)->save();
        }

        $price = VideoPrice::where('id', $request_video_datas['video_type'])->first();
        $room = Room::where('id', $request_video_datas['room'])->first();
        $hour = Hour::where('id', $request_video_datas['time'])->first();

        Session::put([
            "toEmail" => $requestVideo->email,
            "client_info" => [
                "first_name" => $requestVideo->clientInfo->first_name,
                "last_name" => $requestVideo->clientInfo->last_name,
                "email" => $requestVideo->clientInfo->email,
                "phone" => $requestVideo->clientInfo->phone,
                "city" => $requestVideo->clientInfo->city,
                "country" => $requestVideo->clientInfo->country,
            ],
            "payment_method" => ($requestVideo->payment_method == 2) ? 'Online' : 'Upon Arrival',
            "total_price" => $price->price,
            "hours" => $hour->start->format("H:i") . $hour->start_period . " - " . $hour->end->format("H:i") . $hour->end_period,
            "date" => $request_video_datas['date'],
            "room" => $room->title,
            "location" => $room->place->title
        ]);


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
            "payment_method" => ($requestVideo->payment_method == 2) ? 'Online' : 'Upon Arrival',
            "total_price" => $price->price,
            "hours" => $hour->start->format("H:i") . $hour->start_period . " - " . $hour->end->format("H:i") . $hour->end_period,
            "date" => $request_video_datas['date'],
            "room" => $room->title,
            "location" => $room->place->title
        ]);


        if ($requestVideo->payment_method != 2) {
            return redirect()->back()->with('success', 'Your video request has been submitted successfully.');
        }
    }

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
        return Mail::to($toEmail)->cc(['info.dxb@black-out.ae'])->send(new VideoRequestMail($mailDatas));
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
