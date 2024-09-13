<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Place;
use App\Models\Price;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    public function index(){
        $places = Place::with("rooms.price")->get();

        $places->each(function ($item) use (&$dubai, &$abudhabi) {
            ($item->id == 1) ? $dubai[] = $item : $abudhabi[] = $item;
        });

        return view('site.price', compact('places', 'dubai', 'abudhabi'));
    }
}
