<?php
    include_once 'C:\laragon\www\DocMent\classes\dbh.classes.php';
    class Clinic extends Dbh{
        private $id;
        private $isApproved;


        public function __construct($id,$isApproved){
            $this->id = $id;
            $this->isApproved = $isApproved;
        }

        public function getClinic(){
            if(!$this->isApproved || is_null($this->isApproved)){
                $stmt = $this->connect()->prepare("SELECT * FROM clinicTemp WHERE id = :id;");
                $stmt->bindParam(':id',$this->id);
                $stmt->execute();
                return $stmt->fetch();
            }else{
                return false;
            }
          
        }

        public static function displayClinics(){
            $dbh = new Dbh();
            $stmt = $dbh->connect()->prepare("SELECT * FROM clinic");
            $stmt->execute();
            return $stmt;
        }
    }