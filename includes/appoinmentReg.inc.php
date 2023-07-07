<?php 
    require_once 'C:\laragon\www\DocMent\classes\appoinmentReg.class.php';

        session_start();
        if(isset($_POST['submit'])){
            $userid = $_SESSION['id'];
            $clinicid = $_GET['clinicid'];
            $name = $_POST['fullname'];
            $email = $_POST['email'];
            $desc = $_POST['desc'];
            $date = $_POST['date'];
            $doctorId = $_POST['doctor'];
            $doctor_name = $_POST['doctor_name'];
            $app = new Appoinment($name,$date,$userid,$clinicid,$doctorId,$email,$desc,$doctor_name);
            $result = $app->request();
            if($result){
                $message = "Successfully Send Appoinment Request";
                $color = 'green';
            }else{
                $message = "Failed to Send Appoinment Request";
                $color = 'red';
            }
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../icons/doctor.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <title>Result</title>
</head>
<body>
    <p style="text-align:center; color: <?=$color;?>; font-size:2rem; font-family:'Poppins',sans-serif;"><?= $message;?></p>
    <a style="text-align:center;" href="../index.php">&larr;Back to home page</a>
</body>
</html>
    
    
