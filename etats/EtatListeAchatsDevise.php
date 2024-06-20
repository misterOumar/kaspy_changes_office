<?php
require_once('../plugins/fpdf184/fpdf.php');
include_once('../config/config.php');
include_once('../config/db.php');
include_once('../functions/functions.php');
require_once("../models/Bureaux.php");
require_once("../models/Achat_devise.php");
require_once("../models/Etats/EtatListeAchatDevise.php");






// Utilisation pour l'aperçu
$data = achat_devise::getAllWithDeviseSymbole($date);
$pdf = new EtatListeAchatsDevise();
$pdf->generatePDF($data);









