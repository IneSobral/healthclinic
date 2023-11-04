<?php

if (!isset($_SESSION['user_id'])) {

    header("Location: login.php");
    exit;
}

require 'models/base.php';

$model = new Home();
$appointment =$model->index();

require 'views/appointment.php';
