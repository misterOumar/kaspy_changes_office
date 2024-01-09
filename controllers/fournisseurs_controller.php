<?php
//||******************************************************||
//||----------------- Kaspy Web Framework ----------------||
//||--- kaspy corporation, We're developing the future ---||
//||             Version: V1.0 ; Année : 2022             ||
//||******************************************************||


// AFFICHER LA LISTE DES FOURNISSEURS
$Liste_Fournisseurs = null;
if (isset($_GET['page']) and !empty($_GET['page']) and $_GET['page'] === "fournisseurs") {
    include("models/Fournisseurs.php");
    $Liste_Fournisseurs = fournisseurs::getAll();
}


// ENREGISTRER (AJOUTER) UN NOUVEAU FOURNISSEUR
if (isset($_POST['bt_enregistrer'])) {
    // inclusion des fichiers ressources
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Fournisseurs.php');

    // Récupération des données postés dépuis le formulaire dans les variables respectives
    $raison_sociale = strSecur($_POST['raison_sociale']);
    $adresse = strSecur($_POST['adresse']);
    $email = strSecur($_POST['email']);
    $tel = strSecur($_POST['tel']);
    $interlocuteur = strSecur($_POST['interlocuteur']);

    // Déclaration et initialisation des variables d'erreur (e)
    $e_raison_sociale = $e_adresse = $e_email = $e_tel = $e_interlocuteur = '';
    $succes = true;

    // Vérifications
    if (empty($raison_sociale)) {
        $e_raison_sociale = 'Ce champ ne doit pas être vide.';
        $succes = false;
    }

    // Cas ou tout est ok
    if ($succes) {
        $fournisseur = fournisseurs::getByNom($raison_sociale);
        if ($fournisseur['raison_sociale'] != '' and $fournisseur['raison_sociale'] == $raison_sociale) {
            $message = "Cette raison existe déjà";
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
            if (fournisseurs::Ajouter($id, $raison_sociale, $adresse, $email, $tel, $interlocuteur, $annee, $ecole, $dt, $us, $navigateur, $pc, $ip, $dt, $us, $navigateur, $pc, $ip)) {
                $message = 'Création fournisseurs éffectuée avec succès.';
                echo json_encode([
                    'success' => 'true',
                    'message' => $message
                ]);
            } else {
                $message = 'Erreur lors de la création fournisseurs.';
                echo json_encode([
                    'success' => 'non',
                    'message' => $message
                ]);
            }
        }
    } else {
        echo json_encode([
            'success' => 'false',

            'message' => 'Vérifier les champs',
            'raison_sociale' => $e_raison_sociale,
            'adresse' => $e_adresse,
            'email' => $e_email,
            'tel' => $e_tel,
            'interlocuteur' => $e_interlocuteur,
        ]);
    }
}


if (isset($_POST['bt_modifier'])) {
    // inclusion des fichiers ressources
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Fournisseurs.php');

    // Récupération des données postés dépuis le formulaire dans les variables respectives
    $raison_sociale = strSecur($_POST['raison_sociale_modif']);
    $adresse = strSecur($_POST['adresse_modif']);
    $email = strSecur($_POST['email_modif']);
    $tel = strSecur($_POST['tel_modif']);
    $interlocuteur = strSecur($_POST['interlocuteur_modif']);
    $idModif = strSecur($_POST["idModif"]);


    // Déclaration et initialisation des variables d'erreur (e)
    $e_raison_sociale = $e_adresse = $e_email = $e_tel = $e_interlocuteur = '';
    $succes = true;

    // Vérifications
    if (empty($raison_sociale)) {
        $e_raison_sociale = 'Ce champ ne doit pas être vide.';
        $succes = false;
    }

    // Cas ou tout est ok
    if ($succes) {
        $lastData = fournisseurs::getByID($idModif);
        $fournisseur = fournisseurs::getByNom($nom);
        if ($fournisseur['raison_sociale'] === $raison_sociale && $fournisseur['raison_sociale'] !== $lastData['raison_sociale']) {
            $message = "Ce fournisseur existe déjà";
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
            if (fournisseurs::Modifier($raison_sociale, $adresse, $email, $tel, $interlocuteur, $dt, $us, $navigateur, $pc, $ip, $idModif)) {
                $message = 'Modification fournisseurs éffectuée avec succès.';
                echo json_encode([
                    'success' => 'true',
                    'message' => $message
                ]);
            } else {
                $message = 'Erreur lors de la création fournisseurs.';
                echo json_encode([
                    'success' => 'non',
                    'message' => $message
                ]);
            }
        }
    } else {
        echo json_encode([
            'success' => 'false',

            'message' => 'Vérifier les champs',
            'raison_sociale' => $e_raison_sociale,
            'adresse' => $e_adresse,
            'email' => $e_email,
            'tel' => $e_tel,
            'interlocuteur' => $e_interlocuteur,
        ]);
    }
}

// RECUPERATION DES INFO DE LA DERNIERE LIGNE
if (isset($_GET['idLast'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Fournisseurs.php');

    $fournisseurs = fournisseurs::getLast();

    if ($fournisseurs) {
        $total = fournisseurs::getCount();
        echo json_encode([
            'last_fournisseurs' => $fournisseurs,
            'total' => $total
        ]);
    } else {
        echo json_encode([
            'last_fournisseurs' => 'null'
        ]);
    }
}



// RECUPERATION DES INFO POUR PROPRIETE D'UN ELEMENT 
if (isset($_GET['idProprietes'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Fournisseurs.php');

    $id = $_GET['idProprietes'];
    $proprietes = fournisseurs::getByID($id);

    if ($proprietes) {
        echo json_encode([
            'proprietes_fournisseurs' => $proprietes,
        ]);
    } else {
        echo json_encode([
            'proprietes_fournisseurs' => 'null'
        ]);
    }
}


// SUPPRESSION DU FOURNISSEUR
if (isset($_GET['idSuppr'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Fournisseurs.php');

    $id = strSecur($_GET['idSuppr']);
    
    // Vérification si le fournisseur est déjà utilisé dans dépense
    $fournisseur = fournisseurs::getByID($id);
    $depenses_fournisseur = fournisseurs::getByDepensesByFournisseurNom($fournisseur['raison_sociale']);

    if ($depenses_fournisseur !== false) {
        $message = "Désolé, le fournisseur ' " . $fournisseur['raison_sociale'] . " ' est rattaché à une ou plusieurs dépenses.";
        echo json_encode([
            'success' => 'impossible_liens',
            'message' => $message
        ]);
    } else {
        if (fournisseurs::Supprimer($id)) {
            $message = "Fournisseur supprimé avec succès.";
            echo json_encode([
                'success' => 'true',
                'message' => $message
            ]);
        } else {
            $message = "Erreur impossible de supprimer ce fournisseur.";
            echo json_encode([
                'success' => 'false',
                'message' => $message
            ]);
        }
    }
}
