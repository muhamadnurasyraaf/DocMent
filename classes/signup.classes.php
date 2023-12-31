<?php
require_once 'dbh.classes.php';
class SignUp extends Dbh{
    private $username;
    private $email;
    private $age;
    private $type;
    private $password;
    private $password_repeat;

    public function __construct($username,$email,$age,$type,$password,$password_repeat){
        $this->username = $username;
        $this->email = $email;
        $this->age = $age;
        $this->type = $type;
        $this->password = $password;
        $this->password_repeat = $password_repeat;
    }

   private function validateNumber(){
        $age = $this->age;
        if(!ctype_digit($age) || $age <= 0){
            return false;
        }else{
            return true;
        }
   }

    public function signUpUser(){
        $message = null;
        $hashedpassword = password_hash($this->password,PASSWORD_DEFAULT);
        if(!$this->lengthCheck()){
            $message = "Username/Email too long";
        }
        else if(!$this->pwdMatch()){
            $message = "Password does not match";
        }else if($this->lengthCheck() && $this->pwdMatch() && $this->validateNumber()){
            if($this->type == "Patient"){
                $stmt = $this->connect()->prepare("INSERT INTO patient(username,email,password,age) VALUES(?,?,?,?);");
                $newstmt = $stmt->execute([$this->username,$this->email,$hashedpassword,$this->age]);
                if($newstmt){
                    $message = true;
                }else{
                    $message = false;
                } 
            }else if($this->type == "Doctor"){
                $stmt = $this->connect()->prepare("INSERT INTO doctorTemp(username,email,age,password) VALUES(?,?,?,?);");
                $newstmt = $stmt->execute([$this->username,$this->email,$this->age,$hashedpassword]);
                if($newstmt){
                    $message = true;
                }else{
                    $message = false;
                } 
            }
            
           
        }
        return $message;
    }

    private function lengthCheck(){
        $result = null;
        if(strlen($this->username) > 40){
            $result = false;
        }
        else if(strlen($this->email) > 100){
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }

    private function pwdMatch(){
        $result = null;
        $pass1 = $this->password;
        $pass2 = $this->password_repeat;
        if($pass1 == $pass2){
            $result = true;
        }else{
            $result = false;
        }
        return $result;
    }

}