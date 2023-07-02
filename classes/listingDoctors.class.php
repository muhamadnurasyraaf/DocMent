<?php
    include_once 'C:\laragon\www\DocMent\classes\dbh.classes.php';
    class DoctorList extends Dbh{
        private $clinicId;

        public function __construct($clinicId){
            $this->connect()->prepare("SELECT * FROM doctor WHERE clinic_id = ?");
        }
    }