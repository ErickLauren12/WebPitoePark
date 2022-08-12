@extends('navbar.main')

@section('container')
<div style="margin-top: 40px" class="container marketing">
  <a href="{{ url('/event') }}" style="margin-bottom: 30px" class="btn btn-light"><i class="bi bi-caret-left"></i><b>BACK</b></a>
  <h1>{{ $detail['title'] }}</h1>
  <p style="font-size: 15px">By {{ $detail->account->username }} <br> {{ $detail->published_at }}</p>
<hr class="featurette-divider">
<div class="row featurette">
    <div class="col-md-7 order-md-2" style="font-size: 18px">
      @php
          echo($detail['body'])
      @endphp  
    </div>
    <div class="col-md-5 order-md-1">
      
      @if ($detail['image'])
      <img src="{{ asset( $detail['image']) }}" width="500px" height="500px" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" alt="">
      @else
      <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"  xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg> 
      @endif
    </div>
  </div>
  <hr class="featurette-divider">
</div>

@endsection