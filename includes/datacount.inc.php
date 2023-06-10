<?php
    include 'C:\laragon\www\DocMent\classes\dataCounter.class.php';

    function counter($type){
        $d = new Count($type);
        return $d->countUser();
    }
