<?php

namespace App\Http\Controllers\Site\dubai;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class disclaimerController extends Controller
{
    public function index()
    {
        return view("site.uae.events", []);
    }
}
