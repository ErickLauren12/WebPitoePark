<?php

namespace App\Http\Controllers;

use App\Cafe;
use App\CategoryFood;
use App\LogCafe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CafeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('cafe.index', [
            'title' => 'Cafe',
            'search' => "all",
            "result" => Cafe::latest()->filter(request(['search', 'category_id']))->paginate(6),
            "category" => CategoryFood::all()
        ]);
    }

    public function indexDashBoard()
    {
        return view('cafe.cafedashboard', [
            'title' => 'Cafe',
            "result" => Cafe::latest()->where('account_id', auth()->user()->id)->paginate(6),
        ]);
    }

    public function indexDashBoardAdmin()
    {
        return view('cafe.cafedashboardadmin', [
            'title' => 'Cafe',
            "result" => Cafe::latest()->paginate(6),
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cafe.create', [
            'title' => 'Create',
            'category' => CategoryFood::all()
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
            'image' => ['image', 'file'],
            'price' => ['required'],
            'category_id' => ['required']
        ]);

        if ($request->file('image')) {
            $credentials['image'] = $request->file('image')->store('cafe-image');
        }

        $credentials['account_id'] = auth()->user()->id;
        $result = Cafe::create($credentials);

        $log = new LogCafe();
        $log->action = "Membuat";
        $log->id_cafe= $result->id;
        $log->id_account = auth()->user()->id;
        $log->save();

        return redirect('/cafe/dashboard')->with('success', 'New Menu Has Been Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cafe  $cafe
     * @return \Illuminate\Http\Response
     */
    public function show(Cafe $cafe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cafe  $cafe
     * @return \Illuminate\Http\Response
     */
    public function edit(Cafe $cafe)
    {
        return view('cafe.edit', [
            'title' => 'Edit',
            "cafe" => $cafe,
            "category" => CategoryFood::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cafe  $cafe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cafe $cafe)
    {
        $credentials = $request->validate([
            'name' => ['required', 'max:255'],
            'image' => ['image', 'file'],
            'price' => ['required'],
            'category_id' => ['required']
        ]);

        $credentials['account_id'] = auth()->user()->id;

        if ($request->file('image')) {
            if ($cafe['image']) {
                Storage::delete($cafe['image']);
            }
            $credentials['image'] = $request->file('image')->store('cafe-image');
        }

        Cafe::where('id', $cafe['id'])->update($credentials);

        $log = new LogCafe();
        $log->action = "Mengubah";
        $log->id_cafe = $cafe['id'];
        $log->id_account = auth()->user()->id;
        $log->save();

        return redirect('/cafe/dashboard')->with('success', 'The event has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cafe  $cafe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cafe $cafe)
    {
        if ($cafe['image']) {
            Storage::delete($cafe['image']);
        }
        Cafe::destroy($cafe->id);

        $log = new LogCafe();
        $log->action = "Menghapus";
        $log->id_cafe = $cafe['id'];
        $log->id_account = auth()->user()->id;
        $log->save();

        return redirect('/cafe/dashboard')->with('success', 'Menu berhasil di hapus');
    }

    public function confirmation(Cafe $cafe)
    {
        $cafe->status = "Accepted";
        $cafe->message = "";
        $cafe->save();
        return redirect()->back()->with('success', 'Verifikasi Menu Berhasil. Menut telah ditampilkan di halaman Cafe');
    }

    public function reject(Request $request, Cafe $cafe)
    {
        $cafe->status = "Rejected";
        $cafe->message = $request['message'];
        $cafe->save();
        return redirect()->back()->with('success', 'Menu Berhasil Ditolak');
    }

    public function search(Request $request)
    {
        if ($request['type'] == "superadmin") {
            return view('cafe.cafedashboardadmin', [
                'title' => 'Cafe',
                "result" => Cafe::latest()->where("name", "like", "%" . $request['search'] . "%")->paginate(6)->withQueryString()
            ]);
        } else {
            return view('cafe.cafedashboard', [
                'title' => 'Cafe',
                'result' => Cafe::where('account_id', auth()->user()->id)->where("name", "like", "%" . $request['search'] . "%")->paginate(6)->withQueryString()
            ]);
        }
    }
}
