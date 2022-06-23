@extends('navbar.main')
@section('container')

<main>
    <!-- Start Banner Hero -->
    <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
      <ol class="carousel-indicators">
          <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
          <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
          <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="img-fluid" src="{{ asset('storage/website-image/1.png') }}" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
          </div>
          <div class="carousel-item">
            <img class="img-fluid" src="{{ asset('storage/website-image/2.png') }}" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
          </div>
          <div class="carousel-item">
            <img class="img-fluid" src="{{ asset('storage/website-image/3.png') }}" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
          </div>
      </div>
      <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
          <i class="fas fa-chevron-left"></i>
      </a>
      <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
          <i class="fas fa-chevron-right"></i>
      </a>
  </div>
  <!-- End Banner Hero -->


  <!-- Start Categories of The Month -->
  <section class="container py-5">
      <div class="row text-center pt-3">
          <div class="col-lg-6 m-auto">
              <h1 class="h1">Selamat Datang di Website Kendhi Pitoe Park</h1>
              <p>
                  Berikut hal-hal menarik yang akan anda dapatkan di Kendhi Pitoe Park.
              </p>
          </div>
      </div>
      <div class="row">
          <div class="col-12 col-md-4 p-5 mt-3">
              <a href="#"><img src="{{ asset('storage/website-image/4.jpg') }}" class="rounded-circle img-fluid border"></a>
              <h5 class="text-center mt-3 mb-3">Galery</h5>
              <p class="text-center"><a href="#" class="btn btn-success">Cek Sekarang</a></p>
          </div>
          <div class="col-12 col-md-4 p-5 mt-3">
              <a href="#"><img src="{{ asset('storage/website-image/9.jpg') }}" class="rounded-circle img-fluid border"></a>
              <h2 class="h5 text-center mt-3 mb-3">Events</h2>
              <p class="text-center"><a href="#" class="btn btn-success">Cek Sekarang</a></p>
          </div>
          <div class="col-12 col-md-4 p-5 mt-3">
              <a href="#"><img src="{{ asset('storage/website-image/8.jpg') }}" class="rounded-circle img-fluid border"></a>
              <h2 class="h5 text-center mt-3 mb-3">Facility</h2>
              <p class="text-center"><a href="#" class="btn btn-success">Cek Sekarang</a></p>
          </div>
      </div>
  </section>
  <!-- End Categories of The Month -->


  <!-- Start Featured Product -->
  <section class="bg-light">
      <div class="container py-5">
          <div class="row text-center py-3">
              <div class="col-lg-6 m-auto">
                  <h1 class="h1">Tentang Kami</h1>
                  <p>
                      Berikut merupakan informasi menarik mengenai Kendhi Pitoe Park.
                  </p>
              </div>
          </div>
          <div class="row">
              <div class="col-12 col-md-4 mb-4">
                  <div class="card h-100">
                      <a href="shop-single.html">
                          <img src="{{ asset('storage/website-image/10.jpg') }}" class="card-img-top" alt="...">
                      </a>
                      <div class="card-body">
                          <a href="shop-single.html" class="h2 text-decoration-none text-dark">Selamat Datang</a>
                          <p class="card-text">
                            Kendhi Pitoe Park merupakan tempat wisata terbaru di desa Selotapak.kec.Trawas. Terdapat cafe, spot selfie, kolam renang anak, dan masih banyak lagi. Tempatnya sangat cocok buat liburan keluarga.
                          </p>
                      </div>
                  </div>
              </div>
              <div class="col-12 col-md-4 mb-4">
                <div class="card h-100">
                    <a href="shop-single.html">
                        <img src="{{ asset('storage/website-image/11.jpg') }}" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body">
                        <a href="shop-single.html" class="h2 text-decoration-none text-dark">Pemandagan Alam yang Indah.</a>
                        <p class="card-text">
                          Kendhi Pitoe Park merupakan tempat wisata terbaru di desa Selotapak.kec.Trawas. Terdapat cafe, spot selfie, kolam renang anak, dan masih banyak lagi. Tempatnya sangat cocok buat liburan keluarga.
                        </p>
                    </div>
                </div>
              </div>
              <div class="col-12 col-md-4 mb-4">
                <div class="card h-100">
                    <a href="shop-single.html">
                        <iframe class="card-img-top" height="300px" src="https://www.youtube.com/embed/g1nAAN8Fl6E" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </a>
                    <div class="card-body">
                        <a href="shop-single.html" class="h2 text-decoration-none text-dark">Banyak Fasilitas yang Menarik.</a>
                        <p class="card-text">
                            Nikmati berbagai macam fasilitas yang ada di Kendhi Pitoe Park. Mulai dari cafe, spot foto, kolam renang, dan masih banyak lagi. Sehingga Kendhi Pitoe Park menjadi destinasi pariwisata yang cocok untuk akhir pekan.
                        </p>
                    </div>
                </div>
              </div>
          </div>
      </div>
  </section>
  <!-- End Featured Product -->
</main>

@endsection