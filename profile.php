<?php 
    include 'C:\laragon\www\DocMent\includes\retrieveUser.inc.php';
    session_start();
    if(isset($_SESSION['login']) && $_SESSION['login'] == true){
        $id = $_SESSION['id'];
        $user = getUserData($id,'Patient');
    }else{
        header("location: login.php");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="icons/doctor.png" type="image/x-icon">
    <link rel="stylesheet" href="css/profile.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <title>Profile</title>
</head>
<body>
    <nav>
        <li><a href="index.php">Home</a></li>
        <li><a href="">Appoinments</a></li>
        <li><a href="clinics.php">Clinics</a></li>
    </nav>

    <p style="text-align: center; font-size: 1.5rem">Your Profile</p>
    <div class="details">
        <p><span>User ID</span> : <?= $user['user_id'];?></p>
        <p><span>Username</span> : <?= $user['username'];?></p>
        <p><span>Email</span> : <?= $user['email'];?></p>
        <p><span>Age</span> : <?= $user['age'];?></p>
    </div>
</body>
</html>