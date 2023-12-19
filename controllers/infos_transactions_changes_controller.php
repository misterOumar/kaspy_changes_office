<?php

// RECUPERATION DES INFO POUR UNE TRANSACTIONS DONNEES
if (isset($_GET['idInfonsTrans'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include("../models/Changes.php");

    $id = $_GET['idInfonsTrans'];
    $infos_trans = changes::getByID($id);

    if ($infos_trans) {
        echo json_encode([
            'infos_trans' => $infos_trans,
            'success' => true,
        ]);
    } else {
        echo json_encode([
            'infos_trans' => 'null'
        ]);
    }
}