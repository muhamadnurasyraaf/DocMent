<!DOCTYPE html>
<html>
<head>
  <title>Clinic Registration</title>
  <link rel="shortcut icon" href="icons/doctor.png" type="image/x-icon">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <div class="card mt-5">
      <div class="card-body">
        <h5 class="card-title">Clinic Registration</h5>
        <form action="../includes/clinicReg.inc.php" method="POST">
          <div class="form-group">
            <label for="clinic-name">Clinic Name:</label>
            <input type="text" class="form-control" id="clinic-name" name="clinic_name" required autocomplete="off">
          </div>
          <div class="form-group">
            <label for="state">State:</label>
            <select class="form-control" id="state" name="state" required>
              <option value="">Select State</option>
              <option value="Johor">Johor</option>
              <option value="Kedah">Kedah</option>
              <option value="Kelantan">Kelantan</option>
              <option value="Melaka">Melaka</option>
              <option value="Negeri Sembilan">Negeri Sembilan</option>
              <option value="Pahang">Pahang</option>
              <option value="Perak">Perak</option>
              <option value="Perlis">Perlis</option>
              <option value="Pulau Pinang">Pulau Pinang</option>
              <option value="Sabah">Sabah</option>
              <option value="Sarawak">Sarawak</option>
              <option value="Selangor">Selangor</option>
              <option value="Terengganu">Terengganu</option>
              <option value="Kuala Lumpur">Kuala Lumpur</option>
              <option value="Labuan">Labuan</option>
              <option value="Putrajaya">Putrajaya</option>
              <!-- Add more states here -->
            </select>
          </div>
          <div class="form-group">
            <label for="area">Area:</label>
            <input type="text" class="form-control" id="area" name="area" required autocomplete="off">
          </div>
          <div class="form-group">
            <label for="qualification-code">Qualification Code:</label>
            <input type="text" class="form-control" id="qualification-code" name="qualification_code" required autocomplete="off">
          </div>
          <input type="submit" name="submit" class="btn btn-primary">
        </form>
      </div>
    </div>
  </div>
</body>
</html>
