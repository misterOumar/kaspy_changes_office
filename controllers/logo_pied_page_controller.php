<?php
//||******************************************************||
//||----------------- Kaspy Web Framework ----------------||
//||--- kaspy corporation, We're developing the future ---||
//||             Version: V1.0 ; Année : 2022             ||
//||******************************************************||

// Récupération des info du bureau
$info_bureau = null;
if (isset($_GET['page']) and !empty($_GET['page']) and $_GET['page'] === "logo_pied_page") {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('./models/Bureaux.php');

    $info_bureau = bureaux::getLast();

    // Chargement des photos
    //  cas de emblème

    if ($info_bureau['image_emblème'] === '') {
        $embleme_actuelle = "image_defaut.png";
    } else {
        $embleme_actuelle = $info_bureau['image_emblème'];
    }
    //cas de logo
    $logo_actuel= null;
    if ($info_bureau['logo_pc'] === '') {
        $logo_actuel = "image_defaut.png";
    } else {
        $logo_actuel = $info_bureau['logo_pc'];
    }
}

// MODIFIER UN BUREAUX
if (isset($_POST['bt_maj'])) {
    // inclusion des fichiers ressources
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Bureaux.php');

    // Récupération des données postés dépuis le formulaire dans les variables respectives
    $pied_page = strSecur($_POST['pied_page']);
    $photo = strSecur($_POST['photo']);
    $logo_pc = strSecur($_POST['photo_2']);


    $info_bureau = bureaux::getLast();
    $idModif = $info_bureau['id'];


    // Déclaration et initialisation des variables d'erreur (e)
    $succes = true;

    // Vérifications


    //Gestion et vérification de la photo
    $users = $_SESSION["KaspyISS_user"]['users'];

    //      cas de emblème
    $file = $_FILES['file_photo'];
    $nom_fichier = $photo;
    $path_fichier = $file['tmp_name'];
    $file_error = $file['error'];

    $file_ext = explode('.', $nom_fichier);
    $file_ext_check = strtolower(end($file_ext));
    $valid_file_ext = array('png', 'jpg', 'jpeg');

    $chemin_dossier_save = "../assets/images/";
    $photo_chemin_defaut = "image_defaut.jpg";
    $liens_photo_user =  $photo_chemin_defaut;

    $filename = "image_defaut.jpg";
    $destfile = "";
    if (isset($_POST['photo']) and !empty($photo) and  $photo != "image_defaut.jpg") {
        $date = new DateTime();
        $r = $date->getTimestamp();
        $filename = $users . "_embleme" . $r . "." . $file_ext_check;
        $destfile = $chemin_dossier_save . $filename;
    }
    //      cas de logo
    $file_2 = $_FILES['file_photo_2'];
    $nom_fichier_2 = $logo_pc;
    $path_fichier_2 = $file['tmp_name'];
    $file_error_2 = $file_2['error'];

    $file_ext_2 = explode('.', $nom_fichier_2);
    $file_ext_check_2 = strtolower(end($file_ext_2));
    $valid_file_ext_2 = array('png', 'jpg', 'jpeg');

    $chemin_dossier_save_2 = "../assets/images/";
    $photo_chemin_defaut_2 = "image_defaut.jpg";
    $liens_photo_user_2 =  $photo_chemin_defaut_2;

    $filename_2 = "image_defaut.jpg";
    $destfile_2 = "";
    if (isset($_POST['photo_2']) and !empty($logo_pc) and  $logo_pc != "image_defaut.jpg") {
        $date_2 = new DateTime();
        $r_2 = $date_2->getTimestamp();
        $filename_2 = "logo_" . $r_2 . "." . $file_ext_check_2;
        $destfile_2 = $chemin_dossier_save_2 . $filename_2;
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

        if (bureaux::update1($pied_page, $filename, $filename_2, $idModif)) {
            // cas de emblème
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
            // cas de logo
            if (isset($file_2)) {
                if ($file_error_2 == 0) {
                    if (in_array($file_ext_check_2, $valid_file_ext_2)) {
                        move_uploaded_file($path_fichier_2, $destfile_2);
                        $liens_photo_user_2 = $filename_2;
                    } else {
                        $liens_photo_user_2 = $photo_chemin_defaut_2;
                    }
                } else {
                    $liens_photo_user_2 = $photo_chemin_defaut_2;
                }
            } else {
                $liens_photo_user_2 = $photo_chemin_defaut_2;
            }




            // Actualisation de la sesion
            $message = "Mise à jour du dossier entreprise éffectué avec succès.";
            echo json_encode([
                'success' => 'true',
                'message' => $message
            ]);
        } else {
            $message = "Erreur lors de la mise à jour du dossier entreprise.";
            echo json_encode([
                'success' => 'false',
                'message' => $message
            ]);
        }
    } else {
        echo json_encode([
            'success' => 'false',
            'message' => 'Vérifier les champs',
        ]);
    }
}
