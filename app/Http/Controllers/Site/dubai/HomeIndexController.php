<?php

namespace App\Http\Controllers\Site\dubai;

use App\Models\Blog;
use App\Models\Room;
use App\Models\Comment;
use App\Models\abudhabi\FAQ;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeIndexController extends Controller
{
    public function index()
    {

          // Fetch all rooms
          $rooms = Room::where('place_id', 1)->get();
          $allComment = Comment::all();
  
          $allfaq= FAQ::all();
  
          $allblog= Blog::all();


        return view("site.uae.homepage.index", [
            'rooms' => $rooms,
            'allComment' => $allComment,
            'allfaq'=> $allfaq,
            'allblog'=> $allblog
        ]);
    }
}
