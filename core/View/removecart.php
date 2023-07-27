<?php
include_once "../Controller/cartC.php";
include_once "../Controller/token.php";

$token = new token();
session_start();
if ($token->is_user_logged_in()) {
  $cartC = new cartC();
  if ($cartC->checkCartExistPerUser($_SESSION["user_id"])) {
    if (
      $cartC->ServRemExistCart(
        $_GET["rem"],
        $cartC->seekCartID($_SESSION["user_id"])
      )
    ) {
      $cartC->RemoveFromCart(
        $_GET["rem"],
        $cartC->seekCartID($_SESSION["user_id"])
      );
      header(
        "location: http://localhost/project2223_2a15-ninjahub/customerArea/cart.php"
      );
    } else {
      header(
        "location: http://localhost/project2223_2a15-ninjahub/customerArea/cart.php"
      );
    }
  } else {
    header("location: http://localhost/project2223_2a15-ninjahub/customerArea");
  }
} else {
  header("location: http://localhost/project2223_2a15-ninjahub/login-register");
}

?>
