@extends('navbar.main')

@section('container')
<h1 class="mt-3 mb-3">Edit Menu</h1>
<hr class="featurette-divider">
<div class="container marketing col-lg-5">

<form method="post" action="/cafe/edit/{{ $cafe->id }}" enctype="multipart/form-data">
  @method('put')
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      @error('name')
            <p class="text-danger">{{ $message }}</p>
        @enderror
      <input type="text" class="form-control" id="name" name="name" autofocus value="{{ old('name', $cafe->name) }}">
    </div>

    <div class="mb-3">
      <label for="image" class="form-label">Upload Image</label>

      @if ($cafe->image)
        <img src="{{ asset('storage/' . $cafe->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block" alt="">
      @else
        <img class="img-preview img-fluid mb-3 col-sm-5 d-block" alt="">
      @endif
      <input class="form-control" @error('image') is-invalid @enderror type="file" id="image" name="image" onchange="previewImage()">
      @error('image')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-3">
      <label for="title" class="form-label">Price</label>
      @error('price')
            <p class="text-danger">{{ $message }}</p>
        @enderror
      <input type="number" class="form-control" id="price" name="price" autofocus value="{{ old('price',$cafe->price) }}">
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
   
    <button type="submit" class="btn btn-primary">Edit Menu</button>
  </form>
</div>
@endsection