<?php
include_once "../core/Controller/token.php";
include_once "../core/Controller/customerC.php";
include_once "../core/Controller/cartC.php";
include_once "../core/Controller/galleryimage.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include_once "C:/xampp/htdocs/project2223_2a15-ninjahub/core/vendor/autoload.php";

$error = null;

$mail = new PHPMailer();

$mail->isSMTP();                                            //Send using SMTP
$mail->Host       = 'mail.grandelation.com';                     //Set the SMTP server to send through
$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
$mail->Username   = 'no-reply-carhub@grandelation.com';                     //SMTP username
$mail->Password   = 'ibI9~7QO{i8E';                               //SMTP password
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
$mail->Port       = 465;
$mail->SetFrom('no-reply-carhub@grandelation.com');

$token = new token();
session_start();
if ($token->is_user_logged_in()){
	$customerC = new customerC;
	if(!$customerC->ExistsAsCustomer($_SESSION['user_id']))
		header('Location: http://localhost/project2223_2a15-ninjahub/adminArea');
  else{
    $customerC = new customerC();
    $cartC = new cartC();
    $customer = $customerC->retrieveCustomer($_SESSION['user_id']);
  }
}else
header('Location: http://localhost/project2223_2a15-ninjahub/login-register');

$Gallery = null;

    // create an instance of the controller
    $galleryC = new galleryimageC();
    if (
      isset($_POST["submit"])
    ) {
        if (
            !empty($_POST["GalleryID"]) && 
			      !empty($_POST['Nom']) &&
            !empty($_POST['descG']) &&
            !empty($_POST['URLImage']) &&
            !empty($_POST['dimension']) &&
            !empty($_POST["ModelID"])
        ) {
            $Gallery = new galleryimage(
                $_POST['GalleryID'],
                $_POST['Nom'],
                $_POST['descG'],
                $_POST['URLImage'],
				        $_POST['dimension'],
                $_POST['ModelID'], 
            );
            $galleryC->gallerryimage($Gallery);
            
            $mail->AddAddress('mohamedsghaier.chaabane@gmail.com');
            $mail->IsHTML(TRUE);
            $mail->Subject = 'No reply Gallery image added';
            $mail->Body = 'Gallery; 
            <ul>
            <li>GalleryID '.$_POST['GalleryID'].'</li>
            <li>Nom '.$_POST['Nom'].'</li>
            <li>descG '.$_POST['descG'].'</li>
            </ul>
            ';
            $mail->send();
        }else
        $error = 'Missing information';
    }

    $models = $galleryC->allmodels();
    if ($error != null)
echo '<script>alert("'.$error.'")</script>';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    </script>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>CarHub | Customer Area</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin - v2.4.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="index.php" class="logo d-flex align-items-center">
                <span class="d-none d-lg-block">CarHub</span><br>
                Client Area
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div><!-- End Search Bar -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->

                <li class="nav-item dropdown">

                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-bell"></i>
                        <span class="badge bg-primary badge-number">0</span>
                    </a><!-- End Notification Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                        <li class="dropdown-header">
                            You have 4 new notifications
                            <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-exclamation-circle text-warning"></i>
                            <div>
                                <h4>Lorem Ipsum</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>30 min. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-x-circle text-danger"></i>
                            <div>
                                <h4>Atque rerum nesciunt</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>1 hr. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-check-circle text-success"></i>
                            <div>
                                <h4>Sit rerum fuga</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>2 hrs. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-info-circle text-primary"></i>
                            <div>
                                <h4>Dicta reprehenderit</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>4 hrs. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li class="dropdown-footer">
                            <a href="#">Show all notifications</a>
                        </li>

                    </ul><!-- End Notification Dropdown Items -->

                </li><!-- End Notification Nav -->

                <li class="nav-item dropdown">

                    <a class="nav-link nav-icon" href="./cart.php" data-bs-toggle="dropdown">
                        <i class="bi bi-cart2"></i>
                        <span
                            class="badge bg-success badge-number"><?php if (!$cartC->checkCartExistPerUser($_SESSION['user_id'])) echo('0'); else echo $cartC->listcart($cartC->seekCartID($_SESSION['user_id']))->rowCount(); ?></span>
                    </a><!-- End Messages Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
                        <li class="dropdown-header">
                            You have
                            <?php if (!$cartC->checkCartExistPerUser($_SESSION['user_id'])) echo('0'); else echo $cartC->listcart($cartC->seekCartID($_SESSION['user_id']))->rowCount(); ?>
                            cart items
                            <a href="./cart.php"><span class="badge rounded-pill bg-primary p-2 ms-2">View
                                    all</span></a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <?php
              if (!$cartC->checkCartExistPerUser($_SESSION['user_id']));
              else{
                $res = $cartC->listcart($cartC->seekCartID($_SESSION['user_id']));
                while($row = $res->fetch())
                  echo ("<li class='message-item'><a href='./cart.php'><div><h4>".$row['DescServ']."</h4><p>".$row['DurationServ']."</p><p>".$row['PriceServ']." TND</p></div></a></li><li><hr class='dropdown-divider'></li>");
              }
            ?>
                        <li class="dropdown-footer">
                            <a href="./cart.php">View all cart items</a>
                        </li>
                    </ul><!-- End Messages Dropdown Items -->

                </li><!-- End Messages Nav -->

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <!--<img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">-->
                        <span class="d-none d-md-block dropdown-toggle ps-2">
                            <?php
              echo $customer->getfullname();
            ?></span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6><?php echo $customer->getfullname();?></h6>
                            <span>Customer</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-gear"></i>
                                <span>Account Settings</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                                <i class="bi bi-question-circle"></i>
                                <span>Need Help?</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="../core/view/signout.php">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

   <!-- ======= Sidebar ======= -->
   <aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
        <a class="nav-link collapsed" href="index.php">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
        </a>
    </li><!-- End Dashboard Nav -->


    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse">
            <i class="bi bi-journal-text"></i><span>Our Services</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="ServiceBuy.php">
                    <i class="bi bi-circle"></i><span>Buy a car</span>
                </a>
            </li>
            <li>
                <a href="ServiceRent.php">
                    <i class="bi bi-circle"></i><span>Rent a car</span>
                </a>
            </li>
            <li>
                <a href="Service.php">
                    <i class="bi bi-circle"></i><span>Other Services</span>
                </a>
            </li>
            <li>
                <a href="ServiceStats.php">
                    <i class="bi bi-circle"></i><span>Stats</span>
                </a>
            </li>
        </ul>
    </li><!-- End Forms Nav -->


    <li class="nav-item" style="display:none;">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-bar-chart"></i><span>Charts</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="charts-chartjs.html">
                    <i class="bi bi-circle"></i><span>Chart.js</span>
                </a>
            </li>
            <li>
                <a href="charts-apexcharts.html">
                    <i class="bi bi-circle"></i><span>ApexCharts</span>
                </a>
            </li>
            <li>
                <a href="charts-echarts.html">
                    <i class="bi bi-circle"></i><span>ECharts</span>
                </a>
            </li>
        </ul>
    </li><!-- End Charts Nav -->

    <li class="nav-item" style="display:none;">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-gem"></i><span>Icons</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="icons-bootstrap.html">
                    <i class="bi bi-circle"></i><span>Bootstrap Icons</span>
                </a>
            </li>
            <li>
                <a href="icons-remix.html">
                    <i class="bi bi-circle"></i><span>Remix Icons</span>
                </a>
            </li>
            <li>
                <a href="icons-boxicons.html">
                    <i class="bi bi-circle"></i><span>Boxicons</span>
                </a>
            </li>
        </ul>
    </li><!-- End Icons Nav -->
    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#gallery-nav" data-bs-toggle="collapse">
            <i class="bi bi-menu-button-wide"></i><span>GalleryImage</span><i
                class="bi bi-chevron-down ms-auto"></i></i>
        </a>
        <ul id="gallery-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
            <li>
                <a href="AddGalleryImage.php">
                    <i class="bi bi-circle"></i><span>Add Image</span>
                </a>
            </li>
            <li>
                <a href="ModifierImage.php">
                    <i class="bi bi-circle"></i><span>Update image </span>
                </a>
            </li>
            <li>
                <a href="Deleteimage.php">
                    <i class="bi bi-circle"></i><span>Delete image</span>
                </a>
            </li>
            <li>
                <a href="AfficherGallery.php">
                    <i class="bi bi-circle"></i><span>All Galleries</span>
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#gallery-nav" data-bs-toggle="collapse">
            <i class="bi bi-menu-button-wide"></i><span>GalleryVideo</span><i
                class="bi bi-chevron-down ms-auto"></i></i>
        </a>
        <ul id="gallery-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
            <li>
                <a href="AddGalleryVideo.php">
                    <i class="bi bi-circle"></i><span>Add Video</span>
                </a>
            </li>
            <li>
                <a href="ModifierVideo.php">
                    <i class="bi bi-circle"></i><span>Update</span>
                </a>
            </li>
            <li>
                <a href="Deletevideo.php">
                    <i class="bi bi-circle"></i><span>Delete video</span>
                </a>
            </li>
            <li>
                <a href="AfficherVideo.php">
                    <i class="bi bi-circle"></i><span>All Galleries</span>
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#car-nav" data-bs-toggle="collapse">
            <i class="bi bi-menu-button-wide"></i><span>Car</span><i class="bi bi-chevron-down ms-auto"></i></i>
        </a>
        <ul id="car-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
            <li>
                <a href="addcar.php">
                    <i class="bi bi-circle"></i><span>Add</span>
                </a>
            </li>
            <li>
                <a href="ModifyCar.php">
                    <i class="bi bi-circle"></i><span>Update</span>
                </a>
            </li>
            <li>
                <a href="DeleteCar.php">
                    <i class="bi bi-circle"></i><span>Delete</span>
                </a>
            </li>
            <li>
                <a href="allCars.php">
                    <i class="bi bi-circle"></i><span>All cars</span>
                </a>
            </li>
            <li>
                <a href="carStats.php">
                    <i class="bi bi-circle"></i><span>Stats</span>
                </a>
            </li>
        </ul>
    </li><!-- End Service Nav -->
    <li class="nav-heading">Pages</li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.php">
            <i class="bi bi-person"></i>
            <span>Profile</span>
        </a>
    </li><!-- End Profile Page Nav -->

    <li class="nav-item">
        <a class="nav-link collapsed" href="complaints.php">
            <i class="bi bi-question-circle"></i>
            <span>Complaints</span>
        </a>
    </li><!-- End F.A.Q Page Nav -->


    <li class="nav-item" style="display:none;">
        <a class="nav-link collapsed" href="pages-blank.html">
            <i class="bi bi-file-earmark"></i>
            <span>Blank</span>
        </a>
    </li><!-- End Blank Page Nav -->

</ul>

</aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Form Gallery</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item active">Gallery</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-8">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">General Form Gallery</h5>

              <!-- General Form Elements -->
              <form method="POST">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">GalleryID</label>
                  <div class="col-sm-10">
                    <input type="text" id="GalleryID" name="GalleryID" required minlength="3" maxlength="20" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputtext" class="col-sm-2 col-form-label">Nom</label>
                  <div class="col-sm-10">
                    <input type="text" id="Nom" name="Nom" required minlength="3" maxlength="20" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputtext" class="col-sm-2 col-form-label">descG</label>
                  <div class="col-sm-10">
                    <input type="text" id="descG" name="descG" required minlength="3" maxlength="20" class="form-control">
                  </div>
                  </div>
                    
                <div class="row mb-3">
                  <label for="inputtext" class="col-sm-2 col-form-label">URLImage</label>
                  <div class="col-sm-10">
                    <input type="text" id="URLImage" name="URLImage" onchange="checkurl(event)"  required minlength="3" class="form-control">
                    </div>
                  </div>
                    <div class="row mb-3">
                  <label for="inputtext" class="col-sm-2 col-form-label">dimension</label>
                  <div class="col-sm-10">
                    <input type="text" id="dimension" name="dimension" required minlength="3" maxlength="20" class="form-control">
                  </div>
                  </div>
                  
                  <div class="row mb-3">
                  <label for="inputtext" class="col-sm-2 col-form-label">ModelID</label>
                  <div class="col-sm-10">
                    <select name="ModelID" id="ModelID">
                    <?php
                      foreach ($models as $model) {
                        echo '<option value='.$model["ModelID"].'>'.$model["Manufacturer"].'</option>';
                      }
                    ?>
                    </select>
                  </div>
                </div>
                <input onclick="FormCOntrol()" type="submit" value="submit" name="submit" class="btn btn-primary">
                  


              </form><!-- End General Form Elements -->

            </div>
          </div>
        
        </div>
        <div class="col-lg-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Url image display</h5>

              <img style='width:350px;' src='https://cdn5.vectorstock.com/i/1000x1000/73/49/404-error-page-not-found-miss-paper-with-white-vector-20577349.jpg' id='displayOfImage'>
            </div>
          </div>
        
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="inscri.js"></script>
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.min.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
        // to fade in on page load
        $("body").css("display", "none");
        $("body").fadeIn(800);
    });

    function checkurl(event){
      let url = event.target.value;

      const isValidUrl = urlString=> {
          var urlPattern = new RegExp('^(https?:\\/\\/)?'+ // validate protocol
          '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|'+ // validate domain name
          '((\\d{1,3}\\.){3}\\d{1,3}))'+ // validate OR ip (v4) address
          '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*'+ // validate port and path
          '(\\?[;&a-z\\d%_.~+=-]*)?'+ // validate query string
          '(\\#[-a-z\\d_]*)?$','i'); // validate fragment locator
        return !!urlPattern.test(urlString);
      }
      
      if(isValidUrl(url)){
        document.getElementById("displayOfImage").src=url;
      }
      else
      alert("unavailable url")
    }
	</script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>