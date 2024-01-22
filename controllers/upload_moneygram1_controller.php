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
