<?php   
    require_once 'C:\laragon\www\DocMent\classes\dbh.classes.php';

    class Reg extends Dbh{
        private $username;
        private $email;
        private $password;
        private $age;
        private $type;

        public function __construct($username,$email,$password,$age,$type){
            $this->username = $username;
            $this->email = $email;
            $this->password = $password;
            $this->age = $age;
            $this->type = $type;
        }

        public function regUser(){
            if($this->type == "Admin"){
                $stmt = $this->connect()->prepare("INSERT INTO admin(username,email,password,age) VALUES(?,?,?,?);");
                $stmt->execute([$this->username,$this->email,$this->password,$this->age]);
                return true;
            }else if($this->type == "Patient"){
                $stmt = $this->connect()->prepare("INSERT INTO patient(username,email,password,age) VALUES(?,?,?,?);");
                $stmt->execute([$this->username,$this->email,$this->password,$this->age]);
                return true;
            }else if($this->type == "Doctor"){
                $stmt = $this->connect()->prepare("INSERT INTO doctor(username,email,password,age) VALUES(?,?,?,?);");
                $stmt->execute([$this->username,$this->email,$this->password,$this->age]);
                return true;
            }else{
                return false;
            }
           
        }
    }
