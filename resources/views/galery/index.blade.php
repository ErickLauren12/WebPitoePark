@extends('navbar.main')

@section('container')
<div class="container marketing">
  @auth
    @if (auth()->user()->is_admin === 1)
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
    <div class="row">
      <hr class="featurette-divider">
        @foreach ($result as $item)
        <div class="col-lg-4">
            <img src="{{ asset('storage/' . $item['image']) }}" class="bd-placeholder-img mb-4" width="340" height="240">
        
        @auth
        @if (auth()->user()->is_admin === 1)
        <form action="/galery/delete/{{ $item['id'] }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button class="bg-danger" onclick="return confirm('Are you sure?')"><i class="bi bi-trash"></i></button>
        </form>
        @endif
        @endauth
      </div><!-- /.col-lg-4 -->
        @endforeach
        <hr class="featurette-divider">
      </div><!-- /.row -->
    </div>
@endsection