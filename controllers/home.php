<?php

require 'models/base.php';

$model = new Home();
$homeController =$model->index();

require 'views/home.php';
