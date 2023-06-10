<?php
require_once 'dbh.classes.php';
class Login extends Dbh{
    private $username;
    private $password;

    private $type;

    public function getId(){
        if($this->type == "Admin"){
            $stmt = $this->connect()->prepare("SELECT * from admin WHERE username = ?;");
            $stmt->execute([$this->username]);
            $data = $stmt->fetch();
        }else if($this->type == "Patient"){
            $stmt = $this->connect()->prepare("SELECT * from patient WHERE username = ?;");
            $stmt->execute([$this->username]);
            $data = $stmt->fetch();
        }else{
            $stmt = $this->connect()->prepare("SELECT * from doctor WHERE username = ?;");
            $stmt->execute([$this->username]);
            $data = $stmt->fetch();
        }
        
        if($stmt && !empty($data['user_id'])){
            return $data['user_id'];
        }else{
            return false;
        }
    }

    public function isAdmin(){
            if($this->availableUsername() && $this->type == "Admin"){
                return true;
            }else{
                return false;
            }
    }

    public function __construct($username,$type,$password){
        $this->username = $username;
        $this->type = $type;
        $this->password = $password;
        
    }

    private function availableUsername(){
        if($this->type == "Admin"){
            $stmt = $this->connect()->prepare("SELECT * from admin WHERE username = ?;");
            $stmt->execute([$this->username]);
            $status = false;
            if($stmt->rowCount() > 0){
                $status = true;
            }else{
                $status = false;
            }
        }else if($this->type == "Patient"){
            $stmt = $this->connect()->prepare("SELECT * from patient WHERE username = ?;");
            $stmt->execute([$this->username]);
            $status = false;
            if($stmt->rowCount() > 0){
                $status = true;
            }else{
                $status = false;
            }
        }else if($this->type == "Doctor"){
            $stmt = $this->connect()->prepare("SELECT * from patient WHERE username = ?;");
            $stmt->execute([$this->username]);
            $status = false;
            if($stmt->rowCount() > 0){
                $status = true;
            }else{
                $status = false;
            }
        }
        
        return $status;
    }
    private function verifyPass(){
        if($this->type == "Admin"){
            $stmt = $this->connect()->prepare("SELECT * from admin WHERE username = ?;");
            $stmt->execute([$this->username]);
            $data = $stmt->fetch();
            $storedpassword = $data['password'];
        }else if($this->type == "Patient"){
            $stmt = $this->connect()->prepare("SELECT * from patient WHERE username = ?;");
            $stmt->execute([$this->username]);
            $data = $stmt->fetch();
            $storedpassword = $data['password'];
        }else{
            $stmt = $this->connect()->prepare("SELECT * from doctor WHERE username = ?;");
            $stmt->execute([$this->username]);
            $data = $stmt->fetch();
            $storedpassword = $data['password'];
        }
        
       
        if(password_verify($this->password,$storedpassword)){
            return true;
        }else{
            return false;
        }
        
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