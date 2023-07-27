<!DOCTYPE html>
<?php
switch (true) {
    case in_array($_GET['unsuccess'], range(1,6)):
        echo "<meta http-equiv='refresh' content='3;url=http://localhost/project2223_2a15-ninjahub/customerArea' />";
    break;
    case in_array($_GET['unsuccess'], range(6,6)):
        echo "<meta http-equiv='refresh' content='3;url=http://localhost/project2223_2a15-ninjahub/adminArea' />";
    break;
    case in_array($_GET['unsuccess'], range(7,8)):
      echo "<meta http-equiv='refresh' content='3;url=http://localhost/project2223_2a15-ninjahub/customerArea' />";
  break;
}
?>

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>Thank you!</title>
    <style>


*{
    padding:0;
    margin:0;
}

body {
	height:100vh;display:flex;justify-content:center;align-items:center;background-color:#eee
}

.checkmark {
	width: 56px;height: 56px;border-radius: 50%;display: block;stroke-width: 2;stroke: #fff;stroke-miterlimit: 10;margin: 10% auto;box-shadow: inset 0px 0px 0px #7ac142;animation: fill .4s ease-in-out .4s forwards, scale .3s ease-in-out .9s both}

.checkmark_circle {
  stroke-dasharray: 166;
  stroke-dashoffset: 166;
  stroke-width: 2;
  stroke-miterlimit: 10;
  stroke: #c14242;
  fill: none;
  animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards;
}

.checkmark_check {
  transform-origin: 50% 50%;
  stroke-dasharray: 48;
  stroke-dashoffset: 48;
  animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards;
}

@keyframes stroke {
  100% {
    stroke-dashoffset: 0;
  }
}
@keyframes scale {
  0%, 100% {
    transform: none;
  }
  50% {
    transform: scale3d(1.1, 1.1, 1);
  }
}
@keyframes fill {
  100% {
    box-shadow: inset 0px 0px 0px 30px #c14242;
  }
}
html, body
{
    font-family: 'Trebuchet MS', sans-serif;
}

#center
{
	margin: 0 auto;
    text-align: center;
}


    </style>
</head>
<body style="background-color: gainsboro;">

<div id="center">
	<svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
		<circle class="checkmark_circle" cx="26" cy="26" r="25" fill="none"/>
		<path class="checkmark_check" fill="none" d="M14.1 14.1l23.8 23.8 m0,-23.8 l-23.8,23.8"/>
	</svg>
        <?php 
switch ($_GET['unsuccess']) {
    case 0: //payment
        echo "<h4>Sorry! But your payment has not been unsuccessfully proccessed! Redirecting to Customer Area...<br></h1><h5>Not redirecting? <a HREF='http://localhost/project2223_2a15-ninjahub/customerArea'>Click Here</a>.</h2>";
        break;
    case 1: //account modification
        echo "<h4>An error occured while changing your profile info. Please check your information and make sure nothing already exists in the database! Redirecting to Customer Area...<br></h1><h5>Not redirecting? <a HREF='http://localhost/project2223_2a15-ninjahub/customerArea'>Click Here</a>.</h2>";
        break;
    case 2: //service add
        echo "<h4>An error occured while adding service to cart! Please try again later. Redirecting to Customer Area...<br></h1><h5>Not redirecting? <a HREF='http://localhost/project2223_2a15-ninjahub/customerArea'>Click Here</a>.</h2>";
        break;
    case 3: //logout
        echo "<h4>An error occured while logging out! Redirecting to Customer Area...<br></h1><h5>Not redirecting? <a HREF='http://localhost/project2223_2a15-ninjahub/customerArea'>Click Here</a>.</h2>";
        break;
    case 4: //login
        echo "<h4>Sorry! But your Password or/and Email is incorrect! Redirecting to Login Page... <br></h1><h5>Not redirecting? <a HREF='http://localhost/project2223_2a15-ninjahub/customerArea'>Click Here</a>.</h2>";
    break;
    case 5: //register
        echo "<h4>Sorry! But your Email, CIN or Phone Number already exists! Redirecting to Login Page...<br></h1><h5>Not redirecting? <a HREF='http://localhost/project2223_2a15-ninjahub/customerArea'>Click Here</a>.</h2>";
    break;
    case 6: 
        echo "<h4>Operation Failed. Redirecting to Admin Area <br></h1><h5>Not redirecting? <a HREF='http://localhost/project2223_2a15-ninjahub/adminArea'>Click Here</a>.</h2>";
    break;
    case 7: 
      echo "<h4>Could not add complaint. Redirecting to Customer Area <br></h1><h5>Not redirecting? <a HREF='http://localhost/project2223_2a15-ninjahub/customerArea'>Click Here</a>.</h2>";
  break;
  case 8: 
    echo "<h4>Token has expired! Please request another password reset!<br></h1><h5>Not redirecting? <a HREF='http://localhost/project2223_2a15-ninjahub/login-register'>Click Here</a>.</h2>";
break;
}
    
?>

        

    </div>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    // to fade in on page load
    $("body").css("display", "none");
    $("body").fadeIn(800);
});
</script>

</html>