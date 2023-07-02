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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <title>Clinic Approval</title>
</head>
<body>
    <header>
        <div class="first-header">
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
        <?php if($data->rowCount() > 0) :?>
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
        <?php else : ?>
            <div class="alert alert-warning">
                <strong>Warning !</strong> No Data Found (Row Count Query : 0);
            </div>
        <?php endif; ?>
    </section>
</body>
</html>