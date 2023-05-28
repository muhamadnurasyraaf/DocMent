<?php
require 'dbh.classes.php';
class SignUp extends Dbh{

    protected function checkUser($username,$email){
        $message = null;
        $stmt = $this->connect()->prepare("SELECT * FROM user WHERE username = ? OR email = ?;");


        if(!$stmt->execute([$username,$email])){
           $message = "There is something wrong;Error Code : ". $stmt->errorCode();
        }
        if($stmt->rowCount() > 0){
            $message = "Username or Email Already in use Error Code:VAL 5";
        }
    }
}