@extends('navbar.maindashboard')

@section('container')

<div class="container marketing col-lg-5" style="margin-bottom: 20px">
  <h1 class="mt-3 mb-3">Membuat Reservasi Baru</h1>
<hr class="featurette-divider">

  @if (session()->has('fail'))
  <div class="alert alert-danger" role="alert">
    {{ session('fail') }}
  </div>
  @endif

<form method="post" action="{{ url('/reservation/create') }}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Nama Pemesan:</label>
      @error('name')
            <p class="text-danger">{{ $message }}</p>
        @enderror
      <input type="text" class="form-control" id="name" name="name" autofocus value="{{ old('name') }}">
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">Email Pemesan:</label>
      @error('email')
            <p class="text-danger">{{ $message }}</p>
        @enderror
      <input type="email" class="form-control" id="email" name="email" autofocus value="{{ old('email') }}">
    </div>

    <div class="mb-3">
      <label for="phone" class="form-label">No Telp Pemesan:</label>
      @error('phone')
            <p class="text-danger">{{ $message }}</p>
        @enderror
      <input type="tel" class="form-control" id="phone" name="phone" autofocus value="{{ old('phone') }}">
    </div>

    <div class="mb-3">
      <label for="message" class="form-label">Pesan Tambahan (Contoh: Jumlah orang):</label>
      @error('description')
            <p class="text-danger">{{ $message }}</p>
        @enderror
      <input type="text" class="form-control" id="description" name="description" autofocus value="{{ old('description') }}">
    </div>

    <div class="mb-3">
      <label for="start_date" class="form-label">Tanggal Mulai Pemesanan:</label>
      @error('price')
            <p class="text-danger">{{ $message }}</p>
        @enderror
      <input type="text" class="form-control picker" id="start_date" name="start_date">
    </div>

    <div class="mb-3">
      <label for="end_date" class="form-label">Tanggal Akhir Pemesanan:</label>
      @error('price')
            <p class="text-danger">{{ $message }}</p>
        @enderror
      <input type="text" class="form-control picker" id="end_date" name="end_date">
    </div>

    <div class="mb-3">
      <label for="facility" class="form-label">Fasilitas:</label>
      <select class="custom-select" name="facility_id">
        @foreach ($facility as $item)
          <option value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach  
      </select>
    </div>

    <div class="mb-3">
      <label for="category" class="form-label">Kategori:</label>
      <select class="custom-select" name="category_id">
        @foreach ($category as $item)
          <option value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach  
      </select>
    </div>
   
    <button type="submit" class="btn btn-primary">Buat Reservasi</button>
  </form>
</div>
@endsection