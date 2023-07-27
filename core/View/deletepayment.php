
<?php
include_once "../Controller/transactionC.php";
include_once "../Controller/token.php";
include_once "../Controller/onlinepayC.php";
include_once "../Model/transaction.php";
include_once "../Model/onlinepay.php";
$token = new token();
session_start();
if ($token->is_user_logged_in()) {
  $transact = new transactionC();
  if ($transact->checkCartExistPerUser($_SESSION["user_id"])) {
    if (
      $transact->TransactionExist($transact->seekCartID($_SESSION["user_id"]))
    ) {
      $transact->deleteTransaction(
        $transact->retrieveTransactionID(
          $transact->seekCartID($_SESSION["user_id"])
        )
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
