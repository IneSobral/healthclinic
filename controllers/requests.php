<?php

if(isset($_POST["request"])){
//getSpecialtyid
    if(
        $_POST["request"] === "getSpecialtyId" &&
        !empty($_POST["specialtyId"]) &&
        !empty($_SESSION["user_id"])
    ){
        require 'models/doctors.php';
        $specialtyId = $_POST['specialtyId'];

        $modelDoctors = new Doctors();
        $doctors = $modelDoctors->getDoctorsBySp($specialtyId);

        $response = $doctors;

        header('Content-Type: application/json');
        echo json_encode($response);
    }
//getDoctorId
    if(
        $_POST["request"] === "getDoctorId" &&
        !empty($_POST["doctorId"]) &&
        !empty($_SESSION["user_id"])
    ) {
        $_SESSION['selectedDoctorId'] = $_POST["doctorId"];

        header('Content-Type: application/json');
        echo json_encode($_POST['doctorId']);
    }

//getScheduleId
    if(
        $_POST["request"] === "getScheduleId" &&
        !empty($_POST["scheduleId"]) &&
        !empty($_SESSION["user_id"])
    ) {
        require 'models/schedule.php';

        $_SESSION["scheduleId"] = $_POST['scheduleId'];
        $scheduleId = $_POST['scheduleId'];
        $modelSchedule = new Schedule();
        $schedule = $modelSchedule->updateState($scheduleId);

        header('Content-Type: application/json');
        echo json_encode($schedule);
    
    }
//cancelId
    if(
        $_POST["request"] === "cancelId" &&
        !empty($_POST["scheduleId"]) &&
        !empty($_SESSION["user_id"])
    ) {
        require 'models/schedule.php';

        $scheduleId = $_POST['scheduleId'];
    
        $modelCancel = new Schedule();
        $scheduleCancel = $modelCancel->cancelSchedule($scheduleId);

        header('Content-Type: application/json');
        echo json_encode($scheduleCancel);

    }


}
?>

