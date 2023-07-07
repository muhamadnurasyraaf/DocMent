<?php
  include_once 'C:\laragon\www\docment\classes\appoinment.class.php';
  require_once 'C:\laragon\www\docment\classes\dbh.classes.php';
  session_start();
  $id = $_SESSION['id'];
  $pending = AppoinmentResult::displayPendingAppoinment($id);

  $incoming = AppoinmentResult::displayIncomingAppoinment($id);

  $currentdate = date("Y-m-d");
  AppoinmentResult::renewApp($currentdate);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Appointment Management</title>
  <link rel="shortcut icon" href="../icons/doctor.png" type="image/x-icon">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">DocMent</a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="../index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="doctordashboard.php">Dashboard</a>
      </li>
    </ul>
  </div>
</nav>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <div class="container mt-5">
    <h2>Pending Appointments</h2>
    <table class="table">
      <thead>
        <tr>
          <th>Appointment ID</th>
          <th>Patient Name</th>
          <th>Patient Email</th>
          <th>Appointment Date</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php if($pending !== false) : ?>
            <?php while($row = $pending->fetch()) : ?>
            <tr>
              <td><?=$row['id'];?> </td>
              <td><?= $row['fullname']; ?></td>
              <td><?= $row['email'];?></td>
              <td><?= $row['date'];?></td>
              <td>
                <form action="../includes/appoinment.inc.php" method="POST">
                  <input type="hidden" name="appointmentId" value="<?= $row['id'];?>">
                  <div class="form-group">
                    <select class="form-control" name="action">
                      <option value="approve">Approve</option>
                      <option value="cancel">Cancel</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" name="reason" placeholder="Cancellation Reason">
                  </div>
                  <input type="submit" class="btn btn-primary" name="submit">
                </form>
              </td>
            </tr>
            <?php endwhile;?>
        <?php else : ?>
          <tr>
            <td colspan="5">No Pending Booking Appoinment Request</td>
          </tr>
       <?php endif;?>
      </tbody>
    </table>

    <h2>Incoming Appointments</h2>
    <table class="table">
      <thead>
        <tr>
          <th>Appointment ID</th>
          <th>Patient Name</th>
          <th>Patient Email</th>
          <th>Appointment Date</th>
        </tr>
      </thead>
      <tbody>
        <?php if($incoming !== false) : ?>

          <?php while($row = $incoming->fetch()):?>
            <tr>
                <td><?= $row['id'];?></td>
              <td><?= $row['fullname']?></td>
              <td><?= $row['email']?></td>
              <td><?= $row['date']?></td>
            </tr
          <?php endwhile; ?>
         
        <?php else : ?>
          <tr>
            <td colspan="4">No More Incoming Appoinment Yet</td>
          </tr>
        <?php endif;?>
      </tbody>
    </table>
  </div>
</body>
</html>
