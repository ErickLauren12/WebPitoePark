@extends('navbar.main')

@section('container')
<h1 class="mt-3 mb-3">Create Reservation</h1>
<hr class="featurette-divider">
<div class="container marketing col-lg-5">

  @if (session()->has('fail'))
  <div class="alert alert-danger" role="alert">
    {{ session('fail') }}
  </div>
  @endif

<form method="post" action="/reservation/create" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      @error('name')
            <p class="text-danger">{{ $message }}</p>
        @enderror
      <input type="text" class="form-control" id="name" name="name" autofocus value="{{ old('name') }}">
    </div>

    <div class="mb-3">
      <label for="start_date" class="form-label">Start Date</label>
      @error('price')
            <p class="text-danger">{{ $message }}</p>
        @enderror
      <input type="text" class="form-control picker" id="start_date" name="start_date">
    </div>

    <div class="mb-3">
      <label for="end_date" class="form-label">End Date</label>
      @error('price')
            <p class="text-danger">{{ $message }}</p>
        @enderror
      <input type="text" class="form-control picker" id="end_date" name="end_date">
    </div>

    <div class="mb-3">
      <label for="facility" class="form-label">Facility</label>
      <select class="custom-select" name="facility_id">
        @foreach ($facility as $item)
          <option value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach  
      </select>
    </div>
   
    <button type="submit" class="btn btn-primary">Create Reservation</button>
  </form>
</div>
@endsection