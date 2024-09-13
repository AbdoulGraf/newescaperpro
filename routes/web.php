<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\HomeController;


use App\Http\Controllers\Site\RoomController;
use App\Http\Controllers\Site\PriceController;
use App\Http\Controllers\Site\EventsController;
use App\Http\Controllers\Site\ContactController;
use App\Http\Controllers\Site\PaymentController;
use App\Http\Controllers\Site\ReservationController;
use App\Http\Controllers\Site\AbuDhabi\faqController;
use App\Http\Controllers\Site\CheckPromotionDiscount;
use App\Http\Controllers\Site\VideoRequestController;
use App\Http\Controllers\Site\abdudhabi\termsController;
use App\Http\Controllers\Site\dubai\HomeIndexController;
use App\Http\Controllers\Site\abdudhabi\privacyController;
use App\Http\Controllers\Site\CheckAvailabilityController;
use App\Http\Controllers\Site\abdudhabi\blogIndexController;
use App\Http\Controllers\Site\abdudhabi\disclaimerController;
use App\Http\Controllers\Site\abdudhabi\HomeAbudhabiController;
use App\Http\Controllers\Site\abdudhabi\teambuildingController;
use App\Http\Controllers\Site\abdudhabi\rooms\roomIndexController;
use App\Http\Controllers\Site\abdudhabi\requestfranchiseController;
use App\Http\Controllers\Site\dubai\faqController as DubaiFaqController;
use App\Http\Controllers\Site\dubai\termsController as DubaiTermsController;
use App\Http\Controllers\Site\abdudhabi\faqController as AbdudhabiFaqController;
use App\Http\Controllers\Site\dubai\contactController as DubaiContactController;
use App\Http\Controllers\Site\dubai\privacyController as DubaiPrivacyController;
use App\Http\Controllers\Site\dubai\blogIndexController as DubaiBlogIndexController;
use App\Http\Controllers\Site\dubai\disclaimerController as DubaiDisclaimerController;
use App\Http\Controllers\Site\abdudhabi\contactController as AbdudhabiContactController;
use App\Http\Controllers\Site\dubai\reservationController as DubaiReservationController;
use App\Http\Controllers\Site\supernatural\HomeController as SupernaturalHomeController;
use App\Http\Controllers\Site\dubai\teambuildingController as DubaiTeambuildingController;

use App\Http\Controllers\Site\abdudhabi\reservationController as AbdudhabiReservationController;
use App\Http\Controllers\Site\dubai\requestfranchiseController as DubaiRequestfranchiseController;

Route::get("/", [HomeController::class, 'index'])->name('home.index');
Route::get("/uae", [HomeIndexController::class, 'index'])->name('homepage.index');
Route::get("/saudi", [HomeAbudhabiController::class, 'index'])->name('homesaudi.index');


Route::get("/vragames", [SupernaturalHomeController::class, 'index'])->name('vrgames.index');

Route::get("/abudhabi/faq", [AbdudhabiFaqController::class, 'faqIndex'])->name('abudhabi.faq');
Route::get("/uae/cooporate", [DubaiFaqController::class, 'faqIndex'])->name('uae.coopoarate');
Route::get("/uae/pricelist", [DubaiFaqController::class, 'faqIndex'])->name('uae.pricelist');



Route::get("/abudhabi/disclaimer-and-liability", [disclaimerController::class, 'index'])->name('abudhabi.disclaimer');
Route::get("/uae/events", [DubaiDisclaimerController::class, 'index'])->name('uae.events');

Route::get("/abudhabi/terms-conditions", [termsController::class, 'index'])->name('abudhabi.terms');
Route::get("/dubai/terms-conditions", [DubaiTermsController::class, 'index'])->name('dubai.terms');

Route::get("/abudhabi/privacy-policy", [privacyController::class, 'index'])->name('abudhabi.privacy');
Route::get("/dubai/privacy-policy", [DubaiPrivacyController::class, 'index'])->name('dubai.privacy');

Route::get("/abudhabi/team-building", [teambuildingController::class, 'index'])->name('abudhabi.teambuilding');
Route::get("/dubai/team-building", [DubaiTeambuildingController::class, 'index'])->name('dubai.teambuilding');


Route::get("/abudhabi/franchise", [requestfranchiseController::class, 'index'])->name('abudhabi.franchise');
Route::get("/uae/franchise", [DubaiRequestfranchiseController::class, 'index'])->name('uae.franchise');


Route::post("abudhabi/franchise", [requestfranchiseController::class, 'store'])->name('abudhabi.franchise.store');
Route::post("dubai/franchise", [DubaiRequestfranchiseController::class, 'store'])->name('dubai.franchise.store');



Route::get('/check-availability/{room_id}', CheckAvailabilityController::class);
Route::post('/check-promotion', CheckPromotionDiscount::class)->name('check-promotion');


Route::get("/abudhabi/blog", [blogIndexController::class, 'blogIndex'])->name('abudhabi.blog');
Route::get("/uae/blog", [DubaiBlogIndexController::class, 'blogIndex'])->name('uae.blog');

Route::get("/abudhabi/blog/{id}/{title}", [blogIndexController::class, 'blogDetail'])->name('abudhabi.blog.blogdetails');
Route::get("/dubai/blog/{id}/{title}", [DubaiBlogIndexController::class, 'blogDetail'])->name('dubai.blog.blogdetails');



Route::get("/abudhabi/reservation", [AbdudhabiReservationController::class, 'index'])->name('abudhabi.reservation');
Route::get("/dubai/reservation", [DubaiReservationController::class, 'index'])->name('dubai.reservation');


Route::get("/abudhabi/rooms", [roomIndexController::class, 'roomsIndex'])->name('abudhabi.rooms');

Route::get("/abudhabi/contact", [AbdudhabiContactController::class, 'contactIndex'])->name('abudhabi.contact');
Route::get("/uae/contact", [DubaiContactController::class, 'contactIndex'])->name('uae.contact');

Route::post("/abudhabi/contact", [AbdudhabiContactController::class, 'store'])->name('abudhabi.contact.store');
Route::post("/uae/contact", [DubaiContactController::class, 'store'])->name('dubai.contact.store');



Route::controller(RoomController::class)->name('rooms.')->group(callback: function () {
    Route::get('rooms', fn () => redirect()->route('home.index'))->name('index');
    Route::get('dubai/rooms',       'dubai')->name('dubai');
    Route::get('abudhabi/rooms',    'abudhabi')->name('abudhabi');
    Route::post('rooms/reservation', 'reservation')->name('reservation');
    Route::get("/rooms/form",      'form')->name('form');
    Route::post("/rooms/promotion", 'promotion')->name('promotion');
    Route::get("abudhabi/rooms/{slug}",     'detail')->name('detail');
    Route::get("dubai/rooms/{slug}",     'dubaidetail')->name('dubai_detail');
});



Route::controller(ReservationController::class)->name('reservations.')->group(function () {
    Route::get('abudhabi/reservation',       'index')->name('abudhabi.reservation');
    Route::post('reservations', 'store')->name('store');
});

Route::controller(VideoRequestController::class)->name('requestvideo.')->group(function () {

    Route::get('abudhabi/video-order', 'index_abudhabi')->name('abudhabi');
    Route::get('dubai/video-order', 'index_dubai')->name('dubai');

    Route::post('video', 'store')->name('store');
});






Route::controller(ReservationController::class)->name("payments.")->prefix("payments")->group(function () {
    Route::get("success", "RetrieveOrderStatus")->name("success");
    Route::get("failed", "failed")->name("failed");
});

Route::get("/price",                [PriceController::class, 'index'])->name('price.index');
Route::get("/events",               [EventsController::class, 'index'])->name('events.index');
Route::get("/contact",              [ContactController::class, 'index'])->name('contact.index');

Route::get("/terms",            fn () => view('site.terms'))->name('terms');
Route::get("/privacy",          fn () => view('site.privacy'))->name('privacy');
Route::get("/refund",           fn () => view('site.refund'))->name('refund');
Route::get("/liability",        fn () => view('site.liability'))->name('liability');

require __DIR__ . '/auth.php';
