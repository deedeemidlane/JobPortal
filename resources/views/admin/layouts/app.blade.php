<!--
=========================================================
* Soft UI Dashboard - v1.0.3
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2021 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- <link rel="apple-touch-icon" sizes="76x76" href="/assets/admin/img/apple-icon.png">
  <link rel="icon" type="image/png" href="/assets/admin/img/favicon.png"> -->
  <title>
    Enuy - Job Portal Website
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="/assets/admin/css/nucleo-icons.css" rel="stylesheet" />
  <link href="/assets/admin/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="/assets/admin/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link id="pagestyle" href="/assets/admin/css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="g-sidenav-show bg-gray-100">

  @include('admin.layouts.navbars.sidebar')
  <main class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
    @include('admin.layouts.navbars.nav')
    <div class="container-fluid py-4">
      @yield('content')
    </div>
  </main>

  <!--   Core JS Files   -->
  <script src="/assets/admin/js/core/popper.min.js"></script>
  <script src="/assets/admin/js/core/bootstrap.min.js"></script>
  <script src="/assets/admin/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="/assets/admin/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="/assets/admin/js/plugins/fullcalendar.min.js"></script>
  <script src="/assets/admin/js/plugins/chartjs.min.js"></script>
  @stack('dashboard')
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>

  <!-- Toast notification -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  @if(session()->has('success'))
  <script>
    toastr.options = {
      "progressBar": true,
      "closeButton": true
    }
    toastr.success("{{session('success')}}", 'Thành công!', {
      timeOut: 3000
    });
  </script>
  @endif

  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="/assets/admin/js/soft-ui-dashboard.js"></script>
</body>

</html>