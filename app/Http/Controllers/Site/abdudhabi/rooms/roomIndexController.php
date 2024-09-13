<?php

namespace App\Http\Controllers\Site\abdudhabi\rooms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class roomIndexController extends Controller
{
    public function roomsIndex()
    {
        return view("site.abudhabi.rooms.index", []);
    }
}
