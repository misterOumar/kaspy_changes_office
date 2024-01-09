<?php
// Afficher 
$Liste_Depenses = null;

if (isset($_GET['page']) and !empty($_GET['page']) and $_GET['page'] === "api_depenses") {
    include("models/Depenses.php");
    $Liste_Depenses = depenses::getAll();
    echo json_encode($Liste_Depenses);
}


if ($_POST['page'] === "api_depenses") {


    echo json_encode(var_dump($_POST));
}
