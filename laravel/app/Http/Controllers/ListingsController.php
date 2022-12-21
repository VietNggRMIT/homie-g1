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
//        ======================DO NOT DELETE======================
//        $custom_listings = DB::table('listing')
//            ->leftJoin('user', 'listing.user_id', '=', 'user.id')
//            ->select('listing.*', 'user.user_real_name')
//            ->where('listing_available', '1')
//            ->get();
//        ======================DO NOT DELETE======================

        $custom_listings = Listing::with('user')
            ->with('listingimages:listing_image_path,listing_id')
            ->withAvg('reviews', 'review_rating')
            ->withCount('reviews')
            ->withCount('applications')
            ->get();

            return response()
                ->view('directory_listing.listings', ['listings' => $custom_listings], 200);
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
        $listing = new Listing;
        $listing->listing_name = $request->listing_name;
        $listing->listing_description = $request->listing_description;
        $listing->listing_address_subdivision_1 = $request->listing_address_subdivision_1;
        $listing->listing_address_subdivision_2 = $request->listing_address_subdivision_2;
        $listing->listing_address_subdivision_3 = $request->listing_address_subdivision_3;
        $listing->listing_address_coordinate = $request->listing_address_coordinate;
        $listing->price = $request->price;
        $listing->available = $request->available;
        $listing->listing_specification_bathroom = $request->listing_specification_bathroom;
        $listing->listing_specification_bedroom  = $request->listing_specification_bedroom;
        $listing->listing_specification_size = $request->listing_specification_size;
        $listing->listing_specification_owner = $request->listing_specification_owner;
        $listing->listing_specification_tenant = $request->listing_specification_tenant;
        $listing->user_id = $request->user_id;
        $listing->save();
        return redirect('listing_create')->with('status', 'Listing Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function show(Listing $listing)
    {
//        ======================DO NOT DELETE======================
//        Not working 1
//        $new_listing = DB::table('listing')
//            ->join('listing','user.id', '=', 'listing.user_id')
//            ->join('listing_image','user.id', '=', 'listing.user_id')
//            ->where('listing.id', '=', $listing)
//            ->first();

//        Not working 1
//        $custom_listing = DB::table('listing')
//            ->join('user','user.id', '=', 'listing.user_id')
//            ->leftJoin('listing_image','listing_image.listing_id', '=', 'listing.id')
//            ->leftJoin('review','review.listing_id', '=', 'listing.id')
//            ->leftJoin('application','application.listing_id', '=', 'listing.id')
//            ->where('listing.id', '=', $listing->id)
//            ->first();
//        ======================DO NOT DELETE======================

//        Good 1
        $custom_listing = Listing::
            with(['user','listingimages:listing_image_path,listing_id','applications','reviews'])
            ->withAvg('reviews', 'review_rating')
            ->withCount('reviews')
            ->withCount('applications')
            ->find($listing->id);

        return response()
            ->view('directory_listing.listing', ['listing' => $custom_listing], 200);
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
