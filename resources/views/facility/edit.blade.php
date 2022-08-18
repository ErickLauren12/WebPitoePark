@extends('navbar.maindashboard')

@section('container')
<h1 class="mt-3 mb-3">Ubah Fasilitas</h1>
<hr class="featurette-divider">
<div class="container marketing">

<form method="post" action="{{ url('/facility/edit/'.$facility->id) }}" enctype="multipart/form-data">
    @method('put')
    @csrf
    <div class="mb-3">
      <label for="title" class="form-label">Judul</label>
      @error('title')
            <p class="text-danger">{{ $message }}</p>
        @enderror
      <input type="text" class="form-control" id="title" name="title" autofocus value="{{ old('title', $facility->title) }}">
    </div>

    <div class="mb-3">
      <label for="image" class="form-label">Upload Gambar</label>
      @if ($facility->image)
        <img src="{{ asset( $facility->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block" alt="">
      @else
        <img class="img-preview img-fluid mb-3 col-sm-5 d-block" alt="">
      @endif          
      <input class="form-control" @error('image') is-invalid @enderror type="file" id="image" name="image" onchange="previewImage()">
      @error('image')
            <p class="text-danger">{{ $message }}</p>
      @enderror
    </div>

    <div class="mb-3">
        <label for="title" class="form-label">Konten</label>
        @error('body')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        <input id="body" type="hidden" name="body" value="{{ old('body', $facility->body) }}">
        <trix-editor input="body" style="height: 200px"></trix-editor>
    </div>
   
    <button type="submit" class="btn btn-primary">Ubah Fasilitas</button>
  </form>
</div>
@endsection