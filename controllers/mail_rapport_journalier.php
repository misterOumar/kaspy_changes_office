<?php

// inclusion
require_once('../plugins/fpdf184/fpdf.php');
include('../functions/functions.php');
include('../config/config.php');
include('../config/db.php');
require_once("../models/Bureaux.php");
require_once("../models/Bureaux.php");
require_once("../models/Achat_devise.php");
require_once("../models/Vente_devise.php");
require_once("../models/Etats/EtatListeAchatDevise.php");
require_once("../models/Etats/EtatListeVenteDevise.php");
require_once("../models/Etats/EtatListeRapportDevise.php");
include('../plugins/email/envois_mail_point_journalier.php');


// pieces jointes en pdf
$date_jour = date("Y-m-d");
//  1- journal d'achat de devise
$data = achat_devise::getByDateWithDeviseSymbole($date_jour);
$pdf = new EtatListeAchatsDevise();
$pdf_journal_achat_devise = $pdf->generatePDF($data, true);

// 2- journal de vente de devise
$ventes_devise = vente_devise::getByDateWithDeviseSymbole($date_jour);
$pdf_vente_devise = new EtatListeVentesDevise();
$pdf_journal_vente_devise = $pdf_vente_devise->generatePDF($ventes_devise, true);

// 3- rapport change
$rapport_change = achat_devise::getRapportChangesByDate($date_jour);
$pdf_rapport_change = new EtatListeRapportDevise();
$pdf_rapport_devises = $pdf_rapport_change->generatePDF($rapport_change, true);

$pieces_jointes = [$pdf_journal_achat_devise, $pdf_journal_vente_devise, $pdf_rapport_devises];


// Appel de la fonction pour envoyer le point journalier
$entreprise = bureaux::getByNom($_SESSION["KaspyISS_bureau"]);
// var_dump($entreprise);
$nom_manager = $entreprise["responsable"];
$email_manager = $entreprise["email"];
$date = date('d-m-Y');
$mail_objet = 'Point Journalier du ' . $date . " By Kaspy Changes Office"; // Générez le PDF et obtenez le chemin du fichier

envoyerPointJournalier($nom_manager, $email_manager, $date, $pieces_jointes, $mail_objet);

// supprimer les pieces jointes après envoi
foreach ($pieces_jointes as $piece) {
    if (file_exists($piece)) {
        unlink($piece);
    }
}
