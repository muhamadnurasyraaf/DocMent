<?php
    require_once 'C:\laragon\www\DocMent\classes\dbh.classes.php';

    class Appoinment extends Dbh{

        private $patientName;
        private $patientEmail;
        private $patientId;
        private $clinicId;
        private $date;
        private $doctorId;

        public function __construct($patientName,$patientEmail,$patientId,$clinicId,$date){
            $this->patientName = $patientName;
            $this->patientId = $patientId;
            $this->clinicId = $clinicId;
            $this->date = $date;
        }

    }