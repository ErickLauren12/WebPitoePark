<?php

namespace App\Http\Controllers;

use App\CategoryReservation;
use App\Reservation;
use App\Reservation as AppReservation;
use App\ReservationFacility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ReservasiExport;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('reservation.index', [
            'title' => 'Reservation',
            'reservation_facility' => ReservationFacility::all(),
            'reservation' => Reservation::orderBy('start_date', 'DESC')->filter(request(['name', 'startDate', 'endDate', 'facility_id']))->paginate(10)->withQueryString()
        ]);
    }

    public function extractData(Request $request){
        if($request['number'] === "1"){
            return Excel::download(new ReservasiExport,"DataReservation.xlsx");
        }else if($request['number'] === "2"){
            return Excel::download(new ReservasiExport,"DataReservationt.csv");
        }else{
            //return Excel::download(new NewsExport,"DataEvent.pdf");

            $data = Reservation::all();
            view()->share("reservation",$data);
            $pdf = \PDF::loadView('extract.reservasi');
            return $pdf->download("DataReservation.pdf");
        }
        
    }

    public function exportData()
    {
        return view('extract.reservasi', [
            "reservation" => Reservation::all()
        ]);
        
        //return News::all();
    }

    public function statistics()
    {
        $tahunSekarang = Carbon::now()->year;

        $result[] = ['Bulan'];
        $result2[] = ['Bulan'];

        $fasilitas = ReservationFacility::all();
        foreach ($fasilitas as $key => $value) {
            $result[0][] = $value['name'];
        }

        $category = CategoryReservation::all();
        foreach ($category as $key => $value) {
            $result2[0][] = $value['name'];
        }

        $bulan = Reservation::select(DB::raw('month(reservations.start_date) as bulan'), DB::raw('reservations.start_date as date'))->where(DB::raw('year(reservations.start_date)'), '=', $tahunSekarang)->groupBy(DB::raw('month(reservations.start_date)'))->get();
        $index = 1;
        $index2 = 1;
        //Untuk Fasilitas
        foreach ($bulan as $b) {
            $result[$index][] = \Carbon\Carbon::parse($b['date'])->format('F');
            foreach ($fasilitas as $f) {
                $data =  Reservation::select(DB::raw('count(reservations.name) as jumlah'), DB::raw('f.name'))->join('reservation_facilities as f', 'reservations.facility_id', '=', 'f.id')->where(DB::raw('year(reservations.start_date)'), '=', $tahunSekarang)->where('facility_id', '=', $f['id'])->where(DB::raw('month(reservations.start_date)'), '=', $b['bulan'])->groupBy(DB::raw('month(reservations.start_date)'), 'f.name')->orderBy('reservations.start_date', 'ASC')->get();
                if (count($data) > 0) {
                    foreach ($data as $key => $d) {
                        $result[$index][] = $d['jumlah'];
                    }
                } else {
                    $result[$index][] = 0;
                }
            }
            $index++;
        }

        //Untuk Kategori
        foreach ($bulan as $b) {
            $result2[$index2][] = \Carbon\Carbon::parse($b['date'])->format('F');
            foreach ($category as $f) {
                $data2 =  Reservation::select(DB::raw('count(reservations.name) as jumlah'), DB::raw('c.name'))->join('category_reservations as c', 'reservations.category_id', '=', 'c.id')->where(DB::raw('year(reservations.start_date)'), '=', $tahunSekarang)->where('category_id', '=', $f['id'])->where(DB::raw('month(reservations.start_date)'), '=', $b['bulan'])->groupBy(DB::raw('month(reservations.start_date)'), 'c.name')->orderBy('reservations.start_date', 'ASC')->get();
                if (count($data2) > 0) {
                    foreach ($data2 as $key => $d) {
                        $result2[$index2][] = $d['jumlah'];
                    }
                } else {
                    $result2[$index2][] = 0;
                }
            }
            $index2++;
        }

        $tahun = Reservation::select(DB::raw('year(reservations.start_date) as tahun'))->groupBy(DB::raw('year(reservations.start_date)'))->get();
        $tahunDisplay = $tahunSekarang;

        return view('reservation.statistics', compact('tahun', 'tahunDisplay'))->with('hasil2',json_encode($result2))->with('hasil',json_encode($result));
    }

    public function search(Request $request)
    {

        $tahunSekarang = $request['tahun'];

        $result[] = ['Bulan'];
        $result2[] = ['Bulan'];

        $fasilitas = ReservationFacility::all();
        foreach ($fasilitas as $key => $value) {
            $result[0][] = $value['name'];
        }

        $category = CategoryReservation::all();
        foreach ($category as $key => $value) {
            $result2[0][] = $value['name'];
        }

        $bulan = Reservation::select(DB::raw('month(reservations.start_date) as bulan'), DB::raw('reservations.start_date as date'))->where(DB::raw('year(reservations.start_date)'), '=', $tahunSekarang)->groupBy(DB::raw('month(reservations.start_date)'))->get();
        $index = 1;
        $index2 = 1;
        //Untuk Fasilitas
        foreach ($bulan as $b) {
            $result[$index][] = \Carbon\Carbon::parse($b['date'])->format('F');
            foreach ($fasilitas as $f) {
                $data =  Reservation::select(DB::raw('count(reservations.name) as jumlah'), DB::raw('f.name'))->join('reservation_facilities as f', 'reservations.facility_id', '=', 'f.id')->where(DB::raw('year(reservations.start_date)'), '=', $tahunSekarang)->where('facility_id', '=', $f['id'])->where(DB::raw('month(reservations.start_date)'), '=', $b['bulan'])->groupBy(DB::raw('month(reservations.start_date)'), 'f.name')->orderBy('reservations.start_date', 'ASC')->get();
                if (count($data) > 0) {
                    foreach ($data as $key => $d) {
                        $result[$index][] = $d['jumlah'];
                    }
                } else {
                    $result[$index][] = 0;
                }
            }
            $index++;
        }

        //Untuk Kategori
        foreach ($bulan as $b) {
            $result2[$index2][] = \Carbon\Carbon::parse($b['date'])->format('F');
            foreach ($category as $f) {
                $data2 =  Reservation::select(DB::raw('count(reservations.name) as jumlah'), DB::raw('c.name'))->join('category_reservations as c', 'reservations.category_id', '=', 'c.id')->where(DB::raw('year(reservations.start_date)'), '=', $tahunSekarang)->where('category_id', '=', $f['id'])->where(DB::raw('month(reservations.start_date)'), '=', $b['bulan'])->groupBy(DB::raw('month(reservations.start_date)'), 'c.name')->orderBy('reservations.start_date', 'ASC')->get();
                if (count($data2) > 0) {
                    foreach ($data2 as $key => $d) {
                        $result2[$index2][] = $d['jumlah'];
                    }
                } else {
                    $result2[$index2][] = 0;
                }
            }
            $index2++;
        }

        $tahun = Reservation::select(DB::raw('year(reservations.start_date) as tahun'))->groupBy(DB::raw('year(reservations.start_date)'))->get();
        $tahunDisplay = $tahunSekarang;

        return view('reservation.statistics', compact('tahun', 'tahunDisplay'))->with('hasil2',json_encode($result2))->with('hasil',json_encode($result));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reservation.create', [
            'title' => 'Create Reservation',
            'facility' => ReservationFacility::all(),
            'category' => CategoryReservation::all()
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
            'email' => ['required', 'max:255'],
            'phone' => ['required', 'max:10'],
            'description' => ['max:1000'],
            'start_date' => ['required'],
            'end_date' => ['required'],
            'facility_id' => ['required'],
            'category_id' => ['required'],
        ]);
        
        if(Reservation::where('start_date','<=',$credentials['start_date'])->where('end_date','>=',$credentials['start_date'])->where('facility_id','=',$credentials['facility_id'])->count() == 0){
            AppReservation::create($credentials);
            return redirect('/reservation')->with('success','New Reservation Has Been Added');
        }else{
            return redirect('/reservation/create')->with('fail','The Reservation has allready added');
        }
        /*
        AppReservation::create($credentials);
        return redirect('/reservation')->with('success', 'Reservasi baru ditambahkan');*/
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
        $data = Reservation::find($reservation->id);
        $data->delete();

        return redirect('/reservation')->with('success', 'Reservasi Berhasil dihapus');
    }
}
