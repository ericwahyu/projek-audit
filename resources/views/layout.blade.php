<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
      <title>@yield('title')</title>
      <link rel="icon" type="image/x-icon" href="#">
      <meta name="google-site-verification" content="mtDAZgvHjB1ZXJc6OooM_FWGw6F0ExHLYrezfayUeho" />

      <!-- General CSS Files -->
      {{--
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"> --}}
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap/css/bootstrap.min.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/modules/fontawesome/css/all.min.css') }}">

      <!-- CSS Libraries -->
      <link rel="stylesheet" href="{{ asset('assets/modules/prism/prism.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap-daterangepicker/daterangepicker.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/modules/select2/dist/css/select2.min.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/modules/ionicons/css/ionicons.min.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css') }}">


      {{-- Summernote --}}
      <link rel="stylesheet" href="{{ asset('assets/modules/summernote/summernote-bs4.css') }}">

      <!-- Template CSS -->
      <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">

      <style type="text/css">
        .table-select {
          max-height:300px;
        }
      </style>
      <!-- Start GA -->
      {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
      </script> --}}
      <script async src="{{ asset('https://www.googletagmanager.com/gtag/js?id=UA-94034622-3') }}"></script>
      <script>
          window.dataLayer = window.dataLayer || [];
              function gtag(){dataLayer.push(arguments);}
              gtag('js', new Date());

              gtag('config', 'UA-94034622-3');
      </script>
  </head>

  <body>
    <div id="app">
      <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
          <form class="form-inline mr-auto">
            <ul class="navbar-nav mr-3">
              <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            </ul>
            {{-- <div class="search-element">
            </div> --}}
          </form>
          @if (Auth::user())
            <ul class="navbar-nav navbar-right">
              <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div></a>
                <div class="dropdown-menu dropdown-menu-right">
                  <div class="dropdown-divider"></div>
                    <form action="{{ route('logout.login') }}" method="post">
                      @csrf
                      <button type="submit" class="dropdown-item text-danger"><i class="fas fa-sign-out-alt"></i> Logout</button>
                  </form>
                  </a>
                </div>
              </li>
            </ul>
          @endif
        </nav>
        <div class="main-sidebar sidebar-style-2">
          <aside id="sidebar-wrapper">
            <div class="sidebar-brand">
              <a href="#">Internal Audit</a>
            </div>
            <div class="sidebar-brand sidebar-brand-sm">
              <a href="#">IA</a>
            </div>
            <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li class="{{ ($menu == 'dashboard') ? 'active' : '' }}"><a class="nav-link" href="{{ route('dashboard') }}"><i class="fas fa-chart-bar"></i> <span>Dashboard</span></a></li>
              @if (Auth::user())
                @if (Auth::user()->isAdmin())
                  <li class="menu-header">Master Data</li>
                  <li class="{{ ($menu == 'master') ? 'active' : '' }}"><a class="nav-link" href="{{ route('index.masterUser') }}"><i class="fas fa-user"></i> <span>Master User</span></a></li>
                @endif
                <li class="menu-header">General</li>
                <li class="{{ ($menu == 'iso') ? 'active' : '' }}"><a class="nav-link" href="{{ route('index.iso') }}"><i class="fas fa-globe"></i><span>ISO</span></a></li>
                <li class="{{ ($menu == 'klausul') ? 'active' : '' }}"><a class="nav-link" href="{{ route('index.klausul') }}"><i class="fas fa-plug"></i><span>Klausul</span></a></li>
                @if (Auth::user()->isAdmin())
                  <li class="{{ ($menu == 'pertanyaan') ? 'active' : '' }}"><a class="nav-link" href="{{ route('index.pertanyaan') }}"><i class="fas fa-list-ol"></i><span>Daftar Pertanyaan</span></a></li>
                  <li class="{{ ($menu == 'objektif') ? 'active' : '' }}"><a class="nav-link" href="{{ route('index.objektif') }}"><i class="fas fa-file-alt"></i><span>Bukti Objektif</span></a></li>
                @endif
              @endif
              <li class="dropdown {{ ($nav == 'score') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-map-pin"></i> <span>Area/Wilayah Audit</span></a>
                <ul class="dropdown-menu">
                  <li class="{{ ($menu == 'Kantor Regional 3') ? 'active' : '' }}" ><a class="nav-link" href="{{ route('index.unitSub', 1) }}">Kantor Regional 3</a></li>
                  <li class="{{ ($menu == 'Sub Regional Jawa') ? 'active' : '' }}" ><a class="nav-link" href="{{ route('index.unitSub', 2) }}">Sub Regional Jawa</a></li>
                  <li class="{{ ($menu == 'Sub Regional Kalimantan') ? 'active' : '' }}"><a class="nav-link" href="{{ route('index.unitSub', 3) }}">Sub Regional Kalimantan</a></li>
                  <li class="{{ ($menu == 'Sub Regional Bali Nusra') ? 'active' : '' }}"><a class="nav-link" href="{{ route('index.unitSub', 4) }}">Sub Regional Bali Nusra</a></li>
                </ul>
              </li>
            </ul>
        </aside>
        </div>
  
        <!-- Main Content -->
        <div class="main-content">
            @yield('section')
          {{-- <section class="section">
            <div class="section-header">

            </div>
  
            <div class="section-body">
            </div>
          </section> --}}
        </div>
        <!-- Button trigger modal -->
        
        {{-- <footer class="main-footer">
          <div class="footer-left">
            Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
          </div>
          <div class="footer-right">
            
          </div>
        </footer> --}}
        @yield('modal')
      </div>
    </div>
  
    @yield('script')

    <!-- General JS Scripts -->
    <script src="{{ asset('assets/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/modules/popper.js') }}"></script>
    <script src="{{ asset('assets/modules/tooltip.js') }}"></script>
    <script src="{{ asset('assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('assets/modules/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/stisla.js') }}"></script>

    <!-- JS Libraies -->
    <script src="{{ asset('assets/modules/prism/prism.js') }}"></script>
    <script src="{{ asset('assets/modules/jquery-pwstrength/jquery.pwstrength.min.js') }}"></script>
    <script src="{{ asset('assets/modules/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('assets/modules/owlcarousel2/dist/owl.carousel.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script>
    <script src="{{ asset('assets/js/page/modules-ion-icons.js') }}"></script>
    <script src="{{ asset('assets/js/page/bootstrap-modal.js') }}"></script>
    <script src="{{ asset('assets/js/page/modules-slider.js') }}"></script>
    
    <!-- Template JS File -->
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
      $('.show_confirm').click(function(event) {
                let form =  $(this).closest("form");
                let name = $(this).data("name");
                event.preventDefault();
                swal({
                    title: 'Apakah anda yakin akan menghapus data ini !! ',
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                    form.submit();
                    }
                });
            });

        @if(Session::has('success'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
                toastr.success("{{ session('success') }}");
        @endif

        @if(Session::has('error'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
                toastr.error("{{ session('error') }}");
        @endif

        @if(Session::has('info'))
        toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
                toastr.info("{{ session('info') }}");
        @endif

        @if(Session::has('warning'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
                toastr.warning("{{ session('warning') }}");
        @endif
    </script>
  </body>
</html>