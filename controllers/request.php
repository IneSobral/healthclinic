<?php

if(isset($_GET['specialtyId'])) {

    require 'models/doctors.php';
    $specialtyId = $_GET['specialtyId'];

    $modelDoctors = new Doctors();
    $doctors = $modelDoctors->getDoctorsBySp($specialtyId);

    $response = $doctors;

    header('Content-Type: application/json');
    echo json_encode($response);

} else {

    echo 'Nenhum médico encontrado para a especialidade selecionada';

}