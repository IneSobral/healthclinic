<?php

session_start();

define("ENV", parse_ini_file(".env"));

$url_parts = explode("/",$_SERVER["REQUEST_URI"]);

if(strpos($url_parts[2], '?') !== false) {
    list($controller, $query_string) = explode('?', $url_parts[2], 2);
    $controller = str_replace('.php', '', $controller);
} else {
    $controller = $url_parts[2]; 
};

if(empty($controller)){
    $controller = "home";
}

if(!empty($url_parts[3])){
    $id = $url_parts[3];     
}

require("controllers/" .$controller. ".php");   

?>