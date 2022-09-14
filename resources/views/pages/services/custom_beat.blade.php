<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/img/favicon.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/theme.css') }}">
    <title>Contact Us</title>
</head>

<body>
<header class="fixed-top header-bg py-md-3 py-2"> <div class="container"> <div class="row d-lg-none"> <div class="col-6"> <a class="navbar-brand" href="{{route('home')}}"><img src="../storage/settings/logo/{{$logo}}" width="200px" height="70px" alt="" class="img-fluid"></a> </div><div class="col-6 text-end align-self-center"> <button data-trigger="navbar_main" class="d-lg-none btn" type="button"> <img src="../frontend_assets/img/bar_img.png" alt="">  </button> </div></div></div><nav id="navbar_main" class="mobile-offcanvas navbar navbar-expand-lg header"> <div class="container-fluid justify-content-start navigation-padding"> <div class="offcanvas-header"> <button class="btn-close float-end">x</button> </div><a class="navbar-brand d-none d-lg-inline" href="{{route('home')}}"><img src="../storage/settings/logo/{{$logo}}" width="200px" height="70px" alt="" class=""></a> <ul class="navbar-nav mx-lg-auto mb-2 mb-lg-0"> <li class="nav-item"> <a class="nav-link" aria-current="page" href="{{route('home')}}">Home</a> </li><li class="nav-item"> <a class="nav-link" href="{{route('aboutus')}}">About</a> </li><li class="nav-item"> <a class="nav-link" href="{{route('membership')}}">Membership</a> </li><li class="nav-item"> <a class="nav-link" href="{{route('ourservices')}}">Our Services</a> </li><li class="nav-item"> <a class="nav-link" href="{{route('faqs')}}">FAQs</a > </li > <li class="nav-item"> <a href="{{route('search')}}" class="nav-link" href="javascript:;">Beats</a> </li><li class="nav-item"> <a class="nav-link" href="{{route('contactus')}}">Contact</a></li></ul> <a href="{{route('cart')}}"><i class="fa badge" style="font-size:24px" value="{{ count((array) session('cart')) }}">&#xf07a;</i></a><form class="d-lg-flex justify-content-between"> <a class="btn-1 mx-2 text-white" href="{{route('register')}}"> Register </a> <a class="btn-2" href="{{route('login')}}">Log in</a> </form> </div></nav> </header>

    <main>
       <section style="background-image: url(../storage/settings/banner/{{$banner}});background-position: center;background-repeat: no-repeat;background-size: cover;height:320px;" class="d-flex justify-content-center align-items-center">
            <div class="container"> 
                <h1 class="banner_inner_title">Custom Beat</h1>
            </div>
        </section>
        <section class="services py-md-5 py-3 contact position-relative">
            <div class="container">
                <div class="row row-cols-2">
                    <div class="col py-md-5 py-3">
                        <span class="Contact_Us">Contact Us</span>
                        <h3 class="fs-2 position-relative new_title">For Custom beat/ Exclusive Rights</h3>
                            <div class="mt-5">
                                <p class="text-secondary p-0 text-capitalize">allow 1-5 business days for response</p>
                                <p class="text-secondary p-0 text-capitalize">no payment until the acceptance of project </p> 
                                <p class="text-secondary p-0 text-capitalize fw-bold">Contact: <a href="mailto:Blansky@Gotdembeatz.com"> Blansky@Gotdembeatz.com</a></p> 
                            </div>

                        <form action="#" class="row row-cols-md-2 row-cols-1 ">
                            <div class="col py-2">
                                <input type="text" class="form-control" placeholder="First name">
                            </div>
                            <div class="col py-2">
                                <input type="text" class="form-control" placeholder="Last name">
                            </div>
                            <div class="col py-2">
                                <input type="email" class="form-control" placeholder="Email address">
                            </div>
                            <div class="col py-2">
                                <input type="tel" class="form-control" placeholder="Phone Number">
                            </div>
                            <div class="col py-2">
                                <label class="fw-bold" for="producerSelect">Select the producer u would like</label>
                                <select class="form-select" id="producerSelect">
                                    <option>
                                        Rizzle
                                    </option>
                                    <option>
                                        Dbanks
                                    </option>
                                    <option>
                                        Blansky
                                    </option>
                                    <option>
                                        Ghost
                                    </option>
                                    <option>
                                        Damon Lamont
                                    </option>
                                    <option>
                                        7eventhsense
                                    </option>
                                </select>
                            </div>
                            <div class="col py-2">
                                <label class="fw-bold" for="producerSelect">Submit reference track</label>
                                <input type="file" class="form-control" >
                            </div>
                            <div class="col-12 py-2">
                                <textarea type="text" class="form-control" rows="6" placeholder="Message*"></textarea>

                                <button class="btn-1 text-white mt-4" type="submit">Submit Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="map_contact">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13004082.928417291!2d-104.65713107818928!3d37.275578278180674!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited%20States!5e0!3m2!1sen!2s!4v1648738131288!5m2!1sen!2s"
                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </section>
    </main>
    <script src="{{ asset('frontend_assets/js/footer.js') }}"></script>
</body>
<script src="{{ asset('frontend_assets/js/plugins.js') }} " defer></script>
<script src="{{ asset('frontend_assets/js/theme.js') }} " defer></script>

</html>