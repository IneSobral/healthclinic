<?php

if (!isset($_SESSION['user_id'])) {

    header("Location: login.php");
    exit;
}

$doctorId = $_SESSION['selectedDoctorId'];

require 'models/schedule.php';
require 'models/hours.php'; 
$modelHours = new Hours();
$timeSlot = $modelHours->getAll(); 

$modelSchedule = new Schedule();
$schedules = $modelSchedule->getDetail($doctorId);

require 'views/selectTime.php';



