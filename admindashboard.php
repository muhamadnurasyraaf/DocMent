<?php
  include 'C:\laragon\www\DocMent\includes\retrieveUser.inc.php';
  include 'C:\laragon\www\DocMent\includes\datacount.inc.php';
  session_start();
  $id = $_SESSION['id'];
  $type = $_SESSION['type'];
  $userdata = getUserData($id,$type);
  if(!isset($_SESSION['adminlogin'])){
    header("location: index.html"); //tak test lagi
  }

  $patientCount = counter("patient");
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
            <li class="item">
              <a href="#" class="link flex">
                <i class="bx bx-grid-alt"></i>
                <span>All Projects</span>
              </a>
            </li>
          </ul>

          <ul class="menu_item">
            <div class="menu_title flex">
              <span class="title">Editor</span>
              <span class="line"></span>
            </div>
            <li class="item">
              <a href="#" class="link flex">
                <i class='bx bx-plus-medical' ></i>
                <span>Doctor Approval</span>
              </a>
            </li>
            <li class="item">
              <a href="#" class="link flex">
                <i class='bx bx-health' ></i>
                <span>Clinic Requests</span>
              </a>
            </li>
            <li class="item">
              <a href="#" class="link flex">
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
                <i class="bx bx-flag"></i>
                <span>Notifications</span>
              </a>
            </li>
            <li class="item">
              <a href="#" class="link flex">
                <i class='bx bx-user' ></i>
                <span>Search User</span>
              </a>
            </li>
            <li class="item">
              <a href="#" class="link flex">
                <i class="bx bx-cog"></i>
                <span>Settings</span>
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

    <p class="docReg">Doctor Registration Requests</p>
    <table class="docApp">
      <tr class="head">
        <th>ID</th>
        <th>Username</th>
        <th>Clinic/Hospital ID</th>
        <th>Action</th>
      </tr>
      <tr>
        <td>8</td>
        <td>Ahmad Kamal</td>
        <td>Klinik Kesihatan Endau</td>
        <td>
          <div class="action">
            <a href=""><i class='bx bx-check' ></i></a>
            <a href=""><i class='bx bx-x' ></i></a>
          </div>
        </td>
      </tr>
      <tr>
        <td>8</td>
        <td>Ahmad Kamal</td>
        <td>Klinik Kesihatan Endau</td>
        <td>
          <div class="action">
            <a href=""><i class='bx bx-check' ></i></a>
            <a href=""><i class='bx bx-x' ></i></a>
          </div>
        </td>
      </tr>
      <tr>
        <td>8</td>
        <td>Ahmad Kamal</td>
        <td>Klinik Kesihatan Endau</td>
        <td>
          <div class="action">
            <a href=""><i class='bx bx-check' ></i></a>
            <a href=""><i class='bx bx-x' ></i></a>
          </div>
        </td>
      </tr>
      <tr>
        <td>8</td>
        <td>Ahmad Kamal</td>
        <td>Klinik Kesihatan Endau</td>
        <td>
          <div class="action">
            <a href=""><i class='bx bx-check' ></i></a>
            <a href=""><i class='bx bx-x' ></i></a>
          </div>
        </td>
      </tr>
    </table>

    <p class="docReg">Clinic Approval Requests</p>
    <table class="docApp" id="clinicApp">
      <tr class="headClinc">
        <th>ID</th>
        <th>Owner</th>
        <th>Clinic Name</th>
        <th>Details</th>
      </tr>
      <tr>
        <td>8</td>
        <td>Ahmad Kamal</td>
        <td>Klinik Kesihatan Endau</td>
        <td>
          <div class="action">
            <a href=""><i class='bx bx-detail'></i></a>
          </div>
        </td>
      </tr>
      <tr>
        <td>8</td>
        <td>Ahmad Kamal</td>
        <td>Klinik Kesihatan Endau</td>
        <td>
          <div class="action">
            <a href=""><i class='bx bx-detail'></i></a>
          </div>
        </td>
      </tr>
      <tr>
        <td>8</td>
        <td>Ahmad Kamal</td>
        <td>Klinik Kesihatan Endau</td>
        <td>
          <div class="action">
            <a href=""><i class='bx bx-detail'></i></a>
          </div>
        </td>
      </tr>
      <tr>
        <td>8</td>
        <td>Ahmad Kamal</td>
        <td>Klinik Kesihatan Endau</td>
        <td>
          <div class="action">
            <a href=""><i class='bx bx-detail'></i></a>
          </div>
        </td>
      </tr>
    </table> <!--Clinics Request-->

    <p class="docReg">Insert New User</p>
    <div class="newUser">
      <form action="includes/signup.inc.php" method="post" id="newUser">
        <input type="text" name="username" placeholder="Username.." autocomplete="off">
        <input type="email" name="email" placeholder="Email.." autocomplete="off">
        <input type="text" name="password" placeholder="Password.." autocomplete="off">
        <input type="number" name="age" placeholder="Age" autocomplete="off">
        <div class="radio">
          <label for="pt"><input type="radio" name="type" value="Patient" id="pt"> Patient</label>
          <label for="dt"><input type="radio" name="type" value="Doctor" id="dt"> Doctor</label>
          <label for="ad"><input type="radio" name="type" value="Admin" id="ad"> Admin</label>
        </div>
        <input type="submit" value="Submit" class="submit-btn">
      </form>
    </div>
    
    
    <p class="docReg">Notifications</p>
    <div class="notifications">
      <div class="noti">
        <div class="n-type"><i class='bx bx-calendar-exclamation' ></i></div>
        <p>There's some doctor registration request that you didn't seen yet</p>
      </div>
      <div class="noti">
        <div class="n-type"><i class='bx bx-calendar-exclamation' ></i></div>
        <p>New Email Archived!</p>
      </div>
      <div class="noti">
        <div class="n-type"><i class='bx bx-calendar-exclamation' ></i></div>
        <p>You got some messages from users,Please do check your message inbox</p>
      </div>
      <div class="noti">
        <div class="n-type"><i class='bx bx-calendar-exclamation' ></i></div>
        <p>Some bug in this system still available </p>
      </div>
    </div>

    <p class="docReg">Search User</p>
    <form action="">
      <input type="text" name="username" placeholder="Username">
      <input type="submit" value="Search" class="search-btn">
    </form>
  </body>
</html>