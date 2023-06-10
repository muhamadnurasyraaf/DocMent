<?php
require_once 'dbh.classes.php';
class Login extends Dbh{
    private $username;
    private $password;

    public function getId(){
        $stmt = $this->connect()->prepare("SELECT * from user WHERE username = ?;");
        $stmt->execute([$this->username]);
        $data = $stmt->fetch();
        if($stmt && !empty($data['user_id'])){
            return $data['user_id'];
        }else{
            return false;
        }
    }

    public function isAdmin(){
            $stmt = $this->connect()->prepare("SELECT * from user WHERE username = ?;");
            $stmt->execute([$this->username]);
            $data = $stmt->fetch();
            if($data['type'] == "Admin"){
                return true;
            }else{
                return false;
            }
    }

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
        $stmt = $this->connect()->prepare("SELECT * from user WHERE username = ?;");
        $stmt->execute([$this->username]);
        $data = $stmt->fetch();
        $storedpassword = $data['password'];
       
        if(password_verify($this->password,$storedpassword)){
            return true;
        }
        return false;
    }

    public function acceptUser(){
        $status = null;
        if($this->availableUsername()){
            if($this->verifyPass()){
                $status = true;
            }else{
               $status = false;
            }
        }else{
            $status = false;
        }
        if(is_null($status)){
            return "Null";
        }else{
            return $status;
        }
        
    }
}