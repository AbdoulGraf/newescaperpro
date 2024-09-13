<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\{Hour,Price,Reservation,PaymentInfo,ClientInfo};
use App\Mail\ReservationComplated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Jenssegers\Agent\Agent;


class PaymentController extends Controller
{

}
