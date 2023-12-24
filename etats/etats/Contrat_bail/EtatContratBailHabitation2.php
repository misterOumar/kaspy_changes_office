<?php
require_once("../../plugins/fpdf184/fpdf.php");
include_once('../../config/config.php');
include_once('../../config/db.php');
require_once('../../models/Contrat_bail.php');

class MonPDF extends FPDF {
    private $titre;

    public function __construct($titre) {
        parent::__construct();
        $this->titre = $titre;
    }

    public function genererPDF() {
        $this->AddPage();
        $this->SetFont('Arial', 'B', 16);
        $this->Cell(0, 10, $this->titre, 0, 1, 'C');
        $this->SetFont('Arial', '', 12);
        
    }
}







































?>