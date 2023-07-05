<?php
    require_once 'C:\laragon\www\DocMent\classes\clinicReg.class.php';
    if (isset($_POST['submit'])) {
        // Retrieve the form data
        session_start();
        $id = $_SESSION['id'];
        $clinicName = $_POST['clinic_name'];
        $state = $_POST['state'];
        $area = $_POST['area'];
        $qualificationCode = $_POST['qualification_code'];

        // Process the data or store it in the database, etc.
        // For demonstration purposes, we'll just display the data here.
       $reg = new ClinicRegister($id,$clinicName,$state,$area,$qualificationCode);
       $result = $reg->regClinic();
       if($result){

       }else{
        
       }
    }
?>
