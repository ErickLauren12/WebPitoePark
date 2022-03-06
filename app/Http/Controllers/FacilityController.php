<?php

namespace App\Http\Controllers;

use App\Facility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('facility.index',[
            'title'=>'Facility',
            "facility" => Facility::latest()->paginate(6)
        ]);
    }

    public function list()
    {
        return view('facility.list',[
            'title'=>'Facility',
            "facility" => Facility::all()
        ]);
    }

    public function detail($id){
        return view('facility.detail',[
            'title'=>'Facility',
           "detail"=>Facility::find($id) 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('facility.create',[
            'title'=>'Add new Facility',
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
            'title' => ['required', 'max:255'],
            'image' => ['image','file'],
            'body'=>['required']
        ]);

        if($request->file('image')){
            $credentials['image'] = $request->file('image')->store('facility-image');
        }

        $credentials['account_id'] = auth()->user()->id;
        $credentials['body'] = strip_tags($credentials['body']);

        Facility::create($credentials);
        return redirect('/facility/list')->with('success','New event has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function show(Facility $facility)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function edit(Facility $facility)
    {
        return view('facility.edit',[
            'title'=>'Edit',
            "facility" => $facility   
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Facility $facility)
    {
        $credentials = $request->validate([
            'title' => ['required', 'max:255'],
            'image' => ['image','file'],
            'body'=>['required']
        ]);

        $credentials['account_id'] = auth()->user()->id;
        $credentials['body'] = strip_tags($credentials['body']);
        
        if($request->file('image')){
            if($facility['image']){
                Storage::delete($facility['image']);
            }
            $credentials['image'] = $request->file('image')->store('facility-image');
        }

        Facility::where('id', $facility['id'])->update($credentials);
        return redirect('/facility/list')->with('success','The event has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function destroy(Facility $facility)
    {
        if($facility['image']){
            Storage::delete($facility['image']);
        }

        Facility::destroy($facility->id);
        return redirect('/eventlist')->with('success','Facility has been deleted!');
    }
}
