@extends('dashboard.front.layouts.app')

@section('page_title', 'Dashboard')

@section('content')
<div class="main_content ">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="rounded-30 p-xxl-5 p-xl-3 p-3 mb-3 tracks" style="background: rgb(25 28 35 / 40%) !important;">
                            <p><svg class="headphone" fill="#fe8e44" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path    d="M256 32C112.9 32 4.563 151.1 0 288v104C0 405.3 10.75 416 23.1 416S48 405.3 48 392V288c0-114.7 93.34-207.8 208-207.8C370.7 80.2 464 173.3 464 288v104C464 405.3 474.7 416 488 416S512 405.3 512 392V287.1C507.4 151.1 399.1 32 256 32zM160 288L144 288c-35.34 0-64 28.7-64 64.13v63.75C80 451.3 108.7 480 144 480L160 480c17.66 0 32-14.34 32-32.05v-127.9C192 302.3 177.7 288 160 288zM368 288L352 288c-17.66 0-32 14.32-32 32.04v127.9c0 17.7 14.34 32.05 32 32.05L368 480c35.34 0 64-28.7 64-64.13v-63.75C432 316.7 403.3 288 368 288z"/></svg>
                                <span class="fs-5 text-grey ps-2">My Drum Kits and Loops</span>
                            </p>

                            <div class="table-responsive my-4 text-white">
                                <table class="table">
                                    <thead class="">
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Description</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($drum_kit_loops as $key=>$drum_kit_loop)
                                        <tr style="display: table-row;">
                                        <td>{{ ++$key }}.</td>
                                        <td>{{ $drum_kit_loop->title }}</td>
                                        <td><img src="../storage/drum_kit_loops/{{ $drum_kit_loop->image }}" width="100px" height="50px"></td>
                                        <td>{{ Str::limit($drum_kit_loop->desc, 40) }}</td>
                                        <td >{{ $drum_kit_loop->price }}</td>
                                        </tr>
                                      @endforeach  
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <!--    <div class="wrapper position-fixed w-100 py-4 player_bar d-flex align-items-center start-0 bottom-0" style="background:rgb(44 48 56) !important; height: 120px;">-->
    <!--    <div class="container-fluid">-->
    <!--        <div class="row">-->
    <!--            <div class="col-12  d-flex align-items-center justify-content-center">-->
    <!--                <div class="img-area">-->
    <!--                    <img src="" alt="" width="50px" height="50px">-->
    <!--                </div>-->

    <!--                <div class="song-details fs-14 px-3 border-end">-->
    <!--                    <p class="name text-white"></p>-->
    <!--                    <p class="artist text-grey"></p>-->
    <!--                </div>-->

    <!--                <div class="controls px-4">-->
    <!--                    <i id="prev" class="fa-solid fa-backward-step text-white"></i>-->
    <!--                    <div class="play-pause mx-4">-->
    <!--                        <i id="printing_div" class="material-icons play text-white">play_arrow</i>-->
    <!--                    </div>-->
    <!--                    <i id="next" class="fa-solid fa-forward-step text-white"></i>-->
    <!--                </div>-->

    <!--                <div class="progress-area">-->
    <!--                    <div class="progress-bar">-->
    <!--                        <audio id="main-audio" src=""></audio>-->
    <!--                    </div>-->
    <!--                    <div class="song-timer">-->
    <!--                        <span class="current-time text-white">0:00</span>-->
    <!--                        <span class="max-duration text-white">0:00</span>-->
    <!--                    </div>-->
    <!--                </div>-->

    <!--                <div class="controls">-->
    <!--                    <i id="repeat-plist" class="material-icons px-2 text-white" title="Playlist looped">repeat</i>-->
    <!--                    <i id="more-music" class="fa-solid fa-music px-2 text-white"></i>-->
    <!--                    <i id="more-music" class="fa-solid fa-volume-high px-2 text-white"></i>-->
    <!--                </div>-->

    <!--                <div class="music-list">-->
    <!--                    <div class="header">-->
    <!--                        <div class="row">-->
    <!--                            <i class="list material-icons">queue_music</i>-->
    <!--                            <span>Music list</span>-->
    <!--                        </div>-->
    <!--                        <i id="close" class="material-icons">close</i>-->
    <!--                    </div>-->
    <!--                    <ul class="musicList">-->
                            <!-- here li list are coming from js -->
    <!--                    </ul>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
@endsection

@section('bottom_script')
@endsection