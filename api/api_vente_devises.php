<?php
// Afficher 

$vente_devises = null;

if (isset($_GET['page']) and !empty($_GET['page']) and $_GET['page'] === "api_vente_devises") {
    include("models/Vente_devise.php");
    $vente_devises = vente_devise::getAll();
    echo json_encode($vente_devises);
}

if ($_POST['page'] === "api_vente_devises") {
    echo json_encode(var_dump($_POST));
}
