<?php 

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

require 'models/appointments.php';
    
$model = new Appointments();
$appointments = $model->getById($_SESSION['user_id']);

require 'views/cancelAppointment.php';


 
