<?php

function validate($name, $number, $email, $subject, $message, $form){
    return !empty($name) && !empty($number) && !empty($email) && !empty($subject) && !empty($message); 
}

// echo "<pre>";
// var_dump(validate());
// echo "</pre>";

$status = "";

if (isset($_POST["form"])) {
    if (validate($_POST['name'], $_POST['number'], $_POST['email'], $_POST['subject'], $_POST['message'])) {
        $name = $_POST["name"];
        $number = $_POST["number"];
        $email = $_POST["email"];
        $subject = $_POST["subject"];
        $message = $_POST["message"];

        $status = "success";
    }else{
        $status = "danger";
    }
}

if($status == "danger"){
    echo "<div class='alert danger'>
        <span>Surgió un problema</span>
    </div>";
}
if($status == "success"){
    echo "<div class='alert success'>
        <span>¡Mensaje enviado con éxito!</span>
    </div>";
}