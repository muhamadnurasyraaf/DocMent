<?php
    include_once 'C:\laragon\www\DocMent\classes\dbh.classes.php';
    class DoctorList extends Dbh{
        

        public static function listDoctorReq(){
            $dbh = new Dbh();
            $stmt = $dbh->connect()->prepare("SELECT * FROM doctorTemp");
            $stmt->execute();
            if($stmt->rowCount() > 0)
            {  
                return $stmt;
            }else{
                return false;
            }
            
        }
    }