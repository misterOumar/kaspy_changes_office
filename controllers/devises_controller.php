<?php
// GESTION DE L'ENREGISTREMENT D'UNE DEVISE
if (isset($_POST['bt_enregistrer'])) {
    // inclusion des fichiers ressources
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Bureaux.php');
    include('../models/Devise.php');

    // Récupération des données du formulaire
    $libelle = strSecur($_POST["libelle"]);
    $symbole = strSecur($_POST["symbole"]);
    $type = strSecur($_POST["type"]);
    $pays = strSecur($_POST["pays"]);
    $taux_achat = strSecur($_POST["taux_achat"]);
    $taux_vente = strSecur($_POST["taux_vente"]);

    // Initialisation des messages d'erreur
    $e_symbole = $e_libelle = $e_taux_vente = $e_taux_achat = "";
    $succes = true;

    // Vérification des champs obligatoires
    if ($libelle == "") {
        $e_libelle = "Ce champ est requis.";
        $succes = false;
    }

    if ($symbole == "") {
        $e_symbole = "Ce champ est requis.";
        $succes = false;
    }

    if ($taux_vente == "") {
        $e_taux_vente = "Ce champ est requis.";
        $succes = false;
    }

    if ($taux_achat == "") {
        $e_taux_achat = "Ce champ est requis.";
        $succes = false;
    }

    // Traitement en cas de succès ou d'échec
    if ($succes) {
        $devise = devise::getByNom($libelle);
        $devise_type_locale = devise::getByType("locale");
        if ($devise['libelle'] == $libelle) {
            $message = "Cette devise existe déjà";
            echo json_encode([
                'message' => $message,
                'success' => "existe"
            ]);
        }elseif ($type == "locale" && $devise_type_locale) {
            $message = "Une devise locale existe déjà";
            echo json_encode([
                'message' => $message,
                'success' => "existe_devise_type_locale"
            ]);
        } else {
            $ip = getIp();
            $navigateur = getNavigateur();
            $us = $_SESSION["KaspyISS_user"]['users'];
            $pc = gethostbyaddr($_SERVER['REMOTE_ADDR']);
            $dt = date("Y-m-d H:i:s");
            $magasin = $_SESSION["KaspyISS_bureau"];

            if (devise::Ajouter($libelle, $symbole, $type, $taux_achat, $taux_vente, $pays, $magasin, $dt, $us, $navigateur, $pc, $ip, $dt, $us, $navigateur, $pc, $ip)) {
                $message = "Création de la dévise éffectué avec succès.";
                echo json_encode([
                    'success' => 'true',
                    'message' => $message
                ]);
            } else {
                $message = "Erreur lors de la création de la dévise.";
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
            'symbole' => $e_symbole,
            'taux vente' => $taux_vente,
            'taux achat' => $e_taux_achat,
        ]);
    }
}

// MODIFICATION D'UNE DEVISE EXISTANTE
if (isset($_POST['bt_modifier'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Devise.php');

    // Récupération des données du formulaire
    $idModif = strSecur($_POST["idModif"]);
    $libelle = strSecur($_POST["libelle_modif"]);
    $symbole = strSecur($_POST["symbole_modif"]);
    $type = strSecur($_POST["type_modif"]);
    $pays = strSecur($_POST["pays_modif"]);
    $taux_achat = strSecur($_POST["taux_achat_modif"]);
    $taux_vente = strSecur($_POST["taux_vente_modif"]);


    // Initialisation des messages d'erreur
    $e_symbole = $e_libelle = $e_taux_vente = $e_taux_achat = "";
    $succes = true;

    if (empty($libelle)) {
        $e_libelle = "Ce champ est requis.";
        $succes = false;
    }

    if (empty($symbole)) {
        $e_symbole = "Ce champ est requis.";
        $succes = false;
    }

    if (empty($taux_achat)) {
        $e_taux_achat = "Ce champ est requis.";
        $succes = false;
    }

    if (empty($taux_vente)) {
        $e_taux_vente = "Ce champ est requis.";
        $succes = false;
    }


    // Traitement en cas de succès ou d'échec
    if ($succes) {
        $lastData = devise::getByID($idModif);
        $devise_type_locale = devise::getByType("locale");
        $devise = devise::getByNom($libelle);
        if ($devise['libelle'] === $libelle && $devise['libelle'] !== $lastData['libelle']) {
            $message = 'Cette dévise existe déjà';
            echo json_encode([
                'message' => $message,
                'success' => 'existe'
            ]);
        }elseif ($type == "locale" && $devise_type_locale) {
            $message = "Une devise locale existe déjà";
            echo json_encode([
                'message' => $message,
                'success' => "existe_devise_type_locale"
            ]);
        } else {
            $ip = getIp();
            $navigateur = getNavigateur();
            $us = $_SESSION["KaspyISS_user"]['users'];
            $pc = gethostbyaddr($_SERVER['REMOTE_ADDR']);
            $dt = date("Y-m-d H:i:s");
            $magasin = $_SESSION["KaspyISS_bureau"];

            // var_dump($idModif, $libelle, $symbole, $type, $taux_achat, $taux_vente, $pays);


            if (devise::Modifier($libelle, $symbole, $type, $taux_achat, $taux_vente, $pays, $magasin, $dt, $us, $navigateur, $pc ,$ip,  $idModif)) {
                $message = "Modification de la devise éffectuée avec succès.";
                echo json_encode([
                    'success' => 'true',
                    'message' => $message
                ]);
            } else {
                $message = "Erreur lors de la modification de la devise.";
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
            'symbole' => $e_symbole,
            'taux vente' => $taux_vente,
            'taux achat' => $e_taux_achat,
        ]);
    }
}

// RECUPERATION DU DERNIER TYPE DE CARTE
if (isset($_GET['idLast'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Devise.php');

    $devise = devise::getLast();

    if ($devise) {
        $total = devise::getCount();
        echo json_encode([
            'last_libelle' => $devise,
            'total' => $total,
        ]);
    } else {
        echo json_encode([
            'last_libelle' => 'null'
        ]);
    }
}


// RECUPERATION DES INFO POUR LA MODIFICATION
if (isset($_GET['idDevise'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Devise.php');

    $id = $_GET['idDevise'];
    $proprietes = devise::getByID($id);
    if ($proprietes) {
        echo json_encode([
            'devise' => $proprietes,
        ]);
    } else {
        echo json_encode([
            'devise' => 'null'
        ]);
    }
}


// SUPPRESSION DE LA DEVISE
if (isset($_GET['idSuppr'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Devise.php');

    $id = strSecur($_GET['idSuppr']);
    if (devise::Supprimer($id)) {
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
