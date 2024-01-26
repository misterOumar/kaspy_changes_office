<!-- Sécurité supplémentaire des pages, obligation de tooting via index-->
<?php
if (!isset($_SESSION["KaspyISS_user"])) {
    header("Location: index.php?page=login");
};
?>
<!-- End of the secure -->


<!DOCTYPE html>
<html class="loading" lang="fr" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <title><?= APP_NAME ?> -Transation</title>

    <!-- Fichiers CSS par défaut (TEMPLATE) -->
    <?php include_once 'includes/head.php' ?>
    <!-- Fichier fenetre des differents Liste et journaux -->
    <!-- Fichiers CSS spécifiques a la page (TEMPLATE) -->

    <link rel="stylesheet" type="text/css" href="css/plugins/tables/datatable/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="css/plugins/tables/datatable/responsive.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="css/plugins/tables/datatable/buttons.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="css/plugins/pickers/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="css/core/menu/menu-types/vertical-menu.css">
    <!-- Mes fichiers style CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- upload style-->
    <link rel="stylesheet" type="text/css" href="css/template/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="css/dropzone.min.css">
    <link rel="stylesheet" type="text/css" href="css/plugins/forms/form-file-uploader.css">
    <!-- new -->
    <!-- <link rel="stylesheet" href="plugins/dropzone/dropzone.css"> -->
</head>
<!-- END: Head-->
<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static " data-open="click" data-menu="vertical-menu-modern" data-col="">
    <!-- BEGIN: Main Menu-->
    <?php include 'includes/main_menu.php' ?>
    <!-- END: Main Menu-->

    <!-- BEGIN: Header-->
    <?php include 'includes/header.php' ?>
    <!-- END: Header-->

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Point Journalier Moneygram</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php?page=home">Accueil</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Transactions</a>
                                    </li>
                                    <li class="breadcrumb-item active">Moneygram
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Include Menu toogle droit-->
                <?php include 'components/menu_toggle_droit.php' ?>
            </div>
            <div class="content-body">
                <section id="basic-datatable">
                    <!-- single file upload starts -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Téléversé le point du jour</h4>
                                    <!--- DATE --->
                                    <div class="d-flex align-items-ends mr-10 gap-1 justify-content-end">
                                        <div class="col-md-3">
                                            <label class='form-label' for='dates'>Date</label>
                                            <input type="datetime" id="dates" name="dates" class="form-control flatpickr-date-time" placeholder="YYYY-MM-DD HH:MM" />

                                        </div>
                                        <div class="col-md-3">
                                            <label class='form-label' for='taxe'>Taxes</label>
                                            <input type="int" id="taxe" name="taxe" class="form-control flatpickr-date-time" />
                                        </div>

                                    </div>
                                </div>
                                <div class="card-body">
                                    <form action="#" class="dropzone dropzone-area" id="dpz-single-file">
                                        <div class="dz-message">Déposez les fichiers money gram ici ou cliquez pour les télécharger.</div>
                                        <div class="fallback">
                                            <input type='file' class='form-control me-1' name="fileInput" id="fileInput" style="width: 350px;" />
                                        </div>
                                    </form>
                                </div>
                                <div class="d-flex align-items-end justify-content-end me-2 mb-2">
                                    <a id='btnEnregistrer' href="index.php?page=money_gram" class=' btn btn-outline-primary '>
                                        <span>
                                            Voir la liste
                                        </span>
                                        <i data-feather="eye" class="me-25"></i>
                                    </a>

                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- single file upload ends -->


                    <!-- Modal large  pour la deuxieme dataTable-->
                    <div class="modal fade text-start" id="excelModal1" tabindex="-1" aria-labelledby="myModalLabel16" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel16">Point du jour money gram </h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <span class="me-4">Montant Total : <span id="montant_envoye" class="fw-bold"></span>
                                    </span>
                                    <span class="me-4">Frais Total : <span id="frais_envoye" class="fw-bold"></span> </span> <!-- payer -->
                                    <table id="excelDataTable1" class="display datatables-basic table"></table>
                                </div>
                                <div class="modal-footer">
                                    <button id="btnAnnuler" type="button" class="btn btn-outline-secondary me-1" data-bs-dismiss="modal">Annuler</button>
                                    <button id='btnValider1' name='btnValider1' class='btn btn-primary enregistrer '>Valider</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal large -->
                    <?php include 'components/modal_proprietes.php' ?>
                    <?php include 'components/modal_excel.php' ?>

                </section>
                <!--/ Basic table -->
            </div>
        </div>
    </div>


    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
    <!-- END: Content-->
    <?php include 'includes/toast.php' ?>
    <!-- ***************************************** FICHIERS JS ************************************************************** -->
    <!-- BEGIN: FICHIERS JS DU TEMPLATE -->
    <script src="js/template/vendors.min.js"></script>
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- BEGIN: FICHIERS JS DES PAGES -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="js/plugins/tables/datatable/jquery.dataTables.min.js"></script>
    <script src="js/plugins/tables/datatable/dataTables.bootstrap5.min.js"></script>
    <script src="js/plugins/tables/datatable/dataTables.responsive.min.js"></script>
    <script src="js/plugins/tables/datatable/responsive.bootstrap5.min.js"></script>
    <script src="js/plugins/tables/datatable/datatables.checkboxes.min.js"></script>
    <script src="js/plugins/tables/datatable/datatables.buttons.min.js"></script>
    <script src="js/plugins/tables/datatable/jszip.min.js"></script>
    <script src="js/plugins/tables/datatable/pdfmake.min.js"></script>
    <script src="js/plugins/tables/datatable/vfs_fonts.js"></script>
    <script src="js/plugins/tables/datatable/buttons.html5.min.js"></script>
    <script src="js/plugins/tables/datatable/buttons.print.min.js"></script>
    <script src="js/plugins/pickers/flatpickr/flatpickr.min.js"></script>
    <!--<script src="js/template/ui/jquery.sticky.js"></script> -->
    <script src="js/template/forms/spinner/jquery.bootstrap-touchspin.js"></script>
    <script src="js/template/forms/form-number-input.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="js/template/app.js"></script>
    <script src="js/template/app-menu.js"></script>
    <script src="js/plugins/forms/dropzone.min.js"></script>
    <!-- <script src="js/plugins/forms/form-file-uploader.js"></script> --> <!-- new -->
    <!-- <script src="plugins/dropzone/dropzone.js"></script>
    <script src="plugins/dropzone/forms-file-upload.js"></script> -->
    <!-- fichier pour upload -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.5/xlsx.full.min.js"></script>
    <!-- START: Footer-->
    <?php include 'includes/footer.php' ?>
    <!-- END: Footer-->
    <!-- <?php include 'js/flatpick_fr.js' ?>
     -->
    <?php include 'js/logiques/depenses_datatable.php' ?>
    <?php include 'js/logiques/depenses_logiques.php' ?>
    <?php include("views/components/alerts.php") ?>


    <script>
        var jsonData = [];
        var jsonData1 = [];
        var mergedData = [];
        // Configuration de Dropzone pour le téléversement de fichiers
        Dropzone.options.dpzSingleFile = {
            paramName: "file", // Nom du paramètre qui sera utilisé pour le téléversement du fichier
            maxFilesize: 10, // Taille maximale du fichier en mégaoctets
            acceptedFiles: ".xls, .xlsx, .csv", // Types de fichiers acceptés
            success: function(file, response) {
                // Fonction exécutée en cas de téléversement réussi

                // Récupération du fichier téléversé
                var inputFile = file;

                // Création d'un objet FileReader pour lire le contenu du fichier
                var reader = new FileReader();

                // Fonction appelée lorsque la lecture du fichier est terminée
                reader.onload = function(e) {
                    try {
                        // Récupération des données du fichier
                        var data = e.target.result;
                        var workbook;

                        // Vérification du type de fichier (CSV ou Excel)
                        if (inputFile.name.endsWith('.csv')) {
                            // Lecture du fichier CSV avec délimiteur ","
                            workbook = XLSX.read(data, {
                                type: 'binary',
                                header: 3,
                                delimiter: ','
                            });
                        } else {
                            // Lecture du fichier Excel
                            workbook = XLSX.read(data, {
                                type: 'binary',
                                header: 3
                            });
                        }

                        // Sélection de la première feuille du classeur
                        var sheetName = workbook.SheetNames[0];
                        var sheet = workbook.Sheets[sheetName];

                        // Filtrage des lignes non vides pour le premier tableau (tab1)
                        const nonEmptyZRows = XLSX.utils.sheet_to_json(sheet, {
                            header: 1
                        }).filter(row =>
                            row[0] !== undefined &&
                            row[0] !== null &&
                            row[0] !== '' &&
                            row[7] !== undefined &&
                            row[7] !== null &&
                            row[7] !== ''
                        );

                        // Filtrage des lignes non vides pour le deuxième tableau (tab2)
                        const nonEmptyZRows1 = XLSX.utils.sheet_to_json(sheet, {
                            header: 1
                        }).filter(row =>
                            row[0] !== undefined &&
                            row[0] !== null &&
                            row[0] !== '' &&
                            row[6] !== undefined &&
                            row[6] !== null &&
                            row[6] !== '' &&
                            row[7] === undefined

                        );

                        const keys = nonEmptyZRows.length > 0 ? nonEmptyZRows[0] : [];





                        const dataRows = nonEmptyZRows.slice(1, -1);
                        const taxeInput = document.getElementById('taxe');
                        const taxeValue = taxeInput.value;
                        const datesInput = document.getElementById('dates');
                        const datesValue = datesInput.value;

                        // Ajoutez les clés Taxe et Dates à la liste des clés
                        const keysWithTaxeDates = [...keys, 'Taxe', 'Dates', 'Type'];
                        const jsonData = dataRows.map(row =>
                            keys.reduce((obj, key, index) => {
                                obj[key] = row[index];
                                return obj;
                            }, {
                                Taxe: taxeValue, // Ajout de la clé Taxe avec sa valeur dans chaque objet
                                Dates: datesValue,
                                Type: "Reçu" // Ajoutez d'autres propriétés si nécessaire
                            })
                        );

                        var date_saisie = document.getElementById("dates").value;
                        var dateColumnIndex = "Heure et date (locales)"; // Assuming the date column is at index 17
                        if (jsonData.length > 0 && jsonData[0][dateColumnIndex]) {
                            var date_objet = jsonData[0][dateColumnIndex];
                            var parsedDate_objet = moment(date_objet, "YYYY-MMM-DD HH:mm:ss").format("DD/MM/YYYY");
                            // var parsedDate_objet=  date_objet ;
                            var parsedDate_saisie = moment(date_saisie).format("DD/MM/YYYY"); // Adjust the format as needed

                            if (parsedDate_objet !== parsedDate_saisie) {
                                // / Display a customized alert box
                                Swal.fire({
                                    title: 'Les dates ne correspondent pas',
                                    html: 'Date fichier: ' + parsedDate_objet + '<br>Date saisie: ' + parsedDate_saisie,
                                    icon: 'error',
                                    confirmButtonText: 'OK',
                                }).then((result) => {
                                    // Reload the page after the user clicks "OK" on the alert
                                    if (result.isConfirmed) {
                                        window.location.reload();
                                    }
                                });

                            }
                        } else {
                            console.error('Aucune donnée disponible pour la vérification de la date.');
                        }
                        console.log('Json Data 1:', jsonData);

                        // Traitement des données pour le deuxième tableau (tab2)
                        const keys1 = nonEmptyZRows1.length > 0 ? nonEmptyZRows1[0] : [];
                        const dataRows1 = nonEmptyZRows1.slice(1);
                        const keysWithTaxeDates1 = [...keys1, 'code d\'autorisation', 'Taxe', 'Dates', 'Type'];

                        jsonData1 = dataRows1.map(row =>
                            keys1.reduce((obj, key, index) => {
                                if (key === 'Num Réf') {
                                    obj[key] = row[index];
                                    obj['code d\'autorisation'] = 0; // Initialiser avec la valeur 0
                                } else {
                                    obj[key] = row[index];
                                }
                                return obj;
                            }, {
                                Taxe: taxeValue, // Ajout de la clé Taxe avec sa valeur dans chaque objet
                                Dates: datesValue, // Ajoutez d'autres propriétés si nécessaire
                                Type: "Envoyé"
                            })
                        );

                        mergedData = jsonData.concat(jsonData1);

                        // Affichage des données dans la console
                        console.log('Json Data 2:', jsonData1);

                        console.log('Json Data 1& 2:', mergedData);
                        // Initialisation de DataTable avec en-tête


                        // Création du DataTable avec les nouvelles clés
                        $("#excelDataTable1").DataTable({
                            data: mergedData,
                            columns: keysWithTaxeDates1.map(function(col) {
                                return {
                                    data: col,
                                    title: col
                                };
                            }),// Activer le défilement horizontal
                            language: {
                                // Textes pour la pagination
                                paginate: {
                                    previous: '&#10094; <span class="me-1"></span>',
                                    next: '<span class="ms-1"></span> &#10095;',
                                },
                                // Textes pour l'affichage des informations
                                info: 'Affichage de _START_ à _END_ sur _TOTAL_ entrées',
                                // Texte pour le champ de recherche
                                search: 'Rechercher :',
                                // Textes pour la longueur de la page
                                lengthMenu: 'Afficher _MENU_ ',
                                // Texte lorsque la table est vide
                                emptyTable: 'Aucune donnée disponible dans le tableau',
                                // Texte lorsque les données sont en cours de chargement
                                loadingRecords: 'Chargement...',
                                // Texte lorsque la recherche ne trouve aucune correspondance
                                zeroRecords: 'Aucun enregistrement trouvé',
                                // Textes pour la sélection des colonnes
                                select: {
                                    rows: {
                                        _: '%d lignes sélectionnées',
                                        0: 'Aucune ligne sélectionnée',
                                        1: '1 ligne sélectionnée'
                                    }
                                }
                            }
                        })

                        // Affichez le modal
                        $("#excelModal1").modal("show");

                        // Affichez le modal
                        $("#excelModal").modal("show");

                    } catch (error) {
                        console.error('Erreur lors de la lecture du fichier Excel :', error);
                    }
                };

                // Lecture du contenu du fichier en tant que chaîne binaire
                reader.readAsBinaryString(inputFile);
            },
            error: function(file, errorMessage) {
                // Fonction exécutée en cas d'erreur lors du téléversement du fichier
                console.error("Erreur lors du téléversement du fichier", file, errorMessage);
            }
        };
        // Fonction au clic du bouton "Enregistrer 1"
        $("#btnValider1").click(function(e) {
            e.preventDefault();
            // Appel de la fonction pour envoyer les données au contrôleur
            sendDataToController1(mergedData);
        });

        // Fonction au clic du bouton "Annuler"
        $("#btnAnnuler").click(function(e) {
            e.preventDefault();
            // Réinitialisez Dropzone
            var myDropzone = Dropzone.forElement("#dpz-single-file");
            if (myDropzone) {
                myDropzone.removeAllFiles();
            }
            // Si elle a déjà été initialisée, détruisez-la avant de la réinitialiser
            if ($.fn.DataTable.isDataTable("#excelDataTable1")) {
                $("#excelDataTable1").DataTable().destroy();
            }
        });


        // Fonction pour envoyer les données (1) au contrôleur via AJAX
        function sendDataToController1(mergedData) {
            $.ajax({
                url: 'controllers/upload_moneygram1_controller.php', // Remplacez par le chemin réel vers votre contrôleur
                method: 'POST',
                data: {
                    upload_moneygram_file: true,
                    data: mergedData
                },
                dataType: 'json',
                success: function(response) {
                    if (response.success === 'true') {
                        $("#excelModal1").modal("hide");

                        // Réinitialisez Dropzone
                        var myDropzone = Dropzone.forElement("#dpz-single-file");
                        if (myDropzone) {
                            myDropzone.removeAllFiles();
                        }
                        // MESSAGE ALERT
                        swal_Alert_Sucess(response.message);
                    } else if (response.success === 'existe') {
                        // MESSAGE ALERT SI  EXISTE
                        swal_Alert_Danger(response.message);
                        //FERMETURE DU MODAL
                        $("#excelModal1").modal("hide");
                        // Réinitialisez Dropzone
                        var myDropzone = Dropzone.forElement("#dpz-single-file");
                        if (myDropzone) {
                            myDropzone.removeAllFiles();
                        }
                    } else {
                        console.error('Erreur : ' + response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }
    </script>
    <script>
        $(window).on('load', function() {

            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>

</body>
<style>
    .modal-custom-width {
        max-width: 100%;
        /* Ajustez cette valeur selon vos besoins */
    }
</style>

</html>