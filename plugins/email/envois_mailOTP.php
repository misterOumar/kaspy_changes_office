<?php
//Include required PHPMailer files
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';
include('../../config/config.php');

//Define name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function envoyerEmailOTP($email_client, $otp, $mail_objet) {

    //Create instance of PHPMailer
    $mail = new PHPMailer();
    //Set mailer to use smtp
    $mail->isSMTP();
    $mail->SMTPDebug = 0;
    //Define smtp host
    $mail->Host = "smtp.gmail.com";
    //Enable smtp authentication
    $mail->SMTPAuth = true;
    //Set smtp encryption type (ssl/tls)
    $mail->SMTPSecure = "tls";
    //Port to connect smtp
    $mail->Port = "587";
    //Set gmail username
    $mail->Username = 'kaspsergekesse@gmail.com';
    //Set gmail password
    $mail->Password = "gondnnbscfpvipbf";
    //Email subject
    $mail->addCustomHeader("Content-Type: text/html; charset=UTF-8");
    $mail->Subject = mb_encode_mimeheader($mail_objet, 'UTF-8');
    //Set sender email
    $mail->setFrom('kaspsergekesse@gmail.com', APP_NAME); //Sender Email who will send email
    // Définir le nom d'utilisateur qui envois le email'
    // $mail->FromName = $mail_utilisateur;
    //Enable HTML
    $mail->isHTML(true);
    //Attachment
    //$mail->addAttachment('pj/optical_discount_signature.jpg'); // Ajout d'une pièce jointe par défaut
    //Email body
    $message = file_get_contents('plugins/email/envois_mailOTP.html');
    $message = str_replace('{{otp}}', $otp, $message);
    $mail->Body = $message;
    //Add recipient
    $mail->addAddress($email_client); //Email of the person who will receive email
    //Finally send email
    if ($mail->send()) {
        $message = "Email Envoyé..!";
        // echo json_encode([
        //     'success' => 'true',
        //     'message' => $message
        // ]);
    } else {
        $message = "Erreur lors de l'envois du mail. Mailer Error: " . $mail->ErrorInfo;
        // echo json_encode([
        //     'success' => 'false',
        //     'message' => $message,
        //     // 'email' => $email_client,
        // ]);
    }
    //Closing smtp connection
    $mail->smtpClose();
}

// if (isset($_GET['utilisateur']) and isset($_GET['objet']) and isset($_GET['message'])) {
    
// }
