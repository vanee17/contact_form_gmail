<?php

require("vendor/autoload.php");

use PHPMailer\PHPMailer\PHPMailer;

function sendMail($subject, $body, $email, $name, $html = false){
//configuracion inicial del servidor de correo
    $phpmailer = new PHPMailer();
    $phpmailer->isSMTP();
    $phpmailer->Host = 'smtp.gmail.com';
    $phpmailer->SMTPAuth = true;
    $phpmailer->SMTPSecure = PHPmailer::ENCRYPTION_SMTPS;
    $phpmailer->Port = 465;
    $phpmailer->Username = 'vaneedh@gmail.com';
    $phpmailer->Password = 'anlndeafxiqxjosw';
//destinatario de correos
    $phpmailer->setFrom($email, $name);
    $phpmailer->addAddress('vaneedh@gmail.com');
    $phpmailer->addCC($email, $name);
//contenido del mail
    $phpmailer->isHTML($html);                                  //Set email format to HTML
    $phpmailer->Subject = $subject;
    $phpmailer->Body    = $body;
//envio del mail
    $phpmailer->send();
}