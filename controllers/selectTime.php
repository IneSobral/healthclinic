<?php

if (!isset($_SESSION['user_id'])) {

    header("Location: login.php");
    exit;
}

$specialtyId = $_SESSION['specialtyId'];

require 'models/doctors.php';

$modelDoctors = new Doctors();
$doctors = $modelDoctors->getDoctorsBySp($specialtyId);

require 'views/selectTime.php';