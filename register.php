<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/register.css">
    <link rel="shortcut icon" href="icons/doctor.png" type="image/x-icon">
    <title>Register</title>
</head>
<body>
    <?php if(isset($message)):?>
        <p style="text-align:center; color:red;"><?= $message;?></p>
    <?php endif;?>
   <form action="includes/signup.inc.php" method="post" class="container">
        <p>Sign Up</p>
        <input type="text" name="username" required autocomplete="off" placeholder="Username">
        <input type="email" name="email" required placeholder="Email" autocomplete="off">
        <input type="number" name="age" required placeholder="Age" autocomplete="off">
        <input type="password" name="password" required placeholder="Password">
        <input type="password" name="password-repeat" placeholder="Password Confirmation">
        <div class="radio-input">
            <label for="staff"><input type="radio" name="type" id="staff" value="Doctor">Doctor</label>
            <label for="patient"><input type="radio" name="type" id="patient" value="Patient">Patient</label>
        </div>
        <input type="submit" value="Sign Up" name="submit" class="submit-btn">
        <a href="index.html">&larr;Back to Home Page</a>
   </form>
</body>
</html>