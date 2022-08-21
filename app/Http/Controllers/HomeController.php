<?php

namespace App\Http\Controllers;

use App\Meja;

use Illuminate\Http\Request;
use Session;

class HomeController extends Controller
{

    public function index(){

        
        return view('home',[
            'title'=>'Home'
        ]);
    }
}
