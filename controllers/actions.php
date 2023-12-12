<?php
// Sécurité supplémentaire des pages
if (!isset($_SESSION["KaspyISS_user"])){
    header("Location: index.php?page=login");
}


session_start();
// GESTION DU ROOTING - BUREAU
if (isset($_GET['rooting_bureau'])) {
    // $bureauchoisi = $_GET['rooting_bureau'];

    // $file = "../config/toogle_bureau.txt";
    // $fichier = file_get_contents($file);
    // $monfichier = fopen($file, "w");
    // file_put_contents($file, $bureauchoisi);


    // $message = 'rooting défini avec succès';
    // echo json_encode([
    //     'success' => 'true',
    //     'message' => $message
    // ]);
}


// GESTION DU THEME
if (isset($_GET['changer_theme'])) {
    $_SESSION['KaspyISS_theme'] = "moon";
    if ($_SESSION['KaspyISS_theme'] = "moon") {
        $_SESSION['KaspyISS_theme'] = "sun";
    } else {
        $_SESSION['KaspyISS_theme'] = "moon";
    }
}


if (isset($_GET['Changer_annee'])) {
    $anneechoisi = $_GET['Changer_annee'];
    // Définition des sessions
    $_SESSION['KaspyISS_annee'] = $anneechoisi;
    header('Location: ../index.php?page=home');
}



if (isset($_GET['Changer_bureau'])) {
    $bureauchoisi = $_GET['Changer_bureau'];
    // Définition des sessions
    $_SESSION['KaspyISS_bureau'] = $bureauchoisi;

    $message = 'Changement effectué avec succès';
    echo json_encode([
        'success' => 'true',
        'message' => $message
    ]);
}
