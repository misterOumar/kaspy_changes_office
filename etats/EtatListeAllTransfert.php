<?php

if (isset($_POST['bt_recap_simplifie'])) {

    require_once('../plugins/fpdf184/fpdf.php');
    include_once('../config/config.php');
    include_once('../config/db.php');
    include_once('../functions/functions.php');
    require_once("../models/Bureaux.php");
    require_once("../models/Recapitulatif_simplifie.php");

    $date_debut = $_POST["date_debut"];
    $date_debut = date('d-m-Y', strtotime($date_debut));

    $date_fin = $_POST["date_fin"];
    $date_fin = date('d-m-Y', strtotime($date_fin));


    class EtatListeOperation extends FPDF
    {
        public $logoEtat;
        public $nom_entreprise;
        public $sigle;
        public $slogan;
        public $piedDePage;

        public $annee;

        // En-tête
        function Header()
        {
            if ($this->PageNo() == 1) {
                // Logo
                $this->Image(API_HOST . '/assets/images/' . $this->logoEtat, 10, 8, 20);

                // ENTETE GAUCHE
                $this->Cell(22);
                // Nom de l'entreprise
                $this->SetFont('Helvetica', 'B', 16);
                $this->Cell(0, 7, $this->nom_entreprise, 0, 0, 'L');
                // Sigle de l'entreprise
                $this->Ln(7);
                $this->Cell(22);
                $this->SetFont('Helvetica', '', 12);
                $this->Cell(0, 7, $this->sigle, 0, 0, 'L');
                // slogan de l'entreprise
                $this->Ln(6);
                $this->Cell(22);
                $this->SetFont('Helvetica', 'I', 10);
                $this->Cell(0, 7, $this->slogan, 0, 0, 'L');
                // ENTETE DROITE
                // Année académique
                $this->Ln(0);
                $this->Cell(135);
                $this->SetFont('Helvetica', '', 10);
                // $this->SetY($this->GetPageHeight() - 1);
                $this->SetX($this->GetPageWidth() - $this->GetStringWidth("Année de gestion : " . $this->annee) - 20);
                $this->Cell(0, 7, "Année de gestion : " . $this->annee, 12, 12, 'L');
                // TITRE DE L'ETAT            
                $this->Ln(12);
                $this->Cell(45);
                $this->SetFont('Helvetica', 'B', 15);
                $titre = '   Récapitulatif simplifié des transferts : Tous les réseaux ';
                $largeurTitre = $this->GetStringWidth($titre);
                $positionX = ($this->GetPageWidth() - $largeurTitre) / 2;
                // Définir la position X pour centrer le texte
                $this->SetX($positionX);
                // Ajouter le titre centré
                $this->Cell($largeurTitre, 20, $titre, 1, 0, 'C');
                $this->Ln();
                $this->Cell(153);
                $this->SetFont('Helvetica', 'I', 10);
                // Date
                //$this->Cell(0,7,"Tiré le : " .date("d/m/Y") ,0, 0, 'L');

                // Saut de ligne
                $this->Ln(15);
            } else {
                //Pages suivantes

            }
        }
        // Tableau simple
        // Tableau simple
        // Tableau simple
        // Tableau simple
        function BasicTable($data)
        {

            if (count($data) > 0) {


                // Initialiser la date précédente à null
                $datePrecedente = null;
                foreach ($data as $transfert) {

                    if ($datePrecedente !== $transfert['date']) {


                        // EN-TETE
                        $this->SetFont('Helvetica', 'B', 10);
                        $this->Cell(0, 8, " ", 0, 1);

                        // DATE 
                        $this->Cell(0, 7, $transfert['date'], 0, 0, 'L');
                        $this->Ln();

                        $this->GenereTH();
                    }
                    // NOUVELLE LIGNE            
                    $this->Cell(0, 0, " ", 0, 1);
                    $this->SetFont('Helvetica', '', 8);

                    $this->Cell(30, 11, remplacerUnderscore($transfert['agence']), 1, 0, 'L', false, '', 1, true);
                    $this->SetFont('Helvetica', '', 10);
                    //ENVOIS
                    $this->Cell(12, 11, $transfert['nombre_envois'], 1, 0, ''); //nombre des envois
                    $this->Cell(20, 11, number_format($transfert['montant_envois'], 0, '', ' '),  1, 0, ''); //montant des envois
                    $this->Cell(20, 11, number_format($transfert['frais_envois'], 0, '', ' '), 1, 0, ''); // frais des envois
                    //RECEPTIONS
                    $this->Cell(12, 11, $transfert['nombre_receptions'], 1, 0, '');
                    $this->Cell(20, 11, number_format($transfert['montant_receptions'], 0, '', ' '), 1, 0, '');
                    //REMBOURSEMENT
                    $this->Cell(12, 11, $transfert['nombre_rembourssements'], 1, 0, 'C');
                    $this->Cell(18, 11, number_format($transfert['montant_rembourssements'], 0, '', ' '), 1, 0, 'C');
                    $this->Cell(12, 11, number_format($transfert['frais_rembourssements'], 0, '', ' '), 1, 0, 'C');
                    // COLONNES SUPPLEMENTAIRES
                    $this->Cell(24, 11, number_format($transfert['changes'], 0, '', ' '), 1, 0, 'C');
                    $this->Cell(14, 11, "--", 1, 0, 'C');
                    $this->Cell(14, 11, number_format($transfert['tthu'], 0, '', ' '), 1, 0, 'C');
                    $this->Cell(20, 11, $transfert['nombre_envois'] + $transfert['nombre_receptions'], 1, 0, 'C');
                    $this->Cell(16, 11, "--", 1, 0, 'C');
                    $this->Cell(24, 11, "--", 1, 'C');

                    $this->Cell(0, 0, " ", 0, 1);



                    $datePrecedente = $transfert['date'];
                }
            } else {
                $this->SetFont('Helvetica', 'B', 10);
                $this->GenereTH();
                $this->Cell(0, 0, " ", 0, 1);
                $this->SetFont('Helvetica', '', 11);
                $this->Cell(268, 11, "Aucun transfert enregistré", 1,0, 'C');
            }
        }

        // generer l'entête du tableau
        function GenereTH()
        {


            // COLONNE DE AGENCE 
            $this->Cell(30, 9, " ", 1, 0, 'C');

            // ENVOIS
            // $this->Cell(30, 9, "", 1,'C');
            $this->Cell(52, 9, "ENVOIS", 1, 0, 'C');
            $this->Cell(32, 9, "RECEPTION", 1, 0, 'C');
            // RECEPTION
            $this->Cell(42, 9, "REMBOURSEMENT", 1, 0, 'C');
            // COLONNE VIDE POUR L'ESPACEMENT
            $this->Cell(112, 9, "", 1, 0, 'C');
            $this->SetFillColor(255, 255, 0);      // Valeurs RGB pour jaune           
            $this->Cell(0, 9, " ", 0, 1);
            // SOUS-ENTETE DE AGENCE
            $this->Cell(30, 11, "AGENCE", 1, 0, 'C');
            // SOUS-ENTETE DE ENVOIS
            $this->Cell(12, 11, "Nbre", 1, 0, 'C');
            $this->Cell(20, 11, "Envois", 1, 0, 'C');
            $this->Cell(20, 11, "Frais", 1, 0, 'C');
            // SOUS-ENTETE DE RECEPTION
            $this->Cell(12, 11, "Nbre", 1, 0, 'C');
            $this->Cell(20, 11, "Réception", 1, 0, 'C');
            // SOUS-ENTETE DE REMBOURSEMENT
            $this->Cell(12, 11, "Nbre", 1, 0, 'C');
            $this->Cell(18, 11, "Remb.", 1, 0, 'C');
            $this->Cell(12, 11, "Frais", 1, 0, 'C');
            // COLONNES SUPPLEMENTAIRES
            $this->Cell(24, 11, "Changes", 1, 0, 'C');
            $this->Cell(14, 11, "TVA", 1, 0, 'C');
            $this->Cell(14, 11, "TTHU", 1, 0, 'C');
            $this->Cell(20, 11, "Nbre Total", 1, 0, 'C');
            $this->Cell(16, 11, "Com.S/A", 1, 0, 'C');
            $this->Cell(24, 11, "Solde S/A ", 1, 'C');
        }


        // Pied de page
        function Footer()
        {
            // Positionnement à 1,5 cm du bas
            $this->SetY(-15);
            // Police Arial italique 8
            $this->SetFont('Arial', 'I', 8);
            // Pied de page
            $this->Cell(0, 7, APP_NAME . ' ' . APP_VERSION, 0, 0, 'L');
            $this->Cell(0, 10, $this->piedDePage, 0, 0, 'C');

            $heure = date("H") - 1 . ":";
            $this->Cell(0, 7, "Tiré le : " . date("d/m/Y") . ' à ' . $heure . date("i:s"), 0, 0, 'R');
        }
    }

    $data = array();
    $all_transfert = RecapitulatifSimplifie::getAllBetween2Date($date_debut, $date_fin);
    for ($num = 0; $num < count($all_transfert); $num++) {
        array_push(
            $data,
            $all_transfert[$num]
        );
    }

    // Instanciation de la classe dérivée
    $pdf = new EtatListeOperation();
    $entreprise = bureaux::getByNom($_SESSION["KaspyISS_bureau"]);
    $pdf->logoEtat = $entreprise['logo_pc'];
    $pdf->nom_entreprise = $entreprise['raison_sociale'];
    $pdf->sigle = $entreprise['sigle'];
    $pdf->slogan = $entreprise['slogan'];
    $pdf->annee = $_SESSION["KaspyISS_annee"];
    $pdf->SetTitle('Récapitulatif simplifié des transferts', 1);


    $pdf->AliasNbPages();
    $pdf->AddPage('L');
    $pdf->BasicTable($data);
    $pdf->Output();
}
