<?php

namespace App\Http\Controllers;
//use App\Http\Controllers\ListingsController;
use App\Models\User;
use App\Models\ListingImage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;

use Illuminate\Http\Request;

class ListingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        // $listing = DB::table('user')
        //          ->leftJoin('listing','user.id', '=', 'listing.user_id')
        //          ->where('listing.id', '=', $id)
        //         //  ->select('user_real_name')
        //          ->get();
        // return view('listing', compact($listing));
        return view('listing', [
            'listing' => Listing::find($id),
            'user' => DB::table('user')
                 ->join('listing','user.id', '=', 'listing.user_id')
                 ->where('listing.id', '=', $id)
                //  ->select('user_real_name')
                 ->get()
        ]);
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
