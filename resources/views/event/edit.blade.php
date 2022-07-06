@extends('navbar.maindashboard')

@section('container')

<div class="container marketing">
  <h1 class="mt-3 mb-3">Mengubah Event</h1>
  <hr class="featurette-divider">
<form method="post" action="{{ url('/event/edit/'.$events->id) }}" enctype="multipart/form-data">
    @method('put')
    @csrf
    <div class="mb-3">
      <label for="title" class="form-label">Judul</label>
      @error('title')
            <p class="text-danger">{{ $message }}</p>
        @enderror
      <input type="text" class="form-control" id="title" name="title" autofocus value="{{ old('title', $events->title) }}">
    </div>

    <div class="mb-3">
      <label for="image" class="form-label">Upload Gambar/ Video</label>
      @if ($events->image)
        <img src="{{ asset('storage/' . $events->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block" alt="">
      @else
        <img class="img-preview img-fluid mb-3 col-sm-5 d-block" alt="">
      @endif          
      <input class="form-control" @error('image') is-invalid @enderror type="file" id="image" name="image" onchange="previewImage()">
      @error('image')
            <p class="text-danger">{{ $message }}</p>
      @enderror
    </div>

    <div class="mb-3">
      <label for="title" class="form-label">Isi Event</label>
        @error('body')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        <input id="body" type="hidden" name="body" value="{{ old('body', $events->body) }}">
        <trix-editor input="body"></trix-editor>
    </div>
   
    <button type="submit" class="btn btn-primary">Ubah Event</button>
  </form>
</div>
@endsection