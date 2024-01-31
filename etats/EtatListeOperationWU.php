<?php
require_once('../plugins/fpdf184/fpdf.php');
include_once('../config/config.php');
include_once('../config/db.php');
require_once("../models/Bureaux.php");
require_once("../models/Western_Union.php");

 
 
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
            $this->SetX($this->GetPageWidth() - $this->GetStringWidth("Année  : " . $this->annee) - 20);
            $this->Cell(0, 7, "Année  : " . $this->annee, 12, 12, 'L');
            // TITRE DE L'ETAT            
            $this->Ln();
            $this->Cell(45);
            $this->SetFont('Helvetica', 'B', 15);
            $titre = '   RAPPORT DE SUIVI DES OPERATIONS WESTERN UNION   ';
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
            $this->Ln(5);
        } else {
            //Pages suivantes

        }
    }

    // Tableau simple
    function BasicTable($data)
    {
        // // EN-TETE
        $this->SetFont('Helvetica', 'B', 10);
        $this->SetFillColor(169, 169, 169);  // Valeurs RGB pour le gris
        $this->Cell(30, 20, "DATE", 1, 0, 'C', true);
        $this->Cell(27, 20, "MAGASIN", 1, 0, 'C');

        $this->SetFillColor(255, 165, 0);  // Valeurs RGB pour orange          
        $this->Cell(114, 9, "ENVOIS", 1, 0, 'C', true);
        $this->Cell(76, 9, "PAIEMENTS", 1, 0, 'C', true);

        $this->SetFillColor(255, 255, 0);      // Valeurs RGB pour jaune           
        $this->Cell(34, 20, "COMPENSATIONS", 1, 0, 'C', true);

        $this->Cell(0, 9, " ", 0, 1);
        $this->Cell(57, 9, " ", 0, 0);

        // // SOUS EN-TETE  ENVOIS
        $this->Cell(29, 11, "OPERATIONS ", 1, 0, 'C');
        $this->Cell(22, 11, "PRINCIPAL ", 1, 0, 'C');
        $this->Cell(21, 11, "FRAIS ", 1, 0, 'C');
        $this->Cell(22, 11, "TAXES ", 1, 0, 'C');
        $this->Cell(20, 11, "TOTAL ", 1, 0, 'C');

        // // SOUS EN-TETE  PAIEMENTS
        $this->Cell(28, 11, "OPERATIONS ", 1, 0, 'C');
        $this->Cell(28, 11, "PRINCIPAL ", 1, 0, 'C');
        $this->Cell(20, 11, "TOTAL", 1, 0, 'C');

        // // NOUVELLE LIGNE
        $this->Ln();


           // // NOUVELLE LIGNE
   

        foreach ($data as $transaction) {

            $date = DateTime::createFromFormat('d-m-Y', $transaction['date']);

            // Vérifiez si la création de l'objet DateTime a réussi
            if ($date !== false) {
                // Définissez un tableau de traduction pour les mois en français
                $moisEnFrancais = [
                    'January' => 'Janvier',
                    'February' => 'Février',
                    'March' => 'Mars',
                    'April' => 'Avril',
                    'May' => 'Mai',
                    'June' => 'Juin',
                    'July' => 'Juillet',
                    'August' => 'Août',
                    'September' => 'Septembre',
                    'October' => 'Octobre',
                    'November' => 'Novembre',
                    'December' => 'Décembre',
                ];
            
                // Formatez la date avec le mois en français
                $dateFormatee = $date->format('d F Y');
                $dateFormatee = strtr($dateFormatee, $moisEnFrancais);
            }
            
            $this->Cell(30, 6,$dateFormatee , 1, 0, 'C');

            $this->SetFont('Helvetica', 'B', 6.6);
            $this->Cell(27, 6,$transaction['magasin'], 1);

            $this->SetFont('Helvetica', 'B', 10);

            // // SOUS EN-TETE  ENVOIS
            $this->Cell(29, 6,$transaction['nbre_operation_envoi'], 1, 0, 'C');
            $this->Cell(22, 6,$transaction['montant_envoye'], 1, 0, 'C');
            $this->Cell(21, 6,$transaction['frais_envoi'], 1, 0, 'C');
            $this->Cell(22, 6,$transaction['taxe_envoi'], 1, 0, 'C');
            $this->Cell(20, 6,$transaction['total_envoi'], 1, 0, 'C');

            // // SOUS EN-TETE  PAIEMENTS
            $this->Cell(28, 6,$transaction['nbre_operation_payer'], 1, 0, 'C');
            $this->Cell(28, 6,$transaction['montant_paye'], 1, 0, 'C');
            $this->Cell(20, 6,$transaction['montant_paye'], 1, 0, 'C');
            
            // // COMPASSATION
            $compensation = $transaction['total_envoi'] - $transaction['montant_paye'];
            $this->Cell(34, 6,$compensation, 1, 1, 'C');
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
$transactions_wu = western_union::getAllRapport();
for ($num = 0; $num < count($transactions_wu); $num++) {
    array_push(
        $data,
        $transactions_wu[$num]
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
$pdf->SetTitle('RAPPORT RIA', 1);


$pdf->AliasNbPages();
$pdf->AddPage('L');
$pdf->BasicTable($data);
$pdf->Output();
