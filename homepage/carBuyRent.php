<?php

include "../core/Controller/CarC.php";
$CarC = new CarC();
$list = $CarC->listCars();
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />
	<!-- Favicon -->
	<link href="assets/demos/car/images/favicon.png" rel="icon">
	<!-- Stylesheets
	============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Mukta+Vaani:300,400,500,600,700|Open+Sans:300,400,600,700,800,900&display=swap" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="assets/css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="assets/style.css" type="text/css" />
	<link rel="stylesheet" href="assets/css/dark.css" type="text/css" />
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
	<title>Services - Car | CarHub</title>

	<style>
		@media (min-width: 992px) {

			#page-menu-wrap { background-color: var(--bs-light); }

			#page-menu .not-dark .page-menu-item:not(:last-child) { border-right: 1px solid #EEE }

			#page-menu .not-dark .page-menu-item > a {
				color: #333;
				font-weight: 500;
				text-shadow: none;
			}
		}
	</style>

</head>

<body class="stretched side-push-panel" data-loader-html="<div><img src='assets/demos/car/images/page-loader.gif' alt='Loader'></div>">

	<!-- Side Panel Overlay -->
	<div class="body-overlay"></div>

	<!-- Side Panel -->
	<div id="side-panel">

		<div id="side-panel-trigger-close" class="side-panel-trigger"><a href="#"><i class="icon-line-cross"></i></a></div>

		<div class="side-panel-wrap">

			<div class="widget clearfix">

				<a href="index.html"><img src="assets/demos/car/images/logo@2x.png" alt="CarHub Logo" height="50"></a>

				<p>It has always been, and will always be, about quality. We're passionate about ethically sourcing the finest coffee beans, roasting them with great care. We'd like to hear your message!</p>

				<div class="widget quick-contact-widget form-widget border-0 pt-0 clearfix">

					<h4>Quick Contact</h4>
					<div class="form-result"></div>
					<form id="quick-contact-form" name="quick-contact-form" action="assets/demos/car/include/form.php" method="post" class="quick-contact-form mb-0">
						<div class="form-process">
							<div class="css3-spinner">
								<div class="css3-spinner-scaler"></div>
							</div>
						</div>
						<input type="text" class="required sm-form-control input-block-level" id="quick-contact-form-name" name="quick-contact-form-name" value="" placeholder="Full Name" />
						<input type="text" class="required sm-form-control email input-block-level" id="quick-contact-form-email" name="quick-contact-form-email" value="" placeholder="Email Address" />
						<textarea class="required sm-form-control input-block-level short-textarea" id="quick-contact-form-message" name="quick-contact-form-message" rows="4" cols="30" placeholder="Message"></textarea>
						<input type="text" class="d-none" id="quick-contact-form-botcheck" name="quick-contact-form-botcheck" value="" />
						<input type="hidden" name="prefix" value="quick-contact-form-">
						<button type="submit" id="quick-contact-form-submit" name="quick-contact-form-submit" class="button button-small button-3d m-0" value="submit">Send Email</button>
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
					<a href="demo-car.html" class="standard-logo"><img src="assets/demos/car/images/logo.png"
							alt="CarHub Logo"></a>
					<a href="demo-car.html" class="retina-logo"><img src="assets/demos/car/images/logo@2x.png"
							alt="CarHub Logo"></a>
				</div><!-- #logo end -->

				<div id="primary-menu-trigger">
					<svg class="svg-trigger" viewBox="0 0 100 100">
						<path
							d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20">
						</path>
						<path d="m 30,50 h 40"></path>
						<path
							d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20">
						</path>
					</svg>
				</div>

				<!-- Primary Navigation
				============================================= -->
				<nav class="primary-menu with-arrows">
					<ul class="menu-container">
						<li class="menu-item current"><a class="menu-link" href="demo-car.html">
								<div>Home</div>
							</a></li>
						<!-- Mega Menu -->
						<li class="menu-item mega-menu"><a class="menu-link" href="demo-car-single.html">
								<div>Models</div>
							</a>
							<div class="mega-menu-content mega-menu-style-2">
								<div class="container">
									<div class="row">
										<ul class="sub-menu-container mega-menu-column col-12">
											<li class="menu-item">
												<div class="widget text-center">

													<h3 class="mb-0">Featured Models</h3>
													<a href="#"
														class="button button-small button-rounded button-border button-dark button-black font-primary"
														style="margin: 10px 0 40px">Show all Cars</a>

													<!-- Mega Menu Cars Carousel -->
													<div class="owl-carousel image-carousel carousel-widget"
														data-margin="20" data-nav="false" data-pagi="true"
														data-items-xs="1" data-items-sm="2" data-items-md="4"
														data-items-lg="6" data-items-xl="6">
														<div class="oc-item center"><a
																href="demo-car-single.html"><img
																	src="assets/demos/car/images/mega-menu/1.png"
																	alt="Car">BMW 1 Series ActiveE</a></div>
														<div class="oc-item center"><a
																href="demo-car-single.html"><img
																	src="assets/demos/car/images/mega-menu/4.png"
																	alt="Car">Mercedes-Benz S-Class</a></div>
														<div class="oc-item center"><a
																href="demo-car-single.html"><img
																	src="assets/demos/car/images/mega-menu/5.png"
																	alt="Car">Gran Turismo</a></div>
														<div class="oc-item center"><a
																href="demo-car-single.html"><img
																	src="assets/demos/car/images/mega-menu/6.png"
																	alt="Car">Mclaren 675LT SPIDER</a></div>
														<div class="oc-item center"><a
																href="demo-car-single.html"><img
																	src="assets/demos/car/images/mega-menu/7.png"
																	alt="Car">Honda City</a></div>
														<div class="oc-item center"><a
																href="demo-car-single.html"><img
																	src="assets/demos/car/images/mega-menu/8.png"
																	alt="Car">Toyota Qualis</a></div>
														<div class="oc-item center"><a
																href="demo-car-single.html"><img
																	src="assets/demos/car/images/mega-menu/9.png"
																	alt="Car">Honda WR-V</a></div>
														<div class="oc-item center"><a
																href="demo-car-single.html"><img
																	src="assets/demos/car/images/mega-menu/10.png"
																	alt="Car">Suzuki Breeza</a></div>
														<div class="oc-item center"><a
																href="demo-car-single.html"><img
																	src="assets/demos/car/images/mega-menu/2.png"
																	alt="Car">Chevrolet Spark</a></div>
														<div class="oc-item center"><a
																href="demo-car-single.html"><img
																	src="assets/demos/car/images/mega-menu/3.png"
																	alt="Car">Honda JaZZ</a></div>

													</div>
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</li>
						<li class="menu-item"><a class="menu-link" href="demo-car-listing.html">
								<div>Car Listing</div>
							</a></li>
						<li class="menu-item"><a class="menu-link" href="demo-car-dealers.html">
								<div>Dealers</div>
							</a></li>
						<li class="menu-item"><a class="menu-link" href="demo-car-accessories.php">
								<div>Services</div>
							</a></li>
						<li class="menu-item"><a class="menu-link" href="demo-car-interiors.html">
								<div>Interiors</div>
							</a></li>
						<li class="menu-item"><a class="menu-link" href="demo-car-faqs.php">
								<div>FAQs</div>
							</a></li>
						<li class="menu-item"><a class="menu-link" href="demo-car-blog.html">
								<div>Blog</div>
							</a></li>
						<li class="menu-item"><a class="menu-link" href="demo-car-contact.html">
								<div>Contacts</div>
							</a></li>
					</ul>
				</nav><!-- #primary-menu end -->

			</div>
		</div>
	</div>
	<div class="header-wrap-clone"></div>
</header><!-- #header end -->

<!-- Page Title
============================================= -->
<section id="page-title" class="page-title-parallax page-title-dark"
	style="background-image: url('assets/demos/car/images/hero-slider/4.jpg'); background-size: cover; padding: 120px 0;"
	data-bottom-top="background-position:0px 0px;" data-top-bottom="background-position:0px -300px;">

	<div class="container clearfix">
		<h1>Current Cars For Sale/Rent</h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">Home</a></li>
			<li class="breadcrumb-item"><a href="#">Cars</a></li>
			<li class="breadcrumb-item active" aria-current="page">Listing</li>
		</ol>
	</div>

</section><!-- #page-title end -->

<!-- Content
============================================= -->
<section id="content">
	<div class="content-wrap pt-0" style="overflow: visible;">
		

		<div class="section m-0 pt-0 bg-transparent">
			<div class="container">
				<br><br>
				<!-- Portfolio Items
				============================================= -->
				<div id="portfolio" class="portfolio row gutter-30 grid-container" data-layout="fitRows">

					<!-- Car 1 -->
					<?php foreach ($list as $car) { ?>
					<article class="portfolio-item col-12 col-sm-6 col-md-4 cf-sedan">
						<div class="grid-inner">
							<div class="portfolio-image">
								<a href="#">
									<img src="https://www.salonlfc.com/wp-content/uploads/2018/01/image-not-found-scaled.png" alt="Open Imagination">
									<?php if ($car["SaleorRent"] == 1) {
           echo '<div style="position:absolute;top:10px;right:1px;background:green;color: #FFF;padding: 8px 15px;">Sale</div>';
         } elseif ($car["SaleorRent"] == 0) {
           echo '<div style="position:absolute;top:10px;right:1px;background:orange;color: #FFF;padding: 8px 15px;">Rent</div>';
         } else {
           echo '<div style="position:absolute;top:10px;right:1px;background:red;color: #FFF;padding: 8px 15px;">Not Available</div>';
         } ?>
									<div class="filter-p-pricing">
										<span class="p-price fw-bold ls1"><?= $car["ModelID"] ?></span>
										<span class="p-price-msrp">MSRP : <strong><?= $car["Price"] ?>
												DT</strong></span>
									</div>
								</a>
							</div>
							<div class="portfolio-desc">
								<h3><a href="#"><?= $car["ModelName"] ?></a></h3>

							</div>
							<div class="row g-0 car-p-features font-primary clearfix">
								<div class="col-lg-4 col-6 p-0"><i
										class="icon-car-meter"></i><span><?= $car["opt1"] ?> </span></div>
								<div class="col-lg-4 col-6 p-0"><i
										class="icon-car-door"></i><span><?= $car["CarPlate"] ?> </span></div>
								<div class="col-lg-4 col-6 p-0"><i
										class="icon-car-fuel2"></i><span><?= $car["opt2"] ?> </span></div>
								<div class="col-lg-4 col-6 p-0"><i class="icon-car-signal"></i><span>
										<?= $car["opt3"] ?></span></div>
								<div class="col-lg-4 col-6 p-0"><i
										class="icon-car-wheel"></i><span><?= $car["opt4"] ?></span></div>
								<div class="col-lg-4 col-6 p-0"><i class="icon-car-care"></i><span>
										<?= $car["Address"] ?></span></div>
							</div>
						</div>
					</article>
					<?php } ?>


				</div>
			</div>
		</div>

	</div>
</section><!-- #content end -->

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

</div><!-- #wrapper end -->

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

	<!-- Footer Scripts
	============================================= -->
	<script src="assets/js/functions.js"></script>
	<script>
		$(document).ready(function(){
    // to fade in on page load
    $("body").css("display", "none");
    $("body").fadeIn(800); 
    });
	</script>

</body>
</html>