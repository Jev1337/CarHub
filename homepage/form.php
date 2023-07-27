<?php
require '../core/vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
$mail = new PHPMailer(true);
try {
    //Server settings

    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'mail.grandelation.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'info-carhub@grandelation.com';                     //SMTP username
    $mail->Password   = 'HN-$(terq5y_';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('info-carhub@grandelation.com','CarHub - Contact Request');
    $mail->addAddress('info-carhub@grandelation.com');               //Name is optional

    //Content
    $mail->isHTML(true);    //Set email format to HTML                         
    $mail->Subject = 'CarHub Admin: Contact Request';
    $mail->Body    = 'Name: '.$_POST['quick-contact-form-name'].'<br>Email: '.$_POST['quick-contact-form-email']. '<br>Message: '.$_POST['quick-contact-form-message'];
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>