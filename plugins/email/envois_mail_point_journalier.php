<?php
//Include required PHPMailer files
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

//Define name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function envoyerPointJournalier($nom_manager ,$email_manager , $date, $pieces_jointes, $mail_objet) {

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

    // Pièces jointes : Attacher les PDF directement en utilisant un flux de données
    foreach ($pieces_jointes as $piece_jointe){
        $mail->addAttachment($piece_jointe);
    }

    $mail->Subject = $mail_objet;
    //Set sender email
    $mail->setFrom('kaspsergekesse@gmail.com'); //Sender Email who will send email
    // Définir le nom d'utilisateur qui envois le email'
    // $mail->FromName = $mail_utilisateur;
    //Enable HTML
    $mail->isHTML(true);
    //Email body
    $message = file_get_contents('../plugins/email/envois_mail_point_journalier.html');
    $message = str_replace('{{nom_manager}}', $nom_manager, $message);
    $message = str_replace('{{date}}', $date, $message);
    $mail->Body = $message;
    // $mail->Body = $message;
    //Add recipient
    $mail->addAddress($email_manager); //Email of the person who will receive email
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


