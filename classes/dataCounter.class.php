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
       
        public static function countData($table, $clinicId) {
            $dbh = new Dbh();
            $stmt = $dbh->connect()->prepare("SELECT COUNT(*) AS total FROM $table WHERE clinicId = :clinicId;");
            $stmt->bindParam(":clinicId", $clinicId);
            $stmt->execute();
            $data = $stmt->fetch();
            return $data['total'];
        }
        

        
    }