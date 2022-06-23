<?php

namespace App\Http\Controllers;

use App\LogNews;
use Illuminate\Http\Request;

class LogNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('log.news', [
            'title' => 'Log News',
            "post" => LogNews::latest()->paginate(15)
        ]);
    }

    public function find(Request $request)
    {
        $result = LogNews::join('accounts','accounts.id','log_news.id_account')->where('accounts.username',"like","%" . $request['search'] . "%")->paginate(6);
        return view('log.news', [
            'title' => 'Log News',
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
     * @param  \App\LogNews  $logNews
     * @return \Illuminate\Http\Response
     */
    public function show(LogNews $logNews)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LogNews  $logNews
     * @return \Illuminate\Http\Response
     */
    public function edit(LogNews $logNews)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LogNews  $logNews
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LogNews $logNews)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LogNews  $logNews
     * @return \Illuminate\Http\Response
     */
    public function destroy(LogNews $logNews)
    {
        //
    }
}
