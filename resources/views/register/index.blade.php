@extends('navbar.main')

@section('container')
<main class="form-signin">
    <form action="{{ url('/register') }}" method="post">
        @csrf
      <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
      <h1 class="h3 mb-3 fw-normal">Please Register Here</h1>
        
      <div class="form-floating">
        <input required type="text" name="username" class="form-control @error('name') is-invalid @enderror " id="name" placeholder="Username" value="{{ old('username') }}">
        <label for="floatingInput">Username</label>
        @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-floating">
        <input required type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" value="{{ old('email') }}">
        <label for="floatingInput">Email address</label>
        @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      
      <div class="form-floating">
        <input required type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password">
        <label for="floatingPassword">Password</label>
        @error('password')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
  
      <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
    </form>
  </main>
@endsection