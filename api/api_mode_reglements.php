<?php
// Afficher 
$Liste_Mode_reglements = null;

if (isset($_GET['page']) and !empty($_GET['page']) and $_GET['page'] === "api_mode_reglements") {
    include("models/Mode_reglements.php");
    $Liste_Mode_reglements = mode_reglements::getAll();
    echo json_encode($Liste_Mode_reglements);
 
}


if ($_POST['page'] === "api_mode_reglements") {


    echo json_encode(var_dump($_POST));
}
