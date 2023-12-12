<?php

// Récupération des info du bureau
$info_entreprise = null;
if (isset($_GET['page']) and !empty($_GET['page']) and $_GET['page'] === "parametres_academique") {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('./models/Entreprise.php');

    $info_entreprise = parametres_admin::getLast();
}

// MODIFIER LES PARAMETRES GENERAUX
if (isset($_POST['bt_maj_form1'])) {
    // inclusion des fichiers ressources
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Entreprise.php');


    // Récupération des données postés dépuis le formulaire dans les variables respectives
    $type_ets = strSecur($_POST['type_ets']);
    $devise_pays = strSecur($_POST['devise_pays']);
    $ministere_tutelle = strSecur($_POST['ministere_tutelle']);

    $info_entreprise = parametres_admin::getLast();
    $idModif = $info_entreprise['id'];


    // Déclaration et initialisation des variables d'erreur (e)
    $e_type_ets = $e_devise_pays = '';
    $succes = true;

    // Vérifications
    if (empty($type_ets)) {
        $e_type_ets = 'Ce champ ne doit pas être vide.';
        $succes = false;
    }
    if (empty($devise_pays)) {
        $e_devise_pays = 'Ce champ ne doit pas être vide.';
        $succes = false;
    }



    // Cas ou tout est ok
    if ($succes) {
        // Modifications ici


        if (parametres_admin::update1($type_ets, $devise_pays, $ministere_tutelle, $idModif)) {
            $message = "Modification de l'entreprise éffectuée avec succès.";
            echo json_encode([
                'success' => 'true',
                'message' => $message
            ]);
        } else {
            $message = "Erreur lors de la mofification de l'entreprise.";
            echo json_encode([
                'success' => 'false',
                'message' => $message
            ]);
        }
    } else {
        echo json_encode([
            'success' => 'false',
            'message' => 'Vérifier les champs',
            'type_ets' => $e_type_ets,
            'devise_pays' => $e_devise_pays,
        ]);
    }
}

// MODIFIER LES PARAMETRES MATRICULE ET CONDUITE
if (isset($_POST['bt_matricule_conduite'])) {
    // inclusion des fichiers ressources
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Entreprise.php');


    // Récupération des données postés dépuis le formulaire dans les variables respectives
    $format_matricule = strSecur($_POST['format_matricule']);
    $parametre_matricule = strSecur($_POST['parametre_matricule']);
    $separateur = strSecur($_POST['separateur']);
    $moy_max_conduite = strSecur($_POST['moy_max_conduite']);
    $correspondance_conduite = strSecur($_POST['correspondance_conduite']);
    $retrait_conduite = strSecur($_POST['retrait_conduite']);

    $info_entreprise = parametres_admin::getLast();
    $idModif = $info_entreprise['id'];

    $mode_incrementation_matricule = strSecur($_POST['mode_inc_mat']);
    $mode_conduite = strSecur($_POST['mode_conduite']);

    // Déclaration et initialisation des variables d'erreur (e)
    $e_parametre_matricule = $e_format_matricule = '';
    $succes = true;

    // Vérifications
    if (empty($format_matricule)) {
        $e_format_matricule = 'Ce champ ne doit pas être vide.';
        $succes = false;
    }

    if (empty($parametre_matricule)) {
        $e_parametre_matricule = 'Ce champ ne doit pas être vide.';
        $succes = false;
    }
    if ($separateur === "Choisir le séparateur...") {
        $separateur = "";
    }

    // Cas ou tout est ok
    if ($succes) {
        // Modifications ici
        if (parametres_admin::update2($mode_incrementation_matricule, $format_matricule, $parametre_matricule, $separateur, $mode_conduite, $moy_max_conduite, $correspondance_conduite, $retrait_conduite, $idModif)) {
            $message = "Modification de l'entreprise éffectuée avec succès.";
            echo json_encode([
                'success' => 'true',
                'message' => $message
            ]);
        } else {
            $message = "Erreur lors de la mofification de l'entreprise.";
            echo json_encode([
                'success' => 'false',
                'message' => $message
            ]);
        }
    } else {
        echo json_encode([
            'success' => 'false',
            'message' => 'Vérifier les champs',
            'format_matricule' => $e_format_matricule,
            'parametre_matricule' => $e_parametre_matricule,
        ]);
    }
}
