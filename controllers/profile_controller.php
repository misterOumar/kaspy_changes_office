<?php
// MODIFIER UN USER
if (isset($_POST['bt_maj'])) {
    // inclusion des fichiers ressources
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Users.php');


    // Récupération des données postés dépuis le formulaire dans les variables respectives
    $nom_prenom = strSecur($_POST['nom_prenom']);
    $users = strSecur($_POST['users']);
    $sex = strSecur($_POST['sex']);
    $adresse = strSecur($_POST['adresse']);
    $tel1 = strSecur($_POST['tel1']);
    $tel2 = strSecur($_POST['tel2']);
    $email = strSecur($_POST['email']);
    $matricule = strSecur($_POST['matricule']);
    $date_naissance = strSecur($_POST['date_naissance']);
    $n_piece = strSecur($_POST['n_piece']);
    $nationnalite = strSecur($_POST['nationnalite']);
    $situation_matrimoniale = strSecur($_POST['situation_matrimoniale']);
    $fonction = strSecur($_POST['fonction']);
    $details_fonction = strSecur($_POST['details_fonction']);
    $nombre_enfants = strSecur($_POST['nombre_enfants']);
    $permis_conduire = strSecur($_POST['permis_conduire']);
    $idModif = $_SESSION["KaspyISS_user"]['id'];


    // Déclaration et initialisation des variables d'erreur (e)
    $e_nom_prenom = $e_users = $e_type_compte = $e_sex = $e_adresse = $e_tel1 = $e_tel2 = $e_email = $e_matricule = $e_date_naissance = $e_n_piece = $e_nationnalite = $e_situation_matrimoniale = $e_fonction = $e_details_fonction = $e_nombre_enfants = $e_permis_conduire = '';
    $succes = true;

    // Vérifications
    if (empty($nom_prenom)) {
        $e_nom_prenom = 'Ce champ ne doit pas être vide.';
        $succes = false;
    }
    if (!empty($tel1) and verifiePhone($tel1) === false) {
        $e_tel1 = 'Ce champ est non valide.';
        $succes = false;
    }
    if (!empty($tel2) and verifiePhone($tel2) === false) {
        $e_tel2 = 'Ce champ est non valide.';
        $succes = false;
    }
    if (!empty($email) and verifierEmail($email) === false) {
        $e_email = 'Ce champ est non valide.';
        $succes = false;
    }


    // Cas ou tout est ok
    if ($succes) {
        $lastUser = Users::getByID($idModif);
        $user = Users::getByUserName($nom);
        // Modifications ici
        if ($user['nom'] === $nom && $user['nom'] !== $lastUser['nom']) {
            $message = "Ce nom existe déjà";
            echo json_encode([
                'message' => $message,
                'success' => "existe"
            ]);
        } else {
            $ip = getIp();
            $navigateur = getNavigateur();
            $annee = $_SESSION["KaspyISS_annee"];
            $ecole = $_SESSION["KaspyISS_bureau"];
            $us = $_SESSION["KaspyISS_user"]['users'];
            $pc = gethostbyaddr($_SERVER['REMOTE_ADDR']);
            $dt = date("Y-m-d H:i:s");
            if (Users::Modifier($nom_prenom, $sex, $adresse, $tel1, $tel2, $email, $matricule, $date_naissance, $n_piece, $nationnalite, $situation_matrimoniale, $fonction, $details_fonction, $nombre_enfants, $permis_conduire, $dt, $pc, $navigateur, $ip, $idModif)) {
                $message = "Modification de l'utilisateur éffectuée avec succès.";
                echo json_encode([
                    'success' => 'true',
                    'message' => $message
                ]);

                // Définition des sessions
                //Fermer la session de l'utilisateur connecté sur l'ordinateur
                setcookie('KaspyISS_UserConnecte', '', time() - 3600, '/');
                session_destroy();
            } else {
                $message = "Erreur lors de la mofification de l'utilisateur.";
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
            'tel1' => $e_tel1,
            'tel2' => $e_tel2
        ]);
    }
}



if (isset($_POST['bt_maj_mdp'])) {
    // inclusion des fichiers ressources
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Users.php');


    // Récupération des données postés dépuis le formulaire dans les variables respectives
    $nom_prenom = strSecur($_POST['nom_prenom']);
    $users = strSecur($_POST['username']);
    $password = strSecur($_POST['password']);
    $comf_password = strSecur($_POST['confirm_password']);
    $type_compte = strSecur($_POST['type_compte']);
    $login_user = "KASP KESSE";
    $info_login_user = Users::getByid(2);

    // Déclaration et initialisation des variables d'erreur (e)
    $e_users = $e_type_compte = $e_password = $e_comf_password = $e_erreur = '';
    $succes = true;

    // Vérifications
    if (isset($_POST['username']) and empty($users)) {
        $e_users = 'Ce champ ne doit pas être vide.';
        $succes = false;
    }
    if (isset($_POST['type_compte']) and empty($type_compte)) {
        $e_type_compte = 'Ce champ ne doit pas être vide.';
        $succes = false;
    }
    if (isset($_POST['password']) and empty($password)) {
        $e_password = 'Ce champ ne doit pas être vide.';
        $succes = false;
    }
    if (isset($_POST['new_password']) and empty($comf_password)) {
        $e_comf_password = 'Ce champ ne doit pas être vide.';
        $succes = false;
    }
    if (isset($_POST['confirm_password']) and empty($comf_password)) {
        $e_comf_password = 'Ce champ ne doit pas être vide.';
        $succes = false;
    }

    if ($password !== $comf_password) {
        $e_erreur = 'Les mots de passes saisis ne correspondent pas';
        $succes = false;
    }


    if ($info_login_user['users'] === $login_user && password_verify($password, $info_login_user['password'])) {
        if ($info_login_user['bloqued'] === 1) {
            $erreur = "Votre compte n'est pas activé";
            $succes = false;
            echo json_encode([
                'verf' => 'false',
                'erreur' => $erreur
            ]);
        } elseif ($info_login_user['valide_compte'] === 0) {
            $erreur = "Vous n'avez pas encore validé votre compte";
            $succes = false;
            echo json_encode([
                'verf' => 'false',
                'erreur' => $erreur
            ]);
        }
    } else {
        $erreur = "Nom d'utilisateur ou mot de passe incorrect";
        $succes = false;
        echo json_encode([
            'verf' => 'false',
            'erreur' => $erreur
        ]);
    }



    // Cas ou tout est ok
    if ($succes) {
        $ip = getIp();
        $navigateur = getNavigateur();
        $annee = $_SESSION["KaspyISS_annee"];
        $ecole = $_SESSION["KaspyISS_bureau"];
        $us = $_SESSION["KaspyISS_user"]['users'];
        $pc = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $dt = date("Y-m-d H:i:s");

        $hash_mot_pass = password_hash($password, PASSWORD_BCRYPT, $options);

        if (Users::Modifier_mdp($hash_mot_pass, $dt, $pc, $ip, $navigateur, $idModif)) {
            $message = "Modification du mot de passe éffectuée avec succès.";
            echo json_encode([
                'success' => 'true',
                'message' => $message
            ]);

            // Définition des sessions
            //Fermer la session de l'utilisateur connecté sur l'ordinateur
            setcookie('KaspyISS_UserConnecte', '', time() - 3600, '/');
            session_destroy();
        } else {
            $message = "Erreur lors de la mofification du mot de passe.";
            echo json_encode([
                'success' => 'false',
                'message' => $message
            ]);
        }
    } else {
        echo json_encode([
            'success' => 'false',
            'message' => 'Vérifier les champs',
            'users' => $e_users,
            'password' => $e_password,
            'comfirm_password' => $e_comf_password,
            'type_compte' => $e_type_compte,
            'erreur' => $e_erreur,
        ]);
    }
}
