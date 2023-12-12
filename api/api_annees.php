<?php
// Afficher 
$Liste_Annees = null;

if (isset($_GET['page']) and !empty($_GET['page']) and $_GET['page'] === "api_annees") {
    include("models/Annees.php");
    $Liste_Annees = annees::getAll();
    echo json_encode($Liste_Annees);
}


if ($_POST['page'] === "api_annees") { 
   echo json_encode(var_dump($_POST));
}