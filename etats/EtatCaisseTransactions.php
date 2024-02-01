<?php
require_once('../plugins/fpdf184/fpdf.php');
include_once('../config/config.php');
include_once('../config/db.php');
require_once("../models/Bureaux.php");
require_once("../models/Caisse.php");

class EtatListeProprietaires extends FPDF
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
            $this->Cell(20);
            $this->SetFont('Helvetica', 'B', 15);
            $this->Cell(150, 10, 'RAPPORT DE LA CAISSE DES TRANSACTIONS', 1, 0, 'C');


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
        $this->Cell(30, 7, "DATE", 1, 0, 'C');
        $this->Cell(65, 7, "LIBELLE", 1, 0, 'C');
        $this->Cell(30, 7, "ENTREE", 1, 0, 'C');
        $this->Cell(30, 7, "SORTIE", 1, 0, 'C');
        $this->Cell(35, 7, "SOLDE", 1, 0, 'C');
        $this->Ln();


        $this->SetFont('Helvetica', '', 9);
        // Initialiser le solde accumulé à zéro
        $soldeAccumule = 0;
        // Initialiser la date précédente à null
        $datePrecedente = null;

        foreach ($data as $transaction_caisse) {
            // Convertir la chaîne de date en objet DateTime
            $date = DateTime::createFromFormat('d/m/Y H:i', $transaction_caisse['date']);
        
            if ($date === false) {
                // Si la conversion échoue, essayer un autre format
                $date = new DateTime($transaction_caisse['date']);
            }
        
            // Formater la date pour afficher le jour, le mois et l'année
            $dateFormatee = $date->format('d/m/Y');
        
            // Vérifier si la date a changé
            if ($datePrecedente !== null && $datePrecedente != $dateFormatee) {
                // Ajouter une ligne pour le solde du jour
                $this->SetFont('Helvetica', 'B', 10);
                $this->SetFillColor(85, 156, 173);
                $this->Cell(155, 6,  'Solde du jour '. $datePrecedente, 1, 0, 'C', true); 
                $this->Cell(35, 6,  $soldeAccumule, 1, 0, 'C', true); // Cellule pour le solde du jour avec couleur de remplissage
                $this->Ln();
        
                // Réinitialiser le solde pour le nouveau jour
                // $soldeAccumule = 0;
            }
        
            // Calculer le solde pour la ligne actuelle
            $soldeLigne = $transaction_caisse['ENTREE'] - $transaction_caisse['SORTIE'];
        
            // Ajouter le solde de la ligne actuelle au solde accumulé
            $soldeAccumule += $soldeLigne;
            $this->SetFont('Helvetica', '', 9);
            
            $montant_entre = $transaction_caisse['ENTREE'];
            if ($montant_entre < 0) {
                $montant_entre = -($montant_entre);
            }

            $this->Cell(30, 6,  $dateFormatee, 1, 0, 'C');
            $this->Cell(65, 6,  $transaction_caisse['Libelle'], 1, 0, '');
            $this->Cell(30, 6,  $montant_entre , 1, 0, '');
            $this->Cell(30, 6,  $transaction_caisse['SORTIE'], 1, 0, 'C');
            
            // Placer la couleur de remplissage avant la ligne du solde du jour
            $this->SetFillColor(85, 156, 173);
            
            $this->Cell(35, 6,  $soldeAccumule, 1, 0, 'C');
            $this->Ln();
        
            // Mettre à jour la date précédente
            $datePrecedente = $dateFormatee;
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
$transactions_caisse = caisse::getAllRapport();
for ($num = 0; $num < count($transactions_caisse); $num++) {
    array_push(
        $data,
        $transactions_caisse[$num]
    );
}



// Instanciation de la classe dérivée
$pdf = new EtatListeProprietaires();
$entreprise = bureaux::getByNom($_SESSION["KaspyISS_bureau"]);
$pdf->logoEtat = $entreprise['logo_pc'];
$pdf->nom_entreprise = $entreprise['raison_sociale'];
$pdf->sigle = $entreprise['sigle'];
$pdf->slogan = $entreprise['slogan'];

$pdf->annee = $_SESSION["KaspyISS_annee"];


// Param"trage de la difusion de l'état
$pdf->SetTitle('RAPPORT DE LA CAISSE DES TRANSACTIONS', 1);

$pdf->AliasNbPages();
$pdf->AddPage('P');

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
    $pdf->Output('liste_caisse_transactions.pdf', 'D'); // 'D' pour afficher le téléchargement du fichier
}



// Appel de la fonction pour générer le PDF
generatePDF($proprietaires);
