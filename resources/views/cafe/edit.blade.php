@extends('navbar.maindashboard')

@section('container')
<h1 class="mt-3 mb-3">Edit Menu</h1>
<hr class="featurette-divider">
<div class="container marketing col-lg-5">

<form method="post" action="{{ url('/cafe/edit/'.$cafe->id) }}" enctype="multipart/form-data">
  @method('put')
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control" id="name" name="name" autofocus value="{{ old('name', $cafe->name) }}">
      @error('name')
      <p class="text-danger">{{ $message }}</p>
  @enderror
    </div>

    <div class="mb-3">
      <label for="image" class="form-label">Upload Image</label>

      @if ($cafe->image)
        <img src="{{ asset('storage/' . $cafe->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block" alt="">
      @else
        <img class="img-preview img-fluid mb-3 col-sm-5 d-block" alt="">
      @endif
      <input class="form-control" @error('image') is-invalid @enderror type="file" id="image" name="image" onchange="previewImage()">
    </div>

    <div class="mb-3">
      <label for="title" class="form-label">Price</label>

      <input type="number" class="form-control" id="price" name="price" autofocus value="{{ old('price',$cafe->price) }}">
      @error('price')
      <p class="text-danger">{{ $message }}</p>
  @enderror
    </div>

    <div class="mb-3">
      <label for="categoryFood" class="form-label">Food Category</label>
      <select class="custom-select" name="category_id">
        @foreach ($category as $item)
          @if (old('category_id', $cafe->category_id)==$item->id)
            <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
          @else
            <option value="{{ $item->id }}">{{ $item->name }}</option>
          @endif
        @endforeach
      </select>
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Ketersediaan Menu</label>
        <select class="custom-select" name="action" id="action">
            <option value="true">Tersedia</option>
            <option value="false">Tidak Tersedia</option>
        </select>

    </div>

    <button type="submit" class="btn btn-primary">Edit Menu</button>
  </form>
</div>
@endsection
