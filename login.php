<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="shortcut icon" href="icons/doctor.png" type="image/x-icon">
    <title>Login</title>
</head>
<body>
   <form action="includes/login.inc.php" method="post" class="container">
        <p>Login</p>
        <div>
            <label for="pt"><input type="radio" name="user" id="pt" value="Patient">Patient</label>
             <label for="dt"><input type="radio" name="user" id="dt" value="Doctor">Doctor</label>
             <label for="ad"><input type="radio" name="user" id="ad" value="Admin">Admin</label>
        </div>
        <input type="text" name="username" required autocomplete="off" placeholder="Username">
        <input type="password" name="password" required placeholder="Password">
        <input type="submit" value="Login" name="submit" class="submit-btn">
        <a href="index.php">&larr;Back to Home Page</a>
   </form>
</body>
</html>