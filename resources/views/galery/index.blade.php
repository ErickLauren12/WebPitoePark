@extends('navbar.main')

@section('container')
<div class="container marketing">
  <h1 class="display-4">Galery</h1>
  @auth
    @if (auth()->user()->is_admin >= 1)
    <form method="post" action="/galery/upload" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="image" class="form-label">Upload Image</label>
        
            <img class="img-preview img-fluid mb-3 col-sm-5" alt="">
            <input class="form-control" @error('image') is-invalid @enderror type="file" id="image" name="image" onchange="previewImage()">
            @error('image')
                  <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
    @endif
    @endauth
      <hr class="featurette-divider">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 mt-3 mb-3">
        @foreach ($result as $item)
        @if ($item['format'] == "Gambar")
        <div class="card">
          <img src="{{ asset('storage/' . $item['image']) }}" class="bd-placeholder-img">
          <div class="card-body">
            @auth
            @if (auth()->user()->is_admin >= 1)
            <form action="/galery/delete/{{ $item['id'] }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-sm bg-danger" style="color: white" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
            @endif
            @endauth
          </div>
        </div>
        @else
        <div class="card">
          <video controls src="{{ asset('storage/'.$item['image']) }}">
            Your browser does not support the video tag.
          </video>
          <div class="card-body">
            @auth
            @if (auth()->user()->is_admin >= 1)
            <form action="/galery/delete/{{ $item['id'] }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-sm bg-danger" style="color: white" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
            @endif
            @endauth
          </div>
        </div>
        @endif
        
        @endforeach
      </div>
        <hr class="featurette-divider">
    </div>
@endsection