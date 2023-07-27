<?php
include_once "../Controller/customerC.php";
include_once "../Model/customer.php";
if (
  isset($_POST["register-form-name"]) &&
  isset($_POST["register-form-email"]) &&
  isset($_POST["register-form-phone"]) &&
  isset($_POST["register-form-password"]) &&
  isset($_POST["register-form-CIN"]) &&
  isset($_POST["register-form-address"])
) {
  $hash = password_hash($_POST["register-form-password"], PASSWORD_BCRYPT);
  $customerReg = new customer(
    $_POST["register-form-CIN"],
    $_POST["register-form-email"],
    $hash,
    $_POST["register-form-phone"],
    $_POST["register-form-name"],
    $_POST["register-form-address"]
  );
  $customerC = new customerC();
  if (!$customerC->Exists($customerReg)) {
    $customerC->registerCustomer($customerReg);
    header(
      "Location: http://localhost/project2223_2a15-ninjahub/uservalidation/success.php?success=5"
    );
  } else {
    header(
      "Location: http://localhost/project2223_2a15-ninjahub/uservalidation/unsuccess.php?unsuccess=5"
    );
  }
} else {
  header(
    "Location: http://localhost/project2223_2a15-ninjahub/uservalidation/unsuccess.php?unsuccess=5"
  );
}
?>
