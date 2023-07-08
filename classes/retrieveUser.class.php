<?php
   include_once 'dbh.classes.php';
    class User extends Dbh{

        private $id;
        private $type;

        public function __construct($id,$type){
            $this->id = $id;
            $this->type = $type;
        }
       public function getUser(){
        if($this->type == "Admin"){
            $stmt = $this->connect()->prepare("SELECT * FROM admin WHERE user_id = ?;");
            $stmt->execute([$this->id]);
            if($stmt->rowCount() > 0){
                $data = $stmt->fetch();
                return $data;
            }else{
                return false;
            }
        }else if($this->type == "Patient"){
            $stmt = $this->connect()->prepare("SELECT * FROM patient WHERE user_id = ?;");
            $stmt->execute([$this->id]);
            if($stmt->rowCount() > 0){
                $data = $stmt->fetch();
                return $data;
            }else{
                return false;
            }
        }else{
            $stmt = $this->connect()->prepare("SELECT * FROM doctor WHERE user_id = ?;");
            $stmt->execute([$this->id]);
            if($stmt->rowCount() > 0){
                $data = $stmt->fetch();
                return $data;
            }else{
                return false;
            }
        }
        
       }
    }