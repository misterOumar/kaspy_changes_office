<?php

// SUPPRESSION D'UNE TRANSACTION



if (isset($_GET['idSuppr'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/transaction_wu.php');

    $id = strSecur($_GET['idSuppr']);
    if (western_union::Supprimer($id)) {
        $message = "Transaction western union supprimé avec succès.";
        echo json_encode([
            'success' => 'true',
            'message' => $message
        ]);
    } else {
        $message = "Erreur impossible de supprimer cette transaction.";
        echo json_encode([
            'success' => 'false',
            'message' => $message
        ]);
    }
}