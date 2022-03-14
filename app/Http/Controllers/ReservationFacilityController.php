<?php

namespace App\Http\Controllers;

use App\ReservationFacility;
use Illuminate\Http\Request;

class ReservationFacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('reservation_facility.index',[
            'title'=>'Reservation',
            'facility' => ReservationFacility::all()
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
        $validatedData = $request->validate([
            'name' => ['required'],
        ]);
        
        ReservationFacility::create($validatedData);
        $request->session()->flash('success','reservation successfull added!');
        return redirect('/facility_reservation');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ReservationFacility  $reservationFacility
     * @return \Illuminate\Http\Response
     */
    public function show(ReservationFacility $reservationFacility)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ReservationFacility  $reservationFacility
     * @return \Illuminate\Http\Response
     */
    public function edit(ReservationFacility $reservationFacility)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ReservationFacility  $reservationFacility
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReservationFacility $reservationFacility)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ReservationFacility  $reservationFacility
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReservationFacility $reservationFacility)
    {
        ReservationFacility::destroy($reservationFacility->id);
        return redirect('/facility_reservation')->with('success','Reservation has been deleted!');
    }
}
