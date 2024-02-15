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
    include('../models/Mtn.php');

    // Récupération des données postés dépuis le formulaire dans les variables respectives
    $type = strSecur($_POST["radio_type"]);

    $montant = strSecur($_POST["montant"]);    

    $nouveau_solde = strSecur($_POST["nouveau_solde"]);   

    $id_transaction = strSecur($_POST["id_transaction"]);   

    $magasin = $_SESSION["KaspyISS_bureau"];
    // telephone du client 
    $numero_telephone = strSecur($_POST["numero_telephone"]);  
    // $dates = strSecur($_POST["dates"]);
    $dates = strSecur($_POST["dates"]);
    $dates = date('Y-m-d', strtotime($dates));

    // Déclaration et initialisation des variables d'erreur (e)
    $e_montant = $e_numero_telephone = "";
    $succes = true;

    // Vérifications
    if (empty($montant)) {
        $e_montant = "Ce champ ne doit pas être vide.";
        $succes = false;
    }   
 

    if (empty($numero_telephone)) {
        $e_numero_telephone = "Ce champ ne doit pas être vide.";
        $succes = false;
    }

  



    // Cas ou tout est ok
    if ($succes) {

        $ip = getIp();
        $navigateur = getNavigateur();
        $us = $_SESSION["KaspyISS_user"]['users'];
        $pc = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $dt = date("Y-m-d H:i:s");
        if (mtn::Ajouter(
            $dates,
            $type,
            $numero_telephone,     
            $montant,
            $nouveau_solde, 
            $id_transaction,
            $magasin,
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
            $message = "enregistrement de la transaction  éffectué avec succès.";
            echo json_encode([
                'success' => 'true',
                'message' => $message
            ]);
        } else {
            $message = "Erreur lors de l\'enregistrement de la transaction.";
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
            'telephone_client' => $e_numero_telephone,
            

        ]);
    }
}

// MODIFIER UNE TRANSACTION
if (isset($_POST['bt_modifier'])) {

    // inclusion des fichiers ressources
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Mtn.php');

    // Récupération des données postés dépuis le formulaire dans les variables respectives

     
    $montant = strSecur($_POST["montant_modif"]);

    $nouveau_solde = strSecur($_POST["nouveau_solde_modif"]);

    $id_transaction = strSecur($_POST["id_transaction_modif"]);

    $type = strSecur($_POST["radio_type_modif"]);
 
    $numero_telephone = strSecur($_POST["numero_telephone_modif"]);
 
    $dates = strSecur($_POST["dates_modif"]);

    $idModif = strSecur($_POST["idModif"]);

    $e_montant  = $e_numero_telephone   =  " ";

    $succes = true;
    // Vérifications

    if (empty($montant)) {
        $e_montant = "Ce champ ne doit pas être vide.";
        $succes = false;
    }
  
    if (empty($numero_telephone)) {
        $e_numero_telephone = "Ce champ ne doit pas être vide.";
        $succes = false;
    }
      
    // Cas ou tout est ok
    if ($succes) {
        $ip = getIp();
        $navigateur = getNavigateur();
        $us = $_SESSION["KaspyISS_user"]['users'];
        $pc = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $dt = date("Y-m-d H:i:s");
        if (mtn::Modifier(
           
            $dates,
            $type,
            $numero_telephone,
            $montant,
            $nouveau_solde,
            $id_transaction,        
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
            'date' => $e_dates,
            'client' => $e_client,
            'telephone_client' => $e_numero_telephone,
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
    include('../models/Mtn.php');

    $transactions = mtn::getLast();

    if ($transactions) {
        $total = mtn::getCount();
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
if (isset($_GET['idMtn'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Mtn.php');

    $id = $_GET['idMtn'];
    $proprietes = mtn::getByID($id);
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
    include('../models/Mtn.php');

    $id = $_GET['idProprietes'];
    $proprietes = mtn::getByID($id);

    if ($proprietes) {
        echo json_encode([
            'proprietes_mtn' => $proprietes,
        ]);
    } else {
        echo json_encode([
            'proprietes_mtn' => 'null'
        ]);
    }
}


if (isset($_GET['idSuppr'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Mtn.php');

    $id = strSecur($_GET['idSuppr']);
    if (mtn::Supprimer($id)) {
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
