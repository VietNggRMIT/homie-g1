<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\User;
use App\Models\Blog;
use App\Models\Review;
use App\Models\Application;
use App\Models\ListingImage;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $listings = Listing::
            inRandomOrder()
            ->with('user')
            ->with('listingimages:listing_image_path,listing_id')
            ->withAvg('reviews', 'review_rating')
            ->withCount('reviews')
            ->withCount('applications')
            ->limit(3) // here is yours limit
            ->get();

        $blogs = Blog::
            inRandomOrder()
            ->with('user')
            ->limit(3) // here is yours limit
            ->get();

        $users = User::
            inRandomOrder()
            ->limit(3) // here is yours limit
            ->get();

        $custom_count = [
            Listing::count(),
            ListingImage::count(),
            Review::count(),
            Application::count(),
            User::count(),
            Blog::count(),
        ];


        return response()
            ->view('home', [
                'custom_count' => $custom_count,
                'listings' => $listings,
                'blogs' => $blogs,
                'users' => $users,
            ], 200);
    }
}
