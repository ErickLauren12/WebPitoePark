<?php

namespace App\Http\Controllers;

use App\CategoryReservation;
use Illuminate\Http\Request;

class CategoryReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('reservation.category',[
            'title'=>'Reservation',
            'category' => CategoryReservation::latest()->paginate(10)->withQueryString()
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
        try {
            $validatedData = $request->validate([
                'name' => ['required'],
            ]);
            
            CategoryReservation::create($validatedData);
            return redirect('/reservation/category')->with('success','Kategori Berhasil Ditambahkan');
        } catch (\Throwable $th) {
            return redirect('/reservation/category')->with('success','Kategori Gagal Ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CategoryReservation  $categoryReservation
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryReservation $categoryReservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CategoryReservation  $categoryReservation
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryReservation $categoryReservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CategoryReservation  $categoryReservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoryReservation $categoryReservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CategoryReservation  $categoryReservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryReservation $categoryReservation)
    {
        //
    }
}
