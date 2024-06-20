<?php
// Afficher 
$Liste_devises = null;

if (isset($_GET['page']) and !empty($_GET['page']) and $_GET['page'] === "api_devises") {
    include("models/Devise.php");
    $Liste_devises = devise::getAll();
    echo json_encode($Liste_devises);
}


if ($_POST['page'] === "api_devises") {
    echo json_encode(var_dump($_POST));
}
