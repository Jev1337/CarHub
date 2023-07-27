<?php
include_once "../../core/Controller/token.php";
include_once "../../core/Controller/adminC.php";
include_once "../../core/Model/Car.php";
include_once "../../core/Model/Model.php";
include_once "../../core/Controller/ModelC.php";

$token = new token();
session_start();
if ($token->is_user_logged_in()) {
  $adminC = new adminC();
  if (!$adminC->ExistsAsAdmin($_SESSION["user_id"])) {
    header("Location: http://localhost/project2223_2a15-ninjahub/notfound");
  } else {
    $adminC = new adminC();
    $admin = $adminC->retrieveAdmin($_SESSION["user_id"]);
  }
} else {
  header("Location: http://localhost/project2223_2a15-ninjahub/notfound");
}

$model = null;
$error = null;

$ModelC = new ModelC();
if (
  isset($_POST["Manufacturer"]) &&
  isset($_POST["HP"]) &&
  isset($_POST["kW"]) &&
  isset($_POST["Acceleration"]) &&
  isset($_POST["MaxSpeed"]) &&
  isset($_POST["InGearAccel"]) &&
  isset($_POST["Flex5Gear"]) &&
  isset($_POST["EngineLayout"]) &&
  isset($_POST["NumberOfCyl"]) &&
  isset($_POST["Displacement"]) &&
  isset($_POST["FuelConsumptUrb"]) &&
  isset($_POST["FuelConsumptNonUrb"]) &&
  isset($_POST["FuelConsumptComb"]) &&
  isset($_POST["CO2Emissions"]) &&
  isset($_POST["BodyLength"]) &&
  isset($_POST["BodyWidth"]) &&
  isset($_POST["BodyHeight"]) &&
  isset($_POST["UnladenWeightDin"]) &&
  isset($_POST["UnladenWeightEU"]) &&
  isset($_POST["DragCoefficientCd"]) &&
  isset($_POST["Overview"]) &&
  isset($_POST["TechSpecs"]) &&
  isset($_POST["TypeCar"])
) {
  if (
    !empty($_POST["Manufacturer"]) &&
    !empty($_POST["HP"]) &&
    !empty($_POST["kW"]) &&
    !empty($_POST["Acceleration"]) &&
    !empty($_POST["MaxSpeed"]) &&
    !empty($_POST["InGearAccel"]) &&
    !empty($_POST["Flex5Gear"]) &&
    !empty($_POST["EngineLayout"]) &&
    !empty($_POST["NumberOfCyl"]) &&
    !empty($_POST["Displacement"]) &&
    !empty($_POST["FuelConsumptUrb"]) &&
    !empty($_POST["FuelConsumptNonUrb"]) &&
    !empty($_POST["FuelConsumptComb"]) &&
    !empty($_POST["CO2Emissions"]) &&
    !empty($_POST["BodyLength"]) &&
    !empty($_POST["BodyWidth"]) &&
    !empty($_POST["BodyHeight"]) &&
    !empty($_POST["UnladenWeightDin"]) &&
    !empty($_POST["UnladenWeightEU"]) &&
    !empty($_POST["DragCoefficientCd"]) &&
    !empty($_POST["Overview"]) &&
    !empty($_POST["TechSpecs"]) &&
    !empty($_POST["TypeCar"])
  ) {
    if (
      $_POST["HP"] > 0 &&
      $_POST["kW"] > 0 &&
      $_POST["Acceleration"] > 0 &&
      $_POST["MaxSpeed"] > 0 &&
      $_POST["InGearAccel"] > 0 &&
      $_POST["Flex5Gear"] > 0 &&
      $_POST["EngineLayout"] > 0 &&
      $_POST["NumberOfCyl"] > 0 &&
      $_POST["Displacement"] > 0 &&
      $_POST["FuelConsumptUrb"] > 0 &&
      $_POST["FuelConsumptNonUrb"] > 0 &&
      $_POST["FuelConsumptComb"] > 0 &&
      $_POST["CO2Emissions"] > 0 &&
      $_POST["BodyLength"] > 0 &&
      $_POST["BodyWidth"] > 0 &&
      $_POST["UnladenWeightDin"] > 0 &&
      $_POST["UnladenWeightEU"] > 0 &&
      $_POST["DragCoefficientCd"] > 0
    ) {
      if (is_numeric($_POST["Manufacturer"])) {
        $error = "Manufacturer shouldnt be a number!";
      } else {
        $model = new Model(
          null,
          $_POST["Manufacturer"],
          $_POST["HP"],
          $_POST["kW"],
          $_POST["Acceleration"],
          $_POST["MaxSpeed"],
          $_POST["InGearAccel"],
          $_POST["Flex5Gear"],
          $_POST["EngineLayout"],
          $_POST["NumberOfCyl"],
          $_POST["Displacement"],
          $_POST["FuelConsumptUrb"],
          $_POST["FuelConsumptNonUrb"],
          $_POST["FuelConsumptComb"],
          $_POST["CO2Emissions"],
          $_POST["BodyLength"],
          $_POST["BodyWidth"],
          $_POST["BodyHeight"],
          $_POST["UnladenWeightDin"],
          $_POST["UnladenWeightEU"],
          $_POST["DragCoefficientCd"],
          $_POST["Overview"],
          $_POST["TechSpecs"],
          $_POST["TypeCar"]
        );
        $ModelC->CreateModel($model);
      }
    } else {
      $error = "Information should be a positive number!";
    }
  } else {
    $error = "Missing information!";
  }
}

if ($error != null) {
  echo '<script>alert("' . $error . '")</script>';
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
            <?php echo $admin->getfullname(); ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $admin->getfullname(); ?></h6>
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
                <a class="nav-link collapsed" href="../">
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
                <a class="nav-link collapsed" href="transactions.php">
                    <i class="bi bi-person"></i>
                    <span>Transactions</span>
                </a>
            </li><!-- End Profile Page Nav -->

            
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#article-nav" data-bs-toggle="collapse">
                    <i class="bi bi-menu-button-wide"></i><span>Article</span><i
                        class="bi bi-chevron-down ms-auto"></i></i>
                </a>
                <ul id="article-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="../article/add.php">
                            <i class="bi bi-circle"></i><span>Add</span>
                        </a>
                    </li>
                    <li>
                        <a href="../article/update.php">
                            <i class="bi bi-circle"></i><span>Update</span>
                        </a>
                    </li>
                    <li>
                        <a href="../article/delete.php">
                            <i class="bi bi-circle"></i><span>Delete</span>
                        </a>
                    </li>
                    <li>
                        <a href="../article/allArticles.php">
                            <i class="bi bi-circle"></i><span>All Articles</span>
                        </a>
                    </li>
                    <li>
                        <a href="../article/statique.php">
                            <i class="bi bi-circle"></i><span>Statique</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Articles Nav -->
            <li class="nav-item">
                <a class="nav-link" data-bs-target="#model-nav" data-bs-toggle="collapse">
                    <i class="bi bi-menu-button-wide"></i><span>Model</span><i
                        class="bi bi-chevron-down ms-auto"></i></i>
                </a>
                <ul id="model-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="Add.php" class="active">
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
                        <a href="allModels.php">
                            <i class="bi bi-circle"></i><span>All Models</span>
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
            </li><!-- End Complaints Page Nav -->

        </ul>

    </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Models</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a>Admin</a></li>
          <li class="breadcrumb-item">Models</li>
          <li class="breadcrumb-item active">Model</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Model</h5>

              <!-- MODEL -->
              <form method="post">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Manufacturer</label>
                  <div class="col-sm-10">
                    <input type="text" id="Manufacturer" class="form-control" name="Manufacturer">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label">HP</label>
                  <div class="col-sm-10">
                    <input type="number" id="HP" class="form-control" name="HP">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">kW</label>
                  <div class="col-sm-10">
                    <input type="number" id="kW" class="form-control" name="kW">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Acceleration</label>
                  <div class="col-sm-10">
                    <input type="number" id="Acceleration" class="form-control" name="Acceleration" step="0.5">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">MaxSpeed</label>
                  <div class="col-sm-10">
                    <input class="form-control" id="MaxSpeed" type="number" name="MaxSpeed">
                  </div>
                </div>
                
                <div class="row mb-3">
                <label class="col-sm-2 col-form-label">InGearAccel</label>
                  <div class="col-sm-10">
                    <input type="number" id="InGearAccel" class="form-control" name="InGearAccel">
                  </div>
                </div>
                <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Flex5Gear</label>
                  <div class="col-sm-10">
                    <input type="number" id="Flex5Gear" class="form-control" name="Flex5Gear">
                  </div>
                </div>
                <div class="row mb-3">
                <label class="col-sm-2 col-form-label">EngineLayout</label>
                  <div class="col-sm-10">
                    <input type="text" id="EngineLayout" class="form-control" name="EngineLayout">
                  </div>
                </div>
                <div class="row mb-3">
                <label class="col-sm-2 col-form-label">NumberOfCyl</label>
                  <div class="col-sm-10">
                    <input type="number" id="NumberOfCyl" class="form-control" name="NumberOfCyl" step="1">
                  </div>
                </div>
                <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Displacement</label>
                  <div class="col-sm-10">
                    <input type="number" id="Displacement" class="form-control" name="Displacement" step="0.5">
                  </div>
                </div>
                <div class="row mb-3">
                <label class="col-sm-2 col-form-label">FuelConsumptUrb</label>
                  <div class="col-sm-10">
                    <input type="number" id="FuelConsumptUrb" class="form-control" name="FuelConsumptUrb" step="0.5">
                  </div>
                </div>
                <div class="row mb-3">
                <label class="col-sm-2 col-form-label">FuelConsumptNonUrb</label>
                  <div class="col-sm-10">
                    <input type="number" id="FuelConsumptNonUrb" class="form-control" name="FuelConsumptNonUrb" step="0.5">
                  </div>
                </div>
                <div class="row mb-3">
                <label class="col-sm-2 col-form-label">FuelConsumptComb</label>
                  <div class="col-sm-10">
                    <input type="number" id="FuelConsumptComb" class="form-control" name="FuelConsumptComb" step="0.5">
                  </div>
                </div>
                <div class="row mb-3">
                <label class="col-sm-2 col-form-label">CO2Emissions</label>
                  <div class="col-sm-10">
                    <input type="number" id="CO2Emissions" class="form-control" name="CO2Emissions" step="0.5">
                  </div>
                </div>
                <div class="row mb-3">
                <label class="col-sm-2 col-form-label">BodyLength</label>
                  <div class="col-sm-10">
                    <input type="number" id="BodyLength" class="form-control" name="BodyLength" step="0.5">
                  </div>
                </div>
                <div class="row mb-3">
                <label class="col-sm-2 col-form-label">BodyWidth</label>
                  <div class="col-sm-10">
                    <input type="number" id="BodyWidth" class="form-control" name="BodyWidth" step="0.5">
                  </div>
                </div>
                <div class="row mb-3">
                <label class="col-sm-2 col-form-label">BodyHeight</label>
                  <div class="col-sm-10">
                    <input type="number" id="BodyHeight" class="form-control" name="BodyHeight" step="0.5">
                  </div>
                </div>
                <div class="row mb-3">
                <label class="col-sm-2 col-form-label">UnladenWeightDin</label>
                  <div class="col-sm-10">
                    <input type="number" id="UnladenWeightDin" class="form-control" name="UnladenWeightDin" step="0.5">
                  </div>
                </div>
                <div class="row mb-3">
                <label class="col-sm-2 col-form-label">UnladenWeightEU</label>
                  <div class="col-sm-10">
                    <input type="number" id="UnladenWeightEU" class="form-control" name="UnladenWeightEU" step="0.5">
                  </div>
                </div>
                <div class="row mb-3">
                <label class="col-sm-2 col-form-label">DragCoefficientCd</label>
                  <div class="col-sm-10">
                    <input type="number" id="DragCoefficientCd" class="form-control" name="DragCoefficientCd" step="0.5">
                  </div>
                </div>
                <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Overview</label>
                  <div class="col-sm-10">
                    <input type="text" id="Overview" class="form-control" name="Overview">
                  </div>
                </div>
                <div class="row mb-3">
                <label class="col-sm-2 col-form-label">TechSpecs</label>
                  <div class="col-sm-10">
                    <input type="text" id="TechSpecs" class="form-control" name="TechSpecs">
                  </div>
                </div>
                <div class="row mb-3">
                <label class="col-sm-2 col-form-label">TypeCar</label>
                  <div class="col-sm-10">
                    <input type="text" id="TypeCar" class="form-control" name="TypeCar">
                  </div>
                </div>
                <fieldset class="row mb-3">
                  
                </fieldset>

                

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Submit Button</label>
                  <div class="col-sm-10">
                    <button onclick=formcontrol() type="submit" class="btn btn-primary">Submit Form</button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

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