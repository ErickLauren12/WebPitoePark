<?php

namespace App\Http\Controllers;

use App\Cafe;
use App\CategoryFood;
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
        return view('cafe.index',[
            'title'=>'Cafe',
            'search'=>"all",
            "result" => Cafe::latest()->filter(request(['search','category_id']))->paginate(6),
            "category" => CategoryFood::all()
        ]);
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cafe.create',[
            'title'=>'Create',
            'category'=>CategoryFood::all()
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
            'image' => ['image','file'],
            'price'=>['required'],
            'category_id'=>['required']
        ]);

        if($request->file('image')){
            $credentials['image'] = $request->file('image')->store('cafe-image');
        }

        $credentials['account_id'] = auth()->user()->id;
        Cafe::create($credentials);
        return redirect('/cafe')->with('success','New Menu Has Been Added');
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
        return view('cafe.edit',[
            'title'=>'Edit',
            "cafe" => $cafe,
            "category"=>CategoryFood::all()
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
            'image' => ['image','file'],
            'price'=>['required'],
            'category_id'=>['required']
        ]);

        $credentials['account_id'] = auth()->user()->id;
        
        if($request->file('image')){
            if($cafe['image']){
                Storage::delete($cafe['image']);
            }
            $credentials['image'] = $request->file('image')->store('cafe-image');
        }

        Cafe::where('id', $cafe['id'])->update($credentials);
        return redirect('/cafe')->with('success','The event has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cafe  $cafe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cafe $cafe)
    {
        if($cafe['image']){
            Storage::delete($cafe['image']);
        }
        Cafe::destroy($cafe->id);
        return redirect('/cafe')->with('success','Menu has been deleted!');
    }
}
