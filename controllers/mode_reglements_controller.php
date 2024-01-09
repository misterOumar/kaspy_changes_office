<?php
// AFFICHER LA LISTE DES MODE DE REGLEMENT
$Liste_Mode_reglements = null;
if (isset($_GET['page']) and !empty($_GET['page']) and $_GET['page'] === "api_mode_reglements") {
    include("models/Mode_reglements.php");
    $Liste_Mode_reglements = mode_reglements::getAll();
}


// ENREGISTRER (AJOUTER) UN NOUVEAU MODE DE REGLEMENT
if (isset($_POST['bt_enregistrer'])) {
    // inclusion des fichiers ressources
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Mode_reglements.php');

    // Récupération des données postés dépuis le formulaire dans les variables respectives
    $nom = strSecur($_POST["nom"]);


    // Déclaration et initialisation des variables d'erreur (e)
    $e_nom = "";
    $succes = true;

    // Vérifications
    if (empty($nom)) {
        $e_nom = "Ce champ ne doit pas être vide.";
        $succes = false;
    }


    // Cas ou tout est ok
    if ($succes) {
        $mode_reglements = mode_reglements::getByNom($nom);
        if ($mode_reglements['nom'] != '' and $mode_reglements['nom'] == $nom) {
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
            if (mode_reglements::Ajouter($id, $nom, $annee, $ecole, $dt, $us, $navigateur, $pc, $ip, $dt, $us, $navigateur, $pc, $ip)) {
                $message = "Création du mode de reglement éffectué avec succès.";
                echo json_encode([
                    'success' => 'true',
                    'message' => $message
                ]);
            } else {
                $message = "Erreur lors de la création du mode de reglement.";
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
            'nom' => $e_nom,

        ]);
    }
}


// ENREGISTRER (AJOUTER) UN NOUVEAU MODE DE REGLEMENT
if (isset($_POST['bt_modifier'])) {
    // inclusion des fichiers ressources
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Mode_reglements.php');

    // Récupération des données postés dépuis le formulaire dans les variables respectives
    $nom = strSecur($_POST["nom_modif"]);
    $idModif = strSecur($_POST["idModif"]);



    // Déclaration et initialisation des variables d'erreur (e)
    $e_nom = "";
    $succes = true;

    // Vérifications
    if (empty($nom)) {
        $e_nom = "Ce champ ne doit pas être vide.";
        $succes = false;
    }


    // Cas ou tout est ok
    if ($succes) {
        $last_mode_reglements = mode_reglements::getByID($idModif);
        $mode_reglements = mode_reglements::getByNom($nom);
        if ($mode_reglements['nom'] === $nom && $mode_reglements['nom'] !== $last_mode_reglements['nom']) {
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
            if (mode_reglements::Modifier($nom, $annee, $ecole, $dt, $us, $navigateur, $pc, $ip, $idModif)) {
                $message = "Modification du mode de reglement éffectué avec succès.";
                echo json_encode([
                    'success' => 'true',
                    'message' => $message
                ]);
            } else {
                $message = "Erreur lors de la modification du mode de reglement.";
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
            'nom' => $e_nom,

        ]);
    }
}

// RECUPERATION DES INFO DE LA DERNIERE LIGNE
if (isset($_GET['idLast'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Mode_reglements.php');

    $mode_reglements = mode_reglements::getLast();

    if ($mode_reglements) {
        $total = mode_reglements::getCount();
        echo json_encode([
            'last_mode_reglements' => $mode_reglements,
            'total' => $total
        ]);
    } else {
        echo json_encode([
            'last_mode_reglements' => 'null'
        ]);
    }
}


// RECUPERATION DES INFO POUR PROPRIETE D'UN ELEMENT 
if (isset($_GET['idProprietes'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Mode_reglements.php');

    $id = strSecur($_GET['idProprietes']);
    $proprietes = mode_reglements::getByID($id);

    if ($proprietes) {
        echo json_encode([
            'mode_reglement' => $proprietes,
        ]);
    } else {
        echo json_encode([
            'mode_reglement' => 'null'
        ]);
    }
}

// SUPPRESSION D'UN MODE DE REGLEMENT
if (isset($_GET['idSuppr'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Mode_reglements.php');

    $id = strSecur($_GET['idSuppr']);

    // Vérification si le mode de règlemnt est déjà utilisé dans dépense
    $mode_reglement = mode_reglements::getByID($id);
    $depenses_mode_reglement = mode_reglements::getByDepensesByMode_regelementNom($mode_reglement['nom']);

    if ($depenses_mode_reglement !== false) {
        $message = "Désolé, le mode de règlement ' " . $mode_reglement['nom'] . " ' est rattaché à une ou plusieurs dépenses.";
        echo json_encode([
            'success' => 'impossible_liens',
            'message' => $message
        ]);
    } else {
        if (mode_reglements::Supprimer($id)) {
            $message = "Mode de reglement supprimé avec succès.";
            echo json_encode([
                'success' => 'true',
                'message' => $message
            ]);
        } else {
            $message = "Erreur impossible de supprimer ce mode de reglement.";
            echo json_encode([
                'success' => 'false',
                'message' => $message
            ]);
        }
    }
}
