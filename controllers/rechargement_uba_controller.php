<?php



// IMPORTATION DES DONNEES
if (isset($_POST['uba_file'])) {
    // inclusion des fichiers ressources
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
     include('../models/Uba.php');

    // recuperrer les données postées
    $tableData = $_POST['data'];
    // recuperation des informations sur l'utilisateur
    $ip = getIp();
    $navigateur = getNavigateur();
    $us = $_SESSION["KaspyISS_user"]['users'];
    $pc = gethostbyaddr($_SERVER['REMOTE_ADDR']);
    $dt = date("Y-m-d H:i:s");
    foreach ($tableData as $rowData) {
    uba::Ajouter(
            $rowData["Trans ID"],
            $rowData["Date"],
            $rowData["Amount"],
            $rowData["Fees"],
            $rowData["Running Bal"],
            $rowData["Description"],
            $rowData["Reference"],
            $rowData["Account Id"],    
            $rowData["Last Name"],  
            $us,                 
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
