@extends('layout')
@section('title', 'Shopping Cart')
@section('content')
        <section style="background-image: url(../storage/settings/banner/{{$banner}});background-position: center;background-repeat: no-repeat;background-size: cover;height:320px;" class="d-flex justify-content-center align-items-center">
            <div class="container"> 
                <h1 class="banner_inner_title">Our Services</h1>
            </div>
        </section>
        @foreach($services as $key => $service)
        @if($key % 2 == 0)
        <section class="services services_section_inner_one">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 align-self-center mb-4 mb-md-0">
                        <h3 class="fs-1 position-relative new_title">{{ $service->name }}</h3>
                        <div class="text_dark my-4">
                            {!! $service->desc !!}
                        </div>
                        <div class="mt-4">
                            <a href="./services/{{ $service->slug }}" class="btn-1 text-white">Read More</a>
                        </div>
                    </div>
                    <div class="col-md-6 z-index-1">
                        <div class="position-relative text-center">
                            <img src="../storage/services/{{ $service->image }}" style="width:1920px;height:400px" class="img-fluid ">
                            <!--<img src="{{ asset('frontend_assets/img/img_inner_1_fixed.png') }}" alt="" class="img-fluid position-absolute img_fixed_one two">-->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @else
        <section class="services services_section_inner_one membership">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 z-index-1 mb-4 mb-md-0">
                        <div class="position-relative text-center">
                            <img src="../storage/services/{{ $service->image }}" style="width:1920px;height:400px" alt="" class="img-fluid ">
                            <!--<img src="{{ asset('frontend_assets/img/img_inner_1_fixed.png') }}" alt="" class="img-fluid position-absolute img_fixed_one">-->
                        </div>
                    </div>
                    <div class="col-md-6 align-self-center">
                        <h3 class="fs-1 position-relative new_title text-white">{{ $service->name }}</h3>
                        <div class="my-4">
                            {!! $service->desc !!}
                        </div>
                        <div class="mt-4">
                            <a href="./services/{{ $service->slug }}" class="btn-1 text-white">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endif
        @endforeach
@endsection