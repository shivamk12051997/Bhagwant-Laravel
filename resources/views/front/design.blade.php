@extends('layouts.front.app')

@section('custome_style')
<link href="front_asset\lity\lity.min.css" rel="stylesheet">
@endsection

@section('content')
<section data-anim-wrap class="mainSlider -type-4 swiper-container js-mainSlider-type-4">
    {{-- <div class="mainSlider__lines"></div> --}}

    <div class="swiper-wrapper">

      <div class="swiper-slide">
        <div data-parallax="0.6" class="mainSlider__image">
          <img data-parallax-target class="swiper-lazy" src="{{asset('front_asset/img/main-sliders/home-4/1.jpg')}}" alt="Slider image">
        </div>

        <div class="container-fluid h-100">
            <div class="mainSlider__content js-content">
                <div class="row align-items-end md:justify-content-start align-content-end">
                    <div class="col-xl-1 col-lg-6  col-sm-12 mb-5 lg:mb-0">
                        <img class="img-fluid w-25 mb-5 sm:mb-8 js-image" src="{{asset('front_asset/img/clients/1.png')}}">
                    </div>
                    <div class="col-xl-10 col-lg-7 col-md-10 col-sm-12 sm:px-24 mb-5">
                        <div class="row align-items-end md:justify-content-start md:px-24 sm:px-12">
                            <div class="col-xl-12 col-lg-12  col-sm-12  col-8 px-0">
                            <div data-split="lines" data-anim="split-lines" class="js-title-wrap">
                                <h3 class="mainSlider__title text-white js-title ">
                                  The luxury residence in forest
                                </h3>
                              </div>
                            </div>
              
                              <div class="col-xl-4 col-lg-6 col-md-8 col-8 px-0">
                                <div class="mainSlider__text text-white mt-16 js-text">
                                  <p class="">We’re from Poland, we passioned with the space & create the values vsustainable over time</p>
                                </div>
              
                                <a data-barba href="home-4.html#" class="mainSlider__button button -simple text-white mt-20 js-button">
                                  VIEW PROJECT
                                </a>
                              </div>
                        </div>
                    </div>
                  
            </div>
          </div>
        </div>
      </div>

      <div class="swiper-slide">
        <div data-parallax="0.6" class="mainSlider__image">
          <img data-parallax-target class="swiper-lazy" src="{{asset('front_asset/img/main-sliders/home-4/2.jpg')}}" alt="Slider image">
        </div>

        <div class="container-fluid h-100">
          <div class="mainSlider__content js-content">
            <div class="row align-items-end md:justify-content-start align-content-end">
                <div class="col-xl-1 col-lg-6  col-sm-12 mb-5 lg:mb-0">
                    <img class="img-fluid w-25 mb-5 sm:mb-8 js-image" src="{{asset('front_asset/img/clients/1.png')}}">
                </div>
                <div class="col-xl-10 col-lg-7 col-md-10 col-sm-12 sm:px-24 mb-5">
                    <div class="row align-items-end md:justify-content-start md:px-24 sm:px-12">
                        <div class="col-xl-12 col-lg-12  col-sm-12  col-8 px-0">
                            <div data-split="lines" class="js-title-wrap">
                                <h3 class="mainSlider__title text-white js-title ">
                                The House of Narrative Art
                              </h1>
                            </div>
            
                            <div class="col-xl-4 col-lg-6 col-md-8 col-12 px-0">
                              <div class="mainSlider__text text-white mt-16 js-text">
                                <p class="">We’re from Poland, we passioned with the space & create the values vsustainable over time</p>
                              </div>
            
                              <a data-barba href="home-4.html#" class="mainSlider__button button -simple text-white mt-20 js-button">
                                VIEW PROJECT
                              </a>
                            </div>
                          </div>
                    </div>
                </div>
            
            </div>
          </div>
        </div>
      </div>

      <div class="swiper-slide">
        <div data-parallax="0.6" class="mainSlider__image">
          <img data-parallax-target class="swiper-lazy" src="{{asset('front_asset/img/main-sliders/home-4/3.jpg')}}" alt="Slider image">
        </div>

        <div class="container-fluid h-100">
          <div class="mainSlider__content js-content">
            <div class="row align-items-end md:justify-content-start align-content-end">
                <div class="col-xl-1 col-lg-6  col-sm-12 mb-5 lg:mb-0">
                    <img class="img-fluid w-25 mb-5 sm:mb-8 js-image" src="{{asset('front_asset/img/clients/1.png')}}">
                </div>
                <div class="col-xl-10 col-lg-7 col-md-10 col-sm-12 sm:px-24 mb-5">
                    <div class="row align-items-end md:justify-content-start md:px-24 sm:px-12">
                        <div class="col-xl-12 col-lg-12  col-sm-12  col-8 px-0">
                            <div data-split="lines" class="js-title-wrap">
                              <h1 class="mainSlider__title text-white js-title">
                                Catch seafood Restaurant
                              </h1>
                            </div>
            
                            <div class="col-xl-4 col-lg-6 col-md-8 col-12 px-0">
                              <div class="mainSlider__text text-white mt-16 js-text">
                                <p class="">We’re from Poland, we passioned with the space & create the values vsustainable over time</p>
                              </div>
            
                              <a data-barba href="home-4.html#" class="mainSlider__button button -simple text-white mt-20 js-button ">
                                VIEW PROJECT
                              </a>
                            </div>
                          </div>
                    </div>
                </div>
              
            </div>
          </div>
        </div>
      </div>
      <div class="swiper-slide">
        <div data-parallax="0.6" class="mainSlider__image">
          <img data-parallax-target class="swiper-lazy" src="{{asset('front_asset/img/main-sliders/home-3/1.jpg')}}" alt="Slider image">
        </div>

        <div class="container-fluid h-100">
          <div class="mainSlider__content js-content">
            <div class="row align-items-end md:justify-content-start align-content-end">
                <div class="col-xl-1 col-lg-6  col-sm-12 mb-5 lg:mb-0">
                    <img class="img-fluid w-25 mb-5 sm:mb-8 js-image" src="{{asset('front_asset/img/clients/1.png')}}">
                </div>
                <div class="col-xl-10 col-lg-7 col-md-10 col-sm-12 sm:px-24 mb-5">
                    <div class="row align-items-end md:justify-content-start md:px-24 sm:px-12">
                        <div class="col-xl-12 col-lg-12  col-sm-12  col-8 px-0">
                            <div data-split="lines" class="js-title-wrap">
                              <h1 class="mainSlider__title text-white js-title">
                                Catch seafood Restaurant
                              </h1>
                            </div>
            
                            <div class="col-xl-4 col-lg-6 col-md-8 col-12 px-0">
                              <div class="mainSlider__text text-white mt-16 js-text">
                                <p class="">We’re from Poland, we passioned with the space & create the values vsustainable over time</p>
                              </div>
            
                              <a data-barba href="home-4.html#" class="mainSlider__button button -simple text-white mt-20 js-button ">
                                VIEW PROJECT
                              </a>
                            </div>
                          </div>
                    </div>
                </div>
              
            </div>
          </div>
        </div>
      </div>
      <div class="swiper-slide">
        <div data-parallax="0.6" class="mainSlider__image">
          <img data-parallax-target class="swiper-lazy" src="{{asset('front_asset/img/main-sliders/home-3/2.jpg')}}" alt="Slider image">
        </div>

        <div class="container-fluid h-100">
          <div class="mainSlider__content js-content">
            <div class="row align-items-end md:justify-content-start align-content-end">
                <div class="col-xl-1 col-lg-6  col-sm-12 mb-5 lg:mb-0">
                    <img class="img-fluid w-25 mb-5 sm:mb-8 js-image" src="{{asset('front_asset/img/clients/1.png')}}">
                </div>
                <div class="col-xl-10 col-lg-7 col-md-10 col-sm-12 sm:px-24 mb-5">
                    <div class="row align-items-end md:justify-content-start md:px-24 sm:px-12">
                        <div class="col-xl-12 col-lg-12  col-sm-12  col-8 px-0">
                            <div data-split="lines" class="js-title-wrap">
                              <h1 class="mainSlider__title text-white js-title">
                                Catch seafood Restaurant
                              </h1>
                            </div>
            
                            <div class="col-xl-4 col-lg-6 col-md-8 col-12 px-0">
                              <div class="mainSlider__text text-white mt-16 js-text">
                                <p class="">We’re from Poland, we passioned with the space & create the values vsustainable over time</p>
                              </div>
            
                              <a data-barba href="home-4.html#" class="mainSlider__button button -simple text-white mt-20 js-button ">
                                VIEW PROJECT
                              </a>
                            </div>
                          </div>
                    </div>
                </div>
              
            </div>
          </div>
        </div>
      </div>

    </div>

    <div class="navigation -slider -white js-navigation">
      <div class="navigation__content">
        <div class="navigation__content_item js-navigation-item">
          <span class="text-grey">01</span>
          <img  class="w-25" src="{{asset('front_asset/img/main-sliders/home-4/1.jpg')}}" alt="Slider image">
          <p>The Luxury Residence in Forest</p>
        </div>
        <div class="navigation__content_item js-navigation-item is-active">
          <span class="text-grey">02</span>
          <img  class="w-25" src="{{asset('front_asset/img/main-sliders/home-4/2.jpg')}}" alt="Slider image">
          <p>The House of The Narrative Art</p>
        </div>
        <div class="navigation__content_item js-navigation-item is-active">
          <span class="text-grey">03</span>
          <img  class="w-25" src="{{asset('front_asset/img/main-sliders/home-4/3.jpg')}}" alt="Slider image">
          <p>Catch seafood Restaurant</p>
        </div>
        <div class="navigation__content_item js-navigation-item">
          <span class="text-grey">04</span>
          <img  class="w-25" src="{{asset('front_asset/img/main-sliders/home-3/1.jpg')}}" alt="Slider image">
          <p>Catch seafood Restaurant</p>
        </div>
        <div class="navigation__content_item js-navigation-item">
          <span class="text-grey">05</span>
          <img  class="w-25" src="{{asset('front_asset/img/main-sliders/home-3/2.jpg')}}" alt="Slider image">
          <p>Catch seafood Restaurant</p>
        </div>
        <div class="navigation__content_item js-navigation-item">
            <span class="text-grey">01</span>
            <img  class="w-25" src="{{asset('front_asset/img/main-sliders/home-4/1.jpg')}}" alt="Slider image">
            <p>The Luxury Residence in Forest</p>
          </div>
      </div>
    </div>
    <div class="navigation__item js-nav-prev">
      <i class="icon icon-left-arrow"></i>
    </div>
    <div class="navigation__item js-nav-next">
      <i class="icon icon-right-arrow"></i>
    </div>

   

  
  </section>
  <section class="layout-pt-md layout-pb-md bg-black">
    <div class="container">
      <div class="row justify-content-between">
        <div class="col-auto">
          <div class="sectionHeading -left-line">
            <span class="sectionHeading__subtitle">SHORTS</span>
            <h2 class="sectionHeading__title text-white">Trending Shorts</h2>
          </div>
        </div>
      </div>

      <div class="row layout-pt-sm">
        <div class="sectionSlider overflow-hidden sm:px-16 js-sectionSlider" data-gap="30" data-slider-col="base-3 lg-3 md-2 sm-1">

          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <a data-barba href="https://www.youtube.com/embed/FT3ODSg1GFE" class="portfolioCard -type-1 ratio" data-lity>
                <div class="portfolioCard__image ratio ratio-3:4">
                  <img class="ratio-img js-lazy" src="{{asset('front_asset/img/portfolio/cards/1.jpg')}}" data-src="{{asset('front_asset/img/portfolio/cards/1.jpg')}}" alt="project image">
                   <button class="button-pulse -dark" id="playButton">
                    <span class="button-pulse__btn bg-dark text-light mr-24">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-play icon text-light"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg>
                    </span>
                  </button>
                </div>

                <div class="portfolioCard__content px-30 py-30">
                  <span class="portfolioCard__category text-sm uppercase text-beige-dark">LIVING</span>
                  <h3 class="portfolioCard__title text-lg fw-600 mt-8">London Apartments</h3>
                </div>
              </a>
            </div>

            <div class="swiper-slide">
              <a data-barba href="https://www.youtube.com/embed/FT3ODSg1GFE" class="portfolioCard -type-1 ratio" data-lity>
                <div class="portfolioCard__image ratio ratio-3:4">
                  <img class="ratio-img js-lazy" src="{{asset('front_asset/img/portfolio/cards/2.jpg')}}" data-src="{{asset('front_asset/img/portfolio/cards/2.jpg')}}" alt="project image">
                   <button class="button-pulse -dark" id="playButton">
                    <span class="button-pulse__btn bg-dark text-light mr-24">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-play icon text-light"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg>
                    </span>
                  </button>
                </div>

                <div class="portfolioCard__content px-30 py-30">
                  <span class="portfolioCard__category text-sm uppercase text-beige-dark">LIVING</span>
                  <h3 class="portfolioCard__title text-lg fw-600 mt-8">London Apartments</h3>
                </div>
              </a>
            </div>

            <div class="swiper-slide">
              <a data-barba href="https://www.youtube.com/embed/FT3ODSg1GFE" class="portfolioCard -type-1 ratio" data-lity>
                <div class="portfolioCard__image ratio ratio-3:4">
                  <img class="ratio-img js-lazy" src="{{asset('front_asset/img/portfolio/cards/3.jpg')}}" data-src="{{asset('front_asset/img/portfolio/cards/3.jpg')}}" alt="project image">
                   <button class="button-pulse -dark" id="playButton">
                    <span class="button-pulse__btn bg-dark text-light mr-24">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-play icon text-light"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg>
                    </span>
                  </button>
                </div>

                <div class="portfolioCard__content px-30 py-30">
                  <span class="portfolioCard__category text-sm uppercase text-beige-dark">LIVING</span>
                  <h3 class="portfolioCard__title text-lg fw-600 mt-8">London Apartments</h3>
                </div>
              </a>
            </div>

            <div class="swiper-slide">
              <a data-barba href="https://www.youtube.com/embed/FT3ODSg1GFE" class="portfolioCard -type-1 ratio" data-lity>
                <div class="portfolioCard__image ratio ratio-3:4">
                  <img class="ratio-img js-lazy" src="{{asset('front_asset/img/portfolio/cards/4.jpg')}}" data-src="{{asset('front_asset/img/portfolio/cards/4.jpg')}}" alt="project image">
                   <button class="button-pulse -dark" id="playButton">
                    <span class="button-pulse__btn bg-dark text-light mr-24">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-play icon text-light"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg>
                    </span>
                  </button>
                </div>

                <div class="portfolioCard__content px-30 py-30">
                  <span class="portfolioCard__category text-sm uppercase text-beige-dark">LIVING</span>
                  <h3 class="portfolioCard__title text-lg fw-600 mt-8">London Apartments</h3>
                </div>
              </a>
            </div>

            <div class="swiper-slide">
              <a data-barba href="https://www.youtube.com/embed/FT3ODSg1GFE" class="portfolioCard -type-1 ratio" data-lity>
                <div class="portfolioCard__image ratio ratio-3:4">
                  <img class="ratio-img js-lazy" src="{{asset('front_asset/img/portfolio/cards/1.jpg')}}" data-src="{{asset('front_asset/img/portfolio/cards/1.jpg')}}" alt="project image">
                   <button class="button-pulse -dark" id="playButton">
                    <span class="button-pulse__btn bg-dark text-light mr-24">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-play icon text-light"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg>
                    </span>
                  </button>
                </div>

                <div class="portfolioCard__content px-30 py-30">
                  <span class="portfolioCard__category text-sm uppercase text-beige-dark">LIVING</span>
                  <h3 class="portfolioCard__title text-lg fw-600 mt-8">London Apartments</h3>
                </div>
              </a>
            </div>

            <div class="swiper-slide">
              <a data-barba href="https://www.youtube.com/embed/FT3ODSg1GFE" class="portfolioCard -type-1 ratio" data-lity>
                <div class="portfolioCard__image ratio ratio-3:4">
                  <img class="ratio-img js-lazy" src="{{asset('front_asset/img/portfolio/cards/4.jpg')}}" data-src="{{asset('front_asset/img/portfolio/cards/4.jpg')}}" alt="project image">
                   <button class="button-pulse -dark" id="playButton">
                    <span class="button-pulse__btn bg-dark text-light mr-24">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-play icon text-light"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg>
                    </span>
                  </button>
                </div>

                <div class="portfolioCard__content px-30 py-30">
                  <span class="portfolioCard__category text-sm uppercase text-beige-dark">LIVING</span>
                  <h3 class="portfolioCard__title text-lg fw-600 mt-8">London Apartments</h3>
                </div>
              </a>
            </div>

            <div class="swiper-slide">
              <a data-barba href="https://www.youtube.com/embed/FT3ODSg1GFE" class="portfolioCard -type-1 ratio" data-lity>
                <div class="portfolioCard__image ratio ratio-3:4">
                  <img class="ratio-img js-lazy" src="{{asset('front_asset/img/portfolio/cards/3.jpg')}}" data-src="{{asset('front_asset/img/portfolio/cards/3.jpg')}}" alt="project image">
                   <button class="button-pulse -dark" id="playButton">
                    <span class="button-pulse__btn bg-dark text-light mr-24">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-play icon text-light"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg>
                    </span>
                  </button>
                </div>

                <div class="portfolioCard__content px-30 py-30">
                  <span class="portfolioCard__category text-sm uppercase text-beige-dark">LIVING</span>
                  <h3 class="portfolioCard__title text-lg fw-600 mt-8">London Apartments</h3>
                </div>
              </a>
            </div>

            <div class="swiper-slide">
              <a data-barba href="https://www.youtube.com/embed/FT3ODSg1GFE" class="portfolioCard -type-1 ratio" data-lity>
                <div class="portfolioCard__image ratio ratio-3:4">
                  <img class="ratio-img js-lazy" src="{{asset('front_asset/img/portfolio/cards/2.jpg')}}" data-src="{{asset('front_asset/img/portfolio/cards/2.jpg')}}" alt="project image">
                   <button class="button-pulse -dark" id="playButton">
                    <span class="button-pulse__btn bg-dark text-light mr-24">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-play icon text-light"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg>
                    </span>
                  </button>
                </div>

                <div class="portfolioCard__content px-30 py-30">
                  <span class="portfolioCard__category text-sm uppercase text-beige-dark">LIVING</span>
                  <h3 class="portfolioCard__title text-lg fw-600 mt-8">London Apartments</h3>
                </div>
              </a>
            </div>

          </div>

          <div class="nav -slider lg:d-none">
            <div class="nav__item -left js-prev">
              <i class="icon icon-left-arrow"></i>
            </div>

            <div class="nav__item -right js-next">
              <i class="icon icon-right-arrow"></i>
            </div>
          </div>

          <div class="pagination -slider mt-48 js-pagination"></div>
        </div>
      </div>
    </div>
  </section>
  
  <section class="layout-pb-lg bg-black">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-5 mb-3">
          <div class="pr-30 md:pr-0">
            <img class="img-fluid" src="https://en.idei.club/uploads/posts/2023-04/1682447733_en-idei-club-p-tall-interior-design-47.jpg" data-src="https://en.idei.club/uploads/posts/2023-04/1682447733_en-idei-club-p-tall-interior-design-47.jpg" alt="project image">
            {{-- <div class="portfolioCard__image ratio ratio-3:4">
            </div> --}}
          </div>
        </div>
        <div class="col-lg-7">
          <div class="row">
            <div class="col-md-7">
              <h2 class="text-white">Easiest way to find your dream place</h2>
            </div>
            <div class="col-md-5 md:d-none">
              <img src="{{ asset('front_asset/img/new-img/2.png') }}" alt="" width="70%">
            </div>
          </div>
          <div class="row align-items-center mb-3">
            <div class="col-lg-3 p-md-3 col-4">
                <img src="{{ asset('front_asset/img/backgrounds/2.jpg') }}" alt="Image" width="100%">
            </div>
            <div class="col-lg-7 col-8">
              <h4 class="pieChart__title text-white f-26">Interior Design</h4>
              <p class="pieChart__text text-light">Situated on the outskirts of city of Jalandhar, Design + makes a astonishing house which perfectly...</p>
            </div>
            <div class="col-md-2 md:text-right">
              <a href="#" class="bg-btn">Read More</a>
            </div>
          </div>
          <div class="row align-items-center mb-3">
            <div class="col-lg-3 p-md-3 col-4">
                <img src="{{ asset('front_asset/img/backgrounds/2.jpg') }}" alt="Image" width="100%">
            </div>
            <div class="col-lg-7 col-8">
              <h4 class="pieChart__title text-white f-26">Interior Design</h4>
              <p class="pieChart__text text-light">Situated on the outskirts of city of Jalandhar, Design + makes a astonishing house which perfectly...</p>
            </div>
            <div class="col-md-2 md:text-right">
              <a href="#" class="bg-btn">Read More</a>
            </div>
          </div>
          <div class="row align-items-center mb-3">
            <div class="col-lg-3 p-md-3">
                <img class="blog-img" src="{{ asset('front_asset/img/backgrounds/2.jpg') }}" alt="Image" width="100%">
            </div>
            <div class="col-lg-7">
              <h4 class="pieChart__title text-white f-26">Interior Design</h4>
              <p class="pieChart__text text-light">Situated on the outskirts of city of Jalandhar, Design + makes a astonishing house which perfectly...</p>
            </div>
            <div class="col-md-2 md:text-right">
              <a href="#" class="bg-btn">Read More</a>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </section>

 
@endsection

@section('script')
<script src="{{asset('front_asset\lity\lity.min.js')}}"></script>
<script type="text/javascript">
  $(document).on('lity:ready', function (event, instance) {
      var iframe = $(".lity-iframe-container").find("iframe");
      iframe.prop("id", "lity-youtube-player");

      var player = new YT.Player("lity-youtube-player", {
          events: {
              'onReady': function (e) {
                  e.target.playVideo();
              },
              'onStateChange': function (e) {
                  if (e.data == YT.PlayerState.ENDED) {
                      instance.close();
                  }
              }
          }
      });
  });
</script>
@endsection