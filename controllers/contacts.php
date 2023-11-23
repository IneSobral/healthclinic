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
        $email = htmlspecialchars(strip_tags(trim($_POST["email"])));
        $assunto = htmlspecialchars(strip_tags(trim($_POST["assunto"])));
        $mensagem = htmlspecialchars(strip_tags(trim($_POST["mensagem"])));
        
        try {
            //https://mailtrap.io/ - usei para testar
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->Host = 'sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Port = 2525;
            $mail->Username = '1f1c116f0f2556';
            $mail->Password = '********98f3';
         
            $mail->setFrom($email, 'Mailer');
            $mail->addAddress('admin@healthconnect.com', 'Admin');  
        
            //Content
            $mail->isHTML(true);                                 
            $mail->Subject = $assunto;
            $mail->Body    = $mensagem;
        
            $mail->send();
            $message = 'Mensagem enviada com sucesso.';
        } catch (Exception $e) {
            http_response_code(500);
            $messageError = 'Erro ao enviar o e-mail: ' . $mail->ErrorInfo;
        }
        

    } else {
        http_response_code(400);
        $messageError = "Erro: Preencha todos os campos corretamente.";
    }
}

require("views/contacts.php");
?>


