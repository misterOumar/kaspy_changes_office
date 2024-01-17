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

    $magasin = $_SESSION["KaspyISS_bureau"];
    
    $pc = gethostbyaddr($_SERVER['REMOTE_ADDR']);
    $dt = date("Y-m-d H:i:s");

    foreach ($tableData as $rowData) {
        western_union::Ajouter(
            $rowData["Code du Pays d'Origine"],
            $rowData["Code de la Devise d'Origine"],
            $rowData["Identifiant du terminal"],
            $rowData["Identité de l'opérateur"],
            0,
            $rowData["Nom d'utilisateur"],
            $rowData["MTCN"],
            $rowData["Receveur"],
            $rowData["Expéditeur"],
            $rowData["Code du Pays de Destination"],
            $rowData["Code de la Devise de Destination"],
            $rowData["Type de Transaction"],
            $rowData["Date"],
            $rowData["Heure"],
            $rowData["Montant envoyé"],
            $rowData["Frais de Transfert"],
            $rowData["Montant total recueilli"],
            $rowData["Taux de change"],
            $rowData["Montant payé attendu"],
            $rowData["Total des frais"],
            $rowData["Total des taxes"],
            $rowData["Type de paiement"],
            $rowData["Type de transaction"],
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
