<?php
// Afficher 
$Listes_uba = null;

if (isset($_GET['page']) and !empty($_GET['page']) and $_GET['page'] === "api_uba") {
    include("models/uba.php");
    $Listes_uba = uba::getAll();
    echo json_encode($Listes_uba);
}


if ($_POST['page'] === "api_uba") { 
   echo json_encode(var_dump($_POST));
}