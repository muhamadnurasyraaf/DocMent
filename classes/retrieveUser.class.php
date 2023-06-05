<?php
   include_once 'dbh.classes.php';
    class User extends Dbh{

        private $id;

        public function __construct($id){
            $this->id = $id;
        }
       public function getUser(){
        $stmt = $this->connect()->prepare("SELECT * FROM user WHERE user_id = ?;");
        $stmt->execute([$this->id]);
        if($stmt->rowCount() > 0){
            $data = $stmt->fetch();
            return $data;
        }else{
            return false;
        }
       }
    }