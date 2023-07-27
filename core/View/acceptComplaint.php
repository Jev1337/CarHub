<?php
include_once "../Controller/token.php";
include_once "../Controller/adminC.php";
include_once "../Controller/complaintC.php";
$token = new token();
session_start();
if ($token->is_user_logged_in()){
	$adminC = new adminC;
    $complaintC = new complaintC;
	if(!$adminC->ExistsAsAdmin($_SESSION['user_id']))
		header('Location: http://localhost/project2223_2a15-ninjahub/notfound');
  else{
    if (isset($_GET['complaintID'])){
        $complaintC->acceptComplaint($_GET['complaintID']);
        header('Location: http://localhost/project2223_2a15-ninjahub/uservalidation/success.php?success=7');
    }
    else
        header('Location: http://localhost/project2223_2a15-ninjahub/uservalidation/unsuccess.php?unsuccess=6');
  }
}else
header('Location: http://localhost/project2223_2a15-ninjahub/notfound');

?>