<?php

// AFFICHER LA LISTE DES CONTRATS DE BAILS
$List_types_cartes = null;
if (isset($_GET['page']) and !empty($_GET['page']) and $_GET['page'] === "carte") {
    include("models/Type_carte.php");
    include('models/Carte.php');

    $List_types_cartes = type_carte::getAll();

    // statistiques
    $nbre_cartes = cartes::getCount();
    $nbre_cartes_vendu = cartes::getCountVendu();
    $stat_carte = cartes::getCountTypeCarte();
}



// ENREGISTRER (AJOUTER) UN NOUVELLE ENREGISTREMENT FISCAL DE BAIL

if (isset($_POST['bt_enregistrer'])) {

    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Carte.php');
    include('../models/Type_carte.php');

    $type_enregistrement = strSecur($_POST['radio_type']);
    $date_achat = strSecur($_POST['date_achat']);
    $type = strSecur($_POST['type']);

    $succes = true;
    $error_messages = [];

    if ($type_enregistrement === "individuel") {
        // individuel
        $customer_id = strSecur($_POST['customer_id']);
        $e_type = $e_customer_id = "";

        // vérification des champs requis
        if ($type === "Choisir le type de carte...") {
            $e_type = "Ce champ est requis !";
            $succes = false;
        }

        if (empty($customer_id)) {
            $e_customer_id = "Ce champ ne doit pas être vide.";
            $succes = false;
        }

        if ($succes) {
            $carte = cartes::getByNum($customer_id);
            if ($carte['customer_id'] == $customer_id) {
                echo json_encode(['message' => "Cette carte existe déjà", 'success' => "existe"]);
            } else {
                $result = enregistrerCarte($customer_id, $date_achat, $type);
                echo json_encode($result);
            }
        } else {
            echo json_encode(['success' => 'false', 'message' => "Vérifier les champs", 'customer_id' => $e_customer_id, 'type_carte' => $e_type]);
        }
    } else {
        // par lot
        $customer_id_initial = strSecur($_POST['customer_id_initial']);
        $customer_id_final = strSecur($_POST['customer_id_final']);
        $nombre_carte = $customer_id_final - $customer_id_initial + 1;

        $e_type = $e_customer_id_initial = $e_customer_id_final = "";
        $succes = true;

        // vérification des champs requis
        if ($type === "Choisir le type de carte...") {
            $e_type = "Ce champ est requis !";
            $succes = false;
        }

        if (empty($customer_id_initial)) {
            $e_customer_id_initial = "Ce champ ne doit pas être vide.";
            $succes = false;
        }
        if (empty($customer_id_final)) {
            $e_customer_id_final = "Ce champ ne doit pas être vide.";
            $succes = false;
        }

        if ($succes) {
            $result = enregistrerCarteLot($customer_id_initial, $customer_id_final, $date_achat, $type);
            echo json_encode($result);
        } else {
            echo json_encode([
                'success' => 'false',
                'message' => "Vérifier les champs",
                'customer_id_initial' => $e_customer_id_initial,
                'customer_id_final' => $e_customer_id_final,
                'type_carte' => $e_type,
            ]);
        }
    }
}

function enregistrerCarte($customer_id, $date_achat, $type)
{
    $ip = getIp();
    $navigateur = getNavigateur();
    $us = $_SESSION["KaspyISS_user"]['users'];
    $pc = gethostbyaddr($_SERVER['REMOTE_ADDR']);
    $dt = date("Y-m-d H:i:s");

    if (cartes::Ajouter(
        $customer_id,
        $date_achat,
        $type,
        0,
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
        return ['success' => 'true', 'message' => "Création de carte éffectuée avec succès."];
    } else {
        return ['success' => 'false', 'message' => "Erreur lors de la création de la carte."];
    }
}

function enregistrerCarteLot($customer_id_initial, $customer_id_final, $date_achat, $type)
{
    $ip = getIp();
    $navigateur = getNavigateur();
    $us = $_SESSION["KaspyISS_user"]['users'];
    $pc = gethostbyaddr($_SERVER['REMOTE_ADDR']);
    $dt = date("Y-m-d H:i:s");

    $succes = true;

    for ($i = 0; $i < $customer_id_final - $customer_id_initial + 1; $i++) {
        $customer_id_card = $customer_id_initial + $i;
        if (!cartes::Ajouter(
            $customer_id_card,
            $date_achat,
            $type,
            0,
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
            $succes = false;
            break;
        }
    }

    if ($succes) {
        return ['success' => 'true', 'message' => "Création des cartes éffectuée avec succès."];
    } else {
        return ['success' => 'false', 'message' => "Erreur lors de la création des cartes."];
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
$status = "en stock";
// Appel de la fonction Modifier de la classe Carte
if (cartes::Modifier(
$customer_id,
$date_activation,
$date_expiration,
$type,
$format_duree,
$status,
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