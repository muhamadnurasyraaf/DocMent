<?php

class Dbh{
    protected function connect(){
        try{
            $username = "root";
            $password = "1234";
            $dbh = new PDO('mysql:host=localhost;dbname=docment',$username,$password);
            $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
            return $dbh;

        }catch(PDOException $e){
            echo 'Error ' . $e->getMessage();
        }
        
    }

}