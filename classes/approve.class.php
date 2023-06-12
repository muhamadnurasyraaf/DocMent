<?php
    
    class Approval extends Dbh{
        private $id;
        private $reply;
        private $type;

        public function __construct($id,$reply,$type){
            $this->id = $id;
            $this->reply = $reply;
            $this->type = $type;
        }

        private function availability(){
            $stmt = $this->connect()->prepare("SELECT * FROM " . $this->type . "WHERE id = ?");
            $stmt->execute([$this->id]);
            if($stmt->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        }
        private function accept(){
            if($this->reply == true){
                return true;
            }else{
                return false;
            }
        }

        public function result(){
            if($this->availability()){
                if($this->accept()){
                    $stmt = $this->connect()->prepare("SELECT * FROM " . $this->type . "WHERE id = ?");
                    $stmt->execute([$this->id]);
                    $data = $stmt->fetch();
                    if(strcasecmp($this->type,"doctor")){
                        $username = $data['username'];
                        $email = $data['email'];
                        $age = $data['age'];
                        $password = $data['password'];
                        
                        $insert = $this->connect()->prepare("INSERT INTO doctor(username,email,age,password) VALUES(?,?,?,?);");
                        $insert->execute([$username,$email,$age,$password]);
                    }else if(strcasecmp($this->type,"clinic")){
                        $name = $data['name'];
                        $state = $data['state'];
                        $area = $data['area'];
                        $headDoctor = $data['head_doctor_id'];

                        $query = $this->connect()->prepare("INSERT INTO clinic(name,state,area,head_doctor_id) VALUES(?,?,?,?);");
                        $query->execute([$name,$state,$area,$headDoctor]);
                    }

                    $delete = $this->connect()->prepare("DELETE FROM " . $this->type . "WHERE id = ? ;");
                    $delete->execute([$this->id]);
                }else{
                    //got rejected
                }
            }else{
                //clinic/doctor data not exist
            }
        }
        

    }   