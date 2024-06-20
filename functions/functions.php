<?php

/**
 * Échapper les caractères spéciaux et enlever les espaces pour sécuriser une chaine
 * @param $string
 * @return string
 */
function strSecur($string)
{
    return trim(stripslashes(htmlspecialchars($string)));
}

/**
 * Pour vérifier les numéros de telephone
 * @param $var
 * @return int
 */
function verifiePhone($var)
{
    $pattern = '/^[0-9\-]|[\+0-9]|[0-9\s]|[0-9()]*$/';
    return preg_match($pattern, $var);
}



/** Vérifie si un mot de passe contient au moins 6 caractères
 * @param $var
 * @return boolean
 */

function verifiePass($var)
{
    $pattern = '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{6,}$/';
    return preg_match($pattern, $var);
}

/**
 * Vérifier les si un email est bon
 * @param $var
 * @return mixed
 */
function verifierEmail($var)
{
    return filter_var($var, FILTER_VALIDATE_EMAIL);
}

/**
 * Fonction de récupération de l'adresse IP du visiteur
 * @param null
 * @return string
 */
function getIp()
{
    if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

/**
 * Fonction de récupération du nom du navigateur du visiteur
 * @param null
 * @return string
 */
function getNavigateur()
{
    if (isset($_SERVER['HTTP_USER_AGENT'])) {
        $browser = $_SERVER['HTTP_USER_AGENT'];
    } else {
        $browser = "Inconnu";
    }
    return  $browser;
}

/** Debug plus lisible des différentes variables
 * @param $var
 */
function debug($var)
{
    echo '<pre>';
    var_dump($var);
    exit();
    echo '</pre>';
}

$error_messages = "";
$error = [];
function validator($field, $keywords, $fieldname)
{
    global $error;
    $actions = explode("|", $keywords);
    foreach ($actions as $key => $rule) {
        if ($rule == "required") {
            if ($field == null) {
                array_push($error, "Le champ " . $fieldname . " est obligatoire");
            }
        }

        if (strpos($rule, "min:") !== false) {
            $min = intval(explode(":", $rule)[1]);
            if (gettype($field) == "string") {
                if ((strlen($field) < $min) && ($field != null)) {
                    array_push($error, "Le champ " . $fieldname . " doit comporter au moins $min caractères.");
                }
            }
            if (gettype($field) == "integer") {
                if ((intval($field) < $min)) {
                    array_push($error, "Le champ " . $fieldname . " doit être d'au moins $min");
                }
            }
        }
        if (strpos($rule, "max:") !== false) {
            $max = intval(explode(":", $rule)[1]);
            if (gettype($field) == "string") {
                if ((strlen($field) >= $max) && ($field != null)) {
                    array_push($error, "Le champ " . $fieldname . " ne doit pas être supérieur à $max caractères.");
                }
            }
            if (gettype($field) == "integer") {
                if ((intval($field) > $max)) {
                    array_push($error, "Le champ " . $fieldname . " ne doit pas être supérieur à $max");
                }
            }
        }
    }
}


/**
 * Fonction pour générer un code aléatoire
 * @return string
 */
function randomCodeFacture()
{
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 10; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }

    $randomPass = implode($pass); //turn the array into a string
    $date = date('Y-m-d H:i:s');
    return $randomPass . "" . $date;
}


function genererNumeroContrat($dateSignature, $typeContrat)
{
    // Convertir la date de signature en format ymd (sans les deux derniers chiffres de l'année)
    $anneeSignature = date('y', strtotime($dateSignature));
    $moisSignature = date('m', strtotime($dateSignature));
    $jourSignature = date('d', strtotime($dateSignature));

    // Générer un nombre aléatoire à 6 chiffres
    $numeroAleatoire = mt_rand(100000, 999999);

    // Créer un numéro de contrat avec les informations et le nombre aléatoire
    $numeroContrat = sprintf("%s%02d%02d%02d%06d", substr($typeContrat, 0, 2), $anneeSignature, $moisSignature, $jourSignature, $numeroAleatoire);

    return $numeroContrat;
}

/**
 * remplace underscore par espace
 * @param $chaine
 */
function remplacerUnderscore($chaine)
{
    $resultat = str_replace('_', ' ', $chaine);

    return $resultat;
}


function formaterNombre($nombre)
{
    // Utilisation de number_format pour ajouter les séparateurs de milliers
    $nombreFormate = number_format($nombre, 0, '', ' ');

    return $nombreFormate;
}


/**
 * Conertir un nombre en lettre
 * @param $nombre
 */
function convertirNombreEnLettres($nombre)
{
    $convertisseur = new NumberFormatter("fr", NumberFormatter::SPELLOUT);
    return ucfirst($convertisseur->format($nombre));
}
