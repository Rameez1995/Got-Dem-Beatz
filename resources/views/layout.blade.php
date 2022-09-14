<!DOCTYPE html>
<html>
<head>
    <title>GotDemBeatz - @yield('title')</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/theme.css') }}">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
<header class="fixed-top header-bg py-md-3 py-2"> <div class="container"> <div class="row d-lg-none"> <div class="col-6"> <a class="navbar-brand" href="{{route('home')}}"><img src="../storage/settings/logo/{{$logo}}" width="200px" height="70px" alt="" class="img-fluid"></a> </div><div class="col-6 text-end align-self-center"> <button data-trigger="navbar_main" class="d-lg-none btn" type="button"> <img src="../frontend_assets/img/bar_img.png" alt="">  </button> </div></div></div><nav id="navbar_main" class="mobile-offcanvas navbar navbar-expand-lg header"> <div class="container-fluid justify-content-start navigation-padding"> <div class="offcanvas-header"> <button class="btn-close float-end">x</button> </div><a class="navbar-brand d-none d-lg-inline" href="{{route('home')}}"><img src="../storage/settings/logo/{{$logo}}" width="200px" height="70px" alt="" class=""></a> <ul class="navbar-nav mx-lg-auto mb-2 mb-lg-0"> <li class="nav-item"> <a class="nav-link" aria-current="page" href="{{route('home')}}">Home</a> </li><li class="nav-item"> <a class="nav-link" href="{{route('aboutus')}}">About</a> </li><li class="nav-item"> <a class="nav-link" href="{{route('membership')}}">Membership</a> </li><li class="nav-item"> <a class="nav-link" href="{{route('ourservices')}}">Our Services</a> </li><li class="nav-item"> <a class="nav-link" href="{{route('faqs')}}">FAQs</a > </li > <li class="nav-item"> <a href="{{route('all_beats')}}" class="nav-link" href="javascript:;">Beats</a> </li><li class="nav-item"> <a class="nav-link" href="{{route('contactus')}}">Contact</a></li></ul> <a href="{{route('cart')}}"><i class="fa badge" style="font-size:24px" value="{{ count((array) session('cart')) }}">&#xf07a;</i></a><form class="d-lg-flex justify-content-between"> <a class="btn-1 mx-2 text-white" href="{{route('register')}}"> Register </a> <a class="btn-2" href="{{route('login')}}">Log in</a> </form> </div></nav> </header>
<main>
        @yield('content')

        @yield('scripts')
        
    </main>    
  <script src="{{ asset('frontend_assets/js/footer.js') }}"></script>     
</body>

<!-- <script src="{{ asset('frontend_assets/js/plugins.js') }} " defer></script> -->
<!-- <script src="{{ asset('frontend_assets/js/theme.js') }} " defer></script>   -->


<!--
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/wavesurfer.js"></script> -->
</html>