<?php

namespace App\Http\Controllers;

use App\LogGalerie;
use Illuminate\Http\Request;

class LogGalerieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('log.galery', [
            'title' => 'Log Galery',
            "post" => LogGalerie::latest()->paginate(15)
        ]);
    }

    public function find(Request $request)
    {
        $result = LogGalerie::join('accounts','accounts.id','log_galeries.id_account')->where('accounts.username',"like","%" . $request['search'] . "%")->paginate(6);
        return view('log.galery', [
            'title' => 'Log Galery',
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
     * @param  \App\LogGalerie  $logGalerie
     * @return \Illuminate\Http\Response
     */
    public function show(LogGalerie $logGalerie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LogGalerie  $logGalerie
     * @return \Illuminate\Http\Response
     */
    public function edit(LogGalerie $logGalerie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LogGalerie  $logGalerie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LogGalerie $logGalerie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LogGalerie  $logGalerie
     * @return \Illuminate\Http\Response
     */
    public function destroy(LogGalerie $logGalerie)
    {
        //
    }
}
