<?php



// IMPORTATION DES DONNEES
if (isset($_POST['upload_ria_file'])) {
    // inclusion des fichiers ressources
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php'); 
    include('../models/Ria.php');

    // recuperrer les données postées
    $tableData = $_POST['data'];

    $datesArray = [];

    // Parcourez chaque élément du tableau et récupérez la valeur de 'Dates'
    foreach ($tableData as $item) {
        $datesArray[] = $item[17];
    }
    

    // var_dump($datesArray);
    // Affichez les valeurs de 'Dates'
    // var_dump($datesArray[0]);
    // recuperation des informations sur l'utilisateur
   
    $transaction = ria::getByDates($datesArray[0]);
    //  var_dump($transaction);

    if ($transaction['date'] == $datesArray[0])
     {
        $message = "Ce fichier a été déjà importé";
        echo json_encode([
            'success' =>'existe',
            'message' => $message
        ]);
    }else{ 
    // recuperation des informations sur l'utilisateur
    $ip = getIp();
    $navigateur = getNavigateur();
    $us = $_SESSION["KaspyISS_user"]['users'];
    $magasin = $_SESSION["KaspyISS_bureau"];
    $pc = gethostbyaddr($_SERVER['REMOTE_ADDR']);
    $dt = date("Y-m-d H:i:s");

    foreach ($tableData as $rowData) {
        // var_dump($rowData);
        ria::Ajouter(
            $rowData[1],
            $rowData[2],
            $rowData[3],
            $rowData[4],
            $rowData[5],
            $rowData[6],
            $rowData[7],
            $rowData[8],
            $rowData[9],
            $rowData[10],
            $rowData[11],
            $rowData[12],
            $rowData[13],
            $rowData[14],
            $rowData[15],
            $rowData[16],
            $rowData[17],
            $rowData[18],
            $rowData[19],
            $rowData[20],
            $rowData[21],
            $rowData[22],
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
