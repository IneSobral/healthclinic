<?php 

if (isset($_GET['scheduleId'])) {

    require 'models/schedule.php';

    $scheduleId = $_GET['scheduleId'];
    $_SESSION['scheduleId'] = $_GET['scheduleId'];

    $modelSchedule = new Schedule();
    $schedule = $modelSchedule->updateState($scheduleId);

    if ($schedule) {
        header('Content-Type: application/json');
        echo json_encode($schedule);
    } else {
        echo ('Error');
    }

}