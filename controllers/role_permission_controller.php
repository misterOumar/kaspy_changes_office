<?php
// AFFICHER LA LISTE DES role
$Liste_Role_permission = null;
if (isset($_GET['page']) and !empty($_GET['page']) and $_GET['page'] === "role_permission") {
    include("models/Role_permission.php");
    include("models/Role_permission_details.php");
    include("models/Proprietaires.php");
    $Liste_Role_permission = role_permission::getAll();
    $Liste_Role_permission_details = role_permission_details::getAll();
    
    // $Listes_proprietaires = proprietaires::getAll();
}



// ENREGISTRER (AJOUTER) UN NOUVEAU ROLE
if (isset($_POST['bt_enregistrer'])) {

    // inclusion des fichiers ressources
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Role_permission.php');
    include('../models/Role_permission_details.php');

    // Récupération des données postés dépuis le formulaire dans les variables respectives
    $libelle = strSecur($_POST["libelle"]);

    // $lecture = strSecur($_POST["lecture"]);
    // $creation = strSecur($_POST["creation"]);
    // $modification = strSecur($_POST["modification"]);
    // $suppression = strSecur($_POST["suppression"]);
    // $duplicata = strSecur($_POST["duplicata"]);
    // $visualisation = strSecur($_POST["visualisation"]);
    // $exportation = strSecur($_POST["exportation"]);


    // Déclaration et initialisation des variables d'erreur (e)
    $e_libelle = "";
    $succes = true;

    // Vérifications
    if (empty($libelle)) {
        $e_libelle = "Ce champ ne doit pas être vide.";
        $succes = false;
    }



    // Cas ou tout est ok
    if ($succes) {
        $role_permission = role_permission::getByNom($libelle);
        if ($role_permission['libelle'] == $libelle) {
            $message = "Ce libellé existe déjà";
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
            if (role_permission::Ajouter($id, $libelle, $dt, $us, $navigateur, $pc, $ip, $dt, $us, $navigateur, $pc, $ip)) {

                // Récupération du dernier id
                $role = role_permission::getLast();
                $role = (intval($role['id']));


                // Création des roles et permission detail
                for ($i = 1; $i < 22; $i++) {
                    try {
                        $fonction = strSecur($_POST["role" . $i]);

                        $lecture = strSecur($_POST["lecture" . $i]);
                        $creation = strSecur($_POST["creation" . $i]);
                        $modification = strSecur($_POST["modification" . $i]);
                        $suppression = strSecur($_POST["suppression" . $i]);
                        $duplicata = strSecur($_POST["duplicata" . $i]);
                        $visualisation = strSecur($_POST["visualisation" . $i]);
                        $exportation = strSecur($_POST["exportation" . $i]);

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

                        role_permission_details::Ajouter($id, $role, $fonction, $valeur_lecture, $valeur_creation, $valeur_modification, $valeur_suppression, $valeur_duplicata, $valeur_visualisation, $valeur_exportation, $dt, $us, $navigateur, $pc, $ip, $dt, $us, $navigateur, $pc, $ip);
                    } catch (PDOException $e) {
                        echo $e->getMessage();
                    }
                }


                $message = "Création de role éffectuée avec succès.";
                echo json_encode([
                    'success' => 'true',
                    'message' => $message
                ]);
            } else {
                $message = "Erreur lors de la création du role.";
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
        ]);
    }
}


// MODIFIER UNE role
if (isset($_POST['bt_modifier'])) {
    // inclusion des fichiers ressources
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Role_permission.php');
    include('../models/Role_permission_details.php');
    
    

    // Récupération des données postés dépuis le formulaire dans les variables respectives
    $libelle = strSecur($_POST["libelle_modif"]);
    $idModif = intval(strSecur($_POST["idModif"]));
    // Déclaration et initialisation des variables d'erreur (e)
    $e_libelle = "";
    $succes = true;
 
    // Vérifications
    if (empty($libelle)) {
        $e_libelle = "Ce champ ne doit pas être vide.";
        $succes = false;
    }


    // Cas ou tout est ok
    if ($succes) {
        $lastData = role_permission::getByID($idModif);
        $marque = role_permission::getByNom($libelle);

        // if ($marque['nom'] === $nom && $marque['nom'] !== $lastData['nom']) {
        //     $message = "Ce libellé existe déjà";
        //     echo json_encode([
        //         'message' => $message,
        //         'success' => "existe"
        //     ]);
        // } else {
        $ip = getIp();
        $navigateur = getNavigateur();
        $us = $_SESSION["KaspyISS_user"]['users'];
        $pc = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $dt = date("Y-m-d H:i:s");
        $ip_modif = getIp();
        $navigateur_modif = getNavigateur();
        $user_modif = $_SESSION["KaspyISS_user"]['users'];
        $ordinateur_modif = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        
        $date_modif = date("Y-m-d H:i:s");
        if (role_permission::Modifier($libelle, $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif, $idModif)) {
            role_permission_details::Supprimer($idModif);
            //boucle d'enregistrement des roles dans la base de données
            for ($i = 1; $i < 22; $i++) {
                try {
                    //recuperation des roles depuis le formulaire
                    $fonction = strSecur($_POST["role_modif" . $i]);
                    $lecture = strSecur($_POST["lecture_modif" . $i]);
                    $creation = strSecur($_POST["creation_modif" . $i]);
                    $modification = strSecur($_POST["modification_modif" . $i]);
                    $suppression = strSecur($_POST["suppression_modif" . $i]);
                    $duplicata = strSecur($_POST["duplicata_modif" . $i]);
                    $visualisation = strSecur($_POST["visualisation_modif" . $i]);
                    $exportation = strSecur($_POST["exportation_modif" . $i]);


                    //attribution de 1 si cochez et 0 si non
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

                    // enregistrement dans la bd
                    role_permission_details::Ajouter($id, $idModif, $fonction, $valeur_lecture, $valeur_creation, 
                    $valeur_modification, $valeur_suppression, $valeur_duplicata, $valeur_visualisation, $valeur_exportation, 
                    $dt, $us, $navigateur, $pc, $ip, $dt, $us, $navigateur, $pc, $ip);
                } catch (PDOException $e) {
                    echo $e->getMessage();
                };
            };
            $message = "Modification du role éffectuée avec succès.";
            echo json_encode([
                'success' => 'true',
                'message' => $message
            ]);
        } else {
            $message = "Erreur lors de la modification du role.";
            echo json_encode([
                'success' => 'false',
                'message' => $message
            ]);
        }
        // }
    } else {
        echo json_encode([
            'success' => 'false',
            'message' => "Vérifier les champs",
            'libelle' => $e_libelle,
        ]);
    }
}

// RECUPERATION DES INFO DE LA DERNIERE LIGNE
if (isset($_GET['idLast'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Role_permission.php');
    $role_permission = role_permission::getLast();
    if ($role_permission) {
        $total = role_permission::getCount();
        echo json_encode([
            'last_role_permission' => $role_permission,
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
    include('../models/Role_permission.php');
    include('../models/Role_permission_details.php');

    $id = $_GET['idProprietes'];
    $proprietes = role_permission::getByID($id);
    $proprietes_details = role_permission_details::getDetailsByID($id);

    if ($proprietes) {
        echo json_encode([
            'proprietes_role_permission' => $proprietes,
            'proprietes_role_permission_details' => $proprietes_details,
        ]);
    } else {
        echo json_encode([
            'proprietes_role_permission' => 'null',
            'proprietes_role_permission_details' => 'null',

        ]);
    }
}

// SUPPRESSION DU role
if (isset($_GET['idSuppr'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Role_permission.php');
    include('../models/Role_permission_details.php');

    $id = strSecur($_GET['idSuppr']);
    if (role_permission::Supprimer($id)) {
        role_permission_details::Supprimer($id);
        $message = "role supprimée avec succès.";
        echo json_encode([
            'success' => 'true',
            'message' => $message
        ]);
    } else {
        $message = "Erreur impossible de supprimer ce role.";
        echo json_encode([
            'success' => 'false',
            'message' => $message
        ]);
    }
}

// RECUPERATION DES INFOS D'ACCES STOCKER DANS LA SESSION
if (isset($_GET['DroitAccess'])) {

    session_start() ;
    if ($_SESSION['KaspyISS_user_details']) {    
        echo json_encode([
            'DroisAcces_ActifUser' => ($_SESSION['KaspyISS_user_details']),
        ]);
    } else {
        echo json_encode([
            'DroisAcces_ActifUser' => 'null',
        ]);
    }
}