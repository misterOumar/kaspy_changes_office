<?php



// IMPORTATION DES DONNEES
if (isset($_POST['upload_moneygram_file'])) {
    // inclusion des fichiers ressources
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
     include('../models/Money_gram.php');

    // recuperrer les données postées
    $tableData = $_POST['data'];
    $datesArray = [];

    // Parcourez chaque élément du tableau et récupérez la valeur de 'Dates'
    foreach ($tableData as $item) {
        $datesArray[] = $item['Dates'];
    }
    
    // Affichez les valeurs de 'Dates'
    // var_dump($datesArray[0]);
    // recuperation des informations sur l'utilisateur
   
    $transaction = moneygram::getByDates($datesArray[0]);
    //  var_dump($transaction);

    if ($transaction['dates'] === $datesArray[1]) {
        $message = "Ce fichier a été déjà importé";
        echo json_encode([
            'success' => 'existe',
            'message' => $message
        ]);
    } else
    {  
       
    // recuperation des informations sur l'utilisateur
    $ip = getIp();
    $navigateur = getNavigateur();
    $us = $_SESSION["KaspyISS_user"]['users'];
    $pc = gethostbyaddr($_SERVER['REMOTE_ADDR']);
    $dt = date("Y-m-d H:i:s");
   
    foreach ($tableData as $rowData) {
        moneygram::Ajouter(
            $rowData["Heure et date (locales)"],
            $rowData["Num Réf"],
            $rowData["code d'autorisation"],
            $rowData["Identifiant d'utilisateur"],
            $rowData["ID de point de vente"],
            $rowData["Montant"],
            $rowData["Frais"],
            $rowData["Total"], 
            $rowData["Taxe"],
             $rowData["Type"],       
            $rowData["Dates"],   
                                
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
