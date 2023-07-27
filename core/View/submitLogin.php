<?php
include_once "../Controller/customerC.php";
include_once "../Model/customer.php";
include_once "../Controller/adminC.php";
if (isset($_POST["login-form-email"]) && isset($_POST["login-form-password"])) {
  $customerC = new customerC();
  $adminC = new adminC();
  if ($customerC->EmailExistsCustomer($_POST["login-form-email"])) {
    if (
      $customerC->Verify(
        $_POST["login-form-password"],
        $_POST["login-form-email"]
      )
    ) {
      header(
        "Location: http://localhost/project2223_2a15-ninjahub/uservalidation/success.php?success=4"
      );
    } else {
      header(
        "Location: http://localhost/project2223_2a15-ninjahub/uservalidation/unsuccess.php?unsuccess=4"
      );
    }
  } else {
    if ($adminC->EmailExistsAdmin($_POST["login-form-email"])) {
      if (
        $adminC->Verify(
          $_POST["login-form-password"],
          $_POST["login-form-email"]
        )
      ) {
        header(
          "Location: http://localhost/project2223_2a15-ninjahub/uservalidation/success.php?success=6"
        );
      } else {
        header(
          "Location: http://localhost/project2223_2a15-ninjahub/uservalidation/unsuccess.php?unsuccess=4"
        );
      }
    } else {
      header(
        "Location: http://localhost/project2223_2a15-ninjahub/uservalidation/unsuccess.php?unsuccess=4"
      );
    }
  }
}
?>
