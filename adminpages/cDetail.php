<?php
  include_once 'C:\laragon\www\docment\includes\clinic.inc.php';
  include_once 'C:\laragon\www\DocMent\includes\approve.inc.php';
  //to get data to display
  $id = isset($_GET['id']) ? $_GET['id'] : '';
  $isApproved = false;

  $data = getCData($id,$isApproved); 

  if(isset($_POST['approve'])){
    $result = getApproval($id,true,"clinic");
    
  }
  

 
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Clinic Request Detail</title>
    <link rel="shortcut icon" href="../icons/doctor.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container navbar-brand">
            Clinic Details
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navrow"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navrow">
            <ul class="navbar-nav ms-auto" >
                <li class="nav-item">
                    <a href="" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="clinicReg.php" class="nav-link">Requests</a>
                </li>
                <li class="nav-item">
                    <a href="../admindashboard.html" class="nav-link">Dashboard</a>
                </li>
            </ul>
        </div>
    </nav>
    <?php if(isset($result)) :?>
      <div class="alert alert-info">
        <strong>Info!</strong> <?= $result;?>
      </div>
    <?php endif; ?>
    <div class="container mt-4 p-5">
        <div class="row">
          <div class="col">
            <?php if($data !== false || empty($data)) : ?>
            <h3>Clinic Request Information</h3>
            <p><u>Registration ID </u>: <?= $data['id'];?></p>
            <p><u>Clinic Name </u>: <?= $data['name']; ?></p>
            <p><u>State </u>: <?= $data['state'];?></p>
            <p><u>Area </u>: <?= $data['area']; ?></p>
            <p><u>Head Doctor ID </u>: <?= $data['head_doctor_id'];?></p>
            <p><u>Qualification Code </u>:<?= is_null($data['qualification_code']) ? 'Null' : $data['qualification_code']; ?> </p>
            <form action="" method="post" class="d-flex justify-content-around">
              <input type="submit" value="Approve" name="approve" class="btn btn-primary">
              <input type="submit" value="Reject" name="reject" class="btn btn-secondary">
            </form>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <style>
         .container{
            box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
         }
      </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>