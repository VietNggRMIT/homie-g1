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
