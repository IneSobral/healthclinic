<?php

require 'models/schedule.php';

if (isset($_GET['scheduleId']))  {
    $scheduleId = $_GET['scheduleId'];

    $modelCancel = new Schedule();
    $scheduleCancel = $modelCancel->cancelSchedule($scheduleId);

    if ($scheduleCancel) {
        header('Content-Type: application/json');
        echo json_encode($scheduleCancel);
    } else {
        echo ('Error');
    }
} else {
    echo ('Error');
}

