<?php

        if(isset($_POST["send"])) {
            foreach($_POST as $key => $value){       
                $_POST[ $key ] = htmlspecialchars(strip_tags(trim($value)));
            }
        
            if(     
                !empty($_POST["name"]) &&
                !empty($_POST["email"]) &&
                !empty($_POST["password"]) &&
                !empty($_POST["contact"]) &&
                filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) &&    
                $_POST["password"] === $_POST["password_confirm"] &&
                mb_strlen($_POST["name"]) >= 3 &&
                mb_strlen($_POST["name"]) <= 60 &&
                mb_strlen($_POST["password"]) >= 8 &&
                mb_strlen($_POST["password"]) <= 1000 &&
                mb_strlen($_POST["contact"]) >= 9 &&
                mb_strlen($_POST["contact"]) <= 30 
            ) {

                require("models/admins.php");
                $model = new Admins(); 
                $admin = $model->getByEmail( $_POST["email"] );

                if( empty($admin)) {
                    $createdAdmin = $model->create($_POST);        
                }
                else{
                    $message = "Utilizador já existente.";
                }

            } else {
                $message = "Preencha os campos correctamente";
            }

        }
        

require("views/adminRegister.php");

?>
