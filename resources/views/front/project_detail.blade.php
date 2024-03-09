@extends('layouts.front.app')
@section('custome_style')

@endsection
@section('content')
<section class="profile-details" style="background-image: url('{{ asset('front_asset/img/new-img/5.png') }}')">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row justify-content-between md:justify-content-center align-items-center p-3 bg-blur mb-5">
                    <div class="col-md-2 col-lg-1">
                      <img src="{{ asset('front_asset/img/new-img/4.png') }}" alt="" class="img-fluid">
                    </div>
                    <div class="col-md-7 col-lg-9 text-left">
                      <h2 class="text-white f-40">Project Name</h2>
                      <hr class="w-50 opacity-5">
                      <p class="text-white">#27 Model Town, Dugri Ludhiana, Punjab, India</p>
                    </div>
                    <div class="col-md-3 col-lg-2">
                        <div class="socialsIcons mt-12">
                            <a data-barba="" href="portfolio-single-v1.html#" class="text-white f-40">
                              <i class="fab fa-facebook" aria-hidden="true"></i>
                            </a>
                            <a data-barba="" href="portfolio-single-v1.html#" class="text-white f-40">
                              <i class="fa fa-instagram" aria-hidden="true"></i>
                            </a>
                            <a data-barba="" href="portfolio-single-v1.html#" class="text-white f-40">
                                <i class="fa fa-twitter" aria-hidden="true"></i>
                              </a>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

  
<section class="layout-pb-lg layout-pt-lg bg-black">
    <div class="container">
      <div class="row align-items-center justify-content-between">
        <div class="col-md-7 pr-80 md:pr-0">
            <h2 class="text-white mb-3">About Project</h2>
            <ul class="row pl-2 mb-3">
                <li class="col-auto text-white p-0 pl-1">Affordable Fees |</li>
                <li class="col-auto text-white p-0 pl-1">Gold Medalist Licensed Architect |</li>
                <li class="col-auto text-white p-0 pl-1">Top Architects in Ludhiana | </li>
                <li class="col-auto text-white p-0 pl-1">Interior Designers |</li>
                <li class="col-auto text-white p-0 pl-1">Elevation Designing</li>
            </ul>
            <p class="text-light mb-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ipsum velit, rhoncus vel porttitor non, tristique at elit. Maecenas congue est at velit luctus feugiat. Quisque in euismod mauris. Vivamus viverra egestas sem non placerat. In a risus eu nibh ornare varius. Nullam a egestas nulla. Nullam consectetur est vitae lacus semper consectetur. Cras non justo sed quam semper dictum. Aliquam et vestibulum sapien.</p>
            <h4 class="text-white mb-3">Services Provided</h4>
            <p class="text-light mb-3">L3D Rendering, Architectural Design, Basement Design, Bathroom Design, Building Design, Custom Home, Deck Design, Dining Room Design, Drafting, Floor Plans, Green Building, Home Extensions, Home Renovation & Remodeling, Home Restoration, House Plans, Kitchen Design, Kitchen Renovation & Remodeling, Landscape Plans, Living Room Design, New Home Construction, Space Planning, Staircase Design, Sustainable Design, Best Architecture Services | Affordable Fees</p>
        </div>
        <div class="col-md-5 col-lg-4 p-5 bg-blur">
            <h2 class="text-white text-center p-3 pt-0">Project Info</h2>
            <hr class="mb-3 opacity-5">
            <div class="row">
                <div class="col-6">
                    <p class="text-white mb-2">Location</p>
                    <p class="text-white mb-2">Plot Area</p>
                    <p class="text-white mb-2">Facing</p>
                    <p class="text-white mb-2">Vastu</p>
                    <p class="text-white mb-2">No. of Rooms</p>
                    <p class="text-white mb-2">No. of Car Parking</p>
                    <p class="text-white mb-2">Built Up Area</p>
                    <p class="text-white mb-2">Start Year</p>
                    <p class="text-white mb-2">Completion Year</p>
                    <p class="text-white mb-2">Project Cost</p>
                    <p class="text-white mb-2">Photo Credit</p>
                </div>
                <div class="col-6">
                    <p class="text-light mb-2">12345</p>
                    <p class="text-light mb-2">20x40</p>
                    <p class="text-light mb-2">NXE</p>
                    <p class="text-light mb-2">Yes</p>
                    <p class="text-light mb-2">3</p>
                    <p class="text-light mb-2">2</p>
                    <p class="text-light mb-2">1200 Sq Ft.</p>
                    <p class="text-light mb-2">2021</p>
                    <p class="text-light mb-2">2022</p>
                    <p class="text-light mb-2">2 Crore</p>
                    <p class="text-light mb-2">Arjun Krishna </p>
                </div>
            </div>
        </div>
      </div>
    </div>
  </section>
@endsection
