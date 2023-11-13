<?php

if (!isset($_SESSION["admin_id"])) {
    require("views/adminlogin.php");
    exit;
}

require 'models/doctors.php';

$model = new Doctors();

if (isset($_POST["remove"]) && $_POST["remove"] === "removeDoctor") {
    if (!empty($_POST["doctor_id"]) && !empty($_SESSION["admin_id"])) {
        $doctorId = $_POST["doctor_id"];
        $model->removeDoctor($doctorId);
        $doctors = $model->getDoctors();

        header('Content-Type: application/json');
        echo json_encode(['status' => 'success', 'doctors' => $doctors]);
        exit;
    }
} else {
    $doctors = $model->getDoctors();
    require 'views/adminDoctorsRemove.php';
}
