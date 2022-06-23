<?php

namespace App\Http\Controllers;

use App\LogCafe;
use Illuminate\Http\Request;

class LogCafeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('log.cafe', [
            'title' => 'Log Cafe',
            "post" => LogCafe::latest()->paginate(15)
        ]);
    }

    public function find(Request $request)
    {
        $result = LogCafe::join('accounts','accounts.id','log_cafes.id_account')->where('accounts.username',"like","%" . $request['search'] . "%")->paginate(6);
        return view('log.cafe', [
            'title' => 'Log Cafe',
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
     * @param  \App\LogCafe  $logCafe
     * @return \Illuminate\Http\Response
     */
    public function show(LogCafe $logCafe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LogCafe  $logCafe
     * @return \Illuminate\Http\Response
     */
    public function edit(LogCafe $logCafe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LogCafe  $logCafe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LogCafe $logCafe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LogCafe  $logCafe
     * @return \Illuminate\Http\Response
     */
    public function destroy(LogCafe $logCafe)
    {
        //
    }
}
