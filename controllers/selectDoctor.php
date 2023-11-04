<?php

if (!isset($_SESSION['user_id'])) {

    header("Location: login.php");
    exit;
}

require 'models/specialties.php';

$modelSpecialty = new Specialties();
$specialties = $modelSpecialty->getAll();

require 'views/selectDoctor.php';