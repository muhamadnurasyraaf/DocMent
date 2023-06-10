<?php
    require 'C:\laragon\www\DocMent\classes\login.classes.php';
    include 'C:\laragon\www\DocMent\classes\retrieveUser.class.php';
    session_start();

    function getUserData($id){
        $user = new User($id);
        $data = $user->getUser();
        if($data !== false){
            return $data;
        }else{
            return false;
        }
    }

   
