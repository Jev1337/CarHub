<!DOCTYPE html>
<?php
switch (true) {
    case in_array($_GET['success'], range(0,6)):
        echo "<meta http-equiv='refresh' content='3;url=http://localhost/project2223_2a15-ninjahub/customerArea' />";
    break;
    case in_array($_GET['success'], range(6,7)):
        echo "<meta http-equiv='refresh' content='3;url=http://localhost/project2223_2a15-ninjahub/adminArea' />";
    break;
    case in_array($_GET['success'], range(8,9)):
        echo "<meta http-equiv='refresh' content='3;url=http://localhost/project2223_2a15-ninjahub/customerArea' />";
    break;
}
?>

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>Thank you!</title>
    <style>
    * {
        padding: 0;
        margin: 0
    }

    body {
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #eee
    }

    .checkmark__circle {
        stroke-dasharray: 166;
        stroke-dashoffset: 166;
        stroke-width: 2;
        stroke-miterlimit: 10;
        stroke: #7ac142;
        fill: none;
        animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards
    }

    .checkmark {
        width: 56px;
        height: 56px;
        border-radius: 50%;
        display: block;
        stroke-width: 2;
        stroke: #fff;
        stroke-miterlimit: 10;
        margin: 10% auto;
        box-shadow: inset 0px 0px 0px #7ac142;
        animation: fill .4s ease-in-out .4s forwards, scale .3s ease-in-out .9s both
    }

    .checkmark__check {
        transform-origin: 50% 50%;
        stroke-dasharray: 48;
        stroke-dashoffset: 48;
        animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards
    }

    @keyframes stroke {
        100% {
            stroke-dashoffset: 0
        }
    }

    @keyframes scale {

        0%,
        100% {
            transform: none
        }

        50% {
            transform: scale3d(1.1, 1.1, 1)
        }
    }

    @keyframes fill {
        100% {
            box-shadow: inset 0px 0px 0px 30px #7ac142
        }
    }

    html,
    body {
        font-family: 'Trebuchet MS', sans-serif;
    }

    #center {
        margin: 0 auto;
        text-align: center;
    }
    </style>
</head>

<body style="background-color: gainsboro;">

    <div id="center">
        <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
            <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
            <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
        </svg>
        <?php 
switch ($_GET['success']) {
    case 0: //payment
        echo "<h4>Thank you! Your payment has been processed. Redirecting to Customer Area...<br></h1><h5>Not redirecting? <a HREF='http://localhost/project2223_2a15-ninjahub/customerArea'>Click Here</a>.</h2>";
        break;
    case 1: //account modification
        echo "<h4>Profile has been successfully modified! Please login again. <br></h1><h5>Not redirecting? <a HREF='http://localhost/project2223_2a15-ninjahub/customerArea'>Click Here</a>.</h2>";
        break;
    case 2: //service add
        echo "<h4>Service has been added to your cart! Redirecting to Customer Area...<br></h1><h5>Not redirecting? <a HREF='http://localhost/project2223_2a15-ninjahub/customerArea'>Click Here</a>.</h2>";
        break;
    case 3: //logout
        echo "<h4>You have been successfully logged out! Redirecting to Home Page...<br></h1><h5>Not redirecting? <a HREF='http://localhost/project2223_2a15-ninjahub/customerArea'>Click Here</a>.</h2>";
        break;
    case 4: //login
        echo "<h4>You have been successfully logged in! Redirecting to Customer Area... <br></h1><h5>Not redirecting? <a HREF='http://localhost/project2223_2a15-ninjahub/customerArea'>Click Here</a>.</h2>";
    break;
    case 5: //register
        echo "<h4>You have successfully created an account! Please login.<br></h1><h5>Not redirecting? <a HREF='http://localhost/project2223_2a15-ninjahub/customerArea'>Click Here</a>.</h2>";
    break;
    case 6: //login admin
        echo "<h4>You have been successfully logged in! Redirecting to Admin Area...<br></h1><h5>Not redirecting? <a HREF='http://localhost/project2223_2a15-ninjahub/adminArea'>Click Here</a>.</h2>";
    break;
    case 7: 
        echo "<h4>Operation Executed Successfully. Redirecting to Admin Area...<br></h1><h5>Not redirecting? <a HREF='http://localhost/project2223_2a15-ninjahub/adminArea'>Click Here</a>.</h2>";
    break;
    case 8: 
        echo "<h4>Complaint Sent! Redirecting to Customer Area..<br></h1><h5>Not redirecting? <a HREF='http://localhost/project2223_2a15-ninjahub/customerArea'>Click Here</a>.</h2>";
    break;
    case 9: 
        echo "<h4>If your email exists, you will recieve a password reset email. Follow the instructions in order to reset your password!<br></h1><h5>Not redirecting? <a HREF='http://localhost/project2223_2a15-ninjahub/login-register'>Click Here</a>.</h2>";
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