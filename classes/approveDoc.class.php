<?php 
    require_once 'dbh.classes.php';
    class ApproveDoc extends Dbh{

        private $id;
        private $isApproved;

        public function __construct($id,$isApproved){
            $this->id = $id;
            $this->isApproved = $isApproved;
        }

        public function result(){
            $stmt = $this->connect()->prepare("SELECT * FROM doctorTemp WHERE id = :id");
            $stmt->bindParam(":id",$this->id);
            $stmt->execute();
            $doc = $stmt->fetch();
            if($this->isApproved){
                $username = $doc['username'];
                $email = $doc['email'];
                $age = $doc['age'];
                $password = $doc['password'];
                $c_id = $doc['clinic_id'];
                
                $anotherstmt = $this->connect()->prepare("INSERT INTO doctor(username,email,age,password,clinic_id) 
                VALUES(:username,:email,:age,:password,:c_id);");

                $anotherstmt->bindParam(":username",$username);
                $anotherstmt->bindParam(":email",$email);
                $anotherstmt->bindParam(":age",$age);
                $anotherstmt->bindParam(":password",$password);
                $anotherstmt->bindParam(":c_id",$c_id);

                $anotherstmt->execute();
            }
            $deleteid = $doc['id'];
            $deletestmt = $this->connect()->prepare("DELETE FROM doctorTemp WHERE id = :id");
            $deletestmt->bindParam(":id",$deleteid);
            $deletestmt->execute();

            if($anotherstmt->rowCount() > 0 && $deletestmt->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        }
    }