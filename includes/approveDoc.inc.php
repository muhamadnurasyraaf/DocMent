<?php 
    require_once 'C:\laragon\www\docment\classes\approveDoc.class.php';

    if(isset($_POST['approve'])){
        $id = $_POST['id'];
        

        $doc = new ApproveDoc($id,true);
        $result = $doc->result();

        if($result){
            header("location: ../admindashboard.php");
        }else{
            var_dump($result);
        }
    }else{
        $id = $_POST['id'];
       
        $doc = new ApproveDoc($id,false);
        $result = $doc->result();

        if($result){
            header("location: ../adminpages/docReg.php?message=1");
        }else{
            var_dump($result);
        }
    }