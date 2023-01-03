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
        return response()->view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;
        $user->user_email_address = $request->user_email_address;
        //check if email exist too
        if(true){

        }

        if($request->password_confirm != $request->user_password){
            return response()->view('auth.register', ['message' => 'Password does not match.']);
        }
        else{
            $user->user_password = $request->user_password;
        }
        $user->user_real_name = $request->user_real_name;
        //match 098... and +849282...
        if(preg_match('/[+]?([0-9])*/', $request->user_phone_number, $match)){
            $user->user_phone_number = $request->user_phone_number;
        }
        else{
            return response()->view('auth.register', ['message' => 'Wrong input format.']);
        }
        $user->user_description = $request->user_description;
        if($request->hasFile(('image_upload'))){
            $file = $request->file('image_upload');
            $filename = str_replace(' ', '', $user->user_real_name) . '.' . $file->extension();
            $path = $file->storeAs('public/images', $filename);
            $user->user_image_path = basename($path);
        }
        else{
            $user->user_image_path = 'user_image_path_1.jpg';
        }
        $user->save();
        session(['user' => $user]);
        return redirect()->action([UsersController::class, 'show'], ['user' => $user]);
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
                $query->withAvg('reviews', 'review_rating');
                $query->withCount('reviews');
                $query->withCount('applications');
            }])
//            ->withCount(['listings', 'reviews']) // Can't do this since it would AVG of all listings
//            ->withCount(['listings', 'applications']) // Can't do this it would COUNT of all applications received
            ->find($user->id);

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
