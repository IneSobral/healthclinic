<?php

        if(isset($_POST["send"])) {
            foreach($_POST as $key => $value){       
                $_POST[ $key ] = htmlspecialchars(strip_tags(trim($value)));
            }
        
            if(
                isset($_POST["agrees"]) &&         
                !empty($_POST["user_name"]) &&
                !empty($_POST["user_email"]) &&
                !empty($_POST["password"]) &&
                !empty($_POST["street_name"]) &&
                !empty($_POST["city"]) &&
                !empty($_POST["zip_code"]) &&
                !empty($_POST["country"]) &&
                !empty($_POST["user_contact"]) &&
                filter_var($_POST["user_email"], FILTER_VALIDATE_EMAIL) &&    
                $_POST["password"] === $_POST["password_confirm"] &&
                mb_strlen($_POST["user_name"]) >= 3 &&
                mb_strlen($_POST["user_name"]) <= 60 &&
                mb_strlen($_POST["password"]) >= 8 &&
                mb_strlen($_POST["password"]) <= 1000 &&
                mb_strlen($_POST["street_name"]) >= 8 &&
                mb_strlen($_POST["street_name"]) <= 120 &&
                mb_strlen($_POST["zip_code"]) >= 4 &&
                mb_strlen($_POST["zip_code"]) <= 8 && 
                mb_strlen($_POST["city"]) >= 3 &&
                mb_strlen($_POST["city"]) <= 50 &&
                mb_strlen($_POST["user_contact"]) >= 9 &&
                mb_strlen($_POST["user_contact"]) <= 30 &&
                mb_strlen($_POST["country"]) >= 3 &&
                mb_strlen($_POST["country"]) <= 30 
            ) {

                require("models/users.php");
                $model = new Users(); 
                $user = $model->getByEmail( $_POST["user_email"] );

                /* se o utilizador nao existir */
                if( empty($user)) {
                    $createdUser = $model->create($_POST); 
                    $_SESSION["user_id"] = $createdUser["user_id"];        

                    header("Location: ./appointments.php");
                }
                else{
                    $message = "Utilizador já existente.";
                }

            } else {
                $message = "Preencha os campos correctamente";
            }

        }
        

require("views/register.php");

?>
