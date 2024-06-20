<?php

class  EtatListeVentesDevise extends FPDF
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
            // ENTETE GAUCHE
            // Logo
            $this->Image(API_HOST . '/assets/images/' . $this->logoEtat, 10, 8, 20);
            // Nom de l'entreprise
            $this->Cell(22);
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
            $this->Cell(0, 7, "Année de gestion : " . $this->annee, 0, 0, 'R');


            // TITRE DE L'ETAT
            $this->Ln(12);
            $this->Cell(45);
            $this->SetFont('Helvetica', 'B', 15);
            $this->Cell(120, 10, 'JOURNAL DES VENTES DE DEVISE', 1, 0, 'C');

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
        $this->Cell(10, 7, "Nº", 1, 0, 'C');
        $this->Cell(20, 7, "Date", 1, 0, 'C');
        $this->Cell(50, 7, "Client", 1, 0, 'C');
        $this->Cell(25, 7, "Quantité", 1, 0, 'C');
        $this->Cell(20, 7, "Taux", 1, 0, 'C');
        $this->Cell(25, 7, "Montant Brut", 1, 0, 'C');
        $this->Cell(15, 7, "Remise", 1, 0, 'C');
        $this->Cell(25, 7, "Montant Net", 1, 0, 'C');
        $this->Ln();

        $i = 1;
        $this->SetFont('Helvetica', '', 9);
        if (count($data) > 0) {
            # code...
            foreach ($data as $vente_devise) {
                // Convertir la chaîne de date en objet DateTime
                $date = DateTime::createFromFormat('d/m/Y', $vente_devise['dates']);
                if ($date === false) {
                    $date = new DateTime($vente_devise['dates']);
                }
                // Formater la date pour afficher le jour, le mois et l'année
                $dateFormatee = $date->format('d/m/Y');

                $this->Cell(10, 6, $i, 1, 0, 'C');
                $this->Cell(20, 6,  $dateFormatee, 1, 0, 'C');
                $this->Cell(50, 6,  $vente_devise['client'], 1, 0, 'L');
                $this->Cell(25, 6,  formaterNombre($vente_devise['quantite']) . " " . $vente_devise['devise_symbole'], 1, 0, 'C');
                $this->Cell(20, 6,  $vente_devise['taux_vente'], 1, 0, 'C');
                $this->Cell(25, 6,  formaterNombre($vente_devise['montant_brut']), 1, 0, 'C');
                $this->Cell(15, 6,  formaterNombre($vente_devise['remise']), 1, 0, 'C');
                $this->Cell(25, 6,  formaterNombre($vente_devise['montant_net']), 1, 0, 'C');
                $this->Ln();
                $i++;
            }
        } else {
            $this->Cell(190, 6,  "Aucune transaction de vente de devise effectuée aujourd'hui.", 1, 0, 'C');
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

    // Génerer le PDF
    public function generatePDF($data, $saveToFile = false)
    {
        $entreprise = bureaux::getByNom($_SESSION["KaspyISS_bureau"]);
        $this->logoEtat = $entreprise['logo_pc'];
        $this->nom_entreprise = $entreprise['raison_sociale'];
        $this->sigle = $entreprise['sigle'];
        $this->slogan = $entreprise['slogan'];
        $this->annee = $_SESSION["KaspyISS_annee"];
        $this->SetTitle('Journal des ventes de dévises', 1);
        $this->AliasNbPages();
        $this->AddPage('P');
        $this->BasicTable($data);

        if ($saveToFile) {
            $filePath = '../assets/temp/Journal_ventes_devise_' . date('d_m_Y') . '.pdf';
            $this->Output($filePath, 'F');
            return $filePath;
        } else {
            $this->Output();
        }
    }
}
