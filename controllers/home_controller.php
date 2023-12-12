<?php

if (isset($_GET['page']) and !empty($_GET['page']) and $_GET['page'] === 'home') {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('models/Locataires.php');
    include('models/Batiments.php');
    include('models/Appartements.php');
    include('models/Proprietaires.php');
    include('models/Recouvrement.php');

    //RECUPERATION DES INFOS POUR LE DASHBOARD
    // $nbre_locataire = locataires::getCount(); //NOMBRE DE LOCATAIRE
    // $nbre_batiment = batiments::getCount(); //NOMBRE DE BAIMENT
    // $nbre_appartement = appartements::getCount(); //NOMBRE DE APPARTEMENT
    // $nbre_proprietaire = proprietaires::getCount(); //NOMBRE DE PROPRIETAIRE
    // $montant_total_payer_mois_en_cours = recouvrements::getMontantTotalPayerByCurrentMonth(); //MONTANT DU LOYER PAYES
    // $montant_total_reste_mois_en_cours = recouvrements::getMontantResteTotalPayerByCurrentMonth(); //MONTANT DU LOYER IMPAYES

    //RECUPERATION DU MOIS EN COURS
    $dateCourante = date("Y-m-d H:i:s");
    $mois = date("m", strtotime($dateCourante));
    $annee = date("Y", strtotime($dateCourante));

    $moisEnFrancais = [
        1 => 'Janvier',
        2 => 'Février',
        3 => 'Mars',
        4 => 'Avril',
        5 => 'Mai',
        6 => 'Juin',
        7 => 'Juillet',
        8 => 'Août',
        9 => 'Septembre',
        10 => 'Octobre',
        11 => 'Novembre',
        12 => 'Décembre'
    ];
    
    $moisActuel = $moisEnFrancais[$mois];
    
}


if (isset($_GET['Donnees'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Recouvrement.php');
    //RECUPERATION DES DONNEES POUR LES GRAPHIQUES DU DASHBOARD

    // $donnees_montant_payer = recouvrements::getMontantPayerByMonthAndYear();
    // $donnees_reste_a_payer = recouvrements::getResteAPayerByMonthAndYear();
    // $montant_total_payer_mois_en_cours = recouvrements::getMontantTotalPayerByCurrentMonth(); //MONTANT DU LOYER
    // $montant_total_reste_mois_en_cours = recouvrements::getMontantResteTotalPayerByCurrentMonth(); //MONTANT DU LOYER

    if ($donnees_montant_payer) {
        // header('Content-Type: application/json');
        echo json_encode([
            'montant_payer' => $donnees_montant_payer,
            'reste_a_payer' => $donnees_reste_a_payer,
            'montant_total_payer_mois_en_cours'=>$montant_total_payer_mois_en_cours,
            'montant_total_reste_mois_en_cours'=>$montant_total_reste_mois_en_cours,
        ]);
    }
}


// RECUPERATION STATUTS DE CONTRAT
if (isset($_GET['MoisGraph'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Recouvrement.php');

    $MoisGraph = $_GET['MoisGraph'];

    // $montant_total_payer_mois_choisi = recouvrements::getMontantTotalPayerByChooseMonth($MoisGraph); //MONTANT DU LOYER
    // $montant_total_reste_mois_choisi = recouvrements::getMontantResteTotalPayerByChooseMonth($MoisGraph); //MONTANT DU LOYER



    if ($montant_total_payer_mois_choisi) {
        echo json_encode([
            'success' => 'true',
            'montant_total_payer_mois_choisi'=>$montant_total_payer_mois_choisi,
            'montant_total_reste_mois_choisi'=>$montant_total_reste_mois_choisi,
        ]);
    } else {
        echo json_encode([
            'success' => 'false',
        ]);
    }
}