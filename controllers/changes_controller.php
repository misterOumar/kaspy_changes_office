<?php

// AFFICHER LA LISTE DES CONTRATS DE BAILS
 
// ENREGISTRER (AJOUTER) UN NOUVELLE ENREGISTREMENT FISCAL DE BAIL
if (isset($_POST['bt_enregistrer'])) {

    // inclusion des fichiers ressources
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Change.php');
   

    // Récupération des données postés dépuis le formulaire dans les variables respectives
    $client = strSecur($_POST["client"]);

    $taux = ($_POST["taux"]);

    $adresse = ($_POST["adresse"]);

    $type = strSecur($_POST["radio_type"]);

    $devise = strSecur($_POST["devise"]);

    $telephone = strSecur($_POST["telephone"]);

    $montant_envoye = ($_POST["montant"]);
    
    // $date_t = strSecur($_POST["date_t"]);
    $date_v = strSecur($_POST["date_v"]);

    $date_v = date('Y-m-d', strtotime($date_v));

    $montant_r = $montant_envoye * $taux;

    // Déclaration et initialisation des variables d'erreur (e)
    $e_client  =  $e_taux = $e_telephone =  $e_montant_envoye= $e_date_v =  "";
    $succes = true;

    // Vérifications   
    if (empty($client)) {
        $e_client = "Ce champ ne doit pas être vide.";
        $succes = false;
    }
    if (empty($montant_envoye)) {
        $e_montant_envoye = "Ce champ ne doit pas être vide.";
        $succes = false;
    }

      if (empty($taux)) {
        $e_taux = "Ce champ ne doit pas être vide.";
        $succes = false;
    }

    if (empty($telephone)) {
        $e_telephone = "Ce champ ne doit pas être vide.";
        $succes = false;
    }
    if ($succes) {
        $ip_creation = getIp();
        $navigateur_creation = getNavigateur();
        $user_creation = $_SESSION["KaspyISS_user"]['users'];
        $ordinateur_creation = gethostbyaddr($_SERVER['REMOTE_ADDR']);
    $magasin = $_SESSION["KaspyISS_bureau"];
        $date_creation = date("Y-m-d H:i:s");
        if (changes::Ajouter(
            $date_v,
           
            $devise,
            $type,
            $montant_envoye,           
            $taux,
            $montant_r,   
            $client,
            $telephone,         
           
            $adresse,
            $magasin,
            $date_creation,
            $user_creation,
            $navigateur_creation,
            $ordinateur_creation,
            $ip_creation,          
            $date_creation,
            $user_creation,
            $navigateur_creation,
            $ordinateur_creation,
            $ip_creation         
        )) {
            $message = "Enregistrement de l\'échange  éffectué avec succès.";
            echo json_encode([
                'success' => 'true',
                'message' => $message
            ]);
        } else {
            $message = "Erreur lors de l\'enregistrement de l\'échange.";
            echo json_encode([
                'success' => 'false',
                'message' => $message
            ]);
        }
    } else {
        echo json_encode([
            'success' => 'false',
            'message' => "Vérifier les champs",
            'montant_envoye' => $e_montant_envoye,
            'client' => $e_client,
            'telephone' => $e_telephone,
            'taux' => $e_taux,            
            'date' => $e_date_v,
        ]);
    }
}
// MODIFIER UNE TRANSACTION
if (isset($_POST['bt_modifier'])) {
    // inclusion des fichiers ressources
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Change.php');
    // Récupération des données postés dépuis le formulaire dans les variables respectives
    $client = strSecur($_POST["client_modif"]);

    $adresse = ($_POST["adresse_modif"]);
    $type = strSecur($_POST["radio_type_modif"]);
    $devise = ($_POST["devise_modif"]);

    $taux = ($_POST["taux_modif"]);
    $montant_envoye = ($_POST["montant_modif"]);
    $telephone = strSecur($_POST["telephone_modif"]);
    $date_v = strSecur($_POST["date_vmodif"]);
    $montant_reçu= $montant_envoye * $taux;
    $idModif = strSecur($_POST["idModif"]);
    $e_client = $e_taux  = $e_montant = $e_date_v = " ";
    $succes = true;
    // Vérifications

    if ($client === '') {
        $e_client = "Ce champ ne doit pas être vide.";
        $succes = false;
    }
    if ($taux === '') {
        $e_taux = "Ce champ ne doit pas être vide.";
        $succes = false;
    }

    if ($montant === '') {
        $e_montant = "Ce champ ne doit pas être vide.";
        $succes = false;
    }


    // Cas ou tout est ok
    if ($succes) {
        $ip = getIp();
        $navigateur = getNavigateur();
        $us = $_SESSION["KaspyISS_user"]['users'];
        $pc = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $dt = date("Y-m-d H:i:s");
      if (changes::Modifier(

            $date_v,
          
            $devise,
            $type,
            $montant_envoye,          
            $taux,
            $montant_reçu,    
            $client,
            $telephone,       
           
            $adresse,
            $dt,
            $us,
            $navigateur,
            $pc,
            $ip,
            $idModif

        )) 
        {
            $message = "Mise à jour de l\'échange  éffectué avec succès.";
            echo json_encode([
                'success' => 'true',
                'message' => $message
            ]);
        } else {
            $message = "Erreur lors de la mise à jour de l\' échange.";
            echo json_encode([
                'success' => 'false',
                'message' => $message
            ]);
        }
    } else {
        echo json_encode([
            'success' => 'false',
            'message' => "Vérifier les champs",
            'montant_envoye' => $e_montant_envoye,   
            'client' => $e_client,
            'telephone' => $e_telephone,
            'taux' => $e_taux,
            'date' => $e_date_v,
                    
        ]);
    }
}

// RECUPERATION DES INFO DE LA DERNIERE LIGNE
// if (isset($_GET['idLast'])) {
//     include('../functions/functions.php');
//     include('../config/config.php');
//     include('../config/db.php');
//     include('../models/Change.php');

//     $echange = changes::getLast();

//     if ($echange) {
//         $total = changes::getCount();
//         echo json_encode([
//             'last_change' => $echange,
//             'total' => $total
//         ]);
//     } else {
//         echo json_encode([
//             'last_change' => 'null'
//         ]);
//     }
// }

// RECUPERATION DES INFO DE LA DERNIERE LIGNE
if (isset($_GET['idLast'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Change.php');

    $transactions = changes::getLast();

    if ($transactions) {
        $total = changes::getCount();
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
if (isset($_GET['idChange'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Change.php');

    $id = $_GET['idChange'];
    $proprietes = changes::getByID($id);
    if ($proprietes) {
        echo json_encode([
            'change' => $proprietes,
        ]);
    } else {
        echo json_encode([
            'change' => 'null'
        ]);
    }
}


// RECUPERATION DES INFO POUR PROPRIETE D'UN ELEMENT 
if (isset($_GET['idProprietes'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Change.php');
    $id = $_GET['idProprietes'];
    $echange = changes::getByID($id);
    if ($echange) {
        echo json_encode([
            'changes' => $echange,
        ]);
    } else {
        echo json_encode([
            'changes' => 'null'
        ]);
    }
}


// if (isset($_GET['idSuppr'])) {
//     include('../functions/functions.php');
//     include('../config/config.php');
//     include('../config/db.php');
//     include('../models/Change.php');
//     $id = strSecur($_GET['idSuppr']);
//     if (changes::Supprimer($id)) {       
//     } else {
//         $message = "Erreur impossible de supprimer cette échange.";
//         echo json_encode([
//             'success' => 'false',
//             'message' => $message
//         ]);
//     }
// }



if (isset($_GET['idSuppr'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Change.php');

    $id = strSecur($_GET['idSuppr']);
    if (changes::Supprimer($id)) {
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
