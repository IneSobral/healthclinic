<?php 

if (isset($_GET['doctorId'])) {
    $_SESSION['selectedDoctorId'] = $_GET['doctorId'];


    header('Content-Type: application/json');
    echo json_encode($_SESSION['selectedDoctorId']);
}