@extends('navbar.maindashboard')

@section('container')
<div class="container marketing">
    @if (session()->has('success'))
  <div class="alert alert-success p-3 mb-2 bg-success text-white" role="alert">
    {{ session('success') }}
  </div>
  @elseif(session()->has('fail'))
  <div class="alert p-3 mb-2 bg-danger text-white" role="alert">
    {{ session('fail') }}
  </div>
  @endif
<form method="POST" action="{{ url('/employee/editStore') }}">
    @csrf
    <h1 style="margin-bottom: 40px">Ganti Password</h1>
    <div class="form-group" style="margin-bottom: 40px">
        <p>Selamat Datang, {{ auth()->user()->username }} <br>
        Silahkan Masukan Password Baru Anda:</p>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="hidden" name="id" value="{{ auth()->user()->id }}">
      <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
    <button type="submit" class="btn btn-primary">Ubah</button>
  </form>
</div>
@endsection