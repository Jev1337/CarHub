<?php
include_once "../../core/Controller/token.php";
include_once "../../core/Controller/adminC.php";
include_once "../../core/Controller/articleC.php";

$token = new token();
session_start();
if ($token->is_user_logged_in()){
	$adminC = new adminC;
	if(!$adminC->ExistsAsAdmin($_SESSION['user_id']))
		header('Location: http://localhost/project2223_2a15-ninjahub/notfound');
  else{
    $adminC = new adminC();
    $admin = $adminC->retrieveAdmin($_SESSION['user_id']);
  }
}else
header('Location: http://localhost/project2223_2a15-ninjahub/notfound');

$articleC = new articleC();

if (isset($_GET["search"])) {
  $list = $articleC->findArticlesByTitle($_GET["search"]);
} else {
  $list = $articleC->allArticles();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<script>
    if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
  </script>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.4.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<style>
    .without_ampm::-webkit-datetime-edit-ampm-field {
   display: none;
 }
 input[type=time]::-webkit-clear-button {
   -webkit-appearance: none;
   -moz-appearance: none;
   -o-appearance: none;
   -ms-appearance:none;
   appearance: none;
   margin: -10px; 
 }
    </style>
<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <!--<img src="../assets/img/logo.png" alt="">-->
        <span class="d-none d-lg-block">CarHub</span><br>
        Admin Area
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
            <span class="badge bg-primary badge-number">4</span>
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

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">3</span>
          </a><!-- End Messages Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              You have 3 new messages
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="../assets/img/messages-1.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Maria Hudson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>4 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="../assets/img/messages-2.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Anna Nelson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>6 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="../assets/img/messages-3.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>David Muldon</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>8 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="dropdown-footer">
              <a href="#">Show all messages</a>
            </li>

          </ul><!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img style="display: none;" src="../assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">
            <?php
              echo $admin->getfullname();
            ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $admin->getfullname();?></h6>
              <span>admin</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="../users-profile.php">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="../users-profile.php">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
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
        <a class="nav-link collapsed" href="../index.php">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
        </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#service-nav" data-bs-toggle="collapse">
            <i class="bi bi-menu-button-wide"></i><span>Services</span><i
                class="bi bi-chevron-down ms-auto"></i></i>
        </a>
        <ul id="service-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
            <li>
                <a href="../service/add.php">
                    <i class="bi bi-circle"></i><span>Add</span>
                </a>
            </li>
            <li>
                <a href="../service/update.php">
                    <i class="bi bi-circle"></i><span>Update</span>
                </a>
            </li>
            <li>
                <a href="../service/delete.php">
                    <i class="bi bi-circle"></i><span>Delete</span>
                </a>
            </li>
            <li>
                <a href="../service/allservices.php">
                    <i class="bi bi-circle"></i><span>All Servicess</span>
                </a>
            </li>
            <li>
                <a href="../service/stats.php">
                    <i class="bi bi-circle"></i><span>Stats</span>
                </a>
            </li>
        </ul>
    </li><!-- End Service Nav -->

    <li class="nav-item">
        <a class="nav-link collapsed" href="../transactions.php">
            <i class="bi bi-person"></i>
            <span>Transactions</span>
        </a>
    </li><!-- End Profile Page Nav -->

    
    <li class="nav-item">
        <a class="nav-link" data-bs-target="#article-nav" data-bs-toggle="collapse">
            <i class="bi bi-menu-button-wide"></i><span>Article</span><i
                class="bi bi-chevron-down ms-auto"></i></i>
        </a>
        <ul id="article-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
            <li>
                <a href="add.php">
                    <i class="bi bi-circle"></i><span>Add</span>
                </a>
            </li>
            <li>
                <a href="update.php">
                    <i class="bi bi-circle"></i><span>Update</span>
                </a>
            </li>
            <li>
                <a href="delete.php">
                    <i class="bi bi-circle"></i><span>Delete</span>
                </a>
            </li>
            <li>
                <a href="allArticles.php" class="active">
                    <i class="bi bi-circle"></i><span>All Articles</span>
                </a>
            </li>
            <li>
                <a href="statique.php">
                    <i class="bi bi-circle"></i><span>Statique</span>
                </a>
            </li>
        </ul>
    </li><!-- End Articles Nav -->
    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#model-nav" data-bs-toggle="collapse">
            <i class="bi bi-menu-button-wide"></i><span>Model</span><i
                class="bi bi-chevron-down ms-auto"></i></i>
        </a>
        <ul id="model-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
            <li>
                <a href="../models/Add.php">
                    <i class="bi bi-circle"></i><span>Add</span>
                </a>
            </li>
            <li>
                <a href="../models/update.php">
                    <i class="bi bi-circle"></i><span>Update</span>
                </a>
            </li>
            <li>
                <a href="../models/delete.php">
                    <i class="bi bi-circle"></i><span>Delete</span>
                </a>
            </li>
            <li>
                <a href="../models/allModels.php">
                    <i class="bi bi-circle"></i><span>All Models</span>
                </a>
            </li>
        </ul>
    </li><!-- End Service Nav -->
    

    <li class="nav-heading">Pages</li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="../users-profile.php">
            <i class="bi bi-person"></i>
            <span>Profile</span>
        </a>
    </li><!-- End Profile Page Nav -->

    <li class="nav-item">
        <a class="nav-link collapsed" href="../complaints.php">
            <i class="bi bi-question-circle"></i>
            <span>Complaints</span>
        </a>
    </li><!-- End Complaints Page Nav -->

</ul>

</aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Articles</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a>Admin</a></li>
          <li class="breadcrumb-item">Articles</li>
          <li class="breadcrumb-item active">Article</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">All articles</h5>

              <!-- Default Table -->
              <input type="text" id="search_filter" placeholder="search...">
                            <button><a href="AllArticles.php" id="search_url" style="color:black">Search</a></button>
                            <script>
                            document.getElementById("search_filter").addEventListener("change", changeSearchUrl);
                            
                            function changeSearchUrl(e) {
                            document.getElementById("search_url").href = "?search="+e.target.value
                            }
                            </script>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">ExpiryDate</th>
                    <th scope="col">CIN</th>
                    <th scope="col">Views</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($list as $article) {
                ?>
                  <tr>
                    <th scope="row"><?= $article['Title']; ?></th>
                    <td><?= $article['Description']; ?></td>
                    <td><?= $article['ExpiryDate']; ?></td>
                    <td><?= $article['CIN']; ?></td>
                    <td><?= $article['Views']; ?></td>
                  </tr>
                  
                <?php
                }
                ?>
                </tbody>
              </table>
              <!-- End Default Table Example -->
            </div>
          </div>


        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/chart.js/chart.min.js"></script>
  <script src="../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../assets/vendor/quill/quill.min.js"></script>
  <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>