<?php

require("models/users.php");

if (!isset($_SESSION["user_id"])) {
    header("Location: ./login/");
    exit;
} else {

    $userId = $_SESSION["user_id"];
    $usersModel = new Users();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (
            !empty($_POST["street_name"]) &&
            !empty($_POST["city"]) &&
            !empty($_POST["zip_code"]) &&
            !empty($_POST["country"]) && 
            mb_strlen($_POST["street_name"]) >= 8 &&
            mb_strlen($_POST["street_name"]) <= 120 &&
            mb_strlen($_POST["zip_code"]) >= 4 &&
            mb_strlen($_POST["zip_code"]) <= 8 && 
            mb_strlen($_POST["city"]) >= 3 &&
            mb_strlen($_POST["city"]) <= 50 &&
            mb_strlen($_POST["country"]) >= 3 &&
            mb_strlen($_POST["country"]) <= 30 
        ) {

            $street_name = $_POST['street_name'];
            $city = $_POST['city'];
            $zip_code = $_POST['zip_code'];
            $country = $_POST['country'];

            $updated_data = $usersModel->updateUser([
                "street_name" => $street_name,
                "city" => $city,
                "zip_code" => $zip_code,
                "country" => $country
            ], $userId);

            $userData = $usersModel->getById($userId);

            if ($userData) {
                require("views/userprofile.php");
            } else {
                echo "Erro ao carregar os dados do utilizador.";
            }
        } else {
            $message = "Preencha os campos corretamente";
        }
    } else {
        $userData = $usersModel->getById($userId);
        require("views/userprofile.php");
    }
}




?>
