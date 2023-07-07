<?php
    require_once 'C:\laragon\www\DocMent\classes\dbh.classes.php';

    class Appoinment extends Dbh{

        private $patientName;
        private $patientEmail;
        private $patientId;
        private $clinicId;
        private $date;
        private $doctorId;
        private $doctor_name;
        private $desc;

        public function __construct($patientName,$date,$patientId,$clinicId,$doctorId,$patientEmail,$desc,$d_name){
            $this->patientName = $patientName;
            $this->patientId = $patientId;
            $this->clinicId = $clinicId;
            $this->date = $date;
            $this->doctorId = $doctorId;
            $this->patientEmail = $patientEmail;
            $this->desc = $desc;
            $this->doctor_name = $d_name;
        }

        public function request(){
            $stmt = $this->connect()->prepare("INSERT INTO bookingReq(fullname,date,patientId,clinicId,doctorId,email,description,doctor_name) 
            VALUES(:fname,:date,:pId,:cId,:dId,:email,:desc,:d_name);");
            $stmt->bindParam(':fname',$this->patientName);
            $stmt->bindParam(':date',$this->date);
            $stmt->bindParam(':pId',$this->patientId);
            $stmt->bindParam(':cId',$this->clinicId);
            $stmt->bindParam(':dId',$this->doctorId);
            $stmt->bindParam(':email',$this->patientEmail);
            $stmt->bindParam(':desc',$this->desc);
            $stmt->bindParam(':d_name',$this->doctor_name);
            $stmt->execute();
            if($stmt){
                return true;
            }else{
                return false;
            }
        }

    }