<?php
require_once('../plugins/fpdf184/fpdf.php');
include_once('../config/config.php');
include_once('../config/db.php');
require_once("../models/Bureaux.php");
require_once("../models/Batiments.php");

class EtatListeBatiments extends FPDF
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
            $this->SetFont('Helvetica', '', 15);
            $this->Cell(0, 7, "Année de gestion : " . $this->annee, 0, 0, 'R');


            // TITRE DE L'ETAT
            $this->Ln(12);
            $this->Cell(45);
            $this->SetFont('Helvetica', 'B', 15);
            $this->Cell(200, 10, 'LISTE DES BATIMENTS', 1, 0, 'C');

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
        $this->Cell(90, 7, "Libelle", 1, 0, 'C');
        $this->Cell(45, 7, "Type", 1, 0, 'C');
        $this->Cell(65, 7, "Nombre d'appartement", 1, 0, 'C');
        $this->Cell(22, 7, "Acenseur", 1, 0, 'C');
        $this->Cell(20, 7, "Parking", 1, 0, 'C');
        $this->Cell(20, 7, "Jardin", 1, 0, 'C');
        $this->Ln();

        $i = 1;
        $this->SetFont('Helvetica', '', 9);
        foreach ($data as $batiment) {
            $this->Cell(10, 6, $i, 1, 0, 'C');
            $this->Cell(90, 6, $batiment['libelle'], 1, 0, '');
            $this->Cell(45, 6,  $batiment['type_batiment'], 1, 0, 'C');
            $this->Cell(65, 6,  $batiment['nombre_appartement'] , 1, 0, 'C');
            $this->Cell(22, 6,  $batiment['ascenseur'] == 0 ? 'non' : 'oui', 1, 0, 'C');
            $this->Cell(20, 6,  $batiment['parking'] == 0 ? 'non' : 'oui' , 1, 0, 'C');
            $this->Cell(20, 6,  $batiment['jardin'] == 0 ? 'non' : 'oui', 1, 0, 'C');
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
$batiments = batiments::getAll();
for ($num = 0; $num < count($batiments); $num++) {
    array_push(
        $data,
        $batiments[$num]
    );
}



// Instanciation de la classe dérivée
$pdf = new EtatListeBatiments();
$entreprise = bureaux::getByNom($_SESSION["KaspyISS_bureau"]);
$pdf->logoEtat = $entreprise['logo_etats'];
$pdf->nom_entreprise = $entreprise['libelle'];
$pdf->sigle = $entreprise['sigle'];
$pdf->slogan = $entreprise['slogan'];

$pdf->annee = $_SESSION["KaspyISS_annee"];


// Param"trage de la difusion de l'état
$pdf->SetTitle('Liste des Batiments', 1);

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
    $pdf->Cell(0, 10, 'Liste des batiments', 0, 1, 'C');

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
    $pdf->Output('liste_batiments.pdf', 'D'); // 'D' pour afficher le téléchargement du fichier
}

// Exemple de données de bâtiments (vous pouvez remplacer cela par les données de votre base de données)
$batiments = array(
    array('nom' => 'Batiment A'),
    array('nom' => 'Batiment B'),
    array('nom' => 'Batiment C'),
    // Ajoutez d'autres bâtiments ici...
);

// Appel de la fonction pour générer le PDF
generatePDF($batiments);