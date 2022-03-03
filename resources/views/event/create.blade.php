@extends('navbar.main')

@section('container')
<h1 class="mt-3 mb-3">Create New Event</h1>
<hr class="featurette-divider">
<div class="container marketing col-lg-5">

<form method="post" action="/event/create" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      @error('title')
            <p class="text-danger">{{ $message }}</p>
        @enderror
      <input type="text" class="form-control" id="title" name="title" autofocus value="{{ old('title') }}">
    </div>

    <div class="mb-3">
      <label for="image" class="form-label">Upload Image</label>

      <img class="img-preview img-fluid mb-3 col-sm-5" alt="">
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
        <input id="body" type="hidden" name="body" value="{{ old('body') }}">
        <trix-editor input="body"></trix-editor>
    </div>
   
    <button type="submit" class="btn btn-primary">Create Event</button>
  </form>
</div>
@endsection