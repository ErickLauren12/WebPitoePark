<?php

namespace App\Http\Controllers;

use App\reservation;
use App\Reservation as AppReservation;
use App\ReservationFacility;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('reservation.index',[
            'title'=>'Reservation',
            'reservation_facility'=>ReservationFacility::all(),
            'reservation' => Reservation::orderBy('start_date','DESC')->filter(request(['name','startDate','endDate','facility_id']))->paginate(10)
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reservation.create',[
            'title'=>'Create Reservation',
            'facility'=>ReservationFacility::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required', 'max:255'],
            'start_date'=>['required'],
            'end_date'=>['required'],
            'facility_id'=>['required']
        ]);

        if(Reservation::where('start_date','<=',$credentials['start_date'])->where('end_date','>=',$credentials['start_date'])->where('facility_id','=',$credentials['facility_id'])->count() == 0){
            AppReservation::create($credentials);
            return redirect('/reservation')->with('success','New Reservation Has Been Added');
        }else{
            return redirect('/reservation/create')->with('fail','The Reservation has allready added');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(reservation $reservation)
    {
        //
    }
}
