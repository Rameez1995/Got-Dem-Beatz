@extends('layout')
@section('title', 'Home')
@section('content')
    <main>
        <section>
            <img class="w-100" src="../storage/settings/banner/{{$banner}}">
        </section>
       
        <section class="tracks">
            <div class="col-12  text-center py-md-5 py-3">
                <h3 class="fs-1 position-relative">Beats</h3>
            </div>
            <div class="container-fluid">
                <div class="row px-5">
                    <div class="col-lg-11 align-items-center justify-content-between mx-auto">
                    <div class="row ">
                    @if(session('success'))
                    <div class="alert alert-success">
                    {{ session('success') }}
                    </div> 
                    @endif
                    
                    <div class="py-4" id="waveform"></div>
                        <div class="my-4">
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th></th>
                                        <th>listed</th>
                                        <th>Track</th>
                                        <th>Producer</th>
                                        <th>Time</th>
                                        <th>Bpm</th>
                                        <th class="tag" colspan="2">Tag</th>
                                        <th>View</th>
                                        <th>Share</th>
                                        <th>Download</th>
                                        <th>Buy</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    @foreach($songs as $key=>$song)
                                    <a href="javascript:void(0)">
                                    <tr valign="middle">
                                        <td class="td_size ">
                                            <img src="../storage/songs/{{ $song->image }}" class="img-fluid" alt="" width="60px" height="50">
                                        <button class="border-0 play-pause-button py-2 px-2 bg-transparent position-relative" value="{{ $song->song_file }}" 
                                        id="playSong" onclick="dosomething(this)">
                                           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="#fff" d="M512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256zM176 168V344C176 352.7 180.7 360.7 188.3 364.9C195.8 369.2 205.1 369 212.5 364.5L356.5 276.5C363.6 272.1 368 264.4 368 256C368 247.6 363.6 239.9 356.5 235.5L212.5 147.5C205.1 142.1 195.8 142.8 188.3 147.1C180.7 151.3 176 159.3 176 168V168z"/></svg>
                                        </button>
                                        </td>
                                        <td class="td_size"><a href="#" class="text-dark">{{ ++$key }}. <svg fill="#fe8e44"
                                                    class="heart" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 512 512">
                                                    <path
                                                        d="M0 190.9V185.1C0 115.2 50.52 55.58 119.4 44.1C164.1 36.51 211.4 51.37 244 84.02L256 96L267.1 84.02C300.6 51.37 347 36.51 392.6 44.1C461.5 55.58 512 115.2 512 185.1V190.9C512 232.4 494.8 272.1 464.4 300.4L283.7 469.1C276.2 476.1 266.3 480 256 480C245.7 480 235.8 476.1 228.3 469.1L47.59 300.4C17.23 272.1 .0003 232.4 .0003 190.9L0 190.9z" />
                                                </svg></a></td>
                                        <td class="td_size">{{$song->title}}</td>
                                        @if(isset($song->producers->name))
                                        <td class="td_size">{{$song->producers->name}}</td>
                                        @else
                                        <td class="td_size"></td>
                                        @endif
                                        <td class="td_size">{{$song->min}}:{{$song->sec}}</td>
                                        <td class="td_size">{{$song->bpm}}</td>
                                        <td class="tag td_size" colspan="2">
                                            @foreach($song->song_tags as $tags)
                                                <a href="./tag/{{$tags->tags}}" class="border py-2 px-3 d-inline-block" href="javscript:void(0)">{{$tags->tags}}.</a>
                                            @endforeach
                                                    
                                        </td>
                                        <td><a href="./beat/{{$song->id}}"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.1.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M279.6 160.4C282.4 160.1 285.2 160 288 160C341 160 384 202.1 384 256C384 309 341 352 288 352C234.1 352 192 309 192 256C192 253.2 192.1 250.4 192.4 247.6C201.7 252.1 212.5 256 224 256C259.3 256 288 227.3 288 192C288 180.5 284.1 169.7 279.6 160.4zM480.6 112.6C527.4 156 558.7 207.1 573.5 243.7C576.8 251.6 576.8 260.4 573.5 268.3C558.7 304 527.4 355.1 480.6 399.4C433.5 443.2 368.8 480 288 480C207.2 480 142.5 443.2 95.42 399.4C48.62 355.1 17.34 304 2.461 268.3C-.8205 260.4-.8205 251.6 2.461 243.7C17.34 207.1 48.62 156 95.42 112.6C142.5 68.84 207.2 32 288 32C368.8 32 433.5 68.84 480.6 112.6V112.6zM288 112C208.5 112 144 176.5 144 256C144 335.5 208.5 400 288 400C367.5 400 432 335.5 432 256C432 176.5 367.5 112 288 112z"/></svg></a></td>
                                        <td>
                                        @php
                                        echo \Share::page(
                                            'https://backend.hostingladz.com/webapp/beatpro/public/beat/'.$song->id,
                                        )
                                        ->facebook()
                                        ->twitter()
                                        ->whatsapp();   
                                        @endphp    
                                        </td>
                                        @php
                                        $user_id = Auth::id();
                                        $song_id = $song->id;
                                        $download_check=\App\Models\User_song::where(['user_id' => $user_id])->where(['song_id' => $song_id])->first();
                                        $subs_check=\App\Models\User::where(['id' => $user_id])->where(['subscription' => 1])->first();
                                        @endphp 
                                        @if(Auth::check() && isset($download_check))
                                        <td class="text-center">
                                        <a class=" px-3" href="../storage/songs/{{ $song->song_file }}" download><svg fill="#888888"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M480 352h-133.5l-45.25 45.25C289.2 409.3 273.1 416 256 416s-33.16-6.656-45.25-18.75L165.5 352H32c-17.67 0-32 14.33-32 32v96c0 17.67 14.33 32 32 32h448c17.67 0 32-14.33 32-32v-96C512 366.3 497.7 352 480 352zM432 456c-13.2 0-24-10.8-24-24c0-13.2 10.8-24 24-24s24 10.8 24 24C456 445.2 445.2 456 432 456zM233.4 374.6C239.6 380.9 247.8 384 256 384s16.38-3.125 22.62-9.375l128-128c12.49-12.5 12.49-32.75 0-45.25c-12.5-12.5-32.76-12.5-45.25 0L288 274.8V32c0-17.67-14.33-32-32-32C238.3 0 224 14.33 224 32v242.8L150.6 201.4c-12.49-12.5-32.75-12.5-45.25 0c-12.49 12.5-12.49 32.75 0 45.25L233.4 374.6z" />
                                                        </svg></a>
                                        </td>
                                        @elseif(Auth::check() && isset($subs_check))
                                        <td class="text-center">
                                        <a class=" px-3" href="../storage/songs/{{ $song->song_file }}" download><svg fill="#888888"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M480 352h-133.5l-45.25 45.25C289.2 409.3 273.1 416 256 416s-33.16-6.656-45.25-18.75L165.5 352H32c-17.67 0-32 14.33-32 32v96c0 17.67 14.33 32 32 32h448c17.67 0 32-14.33 32-32v-96C512 366.3 497.7 352 480 352zM432 456c-13.2 0-24-10.8-24-24c0-13.2 10.8-24 24-24s24 10.8 24 24C456 445.2 445.2 456 432 456zM233.4 374.6C239.6 380.9 247.8 384 256 384s16.38-3.125 22.62-9.375l128-128c12.49-12.5 12.49-32.75 0-45.25c-12.5-12.5-32.76-12.5-45.25 0L288 274.8V32c0-17.67-14.33-32-32-32C238.3 0 224 14.33 224 32v242.8L150.6 201.4c-12.49-12.5-32.75-12.5-45.25 0c-12.49 12.5-12.49 32.75 0 45.25L233.4 374.6z" />
                                                        </svg></a>
                                        </td>
                                        @elseif(Auth::check() && !isset($download_check) && !isset($subs_check))
                                        <td class="text-center"><a onclick="purchasealert()" class=" px-3" href="javscript:void(0)"><svg fill="#888888"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M480 352h-133.5l-45.25 45.25C289.2 409.3 273.1 416 256 416s-33.16-6.656-45.25-18.75L165.5 352H32c-17.67 0-32 14.33-32 32v96c0 17.67 14.33 32 32 32h448c17.67 0 32-14.33 32-32v-96C512 366.3 497.7 352 480 352zM432 456c-13.2 0-24-10.8-24-24c0-13.2 10.8-24 24-24s24 10.8 24 24C456 445.2 445.2 456 432 456zM233.4 374.6C239.6 380.9 247.8 384 256 384s16.38-3.125 22.62-9.375l128-128c12.49-12.5 12.49-32.75 0-45.25c-12.5-12.5-32.76-12.5-45.25 0L288 274.8V32c0-17.67-14.33-32-32-32C238.3 0 224 14.33 224 32v242.8L150.6 201.4c-12.49-12.5-32.75-12.5-45.25 0c-12.49 12.5-12.49 32.75 0 45.25L233.4 374.6z" />
                                                        </svg></a></td>
                                        @elseif(!isset($user_id))
                                        <td class="text-center"><a onclick="loginalert()" class=" px-3" href="javscript:void(0)"><svg fill="#888888"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M480 352h-133.5l-45.25 45.25C289.2 409.3 273.1 416 256 416s-33.16-6.656-45.25-18.75L165.5 352H32c-17.67 0-32 14.33-32 32v96c0 17.67 14.33 32 32 32h448c17.67 0 32-14.33 32-32v-96C512 366.3 497.7 352 480 352zM432 456c-13.2 0-24-10.8-24-24c0-13.2 10.8-24 24-24s24 10.8 24 24C456 445.2 445.2 456 432 456zM233.4 374.6C239.6 380.9 247.8 384 256 384s16.38-3.125 22.62-9.375l128-128c12.49-12.5 12.49-32.75 0-45.25c-12.5-12.5-32.76-12.5-45.25 0L288 274.8V32c0-17.67-14.33-32-32-32C238.3 0 224 14.33 224 32v242.8L150.6 201.4c-12.49-12.5-32.75-12.5-45.25 0c-12.49 12.5-12.49 32.75 0 45.25L233.4 374.6z" />
                                                        </svg></a></td>
                                        @endif
                                        <td>
                                        <a href="{{ route('add.to.cart', $song->id) }}" class="px-3">
                                                <svg fill="#888888" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M0 24C0 10.75 10.75 0 24 0H96C107.5 0 117.4 8.19 119.6 19.51L121.1 32H312V134.1L288.1 111C279.6 101.7 264.4 101.7 255 111C245.7 120.4 245.7 135.6 255 144.1L319 208.1C328.4 218.3 343.6 218.3 352.1 208.1L416.1 144.1C426.3 135.6 426.3 120.4 416.1 111C407.6 101.7 392.4 101.7 383 111L360 134.1V32H541.8C562.1 32 578.3 52.25 572.6 72.66L518.6 264.7C514.7 278.5 502.1 288 487.8 288H170.7L179.9 336H488C501.3 336 512 346.7 512 360C512 373.3 501.3 384 488 384H159.1C148.5 384 138.6 375.8 136.4 364.5L76.14 48H24C10.75 48 0 37.25 0 24V24zM224 464C224 490.5 202.5 512 176 512C149.5 512 128 490.5 128 464C128 437.5 149.5 416 176 416C202.5 416 224 437.5 224 464zM416 464C416 437.5 437.5 416 464 416C490.5 416 512 437.5 512 464C512 490.5 490.5 512 464 512C437.5 512 416 490.5 416 464z"/></svg>
                                                </a>
                                        </td>
                                        <td>
                                            
                                        </td>
                                    </tr>
                                    </a>
                                @endforeach  
                                </tbody>
                            </table>
                        </div>
                        <div class="text-center">
                            <a href="{{url('all_beats')}}" class="btn-1">All Beats</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <section class="tracks py-lg-5 py-3 " style="background-color: #fff;">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center services mb-5 pb-5">
                    <h3 class="fs-1">Drumkit and Loop Packs</h3>
                </div>
            </div>
            <div class=" row row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-1 gy-4">
            @foreach($drum_kit_loops as $drum_kit_loop)
            <div class="col"> 
                    <a href="{{ url('/drum_kit_loops/'.$drum_kit_loop->id) }}" class="d-block shadow bg-white rounded text-center text-decoration-none position-relative hover-scale">
                        <div class="drumkit-bage position-absolute">
                        @if($drum_kit_loop->type=="1")
                            Coming Soon
                        @elseif($drum_kit_loop->type=="2")
                             Sale
                        @elseif($drum_kit_loop->type=="3")
                             Hot
                        @elseif($drum_kit_loop->type=="4")
                            New Release
                        @endif
                        </div>
                        <div class="pt-5 pb-4 px-3 px-4">
                            <img src="../storage/drum_kit_loops/{{ $drum_kit_loop->image }}" alt="" class="drumkit-image">
                        </div>
                        <p class="fs-5 fw-bold text-dark">{{ $drum_kit_loop->title }}</p>
                        <div class="font-2 fw-bold pb-3"><span class="text-decoration-line-through text-red me-3">@if($drum_kit_loop->type=="2") ${{ $drum_kit_loop->strikethrough_price }} @endif</span><span class="text-dark">@if($drum_kit_loop->type!="1") ${{ $drum_kit_loop->price }} @endif</span></div>
                    </a>
            </div>
            @endforeach
            </div>
            
        </div>
    </section>

    <section class="membership py-5 py-3">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-8">
                        <div class="row row-cols-md-2 row-cols-1 align-items-center justify-content-center">
                            <div class="col">
                                <div class="img position-relative">
                                    <img src="../storage/membership/first_image/{{ $membership->first_image ?? 'No Image' }}" class="img-fluid " alt=" ">
                                </div>
                            </div>
                            <div class="col ">
                                <h2 class="fs-1 text-white pb-10 membership_title">Become A Member</h2>
                                <div class="minus">
                                    <p class="py-md-3 py-2">You’ve got plenty of tracks that need fine-tuning. We’ve got the tools and resources to make that happen. Become our member and get access to those as well as hundreds of original and high-quality beats.</p>
                                    <p class="py-3 py-2">And the best part? You won’t have to spend a fortune on that. As long as your membership is current, you’re free to use the beats. So, sign up for our membership today and create chart-topping music.
                                    </p>
                                    <a href="membership" class="btn-1">Become a Member</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 d-none d-lg-block">
                        <img src="../storage/membership/second_image/{{ $membership->second_image ?? 'No Image' }}" class="img-fluid " alt=" ">
                    </div>
                </div>
            </div>
        </section>

        <section class="services py-md-5 py-3 position-relative">
            <span class="our_services">Our Services</span>
            <div class="container">
                <div class="row">
                    <div class="col-12  text-center py-md-5 py-3">
                        <h3 class="fs-1 position-relative">Our Services</h3>
                        <p class="mx-auto width-50 pt-5 text-secondary">Whether you want to produce R&B music or release a hip-hop single, people will be dancing to the beats of your songs all day long with our help. </p>
                    </div>
                </div>
                <div class="row row-cols-md-3 row-cols-1">
                    @foreach($services as $key=>$service)
                    <div class="col mb-4 mb-md-0">
                        <div class="box border">
                            <img src="../storage/services/{{ $service->image }}" style="width:300px;height:300px;" class="w-100" alt="">

                            <div class="content p-4">
                                <h4>{{$service->name}}</h4>
                                <div class="py-md-4 py-2 text_dark">
                                    <!--{!! Str::limit($service->desc, 100) !!}                             -->
                                </div>
                                <a href="./services/{{ $service->url }}" class="btn-1 text-white">Read More</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>


        <section class="membership services contest py-lg-5 py-3">
            <div class="container">
                <div class="row">
                    <div class="col-12  text-center py-md-5 py-3">
                        <h3 class="fs-1 position-relative text-white">Spotlight</h3>
                        <p class="mx-auto width-50 pt-5 text-secondary text-white">From video games to television shows, we’ve produced blockbuster beats for clients across various industries.  </p>
                    </div>
                </div>
                <div class="row row-cols-md-4 row-cols-1">
                    @foreach($spotlights as $key=>$spotlight)
                    <div class="col mb-4 mb-md-0 text-center">
                        <div class="rounded-3">
                            <a href="javascript:void(0)" class="position-relative text-white fs-5 fw-bold">
                                <img src="../storage/spotlights/{{ $spotlight->image }}" class="img-fluid" alt="img">
                                <span class="position-absolute end-0 start-0">{{$spotlight->name}}</span>
                            </a>
                        </div>
                    </div>
                   @endforeach
                </div>
                 <div class="col-md-12 text-center pt-5">
                        <a href="./all_spotlights" class="btn-1 text-white">View All</a>
                </div>
            </div>
        </section>

        <section class="services py-md-5 py-3 contact position-relative">
            <span class="Contact_Us">Contact Us</span>
            <div class="container">
                <div class="row">
                    <div class="col-12  text-center py-md-5 py-3">
                        <h3 class="fs-1 position-relative">Contact Us</h3>
                        <p class="mx-auto width-50 pt-5 text-secondary">Do you have any questions related to our services? Feel free to send us a message, and we’ll try to get back ASAP. </p>
                    </div>
                </div>
                <form action="#">
                    <div class="row row-cols-md-2 row-cols-1 mx-auto width-50 ">
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
                    </div>
                    <div class="row mx-auto width-50 ">
                        <div class="col-12 py-2">
                            <textarea type="text" class="form-control" rows="6" placeholder="Message*"></textarea>
                            <button class="btn-1 text-white mt-4" type="submit">Submit Now</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="{{ asset('frontend_assets/js/plugins.js') }} " defer></script>
<script src="https://unpkg.com/wavesurfer.js"></script>
<script src="{{ asset('frontend_assets/js/theme.js') }} " defer></script>

<script>

let wavesurfer;

function dosomething(element){
    
        const createSongPlayer = () => {
            localStorage.setItem('music_current_song', element.value)

            wavesurfer?.destroy()
    
            wavesurfer = WaveSurfer.create({
                container: '#waveform',
                waveColor: '#fd743d',
                progressColor: 'rgb(254, 179, 78)'
            });
        }
    
        const playSvg = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="#fff" d="M512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256zM176 168V344C176 352.7 180.7 360.7 188.3 364.9C195.8 369.2 205.1 369 212.5 364.5L356.5 276.5C363.6 272.1 368 264.4 368 256C368 247.6 363.6 239.9 356.5 235.5L212.5 147.5C205.1 142.1 195.8 142.8 188.3 147.1C180.7 151.3 176 159.3 176 168V168z"/></svg>';
        const pauseSvg = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="#fff" d="M256 0C114.6 0 0 114.6 0 256s114.6 256 256 256s256-114.6 256-256S397.4 0 256 0zM224 191.1v128C224 337.7 209.7 352 192 352S160 337.7 160 320V191.1C160 174.3 174.3 160 191.1 160S224 174.3 224 191.1zM352 191.1v128C352 337.7 337.7 352 320 352S288 337.7 288 320V191.1C288 174.3 302.3 160 319.1 160S352 174.3 352 191.1z"/></svg>';
    
    
         $('.play-pause-button').each(function(index, item) {
            $(item).html(playSvg)
        })

        const getSongFromLocalStorage = localStorage.getItem('music_current_song')

        if(getSongFromLocalStorage === element.value) {
            
            try {
                wavesurfer.playPause()
                return;
            } catch {
                localStorage.removeItem('music_current_song')
                createSongPlayer();
            }
           
           
        }
        
        createSongPlayer();

const loadSong = wavesurfer.load('../storage/songs/'+element.value+'');

wavesurfer.on('pause', () => {
    $(element).html(playSvg)
})

wavesurfer.on('play', () => {
    $(element).html(pauseSvg)
})

wavesurfer.on('ready', () => {
    wavesurfer.playPause();
})

$('.controls .btn').on('click', function(){
      var action = $(this).data('action');
      switch (action) {
        case 'play':
          wavesurfer.playPause();
          break;
        case 'back':
          wavesurfer.skipBackward();
          break;
        case 'forward':
          wavesurfer.skipForward();
          break;
        case 'mute':
          wavesurfer.toggleMute();
          break;
      }
    });

    
};

function loginalert() {
    Swal.fire({
    // title: 'Error!',
    text: 'Please Log In To Download',
    icon: 'error',
    confirmButtonText: 'Close'
    })
}


function purchasealert() {
    Swal.fire({
    // title: 'Error!',
    text: 'Please Purchase this Beat to Download. \rYou can also purchase Membership to Download Beats!',
    icon: 'error',
    confirmButtonText: 'Close'
    })
}


</script>
@endsection