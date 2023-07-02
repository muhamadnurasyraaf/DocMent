<?php
    require_once 'C:\laragon\www\DocMent\classes\dbh.classes.php';
    class Approval extends Dbh{
        private $id;
        private $reply;
        private $type;

        public function __construct($id,$reply,$type){
            $this->id = $id;
            $this->reply = $reply;
            $this->type = $type;
        }

        public function Result(){
            if($this->type == "clinic"){
                $stmt = $this->connect()->prepare("SELECT * FROM clinicTemp WHERE id = :id");
                $stmt->bindParam(":id",$this->id);
                $stmt->execute();
                if($stmt->rowCount() > 0){
                    $data = $stmt->fetch();

                    $name = $data['name'];
                    $state = $data['state'];
                    $area = $data['area'];
                    $d_id = $data['head_doctor_id'];
                    $q_code = is_null($data['qualification_code'] ? 'null' : $data['qualification_code']); 

                    $q = $this->connect()->prepare("INSERT INTO clinic(name,state,area,head_doctor_id,qualification_code) VALUES(:name,:state,:area,:did,:qcode)");
                    $q->bindParam(":name",$name);
                    $q->bindParam(":state",$state);
                    $q->bindParam(":area",$area);
                    $q->bindParam(":did",$d_id);
                    $q->bindParam(":qcode",$q_code);

                    $q->execute();

                    $qry = $this->connect()->prepare("DELETE FROM clinicTemp WHERE id = :id;");
                    $qry->bindParam(":id",$this->id);
                    $qry->execute();
                   

                   if(!$q){
                    //error inserting
                    return "Error : inserting data";
                   }else if(!$qry){
                    //error deleting 
                    return "Error : deleting data";
                   }else{
                    $message = "Successfully Approved Clinic Registration";
                    return $message;
                   }
                }else{
                    return "Error : Data not found";
                }
            }else{
                return "Error : Type is undefined";
            }
            
        }

    }   