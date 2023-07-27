<?php
include_once "../core/Controller/token.php";
include_once "../core/Controller/customerC.php";
$token = new token();
session_start();
if ($token->is_user_logged_in()) {
  $customerC = new customerC();
  if ($customerC->ExistsAsCustomer($_SESSION["user_id"])) {
    header("Location: http://localhost/project2223_2a15-ninjahub/customerArea");
  } else {
    header("Location: http://localhost/project2223_2a15-ninjahub/adminArea");
  }
}
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="SemiColonWeb" />

    <!-- Stylesheets
	============================================= -->
    <link href="../homepage/assets/demos/car/images/favicon.png" rel="icon">
    <link
        href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Poppins:300,400,500,600,700|PT+Serif:400,400i&display=swap"
        rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../homepage/assets/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="../homepage/assets/style.css" type="text/css" />
    <link rel="stylesheet" href="../homepage/assets/css/dark.css" type="text/css" />
    <link rel="stylesheet" href="../homepage/assets/css/font-icons.css" type="text/css" />
    <link rel="stylesheet" href="../homepage/assets/css/animate.css" type="text/css" />
    <link rel="stylesheet" href="../homepage/assets/css/magnific-popup.css" type="text/css" />

    <link rel="stylesheet" href="../homepage/assets/css/custom.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Document Title
	============================================= -->
    <title>Login | Canvas</title>

</head>

<body class="stretched">

    <!-- Document Wrapper
	============================================= -->
    <div id="wrapper" class="clearfix">

        <!-- Page Title
		============================================= -->
        <section id="page-title">

            <div class="container clearfix">
                <h1>My Account</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="http://localhost/project2223_2a15-ninjahub/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Login</li>
                </ol>
            </div>

        </section><!-- #page-title end -->

        <!-- Content
		============================================= -->
        <section id="content">
            <div class="content-wrap">
                <div class="container clearfix">

                    <div class="row">

                        <div class="col-md-4">

                            <div class="well well-lg mb-0">
                                <form id="login-form" name="login-form" class="row"
                                    action="../core/View/submitLogin.php" method="post">

                                    <div class="col-12">
                                        <h3>Login to your Account</h3>
                                    </div>

                                    <div class="col-12 form-group">
                                        <label for="login-form-email">Email:</label>
                                        <input type="text" id="login-form-email" name="login-form-email" required
                                            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" value=""
                                            class="form-control" />
                                    </div>

                                    <div class="col-12 form-group">
                                        <label for="login-form-password">Password:</label>
                                        <input type="password" id="login-form-password" name="login-form-password"
                                            value="" class="form-control" />
                                    </div>

                                    <div class="col-12 form-group">
                                        <button class="btn btn-secondary m-0" id="login-form-submit"
                                            name="login-form-submit" value="login">Login</button>
                                        <a href="forgotpassword" class="float-end">Forgot Password?</a>
                                    </div>

                                </form>
                            </div>

                        </div>

                        <div class="col-md-8">


                            <h3>Don't have an Account? Register Now.</h3>

                            <p>Creating an account will allow you to access to many of our services and even create
                                services, such as selling your own car! This process takes atmost 3 minutes.</p>
                            <script>
                            function checkPW() {
                                if (grecaptcha.getResponse().length == 0){
                                    document.getElementById('g-recaptcha-error').innerHTML = '<span style="color:red;">This field is required.</span>';
                                    return false;
                                }
                                else
                                    document.getElementById('g-recaptcha-error').innerHTML = '<span style="color:red;"></span>';
                                if (document.getElementById('register-form-password').value == document.getElementById(
                                        'register-form-repassword').value){
                                            document.getElementById("register-form-repassword").setCustomValidity(
                                        "");
                                    return true;
                                }
                                else {
                                    document.getElementById("register-form-repassword").setCustomValidity(
                                        "Please re-enter the correct password!");
                                    return false;
                                }
                            }
                            function checkPWONTYP() {
                                if (document.getElementById('register-form-password').value == document.getElementById(
                                        'register-form-repassword').value){
                                            document.getElementById("register-form-repassword").setCustomValidity(
                                        "");
                                }
                                else {
                                    document.getElementById("register-form-repassword").setCustomValidity(
                                        "Please re-enter the correct password!");
                                }
                            }
                            </script>
                            <form id="register-form" name="register-form" class="row"
                                action="../core/View/submitRegister.php" method="post" onsubmit="return checkPW();">

                                <div class="col-6 form-group">
                                    <label for="register-form-name">Full Name:</label>
                                    <input type="text" id="register-form-name" name="register-form-name" value=""
                                        class="form-control" required pattern="[a-zA-Z0-9\s]+" maxlength="50"
                                        minlength="4"/>
                                </div>

                                <div class="col-6 form-group">
                                    <label for="register-form-email">Email Address:</label>
                                    <input type="text" id="register-form-email" name="register-form-email" value=""
                                        class="form-control" required
                                        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" />
                                </div>

                                <div class="w-100"></div>

                                <div class="col-6 form-group">
                                    <label for="register-form-CIN">Choose a CIN:</label>
                                    <input type="text" id="register-form-CIN" name="register-form-CIN" value=""
                                        class="form-control" required maxlength="8" pattern="[0-9]+" />
                                </div>

                                <div class="col-6 form-group">
                                    <label for="register-form-address">Choose an Address:</label>
                                    <input type="text" id="register-form-address" name="register-form-address" value=""
                                        class="form-control" required maxlength="50" minlength="4" />
                                </div>

                                <div class="col-6 form-group">
                                    <label for="register-form-phone">Phone:</label>
                                    <input type="text" id="register-form-phone" name="register-form-phone" value=""
                                        class="form-control" required maxlength="8" pattern="[0-9]+" />
                                </div>

                                <div class="w-100"></div>

                                <div class="col-6 form-group">
                                    <label for="register-form-password">Choose Password:</label>
                                    <input type="password" id="register-form-password" name="register-form-password"
                                        value="" class="form-control" require
                                        pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,12}$" />
                                </div>

                                <div class="col-6 form-group">
                                    <label for="register-form-repassword">Re-enter Password:</label>
                                    <input onchange="checkPWONTYP();" type="password" id="register-form-repassword" name="register-form-repassword"
                                        value="" class="form-control" required maxlength="50" minlength="4" />
                                </div>

                                <div class="w-100"></div>
                                <div class="g-recaptcha" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"></div>
                                <div id="g-recaptcha-error"></div>
                                <br>

                                <div class="col-12 form-group">
                                    <button class="btn btn-dark m-0" id="register-form-submit"
                                        name="register-form-submit" value="register">Register Now</button>
                                </div>

                            </form>

                        </div>

                    </div>

                </div>
            </div>
        </section><!-- #content end -->

        <!-- Footer
		============================================= -->
        <footer id="footer" class="dark">
            <div class="container">

                <!-- Footer Widgets
				============================================= -->
                <div class="footer-widgets-wrap">

                    <div class="row col-mb-50">
                        <div class="col-lg-8">

                            <div class="row col-mb-50">
                                <div class="col-md-4">

                                    <div class="widget clearfix">

                                        <img src="../homepage/assets/demos/car/images/logo.png" width="300" height="75"
                                            alt="Image" class="footer-logo">

                                        <p>We believe in <strong>Simple</strong>, <strong>Creative</strong> &amp;
                                            <strong>Flexible</strong> Design Standards.</p>

                                        <div
                                            style="background: url('images/world-map.png') no-repeat center center; background-size: 100%;">
                                            <address>
                                                <strong>Headquarters:</strong><br>
                                                ESPRIT Bloc H<br>
                                                Tunis, Ariana<br>
                                            </address>
                                            <abbr title="Phone Number"><strong>Phone:</strong></abbr>+216 52920276<br>
                                            <abbr title="Email Address"><strong>Email:</strong></abbr>
                                            malekamir56@gmail.com
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

        </footer><!-- #footer end -->

    </div><!-- #wrapper end -->

    <!-- Go To Top
	============================================= -->
    <div id="gotoTop" class="icon-angle-up"></div>

    <!-- JavaScripts
	============================================= -->
    <script src="../homepage/assets/js/jquery.js"></script>
    <script src="../homepage/assets/js/plugins.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
    $(document).ready(function() {
        // to fade in on page load
        $("body").css("display", "none");
        $("body").fadeIn(800);
    });
    </script>

    <!-- Footer Scripts
	============================================= -->
    <script src="../homepage/assets/js/functions.js"></script>

</body>

</html>