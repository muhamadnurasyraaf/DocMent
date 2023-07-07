<?php 
    require_once 'dbh.classes.php';
    class AppoinmentResult extends Dbh{
        private $appoinmentId;
        private $doctorId;
        private $action;
        private $reason;

        public function __construct($appoinmentId,$doctorId,$action,$reason){
            $this->appoinmentId = $appoinmentId;
            $this->doctorId = $doctorId;
            $this->action = $action;
            $this->reason = $reason;
        }
       

        public function result(){
                $stmt = $this->connect()->prepare("SELECT * FROM bookingReq WHERE id = :id");
                $stmt->bindParam(":id",$this->doctorId);
                $stmt->execute();
                $data = $stmt->fetch();

                //fetching
                $fname = $data['fullname'];
                $date = $data['date'];
                $patientId = $data['patientId'];
                $clinicId = $data['clinicId'];
                $doctorId = $this->doctorId;
                $email = $data['email'];
                $status = $this->action == 'approve' ? 'Approved' : 'Rejected';
                $appoinmentId = $data['id'];
                //insert into appoinment table
                $stmt = $this->connect()->prepare("INSERT INTO appoinment(fullname,date,patientId,clinicId,doctorId,email,status) 
                VALUES(:fname,:date,:patientId,:clinicId,:doctorId,:email,:status);");

                //bind param
                $stmt->bindParam(":fname",$fname);
                $stmt->bindParam(":date",$date);
                $stmt->bindParam(":patientId",$patientId);
                $stmt->bindParam(":clinicId",$clinicId);
                $stmt->bindParam(":doctorId",$doctorId);
                $stmt->bindParam(":email",$email);
                $stmt->bindParam(":status",$status);
                //executing
                $stmt->execute();
               
                //deleting from bookingreq tables
                $deletestmt = $this->connect()->prepare("DELETE FROM bookingreq WHERE id  = :id");
                $deletestmt->bindParam(":id",$appoinmentId);
                $deletestmt->execute();
                if(!$stmt){
                    return false;
                }
                else if(!$deletestmt){
                    return false;
                }else{
                    return true;
                }
        }


        public static function displayPendingAppoinment($id){
            $conn = new Dbh();
            $stmt = $conn->connect()->prepare("SELECT * FROM bookingReq WHERE doctorId = :id");
            $stmt->bindParam(":id",$id);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                return $stmt;
            }else{
                return false;
            }
        }

        public static function renewApp($currentdate){
            $db = new Dbh();
            $stmt = $db->connect()->prepare("DELETE FROM appoinment WHERE date < :currentdate;");
            $stmt->bindParam(":currentdate",$currentdate);
            $stmt->execute();
        }

        
        public static function displayIncomingAppoinment($id){
            $conn = new Dbh();
            $stmt = $conn->connect()->prepare("SELECT * FROM appoinment WHERE doctorId = :id AND status = 'Approved';");
            $stmt->bindParam(":id",$id);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                return $stmt;
            }else{
                return false;
            }
        }

        public static function userPendingAppoinments($user_id){
            $conn = new Dbh();
            $stmt = $conn->connect()->prepare("SELECT * FROM bookingreq WHERE patientId = :id");
            $stmt->bindParam(":id",$user_id);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                return $stmt;
            }else{
                return false;
            }
        }
        public static function userApprovedAppoinments($user_id){
            $conn = new Dbh();
            $stmt = $conn->connect()->prepare("SELECT * FROM appoinment WHERE patientId = :id");
            $stmt->bindParam(":id",$user_id);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                return $stmt;
            }else{
                return false;
            }
        }

        
    }