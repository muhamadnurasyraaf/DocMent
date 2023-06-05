<?php

class Dbh{
    protected function connect(){
        try{
            $username = "root";
            $password = "1234";
            $stmt = new PDO('mysql:host=localhost;dbname=docment',$username,$password);
            $stmt->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
            return $stmt;

        }catch(PDOException $e){
            return 'Error ' . $e->getMessage();
        }
        
    }

}