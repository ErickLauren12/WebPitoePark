<?php

namespace App\Http\Controllers;

use App\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('employee.index', [
            'title' => 'Employee',
            "accounts" => Account::where('is_admin', '1')->latest()->paginate(8)
        ]);
    }

    public function indexEmployee()
    {
        return view('employee.edit', [
            'title' => 'Employee',
        ]);
    }

    public function indexDashboard()
    {
        return view('navbar.maindashboard', [
            'title' => 'Employee',
        ]);
    }

    public function updatePassword(Request $request)
    {
        $id = $request->get('id');
        $account = Account::find($id);
        $account->password = Hash::make($request->get('password'));
        $account->save();
        return redirect()->back()->with('success', 'Password Berhasil Tersimpan');
    }

    public function search(Request $request)
    {
        return view('employee.index', [
            'title' => 'Employee',
            "accounts" => Account::latest()->where("name", "like", "%" . $request['search'] . "%")->where('is_admin', '1')->paginate(8)
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
        try {
            $validatedData = $request->validate([
                'username' => ['required', 'max:255'],
                'phone' => ['required', 'min:3', 'max:255'],
                'password' => ['required', 'min:4', 'max:255'],
                'name' => ['required', 'min:4', 'max:255'],
                'address' => ['required', 'min:4', 'max:255'],
            ]);
            $validatedData['password'] = Hash::make($validatedData['password']);

            Account::create($validatedData);
            $request->session()->flash('success', 'Registration successfull!');
            return redirect('/employee');
        } catch (\Throwable $e) {
            return redirect('/employee')->with('fail', 'Registration Failed!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        $account = Account::find($account->id);
        $account['password'] = "hapus";
        $account->delete();
        return redirect('/employee')->with('success', 'Account has been deleted!');
    }
}
