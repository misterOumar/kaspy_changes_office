<?php 
// AFFICHER LA LISTE DES ANNEES
// $Liste_Annees = null;
// if (isset($_GET['page']) and !empty($_GET['page']) and $_GET['page'] === "api_annees") {
//     include("models/Annees.php");
//     include("models/Contrat_bail.php");
//     include("models/Appartement.php");

//     $Liste_Annees = annees::getAll();
// }

// SELECT
$annees = null;
if (isset($_GET['page']) and !empty($_GET['page']) and $_GET['page'] === 'annees') {
    include("models/Annees.php");

    $annees = Annees::getAll();
}


// ENREGISTRER (AJOUTER) UN NOUVEL ANNEE
if (isset($_POST['bt_enregistrer'])) {
    // inclusion des fichiers ressources
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Annees.php');

    // Récupération des données postés dépuis le formulaire dans les variables respectives
    $annees = strSecur($_POST["annees"]);
    $date_debut = strSecur($_POST["date_debut"]);
    $date_fin = strSecur($_POST["date_fin"]);

    // Déclaration et initialisation des variables d'erreur (e)
    $e_annees = $e_date_debut = $e_date_fin = "";
    $succes = true;

    // Vérifications
    if (empty($annees)) {
        $e_annees = "Ce champ ne doit pas être vide.";
        $succes = false;
    }
    if (empty($date_debut)) {
        $e_date_debut = "Ce champ ne doit pas être vide.";
        $succes = false;
    } 
    if (empty($date_fin)) {
        $e_date_fin = "Ce champ ne doit pas être vide.";
        $succes = false;
    }

    // Cas ou tout est ok
    if ($succes) {
        $annee = annees::getByNom($annees);
        if ($annee['annees'] == $annees) {
            $message = "Cette annees existe déjà ah";
            echo json_encode([
                'message' => $message,
                'success' => "existe"
            ]);
        } else {
            $ip = getIp();
            $navigateur = getNavigateur();
            $annee = $_SESSION["KaspyISS_annee"];
            $ecole = $_SESSION["KaspyISS_bureau"];
            $us = $_SESSION["KaspyISS_user"]['users'];
            $pc = gethostbyaddr($_SERVER['REMOTE_ADDR']);
            $dt = date("Y-m-d H:i:s");
            if (annees::Ajouter($id, $annees, $date_debut, $date_fin, $ecole, $dt, $us, $navigateur, $pc, $ip, $dt, $us, $navigateur, $pc, $ip)) {
                $message = "Création de l' annee éffectuée avec succès.";
                echo json_encode([
                    'success' => 'true',
                    'message' => $message
                ]);
            } else {
                $message = "Erreur lors de la création de l'année.";
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
            'annees' => $e_annees,
            'date_debut' => $e_date_debut,
            'date_fin' => $e_date_fin,
        ]);
    }
}

// MODIFIER UNE BATIMENT
if (isset($_POST['bt_modifier'])) {
    // inclusion des fichiers ressources
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Annees.php');

    // Récupération des données postés dépuis le formulaire dans les variables respectives
    $annees = strSecur($_POST["annees_modif"]);
    $date_debut = strSecur($_POST["date_debut_modif"]);
    $date_fin = strSecur($_POST["date_fin_modif"]);
    $idModif = strSecur($_POST["idModif"]);





    // Déclaration et initialisation des variables d'erreur (e)
    $e_annees = $e_date_debut= $e_date_fin = "";
    $succes = true;

    // Vérifications
    if (empty($annees)) {
        $e_annees = "Ce champ ne doit pas être vide.";
        $succes = false;
    }

    if (empty($date_debut)) {
        $e_date_debut = "Ce champ est requis.";
        $succes = false;
    }
    if (empty($date_fin)) {
        $e_date_fin = "Ce champ ne doit pas être vide.";
        $succes = false;
    }


    // Cas ou tout est ok
    if ($succes) {
        $annee = annees::getByNom($annees);
        if ($annee['annees'] == $annees) {
            $message = "Cette annees existe déjà ah";
            echo json_encode([
                'message' => $message,
                'success' => "existe"
            ]);
        } else {
            $ip = getIp();
            $navigateur = getNavigateur();
            $annee = $_SESSION["KaspyISS_annee"];
            $ecole = $_SESSION["KaspyISS_bureau"];
            $us = $_SESSION["KaspyISS_user"]['users'];
            $pc = gethostbyaddr($_SERVER['REMOTE_ADDR']);
            $dt = date("Y-m-d H:i:s");
            if (annees::Modifier($annees, $date_debut, $date_fin, $ecole, $dt, $us, $navigateur, $pc, $ip, $idModif)) {
                $message = "Modification de l' annee éffectuée avec succès.";
                echo json_encode([
                    'success' => 'true',
                    'message' => $message
                ]);
            } else {
                $message = "Erreur lors de la modification de l'année.";
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
            'annees' => $e_annees,
            'date_debut' => $e_date_debut,
            'date_fin' => $e_date_fin,
        ]);
    }
}


// RECUPERATION DES INFO DE LA DERNIERE LIGNE
if (isset($_GET['idLast'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Annees.php');

    $annees = annees::getLast();

    if ($annees) {
        $total = annees::getCount();
        echo json_encode([
            'last_annee' => $annees,
            'total' => $total
        ]);
    }
    else {
        echo json_encode([
            'last_annee' => 'null'
        ]);
    }
}




// RECUPERATION DES INFO POUR PROPRIETE D'UN ELEMENT 
if (isset($_GET['idProprietes'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Annees.php');

    $id = $_GET['idProprietes'];
    $proprietes = annees::getByID($id);

    if ($proprietes) {
        echo json_encode([
            'proprietes_annees' => $proprietes,
        ]);
    } else {
        echo json_encode([
            'proprietes_annees' => 'null'
        ]);
    }
}


// SUPPRESSION DE L'ANNEE
if (isset($_GET['idSuppr'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Annees.php');

    $id = strSecur($_GET['idSuppr']);
    if (annees::Supprimer($id)) {
        $message = "Année supprimé avec succès.";
        echo json_encode([
            'success' => 'true',
            'message' => $message
        ]);
    }
    else {
        $message = "Erreur, impossible de supprimer cette année.";
        echo json_encode([
            'success' => 'false',
            'message' => $message
        ]);
    }
}


//INTEROGER LOCATAIRE
if (isset($_POST['bt_interoger_locataire'])) {
    // inclusion des fichiers ressources
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Annees.php');
    include('../models/Contrat_bail.php');
    require_once("../plugins/fpdf184/fpdf.php");
    require_once("../models/Bureaux.php");

    $locataire = strSecur($_POST["locataire"]);
    $infos_locataire = contrats_bail::getAllByLocataire($locataire);
    // var_dump($infos_locataire);

    // Propriéte de l'entrepise
    $entreprise = bureaux::getByNom($_SESSION["KaspyISS_bureau"]);
    $logoEtat = $entreprise['logo_etats'];
    $nom_entreprise = $entreprise['libelle'];
    $sigle = $entreprise['sigle'];
    $slogan = $entreprise['slogan'];

    $annee = $_SESSION["KaspyISS_annee"];
    $pdf = new FPDF();

    // ---------------------------------entete du fichier fpdf-----------------------------------
    $pdf->AddPage();
    if ($pdf->PageNo() == 1) {
        // ENTETE GAUCHE
        // Logo
        $pdf->Image(API_HOST . '/assets/images/etats/' . $logoEtat, 10, 8, 20);
        // Nom de l'entreprise
        $pdf->Cell(22);
        $pdf->SetFont('Helvetica', 'B', 16);
        $pdf->Cell(0, 7, $nom_entreprise, 0, 0, 'L');
        // Sigle de l'entreprise
        $pdf->Ln(7);
        $pdf->Cell(22);
        $pdf->SetFont('Helvetica', '', 12);
        $pdf->Cell(0, 7, $sigle, 0, 0, 'L');
        // slogan de l'entreprise
        $pdf->Ln(6);
        $pdf->Cell(22);
        $pdf->SetFont('Helvetica', 'I', 10);
        $pdf->Cell(0, 7, $slogan, 0, 0, 'L');

        // ENTETE DROITE
        // Année académique
        $pdf->Ln(0);
        $pdf->Cell(135);
        $pdf->SetFont('Helvetica', '', 10);
        $pdf->Cell(0, 7, "Année de gestion : " . $annee, 0, 0, 'R');
        // TITRE DE L'ETAT
        $pdf->Ln(12);
        $pdf->Cell(20);
        $pdf->SetFont('Helvetica', 'B', 15);
        $pdf->Cell(150, 10, 'INFORMATION SUR LE LOCATAIRE', 1, 0, 'C');
        // Décalage à droite
        $pdf->Cell(20);
        $pdf->Ln();
        $pdf->Cell(153);
        $pdf->SetFont('Helvetica', 'I', 10);

        // Date
        //$pdf->Cell(0,7,"Tiré le : " .date("d/m/Y") ,0, 0, 'L');

        // Saut de ligne
        $pdf->Ln(15);
    } else {
        //Pages suivantes
    }
    // ---------------------------------corps du fichier fpdf-----------------------------------

    $pdf->SetFont('Helvetica', 'B', 10);

    $pdf->Cell(20);
    $pdf->Cell(60, 10, "Nom", 1, 0, 'C');
    $pdf->Cell(90, 10, $infos_locataire['locataire'], 1, 0, 'C');
    $pdf->Ln();

    $pdf->Cell(20);
    $pdf->Cell(60, 10, "Appartemment", 1, 0, 'C');
    $pdf->Cell(90, 10, $infos_locataire['appartement'], 1, 0, 'C');
    $pdf->Ln();

    $pdf->Cell(20);
    $pdf->Cell(60, 10, "Batiment", 1, 0, 'C');
    $pdf->Cell(90, 10,  $infos_locataire['batiment'], 1, 0, 'C');
    $pdf->Ln();

    $pdf->Cell(20);
    $pdf->Cell(60, 10, "Montant loyer", 1, 0, 'C');
    $pdf->Cell(90, 10,  $infos_locataire['montant_loyer'], 1, 0, 'C');
    $pdf->Ln();
    
    $pdf->Cell(20);
    $pdf->Cell(60, 10, "Type de contrat", 1, 0, 'C');
    $pdf->Cell(90, 10,  $infos_locataire['type_contrat'], 1, 0, 'C');
    $pdf->Ln();
    
    $pdf->Cell(20);
    $pdf->Cell(60, 10, "Numero du contrat", 1, 0, 'C');
    $pdf->Cell(90, 10,  $infos_locataire['numero_contrat'], 1, 0, 'C');
    $pdf->Ln();
    
    $pdf->Cell(20);
    $pdf->Cell(60, 10, "Frequence de paiement", 1, 0, 'C');
    $pdf->Cell(90, 10,  $infos_locataire['frequence_loyer'], 1, 0, 'C');
    $pdf->Ln();
    
    $pdf->Cell(20);
    $pdf->Cell(60, 10, "Recouvreur", 1, 0, 'C');
    $pdf->Cell(90, 10,  $infos_locataire['recouvreur'], 1, 0, 'C');
    $pdf->Ln();
    
    $pdf->Cell(20);
    $pdf->Cell(60, 10, "Date de signature", 1, 0, 'C');
    $pdf->Cell(90, 10,  $infos_locataire['date_signature'], 1, 0, 'C');
    $pdf->Ln();



    //-------------------------pieds du fichier fpdf-------------------------------------
    // Positionnement à 1,5 cm du bas
    $pdf->SetY(-30);
    // Police Arial italique 8
    $pdf->SetFont('Arial', 'I', 8);
    // Pied de page
    $pdf->Cell(0, 7, APP_NAME . ' ' . APP_VERSION, 0, 0, 'L');
    // $pdf->Cell(0, 10, $piedDePage, 0, 0, 'C');
    $heure =  date("H") - 1 . ":";
    $pdf->Cell(0, 7, "Tiré le : " . date("d/m/Y") . ' à ' . $heure . date("i:s"), 0, 0, 'R');


    // Indiquez au navigateur de traiter le fichier PDF en ligne
    header('Content-type: application/pdf');
    header('Content-Disposition: inline; filename="InformationDuLocataires.pdf"');
    $pdf->Output();
    exit;

    
}