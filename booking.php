<?php 
    include 'includes/retrieveUser.inc.php';
    session_start();
    $id = $_SESSION['id'];
    $data = getData($id);

    if($data !== false){
        
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="icons/doctor.png" type="image/x-icon">
    <title>Booking Your Appoinment</title>
</head>
<body>
    
</body>
</html>