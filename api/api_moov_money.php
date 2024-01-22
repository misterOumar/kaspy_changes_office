<?php
// Afficher 
$moov = null;
$magasin = $_SESSION["KaspyISS_bureau"];
if (isset($_GET['page']) and !empty($_GET['page']) and $_GET['page'] === "api_moov_money") {
    include("models/Moov.php");
    $moov = moov::getAll($magasin);
    echo json_encode($moov);
}

if ($_POST['page'] === "api_moov_money") {
    echo json_encode(var_dump($_POST));
}
