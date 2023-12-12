<?php

// AFFICHER LA LISTE DES CONTRATS DE BAILS
$List_types_cartes = null;
if (isset($_GET['page']) and !empty($_GET['page']) and $_GET['page'] === "carte") {
    include("models/Type_carte.php");
    $List_types_cartes = type_carte::getAll();
}

// ENREGISTRER (AJOUTER) UN NOUVELLE ENREGISTREMENT FISCAL DE BAIL
if (isset($_POST['bt_enregistrer'])) {

    // inclusion des fichiers ressources
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Carte.php');
    include('../models/Type_carte.php');

    $type = strSecur($_POST['type']);
    $customer_id = strSecur($_POST['customer_id']);

    $date_activation = strSecur($_POST['date_enregistrement']);
    $date_activation = date('Y-m-d', strtotime($date_activation));

    $date_expiration = strSecur($_POST['date_expiration']);
    $date_expiration = date('Y-m-d', strtotime($date_expiration));


    $date_expiration = strSecur($_POST['date_expiration']);
    $date_activation = strSecur($_POST['date_enregistrement']);

    $expiration = new DateTime($date_expiration);
    $activation = new DateTime($date_activation);

    $duree = $activation->diff($expiration);
    $format_duree = $duree->format('%a jours %h heures %i minutes');

    // Déclaration et initialisation des variables d'erreur (e)
    $e_type = $e_customer_id = $e_date_activation = $e_date_expiration = "";
    $succes = true;

    // Vérifications
    // if (empty($libelle)) {
    //     $e_libelle = "Ce champ ne doit pas être vide.";
    //     $succes = false;
    // }

    if ($type === "Choisir le type de carte...") {
        $e_type = "Ce champ est requis !";
        $succes = false;
    }

    if (empty($customer_id)) {
        $e_customer_id = "Ce champ ne doit pas être vide.";
        $succes = false;
    }
    if (empty($date_activation)) {
        $e_date_activation = "Ce champ ne doit pas être vide.";
        $succes = false;
    }
    if (empty($date_expiration)) {
        $e_date_expiration = "Ce champ ne doit pas être vide.";
        $succes = false;
    }

    // Cas ou tout est ok
    if ($succes) {

        $recouvreur = cartes::getByNum($customer_id);
        if ($recouvreur['customer_id'] == $customer_id) {
            $message = "Cette carte   existe déjà";
            echo json_encode([
                'message' => $message,
                'success' => "existe"
            ]);
        } else {

            $ip = getIp();
            $navigateur = getNavigateur();
            $us = $_SESSION["KaspyISS_user"]['users'];
            $pc = gethostbyaddr($_SERVER['REMOTE_ADDR']);
            $dt = date("Y-m-d H:i:s");

            if (cartes::Ajouter(
                $customer_id,
                $date_activation,
                $date_expiration,
                $type,
                $format_duree,
                $dt,
                $us,
                $navigateur,
                $pc,
                $ip,
                $dt,
                $us,
                $navigateur,
                $pc,
                $ip
            )) {
                $message = "Création de carte éffectuée avec succès.";
                echo json_encode([
                    'success' => 'true',
                    'message' => $message
                ]);
            } else {
                $message = "Erreur lors de la création de la carte.";
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
            'customer_id' => $e_customer_id,
            'date_activation' => $e_date_activation,
            'date_expiration' => $e_date_expiration,
            'type_carte' => $e_type,

        ]);
    }
}

// MODIFIER UNE TRANSACTION
if (isset($_POST['bt_modifier'])) {

    // Inclusion des fichiers ressources
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Carte.php'); // Il semble que vous n'utilisiez pas Mtn.php dans ce code

    // Récupération des données postées depuis le formulaire dans les variables respectives
    $type = strSecur($_POST['typemodif']);
    $customer_id = strSecur($_POST['customer_idmodif']);
    $date_activation = strSecur($_POST['date_enregistrementmodif']);
    $date_expiration = strSecur($_POST['date_expirationmodif']);

    // Calculer la différence entre les deux dates
    $activation = new DateTime($date_activation);
    $expiration = new DateTime($date_expiration);
    $duree = $activation->diff($expiration);

    // Afficher la différence en jours
    $format_duree = $duree->format('%a jours %h heures %i minutes');

    $idModif = strSecur($_POST["idModif"]);

    // Déclaration et initialisation des variables d'erreur (e)
    $e_type = $e_customer_id = $e_date_activation = $e_date_expiration = "";
    $succes = true;

    // Vérifications
    if (empty($customer_id)) {
        $e_customer_id = "Ce champ ne doit pas être vide.";
        $succes = false;
    }
    if (empty($date_activation)) {
        $e_date_activation = "Ce champ ne doit pas être vide.";
        $succes = false;
    }
    if (empty($date_expiration)) {
        $e_date_expiration = "Ce champ ne doit pas être vide.";
        $succes = false;
    }

    // Cas où tout est OK
    if ($succes) {
        $ip = getIp();
        $navigateur = getNavigateur();
        $us = $_SESSION["KaspyISS_user"]['users'];
        $pc = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $dt = date("Y-m-d H:i:s");

        // Appel de la fonction Modifier de la classe Carte
        if (cartes::Modifier(
            $customer_id,
            $date_activation,
            $date_expiration,
            $type,
            $format_duree,
            $dt,
            $us,
            $navigateur,
            $pc,
            $ip,
            $idModif
        )) {
            $message = "Modification de l'enregistrement fiscal de bail effectuée avec succès.";
            echo json_encode([
                'success' => 'true',
                'message' => $message
            ]);
        } else {
            $message = "Erreur lors de la modification de l'enregistrement fiscal de bail.";
            echo json_encode([
                'success' => 'false',
                'message' => $message
            ]);
        }
    } else {
        // Retourner les erreurs de validation
        echo json_encode([
            'success' => 'false',
            'message' => "Vérifiez les champs",
            'customer_id' => $e_customer_id,
            'date_activation' => $e_date_activation,
            'date_expiration' => $e_date_expiration,
            'type' => $e_type,
        ]);
    }
}




// RECUPERATION DES INFO DE LA DERNIERE LIGNE
if (isset($_GET['idLast'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/carte.php');




    $carte = cartes::getLast();

    if ($carte) {
        $total = cartes::getCount();
        echo json_encode([
            'last_carte' => $carte,
            'total' => $total
        ]);
    } else {
        echo json_encode([
            'last_carte' => 'null'
        ]);
    }
}

// RECUPERATION DES INFO POUR LA MODIFICATION 
if (isset($_GET['idCarte'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Carte.php');

    $id = $_GET['idCarte'];
    $proprietes = cartes::getByID($id);

    if ($proprietes) {
        echo json_encode([
            'carte' => $proprietes,
        ]);
    } else {
        echo json_encode([
            'carte' => 'null'
        ]);
    }
}


// SUPPRESSION D'UN enregistrement_contrat_bail 
if (isset($_GET['idSuppr'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/carte.php');

    $id = strSecur($_GET['idSuppr']);
    if (cartes::Supprimer($id)) {
        $message = "enregistrement carte supprimée avec succès.";
        echo json_encode([
            'success' => 'true',
            'message' => $message
        ]);
    } else {
        $message = "Erreur impossible de supprimer cette carte.";
        echo json_encode([
            'success' => 'false',
            'message' => $message
        ]);
    }
}
