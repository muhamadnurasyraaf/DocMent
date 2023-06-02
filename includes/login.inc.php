<?php

include '../classes/login.classes.php';

$username = $_POST['username'];
$password = $_POST['password'];

$userlogin = new Login($username,$password);

$userlogin->acceptUser();