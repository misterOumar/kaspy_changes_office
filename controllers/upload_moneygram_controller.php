<?php

// IMPORTATION DES DONNEES
if (isset($_POST['upload_moneygram_file'])) {
    // inclusion des fichiers ressources
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
     include('../models/Money_gram.php');

    // recuperrer les données postées
    $transactions = $_POST['data'];
    // recuperation des informations sur l'utilisateur

  

    $datesArray = [];
    // Parcourez chaque élément du tableau et récupérez la valeur de 'Dates'
    foreach ($transactions as $item) {
        $datesArray[] = $item[0];
    }

    

   
    $transaction = moneygram::getByDates($datesArray[0]);

    // TODO: Vérifier la date colunn date-heure
    if ($transaction['date_heure'] === $datesArray[0]) {
        $message = "Ce fichier a été déjà importé";
        echo json_encode([
            'success' => 'existe',
            'message' => $message
        ]);
    } else{  
    $ip = getIp();
    $navigateur = getNavigateur();
    $magasin = $_SESSION["KaspyISS_bureau"];
    $us = $_SESSION["KaspyISS_user"]['users'];
    $pc = gethostbyaddr($_SERVER['REMOTE_ADDR']);
    $dt = date("Y-m-d H:i:s");

    foreach ($transactions as $transaction) {
        moneygram::Ajouter(
            $transaction[0],
            $transaction[1],
            $transaction[3],
            $transaction[3],
            $transaction[4],
            $transaction[5],
            $transaction[6],
            $transaction[7],
            $transaction[10],
            $transaction[9], 
            $dt, 
            $magasin,              
            $dt,
            $us,
            $navigateur,
            $pc,
            $ip,
            $dt,
            $us,
            $navigateur,
            $pc,
            $ip
        );

    }    
    // Réponse JSON
    $message = "Enregistrement réussi avec succès.";
    echo json_encode([
        'success' => 'true',
        'message' => $message
    ]);
}
}
