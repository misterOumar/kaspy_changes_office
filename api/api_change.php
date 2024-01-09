<?php
// Afficher 

$changes = null;

if (isset($_GET['page']) and !empty($_GET['page']) and $_GET['page'] === "api_change") {
    include("models/Change.php");
    $changes = changes::getAll();
    echo json_encode($changes);
}
if ($_POST['page'] === "api_change") {
    echo json_encode(var_dump($_POST));
}
