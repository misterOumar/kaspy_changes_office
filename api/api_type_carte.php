<?php
// Afficher 
$Liste_type_cartes = null;

if (isset($_GET['page']) and !empty($_GET['page']) and $_GET['page'] === "api_type_carte") {
    include("models/Type_carte.php");
    $Liste_type_cartes = type_carte::getAll();
    echo json_encode($Liste_type_cartes);
}


if ($_POST['page'] === "api_type_carte") {
    echo json_encode(var_dump($_POST));
}
