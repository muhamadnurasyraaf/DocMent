<?php
    include_once 'C:\laragon\www\DocMent\includes\clinicList.inc.php';
    $data = displayClinicData();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/clinicReg.css">
    <link rel="shortcut icon" href="../icons/doctor.png" type="image/x-icon">
    <title>Clinic Approval</title>
</head>
<body>
    <header>
        <div>
            <img src="../icons/doctor.png" class="main-icon">
            <h1 class="header1">Doc<span>Ment</span></h1>
        </div>
        <div class="nav">
            <ul>
                <li><a href="">Home</a></li>
                <li><a href="">About</a></li>
                <li><a href="">Contact</a></li>
                <li><a href="">Services</a></li>
            </ul>
        </div>
    </header>
    
    <section>
        <?php while($row = $data->fetch()) : ?>
            <div class="clinic">
                <div class="id">
                    Registration ID : <?= $row['id'];?>
                </div>
                <div class="info">
                    <p><b>Clinic Name </b> : <?= $row['name'];?></p>
                    <p><b>Owner </b>: <?= $row['head_doctor_id'];?></p>
                    <a href="cDetail.php?id=<?=$row['id'];?>">See more details &rarr;</a>
                </div>
            </div>
        <?php endwhile;?>
    </section>
</body>
</html>