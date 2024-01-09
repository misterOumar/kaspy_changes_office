<?php



// IMPORTATION DES DONNEES
if (isset($_POST['upload_western_file'])) {
    // inclusion des fichiers ressources
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Carte.php');
    include('../models/Western_union.php');

    // recuperrer les données postées
    $tableData = $_POST['data'];
    // recuperation des informations sur l'utilisateur
    $ip = getIp();
    $navigateur = getNavigateur();
    $us = $_SESSION["KaspyISS_user"]['users'];
    $pc = gethostbyaddr($_SERVER['REMOTE_ADDR']);
    $dt = date("Y-m-d H:i:s");

    foreach ($tableData as $rowData) {
        western_union::Ajouter(
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
            $rowData[21],
            $rowData[22],
            $rowData[23],
            $rowData[24],
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
