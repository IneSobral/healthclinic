<?php

define("ENV", parse_ini_file(".env"));

$url_parts = explode("/",$_SERVER["REQUEST_URI"]);

$controller = $url_parts[2]; 

if(empty($controller)){
    $controller = "home";
}

if(!empty($url_parts[3])){
    $id = $url_parts[3];     
}

require("controllers/" .$controller. ".php");   

?>