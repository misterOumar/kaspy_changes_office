<?php
// Afficher 
$orange = null;

$magasin = $_SESSION["KaspyISS_bureau"];


if (isset($_GET['page']) and !empty($_GET['page']) and $_GET['page'] === "api_orange_money") {


    include("models/Orange.php");
    $orange = orange::getAll($magasin);
    echo json_encode($orange);
}

if ($_POST['page'] === "api_orange_money") {
    echo json_encode(var_dump($_POST));
}
