<?php
// Afficher 
$Listes_changes = null;

if (isset($_GET['page']) and !empty($_GET['page']) and $_GET['page'] === "api_changes") {
    include("models/Changes.php");
    $Listes_changes = changes::getAll();
    echo json_encode($Listes_changes);
}


if ($_POST['page'] === "api_changes") { 
   echo json_encode(var_dump($_POST));
}