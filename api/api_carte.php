 <?php
    // Afficher 
    $Liste_cartes = null;

    if (isset($_GET['page']) and !empty($_GET['page']) and $_GET['page'] === "api_carte") {
        include("models/Carte.php");
        $Liste_cartes = cartes::getAll();
        echo json_encode($Liste_cartes);
    }

    if ($_POST['page'] === "api_carte") {
        echo json_encode(var_dump($_POST));
    }
