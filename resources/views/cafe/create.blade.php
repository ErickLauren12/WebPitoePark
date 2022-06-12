@extends('navbar.main')

@section('container')

<div style="margin-top: 130px" class="container marketing col-lg-5">
  <h1 class="mt-3 mb-3">Membuat Menu Baru</h1>
  <hr class="featurette-divider">

<form method="post" action="/cafe/create" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Nama:</label>
      @error('name')
            <p class="text-danger">{{ $message }}</p>
        @enderror
      <input type="text" class="form-control" id="name" name="name" autofocus value="{{ old('name') }}">
    </div>

    <div class="mb-3">
      <label for="image" class="form-label">Upload Gambar</label>

      <img class="img-preview img-fluid mb-3 col-sm-5" alt="">
      @error('image')
            <p class="text-danger">{{ $message }}</p>
      @enderror
      <input class="form-control" @error('image') is-invalid @enderror type="file" id="image" name="image" onchange="previewImage()">
    </div>

    <div class="mb-3">
      <label for="title" class="form-label">Harga</label>
      @error('price')
            <p class="text-danger">{{ $message }}</p>
        @enderror
      <input type="number" class="form-control" id="price" name="price" autofocus value="{{ old('price') }}">
    </div>

    <div class="mb-3">
      <label for="categoryFood" class="form-label">Kategori Makanan <span style="font-weight: bold">(Jika Kosong Buat Kategori Makanan Terlebih Dahulu)</span> </label>
      <select class="custom-select" name="category_id">
        @foreach ($category as $item)
          <option value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach  
      </select>
    </div>
   
    <button type="submit" class="btn btn-primary">Create Menu</button>
  </form>
</div>
@endsection