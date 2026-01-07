<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>My Laravel App</title>
    <!-- bootstrap linnk  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">



    <!-- Font Awesome for Icons -->
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- <link rel="stylesheet" href="{{asset('asset/css/material-dashboard.css')}}" /> -->
    <link rel="stylesheet" href="{{asset('asset/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('asset/css/signup.css')}}" />
    <link rel="stylesheet" href="{{asset('asset/css/about.css')}}" />
    <link rel="stylesheet" href="{{asset('asset/css/contact.css')}}" />
</head>

<body>
    
        
    <div class="conatiner">
        @include('partials.navbar')
    </div>

    <main>
        @yield(section: 'content')
        <div class="container">
            @yield('imgeSlide')
            @yield('cartgeories')
            @yield('bags')
            @yield('shut')
            @yield('services')
        </div>
    </main>
    <footer>
        @include('layouts.footer') {{-- Assuming you have a footer section --}}
    </footer>
    <!-- script of Bootstrap  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="resources/js/deshboard_Javascript.js"></script>
    <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/chartjs.min.js"></script>

  
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.2.0"></script>
</body>

</html>