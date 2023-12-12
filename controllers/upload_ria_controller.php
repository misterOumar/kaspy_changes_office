<?php

include('./../vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\IOFactory;

// header('Content-Type: application/json');
if (isset($_POST['bt_enregistrer'])) {


    include('./../functions/functions.php');
    include('./../config/config.php');
    include('./../config/db.php');
    include('./../models/Type_carte.php');


    if (isset($_FILES['fiche'])) {


        $fileName = $_FILES['fiche']['name'];
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

        $validExtensions = ['xls', 'csv', 'xlsx'];

        if (in_array($fileExtension, $validExtensions)) {
            $tempFilePath = $_FILES['fiche']['tmp_name'];
            // Déplacez le fichier téléchargé vers le dossier assets
            $uploadDir = './../assets/';
            $newFilePath = $uploadDir . $fileName;
            // Début des traitements
            if (move_uploaded_file($tempFilePath, $newFilePath)) {

                // chargement du fichier
                $spreadsheet = IOFactory::load($newFilePath);
                $worksheet = $spreadsheet->getActiveSheet();
                $data = $worksheet->toArray();
                // Tableau pour afficher dans un premier temps les données
                echo json_encode([
                    'success' => 'true',
                    'data' => $data,
                ]);

        
            } else {

                echo json_encode([
                    'success' => 'false',
                    'message' => 'Erreur lors du téléchargement du fichier.',
                ]);
            }
        } else {


            echo json_encode([
                'success' => 'false',
                'message' => 'Extension de fichier invalide. Veuillez sélectionner un fichier XLS, CSV ou XLSX.',
            ]);
        }
    } else {
        echo json_encode([
            'success' => 'false',
            'message' => 'Un problème',
        ]);
    }

    echo json_encode([
        'success' => 'yes',
        'message' => 'Good',
    ]);

}
