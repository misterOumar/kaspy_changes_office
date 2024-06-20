<?php
// AFFICHER LA LISTE DES TYPES DE PIECE
$Liste_type_pieces = null;
if (isset($_GET['page']) and !empty($_GET['page']) and $_GET['page'] === "api_types_piece") {
    include("models/Types_piece.php");
    $Liste_type_pieces = types_piece::getAll();
}


// ENREGISTRER (AJOUTER) UN NOUVEAU TYPE DE PIECE
if (isset($_POST['bt_enregistrer'])) {
    // inclusion des fichiers ressources
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Types_piece.php');

    // Récupération des données postés dépuis le formulaire dans les variables respectives
    $libelle = strSecur($_POST["libelle"]);
    

    // Déclaration et initialisation des variables d'erreur (e)
    $e_libelle = "";
    $succes = true;

    // Vérifications
    if (empty($libelle)) {
        $e_libelle = "Ce champ ne doit pas être vide.";
        $succes = false;
    }


    // Cas ou tout est ok
    if ($succes) {
        $types_piece = types_piece::getByNom($libelle);
        if ($types_piece['libelle'] != '' and $types_piece['libelle'] == $libelle) {
            $message = "Ce libelle existe déjà";
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
            if (types_piece::Ajouter($id, $libelle, $annee, $ecole, $dt, $us, $navigateur, $pc, $ip, $dt, $us, $navigateur, $pc, $ip)) {
                $message = "Création du type de pièce éffectué avec succès.";
                echo json_encode([
                    'success' => 'true',
                    'message' => $message
                ]);
            } else {
                $message = "Erreur lors de la création du type de pièce.";
                echo json_encode([
                    'success' => 'false',
                    'message' => $message
                ]);
            }
        }
    } else {
        echo json_encode([
            'success' => 'false',
            'message' => "Vérifier les champs",
            'libelle' => $e_libelle,

        ]);
    }
}


// ENREGISTRER (AJOUTER) UN NOUVEAU TYPE DE PIECE
if (isset($_POST['bt_modifier'])) {
    // inclusion des fichiers ressources
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Types_piece.php');

    // Récupération des données postés dépuis le formulaire dans les variables respectives
    $libelle = strSecur($_POST["libelle_modif"]);
    $idModif = strSecur($_POST["idModif"]);



    // Déclaration et initialisation des variables d'erreur (e)
    $e_libelle = "";
    $succes = true;

    // Vérifications
    if (empty($libelle)) {
        $e_libelle = "Ce champ ne doit pas être vide.";
        $succes = false;
    }


    // Cas ou tout est ok
    if ($succes) {
        $last_type_pieces = types_piece::getByID($idModif);
        $types_piece = types_piece::getByNom($libelle);
        if ($types_piece['libelle'] === $libelle && $types_piece['libelle'] !== $last_type_pieces['libelle']) {
            $message = "Ce libelle existe déjà";
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
            if (types_piece::Modifier($libelle, $annee, $ecole, $dt, $us, $navigateur, $pc, $ip, $idModif)) {
                $message = "Modification du type de pièce éffectué avec succès.";
                echo json_encode([
                    'success' => 'true',
                    'message' => $message
                ]);
            } else {
                $message = "Erreur lors de la modification du type de pièce.";
                echo json_encode([
                    'success' => 'false',
                    'message' => $message
                ]);
            }
        }
    } else {
        echo json_encode([
            'success' => 'false',
            'message' => "Vérifier les champs",
            'libelle' => $e_libelle,

        ]);
    }
}

// RECUPERATION DES INFO DE LA DERNIERE LIGNE
if (isset($_GET['idLast'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Types_piece.php');

    $types_piece = types_piece::getLast();

    if ($types_piece) {
        $total = types_piece::getCount();
        echo json_encode([
            'last_types_piece' => $types_piece,
            'total' => $total
        ]);
    } else {
        echo json_encode([
            'last_type_pieces' => 'null'
        ]);
    }
}


// RECUPERATION DES INFO POUR PROPRIETE D'UN ELEMENT 
if (isset($_GET['idProprietes'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Types_piece.php');

    $id = strSecur($_GET['idProprietes']);
    $proprietes = types_piece::getByID($id);

    if ($proprietes) {
        echo json_encode([
            'type_piece' => $proprietes,
        ]);
    } else {
        echo json_encode([
            'type_piece' => 'null'
        ]);
    }
}

// SUPPRESSION D'UN TYPE DE PIECE
if (isset($_GET['idSuppr'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Types_piece.php');

    $id = strSecur($_GET['idSuppr']);

    // Vérification si le mode de règlemnt est déjà utilisé dans dépense
    $type_piece = types_piece::getByID($id);
    $depenses_mode_reglement = types_piece::getByDepensesByMode_regelementNom($mode_reglement['libelle']);

    if ($depenses_mode_reglement !== false) {
        $message = "Désolé, le mode de règlement ' " . $mode_reglement['libelle'] . " ' est rattaché à une ou plusieurs dépenses.";
        echo json_encode([
            'success' => 'impossible_liens',
            'message' => $message
        ]);
    } else {
        if (types_piece::Supprimer($id)) {
            $message = "Type de pièce supprimé avec succès.";
            echo json_encode([
                'success' => 'true',
                'message' => $message
            ]);
        } else {
            $message = "Erreur impossible de supprimer ce type de pièce.";
            echo json_encode([
                'success' => 'false',
                'message' => $message
            ]);
        }
    }
}
