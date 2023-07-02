<?php 
    require_once 'C:\laragon\www\DocMent\classes\dbh.classes.php';
    class Count extends Dbh{
        private $type;

        public function __construct($type){
            $this->type = $type;
        }

        public function countUser(){
            $stmt = $this->connect()->prepare("SELECT COUNT(*) as total FROM " . $this->type);
            $stmt->execute();
            $data = $stmt->fetch();
            return $data['total'];
        }
    }