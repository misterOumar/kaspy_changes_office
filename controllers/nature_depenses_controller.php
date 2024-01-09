<?php
// AFFICHER LA LISTE DES NATURE DEPENSESS
$Liste_Nature_depenses = null;
if (isset($_GET['page']) and !empty($_GET['page']) and $_GET['page'] === "api_nature_depenses") {
    include("models/Nature_depenses.php");
    $Liste_Nature_depenses = nature_depenses::getAll();
}



// ENREGISTRER (AJOUTER) UNE NOUVELLE NATURE DEPENSES
if (isset($_POST['bt_enregistrer'])) {
    // inclusion des fichiers ressources
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Nature_depenses.php');

    // Récupération des données postés dépuis le formulaire dans les variables respectives
    $libelle = strSecur($_POST["libelle"]);
    $frequence = strSecur($_POST["frequence"]);
    $observations = strSecur($_POST["observations"]);

    // Déclaration et initialisation des variables d'erreur (e)
    $e_libelle = $e_frequence = $e_observations = "";
    $succes = true;

    // Vérifications
    if (empty($libelle)) {
        $e_libelle = "Ce champ ne doit pas être vide.";
        $succes = false;
    }
    if ($frequence == "Choisir la frequence...") {
        $e_frequence = "Ce champ est requis.";
        $succes = false;
    }

    // Cas ou tout est ok
    if ($succes) {
        $nature_depenses = nature_depenses::getByNom($libelle);
        if ($nature_depenses['libelle'] == $libelle) {
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
            if (nature_depenses::Ajouter($id, $libelle, $frequence, $observations, $annee, $ecole, $dt, $us, $navigateur, $pc, $ip, $dt, $us, $navigateur, $pc, $ip)) {
                $message = "Création de la nature depenses éffectuée avec succès.";
                echo json_encode([
                    'success' => 'true',
                    'message' => $message
                ]);
            } else {
                $message = "Erreur lors de la création de la nature depenses.";
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
            'frequence' => $e_frequence,
            'observations' => $e_observations,
        ]);
    }
}


// MODIFIER UNE NATURE DEPENSES
if (isset($_POST['bt_modifier'])) {
    // inclusion des fichiers ressources
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Nature_depenses.php');

    // Récupération des données postés dépuis le formulaire dans les variables respectives
    $libelle = strSecur($_POST["libelle_modif"]);
    $frequence = strSecur($_POST["frequence_modif"]);
    $observations = strSecur($_POST["observations_modif"]);
    $idModif = strSecur($_POST["idModif"]);


    // Déclaration et initialisation des variables d'erreur (e)
    $e_libelle = $e_frequence = $e_observations = "";
    $succes = true;

    // Vérifications
    if (empty($libelle)) {
        $e_libelle = "Ce champ ne doit pas être vide.";
        $succes = false;
    }
    if ($frequence == "Choisir la frequence...") {
        $e_frequence = "Ce champ est requis.";
        $succes = false;
    }

    // Cas ou tout est ok
    if ($succes) {
        $last_nature_depense = nature_depenses::getByID($idModif);
        $nature_depense = nature_depenses::getByNom($libelle);
        if ($nature_depense['libelle'] === $libelle && $nature_depense['libelle'] !== $last_nature_depense['libelle']) {
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
            if (nature_depenses::Modifier($libelle, $frequence, $observations, $annee, $ecole, $dt, $us, $navigateur, $pc, $ip, $idModif)) {
                $message = "Modification de la nature depenses éffectuée avec succès.";
                echo json_encode([
                    'success' => 'true',
                    'message' => $message
                ]);
            } else {
                $message = "Erreur lors de la modification de la nature depenses.";
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
            'frequence' => $e_frequence,
            'observations' => $e_observations,
        ]);
    }
}



// RECUPERATION DES INFO DE LA DERNIERE LIGNE
if (isset($_GET['idLast'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Nature_depenses.php');

    $nature_depenses = nature_depenses::getLast();

    if ($nature_depenses) {
        $total = nature_depenses::getCount();
        echo json_encode([
            'last_nature_depenses' => $nature_depenses,
            'total' => $total
        ]);
    } else {
        echo json_encode([
            'last_nature_depenses' => 'null'
        ]);
    }
}


// RECUPERATION DES INFO POUR PROPRIETE D'UN ELEMENT 
if (isset($_GET['idProprietes'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Nature_depenses.php');

    $id = $_GET['idProprietes'];
    $proprietes = nature_depenses::getByID($id);

    if ($proprietes) {
        echo json_encode([
            'proprietes_nature_depenses' => $proprietes,
        ]);
    } else {
        echo json_encode([
            'proprietes_nature_depenses' => 'null'
        ]);
    }
}


// SUPPRESSION DE LA NATURE DEPENSES
if (isset($_GET['idSuppr'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Nature_depenses.php');

    $id = strSecur($_GET['idSuppr']);

    // Vérification si la nature de la dépense est déjà utilisée dans dépense
    $nature_depense = nature_depenses::getByID($id);
    $depenses_naturedepense = nature_depenses::getByDepensesByNature_depenseLibelle($nature_depense['libelle']);

    if ($depenses_naturedepense !== false) {
        $message = "Désolé, la nature de dépense ' " . $nature_depense['libelle'] . " ' est rattachée à une ou plusieurs dépenses.";
        echo json_encode([
            'success' => 'impossible_liens',
            'message' => $message
        ]);
    } else {
        if (nature_depenses::Supprimer($id)) {
            $message = "Nature depenses supprimée avec succès.";
            echo json_encode([
                'success' => 'true',
                'message' => $message
            ]);
        } else {
            $message = "Erreur impossible de supprimer cette Nature depenses.";
            echo json_encode([
                'success' => 'false',
                'message' => $message
            ]);
        }
    }
}
