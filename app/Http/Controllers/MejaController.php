<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use SimpleSoftwareIO\QrCode\Facades\QrCode;

use App\Meja;

class MejaController extends Controller
{
    public function index(){
        $meja = Meja::all();
        return view ('qrcode.index', ['meja' => $meja]);
    }
    public function store(Request $request){
        $meja = new Meja;
        $meja->no_meja = $request->no_meja;
        $meja->link = $request->link;
        $meja->save();
        return back();
    }
    public function generate ($id)
    {
        $meja = Meja::findOrFail($id);
        $qrcode = QrCode::size(400)->generate($meja->link);
        return view('qrcode.detail', compact('qrcode'));
    }
}
