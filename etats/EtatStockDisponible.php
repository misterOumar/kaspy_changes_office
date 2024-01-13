<?php
require_once('../plugins/fpdf184/fpdf.php');
include_once('../config/config.php');
include_once('../config/db.php');
require_once("../models/Bureaux.php");
require_once("../models/Carte.php");

class   EtatListeCarte extends FPDF
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
            $this->Image(API_HOST . '/assets/images/etats/' . $this->logoEtat, 10, 8, 20);
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
            $this->Cell(0, 7, "Année  : " . $this->annee, 0, 0, 'R');


            // TITRE DE L'ETAT
            $this->Ln(12);
            $this->Cell(45);
            $this->SetFont('Helvetica', 'B', 15);
            $this->Cell(200, 10, 'STOCK DISPONIBLE', 1, 0, 'C');

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


    // Tableau simple  hec_cocody
    function BasicTable($data)
    {
        // En-tête
        $this->SetFont('Helvetica', 'B', 10);
        $this->Cell(95, 7, "TYPE DE CARTE", 1, 0, 'C');
        $this->Cell(60, 7, "ENTREE", 1, 0, 'C');
        $this->Cell(60, 7, "SORTIE", 1, 0, 'C');
        $this->Cell(60, 7, "STOCK", 1, 0, 'C');
        $this->Ln();

     
        $this->SetFont('Helvetica', '', 12);
        if (count($data) > 0 ) {
            foreach ($data as $carte) {

                $this->Cell(95, 6,  $carte['type_carte'], 1, 0, '');
                $this->Cell(60, 6,  $carte['entree'], 1, 0, 'C');
                $this->Cell(60, 6,  $carte['sortie'], 1, 0, 'C');
                $this->Cell(60, 6,  $carte['stock'], 1, 0, 'C');
                $this->Ln();
            }  # code...
        }else{
            $this->Cell(275, 6,  'Aucun stock enregistré', 1, 0, 'C');
            $this->Ln();
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
$cartes = cartes::getStockDisponible();
for ($num = 0; $num < count($cartes); $num++) {
    array_push(
        $data,
        $cartes[$num]
    );
}



// Instanciation de la classe dérivée
$pdf = new   EtatListeCarte();
$entreprise = bureaux::getByNom($_SESSION["KaspyISS_bureau"]);
$pdf->logoEtat = $entreprise['logo_etats'];
$pdf->nom_entreprise = $entreprise['libelle'];
$pdf->sigle = $entreprise['sigle'];
$pdf->slogan = $entreprise['slogan'];

$pdf->annee = $_SESSION["KaspyISS_annee"];


// Param"trage de la difusion de l'état
$pdf->SetTitle('Liste des Proprietaires', 1);

$pdf->AliasNbPages();
$pdf->AddPage('L');

$pdf->BasicTable($data);

$pdf->Output();


// Inclusion de la bibliothèque FPDF


// Fonction pour générer le PDF
function generatePDF($data)
{
    // Création d'une nouvelle instance de FPDF
    $pdf = new FPDF();
    $pdf->AddPage();

    // Ajout du logo en haut à droite
    $pdf->Image('chemin/vers/votre_logo.png', 170, 10, 30);

    // Titre du document
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 10, 'Liste des Proprietaires', 0, 1, 'C');

    // Heure de génération
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 10, 'Généré le ' . date('Y-m-d H:i:s'), 0, 1, 'R');

    // Données des bâtiments (supposons que vous ayez une liste d'objets contenant les informations des bâtiments)
    foreach ($data as $batiment) {
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(50, 10, 'Nom du batiment:', 0, 0);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(0, 10, $batiment['nom'], 0, 1);
    }

    // Génération du PDF
    $pdf->Output('liste_Proprietaires.pdf', 'D'); // 'D' pour afficher le téléchargement du fichier
}

// Exemple de données de bâtiments (vous pouvez remplacer cela par les données de votre base de données)
$proprietaires = array(
    array('nom' => 'Batiment A'),
    array('nom' => 'Batiment B'),
    array('nom' => 'Batiment C'),
    // Ajoutez d'autres bâtiments ici...
);

// Appel de la fonction pour générer le PDF
generatePDF($proprietaires);
