<?php
    include_once 'C:\laragon\www\docment\classes\clinic.class.php';

    function getCData($id,$approval){
        $c = new Clinic($id,$approval);

        return $c->getClinic();
    }

