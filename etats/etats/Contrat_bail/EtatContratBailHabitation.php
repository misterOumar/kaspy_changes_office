<?php
require_once("../../plugins/fpdf184/fpdf.php");
include_once('../../config/config.php');
include_once('../../config/db.php');
require_once('../../models/Contrat_bail.php');

class ContratBailHabitation extends FPDF
{
    public $numero_contrat;
    public $date_signature;
    public $type_contrat;
    public $locataire;
    public $batiment;
    public $appartement;
    public $duree;
    public $duree_indeterminee;
    public $montant_loyer;
    public $frequence_loyer;
    public $mois_caution;
    public $mois_avance;
    public $commission;

    public function __construct(
        $numero_contrat,
        $date_signature,
        $type_contrat,
        $locataire,
        $batiment,
        $appartement,
        $duree,
        $duree_indeterminee,
        $montant_loyer,
        $frequence_loyer,
        $mois_caution,
        $mois_avance,
        $commission
    ) {
        $this->numero_contrat = $numero_contrat;
        $this->date_signature = $date_signature;
        $this->type_contrat = $type_contrat;
        $this->locataire = $locataire;
        $this->batiment = $batiment;
        $this->appartement = $appartement;
        $this->duree = $duree;
        $this->duree_indeterminee = $duree_indeterminee;
        $this->montant_loyer = $montant_loyer;
        $this->frequence_loyer = $frequence_loyer;
        $this->mois_caution = $mois_caution;
        $this->mois_avance = $mois_avance;
        $this->commission = $commission;
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');
    }



    function partie_1($type_contrat)
    {
        $this->SetFont('Arial', 'B', 11);
        $this->Cell(180, 15, "BAIL $type_contrat", 1, 0, 'C');
        $this->MultiCell(0, 6, "\n", 0, 'C');
        //$this->Cell(25, 10, "", 1, 0, 'C');
        $this->SetFont('Arial', '', 10);
        $this->MultiCell(0, 6, "
\nENTRE
Monsieur .........................

Pièce d'identité ......................... le ......................... à .........................
Domicilié à ......................... Cél .........................
Email: .........................
Compte contribuable n°.........................
Dénommé au cours du présent acte « LE BAILLEUR ».                                                       D'une part
ET
Monsieur .........................
Pièce d'identité ......................... établie ......................... à .........................
Profession : ......................... Employeur : .........................
Cél. .........................
Email:.........................
Dénommé au cours du présent acte « LE PRENEUR ».                                                        D'autre part
LESQUELS ont convenu et arrêté le contrat de bail qui suit :
\n", 0, 'L');
        $this->MultiCell(0, 6, "BAIL \n", 0, 'C');
        $this->MultiCell(0, 6, "Le BAILLEUR donne à bail à titre d'habitation, pour une durée, sous les conditions et moyennant le prix ci-après indiqués au PRENEUR qui accepte, les biens immobiliers dont la désignation suit :
\n", 0, 'L');
        $this->MultiCell(0, 6, "DÉSIGNATION \n", 0, 'C');
        $this->MultiCell(0, 6, "....................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................\n", 0, 'L');
        $this->MultiCell(0, 6, "le PRENEUR declare connaitre parfaitemnt le bien loué pour l'avoir vu et visité eb vue du present bail
\n", 0, 'L');

        $this->MultiCell(0, 6, "ÉTAT DES LIEUX \n", 0, 'C');
        $this->MultiCell(0, 6, "Le PRENEUR prendra les lieux loués dans l'état où ils se trouveront lors de l'entrée en jouissance et les rendra en fin de bail tel qu'il les aura reçus suivant l'état des lieux dressé par les parties.
à l'expiration du bail, le PRENEUR veillera à la remise des lieux dans leur état primitif (agencement, enduit, peinture intérieure, etc.)


        \n", 0, 'L');
    }

    function partie_2()
    {

        $this->SetFont('Arial', 'B', 11);
        $this->Cell(0, 10, 'TITRE I : CLAUSES ET CONDITIONS PARTICULIERES', 1, 0, 'C');
        $this->MultiCell(0, 6, "\n", 0, 'C');
        $this->SetFont('Arial', '', 10);
        $this->MultiCell(0, 6, "
ARTICLE 1 - DURÉE DU BAIL
Le présent bail est consenti pour une durée d'une année entière, qui commence le 12/09/2020
Le BAILLEUR ne peut pas rompre le bail avant le terme de la première (1ère) année.

ARTICLE 2 - RENOUVELLEMENT DU BAIL
A l'expiration de la première année, ledit bail se renouvellera par tacite reconduction. Il pourra également être résilié à tout moment, à charge par celle des parties qui voudra faire cesser le présent bail, de donner à l'autre un préavis de trois (3) mois par lettre remise contre décharge ou par acte d'huissier.
ARTICLE 3 - LOYER
Le présent bail est consenti et accepté moyennant un loyer mensuel de TROIS CENT MILLE CFA (300 000 FCFA) payable par mois et d'avance, au plus tard le 15 du mois en cours, en espèces ou par chèque à l'ordre du BAILLEUR.

ARTICLE 4-REVISION DU LOYER
Les parties conviennent que le loyer pourra être révisé tous les TROIS (3) ans. A défaut d'accord entre les parties, le nouveau montant du loyer prendra en compte le taux de référence fixé annuellement par l'Etat de Côte d'Ivoire ou par tout organisme qualifié. Dans tous les cas, l'augmentation ne pourra dépasser les DIX POURCENT (10%).

ARTICLE 5- DEPOT DE GARANTIE (ou CAUTION)
À titre de provision et pour la garantie de l'exécution des clauses du présent contrat, le PRENEUR a versé entre les mains du BAILLEUR, la somme de NEUF CENT MILLE (900 000) FRANCS CFA représentant TROIS (3) MOIS de loyer en guise de dépôt de garantie (ou caution).
Laquelle somme sera conservée par le BAILLEUR pour le compte du PRENEUR durant toute la durée du bail et elle est non productive d'intérêts.
Le locataire ne peut pas se servir du dépôt de garantie (caution) au paiement des loyers même en fin de contrat. A l'expiration du contrat, il garantit le BAILLEUR contre l'insolvabilité et les réparations incombant au PRENEUR.
Pour recevoir la somme déposée par lui à titre de garantie, le PRENEUR doit remettre également au BAILLEUR, les résiliations SODECI-CIE qui attestent qu'il ne doit aucune somme à l'égard desdits établissements, faute de quoi, il autorise le BAILLEUR à payer pour son compte les sommes dues par déduction sur la somme en dépôt disponible.
A l'expiration dudit bail, le dépôt de garantie (caution) sera restitué au PRENEUR après l'exécution de toutes les réparations lui incombant, ainsi que les résiliations CIE et SODECI faites sans laisser d'impayés.

A cet effet, le PRENEUR s'engage à remettre au BAILLEUR, les quitus CIE et SODECI desquels il ressortira qu'il ne doit aucune somme à l'égard desdits établissements, faute de quoi, il autorise le BAILLEUR à payer pour son compte les sommes dues auxdits établissements par déduction sur le dépôt de garantie (caution) disponible.

ARTICLE 6 - DESTINATION DES LIEUX
Les lieux loués devront servir au PRENEUR à un usage d'habitation à l'exclusion de tout autre usage, même temporairement.


        \n", 0, 'L');
    }

    function partie_3()
    {

        $this->SetFont('Arial', 'B', 11);
        $this->Cell(0, 10, 'TITRE II : CHARGES ET CONDITIONS GENERALES', 1, 0, 'C');
        $this->MultiCell(0, 6, "\n", 0, 'C');
        $this->SetFont('Arial', '', 10);
        $this->MultiCell(0, 6, "
Le présent bail est consenti et accepté sous les charges et conditions ordinaires et de droit en pareille matière que le PRENEUR, s'oblige à exécuter et accomplir sous peine de tous dommages-intérêts et même de résiliation immédiate du présent bail si bon semblait au BAILLEUR, savoir :

ARTICLE 7 - CESSION DE BAIL OU SOUS-LOCATION
La présente location a été consentie au PRENEUR « intuitu personae ». Toute cession de bail, sous-location ou simple occupation en tout ou partie des lieux par un tiers, est rigoureusement interdite sous peine de résiliation immédiate du présent contrat de location à la simple constatation de l'infraction et sans qu'il soit besoin de recourir à la procédure de mise en demeure.

ARTICLE 8 - MOBILIER
Le PRENEUR s'engage à garnir les lieux loués, de meubles et objets mobiliers lui appartenant en qualité et de valeurs suffisantes pour répondre du paiement de loyers et de l'exécution de toutes les conditions du bail.

ARTICLE 9 - ENTRETIEN ET RÉPARATIONS
Le PRENEUR entretiendra les lieux loués en bon état de réparation locative, en jouira en bon père de famille, suivant leur usage et ne pourra en aucun cas, rien faire ni laisser, qui puisse les détériorer.
Il supportera toutes réparations qui deviendraient nécessaires par la suite et toutes dégradations résultant de son fait ou de celui de sa famille ou de son personnel de maison.
Il aura entièrement à sa charge, sans recours contre le BAILLBUR, l'entretien
9.1 De la plomberie qui comprend la robinetterie, les colonnes de douche, les chasses d'eau des WC à l'exclusion des canalisations encastrées pour l'adduction en eau potable.
9.2 De l'électricité qui comprend tous les appareils notamment les interrupteurs, prises
dismatics et les luminaires.
9.3 Des aménagements intérieurs et réfection de la peinture qui comprennent les enduits, la propreté des sols, leur revêtement et également la réfection des peintures intérieures tous les deux (2) ans. Il est formellement interdit de changer les couleurs de l'intérieur du bien loué sans l'autorisation préalable et par écrit du BAILLEUR; la peinture extérieure restant à la charge du BAILLEUR qui procédera à sa réfection tous les deux (2) ans également.
Le PRENEUR reste tenu de la réparation des bris de glaces, la détérioration des fenêtres, des châssis naccos, des grilles et volets métalliques même quand cette détérioration est due au fait que le PRENEUR ne les a pas fait fonctionner régulièrement.
Aucune de ces réparations n'est à la charge du locataire quand elles ne sont occasionnées que

par vétusté, guerres civiles, émeutes, tremblements de terre et tout autre cas de force majeure.
Le PRENEUR supportera également toutes dégradations résultant de son fait ou de celui de son prestataire dues à la pose d'une antenne ayant abîmé la toiture du bien loué.
Le PRENEUR ne pourra faire aucune installation électrique et câblage quelconque sans avoir obtenu l'accord préalable et par écrit du BAILLEUR.
Le PRENEUR devra installer les appareils de climatisation et autres conformément aux règles de l'art notamment les compresseurs des splits à l'extérieur sur des socles appropriés. Le PRENEUR devra mettre des tuyaux pour l'écoulement de l'eau des moteurs de climatisation de sorte que l'eau ne s'écoule pas sur les balcons, les terrasses, les grilles métalliques, les volets roulants, les naccos et les baies vitrées.
La première vidange des fosses d'aisance est à la charge du BAILLEUR, et les suivantes à la charge du PRENEUR.
Le PRENEUR devra aviser le BAILLEUR, en temps utile, par tout moyen dont la preuve pourra clairement être rapportée, des grosses réparations qu'il serait nécessaire d'effectuer dans les lieux loués.

ARTICLE 10 - GROSSES REPARATIONS
Le BAILLEUR ne sera tenu d'exécuter, au cours du bail, que les grosses réparations qui pourraient devenir nécessaires (toiture, étanchéité, gros œuvre, etc.); toutes autres réparations quelles qu'elles soient, restant à la charge du PRENEUR.
Outre les dommages résultant de vices de construction, le BAILLEUR ne sera en aucun cas responsable des dégâts ou accidents occasionnés par les fuites d'eau ou de gaz, par l'humidité et généralement pour tous autres cas de force majeure ainsi que pour tout ce qui pourrait en être la conséquence directe ou indirecte.
1
Le PRENEUR souffrira les grosses réparations et toutes transformations nécessaires que le
BAILLEUR
311196
serait tenu d'effectuer au cours du bail, quelles qu'en soient l'importance et la durée sans pouvoir demander aucune indemnité ni diminution ou non-paiement du loyer.

ARTICLE 11 - DÉGRADATIONS ET VOLS
Le PRENEUR est responsable de toutes les dégradations ou vols quelconques qui pourraient être commis par lui, par son personnel ou par des tiers dans les locaux loués et il en supportera les conséquences.

ARTICLE 12 - AMÉNAGEMENTS-TRANSFORMATIONS-CONSTRUCTIONS
Le PRENEUR ne pourra faire aucun aménagement, aucune modification ou transformation de l'état ou de la disposition des locaux, sans l'autorisation préalable et par écrit du BAILLEUR.


ARTICLE 13 - RÈGLEMENTS URBAINS
Le PRENEUR satisfera en lieu et place du BAILLEUR à toutes les prescriptions de police, de voirie et d'hygiène de manière que le BAILLEUR ne soit pas inquiété à cet égard.

ARTICLE 14 - IMPÔTS-PATENTES-TAXES LOCATIVES
Le PRENEUR s'acquittera, à partir du jour de l'entrée en jouissance, en sus du loyer ci-dessus fixé, de toutes contributions, taxes, charges et autres afférents à son occupation, à l'exception des impôts fonciers qui resteront à la charge du BAILLEUR.

ARTICLE 15 - ASSURANCES
Le PRENEUR s'engage à souscrire une assurance contre l'incendie, les 'risques locatifs, le bris de glaces et les recours des voisins et à maintenir cette assurance pendant le cours du présent bail, à en acquitter exactement les primes et cotisations annuelles et à justifier du tout à la première réquisition du BAILLEUR.

ARTICLE 16 - VISITE DES LIEUX
En cas de mise en vente ou de relocation du bien par le propriétaire, le PRENEUR devra laisser visiter le BAILLEUR, ou les acquéreurs et locataires éventuels, chaque fois que le BAILLEUR le jugera utile, à charge pour lui de prévenir le PRENEUR par lettre ou par téléphone au moins 24 heures à l'avance.

ARTICLE 17 - REMISE DES CLÉS
Le jour de l'expiration de la location, le PRENEUR devra remettre au BAILLEUR les clés des locaux. Dans le cas où, par le fait du PRENEUR, le BAILLEUR n'aurait pu mettre en location ou laisser visiter: les lieux ou encore faire la livraison à un nouveau locataire ou même en reprendre la libre disposition, à l'expiration de la location, il aurait droit à une indemnité égale à deux (2) mois de loyer, sans préjudice de tous dommages et intérêts.


        \n", 0, 'L');
    }

    function partie_4()
    {
        $this->SetFont('Arial', 'B', 11);
        $this->Cell(0, 10, 'TITRE III : ENREGISTREMENT ET REGLEMENT DES LITIGES', 1, 0, 'C');
        $this->MultiCell(0, 6, "\n", 0, 'C');
        $this->SetFont('Arial', '', 10);
        $this->MultiCell(0, 6, "
ARTICLE 18 - ENREGISTREMENT
L'enregistrement du bail est requis pour une anide et demeure aux frais du PRENEUR
Le paiement des droits d'enregistrement des années successives demeurera toujours à la charge du
PRENEUR
En vertu de l'article 713 du CGI, ne sera pas assujetti au droit d'enregistrement, le bail conclu au profit d'un locataire, personne physique, destiné à l'habitation et dont le loyer mensuel est inférieur à CINQ CENT MILLE (500 000) francs CFA.
Le locataire, personne morale (société, entreprise, SCI, association, ONG, et...) devra toujours S'acquitter des droits d'enregistrement quel que soit la destination du bien loué et le montant du loyer.

ARTICLE 19 - CLAUSE RÉSOLUTOIRE
À défaut de paiement d'un seul terme de loyer ou d'inexécution de l'une des clauses du présent bail, celui-ci sera résilié de plein droit, si bon semble au BAILLEUR, dix jours après un commandement de payer ou de remplir les conditions en souffrance, par acte d'huissier, et demeuré sans effet.
Tous frais et honoraires engagés à cet effet seront supportés par le locataire qui s'y oblige.

ARTICLE 20 - ÉLECTION DE DOMICILE ET ATTRIBUTION DE JURIDICTION
Pour l'exécution des présentes et de leurs suites, les parties font élection de domicile en leur domicile ou siège social indiqués au début du présent bail.
En outre, toutes les contestations qui pourraient s'élever pendant la durée du bail, pourront être soumises à l'arbitrage de tout organisme qualifié à cette fin et requis par les parties, à défaut le litige sera soumis à la juridiction compétente de la situation des lieux loués.                                                                     
\n", 0, 'L');
        $this->MultiCell(0, 6, "
DONT ACTE \n", 0, 'R');
        $this->MultiCell(0, 6, "Fait à Abidjan
En 2 exemplaires originaux
Le 12/09/2020


        \n", 0, 'C');
    }
}
$pdf->AddPage();
$pdf->page_1();
$pdf->page_2();
$pdf->page_3();
$pdf->page_4();
$pdf->Output();