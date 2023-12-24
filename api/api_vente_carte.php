<?php
// Afficher 

$vente_carte = null;

if (isset($_GET['page']) and !empty($_GET['page']) and $_GET['page'] === "api_vente_carte") {
    include("models/Vente_carte.php");
    $vente_carte = vente_carte::getAll();
    echo json_encode($vente_carte);
}

if ($_POST['page'] === "api_vente_carte") {
    echo json_encode(var_dump($_POST));
}
