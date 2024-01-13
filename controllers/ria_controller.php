<?php

// RECUPERATION DES INFO POUR PROPRIETE D'UN ELEMENT 
if (isset($_GET['idProprietes'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Ria.php');

    $id = $_GET['idProprietes'];
    $proprietes = ria::getByID($id);

    if ($proprietes) {
        echo json_encode([
            'proprietes_ria' => $proprietes,
        ]);
    } else {
        echo json_encode([
            'proprietes_ria' => 'null'
        ]);
    }
}