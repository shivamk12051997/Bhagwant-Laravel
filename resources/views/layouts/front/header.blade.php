<header class="header  js-header">
    <div class="header__bar  js-header-bar">

      <div class="row justify-content-between align-items-center">

        <div class="col-auto z-5 js-header-item">
          <div class="header__item -margin-sm">
            <div class="header__logo text-white js-header-logo">
              <a data-barba href="#">
                 <img src="{{asset('front_asset/img/general/logo-light.svg')}}" alt="logo" class="icon">
              </a>
            </div>
          </div>
        </div>


        <div class="menu js-menu ">
          <div class="mobile__background js-mobile-bg"></div>

          <div class="menu__container">
            <div class="mobile__back js-nav-list-back pointer-events-none">
              <a data-barba href="{{url('/')}}">Home</a>
            </div>

            <ul class="nav js-navList ">
              <li class="text-white">
                <a data-barba href="{{url('/')}}">Home</a>

                {{-- <ul class="nav__submenu">
                  <li class="nav__submenu_item">
                    <a data-barba href="index.html">Home 1</a>
                  </li>

                  <li class="nav__submenu_item">
                    <a data-barba href="home-2.html">Home 2</a>
                  </li>

                  <li class="nav__submenu_item">
                    <a data-barba href="home-3.html">Home 3</a>
                  </li>

                  <li class="nav__submenu_item">
                    <a data-barba href="home-4.html">Home 4</a>
                  </li>

                  <li class="nav__submenu_item">
                    <a data-barba href="home-5.html">Home 5</a>
                  </li>

                  <li class="nav__submenu_item">
                    <a data-barba href="home-6.html">Home 6</a>
                  </li>

                  <li class="nav__submenu_item">
                    <a data-barba href="home-7.html">Home 7</a>
                  </li>

                  <li class="nav__submenu_item">
                    <a data-barba href="home-8.html">Home 8</a>
                  </li>

                  <li class="nav__submenu_item">
                    <a data-barba href="home-9.html">Home 9</a>
                  </li>

                  <li class="nav__submenu_item">
                    <a data-barba href="home-10.html">Home 10</a>
                  </li>

                </ul> --}}
              </li>
              <li class="text-white ">
                <a data-barba href="{{url('/design')}}">Design</a>

                {{-- <ul class="nav__submenu">

                  <li class="nav__submenu_item">
                    <a data-barba href="about-us.html">About Us</a>
                  </li>

                  <li class="nav__submenu_item">
                    <a data-barba href="about-me.html">About Me</a>
                  </li>

                  <li class="nav__submenu_item">
                    <a data-barba href="contact-us.html">Contact Us</a>
                  </li>

                  <li class="nav__submenu_item">
                    <a data-barba href="services-single.html">Services Single</a>
                  </li>

                  <li class="nav__submenu_item">
                    <a data-barba href="team.html">Team</a>
                  </li>

                  <li class="nav__submenu_item">
                    <a data-barba href="pricing.html">Pricing</a>
                  </li>

                  <li class="nav__submenu_item">
                    <a data-barba href="faq.html">Faq</a>
                  </li>

                  <li class="nav__submenu_item">
                    <a data-barba href="coming-soon.html">Coming Soon</a>
                  </li>

                  <li class="nav__submenu_item">
                    <a data-barba href="404.html">404</a>
                  </li>

                  <li class="nav__submenu_item">
                    <a data-barba href="ui-elements.html">Ui Elements</a>
                  </li>

                </ul> --}}
              </li>
              {{-- <li class="text-white menu-item-has-children">
                <a data-barba href="#">Build</a>

                <ul class="nav__submenu">
                  <li class="nav__submenu_item">
                    <a data-barba href="#">Design & Planning</a>
                  </li>
                  <li class="nav__submenu_item">
                    <a data-barba href="#">Exterior Design</a>
                  </li>
                  <li class="nav__submenu_item">
                    <a data-barba href="#">Custom Solutions</a>
                  </li>
                  <li class="nav__submenu_item">
                    <a data-barba href="#">Furniture & Decor</a>
                  </li>
                  <li class="nav__submenu_item">
                    <a data-barba href="#">Creating Concept</a>
                  </li>
                  <li class="nav__submenu_item">
                    <a data-barba href="#">Author’s Contro</a>
                  </li>
                </ul>
              </li> --}}
              <li class="text-white -has-mega-menu menu-item-has-children">
                <a data-barba href="#">Build</a>


                <div class="mega">
                  <div class="container">
                    <div class="row">
                      <div class="col-12">
                        <ul class="mega__menu">
                          <li class="mega__column">

                            <div class="mega__item">
                              <h4 class="mega__title">List Types</h4>
                              <ul class="mega__list">

                                <li><a data-barba href="portfolio-list-v1.html">List Style v1</a></li>

                                <li><a data-barba href="portfolio-list-v2.html">List Style v2</a></li>

                                <li><a data-barba href="portfolio-list-v3.html">List Style v3</a></li>

                                <li><a data-barba href="portfolio-list-v4.html">List Style v4</a></li>

                                <li><a data-barba href="portfolio-list-v5.html">List Style v5</a></li>

                                <li><a data-barba href="portfolio-list-v6.html">List Style v6</a></li>

                                <li><a data-barba href="portfolio-list-v7.html">List Style v7</a></li>

                                <li><a data-barba href="portfolio-list-v8.html">List Style v8</a></li>

                                <li><a data-barba href="portfolio-list-v9.html">List Style v9</a></li>

                                <li><a data-barba href="portfolio-list-v10.html">List Style v10</a></li>

                                <li><a data-barba href="portfolio-list-v11.html">List Style v11</a></li>

                              </ul>
                            </div>

                          </li>

                          <li class="mega__column">

                            <div class="mega__item">
                              <h4 class="mega__title">PORTFOLIO LAYOUTS</h4>
                              <ul class="mega__list">

                                <li><a data-barba href="#">Two Columns</a></li>

                                <li><a data-barba href="#">Three Columns</a></li>

                                <li><a data-barba href="#">Three Columns Wide</a></li>

                                <li><a data-barba href="#">Four Columns</a></li>

                                <li><a data-barba href="#">Four Columns Wide</a></li>

                                <li><a data-barba href="#">Five Columns Wide</a></li>

                              </ul>
                            </div>

                          </li>

                          <li class="mega__column">

                            <div class="mega__item">
                              <h4 class="mega__title">SINGLE TYPES</h4>
                              <ul class="mega__list">

                                <li><a data-barba href="portfolio-single-v1.html">Single Type v1</a></li>

                                <li><a data-barba href="portfolio-single-v2.html">Single Type v2</a></li>

                                <li><a data-barba href="portfolio-single-v3.html">Single Type v3</a></li>

                                <li><a data-barba href="portfolio-single-v4.html">Single Type v4</a></li>

                                <li><a data-barba href="portfolio-single-v5.html">Single Type v5</a></li>

                                <li><a data-barba href="portfolio-single-v6.html">Single Type v6</a></li>

                                <li><a data-barba href="portfolio-single-v7.html">Single Type v7</a></li>

                              </ul>
                            </div>

                          </li>

                          <li class="mega__column">

                            <div class="mega__item">
                              <h4 class="mega__title">HOVER TYPES</h4>
                              <ul class="mega__list">

                                <li><a data-barba href="#">Zoom</a></li>

                                <li><a data-barba href="#">Float</a></li>

                                <li><a data-barba href="#">Slide From Bottom</a></li>

                                <li><a data-barba href="#">Slide From Right</a></li>

                              </ul>
                            </div>

                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>


                <ul class="nav__submenu md:d-block d-none">
                  <li class="nav__submenu_item menu-item-has-children">
                    <a data-barba href="#">List Types</a>

                    <ul class="nav__submenu md:d-block d-none">

                      <li class="nav__submenu_item">
                        <a data-barba href="portfolio-list-v1.html">List Style v1</a>
                      </li>

                      <li class="nav__submenu_item">
                        <a data-barba href="portfolio-list-v2.html">List Style v2</a>
                      </li>

                      <li class="nav__submenu_item">
                        <a data-barba href="portfolio-list-v3.html">List Style v3</a>
                      </li>

                      <li class="nav__submenu_item">
                        <a data-barba href="portfolio-list-v4.html">List Style v4</a>
                      </li>

                      <li class="nav__submenu_item">
                        <a data-barba href="portfolio-list-v5.html">List Style v5</a>
                      </li>

                      <li class="nav__submenu_item">
                        <a data-barba href="portfolio-list-v6.html">List Style v6</a>
                      </li>

                      <li class="nav__submenu_item">
                        <a data-barba href="portfolio-list-v7.html">List Style v7</a>
                      </li>

                      <li class="nav__submenu_item">
                        <a data-barba href="portfolio-list-v8.html">List Style v8</a>
                      </li>

                      <li class="nav__submenu_item">
                        <a data-barba href="portfolio-list-v9.html">List Style v9</a>
                      </li>

                      <li class="nav__submenu_item">
                        <a data-barba href="portfolio-list-v10.html">List Style v10</a>
                      </li>

                      <li class="nav__submenu_item">
                        <a data-barba href="portfolio-list-v11.html">List Style v11</a>
                      </li>

                    </ul>
                  </li>

                  <li class="nav__submenu_item menu-item-has-children">
                    <a data-barba href="#">PORTFOLIO LAYOUTS</a>

                    <ul class="nav__submenu md:d-block d-none">

                      <li class="nav__submenu_item">
                        <a data-barba href="#">Two Columns</a>
                      </li>

                      <li class="nav__submenu_item">
                        <a data-barba href="#">Three Columns</a>
                      </li>

                      <li class="nav__submenu_item">
                        <a data-barba href="#">Three Columns Wide</a>
                      </li>

                      <li class="nav__submenu_item">
                        <a data-barba href="#">Four Columns</a>
                      </li>

                      <li class="nav__submenu_item">
                        <a data-barba href="#">Four Columns Wide</a>
                      </li>

                      <li class="nav__submenu_item">
                        <a data-barba href="#">Five Columns Wide</a>
                      </li>

                    </ul>
                  </li>

                  <li class="nav__submenu_item menu-item-has-children">
                    <a data-barba href="#">SINGLE TYPES</a>

                    <ul class="nav__submenu md:d-block d-none">

                      <li class="nav__submenu_item">
                        <a data-barba href="portfolio-single-v1.html">Single Type v1</a>
                      </li>

                      <li class="nav__submenu_item">
                        <a data-barba href="portfolio-single-v2.html">Single Type v2</a>
                      </li>

                      <li class="nav__submenu_item">
                        <a data-barba href="portfolio-single-v3.html">Single Type v3</a>
                      </li>

                      <li class="nav__submenu_item">
                        <a data-barba href="portfolio-single-v4.html">Single Type v4</a>
                      </li>

                      <li class="nav__submenu_item">
                        <a data-barba href="portfolio-single-v5.html">Single Type v5</a>
                      </li>

                      <li class="nav__submenu_item">
                        <a data-barba href="portfolio-single-v6.html">Single Type v6</a>
                      </li>

                      <li class="nav__submenu_item">
                        <a data-barba href="portfolio-single-v7.html">Single Type v7</a>
                      </li>

                    </ul>
                  </li>

                  <li class="nav__submenu_item menu-item-has-children">
                    <a data-barba href="#">HOVER TYPES</a>

                    <ul class="nav__submenu md:d-block d-none">

                      <li class="nav__submenu_item">
                        <a data-barba href="#">Zoom</a>
                      </li>

                      <li class="nav__submenu_item">
                        <a data-barba href="#">Float</a>
                      </li>

                      <li class="nav__submenu_item">
                        <a data-barba href="#">Slide From Bottom</a>
                      </li>

                      <li class="nav__submenu_item">
                        <a data-barba href="#">Slide From Right</a>
                      </li>

                    </ul>
                  </li>
                </ul>
              </li>
              <li class="text-white">
                <a data-barba href="#">Real Estate</a>

                {{-- <ul class="nav__submenu">

                  <li class="nav__submenu_item">
                    <a data-barba href="blog-list-v1.html">Blog 1</a>
                  </li>

                  <li class="nav__submenu_item">
                    <a data-barba href="blog-list-v2.html">Blog 2</a>
                  </li>

                  <li class="nav__submenu_item">
                    <a data-barba href="blog-list-v3.html">Blog 3</a>
                  </li>

                  <li class="nav__submenu_item">
                    <a data-barba href="blog-single.html">Blog Single</a>
                  </li>
                </ul> --}}
              </li>
              <li class="text-white">
                <a data-barba href="#">Learning</a>

                {{-- <ul class="nav__submenu">

                  <li class="nav__submenu_item">
                    <a data-barba href="shop-list-v1.html">Shop List 1</a>
                  </li>

                  <li class="nav__submenu_item">
                    <a data-barba href="shop-list-v2.html">Shop List 2</a>
                  </li>

                  <li class="nav__submenu_item">
                    <a data-barba href="shop-list-v3.html">Shop List 3</a>
                  </li>

                  <li class="nav__submenu_item">
                    <a data-barba href="shop-single.html">Single</a>
                  </li>

                  <li class="nav__submenu_item">
                    <a data-barba href="shop-cart.html">Cart</a>
                  </li>

                  <li class="nav__submenu_item">
                    <a data-barba href="shop-checkout.html">Checkout</a>
                  </li>

                  <li class="nav__submenu_item">
                    <a data-barba href="shop-complete.html">Complete Order</a>
                  </li>

                </ul> --}}
              </li>
              {{-- <li class="text-white">
                <a data-barba href="#">Contacts</a>
              </li> --}}
            </ul>
          </div>

          <div class="mobile__footer js-mobile-footer">
            <div class="mobile__socials">
              <a data-barba href="#">
                <i class="fa fa-facebook" aria-hidden="true"></i>
              </a>
              <a data-barba href="#">
                <i class="fa fa-twitter" aria-hidden="true"></i>
              </a>
              <a data-barba href="#">
                <i class="fa fa-instagram" aria-hidden="true"></i>
              </a>
              <a data-barba href="#">
                <i class="fa fa-linkedin" aria-hidden="true"></i>
              </a>
            </div>

            <div class="mobile__copyright">
              {{-- <img src="{{asset('front_asset/img/general/logo-light.svg')}}" alt="logo" class="icon"> --}}
              <p>© 2023 DOS. All rights reserved.</p>
            </div>
          </div>
        </div>


        <div class="col-auto z-5 sm:pos-unset js-header-item">
          <div class="header__icons ">
            {{-- <div class="header__cart">
              <a data-barba href="#">
                <i class="icon text-white icon-cart"></i>
              </a>

              <div class="headerCart js-headerCart">
                <div class="headerCart__content">

                  <div class="headerCart__item">
                    <div class="headerCart__img">
                      <img src="{{asset('front_asset/img/main-sidebar/cart/1.jpg')}}" alt="image">
                    </div>

                    <div class="headerCart__wrap">
                      <h5 class="headerCart__title">Decorative palm</h5>
                      <span class="headerCart__info">1 × $244.00</span>
                    </div>

                    <div class="headerCart__cross">
                      <i class="icon icon-cross"></i>
                    </div>
                  </div>

                  <div class="headerCart__item">
                    <div class="headerCart__img">
                      <img src="{{asset('front_asset/img/main-sidebar/cart/2.jpg')}}" alt="image">
                    </div>

                    <div class="headerCart__wrap">
                      <h5 class="headerCart__title">Decorative palm</h5>
                      <span class="headerCart__info">1 × $244.00</span>
                    </div>

                    <div class="headerCart__cross">
                      <i class="icon icon-cross"></i>
                    </div>
                  </div>

                </div>

                <div class="headerCart__footer">
                  <div class="headerCart__total">
                    <span>Subtotal:</span>
                    <span>$895</span>
                  </div>

                  <div class="headerCart__buttons">
                    <a data-barba href="#" class="button -md -grey text-white col-12">VIEW CART</a>
                    <a data-barba href="#" class="button -md -accent text-white col-12">CHECKOUT</a>
                  </div>
                </div>
              </div>
            </div> --}}

            <div class="header__search">
              <button class="js-headerSearch-open">
                <i class="icon text-white icon-search"></i>
              </button>
            </div>

            <div class="header__menu md:d-block d-none">
              <button type="button" class="nav-button-open md:d-none js-sidebar-open">
                <i class="icon text-white icon-menu"></i>
              </button>

              <button type="button" class="nav-button-open d-none md:d-block js-nav-open">
                <i class="icon text-white icon-menu"></i>
              </button>

              <button type="button" class="nav-button-close d-none md:d-block pointer-events-none js-nav-close">
                <i class="icon text-white icon-cross"></i>
              </button>
            </div>
          </div>
        </div>
      </div>


      <div class="headerSearch js-headerSearch">
        <div class="headerSearch__line"></div>
        <form action="POST">
          <i class="headerSearch__icon icon-search"></i>
          <input type="search" placeholder="Type Your Search">
        </form>
        <button class="headerSearch__close js-headerSearch-close">
          <i class="icon icon-cross text-white"></i>
        </button>
      </div>
    </div>
  </header>