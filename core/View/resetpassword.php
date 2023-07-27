<?php
include_once "../Controller/customerC.php";
require '../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_GET['token'])){
  $customerC = new customerC();
  if (isset($_POST["password"])){
    if($customerC->CheckReset($_GET['token'])){
      $hash = password_hash($_POST["password"], PASSWORD_BCRYPT);
      $customerUpdt = new customer($customerC->getCINfromAUTH($_GET['token']), "", $hash, "", "", "");
      $customerC->updateUserPW($customerUpdt);
            $browser = get_browser(null, true);
            $mail = new PHPMailer(true);
            try {
                //Server settings

                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'mail.grandelation.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'no-reply-carhub@grandelation.com';                     //SMTP username
                $mail->Password   = 'ibI9~7QO{i8E';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            
                //Recipients
                $mail->setFrom('no-reply-carhub@grandelation.com','CarHub - Password Changed');
                $mail->addAddress($customerC->getEMAILfromTOKEN($_GET['token']));               //Name is optional
            
                //Content
                $mail->isHTML(true);    //Set email format to HTML
                $mail->AddEmbeddedImage('logo.png', 'logo');                              
                $mail->Subject = 'CarHub: Password Changed';
                $mail->Body    = '<!DOCTYPE html><html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office"><head>
                <title> Welcome to Coded Mails </title>
                <!--[if !mso]><!-- -->
                <meta http-equiv="X-UA-Compatible" content="IE=edge" />
                <!--<![endif]-->
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                <meta name="viewport" content="width=device-width, initial-scale=1" />
                <style type="text/css">
                  #outlook a {
                    padding: 0;
                  }
              
                  body {
                    margin: 0;
                    padding: 0;
                    -webkit-text-size-adjust: 100%;
                    -ms-text-size-adjust: 100%;
                  }
              
                  table,
                  td {
                    border-collapse: collapse;
                    mso-table-lspace: 0pt;
                    mso-table-rspace: 0pt;
                  }
              
                  img {
                    border: 0;
                    height: auto;
                    line-height: 100%;
                    outline: none;
                    text-decoration: none;
                    -ms-interpolation-mode: bicubic;
                  }
              
                  p {
                    display: block;
                    margin: 13px 0;
                  }
                </style>
                <!--[if mso]>
                      <xml>
                      <o:OfficeDocumentSettings>
                        <o:AllowPNG/>
                        <o:PixelsPerInch>96</o:PixelsPerInch>
                      </o:OfficeDocumentSettings>
                      </xml>
                      <![endif]-->
                <!--[if lte mso 11]>
                      <style type="text/css">
                        .mj-outlook-group-fix { width:100% !important; }
                      </style>
                      <![endif]-->
                <style type="text/css">
                  @media only screen and (min-width:480px) {
                    .mj-column-per-100 {
                      width: 100% !important;
                      max-width: 100%;
                    }
                  }
                </style>
                <style type="text/css">
                  @media only screen and (max-width:480px) {
                    table.mj-full-width-mobile {
                      width: 100% !important;
                    }
              
                    td.mj-full-width-mobile {
                      width: auto !important;
                    }
                  }
                </style>
                <style type="text/css">
                  a,
                  span,
                  td,
                  th {
                    -webkit-font-smoothing: antialiased !important;
                    -moz-osx-font-smoothing: grayscale !important;
                  }
                </style>
              </head>
              
              <body style="background-color:#ffffff;">
                <div style="display:none;font-size:1px;color:#ffffff;line-height:1px;max-height:0px;max-width:0px;opacity:0;overflow:hidden;"> Preview - Welcome to Coded Mails </div>
                <div style="background-color:#ffffff;">
                  <!--[if mso | IE]>
                    <table
                       align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600"
                    >
                      <tr>
                        <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
                    <![endif]-->
                  <div style="margin:0px auto;max-width:600px;">
                    <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;">
                      <tbody>
                        <tr>
                          <td style="direction:ltr;font-size:0px;padding:20px 0;padding-bottom:0px;text-align:center;">
                            <!--[if mso | IE]>
                                <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                              
                      <tr>
                    
                          <td
                             class="" style="vertical-align:top;width:600px;"
                          >
                        <![endif]-->
                            <div class="mj-column-per-100 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                              <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
                                <tbody><tr>
                                  <td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse:collapse;border-spacing:0px;">
                                      <tbody>
                                        <tr>
                                          <td style="width:200px;">
                                            <img alt="image description" src="cid:logo" style="border:0;display:block;outline:none;text-decoration:none;height:auto;width:100%;font-size:14px;" width="50" />
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </td>
                                </tr>
                                <tr>
                                  <td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                    <div style="font-family:Helvetica, Arial, sans-serif;font-size:18px;font-weight:400;line-height:24px;text-align:left;color:#434245;">
                                      <h1 style="margin: 0; font-size: 24px; line-height: normal; font-weight: bold;"> You got a new <br /> Notification </h1>
                                    </div>
                                  </td>
                                </tr>
                              </tbody></table>
                            </div>
                            <!--[if mso | IE]>
                          </td>
                        
                      </tr>
                    
                                </table>
                              <![endif]-->
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <!--[if mso | IE]>
                        </td>
                      </tr>
                    </table>
                    
                    <table
                       align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600"
                    >
                      <tr>
                        <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
                    <![endif]-->
                  <div style="margin:0px auto;max-width:600px;">
                    <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;">
                      <tbody>
                        <tr>
                          <td style="direction:ltr;font-size:0px;padding:20px 0;text-align:center;">
                            <!--[if mso | IE]>
                                <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                              
                      <tr>
                    
                          <td
                             class="" style="vertical-align:top;width:600px;"
                          >
                        <![endif]-->
                            <div class="mj-column-per-100 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                              <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
                                <tbody><tr>
                                  <td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                    <div style="font-family:Helvetica, Arial, sans-serif;font-size:18px;font-weight:400;line-height:24px;text-align:left;color:#434245;">
                                      <p style="margin: 0;">Hi, '.$customerC->getNAMEfromEMAIL($customerC->getEMAILfromTOKEN($_GET['token'])).'</p>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                    <div style="font-family:Helvetica, Arial, sans-serif;font-size:18px;font-weight:400;line-height:24px;text-align:left;color:#434245;">
                                      <p style="margin: 0;">We have some new notifications regarding your account.</p>
                                    </div>
                                  </td>
                                </tr>
                              </tbody></table>
                            </div>
                            <!--[if mso | IE]>
                          </td>
                        
                      </tr>
                    
                                </table>
                              <![endif]-->
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <!--[if mso | IE]>
                        </td>
                      </tr>
                    </table>
                    
                    <table
                       align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600"
                    >
                      <tr>
                        <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
                    <![endif]-->
              
                  <!--[if mso | IE]>
                        </td>
                      </tr>
                    </table>
                    
                    <table
                       align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600"
                    >
                      <tr>
                        <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
                    <![endif]-->
                  <div style="margin:0px auto;max-width:600px;">
                    <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;">
                      <tbody>
                        <tr>
                          <td style="direction:ltr;font-size:0px;padding:0;text-align:center;">
                            <!--[if mso | IE]>
                                <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                              
                      <tr>
                    
                          <td
                             class="" style="vertical-align:top;width:600px;"
                          >
                        <![endif]-->
                            <div class="mj-column-per-100 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                              <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
                                <tbody><tr>
                                  <td style="font-size:0px;word-break:break-word;">
                                    <!--[if mso | IE]>
                  
                      <table role="presentation" border="0" cellpadding="0" cellspacing="0"><tr><td height="20" style="vertical-align:top;height:20px;">
                    
                  <![endif]-->
                                    <div style="height:20px;">   </div>
                                    <!--[if mso | IE]>
                  
                      </td></tr></table>
                    
                  <![endif]-->
                                  </td>
                                </tr>
                              </tbody></table>
                            </div>
                            <!--[if mso | IE]>
                          </td>
                        
                      </tr>
                    
                                </table>
                              <![endif]-->
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <!--[if mso | IE]>
                        </td>
                      </tr>
                    </table>
                    
                    <table
                       align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600"
                    >
                      <tr>
                        <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
                    <![endif]-->
                  <div style="background:#FFF0B5;background-color:#FFF0B5;margin:0px auto;border-radius:4px;max-width:600px;">
                    <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#FFF0B5;background-color:#FFF0B5;width:100%;border-radius:4px;">
                      <tbody>
                        <tr>
                          <td style="direction:ltr;font-size:0px;padding:20px 0;text-align:center;">
                            <!--[if mso | IE]>
                                <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                              
                      <tr>
                    
                          <td
                             class="" style="vertical-align:top;width:600px;"
                          >
                        <![endif]-->
                            <div class="mj-column-per-100 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                              <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
                                <tbody><tr>
                                  <td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                    <div style="font-family:Helvetica, Arial, sans-serif;font-size:18px;font-weight:bold;line-height:24px;text-align:left;color:#7A5200;">
                                      <h2 style="margin: 0; font-size: 24px; font-weight: bold; line-height: 24px;">Password Changed</h2>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                    <div style="font-family:Helvetica, Arial, sans-serif;font-size:18px;font-weight:400;line-height:24px;text-align:left;color:#7A5200;">
                                      <p style="margin: 0;">Your password has been changed! If you haven\'t changed anything from your part, please contact us via <a href="mailto:info-carhub@grandelation.com">email</a>.</p>
                                    </div>
                                  </td>
                                </tr>
                              </tbody></table>
                            </div>
                            <!--[if mso | IE]>
                          </td>
                        
                      </tr>
                    
                                </table>
                              <![endif]-->
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <!--[if mso | IE]>
                        </td>
                      </tr>
                    </table>
                    
                    <table
                       align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600"
                    >
                      <tr>
                        <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
                    <![endif]-->
                 
                  <!--[if mso | IE]>
                        </td>
                      </tr>
                    </table>
                    
                    <table
                       align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600"
                    >
                      <tr>
                        <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
                    <![endif]-->
                  <div style="margin:0px auto;max-width:600px;">
                    <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;">
                      <tbody>
                        <tr>
                          <td style="direction:ltr;font-size:0px;padding:20px 0;padding-top:0;text-align:center;">
                            <!--[if mso | IE]>
                                <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                              
                      <tr>
                    
                          <td
                             class="" style="vertical-align:top;width:600px;"
                          >
                        <![endif]-->
                            <div class="mj-column-per-100 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                              <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
                                <tbody><tr>
                                  <td style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                    <p style="border-top: dashed 1px lightgrey; font-size: 1px; margin: 0px auto; width: 100%;">
                                    </p>
                                    <!--[if mso | IE]>
                      <table
                         align="center" border="0" cellpadding="0" cellspacing="0" style="border-top:dashed 1px lightgrey;font-size:1px;margin:0px auto;width:550px;" role="presentation" width="550px"
                      >
                        <tr>
                          <td style="height:0;line-height:0;">
                            &nbsp;
                          </td>
                        </tr>
                      </table>
                    <![endif]-->
                                  </td>
                                </tr>
                                <tr>
                                  <td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                    <div style="font-family:Helvetica, Arial, sans-serif;font-size:14px;font-weight:400;line-height:24px;text-align:left;color:#999999;">Have questions or need help? Email us at <a href="#" style="color: #2e58ff; text-decoration: none;"> info-carhub@grandelation.com </a></div>
                                  </td>
                                </tr>
                                <tr>
                                  <td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                    <div style="font-family:Helvetica, Arial, sans-serif;font-size:18px;font-weight:400;line-height:24px;text-align:left;color:#434245;">ESPRIT Bloc H<br /> © 2022 CarHub Inc.</div>
                                  </td>
                                </tr>
                              </tbody></table>
                            </div>
                            <!--[if mso | IE]>
                          </td>
                        
                      </tr>
                    
                                </table>
                              <![endif]-->
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <!--[if mso | IE]>
                        </td>
                      </tr>
                    </table>
                    
                    <table
                       align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600"
                    >
                      <tr>
                        <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
                    <![endif]-->
                  <div style="margin:0px auto;max-width:600px;">
                    <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;">
                      <tbody>
                        <tr>
                          <td style="direction:ltr;font-size:0px;padding:20px 0;text-align:center;">
                            <!--[if mso | IE]>
                                <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                              
                      <tr>
                    
                          <td
                             class="" style="vertical-align:top;width:600px;"
                          >
                        <![endif]-->
                            <div class="mj-column-per-100 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                              <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
                                <tbody><tr>
                                  <td style="font-size:0px;word-break:break-word;">
                                    <!--[if mso | IE]>
                  
                      <table role="presentation" border="0" cellpadding="0" cellspacing="0"><tr><td height="1" style="vertical-align:top;height:1px;">
                    
                  <![endif]-->
                                    <div style="height:1px;">   </div>
                                    <!--[if mso | IE]>
                  
                      </td></tr></table>
                    
                  <![endif]-->
                                  </td>
                                </tr>
                              </tbody></table>
                            </div>
                            <!--[if mso | IE]>
                          </td>
                        
                      </tr>
                    
                                </table>
                              <![endif]-->
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <!--[if mso | IE]>
                        </td>
                      </tr>
                    </table>
                    <![endif]-->
                </div>
              
              
              </body></html>';
                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
            $customerC->DeleteReset($customerC->getCINfromAUTH($_GET['token']));
            header("location: http://localhost/project2223_2a15-ninjahub/uservalidation/success.php?success=1");
    }else
    header("location: http://localhost/project2223_2a15-ninjahub/uservalidation/unsuccess.php?unsuccess=8");
  }else {
    header("location: http://localhost/project2223_2a15-ninjahub/login-register");
  }
} else {
  header("location: http://localhost/project2223_2a15-ninjahub/login-register");
}

?>
