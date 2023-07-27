<?php
include_once "../core/Controller/token.php";
include_once "../core/Controller/customerC.php";
$token = new token();
session_start();
$isLoggedIn = $token->is_user_logged_in();
?>

<!DOCTYPE html>
<html dir="ltr" lang="en-US">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="SemiColonWeb" />

    <!-- Favicon -->
    <link href="assets/demos/car/images/favicon.png" rel="icon" />

    <!-- Stylesheets
	============================================= -->
    <link
      href="https://fonts.googleapis.com/css?family=Mukta+Vaani:300,400,500,600,700|Open+Sans:300,400,600,700,800,900&display=swap"
      rel="stylesheet"
      type="text/css"
    />
    <link rel="stylesheet" href="assets/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="assets/style.css" type="text/css" />
    <link rel="stylesheet" href="assets/css/dark.css" type="text/css" />
    <link rel="stylesheet" href="assets/css/swiper.css" type="text/css" />
    <link rel="stylesheet" href="assets/css/font-icons.css" type="text/css" />

    <!-- Bootstrap Select CSS -->
    <link
      rel="stylesheet"
      href="assets/css/components/bs-select.css"
      type="text/css"
    />

    <!-- car Specific Stylesheet -->
    <link rel="stylesheet" href="assets/demos/car/car.css" type="text/css" />
    <link
      rel="stylesheet"
      href="assets/demos/car/css/car-icons/style.css"
      type="text/css"
    />
    <!-- / -->

    <link rel="stylesheet" href="assets/css/animate.css" type="text/css" />
    <link
      rel="stylesheet"
      href="assets/css/magnific-popup.css"
      type="text/css"
    />

    <link
      rel="stylesheet"
      href="assets/demos/car/css/fonts.css"
      type="text/css"
    />

    <link rel="stylesheet" href="assets/css/custom.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link
      rel="stylesheet"
      href="assets/css/colors.php?color=c85e51"
      type="text/css"
    />

    <!-- SLIDER REVOLUTION 5.x CSS SETTINGS -->
    <link
      rel="stylesheet"
      type="text/css"
      href="assets/include/rs-plugin/css/settings.css"
      media="screen"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="assets/include/rs-plugin/css/layers.css"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="assets/include/rs-plugin/css/navigation.css"
    />

    <!-- Document Title
	============================================= -->
    <title>CarHub | Home</title>

    <style>
      /* Revolution Slider */
      .ares .tp-tab {
        border: 1px solid #eee;
      }
      .ares .tp-tab-content {
        margin-top: -4px;
      }
      .ares .tp-tab-content {
        padding: 15px 15px 15px 110px;
      }
      .ares .tp-tab-image {
        width: 80px;
        height: 80px;
      }
    </style>
  </head>

  <body
    class="stretched side-push-panel"
    data-loader-html="<div><img src='assets/demos/car/images/page-loader.gif' alt='Loader'></div>"
  >
    <!-- Side Panel Overlay -->
    <div class="body-overlay"></div>

    <!-- Side Panel -->
    <div id="side-panel">
      <div id="side-panel-trigger-close" class="side-panel-trigger">
        <a href="#"><i class="icon-line-cross"></i></a>
      </div>

      <div class="side-panel-wrap">
        <div class="widget clearfix">
          <a href="index.html"
            ><img
              src="assets/demos/car/images/logo@2x.png"
              alt="CarHub Logo"
              height="50"
          /></a>

          <p>
            It has always been, and will always be, about quality. We're
            passionate about ethically sourcing the finest coffee beans,
            roasting them with great care. We'd like to hear your message!
          </p>

          <div
            class="widget quick-contact-widget form-widget border-0 pt-0 clearfix"
          >
            <h4>Quick Contact</h4>
            <div class="form-result"></div>
            <form
              id="quick-contact-form"
              name="quick-contact-form"
              action="form.php"
              method="post"
              class="quick-contact-form mb-0"
            >
              <div class="form-process">
                <div class="css3-spinner">
                  <div class="css3-spinner-scaler"></div>
                </div>
              </div>
              <input
                type="text"
                class="required sm-form-control input-block-level"
                id="quick-contact-form-name"
                name="quick-contact-form-name"
                value=""
                placeholder="Full Name"
              />
              <input
                type="text"
                class="required sm-form-control email input-block-level"
                id="quick-contact-form-email"
                name="quick-contact-form-email"
                value=""
                placeholder="Email Address"
              />
              <textarea
                class="required sm-form-control input-block-level short-textarea"
                id="quick-contact-form-message"
                name="quick-contact-form-message"
                rows="4"
                cols="30"
                placeholder="Message"
              ></textarea>
              <input
                type="text"
                class="d-none"
                id="quick-contact-form-botcheck"
                name="quick-contact-form-botcheck"
                value=""
              />
              <input type="hidden" name="prefix" value="quick-contact-form-" />
              <button
                type="submit"
                id="quick-contact-form-submit"
                name="quick-contact-form-submit"
                class="button button-small button-3d m-0"
                value="submit"
              >
                Send Email
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Document Wrapper
	============================================= -->
    <div id="wrapper" class="clearfix">
      <!-- Header
		============================================= -->
      <header
        id="header"
        class="full-header header-size-custom"
        data-sticky-shrink="false"
      >
        <div id="header-wrap">
          <div class="container-fluid">
            <div class="header-row flex-lg-row-reverse">
              <!-- Logo
						============================================= -->
            <?php
                      
                      if ($isLoggedIn){
                    ?>
                    <a class="button button-rounded button-black button-dark ms-0 clearfix" href="../login-register/"
                      ><div>Enter Customer Area</div></a
                    >
                    <?php
                      }
                      else{
                      ?>
                      <a class="button button-rounded button-black button-dark ms-0 clearfix" href="../login-register/"
                      ><div>Login/Register</div></a
                    >
                    <?php
                      }

                    ?>
              <div id="logo" class="me-lg-0 ms-lg-auto">
                
                <a href="#" class="standard-logo"
                  ><img
                    src="assets/demos/car/images/logo.png"
                    alt="CarHub Logo"
                />
              </a>


                <a href="#" class="retina-logo"
                  ><img
                    src="assets/demos/car/images/logo@2x.png"
                    alt="CarHub Logo"
                /></a>
              </div>
              <!-- #logo end -->

              <div id="primary-menu-trigger">
                <svg class="svg-trigger" viewBox="0 0 100 100">
                  <path
                    d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20"
                  ></path>
                  <path d="m 30,50 h 40"></path>
                  <path
                    d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20"
                  ></path>
                </svg>
              </div>

              <!-- Primary Navigation
						============================================= -->
              <nav class="primary-menu with-arrows">
                <ul class="menu-container">
                  <li class="menu-item current">
                    <a class="menu-link" href="#"><div>Home</div></a>
                  </li>
                  <!-- Mega Menu -->
                  <li class="menu-item mega-menu">
                    <a class="menu-link" href="demo-car-single.php"
                      ><div>Models</div></a
                    >
                    <div class="mega-menu-content mega-menu-style-2">
                      <div class="container">
                        <div class="row">
                          <ul
                            class="sub-menu-container mega-menu-column col-12"
                          >
                            <li class="menu-item">
                              <div class="widget text-center">
                                <h3 class="mb-0">Featured Models</h3>
                                <a
                                  href="#"
                                  class="button button-small button-rounded button-border button-dark button-black font-primary"
                                  style="margin: 10px 0 40px"
                                  >Show all Cars</a
                                >

                                <!-- Mega Menu Cars Carousel -->
                                
                              </div>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li class="menu-item">
                    <a class="menu-link" href="demo-car-listing.php"
                      ><div>Car Listing</div></a
                    >
                  </li>
                  <li class="menu-item">
                    <a class="menu-link" href="demo-car-accessories.php"
                      ><div>Services</div></a
                    >
                  </li>
                  <li class="menu-item">
                    <a class="menu-link" href="demo-car-faqs.php"
                      ><div>FAQs</div></a
                    >
                  </li>
                  <li class="menu-item">
                    <a class="menu-link" href="demo-car-blog.php"
                      ><div>Blog</div></a
                    >
                  </li>
                
                    
                </ul>
              </nav>
              <!-- #primary-menu end -->
            </div>
          </div>
        </div>
        <div class="header-wrap-clone"></div>
      </header>
      <!-- #header end -->

      <!-- Slider
		============================================= -->
      <section
        id="slider"
        class="slider-element swiper_wrapper min-vh-60 min-vh-md-100"
        data-dots="true"
        data-loop="true"
        data-grab="false"
      >
        <div class="swiper-container swiper-parent">
          <div class="swiper-wrapper">
            <div class="swiper-slide dark">
              <div class="container">
                <div class="slider-caption top-left">
                  <div>
                    <h2 class="font-primary nott">Volkwagen Golf 8</h2>
                    <p class="fw-light font-primary d-none d-sm-block">
                      Raise your limits over
                    </p>
                    <a
                      href="demo-car-single.php"
                      class="button button-rounded button-border button-white button-light nott"
                      >View Details</a
                    >
                  </div>
                </div>
              </div>
              <div
                class="swiper-slide-bg"
                style="
                  background-image: url('assets/demos/car/images/hero-slider/4.jpg');
                "
              ></div>
            </div>
            <div class="swiper-slide dark">
              <div class="container">
                <div class="slider-caption">
                  <div>
                    <h2 class="font-primary nott">Wallyscar Iris</h2>
                    <p class="fw-light font-primary d-none d-sm-block">
                      New and Powerful Tunisian Car
                    </p>
                    <a
                      href="demo-car-single.php"
                      class="button button-rounded button-border button-white button-light nott"
                      >View Details</a
                    >
                  </div>
                </div>
              </div>
              <div
                class="swiper-slide-bg"
                style="
                  background-image: url('assets/demos/car/images/hero-slider/2.jpg');
                "
              ></div>
            </div>
            <div class="swiper-slide dark">
              <div class="container">
                <div class="slider-caption slider-caption-center">
                  <div>
                    <h2 class="font-primary nott">Audi 2021 S5 Cabriolet</h2>
                    <p class="fw-light font-primary d-none d-sm-block">
                      A Black Diamond
                    </p>
                    <a
                      href="demo-car-single.php"
                      class="button button-rounded button-border button-white button-light nott"
                      >View Details</a
                    >
                  </div>
                </div>
              </div>
              <div
                class="swiper-slide-bg"
                style="
                  background-image: url('assets/demos/car/images/hero-slider/3.jpg');
                "
              ></div>
            </div>
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </section>
      <!-- #Slider End -->

      <!-- Content
		============================================= -->
      <section id="content" class="clearfix">
        <div class="content-wrap pb-0" style="padding-top: 1px">
          <!-- Masonry Thums
				============================================= -->

          <!-- Moving car on scroll
				============================================= -->
          <div class="section mt-0 clearfix" style="padding: 100px 0">
            <div class="running-car mt-6">
              <img
                class="car"
                src="assets/demos/car/images/moving-car/car.jpg"
                alt="Image"
              />
              <img
                class="wheel"
                src="assets/demos/car/images/moving-car/car-tier.png"
                alt="Image"
              />
            </div>
            <div class="container clearfix">
              <div class="row clearfix" style="position: relative">
                <div class="col-lg-6 offset-lg-6">
                  <div class="heading-block hlarge">
                    <h3>Our Fleet<br />Your Fleet</h3>
                  </div>
                  <p>
                    Assertively iterate enterprise-wide portals through
                    synergistic products. Efficiently build adaptive schemas
                    after transparent quality vectors. Phosfluorescently
                    optimize competitive resources after extensive convergence.
                    Rapidiously optimize high-quality meta-services via
                    distributed architectures. Credibly deliver 24/365.
                  </p>
                </div>
              </div>
            </div>
          </div>
          <!-- Moving car on scroll End -->

          <!-- Features Section
				============================================= -->
          <div class="container clearfix">
            <div class="row clearfix topmargin bottommargin">
              <div class="col-lg-4 col-md-6 topmargin bottommargin-sm">
                <div class="heading-block border-bottom-0">
                  <h2
                    class="nott ls0"
                    style="font-size: 44px; line-height: 1.2"
                  >
                    Explore the New Hyundai
                  </h2>
                </div>
                <span style="color: #bbb"
                  >The car differs from many competitors with its asymmetrical  
                  door configuration, featuring one large door on the driver side and two
                  smaller doors on the passenger side. This configuration is more common on commercial vehicles and minivans. 
                  In North America, the Veloster is equipped with Blue Link, a new telematics system which will eventually
                  be standard on all Hyundai models. The system is comparable to OnStar in GM vehicles, and provides customers with 
                  automatic crash notification, vehicle diagnostics, and remote control of vehicle features, among others.</span
                >
                <div class="clear"></div>
                <a
                  href="demo-car-single.php"
                  class="button button-rounded button-black button-dark ms-0 topmargin-sm clearfix"
                  >Know More</a
                >
              </div>

              <div class="col-lg-4 d-md-none d-lg-block center">
                <img src="assets/demos/car/images/features/bg1.png" alt="Car" />
              </div>

              <div class="col-lg-4 col-md-6 topmargin bottommargin-sm">
                <div class="feature-box fbox-plain topmargin">
                  <div class="fbox-icon">
                    <a href="#"><i class="icon-car-battery"></i></a>
                  </div>
                  <div class="fbox-content">
                    <h3>Long Battery Life</h3>
                    <p>
                      This car has regenrative energy.
                    </p>
                  </div>
                </div>

                <div class="feature-box fbox-plain topmargin">
                  <div class="fbox-icon">
                    <a href="#"><i class="icon-car-cogs2"></i></a>
                  </div>
                  <div class="fbox-content">
                    <h3>24x7 Service</h3>
                    <p>
                      Hyundai provides long and reliable &amp; warranty for its customers
                      
                    </p>
                  </div>
                </div>

                <div class="feature-box fbox-plain topmargin">
                  <div class="fbox-icon">
                    <a href="#"><i class="icon-car-pump"></i></a>
                  </div>
                  <div class="fbox-content">
                    <h3>Petrol, Diesel &amp; LPG</h3>
                    <p>
                      3 Kinds of power consumption.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Features Area End -->

          <!-- Revolution Slider
				============================================= -->
          <div
            class="section mb-0"
            style="
              background: #fff url('assets/demos/car/images/revslider/bg.png')
                center 70% no-repeat;
              background-size: 100% auto;
              padding: 100px 0 10px;
            "
          >
            <div class="container">
              <div
                id="rev_slider_424_1_wrapper"
                class="rev_slider_wrapper my-0 p-0 fullwidthbanner-container mx-auto"
                data-alias="image-gallery"
                style="max-width: 1240px"
              >
                <!-- START REVOLUTION SLIDER 5.2.0 auto mode -->
                <div
                  id="rev_slider_424_1"
                  class="rev_slider fullwidthabanner"
                  style="display: none"
                  data-version="5.2.0"
                >
                  <ul>
                    <!-- SLIDE  -->
                    <!-- SLIDE  -->
                    <li
                      data-index="rs-1479"
                      data-transition="slidefromleft"
                      data-slotamount="default"
                      data-hideafterloop="0"
                      data-hideslideonmobile="off"
                      data-easein="default"
                      data-easeout="default"
                      data-masterspeed="300"
                      data-thumb="assets/demos/car/images/revslider/1.png"
                      data-rotate="0"
                      data-saveperformance="off"
                      data-title="BMW 3 Series Sedan"
                      data-param1="Sedan"
                      data-param2=""
                      data-param3=""
                      data-param4=""
                      data-param5=""
                      data-param6=""
                      data-param7=""
                      data-param8=""
                      data-param9=""
                      data-param10=""
                      data-description=""
                    >
                      <!-- MAIN IMAGE -->
                      <img
                        src="include/rs-plugin/demos/assets/images/dummy.png"
                        alt="Image"
                        data-lazyload="assets/demos/car/images/revslider/1.png"
                        data-bgposition="left center"
                        data-bgfit="contain"
                        data-bgrepeat="no-repeat"
                        class="rev-slidebg"
                        data-no-retina
                      />
                      <!-- LAYER NR. 2 -->
                      <div
                        class="tp-caption font-body ls2 text-uppercase tp-resizeme"
                        id="slide-1479-layer-1"
                        data-x="['left','left','left','left']"
                        data-hoffset="['30','30','30','30']"
                        data-y="['top','top','top','top']"
                        data-voffset="['0','0','0','90']"
                        data-fontsize="['15','15','13','13']"
                        data-lineheight="['15','15','13','13']"
                        data-width="['370','370','290','210']"
                        data-height="none"
                        data-whitespace="nowrap"
                        data-type="text"
                        data-actions=""
                        data-basealign="slide"
                        data-responsive_offset="on"
                        data-textAlign="['left','left','left','left']"
                        data-frames='[{"from":"y:20px;opacity:0;","speed":2000,"to":"o:1;","delay":400,"ease":"Power4.easeOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]'
                        data-start="600"
                        data-splitin="none"
                        data-splitout="none"
                        data-responsive_offset="on"
                        style="
                          z-index: 6;
                          min-width: 370px;
                          max-width: 370px;
                          color: #eee;
                          white-space: nowrap;
                        "
                      >
                        BMW - 3 Series
                      </div>

                      <!-- LAYER NR. 3 -->
                      <div
                        class="tp-caption font-primary text-uppercase fw-bold tp-resizeme"
                        id="slide-1479-layer-2"
                        data-x="['left','left','left','left']"
                        data-hoffset="['30','30','30','30']"
                        data-y="['top','top','top','top']"
                        data-voffset="['30','30','92','68']"
                        data-fontsize="['40','40','30','20']"
                        data-lineheight="['40','40','30','20']"
                        data-width="['500','500','400','210']"
                        data-height="none"
                        data-whitespace="normal"
                        data-type="text"
                        data-actions=""
                        data-basealign="slide"
                        data-responsive_offset="on"
                        data-textAlign="['left','left','left','left']"
                        data-frames='[{"from":"y:20px;opacity:0;","speed":2000,"to":"o:1;","delay":600,"ease":"Power4.easeOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]'
                        data-splitin="none"
                        data-splitout="none"
                        data-responsive_offset="on"
                        style="
                          z-index: 7;
                          color: #fff;
                          letter-spacing: 2px;
                          white-space: normal;
                        "
                      >
                        BMW 3 Series Sedan
                      </div>

                      <!-- LAYER NR. 4 -->
                      <div
                        class="tp-caption font-primary text-uppercase tp-resizeme"
                        id="slide-1479-layer-3"
                        data-x="['right','right','right','right']"
                        data-hoffset="['30','30','30','30']"
                        data-y="['top','top','top','top']"
                        data-voffset="['115','115','215','154']"
                        data-fontsize="['60','60','30','20']"
                        data-lineheight="['23','23','21','20']"
                        data-width="['360','360','290','210']"
                        data-height="none"
                        data-whitespace="normal"
                        data-type="text"
                        data-actions=""
                        data-basealign="slide"
                        data-responsive_offset="on"
                        data-textAlign="['right','right','right','right']"
                        data-frames='[{"from":"y:20px;opacity:0;","speed":2000,"to":"o:1;","delay":800,"ease":"Power4.easeOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]'
                        data-splitin="none"
                        data-splitout="none"
                        data-responsive_offset="on"
                        style="
                          z-index: 8;
                          min-width: 360px;
                          max-width: 360px;
                          color: #eee;
                          font-weight: 700;
                          white-space: normal;
                        "
                      >
                        $2,300
                      </div>

                      <!-- LAYER NR. 4 -->
                      <div
                        class="tp-caption font-body ls0 tp-resizeme"
                        id="slide-1479-layer-4"
                        data-x="['right','right','right','right']"
                        data-hoffset="['30','30','30','30']"
                        data-y="['top','top','top','top']"
                        data-voffset="['200','200','215','154']"
                        data-fontsize="['14','14','14','13']"
                        data-lineheight="['23','23','21','20']"
                        data-width="['360','360','290','210']"
                        data-height="none"
                        data-whitespace="normal"
                        data-type="text"
                        data-actions=""
                        data-basealign="slide"
                        data-responsive_offset="on"
                        data-textAlign="['right','right','right','right']"
                        data-frames='[{"from":"y:20px;opacity:0;","speed":2000,"to":"o:1;","delay":1000,"ease":"Power4.easeOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]'
                        data-splitin="none"
                        data-splitout="none"
                        data-responsive_offset="on"
                        style="
                          z-index: 8;
                          min-width: 360px;
                          max-width: 360px;
                          color: #eee;
                          white-space: normal;
                        "
                      >
                        There is, one knows not what sweet mystery about this
                        sea, whose gently awful stirrings seem to speak of some
                        hidden soul beneath; like those fabled undulations of.
                      </div>

                      <!-- LAYER NR. 5 -->
                      <div
                        class="tp-caption button button-black button-dark button-circle button-large nott tp-resizeme"
                        id="slide-1479-layer-5"
                        data-x="['right','right','right','right']"
                        data-hoffset="['25','25','25','25']"
                        data-y="['top','top','top','top']"
                        data-voffset="['336','346','336','366']"
                        data-width="none"
                        data-height="none"
                        data-whitespace="nowrap"
                        data-type="text"
                        data-actions=""
                        data-basealign="slide"
                        data-responsive_offset="on"
                        data-textAlign="['right','right','right','right']"
                        data-frames='[{"from":"y:20px;opacity:0;","speed":2000,"to":"o:1;","delay":1200,"ease":"Power4.easeOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]'
                        data-splitin="none"
                        data-splitout="none"
                        data-responsive_offset="on"
                        style="z-index: 9; white-space: nowrap; cursor: pointer"
                      >
                        Know More
                      </div>
                    </li>
                    <!-- SLIDE  -->
                    <li
                      data-index="rs-1480"
                      data-transition="slidefromleft"
                      data-slotamount="default"
                      data-hideafterloop="0"
                      data-hideslideonmobile="off"
                      data-easein="default"
                      data-easeout="default"
                      data-masterspeed="300"
                      data-thumb="assets/demos/car/images/revslider/2.png"
                      data-rotate="0"
                      data-saveperformance="off"
                      data-title="Audi A4 - White"
                      data-param1="Sedan"
                      data-param2=""
                      data-param3=""
                      data-param4=""
                      data-param5=""
                      data-param6=""
                      data-param7=""
                      data-param8=""
                      data-param9=""
                      data-param10=""
                      data-description=""
                    >
                      <!-- MAIN IMAGE -->
                      <img
                        src="include/rs-plugin/demos/assets/images/dummy.png"
                        alt="Image"
                        data-lazyload="assets/demos/car/images/revslider/2.png"
                        data-bgposition="left center"
                        data-bgfit="contain"
                        data-bgrepeat="no-repeat"
                        class="rev-slidebg"
                        data-no-retina
                      />
                      <!-- LAYER NR. 2 -->
                      <div
                        class="tp-caption font-body ls2 text-uppercase tp-resizeme"
                        id="slide-1480-layer-1"
                        data-x="['left','left','left','left']"
                        data-hoffset="['30','30','30','30']"
                        data-y="['top','top','top','top']"
                        data-voffset="['0','0','0','90']"
                        data-fontsize="['15','15','13','13']"
                        data-lineheight="['15','15','13','13']"
                        data-width="['370','370','290','210']"
                        data-height="none"
                        data-whitespace="nowrap"
                        data-type="text"
                        data-actions=""
                        data-basealign="slide"
                        data-responsive_offset="on"
                        data-textAlign="['left','left','left','left']"
                        data-frames='[{"from":"y:20px;opacity:0;","speed":2000,"to":"o:1;","delay":400,"ease":"Power4.easeOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]'
                        data-start="600"
                        data-splitin="none"
                        data-splitout="none"
                        data-responsive_offset="on"
                        style="
                          z-index: 6;
                          min-width: 370px;
                          max-width: 370px;
                          color: #eee;
                          white-space: nowrap;
                        "
                      >
                        Audi
                      </div>

                      <!-- LAYER NR. 3 -->
                      <div
                        class="tp-caption font-primary text-uppercase fw-bold tp-resizeme"
                        id="slide-1480-layer-2"
                        data-x="['left','left','left','left']"
                        data-hoffset="['30','30','30','30']"
                        data-y="['top','top','top','top']"
                        data-voffset="['30','30','92','68']"
                        data-fontsize="['40','40','30','20']"
                        data-lineheight="['40','40','30','20']"
                        data-width="['500','500','400','210']"
                        data-height="none"
                        data-whitespace="normal"
                        data-type="text"
                        data-actions=""
                        data-basealign="slide"
                        data-responsive_offset="on"
                        data-textAlign="['left','left','left','left']"
                        data-frames='[{"from":"y:20px;opacity:0;","speed":2000,"to":"o:1;","delay":600,"ease":"Power4.easeOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]'
                        data-splitin="none"
                        data-splitout="none"
                        data-responsive_offset="on"
                        style="
                          z-index: 7;
                          color: #fff;
                          letter-spacing: 2px;
                          white-space: normal;
                        "
                      >
                        Audi A4 - Sedan
                      </div>

                      <!-- LAYER NR. 4 -->
                      <div
                        class="tp-caption font-primary text-uppercase tp-resizeme"
                        id="slide-1480-layer-3"
                        data-x="['right','right','right','right']"
                        data-hoffset="['30','30','30','30']"
                        data-y="['top','top','top','top']"
                        data-voffset="['115','115','215','154']"
                        data-fontsize="['60','60','30','20']"
                        data-lineheight="['23','23','21','20']"
                        data-width="['360','360','290','210']"
                        data-height="none"
                        data-whitespace="normal"
                        data-type="text"
                        data-actions=""
                        data-basealign="slide"
                        data-responsive_offset="on"
                        data-textAlign="['right','right','right','right']"
                        data-frames='[{"from":"y:20px;opacity:0;","speed":2000,"to":"o:1;","delay":800,"ease":"Power4.easeOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]'
                        data-splitin="none"
                        data-splitout="none"
                        data-responsive_offset="on"
                        style="
                          z-index: 8;
                          min-width: 360px;
                          max-width: 360px;
                          color: #eee;
                          font-weight: 700;
                          white-space: normal;
                        "
                      >
                        $2,300
                      </div>

                      <!-- LAYER NR. 4 -->
                      <div
                        class="tp-caption font-body ls0 tp-resizeme"
                        id="slide-1480-layer-4"
                        data-x="['right','right','right','right']"
                        data-hoffset="['30','30','30','30']"
                        data-y="['top','top','top','top']"
                        data-voffset="['200','200','215','154']"
                        data-fontsize="['14','14','14','13']"
                        data-lineheight="['23','23','21','20']"
                        data-width="['360','360','290','210']"
                        data-height="none"
                        data-whitespace="normal"
                        data-type="text"
                        data-actions=""
                        data-basealign="slide"
                        data-responsive_offset="on"
                        data-textAlign="['right','right','right','right']"
                        data-frames='[{"from":"y:20px;opacity:0;","speed":2000,"to":"o:1;","delay":1000,"ease":"Power4.easeOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]'
                        data-splitin="none"
                        data-splitout="none"
                        data-responsive_offset="on"
                        style="
                          z-index: 8;
                          min-width: 360px;
                          max-width: 360px;
                          color: #eee;
                          white-space: normal;
                        "
                      >
                        There is, one knows not what sweet mystery about this
                        sea, whose gently awful stirrings seem to speak of some
                        hidden soul beneath; like those fabled undulations of.
                      </div>

                      <!-- LAYER NR. 5 -->
                      <div
                        class="tp-caption button button-black button-dark button-circle button-large nott tp-resizeme"
                        id="slide-1480-layer-5"
                        data-x="['right','right','right','right']"
                        data-hoffset="['25','25','25','25']"
                        data-y="['top','top','top','top']"
                        data-voffset="['336','346','336','366']"
                        data-width="none"
                        data-height="none"
                        data-whitespace="nowrap"
                        data-type="text"
                        data-actions=""
                        data-basealign="slide"
                        data-responsive_offset="on"
                        data-textAlign="['right','right','right','right']"
                        data-frames='[{"from":"y:20px;opacity:0;","speed":2000,"to":"o:1;","delay":1200,"ease":"Power4.easeOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]'
                        data-splitin="none"
                        data-splitout="none"
                        data-responsive_offset="on"
                        style="z-index: 9; white-space: nowrap; cursor: pointer"
                      >
                        Know More
                      </div>
                    </li>
                    <li
                      data-index="rs-1481"
                      data-transition="slidefromleft"
                      data-slotamount="default"
                      data-hideafterloop="0"
                      data-hideslideonmobile="off"
                      data-easein="default"
                      data-easeout="default"
                      data-masterspeed="300"
                      data-thumb="assets/demos/car/images/revslider/3.png"
                      data-rotate="0"
                      data-saveperformance="off"
                      data-title="Brand New Mustand"
                      data-param1="Sedan"
                      data-param2=""
                      data-param3=""
                      data-param4=""
                      data-param5=""
                      data-param6=""
                      data-param7=""
                      data-param8=""
                      data-param9=""
                      data-param10=""
                      data-description=""
                    >
                      <!-- MAIN IMAGE -->
                      <img src="include/rs-plugin/demos/assets/images/dummy.png"
                      alt="Image"
                      data-lazyload="assets/demos/car/images/revslider/3.png"
                      data-bgposition="left center" data-bgfit="contain"
                      data-bgrepeat="no-repeat" class="rev-slidebg"
                      data-no-retina">

                      <!-- LAYER NR. 2 -->
                      <div
                        class="tp-caption font-body ls2 text-uppercase tp-resizeme"
                        id="slide-1481-layer-1"
                        data-x="['left','left','left','left']"
                        data-hoffset="['30','30','30','30']"
                        data-y="['top','top','top','top']"
                        data-voffset="['0','0','0','90']"
                        data-fontsize="['15','15','13','13']"
                        data-lineheight="['15','15','13','13']"
                        data-width="['370','370','290','210']"
                        data-height="none"
                        data-whitespace="nowrap"
                        data-type="text"
                        data-actions=""
                        data-basealign="slide"
                        data-responsive_offset="on"
                        data-textAlign="['left','left','left','left']"
                        data-frames='[{"from":"y:20px;opacity:0;","speed":2000,"to":"o:1;","delay":400,"ease":"Power4.easeOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]'
                        data-start="600"
                        data-splitin="none"
                        data-splitout="none"
                        data-responsive_offset="on"
                        style="
                          z-index: 6;
                          min-width: 370px;
                          max-width: 370px;
                          color: #eee;
                          white-space: nowrap;
                        "
                      >
                        Ford Mustang
                      </div>

                      <!-- LAYER NR. 3 -->
                      <div
                        class="tp-caption font-primary text-uppercase fw-bold tp-resizeme"
                        id="slide-1481-layer-2"
                        data-x="['left','left','left','left']"
                        data-hoffset="['30','30','30','30']"
                        data-y="['top','top','top','top']"
                        data-voffset="['30','30','92','68']"
                        data-fontsize="['40','40','30','20']"
                        data-lineheight="['40','40','30','20']"
                        data-width="['500','500','400','210']"
                        data-height="none"
                        data-whitespace="normal"
                        data-type="text"
                        data-actions=""
                        data-basealign="slide"
                        data-responsive_offset="on"
                        data-textAlign="['left','left','left','left']"
                        data-frames='[{"from":"y:20px;opacity:0;","speed":2000,"to":"o:1;","delay":600,"ease":"Power4.easeOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]'
                        data-splitin="none"
                        data-splitout="none"
                        data-responsive_offset="on"
                        style="
                          z-index: 7;
                          color: #fff;
                          letter-spacing: 2px;
                          white-space: normal;
                        "
                      >
                        Brand New Mustang
                      </div>

                      <!-- LAYER NR. 4 -->
                      <div
                        class="tp-caption font-primary text-uppercase tp-resizeme"
                        id="slide-1481-layer-3"
                        data-x="['right','right','right','right']"
                        data-hoffset="['30','30','30','30']"
                        data-y="['top','top','top','top']"
                        data-voffset="['115','115','215','154']"
                        data-fontsize="['60','60','30','20']"
                        data-lineheight="['23','23','21','20']"
                        data-width="['360','360','290','210']"
                        data-height="none"
                        data-whitespace="normal"
                        data-type="text"
                        data-actions=""
                        data-basealign="slide"
                        data-responsive_offset="on"
                        data-textAlign="['right','right','right','right']"
                        data-frames='[{"from":"y:20px;opacity:0;","speed":2000,"to":"o:1;","delay":800,"ease":"Power4.easeOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]'
                        data-splitin="none"
                        data-splitout="none"
                        data-responsive_offset="on"
                        style="
                          z-index: 8;
                          min-width: 360px;
                          max-width: 360px;
                          color: #eee;
                          font-weight: 700;
                          white-space: normal;
                        "
                      >
                        $2,300
                      </div>

                      <!-- LAYER NR. 4 -->
                      <div
                        class="tp-caption font-body ls0 tp-resizeme"
                        id="slide-1481-layer-4"
                        data-x="['right','right','right','right']"
                        data-hoffset="['30','30','30','30']"
                        data-y="['top','top','top','top']"
                        data-voffset="['200','200','215','154']"
                        data-fontsize="['14','14','14','13']"
                        data-lineheight="['23','23','21','20']"
                        data-width="['360','360','290','210']"
                        data-height="none"
                        data-whitespace="normal"
                        data-type="text"
                        data-actions=""
                        data-basealign="slide"
                        data-responsive_offset="on"
                        data-textAlign="['right','right','right','right']"
                        data-frames='[{"from":"y:20px;opacity:0;","speed":2000,"to":"o:1;","delay":1000,"ease":"Power4.easeOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]'
                        data-splitin="none"
                        data-splitout="none"
                        data-responsive_offset="on"
                        style="
                          z-index: 8;
                          min-width: 360px;
                          max-width: 360px;
                          color: #eee;
                          white-space: normal;
                        "
                      >
                        There is, one knows not what sweet mystery about this
                        sea, whose gently awful stirrings seem to speak of some
                        hidden soul beneath; like those fabled undulations of.
                      </div>

                      <!-- LAYER NR. 5 -->
                      <div
                        class="tp-caption button button-black button-dark button-circle button-large nott tp-resizeme"
                        id="slide-1481-layer-5"
                        data-x="['right','right','right','right']"
                        data-hoffset="['25','25','25','25']"
                        data-y="['top','top','top','top']"
                        data-voffset="['336','346','336','366']"
                        data-width="none"
                        data-height="none"
                        data-whitespace="nowrap"
                        data-type="text"
                        data-actions=""
                        data-basealign="slide"
                        data-responsive_offset="on"
                        data-textAlign="['right','right','right','right']"
                        data-frames='[{"from":"y:20px;opacity:0;","speed":2000,"to":"o:1;","delay":1200,"ease":"Power4.easeOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]'
                        data-splitin="none"
                        data-splitout="none"
                        data-responsive_offset="on"
                        style="z-index: 9; white-space: nowrap; cursor: pointer"
                      >
                        Know More
                      </div>
                    </li>
                    <!-- SLIDE  -->
                    <li
                      data-index="rs-1482"
                      data-transition="slidefromleft"
                      data-slotamount="default"
                      data-hideafterloop="0"
                      data-hideslideonmobile="off"
                      data-easein="default"
                      data-easeout="default"
                      data-masterspeed="300"
                      data-thumb="assets/demos/car/images/revslider/4.png"
                      data-rotate="0"
                      data-saveperformance="off"
                      data-title="Audi A3 Cabriolet"
                      data-param1="Convertible"
                      data-param2=""
                      data-param3=""
                      data-param4=""
                      data-param5=""
                      data-param6=""
                      data-param7=""
                      data-param8=""
                      data-param9=""
                      data-param10=""
                      data-description=""
                    >
                      <!-- MAIN IMAGE -->
                      <img
                        src="include/rs-plugin/demos/assets/images/dummy.png"
                        alt="Image"
                        data-lazyload="assets/demos/car/images/revslider/4.png"
                        data-bgposition="left center"
                        data-bgfit="contain"
                        data-bgrepeat="no-repeat"
                        class="rev-slidebg"
                        data-no-retina
                      />
                      <!-- LAYER NR. 2 -->
                      <div
                        class="tp-caption font-body ls2 text-uppercase tp-resizeme"
                        id="slide-1482-layer-1"
                        data-x="['left','left','left','left']"
                        data-hoffset="['30','30','30','30']"
                        data-y="['top','top','top','top']"
                        data-voffset="['40','40','40','90']"
                        data-fontsize="['15','15','13','13']"
                        data-lineheight="['15','15','13','13']"
                        data-width="['370','370','290','210']"
                        data-height="none"
                        data-whitespace="nowrap"
                        data-type="text"
                        data-actions=""
                        data-basealign="slide"
                        data-responsive_offset="on"
                        data-textAlign="['left','left','left','left']"
                        data-frames='[{"from":"y:20px;opacity:0;","speed":2000,"to":"o:1;","delay":400,"ease":"Power4.easeOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]'
                        data-start="600"
                        data-splitin="none"
                        data-splitout="none"
                        data-responsive_offset="on"
                        style="
                          z-index: 6;
                          min-width: 370px;
                          max-width: 370px;
                          color: #eee;
                          white-space: nowrap;
                        "
                      >
                        Audi Convertible
                      </div>

                      <!-- LAYER NR. 3 -->
                      <div
                        class="tp-caption font-primary text-uppercase fw-bold tp-resizeme"
                        id="slide-1482-layer-2"
                        data-x="['left','left','left','left']"
                        data-hoffset="['30','30','30','30']"
                        data-y="['top','top','top','top']"
                        data-voffset="['70','70','92','68']"
                        data-fontsize="['40','40','30','20']"
                        data-lineheight="['40','40','30','20']"
                        data-width="['500','500','400','210']"
                        data-height="none"
                        data-whitespace="normal"
                        data-type="text"
                        data-actions=""
                        data-basealign="slide"
                        data-responsive_offset="on"
                        data-textAlign="['left','left','left','left']"
                        data-frames='[{"from":"y:20px;opacity:0;","speed":2000,"to":"o:1;","delay":600,"ease":"Power4.easeOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]'
                        data-splitin="none"
                        data-splitout="none"
                        data-responsive_offset="on"
                        style="
                          z-index: 7;
                          color: #fff;
                          letter-spacing: 2px;
                          white-space: normal;
                        "
                      >
                        Audi A3 cabriolet
                      </div>

                      <!-- LAYER NR. 4 -->
                      <div
                        class="tp-caption font-primary text-uppercase tp-resizeme"
                        id="slide-1482-layer-3"
                        data-x="['right','right','right','right']"
                        data-hoffset="['30','30','30','30']"
                        data-y="['top','top','top','top']"
                        data-voffset="['115','115','215','154']"
                        data-fontsize="['60','60','30','20']"
                        data-lineheight="['23','23','21','20']"
                        data-width="['360','360','290','210']"
                        data-height="none"
                        data-whitespace="normal"
                        data-type="text"
                        data-actions=""
                        data-basealign="slide"
                        data-responsive_offset="on"
                        data-textAlign="['right','right','right','right']"
                        data-frames='[{"from":"y:20px;opacity:0;","speed":2000,"to":"o:1;","delay":800,"ease":"Power4.easeOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]'
                        data-splitin="none"
                        data-splitout="none"
                        data-responsive_offset="on"
                        style="
                          z-index: 8;
                          min-width: 360px;
                          max-width: 360px;
                          color: #eee;
                          font-weight: 700;
                          white-space: normal;
                        "
                      >
                        $2,300
                      </div>

                      <!-- LAYER NR. 4 -->
                      <div
                        class="tp-caption font-body ls0 tp-resizeme"
                        id="slide-1482-layer-4"
                        data-x="['right','right','right','right']"
                        data-hoffset="['30','30','30','30']"
                        data-y="['top','top','top','top']"
                        data-voffset="['200','200','215','154']"
                        data-fontsize="['14','14','14','13']"
                        data-lineheight="['23','23','21','20']"
                        data-width="['360','360','290','210']"
                        data-height="none"
                        data-whitespace="normal"
                        data-type="text"
                        data-actions=""
                        data-basealign="slide"
                        data-responsive_offset="on"
                        data-textAlign="['right','right','right','right']"
                        data-frames='[{"from":"y:20px;opacity:0;","speed":2000,"to":"o:1;","delay":1000,"ease":"Power4.easeOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]'
                        data-splitin="none"
                        data-splitout="none"
                        data-responsive_offset="on"
                        style="
                          z-index: 8;
                          min-width: 360px;
                          max-width: 360px;
                          color: #eee;
                          white-space: normal;
                        "
                      >
                        There is, one knows not what sweet mystery about this
                        sea, whose gently awful stirrings seem to speak of some
                        hidden soul beneath; like those fabled undulations of.
                      </div>

                      <!-- LAYER NR. 5 -->
                      <div
                        class="tp-caption button button-black button-dark button-circle button-large nott tp-resizeme"
                        id="slide-1482-layer-5"
                        data-x="['right','right','right','right']"
                        data-hoffset="['25','25','25','25']"
                        data-y="['top','top','top','top']"
                        data-voffset="['336','346','336','366']"
                        data-width="none"
                        data-height="none"
                        data-whitespace="nowrap"
                        data-type="text"
                        data-actions=""
                        data-basealign="slide"
                        data-responsive_offset="on"
                        data-textAlign="['right','right','right','right']"
                        data-frames='[{"from":"y:20px;opacity:0;","speed":2000,"to":"o:1;","delay":1200,"ease":"Power4.easeOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]'
                        data-splitin="none"
                        data-splitout="none"
                        data-responsive_offset="on"
                        style="z-index: 9; white-space: nowrap; cursor: pointer"
                      >
                        Know More
                      </div>
                    </li>
                    <!-- SLIDE  -->
                    <li
                      data-index="rs-1483"
                      data-transition="slidefromleft"
                      data-slotamount="default"
                      data-hideafterloop="0"
                      data-hideslideonmobile="off"
                      data-easein="default"
                      data-easeout="default"
                      data-masterspeed="300"
                      data-thumb="assets/demos/car/images/revslider/5.png"
                      data-rotate="0"
                      data-saveperformance="off"
                      data-title="Mercedes-Benz E-Class"
                      data-param1="Sedan"
                      data-param2=""
                      data-param3=""
                      data-param4=""
                      data-param5=""
                      data-param6=""
                      data-param7=""
                      data-param8=""
                      data-param9=""
                      data-param10=""
                      data-description=""
                    >
                      <!-- MAIN IMAGE -->
                      <img
                        src="include/rs-plugin/demos/assets/images/dummy.png"
                        alt="Image"
                        data-lazyload="assets/demos/car/images/revslider/5.png"
                        data-bgposition="left center"
                        data-bgfit="contain"
                        data-bgrepeat="no-repeat"
                        class="rev-slidebg"
                        data-no-retina
                      />
                      <!-- LAYER NR. 2 -->
                      <div
                        class="tp-caption font-body ls2 text-uppercase tp-resizeme"
                        id="slide-1483-layer-1"
                        data-x="['left','left','left','left']"
                        data-hoffset="['30','30','30','30']"
                        data-y="['top','top','top','top']"
                        data-voffset="['40','40','40','90']"
                        data-fontsize="['15','15','13','13']"
                        data-lineheight="['15','15','13','13']"
                        data-width="['370','370','290','210']"
                        data-height="none"
                        data-whitespace="nowrap"
                        data-type="text"
                        data-actions=""
                        data-basealign="slide"
                        data-responsive_offset="on"
                        data-textAlign="['left','left','left','left']"
                        data-frames='[{"from":"y:20px;opacity:0;","speed":2000,"to":"o:1;","delay":400,"ease":"Power4.easeOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]'
                        data-start="600"
                        data-splitin="none"
                        data-splitout="none"
                        data-responsive_offset="on"
                        style="
                          z-index: 6;
                          min-width: 370px;
                          max-width: 370px;
                          color: #eee;
                          white-space: nowrap;
                        "
                      >
                        Mercedes-Benz
                      </div>

                      <!-- LAYER NR. 3 -->
                      <div
                        class="tp-caption font-primary text-uppercase fw-bold tp-resizeme"
                        id="slide-1483-layer-2"
                        data-x="['left','left','left','left']"
                        data-hoffset="['30','30','30','30']"
                        data-y="['top','top','top','top']"
                        data-voffset="['70','70','92','68']"
                        data-fontsize="['40','40','30','20']"
                        data-lineheight="['40','40','30','20']"
                        data-width="['500','500','400','210']"
                        data-height="none"
                        data-whitespace="normal"
                        data-type="text"
                        data-actions=""
                        data-basealign="slide"
                        data-responsive_offset="on"
                        data-textAlign="['left','left','left','left']"
                        data-frames='[{"from":"y:20px;opacity:0;","speed":2000,"to":"o:1;","delay":600,"ease":"Power4.easeOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]'
                        data-splitin="none"
                        data-splitout="none"
                        data-responsive_offset="on"
                        style="
                          z-index: 7;
                          color: #fff;
                          letter-spacing: 2px;
                          white-space: normal;
                        "
                      >
                        Mercedes-Benz E-Class
                      </div>

                      <!-- LAYER NR. 4 -->
                      <div
                        class="tp-caption font-primary text-uppercase tp-resizeme"
                        id="slide-1483-layer-3"
                        data-x="['right','right','right','right']"
                        data-hoffset="['30','30','30','30']"
                        data-y="['top','top','top','top']"
                        data-voffset="['115','115','215','154']"
                        data-fontsize="['60','60','30','20']"
                        data-lineheight="['23','23','21','20']"
                        data-width="['360','360','290','210']"
                        data-height="none"
                        data-whitespace="normal"
                        data-type="text"
                        data-actions=""
                        data-basealign="slide"
                        data-responsive_offset="on"
                        data-textAlign="['right','right','right','right']"
                        data-frames='[{"from":"y:20px;opacity:0;","speed":2000,"to":"o:1;","delay":800,"ease":"Power4.easeOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]'
                        data-splitin="none"
                        data-splitout="none"
                        data-responsive_offset="on"
                        style="
                          z-index: 8;
                          min-width: 360px;
                          max-width: 360px;
                          color: #eee;
                          font-weight: 700;
                          white-space: normal;
                        "
                      >
                        $2,300
                      </div>

                      <!-- LAYER NR. 4 -->
                      <div
                        class="tp-caption font-body ls0 tp-resizeme"
                        id="slide-1483-layer-4"
                        data-x="['right','right','right','right']"
                        data-hoffset="['30','30','30','30']"
                        data-y="['top','top','top','top']"
                        data-voffset="['200','200','215','154']"
                        data-fontsize="['14','14','14','13']"
                        data-lineheight="['23','23','21','20']"
                        data-width="['360','360','290','210']"
                        data-height="none"
                        data-whitespace="normal"
                        data-type="text"
                        data-actions=""
                        data-basealign="slide"
                        data-responsive_offset="on"
                        data-textAlign="['right','right','right','right']"
                        data-frames='[{"from":"y:20px;opacity:0;","speed":2000,"to":"o:1;","delay":1000,"ease":"Power4.easeOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]'
                        data-splitin="none"
                        data-splitout="none"
                        data-responsive_offset="on"
                        style="
                          z-index: 8;
                          min-width: 360px;
                          max-width: 360px;
                          color: #eee;
                          white-space: normal;
                        "
                      >
                        There is, one knows not what sweet mystery about this
                        sea, whose gently awful stirrings seem to speak of some
                        hidden soul beneath; like those fabled undulations of.
                      </div>

                      <!-- LAYER NR. 5 -->
                      <div
                        class="tp-caption button button-black button-dark button-circle button-large nott tp-resizeme"
                        id="slide-1483-layer-5"
                        data-x="['right','right','right','right']"
                        data-hoffset="['25','25','25','25']"
                        data-y="['top','top','top','top']"
                        data-voffset="['336','346','336','366']"
                        data-width="none"
                        data-height="none"
                        data-whitespace="nowrap"
                        data-type="text"
                        data-actions=""
                        data-basealign="slide"
                        data-responsive_offset="on"
                        data-textAlign="['right','right','right','right']"
                        data-frames='[{"from":"y:20px;opacity:0;","speed":2000,"to":"o:1;","delay":1200,"ease":"Power4.easeOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]'
                        data-splitin="none"
                        data-splitout="none"
                        data-responsive_offset="on"
                        style="z-index: 9; white-space: nowrap; cursor: pointer"
                      >
                        Know More
                      </div>
                    </li>
                  </ul>
                  <div class="tp-bannertimer d-none"></div>
                </div>
              </div>
              <!-- END REVOLUTION SLIDER -->
            </div>
          </div>

          <!-- 360 degree car
				============================================= -->
          <div
            class="section dark mb-0 clearfix"
            style="
              background: #fff url('assets/demos/car/images/1.jpg') right bottom
                no-repeat;
              background-size: cover;
              padding: 80px 0 40px;
            "
          >
            <div
              class="container-fluid clearfix"
              style="position: relative; z-index: 2"
            >
              <div class="row clearfix">
                <div class="col-lg-8">
                  <div class="heading-block border-0 mb-0 center">
                    <h3 style="font-size: 32px; font-weight: 700">
                      360 Degree Drag
                    </h3>
                  </div>
                  <!-- 360 degree Car Content -->
                  <div class="threesixty 360-car">
                    <div class="spinner">
                      <span>0%</span>
                    </div>
                    <ol class="threesixty_images"></ol>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="row clearfix">
                    <div class="col-lg-10">
                      <div class="heading-block topmargin-sm border-0">
                        <h3
                          style="
                            text-transform: none;
                            font-size: 36px;
                            letter-spacing: 0px;
                            font-weight: 700;
                          "
                        >
                          Select other Models
                        </h3>
                        <span
                          >Intrinsicly formulate plug-and-play systems with
                          interactive communities. Quickly aggregate
                          plug-and-play.</span
                        >
                      </div>
                      <form
                        id="login-form"
                        name="login-form"
                        class="row mb-0"
                        action="#"
                        method="post"
                      >
                        <div class="col-12 form-group">
                          <select
                            class="selectpicker w-100 customjs"
                            title="Select Brand"
                            data-live-search="true"
                            data-size="6"
                          >
                            <option value="AUDI">Audi</option>
                            <option value="BMW All Series">
                              BMW All Series
                            </option>
                            <option value="HONDA">Honda</option>
                            <option value="MERCEDES-BENZ">MERCEDES-BENZ</option>
                            <option value="HONDA">Manza</option>
                            <option value="MERCEDES-BENZ">Huyndai</option>
                          </select>
                        </div>

                        <div class="col-12 form-group">
                          <select
                            class="selectpicker w-100 customjs"
                            data-size="6"
                            data-live-search="true"
                            title="Select Model"
                            style="line-height: 30px"
                          >
                            <optgroup label="AUDI">
                              <option value="R8">Audi R8</option>
                              <option value="TT">Audi TT</option>
                              <option value="S5">Audi S5</option>
                              <option value="A5">Audi A5</option>
                              <option value="TTS">Audi TTS</option>
                              <option value="RS5">Audi RS 5</option>
                            </optgroup>
                            <optgroup label="BMW All Series">
                              <option value="1-Series">
                                BMW 1 Series 5-Door
                              </option>
                              <option value="Series-ActiveE">
                                BMW 1 Series ActiveE
                              </option>
                              <option value="3-Series-Sedan">
                                BMW 3 Series Sedan
                              </option>
                              <option value="ActiveHybrid-3">
                                BMW ActiveHybrid 3
                              </option>
                              <option value="5-Series-Sedan">
                                BMW 5 Series Sedan
                              </option>
                              <option value="ActiveHybrid-5">
                                BMW ActiveHybrid 5
                              </option>
                              <option value="7-Series">BMW 7 Series</option>
                              <option value="ActiveHybrid-7">
                                BMW ActiveHybrid 7
                              </option>
                              <option value="M3-Sedan">BMW M3 Sedan</option>
                              <option value="M5-Sedan">BMW M5 Sedan</option>
                              <option value="3-Series-Turismo">
                                BMW 3 Series Gran Turismo
                              </option>
                              <option value="5=Series-Turismo">
                                BMW 5 Series Gran Turismo
                              </option>
                            </optgroup>
                            <optgroup label="HONDA">
                              <option value="Fit">Honda Fit</option>
                              <option value="City">Honda City</option>
                              <option value="Civic">Honda Civic</option>
                              <option value="Fit-EV1">Honda Fit EV1</option>
                              <option value="Accord">Honda Accord</option>
                              <option value="Crosstour">Honda Crosstour</option>
                              <option value="FCX-Clarity">
                                Honda FCX Clarity
                              </option>
                              <option value="Civic-Hybrid">
                                Honda Civic Hybrid
                              </option>
                              <option value="Accord-Hybrid">
                                Honda Accord Hybrid
                              </option>
                              <option value="Accord-Plug-In">
                                Honda Accord Plug-In
                              </option>
                            </optgroup>
                            <optgroup label="MERCEDES-BENZ">
                              <option value="S-Class">
                                2021 Mercedes-Benz S-Class Sedan
                              </option>
                              <option value="C-Class">
                                2021 Mercedes-Benz C-Class Sedan
                              </option>
                              <option value="E-Class">
                                2021 Mercedes-Benz E-Class Sedan
                              </option>
                              <option value="E-Class-Hybrid">
                                2021 Mercedes-Benz E-Class Hybrid
                              </option>
                              <option value="Maybach-S600">
                                2021 Mercedes-Benz Maybach S600
                              </option>
                              <option value="B-Class-Electric-Drive">
                                2021 Mercedes-Benz B-Class Electric Drive
                              </option>
                            </optgroup>
                          </select>
                        </div>

                        <div class="col-12 form-group">
                          <button
                            class="button button-rounded w-100 fw-normal m-0"
                            id="login-form-submit"
                            name="login-form-submit"
                            value="login"
                          >
                            Search
                          </button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div
              class="video-wrap d-block d-md-block d-lg-none"
              style="z-index: 0"
            >
              <div
                class="video-overlay"
                style="background: rgba(255, 255, 255, 0.8)"
              ></div>
            </div>
          </div>
          <!-- 360 Degree Section End -->

          <!-- 360 degree car
				============================================= -->

          <!-- Filter Car lists end -->

          <!-- Video Gallery on Hover
				============================================= -->
          <div class="section m-0 overflow-hidden">
            <div class="heading-block mb-0 center">
              <h2>Video Gallery</h2>
            </div>
          </div>
          <div
            class="dark section p-0 m-0 overflow-hidden"
            style="height: 740px"
          >
            <div class="row h-100 align-items-stretch">
              <!-- Video 1 -->
              <div class="col-md-6 col-12 p-0 dark videoplay-on-hover">
                <a href="assets/demos/car/car-listing.html">
                  <div class="vertical-middle center">
                    <div
                      class="before-heading text-uppercase ls1"
                      style="font-size: 14px; font-style: normal; color: #eee"
                    >
                      Mercedes
                    </div>
                    <h2 class="mb-0 ls1">Mercedes-AMG GT</h2>
                  </div>
                  <div class="video-wrap">
                    <video
                      id="slide-video-1"
                      poster="assets/demos/car/images/videos/1.jpg"
                      preload="auto"
                      loop
                      muted
                    >
                      <source
                        src="assets/demos/car/images/videos/1.mp4"
                        type="video/mp4"
                      />
                    </video>
                    <div
                      class="video-overlay"
                      style="background: rgba(0, 0, 0, 0.3)"
                    ></div>
                  </div>
                </a>
              </div>
              <!-- Video 2 -->
              <div class="col-md-6 col-12 p-0 dark videoplay-on-hover">
                <a href="assets/demos/car/car-listing.html">
                  <div class="vertical-middle center">
                    <div
                      class="before-heading text-uppercase ls1"
                      style="font-size: 14px; font-style: normal; color: #eee"
                    >
                      Mercedes
                    </div>
                    <h2 class="mb-0 ls1">Mercedes-AMG C 63</h2>
                  </div>
                  <div class="video-wrap">
                    <video
                      id="slide-video-2"
                      poster="assets/demos/car/images/videos/2.jpg"
                      preload="auto"
                      loop
                      muted
                    >
                      <source
                        src="assets/demos/car/images/videos/2.mp4"
                        type="video/mp4"
                      />
                    </video>
                    <div
                      class="video-overlay"
                      style="background: rgba(0, 0, 0, 0.4)"
                    ></div>
                  </div>
                </a>
              </div>
              <!-- Video 3 -->
              <div class="col-md-6 col-12 p-0 dark videoplay-on-hover">
                <a href="assets/demos/car/car-listing.html">
                  <div class="vertical-middle center">
                    <div
                      class="before-heading uppercase ls1"
                      style="font-size: 14px; font-style: normal; color: #eee"
                    >
                      BMW Auto
                    </div>
                    <h2 class="mb-0 ls1">BMW Z4 Roadster</h2>
                  </div>
                  <div class="video-wrap">
                    <video
                      id="slide-video-3"
                      poster="assets/demos/car/images/videos/3.jpg"
                      preload="auto"
                      loop
                      muted
                    >
                      <source
                        src="assets/demos/car/images/videos/3.mp4"
                        type="video/mp4"
                      />
                    </video>
                    <div
                      class="video-overlay"
                      style="background: rgba(0, 0, 0, 0.4)"
                    ></div>
                  </div>
                </a>
              </div>
              <!-- Video 4 -->
              <div class="col-md-6 col-12 p-0 dark videoplay-on-hover">
                <a href="assets/demos/car/car-listing.html">
                  <div class="vertical-middle center">
                    <div
                      class="before-heading uppercase ls1"
                      style="font-size: 14px; font-style: normal; color: #eee"
                    >
                      Mercedes Benz
                    </div>
                    <h2 class="mb-0 ls1">Mercedes-COUPÉ GLE 63</h2>
                  </div>
                  <div class="video-wrap">
                    <video
                      id="slide-video-4"
                      poster="assets/demos/car/images/videos/4.jpg"
                      preload="auto"
                      loop
                      muted
                    >
                      <source
                        src="assets/demos/car/images/videos/4.mp4"
                        type="video/mp4"
                      />
                    </video>
                    <div
                      class="video-overlay"
                      style="background: rgba(0, 0, 0, 0.3)"
                    ></div>
                  </div>
                </a>
              </div>
            </div>
          </div>
          <!-- Video Gallery end -->

          <!-- Counter Area
				============================================= -->
          <div class="section counter-section m-0 dark clearfix">
            <div class="container clearfix align-items-stretch">
              <div class="row">
                <div class="col-lg-3 col-md-6 center">
                  <div>
                    <i
                      class="i-plain i-large mx-auto color icon-car-fulltime"
                    ></i>
                    <div class="counter">
                      <span
                        data-from="10"
                        data-to="11365"
                        data-refresh-interval="50"
                        data-speed="1000"
                      ></span>
                    </div>
                    <h5>Happy Customers</h5>
                  </div>
                </div>

                <div class="col-lg-3 col-md-6 center">
                  <div>
                    <i class="i-plain i-large mx-auto color icon-car-money"></i>
                    <div class="counter">
                      <span
                        data-from="10"
                        data-to="145"
                        data-refresh-interval="50"
                        data-speed="700"
                      ></span>
                    </div>
                    <h5>Cars in Stock</h5>
                  </div>
                </div>

                <div class="col-lg-3 col-md-6 center">
                  <div>
                    <i class="i-plain i-large mx-auto color icon-car-fan"></i>
                    <div class="counter">
                      <span
                        data-from="10"
                        data-to="50"
                        data-refresh-interval="85"
                        data-speed="1200"
                      ></span>
                    </div>
                    <h5>Showrooms</h5>
                  </div>
                </div>

                <div class="col-lg-3 col-md-6 center">
                  <div>
                    <i class="i-plain i-large mx-auto color icon-car-fuel2"></i>
                    <div class="counter">
                      <span
                        data-from="10"
                        data-to="7664"
                        data-refresh-interval="30"
                        data-speed="900"
                      ></span>
                    </div>
                    <h5>Awwards</h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Counter Area end -->

          <!-- Featured Section
				============================================= -->
          <div
            class="section m-0 clearfix"
            style="
              background: #fff
                url('assets/demos/car/images/features/section-bg.jpg') left
                bottom no-repeat;
              background-size: cover;
              padding: 140px 0;
            "
          >
            <div class="container clearfix">
              <div class="row clearfix">
                <div class="col-lg-6 col-md-9">
                  <div class="heading-block">
                    <h3
                      style="
                        font-size: 58px;
                        line-height: 56px;
                        letter-spacing: -2px;
                      "
                    >
                      Our Fleet<br />Your Fleet
                    </h3>
                  </div>
                  <p>
                    Assertively iterate enterprise-wide portals through
                    synergistic products. Efficiently build adaptive schemas
                    after transparent quality vectors. Phosfluorescently
                    optimize competitive resources after extensive convergence.
                    Rapidiously optimize high-quality meta-services via
                    distributed architectures. Credibly deliver 24/365.
                  </p>

                  <div class="row topmargin clearfix">
                    <div class="col-md-6">
                      <div class="feature-box fbox-plain media-box">
                        <div class="fbox-icon" style="position: relative">
                          <a href="#"><i class="icon-car-service2"></i></a>
                        </div>
                        <div class="fbox-content" style="margin-top: 25px">
                          <h3>Skilled Professionals.</h3>
                          <p class="fw-light" style="color: #666">
                            Lorem ipsum dolor sit amet, consectetur adipisicing
                            elit. Eligendi rem, facilis nobis voluptatum est
                            perspiciatis mollitia.
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="feature-box fbox-plain media-box">
                        <div class="fbox-icon" style="position: relative">
                          <a href="#"><i class="icon-car-crane"></i></a>
                        </div>
                        <div class="fbox-content" style="margin-top: 25px">
                          <h3>Skilled Professionals.</h3>
                          <p class="fw-light" style="color: #666">
                            Lorem ipsum dolor sit amet, consectetur adipisicing
                            elit. Eligendi rem, facilis nobis voluptatum est
                            perspiciatis mollitia.
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Featured end -->

          <!-- Buy And Sell Section
				============================================= -->
          <div class="section m-0 p-0 clearfix">
            <div class="row align-items-stretch clearfix">
              <!-- Half Section 1 -->
              <div
                class="col-lg-6 dark bg-color"
                style="
                  background: url('assets/demos/car/images/5.jpg') center center
                    no-repeat;
                  background-size: cover;
                "
              >
                <div class="col-padding clearfix">
                  <i
                    class="i-plain i-xlarge icon-car-service inline-block"
                    style="margin-bottom: 20px"
                  ></i>
                  <div
                    class="heading-block border-0"
                    style="margin-bottom: 20px"
                  >
                    <h3>Are You Looking for a New Car?</h3>
                  </div>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Ab, aspernatur, doloribus. Aspernatur, maiores earum eaque
                    quas temporibus eius dolore dicta.
                  </p>
                  <a
                    href="#"
                    class="button button-rounded button-white button-light m-0"
                    >Know More</a
                  >
                </div>
              </div>
              <!-- Half Section 2 -->
              <div
                class="col-lg-6 clearfix bg-color"
                style="
                  background: url('assets/demos/car/images/6.jpg') center center
                    no-repeat;
                  background-size: cover;
                "
              >
                <div class="col-padding clearfix">
                  <i
                    class="i-plain i-xlarge icon-car-care inline-block"
                    style="margin-bottom: 20px"
                  ></i>
                  <div
                    class="heading-block border-0"
                    style="margin-bottom: 20px"
                  >
                    <h3>Want to sell a used car?</h3>
                  </div>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Ab, aspernatur, doloribus. Aspernatur, maiores earum eaque
                    quas temporibus eius dolore dicta.
                  </p>
                  <a
                    href="#"
                    class="button button-large button-dark button-black button-rounded m-0"
                    >Know More</a
                  >
                </div>
              </div>
            </div>
          </div>

          <!-- Before Footer Section
				============================================= -->
          <div
            class="section m-0 clearfix"
            style="
              background: #fff url('assets/demos/car/images/footer-bg.jpg')
                center bottom no-repeat;
              background-size: cover;
              height: 770px;
            "
          >
            <div class="mx-auto dark center clearfix" style="max-width: 570px">
              <div class="heading-block dark bottommargin-sm border-0">
                <h2 class="nott fw-medium">Raise Your Heart</h2>
                <p style="color: #ddd; margin-top: 10px">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse
                  ipsa necessitatibus rem facere perspiciatis neque laborum est,
                  illum commodi sunt, nobis voluptas.
                </p>
              </div>
              <a
                href="#"
                class="uppercase fw-bold ls2"
                style="
                  color: #fff;
                  font-size: 12px;
                  border-bottom: 1px solid #fff;
                "
                >Request a Quote</a
              >
              &rarr;
            </div>
          </div>
        </div>
      </section>
      <!-- #content end -->

      <!-- Footer
		============================================= -->
      <footer
        id="footer"
        class="dark border-0"
        style="background-color: #080808"
      >
        <div class="container-fluid px-5 clearfix">
          <!-- Footer Widgets
				============================================= -->
          <div class="footer-widgets-wrap">
            <div class="row col-mb-50 justify-content-between">
              <div class="col-lg-7">
                <div class="row col-mb-30">
                  <div class="col-6 col-lg-3">
                    
                  </div>
                  <div class="col-6 col-lg-3">
                    
                  </div>
                  <div class="col-6 col-lg-3">
                    
                  </div>
                  <div class="col-6 col-lg-3">
                    
                  </div>
                </div>
              </div>

              <div class="col-lg-5 text-center text-lg-end">
                <img
                  src="assets/demos/car/images/logo.png"
                  alt="Image"
                  height="50"
                />
                <br />
                <div style="color: #444">
                  <span>&copy; CarHub Automotive. All Rights Reserved.</span>
                  <div class="clear"></div>
                  <p style="margin-top: 10px">
                    Objectively restore standards compliant opportunities
                    whereas one-to-one collaboration and idea-sharing.
                  </p>
                </div>
              </div>
            </div>
          </div>
          <!-- .footer-widgets-wrap end -->
        </div>
      </footer>
      <!-- #footer end -->
    </div>
    <!-- #wrapper end -->

    <!-- Go To Top
	============================================= -->
    <div id="gotoTop" class="icon-angle-up"></div>

    <!-- Contact Button
	============================================= -->
    <div
      id="contact-me"
      class="icon-line-mail side-panel-trigger bg-color"
    ></div>

    <!-- JavaScripts
	============================================= -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/plugins.min.js"></script>
    <script src="assets/demos/car/js/360rotator.js"></script>

    <!-- Bootstrap Select Plugin -->
    <script src="assets/js/components/bs-select.js"></script>

    <!-- SLIDER REVOLUTION 5.x SCRIPTS  -->
    <script src="assets/include/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
    <script src="assets/include/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

    <script src="assets/include/rs-plugin/js/extensions/revolution.extension.actions.min.js"></script>
    <script src="assets/include/rs-plugin/js/extensions/revolution.extension.carousel.min.js"></script>
    <script src="assets/include/rs-plugin/js/extensions/revolution.extension.kenburn.min.js"></script>
    <script src="assets/include/rs-plugin/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script src="assets/include/rs-plugin/js/extensions/revolution.extension.migration.min.js"></script>
    <script src="assets/include/rs-plugin/js/extensions/revolution.extension.navigation.min.js"></script>
    <script src="assets/include/rs-plugin/js/extensions/revolution.extension.parallax.min.js"></script>
    <script src="assets/include/rs-plugin/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script src="assets/include/rs-plugin/js/extensions/revolution.extension.video.min.js"></script>

    <!-- Footer Scripts
	============================================= -->
    <script src="assets/js/functions.js"></script>
    <script>
      $(document).ready(function () {
        // to fade in on page load
        $("body").css("display", "none");
        $("body").fadeIn(800);
      });
    </script>
    <script>
      var $ = jQuery.noConflict();

      //Car Appear In View
      function isScrolledIntoView(elem) {
        var docViewTop = $(window).scrollTop();
        var docViewBottom = docViewTop + $(window).height();

        var elemTop = $(elem).offset().top + 180;
        var elemBottom = elemTop + $(elem).height() - 500;

        return elemBottom <= docViewBottom && elemTop >= docViewTop;
      }

      $(window).scroll(function () {
        $(".running-car").each(function () {
          if (isScrolledIntoView(this) === true) {
            $(this).addClass("in-view");
          } else {
            $(this).removeClass("in-view");
          }
        });
      });

      //threesixty degree
      window.onload = init;
      var car;
      function init() {
        car = $(".360-car").ThreeSixty({
          totalFrames: 52, // Total no. of image you have for 360 slider
          endFrame: 52, // end frame for the auto spin animation
          currentFrame: 3, // This the start frame for auto spin
          imgList: ".threesixty_images", // selector for image list
          progress: ".spinner", // selector to show the loading progress
          imagePath: "assets/demos/car/images/360degree-cars/", // path of the image assets
          filePrefix: "", // file prefix if any
          ext: ".png", // extention for the assets
          height: 887,
          width: 500,
          navigation: true,
          responsive: true,
        });
      }

      // Rev Slider
      var tpj = jQuery;
      var revapi424;
      tpj(document).ready(function () {
        if (tpj("#rev_slider_424_1").revolution == undefined) {
          revslider_showDoubleJqueryError("#rev_slider_424_1");
        } else {
          revapi424 = tpj("#rev_slider_424_1")
            .show()
            .revolution({
              sliderType: "carousel",
              jsFileLocation: "include/rs-plugin/js/",
              sliderLayout: "auto",
              dottedOverlay: "none",
              delay: 7000,
              navigation: {
                keyboardNavigation: "off",
                keyboard_direction: "horizontal",
                mouseScrollNavigation: "off",
                mouseScrollReverse: "default",
                onHoverStop: "off",
                touch: {
                  touchenabled: "on",
                  swipe_threshold: 75,
                  swipe_min_touches: 1,
                  swipe_direction: "horizontal",
                  drag_block_vertical: false,
                },
                arrows: {
                  style: "uranus",
                  enable: false,
                  hide_onmobile: false,
                  hide_onleave: true,
                  hide_delay: 200,
                  hide_delay_mobile: 1200,
                  tmp: "",
                  left: {
                    h_align: "left",
                    v_align: "center",
                    h_offset: -10,
                    v_offset: 0,
                  },
                  right: {
                    h_align: "right",
                    v_align: "center",
                    h_offset: -10,
                    v_offset: 0,
                  },
                },
                carousel: {
                  maxRotation: 65,
                  vary_rotation: "on",
                  minScale: 55,
                  vary_scale: "on",
                  horizontal_align: "center",
                  vertical_align: "center",
                  fadeout: "on",
                  vary_fade: "on",
                  maxVisibleItems: 5,
                  infinity: "off",
                  space: 0,
                  stretch: "on",
                },
                tabs: {
                  style: "ares",
                  enable: true,
                  width: 270,
                  height: 80,
                  min_width: 270,
                  wrapper_padding: 10,
                  wrapper_color: "transparent",
                  wrapper_opacity: "0.5",
                  tmp: '<div class="tp-tab-content">  <span class="tp-tab-date">{{param1}}</span>  <span class="tp-tab-title">{{title}}</span></div><div class="tp-tab-image"></div>',
                  visibleAmount: 7,
                  hide_onmobile: false,
                  hide_under: 420,
                  hide_onleave: false,
                  hide_delay_mobile: 1200,
                  hide_delay: 200,
                  direction: "horizontal",
                  span: true,
                  position: "outer-bottom",
                  space: 20,
                  h_align: "left",
                  v_align: "bottom",
                  h_offset: 0,
                  v_offset: 0,
                },
              },
              visibilityLevels: [1240, 1024, 778, 480],
              gridwidth: [1240, 992, 768, 420],
              gridheight: [600, 500, 960, 720],
              lazyType: "single",
              shadow: 0,
              spinner: "off",
              stopLoop: "off",
              stopAfterLoops: 0,
              stopAtSlide: 1,
              shuffle: "off",
              autoHeight: "off",
              hideThumbsOnMobile: "off",
              hideSliderAtLimit: 0,
              hideCaptionAtLimit: 0,
              hideAllCaptionAtLilmit: 0,
              debugMode: false,
              fallbacks: {
                simplifyAll: "off",
                nextSlideOnWindowFocus: "off",
                disableFocusListener: false,
              },
            });
        }
      }); /*ready*/

      // Video on play on hover
      jQuery(document).ready(function ($) {
        $(".videoplay-on-hover").hover(
          function () {
            if ($(this).find("video").length > 0) {
              $(this).find("video").get(0).play();
            }
          },
          function () {
            if ($(this).find("video").length > 0) {
              $(this).find("video").get(0).pause();
            }
          }
        );
      });
    </script>
  </body>
</html>
