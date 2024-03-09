@extends('layouts.front.app')
@section('custome_style')
<style>
    .header{
        background:black;
    }

</style>
@endsection
@section('content')
<section class="mainSlider -type-5 bg-black">
    <div class="container-fluid p-0 d-flex" style="flex-wrap:wrap">
        <div class="mainSlider__image">
            <img data-parallax-target="" class="swiper-lazy swiper-lazy-loaded" src="{{asset('front_asset/img/main-sliders/home-5/2.jpg')}}" alt="Slider image">
        </div>
        <div class="profile_card align-self-center">
            <img src="{{asset('front_asset/img/profile/image1.png')}}">
            <h2 class="sectionHeading__title text-white">Architect Name</h2>
            <p class="profile_text">Architects & Building Designers</p>
            <div class="business_details">
                <div class="d-flex justify-content-between border-bottom px-2 py-2">
                    <h3 class="heading text-white">Architect Name</h3>
                    <div class="social_icon text-right">
                       <img src="{{asset('front_asset/img/icon/fa6-brands_facebook.svg')}}">
                       <img src="{{asset('front_asset/img/icon/fa6-brands_instagram.svg')}}">
                       <img src="{{asset('front_asset/img/icon/fa6-brands_twitter.svg')}}">
                    </div>
                </div>
                <div class="card_details p-2">
                    <div class="d-flex align-items-center">
                        <img src="{{asset('front_asset/img/icon/card.svg')}}">
                        <h6 class="text-white ml-2 mr-2">Firm Name</h6>
                        <div class="border-dashed"></div>
                        <p class="text-white ml-2 card_text">Royal Architect</p>
                    </div>
                    <div class="d-flex align-items-center mt-1">
                        <img src="{{asset('front_asset/img/icon/card.svg')}}">
                        <h6 class="text-white ml-2 mr-2">Phone Number</h6>
                        <div class="border-dashed"></div>
                        <p class="text-white ml-2 card_text">+91 94655 51554</p>
                    </div>
                    <div class="d-flex align-items-center mt-1">
                        <img src="{{asset('front_asset/img/icon/card.svg')}}">
                        <h6 class="text-white ml-2 mr-2">Website</h6>
                        <div class="border-dashed"></div>
                        <p class="text-white ml-2 card_text">www.website.com</p>
                    </div>
                    <div class="d-flex align-items-center mt-1">
                        <img src="{{asset('front_asset/img/icon/card.svg')}}">
                        <h6 class="text-white ml-2 mr-2">Typical Job Cost</h6>
                        <div class="border-dashed"></div>
                        <p class="text-white ml-2 card_text">Around 27 Lakh</p>
                    </div>
                    <div class="d-flex align-items-center mt-1">
                        <img src="{{asset('front_asset/img/icon/card.svg')}}">
                        <h6 class="text-white ml-2 mr-2">Address</h6>
                        <div class="border-dashed"></div>
                        <p class="text-white ml-2 card_text">#27 Model Town, Dugri Ludhiana, Punjab, India</p>
                    </div>
                </div>
            </div>
        </div>
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

@endsection
