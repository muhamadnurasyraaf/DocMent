<?php
    require_once 'C:\laragon\www\docment\classes\appoinment.class.php';
    session_start();

    if(isset($_POST['submit'])){
        $appoinmentId = $_POST['appointmentId'];
        $action = $_POST['action'];
        $doctorid = $_SESSION['id'];
        if(isset($_POST['reason']) && $action !== 'approve'){
            $reason = $_POST['reason'];
        }else{
            $reason = "No valid reason";
        }
       $app = new AppoinmentResult($appoinmentId,$doctorid,$action,$reason);
       $result = $app->result();
       if($result){
            header("location: ../doctorpages/doctor_app.php");
       }else{
        echo 'Failed';
       }
    }
