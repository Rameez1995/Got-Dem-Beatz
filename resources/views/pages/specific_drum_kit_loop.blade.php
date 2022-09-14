@extends('layout')
@section('title', 'Drum Loop / Kit')
@section('content')
    <main>
        <section class=" py-5 pb-3"></section>
        <section class=" py-80">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 text-center mb-3 mb-lg-0">
                        <img src="../storage/drum_kit_loops/{{ $drum_kit_loop->image }}" alt="" class="img-fluid album-singal-image">
                    </div>
                    <div class="col-lg-5">
                        <h2 class="fs-1 text-uppercase after-none py-0">{{$drum_kit_loop->title}}</h2>
                        <div class="font-2 fw-bold pb-3">@if($drum_kit_loop->type=="2") <span class="text-decoration-line-through text-red me-3">${{ $drum_kit_loop->strikethrough_price }}</span> @endif @if($drum_kit_loop->type!="1")<span class="me-3"> ${{ $drum_kit_loop->price }} </span>@endif<span class="drumkit-bage" style="">@if($drum_kit_loop->type=="1")
                            Coming Soon
                        @elseif($drum_kit_loop->type=="2")
                             Sale
                        @elseif($drum_kit_loop->type=="3")
                             Hot
                        @elseif($drum_kit_loop->type=="4")
                            New Release
                        @endif</span></div>
                        @if(isset($drum_loop_status))
                        <a href="../storage/drum_kit_loops/{{ $drum_kit_loop->file }}" class="btn-1 d-block text-center text-white text-decoration-none" download>Download Material</a>
                        @else
                        <form action="{{ route('checkout_drum_kits_loops') }}" method="POST">
                        @csrf
                        <input type="hidden" name="drum_kit_loop_id" value="{{ $drum_kit_loop->id }}">
                        <button type="submit" class="btn-1 d-block text-center text-white text-decoration-none">Place Order</button>
                        </form>
                        @endif
                        <p class="py-md-3 py-2">{{$drum_kit_loop->desc}}</p>
                    </div>
                </div>
            </div>
        </section>
    </main>
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
</script>
@endsection