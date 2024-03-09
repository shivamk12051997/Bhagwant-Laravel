@extends('layouts.front.app')
@section('custome_style')
<style>
    .background-video {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: -1; /* To place the video behind other content */
}
.background-video::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    /* background-color: rgba(0, 0, 0, 0.6); Change the opacity (last value) to adjust darkness */
    z-index: 0;
  }
  video {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Ensures video covers the entire container */
}
</style>
@endsection
@section('content')
<section class="masthead swiper-container js-slider">
    <div class="background-video" style="z-index: -1">
        <video id="background-video" autoplay loop muted>
            <source src="{{asset('front_asset/video/video-source.mp4')}}" type="video/mp4">
            <!-- Add additional source elements for other formats if desired -->
            Your browser does not support the video tag.
        </video>
       
    </div>
    <div class="swiper-wrapper" style="background">

      <div class="swiper-slide">
        <div class="container-fluid h-100 px-32">
          <div class="row align-items-center">
            <div class="col-lg-12">
              <div class="masthead__content js-content">
                <div data-split="lines" data-anim="split-lines" class="js-title-wrap">
                  <h1 class="masthead__title text-white js-title">
                    The House of The<br><span>Narrative Art</span>
                  </h1>
                </div>
                <div class="masthead__button js-button">
                  {{-- <a data-barba href="index.html#" class="button -simple text-white">
                    VIEW PROJECT
                  </a> --}}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="swiper-slide">
        <div class="container-fluid h-100 px-32">
          <div class="row align-items-center">
            <div class="col-lg-12">
              <div class="masthead__content js-content">
                <div data-split="lines" class="js-title-wrap">
                  <h1 class="masthead__title text-white js-title">
                    Catch seafood<br><span>Restaurant</span>
                  </h1>
                </div>
                <div class="masthead__button js-button">
                  {{-- <a data-barba href="index.html#" class="button -simple text-white">
                    VIEW PROJECT
                  </a> --}}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="swiper-slide">
        {{-- <div data-parallax="0.6" class="masthead__image" data-swiper-parallax="40%">
          <img data-parallax-target class="swiper-lazy" src="{{asset('front_asset/img/main-sliders/home-1/3.jpg')}}" alt="Slider image">
        </div> --}}

        <div class="container-fluid h-100 px-32">
          <div class="row align-items-center">
            <div class="col-lg-12">
              <div class="masthead__content js-content">
                <div data-split="lines" class="js-title-wrap">
                  <h1 class="masthead__title text-white js-title">
                    Re Future<br><span>Clinic</span>
                  </h1>
                </div>
                <div class="masthead__button js-button">
                  {{-- <a data-barba href="index.html#" class="button -simple text-white">
                    VIEW PROJECT
                  </a> --}}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <div class="masthead__pagination_numbers js-pag-numbers lg:d-none">
      
    </div>

    <div class="masthead__socials js-socials md:d-none">
      <div data-anim="slide-up" class="masthead__socials_item">
        <a class="text-white" href="index.html#">.Facebook</a>
        <a class="text-white" href="index.html#">.Instagram</a>
        {{-- <a class="text-white" href="index.html#">.Twitter</a> --}}
        {{-- <a class="text-white" href="index.html#">.Behance</a> --}}
      </div>
    </div>

    <div class="masthead-pagination js-pag">
      <div data-cursor class="masthead-pagination__item is-active js-pag-item">
        <span class="masthead-pagination__number">01</span>
        <h4 class="masthead-pagination__title md:d-none">The House of The<br>Narrative Art</h4>
        <span class="masthead-pagination__line"></span>
      </div>

      <div data-cursor class="masthead-pagination__item js-pag-item">
        <span class="masthead-pagination__number">02</span>
        <h4 class="masthead-pagination__title md:d-none">Catch seafood<br>Restaurant</h4>
        <span class="masthead-pagination__line"></span>
      </div>

      <div data-cursor class="masthead-pagination__item js-pag-item">
        <span class="masthead-pagination__number">03</span>
        <h4 class="masthead-pagination__title md:d-none">Re Future<br>Clinic</h4>
        <span class="masthead-pagination__line"></span>
      </div>
    </div>

    <div class="masthead__scroll js-scroll md:d-none">
      <div class="masthead__scroll_item">
        Scroll
        <div class="masthead__scroll_icon">
          <i class="icon icon-right-arrow"></i>
        </div>
      </div>
    </div>
  </section>
@endsection
