<?php
// Afficher 

$liste_ria = null;

if (isset($_GET['page']) and !empty($_GET['page']) and $_GET['page'] === "api_ria") {
    include("models/Ria.php");
    $liste_ria = ria::getAll();
    echo json_encode($liste_ria);
}

if ($_POST['page'] === "api_ria") {
    echo json_encode(var_dump($_POST));
}
