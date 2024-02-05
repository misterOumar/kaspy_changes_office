<?php

// Journal des recouvrements
if (isset($_POST['bt_mtn'])) {
    // include('../functions/functions.php');
    require_once('../plugins/fpdf184/fpdf.php');
    include_once('../config/config.php');
    include_once('../config/db.php');
    require_once("../models/Bureaux.php");
    require_once("../models/Mtn.php");





    $date_debut = $_POST["date_debut"];
    $date_debut = date('Y-m-d', strtotime($date_debut));

    $date_fin = $_POST["date_fin"];
    $date_fin = date('Y-m-d', strtotime($date_fin));

    $transactions_mtn = mtn::getAllBetween2Date($date_debut, $date_fin);
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
        $pdf->Cell(0, 7, "Periode du : " . $date_debut, 0, 0, 'R');
        $pdf->Ln();
        $pdf->Cell(0, 7, "Au: " . $date_fin, 0, 0, 'R');
        // TITRE DE L'ETAT
        $pdf->Ln(12);
        $pdf->Cell(20);
        $pdf->SetFont('Helvetica', 'B', 15);
        $pdf->Cell(150, 10, 'LISTE DES TRANSACTIONS MTN MONEY', 1, 0, 'C');
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
    $pdf->Cell(10, 7, "Nº", 1, 0, 'C');
    $pdf->Cell(20, 7, "Date", 1, 0, 'C');
    $pdf->Cell(30, 7, "ID Transaction ", 1, 0, 'C');
    $pdf->Cell(25, 7, "Telephone", 1, 0, 'C');
    $pdf->Cell(25, 7, "Dépôt", 1, 0, 'C');
    $pdf->Cell(25, 7, "Rétrait", 1, 0, 'C');
    $pdf->Cell(25, 7, "Compensation", 1, 0, 'C');
    $pdf->Cell(30, 7, "Nouveau Solde", 1, 0, 'C');
    $pdf->Ln();


    // lignes des operations
    $datePrecedente = null;
    $i = 1;
    $somme_depots = $somme_retraits  = 0;
    $compensationAccumule = 0;
    $pdf->SetFont('Helvetica', '', 9);
    if (count($transactions_mtn) > 0) {
        foreach ($transactions_mtn as $transaction) {
            // Convertir la chaîne de date en objet DateTime
            $date = DateTime::createFromFormat('d/m/Y H:i', $transaction['date']);

            if ($date === false) {
                // Si la conversion échoue, essayer un autre format
                $date = new DateTime($transaction['date']);
            }

            // Formater la date pour afficher le jour, le mois et l'année
            $dateFormatee = $date->format('d/m/Y');

            $compensationLigne = $transaction['depot'] - $transaction['retrait'];
            $compensationAccumule += $compensationLigne;

            $pdf->Cell(10, 6, $i, 1, 0, 'C');
            $pdf->Cell(20, 6, $dateFormatee, 1);
            $pdf->Cell(30, 6, $transaction['id_transaction'], 1);
            $pdf->Cell(25, 6, $transaction['telephone_client'], 1);
            $pdf->Cell(25, 6, number_format($transaction['depot'], 0, '', ' '), 1);
            $pdf->Cell(25, 6, number_format($transaction['retrait'], 0, '', ' '), 1);
            $pdf->Cell(25, 6, number_format($compensationAccumule, 0, '', ' '), 1);
            $pdf->Cell(30, 6, number_format($transaction['solde_total'], 0, '', ' '), 1); // formatter le solde en separateur de millier
            $pdf->Ln();
            $i++;
            $somme_depots += $transaction['depot'];
            $somme_retraits += $transaction['retrait'];
        }
    } else {
        $pdf->Cell(190, 6,  'Aucune Transaction enregistrée', 1, 0, 'C');
        $pdf->Ln();
    }

    // Dernière ligne pour le recap
    $pdf->SetFont('Helvetica', 'B', 10);
    $pdf->SetFillColor(247, 198, 6);
    $pdf->Cell(85, 6,  'Solde Total ', 1, 0, 'C', true);
    $pdf->Cell(25, 6, number_format($somme_depots, 0, '', ' '), 1, 0, '', true);
    $pdf->Cell(25, 6, number_format($somme_retraits, 0, '', ' '), 1, 0, '', true);
    $pdf->Cell(25, 6, number_format($compensationAccumule, 0, '', ' '), 1, 0, '', true);
    // Positionner le pointeur interne sur le dernier élément du tableau
    end($transactions_mtn);
    // Récupérer la valeur du dernier élément
    $lastTransaction = current($transactions_mtn);
    $pdf->Cell(30, 6, number_format($lastTransaction['solde_total'], 0, '', ' '), 1, 0, '', true);

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
    $pdf->SetTitle('TRANSACTIONS MTN MONNEY', 1);
    $pdf->Output();
    exit;
}
