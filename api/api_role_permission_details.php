<?php
// Afficher 
$Liste_Role_permission_details = null;

if (isset($_GET['page']) and !empty($_GET['page']) and $_GET['page'] === "api_role_permission_details") {
    include("models/Role_permission_details.php");
    $Liste_Role_permission_details = role_permission_details::getAll();
    echo json_encode($Liste_Role_permission_details);
}


if ($_POST['page'] === "api_role_permission_details") {
    echo json_encode(var_dump($_POST));
}
