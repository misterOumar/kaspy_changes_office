<?php
if (isset($_POST['bt_enregistrer'])) {

    // inclusion des fichiers ressources
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Type_carte.php');
    include('../models/Bureaux.php');



    $logo_pc = strSecur($_POST['photo_2']);

    $file_2 = $_FILES['file_photo_2'];
    $nom_fichier_2 = $logo_pc;
    $path_fichier_2 = $file['tmp_name'];
    $file_error_2 = $file_2['error'];

    $file_ext_2 = explode('.', $nom_fichier_2);
    $file_ext_check_2 = strtolower(end($file_ext_2));
    $valid_file_ext_2 = array('png', 'jpg', 'jpeg');

    $chemin_dossier_save_2 = "../assets/logo/";
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


    $libelle = strSecur($_POST["libelle"]);
    $duree = strSecur($_POST["duree"]);
    $e_duree = $e_libelle = "";
    $succes = true;
    if ($libelle == "") {
        //$libelle = "";
        $e_libelle = "Ce champ est requis.";
        $succes = false;
    }
    if ($duree == " ") {
        $e_duree = "Ce champ est requis.";
        $succes = false;
    }


    if ($succes) {
        $ip = getIp();
        $navigateur = getNavigateur();
        $us = $_SESSION["KaspyISS_user"]['users'];
        $pc = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $dt = date("Y-m-d H:i:s");
        if (type_carte::Ajouter($libelle, $duree, $filename_2, $dt, $us, $navigateur, $pc, $ip, $dt, $us, $navigateur, $pc, $ip)) {



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


            $message = "Création du type de carte  éffectué avec succès.";
            echo json_encode([
                'success' => 'true',
                'message' => $message
            ]);
        } else {
            $message = "Erreur lors de la création du type de carte.";
            echo json_encode([
                'success' => 'false',
                'message' => $message
            ]);
        }
        // }
    } else {
        echo json_encode([
            'success' => 'false',
            'message' => "Vérifier les champs",
            'libelle' => $e_libelle,
            'duree' => $e_duree,

        ]);
    }
}

// MODIFIER  UN NOUVEAU 

if (isset($_POST['bt_modifier'])) {

    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Type_carte.php');

    $idModif = strSecur($_POST["idModif"]);
    $libelle = strSecur($_POST["libellemodif"]);
    $duree = strSecur($_POST["dureemodif"]);

    $e_duree = $e_libelle = "";
    $succes = true;
    if (empty($duree)) {
        $e_duree = "Ce champ est requis.";
        $succes = false;
    }
    if ($libelle == " Définir le libelle...") {
        $e_libelle = "Ce champ est requis.";
        $succes = false;
    }

    // Cas ou tout est ok
    if ($succes) {

        $lastData = type_carte::getByID($idModif);
        $carte = type_carte::getByNom($libelle);
        if ($carte['libelle'] === $libelle && $carte['libelle'] !== $lastData['libelle']) {
            $message = 'Ce libellé existe déjà';
            echo json_encode([
                'message' => $message,
                'success' => 'existe'
            ]);
        } else {
            $ip = getIp();
            $navigateur = getNavigateur();
            $us = $_SESSION["KaspyISS_user"]['users'];
            $pc = gethostbyaddr($_SERVER['REMOTE_ADDR']);
            $dt = date("Y-m-d H:i:s");

            if (type_carte::Modifier($libelle, $duree, $dt, $us, $navigateur, $pc, $ip, $idModif)) {
                $message = "Modification du type de carte éffectuée avec succès.";
                echo json_encode([
                    'success' => 'true',
                    'message' => $message
                ]);
            } else {
                $message = "Erreur lors de la modification du type de carte.";
                echo json_encode([
                    'success' => 'non',
                    'message' => $message
                ]);
            }
        }
        // }
    } else {
        echo json_encode([
            'success' => 'false',
            'message' => "Vérifier les champs",
            'libelle' => $e_libelle,
            'duree' => $e_duree,

        ]);
    }
}



if (isset($_GET['idLast'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Type_carte.php');
    require_once("../plugins/fpdf184/fpdf.php");


    $cartes = type_carte::getLast();
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(40, 10, 'Hello');

    $fichier = 'recu' . time() . '.pdf';
    $pdf->Output($fichier, 'F');


    if ($cartes) {
        $total = type_carte::getCount();
        echo json_encode([
            'last_libelle' => $cartes,
            'total' => $total,
            'fichier' =>  $fichier,
        ]);
    } else {
        echo json_encode([
            'last_libelle' => 'null'
        ]);
    }
}

if (isset($_GET['fichier'])) {
    $fichier = $_GET['fichier'];
    $nomFichier = $fichier;

    if (file_exists($nomFichier)) {

        if (unlink($nomFichier)) {
            echo json_encode([
                'success' => 'true',
            ]);
        } else {
            echo json_encode([
                'success' => $nomFichier,
            ]);
        }
    } else {
        echo json_encode([
            'success' => $nomFichier,
        ]);
    }
}

// RECUPERATION DES INFO POUR PROPRIETE D'UN ELEMENT 
if (isset($_GET['idTypeCarte'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Type_carte.php');

    $id = $_GET['idTypeCarte'];
    $proprietes = type_carte::getByID($id);

    if ($proprietes) {
        echo json_encode([
            'type_carte' => $proprietes,
        ]);
    } else {
        echo json_encode([
            'type_carte' => 'null'
        ]);
    }
}


// SUPPRESSION DU TYPE DE CARTE
if (isset($_GET['idSuppr'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Type_carte.php');

    $id = strSecur($_GET['idSuppr']);
    if (type_carte::Supprimer($id)) {
        $message = "type carte supprimé avec succès.";
        echo json_encode([
            'success' => 'true',
            'message' => $message
        ]);
    } else {
        $message = "Erreur impossible de supprimer le type de carte.";
        echo json_encode([
            'success' => 'false',
            'message' => $message
        ]);
    }
}
