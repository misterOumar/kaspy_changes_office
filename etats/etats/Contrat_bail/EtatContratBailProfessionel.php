<?php
require_once("../../plugins/fpdf184/fpdf.php");
include_once('../../config/config.php');
include_once('../../config/db.php');
require_once('../../models/Contrat_bail.php');
//require_once("../models/Matieres.php");



class ContratBailProfessionel extends FPDF{

    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Page '.$this->PageNo(), 0, 0, 'C');
    }

    function page_1(){
        $this->SetFont('Arial', 'B', 11);
        $this->Cell(0, 10, 'CONTRAT DE BAIL A USAGE PROFESSIONNEL', 0, 1, 'C');

        $this->SetFont('Arial', '', 10);
        $this->MultiCell(0, 6, "ENTRE \n", 0, 'L');
        $this->MultiCell(0, 6, "PROPRIETAIRE-BAILLEUR:.................................................................................................................................................\n", 0, 'L');
        $this->MultiCell(0, 6, "Référence identité (CNI - RC) N°..........................................établie le.............................................................\n", 0, 'L');
        $this->MultiCell(0, 6, "Domicilié à ....................................................................Cel.:..................................................................................\n", 0, 'L');
        $this->MultiCell(0, 6, "Email :............................................................................................................................................\n", 0, 'L');
        $this->MultiCell(0, 6, "Compte contribuable n°............................................................................................................................................\n", 0, 'L');
        $this->MultiCell(0, 6, "Dénommé au cours du présent acte « LE BAILLEUR ».                                                                       D'une part\n\n", 0, 'L');
        $this->MultiCell(0, 6, "ET\n", 0, 'L');
        $this->MultiCell(0, 6, "LOCATAIRE (ou dénomination): .............................................................................................................\n", 0, 'L');
        $this->MultiCell(0, 6, "....................................................................................................................\n", 0, 'L');
        $this->MultiCell(0, 6, "Référence identité (CNI - RC) N°.......................................établie le .................................................................\n", 0, 'L');
        $this->MultiCell(0, 6, "Domicile ou Siège Social : ..............................................................................\n", 0, 'L');
        $this->MultiCell(0, 6, "Registre de Commerce N° ..............................................................................\n", 0, 'L');
        $this->MultiCell(0, 6, "Cel.:.......................................Tél.: .......................................\n", 0, 'L');
        $this->MultiCell(0, 6, "Email :..............................................................................\n", 0, 'L');
        $this->MultiCell(0, 6, "Dénommé au cours du présent acte « LE PRENEUR ».\n", 0, 'L');
        $this->MultiCell(0, 6, "LESQUELS ont convenu et arrêté le contrat de bail qui suit :\n", 0, 'L');
        $this->MultiCell(0, 6, "BAIL\n", 0, 'C');
        $this->MultiCell(0, 6, "Le BAILLEUR donne en location à USAGE PROFESSIONNEL, BAIL régi par les articles 101 à 134 du Traité de l'OHADA, relatif au Droit Commercial Général pour la durée, sous les conditions et moyennant le prix ci-après indiqués au PRENEUR qui accepte, les biens et droits immobiliers dont la désignation suit \n", 0, 'L');
        $this->MultiCell(0, 6, "DÉSIGNATION\n", 0, 'C');
        $this->MultiCell(0, 6, "..........................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................\n", 0, 'L');
        $this->MultiCell(0, 6, "Le PRENEUR déclare connaître parfaitement le bien loué pour l'avoir vu et visité en vue du présent bail.\n\n", 0, 'L');
        $this->MultiCell(0, 6, "ÉTAT DES LIEUX\n", 0, 'C');
        $this->MultiCell(0, 6, "Le PRENEUR prendra les lieux loués dans l'état où ils se trouveront lors de l'entrée en jouissance et à l'expiration du bail, il veillera à la remise des lieux dans leur état primitif (agencement, enduit peinture intérieure, etc.) sauf si le BAILLEUR en a décidé autrement.\n", 0, 'L');

    }

    function page_2(){

        $this->SetFont('Arial', 'B', 11);
        $this->Cell(0, 10, 'TITRE I : CLAUSES ET CONDITIONS PARTICULIERES', 1, 0, 'C');
        $this->MultiCell(0, 6, "\n", 0, 'C');
        $this->SetFont('Arial', '', 10);
        $this->MultiCell(0, 6, "
ARTICLE 1-DURÉE DU BAIL. Le présent bail est consenti et accepté pour une durée de DEUX (2) années, qui commenceront à courir à compter du...........................................

ARTICLE 2-RENOUVELLEMENT DU BAIL. Le droit au renouvellement du bail est acquis au PRENEUR qui justifie avoir exploité, conformément aux stipulations du bail, l'activité prévue pendant une durée minimale de deux (2) ans.\n
Le PRENEUR qui a droit au renouvellement de son bail, doit en demander le renouvellement par acte d'huissier de justice ou par lettre contre décharge, au plus tard trois (3) mois avant l'expiration du bail Conformément à l'article 124 alinéa 3 du même texte, le BAILLEUR devra, au plus tard un (1) mois avant l'expiration du bail, faire connaître sa réponse à la demande de renouvellement. A défaut, il sera réputé avoir accepté le renouvellement du bail.\n
Aucune stipulation du contrat et autre ne peuvent faire échec au droit au renouvellement en vertu de l'article 123 alinéa 2 du traité OHADA relatif au Droit Commercial Général.

En cas de renouvellement exprès ou tacite, le bail est conclu pour une durée minimale de trois (3) ans en vertu de l'article 123 alinéa 3 du même texte.

ARTICLE 3 - INDEMNITÉ D'ÉVICTION. En vertu de l'article 126 dudit texte, le BAILLEUR peut s'opposer au droit au renouvellement du bail en réglant au PRENEUR une indemnité d'éviction.\n
A défaut d'accord sur le montant de cette indemnité, celle-ci est fixée par la juridiction compétente en tenant compte notamment du montant du chiffre d'affaires, des investissements réalisés par le PRENEUR, de la situation géographique du local et des frais de déménagement imposés par le défaut de renouvellement.

ARTICLE 4 - DISPENSE DU PAIEMENT DE L'INDEMNITÉ D'ÉVICTION. Le BAILLEUR peut s'opposer au droit au renouvellement du bail sans avoir à régler l'indemnité d'éviction, dans les cas suivants :
1°) s'il justifie d'un motif grave et légitime à l'encontre du PRENEUR sortant. Ce motif doit consister soit dans linexécution par le locataire d'une obligation substantielle du bail, soit encore dans la cessation de l'exploitation de l'activité.

Ce motif ne peut être invoqué que si les faits se sont poursuivis ou renouvelés plus de deux mois après une mise en demeure du BAILLEUR, par signification d'huissier de justice ou notification par tout moyen permettant d'établir la réception effective par le destinataire, d'avoir à les faire cesser.

2°) s'il envisage de démolir l'immeuble comprenant les lieux loués, et de le reconstruire. Le BAILLEUR doit dans ce cas justifier de la nature et de la description des travaux projetés. Le PRENEUR a le droit de rester dans les lieux jusqu'au commencement des travaux de démolition, et il bénéficie d'un droit de priorité pour se voir attribuer un nouveau bail dans l'immeuble reconstruit. Si les locaux reconstruits ont une destination differente de celle des locaux objet du bail, ou s'il n'est pas offert au PRENEUR un bail dans les nouveaux locaux, le BAILLEUR doit verser au PRENEUR l'indemnité d'éviction prévue à l'article 3 ci-dessus.

ARTICLE 5 - LOYER. Le présent bail est consenti et accepté moyennant un lover mensuel de (en lettres)....................................(en chiffres)..............................................................FRANCS CFA payable par mois et d'avance, au plus tard le 05 du mois en cours, en espèces ou par chèque.

ARTICLE 6-REVISION DU LOYER. Les parties conviennent que le loyer pourra être révisé tous les TROIS
(3) ans. À défaut d'accord entre les parties, le nouveau montant du loyer prendra en compte le taux de référence des loyers fixé annuellement par l'Etat de Côte d'Ivoire dont la décision tiendra compte des éléments suivants :

1. la situation des locaux;
2. leur superficie;
3.  l'état de vétusté;
4. le prix des loyers commerciaux couramment pratiqués dans le voisinage pour des locaux similaires.

ARTICLE 7 - DÉPÔT DE GARANTIE (ou CAUTION). A titre de provision et pour la garantie de l'exécution des clauses et conditions du présent contrat, le PRENEUR a versé entre les mains du BAILLEUR, la somme de (en lettres)....................................... (en chiffres) .........................................
FRANCS CFA représentant DEUX (2) mois de loyer en guise de dépôt
de garantie (ou caution).

Si le bail prenait fin, le dépôt de garantie (caution) serait restitué au PRENEUR après paiement de tous les loyers dus par lui et l'exécution de toutes les réparations lui incombant, ainsi que les résiliations des abonnements pour la fourniture de l'électricité et de l'eau faites sans laisser d'impayés.

À cet effet, le PRENEUR s'engage à remettre au BAILLEUR, les quitus CIE et SODECI desquels il ressort qu'il ne doit aucune somme à l'égard desdits établissements, faute de quoi, il autorise le BAILLEUR à payer pour son compte les sommes dues auxdits établissements par déduction sur le dépôt de garantie disponible.

ARTICLE 8 - DESTINATION DES LIEUX. Les lieux loués devront servir au PRENEUR à un usage professionnel pour exercer à titre principal, l'activité de .....................................................................................
et de toutes activités accessoires et annexes à l'activité principale à l'exclusion de tout autre, même temporairement.

En cas de changement de l'activité prévue au contrat, le PRENEUR doit obtenir l'accord préalable et écrit du BAILLEUR qui peut s'y opposer pour des motifs sérieux.

En particulier, il ne pourra affecter tout ou partie desdits locaux à l'usage d'habitation que ce soit pour lui-même ou pour tout autre personne, même par simple prêt, à titre temporaire.

Le PRENEUR fera son affaire personnelle de toutes les conséquences pouvant résulter de l'activité professionnelle exercée en ces lieux : obtention d'autorisations administratives, paiement des taxes et redevances, etc. II devra l'assurer en conformité rigoureuse avec les prescriptions légales et administratives pouvant s'y rapporter. II devra exécuter à ses frais tous travaux qui pourraient être demandés ou imposés par tel service ou administration concernée.

En ce qui concerne les travaux d'aménagement imposés par l'exercice de son activité, le PRENEUR en fera également son affaire personnelle mais ne pourra procéder à aucune démolition de murs, de sols ou de cloisons, ni aucune modification aux ouvertures existantes sans l'autorisation écrite du BAILLEUR.

Le BAILLEUR ne garantit aucune exclusivité ou non-concurrence sur d'autres locaux dépendant de l'immeuble dans lequel se trouvent les locaux, objets du présent bail.
        
        ", 0, 'J');
        
    }

    function page_3(){

        $this->SetFont('Arial', 'B', 11);
        $this->Cell(0, 10, 'TITRE II : CHARGES ET CONDITIONS GENERALES', 1, 0, 'C');
        $this->MultiCell(0, 6, "\n", 0, 'C');
        $this->SetFont('Arial', '', 10);

        $this->MultiCell(0, 6, "
        
TITRE II: CHARGES ET CONDITIONS GÉNÉRALES
Le présent bail est consenti et accepté sous les charges et conditions ordinaires et de droit que la
PRENEUR, S'oblige à exécuter et accomplir sous peine de tous dommages-intérêts et même de résiliation immédiate et de plein droit du présent bail si bon semble au BAILLEUR, savoir :

ARTICLE 9 - MOBILIER. Les lieux sont loués nus et le PRENEUR s'engage à garnir les lieux loués de meubles, marchandises et obiets mobiliers de valeur en quantité suffisante pour garantir le BAILLEUR du paiement des loyers et de l'exécution de toutes les conditions du bail.

ARTICLE 10 - CESSIONS DE BAIL OU SOUS-LOCATION. Toute cession ou sous-location du bail doit être constatée par acte notarié ou sous seing privé, et signifiée au BAILLEUR par acte extrajudiciaire ou tout autre moyen écrit contenant les mentions prévues à l'article 118 de l'Acte Uniforme portant sur le Droit Commercial Général.

À défaut de signification, dans les conditions ci-dessus, la cession ou la sous-location sera inopposable au BAILLEUR.

Le BAILLEUR dispose d'un délai d'un (1) mois à compter de cette signification, pour s'opposer, le cas échéant à celle-ci et saisir à bref délai la juridiction compétente, en justifiant les motifs sérieux et légitimes qui pourraient s'opposer à cette cession.

La violation par le PRENEUR des obligations du bail et notamment le non-paiement du loyer constitue un motif sérieux et légitime de s'opposer à la cession.

Pendant toute la durée de la procédure, le cédant demeure tenu aux obligations du bail.

En cas de sous-location préalablement autorisée, l'acte doit être porté à la connaissance du BAILLEUR par tout moyen écrit. À défaut, la sous-location lui est inopposable.

Lorsque le loyer de la sous-location totale ou partielle est supérieur au prix du bail principal, le BAILLEUR a la faculté d'exiger une augmentation correspondante du prix du bail principal.

ARTICLE 11 - ENTRETIEN RÉPARATIONS ET JOUISSANCE.

A. Droits et obligations du PRENEUR

Le PRENEUR entretiendra les lieux loués en bon état de réparation locative, en jouira en bon père de famille, suivant leur destination et ne pourra en aucun cas, rien faire ni laisser, qui puisse les détériorer.

Il supportera toutes réparations qui deviendraient nécessaires par la suite et toutes dégradations résultant de son fait, soit de celui de son personnel ou de ses visiteurs et clients dans les lieux loués. Le remplacement de ces installations sera à la charge exclusive du PRENEUR, même si leur remplacement était rendu nécessaire par suite d'usure, de vétusté majeure ou d'exigence administrative.

Il aura entièrement à sa charge, sans recours contre le BAILLEUR, l'entretien complet de la plomberie et de l'électricité apparents, des peintures, enduits et aménagements intérieurs.

La première vidange des fosses d'aisance est à la charge du BAILLEUR, et les suivantes à la charge du PRENEUR.
Les bris de glaces, et détérioration des fenêtres, à l'exception de ceux provoqués par les guerres civiles, les troubles à l'ordre public (émeutes, insurrections, mutineries, putschs) et les tremblements de terre, resteront à la charge du PRENEUR qui en supportera les conséquences

Le PRENEUR devra aviser le BAILLEUR, en temps utile, par lettre remise contre décharge ou par téléphone, des grosses réparations qu'il serait nécessaire d'effectuer dans les lieux loués.

Lorsque le BAILLEUR refuse d'assumer les grosses réparations qui lui incombent, le PRENEUR peut se faire autoriser par la juridiction compétente, statuant à bref délai, à les exécuter conformément aux règles de l'art, pour le compte du BAILLEUR. Dans ce cas, la juridiction compétente, statuant à bref délai, fixe le montant de ces réparations et les modalités de leur remboursement.

En mettant fin au bail, le PRENEUR, un (1) mois avant la fin de la location, devra faire établir contradictoirement avec le BAILLEUR, lui-même étant présent ou lui dûment appelé, un état des réparations lui incombant. À défaut d'exécution, le PRENEUR devra régler le montant desdites réparations, sans pouvoir élever la moindre objection.

B. Droits et obligations du BAILLEUR

Le BAILLEUR ne sera tenu d'exécuter, au cours du bail, que les grosses réparations qui pourraient devenir nécessaires et urgentes (toiture, gros œuvres, etc.) ; toutes autres réparations quelles qu'elles soient, restant à la charge du PRENEUR.

Outre les dommages résultant de vices de construction, le BAILLEUR ne sera en aucun cas responsable des dégâts ou accidents occasionnés par fuite d'eau ou de gaz et par l'humidité et généralement pour tous autres cas de force majeure ainsi que pour tout ce qui pourrait en être la conséquence directe ou indirecte.

Bien que les réparations intéressant la toiture soient à la charge du propriétaire, le PRENEUR devra aviser, en temps utile le BAILLEUR, par lettre recommandée, des réparations qu'il apparaît nécessaire d'y effectuer au cours du bail. En raison du caractère de cas fortuit et de cas de force majeure que revêtent en Côte d'Ivoire les tornades, le BAILLEUR ne pourra en aucune façon être tenu pour responsable des dégâts causés directement ou indirectement par la pluie, la rouille, la foudre ou le vent, aux meubles meublants, matériels et marchandises se trouvant dans les lieux loués, s'il n'a été mis en demeure depuis huit (8) jours au moins, par lettre recommandée d'avoir à effectuer les réparations devenues nécessaires.

Le PRENEUR souffrira les grosses réparations et toutes transformations nécessaires que le BAILLEUR serait tenu d'effectuer au cours du bail, quelles qu'en soient l'importance et la durée. Il devra laisser pénétrer les ouvriers dans les lieux loués pour travaux jugés utiles par le BAILLEUR.

Le BAILLEUR ne peut, de son seul gré, ni apporter des changements à l'état du bien donné à bail, ni en restreindre l'usage.

Le BAILLEUR est responsable envers le PRENEUR du trouble de jouissance survenu de son fait, ou du fait de ses ayants droit ou de ses préposés.

Si les réparations urgentes ou troubles quelconques sont de telle nature qu'elles rendent impossible la jouissance du bail, le PRENEUR pourra en demander la résiliation judiciaire ou sa suspension pendant la durée des travaux.

ARTICLE 12 - DEGRADATIONS ET VOLS. Le PRENEUR est responsable de toutes les dégradations ou vols quelconques qui pourraient être commis par lui, par son personnel ou par des tiers dans les locaux loués et il en supportera les conséquences.

ARTICLE 13-AMÉNAGEMENTS-TRANSFORMATIONS-CONSTRUCTIONS. Le PRENEUR ne pourra faire aucun aménagement, aucune modification ou transformation dans l'état où la disposition des locaux, sans l'autorisation préalable et écrite du BAILLEUR.

Tous aménagements, embellissements, améliorations ou constructions nouvelles, meubles fixés aux murs, sols ou plafonds, appartiendront de plein droit au BAILLEUR en fin de bail sans indemnité, à moins qu'il ne préfère la remise en état des lieux, aux frais du PRENEUR tels qu'ils se trouvaient au moment de l'entrée en jouissance.

ARTICLE 14 - TRANSMISSION DU BAIL ENTRE VIFS. Le bail ne prend pas fin par la cessation des droits du BAILLEUR sur les locaux donnés à bail. Dans ce cas, le nouveau BAILLEUR est substitué de plein droit dans les obligations de l'ancien BAILLEUR et doit poursuivre l'exécution du bail.

ARTICLE 15 - DÉCÈS DU PRENEUR. Le bail ne prend pas fin par le décès de l'une ou l'autre des parties.En cas de décès du PRENEUR, personne physique, le bail se poursuit avec les conjoint, ascendants ou descendants en ligne directe, qui en ont fait la demande au BAILLEUR par signification d'huissier de justice ou notification par tout moyen permettant d'établir la réception effective par le BAILLEUR, dans un délai de trois mois à compter du décès.

ARTICLE 16 - MISE EN LIQUIDATION DU PRENEUR. La dissolution du PRENEUR personne morale, n'entraîne pas, de plein droit, la résiliation du bail des immeubles affectés à l'activité du PRENEUR.Le liquidateur est tenu d'exécuter les obligations du PRENEUR, dans les conditions fixées par les parties.Le bail est résilié de plein droit après une mise en demeure adressée au liquidateur, restée plus de soixante (60) jours sans effet.

ARTICLE 17 - RÈGLEMENTS URBAINS. Le PRENEUR satisfera en lieu et place du BAILLEUR à toutes les prescriptions de police, de voirie et d'hygiène et à tous règlements administratifs, établis ou à établir, de manière que le BAILLEUR ne soit pas inquiété à cet égard.

ARTICLE 18 - IMPÔTS-PATENTES-TAXES LOCATIVES. Le PRENEUR s'acquittera, à partir du jour de l'entrée en jouissance, en sus du loyer ci-dessus fixé, de toutes contributions, taxes et autres, tous impôts afférents à son activité, y compris la patente, à l'exception des impôts fonciers qui resteront à la charge du BAILLEUR.

ARTICLE 19 - ASSURANCES. Le PRENEUR s'engage, dès la signature du présent bail, à assurer contre l'incendie, son mobilier, son matériel, ses marchandises ainsi que les risques locatifs, le bris de glaces et les recours des voisins et à maintenir cette assurance pendant le cours du présent bail, à en acquitter exactement les primes et cotisations annuelles et à justifier du tout à la première réquisition du BAILLEUR.

En outre, il s'engage à prévenir immédiatement le BAILLEUR de tout sinistre sous peine de tous dommages et intérêts pour indemniser le BAILLEUR du préjudice qui pourrait lui être causé par l'inobservation de cette clause.

ARTICLE 20 - ENSEIGNES ET ÉTALAGES. Les enseignes et plaques relatives à la profession, au commerce ou à l'activité du PRENEUR devront avoir des dimensions conformes à la réglementation et aux usages.

ARTICLE 21 - VISITE DES LIEUX. En cas de mise en vente du bien par le propriétaire, le PRENEUR devra laisser visiter le BAILLEUR, ou les acquéreurs éventuels des lieux loués, chaque fois que le BAILLEUR le jugera utile, à charge pour lui de prévenir le PRENEUR par lettre ou par téléphone au moins 24 heures à l'avanc
ARTICLE 22 - REMISE DES CLÉS. Si le bail venait à prendre fin, le PRENEUR devrait remettre au BAILLEUR les clés des locaux. Dans le cas où, par le fait du PRENEUR, le BAILLEUR n'aurait pu mettre en location ou laisser visiter les lieux ou encore faire la livraison à un nouveau locataire ou même en reprendre la libre disposition, à l'expiration de la location, il aurait droit à une indemnité égale à trois (3) mois de loyer, sans préjudice de tous dommages et intérêts.

ARTICLE 23 - COPROPRIÉTÉ OU RÉGIME ASSIMILÉ. Dans le cas où le bien loué se trouverait en copropriété ou dans un régime assimilé en raison de l'existence de parties communes ou de l'usage d'espaces, de services ou d'équipements communs, le BAILLEUR et le PRENEUR conviennent que les charges ou les cotisations afférentes à ces parties communes seront à la charge exclusive du :

PRENEUR (locataire) OUI.......................................

BAILLEUR (propriétaire) OUI.......................................

En vertu de l'article 403 de ladite loi, en son titre portant sur la copropriété, le BAILLEUR dont le bien est soumis au régime de la copropriété régi par les articles 379 à 407, autorise par le présent bail, le locataire à prélever sur le loyer, le montant des cotisations ou charges en vue de les payer directement au syndic contre reçu délivré au nom du BAILLEUR. En recevant le paiement du loyer, déduction faite du montant des cotisations ou charges justifié par la remise du reçu, le BAILLEUR s'oblige à délivrer au locataire, une quittance pour la totalité du loyer. Par ces paiements, les parties se dégagent réciproquement de toutes responsabilités l'une envers l'autre.

ARTICLE 24 - CLAUSE RESOLUTOIRE. A défaut de paiement d'un seul terme de loyer ou d'inexécution de l'une des clauses du présent bail, celui-ci sera résilié de plein droit, si bon semble au BAILLEUR, un (1) mois après un commandement de payer ou de remplir les conditions en souffrance, par acte d'huissier, et demeure sans effet.
Tous frais et honoraires engagés à cet effet seront supportés par le locataire qui s'y oblige.
        \n", 0, 'L');

        
    }

    function page_4(){

        $this->SetFont('Arial', 'B', 11);
        $this->Cell(0, 10, 'TITRE III : ENREGISTREMENT ET REGLEMENT DES LITIGES', 1,0, 'C');
        $this->MultiCell(0, 6, "\n", 0, 'C');
        $this->SetFont('Arial', '', 10);
        
$this->MultiCell(0, 6, "

ARTICLE 25 - ENREGISTREMENT. L'enregistrement du présent bail est requis pour deux (2) années aux frais du PRENEUR.

Le paiement des droits d'enregistrement des années successives demeure toujours à la charge du
PRENEUR et il s'opérera sur un formulaire portant renouvellement du bail fourni par le BAILLEUR.

ARTICLE 26 - ÉLECTION DE DOMICILE ET ATTRIBUTION DE JURIDICTION. Pour l'exécution des présentes et de leurs suites, les parties font élection de domicile en leur domicile ou siège social indiqué au début des présentes.

En outre, toutes les contestations qui pourraient s'élever pendant la durée du bail, pourront être soumises à l'arbitrage de tout organisme qualifié à cette fin et requis par les parties, à défaut le litige sera soumis à la juridiction compétente de la situation des lieux loués.

                                                                                                                                                                    DONT ACTE\n", 0, 'L');
$this->MultiCell(0, 6, "
Fait à ..............................................
En ..........................................  exemplaires originaux
Le ..............................................
\n", 0, 'C');
$this->MultiCell(0, 6, "

LE BAILLEUR                                                                                                                                     LE PRENEUR
        
        \n", 0, 'L');
        
    }
}


$pdf = new ContratBailProfessionel();
$pdf->AddPage();
$pdf->page_1();
$pdf->page_2();
$pdf->page_3();
$pdf->page_4();
$pdf->Output();
