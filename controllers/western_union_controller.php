<?php

// RECUPERATION DES INFO POUR PROPRIETE D'UN ELEMENT 
if (isset($_GET['idProprietes'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Western_union.php');

    $id = $_GET['idProprietes'];
    $proprietes = western_union::getByID($id);

    if ($proprietes) {
        echo json_encode([
            'proprietes_western_union' => $proprietes,
        ]);
    } else {
        echo json_encode([
            'proprietes_western_union' => 'null'
        ]);
    }
}