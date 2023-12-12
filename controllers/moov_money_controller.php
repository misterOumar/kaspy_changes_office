<?php
//||******************************************************||
//||----------------- Kaspy Web Framework ----------------||
//||--- kaspy corporation, We're developing the future ---||
//||             Version: V1.0 ; Année : 2022             ||
//||******************************************************||


// AFFICHER LA LISTE DES PROPRIETAIRE


// ENREGISTRER (AJOUTER) UN NOUVEAU Proprietaire
if (isset($_POST['bt_enregistrer'])) {
    // inclusion des fichiers ressources
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Moov.php');

    // Récupération des données postés dépuis le formulaire dans les variables respectives
    $client = strSecur($_POST["client"]);
    $montant = strSecur($_POST["montant"]);
    $destinataire = strSecur($_POST["destinataire"]);
    $tel_cli = strSecur($_POST["tel_cli"]);
    $tel_dest = strSecur($_POST["tel_dest"]);
    // $date_t = strSecur($_POST["date_t"]);
    $date_t = strSecur($_POST["date_t"]);
    $date_t = date('Y-m-d', strtotime($date_t));

    // Déclaration et initialisation des variables d'erreur (e)
    $e_montant = $e_client  = $e_destinataire = $e_date_t = $e_tel_dest = $e_tel_cli = "";
    $succes = true;

    // Vérifications
    if (empty($montant)) {
        $e_montant = "Ce champ ne doit pas être vide.";
        $succes = false;
    }

    if (empty($client)) {
        $e_client = "Ce champ ne doit pas être vide.";
        $succes = false;
    }



    if (empty($destinataire)) {
        $e_destinataire = "Ce champ ne doit pas être vide.";
        $succes = false;
    }

    if (empty($date_t)) {
        $e_date_t = "Ce champ ne doit pas être vide.";
        $succes = false;
    }

    if (empty($tel_cli)) {
        $e_tel_cli = "Ce champ ne doit pas être vide.";
        $succes = false;
    }

    if (empty($tel_dest)) {
        $e_tel_dest = "Ce champ ne doit pas être vide.";
        $succes = false;
    }




    // Cas ou tout est ok
    if ($succes) {

        $ip = getIp();
        $navigateur = getNavigateur();
        $us = $_SESSION["KaspyISS_user"]['users'];
        $pc = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $dt = date("Y-m-d H:i:s");
        if (moov::Ajouter(
            $montant,
            $date_t,
            $client,
            $tel_cli,
            $destinataire,
            $tel_dest,
            $dt,
            $dt,
            $us,
            $navigateur,
            $pc,
            $ip,
            $dt,
            $us,
            $navigateur,
            $pc,

        )) {
            $message = "Modification de la transaction  éffectué avec succès.";
            echo json_encode([
                'success' => 'true',
                'message' => $message
            ]);
        } else {
            $message = "Erreur lors de la modification de la transaction.";
            echo json_encode([
                'success' => 'false',
                'message' => $message
            ]);
        }
    } else {
        echo json_encode([
            'success' => 'false',
            'message' => "Vérifier les champs",
            'montant' => $e_montant,
            'client' => $e_client,
            'date' => $e_date_t,
            'destinataire' => $e_destinataire,
            'telephone_client' => $e_tel_cli,
            'telephone_destinataire' => $e_tel_dest,

        ]);
    }
}

// MODIFIER UNE TRANSACTION
if (isset($_POST['bt_modifier'])) {

    // inclusion des fichiers ressources
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Moov.php');

    // Récupération des données postés dépuis le formulaire dans les variables respectives

    $client = strSecur($_POST["client_modif"]);
    $montant = strSecur($_POST["montant_modif"]);
    $destinataire = strSecur($_POST["destinataire_modif"]);
    $tel_cli = strSecur($_POST["tel_cli_modif"]);
    $tel_dest = strSecur($_POST["tel_dest_modif"]);
    $date_t = strSecur($_POST["date_t_modif"]);

    $idModif = strSecur($_POST["idModif"]);

    $e_montant = $e_date_t = $e_client = $e_tel_cli   = $e_destinataire  = $e_tel_dest = " ";
    $succes = true;
    // Vérifications
    if (empty($montant)) {
        $e_montant = "Ce champ ne doit pas être vide.";
        $succes = false;
    }
    if (empty($date_t)) {
        $e_date_t = "Ce champ ne doit pas être vide.";
        $succes = false;
    }
    if (empty($client)) {
        $e_client = "Ce champ ne doit pas être vide.";
        $succes = false;
    }

    if (empty($tel_cli)) {
        $e_tel_cli = "Ce champ ne doit pas être vide.";
        $succes = false;
    }

    if (empty($destinataire)) {
        $e_destinataire = "Ce champ ne doit pas être vide.";
        $succes = false;
    }

    if (empty($tel_dest)) {
        $e_tel_dest = "Ce champ ne doit pas être vide.";
        $succes = false;
    }

    // Cas ou tout est ok
    if ($succes) {
        $ip = getIp();
        $navigateur = getNavigateur();
        $us = $_SESSION["KaspyISS_user"]['users'];
        $pc = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $dt = date("Y-m-d H:i:s");
        if (moov::Modifier(
            $montant,
            $date_t,
            $client,
            $tel_cli,
            $destinataire,
            $tel_dest,
            $dt,
            $us,
            $navigateur,
            $pc,
            $ip,
            $idModif

        )) {
            $message = "Mise à jour de la transaction  éffectué avec succès.";
            echo json_encode([
                'success' => 'true',
                'message' => $message
            ]);
        } else {
            $message = "Erreur lors de la mise à jour de la transaction.";
            echo json_encode([
                'success' => 'false',
                'message' => $message
            ]);
        }
    } else {
        echo json_encode([
            'success' => 'false',
            'message' => "Vérifier les champs",
            'montant' => $e_montant,
            'date' => $e_date_t,
            'client' => $e_client,
            'telephone_client' => $e_tel_cli,
            'destinataire' => $e_destinataire,
            'telephone_destinataire' => $e_tel_dest,

        ]);
    }
}




// RECUPERATION DES INFO DE LA DERNIERE LIGNE
if (isset($_GET['idLast'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Moov.php');

    $transactions = moov::getLast();

    if ($transactions) {
        $total = moov::getCount();
        echo json_encode([
            'last_transaction' => $transactions,
            'total' => $total
        ]);
    } else {
        echo json_encode([
            'last_transaction' => 'null'
        ]);
    }
}


// RECUPERATION DES INFO POUR LA MODIFICATION

if (isset($_GET['idMoov'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Moov.php');

    $id = $_GET['idMoov'];
    $proprietes = moov::getByID($id);
    if ($proprietes) {
        echo json_encode([
            'transaction' => $proprietes,
        ]);
    } else {
        echo json_encode([
            'transaction' => 'null'
        ]);
    }
}


// RECUPERATION DES INFO POUR PROPRIETE D'UN ELEMENT 
if (isset($_GET['idProprietes'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Moov.php');
    $id = $_GET['idProprietes'];
    $transactions = moov::getByID($id);
    if ($transactions) {
        echo json_encode([
            'transactions' => $transactions,
        ]);
    } else {
        echo json_encode([
            'transaction' => 'null'
        ]);
    }
}


if (isset($_GET['idSuppr'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Moov.php');

    $id = strSecur($_GET['idSuppr']);
    if (moov::Supprimer($id)) {
        $message = "transaction  supprimée avec succès.";
        echo json_encode([
            'success' => 'true',
            'message' => $message
        ]);
    } else {
        $message = "Erreur impossible de supprimer cette transaction.";
        echo json_encode([
            'success' => 'false',
            'message' => $message
        ]);
    }
}
