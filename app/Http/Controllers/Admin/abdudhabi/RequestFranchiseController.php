<?php

namespace App\Http\Controllers\Admin\abdudhabi;

use App\Http\Controllers\Controller;
use App\Models\FranchiseForm;
use Illuminate\Http\Request;

class RequestFranchiseController extends Controller
{
    public function index()
    {
        return view("pages.requestfranchise.index", [
            "data" => FranchiseForm::all(),
        ]);
    }


}
