<?php

class Login extends Dbh{
    private $username;
    private $password;

    public function __construct($username,$password){
        $this->username = $username;
        $this->password = $password;
    }

    private function availableUsername(){
        $stmt = $this->connect()->prepare("SELECT * from user WHERE username = ?;");
        $stmt->execute([$this->username]);
        $status = false;
        if($stmt->rowCount() > 0){
            $status = true;
        }else{
            $status = false;
        }
        return $status;
    }
    private function verifyPass(){
        $stmt = $this->connect()->prepare("SELECT password from user WHERE username = ?;");
        $stmt->execute([$this->username]);
        $data = $stmt->fetchAll();
        $storedpassword = $data['password'];
        $check = false;
        if(password_verify($this->password,$storedpassword)){
            $check = true;
        }else{
            $check = false;
        }

        return $check;
    }

    public function acceptUser(){
        if($this->availableUsername()){
            if($this->verifyPass()){
                //return id kottttt
            }else{
                //incorrect password
            }
        }else{
            //username not available error;
        }
    }
}