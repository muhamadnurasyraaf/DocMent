<?php
    include_once '../classes/retrieveUser.class.php';
    $id = $_SESSION['id'];
    $userdata = new User($id);
    

   
