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
    <title><?= APP_NAME ?> -Type de carte</title>

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
                            <h2 class="content-header-title float-start mb-0">Point Western Union</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php?page=home">Accueil</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Structures</a>
                                    </li>
                                    <li class="breadcrumb-item active">Western Union
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
                                    <div class="d-flex align-items-center gap-1 justify-content-end">
                                        <label class='form-label' for='dates'>Date</label>
                                        <div class="col-5">

                                            <input type="datetime" id="dates" name="dates" class="form-control flatpickr-date-time" placeholder="YYYY-MM-DD HH:MM" />

                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form action="#" class="dropzone dropzone-area" id="dpz-single-file">
                                        <div class="dz-message">Déposez les fichiers WU ici ou cliquez pour les télécharger.</div>
                                        <div class="fallback">
                                            <input type='file' class='form-control me-1' name="fileInput" id="fileInput" style="width: 350px;" />
                                        </div>
                                    </form>
                                </div>
                                <div class="d-flex align-items-end justify-content-end me-2 mb-2">
                                    <a id='btnEnregistrer' href="index.php?page=western_union" class=' btn btn-outline-primary '>

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

                    <!-- Modal large -->
                    <div class="modal fade text-start" id="excelModal" tabindex="-1" aria-labelledby="myModalLabel16" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel16">Point du jour Western Union</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <span class="me-4">Montant Total Envoyé : <span id="montant_envoye" class="fw-bold"></span> </span>
                                    <span class="me-4">Frais Total Envoyé : <span id="frais_envoye" class="fw-bold"></span> </span>

                                    <!-- payer -->
                                    <span class="me-4">Montant Total Payé : <span id="montant_paye" class="fw-bold"></span> </span>
                                    <span class="me-4">Frais Total Payé : <span id="frais_paye" class="fw-bold"></span> </span>
                                    <table id="excelDataTable" class="display datatables-basic table"></table>

                                </div>
                                <div class="modal-footer">
                                    <button id="btnAnnuler" type="button" class="btn btn-outline-secondary me-1" data-bs-dismiss="modal">Annuler</button>
                                    <button id='btnValider' name='btnValider' class='btn btn-primary enregistrer '>Valider</button>

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
    <!-- <script src="js/plugins/forms/form-file-uploader.js"></script> -->
    <!-- new -->
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
    <?php include 'js/logiques/type_carte_datatable.php' ?>
    <?php include 'js/logiques/type_carte_logiques.php' ?>
    <?php include 'js/logiques/upload_western_union_logique.php' ?>
    <?php include("views/components/alerts.php") ?>
    <script>
        // rechargercher la page quand on clique sur annuler dans le modal
        $("#close_modal").click(function(e) {
            e.preventDefault();
            alert(1)
            location.reload;

        });


        let jsonData;

        Dropzone.options.dpzSingleFile = {
            paramName: "file",
            maxFilesize: 10,
            acceptedFiles: ".xls, .xlsx, .csv",
            success: function(file, response) {
                var inputFile = file;
                var reader = new FileReader();
                reader.onload = function(e) {
                    try {
                        var data = e.target.result;
                        var workbook;
                        if (inputFile.name.endsWith('.csv')) {
                            workbook = XLSX.read(data, {
                                type: 'binary',
                                header: 3,
                                delimiter: ','
                            });
                        } else {
                            workbook = XLSX.read(data, {
                                type: 'binary',
                                header: 3
                            });
                        }
                        var sheetName = workbook.SheetNames[0];
                        var sheet = workbook.Sheets[sheetName];
                        const nonEmptyZRows = XLSX.utils.sheet_to_json(sheet, {
                            header: 1
                        }).filter(row =>
                            row[25] !== undefined && row[25] !== null && row[25] !== ''
                        );
                        const keys = nonEmptyZRows.length > 0 ? nonEmptyZRows[0] : [];
                        const dataRows = nonEmptyZRows.slice(1);
                        jsonData = dataRows.map(row =>
                            keys.reduce((obj, key, index) => {
                                obj[key] = row[index];
                                return obj;
                            }, {})
                        );
                        // Parcourir toutes les données
                        jsonData.forEach(function(item) {
                            // Vérifier si la propriété "Type de paiement" est égale à "CASH"
                            if (item["Type de paiement"] === "CASH") {
                                // Si c'est le cas, remplacer la valeur de la propriété "null" par "envoi"
                                item["Type de transaction"] = "envoi";
                                // Supprimer la propriété "null" si nécessaire
                                delete item["null"];
                            } else {
                                // Sinon, remplacer la valeur de la propriété "null" par "payer"
                                item["Type de transaction"] = "payer";
                                // Supprimer la propriété "null" si nécessaire
                                delete item["null"];
                            }

                            if (item["Taux de change"] == null) {
                                item["Taux de change"] = 0;
                            }

                            if (item["Type de paiement"] == null) {
                                item["Type de paiement"] = 'Inconnu';
                            }

                            delete item["Superv. Op. Identifiant"];
                        });

                        // STATS
                        var montant_envoyer = 0;
                        var montant_payer = 0;
                        var frais_envoyer = 0;
                        var frais_payer = 0;
                        jsonData.forEach(function(item) {
                            if (item["Type de transaction"] === "envoi") {
                                montant_envoyer += item["Montant envoyé"];
                                frais_envoyer += item["Frais de Transfert"];

                            } else {
                                montant_payer += item["Montant envoyé"];
                                frais_payer += item["Frais de Transfert"];

                            }
                        });

                        console.log(JSON.stringify(jsonData, null, 2));

                        // Affichez les données dans un DataTable
                        $("#excelDataTable").DataTable({
                            data: jsonData,
                            columns: Object.keys(jsonData[0]).map(function(col) {
                                return {
                                    data: col,
                                    title: col
                                };
                            })
                        });

                        // Si elle a déjà été initialisée, détruisez-la avant de la réinitialiser
                        if ($.fn.DataTable.isDataTable("#excelDataTable")) {
                            $("#excelDataTable").DataTable().destroy();
                        }

                        // (Re)initialisez la DataTable
                        dataTable = $("#excelDataTable").DataTable({
                            data: jsonData,
                            columns: Object.keys(jsonData[0]).map(function(col) {
                                return {
                                    data: col,
                                    title: col
                                };
                            }),
                            scrollX: true, // Activer le défilement horizontal
                        });

                        $('#montant_envoye').text(montant_envoyer);
                        $('#frais_envoye').text(frais_envoyer);
                        $('#montant_paye').text(montant_payer);
                        $('#frais_paye').text(frais_payer);

                        // Affichez le modal
                        $("#excelModal").modal("show");



                    } catch (error) {
                        console.error('Erreur lors de la lecture du fichier Excel :', error);
                    }
                };
                reader.readAsBinaryString(inputFile);
            },
            error: function(file, errorMessage) {
                console.error("Erreur lors du téléchargement du fichier", file, errorMessage);
            }
        };

        // Fonction au clic du bouton "Enregistrer"
        $("#btnValider").click(function(e) {
            e.preventDefault();

            // ... (votre code existant)

            // Appel de la fonction pour envoyer les données au contrôleur
            sendDataToController(jsonData);
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
            if ($.fn.DataTable.isDataTable("#excelDataTable")) {
                $("#excelDataTable").DataTable().destroy();
            }
        });

        // Fonction pour envoyer les données au contrôleur via AJAX
        function sendDataToController(jsonData) {
            $.ajax({
                url: 'controllers/upload_western_union_controller.php', // Remplacez par le chemin réel vers votre contrôleur
                method: 'POST',
                data: {
                    upload_western_file: true,
                    data: jsonData
                },
                dataType: 'json',
                success: function(response) {
                    if (response.success === 'true') {
                        $("#excelModal").modal("hide");

                        // Réinitialisez Dropzone
                        var myDropzone = Dropzone.forElement("#dpz-single-file");
                        if (myDropzone) {
                            myDropzone.removeAllFiles();
                        }
                        // MESSAGE ALERT
                        swal_Alert_Sucess(response.message);
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