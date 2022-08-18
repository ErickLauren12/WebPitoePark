<?php

namespace App\Exports;

use App\Cafe;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class CafeExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('extract.cafe', [
            "cafe" => Cafe::all()
        ]);
    }
}
