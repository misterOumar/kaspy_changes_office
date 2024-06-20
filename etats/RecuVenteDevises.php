 <?php

    // Journal des recouvrements
    if (isset($_GET['idRecuImprimer'])) {
        // include('../functions/functions.php');
        require_once('../plugins/fpdf184/fpdf.php');
        include_once('../config/config.php');
        include_once('../config/db.php');
        include_once('../functions/functions.php');
        require_once("../models/Bureaux.php");
        require_once("../models/Vente_devise.php");
        require_once("../models/Client.php");

        $id_vente_devise = intval($_GET['idRecuImprimer']);
        $vente_devise = vente_devise::getByID($id_vente_devise);

        $client = client::getByClient($vente_devise['client']);




        // Propriéte de l'entrepise
        $entreprise = bureaux::getByNom($_SESSION["KaspyISS_bureau"]);
        $logoEtat = $entreprise['logo_pc'];
        $logo = API_HOST . '/assets/images/' . $logoEtat;
        $nom_entreprise = $entreprise['raison_sociale'];
        $sigle = $entreprise['sigle'];
        $slogan = $entreprise['slogan'];
        $annee = $_SESSION["KaspyISS_annee"];
        // Convertir la chaîne de date en objet DateTime
        $date = DateTime::createFromFormat('d/m/Y H:i', $vente_devise['date_creation']);

        if ($date === false) {
            // Si la conversion échoue, essayer un autre format
            $date = new DateTime($vente_devise['date_creation']);
        }

        // Formater la date pour afficher le jour, le mois et l'année
        $dateFormatee = $date->format('d/m/Y à H:i:s');


        class PDF extends FPDF
        {
            // Méthode pour définir le style de trait en pointillés
            function SetDash($black = false, $white = false)
            {
                if ($black && $white) {
                    $s = sprintf('[%.3F %.3F] 0 d', $black * $this->k, $white * $this->k);
                } else {
                    $s = '[] 0 d';
                }
                $this->_out($s);
            }

            // Méthode pour dessiner une ligne en pointillés
            function DrawDashedLine($x1, $y1, $x2, $y2)
            {
                $this->SetDash(1, 1); // Définit les pointillés avec une longueur de 1 unité de trait et 1 unité d'espace
                $this->Line($x1, $y1, $x2, $y2);
                $this->SetDash(); // Réinitialise pour des traits solides après avoir dessiné la ligne
            }
        }


        $pdf = new PDF();
        // ---------------------------------entete du fichier fpdf-----------------------------------
        $pdf->AddPage();

        // ---------------------------------corps du fichier fpdf-----------------------------------

        function generateReceipt($pdf, $logo, $entreprise, $annee, $dateFormatee, $client, $vente_devise)
        {
            // Logo
            $pdf->Image($logo, 10, $pdf->GetY(), 20);

            // Nom de l'entreprise
            $pdf->Cell(22);
            $pdf->SetFont('Arial', 'B', 16);
            $pdf->Cell(0, 7, $entreprise['raison_sociale'], 0, 0, 'L');
            //contacts
            $pdf->Cell(135);
            $pdf->SetFont('Arial', '', 10);
            $pdf->Cell(0, 7, "Contactez nous aux : " , 0, 0, 'R');

            // Sigle de l'entreprise
            $pdf->Ln(7);
            $pdf->Cell(22);
            $pdf->SetFont('Arial', '', 12);
            $pdf->Cell(0, 7, $entreprise['sigle'], 0, 0, 'L');
            // contacts
            $contacts_entreprise = $entreprise['tel2'] != '' ? $entreprise['tel1'] . " / ". $entreprise['tel2'] : "";
            $pdf->Cell(135);
            $pdf->SetFont('Arial', '', 10);
            $pdf->Cell(0, 7, $contacts_entreprise , 0, 0, 'R');
            // Slogan de l'entreprise
            $pdf->Ln(6);
            $pdf->Cell(22);
            $pdf->SetFont('Arial', 'I', 10);
            $pdf->Cell(0, 7, $entreprise['slogan'], 0, 0, 'L');

            // ENTETE DROITE
            // Année académique
            $pdf->Ln(0);
            $pdf->Cell(135);
            $pdf->SetFont('Arial', '', 10);
            $pdf->Cell(0, 7, "Année de gestion : " . $annee, 0, 0, 'R');
          

            // TITRE DE L'ETAT
            $pdf->Ln(12);
            $pdf->SetFont('Arial', 'B', 18);
            $pdf->Cell(100, 14, "REÇU DE VENTE DE DEVISE", 1, 0, 'C');

            $pdf->Cell(2);
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(20, 7, "Date: ", 'LTB', 0, 'L');
            $pdf->SetFont('Arial', 'I', 10);
            $pdf->Cell(65, 7, $dateFormatee, 'RTB', 0, 'L');
            
            
            $pdf->Ln();
            $pdf->Cell(102);
            $bordereau_numero = substr(date("Y"), -2) . "V000".$vente_devise["id"];
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(30, 7, "Bordereau N°:", 'LTB', 0, 'L');
            $pdf->SetTextColor(255, 0, 0);
            $pdf->SetFont('Arial', 'B', 11);
            $pdf->Cell(55, 7, $bordereau_numero, 'RTB', 0, 'L');
            $pdf->SetTextColor(0, 0, 0);

            // CIVILITE & NOM
            $nom_prenom = $client['civilite'] . ' ' . strtoupper($client['nom']);
            $pdf->Ln(9);
            $pdf->Cell(120, 18, "", 1, 0, 'L');
            $pdf->Ln(0);
            $pdf->Cell(120, 10, $nom_prenom, 0, 0, 'L');

            // NUMERO DE PIECE
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(25, 9, "N° Pièce", 1, 0, 'L');
            $pdf->SetFont('Arial', 'I', 10);
            $pdf->Cell(42, 9, $client['numero_de_piece'], 1, 0, 'L');
            $pdf->Ln(9);

            // TYPE DE PIECE
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(15, 9, "Type :", 0, 0, 'L');
            $pdf->SetFont('Arial', 'I', 10);
            $pdf->Cell(20, 9, $client['type'], 0, 0, 'L');

            // ADRESSE
            $pdf->Cell(20);
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(20, 9, "Adresse :", 0, 0, 'L');
            $pdf->SetFont('Arial', 'I', 10);
            $pdf->Cell(45, 9, $client['adresse'], 0, 0, 'L');

            // TELEPHONE
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(25, 9, "Téléphone", 1, 0, 'L');
            $pdf->SetFont('Arial', 'I', 10);
            $pdf->Cell(42, 9, $client['contact'], 1, 0, 'L');

            $pdf->Ln(9);
            $pdf->Cell(187, 22, "", 1, 0, 'L');
            $pdf->Ln(2);

            $pdf->Cell(2);
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(30, 8, "Montant ", 1, 0, 'L');
            $pdf->SetFont('Arial', 'I', 10);
            $pdf->Cell(35, 8, number_format($vente_devise['quantite'], 0, '', ' '), 'LTB', 0, 'L');
            $pdf->Cell(20, 8, $vente_devise['devise'], 'RTB', 0, 'R');

            // TAUX VENTE
            $pdf->Cell(2);
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(15, 8, "Taux ", 1, 0, 'L');
            $pdf->SetFont('Arial', 'I', 10);
            $pdf->Cell(15, 8, $vente_devise['taux_vente'], 1, 0, 'C');

            // MONTANT BRUT
            $pdf->Cell(2);
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(24, 8, "Total Brut ", 1, 0, 'L');
            $pdf->SetFont('Arial', 'I', 10);
            $pdf->Cell(40, 8, number_format($vente_devise['montant_brut'], 0, '', ' '), 1, 0, 'C');

            // MONTANT NET
            $pdf->Ln(10);
            $pdf->Cell(2);
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(90, 8, "Contre-Valeur à récevoir :", 1, 0, 'L');
            $pdf->Cell(2);
            $pdf->Cell(91, 8, number_format($vente_devise['montant_net'], 0, '', ' '), 1, 0, 'C');

            $pdf->Ln(14);
            $pdf->SetFont('Arial', 'BU', 10);
            $pdf->Cell(92, 30, "", 1, 0, 'C');
            $pdf->Cell(2);
            $pdf->Cell(93, 30, "", 1, 0, 'C');
            $pdf->Ln(1);

            // SIGNATURE DU CAISSIER
            $pdf->Cell(2);
            $pdf->Cell(90, 5, "Signature du caissier", 0, 0, 'C');

            // SIGNATURE DU CLIENT
            $pdf->Cell(2);
            $pdf->Cell(90, 5, "Signature du client", 0, 0, 'C');

            // MONTANT EN LETTRE
            $pdf->Ln(30);
            $pdf->SetFont('Arial', 'I', 10);
            $pdf->Cell(187, 5, "Arrêter le présent reçu a la somme de :", 0, 0, 'L');
            $pdf->Ln(6);
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(187, 5, $vente_devise['montant_lettre'], 0, 0, 'L');
        }


        // recu du client
        generateReceipt($pdf, $logo, $entreprise, $annee, $dateFormatee, $client, $vente_devise);


        // --------------------------
        // Dessiner une ligne en pointillés au centre de la page
        $pageWidth = $pdf->GetPageWidth();
        $pageHeight = $pdf->GetPageHeight();
        $yPosition = ($pageHeight / 2) - 4;

        $pdf->DrawDashedLine(10, $yPosition, $pageWidth - 10, $yPosition);

        // Déplacer le pointeur à la position appropriée pour le second reçu
        $pdf->SetY($yPosition + 5);

        // recu agence
        generateReceipt($pdf, $logo, $entreprise, $annee, $dateFormatee, $client, $vente_devise);


        // Indiquez au navigateur de traiter le fichier PDF en ligne
        header('Content-type: application/pdf');
        header('Content-Disposition: inline; filename="JournalDesTransactionsOrangeMoney.pdf"');
        $pdf->SetTitle('RECU VENTE DE DEVISES', 1);
        $pdf->Output('I', 'VENTE_DEVISE_'.$vente_devise['date_creation'].'.pdf');

        exit;
    }
