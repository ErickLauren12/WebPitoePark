@extends('navbar.main')

@section('container')
 <!-- START THE FEATURETTES -->
<div class="container marketing">

  <h1 class="display-4">About Us</h1>
  <hr class="featurette-divider">
  <p class="lead">Quickly build an effective pricing table for your potential customers with this Bootstrap example. It’s built with default Bootstrap components and utilities with little customization.</p>


 <hr class="featurette-divider">

 <div class="row featurette">
   <div class="col-md-7">
     <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It’ll blow your mind.</span></h2>
     <p class="lead">Some great placeholder content for the first featurette here. Imagine some exciting prose here.</p>
   </div>
   <div class="col-md-5">
     <img class="bd-placeholder-img" src="{{ asset('storage/website-image/1.jpeg') }}" width="500px" height="300px" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
   </div>
 </div>

 <hr class="featurette-divider">

 <div class="row featurette">
   <div class="col-md-7 order-md-2">
     <h2 class="featurette-heading">Oh yeah, it’s that good. <span class="text-muted">See for yourself.</span></h2>
     <p class="lead">Another featurette? Of course. More placeholder content here to give you an idea of how this layout would work with some actual real-world content in place.</p>
   </div>
   <div class="col-md-5 order-md-1">
     <img class="bd-placeholder-img" src="{{ asset('storage/website-image/2.jpeg') }}" width="500px" height="300px" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">

   </div>
 </div>

 <hr class="featurette-divider">

 <div class="row featurette">
   <div class="col-md-7">
     <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
     <p class="lead">And yes, this is the last block of representative placeholder content. Again, not really intended to be actually read, simply here to give you a better view of what this would look like with some actual content. Your content.</p>
   </div>
   <div class="col-md-5">
     <img class="bd-placeholder-img" src="{{ asset('storage/website-image/3.jpeg') }}" width="500px" height="300px" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">

   </div>
 </div>

 <hr class="featurette-divider">
</div>
<div style="margin: 110px"></div>
 <!-- /END THE FEATURETTES -->
@endsection