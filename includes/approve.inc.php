<?php
    require_once 'C:\laragon\www\DocMent\classes\approve.class.php';
    
    function getApproval($id,$isApproved,$type){
      $clinic = new Approval($id,$isApproved,$type);
      return $clinic->Result();
    }
    
    