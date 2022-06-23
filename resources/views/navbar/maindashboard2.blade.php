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
    <link rel="canonical" href="https://www.wrappixel.com/templates/adminwrap-lite/" />
    <!-- Favicon icon -->

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('template/assets/node_modules/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/assets/node_modules/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <link href="{{ asset('template/assets/node_modules/morrisjs/morris.css') }}" rel="stylesheet">
    <!--c3 CSS -->
    <link href="{{ asset('template/assets/node_modules/c3-master/c3.min.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('template/css/style.css') }}" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="{{ asset('template/css/pages/dashboard1.css') }}" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{{ asset('template/css/colors/default.css') }}" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Admin Wrap</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="/">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img width="70px" height="70px" src="{{ asset('storage/website-image/pitoe.png') }}" alt="homepage" class="dark-logo" />
                                
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>
                            <!-- dark Logo text -->
                            <img width="150px" height="60px" src="{{ asset('storage/website-image/kendhiicon.png') }}" alt="homepage" class="dark-logo" />
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark"
                                href="javascript:void(0)"><i class="fa fa-bars"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown u-pro">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="#"
                                id="navbarDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span
                                    class="hidden-md-down">Hello, {{ auth()->user()->username }} &nbsp;</span> </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown"></ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        @if (auth()->user()->is_admin === 1)
                        <li> <a class="waves-effect waves-dark" href="{{ url("/galery/dashboard_pegawai") }}" aria-expanded="false"><i
                            class="fa fa-table"></i><span class="hide-menu">Galery</span></a>
                        </li>
                        @else
                        <li> <a class="waves-effect waves-dark" href="{{ url("/galery/dashboard") }}" aria-expanded="false"><i
                            class="fa fa-table"></i><span class="hide-menu">Galery</span></a>
                        </li>
                        @endif
                        
                        @if (auth()->user()->is_admin === 1)
                        <li> <a class="waves-effect waves-dark" href="{{ url("/eventlist") }}" aria-expanded="false"><i
                            class="fa fa-table"></i><span class="hide-menu">Event</span></a>
                        </li>
                        @else
                        <li> <a class="waves-effect waves-dark" href="{{ url("/event/dashboardadmin") }}" aria-expanded="false"><i
                            class="fa fa-table"></i><span class="hide-menu">Event</span></a>
                         </li>
                        @endif
                        @if (auth()->user()->is_admin === 1)
                        <li> <a class="waves-effect waves-dark" href="{{ url("/cafe/dashboard") }}" aria-expanded="false"><i
                            class="fa fa-table"></i><span class="hide-menu">Cafe</span></a>
                        </li>
                        @else
                        <li> <a class="waves-effect waves-dark" href="{{ url("/cafe/dashboardadmin") }}" aria-expanded="false"><i
                            class="fa fa-table"></i><span class="hide-menu">Cafe</span></a>
                        </li>
                        @endif
                        @if (auth()->user()->is_admin === 1)
                        <li> <a class="waves-effect waves-dark" href="{{ url("/category") }}" aria-expanded="false"><i
                            class="fa fa-table"></i><span class="hide-menu">Kategori Makanan</span></a>
                        </li>
                        @endif
                        @if (auth()->user()->is_admin === 1)
                        <li> <a class="waves-effect waves-dark" href="{{ url("/reservation") }}" aria-expanded="false"><i
                            class="fa fa-table"></i><span class="hide-menu">Reservasi</span></a>
                        </li>
                        @endif
                        @if (auth()->user()->is_admin === 1)
                        <li> <a class="waves-effect waves-dark" href="{{ url("/facility/list") }}" aria-expanded="false"><i
                            class="fa fa-table"></i><span class="hide-menu">Fasilitas</span></a>
                        </li>
                        @else
                        <li> <a class="waves-effect waves-dark" href="{{ url("/facility/dashboardadmin") }}" aria-expanded="false"><i
                            class="fa fa-table"></i><span class="hide-menu">Fasilitas</span></a>
                        </li>
                        @endif
                        @if (auth()->user()->is_admin === 2)
                        <li> <a class="waves-effect waves-dark" href="{{ url("/employee") }}" aria-expanded="false"><i
                            class="fa fa-table"></i><span class="hide-menu">Akun Pegawai</span></a>
                        </li>
                        @endif
                        @if (auth()->user()->is_admin === 2)
                        <li> <a class="waves-effect waves-dark" href="{{ url("/log/dashboardadmin") }}" aria-expanded="false"><i
                            class="fa fa-table"></i><span class="hide-menu">Logs Pegawai</span></a>
                        </li>
                        @endif
                        @if (auth()->user()->is_admin === 1)
                        <li> <a class="waves-effect waves-dark" href="{{ url("/employee/edit") }}" aria-expanded="false"><i
                            class="fa fa-table"></i><span class="hide-menu">Ganti Passwprd</span></a>
                        </li>
                        @endif
                        
                    </ul>
                    <div class="text-center mt-4">
                        <form action={{ url('/logout') }} method="post">
                            @csrf
                            <button type="submit" class="btn waves-effect waves-light btn-info hidden-md-down text-white"><i class="bi bi-box-arrow-right"></i> Logout</button>
                          </form>
                    </div>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <div class="page-wrapper">
            <div class="container-fluid">
                @yield('container')
            </div>
            <footer class="footer"> © 2021 Adminwrap by <a href="https://www.wrappixel.com/">wrappixel.com</a> </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('template/assets/node_modules/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="{{ asset('template/assets/node_modules/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('template/js/perfect-scrollbar.jquery.min.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('template/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('template/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('template/js/custom.min.js') }}"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--morris JavaScript -->
    <script src="{{ asset('template/assets/node_modules/raphael/raphael-min.js') }}"></script>
    <script src="{{ asset('template/assets/node_modules/morrisjs/morris.min.js') }}"></script>
    <!--c3 JavaScript -->
    <script src="{{ asset('template/assets/node_modules/d3/d3.min.js') }}"></script>
    <script src="{{ asset('template/assets/node_modules/c3-master/c3.min.js') }}"></script>
    <!-- Chart JS -->
    <script src="{{ asset('template/js/dashboard1.js') }}"></script>

    <!-- Start Script -->
    <script src="{{ asset('assets/js/jquery-1.11.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-migrate-1.2.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/templatemo.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
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