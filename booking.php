<?php 
    session_start();
    include 'includes/retrieveUser.inc.php';
    include 'C:\laragon\www\DocMent\classes\doctor.class.php';
    
    if(isset($_GET['id'])){
        if(isset($_SESSION['id'])){
            $id = $_SESSION['id'];
            $clinicid = $_GET['id'];
            $doctors = Doctor::getDoctors($clinicid);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/booking.css">
    <link rel="shortcut icon" href="icons/doctor.png" type="image/x-icon">
    <script src="js/booking.js"></script>
    <title>Book Your Appoinment</title>
</head>
<body>
    <nav> 
        <li><a href="index.php">Home</a></li>
        <li><a href="clinics.php">Clinics</a></li>
        <li><a href="">Services</a></li>
    </nav>
    <p style="margin-left: 4em;">Book Your Appoinment</p>
    
    <form action="includes/appoinmentReg.inc.php?clinicid=<?= $clinicid; ?>" method="post">
        <div class="doctor-group">
            <div><p>Available Doctors : </p></div>
            <div class="radio-group">
                <?php while($row = $doctors->fetch()) : ?>
                <label for=""><input type="radio" name="doctor" value="<?= $row['user_id'];?>"><?= $row['username'];?></label>
                <input type="hidden" name="doctor_name" value="<?= $row['username'];?>">
                <?php endwhile;?>
            </div>
        </div>          
         <input type="text" name="fullname" placeholder="Patient's Full Name" autocomplete="off">
         <input type="email" name="email" placeholder="Patient's Email" autocomplete="off">
         <input type="text" name="desc" placeholder="Tell More about your illness" autocomplete="off">
         <label for="date">Appoinment Date</label>
         <input type="date" name="date" id="date">
         <input type="submit" value="Book Now" name="submit" class="book-btn">
    </form>
</body>
</html>   