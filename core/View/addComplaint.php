
<?php
include_once "../Controller/token.php";
include_once "../Controller/complaintC.php";

session_start();
$token = new token();
if ($token->is_user_logged_in()) {
    $complaintC = new complaintC();
    if (isset($_POST['title']) && isset($_POST['description'])){
        $complaint = new complaint($_POST['title'],$_POST['description'],$_SESSION['user_id']);
        $complaintC->addComplaint($complaint);
        header("Location: http://localhost/project2223_2a15-ninjahub/uservalidation/success.php?success=8");
    }else
    header("Location: http://localhost/project2223_2a15-ninjahub/uservalidation/unsuccess.php?unsuccess=7");
}else
header("Location: http://localhost/project2223_2a15-ninjahub/login-register");
?>