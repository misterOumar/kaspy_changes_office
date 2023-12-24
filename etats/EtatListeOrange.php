<?php
    require_once('../plugins/fpdf184/fpdf.php');
    include_once('../config/config.php');
    include_once('../config/db.php');
    require_once("../models/Bureaux.php");
    require_once("../models/Orange.php");

    class EtatListeOrange extends FPDF
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
                $this->Image(API_HOST . '/assets/images/etats/' . $this->logoEtat, 10, 8, 20);

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
                $this->Cell(0, 7, "Année académique : " . $this->annee, 0, 0, 'L');


                // TITRE DE L'ETAT
                // $this->Ln(12);
                // $this->Cell(45);
                // $this->SetFont('Helvetica', 'B', 15);
                // $this->Cell(100, 10, 'LISTE DES TRANSACTIONS ORANGE MONEY', 1, 0, 'C');
                $this->Ln(12);
                $this->Cell(45);
                $this->SetFont('Helvetica', 'B', 15);
                $this->Cell(100, 10, ' TRANSACTIONS ORANGE MONEY', 1, 0, 'C');

                // Décalage à droite
                $this->Cell(20);

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
        function BasicTable($data)
        {
            // En-tête
            $this->SetFont('Helvetica', 'B', 10);
            $this->Cell(13, 7, "Nº", 1, 0, 'C');
            $this->Cell(85, 7, "Date", 1, 0, 'C');
            $this->Cell(25, 7, "Type operation", 1, 0, 'C');
            $this->Cell(40, 7, "Telephone", 1, 0, 'C');
            $this->Cell(25, 7, "Montant", 1, 0, 'C');
            $this->Ln();

            $i = 1;
            $this->SetFont('Helvetica', '', 9);
            foreach ($data as $professeurs) {
                $this->Cell(13, 6, $i, 1, 0, 'C');
                $this->Cell(85, 6, $professeurs['date'], 1);
                $this->Cell(25, 6, $professeurs['type_operation'], 1, 0, 'C');
                $this->Cell(40, 6, $professeurs['telephone_client'], 1, 0, 'C');
                $this->Cell(25, 6, $professeurs['montant'], 1, 0, 'C');
                $this->Ln();
                $i++;
            }
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

            $heure =  date("H") - 1 . ":";
            $this->Cell(0, 7, "Tiré le : " . date("d/m/Y") . ' à ' . $heure . date("i:s"), 0, 0, 'R');
        }
    }



    $data = array();
    $professeurs = orange::getAll();
    for ($num = 0; $num < count($professeurs); $num++) {
        array_push(
            $data,
            $professeurs[$num]
        );
    }



    // Instanciation de la classe dérivée
    $pdf = new EtatListeOrange();
    $entreprise = bureaux::getByNom($_SESSION["KaspyISS_bureau"]);
    $pdf->logoEtat = $entreprise['logo_etats'];
    $pdf->nom_entreprise = $entreprise['libelle'];
    $pdf->sigle = $entreprise['sigle'];
    $pdf->slogan = $entreprise['slogan'];

    $pdf->annee = $_SESSION["KaspyISS_annee"];

    $pdf->SetTitle('Liste des professeurs', 1);


    $pdf->AliasNbPages();
    $pdf->AddPage('P');

    $pdf->BasicTable($data);

    $pdf->Output();