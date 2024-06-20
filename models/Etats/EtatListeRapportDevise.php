
<?php

class  EtatListeRapportDevise extends FPDF
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
            $this->Cell(45);
            $this->SetFont('Helvetica', 'B', 15);
            $this->Cell(120, 10, 'RAPPORT DES ACHATS/VENTES DE DEVISE', 1, 0, 'C');

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
        $this->Cell(30, 7, "Date", 1, 0, 'C');
        $this->Cell(30, 7, "Achat", 1, 0, 'C');
        $this->Cell(30, 7, "Vente", 1, 0, 'C');
        $this->Cell(20, 7, "Taux", 1, 0, 'C');
        $this->Cell(30, 7, "Total", 1, 0, 'C');
        $this->Cell(35, 7, "SOLDE", 1, 0, 'C');
        $this->Ln();

        $this->SetFont('Helvetica', '', 9);

        // Initialiser le solde accumulé à zéro
        $soldeAccumule = 0;
        $gainDuJour = 0;
        // Initialiser la date précédente à null
        $datePrecedente = null;
        $nombre_operation = count($data);
        // var_dump($nombre_operation);

        if (count($data) > 0) {
            $i = 1;

            foreach ($data as $rapport_operations_change) {
                // Convertir la chaîne de date en objet DateTime
                $date = DateTime::createFromFormat('d/m/Y', $rapport_operations_change['dates']);
                if ($date === false) {
                    $date = new DateTime($rapport_operations_change['dates']);
                }
                // Formater la date pour afficher le jour, le mois et l'année
                $dateFormatee = $date->format('d/m/Y');

                // Vérifier si la date a changé
                if (($datePrecedente !== null && $datePrecedente != $dateFormatee)) {
                    // Ajouter une ligne pour le solde du jour
                    $this->SetFont('Helvetica', 'B', 10);
                    $this->SetFillColor(255, 212, 0);
                    $this->Cell(70, 6,  'Solde du jour ' . $datePrecedente, 1, 0, 'C', true);
                    $this->Cell(30, 6,  formaterNombre($soldeAccumule), 1, 0, 'C', true); // Cellule pour le solde du jour avec couleur de remplissage
                    if ($gainDuJour > 0) {
                        # code...
                        $this->SetFillColor(152, 211, 141);
                        $this->Cell(50, 6,  'Gain ', 1, 0, 'C', true);
                        $this->Cell(35, 6,  formaterNombre($gainDuJour), 1, 0, 'C', true); // Cellule pour le solde du jour avec couleur de remplissage
                    } else {
                        $this->SetFillColor(255, 173, 173);
                        $this->Cell(50, 6,  'Perte ', 1, 0, 'C', true);
                        $this->Cell(35, 6,  formaterNombre($gainDuJour), 1, 0, 'C', true);
                    }
                    $this->Ln();

                    // Réinitialiser le gain pour le nouveau jour
                    $gainDuJour = 0;
                }

                // Calculer le solde pour la ligne actuelle
                $soldeLigne = ($rapport_operations_change['Vente'] * $rapport_operations_change['taux']) - ($rapport_operations_change['Achat'] * $rapport_operations_change['taux']);

                // Calculer le gain pour la ligne actuelle
                $gainLigne = ($rapport_operations_change['Vente'] * $rapport_operations_change['taux']) - ($rapport_operations_change['Achat'] * $rapport_operations_change['taux']);

                // Ajouter le solde de la ligne actuelle au solde accumulé
                $soldeAccumule += $soldeLigne;
                $gainDuJour += $gainLigne;
                $this->SetFont('Helvetica', '', 10);


                $achat = $rapport_operations_change['Achat'] != 0 ? formaterNombre($rapport_operations_change['Achat']) . " " . $rapport_operations_change['symbole_devise'] : 0;
                $vente = $rapport_operations_change['Vente'] != 0 ? formaterNombre($rapport_operations_change['Vente']) . " " . $rapport_operations_change['symbole_devise'] : 0;

                $this->Cell(10, 6, $i, 1, 0, 'C');
                $this->Cell(30, 6,  $dateFormatee, 1, 0, 'C');
                $this->Cell(30, 6, $achat, 1, 0, 'C');
                $this->Cell(30, 6, $vente, 1, 0, 'C');
                $this->Cell(20, 6,  $rapport_operations_change['taux'], 1, 0, 'C');
                $this->Cell(30, 6,  formaterNombre($rapport_operations_change['total']), 1, 0, 'C');
                // Placer la couleur de remplissage avant la ligne du solde du jour
                $this->SetFillColor(255, 212, 0);

                $this->Cell(35, 6,  formaterNombre($soldeAccumule), 1, 0, 'C');
                $this->Ln();

                // Mettre à jour la date précédente
                $datePrecedente = $dateFormatee;
                $i++;
            }

            // la ligne du jour en cours
            if ($nombre_operation === $i - 1) {
                // Ajouter une ligne pour le solde du jour
                $this->SetFont('Helvetica', 'B', 10);
                $this->SetFillColor(255, 212, 0);
                $this->Cell(70, 6,  'Solde du jour ' . $datePrecedente, 1, 0, 'C', true);
                $this->Cell(30, 6,  formaterNombre($soldeAccumule), 1, 0, 'C', true); // Cellule pour le solde du jour avec couleur de remplissage
                if ($gainDuJour > 0) {
                    # code...
                    $this->SetFillColor(152, 211, 141);
                    $this->Cell(50, 6,  'Gain ', 1, 0, 'C', true);
                    $this->Cell(35, 6,  formaterNombre($gainDuJour), 1, 0, 'C', true); // Cellule pour le solde du jour avec couleur de remplissage
                } else {
                    $this->SetFillColor(255, 173, 173);
                    $this->Cell(50, 6,  'Perte ', 1, 0, 'C', true);
                    $this->Cell(35, 6,  formaterNombre($gainDuJour), 1, 0, 'C', true);
                }
                $this->Ln();

                // Réinitialiser le gain pour le nouveau jour
                $gainDuJour = 0;
            }
        }else{
            $this->Cell(185, 6,  "Aucune Transaction d'achat ou de vente de dévise enregistrée aujourd'hui.", 1, 0, 'C');
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

    public function generatePDF($data, $saveToFile = false)
    {
        $entreprise = bureaux::getByNom($_SESSION["KaspyISS_bureau"]);
        $this->logoEtat = $entreprise['logo_pc'];
        $this->nom_entreprise = $entreprise['raison_sociale'];
        $this->sigle = $entreprise['sigle'];
        $this->slogan = $entreprise['slogan'];
        $this->annee = $_SESSION["KaspyISS_annee"];
        $this->SetTitle('Rapport des Devises', 1);
        $this->AliasNbPages();
        $this->AddPage('P');
        $this->BasicTable($data);


        if ($saveToFile) {
            $filePath = '../assets/temp/rapport_devises_' . date('d_m_Y') . '.pdf';
            $this->Output($filePath, 'F');
            return $filePath;
        } else {
            $this->Output();
        }
    }
}