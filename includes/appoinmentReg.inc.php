<?php 
    require_once 'C:\laragon\www\DocMent\classes\appoinmentReg.class.php';
    session_start();
    if(isset($_POST['submit'])){
        $userid = $_SESSION['id'];
        $clinicid = $_GET['clinicid'];
        $name = $_POST['fullname'];
        $email = $_POST['email'];
        $desc = $_POST['email'];
        $date = $_POST['date'];

        $app = new Appoinment($name,$email,$userid,$clinicid,$date);

        echo $date;
    }
