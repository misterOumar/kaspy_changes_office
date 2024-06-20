<?php
// Afficher 
$Liste_types_pieces = null;

if (isset($_GET['page']) and !empty($_GET['page']) and $_GET['page'] === "api_types_piece") {
    include("models/Types_piece.php");
    $Liste_types_pieces = types_piece::getAll();
    echo json_encode($Liste_types_pieces);
 
}


if ($_POST['page'] === "api_types_piece") {


    echo json_encode(var_dump($_POST));
}
