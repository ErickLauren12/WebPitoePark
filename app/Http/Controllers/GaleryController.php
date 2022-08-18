<?php

namespace App\Http\Controllers;

use App\Galery;
use App\LogGalerie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GaleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('galery.index', [
            'title' => 'Galery',
            "result" => Galery::latest()->where('status', '=', 'Accepted')->paginate(6)
        ]);
    }

    public function dashboard()
    {
        return view('galery.dashboard', [
            'title' => 'Galery',
            "result" => Galery::latest()->paginate(6)
        ]);
    }

    public function dashboardPegawai()
    {
        return view('galery.dashboardpegawai', [
            'title' => 'Galery',
            "result" => Galery::where('account_id', auth()->user()->id)->latest()->paginate(6)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $credentials['account_id'] = auth()->user()->id;
        //$fileFormat = $request->file('image')->getClientOriginalExtension();
        
        if($request->filled('video')) {
            $credentials['image'] = $request['video'];
            $credentials['format'] = "Video";
        }else{
            if ($request->file('image')) {
                $file = $request->file('image');
                $imgFolder = 'images/Galery';
                $imgFile = time() . "_" . $file->getClientOriginalName();
                $file->move($imgFolder, $imgFile);
                $credentials['image'] = 'images/Galery/'.$imgFile;
                //$credentials['image'] = $request->file('image')->store('galery');
            }
            $credentials['format'] = "Gambar";
        }
        
        /*
        if ($fileFormat == "mp4" || $fileFormat == "flv" || $fileFormat == "m3u8" || $fileFormat == "ts" || $fileFormat == "3gp" || $fileFormat == "mov" || $fileFormat == "avi" || $fileFormat == "wmv") {
            $credentials['format'] = "Video";
        } else {
            $credentials['format'] = "Gambar";
        }*/

        $result = Galery::create($credentials);

        $log = new LogGalerie();
        $log->action = "Membuat";
        $log->id_galery = $result->id;
        $log->id_account = auth()->user()->id;
        $log->save();

        return redirect()->back()->with('success', 'Gambar/ video Berhasil di Upload, Gambar/ video  akan diproses verifikasi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Galery  $galery
     * @return \Illuminate\Http\Response
     */
    public function show(Galery $galery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Galery  $galery
     * @return \Illuminate\Http\Response
     */
    public function edit(Galery $galery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Galery  $galery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Galery $galery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Galery  $galery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Galery $galery)
    {
        try {

            $data = Galery::find($galery->id);
            $data->delete();

            $log = new LogGalerie();
            $log->action = "Menghapus";
            $log->id_galery = $galery->id;
            $log->id_account = auth()->user()->id;
            $log->save();

            return redirect()->back()->with('success', 'Berhasil menghapus Gambar/ video');
        } catch (\Throwable $th) {
            return redirect()->back()->with('fail', 'Gagal menghapus Gambar/ video');
        }
    }

    public function deletedashboard(Galery $galery)
    {
        try {

            $data = Galery::find($galery->id);
            $data->delete();

            return redirect('/galery/dashboard');
        } catch (\Throwable $th) {
            return redirect()->back()->with('fail', 'Gagal menghapus Gambar/ video');
        }
    }

    public function confirmation(Galery $galery)
    {
        $galery->status = "Accepted";
        $galery->save();
        return redirect()->back()->with('success', 'Verifikasi Gambar/ video  Berhasil. Gambar/ video  telah ditampilkan di halaman Galeri');
    }
}
