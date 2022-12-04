<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Listing;
use App\Models\ListingImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $listings_true = DB::table('listing')
//            ->leftJoin('user', 'listing.user_id', '=', 'user.id')
//            ->select('listing.*', 'user.user_real_name')
//            ->where('listing_available', '1')
//            ->get();
//        $listings_false = DB::table('listing')
//            ->leftJoin('user', 'listing.user_id', '=', 'user.id')
//            ->select('listing.*', 'user.user_real_name')
//            ->where('listing_available', '0')
//            ->get();
        $listings_true = Listing::with('user')
            ->with('listingimages:listing_image_path,listing_id')
            ->withAvg('reviews', 'review_rating')
            ->withCount('applications')
//            ->where('listing.listing_available', '=', '1')
            ->get();
//        $listings_false = Listing::with(['user', 'listingimages', 'reviews', 'applications'])
//            ->where('listing.listing_available', '=', '0')
//            ->get();

            return response()
            ->view('directory_listing.listings', ['listings_true' => $listings_true], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function show(Listing $listing)
    {
//        $new_listing = DB::table('listing')
//            ->join('listing','user.id', '=', 'listing.user_id')
//            ->join('listing_image','user.id', '=', 'listing.user_id')
//            ->where('listing.id', '=', $listing)
//            ->first();

//        $listings_true = DB::table('listing')
//            ->leftJoin('user', 'listing.user_id', '=', 'user.id')
//            ->select('listing.*', 'user.user_real_name')
//            ->where('listing_available', '1')
//            ->get();

//        $listing = Listing::with(['user', 'listingimages'])
//            ->get();
//
//        dd($listing);

        return response()
            ->view('directory_listing.listing', ['listing' => $listing], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function edit(Listing $listing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Listing $listing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Listing $listing)
    {
        //
    }
}
