<?php
// Afficher 
$Liste_transaction_wester_union = null;

if (isset($_GET['page']) and !empty($_GET['page']) and $_GET['page'] === "api_western_union") {
    include("models/Western_union.php");
    $Liste_transaction_wester_union = western_union::getAll();
    echo json_encode($Liste_transaction_wester_union);
}


if ($_POST['page'] === "api_western_union") {
    echo json_encode(var_dump($_POST));
}
