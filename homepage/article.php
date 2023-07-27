<?php
include_once "../core/Controller/token.php";
include_once "../core/Controller/adminC.php";
include_once "../core/Controller/commentsC.php";
include "../core/Controller/articleC.php";

$token = new token();
session_start();
if ($token->is_user_logged_in()) {
  $adminC = new adminC;
  if (!$adminC->ExistsAsAdmin($_SESSION['user_id']))
    header('Location: http://localhost/project2223_2a15-ninjahub/notfound');
  else {
    $adminC = new adminC();
    $admin = $adminC->retrieveAdmin($_SESSION['user_id']);
  }
} else
  header('Location: http://localhost/project2223_2a15-ninjahub/notfound');

$articleC = new articleC();
$commentsC = new commentsC();
$article = $articleC->findArticle($_GET['Title']);
$allComents = $commentsC->findComments($_GET['Title']);
$error = null;


// create client
$comment = null;
$error = null;
// create an instance of the controller
if (
  isset($_POST["Content"])
) {
  if (
    !empty($_POST['Content'])
  ) {
    $comment = new comments(
      $_GET['Title'],
      $_SESSION['user_id'],
      $_POST["Content"]
    );
    $commentsC->addComment($comment);
    header('Location: article.php?Title=' . $_GET["Title"]);
  } else
    $error = "Missing information";
}

if (
  isset($_GET["Delete"])
) {
  $commentsC->deleteComment($_GET["Title"], $_GET["CIN"], $_GET["Content"]);
  header('Location: article.php?Title=' . $_GET["Title"]);
}

if (
  isset($_GET["edit"])
) {
  $commentsC->updateComment($_GET["Title"], $_GET["CIN"], $_GET["Content"],$_GET["newComment"]);
  header('Location: article.php?Title=' . $_GET["Title"]);
}
if ($error != null)
  echo '<script>alert("' . $error . '")</script>';


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
  <link href="https://fonts.googleapis.com/css?family=Mukta+Vaani:300,400,500,600,700|Open+Sans:300,400,600,700,800,900&display=swap" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="assets/css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="assets/style.css" type="text/css" />
  <link rel="stylesheet" href="assets/css/dark.css" type="text/css" />
  <link rel="stylesheet" href="assets/css/swiper.css" type="text/css" />
  <link rel="stylesheet" href="assets/css/font-icons.css" type="text/css" />

  <!-- car Specific Stylesheet -->
  <link rel="stylesheet" href="assets/demos/car/car.css" type="text/css" />
  <link rel="stylesheet" href="assets/demos/car/css/car-icons/style.css" type="text/css" />
  <link rel="stylesheet" href="assets/demos/car/css/fonts.css" type="text/css" />
  <!-- / -->

  <link rel="stylesheet" href="assets/css/animate.css" type="text/css" />
  <link rel="stylesheet" href="assets/css/magnific-popup.css" type="text/css" />

  <link rel="stylesheet" href="assets/css/custom.css" type="text/css" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="stylesheet" href="assets/css/colors.php?color=c85e51" type="text/css" />

  <!-- Document Title
	============================================= -->
  <title>Single - Car Demo | CarHub</title>

  <style>
    .container_comment {
      background-color: #eef2f5;
      width: 400px;
    }

    .addtxt {
      padding-top: 10px;
      padding-bottom: 10px;
      text-align: center;
      font-size: 13px;
      width: 600px;
      background-color: #e5e8ed;
      font-weight: 500;
    }

    .form-control:focus {
      color: #000;
    }

    .second {
      width: 600px;
      background-color: white;
      border-radius: 4px;
      box-shadow: 10px 10px 5px #aaaaaa;
    }

    .text1 {
      font-size: 13px;
      font-weight: 500;
      color: #56575b;
    }

    .text2 {
      font-size: 13px;
      font-weight: 500;
      margin-left: 6px;
      color: #56575b;
    }

    .text3 {
      font-size: 13px;
      font-weight: 500;
      margin-right: 4px;
      color: #828386;
    }

    .text3o {
      color: #00a5f4;

    }

    .text4 {
      font-size: 13px;
      font-weight: 500;
      color: #828386;
    }

    .text4i {
      color: #00a5f4;
    }

    .text4o {
      color: white;
    }

    .thumbup {
      font-size: 13px;
      font-weight: 500;
      margin-right: 5px;
    }

    .thumbupo {
      color: #17a2b8;
    }

    /*--------------------
		paginations
		---------------------*/
    .dark .swiper-pagination span:nth-child(1):hover,
    .dark .swiper-pagination span:nth-child(1) {
      background-color: #7f858d;
    }

    .dark .swiper-pagination span:nth-child(2):hover,
    .dark .swiper-pagination span:nth-child(2) {
      background-color: #cb394e;
    }

    .dark .swiper-pagination span:nth-child(3):hover,
    .dark .swiper-pagination span:nth-child(3) {
      background-color: #75787b;
    }

    .dark .swiper-pagination span:nth-child(4):hover,
    .dark .swiper-pagination span:nth-child(4) {
      background-color: #9c780e;
    }

    /*--------------------
		Background
		--------------------*/
    .bg {
      position: absolute;
      top: 50%;
      left: 50%;
      -webkit-transform: translate(-50%, -50%);
      transform: translate(-50%, -50%);
      width: 100%;
      height: 100%;
    }

    /*--------------------
		Slider-text
		--------------------*/
    .slider-text {
      position: absolute;
      top: 150px;
      left: 50%;
      transform: translate(-50%, -50%);
      z-index: 2;
      text-align: center;
    }

    .slider-text h2 {
      font-weight: 700;
      margin-bottom: 10px;
    }

    .slider-text p {
      font-size: 17px;
      font-weight: 300;
      opacity: 0.7;
    }
  </style>
</head>

<body class="stretched side-push-panel" data-loader-html="<div><img src='assets/demos/car/images/page-loader.gif' alt='Loader'></div>">
  <!-- Side Panel Overlay -->
  <div class="body-overlay"></div>

  <!-- Side Panel -->
  <div id="side-panel">
    <div id="side-panel-trigger-close" class="side-panel-trigger">
      <a href="#"><i class="icon-line-cross"></i></a>
    </div>

    <div class="side-panel-wrap">
      <div class="widget clearfix">
        <a href="index.html"><img src="assets/demos/car/images/logo@2x.png" alt="CarHub Logo" height="50" /></a>

        <p>
          It has always been, and will always be, about quality. We're
          passionate about ethically sourcing the finest coffee beans,
          roasting them with great care. We'd like to hear your message!
        </p>

        <div class="widget quick-contact-widget form-widget border-0 pt-0 clearfix">
          <h4>Quick Contact</h4>
          <div class="form-result"></div>
          <form id="quick-contact-form" name="quick-contact-form" action="include/form.php" method="post" class="quick-contact-form mb-0">
            <div class="form-process">
              <div class="css3-spinner">
                <div class="css3-spinner-scaler"></div>
              </div>
            </div>
            <input type="text" class="required sm-form-control input-block-level" id="quick-contact-form-name" name="quick-contact-form-name" value="" placeholder="Full Name" />
            <input type="text" class="required sm-form-control email input-block-level" id="quick-contact-form-email" name="quick-contact-form-email" value="" placeholder="Email Address" />
            <textarea class="required sm-form-control input-block-level short-textarea" id="quick-contact-form-message" name="quick-contact-form-message" rows="4" cols="30" placeholder="Message"></textarea>
            <input type="text" class="d-none" id="quick-contact-form-botcheck" name="quick-contact-form-botcheck" value="" />
            <input type="hidden" name="prefix" value="quick-contact-form-" />
            <button type="submit" id="quick-contact-form-submit" name="quick-contact-form-submit" class="button button-small button-3d m-0" value="submit">
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
    <header id="header" class="full-header header-size-custom" data-sticky-shrink="false">
      <div id="header-wrap">
        <div class="container-fluid">
          <div class="header-row flex-lg-row-reverse">
            <!-- Logo
						============================================= -->
            <div id="logo" class="me-lg-0 ms-lg-auto">
              <a href="demo-car.html" class="standard-logo"><img src="assets/demos/car/images/logo.png" alt="CarHub Logo" /></a>
              <a href="demo-car.html" class="retina-logo"><img src="assets/demos/car/images/logo@2x.png" alt="CarHub Logo" /></a>
            </div>
            <!-- #logo end -->

            <div id="primary-menu-trigger">
              <svg class="svg-trigger" viewBox="0 0 100 100">
                <path d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20"></path>
                <path d="m 30,50 h 40"></path>
                <path d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20"></path>
              </svg>
            </div>

            <!-- Primary Navigation
						============================================= -->
            <nav class="primary-menu with-arrows">
              <ul class="menu-container">
                <li class="menu-item current">
                  <a class="menu-link" href="demo-car.html">
                    <div>Home</div>
                  </a>
                </li>
                <!-- Mega Menu -->
                <li class="menu-item mega-menu">
                  <a class="menu-link" href="demo-car-single.html">
                    <div>Models</div>
                  </a>
                  <div class="mega-menu-content mega-menu-style-2">
                    <div class="container">
                      <div class="row">
                        <ul class="sub-menu-container mega-menu-column col-12">
                          <li class="menu-item">
                            <div class="widget text-center">
                              <h3 class="mb-0">Featured Models</h3>
                              <a href="#" class="button button-small button-rounded button-border button-dark button-black font-primary" style="margin: 10px 0 40px">Show all Cars</a>

                              <!-- Mega Menu Cars Carousel -->
                              <div class="owl-carousel image-carousel carousel-widget" data-margin="20" data-nav="false" data-pagi="true" data-items-xs="1" data-items-sm="2" data-items-md="4" data-items-lg="6" data-items-xl="6">
                                <div class="oc-item center">
                                  <a href="demo-car-single.html"><img src="assets/demos/car/images/mega-menu/1.png" alt="Car" />BMW 1 Series ActiveE</a>
                                </div>
                                <div class="oc-item center">
                                  <a href="demo-car-single.html"><img src="assets/demos/car/images/mega-menu/4.png" alt="Car" />Mercedes-Benz S-Class</a>
                                </div>
                                <div class="oc-item center">
                                  <a href="demo-car-single.html"><img src="assets/demos/car/images/mega-menu/5.png" alt="Car" />Gran Turismo</a>
                                </div>
                                <div class="oc-item center">
                                  <a href="demo-car-single.html"><img src="assets/demos/car/images/mega-menu/6.png" alt="Car" />Mclaren 675LT SPIDER</a>
                                </div>
                                <div class="oc-item center">
                                  <a href="demo-car-single.html"><img src="assets/demos/car/images/mega-menu/7.png" alt="Car" />Honda City</a>
                                </div>
                                <div class="oc-item center">
                                  <a href="demo-car-single.html"><img src="assets/demos/car/images/mega-menu/8.png" alt="Car" />Toyota Qualis</a>
                                </div>
                                <div class="oc-item center">
                                  <a href="demo-car-single.html"><img src="assets/demos/car/images/mega-menu/9.png" alt="Car" />Honda WR-V</a>
                                </div>
                                <div class="oc-item center">
                                  <a href="demo-car-single.html"><img src="assets/demos/car/images/mega-menu/10.png" alt="Car" />Suzuki Breeza</a>
                                </div>
                                <div class="oc-item center">
                                  <a href="demo-car-single.html"><img src="assets/demos/car/images/mega-menu/2.png" alt="Car" />Chevrolet Spark</a>
                                </div>
                                <div class="oc-item center">
                                  <a href="demo-car-single.html"><img src="assets/demos/car/images/mega-menu/3.png" alt="Car" />Honda JaZZ</a>
                                </div>
                              </div>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="menu-item">
                  <a class="menu-link" href="demo-car-listing.html">
                    <div>Car Listing</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a class="menu-link" href="demo-car-dealers.html">
                    <div>Dealers</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a class="menu-link" href="demo-car-accessories.html">
                    <div>Services</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a class="menu-link" href="demo-car-interiors.html">
                    <div>Interiors</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a class="menu-link" href="demo-car-faqs.php">
                    <div>FAQs</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a class="menu-link" href="demo-car-blog.html">
                    <div>Blog</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a class="menu-link" href="demo-car-contact.html">
                    <div>Contacts</div>
                  </a>
                </li>
              </ul>
            </nav>
            <!-- #primary-menu end -->
          </div>
        </div>
      </div>
      <div class="header-wrap-clone"></div>
    </header>
    <!-- Content
		============================================= -->
    <section id="content">
      <div class="content-wrap pt-5">
        <div class="container">
          <div class="row">
            <!-- Posts -->
            <div class="col-md-8">
              <!-- Page Section - features
							============================================= -->
              <div id="section-features" class="page-section">
                <h1 class="mb-3"><?= $article['Title'] ?></h1>
                <h3 class="mb-3">Description</h3>
                <p>
                  <?= $article['Description'] ?>
                </p>
              </div>

              <!-- Page Section - gallery
							============================================= -->

            </div>

            <!-- Sidebar -->
            <div class="col-md-4">
              <div class="mb-4">
                <h2 class="mb-0 h1 fw-semibold ls0"><?= $article['Views'] ?></h2>
                <small>Views</small>
              </div>
              <div class="line line-sm my-3"></div>
              <div>
                <h2 class="mb-0 fw-semibold h2 ls0"><?= $article['ExpiryDate'] ?></h2>
                <small>ExpiryDate</small>
              </div>
            </div>
          </div>


          <!-- Page Section - store
					============================================= -->
          <div id="section-store" class="page-section mt-3">
            <div class="container justify-content-center mt-5 border-left border-right">
              <form method="POST">
                <div class="d-flex justify-content-center pt-3 pb-2"> <input type="text" name="Content" placeholder="+ Add a Comment" class="form-control addtxt"> </div>
              </form>

              <?php foreach ($allComents as $comment) { ?>
                <div class="d-flex justify-content-center">
                  <div class="second py-2 px-2"> <span class="text1"><?= $comment['Content'] ?></span>
                    <div class="d-flex justify-content-between py-1 pt-2">
                      <div><img src="https://i.imgur.com/AgAC1Is.jpg" width="18"><span class="text2"><?= $comment['CIN'] ?></span></div>
                      <?php if ($comment['CIN'] == $_SESSION['user_id']) { ?>
                        <div>
                          <span class="text3"><a onclick="editComment('<?= $comment['Title'] ?>','<?= $comment['CIN'] ?>','<?= $comment['Content'] ?>')">✏️</a></span>
                          <span class="text4"><a href='article.php?Title=<?= $comment['Title'] ?>&&CIN=<?= $comment['CIN'] ?>&&Content=<?= $comment['Content'] ?>&&Delete=1'>❌</a></span>
                        </div>
                      <?php } ?>
                    </div>
                  </div>
                </div>
                <br>
              <?php } ?>
            </div>
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
  <div id="contact-me" class="icon-line-mail side-panel-trigger bg-color"></div>

  <!-- JavaScripts
	============================================= -->
  <script src="assets/js/jquery.js"></script>
  <script src="assets/js/plugins.min.js"></script>
  <script src="assets/https://maps.google.com/maps/api/js?key=YOUR-API-KEY"></script>
  <script>
    $(document).ready(function() {
      // to fade in on page load
      $("body").css("display", "none");
      $("body").fadeIn(800);
    });
  </script>

  <!-- Footer Scripts
	============================================= -->
  <script src="assets/js/functions.js"></script>
  <script>
    function editComment(Title,CIN,Content) {
      let newComment = prompt("Please enter your a new comment:", "");

      if (newComment) {
        let url = 'article.php?Title='+Title+'&&CIN='+CIN+'&&Content='+Content+'&&newComment='+newComment+'&&edit=1'        
        window.location.href= url;
      }
    }
  </script>
</body>

</html>