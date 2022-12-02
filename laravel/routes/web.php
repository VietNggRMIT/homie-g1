<?php

use App\Http\Controllers\ListingsController;
use App\Models\User;
use App\Models\ListingImage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('listings', [
        'heading' => 'Latest Rental Listings',
//        'listings' => DB::table('listing')
//                    ->join('user', 'listing.user_id', '=', 'user.id')
//                    ->select('listing.*', 'user.user_real_name')
//                    ->get()
        'listings' => Listing::all(),
    ]);
});

// Laraval 9 way:
Route::get('/listing/{id}', [ListingsController::class, 'index']);

// Deprecated way (before Laravel 8):
// Route::get('/index', 'TasksController@helloWorld');

// Route::get('/listing/{id}', function ($id) {
//     return view('listing', [
//             'listing' => Listing::find($id),
//             'user' => DB::table('user')
//                 ->join('listing','user.id', '=', 'listing.user_id')
//                 ->where('listing.id', '=', $id)
//                 ->first()
//         ]);
// })->where('id', '[0-9]+');

Route::get('/user/{id}', function ($id) {
   return view('user', [
       'user' => User::find($id),
   ]);
})->where('id', '[0-9]+');

Route::get('/listing_images', function () {
    return view('images', [
        'images' => ListingImage::all(),
    ]);
})->where('id', '[0-9]+');
