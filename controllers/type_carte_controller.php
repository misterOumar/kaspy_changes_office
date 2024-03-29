<?php
// GESTION DE L'ENREGISTREMENT D'UN NOUVEAU TYPE DE CARTE
if (isset($_POST['bt_enregistrer'])) {
    // inclusion des fichiers ressources
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Type_carte.php');
    include('../models/Bureaux.php');

    // Récupération des données du formulaire
    $libelle = strSecur($_POST["libelle"]);
    $duree = strSecur($_POST["duree"]);
    $prix_achat = strSecur($_POST["prix_achat"]);
    $prix_vente_detail = strSecur($_POST["prix_vente_detail"]);
    $prix_vente_gros = strSecur($_POST["prix_vente_gros"]);

    // Initialisation des messages d'erreur
    $e_duree = $e_libelle = "";
    $succes = true;

    // Vérification des champs obligatoires
    if ($libelle == "") {
        $e_libelle = "Ce champ est requis.";
        $succes = false;
    }
    if ($duree == "") {
        $e_duree = "Ce champ est requis.";
        $succes = false;
    }

    // Traitement en cas de succès ou d'échec
    if ($succes) {
        $type_carte = type_carte::getByNom($libelle);
        if ($type_carte['libelle'] == $libelle) {
            $message = "Ce type de carte existe déjà";
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
            if (type_carte::Ajouter($libelle, $duree, $prix_achat, $prix_vente_detail, $prix_vente_gros, $dt, $us, $navigateur, $pc, $ip, $dt, $us, $navigateur, $pc, $ip)) {
                $message = "Création du type de carte éffectué avec succès.";
                echo json_encode([
                    'success' => 'true',
                    'message' => $message
                ]);
            } else {
                $message = "Erreur lors de la création du type de carte.";
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
            'duree' => $e_duree,
        ]);
    }
}

// MODIFICATION D'UN TYPE DE CARTE EXISTANT
if (isset($_POST['bt_modifier'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Type_carte.php');

    $idModif = strSecur($_POST["idModif"]);
    $libelle = strSecur($_POST["libellemodif"]);
    $duree = strSecur($_POST["dureemodif"]);
    $prix_achat = strSecur($_POST["prix_achat_modif"]);
    $prix_vente_detail = strSecur($_POST["prix_vente_detail_modif"]);
    $prix_vente_gros = strSecur($_POST["prix_vente_gros_modif"]);

    $e_duree = $e_libelle = "";
    $succes = true;
    if (empty($duree)) {
        $e_duree = "Ce champ est requis.";
        $succes = false;
    }
    if ($libelle == " Définir le libelle...") {
        $e_libelle = "Ce champ est requis.";
        $succes = false;
    }

    // Traitement en cas de succès ou d'échec
    if ($succes) {
        $lastData = type_carte::getByID($idModif);
        $carte = type_carte::getByNom($libelle);
        if ($carte['libelle'] === $libelle && $carte['libelle'] !== $lastData['libelle']) {
            $message = 'Ce libellé existe déjà';
            echo json_encode([
                'message' => $message,
                'success' => 'existe'
            ]);
        } else {
            $ip = getIp();
            $navigateur = getNavigateur();
            $us = $_SESSION["KaspyISS_user"]['users'];
            $pc = gethostbyaddr($_SERVER['REMOTE_ADDR']);
            $dt = date("Y-m-d H:i:s");

            if (type_carte::Modifier($libelle, $duree, $prix_achat, $prix_vente_detail, $prix_vente_gros, $dt, $us, $navigateur, $pc, $ip, $idModif)) {
                $message = "Modification du type de carte éffectuée avec succès.";
                echo json_encode([
                    'success' => 'true',
                    'message' => $message
                ]);
            } else {
                $message = "Erreur lors de la modification du type de carte.";
                echo json_encode([
                    'success' => 'non',
                    'message' => $message
                ]);
            }
        }
    } else {
        echo json_encode([
            'success' => 'false',
            'message' => "Vérifier les champs",
            'libelle' => $e_libelle,
            'duree' => $e_duree,
        ]);
    }
}

// RECUPERATION DU DERNIER TYPE DE CARTE
if (isset($_GET['idLast'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Type_carte.php');

    $type_carte = type_carte::getLast();

    if ($type_carte) {
        $total = type_carte::getCount();
        echo json_encode([
            'last_libelle' => $type_carte,
            'total' => $total,
        ]);
    } else {
        echo json_encode([
            'last_libelle' => 'null'
        ]);
    }
}


// RECUPERATION DES INFO POUR LA MODIFICATION
if (isset($_GET['idTypeCarte'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Type_carte.php');

    $id = $_GET['idTypeCarte'];
    $proprietes = type_carte::getByID($id);
    if ($proprietes) {
        echo json_encode([
            'type_carte' => $proprietes,
        ]);
    } 
    else {
        echo json_encode([
            'type_carte' => 'null'
        ]);
    }
}


// SUPPRESSION DU TYPE DE CARTE
if (isset($_GET['idSuppr'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Type_carte.php');

    $id = strSecur($_GET['idSuppr']);
    if (type_carte::Supprimer($id)) {
        $message = "type carte supprimé avec succès.";
        echo json_encode([
            'success' => 'true',
            'message' => $message
        ]);
    } else {
        $message = "Erreur impossible de supprimer le type de carte.";
        echo json_encode([
            'success' => 'false',
            'message' => $message
        ]);
    }
}
