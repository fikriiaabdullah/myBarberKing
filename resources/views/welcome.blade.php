<!DOCTYPE html>

<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <meta name="description" content="Name of your web site" />
    <meta name="author" content="Marketify" />

    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, maximum-scale=1"
    />

    <title>Barbershop</title>

    <!-- STYLES -->
    <link
      href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/plugins.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}" />
  </head>

  <body>
    <!-- PRELOADER -->
    <div id="preloader">
      <div class="loader_line"></div>
    </div>
    <!-- /PRELOADER -->

    <!-- WRAPPER ALL -->
    <div class="all_wrap">
      <!-- TOPBAR -->
      <div class="topbar">
        <div class="wrapper">
          <div class="topbar_inner">
            <div class="logo">
              <a href="#"><img src="{{ asset('assets/about-logo.png') }}" alt="" /></a>
            </div>
            <div class="brand-name">
                Ryan Barberking
            </div>
          </div>
        </div>
      </div>
      <!-- TOPBAR -->

      <!-- HERO -->
      <div class="kura_tm_section" id="home">
        <div class="hero">
          <div class="container">
            <div class="content">
              <div class="left">
                <span class="name">Barberman</span>
                <h3 class="job">Best Barbershop in Town</h3>
                <div class="services">
                  <ul>
                    <li>
                      <a href="{{ route('reservation') }}">
                        <img class="image" src="{{ asset('assets/about-1.jpg') }}" alt="" />
                        <span>Reservation</span>
                        <img class="svg" src="{{asset('assets/img/svg/right-arrow.svg')}}" alt="" />
                      </a>
                    </li>
                    <li>
                      <a href="{{ route('login') }}">
                        <img class="image" src="{{ asset('assets/about-2.jpg') }}" alt="" />
                        <span>Login </span>
                        <img class="svg" src="{{asset('assets/img/svg/right-arrow.svg')}}" alt="" />
                      </a>
                    </li>
                  </ul>
                </div>
                <div class="short_info">
                  <ul>
                    <li>
                      <div class="list_inner">
                        <h3>10+</h3>
                        <span>Years of<br />Experience</span>
                      </div>
                    </li>
                    <li>
                      <div class="list_inner">
                        <h3>3K+</h3>
                        <span>Happy<br />Customers</span>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="right">
                <div class="image">
                  <img src="{{asset('assets/img/thumbs/3-4.jpg')}}" alt="" />
                  <div class="main" data-img-url="{{ asset('assets/about-3.jpg') }}"></div>
                  <div class="shape"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /HERO -->

      <!-- CURSOR -->
      <div class="mouse-cursor cursor-outer"></div>
      <div class="mouse-cursor cursor-inner"></div>
      <!-- /CURSOR -->
    </div>
    <!-- / WRAPPER ALL -->

    <!-- SCRIPTS -->
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/jplugins.js') }}"></script>
    <script src="{{ asset('assets/js/init.js') }}"></script>
    <!-- /SCRIPTS -->
  </body>
</html>
