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
       
        public function result() {
            $stmt = $this->connect()->prepare("SELECT * FROM bookingReq WHERE doctorId = :id");
            $stmt->bindParam(":id", $this->doctorId);
            $stmt->execute();
        
            if ($data = $stmt->fetch()) {
                // Fetching
                $fname = $data['fullname'];
                $date = $data['date'];
                $patientId = $data['patientId'];
                $clinicId = $data['clinicId'];
                $doctorId = $this->doctorId;
                $email = $data['email'];
                $status = $this->action == 'approve' ? 'Approved' : 'Rejected';
                $appointmentId = $data['id'];
                $doc_name = $data['doctor_name'];
        
                // Insert into appointment table
                $insertStmt = $this->connect()->prepare("INSERT INTO appoinment (fullname, date, patientId, clinicId, doctorId, email, status,doctor_name) 
                    VALUES (:fname, :date, :patientId, :clinicId, :doctorId, :email,:status,:doc_name)");
        
                // Bind parameters
                $insertStmt->bindParam(":fname", $fname);
                $insertStmt->bindParam(":date", $date);
                $insertStmt->bindParam(":patientId", $patientId);
                $insertStmt->bindParam(":clinicId", $clinicId);
                $insertStmt->bindParam(":doctorId", $doctorId);
                $insertStmt->bindParam(":email", $email);
                $insertStmt->bindParam(":status", $status);
                $insertStmt->bindParam(":doc_name",$doc_name);
        
                // Execute insert statement
                $insertStmt->execute();
        
                // Check if insert was successful
                if ($insertStmt->rowCount() > 0) {
                    // Deleting from bookingReq table
                    $deleteStmt = $this->connect()->prepare("DELETE FROM bookingReq WHERE id = :id");
                    $deleteStmt->bindParam(":id", $appointmentId);
                    $deleteStmt->execute();
        
                    // Check if delete was successful
                    if ($deleteStmt->rowCount() > 0) {
                        return true;
                    } else {
                        return "Failed to delete booking request";
                    }
                } else {
                    return "Failed to insert appointment";
                }
            } else {
                return "No pending booking appointment request found";
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