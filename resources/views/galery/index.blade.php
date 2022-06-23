@extends('navbar.main')

@section('container')
<div style="margin-top: 40px" class="container marketing">
  <h1 class="display-4">Galeri</h1>
  @if (session()->has('success'))
  <div class="alert alert-success p-3 mb-2 bg-success text-white" role="alert">
    {{ session('success') }}
  </div>
  @elseif(session()->has('fail'))
  <div class="alert p-3 mb-2 bg-danger text-white" role="alert">
    {{ session('fail') }}
  </div>
  @endif
      <hr class="featurette-divider">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 mt-3 mb-3">
        @foreach ($result as $item)
        @if ($item['format'] == "Gambar")
        <div class="card">
          <img src="{{ asset('storage/' . $item['image']) }}" class="bd-placeholder-img">
          <div class="card-body">
            <!--
            @auth
            @if (auth()->user()->is_admin >= 1)
            <form action="/galery/delete/{{ $item['id'] }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-sm bg-danger" style="color: white" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
            @endif
            @endauth-->
          </div>
        </div>
        @else
        <div class="card">
          <video controls src="{{ asset('storage/'.$item['image']) }}">
            Your browser does not support the video tag.
          </video>
          <div class="card-body">
            <!--
            @auth
            @if (auth()->user()->is_admin >= 1)
            <form action="/galery/delete/{{ $item['id'] }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-sm bg-danger" style="color: white" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
            @endif
            @endauth-->
          </div>
        </div>
        @endif
        
        @endforeach
      </div>
        <hr class="featurette-divider">
    </div>
@endsection