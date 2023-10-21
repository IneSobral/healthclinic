<?php

require("models/specialties.php");
require("models/doctors.php");

$model = new Specialties();
$modelDoctorCount = new Doctors();

$specialties = $model->getSpecialtiesCount();
$doctors = $modelDoctorCount->getDoctorsCount();

require("views/about.php");
?>


