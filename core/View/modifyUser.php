<?php
include_once "../Controller/customerC.php";
include_once "../Controller/token.php";

$token = new token();
session_start();
if ($token->is_user_logged_in()) {
  $customerC = new customerC();
  if (
    isset($_POST["email"]) &&
    isset($_POST["contactnumber"]) &&
    isset($_POST["address"]) &&
    isset($_POST["fullname"])
  ) {
    $customerUpdt = new customer(
      $_SESSION["user_id"],
      $_POST["email"],
      "",
      $_POST["contactnumber"],
      $_POST["fullname"],
      $_POST["address"]
    );
    if (!$customerC->ExistsUpdt($customerUpdt)) {
      $customerC->UpdateUser($customerUpdt);
      header(
        "location: http://localhost/project2223_2a15-ninjahub/uservalidation/success.php?success=1"
      );
    } else {
      header(
        "http://localhost/project2223_2a15-ninjahub/uservalidation/unsuccess.php?unsuccess=1"
      );
    }
  } else {
    header(
      "http://localhost/project2223_2a15-ninjahub/uservalidation/unsuccess.php?unsuccess=1"
    );
  }
} else {
  header("location: http://localhost/project2223_2a15-ninjahub/login-register");
}

?>
