<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
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

    <style>
      trix-toolbar [data-trix-button-group="file-tools"]{
        display: none;
      }
      .bottom {
        position: fixed;
        bottom: 0;
        background-color: #97DBAE;
        width: 100%;
        padding: 10px;
      }
      .textFont{
        font-weight: bold;
      }
      .pageBackgroundColor{
        padding: 30px;
      }
    </style>
  <title>{{ $title }}</title>
  </head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: white;">
      <a class="navbar-brand" href={{ url("/") }}>Navbar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class= "nav-link {{ ($title === "Home") ? 'active' : '' }}" href={{ url('/') }}>Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title === "Galery") ? 'active' : '' }}" href={{ url('/galery') }}>Galery</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title === "Event") ? 'active' : '' }}" href={{ url("/event") }}>Events</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title === "Location") ? 'active' : '' }}" href={{ url("/location") }}>Location</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title === "Cafe") ? 'active' : '' }}" href={{ url("/cafe") }}>Cafe</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title === "Facility") ? 'active' : '' }}" href={{ url("/facility") }}>Facility</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title === "About") ? 'active' : '' }}" href={{ url("/about") }}>About Us</a>
          </li>
          @auth
          @endauth
        </ul>

        <ul class="navbar-nav ms-auto">
        @auth
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Welcome back, {{ auth()->user()->username }}
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            @if (auth()->user()->is_admin >= 1)
              <a class="dropdown-item" href={{ url("/eventlist") }}><i class="bi bi-pencil-fill"></i> Post News</a>
              <a class="dropdown-item" href={{ url("/cafe/create") }}><i class="bi bi-pencil-fill"></i> Create Menu Cafe</a>
              <a class="dropdown-item" href={{ url("/category") }}><i class="bi bi-pencil-fill"></i> Create Menu Category</a>
              <a class="dropdown-item" href={{ url("/reservation") }}><i class="bi bi-pencil-fill"></i> Create Reservation</a>
              <a class="dropdown-item" href={{ url("/facility/list") }}><i class="bi bi-pencil-fill"></i> Add Facility</a>   
            @endif
            @if (auth()->user()->is_admin === 2)
              <a class="dropdown-item" href={{ url("/employee") }}><i class="bi bi-pencil-fill"></i>Account Dashboard</a>
              @endif
            <li>
              <form action={{ url('/logout') }} method="post">
                @csrf
                <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
              </form>
            </li>
          </ul>
        </li>
        @endauth
      </ul>
      </div>
    </nav>
    <div style="margin-bottom: 5%"></div>
    <div style="margin-bottom: 50px">
        @yield('container')
    </div>

    <footer class="blog-footer">
      <p>More About Us:</p>
      <p style="font-size: 20pt">
        <a href="https://twitter.com/mdo"><i class="bi bi-facebook"></i></a>
         / 
        <a href=""><i class="bi bi-whatsapp"></i></a>
         / 
        <a href=""><i class="bi bi-instagram"></i></a>
      </p>
      <p>
        <a href="#">Back to top</a>
      </p>
    </footer>  

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