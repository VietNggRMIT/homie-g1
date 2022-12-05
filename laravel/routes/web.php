<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListingsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\FallbackController;
use Illuminate\Support\Facades\Route;

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

// ==========================How to call Controller==========================
//Route::get('/listing/{id}', [ListingsController::class, 'index']);
// ==========================================================================

// Homepage route, placed at the beginning of the file
//Route::redirect('/', '/listings/', 302);

Route::redirect('/', '/home', '302');

Route::get('/home', HomeController::class)
    ->name('route_home');

Route::resource('/listings', ListingsController::class);

//Route::prefix('listings')->group(function () {
//
////     Handles the path /listings/
//    //        'listings' => DB::table('listing')
////                    ->join('user', 'listing.user_id', '=', 'user.id')
////                    ->select('listing.*', 'user.user_real_name')
////                    ->get()
////            'listings' => Listing::all(),
//
//    Route::get('/', [ListingsController::class, 'index'])
//        ->name('directory_listing.index');
//
////     Handles the path /listings/{id}
////    'listing' => Listing::find($id),
////            'user' => DB::table('user')
////        ->join('listing', 'user.id', '=', 'listing.user_id')
////        ->where('listing.id', '=', $id)
////        ->first()
//
//    Route::get('/{id}', [ListingsController::class, 'show'])
//        ->name('directory_listing.show')
//        ->where('id', '[0-9]+');
//});

Route::resource('/users', UsersController::class);

//Route::prefix('users')->group(function () {
//
//    // Handles the path /listings/{id}
//    Route::get('/{id}', function ($id) {
//        return view('user', [
//            'user' => User::find($id),
//        ]);
//    })->where('id', '[0-9]+');
//
//});

Route::resource('/blogs', BlogsController::class);

// Fallback route placed at the end of the file to catch all unmatched paths
Route::fallback(FallbackController::class)
    ->name('route_fallback');
