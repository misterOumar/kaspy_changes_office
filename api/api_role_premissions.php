<?php
// Afficher 
$Liste_Role_permission = null;

if (isset($_GET['page']) and !empty($_GET['page']) and $_GET['page'] === "api_role_permission") {
    include("models/Role_permission.php");
    $Liste_Role_permission = role_permission::getAll();
    echo json_encode($Liste_Role_permission);
}


if ($_POST['page'] === "api_role_permission") {
    echo json_encode(var_dump($_POST));
}
