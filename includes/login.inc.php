<?php
    require 'C:\laragon\www\DocMent\classes\login.classes.php';

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $type = $_POST['user'];

        $userlogin = new Login($username,$type,$password);

        $status = $userlogin->acceptUser();

        if($status){
            session_start();
            $user_id = $userlogin->getId();
            if($user_id !== false && $userlogin->isAdmin()){
                $_SESSION['id'] = $user_id;
                $_SESSION['adminlogin'] = true;
                $_SESSION['type'] = $type;
                header("location:../admindashboard.php");
            }else if($user_id !== false){
                $_SESSION['id'] = $user_id;
                header("location:../clinics.html");
            }
            else{
                header("location: ../index.html");
                $_SESSION['id'] = "There's an error retrieving the user id";
            }
        }else{
            echo "something wrong";
        }
    }
    

    
