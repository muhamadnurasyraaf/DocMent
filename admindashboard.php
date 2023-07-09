<?php
  include 'C:\laragon\www\DocMent\includes\retrieveUser.inc.php';
  include 'C:\laragon\www\DocMent\includes\datacount.inc.php';
  include 'C:\laragon\www\DocMent\includes\adminReg.inc.php';
  session_start();
  $id = $_SESSION['id'];
  $type = $_SESSION['type'];
  $userdata = getUserData($id,$type);
  if(!isset($_SESSION['adminlogin'])){
    header("location: index.php"); //tak test lagi
  }

  $patientCount = counter("patient");

  if(isset($_GET['result'])){
    $result = $_GET['result'];
  }
  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/admindashboard.css" />
    <link rel="shortcut icon" href="icons/doctor.png" type="image/x-icon">
    <!-- Boxicons CSS -->
    <link flex href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <script src="js/admin.js" defer></script>
  </head>
  <body>
    <nav class="sidebar locked">
      <div class="logo_items flex">
        <span class="nav_image">
          <img src="icons/doctor.png" alt="logo_img" />
        </span>
        <span class="logo_name">DocMent</span>
        <i class="bx bx-lock-alt" id="lock-icon" title="Unlock Sidebar"></i>
        <i class="bx bx-x" id="sidebar-close"></i>
      </div>

      <div class="menu_container">
        <div class="menu_items">
          <ul class="menu_item">
            <div class="menu_title flex">
              <span class="title">Dashboard</span>
              <span class="line"></span>
            </div>
            <li class="item">
              <a href="#top" class="link flex">
                <i class="bx bx-home-alt"></i>
                <span>Dashboard</span>
              </a>
            </li>
          </ul>

          <ul class="menu_item">
            <div class="menu_title flex">
              <span class="title">Editor</span>
              <span class="line"></span>
            </div>
            <li class="item">
              <a href="adminpages/docReg.php" class="link flex">
                <i class='bx bx-plus-medical' ></i>
                <span>Doctor Approval</span>
              </a>
            </li>
            <li class="item">
              <a href="adminpages/clinicReg.php" class="link flex">
                <i class='bx bx-health' ></i>
                <span>Clinic Requests</span>
              </a>
            </li>
            <li class="item">
              <a href="#newUser" class="link flex">
                <i class="bx bx-cloud-upload"></i>
                <span>Insert New User</span>
              </a>
            </li>
          </ul>

          <ul class="menu_item">
            <div class="menu_title flex">
              <span class="title">Settings</span>
              <span class="line"></span>
            </div>
            <li class="item">
              <a href="#" class="link flex">
                <i class='bx bx-user' ></i>
                <span>Search User</span>
              </a>
            </li>
            <li class="item">
              <a href="#" class="link flex">
                <i class="bx bx-cog"></i>
                <span>Account Settings</span>
              </a>
            </li>
          </ul>
        </div>

        <div class="sidebar_profile flex">
          <span class="nav_image">
            <img src="userspfp/<?= $userdata['image']; ?>" alt="logo_img" />
          </span>
          <div class="data_text">
            <span class="name"><?= $userdata['username']; ?></span>
            <span class="email"><?= $userdata['email']; ?></span>
          </div>
        </div>
      </div>
    </nav>
    <div class="content top" id="top">
        <p>Dashboard</p>
    </div>

    <?php if(isset($result) && $result == 1) :?>
        <p style="text-align:center; color: green;">Successfully Registered</p>
      <?php elseif(isset($result) && $result == 0) : ?>
        <p style="text-align:center; color: red;">Failed to Register</p>
      <?php endif;?>

    <div id="stats">
      <div class="p-stats patient">
        <div class="types">
          <p class="count"><?= $patientCount; ?></p>
          <i class='bx bx-male-female'></i>
        </div>
        <div>
          Patients Registered
        </div>
      </div>
      <div class="p-stats clinic">
        <div class="types">
          <p class="count">20</p>
          <i class='bx bx-male-female'></i>
        </div>
        <div>
          Clinics/Hospital Registered
        </div>
      </div>
      <div class="p-stats doctor">
        <div class="types">
          <p class="count">150</p>
          <i class='bx bx-male-female'></i>
        </div>
        <div>
          Doctors Registered
        </div>
      </div>
    </div>

  </body>
</html>