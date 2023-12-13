<?php

if (isset($_POST['btn_valider'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Users.php');
    require '../plugins/email/envois_mailForgot.php';

    $forgotEMAIL = strSecur($_POST['forgot_email']);
    $lien_for_forgot = 'http://localhost/kaspy_changes_office/index.php?page=changePassword';
    $mail_objet = "Mot de passe oublié";
    


    $userinfo = Users::getByEmail($forgotEMAIL);
    if ($userinfo['email'] == $forgotEMAIL) {
        envoyerEmailForgot($forgotEMAIL ,$lien_for_forgot ,$mail_objet);
        echo json_encode(['result' => 'ok']);

// Envois de l'email (POST)
        $postdata = http_build_query(
            array(
                'var1' => 'du contenu',
                'var2' => 'doh'
            )
        );
        $opts = array(
            'http' =>
            array(
                'method'  => 'POST',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => $postdata
            )
        );
        $context  = stream_context_create($opts);
        $result = file_get_contents('http://example.com/submit.php', false, $context);


    } else {
        $erreur = "Email non valide";
        echo json_encode([
            'erreur' => $erreur
        ]);
    }
}
