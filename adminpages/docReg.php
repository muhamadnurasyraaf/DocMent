<?php
    include_once 'C:\laragon\www\docment\classes\dataCounter.class.php';
    include_once 'C:\laragon\www\docment\classes\listingDoctors.class.php';
    $doctor = DoctorList::listDoctorReq();
    if(isset($_GET['message'])){
      $message = $_GET['message'];
    }
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Doctor Registration</title>
  <link rel="shortcut icon" href="../icons/doctor.png" type="image/x-icon">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Doctor Registration</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../admindashboard.php">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
      </ul>
    </div>
  </nav>
    <?php if(isset($message)):?>
      <?php echo $message == 1 ? '<p style="text-align:center;color:green;">Succeed</p>': '<p style="text-align:center;color:red;">Failed</p>' ?>
    <?php endif; ?>
      <div class="container mt-5">
    <h2>Doctor Registration</h2>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Username</th>
          <th>Email</th>
          <th>Age</th>
          <th>Clinic ID</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php if($doctor !== false) : ?>
            <?php while ($row = $doctor->fetch()) : ?>
                <tr>
                <td><?= $row['id']?></td>
                <td><?= $row['username']?></td>
                <td><?= $row['email']?></td>
                <td><?= $row['age']?></td>
                <td><?= $row['clinic_id']?></td>
                <td>
                    <form action="../includes/approveDoc.inc.php" method="post">
                        <input type="submit" value="Approve" name="approve" class="btn btn-success btn-sm">
                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <input type="submit" value="Reject" name="reject" class="btn btn-danger btn-sm">
                    </form>
                </td>
                </tr>
            <?php endwhile;?>
        <?php endif;?>
      </tbody>
    </table>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
