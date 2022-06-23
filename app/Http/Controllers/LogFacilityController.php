<?php

namespace App\Http\Controllers;

use App\LogFacility;
use Illuminate\Http\Request;

class LogFacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('log.facility', [
            'title' => 'Log Facility',
            "post" => LogFacility::latest()->paginate(15)
        ]);
    }
    
    public function find(Request $request)
    {
        $result = LogFacility::join('accounts','accounts.id','log_facilities.id_account')->where('accounts.username',"like","%" . $request['search'] . "%")->paginate(6);
        return view('log.facility', [
            'title' => 'Log Facility',
            "post" => $result
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
     * @param  \App\LogFacility  $logFacility
     * @return \Illuminate\Http\Response
     */
    public function show(LogFacility $logFacility)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LogFacility  $logFacility
     * @return \Illuminate\Http\Response
     */
    public function edit(LogFacility $logFacility)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LogFacility  $logFacility
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LogFacility $logFacility)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LogFacility  $logFacility
     * @return \Illuminate\Http\Response
     */
    public function destroy(LogFacility $logFacility)
    {
        //
    }
}
