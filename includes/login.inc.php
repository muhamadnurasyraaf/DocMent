<?php
    require_once 'C:\laragon\www\DocMent\classes\login.classes.php';

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $type = $_POST['user'];

        $userlogin = new Login($username,$type,$password);

        $status = $userlogin->acceptUser();

        if($status){
            session_start();
            $user_id = $userlogin->getId();
            $_SESSION['type'] = $type;
            if($user_id !== false){
                if($userlogin->isAdmin()){
                    $_SESSION['id'] = $user_id;
                    $_SESSION['adminlogin'] = true;
                    $_SESSION['type'] = $type;
                    header("location:../admindashboard.php");
                }else if($type == "Doctor"){
                    $_SESSION['id'] = $user_id;
                    $_SESSION['logindoctor'] = true;
                    header("location:../doctorpages/doctordashboard.php");
                }else{
                    $_SESSION['id'] = $user_id;
                    $_SESSION['login'] = true;
                    header("location:../clinics.php");
                }
        }else{
            echo "Invalid User Credentials";
        }
    }
    

} 
