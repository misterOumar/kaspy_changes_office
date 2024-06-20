<?php
require_once('../plugins/fpdf184/fpdf.php');
include_once('../config/config.php');
include_once('../config/db.php');
include_once('../functions/functions.php');
require_once("../models/Bureaux.php");
require_once("../models/Vente_devise.php");
require_once("../models/Etats/EtatListeVenteDevise.php");



$data = vente_devise::getAllWithDeviseSymbole();
$pdf = new  EtatListeVentesDevise();
$pdf->generatePDF($data);






