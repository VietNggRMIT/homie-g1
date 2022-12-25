<?php

namespace App\Http\Controllers;

use App\Models\Application;
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
        $application = new Application;
        //$application->application_description = $request->application_description;
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
        return redirect('application_create')->with('status', 'Application Created Successfully');
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
