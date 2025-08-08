<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>My Laravel App</title>
    <!-- bootstrap linnk  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Font Awesome for Icons -->
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
        @yield('content')
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
</body>

</html>