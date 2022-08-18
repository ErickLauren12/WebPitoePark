@extends('navbar.main')
@section('container')
<div style="margin-top: 40px" class="container marketing">
  <h1 style="margin: 20px" class="display-4">Fasilitas</h1>
  <hr class="featurette-divider">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 mt-3 mb-3">
        @foreach ($facility as $item)
        <div class="col">
          <a href="/facilty/detail/{{ $item['id'] }}">
            <div class="card shadow-sm">
              <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="{{ asset( $item['image']) }}">
              <div class="card-body">
                <h5 class="card-title">{{ $item['title'] }}</h5>
              </div>
            </div>
          </a>
          </div>
        @endforeach
    </div>
    <hr class="featurette-divider">
</div>
@endsection