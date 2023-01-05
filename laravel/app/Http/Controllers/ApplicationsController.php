<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Listing;
use Illuminate\Http\Request;

class ApplicationsController extends Controller
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
     * @param $request storing the listing id
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return response()
            ->view('directory_listing.application_create', ['listing' => $request->listing], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $application = new Application;

//        "applicant" => "name"
//        "phone" => "12"
//        "email" => "asd@gfasd"
//        "dateofbirth" => "2023-01-19"
//        "occupancy" => "213123"
//        "movein" => "132112-03-12"
//        "payment" => "123123"
//        "vehicle" => "on"
//        "pet" => "on"
//        "job" => "123213"
//        "income" => "13123"
//        "address" => "2132"
//        "reason" => "123"
//        "landlord" => "123123"
//        "evicted" => "on"
//        "convicted" => "on"

        if ($request->vehicle == "on") {
            $request->vehicle = "yes vehicle";
        } else {
            $request->vehicle = "no vehicle";
        }
        if ($request->pet == "on") {
            $request->pet = "yes pet";
        } else {
            $request->pet = "no pet";
        }
        if ($request->evicted == "on") {
            $request->evicted = "yes evicted";
        } else {
            $request->evicted = "no evicted";
        }
        if ($request->convicted == "on") {
            $request->convicted = "yes convicted";
        } else {
            $request->convicted = "no convicted";
        }

    /*****************************************************************************
    The code below uses elements from:
    *Title: Eloquent
    *Author: Laravel
    *Availability: https://laravel.com/docs/9.x/eloquent (Accessed 31 November 2022)
    *****************************************************************************/
        $content = sprintf('Applicant: %s; Phone: %s; Email: %s; Date of birth: %s
                    Expected duration: %s; Expected move in date: %s;
                    Expected payment via %s; Vehicle: %s; Pet: %s;
                    Current job: %s; Annual income in VND: %d;
                    Current address: %s;
                    Reason for leaving: %s;
                    Previous landlord phone: %s;
                    Evicted: %s; Convicted: %s',
                    $request->applicant, $request->phone, $request->email, $request->dateofbirth,
                    $request->occupancy, $request->movein, $request->payment, $request->vehicle, $request->pet,
                    $request->job, $request->income, $request->address, $request->reason, $request->landlord,
                    $request->evicted, $request->convicted);

        $application->application_description = $content;
        $application->listing_id = $request->listing_id;
        $application->save();
        $listing = Listing::find($request->listing_id);

        return redirect()->action([ListingsController::class, 'show'], ['listing' => $listing])->with('application_success_store', 'store');
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
