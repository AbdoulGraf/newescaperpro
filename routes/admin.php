<?php

use App\Models\abudhabi\FAQ;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HourController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\PriceController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SignatureController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Site\abdudhabi\faqController;
use App\Http\Controllers\Admin\abdudhabi\BlogController;
use App\Http\Controllers\Admin\abdudhabi\CommentController;
use App\Http\Controllers\Admin\abdudhabi\contactController;
use App\Http\Controllers\Admin\abdudhabi\promocodeController;
use App\Http\Controllers\Admin\abdudhabi\storylineController;
use App\Http\Controllers\Admin\abdudhabi\photovideoController;
use App\Http\Controllers\Admin\abdudhabi\SocialmadiaController;
use App\Http\Controllers\Admin\abdudhabi\SubscribersController;
use App\Http\Controllers\Admin\abdudhabi\requestvideoController;
use App\Http\Controllers\Admin\abdudhabi\RequestFranchiseController;
use App\Http\Controllers\Admin\abdudhabi\FaqController as AbdudhabiFaqController;
use App\Http\Controllers\Admin\VideoPriceController;

Route::get('/', [DashboardController::class, 'index'])->middleware(['auth', 'verified']);
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');





Route::controller(PriceController::class)->name('prices.')->group(callback: function () {
    Route::get('prices', 'index')->name('index'); //->middleware(['permission:read room']);
    Route::post('prices', 'store')->name('store'); //->middleware(['permission:create room']);
    Route::get('prices/create', 'create')->name('create'); //->middleware(['permission:create room']);
    Route::post('prices/create', 'store')->name('create.store'); // Add this line to handle form submission
    Route::get('prices/{id}', 'show')->name('show'); //->middleware(['permission:read room']);
    Route::patch('prices/{id}', 'update')->name('update'); //->middleware(['permission:update room']);
    Route::delete('prices/{id}', 'destroy')->name('destroy'); //->middleware(['permission:delete room']);
    Route::get('prices/{id}/edit', 'edit')->name('edit'); //->middleware(['permission:update room']);
});


Route::controller(RoomController::class)->name('rooms.')->group(callback: function () {
    Route::get('rooms', 'index')->name('index'); //->middleware(['permission:read room']);
    Route::post('rooms', 'store')->name('store'); //->middleware(['permission:create room']);
    Route::get('rooms/create', 'create')->name('create'); //->middleware(['permission:create room']);
    Route::get('rooms/{room}', 'show')->name('show'); //->middleware(['permission:read room']);
    Route::patch('rooms/{room}', 'update')->name('update'); //->middleware(['permission:update room']);
    Route::delete('rooms/{room}', 'destroy')->name('destroy'); //->middleware(['permission:delete room']);
    Route::get('rooms/{room}/edit', 'edit')->name('edit'); //->middleware(['permission:update room']);
    Route::post('getRooms/{place_id}', 'getRooms')->name('getRooms');
});


Route::controller(HourController::class)->name('hours.')->group(callback: function () {
    Route::get('hours', 'index')->name('index'); //->middleware(['permission:read hour']);
    Route::post('hours', 'store')->name('store'); //->middleware(['permission:create hour']);
    Route::post('hours/create', 'store')->name('create.store'); // Add this line to handle form submission
    Route::get('hours/create', 'create')->name('create'); //->middleware(['permission:create hour']);
    Route::post('hours/getHours', 'getHours')->name('getHours');
    Route::get('hours/{hour}', 'show')->name('show'); //->middleware(['permission:read hour']);
    Route::patch('hours/{hour}', 'update')->name('update'); //->middleware(['permission:update hour']);
    Route::delete('hours/{id}', 'destroy')->name('destroy'); //->middleware(['permission:delete hour']);
    Route::get('hours/{id}/edit', 'edit')->name('edit'); //->middleware(['permission:update hour']);
});



Route::controller(ReservationController::class)->name('reservations.')->group(callback: function () {

    Route::get('reservations', 'index')->name('index');
    Route::get('reservations/today/list', 'index')->name('today-list');
    Route::get('reservations/dubai', 'dubai')->name('dubai');
    // Route::get('reservations/dubai/list', 'index')->name('dubai-list');
    Route::get('reservations/dubai/{id}/list', 'monthlylist')->name('monthlylist');
    Route::get('reservations/dubai/details/{id}/list', 'dailylist')->name('dailylist');
    Route::get('reservations/abudhabi', 'abudhabi')->name('abudhabi');
    // Route::get('reservations/abudhabi/list', 'index')->name('abudhabi-list');
    Route::get('reservations/abudhabi/{id}/list', 'monthlylist')->name('monthlylist');
    Route::get('reservations/abudhabi/details/{id}/list', 'dailylist')->name('dailylist');
    Route::post('reservations', 'store')->name('store'); //->middleware(['permission:create reservation']);
    Route::patch('reservations/{item}/restore', 'restore')->name('restore'); //->middleware(['permission:create reservation']);
    Route::get('reservations/create', 'create')->name('create'); //->middleware(['permission:create reservation']);
    Route::get('reservations/{reservation}', 'show')->name('show'); //->middleware(['permission:read reservation']);
    Route::patch('reservations/{reservation}', 'update')->name('update'); //->middleware(['permission:update reservation']);
    Route::delete('reservations/{reservation}', 'destroy')->name('destroy');
    Route::delete('reservations/{item}/force', 'forceDelete')->name('forceDelete'); //->middleware(['permission:delete reservation']);
    Route::get('reservations/{reservation}/edit', 'edit')->name('edit');
    
});





Route::controller(BlogController::class)->name('blog.')->group(function () {
    Route::get('blog', 'index')->name('list');
    Route::post('blog', 'store')->name('store'); //->middleware(['permission:create room']);
    Route::get('blog/create', 'create')->name('create'); //->middleware(['permission:create room']);
    Route::post('blog/create', 'store')->name('create.store'); // Add this line to handle form submission
    Route::get('blog/{id}', 'show')->name('show'); //->middleware(['permission:read room']);
    Route::patch('blog/{id}', 'update')->name('update'); //->middleware(['permission:update room']);
    Route::delete('blog/{id}', 'destroy')->name('destroy'); //->middleware(['permission:delete room']);
    Route::get('blog/{id}/edit', 'edit')->name('edit'); //->middleware(['permission:update room']);
});


// commentConntroller
Route::controller(CommentController::class)->name('comment.')->group(function () {
    Route::get('comments', 'index')->name('list');
    Route::post('comments', 'store')->name('store'); //->middleware(['permission:create room']);
    Route::get('comments/create', 'create')->name('create'); //->middleware(['permission:create room']);
    Route::post('comments/create', 'store')->name('create.store'); // Add this line to handle form submission
    Route::get('comments/{id}', 'show')->name('show'); //->middleware(['permission:read room']);
    Route::patch('comments/{id}', 'update')->name('update'); //->middleware(['permission:update room']);
    Route::delete('comments/{id}', 'destroy')->name('destroy'); //->middleware(['permission:delete room']);
    Route::get('comments/{id}/edit', 'edit')->name('edit'); //->middleware(['permission:update room']);

});

// FAQ Question data
Route::controller(AbdudhabiFaqController::class)->name('faq.')->group(function () {
    Route::get('faqs', 'index')->name('list');
    Route::post('faqs', 'store')->name('store'); //->middleware(['permission:create room']);
    Route::get('faqs/create', 'create')->name('create'); //->middleware(['permission:create room']);
    Route::post('faq/create', 'store')->name('create.store'); // Add this line to handle form submission
    Route::get('faqs/{id}', 'show')->name('show'); //->middleware(['permission:read room']);
    Route::patch('faqs/{id}', 'update')->name('update'); //->middleware(['permission:update room']);
    Route::delete('faqs/{id}', 'destroy')->name('destroy'); //->middleware(['permission:delete room']);
    Route::get('faqs/{id}/edit', 'edit')->name('edit'); //->middleware(['permission:update room']);

});

//social media
Route::controller(SocialmadiaController::class)->name('social.')->group(function () {
    Route::get('social-media', 'index')->name('list');
    Route::post('social-media', 'store')->name('store'); //->middleware(['permission:create room']);
    Route::get('social-media/create', 'create')->name('create'); //->middleware(['permission:create room']);
    Route::get('social-media/{id}', 'show')->name('show'); //->middleware(['permission:read room']);
    Route::patch('social-media/{id}', 'update')->name('update'); //->middleware(['permission:update room']);
    Route::delete('social-media/{id}', 'destroy')->name('destroy'); //->middleware(['permission:delete room']);
    Route::get('social-media/{id}/edit', 'edit')->name('edit'); //->middleware(['permission:update room']);

});

// //subscribers part
Route::controller(SubscribersController::class)->name('subscribers.')->group(function () {
    Route::get('subscribers', 'index')->name('list');
    Route::delete('subscribers/{id}', 'destroy')->name('destroy');
});


//request video
Route::controller(requestvideoController::class)->name('requestvideo.')->group(function () {
    Route::get('request-video', 'index')->name('list');
    Route::delete('request-video/{id}', 'destroy')->name('destroy');
});

//request Franchise
Route::controller(RequestFranchiseController::class)->name('requestfranchise.')->group(function () {
    Route::get('request-franchise', 'index')->name('list');
    Route::delete('request-franchise/{id}', 'destroy')->name('destroy');
});

Route::controller(VideoPriceController::class)->name('video_price.')->group(function () {
    Route::get('video-price-setting', 'index')->name('list');
    Route::post('video-price-setting', 'store')->name('store');
    Route::get('video-price-setting/create', 'create')->name('create');

    Route::patch('video-price-setting/{id}', 'update')->name('update');
    Route::get('video-price-setting/{id}/edit', 'edit')->name('edit');


    Route::delete('video-price-setting/{id}', 'destroy')->name('destroy');
});


//conatct form
Route::controller(contactController::class)->name('contact.')->group(function () {
    Route::get('contact', 'index')->name('list');
    Route::delete('contact/{id}', 'destroy')->name('destroy');
});



Route::controller(photovideoController::class)->name('photos_videos.')->group(function () {
    Route::get('photos_videos', 'index')->name('list');
    Route::post('photos_videos', 'store')->name('store'); //->middleware(['permission:create room']);
    Route::get('photos_videos/create', 'create')->name('create'); //->middleware(['permission:create room']);
    Route::post('photos_videos/create', 'store')->name('create.store'); // Add this line to handle form submission
    Route::get('photos_videos/{id}', 'show')->name('show'); //->middleware(['permission:read room']);
    Route::patch('photos_videos/{id}', 'update')->name('update'); //->middleware(['permission:update room']);
    Route::delete('photos_videos/{id}', 'destroy')->name('destroy'); //->middleware(['permission:delete room']);
    Route::get('photos_videos/{id}/edit', 'edit')->name('edit'); //->middleware(['permission:update room']);
});


Route::controller(storylineController::class)->name('storyline.')->group(function () {
    Route::get('storyline', 'index')->name('list');
    Route::post('storyline', 'store')->name('store'); //->middleware(['permission:create room']);
    Route::get('storyline/create', 'create')->name('create'); //->middleware(['permission:create room']);
    Route::post('storyline/create', 'store')->name('create.store'); // Add this line to handle form submission
    Route::get('storyline/{id}', 'show')->name('show'); //->middleware(['permission:read room']);
    Route::patch('storyline/{id}', 'update')->name('update'); //->middleware(['permission:update room']);
    Route::delete('storyline/{id}', 'destroy')->name('destroy'); //->middleware(['permission:delete room']);
    Route::get('storyline/{id}/edit', 'edit')->name('edit'); //->middleware(['permission:update room']);
});




Route::controller(promocodeController::class)->name('promocode.')->group(function () {
    Route::get('promocode-list', 'index')->name('list');
    Route::post('promocode-list', 'store')->name('store'); //->middleware(['permission:create room']);
    Route::get('promocode-list/create', 'create')->name('create'); //->middleware(['permission:create room']);
    Route::post('promocode-list/create', 'store')->name('create.store'); // Add this line to handle form submission
    Route::get('promocode-list/{id}', 'show')->name('show'); //->middleware(['permission:read room']);
    Route::patch('promocode-list/{id}', 'update')->name('update'); //->middleware(['permission:update room']);
    Route::delete('promocode-list/{id}', 'destroy')->name('destroy'); //->middleware(['permission:delete room']);
    Route::get('promocode-list/{id}/edit', 'edit')->name('edit'); //->middleware(['permission:update room']);
});







Route::controller(SignatureController::class)->name('signatures.')->group(callback: function () {
    Route::get('signature/list', 'list')->name('list'); //->middleware(['permission:read reservation']);
    Route::get('signature/{id}/edit', 'edit')->name('edit'); //->middleware(['permission:update reservation']);
    Route::delete('signature/{id}', 'destroy')->name('destroy'); //->middleware(['permission:delete reservation']);
    Route::patch('signature/{id}', 'update')->name('update'); //->middleware(['permission:update reservation']);

});



Route::get('/error', fn () => abort(500));
require __DIR__ . '/auth.php';
