<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Listing;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     * @param $request containing the listing id
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return response()
            ->view('directory_listing.review_create', ['from' => 'create', 'listing' => $request->listing], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $review = new Review;
        $review->review_name = $request->review_name;
        $review->review_description = $request->review_description;
        $review->review_rating = $request->review_rating;
        $review->review_image_path = ['richard-stallman.png', 'linus-torvalds.webp'][array_rand([0, 1])];
        $review->listing_id = $request->listing_id;
        $listing = Listing::find($request->listing_id);
        $review->save();
        return redirect()->action([ListingsController::class, 'show'], ['listing' => $listing]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
