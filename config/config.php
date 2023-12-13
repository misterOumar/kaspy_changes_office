<?php

// --------------------------- //
//       ERRORS DISPLAY        //
// --------------------------- //

//!\\ A enlever lors du déploiement
error_reporting(E_ERROR | E_PARSE);
ini_set('display_errors', true);


// --------------------------- //
//          SESSIONS           //
// --------------------------- //

ini_set('session.cookie_lifetime', false);
session_start();


// --------------------------- //
//         CONSTANTS           //
// --------------------------- //

// Paths
define("PATH_REQUIRE", substr($_SERVER['SCRIPT_FILENAME'], 0, -9)); // Pour fonctions d'inclusion php
define("PATH", substr($_SERVER['PHP_SELF'], 0, -9)); // Pour images, fichiers etc (html)


// Information sur l'application
define("APP_NAME", "Kaspy Changes Office");
define("APP_DESCRIPTION", "Logiciel CRM de gestion de bien immobilier");
define("APP_KEYWORDS", "Kaspy Changes Office, web app");
define("APP_FAVICON", "assets/images/favicon.ico");
define("APP_VERSION", "V1.0");

// Information sur l'éditeur de l'application (La société)
define("CODE_SOCIETE", "kaspyStock1");
define("APP_OWNER", "Kaspy Corporation");



// DataBase 
// $monfichier = "";
// if (file_exists("config/toogle_bureau.txt")) {
//     $monfichier = file_get_contents("config/toogle_bureau.txt");
// }

define("DATABASE_HOST", "localhost");
define("DATABASE_NAME", "bdkaspychangesoffice"); //. "_" .  $monfichier
define("DATABASE_USER", "KASPY");
define("DATABASE_PASSWORD", "KASPY77");


// API REST informations
define("API_HOST", "http://localhost/kaspy_chnages_office");
