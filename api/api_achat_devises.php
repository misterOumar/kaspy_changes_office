<?php
// Afficher 

$achat_devises = null;

if (isset($_GET['page']) and !empty($_GET['page']) and $_GET['page'] === "api_achat_devises") {
    include("models/Achat_devise.php");
    $achat_devises = achat_devise::getAll();
    echo json_encode($achat_devises);
}

if ($_POST['page'] === "api_achat_devises") {
    echo json_encode(var_dump($_POST));
}
