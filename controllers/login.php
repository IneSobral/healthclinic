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
    
        
        require("models/users.php");

        $model = new Users();
        $user = $model->getByEmail($_POST['email']);


        if ( !empty($user) &&
              password_verify($_POST["password"], $user["password"])
            ) {
            $_SESSION['user_id'] = $user['user_id'];
            header('Location: ../');
        } else {
            $message = "Preencha os campos correctamente.";
        }
    } else {
        $message = "Email ou password incorrectos";
    }
}
require("views/login.php");