<?php
    include_once 'C:\laragon\www\DocMent\classes\dbh.classes.php';
    class Doctor extends Dbh{


        public static function getDoctors($clinic_id){
            $conn = new Dbh();
            $stmt = $conn->connect()->prepare("SELECT * FROM doctor where clinic_id = :id");
            $stmt->bindParam(':id',$clinic_id);
            $stmt->execute();
            return $stmt;
        }

        public static function closeConnection(){
            global $conn;
            $conn = null;
        }
    }