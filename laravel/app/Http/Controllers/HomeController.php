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
        $listings = Listing::count();
        $users = User::count();
        $blogs = Blog::count();
        $reviews = Review::count();
        $applications = Application::count();
        $listingimages = ListingImage::count();

        return response()
            ->view('home', [
                'listings' => $listings,
                'users' => $users,
                'blogs' => $blogs,
                'reviews' => $reviews,
                'applications' => $applications,
                'listingimages' => $listingimages
                ], 200);
    }
}
