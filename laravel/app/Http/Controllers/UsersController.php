<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

//        Viet Anh (05 Dec 2022)
//        $user = DB::table('user')->find($id);
//        $listings = DB::table('listing')
//            ->where('user_id', '=', $id)
//            ->get();
//
//        return response()
//            ->view('directory_user.user', ['user' => $user, 'listings' => $listings], 200);

//        Thanh Nguyen (05 Dec 2022)
        $custom_user = User::
            with('listings')
            ->with('listings.listingimages:listing_image_path,listing_id')
//            ->with('listings.reviews') // Cannot query grandchildren
//            ->with('listings.applications') // Cannot query grandchildren
            ->with(['listings' => function($query){
                $query->withCount('reviews');
                $query->withCount('applications');
            }])
//            ->withCount(['listings', 'reviews'])
//            ->withCount(['listings', 'applications'])
            ->find($user->id);

//        dd($custom_user);

        return response()
            ->view('directory_user.user', ['user' => $custom_user], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
