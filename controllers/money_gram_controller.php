<?php
// AFFICHER LA LISTE DES BATIMENTS
$Liste_Money_gram = null;
if (isset($_GET['page']) and !empty($_GET['page']) and $_GET['page'] === "money_gram") {
    include("models/Money_gram.php");
    $Liste_Money_gram = money_gram::getAll();

};


// RECUPERATION DES INFO POUR PROPRIETE D'UN ELEMENT 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données envoyées depuis JavaScript
    $data = $_POST['data'];

    // Traiter les données comme nécessaire
    foreach ($data as $row) {
        // Faire quelque chose avec chaque ligne ($row)
        print_r($row);
        // Vous pouvez insérer ces données dans la base de données ici
    }

    // Répondre à JavaScript avec un message (facultatif)
    echo json_encode(['success' => true, 'message' => 'Données traitées avec succès.']);
} else {
    // Répondre avec une erreur si la requête n'est pas une requête POST
    http_response_code(405); // Méthode non autorisée
}
