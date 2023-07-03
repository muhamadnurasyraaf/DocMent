<?php
    require_once 'C:\laragon\www\DocMent\classes\dbh.classes.php';

    class Appoinment extends Dbh{

        private $patientName;
        private $patientEmail;
        private $patientId;
        private $clinicId;
        private $date;
        private $doctorId;

        public function __construct($patientName,$date,$patientId,$clinicId,$doctorId,$patientEmail){
            $this->patientName = $patientName;
            $this->patientId = $patientId;
            $this->clinicId = $clinicId;
            $this->date = $date;
            $this->doctorId = $doctorId;
            $this->patientEmail = $patientEmail;
        }

        public function request(){
            $stmt = $this->connect()->prepare("INSERT INTO bookingReq(fullname,date,patientId,clinicId,doctorId,email) 
            VALUES(:fname,:date,:pId,:cId,:dId,:email);");
            $stmt->bindParam(':fname',$this->patientName);
            $stmt->bindParam(':date',$this->date);
            $stmt->bindParam(':pId',$this->patientId);
            $stmt->bindParam(':cId',$this->clinicId);
            $stmt->bindParam(':dId',$this->doctorId);
            $stmt->bindParam(':email',$this->patientEmail);
            $stmt->execute();
            if($stmt){
                return true;
            }else{
                return false;
            }
        }

    }