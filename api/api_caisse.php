<?php
// Afficher 
$caisse = null;
$magasin = $_SESSION["KaspyISS_bureau"];
if (isset($_GET['page']) and !empty($_GET['page']) and $_GET['page'] === "api_caisse") {
    include("models/Caisse.php");
    $caisse = caisse::getAll($magasin);
    echo json_encode($caisse);
}

if ($_POST['page'] === "api_caisse") {
    echo json_encode(var_dump($_POST));
}
