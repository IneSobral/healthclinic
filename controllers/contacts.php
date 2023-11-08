<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    if (
        isset($_POST["email"]) &&
        isset($_POST["assunto"]) &&
        isset($_POST["mensagem"]) &&
        isset($_POST["agrees"]) &&  
        !empty($_POST["email"]) &&
        !empty($_POST["assunto"]) &&
        !empty($_POST["mensagem"]) &&
        filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)
    ) {
        $email = $_POST["email"];
        $assunto = $_POST["assunto"];
        $mensagem = $_POST["mensagem"];
        
        try {
            //https://mailtrap.io/ - usei para testar
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->Host = 'sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Port = 2525;
            $mail->Username = '1f1c116f0f2556';
            $mail->Password = '********98f3';
            //Recipients
            $mail->setFrom($email, 'Mailer');
            $mail->addAddress('admin@healthconnect.com', 'Admin');     //Add a recipient
        
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $assunto;
            $mail->Body    = $mensagem;
        
            $mail->send();
            $message = 'Mensagem enviada com sucesso.';
        } catch (Exception $e) {
            $messageError = 'Erro ao enviar o e-mail: ' . $mail->ErrorInfo;
        }
        

    } else {
        $messageError = "Erro: Preencha todos os campos corretamente.";
    }
}

require("views/contacts.php");
?>


