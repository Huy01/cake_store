<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="/images/pngegg.png">
  <title>
    @yield('title')
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="/css/admin/nucleo-icons.css" rel="stylesheet" />
  <link href="/css/admin/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="/css/admin/material-dashboard.css?v=3.0.4" rel="stylesheet" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-gray-200 g-sidenav-show bg-gray-100">
  @yield('content')
  @yield('user')
  @yield('products')
  @yield('update_user')
  @yield('type_products')
  @yield('update_product')
  @yield('add_product')
  @yield('add_type_product')
  @yield('slides')
  @yield('add_slide')
  @yield('update_slide')
  @yield('bill')
  <div class="container position-sticky z-index-sticky top-0">
    @yield('container')
  </div>
  <main class="main-content  mt-0">
    @yield('main-content')
  </main>
  <!--   Core JS Files   -->
  <script src="/js/admin/core/popper.min.js"></script>
  <script src="/js/admin/core/bootstrap.min.js"></script>
  <script src="/js/admin/plugins/perfect-scrollbar.min.js"></script>
  <script src="/js/admin/plugins/smooth-scrollbar.min.js"></script>
  
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="/js/admin/material-dashboard.min.js?v=3.0.4"></script>
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@2.8.2/dist/alpine.min.js"></script>
  @yield('captcha')
</body>

</html>