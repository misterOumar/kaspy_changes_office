<?php


// Batiments par proprietaire
if (isset($_POST['bt_batiment_proprietaire'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    require_once("../plugins/fpdf184/fpdf.php");
    require_once("../models/Bureaux.php");
    
    include('../models/Batiments.php');
    include('../models/Appartements.php');
    include('../models/Proprietaires.php');
    

    //Recuperation des infos depuis le formulaire
    $proprietaire = strSecur($_POST["proprietaire"]);

    $batimment_proprietaire = batiments::getAllByProprietaire($proprietaire);
    $proprietaire = proprietaires::getByID($proprietaire);
    // var_dump($batimment_proprietaire);

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
        $pdf->Cell(150, 10, 'LISTE DES BATIMENTS PAR PROPRIETAIRE', 1, 0, 'C');
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
    $pdf->Cell(10, 7, "Propriétaire des batiments : ".$proprietaire['nom_prenom'] , 0, 0, 'L');
    $pdf->Ln(10);
    
    $pdf->SetFont('Helvetica', 'B', 10);

    $pdf->Cell(10, 7, "Nº", 1, 0, 'C');
    $pdf->Cell(60, 7, "Libellé", 1, 0, 'C');
    $pdf->Cell(45, 7, "Nombre d'appartements", 1, 0, 'C');
    $pdf->Cell(70, 7, "Cout de construction", 1, 0, 'C');
    $pdf->Ln();
    $i = 1;
    $pdf->SetFont('Helvetica', '', 9);
    foreach ($batimment_proprietaire as $batiment) {
        $pdf->Cell(10, 6, $i, 1, 0, 'C');
        $pdf->Cell(60, 6, $batiment['libelle'], 1, 0, '');
        $pdf->Cell(45, 6,  $batiment['nombre_appartement'], 1, 0, 'C');
        $pdf->Cell(70, 6,  $batiment['cout_construction'], 1, 0, 'C');
        $pdf->Ln();
        $i++;
    }

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
    header('Content-Disposition: inline; filename="ListeDesBatimentsParProprietaire.pdf"');
    $pdf->Output();
    exit;


}

// Journal des recouvrements
if (isset($_POST['bt_journal_recouvrement'])) {
    // include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Recouvrement.php');
    require_once("../plugins/fpdf184/fpdf.php");
    require_once("../models/Bureaux.php");




    //Recuperation des infos depuis le formulaire
    // $reporting_element = strSecur($_POST["reporting_element"]);


    $date_debut = $_POST["date_debut"];
    $date_debut = date('Y-m-d', strtotime($date_debut));

    $date_fin = $_POST["date_fin"];
    $date_fin = date('Y-m-d', strtotime($date_fin));

    $recouvrements = recouvrements::getAllBetween2Date($date_debut, $date_fin);
    // var_dump($recouvrements);


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
        $pdf->SetFont('Helvetica', '', 7);
        $pdf->Cell(0, 7, "Année de gestion : " . $annee, 0, 0, 'R');
        // TITRE DE L'ETAT
        $pdf->Ln(12);
        $pdf->Cell(20);
        $pdf->SetFont('Helvetica', 'B', 15);
        $pdf->Cell(150, 10, 'JOURNAL DES RECOUVREMENTS', 1, 0, 'C');
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
    $pdf->Cell(10, 7, "Nº", 1, 0, 'C');
    $pdf->Cell(25, 7, "Dates", 1, 0, 'C');
    $pdf->Cell(45, 7, "Recouvreur", 1, 0, 'C');
    $pdf->Cell(25, 7, "Mois", 1, 0, 'C');

    $pdf->Cell(45, 7, "Montant loyé", 1, 0, 'C');
    $pdf->Cell(45, 7, "Reste a payer", 1, 0, 'C');

    $pdf->Ln();
    $i = 1;
    $pdf->SetFont('Helvetica', '', 9);
    foreach ($recouvrements as $recouvrement) {
        $pdf->Cell(10, 6, $i, 1, 0, 'C');
        $pdf->Cell(25, 6, $recouvrement['dates'], 1, 0, '');
        $pdf->Cell(45, 6,  $recouvrement['nom_prenom'], 1, 0, 'C');
        $pdf->Cell(25, 6,  $recouvrement['mois'], 1, 0, 'C');
        $pdf->Cell(45, 6,  $recouvrement['loyer'], 1, 0, 'C');
        $pdf->Cell(45, 6,  $recouvrement['reste_a_payer'], 1, 0, 'C');
        $pdf->Ln();
        $i++;
    }

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
    header('Content-Disposition: inline; filename="JournalDesRecouvrement.pdf"');
    $pdf->Output();
    exit;
}
