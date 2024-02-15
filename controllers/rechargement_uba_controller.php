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
    $datesArray = [];

    // Parcourez chaque élément du tableau et récupérez la valeur de 'Dates'
    foreach ($tableData as $item) {
        $datesArray[] = $item['Date'];
    }
    $dateObj = DateTime::createFromFormat('d-m-y H:i:s', $datesArray[0]);
    // Formater la date dans le nouveau format
    $date_fichier = $dateObj->format('Y-m-d H:i:s');

    $transaction = uba::getByDates($date_fichier);

    if ($transaction['Dates'] === $date_fichier) {
        $message = "Ce fichier a été déjà importé";
        echo json_encode([
            'success' => 'existe',
            'message' => $message
        ]);
    } else {
        $ip = getIp();
        $navigateur = getNavigateur();
        $us = $_SESSION["KaspyISS_user"]['users'];
        $pc = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $magasin = $_SESSION["KaspyISS_bureau"];
        $dt = date("Y-m-d H:i:s");
        foreach ($tableData as $rowData) {
            //Formatter la date
            // Convertir la chaîne de date en objet DateTime
            $dateObj = DateTime::createFromFormat('d-m-y H:i:s', $rowData["Date"]);
            // Formater la date dans le nouveau format
            $dateFormatted = $dateObj->format('Y-m-d H:i:s');
            uba::Ajouter(
                $rowData["Trans ID"],
                $dateFormatted,
                $rowData["Amount"],
                $rowData["Fees"],
                $rowData["Running Bal"],
                $rowData["Description"],
                $rowData["Reference"],
                $rowData["Account Id"],
                $rowData["Last Name"],
                $us,
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
