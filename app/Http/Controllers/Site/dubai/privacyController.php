<?php

namespace App\Http\Controllers\Site\dubai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class privacyController extends Controller
{
    public function index()
    {
        return view("site.dubai.privacy", []);
    }
}