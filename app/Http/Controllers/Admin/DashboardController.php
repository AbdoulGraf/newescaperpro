<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {

        addVendors(['amcharts', 'amcharts-maps', 'amcharts-stock']);


        return view('pages.dashboards.index');


    }
}
