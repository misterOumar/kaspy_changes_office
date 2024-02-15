<?php
require_once('../plugins/fpdf184/fpdf.php');
include_once('../config/config.php');
include_once('../config/db.php');
require_once("../models/Bureaux.php");


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
            $this->SetX($this->GetPageWidth() - $this->GetStringWidth("Année académique : " . $this->annee) - 20);
            $this->Cell(0, 7, "Année académique : " . $this->annee, 12, 12, 'L');
            // TITRE DE L'ETAT            
            $this->Ln(5);
            $this->Cell(45);
            $this->SetFont('Helvetica', 'B', 15);
            $titre = 'Récapitulatif simplifié des transferts < Tous les réseaux > KAMBIRE SALOMON';
            $largeurTitre = $this->GetStringWidth($titre);
            $positionX = ($this->GetPageWidth() - $largeurTitre) / 2;
            // Définir la position X pour centrer le texte
            $this->SetX($positionX);
            // Ajouter le titre centré
            $this->Cell($largeurTitre, 14, $titre, 1, 0, 'C');
            $this->Ln();
            $this->Cell(153);
            $this->SetFont('Helvetica', 'I', 10);
            // Date
            //$this->Cell(0,7,"Tiré le : " .date("d/m/Y") ,0, 0, 'L');

            // Saut de lignelo
            $this->Ln(5);
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
        // EN-TETE
        $this->SetFont('Helvetica', 'B', 10);
       
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
        // NOUVELLE LIGNE
        $this->Ln();
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

// $data = array();
// $professeurs = orange::getAll();
// for ($num = 0; $num < count($professeurs); $num++) {
//     array_push(
//         $data,
//         $professeurs[$num]
//     );
// }
// Instanciation de la classe dérivée

$pdf = new EtatListeOperation();
$entreprise = bureaux::getByNom($_SESSION["KaspyISS_bureau"]);
$pdf->logoEtat = $entreprise['logo_pc'];
$pdf->nom_entreprise = $entreprise['raison_sociale'];
$pdf->sigle = $entreprise['sigle'];
$pdf->slogan = $entreprise['slogan'];
$pdf->annee = $_SESSION["KaspyISS_annee"];
$pdf->SetTitle('Liste des professeurs', 1);


$pdf->AliasNbPages();
$pdf->AddPage('L');
$pdf->BasicTable($data);
$pdf->Output();
