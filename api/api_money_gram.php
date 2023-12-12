<?php
// Afficher 
$Liste_Money_gram = null;

if (isset($_GET['page']) and !empty($_GET['page']) and $_GET['page'] === "api_money_gram") {
    include("models/Money_gram.php");
    $Liste_Money_gram = money_gram::getAll();
    echo json_encode($Liste_Money_gram);
}


if ($_POST['page'] === "api_money_gram") { 
   echo json_encode(var_dump($_POST));
}