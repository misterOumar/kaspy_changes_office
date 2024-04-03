<?php

if (isset($_GET['page']) and !empty($_GET['page']) and $_GET['page'] === "dashboard") {
    include("models/Carte.php");
    include("models/Orange.php");
    include("models/Moov.php");
    include("models/Mtn.php");
    include("models/Western_union.php");
    include("models/Ria.php");
    include("models/Money_gram.php");
    include("models/Depenses.php");
 
    // STATISTIQUES

    // cartes
    $nbre_cartes = cartes::getCount();
    $nbre_cartes_vendu = cartes::getCountVendu();

    // mobiles money
    $nbre_transaction_orange = orange::getCount();
    $nbre_transaction_moov = moov::getCount();
    $nbre_transaction_mtn = mtn::getCount();
    $nbre_transaction_mobile_money = $nbre_transaction_orange + $nbre_transaction_moov + $nbre_transaction_mtn;

    // opérations
    $nbre_operation_wu = western_union::getCount();
    $nbre_operation_ria = ria::getCount();
    $nbre_operation_mg = moneygram::getCount();
    $nbre_operation = $nbre_operation_wu + $nbre_operation_ria + $nbre_operation_mg;

    // dépenses
    $nbre_depense = depenses::getCount();
}