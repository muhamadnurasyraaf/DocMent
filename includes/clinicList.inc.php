<?php
    include_once 'C:\laragon\www\DocMent\classes\clinicList.class.php';


    function displayClinicData(){
        $clinics = new ClinicList();
        $data = $clinics->displayClinics();
        return $data;
    }
   