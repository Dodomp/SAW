<?php
session_start();


include 'function/function.php';
include 'function/newsletter_function.php';

if (!isAdmin()) header("location: ../front-end/index.php?message=error");


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require "PHPMailer-master\src\PHPMailer.php";
require "PHPMailer-master\src\Exception.php";
require "PHPMailer-master\src\SMTP.php";



try {

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $con = connection();

        $destinatari = destinatari($con);


        //creo istanza di phpmailer
        $mail = new PHPMailer(true);

        $testo = $_POST['emailBody'];
        $oggetto = $_POST['emailObject'];
        // Server settings
        //$mail->SMTPDebug = 2;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   // Enable SMTP authentication
        $mail->Username = 's.mussopiantelli@gmail.com';                     // SMTP username
        $mail->Password = 'cpendhumfpgizixs';                               // SMTP password
        $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        // Recipients
        $mail->addAddress('s.mussopiantelli@gmail.com');
        foreach ($destinatari as $valore) {
            $mail->addBCC($valore);
        }
        $mail->setFrom('s.mussopiantelli@gmail.com', 'Stefano Musso Piantelli');

        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $oggetto;
        $mail->Body = $testo;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->send();

        header("location: ../front-end/index.php?message=emailsent");
        exit();



    }

} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage().$e->errorMessage(), "\n";
}





