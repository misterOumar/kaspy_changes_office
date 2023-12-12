<?php

include('./../../vendor/autoload.php');
use PhpOffice\PhpSpreadsheet\IOFactory;


if (isset($_POST['bt_import'])) {

    
    include('functions/functions.php');
    include('config/config.php');
    include('config/db.php');
    include('models/Type_carte.php');
    include('views/includes/head.php');


    if (isset($_FILES['fiche'])) {


        $fileName = $_FILES['fiche']['name'];
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
        
        $validExtensions = ['xls', 'csv', 'xlsx'];

        if (in_array($fileExtension, $validExtensions)) {
            $tempFilePath = $_FILES['fiche']['tmp_name'];
            // Déplacez le fichier téléchargé vers le dossier assets
            $uploadDir = 'assets/';
            $newFilePath = $uploadDir . $fileName;
            // Début des traitements
            if (move_uploaded_file($tempFilePath, $newFilePath)) {
                try {
                    // chargement du fichier
                    $spreadsheet = IOFactory::load($newFilePath);
                    $worksheet = $spreadsheet->getActiveSheet();
                    $data = $worksheet->toArray();
                    // Tableau pour afficher dans un premier temps les données
                    if ($data) {
                        echo json_encode([
                            'success' => 'true',
                            'data' => $data,
                        ]);
                    } else {
                        echo json_encode([
                            'success' => 'true',
                            'data' => 'null',
                        ]);
                    }

                } catch (Exception $e) {
                   

                    echo json_encode([
                        'success' => 'false',
                        'message' => 'Impossible de charger le fichier',
                    ]);
                }
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
    }
}
