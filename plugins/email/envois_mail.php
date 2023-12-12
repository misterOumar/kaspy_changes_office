<?php
// Vérification des paramètres reçus
if (isset($_POST['kaspy_em']) and isset($_POST['kaspy_ob']) and isset($_POST['kaspy_ms']) and isset($_POST['kaspy_us']) and isset($_POST['kaspy_uti']) and isset($_POST['kaspy_soc']) and isset($_POST['kaspy_pc'])) {
   
    // Paramétrages du contenu de l'email
    $MAIL_email = htmlspecialchars($_POST['kaspy_em']);
    $MAIL_objet = htmlspecialchars($_POST['kaspy_ob']);
    $MAIL_message = $_POST['kaspy_ms'];
    $MAIL_user = htmlspecialchars($_POST['kaspy_us']);
    

    // Paramétrages de l'email de connexion smtp
    $ROBO_EMAIL_Name = htmlspecialchars($_POST['kaspy_sem']);
    $ROBO_EMAIL_mdp = 'gondnnbscfpvipbf' ; //htmlspecialchars($_POST['kaspy_smp']);
   
    $ROBO_EMAIL_utilisateur = htmlspecialchars($_POST['kaspy_uti']);
    $ROBO_EMAIL_entreprise = htmlspecialchars($_POST['kaspy_soc']);
    $ordinateur = htmlspecialchars($_POST['kaspy_pc']);
}

//echo ($MAIL_email . '  /  ' . $MAIL_objet . $MAIL_message . $MAIL_user . $ROBO_EMAIL_Name . $ROBO_EMAIL_mdp);
//echo ("********************///// " . $_POST['kaspy_pj1'] . " //////************************");

// Paramétrage du mail d'envois
$ROBO_EMAIL_username = $MAIL_user;
$PJ_Defaut = "pj/optical_discount_signature.jpg";



////////////////////////////////////////////////////////////////

// *** PARAMETRAGE DE LA CONNEXION SMTP *** //
// Insertion des dépendences de PHPmailer
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

// Définition des names spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Création d'une nouvelle instence de PHPMailer
$mail = new PHPMailer();

//Définition du format d'encodage à utiliser pour les caractères
$mail->CharSet = 'UTF-8';

// set le mailer d'utiliser smtp
$mail->isSMTP();

//Définition du smtp host
$mail->Host = "smtp.gmail.com";

// Permettre les authentifications smtp
$mail->SMTPAuth = "true";

// définir le type d'encrytage (ssl/tls)
$mail->SMTPSecure = "tls";

// Définir le port de connextion au smtp
$mail->Port = "587";



// *** PARAMETRAGE DE L'EMAIL DE CONNEXION SMTP *** //
// Définir le nom d'utilisateur mail
$mail->Username = $ROBO_EMAIL_Name;

// Définir le mot de passe de l'email d'envois
$mail->Password = $ROBO_EMAIL_mdp;



// *** PARAMETRAGE DU CORPS DE L'EMAIL *** //
// Définir le titre du mail
$mail->Subject = $MAIL_objet;

// Définir le corps du mail
$mail->Body = $MAIL_message;

// Activer l'envois de mail html
$mail->isHTML(true);



// *** PARAMETRAGE DU TRANSMETEUR (ENVOYEUR) DE L'EMAIL *** //
// Définir l'email d'envois
$mail->setFrom($ROBO_EMAIL_Name);

// Définir le nom d'utilisateur qui envois le email'
$mail->FromName = ($ROBO_EMAIL_username);



// *** PARAMETRAGE DU RECEPTEUR (DESTINATAIR) DE L'EMAIL *** //
// Définir l'email de reception
$mail->addAddress($MAIL_email);



// *** GESTION DES PIECES JOINTES *** //
if (isset($_FILES)) {
    // Etape 1 : Reception et Vérification du vérification du fichier 
    $file  = $_FILES['file'];
    $nom_fichier = $file['name'];
    $path_fichier = $file['tmp_name'];
    $file_error = $file['error'];

    $file_ext = explode('.', $nom_fichier);
    $file_ext_check = strtolower(end($file_ext));
    $valid_file_ext = array('png', 'jpg', 'jpeg', 'pdf', 'xls', 'doc', 'docx', 'xlsm', 'txt', "mp3", "flv", 'ksf', 'pptx', 'ppt');

    // Etape 2 : upload de l'image sur le serveur après verifications si il a choisi une image
    $NomDossier = "pj/kaspy_temp/";
    $destfile =  $NomDossier . $nom_fichier;
    if ($file_error == 0) {
        if (in_array($file_ext_check, $valid_file_ext)) {
            move_uploaded_file($path_fichier, $destfile);
        }
    }

    // Etape 3 : Envois de la PJ
    if (isset($_POST['kaspy_pj1']) and !empty($_POST['kaspy_pj1'])) { //La PJ ne doit pas être vide
        $MAIL_pj1 = htmlspecialchars($_POST['kaspy_pj1']);
        $mail->addAttachment($NomDossier . $MAIL_pj1);
    }
}

// Définir les pièces joint
$mail->addAttachment($PJ_Defaut); // La pièces jointe par defaut viens en dernier position



// Envois du mail
$erreur;
if ($mail->Send()) {
    echo "Email envoyé avec success";
    $erreur = '1';
} else {
    echo "Erreur lors de l'envois du mail";
    $erreur = '0';
}

// Fermer la connexion smtp
$mail->smtpClose();



// Etape 4 : Suppression des fichier image * temp
if (isset($_POST['kaspy_pj1']) and !empty($_POST['kaspy_pj1'])) {
    $NomDossier_supp = "pj/kaspy_temp/";
    unlink($NomDossier_supp . $_POST['kaspy_pj1']);
}
if (isset($_POST['kaspy_pj2']) and !empty($_POST['kaspy_pj2'])) {
    $NomDossier_supp = "pj/kaspy_temp/";
    unlink($NomDossier_supp . $_POST['kaspy_pj2']);
}
if (isset($_POST['kaspy_pj3']) and !empty($_POST['kaspy_pj3'])) {
    $NomDossier_supp = "pj/kaspy_temp/";
    unlink($NomDossier_supp . $_POST['kaspy_pj3']);
}


// //Include required PHPMailer files
// require 'phpmailer/PHPMailer.php';
// require 'phpmailer/SMTP.php';
// require 'phpmailer/Exception.php';

// //Define name spaces
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;
// //Create instance of PHPMailer
// $mail = new PHPMailer();
// //Set mailer to use smtp
// $mail->isSMTP();
// $mail->SMTPDebug= 0;
// //Define smtp host
// $mail->Host = "smtp.gmail.com";
// //Enable smtp authentication
// $mail->SMTPAuth = true;
// //Set smtp encryption type (ssl/tls)
// $mail->SMTPSecure = "tls";
// //Port to connect smtp
// $mail->Port = "587";
// //Set gmail username
// $mail->Username = "kaspsergekesse@gmail.com";
// //Set gmail password
// $mail->Password = "gondnnbscfpvipbf";
// //Email subject
// $mail->Subject = "Test email using PHPMailer";
// //Set sender email
// $mail->setFrom('kaspsergekesse@gmail.com'); //Sender Email who will send email
// //Enable HTML
// $mail->isHTML(true);
// //Attachment
// $mail->addAttachment('pj/optical_discount_signature.jpg');
// //Email body
// $mail->Body = "<h1>This is HTML h1 Heading</h1></br><p>This is html paragraph</p>";
// //Add recipient
// $mail->addAddress('kaspsergekesse@gmail.com'); //Email of the person who will receive email
// //Finally send email
// if ( $mail->send() ) {
//     echo "Email Sent..!";
// }else{
//     echo "Message could not be sent. Mailer Error: " . $mail->ErrorInfo;
// }
// //Closing smtp connection
// $mail->smtpClose();