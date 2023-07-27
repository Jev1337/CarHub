<?php
include_once "../Controller/customerC.php";
include_once "../Controller/adminC.php";
include_once "../Controller/token.php";

$token = new token();
session_start();
if ($token->is_user_logged_in()) {
  $adminC = new adminC();
  if ($adminC->EmailExistsAdmin($_SESSION["email"])) {
    if (
      isset($_GET["cin"]) &&
      $_SESSION["user_id"] != $_GET["cin"] &&
      $adminC->ExistsCIN($_GET["cin"])
    ) {
      $customerC = new customerC();
      $adminC->DeleteUser($_GET["cin"]);
      header(
        "location: http://localhost/project2223_2a15-ninjahub/uservalidation/success.php?success=7"
      );
    } else {
      header(
        "location: http://localhost/project2223_2a15-ninjahub/uservalidation/unsuccess.php?unsuccess=6"
      );
    }
  } else {
    header("location: http://localhost/project2223_2a15-ninjahub/notfound");
  }
} else {
  header("location: http://localhost/project2223_2a15-ninjahub/notfound");
}

?>
