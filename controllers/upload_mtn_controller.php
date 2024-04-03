<?php



// IMPORTATION DES DONNEES
if (isset($_POST['upload_mtn'])) {
    // inclusion des fichiers ressources
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Upload_mtn.php');
    include('../models/Mtn.php');

    // recuperrer les données postées
    $tableData = $_POST['data'];

    $datesArray = [];

    // Parcourez chaque élément du tableau et récupérez la valeur de 'Dates'
    foreach ($tableData as $item) {
        $datesArray[] = $item[3];
    }



    $transaction = mtn::getByDates($datesArray[0]);
    //  var_dump($transaction);

    if ($transaction['dates'] == $datesArray[0]) {
        $message = "Ce fichier a été déjà importé";
        echo json_encode([
            'success' => 'existe',
            'message' => $message
        ]);
    } else {
        // recuperation des informations sur l'utilisateur
        $ip = getIp();
        $navigateur = getNavigateur();
        $us = $_SESSION["KaspyISS_user"]['users'];
        $magasin = $_SESSION["KaspyISS_bureau"];
        $pc = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $dt = date("Y-m-d H:i:s");

        foreach ($tableData as $rowData) {
            $transaction_mtn = mtn::getByIdTransaction($rowData[1]);
            if ($transaction_mtn['id_transaction'] != $rowData[1]) {
                mtn::Ajouter(
                    $rowData[3],
                    $rowData[5],
                    $rowData[12],
                    $rowData[17],
                    $rowData[31],
                    $rowData[1],
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
                    $ip,

                );
            }
        }
        // Réponse JSON
        $message = "Enregistrement réussi avec succès.";
        echo json_encode([
            'success' => 'true',
            'message' => $message
        ]);
    }
}
