<?php
if (!isset($_SESSION['admin_id'])) {
    header("Location: adminLogin.php");
    exit;
}

require("models/specialties.php");

$modelSpecialties = new Specialties();
$specialties = $modelSpecialties->getAll();

$specialty_code = [];
foreach ($specialties as $speciality) {
    $specialty_code[] = $speciality["specialty_id"];
}

if (isset($_POST["create"])) {
    $message = 'Médico adicionado com sucesso.';
    $htmlSpecialCharsFields = ["doctor_name", "doctor_email", "interest", "languages", "brief_cv", "available_day"];
    foreach ($htmlSpecialCharsFields as $field) {
        $_POST[$field] = htmlspecialchars(trim($_POST[$field]));
    }

    if (
        !empty($_POST["doctor_name"]) &&
        !empty($_POST["doctor_email"]) &&
        !empty($_FILES["doctor_img"]["name"]) &&
        !empty($_POST["interest"]) &&
        !empty($_POST["languages"]) &&
        !empty($_POST["brief_cv"]) &&
        !empty($_POST["available_day"]) &&
        !empty($_POST["specialty_id"]) &&
        filter_var($_POST["doctor_email"], FILTER_VALIDATE_EMAIL) && 
        mb_strlen($_POST["doctor_name"]) >= 3 &&
        mb_strlen($_POST["doctor_name"]) <= 60 &&
        mb_strlen($_POST["doctor_email"]) >= 4 &&
        mb_strlen($_POST["doctor_email"]) <= 252 &&
        mb_strlen($_POST["interest"]) >= 4 &&
        mb_strlen($_POST["interest"]) <= 200 &&
        mb_strlen($_POST["languages"]) >= 4 &&
        mb_strlen($_POST["languages"]) <= 120 &&
        mb_strlen($_POST["available_day"]) >= 4 &&
        mb_strlen($_POST["available_day"]) <= 200 
    ) {
        require("models/doctors.php");
        $model = new Doctors();
        $doctor = $model->getDetail($_POST["doctor_email"]);
  

        if (isset($_POST["teleconsultation"])) {
            $_POST["teleconsultation"] = 1;
        } else {

            $_POST["teleconsultation"] = 0;
        }
 
        if (isset($_FILES["doctor_img"])) {
            $file = $_FILES["doctor_img"];
           
            if ($file["error"] === UPLOAD_ERR_OK) {
                $uploadDir = "./imagens/";

                $allowedTypes = ["image/jpeg", "image/png"];
                if (in_array($file["type"], $allowedTypes)) {
                    $fileName = uniqid() . "_" . $file["name"];
                    $filePath = $uploadDir . $fileName;

                    move_uploaded_file($file["tmp_name"], $filePath);

                    $_POST["doctor_img"] = '/' . $fileName;
                } else {
                    $message = "Tipo de ficheiro não suportado. Apenas são permitidas imagens JPEG e PNG.";
                }
            } else {
                $message = "Ocorreu um erro durante o upload do ficheiro.";
            }
        }

        if (empty($doctor)) {
            $createdDoctor = $model->create($_POST);
            $message = 'Médico criado com sucesso';
           
        } else {
            $message = "Médico já existente.";
        }
    } else {
        $message = "Preencha os campos corretamente";
    }
}

require("views/adminDoctorsAdd.php");
