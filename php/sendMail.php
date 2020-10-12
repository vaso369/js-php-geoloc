<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

if ($_POST['link']) {
    $mail = new PHPMailer(true);

    try {
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->Host = "smtp.gmail.com";
        $mail->Mailer = "smtp";
        $mail->Port = 465;
        $mail->Username = "vasilije.vasilijevic.11.17@ict.edu.rs";
        $mail->Password = ""; //ADD PASSWORD
        $mail->SMTPAuth   = true;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->setFrom('vasilije.vasilijevic.11.17@ict.edu.rs');
        $mail->addAddress('vasilijevic032@gmail.com');


        $mail->isHTML(true);
        $mail->Subject = "Pristup lokaciji";
        $mail->Body    = 'Neko je pristupio sajtu sa ove lokacije ' . $_POST['link'];
        $mail->AltBody =  $_POST['link'];

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
