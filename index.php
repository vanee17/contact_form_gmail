<?php

require("mail.php");

function validate($name, $number, $email, $subject, $message, $form){
    return !empty($name) && !empty($number) && !empty($email) && !empty($subject) && !empty($message); 
}

// echo "<pre>";
// var_dump(validate());
// echo "</pre>";

$status = "";

if (isset($_POST["form"])) {
    if (validate(...$_POST)) {
        $name = $_POST["name"];
        $number = $_POST["number"];
        $email = $_POST["email"];
        $subject = $_POST["subject"];
        $message = $_POST["message"];
        $body = "$name <$email> envia el siguiente correo <br><br> $message";
        sendMail($subject, $body, $email, $name, true);

        $status = "success";
    }else{
        $status = "danger";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Contact Form</title>
</head>
<body>

    <?php if ($status == "danger"): ?>
        <div class="alert danger">
            <span>Surgió un problema</span>
        </div>
    <?php endif; ?>     

    <?php if ($status == "success"): ?>
        <div class="alert success">
            <span>¡Mensaje enviado con éxito!</span>
        </div>
    <?php endif; ?> 



    <form action="./" method="POST">
    <div class="content-title">
        <h1>Contact Us!</h1>
    </div>
        <div class="input-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name">
        </div>
        <div class="input-group">
            <label for="number">Number</label>
            <input type="number" name="number" id="number">
        </div>
        <div class="input-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email">
        </div>
        <div class="input-group">
            <label for="subject">Subject</label>
            <input type="text" name="subject" id="subject">
        </div>
        <div class="input-group">
            <label for="message">Message</label>
            <textarea name="message" id="message"></textarea>
        </div>
        <div class="button-container">
            <button type="submit" name="form">Send</button>
        </div>
    </form>
</body>
</html>