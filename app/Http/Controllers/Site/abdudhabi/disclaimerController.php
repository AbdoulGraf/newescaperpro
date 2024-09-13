<?php

namespace App\Http\Controllers\Site\abdudhabi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class disclaimerController extends Controller
{
    public function index()
    {
        return view("site.abudhabi.disclaimer", []);
    }
}
