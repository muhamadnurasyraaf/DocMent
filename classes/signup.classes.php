<?php
require 'dbh.classes.php';
class SignUp extends Dbh{

    protected function checkUser($username,$email){
        $checkBool =  false;
        $stmt = $this->connect()->prepare("SELECT * FROM user WHERE username = ? OR email = ?;");
        $stmt->execute([$username,$email]);
        if($stmt->rowCount() > 0){
            $checkBool = false;
        }else{
            $checkBool =  true;
        }
        return $checkBool;
    }

    protected function setUser($username,$age,$type,$email,$password){
        $hashedpassword = password_hash($password,PASSWORD_DEFAULT);
        $stmt = $this->connect()->prepare("INSERT INTO user(username,email,password,type,age) VALUES(?,?,?,?,?);");
        $stmt->execute([$username,$email,$hashedpassword,$type,$age]);
    }
}