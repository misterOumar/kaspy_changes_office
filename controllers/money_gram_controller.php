<?php

// RECUPERATION DES INFO POUR PROPRIETE D'UN ELEMENT 
if (isset($_GET['idProprietes'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Money_gram.php');

    $id = $_GET['idProprietes'];
    $proprietes = moneygram::getByID($id);

    if ($proprietes) {
        echo json_encode([
            'proprietes_moneygram' => $proprietes,
        ]);
    } else {
        echo json_encode([
            'proprietes_moneygram' => 'null'
        ]);
    }
}
