<?php
require_once("../../plugins/fpdf184/fpdf.php");
include_once('../../config/config.php');
include_once('../../config/db.php');
require_once('../../models/Contrat_bail.php');
//require_once("../models/Matieres.php");

class ContratBailPDF extends FPDF {
    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Page '.$this->PageNo(), 0, 0, 'C');
    }

    function page_1() {
        
        $this->SetFont('Arial', 'B', 11);
        $this->Cell(0, 10, 'CONTRAT DE BAIL A USAGE PROFESSIONNEL', 0, 1, 'C');

        $this->SetFont('Arial', '', 10);
        // Informations sur le bailleur
        $this->Cell(0, 10, 'ENTRE', 0, 1);
        $this->MultiCell(0, 10, "Nom et prenom du proprietaire : _________________________\n", 0, 'L');
        $this->MultiCell(0, 10, "Piece d'identite(CNI) ou passport N° : _________________Etablie le : _______________\n", 0, 'L');
        $this->MultiCell(0, 10, "Domicile : _______________________N°Téléphone : ____________________________________\n", 0, 'L');
        $this->MultiCell(0, 10, "Email : ____________________________________________________________________________\n", 0, 'L');
        $this->MultiCell(0, 10, "Compte contribuable : ______________________________________________________________\n", 0, 'L');
        $this->MultiCell(0, 10, "Denommé au cours du present acte <<LE BAILLEUR>>                                    \n", 0, 'L');

        // Informations sur le locataire
        $this->Cell(0, 10, 'ET', 0, 1);
        $this->MultiCell(0, 10, "Nom et prenom du Locataire : _________________________\n", 0, 'L');
        $this->MultiCell(0, 10, "Piece d'identite(CNI) ou passport N° : _________________Etablie le : _______________\n", 0, 'L');
        $this->MultiCell(0, 10, "Domicile ou siege social: ___________________________________________________________\n", 0, 'L');
        $this->MultiCell(0, 10, "Registre de commerce N°: ___________________________________________________________\n", 0, 'L');
        $this->MultiCell(0, 10, "Cel : _______________________Tel. Bureau : ________________________Email:_____________________\n", 0, 'L');
        $this->MultiCell(0, 10, "Denommé au cours du present acte <<LE PRENEUR>>                                    \n", 0, 'L');
        $this->MultiCell(0, 10, "LESQUELLES ont convenu et arreté le contrat de bail qui suit                       \n", 0, 'L');

        // Description BAIL
        $this->Cell(0, 10, 'BAIL', 0, 1, 'C');
        $this->MultiCell(0, 10, "Le BAILLEUR donne en location a USAGE PROFESSIONNEL, sous les conditions et moyennant le prix ci-après indiqués au PRENEUR qui accepte. Les biens et droits immobiliers dont\n la designation suit\n", 0, 'L');

        // DESIGNATION
        $this->Cell(0, 10, 'DESIGNATION', 0, 1, 'C');
        $this->MultiCell(0, 10, "_____________________________________________________________________________________\n", 0, 'L');
        $this->MultiCell(0, 10, "_____________________________________________________________________________________\n", 0, 'L');
        $this->MultiCell(0, 10, "_____________________________________________________________________________________\n", 0, 'L');

        
    }


    
    function page_2() {
     
        $this->SetFont('Arial', '', 10);
        // Informations sur le bailleur
        $this->Cell(0, 10, 'I. CLAUSES ET CONDITIONS PARTICULIERES', 0, 1, 'C');
        $this->MultiCell(0, 10, "DUREE DU BAILLE present bail est consenti pour une durée de _________________________\n", 0, 'L');
        $this->MultiCell(0, 10, "qui commenceront à courir à compter du ________________ _______________\n", 0, 'L');
        $this->MultiCell(0, 10, "RENOUVELEMENT DU BAIL. Le droit au renouvellemenbt du bail est acquis au PRENEUR qui justifie avoir exploité conformement aux stipulations du bail\n", 0, 'L');
        $this->MultiCell(0, 10, "Le PRENEUR  qui a droit au renouvellement de son bail doit en demander le renouvellement au plus tard trois (03) mois avant l'expiration du bail\n", 0, 'L');
        $this->MultiCell(0, 10, "Le BAILLEUR devra au plus tard un (01) mois avant l'expiration du bail faire connaitre sa reponse a la demande de renouvellement a defaut, il sera réputéavoir accepté le renouvellmentdu bail \n", 0, 'L');
        $this->MultiCell(0, 10, "INDEMNITE D'EVICTION. Le BAILLEUR peut s'opposer au droit au renouvellement du bail en reglant au PRENEUR une indemnité d'eviction\n", 0, 'L');
        $this->MultiCell(0, 10, "LOYER. Le present bail est consenti et accepté moyennant un loyer mensuel en lettre(en lettre)\n", 0, 'L');
        $this->MultiCell(0, 10, "______________________________________________________________________________________\n", 0, 'L');
        $this->MultiCell(0, 10, "En chiffre _______________________ FRANCS CFA payable par mois et d'avance, au plus tard le 05 du mois en cours, en espèces ou par chèque\n", 0, 'L');
        $this->MultiCell(0, 10, "REVISION DU LOYER. Les parties conviennent que le loyer pourra etre revisé tous les trois (03) ans. A defaut d'accord entre les parties, le nouveau montant du loyer prendra en compte le taux de reference des loyers fixé anuellement par l'Etat de Cote d'ivoire dont decision tiendra compte des élément suivants : \n", 0, 'L');
        $this->MultiCell(0, 10, "1. la situation des locaux\n", 0, 'L');
        $this->MultiCell(0, 10, "2. leur superficie\n", 0, 'L');
        $this->MultiCell(0, 10, "3. l'etat vétusté\n", 0, 'L');
        $this->MultiCell(0, 10, "4. le prix des loyers commerciaux courament praqtiques dans le voisinage pour les locaux similaires\n", 0, 'L');

        $this->MultiCell(0, 10, "DEPOT DE GARANTIE (OU CAUTION). A titre de provision et pour la garantie de l'execution des clauses et conditions du present contrat , le PRENEUR a versé entre les mains du BAILLEUR la somme de (en lettres)\n", 0, 'L');
        $this->MultiCell(0, 10, "_____________________________________________________________________________________\n", 0, 'L');
    }

    function page_3() {
     
        $this->SetFont('Arial', '', 10);
        // Informations sur le bailleur
        $this->Cell(0, 10, 'II. CHARGES ET CONDITIONS GENERALES', 0, 1, 'C');
        $this->MultiCell(0, 10, "Le present bail est consenti et accepté sous les charges et conditions ordinaire et de droit que le PRENEUR, s'oblige a executer et accomplir sous peine de tous dommages et interets et meme de resiliation immediate et de plein droit du present bail si bon semble au BAILLEUR \n savoir \n", 0, 'L');
        $this->Cell(0, 10, 'MOBILIER', 0, 1);        
        $this->MultiCell(0, 10, "Les lieux sont loués et le PRENEUR s'engage a garnir les lieux loués de meubles, marchandises et objets mobiliers de valeurs en qualité suffisante pour garantir le BAILLEUR du paiment des loyers et de l'execution de toutes les conditions du bail.\n", 0, 'L');
        $this->MultiCell(0, 10, "CESSION DE BAIL OU SOUS-LOCATION . Toute cession ou sous location de bail doit etre constatée par acte notarié ou sous seing privé, et signifié au BAILLEURpar acte extrajudiciaire\n", 0, 'L');
        $this->MultiCell(0, 10, "A defaut de signification dans les conditions ci-dessous la cession ou la sous location sera inopposable au BAILLEUR\n", 0, 'L');
        $this->MultiCell(0, 10, "Le BAILLEUR dispose d'un delai de un (01) mois a compter de cette signification pour, pour s'opposer, le cas echeant a celle ci et saisir à bref delai la juridiction competente, en justifiant les motifs serieux et legitimes qui pourraient s'opposer a cette cession\n", 0, 'L');
        $this->MultiCell(0, 10, "La violation par le PRENEUR des obligations du bail et notamment le non paiement du loyer constitue un motif sérieux et légitimes de s'opposer à cette cession\n", 0, 'L');
        $this->MultiCell(0, 10, "Pendant toute la duree de la procedure, le cedant demeure tenu aux obligations du bail\n", 0, 'L');
        $this->MultiCell(0, 10, "Lorsque le loyer de la sous location totale ou partielle est supérieur au prix du bail principal le BAILLEUR a la faculté d'exiger une augmentation correspondante du prix du bail principal\n", 0, 'L');
        $this->MultiCell(0, 10, "DEGRADATIONS ET VOLS. Le PRENEUR est responsable de toutes les degradations ou vols quelconques qui pourraient être commis par lui, par son personnel ou par des tiers dans les locaux loués et il en supportera les consequences. \n", 0, 'L');
        $this->MultiCell(0, 10, "REGLEMENTS URBAINS. Le PRENEUR satisfera en lieu et place et place du BAILLEUR a toutes les prescriptions de police, de voirie et d'hygiène et à tous reglement administratif établis ou a etablir de manière que le BAILLEUR ne soit pas inquiète a cet egard\n", 0, 'L');
        $this->MultiCell(0, 10, "IMPOTS-PATENTES-TAXES LOCATIVES. Le PRENEEUR s'acquittera à partir du jour de l'entrée en jouissance, en sus du lover ci dessus fixé, de toutes contributions, taxes et  autres, tous impots afférents a son activité, y compris la patente, l'excetion des impots fonciers qui resteront à la charge du BAILLEUR\n", 0, 'L');
        
    }
}

$pdf = new ContratBailPDF();
$pdf->AddPage();
$pdf->page_1();
$pdf->AddPage();
$pdf->page_2();
$pdf->AddPage();
$pdf->page_3();
$pdf->Output();

?>