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
    /*****************************************************************************
    The code below uses elements from:
    *Title: Eloquent: Relationships
    *Author: Laravel
    *Code version: 9.x
    *Availability: https://laravel.com/docs/9.x/eloquent-relationships (Accessed 2 October 2022)
    *****************************************************************************/
    $custom_listings = Listing::with('user')
        ->with('listingimages:listing_image_path,listing_id')
        ->withAvg('reviews', 'review_rating')
        ->withCount('reviews')
        ->withCount('applications')->paginate(30); //replace get() with paginate()

        return response()
            ->view('directory_listing.listings', ['listings' => $custom_listings], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return response()
            ->view('directory_listing.listing_create', ['user' => $request->user], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /*****************************************************************************
    The code below uses elements from:
    *Title: Eloquent
    *Author: Laravel
    *Code version: 9.x
    *Availability: https://laravel.com/docs/9.x/eloquent (Accessed 31 November 2022)
    *****************************************************************************/
    public function store(Request $request)
    {
        // First Part
        $listing = new Listing;

        $listing->listing_name = $request->listing_name;
        $listing->listing_description = $request->listing_description;
        $listing->listing_address_subdivision_1 = $request->listing_address_subdivision_1;
        $listing->listing_address_subdivision_2 = $request->listing_address_subdivision_2;
        $listing->listing_address_subdivision_3 = $request->listing_address_subdivision_3;
        $listing->listing_address_latitude = $request->listing_address_latitude;
        $listing->listing_address_longitude = $request->listing_address_longitude;
        $listing->listing_price = str_replace(',', '', $request->listing_price);
        if ($request->listing_available == "on") {
            $listing->listing_available = 1;
        } else {
            $listing->listing_available = 0;
        }
        $listing->listing_specification_bathroom = $request->listing_specification_bathroom;
        $listing->listing_specification_bedroom  = $request->listing_specification_bedroom;
        $listing->listing_specification_size = $request->listing_specification_size;
        if ($request->listing_specification_owner == "on") {
            $listing->listing_specification_owner = 1;
        } else {
            $listing->listing_specification_owner = 0;
        }
        $listing->listing_specification_tenant = $request->listing_specification_tenant;
        $listing->user_id = $request->user_id;
        $listing->save();

        // Second Part, save all image(s) to the listing_images table
        /*****************************************************************************
        The code below uses elements from:
        *Title: File Storage
        *Author: Laravel
        *Code version: 9.x
        *Availability: https://laravel.com/docs/9.x/filesystem (Accessed 7 December 2022)
        *****************************************************************************/
        if($request->has('listingimages')) {
            foreach ($request->file('listingimages') as $image) {
                $imageName = 'image-'.time().rand(1,100000000).'.'.$image->extension();
                $image->move(storage_path('app\public\images'), $imageName);
                ListingImage::create([
                    'listing_image_path' => $imageName,
                    'listing_id' => $listing->id,
                ]);
            }
        }

        return redirect()->action([ListingsController::class, 'show'],['listing' => $listing])->with('listing_success_store', 'store');
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
    /*****************************************************************************
    The code below uses elements from:
    *Title: Eloquent: Relationships
    *Author: Laravel
    *Code version: 9.x
    *Availability: https://laravel.com/docs/9.x/eloquent-relationships (Accessed 2 October 2022)
    *****************************************************************************/
    $custom_listing = Listing::
        with(['user','listingimages:listing_image_path,listing_id','applications','reviews'])
        ->withAvg('reviews', 'review_rating')
        ->withCount('reviews')
        ->withCount('applications')
        ->find($listing->id);

    $custom_user = User::
        withCount(['reviews', 'applications']) // Get COUNT of these two
        ->withAvg('reviews','review_rating') // Get AVG COUNT of this column
        ->find($listing->user_id);

    return response()
        ->view('directory_listing.listing', ['listing' => $custom_listing, 'custom_user' => $custom_user], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Listing  $listing, \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Listing $listing)
    {
        $custom_listing = Listing::with('user')
            ->with('listingimages')
            ->find($listing->id);

        return response()
            ->view('directory_listing.listing_create', ['listing' => $custom_listing], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $listing_id
     * @return \Illuminate\Http\Response
     */
    /*****************************************************************************
    The code below uses elements from:
    *Title: Eloquent
    *Author: Laravel
    *Code version: 9.x
    *Availability: https://laravel.com/docs/9.x/eloquent (Accessed 31 November 2022)
    *****************************************************************************/
    public function update(Request $request, $listing_id)
    {
        // First Part
        $listing = Listing::find($listing_id);

        $listing->listing_name = $request->listing_name;
        $listing->listing_description = $request->listing_description;
        $listing->listing_address_subdivision_1 = $request->listing_address_subdivision_1;
        $listing->listing_address_subdivision_2 = $request->listing_address_subdivision_2;
        $listing->listing_address_subdivision_3 = $request->listing_address_subdivision_3;
        $listing->listing_address_latitude = $request->listing_address_latitude;
        $listing->listing_address_longitude = $request->listing_address_longitude;
        $listing->listing_price = str_replace(',', '', $request->listing_price);
        if ($request->listing_available == "on") {
            $listing->listing_available = 1;
        } else {
            $listing->listing_available = 0;
        }
        $listing->listing_specification_bathroom = $request->listing_specification_bathroom;
        $listing->listing_specification_bedroom  = $request->listing_specification_bedroom;
        $listing->listing_specification_size = $request->listing_specification_size;
        if ($request->listing_specification_owner == "on") {
            $listing->listing_specification_owner = 1;
        } else {
            $listing->listing_specification_owner = 0;
        }
        $listing->listing_specification_tenant = $request->listing_specification_tenant;
        $listing->user_id = $request->user_id;
        $listing->save();

        // Second Part, save all image(s) to the listing_images table
        /*****************************************************************************
        The code below uses elements from:
        *Title: File Storage
        *Author: Laravel
        *Code version: 9.x
        *Availability: https://laravel.com/docs/9.x/filesystem (Accessed 7 December 2022)
        *****************************************************************************/
        if($request->has('listingimages')) {
            foreach ($request->file('listingimages') as $image) {
                $imageName = 'image-'.time().rand(1,100000000).'.'.$image->extension();
                $image->move(storage_path('app\public\images'), $imageName);
                ListingImage::create([
                    'listing_image_path' => $imageName,
                    'listing_id' => $listing->id,
                ]);
            }
        }

        return redirect()->action([ListingsController::class, 'show'],['listing' => $listing])->with('listing_success_update', 'update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $listing_id the listing id
     * @return \Illuminate\Http\Response
     */
    /*****************************************************************************
    The code below uses elements from:
    *Title: Eloquent
    *Author: Laravel
    *Code version: 9.x
    *Availability: https://laravel.com/docs/9.x/eloquent (Accessed 31 November 2022)
    *****************************************************************************/
    public function destroy($listing_id)
    {
        $success = Listing::destroy($listing_id);
        return redirect()->action([ListingsController::class, 'index'], ['delete' => 'success'])->with('listing_success_destroy', 'destroy');
    }
}
