<?php
// AFFICHER LA LISTE DES Role_permission
$Liste_Role_permission = null;
if (isset($_GET['page']) and !empty($_GET['page']) and $_GET['page'] === "role_permission_details") {
    include("models/Role_permission.php");
    include("models/Role_permission_details.php");

    $Liste_Role_permission = role_permission::getAll();
    $Liste_Role_permission_details = role_permission_details::getAll();

}



// ENREGISTRER (AJOUTER) UN NOUVEAU role permissions_details
if (isset($_POST['bt_enregistrer'])) {

    // inclusion des fichiers ressources
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Role_permission_details.php');

    // Récupération des données postés dépuis le formulaire dans les variables respectives
    $role_permission = strSecur($_POST["role_permission"]);
    $fonction = strSecur($_POST["fonction"]);
    

    $lecture = strSecur($_POST["lecture"]);
    $creation = strSecur($_POST["creation"]);
    $modification = strSecur($_POST["modification"]);
    $suppression = strSecur($_POST["suppression"]);
    $duplicata = strSecur($_POST["duplicata"]);
    $visualisation = strSecur($_POST["visualisation"]);
    $exportation = strSecur($_POST["exportation"]);

    // Déclaration et initialisation des variables d'erreur (e)
    $e_role_permission = $e_fonction = "";
    $succes = true;

    // Vérifications
    if ($role_permission == "Choisir de role...") {
        $e_role_permission = "Ce champ est requis.";
        $succes = false;
    }

    if (empty($fonction)) {
        $e_fonction = "Ce champ ne doit pas être vide.";
        $succes = false;
    }

    $valeur_lecture;
    if ($lecture === "on") {
        $valeur_lecture = 1;
    } else {
        $valeur_lecture = 0;
    }

    $valeur_creation;
    if ($creation === "on") {
        $valeur_creation = 1;
    } else {
        $valeur_creation = 0;
    }

    $valeur_modification;
    if ($modification === "on") {
        $valeur_modification = 1;
    } else {
        $valeur_modification = 0;
    }

    
    $valeur_suppression;
    if ($suppression === "on") {
        $valeur_suppression = 1;
    } else {
        $valeur_suppression = 0;
    }

    $valeur_duplicata;
    if ($duplicata === "on") {
        $valeur_duplicata = 1;
    } else {
        $valeur_duplicata = 0;
    }

    $valeur_visualisation;
    if ($visualisation === "on") {
        $valeur_visualisation = 1;
    } else {
        $valeur_visualisation = 0;
    }

    $valeur_exportation;
    if ($exportation === "on") {
        $valeur_exportation = 1;
    } else {
        $valeur_exportation = 0;
    }

    // Cas ou tout est ok
    if ($succes) {
            $ip = getIp();
            $navigateur = getNavigateur();
            $us = $_SESSION["KaspyISS_user"]['users'];
            $pc = gethostbyaddr($_SERVER['REMOTE_ADDR']);
            $dt = date("Y-m-d H:i:s");
            if (role_permission_details::Ajouter($id, $role_permission, $fonction, $lecture, $creation, $modification, $suppression, $duplicata, $visualisation, $exportation, $date_creation, $user_creation, $navigateur_creation, $ordinateur_creation, $ip_creation, $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif)) {
                $message = "Création du details de role éffectuée avec succès.";
                echo json_encode([
                    'success' => 'true',
                    'message' => $message
                ]);
            } else {
                $message = "Erreur lors de la création du details de role.";
                echo json_encode([
                    'success' => 'false',
                    'message' => $message
                ]);
            }
    } else {
        echo json_encode([
            'success' => 'false',
            'message' => "Vérifier les champs",
            'role_permission' => $e_role_permission,
            'fonction' => $e_fonction,
        ]);
    }
}


// MODIFIER UNE role permission details
if (isset($_POST['bt_modifier'])) {
    // inclusion des fichiers ressources
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Role_permission_details.php');

    // Récupération des données postés dépuis le formulaire dans les variables respectives
    // Récupération des données postés dépuis le formulaire dans les variables respectives
    $role_permission = strSecur($_POST["role_permission_modif"]);
    $fonction = strSecur($_POST["fonction_modif"]);
    

    $lecture = strSecur($_POST["lecture_modif"]);
    $creation = strSecur($_POST["creation_modif"]);
    $modification = strSecur($_POST["modification_modif"]);
    $suppression = strSecur($_POST["suppression_modif"]);
    $duplicata = strSecur($_POST["duplicata_modif"]);
    $visualisation = strSecur($_POST["visualisation_modif"]);
    $exportation = strSecur($_POST["exportation_modif"]);


    $idModif = strSecur($_POST["idModif"]);




    // Déclaration et initialisation des variables d'erreur (e)
    $e_role_permission = $e_fonction = "";
    $succes = true;

    // Vérifications
    if ($role_permission == "Choisir de role...") {
        $e_role_permission = "Ce champ est requis.";
        $succes = false;
    }

    if (empty($fonction)) {
        $e_fonction = "Ce champ ne doit pas être vide.";
        $succes = false;
    }



    $valeur_lecture;
    if ($lecture === "on") {
        $valeur_lecture = 1;
    } else {
        $valeur_lecture = 0;
    }

    $valeur_creation;
    if ($creation === "on") {
        $valeur_creation = 1;
    } else {
        $valeur_creation = 0;
    }

    $valeur_modification;
    if ($modification === "on") {
        $valeur_modification = 1;
    } else {
        $valeur_modification = 0;
    }

    
    $valeur_suppression;
    if ($suppression === "on") {
        $valeur_suppression = 1;
    } else {
        $valeur_suppression = 0;
    }

    $valeur_duplicata;
    if ($duplicata === "on") {
        $valeur_duplicata = 1;
    } else {
        $valeur_duplicata = 0;
    }

    $valeur_visualisation;
    if ($visualisation === "on") {
        $valeur_visualisation = 1;
    } else {
        $valeur_visualisation = 0;
    }

    $valeur_exportation;
    if ($exportation === "on") {
        $valeur_exportation = 1;
    } else {
        $valeur_exportation = 0;
    }


    // Cas ou tout est ok
    if ($succes) {


        $lastData = role_permission_details::getByID($idModif);

            $ip = getIp();
            $navigateur = getNavigateur();
            $us = $_SESSION["KaspyISS_user"]['users'];
            $pc = gethostbyaddr($_SERVER['REMOTE_ADDR']);
            $dt = date("Y-m-d H:i:s");

            if (role_permission_details::Modifier($role_permission, $fonction, $valeur_lecture,$valeur_creation,$valeur_modification, $valeur_suppression, $valeur_duplicata,$valeur_visualisation,$valeur_exportation, $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif, $id)) {
                $message = "Modification du role details éffectuée avec succès.";
                echo json_encode([
                    'success' => 'true',
                    'message' => $message
                ]);
            } else {
                $message = "Erreur lors de la modification du role details.";
                echo json_encode([
                    'success' => 'false',
                    'message' => $message
                ]);
            }
        
    } else {
        echo json_encode([
            'success' => 'false',
            'message' => "Vérifier les champs",
            'role_permission' => $e_role_permission,
            'fonction' => $e_fonction,
        ]);
    }
}



// RECUPERATION DES INFO DE LA DERNIERE LIGNE
if (isset($_GET['idLast'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Role_permission_details.php');

    $role_permission_details = role_permission_details::getLast();

    if ($role_permission_details) {
        $total = role_permission_details::getCount();
        echo json_encode([
            'last_role_permission_details' => $role_permission_details,
            'total' => $total
        ]);
    } else {
        echo json_encode([
            'last_salle' => 'null'
        ]);
    }
}



// RECUPERATION DES INFO POUR PROPRIETE D'UN ELEMENT 
if (isset($_GET['idProprietes'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Role_permission_details.php');

    $id = $_GET['idProprietes'];
    $proprietes = role_permission_details::getByID($id);

    if ($proprietes) {
        echo json_encode([
            'proprietes_role_permission_details' => $proprietes,
        ]);
    } else {
        echo json_encode([
            'proprietes_role_permission_details' => 'null'
        ]);
    }
}


// SUPPRESSION DU role details
if (isset($_GET['idSuppr'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Role_permission_details.php');

    $id = strSecur($_GET['idSuppr']);
    if (role_permission_details::Supprimer($id)) {
        $message = "role details supprimée avec succès.";
        echo json_encode([
            'success' => 'true',
            'message' => $message
        ]);
        
    } else {
        $message = "Erreur impossible de supprimer ce role details.";
        echo json_encode([
            'success' => 'false',
            'message' => $message
        ]);
    }
    var_dump($message);
    die();
}
