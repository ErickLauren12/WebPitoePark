<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Location extends Controller
{
    public function index(){
        return view('location.index',[
            'title'=>'Location'
        ]);
    }
}
