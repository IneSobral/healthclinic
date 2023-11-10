<?php

if (!isset($_SESSION['admin_id'])) {

    header("Location: adminLogin.php");
    exit;
}

require 'models/admins.php';

$model = new Admins();
$adminProfile =$model->getById($_SESSION['admin_id']);

require 'views/adminProfile.php';
