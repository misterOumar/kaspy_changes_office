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
        $datesArray[] = $item['Date'];
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
            $rowData["Numero de transfert"],
            $rowData["PIN"],
            $rowData["Mode de livraison"],
            $rowData["Caissie"],
            $rowData["Agence"],
            $rowData["Code Agence"],
            $rowData["Agence Réconciliation"],
            $rowData["Code A. réconciliation"],
            $rowData["Montant Envoye"],
            $rowData["Devise d'Envoi"],
            $rowData["ays d'Envoi"],
            $rowData["Pays de destination"],
            $rowData["Montant à Payer"],
            $rowData["Devise de paiement"],
            $rowData["Montant de la commission SA"],
            $rowData["Devise de la commission SA"],
            $rowData["Date"],
            $rowData["Taux"],
            $rowData["TOB"],
            $rowData["TTHU"],
            $rowData["Frais"],
            $rowData["Action"],
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
