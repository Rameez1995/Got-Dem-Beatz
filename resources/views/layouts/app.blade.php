<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@if($webSettings) {{ $webSettings->site_title }} @else {{ config('app.name', 'Laravel') }} @endif</title>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
    integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <!-- App Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link rel="shortcut icon" href="assets/img/favicon.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/theme.css') }}">
    
    <script src="https://kit.fontawesome.com/6f917e9db0.js" crossorigin="anonymous"></script>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
  @yield('head_styles')

</head>

<style>
    #background {
  object-fit: cover;
  height: 100vh;
  width: 100vw;
  margin: auto;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  filter: blur(7px);
  z-index: -1;
}

.outer-container {
  display: flex;
  justify-content: center;
  align-items: center;
  position: relative;
}

.player-container {
  display: flex;
  flex-direction: column;
  position: absolute;
  height: 400px;
  width: 325px;
  margin: auto;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  overflow: hidden;
  display: flex;
  justify-content: center;
  align-items: center;
  border-radius: 10px;
  box-shadow: 0 0 30px #f94c57;
}

#thumbnail {
  position: absolute;
  object-fit: fill;
  height: 100%;
  width: 100%;
  top: -10%;
  transition: 1s;
  z-index: 3;
}

.box {
  position: absolute;
  height: 45%;
  width: 100%;
  background: linear-gradient(90deg, rgb(145, 145, 145), rgb(220, 220, 220));
  z-index: 4;
  bottom: -10%;
  display: grid;
  grid-template-colums: 35px 255px 35px;
  grid-template-rows: 85px 25px 25px;
  grid-template-areas:
    "one two two three"
    "four four four four"
    "five five five five";
  column-gap: 10px;
}

.play-pause {
  grid-area: one;
  display: flex;
  justify-content: flex-end;
  align-items: center;
}
.fa-pause-circle {
  filter: invert(1);
  cursor: pointer;
  display: none;
}

#play,
#prev-track,
#next-track {
  filter: invert(1);
  cursor: pointer;
}

.track-info {
  grid-area: two;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: flex-start;
  padding-left: 5%;
  /* border: 1px solid red; */
}

#track-artist {
  color: #f94c57;
  font-family: "Lato", sans-serif;
  font-weight: bold;
  font-size: 1.125rem;
  text-shadow: 0 0 15px white;
}

#track-title {
  color: white;
  font-family: "Lato", sans-serif;
  font-size: 1rem;
}

.next-prev {
  grid-area: three;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: flex-start;
  /* border: 1px solid red; */
}

.progress-bar {
  grid-area: four;
  display: flex;
  justify-content: center;
  align-items: center;
  /* border: 1px solid red; */
}

#progressBar {
  appearance: none;
  height: 5px;
  background: white;
  width: 57.5%;
  outline: none;
  border-radius: 30px;
}

#progressBar::-webkit-slider-thumb {
  appearance: none;
  height: 11px;
  width: 11px;
  outline: none;
  background: #f94c57;
  border-radius: 30px;
  cursor: pointer;
}

.track-time {
  grid-area: five;
  display: flex;
  justify-content: space-around;
  align-items: flex-start;
  /* border: 1px solid red; */
}

#currentTime {
  font-family: "Lato", sans-serif;
  font-size: 1rem;
  color: white;
}

#durationTime {
  font-family: "Lato", sans-serif;
  font-size: 1rem;
  color: #f94c57;
  text-shadow: 0 0 15px white;
}

</style>

<body>
  <div id="app">
  

    <main class="py-4">
      <div class="container">
        {{ $slot }}
      </div>
    </main>

  <script src="{{ asset('frontend_assets/js/footer.js') }}"></script>

  </div>


  <!-- jQuery -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
  </script>

  <!-- App Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
  @stack('bottom_scripts')
</body>

</html>