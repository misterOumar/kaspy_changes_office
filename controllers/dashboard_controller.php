<?php

if (isset($_GET['page']) and !empty($_GET['page']) and $_GET['page'] === "dashboard") {
    include("models/Achat_devise.php");
    include("models/Vente_devise.php");
    include("models/Carte.php");
    include("models/Orange.php");
    include("models/Moov.php");
    include("models/Mtn.php");
    include("models/Western_union.php");
    include("models/Ria.php");
    include("models/Money_gram.php");
    include("models/Depenses.php");
    
    // STATISTIQUES

    //operations de changes
    $nbre_achat_devise = achat_devise::getCount();
    $nbre_vente_devise = vente_devise::getCount();
    $nbre_changes = $nbre_achat_devise + $nbre_vente_devise;

    // cartes
    $nbre_cartes = cartes::getCount();
    $nbre_cartes_vendu = cartes::getCountVendu();

    // mobiles money
    $nbre_transaction_orange = orange::getCount();
    $nbre_transaction_moov = moov::getCount();
    $nbre_transaction_mtn = mtn::getCount();
    $nbre_transaction_mobile_money = $nbre_transaction_orange + $nbre_transaction_moov + $nbre_transaction_mtn;

    // opérations wu, ria, mg
    $nbre_operation_wu = western_union::getCount();
    $nbre_operation_ria = ria::getCount();
    $nbre_operation_mg = moneygram::getCount();
    $nbre_operation = $nbre_operation_wu + $nbre_operation_ria + $nbre_operation_mg;

    // dépenses
    $nbre_depense = depenses::getCount();
}


if (isset($_GET['stat_envois_mm'])) {
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Orange.php');

    $envois_mobile_money = orange::getAllDepotMobileMoney();

    if ($envois_mobile_money) {
        echo json_encode([
            'envois_mobile_money' => $envois_mobile_money
        ]);
    }else{
        echo json_encode([
            'envois_mobile_money' => 'null'
        ]);

    }
}


if (isset($_GET['stat_retraits_mobile_money'])) {
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Orange.php');

    $retraits_mobile_money = orange::getAllRetraitMobileMoney();

    if ($retraits_mobile_money) {
        echo json_encode([
            'retraits_mobile_money' => $retraits_mobile_money
        ]);
    }else{
        echo json_encode([
            'retraits_mobile_money' => 'null'
        ]);

    }
}

// ACHAT DE DEVISES
if (isset($_GET['stat_achat_devises'])) {
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Dashboard.php');

    $achat_devises = dashboard::getAllAchatDeviseMontant();

    if ($achat_devises) {
        echo json_encode([
            'achat_devises' => $achat_devises
        ]);
    }else{
        echo json_encode([
            'achat_devises' => 'null'
        ]);

    }
}

// VENTE DE DEVISES
if (isset($_GET['stat_vente_devises'])) {
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Dashboard.php');

    $vente_devises = dashboard::getAllVenteDeviseMontant();

    if ($vente_devises) {
        echo json_encode([
            'vente_devises' => $vente_devises
        ]);
    }else{
        echo json_encode([
            'vente_devises' => 'null'
        ]);

    }
}