
<?php $__env->startSection('title', 'Home'); ?>
<?php $__env->startSection('content'); ?>
    
    <main>
<div class="py-5"></div>
         <section id="player" class="bg-color-orange position-fixed bottom-0 w-100 p-2 hide" style="z-index: 99;">
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="col-12">
                        <div class="">
                            <div id="mainwrap">
                               <div class="outer-container">
                                  <audio src="" id="track"></audio>
                                </div>
                                
                                <div class="player-container">
                                       <div class="track-info text-center fw-bold">
                                      <span id="track-artist"><div id="track-artist1"></div></span>
                                      <span>-</span>
                                      <span id="track-title"><div id="track-title1"></div></span>
                                    </div>
                                  <div class="box d-md-flex align-items-center">
                                  
                                 
                                    <div class="next-prev-play d-flex align-items-center justify-content-center">
                                      <i class="far fa-arrow-alt-circle-left fa-2x px-2" id="prev-track"></i>
                                        <div class="play-pause">
                                      <i class="far fa-play-circle fa-3x" id="play"></i>
                                      <i class="far fa-pause-circle fa-3x" id="pause"></i>
                                    </div>
                                      <i class="far fa-arrow-alt-circle-right fa-2x px-2" id="next-track"></i>
                                    </div>
                                    <div class="d-flex align-items-center w-100">
                                           <div class="progress-bar bg-transparent w-100">
                                      <input type="range" id="progressBar" min="0" max="" value="0" />
                                    </div>
                                    <div class="track-time px-2">
                                      <div id="currentTime"></div>
                                      <!--<div id="durationTime"></div>-->
                                    </div>
                                    </div>
                                  </div>
                                </div>
                                <!-- <div id="plwrap">
                            <ul id="plList"></ul>
                        </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <script type="text/javascript">
        document.getElementById("player").style.display = "none";
        </script>
       
        <section class="tracks">
            <div class="col-12  text-center py-md-5 py-3">
                <h3 class="fs-1 position-relative">All Beats</h3>
            </div>
            <div class="container-fluid">
                <div class="row px-xl-5 px-2">
                    <div class="col-lg-11 align-items-center justify-content-between mx-auto">
                    <div class="row ">
                    <?php if(session('success')): ?>
                    <div class="alert alert-success">
                    <?php echo e(session('success')); ?>

                    </div> 
                    <?php endif; ?>
                    
                    <div class="py-4" id="waveform"></div>
                        <div class="my-4 table-responsive track-list">
                            <table class="table ">
                                <thead>
                                    <tr class="none-mobile">
                                    <th></th>
                                        <th>Track</th>
                                        <th>Producer</th>
                                        <th>Time</th>
                                        <th>Bpm</th>
                                        <th class="tag">Tag</th>
                                        <th>View</th>
                                        <th>Share</th>
                                        <th>Download</th>
                                        <th>Buy</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php $__currentLoopData = $songs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$song): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="javascript:void(0)">
                                    <tr valign="middle">
                                        <td class="td_size">
                                            <img src="../storage/songs/<?php echo e($song->image); ?>" class="img-fluid" alt="" width="60" height="50">
                                        <button class="border-0 play-pause-button py-2 px-2 bg-transparent position-relative getsongvalue" value="<?php echo e($song->song_file); ?>" 
                                        id="playSong" onclick="dosomething(this,'<?php echo e($song->title); ?>','<?php echo e($song->producers->name); ?>','<?php echo e($key); ?>')">
                                        <input type="hidden" id="getsongfile<?php echo e($key); ?>" value="<?php echo e($song->song_file); ?>">
                                        <input type="hidden" id="getsongtitle<?php echo e($key); ?>" value="<?php echo e($song->title); ?>">
                                        <input type="hidden" id="getartistname<?php echo e($key); ?>" value="<?php echo e($song->producers->name); ?>">
                                           <svg id="svg_btn<?php echo e($key); ?>" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="#fff" d="M512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256zM176 168V344C176 352.7 180.7 360.7 188.3 364.9C195.8 369.2 205.1 369 212.5 364.5L356.5 276.5C363.6 272.1 368 264.4 368 256C368 247.6 363.6 239.9 356.5 235.5L212.5 147.5C205.1 142.1 195.8 142.8 188.3 147.1C180.7 151.3 176 159.3 176 168V168z"/></svg>
                                           <input type="hidden" id="svgbuttonstatus<?php echo e($key); ?>" value=start>
                                        </button>
                                        </td>
                                        <td class="td_size"><?php echo e($song->title); ?></td>
                                        <?php if(isset($song->producers->name)): ?>
                                        <td class="td_size none-mobile"><?php echo e($song->producers->name); ?></td>
                                        <?php else: ?>
                                        <td class="td_size"></td>
                                        <?php endif; ?>
                                        <td class="td_size none-mobile"><?php echo e($song->min); ?>:<?php echo e($song->sec); ?></td>
                                        <td class="td_size none-mobile"><?php echo e($song->bpm); ?></td>
                                        <td class="tag td_size none-mobile">
                                            <?php $__currentLoopData = $song->song_tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tags): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <a href="./tag/<?php echo e($tags->tags); ?>" class="border py-2 px-3 d-inline-block" href="javscript:void(0)"><?php echo e($tags->tags); ?>.</a>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    
                                        </td>
                                        <td class="none-mobile"><a href="./beat/<?php echo e($song->id); ?>"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.1.2 by @fontawesome  - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M279.6 160.4C282.4 160.1 285.2 160 288 160C341 160 384 202.1 384 256C384 309 341 352 288 352C234.1 352 192 309 192 256C192 253.2 192.1 250.4 192.4 247.6C201.7 252.1 212.5 256 224 256C259.3 256 288 227.3 288 192C288 180.5 284.1 169.7 279.6 160.4zM480.6 112.6C527.4 156 558.7 207.1 573.5 243.7C576.8 251.6 576.8 260.4 573.5 268.3C558.7 304 527.4 355.1 480.6 399.4C433.5 443.2 368.8 480 288 480C207.2 480 142.5 443.2 95.42 399.4C48.62 355.1 17.34 304 2.461 268.3C-.8205 260.4-.8205 251.6 2.461 243.7C17.34 207.1 48.62 156 95.42 112.6C142.5 68.84 207.2 32 288 32C368.8 32 433.5 68.84 480.6 112.6V112.6zM288 112C208.5 112 144 176.5 144 256C144 335.5 208.5 400 288 400C367.5 400 432 335.5 432 256C432 176.5 367.5 112 288 112z"/></svg></a></td>
                                        <td class="td-size">
                                            
                                            <span onclick="share(<?php echo e($key); ?>)" class="share" tabindex="0" role="button">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome  - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M352 224c53 0 96-43 96-96s-43-96-96-96s-96 43-96 96c0 4 .2 8 .7 11.9l-94.1 47C145.4 170.2 121.9 160 96 160c-53 0-96 43-96 96s43 96 96 96c25.9 0 49.4-10.2 66.6-26.9l94.1 47c-.5 3.9-.7 7.8-.7 11.9c0 53 43 96 96 96s96-43 96-96s-43-96-96-96c-25.9 0-49.4 10.2-66.6 26.9l-94.1-47c.5-3.9 .7-7.8 .7-11.9s-.2-8-.7-11.9l94.1-47C302.6 213.8 326.1 224 352 224z"/></svg>
                                            </span>
                                        </td>
                                        <td class="d-none">
                                        <?php
                                        echo \Share::page(
                                            'https://backend.hostingladz.com/webapp/beatpro/public/beat/'.$song->id,
                                        )
                                        ->facebook()
                                        ->twitter()
                                        ->whatsapp();   
                                        ?>    
                                        </td>
                                        <?php
                                        $user_id = Auth::id();
                                        $song_id = $song->id;
                                        $download_check=\App\Models\User_song::where(['user_id' => $user_id])->where(['song_id' => $song_id])->first();
                                        $subs_check=\App\Models\User::where(['id' => $user_id])->where(['subscription' => 1])->first();
                                        ?> 
                                        <?php if(Auth::check() && isset($download_check)): ?>
                                        <td class="text-center">
                                        <a class=" px-3" href="../storage/songs/<?php echo e($song->song_file); ?>" download><svg fill="#888888"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M480 352h-133.5l-45.25 45.25C289.2 409.3 273.1 416 256 416s-33.16-6.656-45.25-18.75L165.5 352H32c-17.67 0-32 14.33-32 32v96c0 17.67 14.33 32 32 32h448c17.67 0 32-14.33 32-32v-96C512 366.3 497.7 352 480 352zM432 456c-13.2 0-24-10.8-24-24c0-13.2 10.8-24 24-24s24 10.8 24 24C456 445.2 445.2 456 432 456zM233.4 374.6C239.6 380.9 247.8 384 256 384s16.38-3.125 22.62-9.375l128-128c12.49-12.5 12.49-32.75 0-45.25c-12.5-12.5-32.76-12.5-45.25 0L288 274.8V32c0-17.67-14.33-32-32-32C238.3 0 224 14.33 224 32v242.8L150.6 201.4c-12.49-12.5-32.75-12.5-45.25 0c-12.49 12.5-12.49 32.75 0 45.25L233.4 374.6z" />
                                                        </svg></a>
                                        </td>
                                        <?php elseif(Auth::check() && isset($subs_check)): ?>
                                        <td class="text-center">
                                        <a class=" px-3" href="../storage/songs/<?php echo e($song->song_file); ?>" download><svg fill="#888888"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M480 352h-133.5l-45.25 45.25C289.2 409.3 273.1 416 256 416s-33.16-6.656-45.25-18.75L165.5 352H32c-17.67 0-32 14.33-32 32v96c0 17.67 14.33 32 32 32h448c17.67 0 32-14.33 32-32v-96C512 366.3 497.7 352 480 352zM432 456c-13.2 0-24-10.8-24-24c0-13.2 10.8-24 24-24s24 10.8 24 24C456 445.2 445.2 456 432 456zM233.4 374.6C239.6 380.9 247.8 384 256 384s16.38-3.125 22.62-9.375l128-128c12.49-12.5 12.49-32.75 0-45.25c-12.5-12.5-32.76-12.5-45.25 0L288 274.8V32c0-17.67-14.33-32-32-32C238.3 0 224 14.33 224 32v242.8L150.6 201.4c-12.49-12.5-32.75-12.5-45.25 0c-12.49 12.5-12.49 32.75 0 45.25L233.4 374.6z" />
                                                        </svg></a>
                                        </td>
                                        <?php elseif(Auth::check() && !isset($download_check) && !isset($subs_check)): ?>
                                        <td class="text-center"><a onclick="purchasealert()" class=" px-3" href="javscript:void(0)"><svg fill="#888888"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M480 352h-133.5l-45.25 45.25C289.2 409.3 273.1 416 256 416s-33.16-6.656-45.25-18.75L165.5 352H32c-17.67 0-32 14.33-32 32v96c0 17.67 14.33 32 32 32h448c17.67 0 32-14.33 32-32v-96C512 366.3 497.7 352 480 352zM432 456c-13.2 0-24-10.8-24-24c0-13.2 10.8-24 24-24s24 10.8 24 24C456 445.2 445.2 456 432 456zM233.4 374.6C239.6 380.9 247.8 384 256 384s16.38-3.125 22.62-9.375l128-128c12.49-12.5 12.49-32.75 0-45.25c-12.5-12.5-32.76-12.5-45.25 0L288 274.8V32c0-17.67-14.33-32-32-32C238.3 0 224 14.33 224 32v242.8L150.6 201.4c-12.49-12.5-32.75-12.5-45.25 0c-12.49 12.5-12.49 32.75 0 45.25L233.4 374.6z" />
                                                        </svg></a></td>
                                        <?php elseif(!isset($user_id)): ?>
                                        <td class="text-center"><a onclick="loginalert()" class=" px-3" href="javscript:void(0)"><svg fill="#888888"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M480 352h-133.5l-45.25 45.25C289.2 409.3 273.1 416 256 416s-33.16-6.656-45.25-18.75L165.5 352H32c-17.67 0-32 14.33-32 32v96c0 17.67 14.33 32 32 32h448c17.67 0 32-14.33 32-32v-96C512 366.3 497.7 352 480 352zM432 456c-13.2 0-24-10.8-24-24c0-13.2 10.8-24 24-24s24 10.8 24 24C456 445.2 445.2 456 432 456zM233.4 374.6C239.6 380.9 247.8 384 256 384s16.38-3.125 22.62-9.375l128-128c12.49-12.5 12.49-32.75 0-45.25c-12.5-12.5-32.76-12.5-45.25 0L288 274.8V32c0-17.67-14.33-32-32-32C238.3 0 224 14.33 224 32v242.8L150.6 201.4c-12.49-12.5-32.75-12.5-45.25 0c-12.49 12.5-12.49 32.75 0 45.25L233.4 374.6z" />
                                                        </svg></a></td>
                                        <?php endif; ?>
                                        <td>
                                        <a href="<?php echo e(route('add.to.cart', $song->id)); ?>" class="px-3">
                                                <svg fill="#888888" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome  - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M0 24C0 10.75 10.75 0 24 0H96C107.5 0 117.4 8.19 119.6 19.51L121.1 32H312V134.1L288.1 111C279.6 101.7 264.4 101.7 255 111C245.7 120.4 245.7 135.6 255 144.1L319 208.1C328.4 218.3 343.6 218.3 352.1 208.1L416.1 144.1C426.3 135.6 426.3 120.4 416.1 111C407.6 101.7 392.4 101.7 383 111L360 134.1V32H541.8C562.1 32 578.3 52.25 572.6 72.66L518.6 264.7C514.7 278.5 502.1 288 487.8 288H170.7L179.9 336H488C501.3 336 512 346.7 512 360C512 373.3 501.3 384 488 384H159.1C148.5 384 138.6 375.8 136.4 364.5L76.14 48H24C10.75 48 0 37.25 0 24V24zM224 464C224 490.5 202.5 512 176 512C149.5 512 128 490.5 128 464C128 437.5 149.5 416 176 416C202.5 416 224 437.5 224 464zM416 464C416 437.5 437.5 416 464 416C490.5 416 512 437.5 512 464C512 490.5 490.5 512 464 512C437.5 512 416 490.5 416 464z"/></svg>
                                                </a>
                                        </td>
                                        <td>
                                            
                                        </td>
                                    </tr>
                                    </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                                </tbody>
                            </table>
                        </div>
                         <div class="d-flex justify-content-center flex-wrap">
                                <?php echo $songs->links(); ?>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        
    <!-- share modal -->
    <?php $__currentLoopData = $songs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$sharesong): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="modal fade" id="shareModal<?php echo e($key); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true"
    role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="text-center">Share Link on Social Media</h5>
                <button type="button" class="close" aria-label="Close" onclick="closeModal(<?php echo e($key); ?>)">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div style="display: flex;justify-content: center;">
               <?php
                echo \Share::page(
                'https://backend.hostingladz.com/webapp/beatpro/public/beat/'.$sharesong->id,
                )
                ->facebook()
                ->twitter()
                ->whatsapp();   
                ?>    
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.js" type="text/javascript"></script>
<script src="<?php echo e(asset('frontend_assets/js/plugins.js')); ?> " defer></script>
<script src="<?php echo e(asset('frontend_assets/js/theme.js')); ?> " defer></script>



<script type="text/javascript">



function dosomething(element,title,artist,key){
const track = document.getElementById("track");
const thumbnail = document.getElementById("thumbnail");
const background = document.getElementById("background");
const trackArtist = document.getElementById("track-artist");
const trackTitle = document.getElementById("track-title");
const progressBar = document.getElementById("progressBar");
const currentTime = document.getElementById("currentTime");
const durationTime = document.getElementById("durationTime");

const playSvg = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="#fff" d="M512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256zM176 168V344C176 352.7 180.7 360.7 188.3 364.9C195.8 369.2 205.1 369 212.5 364.5L356.5 276.5C363.6 272.1 368 264.4 368 256C368 247.6 363.6 239.9 356.5 235.5L212.5 147.5C205.1 142.1 195.8 142.8 188.3 147.1C180.7 151.3 176 159.3 176 168V168z"/></svg>';
const pauseSvg = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="#fff" d="M256 0C114.6 0 0 114.6 0 256s114.6 256 256 256s256-114.6 256-256S397.4 0 256 0zM224 191.1v128C224 337.7 209.7 352 192 352S160 337.7 160 320V191.1C160 174.3 174.3 160 191.1 160S224 174.3 224 191.1zM352 191.1v128C352 337.7 337.7 352 320 352S288 337.7 288 320V191.1C288 174.3 302.3 160 319.1 160S352 174.3 352 191.1z"/></svg>';



let play = document.getElementById("play");
let pause = document.getElementById("pause");
let next = document.getElementById("next-track");
let prev = document.getElementById("prev-track");
let playing = document.getElementById("svgbuttonstatus".concat(key)).value;


if (playing=="start" ) {
$("#track").attr("src",'../storage/songs/'+element.value+'');
}

trackArtist.textContent = artist;
trackTitle.textContent = title;

let tracks=""
trackIndex = 0;

// tracks = [
//   '../storage/songs/'+previous_track_value+'',
//   '../storage/songs/'+element.value+'',
//   '../storage/songs/'+next_track_value+''
// ];

tracks = [];
trackArtists = [];
trackTitles = [];
for (var i = 0; i < 50; ++i) {
    songfile=document.getElementById("getsongfile".concat(i)).value
    songtitle=document.getElementById("getsongtitle".concat(i)).value
    artistname=document.getElementById("getartistname".concat(i)).value
    tracks[i]= "../storage/songs/"+songfile+'';
    trackArtists[i]= artistname;
    trackTitles[i]= songtitle;
}


// thumbnails = [
//   "https://i.ibb.co/7RhfRBZ/Fine-Line-Harry-Styles.jpg",
//   "https://i.ibb.co/7RhfRBZ/Fine-Line-Harry-Styles.jpg",
//   "https://i.ibb.co/7RhfRBZ/Fine-Line-Harry-Styles.jpg"
// ];

//let playing = true;




function pausePlay() {
   console.log(playing)
  if (playing=="true" || playing==true || playing=="start") {
    play.style.display = "none";
    pause.style.display = "block";
    track.play();
    playing = false;
    $("#svg_btn".concat(key)).html(pauseSvg);
    
    for (var i = 0; i < 50; ++i) {
      if(i==key)
      {
          i++
      }
      else{
        $("#svg_btn".concat(i)).html(playSvg)
      }
    }
    
    $("#player").show();
    console.log("play")
    document.getElementById("svgbuttonstatus".concat(key)).value =false;
    
  } else if(playing=="false" || playing==false) {
    pause.style.display = "none";
    play.style.display = "block";
    track.pause();
    playing = true;
    $("#svg_btn".concat(key)).html(playSvg)
    $("#player").show();
    console.log("pause")
    document.getElementById("svgbuttonstatus".concat(key)).value =true;


  }
}

pausePlay();

play.addEventListener("click", pausePlay);
pause.addEventListener("click", pausePlay);

track.addEventListener("ended", nextTrack);

function nextTrack() {

  if(key==49)
  {
    nexttrackindex=0
    key=0
  }
  else{
    nexttrackindex=++key
  }

  track.src = tracks[nexttrackindex];

  trackArtist.textContent = trackArtists[nexttrackindex];
  trackTitle.textContent = trackTitles[nexttrackindex];

  playing = true;
  pausePlay();
}

next.addEventListener("click", nextTrack);

function prevTrack() {
  if(key==0)
  {
    prevtrackindex=49
    key=49
  }
  else{
    prevtrackindex=--key
  }

  track.src = tracks[prevtrackindex];

  trackArtist.textContent = trackArtists[prevtrackindex];
  trackTitle.textContent = trackTitles[prevtrackindex];

  playing = true;
  pausePlay();
}

prev.addEventListener("click", prevTrack);

function progressValue() {
  progressBar.max = track.duration;
  progressBar.value = track.currentTime;

  currentTime.textContent = formatTime(track.currentTime);
//   durationTime.textContent = formatTime(track.duration);
}

setInterval(progressValue, 500);

function formatTime(sec) {
  let minutes = Math.floor(sec / 60);
  let seconds = Math.floor(sec - minutes * 60);
  if (seconds < 10) {
    seconds = `0${seconds}`;
  }
  return `${minutes}:${seconds}`;
}

function changeProgressBar() {
  track.currentTime = progressBar.value;
}

progressBar.addEventListener("click", changeProgressBar);

};

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
function loginalert() {
    Swal.fire({
    // title: 'Error!',
    text: 'Please Log In To Download',
    icon: 'error',
    confirmButtonText: 'Close'
    })
}

function share(key) {
    document.getElementById("shareModal".concat(key)).style.display = "block"
    document.getElementById("shareModal".concat(key)).classList.add("show")
}

function closeModal(key){
    document.getElementById("shareModal".concat(key)).style.display = "none"
    document.getElementById("shareModal".concat(key)).classList.add("hide")
}


function purchasealert() {
    Swal.fire({
    // title: 'Error!',
    text: 'Please Purchase this Beat to Download. \rYou can also purchase Membership to Download Beats!',
    icon: 'error',
    confirmButtonText: 'Close'
    })
}

  var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl)
        })

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/backendhostingla/public_html/webapp/beatpro/resources/views/pages/all_tracks.blade.php ENDPATH**/ ?>