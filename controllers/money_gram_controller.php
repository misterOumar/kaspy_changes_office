<?php
// AFFICHER LA LISTE DES BATIMENTS
$Liste_Money_gram = null;
if (isset($_GET['page']) and !empty($_GET['page']) and $_GET['page'] === "money_gram") {
    include("models/Money_gram.php");
    $Liste_Money_gram = money_gram::getAll();

}
;


// RECUPERATION DES INFO POUR PROPRIETE D'UN ELEMENT 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include("../models/Money_gram.php");
    // Récupérer les données envoyées depuis JavaScript
    $data = $_POST['data'];

    // Traiter les données comme nécessaire
    foreach ($data as $row) {
        // Faire quelque chose avec chaque ligne ($row)
        $colonnes = explode(';', $row);
        // print_r($colonnes[0]);
        // print_r($colonnes[1]);
        // print_r($colonnes[2]);
        // print_r($colonnes[3]);
        // print_r($colonnes[4]);
        // print_r($colonnes[4]);

        // Connexion à la base de données avec PDO
        $ip = getIp();
        $navigateur = getNavigateur();
        $us = $_SESSION["KaspyISS_user"]['users'];
        $pc = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $dt = date("Y-m-d H:i:s");
        $dateC = date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $colonnes[0])));

        // Préparer la requête d'insertion
        // Exécuter la requête avec les valeurs échappées
        if (money_gram::Ajouter($id, $dateC, $colonnes[1], $colonnes[2], $colonnes[3], $colonnes[4], $colonnes[5], $colonnes[6], $_SESSION['KaspyISS_user']['id'], $dt, $us, $navigateur, $pc, $ip, $dt, $us, $navigateur, $pc, $ip)) {
            // Afficher un message de succès
            // echo "Ligne insérée avec succès.";

        }

        // Vous pouvez insérer ces données dans la base de données ici
    }

    // Répondre à JavaScript avec un message (facultatif)
    echo json_encode(['success' => true, 'message' => 'Données traitées avec succès.']);
} else {
    // Répondre avec une erreur si la requête n'est pas une requête POST
    http_response_code(405); // Méthode non autorisée
}