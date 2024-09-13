<?php

namespace App\Http\Controllers\Site;

use Carbon\Carbon;
use App\Models\Hour;
use App\Models\Room;
use App\Models\Place;
use App\Models\Price;
use App\Models\Comment;
use App\Models\Storyline;
use App\Models\PhotoVideo;
use App\Models\Reservation;
use App\Models\abudhabi\FAQ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class RoomController extends Controller
{
    public function index()
    {
        return view('site.rooms.index');
    }




    public function dubaidetail($slug)
    {
        // $room = Room::with(['price', 'faqs', 'hour.reservations'])
        //     ->withoutTrashed()
        //     ->where('slug', $slug)
        //     ->orderBy('order')
        //     ->firstOrFail(['id', 'slug', 'place_id', 'title', 'description', 'poster', 'banner', 'text_picture', 'level', 'duration', 'person', 'seo_title', 'seo_description', 'seo_keywords']);


        $room = Room::with(['price', 'faqs', 'hour.reservations'])
            ->withoutTrashed()
            ->where('slug', $slug)
            ->where('place_id', 1) // Filtering for place_id = 1
            ->orderBy('order')
            ->firstOrFail([
                'id', 'slug', 'place_id', 'title', 'description', 'poster', 'banner', 'text_picture',
                'level', 'duration', 'person', 'seo_title', 'seo_description', 'seo_keywords'
            ]);



        $comments = Comment::where('room_id', $room->id)->get();

        $storyline = Storyline::where('room_id', $room->id)->get();

        $photovideo = PhotoVideo::where('room_id', $room->id)->get();

        // Yerel sorgu kapsayıcısı `available` tanımlıysa ve uygunsa kullanın
        $hours = Hour::where('room_id', $room->id)
            ->where('start', '>=', Carbon::now()->toTimeString())
            ->when(method_exists(Hour::class, 'available'), function ($query) use ($room) {
                return $query->available($room->id);
            })
            ->with(['reservations' => function ($q) {
                $q->where('reservation_date', '>=', Carbon::today());
            }])
            ->get();


        //available price to bring for display
        $prices = Price::where('room_id', $room->id)->get();


        return view('site.rooms.details', [
            'id' => $room->id,
            'datas' => $room,
            'hours' => $hours,
            'prices' => $hours,
            'comments' => $comments,
            'storylines' => $storyline,
            'photovideo' => $photovideo
        ]);
    }

    public function detail($slug)
    {



        // $room = Room::with(['price', 'faqs', 'hour.reservations'])
        //     ->withoutTrashed()
        //     ->where('slug', $slug)
        //     ->orderBy('order')
        //     ->firstOrFail(['id', 'slug', 'place_id', 'title', 'description', 'poster', 'banner', 'text_picture', 'level', 'duration', 'person', 'seo_title', 'seo_description', 'seo_keywords']);


        $room = Room::with(['price', 'faqs', 'hour.reservations'])
            ->withoutTrashed()
            ->where('slug', $slug)
            ->where('place_id', 2) // Add this line to filter by place_id
            ->orderBy('order')
            ->firstOrFail([
                'id', 'slug', 'place_id', 'title', 'description', 'poster', 'banner', 'text_picture',
                'level', 'duration', 'person', 'seo_title', 'seo_description', 'seo_keywords'
            ]);

        $comments = Comment::where('room_id', $room->id)->get();

        $storyline = Storyline::where('room_id', $room->id)->get();

        $photovideo = PhotoVideo::where('room_id', $room->id)->get();

        // Yerel sorgu kapsayıcısı `available` tanımlıysa ve uygunsa kullanın
        $hours = Hour::where('room_id', $room->id)
            ->where('start', '>=', Carbon::now()->toTimeString())
            ->when(method_exists(Hour::class, 'available'), function ($query) use ($room) {
                return $query->available($room->id);
            })
            ->with(['reservations' => function ($q) {
                $q->where('reservation_date', '>=', Carbon::today());
            }])
            ->get();


        //available price to bring for display
        $prices = Price::where('room_id', $room->id)->get();



        return view('site.rooms.details', [
            'id' => $room->id,
            'datas' => $room,
            'hours' => $hours,
            'prices' => $hours,
            'comments' => $comments,
            'storylines' => $storyline,
            'photovideo' => $photovideo
        ]);
    }



    public function dubai()
    {


        // Fetch all rooms
        $rooms = Room::all();

        $allfaq = FAQ::all();




        $datas = Room::withoutTrashed()
            ->status()->dubaiRooms()
            ->select(['id', 'title', 'slug', 'duration', 'level', 'person', 'description', 'poster'])
            ->orderBy('order')
            ->get();
        return view('site.rooms.index', [
            'datas' => $datas,
            'place' => 'DUBAI',
            'rooms' => $rooms,
            'allfaq' => $allfaq,
        ]);
    }


    public function abudhabi()
    {


        // Fetch all rooms
        $rooms = Room::all();

        $allfaq = FAQ::all();

        $datas = Room::withoutTrashed()
            ->status()->abudhabiRooms()
            ->select(['id', 'title', 'slug', 'duration', 'level', 'person', 'description', 'poster'])
            ->orderBy('order')
            ->get();
        return view('site.rooms.index', [
            'datas' => $datas,
            'place' => 'ABU DHABI',
            'rooms' => $rooms,
            'allfaq' => $allfaq,
        ]);
    }

    public function reservation(Request $request, Reservation $reservation)
    {

        $info = array();
        foreach ($request->only(array_values($reservation->getFillable())) as $key => $value) $info[$key] = $value;

        $place = Place::select('title')->findOrFail($info['place_id']);
        $room = Room::select('title')->findOrFail($info['room_id']);
        $hour = Hour::select(['id', 'start', 'end'])->findOrFail($info['hour_id']);
        $price = Price::where(['place_id' => $info['place_id'], 'room_id' => $info['room_id'], 'player' => $info['players']])->get();


        $datass = collect([
            "place" => $place->title,
            "room" => $room->title,
            "price" => $price[0]->price,
            "players" => $info['players'],
            "reservation_date" => $info['reservation_date'],
            "reservation_hour" => $hour->start->format("H:i") . "-" . $hour->end->format("H:i"),
            "total" => $price[0]->price * $info['players'],
            "idS" => [
                "place_id" => $info['place_id'],
                "room_id" => $info['room_id'],
                "price_id" => $price[0]->id,
                "hour_id" => $info['hour_id'],
            ]
        ]);


        $request->session()->put(['reserInfo' => $datass]);

        return response()->json([
            "status" => $info,
            "message" => "Reservation is completed!",
            "class" => ($info) ? "info" : "danger",
        ]);
    }

    public function form(Request $request)
    {
        $datas = $request->session()->get('reserInfo');


        return view('site.rooms.form', compact('datas'));
    }
}
