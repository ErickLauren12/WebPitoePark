<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function listData(){
        return view('event.index',[
            'title'=>'Event',
            "events" => News::latest()->paginate(8)
        ]);
    }

    public function createindex(){
        return view('event.create',[
            'title'=>'Create'
        ]);
    }

    public function post(Request $request){
        
        $credentials = $request->validate([
            'title' => ['required', 'max:255'],
            'image' => ['image','file'],
            'body'=>['required']
        ]);

        if($request->file('image')){
            $credentials['image'] = $request->file('image')->store('news-image');
        }

        $credentials['account_id'] = auth()->user()->id;
        $credentials['excerpt'] = Str::limit(strip_tags($request['body']), 100, "...");
        $credentials['body'] = strip_tags($credentials['body']);

        News::create($credentials);
        return redirect('/eventlist')->with('success','New event has been added!');
    }

    public function show($id)
    {
        return view('event.detail',[
            'title'=>'Galery',
           "detail"=>News::find($id) 
        ]);
    }

    public function showData()
    {
        return view('event.postlist',[
            'title'=>'Events',
            'post' => News::where('account_id',auth()->user()->id)->get()
        ]);
    }

    public function destroy(News $news)
    {
        if($news['image']){
            Storage::delete($news['image']);
        }

        News::destroy($news->id);
        return redirect('/eventlist')->with('success','Event has been deleted!');
    }

    public function edit(News $news){
        return view('event.edit',[
            'title'=>'Edit',
            "events" => $news
        ]);
    }

    public function update(Request $request, News $news){
        $credentials = $request->validate([
            'title' => ['required', 'max:255'],
            'image' => ['image','file'],
            'body'=>['required']
        ]);

        $credentials['account_id'] = auth()->user()->id;
        $credentials['body'] = strip_tags($credentials['body']);
        $credentials['excerpt'] = Str::limit(strip_tags($request['body']), 100, "...");

        if($request->file('image')){
            if($news['image']){
                Storage::delete($news['image']);
            }
            $credentials['image'] = $request->file('image')->store('news-image');
        }

        News::where('id', $news['id'])->update($credentials);
        return redirect('/eventlist')->with('success','The event has been updated!');
    }
}
