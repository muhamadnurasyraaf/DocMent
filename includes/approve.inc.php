<?php
    require_once 'C:\laragon\www\DocMent\classes\approve.class.php';
    
    if(isset($_POST['reply'])){
        $id = $_POST['id'];
        $reply = $_POST['reply'];
        $type = $_POST['type'];

        $approve = new Approval($id,$reply,$type);
    }
    