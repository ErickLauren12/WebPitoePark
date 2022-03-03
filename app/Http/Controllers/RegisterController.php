<?php

namespace App\Http\Controllers;

use App\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('register.index',[
            'title'=>'register'
        ]);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'username' => ['required','max:255'],
            'email' => ['required', 'email:dns' ,'min:3','max:255'],
            'password' => ['required', 'min:4','max:255']
        ]);
        
        $validatedData['password'] = Hash::make($validatedData['password']);

        Account::create($validatedData);
        $request->session()->flash('success','Registration successfull! please login');
        return redirect('/login');
    }
}
