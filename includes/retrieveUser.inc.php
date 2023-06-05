<?php
    require_once '../classes/retrieveUser.class.php';
    session_start();

    function getData($id){
        $user = new User($id);
        $data = $user->getUser();
        if($data !== false){
            return $data;
        }else{
            return false;
        }
    }

   
