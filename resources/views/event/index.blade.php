@extends('navbar.main')

@section('container')
<div style="margin-top: 130px" class="container marketing">
  <h1 style="margin: 20px" class="display-4">What's New?</h1>
<div class="row">
  <hr class="featurette-divider">
  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    @foreach ($events as $item)
    <div class="card ml-3 mb-3 mt-3" style="width: 18rem;">
      <h5 class="card-title mb-3 mt-3" style="font-weight: bold">{{ $item['title'] }}</h5>
      <img width="300px" height="200px" src="{{ asset('storage/'. $item['image']) }}" class="card-img-top" alt="img">
      <div class="card-body">
        <p class="card-text">{{ $item['excerpt'] }}</p>
      </div>
      <div class="card-footer text-muted">
        <p class="card-text"><small class="text-muted">{{ $item['created_at'] }}</small></p>
        <a href="/detail/{{ $item['id'] }}" class="btn btn-primary">Details</a>
      </div>
    </div>
    @endforeach
  </div>
    <hr class="featurette-divider">
  </div><!-- /.row -->
</div>
@endsection