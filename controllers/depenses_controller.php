<?php
//||******************************************************||
//||----------------- Kaspy Web Framework ----------------||
//||--- kaspy corporation, We're developing the future ---||
//||             Version: V1.0 ; Année : 2022             ||
//||******************************************************||


// AFFICHER LA LISTE DES DEPENSES
$Liste_depenses = null;
if (isset($_GET['page']) and !empty($_GET['page']) and $_GET['page'] === 'depenses') {
    include('models/Depenses.php');
    $Liste_depenses = depenses::getAll();
}

//OPTIONS DE SELECT DYNAMIQUE
if (isset($_GET['page']) and !empty($_GET['page']) and $_GET['page'] === 'depenses') {
    include('./models/Nature_depenses.php');
    include('./models/Fournisseurs.php');
    include('./models/Mode_reglements.php');
    // Liste des options dynamique
    $nature_depenses = nature_depenses::getAll();
    $fournisseurs = fournisseurs::getAll();
    $modes_reglements = mode_reglements::getAll();
}

// RECUPERATION DES INFO DE LA DERNIERE LIGNE
if (isset($_GET['idLast'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Depenses.php');

    $depenses = depenses::getLast();

    if ($depenses) {
        $total = depenses::getCount();
        echo json_encode([
            'last_depenses' => $depenses,
            'total' => $total
        ]);
    } else {
        echo json_encode([
            'last_depenses' => 'null'
        ]);
    }
}


// ENREGISTRER (AJOUTER) DEPENSES
if (isset($_POST['bt_enregistrer'])) {
    // inclusion des fichiers ressources
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Depenses.php');

    // Récupération des données postés dépuis le formulaire dans les variables respectives
    $dates = strSecur($_POST['dates']);
    $nature_depense = strSecur($_POST['nature_depense']);
    $designation = strSecur($_POST['designation']);
    $fournisseur = strSecur($_POST['fournisseur']);
    $montant = strSecur($_POST['montant']);
    $mode_reglement = strSecur($_POST['mode_reglement']);

    // Déclaration et initialisation des variables d'erreur (e)
    $e_dates =  $e_nature_depense = $e_designation = $e_fournisseur = $e_montant = $e_mode_reglement = '';
    $succes = true;

    // Vérifications 
    if (empty($nature_depense)) {
        $e_nature_depense = 'Ce champ ne doit pas être vide.';
        $succes = false;
    }

    if (empty($designation)) {
        $e_designation = 'Ce champ ne doit pas être vide.';
        $succes = false;
    }

    if (empty($fournisseur)) {
        $e_fournisseur = 'Ce champ ne doit pas être vide.';
        $succes = false;
    }

    if (empty($montant)) {
        $e_montant = 'Ce champ ne doit pas être vide.';
        $succes = false;
    }

    if (empty($mode_reglement)) {
        $e_mode_reglement = 'Ce champ ne doit pas être vide.';
        $succes = false;
    }

    // Cas ou tout est ok
    if ($succes) {

        $ip = getIp();
        $navigateur = getNavigateur();
        $annee = '2021-2022';
        $magasin = $_SESSION["KaspyISS_bureau"];
        $us = 'kesse';
        $pc = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $dt = '2022-09-06 07:20:00';
        if (depenses::Ajouter($id, $dates, $nature_depense, $designation, $fournisseur, $montant, $mode_reglement, $annee, $magasin, $dt, $us, $navigateur, $pc, $ip, $dt, $us, $navigateur, $pc, $ip)) {
            $message = 'Création depenses éffectuée avec succès.';
            echo json_encode([
                'success' => 'true',
                'message' => $message
            ]);
        } else {
            $message = 'Erreur lors de la création depenses.';
            echo json_encode([
                'success' => 'non',
                'message' => $message
            ]);
        }
    } else {
        echo json_encode([
            'success' => 'false',

            'message' => 'Vérifier les champs',
            'dates' => $e_dates,
            'nature_depense' => $e_nature_depense,
            'designation' => $e_designation,
            'fournisseur' => $e_fournisseur,
            'montant' => $e_montant,
            'mode_reglement' => $e_mode_reglement,
        ]);
    }
}


// MODIFIER DEPENSES
if (isset($_POST['bt_modifier'])) {
    // inclusion des fichiers ressources
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Depenses.php');

    // Récupération des données postés dépuis le formulaire dans les variables respectives
    $dates = strSecur($_POST['date_modifs']);
    $nature_depense = strSecur($_POST['nature_depense_modif']);
    $designation = strSecur($_POST['designation_modif']);
    $fournisseur = strSecur($_POST['fournisseur_modif']);
    $montant = strSecur($_POST['montant_modif']);
    $mode_reglement = strSecur($_POST['mode_reglement_modif']);
    $idModif = strSecur($_POST["idModif"]);

 

    // Déclaration et initialisation des variables d'erreur (e)
    $e_dates  = $e_nature_depense = $e_designation = $e_fournisseur = $e_montant = $e_mode_reglement = '';
    $succes = true;

    // Vérifications 
    if (empty($nature_depense)) {
        $e_nature_depense = 'Ce champ ne doit pas être vide.';
        $succes = false;
    }

    if (empty($designation)) {
        $e_designation = 'Ce champ ne doit pas être vide.';
        $succes = false;
    }

    if (empty($fournisseur)) {
        $e_fournisseur = 'Ce champ ne doit pas être vide.';
        $succes = false;
    }

    if (empty($montant)) {
        $e_montant = 'Ce champ ne doit pas être vide.';
        $succes = false;
    }

    if (empty($mode_reglement)) {
        $e_mode_reglement = 'Ce champ ne doit pas être vide.';
        $succes = false;
    }

    // Cas ou tout est ok
    if ($succes) {

        $ip = getIp();
        $navigateur = getNavigateur();
        $annee = '2021-2022';
        $magasin = $_SESSION["KaspyISS_bureau"];
        $us = $_SESSION["KaspyISS_user"]['users'];
        $pc = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $dt = date("Y-m-d H:i:s");
      
        if (depenses::Modifier($dates,  $nature_depense, $designation, $fournisseur, $montant, $mode_reglement, $annee, $magasin, $dt, $us, $navigateur, $pc, $ip, $idModif)) {
            $message = 'modification depenses éffectuée avec succès.';
            echo json_encode([
                'success' => 'true',
                'message' => $message
            ]);
        } else {
            $message = 'Erreur lors de la modification depenses.';
            echo json_encode([
                'success' => 'non',
                'message' => $message
            ]);
        }
    } else {
        echo json_encode([
            'success' => 'false',

            'message' => 'Vérifier les champs',
            'dates' => $e_dates,
            'nature_depense' => $e_nature_depense,
            'designation' => $e_designation,
            'fournisseur' => $e_fournisseur,
            'montant' => $e_montant,
            'mode_reglement' => $e_mode_reglement,
        ]);
    }
}

// RECUPERATION DES INFO POUR PROPRIETE D'UN ELEMENT 
if (isset($_GET['idProprietes'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Depenses.php');

    $id = $_GET['idProprietes'];
    $proprietes = depenses::getByID($id);

    if ($proprietes) {
        echo json_encode([
            'proprietes_depense' => $proprietes,
        ]);
    } else {
        echo json_encode([
            'proprietes_depense' => 'null'
        ]);
    }
}


// SUPPRESSION DE LA DEPENSES 
if (isset($_GET['idSuppr'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Depenses.php');

    $id = strSecur($_GET['idSuppr']);
    if (depenses::Supprimer($id)) {
        $message = 'depenses  supprimé avec succès.';
        echo json_encode([
            'success' => 'true',
            'message' => $message
        ]);
    } else {
        $message = 'Erreur impossible de supprimer cette depenses.';
        echo json_encode([
            'success' => 'false',
            'message' => $message
        ]);
    }
}
