<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Dashboard Template · Bootstrap v5.1</title>

    <link rel="canonical" href="{{ url('https://getbootstrap.com/docs/5.1/examples/dashboard/') }}">

    <!-- Bootstrap core CSS -->
<link href="{{ asset('template1/css/bootstrap.min.css') }}" rel="stylesheet">

<link rel="stylesheet" href={{ url("https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css") }} integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link href={{ url("https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css") }} rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href={{ url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css") }}>
<link rel="stylesheet" href={{ asset("/css/style.css") }}>
<link rel="stylesheet" type="text/css" href={{ asset("/css/trix.css") }}>
<link rel="stylesheet" href={{ asset("/css/jquery.datetimepicker.min.css") }}>
<link href="{{ asset('/css/blog.css') }}" rel="stylesheet">

<script type="text/javascript" src={{ asset("/js/trix.js") }}></script>
<script src={{ url("https://code.jquery.com/jquery-3.3.1.slim.min.js") }} integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src={{ asset("/js/jquery.datetimepicker.full.min.js") }}></script>
<script src={{ url("https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js") }} integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src={{ url("https://code.jquery.com/jquery-3.3.1.slim.min.js") }} integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src={{ url("https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js") }} integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src={{ url("https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js") }} integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src={{ asset("/js/jquery.datetimepicker.full.min.js") }}></script>

    <style>

      trix-toolbar [data-trix-button-group="file-tools"]{
        display: none;
      }

      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="{{ asset('template1/dashboard.css') }}" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-light flex-md-nowrap p-0 shadow">
  <a class="col-md-3 col-lg-2 me-0 px-3" href="/"><img width="80px" height="80px" src="{{ asset('storage/website-image/pitoe.png') }}" alt=""></a>
  <button class="navbar-toggler position-absolute d-md-none collapsed bg-dark" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div  class="w-100"></div>
  <div class="navbar-nav">
    <div class="nav-item text-nowrap" style="margin: 10px">
      @auth
      <span style="margin-right: 20px">Username: {{ auth()->user()->username }} 
      @if (auth()->user()->is_admin == 1)
          [Pegawai]
      @else
      [Manager]
      @endif
      </span>
      @endauth
      
      <form action={{ url('/logout') }} method="post" class="d-inline">
        @csrf
        <button class="btn btn-danger" type="submit">Logout</button>
      </form>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Menu Dashboard</span>
        </h6>
        <ul class="nav flex-column">
          @if (auth()->user()->is_admin < 2)
          <li style="margin-bottom: 10px" class="nav-item">
            <a class="nav-link" aria-current="page" href="{{ url("/eventlist") }}">
              <span data-feather="layers"></span>
              Manajemen Event
            </a>
          </li>
          <li style="margin-bottom: 10px" class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ url("/qrcode") }}">
                  <span data-feather="layers"></span>
                  Manajemen Meja
                </a>
              </li>
          <li style="margin-bottom: 10px" class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ url("/cafe/dashboard") }}">
                  <span data-feather="layers"></span>
                  Manajemen Menu Cafe
                </a>
          </li>

              @if (auth()->user()->is_admin === 1)
              <li style="margin-bottom: 10px" class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ url("/reservation") }}">
                  <span data-feather="layers"></span>
                  Manajemen Reservasi
                </a>
              </li>
              @else
              <li style="margin-bottom: 10px" class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ url("/reservation/statistics") }}">
                  <span data-feather="layers"></span>
                  Statistik Reservasi
                </a>
              </li>
              @endif
              

          <li style="margin-bottom: 10px" class="nav-item">
            <a class="nav-link" aria-current="page" href="{{ url("/category") }}">
              <span data-feather="layers"></span>
              Manajemen Kategori Makanan
            </a>
          </li>

          <li style="margin-bottom: 10px" class="nav-item">
            <a class="nav-link" aria-current="page" href="{{ url("/facility/list") }}">
              <span data-feather="layers"></span>
              Manajemen Fasilitas
            </a>
          </li>  

          <li style="margin-bottom: 10px" class="nav-item">
            <a class="nav-link" aria-current="page" href="{{ url("/galery/dashboard_pegawai") }}">
              <span data-feather="layers"></span>
              Manajemen Galery
            </a>
          </li> 

          <li style="margin-bottom: 10px" class="nav-item">
            <a class="nav-link" aria-current="page" href="{{ url("/employee/edit") }}">
              <span data-feather="layers"></span>
              Ubah Akun
            </a>
          </li> 
          

              @else
          
          
          
              <li style="margin-bottom: 10px" class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ url("/event/dashboardadmin") }}">
                  <span data-feather="layers"></span>
                  Manajemen Event
                </a>
              </li>

              <li style="margin-bottom: 10px" class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ url("/cafe/dashboardadmin") }}">
                  <span data-feather="layers"></span>
                  Manajemen Cafe
                </a>
              </li>

              <li style="margin-bottom: 10px" class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ url("/facility/dashboardadmin") }}">
                  <span data-feather="layers"></span>
                  Manajemen Fasilitas
                </a>
              </li>

              <li style="margin-bottom: 10px" class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ url("/galery/dashboard") }}">
                  <span data-feather="layers"></span>
                  Manajemen Galery
                </a>
              </li> 
              <li style="margin-bottom: 10px" class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ url("/employee") }}">
                  <span data-feather="layers"></span>
                  Manajemen Akun Pegawai
                </a>
              </li> 
              <li style="margin-bottom: 10px" class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ url("/qrcode") }}">
                  <span data-feather="layers"></span>
                  Manajemen Meja
                </a>
              </li>
              @endif

              <li style="margin-bottom: 10px" class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ url("/reservation") }}">
                  <span data-feather="layers"></span>
                  Manajemen Reservasi
                </a>
              </li>

              <li style="margin-bottom: 10px" class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ url("/reservation/statistics") }}">
                  <span data-feather="layers"></span>
                  Statistik Reservasi
                </a>
              </li>
        </ul>


        @if (auth()->user()->is_admin > 1)
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Menu Logs</span>
        </h6>
        <ul class="nav flex-column mb-2">
          <li style="margin-bottom: 10px" class="nav-item">
            <a class="nav-link" href="{{ url('/log/event') }}">
              <span data-feather="file-text"></span>
              Logs Event
            </a>
          </li>
          <li style="margin-bottom: 10px" class="nav-item">
            <a class="nav-link" href="{{ url('/log/cafe')}}">
              <span data-feather="file-text"></span>
              Logs Menu Cafe
            </a>
          </li>
          <li style="margin-bottom: 10px" class="nav-item">
            <a class="nav-link" href="{{ url('/log/galery')}}">
              <span data-feather="file-text"></span>
              Logs Galery
            </a>
          </li>
          <li style="margin-bottom: 10px" class="nav-item">
            <a class="nav-link" href="{{ url('/log/facility')}}">
              <span data-feather="file-text"></span>
              Logs Fasilitas
            </a>
          </li>
        </ul>
        @endif
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      @yield('container')
    </main>
  </div>
</div>


    <script src="{{ asset('template1/js/bootstrap.bundle.min.js') }}"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="{{ asset('template1/dashboard.js') }}"></script>
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