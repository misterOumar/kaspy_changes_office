<?php

if (isset($_POST['bt_depenses'])) {

    require_once('../plugins/fpdf184/fpdf.php');
    include_once('../config/config.php');
    include_once('../config/db.php');
    include_once('../functions/functions.php');
    require_once("../models/Bureaux.php");
    require_once("../models/Depenses.php");

    $date_debut = $_POST["date_debut"];
    $date_debut = date('Y-m-d', strtotime($date_debut));

    $date_fin = $_POST["date_fin"];
    $date_fin = date('Y-m-d', strtotime($date_fin));

    $magasin = $_SESSION["KaspyISS_bureau"];
    $depenses = depenses::getAllBetween2Date($magasin, $date_debut, $date_fin);

    // Propriéte de l'entrepise
    $entreprise = bureaux::getByNom($_SESSION["KaspyISS_bureau"]);
    $logoEtat = $entreprise['logo_pc'];
    $nom_entreprise = $entreprise['raison_sociale'];
    $sigle = $entreprise['sigle'];
    $slogan = $entreprise['slogan'];

    $annee = $_SESSION["KaspyISS_annee"];
    $pdf = new FPDF();


    // ---------------------------------entete du fichier fpdf-----------------------------------
    $pdf->AddPage();

    if ($pdf->PageNo() == 1) {
        // ENTETE GAUCHE
        // Logo
        $pdf->Image(API_HOST . '/assets/images/' . $logoEtat, 10, 8, 20);
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
        $pdf->Cell(0, 7, "Periode du : " . $date_debut, 0, 0, 'R');
        $pdf->Ln();
        $pdf->Cell(0, 7, "Au: " . $date_fin, 0, 0, 'R');


        // TITRE DE L'ETAT
        $pdf->Ln(12);
        $pdf->Cell(45);
        $pdf->SetFont('Helvetica', 'B', 15);
        $pdf->Cell(100, 10, 'JOURNAL DES DEPENSES', 1, 0, 'C');


        // Décalage à droite
        $pdf->Cell(20);

        $pdf->Ln();
        $pdf->Cell(153);
        $pdf->SetFont('Helvetica', 'I', 10);

        // Date
        //$pdf->Cell(0,7,"Tiré le : " .date("d/m/Y") ,0, 0, 'L');

        // Saut de ligne
        $pdf->Ln(15);
    } 

    // Tableau simple
        // En-tête
        $pdf->SetFont('Helvetica', 'B', 10);
        $pdf->Cell(10, 7, "Nº", 1, 0, 'C');
        $pdf->Cell(20, 7, "Date", 1, 0, 'C');
        $pdf->Cell(50, 7, "Nature dépense", 1, 0, 'C');
        $pdf->Cell(55, 7, "Désignation", 1, 0, 'C');
        $pdf->Cell(30, 7, "Mode réglement", 1, 0, 'C');
        $pdf->Cell(25, 7, "Montant", 1, 0, 'C');
        $pdf->Ln();

        $i = 1;
        $total_depenses = 0;
        $pdf->SetFont('Helvetica', '', 9);
        if (count($depenses) > 0) {
            foreach ($depenses as $depense) {
                // Convertir la chaîne de date en objet DateTime
                $date = DateTime::createFromFormat('d/m/Y H:i', $depense['dates']);

                if ($date === false) {
                    // Si la conversion échoue, essayer un autre format
                    $date = new DateTime($depense['dates']);
                }

                // Formater la date pour afficher le jour, le mois et l'année
                $dateFormatee = $date->format('d-m-Y');

                $pdf->Cell(10, 6, $i, 1, 0, 'C');
                $pdf->Cell(20, 6,  $dateFormatee, 1, 0, 'C');
                $pdf->Cell(50, 6,  $depense['nature_depense'], 1, 0, '');
                $pdf->Cell(55, 6,  $depense['designation'], 1, 0, '');
                $pdf->Cell(30, 6,  $depense['mode_reglement'], 1, 0, '');
                $pdf->Cell(25, 6, formaterNombre($depense['montant']), 1, 0, '');
                $pdf->Ln();
                $i++;
                $total_depenses += $depense['montant'];
            }
        } else {
            $pdf->Cell(190, 6,  'Aucune dépense enregistrée.', 1, 0, 'C');
            $pdf->Ln();
        }

        // Total des lignes
        $pdf->SetFont('Helvetica', 'B', 10);
        $pdf->SetFillColor(79, 124, 172);
        $pdf->SetTextColor(225, 255, 255);
        $pdf->Cell(165, 6,  'Montant total des dépenses', 1, 0, 'C', true);
        $pdf->Cell(25, 6, formaterNombre($total_depenses), 1, 0, '', true);
    


    // Pied de page
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
        header('Content-Disposition: inline; filename="JournalDesDépenses.pdf"');
        $pdf->SetTitle('Journal des dépenses', 1);
        $pdf->Output();

        exit;
}
