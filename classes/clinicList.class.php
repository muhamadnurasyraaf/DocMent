<?php
    include_once 'C:\laragon\www\DocMent\classes\dbh.classes.php';
    class ClinicList extends Dbh{
        public function displayClinics(){
            $stmt = $this->connect()->prepare("SELECT * FROM clinicTemp;");
            $stmt->execute();
            return $stmt;
        }
    }