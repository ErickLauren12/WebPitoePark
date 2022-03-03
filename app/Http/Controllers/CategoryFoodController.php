<?php

namespace App\Http\Controllers;

use App\CategoryFood;
use Illuminate\Http\Request;

class CategoryFoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('category.index',[
            'title'=>'Category',
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
        
        CategoryFood::create($validatedData);
        $request->session()->flash('success','Category successfull added!');
        return redirect('/category');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CategoryFood  $categoryFood
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryFood $categoryFood)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CategoryFood  $categoryFood
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryFood $categoryFood)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CategoryFood  $categoryFood
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoryFood $categoryFood)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CategoryFood  $categoryFood
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryFood $categoryFood)
    {
        CategoryFood::destroy($categoryFood->id);
        return redirect('/category')->with('success','Category has been deleted!');
    }
}
