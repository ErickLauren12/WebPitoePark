@extends('navbar.main')

@section('container')
 <!-- START THE FEATURETTES -->
<div class="container marketing">

  <h1 class="display-4">Tentang Kami</h1>
  <hr class="featurette-divider">

 <div class="row featurette">
   <div class="col-md-7">
     <h2 class="featurette-heading">Desa Selotapak</h2>
     <p class="lead">Desa Selotapak merupakan salah satu desa yang berlokasi di Kecamatan Trawas, Kabupaten Mojokerto. Secara geografis, Desa Selotapak terletak diantara pegunungan Arjuno Welirang dan Penanggungan. Pemandangan alam yang indah, hamparan sawah terasering yang luas, dan penduduk yang ramah menjadi ciri khas Desa Selotapak.</p>
   </div>
   <div class="col-md-5">
     <img class="bd-placeholder-img" src="{{ asset('storage/website-image/9.jpg') }}" width="500px" height="300px" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
   </div>
 </div>

 <hr class="featurette-divider">

 <div class="row featurette">
   <div class="col-md-7 order-md-2">
     <h2 class="featurette-heading">Kendhi Pitoe Park</h2>
     <p class="lead">Kendhi Pitoe Park merupakan tempat wisata terbaru di desa Selotapak Kecamatan Trawas. Kendhi Pitoe Park sendiri menyediakan beberapa fasilitas seperti cafe, kolam renang, dan tempat foto. Kendhi Pitoe Park memiliki pemandangan yang indah dikarenakan lokasinya yang terasering dan berada di antara sawah.</p>
   </div>
   <div class="col-md-5 order-md-1">
     <img class="bd-placeholder-img" src="{{ asset('storage/website-image/7.jpg') }}" width="500px" height="300px" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
   </div>
 </div>

 <hr class="featurette-divider">
</div>
<div style="margin: 110px"></div>
 <!-- /END THE FEATURETTES -->
@endsection