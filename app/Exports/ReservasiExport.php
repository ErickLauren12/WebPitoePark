<?php

namespace App\Exports;

use App\Reservation;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ReservasiExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('extract.reservasi', [
            "reservation" => Reservation::all()
        ]);
        
        //return Reservation::all();
    }
}
