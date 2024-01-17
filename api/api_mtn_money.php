<?php
// Afficher 
$mtn = null;
$magasin = $_SESSION["KaspyISS_bureau"];

if (isset($_GET['page']) and !empty($_GET['page']) and $_GET['page'] === "api_mtn_money") {


    include("models/Mtn.php");
    $mtn = mtn::getAll($magasin);
    echo json_encode($mtn);
}

if ($_POST['page'] === "api_mtn_money") {
    echo json_encode(var_dump($_POST));
}
