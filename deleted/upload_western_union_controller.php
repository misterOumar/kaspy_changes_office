<?php



// IMPORTATION DES DONNEES
if (isset($_POST['upload_western_file'])) {
    // inclusion des fichiers ressources
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/carte.php');
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




    // if (western_union::Ajouter(
    //     $code_pays_origine,
    //     $code_devise_pays_origine,
    //     $identifiant_terminal,
    //     $identité_opérateur,
    //     $super_op_identifiant,
    //     $nom_utilisateur,
    //     $mtncn,
    //     $receveur,
    //     $expediteur,
    //     $code_pays_destination,
    //     $code_devise_pays_destination,
    //     $type_de_transaction,
    //     $date,
    //     $heure,
    //     $montant_envoye,
    //     $frais_de_transfert,
    //     $montant_total_recueilli,
    //     $taux_de_change,
    //     $montant_paye_attendu,
    //     $destinataire,
    //     $total_frais,
    //     $total_taxes,
    //     $type_paiement,
    //     $dt,
    //     $us,
    //     $navigateur,
    //     $pc,
    //     $ip,
    //     $dt,
    //     $us,
    //     $navigateur,
    //     $pc,
    //     $ip
    // )) {
    //     $message = "Enregsitrement  éffectué avec succès.";
    //     echo json_encode([
    //         'success' => 'true',
    //         'message' => $message
    //     ]);
    // } else {
    //     $message = "Erreur lors de la de l'enregistrement";
    //     echo json_encode([
    //         'success' => 'false',
    //         'message' => $message
    //     ]);
    // }
}
