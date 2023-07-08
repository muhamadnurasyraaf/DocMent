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

        public static function getDoctorReq($id){
            $conn = new Dbh();
            $stmt = $conn->connect()->prepare("SELECT * FROM doctorTemp where id = :id");
            $stmt->bindParam(':id',$clinic_id);
            $stmt->execute();
            $data = $stmt->fetch();
            return $data;
        }

        public static function setClinicId($doctorId,$clinic_id){
            $db = new Dbh();
            $stmt = $db->connect()->prepare("Update doctor set clinic_id = :id where user_id = :d_id;");
            $stmt->bindParam(":d_id",$doctorId);
            $stmt->bindParam(":id",$clinic_id);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        }

        public static function countIncoming($id){
            $db = new Dbh();
            $stmt = $db->connect()->prepare("SELECT COUNT(*) AS total FROM appoinment WHERE clinicId = :id AND status = 'Approved';");
            $stmt->bindParam(":id",$id);
            $stmt->execute();
            $data = $stmt->fetch();
            return $data['total'];
        }

        
    }
