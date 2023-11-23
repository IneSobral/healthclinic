<?php

if( isset($_POST["send"]) ) {

    foreach($_POST as $key => $value) {
        $_POST[ $key ] = htmlspecialchars(strip_tags(trim($value)));
    }

    if(
        !empty($_POST["email"]) &&
        !empty($_POST["password"]) &&
        filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) &&
        mb_strlen($_POST["password"]) >= 8 &&
        mb_strlen($_POST["password"]) <= 1000
    ) {
    
        require("models/admins.php");

        $model = new Admins();
        $admin = $model->login( $_POST );

        if ( !empty($admin)
            ) {
                $_SESSION["admin_id"] = $admin["admin_id"];
                header('Location: /adminProfile');
        } else {
            http_response_code(400);
            $message = "Preencha os campos correctamente.";
        }
    } else {
        http_response_code(401);
        $message = "Email ou password incorrectos";
    }
}


if( !isset($_SESSION["admin_id"]) ) {
    require("views/adminlogin.php");
}






/* Para inserir administrador com password encriptada antes de ter formulário de registo
require_once("models/admins.php");
$model = new Admins();
$model->insertAdmin("admin@healthconnect.com", "12345678"); */