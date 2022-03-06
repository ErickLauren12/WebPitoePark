@extends('navbar.main')

@section('container')
<h1 class="mt-3 mb-3">Edit Facility</h1>
<hr class="featurette-divider">
<div class="container marketing col-lg-5">

<form method="post" action="/facility/edit/{{ $facility->id }}" enctype="multipart/form-data">
    @method('put')
    @csrf
    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      @error('title')
            <p class="text-danger">{{ $message }}</p>
        @enderror
      <input type="text" class="form-control" id="title" name="title" autofocus value="{{ old('title', $facility->title) }}">
    </div>

    <div class="mb-3">
      <label for="image" class="form-label">Upload Image</label>
      @if ($facility->image)
        <img src="{{ asset('storage/' . $facility->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block" alt="">
      @else
        <img class="img-preview img-fluid mb-3 col-sm-5 d-block" alt="">
      @endif          
      <input class="form-control" @error('image') is-invalid @enderror type="file" id="image" name="image" onchange="previewImage()">
      @error('image')
            <p class="text-danger">{{ $message }}</p>
      @enderror
    </div>

    <div class="mb-3">
        <label for="title" class="form-label">Body</label>
        @error('body')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        <input id="body" type="hidden" name="body" value="{{ old('body', $facility->body) }}">
        <trix-editor input="body"></trix-editor>
    </div>
   
    <button type="submit" class="btn btn-primary">Update Event</button>
  </form>
</div>
@endsection