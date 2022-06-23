<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $title }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="icon" href="{{ asset('storage/website-image/pitoe.png') }}" type="image/icon type">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/templatemo.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="{{ url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.min.css') }}">

    <!--old -->
    <link rel="stylesheet" href={{ url("https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css") }} integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href={{ url("https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css") }} rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src={{ url("https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js") }} integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href={{ url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css") }}>
    <link rel="stylesheet" href={{ asset("/css/style.css") }}>
    <link href={{ url("https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css") }} rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="canonical" href={{ url("https://getbootstrap.com/docs/5.1/examples/carousel/") }}>
    <link rel="stylesheet" type="text/css" href={{ asset("/css/trix.css") }}>
    <link rel="stylesheet" href={{ asset("/css/jquery.datetimepicker.min.css") }}>
    <link href="{{ asset('/css/blog.css') }}" rel="stylesheet">

    <script type="text/javascript" src={{ asset("/js/trix.js") }}></script>
    <script src={{ url("https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js") }} integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src={{ url("https://code.jquery.com/jquery-3.3.1.slim.min.js") }} integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src={{ url("https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js") }} integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src={{ url("https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js") }} integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src={{ url("https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js") }} integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src={{ url("https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js") }} integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src={{ asset("/js/jquery.datetimepicker.full.min.js") }}></script>
<!--
    
TemplateMo 559 Zay Shop

https://templatemo.com/tm-559-zay-shop

-->
</head>

<body>

    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">

            <a class="navbar-brand text-success logo h1 align-self-center" href={{ url("/") }}>
                <img width="110px" height="100px" src="{{ asset('storage/website-image/pitoe.png') }}" alt="">
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class= "nav-link {{ ($title === "Home") ? 'active' : '' }}" href={{ url('/') }}>Home</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link {{ ($title === "Galery") ? 'active' : '' }}" href={{ url('/galery') }}>Galeri</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link {{ ($title === "Event") ? 'active' : '' }}" href={{ url("/event") }}>Events</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link {{ ($title === "Cafe") ? 'active' : '' }}" href={{ url("/cafe") }}>Cafe</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link {{ ($title === "Facility") ? 'active' : '' }}" href={{ url("/facility") }}>Fasilitas</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link {{ ($title === "About") ? 'active' : '' }}" href={{ url("/about") }}>Tentang Kami</a>
                          </li>
                    </ul>
                </div>
                <div class="navbar align-self-center d-flex">
                    <!-- <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                        <div class="input-group">
                            <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                            <div class="input-group-text">
                                <i class="fa fa-fw fa-search"></i>
                            </div>
                        </div>
                    </div>-->
                    @auth
                    <ul class="navbar-nav ms-auto">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Menu Pegawai
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="{{ url('/dashboardPegawai') }}">Dashboard</a>
                              <form action={{ url('/logout') }} method="post">
                                @csrf
                                <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
                              </form>
                            </div>
                          </div>
                    </ul>
                    @endauth
                </div>
            </div>

        </div>
    </nav>
    <!-- Close Header -->

    <!-- Modal -->
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>



    <!-- Start Banner Hero -->
    
    @yield('container')

    <!-- Start Footer -->
    <footer style="padding-top: 30px" class="bg-dark" id="tempaltemo_footer">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="h2 text-success border-bottom pb-3 border-light logo">Kontak untuk informasi dan pemesanan</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li>
                            <i class="fas fa-map-marker-alt fa-fw"></i>
                            Kec. Trawas, Kabupaten Mojokerto, Jawa Timur
                        </li>
                        <li>
                            <i class="fa fa-phone fa-fw"></i>
                            <a class="text-decoration-none" href="tel:010-020-0340">010-020-0340</a>
                        </li>
                        <li>
                            <i class="fa fa-envelope fa-fw"></i>
                            <a class="text-decoration-none" href="mailto:kendhipitoepark.kelola@gmail.com">kendhipitoepark.kelola@gmail.com</a>
                        </li>
                    </ul>
                </div>

                <div class="col">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Kunjungi Kami</h2>
                    <div class="col">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1977.1348935650674!2d112.595679!3d-7.6541135!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7877d8aa67cdcb%3A0x1158730d8460073f!2sKendhi%20Pitoe%20Park!5e0!3m2!1sen!2sid!4v1645450790699!5m2!1sen!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>

            </div>

            <div class="row text-light mb-4">
                <div class="col-12 mb-3">
                    <div class="w-100 my-3 border-top border-light"></div>
                </div>
                <div class="col-auto me-auto">
                    <ul class="list-inline text-left footer-icons">
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="http://facebook.com/"><i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://www.instagram.com/"><i class="fab fa-instagram fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://twitter.com/"><i class="fab fa-twitter fa-lg fa-fw"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="w-100 bg-black py-3">
            <div class="container">
                <div class="row pt-2">
                    <div class="col-12">
                        <p class="text-left text-light">
                            Copyright &copy; Kendhi Pitoe Park 2022 
                            | Designed by <a rel="sponsored" href="https://templatemo.com" target="_blank">TemplateMo</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <!-- End Footer -->

    <!-- Start Script -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- End Script -->
</body>

</html>
<script>
    document.addEventListener('trix-file-accept',function(e){
      e.preventDefault();
    })
  
    function previewImage(){
      const image = document.querySelector('#image');
      const imgPreview = document.querySelector('.img-preview');
  
      imgPreview.style.display = 'block';
  
      const oFReader = new FileReader();
      oFReader.readAsDataURL(image.files[0]);
  
      oFReader.onload = function(oFREvent){
        imgPreview.src = oFREvent.target.result;
      }
    }
  
    $('.picker').datetimepicker({
      timepicker: true,
      datepicker: true,
      format: 'Y-m-d H:i',
      value: '',
      hours12: false,
      step: 30,
    })
  
    $('.picker2').datetimepicker({
      timepicker: false,
      datepicker: true,
      format: 'Y-m-d',
      value: '',
      hours12: false,
      step: 30,
    })
  </script>