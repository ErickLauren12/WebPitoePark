<?php

namespace App\Exports;

use App\News;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class NewsExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('extract.news', [
            "post" => News::all()
        ]);
        
        //return News::all();
    }
}
