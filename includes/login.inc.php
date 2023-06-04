<?php
    include '../classes/login.classes.php';


    $username = filter_var($_POST['username'],FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'],FILTER_SANITIZE_STRING);

    $userlogin = new Login($username,$password);

    $status = $userlogin->acceptUser();

    if(isset($status)){
        session_start();
        $user_id = $userlogin->getId();
        if($user_id !== false){
            $_SESSION['id'] = $user_id;
        }else{
            $_SESSION['id'] = "There's an error retrieving the user id";
        }
        header("location:../clinics.html");
    }

    
