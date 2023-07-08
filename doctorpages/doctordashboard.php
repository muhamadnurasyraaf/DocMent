<?php
  include_once 'C:\laragon\www\DocMent\includes\retrieveUser.inc.php';
  include_once 'C:\laragon\www\DocMent\classes\clinic.class.php';
  session_start();
  $id = $_SESSION['id'];
  $data = getUserData($id,'Doctor');

  $isOwnClinic = Clinic::checkOwner($id);
  $clinicId = $data['clinic_id'];
  $work = Clinic::checkWorkingOn($clinicId);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="../icons/doctor.png" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Doctor's Dashboard</title>
</head>
<body>
    <nav class="navbar navbar-expand-md bg-primary">
        <div class="navbar-brand text-bg-primary ms-4">Doctor Dashboard</div>
        <div class="collapse navbar-collapse" id="navmenu">
           <ul class="navbar-nav ms-auto ">
                <li class="nav-item "><a href="../index.php" class="nav-link text-bg-primary">Home</a></li>
                <li class="nav-item "><a href="doctor_app.php" class="nav-link text-bg-primary">Appoinments</a></li>
                <li class="nav-item "><a href="dashboard.php" class="nav-link text-bg-primary">Head Doctor Dashboard</a></li>                                                                                                                                                                                                                                                                                                                                                                                                     
           </ul>
        </div>
    </nav>

    <div class="container">
        <div class="card mt-5">
          <div class="card-body">
            <h5 class="card-title">Doctor Profile</h5>
            <div class="form-group">
              <label for="doctor-id">ID:</label>
              <input type="text" class="form-control" id="doctor-id" value="<?= $data['user_id'];?>" readonly>
            </div>
            <div class="form-group">
              <label for="doctor-name">Name:</label>
              <input type="text" class="form-control" id="doctor-name" value="<?= $data['username']?>" readonly>
            </div>
            <div class="form-group">
              <label for="doctor-age">Age:</label>
              <input type="text" class="form-control" id="doctor-age" value="<?= $data['age']?>" readonly>
            </div>
            <div class="form-group">
              <label for="doctor-email">Email:</label>
              <input type="email" class="form-control" id="doctor-email" value="<?= $data['email'];?>" readonly>
            </div>
            <div class="form-group">
              <label for="clinic-id">Clinic ID:</label>
              <input type="email" class="form-control" id="clinic-id" value="<?= $data['clinic_id'];?>" readonly>
            </div>
          </div>
        </div>
      </div>
   <div class="container">
        <div class="row m-5">
            <div class="col-6 py-5 col-sm-4 m-5">
               <div class="top">
                    <p>20</p>
                    <i class='bx bx-male-female'></i>
               </div>
               <div class="bot">
                <strong>Registered Appoinments</strong>
               </div>
            </div>

            <div class="col-6 py-5 col-sm-4 m-5 bbg">
                <div class="top">
                     <p>20</p>
                     <i class='bx bx-male-female'></i>
                </div>
                <div class="bot">
                 <strong>Pending Appoinments</strong>
                </div>
         </div>
        </div>  
   </div>
   <hr>

   <div class="bottom">

        <div class="clinics">
            <div><p style="text-align: center;">Manage Your Clinics : </p></div>
              <?php if($isOwnClinic !== false):?>
                <div class="row">
                    <a href="#" class="name" style="text-decoration: none;">
                        <p style="font-weight: bold;"><?= $isOwnClinic['name'];?></p>
                        <p style="text-decoration: overline;">Owner</p>
                    </a>
                </div>
            <?php endif; ?>

            <?php if($work !== false && $id !== $clinicId) : ?>
              <div class="row">
                  <a href="#" class="name" style="text-decoration: none;">
                      <p style="font-weight: bold;">Klinik Syifa</p>
                      <p style="text-decoration: overline;">Worker</p>
                  </a>
              </div>
            <?php endif;?>
        </div>
   </div>

   <div style="display: flex; justify-content: center; margin-top: 2em;">
    <a href="registerClinic.php" style="text-align: center;">Register Your Clinic</a>
   </div>
  
   <style>
        .col-6{
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #0093E9;
            background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);
            color: #fafafa;
            border-radius: 2em;
        }
        .top{
            display: flex;
            gap: 1em;
            align-items: center;
            font-size: 2rem;
            text-align: center;
        }

        .bbg{
            background-color: #4158D0;
            background-image: linear-gradient(43deg, #4158D0 0%, #C850C0 46%, #FFCC70 100%);
        }
        .clinics{
            display: flex;
            margin: auto;
            max-width: fit-content;
            flex-direction: column;
        }
        .name{
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 2em 4em;
            box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;
            background-color: #85FFBD;
            background-image: linear-gradient(45deg, #85FFBD 0%, #FFFB7D 100%);
            color: white;
            border-radius: 2em;
        }
        .bottom{
            display: flex;
            flex-wrap: wrap;
        }
   </style>
</body>
</html>