<?php
session_start();
if (isset($_GET['logout'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Users.php');

    $user = $_SESSION['KaspyISS_user'];
    $id = $user['id'];
    echo($id);
    Users::updateStatusFalse($id);

    //Fermer la session de l'utilisateur connecté sur l'ordinateur
    setcookie('KaspyISS_UserConnecte', '', time() - 3600, '/');
    session_destroy();
    header('Location: ../index.php?page=login');
}
