<?php
// Afficher 
$mtn = null;

if (isset($_GET['page']) and !empty($_GET['page']) and $_GET['page'] === "api_mtn_money") {


    include("models/Mtn.php");
    $mtn = mtn::getAll();
    echo json_encode($mtn);
}

if ($_POST['page'] === "api_mtn_money") {
    echo json_encode(var_dump($_POST));
}
