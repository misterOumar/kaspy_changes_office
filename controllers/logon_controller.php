<?php
//||******************************************************||
//||----------------- Kaspy Web Framework ----------------||
//||--- kaspy corporation, We're developing the future ---||
//||             Version: V1.0 ; Année : 2022             ||
//||******************************************************||


// AFFICHER LA LISTE DES UTILISATEURS
$Liste_Users = null;
if (isset($_GET['page']) and !empty($_GET['page']) and $_GET['page'] === 'login') {
    include('models/Users.php');
    include('models/Role_permission.php');

    $Liste_Users = Users::getAll();
}
// AFFICHER LA LISTE DES UTILISATEURS
$Liste_role = null;
if (isset($_GET['page']) and !empty($_GET['page']) and $_GET['page'] === 'logon') {
    include('models/Role_permission.php');
    $Liste_role = role_permission::getAll();
}


// ENREGISTRER (AJOUTER) UTILISATEURS
if (isset($_POST['bt_enregistrer'])) {
    // inclusion des fichiers ressources
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Users.php');

    // Récupération des données postés dépuis le formulaire dans les variables respectives
    $nom_prenom = strSecur($_POST['nom_prenom']);
    $users = strSecur($_POST['users']);
    $password = strSecur($_POST['password']);
    $type_compte = strSecur($_POST['type_compte']);
    $sex = strSecur($_POST['sex']);
    $adresse = strSecur($_POST['adresse']);
    $tel1 = strSecur($_POST['tel1']);
    $email = strSecur($_POST['email']);
    $date_naissance = strSecur($_POST['date_naissance']);
    $fonction = strSecur($_POST['fonction']);
    $photo = strSecur($_POST['photo']);
    $otp = strSecur($_POST['otp']);

    // Déclaration et initialisation des variables d'erreur (e)
    $e_nom_prenom = $e_users = $e_password = $e_type_compte = $e_sex = $e_adresse = $e_tel1 = $e_email = $e_date_naissance = $e_fonction  = $e_photo = '';
    $succes = true;

    // Vérifications 
    if (isset($_POST['nom_prenom']) and empty($nom_prenom)) {
        $e_nom_prenom = 'Ce champ ne doit pas être vide.';
        $succes = false;
    }
    if (isset($_POST['users']) and empty($users)) {
        $e_users = 'Ce champ ne doit pas être vide.';
        $succes = false;
    }
    if (isset($_POST['password']) and empty($password)) {
        $e_password = 'Ce champ ne doit pas être vide.';
        $succes = false;
    }
    if (isset($_POST['type_compte']) and empty($type_compte)) {
        $e_type_compte = 'Ce champ ne doit pas être vide.';
        $succes = false;
    }
    if (isset($_POST['sex']) and empty($sex)) {
        $e_sex = 'Ce champ ne doit pas être vide.';
        $succes = false;
    }
    if (isset($_POST['tel1']) and empty($tel1)) {
        $e_tel1 = 'Ce champ ne doit pas être vide.';
        $succes = false;
    }
    if (isset($_POST['tel1']) and !verifiePhone($tel1)) {
        $e_tel1 = "Numéro de téléphone invalide.";
        $succes = false;
    }
    if (isset($_POST['email']) and empty($email)) {
        $e_email = 'Ce champ ne doit pas être vide.';
        $succes = false;
    }
    if (isset($_POST['email']) and !verifierEmail($email)) {
        $e_email = 'Email invalide.';
        $succes = false;
    }


    //Gestion et vérification de la photo
    $file = $_FILES['file_photo'];
    $nom_fichier = $photo;
    $path_fichier = $file['tmp_name'];
    $file_error = $file['error'];

    $file_ext = explode('.', $nom_fichier);
    $file_ext_check = strtolower(end($file_ext));
    $valid_file_ext = array('png', 'jpg', 'jpeg');

    $chemin_dossier_save = "../assets/images/users/";
    $photo_chemin_defaut = "user_default.jpg";
    $liens_photo_user =  $photo_chemin_defaut;

    $filename = "user_default.jpg";
    $destfile = "";
    if (isset($_POST['photo']) and !empty($photo) and  $photo != "user_default.jpg") {
        $date = new DateTime();
        $r = $date->getTimestamp();
        $filename = $users . "_" . $r . "." . $file_ext_check;
        $destfile = $chemin_dossier_save . $filename;
    }


    // Cas ou tout est ok
    if ($succes) {
        $login_nom =  Users::getByUserName($users);
        $login_email =  Users::getByEmail($email);
        //Vérifie si le nom d'utilisateur existe déjà
        if ($login_nom['users'] == $users) {
            $message = "Ce nom d'utilisateur existe déjà";
            echo json_encode([
                'message' => $message,
                'success' => 'existe_user'
            ]);
            //Vérifie si l'email existe déjà
        } elseif ($login_email['email'] == $email) {
            $message = "Ce email existe déjà";
            echo json_encode([
                'message' => $message,
                'success' => 'existe_email'
            ]);
        } else {
            $ip = getIp();
            $navigateur = getNavigateur();
            $annee = $_SESSION["KaspyISS_annee"];
            $ecole = $_SESSION["KaspyISS_bureau"];
            $us = $_SESSION["KaspyISS_user"]['users'];
            $pc = gethostbyaddr($_SERVER['REMOTE_ADDR']);
            $dt = date("Y-m-d H:i:s");

            //Hash du mot de passe et du code OTP
            $options = [
                'cost' => 12,
            ];
            $hash_mot_pass = password_hash($password, PASSWORD_BCRYPT, $options);
            $hash_otp = password_hash($otp, PASSWORD_BCRYPT, $options);


            if (Users::Ajouter($nom_prenom, $users, $hash_mot_pass, $type_compte, $sex, $adresse, $tel1, "", $email, "", $date_naissance, "", "", "", $fonction, "", "", "", $filename, 0, 1, 1, $hash_otp, $dt, $dt, $pc, $navigateur, $ip)) {

                //upload de l'image sur le serveur après verifications si il a choisi une image
                if (isset($file)) {
                    if ($file_error == 0) {
                        if (in_array($file_ext_check, $valid_file_ext)) {
                            move_uploaded_file($path_fichier, $destfile);
                            $liens_photo_user = $filename;
                        } else {
                            $liens_photo_user = $photo_chemin_defaut;
                        }
                    } else {
                        $liens_photo_user = $photo_chemin_defaut;
                    }
                } else {
                    $liens_photo_user = $photo_chemin_defaut;
                }

                $message = "Création de l'utilisateur éffectuée avec succès.";
                echo json_encode([
                    'success' => 'true',
                    'message' => $message
                ]);
            } else {
                $message = "Erreur lors de la création de l'utilisateur.";
                echo json_encode([
                    'success' => 'false',
                    'message' => $message
                ]);
            }
        }
    } else {
        echo json_encode([
            'success' => 'false',
            'message' => 'Vérifier les champs',
            'nom_prenom' => $e_nom_prenom,
            'users' => $e_users,
            'password' => $e_password,
            'type_compte' => $e_type_compte,
            'sex' => $e_sex,
            'tel1' => $e_tel1
        ]);
    }
}


//VERIFIER SI LE NOM D'UTILISATEUR EXISTE DEJA
if (isset($_GET['Verif_user'])) {
    // inclusion des fichiers ressources
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Users.php');

    $user = strSecur($_GET['user']);

    $login =  Users::getByUserName($user);
    if ($login) {
        if ($login['user'] == $user) {
            $message = "Ce nom d'utilisateur existe déjà";
            echo json_encode([
                'message' => $message,
                'success' => 'true'
            ]);
        } else {
            $message = "Ce nom d'utilisateur est valide";
            echo json_encode([
                'message' => $message,
                'success' => 'false'
            ]);
        }
    } else {
        $message = "ras";
        echo json_encode([
            'message' => $message,
            'success' => 'false'
        ]);
    }
}



//VERIFIER SI UN EMAIL EXISTE DEJA
if (isset($_GET['Verif_email'])) {
    // inclusion des fichiers ressources
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Users.php');
    require '../plugins/email/envois_mailOTP.php';


    $email = strSecur($_GET['Verif_email']);
    $login =  Users::getByEmail($email);
    if ($login) {
        if ($login['email'] === $email) {
            $message = "Ce email existe déjà";
            echo json_encode([
                'message' => $message,
                'success' => 'true'
            ]);
        } else {
            $message = "Ce email est valide";

            echo json_encode([
                'message' => $message,
                'success' => 'false'
            ]);
        }
    } else {
        $message = "ras";
        $otp = mt_rand(100000, 999999);
        // Inclure le fichier d'envoi d'e-mail
        $mail_objet = "Code OTP : ". $otp ." pour vérification lors de l'inscription ";
        
        envoyerEmailOTP($email, $otp, $mail_objet);


        echo json_encode([
            'message' => $message,
            'otp' => $otp,
            'email' => $email,
            'success' => 'false'
        ]);
    }
}
