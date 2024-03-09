<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Required meta tags -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Outlined" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  {{-- <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" /> --}}

  <!-- Stylesheets -->
  <link rel="stylesheet" href="{{asset('front_asset/css/vendors.css')}}">
  <link rel="stylesheet" href="{{asset('front_asset/css/main.css')}}">
  <link rel="stylesheet" href="{{asset('front_asset/css/global.css')}}">

  <script src="{{asset('front_asset/js/jquery.min.js')}}"></script>


    @yield('custome_style')
  <!-- Favicon -->


  <title>DOS - Design Beginner</title>
</head>
<body class="preloader-visible" data-barba="wrapper" >
  <div class="preloader js-preloader">
    <div class="preloader__bg"></div>

    {{-- <div class="preloader__progress">
      <div class="preloader__progress__inner"></div>
      <img src="{{asset('front_asset/img/general/loader.svg')}}" alt="preloader image" class="preloader__img">
    </div> --}}
  </div>


  <!-- cursor start -->
  <div class="cursor js-cursor">
    <div class="cursor__wrapper">
      <div class="cursor__follower js-follower"></div>
      <div class="cursor__label js-label"></div>
      <div class="cursor__icon js-icon"></div>
    </div>
  </div>
    <div class="barba-container" data-barba="container">
        <main class="main-content  ">
            @include('layouts.front.header')
            <div class="content-wrapper  js-content-wrapper">
                @yield('content')

                @if (!Request::is('/'))
                  @include('layouts.front.footer')
                @endif
            </div>
        </main>
    </div>


    <script src="{{asset('front_asset/js/vendors.js')}}"></script>
    <script src="{{asset('front_asset/js/main.js')}}"></script>

    @yield('script')

</body>
</html>