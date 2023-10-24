<?php

require("models/doctors.php");


if ($controller === "doctordetail" && !is_null($id)) {
    
    $model = new Doctors();    
    $doctor = $model->getDetail($id);

    require("views/doctordetail.php"); 
}



