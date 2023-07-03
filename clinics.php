<?php
    include_once 'C:\laragon\www\DocMent\classes\clinic.class.php';
    $data = Clinic::displayClinics();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/clinics.css">
    <link rel="shortcut icon" href="/icons/doctor.png" type="image/x-icon">
    <title>Choose Your Clinic</title>
</head>
<body>
    <header>
        <div>
            <img src="icons/doctor.png" class="main-icon">
            <h1 class="header1">Doc<span>Ment</span></h1>
        </div>  
        <div class="nav">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="">About</a></li>
                <li><a href="">Contact</a></li>
                <li><a href="">Services</a></li>
            </ul>
        </div>
    </header>
   <section class="clinics">
    <?php if($data->rowCount() > 0) : ?>
        <?php while($row = $data->fetch()) :?>
        <div class="clinic-details">
            <img src="images/download.jpeg" class="clinic-img">
            <span>Klinik Kesihatan Endau</span>
            <a href="booking.php?id=<?= $row['id'];?>" class="book-link">Book Appoinment Now</a>
        </div>
        <?php endwhile;?>
    <?php endif; ?>
   </section>

  

</body>
</html>