<?php
include '../classes/dbh.classes.php';
include '../classes/signup-contr.classes.php';
include '../classes/signup.classes.php';
if(isset($_POST['submit'])){

    $username = $_POST['username'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $type = $_POST['type'];
    $password = $_POST['password'];
    $password_repeat = $_POST['password-repeat'];

    $user = new SignupContr($username,$age,$type,$email,$password,$password_repeat);


    $user->SignUpUser();

    header("location:index.php");
    
}