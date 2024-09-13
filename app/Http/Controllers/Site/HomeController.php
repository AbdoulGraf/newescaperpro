<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $address1 = Room::withoutTrashed()->status()->dubaiRooms()->select(
            ['id', 'title', 'slug', 'duration', 'level', 'person', 'description', 'poster'
        ])->orderBy('order')->whereIn('id', [7, 8, 9])->get();
        $address2 = Room::withoutTrashed()->status()->dubaiRooms()->select([
            'id', 'title', 'slug', 'duration', 'level', 'person', 'description', 'poster'
        ])->orderBy('order')->whereNotIn('id', [7, 8, 9])->get();
        return view('site.index', compact('address1', 'address2'));
    }
}
