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
    

    //  var_dump($datesArray);
    // Affichez les valeurs de 'Dates'
    // var_dump($datesArray[0]);
    // recuperation des informations sur l'utilisateur
   
    $transaction = upload_mtn::getByDates($datesArray[0]);
    //  var_dump($transaction);

    if ($transaction['dates'] == $datesArray[0])
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
        upload_mtn::Ajouter(
            $rowData[1],        
            $rowData[9],
            $rowData[11],    
            $rowData[12],
            $rowData[13],
            $rowData[17],  
            $rowData[23],       
            $rowData[31],
            $rowData[32],
            $rowData[3],
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
    // Réponse JSON
    $message = "Enregistrement réussi avec succès.";
    echo json_encode([
        'success' => 'true',
        'message' => $message
    ]);
}
}
