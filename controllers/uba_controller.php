<?php
// AFFICHER LA LISTE DES BATIMENTS
$Liste_Money_gram = null;
if (isset($_GET['page']) and !empty($_GET['page']) and $_GET['page'] === "uba") {
    include("models/Uba.php");
    $Listes_uba = uba::getAll();

}
;


// RECUPERATION DES INFO POUR PROPRIETE D'UN ELEMENT 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include("../models/Uba.php");
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
        $dateC = date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $colonnes[1])));

        // Préparer la requête d'insertion
        // Exécuter la requête avec les valeurs échappées
        if (uba::Ajouter($id, $colonnes[0], $dateC, $colonnes[2], $colonnes[3], $colonnes[4], $colonnes[5], $colonnes[6], $colonnes[7], $colonnes[8], $_SESSION['KaspyISS_user']['id'], $dt, $us, $navigateur, $pc, $ip, $dt, $us, $navigateur, $pc, $ip)) {
            // Ajouter($id, $dateC, $colonnes[1], $colonnes[2], $colonnes[3], $colonnes[4], $colonnes[5], $colonnes[6], $colonnes[7], $colonnes[8], $colonnes[9], $colonnes[10], $colonnes[11], $_SESSION['KaspyISS_user']['id'], $date_creation, $user_creation, $navigateur_creation, $ordinateur_creation, $ip_creation, $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif)
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
