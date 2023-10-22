<?php

require 'models/doctors.php';

$model = new Doctors();
$doctors = $model->getDoctors();

require 'views/doctors.php';
