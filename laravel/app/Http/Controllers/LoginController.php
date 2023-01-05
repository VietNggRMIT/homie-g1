<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class LoginController extends Controller
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
     * Show the form to log the user in
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('auth.login');
    }

    /**
     * Take in a request and log the user in.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /*****************************************************************************
    The code below uses elements from:
    *Title: Eloquent
    *Author: Laravel
    *Availability: https://laravel.com/docs/9.x/eloquent (Accessed 31 November 2022)
    *****************************************************************************/
    public function store(Request $request)
    {
        // return response()->view('auth.hello');
        $user = User::where('user_email_address', $request->email)->first();
        if($user){
            if($user->user_password == $request->password){ //existing email, correct password
                session(['user' => $user]);
                return redirect()->action([UsersController::class, 'show'], ['user' => $user]);
            }
        }
        //vague message by design so that attackers cannot guess the db's rows
        return response()->view('auth.login', ['message' => 'Incorrect email or password.']);
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
     * Show the form for editing user password
     *
     * @param  User $login; cant name it $user bc laravel is not happy
     * @return \Illuminate\Http\Response
     */
    public function edit(User $login)
    {
        $custom_user = User::find($login->id);
        return response()->view('directory_user.user_change_password', ['user' => $custom_user]);
    }

    /**
     * Update the user's password
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $user_id
     * @return \Illuminate\Http\Response
     */
    /*****************************************************************************
    The code below uses elements from:
    *Title: Eloquent
    *Author: Laravel
    *Availability: https://laravel.com/docs/9.x/eloquent (Accessed 31 November 2022)
    *****************************************************************************/
    public function update(Request $request, $user_id)
    {
        $user = User::find($user_id);
        $current = $request->user_password;
        $changed = $request->new_password;
        if($user->user_password != $current){
            return response()->view('directory_user.user_change_password', ['user' => $user, 'message' => 'Wrong password.']);
        }
        $user->user_password = $changed;
        $user->save();
        return redirect()->action([UsersController::class, 'show'], ['user' => $user]);
    }

    /**
     * Log the existing user out.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $request->session()->forget('user');
        return redirect('/home');
    }
}
