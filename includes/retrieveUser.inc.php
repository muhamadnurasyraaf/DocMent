<?php
    require 'C:\laragon\www\DocMent\classes\login.classes.php';
    include 'C:\laragon\www\DocMent\classes\retrieveUser.class.php';
    

    function getUserData($id,$type){
        $user = new User($id,$type);
        $data = $user->getUser();
        if($data !== false){
            return $data;
        }else{
            return false;
        }
    }

   
