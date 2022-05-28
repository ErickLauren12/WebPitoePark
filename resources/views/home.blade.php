@extends('navbar.main')

@section('container')

<main>
<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="bd-placeholder-img" src="{{ asset('storage/website-image/1.jpg') }}" width="100%" height="530px" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
      <div class="container">
        <div class="carousel-caption text-start">
          <!--<h1>Selamat datang di Kendhi Pitoe Park.</h1>
          <p>Some representative placeholder content for the first slide of the carousel.</p>-->
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <img class="bd-placeholder-img" src="{{ asset('storage/website-image/2.jpg') }}" width="100%" height="530px" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">

      <div class="container">
        <div class="carousel-caption">
          <!--<h1>Nikmati Pemandangan Alam yang Indah.</h1>
          <p>Some representative placeholder content for the second slide of the carousel.</p>
          <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p>-->
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <img class="bd-placeholder-img" src="{{ asset('storage/website-image/3.jpg') }}" width="100%" height="530px" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">

      <div class="container">
        <div class="carousel-caption text-end">
          <!--<h1>Nikmati Fasilitas yang ada di Kendhi Pitoe Park.</h1>
          <p>Some representative placeholder content for the third slide of this carousel.</p>
          <p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p>-->
        </div>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>


<!-- Marketing messaging and featurettes
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->

<div class="marketing pageBackgroundColor bg-light" style="margin-top: 10px">

  <!-- Three columns of text below the carousel -->
  <hr class="featurette-divider">
  <br>
  <div class="row">
    <div class="col-lg-4">
      <img src="{{ asset('storage/website-image/4.jpg') }}" class="bd-placeholder-img rounded-circle" width="200" height="200">
      <h2>Galery</h2>
      <p>Lihat momen-momen terbaik di Kendhi Pitoe Park.</p>
      <p><a class="btn btn-secondary" href="#">Klik Disini &raquo;</a></p>
    </div><!-- /.col-lg-4 -->
    <div class="col-lg-4">
      <img src="{{ asset('storage/website-image/9.jpg') }}" class="bd-placeholder-img rounded-circle" width="200" height="200">

      <h2>Events</h2>
      <p>Lihat beberapa info terbaru di Kendhi Pitoe Park.</p>
      <p><a class="btn btn-secondary" href="#">Klik Disini &raquo;</a></p>
    </div><!-- /.col-lg-4 -->
    <div class="col-lg-4">
      <img src="{{ asset('storage/website-image/8.jpg') }}" class="bd-placeholder-img rounded-circle" width="200" height="200">
      <h2>Facility</h2>
      <p>Lihat fasilitas yang ada di Kendhi Pitoe Park.</p>
      <p><a class="btn btn-secondary" href="#">Klik Disini &raquo;</a></p>
    </div><!-- /.col-lg-4 -->
  </div><!-- /.row -->


  <!-- START THE FEATURETTES -->

  <hr class="featurette-divider">

  <div class="row featurette">
    <div class="col-md-7">
      <h2 class="featurette-heading">Selamat Datang di Kendhi Pitoe Park.<span class="text-muted"></span></h2>
      <p class="lead">Kendhi Pitoe Park merupakan tempat wisata terbaru di desa Selotapak.kec.Trawas. Terdapat cafe, spot selfie, kolam renang anak, dan masih banyak lagi. Tempatnya sangat cocok buat liburan keluarga.</p>
    </div>
    <div class="col-md-5">
      <img class="bd-placeholder-img" src="{{ asset('storage/website-image/1.jpg') }}" width="100%" height="90%" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
    </div>
  </div>

  <hr class="featurette-divider">

  <div class="row featurette">
    <div class="col-md-7 order-md-2">
      <h2 class="featurette-heading">Pemandagan Alam yang Indah. <span class="text-muted"></span></h2>
      <p class="lead">Kendhi Pitoe Park menyediakan pemandangan alam yang sangat indah. Seperti hamparan sawah yang luas, pegunugan, dan bunga bunga yang menghiasi Kendhi Pitoe Park.</p>
    </div>
    <div class="col-md-5 order-md-1">
      <img class="bd-placeholder-img" src="{{ asset('storage/website-image/2.jpg') }}" width="100%" height="90%" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">

    </div>
  </div>

  <hr class="featurette-divider">

  <div class="row featurette">
    <div class="col-md-7">
      <h2 class="featurette-heading">Banyak Fasilitas yang Menarik. <span class="text-muted"></span></h2>
      <p class="lead">Nikmati berbagai macam fasilitas yang ada di Kendhi Pitoe Park. Mulai dari cafe, spot foto, kolam renang, dan masih banyak lagi. Sehingga Kendhi Pitoe Park menjadi destinasi pariwisata yang cocok untuk akhir pekan.</p>
    </div>
    <div class="col-md-5">
      <img class="bd-placeholder-img" src="{{ asset('storage/website-image/3.jpg') }}" width="100%" height="90%" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">

    </div>
  </div>

  <hr class="featurette-divider">

  <!-- /END THE FEATURETTES -->

</div><!-- /.container -->


<!-- FOOTER -->


</main>

@endsection