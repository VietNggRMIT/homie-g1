<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListingsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\ApplicationsController;
use App\Http\Controllers\ReviewsController;
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

//routes for forms
//1. Create blog
Route::view('/blog_create', 'directory_blog.blog_create', ['from' => 'create']);
Route::post('store-blog/', [BlogsController::class, 'store']);
//2. Update blog -- will add with('blog_id' = $blog_id) on viewing blog
//Route::view('/blog_update/{blog}', 'directory_blog.blog_create', ['from' => 'update']);
Route::post('update-blog/{blog_id}', [BlogsController::class, 'update']);
//3. Create review
Route::view('/review_create', 'directory_listing.review_create');
Route::post('store-review', [ReviewsController::class, 'store']);
//4. Create application
Route::view('/application_create', 'directory_listing.application_create');
Route::post('store-application', [ApplicationsController::class, 'store']);
//5. Create listing
Route::view('/listing_create', 'directory_listing.listing_create');
Route::post('store-listing/{id}', [ListingsController::class, 'store']);
//6. Update listing
Route::view('/listing_update', 'directory_listing.listing_create');
Route::post('update-listing/{id}', [ListingsController::class, 'update']);

//View other pages
Route::view('/about', 'directory_about.about')
    ->name('route_about');

Route::view('/privacy', 'directory_static.privacy')
    ->name('route_privacy');

Route::view('/article', 'directory_static.article')
    ->name('route_article');    

// Fallback route placed at the end of the file to catch all unmatched paths
Route::fallback(FallbackController::class)
    ->name('route_fallback');
