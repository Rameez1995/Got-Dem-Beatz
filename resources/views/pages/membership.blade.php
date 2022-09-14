@extends('layout')
@section('title', 'Membership')
@section('content')
    <main>
       <section style="background-image: url(../storage/settings/banner/{{$banner}});background-position: center;background-repeat: no-repeat;background-size: cover;height:320px;" class="d-flex justify-content-center align-items-center">
            <div class="container"> 
                <h1 class="banner_inner_title">Membership</h1>
            </div>
        </section>
        <section class="membership_inner_section my-5 py-md-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-5 text-center">
                        <div class="membership_box bg_orange">
                            <h2 class="color_dard_grey title_box">Elite VIP <span>/ (Premium) </span></h2>
                            <h3 class="color-orange title_box_2">$36.99 <span>/ (Monthly) </span></h3>
                            <ul>
                                <li class="mb-2"><span class="color-orange me-2">&#10004;</span>Access to download.</li>                                
                                <li class="mb-2"><span class="color-orange me-2"></span>Beats without the hassle of single purchase beat lease.</li>
                                <li class="mb-2"><span class="color-orange me-2"></span>Variety of Producers to choose beats from.</li>
                                <li class="mb-2"><span class="color-orange me-2">&#10004;</span>10 Downloads per month.</li>
                                <li class="mb-2"><span class="color-orange me-2">&#10004;</span>30 New Beats updated monthly.</li>
                            </ul>
                            <h4 class="color_dard_grey title_box">Detail</h4>
                            <ul>
                                <li class="mb-2"><span class="color-orange me-2"></span>Beat Lease for Premium Members are valid with active paid membership.</li>
                                <li class="mb-2"><span class="color-orange me-2"></span>High Quality mp3 format included with membership beat lease.</li>
                                <li class="mb-2"><span class="color-orange me-2"></span>Exclusive Rights are upon request contact producer for exclusive rights. </li>
                                <li class="mb-4"><span class="color-orange me-2"></span>Wav and trackout files are upon request and are given with purchase of exclusive rights.</li>
                            </ul>
                            
                            <div class="mb-3">
                                <a href="https://backend.hostingladz.com/webapp/beatpro/public/user/membership" class="box_button">Join Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('scripts')
<script src="{{ asset('frontend_assets/js/plugins.js') }} " defer></script>
<script src="{{ asset('frontend_assets/js/theme.js') }} " defer></script>
@endsection