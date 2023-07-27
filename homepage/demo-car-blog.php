<?php

include "../core/Controller/articleC.php";
include_once "../core/Controller/token.php";
include_once "../core/Controller/customerC.php";
$token = new token();
session_start();
$isLoggedIn = $token->is_user_logged_in();
$articleC = new articleC();
$list = $articleC->allArticles();
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
    <link rel="stylesheet" href="assets/css/font-icons.css" type="text/css" />

    <!-- car Specific Stylesheet -->
    <link rel="stylesheet" href="assets/demos/car/car.css" type="text/css" />
    <link
      rel="stylesheet"
      href="assets/demos/car/css/car-icons/style.css"
      type="text/css"
    />
    <link
      rel="stylesheet"
      href="assets/demos/car/css/fonts.css"
      type="text/css"
    />
    <!-- / -->

    <link rel="stylesheet" href="assets/css/animate.css" type="text/css" />
    <link
      rel="stylesheet"
      href="assets/css/magnific-popup.css"
      type="text/css"
    />

    <link rel="stylesheet" href="assets/css/custom.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link
      rel="stylesheet"
      href="assets/css/colors.php?color=c85e51"
      type="text/css"
    />

    <!-- Document Title
	============================================= -->
    <title>Articles - Car | CarHub</title>
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
              action="include/form.php"
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
                  <li class="menu-item">
                    <a class="menu-link" href="./"><div>Home</div></a>
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
                  <li class="menu-item current">
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


      <!-- Page Title
		============================================= -->
      <section id="page-title">
        <div class="container clearfix">
          <h1>News Feeds</h1>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Cars</a></li>
            <li class="breadcrumb-item active" aria-current="page">Blog</li>
          </ol>
        </div>
      </section>
      <!-- #page-title end -->

      <!-- Content
		============================================= -->
      <section id="content">
        <div class="content-wrap">
          <div class="container">
            <div class="row">
              
					<?php foreach ($list as $article) { ?>
              <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                  <img
                    class="card-img-top"
                    src="assets/demos/car/images/single/911cars/1.jpg"
                    alt="Card image cap"
                  />
                  
                  <div class="card-body">
                    <strong class="d-inline-block mb-2 text-black-50"
                      >Views : <?=$article['Views']?></strong
                    >
                    <h4 class="mb-2 fw-semibold text-uppercase">
                      <a class="text-dark" href="#"
                        ><?=$article['Title']?></a
                      >
                    </h4>
                    <a href="#" class="card-link">ExpiryDate: <?=$article['ExpiryDate']?></a>
                    <p class="card-text my-3">
                      Description: <?=$article['Description']?>
                    </p>
                    <a
                      href='article.php?Title=<?=$article['Title']?>'
                      class="button button-3d button-rounded nott fw-semibold ls0 m-0"
                      >Comments</a
                    >
                  </div>
                </div>
              </div>

              <?php } ?>
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
  </body>
</html>
