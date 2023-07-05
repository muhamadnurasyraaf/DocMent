<?php 

    class ClinicRegister extends Dbh{

        private $doctor_id;
        private $clinicName;
        private $state;
        private $area;
        private $qualificationCode;

        public function __construct($doctor_id,$name,$state,$area,$q_code){
            $this->doctor_id = $doctor_id;
            $this->clinicName = $name;
            $this->state = $state;
            $this->area = $area;
            $this->qualificationCode = $q_code;
        }

        public function regClinic(){
            $stmt = $this->connect()->prepare("INSERT INTO clinicTemp(name,state,area,head_doctor_id,qualification_code)
             VALUES(:name,:state:area,:doctor_id,:q_code);");
            $stmt->bindParam(":name",$this->clinicName);
            $stmt->bindParam(":state",$this->state);
            $stmt->bindParam(":area",$this->area);
            $stmt->bindParam(":doctor_id",$this->doctor_id);
            $stmt->bindParam(":q_code",$this->qualificationCode);
            $stmt->execute();
            if($stmt){
                return true;
            }else{
                return false;
            }
        }
    }