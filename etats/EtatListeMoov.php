<?php

// Journal des recouvrements
if (isset($_POST['bt_moov'])) {
    // include('../functions/functions.php');
    require_once('../plugins/fpdf184/fpdf.php');
    include_once('../config/config.php');
    include_once('../config/db.php');
    require_once("../models/Bureaux.php");
    require_once("../models/Moov.php");
    

 


    $date_debut = $_POST["date_debut"];
    $date_debut = date('Y-m-d', strtotime($date_debut));

    $date_fin = $_POST["date_fin"];
    $date_fin = date('Y-m-d', strtotime($date_fin));

    $orange = moov::getAllBetween2Date($date_debut, $date_fin);
    //  var_dump($orange);


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
    $pdf->Cell(0, 7, "Periode du : " . $date_debut,0, 0, 'R');
    $pdf->Ln();
    $pdf->Cell(0, 7, "Au: " . $date_fin, 0, 0, 'R');
    // TITRE DE L'ETAT
    $pdf->Ln(12);
    $pdf->Cell(20);
    $pdf->SetFont('Helvetica', 'B', 15);
    $pdf->Cell(150, 10, 'LISTE DES TRANSACTIONS MOOV MONEY', 1, 0, 'C');
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


     // En-tête
    $pdf->SetFont('Helvetica', 'B', 9);
    $pdf->Cell(13, 7, "Nº", 1, 0, 'C');
    $pdf->Cell(25, 7, "Date", 1, 0, 'C');
    $pdf->Cell(25, 7, "Type opération", 1, 0, 'C');
    $pdf->Cell(30, 7, "Telephone", 1, 0, 'C');
    $pdf->Cell(30, 7, "Montant", 1, 0, 'C');
    $pdf->Cell(35, 7, " ID Transaction ", 1, 0, 'C');
    $pdf->Cell(30, 7, "Nouveau Solde", 1, 0, 'C');
    $pdf->Ln();


     $i = 1;
    $pdf->SetFont('Helvetica', '', 9);
     if (count($orange) > 0) {
         foreach ($orange as $transaction) {
            $pdf->Cell(13, 6, $i, 1, 0, 'C');
            $pdf->Cell(25, 6, $transaction['date'], 1);
            $pdf->Cell(25, 6, $transaction['type_operation'], 1);
            $pdf->Cell(30, 6, $transaction['telephone_client'], 1);
            $pdf->Cell(30, 6, number_format($transaction['montant'], 0, '', ' '), 1);
            $pdf->Cell(35, 6, $transaction['id_transaction'], 1);
            $pdf->Cell(30, 6, number_format($transaction['solde_total'], 0, '', ' '), 1); // formatter le solde en separateur de millier
            $pdf->Ln();
             $i++;
         }
     }else{
        $pdf->Cell(188, 6,  'Aucune Transaction enregistrée', 1, 0, 'C');
        $pdf->Ln();
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
    header('Content-Disposition: inline; filename="JournalDesTransactionsOrangeMoney.pdf"');
    $pdf->SetTitle('TRANSACTIONS MOOV MONNEY', 1);
    $pdf->Output();
    exit;
}
