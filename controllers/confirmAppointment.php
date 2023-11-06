<?php

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
if (!isset($_SESSION['scheduleId'])) {
    header("Location: ./");
    exit;
}

    require 'models/appointments.php';

    
    $modelAppointments = new Appointments();
    $scheduleId = $_SESSION['scheduleId'];
    $userId = $_SESSION['user_id'];

    $appointmentId = $modelAppointments->create($userId, $scheduleId);
    $appointment = $modelAppointments->getDetail($userId);
    require 'views/confirmAppointment.php';
   
