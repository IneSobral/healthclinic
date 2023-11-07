<?php
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
    require 'models/appointments.php';
    
    $model = new Appointments();
    $userId = $_SESSION['user_id'];

    $history = $model->getDetail($userId);
    
    require 'views/record.php';
   
