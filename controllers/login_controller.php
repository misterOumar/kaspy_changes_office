<?php
// ROOTING BUREAUX
// chemin d'accès au fichier JSON
$file = '../config/bureaux.json';
// include('../models/Role_permission_details.php');
// mettre le contenu du fichier dans une variable
$data = file_get_contents($file);
// décoder et accéder aux flux JSON
$ROOT_Bureau = json_decode($data, true);


// $bureaux = null;
if (isset($_GET['page']) and !empty($_GET['page']) and ($_GET['page']) === 'login') {
    // include("models/Bureaux.php");
    // $bureaux = bureaux::getAll();


    include("models/Annees.php");
    $annees = annees::getAll();
}



// Vérification de SESSION et COOKIE
if (isset($_SESSION['KaspyISS_user'])) {
    // header("Location: index.php?page=home");

}

if (isset($_COOKIE['KaspyISS_UserConnecte'])) {
    include('../models/Users.php');
    include('models/Role_permission_details.php');
    

    $username = $_COOKIE['KaspyISS_UserConnecte'];
    $bureau = $_COOKIE['KaspyISS_BureauConnecte'];
    $annee = $_COOKIE['KaspyISS_AnneeConnecte'];
    $info_login_user = Users::getByUserName($username);


    // recuperation des details de role
   
    
    $info_login_user['password'] = null;
    $info_login_user['otp'] = null;
    $info_login_user[4] = null;
    $_SESSION['KaspyISS_user'] = $info_login_user;
    $_SESSION['KaspyISS_annee'] = $annee;
    $_SESSION['KaspyISS_bureau'] = $bureau;
    $details = role_permission_details::getDetailsByID($_SESSION['KaspyISS_user']['type_compte']);

    $_SESSION['KaspyISS_user_details'] = $details;

    header("Location: index.php?page=home");
}

if (isset($_POST['bt_login'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Users.php');
    include("../models/Role_permission_details.php");
   
    

    $login_user = strSecur($_POST['login_user']);
    $password = strSecur($_POST['login_password']);
    $bureaux = strSecur($_POST['bureau']);
    $annees = strSecur($_POST['annee']);
    $resterConnecter = $_POST['UserResterConnecte'];
    
   

    $info_login_user = Users::getByUserName($login_user);

    $details = role_permission_details::getDetailsByID($info_login_user['type_compte']);
    

    if ($info_login_user['users'] == $login_user && password_verify($password, $info_login_user['password'])) {
        if ($info_login_user['bloqued'] == 1) {
            $erreur = "Votre compte n'est pas activé";
            echo json_encode([
                'erreur' => $erreur
            ]);
        } elseif ($info_login_user['valide_compte'] == 0) {
            $erreur = "Vous n'avez pas encore validé votre compte";
            echo json_encode([
                'erreur' => $erreur
            ]);
        } else {
            Users::updateStatusTrue($info_login_user['id']);
            $info_login_user['password'] = null;
            $info_login_user['otp'] = null;
            $info_login_user[4] = null;

            // Définition des sessions
            $_SESSION['KaspyISS_user'] = $info_login_user;
            $_SESSION['KaspyISS_annee'] = $annees;
            $_SESSION['KaspyISS_bureau'] = $bureaux;

            $_SESSION['KaspyISS_user_details'] = $details;

            // Définition des cookies
            if (isset($resterConnecter)) {
                // echo('ok cookies');
                setcookie('KaspyISS_UserConnecte', $info_login_user['users'], time() + 60 * 60 * 24 * 30, "/", null, false, true);
                setcookie('KaspyISS_BureauConnecte', $bureaux, time() + 60 * 60 * 24 * 30, "/", null, false, true);
                setcookie('KaspyISS_AnneeConnecte', $annees, time() + 60 * 60 * 24 * 30, "/", null, false, true);
            }
            echo json_encode(['result' => 'ok']);
        }
    } else {
        $erreur = "Nom d'utilisateur ou mot de passe incorrect";
        echo json_encode([
            'erreur' => $erreur
        ]);
    }
}
