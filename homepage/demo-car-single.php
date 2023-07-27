<?php
include '../core/Controller/ModelC.php';
include '../core/Controller/CarC.php';
include_once "../core/Controller/token.php";
include_once "../core/Controller/customerC.php";
$token = new token();
session_start();
$isLoggedIn = $token->is_user_logged_in();
$ModelC = new ModelC();
$list = $ModelC->listModels();
$CarC = new CarC();
$list2 = $CarC->listCars();

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

		/*--------------------
		paginations
		---------------------*/
		.dark .swiper-pagination span:nth-child(1):hover,
		.dark .swiper-pagination span:nth-child(1) { background-color: #7F858D }
		.dark .swiper-pagination span:nth-child(2):hover,
		.dark .swiper-pagination span:nth-child(2) { background-color: #CB394E }
		.dark .swiper-pagination span:nth-child(3):hover,
		.dark .swiper-pagination span:nth-child(3) { background-color: #75787B }
		.dark .swiper-pagination span:nth-child(4):hover,
		.dark .swiper-pagination span:nth-child(4) { background-color: #9C780E }


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
			opacity: .7;
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
                  <li class="menu-item mega-menu current">
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

		<!-- Slider
		============================================= -->
        <?php
                    foreach ($list as $model) {
          ?>
		<section id="slider" class="slider-element dark swiper_wrapper" data-effect="fade" data-loop="true" data-dots="true" data-speed="1000" data-autoplay="4500" style="min-height: 650px;">

			<div class="slider-text mb-5 clearfix">
				<h2 class="font-primary"><?= $model['Manufacturer']; ?></h2>
				<p class="font-primary">Color Varients</p>
				<a href="https://www.youtube.com/watch?v=RKD2fNVP7kw" class="play-icon shadow" data-lightbox="iframe"><i class="icon-googleplay"></i></a>
			</div>

			<div class="swiper-container swiper-parent">
				<div class="swiper-wrapper">
					<div class="swiper-slide">
						<div class="swiper-slide-bg" style="background: linear-gradient(15deg, #C8CED6 50%, #7F858D 50%);"></div>
						<div class="slider-caption slider-caption-center topmargin-lg">
							<img src="assets/demos/car/images/single/1.png">
						</div>
					</div>
					<div class="swiper-slide">
						<div class="swiper-slide-bg" style="background: linear-gradient(15deg, #920F23 50%, #CB394E 50%);"></div>
						<div class="slider-caption slider-caption-center topmargin-lg">
							<img src="assets/demos/car/images/single/2.png">
						</div>
					</div>
					<div class="swiper-slide">
						<div class="swiper-slide-bg" style="background: linear-gradient(15deg, #D4D8DD 50%, #75787B 50%);"></div>
						<div class="slider-caption slider-caption-center topmargin-lg">
							<img src="assets/demos/car/images/single/3.png">
						</div>
					</div>
					<div class="swiper-slide">
						<div class="swiper-slide-bg" style="background: linear-gradient(15deg, #C99F25 50%, #9C780E 50%);"></div>
						<div class="slider-caption slider-caption-center topmargin-lg">
							<img src="assets/demos/car/images/single/4.png">
						</div>
					</div>
				</div>
				<div class="swiper-pagination"></div>
			</div>

		</section><!-- #Slider End -->

		<!-- Page Sub Menu
		============================================= -->
       
		<div id="page-menu">
			<div id="page-menu-wrap">
				<div class="container">
					<div class="page-menu-row">

						<div class="page-menu-title"><span><?= $model['Manufacturer']; ?></span> Models</div>

						<nav class="page-menu-nav one-page-menu">
							<ul class="page-menu-container">
								<li class="page-menu-item"><a href="#" data-href="#section-features"><div>Features</div></a></li>
								<li class="page-menu-item"><a href="#" data-href="#section-spec"><div>Technical Specs</div></a></li>
								<li class="page-menu-item"><a href="#" data-href="#section-price"><div>Price</div></a></li>
								<li class="page-menu-item"><a href="#" data-href="#section-gallery"><div>Gallery</div></a></li>
								<li class="page-menu-item"><a href="#" data-href="#section-brochures"><div>Brochures</div></a></li>
								<li class="page-menu-item"><a href="#" data-href="#section-store"><div>Find a Centre</div></a></li>
							</ul>
						</nav>

						<div id="page-menu-trigger"><i class="icon-reorder"></i></div>

					</div>
				</div>
			</div>
		</div><!-- #page-menu end -->

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
							<h3 class="mb-3">Overview</h3>
								<p><span><?= $model['Overview']; ?></span></p>
								<div class="row clearfix">
									<div class="col-md-6">
										<ul class="iconlist">
											<li><i class="icon-car-paint"></i><span class="ms-2">Different Color Varients</span></li>
											<li class="mt-2"><i class="icon-car-stearing"></i><span class="ms-2">Powerful Stearings</span></li>
											<li class="mt-2"><i class="icon-car-fuel"></i><span class="ms-2">Goof Fuel Efficiency</span></li>
											<li class="mt-2"><i class="icon-car-signal"></i><span class="ms-2">Automatic / Manual</span></li>
										</ul>
									</div>
									<div class="col-md-6">
										<ul class="iconlist">
											<li><i class="icon-car-meter"></i><span class="ms-2">Modern Dashboard</span></li>
											<li class="mt-2"><i class="icon-car-wheel"></i><span class="ms-2">Beautiful Alloy-wheels</span></li>
											<li class="mt-2"><i class="icon-car-signal"></i><span class="ms-2">Automatic / Manual</span></li>
											<li class="mt-2"><i class="icon-car-alert"></i><span class="ms-2">App Technology</span></li>
										</ul>
									</div>
								</div>
							</div>

							<!-- Page Section - spec
							============================================= -->
                            
							<div id="section-spec" class="page-section mt-5">
								<h3 class="mb-3">Technical Specs</h3>
								<p><span><?= $model['TechSpecs']; ?></span></p>
								<div class="row">
									<div class="col-lg-6 mt-3">
										<table class="table">
											<thead>
												<tr>
													<th scope="col" class="color">Engine</th>
													<th scope="col"></th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td scope="row" class="text-black-50">Engine layout:</td>
													<td class="text-end fw-semibold"><span><?= $model['EngineLayout']; ?></span></td>
												</tr>
												<tr>
													<td scope="row" class="text-black-50">Number of cylinders:</td>
													<td class="text-end fw-semibold"><span><?= $model['NumberOfCyl']; ?></span></td>
												</tr>
												<tr>
													<td scope="row" class="text-black-50">Displacement:</td>
													<td class="text-end fw-semibold"><span><?= $model['Displacement']; ?></span> cm³</td>
												</tr>
												<tr>
													<td scope="row" class="text-black-50">Power (kW):</td>
													<td class="text-end fw-semibold"><span><?= $model['kW']; ?></span> kW</td>
												</tr>
												<tr>
													<td scope="row" class="text-black-50">Power (hp):</td>
													<td class="text-end fw-semibold"><span><?= $model['HP']; ?></span> PS</td>
												</tr>
											 </tbody>
										</table>
									</div>
									<div class="col-lg-6 mt-3">
										<table class="table">
											<thead>
												<tr>
													<th scope="col" class="color">Fuel</th>
													<th scope="col"></th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td scope="row" class="text-black-50">Fuel consumption* urban:</td>
													<td class="text-end fw-semibold"><span><?= $model['FuelConsumptUrb']; ?></span> l/100 km</td>
												</tr>
												<tr>
													<td scope="row" class="text-black-50">Fuel consumption* non-urban:</td>
													<td class="text-end fw-semibold"><span><?= $model['FuelConsumptNonUrb']; ?></span> l/100 km</td>
												</tr>
												<tr>
													<td scope="row" class="text-black-50">Fuel consumption* combined:</td>
													<td class="text-end fw-semibold"><span><?= $model['FuelConsumptComb']; ?></span> l/100 km</td>
												</tr>
												<tr>
													<td scope="row" class="text-black-50">CO2 emissions* combined:</td>
													<td class="text-end fw-semibold"><span><?= $model['CO2Emissions']; ?></span> g/km</td>
												</tr>
											 </tbody>
										</table>
									</div>
									<div class="col-lg-6 mt-4">
										<table class="table">
											<thead>
												<tr>
													<th scope="col" class="color">Body</th>
													<th scope="col"></th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td scope="row" class="text-black-50">Length:</td>
													<td class="text-end fw-semibold"><span><?= $model['BodyLength']; ?></span> mm</td>
												</tr>
												<tr>
													<td scope="row" class="text-black-50">Width:</td>
													<td class="text-end fw-semibold"><span><?= $model['BodyWidth']; ?></span> mm</td>
												</tr>
												<tr>
													<td scope="row" class="text-black-50">Height:</td>
													<td class="text-end fw-semibold"><span><?= $model['BodyHeight']; ?></span> mm</td>
												</tr>
												<tr>
													<td scope="row" class="text-black-50">Wheelbase:</td>
													<td class="text-end fw-semibold"><span><?= $model['Flex5Gear']; ?></span> cW</td>
												</tr>
												<tr>
													<td scope="row" class="text-black-50">Drag coefficient (Cd):</td>
													<td class="text-end fw-semibold"><span><?= $model['DragCoefficientCd']; ?></span> mm</td>
												</tr>
												<tr>
													<td scope="row" class="text-black-50">Unladen weight (DIN):</td>
													<td class="text-end fw-semibold"><span><?= $model['UnladenWeightDin']; ?></span> kg</td>
												</tr>
												<tr>
													<td scope="row" class="text-black-50">Unladen weight (EU):</td>
													<td class="text-end fw-semibold"><span><?= $model['UnladenWeightEU']; ?></span> kg</td>
												</tr>
											 </tbody>
										</table>
									</div>
									<div class="col-lg-6 mt-4">
										<table class="table">
											<thead>
												<tr>
													<th scope="col" class="color">Performance</th>
													<th scope="col"></th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td scope="row" class="text-black-50">Top speed:</td>
													<td class="text-end fw-semibold"><span><?= $model['MaxSpeed']; ?></span> mm</td>
												</tr>
												<tr>
													<td scope="row" class="text-black-50">Acceleration:</td>
													<td class="text-end fw-semibold"><span><?= $model['Acceleration']; ?></span> mm</td>
												</tr>
												<tr>
													<td scope="row" class="text-black-50">In-gear acceleration:</td>
													<td class="text-end fw-semibold"><span><?= $model['InGearAccel']; ?></span> mm</td>
												</tr>
												<tr>
													<td scope="row" class="text-black-50">Flexibility/5th Gear:</td>
													<td class="text-end fw-semibold"><span><?= $model['Flex5Gear']; ?></span> cW</td>
												</tr>
											 </tbody>
										</table>
										<a href="#" class="button button-rounded button-dark m-0 float-end nott">View all Specs <i class="icon-line-arrow-right"></i></a>
									</div>
								</div>
							</div>

							<!-- Page Section - price list
							============================================= -->
                            
							
						<div id="section-price" class="page-section mt-5">
								<h3 class="mb-3">Price Lists</h3>
								<table class="table table-striped">
									<thead>
										<tr>
											<th scope="col">Models</th>
											<th scope="col">Car Plate</th>
											<th scope="col">Price</th>
										</tr>
									</thead>
									<tbody>
									<?php
                            foreach ($list2 as $car) {
                            ?>
									
										<tr>
											<td><a href="#"><span><?= $model['Manufacturer']; ?></span> , <span><?= $car['ModelName']; ?></span></a><br><small><span><?= $car['opt1']; ?></span>,<span><?= $car['opt2']; ?></span>,<span><?= $car['opt3']; ?></span>,<span><?= $car['opt4']; ?></span></small></td>
											<td style="vertical-align: middle"><span><?= $car['CarPlate']; ?></span></td>
											<td style="vertical-align: middle" class="fw-semibold">  <span><?= $car['Price']; ?> TND</span></td>
										</tr>
									 
									 <?php
        }
        ?>
		</tbody>
								</table>
							</div> 
							

                            
							<!-- Page Section - gallery
							============================================= -->
							 <div id="section-gallery" class="page-section my-5">
								<h3 class="mb-3">Gallery</h3>
								<div class="fslider flex-thumb-grid grid-6" data-animation="fade" data-speed="900" data-pagi="false" data-thumbs="true">
									<div class="flexslider">
										<div class="slider-wrap">
											<div class="slide" data-thumb="assets/demos/car/images/single/911cars/thumbs/1.jpg">
												<img src="assets/demos/car/images/single/911cars/1.jpg" alt="Image">
												<div class="bg-overlay">
													<div class="bg-overlay-content justify-content-start align-items-end">
														<div class="h4 fw-light bg-light text-dark px-3 py-2">HighWay View</div>
													</div>
												</div>
											</div>
											<div class="slide" data-thumb="assets/demos/car/images/single/911cars/thumbs/2.jpg">
												<img src="assets/demos/car/images/single/911cars/2.jpg" alt="Image">
												<div class="bg-overlay">
													<div class="bg-overlay-content justify-content-start align-items-end">
														<div class="h4 fw-light bg-light text-dark px-3 py-2">Premium Dashboard</div>
													</div>
												</div>
											</div>
											<div class="slide" data-thumb="assets/demos/car/images/single/911cars/thumbs/3.jpg">
												<img src="assets/demos/car/images/single/911cars/3.jpg" alt="Image">
												<div class="bg-overlay">
													<div class="bg-overlay-content justify-content-start align-items-end">
														<div class="h4 fw-light bg-light text-dark px-3 py-2">Beautiful Backlight</div>
													</div>
												</div>
											</div>
											<div class="slide" data-thumb="assets/demos/car/images/single/911cars/thumbs/4.jpg">
												<img src="assets/demos/car/images/single/911cars/4.jpg" alt="Image">
												<div class="bg-overlay">
													<div class="bg-overlay-content justify-content-start align-items-end">
														<div class="h4 fw-light bg-light text-dark px-3 py-2">Front View</div>
													</div>
												</div>
											</div>
											<div class="slide" data-thumb="assets/demos/car/images/single/911cars/thumbs/5.jpg">
												<img src="assets/demos/car/images/single/911cars/5.jpg" alt="Image">
												<div class="bg-overlay">
													<div class="bg-overlay-content justify-content-start align-items-end">
														<div class="h4 fw-light bg-light text-dark px-3 py-2">White Exterior</div>
													</div>
												</div>
											</div>
											<div class="slide" data-thumb="assets/demos/car/images/single/911cars/thumbs/6.jpg">
												<img src="assets/demos/car/images/single/911cars/6.jpg" alt="Image">
												<div class="bg-overlay">
													<div class="bg-overlay-content justify-content-start align-items-end">
														<div class="h4 fw-light bg-light text-dark px-3 py-2">Extended Music Systems</div>
													</div>
												</div>
											</div>
											<div class="slide" data-thumb="assets/demos/car/images/single/911cars/thumbs/7.jpg">
												<img src="assets/demos/car/images/single/911cars/7.jpg" alt="Image">
												<div class="bg-overlay">
													<div class="bg-overlay-content justify-content-start align-items-end">
														<div class="h4 fw-light bg-light text-dark px-3 py-2">Digital Speed Meters</div>
													</div>
												</div>
											</div>
											<div class="slide" data-thumb="assets/demos/car/images/single/911cars/thumbs/8.jpg">
												<img src="assets/demos/car/images/single/911cars/8.jpg" alt="Image">
												<div class="bg-overlay">
													<div class="bg-overlay-content justify-content-start align-items-end">
														<div class="h4 fw-light bg-light text-dark px-3 py-2">Comfortable Air Condition</div>
													</div>
												</div>
											</div>
											<div class="slide" data-thumb="assets/demos/car/images/single/911cars/thumbs/9.jpg">
												<img src="assets/demos/car/images/single/911cars/9.jpg" alt="Image">
												<div class="bg-overlay">
													<div class="bg-overlay-content justify-content-start align-items-end">
														<div class="h4 fw-light bg-light text-dark px-3 py-2">Premium Backside</div>
													</div>
												</div>
											</div>
											<div class="slide" data-thumb="assets/demos/car/images/single/911cars/thumbs/10.jpg">
												<img src="assets/demos/car/images/single/911cars/10.jpg" alt="Image">
												<div class="bg-overlay">
													<div class="bg-overlay-content justify-content-start align-items-end">
														<div class="h4 fw-light bg-light text-dark px-3 py-2">Baggage Space</div>
													</div>
												</div>
											</div>
											<div class="slide" data-thumb="assets/demos/car/images/single/911cars/thumbs/11.jpg">
												<img src="assets/demos/car/images/single/911cars/11.jpg" alt="Image">
												<div class="bg-overlay">
													<div class="bg-overlay-content justify-content-start align-items-end">
														<div class="h4 fw-light bg-light text-dark px-3 py-2">Red Wine GTS</div>
													</div>
												</div>
											</div>
											<div class="slide" data-thumb="assets/demos/car/images/single/911cars/thumbs/12.jpg">
												<img src="assets/demos/car/images/single/911cars/12.jpg" alt="Image">
												<div class="bg-overlay">
													<div class="bg-overlay-content justify-content-start align-items-end">
														<div class="h4 fw-light bg-light text-dark px-3 py-2">Premium Leather Interior</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div> 

						<!-- Sidebar -->
						<div class="col-md-4">
							<div class="mb-4">
								<h2 class="mb-0 h1 fw-semibold ls0"><span><?= $model['HP']; ?></span>/<span><?= $model['kW']; ?></span></h2>
								<small>Power (hp)/Power (kW)</small>
							</div>
							<div class="line line-sm my-3"></div>
							<div>
								<h2 class="mb-0 fw-semibold h2 ls0"><span><?= $model['Acceleration']; ?></span> s</h2>
								<small>Acceleration from 0 - 100 km/h</small>
							</div>
							<div class="card bg-color mt-5 shadow-sm dark">
								<div class="card-body">
									<h3 class="card-title">Fuel Efficiency Rating / KMPH</h3>
									<p></p>
									<div class="card-text d-flex justify-content-between align-items-center">
										<div>
											<h4 class="mb-0">In City</h4>
											<h4 class="mb-0 ls1 h1 fw-bold"><span><?= $model['FuelConsumptUrb']; ?></span></h4>
										</div>
										<div>
											<div class="fw-bold h1"><i class="icon-car-pump"></i></div>
										</div>
										<div>
											<h4 class="mb-0">Highway</h4>
											<h4 class="mb-0 ls1 h1 fw-bold"><span><?= $model['FuelConsumptNonUrb']; ?></span></h4>
										</div>
									</div>
								</div>
							</div>

							<img class="mt-5" src="assets/demos/car/images/single/features.jpg" alt="Image">
							<div class="card mt-5 shadow-sm">
								<div class="card-body">
									<h3 class="card-title">Get to know On-Road-Price in your City.</h3>
									<p></p>
									<a href="#" class="button button-rounded m-0 button-large w-100 side-panel-trigger center nott">On Road Price</a>
								</div>
							</div>
							<div class="mt-4">
								<h3 class="mb-3">Videos</h3>
								<iframe width="560" height="315" src="https://www.youtube.com/embed/lTbGdV3NlNk" allow="autoplay; encrypted-media" allowfullscreen></iframe>
								<div class="line line-sm"></div>
								<iframe width="560" height="315" src="https://www.youtube.com/embed/-hTLk1rU_ZI" allow="autoplay; encrypted-media" allowfullscreen></iframe>
							</div>

						</div>
					</div>
                    
                    <?php
        }
        ?>

					<!-- Page Section - brochuresent
					============================================= -->
					<div id="section-brochures" class="page-section clearix mb-5">

						<div class="row">
							<div class="col-md-4 mt-5">
								<i class="i-plain icon-line2-cloud-download inline-block mb-4" style="font-size: 42px"></i>
								<div class="heading-block border-0 mb-2">
									<h4>Volkswagen - Catalogue</h4>
									<small class="subtitle text-muted">(PDF 11.7 KB)</small>
								</div>
								<p>Volkswagen-Modelle</p>
								<a href="#" class="button button-rounded m-0">Download</a>
							</div>
							<div class="col-md-4 mt-5">
								<i class="i-plain icon-file3 inline-block mb-4" style="font-size: 42px"></i>
								<div class="heading-block border-0 mb-2">
									<h4>Via Bluetooth® - The new PCM</h4>
									<small class="subtitle text-muted">(PDF 204.92 KB)</small>
								</div>
								<p>Dynamic, comfortable and efficient – the new Volkswagen models, press release, 01/09/2021, VW AG.</p>
								<a href="#" class="button button-rounded m-0">Download</a>
							</div>
							<div class="col-md-4 mt-5">
								<i class="i-plain icon-file-alt inline-block mb-4" style="font-size: 42px"></i>
								<div class="heading-block border-0 mb-2">
									<h4>Media Package</h4>
									<small class="subtitle text-muted">(PDF 24.88 MB)</small>
								</div>
								<p>Synergistically reinvent progressive users vis-a-vis plug-and-play core competencies.</p>
								<a href="#" class="button button-rounded m-0">Download</a>
							</div>
						</div>

					</div>

					<!-- Page Section - store
					============================================= -->
					<div id="section-store" class="page-section mt-3">
						<h3 class="mb-3">Find a Volkswagen Centre</h3>
						<!-- Google Map
						============================================= -->
						<div class="gmap vh-50 mb-5" data-latitude="41.8333925" data-longitude="-88.0121473" data-zoom="4" data-scrollwheel="false" data-markers='[{address: "San Francisco, USA",html: "<div><h4 style=\"margin-bottom: 8px;\">Volkswagen Centre</h4> <address> <strong>Headquarters:</strong><br> 795 Folsom Ave, Suite 600<br> San Francisco, CA 94107<br> </address> <abbr><strong>Phone:</strong></abbr> (1) 8547 632521<br> <abbr><strong>Fax:</strong></abbr> (1) 11 4752 1433<br> <abbr><strong>Email:</strong></abbr> info@CarHub.com </div>",icon: {image: "assets/images/icons/map-icon-red.png",iconsize: [32, 39],iconanchor: [13,39]}},{address: "New York, USA",html: "<div><h4 style=\"margin-bottom: 8px;\">Volkswagen Centre</h4> <address> <strong>Headquarters:</strong><br> 795 Folsom Ave, Suite 600<br> New York, USA 94107<br> </address> <abbr><strong>Phone:</strong></abbr> (1) 8547 632521<br> <abbr><strong>Fax:</strong></abbr> (1) 11 4752 1433<br> <abbr><strong>Email:</strong></abbr> info@CarHub.com </div>",icon: {image: "assets/images/icons/map-icon-red.png",iconsize: [32, 39],iconanchor: [13,39]}},{address: "Washington, USA",html: "<div><h4 style=\"margin-bottom: 8px;\">Volkswagen Centre</h4> <address> <strong>Headquarters:</strong><br> 795 Folsom Ave, Suite 600<br> Washington, USA 94107<br> </address> <abbr><strong>Phone:</strong></abbr> (1) 8547 632521<br> <abbr><strong>Fax:</strong></abbr> (1) 11 4752 1433<br> <abbr><strong>Email:</strong></abbr> info@CarHub.com </div>",icon: {image: "assets/images/icons/map-icon-red.png",iconsize: [32, 39],iconanchor: [13,39]}},{address: "Chicago, USA",html: "<div><h4 style=\"margin-bottom: 8px;\">Volkswagen Centre</h4> <address> <strong>Headquarters:</strong><br> 795 Folsom Ave, Suite 600<br> Chicago, USA 94107<br> </address> <abbr><strong>Phone:</strong></abbr> (1) 8547 632521<br> <abbr><strong>Fax:</strong></abbr> (1) 11 4752 1433<br> <abbr><strong>Email:</strong></abbr> info@CarHub.com </div>",icon: {image: "assets/images/icons/map-icon-red.png",iconsize: [32, 39],iconanchor: [13,39]}}]'></div>

						<div class="row">
							<div class="col-md-4">
								<address>
									<strong>Cars Dawydiak:</strong><br>
									1540 Pine St, San Francisco<br>
									San Francisco, CA 94109<br>
								</address>
								<abbr title="Phone Number"><strong>Phone:</strong></abbr> (1) 8547 632521<br>
								<abbr title="Fax"><strong>Fax:</strong></abbr> (1) 11 4752 1433<br>
								<abbr title="Email Address"><strong>Email:</strong></abbr> info@CarHub.com
							</div>
							<div class="col-md-4">
								<address>
									<strong>Volkswagen of Larchmont</strong><br>
									2500 Boston Post Rd<br>
									Larchmont, NY 10538, USA<br>
								</address>
								<abbr title="Phone Number"><strong>Phone:</strong></abbr> (123) 456-7890
								<abbr title="Fax"><strong>Fax:</strong></abbr> (1) 11 4752 1433<br>
								<abbr title="Email Address"><strong>Email:</strong></abbr> noreply@CarHub.com
							</div>

							<div class="col-md-4">
								<address>
									<strong>Volkswagen Loeber Motors</strong><br>
									7101 North Lincoln Avenue<br>
									Lincolnwood, IL 60712<br>
								</address>
								<abbr title="Phone Number"><strong>Phone:</strong></abbr> (123) 456-7890
								<abbr title="Fax"><strong>Fax:</strong></abbr> (1) 11 4752 1433<br>
								<abbr title="Email Address"><strong>Email:</strong></abbr> noreply@CarHub.com
							</div>
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
	<script src="assets/https://maps.google.com/maps/api/js?key=YOUR-API-KEY"></script>
	<script>
		$(document).ready(function(){
    // to fade in on page load
    $("body").css("display", "none");
    $("body").fadeIn(800); 
    });
	</script>

	<!-- Footer Scripts
	============================================= -->
	<script src="assets/js/functions.js"></script>

</body>
</html>