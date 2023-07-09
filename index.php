<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="icons/doctor.png" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <title>DocMent</title>
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
                <li><a href="dev.html">About</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="help.html">Services</a></li>
                <?php if(isset($_SESSION['login'])) : ?>
                    <li><a href="profile.php">Profile</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </header>
    <div class="landing">
        <div>
            <p class="title">Everyone Deserve to be Healthy</p>
            <p class="subtitle">Book your appoinments in a few clicks</p>
            <a href="login.php" class="btn ">Start Here</a>
            <p class="bot">&#128336; Only Take 2 Minutes</p>
        </div>
    </div>
    <div class="footer">
        <div class="parent">
            <div class="child">
                <ul>
                    <li><a href="register.php">Register</a></li>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="help.html">Help</a></li>
                </ul>
            </div>
            <div class="child">
                <ul>
                    <li><a href="login.php">Sign Up as a Clinic/Hospital</a></li>
                    <li><a href="contact.html">Contact</a></li>
                    <li><a href="dev.html">About Us(Developers)</a></li>
                </ul>
            </div>
        </div>
       
    </div>
    
    
</body>
</html>