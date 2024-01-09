<?php
// Afficher 
$Liste_Nature_depenses = null;

if (isset($_GET['page']) and !empty($_GET['page']) and $_GET['page'] === "api_nature_depenses") {
    include("models/Nature_depenses.php");
    $Liste_Nature_depenses = nature_depenses::getAll();
    echo json_encode($Liste_Nature_depenses);
}


if ($_POST['page'] === "api_nature_depenses") {


    echo json_encode(var_dump($_POST));
}
