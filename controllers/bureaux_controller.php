<?php
// Récupération des info du bureau
$info_bureau = null;
if (isset($_GET['page']) and !empty($_GET['page']) and $_GET['page'] === "bureaux") {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('./models/Bureaux.php');

    $info_bureau = bureaux::getLast();
}



// MODIFIER UN BUREAUX
if (isset($_POST['bt_maj'])) {
    // inclusion des fichiers ressources
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Bureaux.php');

    // Récupération des données postés dépuis le formulaire dans les variables respectives
    $libelle = strSecur($_POST['libelle']);
    $responsable = strSecur($_POST['responsable']);
    $raison_sociale = strSecur($_POST['raison_sociale']);
    $pays = strSecur($_POST['pays']);
    $ville = strSecur($_POST['ville']);
    $adresse = strSecur($_POST['adresse']);
    $sigle = strSecur($_POST['sigle']);
    $slogan = strSecur($_POST['slogan']);

    $fixe = strSecur($_POST['fixe']);
    $fax = strSecur($_POST['fax']);
    $tel1 = strSecur($_POST['tel1']);
    $tel2 = strSecur($_POST['tel2']);
    $email = strSecur($_POST['email']);
    $bp = strSecur($_POST['bp']);
    $site_internet = strSecur($_POST['site_internet']);

    $activites = strSecur($_POST['activites']);
    $forme_juridique = strSecur($_POST['forme_juridique']);
    $rccm = strSecur($_POST['rccm']);
    $compte_contribuable = strSecur($_POST['compte_contribuable']);
    $regime_imposition = strSecur($_POST['regime_imposition']);
    $centre_impôts = strSecur($_POST['centre_impôts']);
    $capital_social = strSecur($_POST['capital_social']);
    $compte_Bancaire = strSecur($_POST['compte_Bancaire']);
    $monnaie = strSecur($_POST['monnaie']);
    $n_agrement_1 = strSecur($_POST['n_agrement_1']);
    $n_agrement_2 = strSecur($_POST['n_agrement_2']);
   
    $info_bureau = bureaux::getLast();
    $idModif = $info_bureau['id'];


    // Déclaration et initialisation des variables d'erreur (e)
    $e_libelle = $e_email = $e_tel1 = '';
    $succes = true;

    // Vérifications
    if (empty($libelle)) {
        $e_libelle = 'Ce champ ne doit pas être vide.';
        $succes = false;
    }
    if (empty($email)) {
        $e_email = 'Ce champ ne doit pas être vide.';
        $succes = false;
    }
    if (empty($tel1)) {
        $e_tel1 = 'Ce champ ne doit pas être vide.';
        $succes = false;
    }


    // Cas ou tout est ok
    if ($succes) {
        $ip = getIp();
        $navigateur = getNavigateur();
        $annee = $_SESSION["KaspyISS_annee"];
        $ecole = $_SESSION["KaspyISS_bureau"];
        $us = $_SESSION["KaspyISS_user"]['users'];
        $pc = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $dt = date("Y-m-d H:i:s");

        if (bureaux::Modifier($libelle, $responsable, $raison_sociale, $adresse, $sigle, $slogan, $tel1, $tel2, $fixe, $fax, $email, $bp, $site_internet, $pays, $ville, $activites, $forme_juridique, $rccm, $compte_contribuable, $regime_imposition, $centre_impôts, $capital_social, $compte_Bancaire, $monnaie, $n_agrement_1, $n_agrement_2, $annee, $ecole, $dt, $us, $navigateur, $pc, $ip, $idModif)) {
            
            // Actualisation de la sesion
            $message = "Mise à jour du dossier entreprise éffectué avec succès.";
            echo json_encode([
                'success' => 'true',
                'message' => $message
            ]);
        } else {
            $message = "Erreur lors de la mise à jour du dossier entreprise.";
            echo json_encode([
                'success' => 'false',
                'message' => $message
            ]);
        }
    } else {
        echo json_encode([
            'success' => 'false',
            'message' => 'Vérifier les champs',
            'libelle' => $e_libelle,
            'email' => $e_email,
            'tel1' => $e_tel1,
        ]);
    }
}
