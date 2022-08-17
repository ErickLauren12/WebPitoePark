<?php

namespace App\Http\Controllers;

use App\Meja;

use Illuminate\Http\Request;
use Session;

class HomeController extends Controller
{

    public function index(){

        $meja = Meja::where('id', 1)->get();
        Session::put('nomor_meja', $meja[0]->no_meja);

        return view('home',[
            'title'=>'Home'
        ]);
    }
}
