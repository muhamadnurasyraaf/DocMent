<?php
  include_once 'C:\laragon\www\DocMent\includes\retrieveUser.inc.php';
  include_once 'C:\laragon\www\DocMent\classes\clinic.class.php';
  include_once 'C:\laragon\www\docment\classes\dataCounter.class.php';
  include_once 'C:\laragon\www\docment\classes\doctor.class.php';

  session_start();
  $id = $_SESSION['id'];
  $data = getUserData($id, 'Doctor');

  $isOwnClinic = Clinic::checkOwner($id);
  $clinicId = $data['clinic_id'];
  $work = Clinic::checkWorkingOn($clinicId);

  $incoming = Doctor::countIncoming($clinicId);

  $b_req = Count::countData("bookingReq",$clinicId);
  $app = Count::countData("appoinment",$clinicId);
  $total = $b_req + $app;


  if(isset($_POST['assign'])){
    $doctorId = $_POST['doctorId'];
    $assigndoctor = Doctor::setClinicId($doctorId,$clinicId);
    if($assigndoctor){
        header("location: dashboard.php?result=1");
    }else{
        header("location: dashboard.php?result=0");
    }
  }

  if(isset($_GET['result'])){
    $result = $_GET['result'];
  }

  if(isset($_GET['message'])){
    $msg = $_GET['message'];
    if($msg == 1){
        echo 'Success';
    }else{
        echo 'Failed';
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="shortcut icon" href="../icons/doctor.png" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Doctor's Dashboard</title>
</head>
<body>
    <nav class="navbar navbar-expand-md bg-primary">
        <div class="navbar-brand text-white ms-4">Doctor Dashboard</div>
        <div class="collapse navbar-collapse" id="navmenu">
           <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a href="../index.php" class="nav-link text-white">Home</a></li>
                <li class="nav-item"><a href="dashboard.php" class="nav-link text-white">Head Doctor Dashboard</a></li>                                                                                                                                                                                                                                                                                                                                                                                                     
           </ul>
        </div>
    </nav>

    <!--display messsage-->
    <?php
    if(isset($result)){
        if($result == 1){
            echo "<p style='text-align:center;color:green;'>Succeed Assigning Clinic Id</p>";
        }else{
            echo "<p style='text-align:center;color:red;'>Failed to Assign Clinic Id</p>";
        }
    }

    ?>


    <div class="container mt-5">
        <div class="card">
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

    <div class="container mt-5">
        <div class="row">
            <div class="col-6 py-5 col-sm-4 m-5 bg-primary text-white rounded">
                <div class="text-center">
                    <p class="display-4"><?= $total?></p>
                    <i class='bx bx-male-female' style="font-size: 4rem;"></i>
                    <p class="lead">Registered Appointments</p>
                </div>
            </div>
            <div class="col-6 py-5 col-sm-4 m-5 bg-secondary text-white rounded">
                <div class="text-center">
                    <p class="display-4"><?=$incoming;?></p>
                    <i class='bx bx-male-female' style="font-size: 4rem;"></i>
                    <p class="lead">Incoming Appointments</p>
                </div>
            </div>
        </div>
    </div>

    <hr>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h4 class="text-center">Assign Clinic ID On A New Doctor:</h4>
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" class="mt-3">
                    <div class="mb-3">
                        <label for="clinic-id-input" class="form-label">Clinic ID:</label>
                        <input type="text" class="form-control" id="clinic-id-input" name="doctorId" placeholder="Enter Doctor's Id" required>
                    </div>
                    <div class="text-center">
                        <input type="submit" class="btn btn-primary" value="Assign" name="assign">
                    </div>
                </form>
            </div>
        </div>
    </div>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
