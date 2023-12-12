<?php
if (isset($_POST['bt_save'])) {

        include('functions/functions.php');
        include('config/config.php');
        include('config/db.php');
        include('models/Type_carte.php');
        include('views/includes/head.php');

        // Récupération des données affichées dans le tableau au sein du controller type_carte_import_controller.php
        $serializedData = $_POST['excel_data'];
        $data = json_decode($serializedData, true);

         // Vérification de présence d'entetes et insertion des données récupérées
        $count = "0";
        foreach ($data as $row) {

                if ($count > 0) {
                         
                        $libelle = $row['0'];
                        $duree = $row['1'];

                        $ip = getIp();
                        $navigateur = getNavigateur();
                        $us = $_SESSION["KaspyISS_user"]['users'];
                        $pc = gethostbyaddr($_SERVER['REMOTE_ADDR']);
                        $dt = date("Y-m-d H:i:s");
                        $filename_2 = "image_defaut.jpg";

                        Type_carte::Ajouter($libelle, $duree, $filename_2, $dt, $us, $navigateur, $pc, $ip, $dt, $us, $navigateur, $pc, $ip);
                        header('Location: index.php?page=type_carte');


                } else {
                        $count = "1";
                }
        }
}
