<?php
session_start();

// Inclusion des fichiers principaux
include_once 'config/config.php';
include_once 'config/db.php';
include_once 'functions/functions.php';
include_once 'models/Users.php';

// DEFINITION DES VARIABLES DE SESSION

// Définition de la page courante
if (isset($_GET['page']) and !empty($_GET['page'])) {
    $page = trim(strtolower($_GET['page'])); // enlever les espaces et mettre en minuscule
} else {
    header('Location: index.php?page=login');
}

// Array contenant toutes les pages
$allPages = scandir('controllers/');


// Verification de l'existence de la page demandée
// Appels à l'API
if ((strpos($page, "api_") == 0)) {
    include_once 'api/' . $page . '.php';
}


//Connexion au logiciel
if (in_array($page . '_controller.php', $allPages)) {
    include_once 'controllers/droits_acces_controller.php';
    include_once 'controllers/' . $page . '_controller.php';
    include_once 'views/' . $page . '_view.php';
} else {

}