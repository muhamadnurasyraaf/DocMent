<?php

class SignupContr{
   private $username;
   private $age;
   private $typeReg;
   private $email;
   private $password;
   private $password_repeat;

   public function __construct($username,$age,$type,$email,$password,$password_repeat){
      $this->username = $username;
      $this->age = $age;
      $this->typeReg = $type;
      $this->email = $email;
      $this->password = $password;
      $this->password_repeat = $password_repeat;
   }

   private function isEmptyInput(){
      $emptycheck = null;
      if(empty($this->username) || empty($this->age) || empty($this->typeReg) ||empty($this->email) || empty($this->password) || empty($this->password_repeat) ){
         $emptycheck = true;
      }else{
         $emptycheck = false;
      }
      return $emptycheck;
   }

   private function validateEmail(){
      $result = null;
      if(filter_var($this->email,FILTER_VALIDATE_EMAIL)){
         $result = true;
      }else{
         $result = false;
      }
      return $result;
   }

   private function passwordMatch(){
      $result = null;
      if(password_verify($this->password,$this->password_repeat)){
         $result = true;
      }else{
         $result = false;
      }
      return $result;
   }
}