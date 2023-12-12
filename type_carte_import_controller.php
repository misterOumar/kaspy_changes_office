   <?php

    include('vendor/autoload.php');

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

                        // Début  du corps html

                    echo ' <div class="content-body">
                    <section id="basic-datatable">
                    <div class="row">
                    <div class="col-12">
                            
                    <form method="POST" action="save_import_controller.php">
                    <table  class="datatables-basic table">
                        <thead>
                            <tr>
                                <th scope="col">libellé</th>
                                <th scope="col">durée</th>
                            </tr>
                        </thead>
                        <tbody>';

                        // Cette $count  variable permettra d'importer les fiches excels avec les entêtes


                        $count = "0";
                        foreach ($data as $row) {
                            // Vérification de la fiche si elle contient des entêtes
                            if ($count > 0) {
                                // Ici veillez énumérer les différents champs de votre table  et les affecter en fonction de la structure
                                // Veillez correspondre chaque champ de votre table avec la cellule excel  



                                $libelle = $row['0'];
                                $duree = $row['1'];
                                // Afficher les données dans le tableau
                                echo 
                                '<tr>
                                        <td>' . $libelle . ' </td>
                                         <td>' . $duree . ' </td>
                                </tr>';
                            } else {
                                $count = "1";
                            }
                        }
                        // Fin du corps html
                        echo '	</tbody></table>';
                    // Ce champ nous permettra de récuperer les données du tableau dans la methode save_import.controller.php
                    echo '<input type="hidden" name="excel_data" value="' . htmlspecialchars(json_encode($data)) . '">';
                    echo '    
                    <button type="submit" class="btn btn-primary" name="bt_save" id="bt_save">Enregistrer</button>
                    <a class="btn btn-danger" href="index.php?page=type_carte"> Annuler </a>';

                    echo '</form>
                      </div>
                        </div>
                    </div>            
	                </section>
                <!--/ Basic table -->
                </div>';
                    } catch (Exception $e) {
                        $_SESSION['messages'] = "Impossible de charger le fichier : " . $e->getMessage();
                        echo "Error: " . $e->getMessage();
                    }
                } else {
                    $_SESSION['messages'] = "Erreur lors du téléchargement du fichier.";
                    echo '<script>';
                    echo 'alert("Erreur lors du téléchargement du fichier");';
                    echo 'window.location.href = "index.php?page=type_carte";';
                    echo '</script>';
                }
            } else {
                $_SESSION['messages'] = "Extension de fichier invalide. Veuillez sélectionner un fichier XLS, CSV ou XLSX.";
                echo '<script>';
                echo 'alert("Extension de fichier invalide. Veuillez sélectionner un fichier XLS, CSV ou XLSX. !");';
                echo 'window.location.href = "index.php?page=type_carte";';
                echo '</script>';
            }
        }
    }
