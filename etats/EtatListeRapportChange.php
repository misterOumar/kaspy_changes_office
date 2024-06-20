<?php
require_once('../plugins/fpdf184/fpdf.php');
include_once('../config/config.php');
include_once('../config/db.php');
include_once('../functions/functions.php');
require_once("../models/Bureaux.php");
require_once("../models/Achat_devise.php");
require_once("../models/Etats/EtatListeRapportDevise.php");





$data = achat_devise::getRapportChanges();
$pdf = new  EtatListeRapportDevise();
$pdf->generatePDF($data);



