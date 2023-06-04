<?php
include_once '../classes/signup.classes.php';
if(isset($_POST['submit'])){

    $username = filter_var($_POST['username'],FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
    $age = filter_var($_POST['age'],FILTER_SANITIZE_NUMBER_INT);
    $type = $_POST['type'];
    $password = htmlspecialchars($_POST['password']);
    $password_repeat = htmlspecialchars($_POST['password-repeat']);

    $user = new SignUp($username,$email,$age,$type,$password,$password_repeat);

    $message = $user->signUpUser();

    if($message){
        header("location:../index.html");
    }else{
        echo 'There was an error';
    }


    
}