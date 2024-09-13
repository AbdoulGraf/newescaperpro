<?php

namespace App\Http\Controllers\site\supernatural;

use App\Models\Blog;
use App\Models\Room;
use App\Models\Comment;
use App\Models\abudhabi\FAQ;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function index()
    {
        return view("site.vrgames.index");
    }



}
