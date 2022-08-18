<?php

namespace App\Exports;

use App\Facility;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class FacilityExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('extract.facility', [
            "facility" => Facility::all()
        ]);
    }
}
