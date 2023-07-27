<?php
include_once "../Controller/token.php";
session_start();
$token = new token();
$token->logout();
header(
  "Location: http://localhost/project2223_2a15-ninjahub/uservalidation/success.php?success=3"
);

?>
