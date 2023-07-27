<?php
include_once "../Controller/customerC.php";
include_once "../Controller/token.php";

$token = new token();
session_start();
if ($token->is_user_logged_in()) {
  $customerC = new customerC();
  if ($customerC->EmailExistsCustomer($_SESSION["email"])) {
    $customerC->DeleteUser($_SESSION["user_id"]);
    $token->logout();
    header(
      "http://localhost/project2223_2a15-ninjahub/uservalidation/success.php?success=1"
    );
  } else {
    header(
      "http://localhost/project2223_2a15-ninjahub/uservalidation/unsuccess.php?unsuccess=1"
    );
  }
} else {
  header("location: http://localhost/project2223_2a15-ninjahub/login-register");
}

?>
