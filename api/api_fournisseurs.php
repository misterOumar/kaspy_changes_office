<?php
// Afficher 
$Liste_Fournisseurs = null;

if (isset($_GET['page']) and !empty($_GET['page']) and $_GET['page'] === "api_fournisseurs") {
    include("models/Fournisseurs.php");
    $Liste_Fournisseurs = fournisseurs::getAll();
    echo json_encode($Liste_Fournisseurs);
}


// if ($_POST['page'] === "api_fournisseurs") {

    
//    echo json_encode(var_dump($_POST));
// }