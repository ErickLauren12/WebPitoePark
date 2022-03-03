<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function listData(){
        return view('event.index',[
            'title'=>'Event',
            "events" => Event::all()
        ]);
    }

    public function createindex(){
        return view('event.create');
    }

    public function post(Request $request){
        $credentials = $request->validate([
            'title' => ['required', 'max:255'],
            'body'=>['required']
        ]);

        $credentials['account_id'] = auth()->user()->id;
        
        //return dd($credentials);
        
        Event::create($credentials);
        return redirect('/eventlist')->with('success','New event has been added!');
    }

    public function show($id)
    {
        return view('event.detail',[
           "detail"=>Event::find($id) 
        ]);
    }

    public function showData()
    {
        return view('event.postlist',[
            'post' => Event::where('account_id',auth()->user()->id)->get()
        ]);
    }

    public function destroy(Event $event)
    {
        Event::destroy($event->id);
        return redirect('/eventlist')->with('success','Event has been deleted!');
    }
}
