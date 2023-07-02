<?php 
    require_once 'C:\laragon\www\DocMent\classes\adminReg.class.php';
        if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $age = $_POST['age'];
            $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
            $type = $_POST['type'];
            $newReg = new Reg($username,$email,$password,$age,$type);
            $result = $newReg->regUser();
            if($result){
                header("location: ../admindashboard.php?result=1");
            }else{
                header("location: ../admindashboard.php?result=0");
            }
        } 

       
   
    
