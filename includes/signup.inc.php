<?php
include_once '../classes/signup.classes.php';
if(isset($_POST['submit'])){

    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $age = $_POST['age'];
    $type = $_POST['type'];
    $password = htmlspecialchars($_POST['password']);
    $password_repeat = htmlspecialchars($_POST['password-repeat']);

    $user = new SignUp($username,$email,$age,$type,$password,$password_repeat);

    $message = $user->signUpUser();

    if($message){
        header("location:../index.php");
    }else{
        header("location: ../register.php?message=1");
    }


    
}