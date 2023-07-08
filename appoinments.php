<?php
    include_once 'C:\laragon\www\docment\classes\appoinment.class.php';
    session_start();
    $id = $_SESSION['id'];
    $pendingAppointments = AppoinmentResult::userPendingAppoinments($id);
    $approvedAppointments = AppoinmentResult::userApprovedAppoinments($id);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Appointments</title>
  <link rel="shortcut icon" href="icons/doctor.png" type="image/x-icon">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
  <div class="container">
    <h1>User Appointments</h1>

    <h2>Pending Appointments</h2>
    <table class="table">
      <thead>
        <tr>
          <th>Full Name</th>
          <th>Date</th>
          <th>Doctor Name</th>
          <th>Appointment Status</th>
        </tr>
      </thead>
      <tbody>
        <!-- Iterate over pending appointments and generate rows -->
      <?php if($pendingAppointments !== false):?>
        <?php while($appointment = $pendingAppointments->fetch()): ?>
          <tr>
            <td><?php echo $appointment['fullname']; ?></td>
            <td><?php echo $appointment['date']; ?></td>
            <td><?php echo $appointment['doctor_name']; ?></td>
            <td><span class="badge bg-warning text-dark">Pending</span></td>
          </tr>
        <?php endwhile; ?>
      <?php endif; ?>
      </tbody>
    </table>

    <h2>Approved Appointments</h2>
    <table class="table">
      <thead>
        <tr>
          <th>Full Name</th>
          <th>Date</th>
          <th>Doctor Name</th>
          <th>Appointment Status</th>
        </tr>
      </thead>
      <tbody>
        <!-- Iterate over approved appointments and generate rows -->
      <?php if($approvedAppointments !== false) : ?>
        <?php while ($appointment = $approvedAppointments->fetch()): ?>
          <tr>
            <td><?php echo $appointment['fullname']; ?></td>
            <td><?php echo $appointment['date']; ?></td>
            <td><?php echo $appointment['doctor_name']; ?></td>
            <td><span class="badge bg-success">Approved</span></td>
          </tr>
        <?php endwhile; ?>
      <?php endif?>
      </tbody>
    </table>
  </div>
</body>

</html>
