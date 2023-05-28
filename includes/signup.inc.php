<?php
include_once '../classes/signup.classes.php';
if(isset($_POST['submit'])){

    $username = $_POST['username'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $type = $_POST['type'];
    $password = $_POST['password'];
    $password_repeat = $_POST['password-repeat'];

    $user = new SignUp($username,$email,$age,$type,$password,$password_repeat);

    $message = $user->signUpUser();

    if($message){
        echo $message;
    }else if(!$message){
        header("location:../index.html");
    }


    
}