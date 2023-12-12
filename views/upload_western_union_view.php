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
                                    <div class="d-flex align-items-center gap-1">
                                        <label class='form-label' for='dates'>Date</label>
                                        <input type="datetime" id="dates" name="dates" class="form-control flatpickr-date-time" placeholder="YYYY-MM-DD HH:MM" />

                                    </div>
                                </div>
                                <div class="card-body">

                                    <form action="#" class="dropzone dropzone-area" id="dpz-single-file">
                                        <div class="dz-message">Déposez les fichiers Western Union ici ou cliquez pour les télécharger.</div>
                                        <div class="fallback">
                                            <input type='file' class='form-control dt-montant_payermodif me-1' name="inputFile" id="inputFile" accept=".xls, .xlsx, .csv" style="width: 350px;" />
                                        </div>
                                    </form>

                                    <!-- <form action="/upload" class="dropzone needsclick" id="dropzone-basic" style="border: 2px dashed #d9dee3">
                                        <div class="dz-message needsclick">
                                            Déposez les fichiers Western Union ici ou cliquez pour les télécharger.
                                            <span class="note needsclick">(This is just a demo dropzone. Selected files are
                                                <span class="fw-medium">not</span> actually
                                                uploaded.)</span>
                                        </div>
                                        <div class="fallback"> 
                                            <input type='file' class='form-control dt-montant_payermodif me-1' name="inputFile" id="inputFile" accept=".xls, .xlsx, .csv" style="width: 350px;" />
                                            <input type="file" name="inputFile" id="inputFile" accept=".xls, .xlsx, .csv" /> 
                                        </div>
                                    </form> -->
                                </div>


                                <div class="d-flex align-items-end justify-content-end me-2 mb-2">
                                    <!-- <input type='file' class='form-control dt-montant_payermodif me-1' name="inputFile" id="inputFile" accept=".xls, .xlsx, .csv" style="width: 350px;" /> -->
                                    <button type='reset' id="clear-dropzone" name='annuler' class='btn btn-outline-secondary me-1' data-bs-dismiss='modal'>Annuler</button>
                                    <button id='btnEnregistrer' name='btnEnregistrer' class='btn btn-primary enregistrer '>Enregistrer</button>
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
                                    <h4 class="modal-title" id="myModalLabel16">Point du jour RIA</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Total : </p>
                                    <table id="excelDataTable" class="display datatables-basic table"></table>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary me-1" data-bs-dismiss="modal">Annuler</button>
                                    <button id='btnValider' name='btnValider' class='btn btn-primary enregistrer '>Valider</button>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal large -->







                    <?php include 'components/modal_proprietes.php' ?>

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
        // Configuration de Dropzone
        Dropzone.options.dpzSingleFile = {
            paramName: "file", // Le nom du paramètre qui contient le fichier dans la requête HTTP
            maxFilesize: 10, // Taille maximale du fichier en mégaoctets
            acceptedFiles: ".xls, .xlsx, .csv", // Types de fichiers acceptés
            success: function(file, response) {
                // La fonction success est appelée lorsque le téléchargement est réussi
                // console.log("Fichier téléchargé avec succès!", file, response);

                var inputFile = file;

                var reader = new FileReader();
                reader.onload = function(e) {
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

                    // Définissez le range pour le premier tableau (de la 4e ligne à la dernière cellule non vide)
                    var range1 = {
                        s: {
                            c: 0,
                            r: 3
                        }, // 4th row
                        e: {
                            c: XLSX.utils.decode_range(workbook.Sheets[sheetName]['!ref']).e.c,
                            r: XLSX.utils.decode_range(workbook.Sheets[sheetName]['!ref']).e.r
                        }
                    };

                    // Déterminez la dernière ligne du premier tableau
                    var lastRowTable1 = XLSX.utils.decode_range(workbook.Sheets[sheetName]['!ref']).e.r;

                    // Calculez le point de départ pour le deuxième tableau (5 lignes après la dernière ligne du premier tableau)
                    var startRowTable2 = lastRowTable1 + 17;

                    // Définissez le range pour le second tableau (à partir de la 16e ligne après le 1er)
                    var range2 = {
                        s: {
                            c: 0,
                            r: startRowTable2
                        }, // 16th row
                        e: {
                            c: XLSX.utils.decode_range(workbook.Sheets[sheetName]['!ref']).e.c,
                            r: XLSX.utils.decode_range(workbook.Sheets[sheetName]['!ref']).e.r
                        }
                    };

                    var excelData1 = XLSX.utils.sheet_to_json(workbook.Sheets[sheetName], {
                        range: range1
                    });
                    var excelData2 = XLSX.utils.sheet_to_json(workbook.Sheets[sheetName], {
                        range: range2
                    });

                    // // Ajoutez la colonne "Type" avec la valeur "envoyée" pour le premier tableau
                    excelData1.forEach(function(row) {
                        row.Type = "envoyée";
                    });

                    // // Ajoutez la colonne "Type" avec la valeur "payée" pour le second tableau
                    excelData2.forEach(function(row) {
                        // Vérifiez si la colonne "Type" existe déjà
                        if (!row.hasOwnProperty("Type")) {
                            row.Type = "payée";
                        }



                        // Remplacez les valeurs vides par 0 pour toutes les colonnes
                        Object.keys(row).forEach(function(col) {
                            if (row[col] === undefined || row[col] === "") {
                                row[col] = 0;
                            }
                        });

                        // Remplacez les valeurs vides dans la colonne "Taux de change" par 0
                        // if (row.hasOwnProperty("Taux de change") && (row["Taux de change"] === undefined || row["Taux de change"] === "")) {
                        //     row["Taux de change"] = 0;
                        // }
                        // if ( (row[19] === undefined || row[19] === "")) {
                        //     row[19] = 0;
                        // }
                    });

                    // Fusionnez les deux tableaux
                    // var excelData = excelData1.map(function(row) {
                    //     row.Type = "envoyée";
                    //     return row;
                    // }).concat(excelData2.map(function(row) {
                    //     row.Type = "payée";
                    //     return row;
                    // }));

                    // Fusionnez les deux tableaux
                    var excelData = excelData1.concat(excelData2);

                    // Affichez les données dans un DataTable
                    $("#excelDataTable").DataTable({
                        data: excelData,
                        columns: Object.keys(excelData[0]).map(function(col) {
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
                        data: excelData,
                        columns: Object.keys(excelData[0]).map(function(col) {
                            return {
                                data: col,
                                title: col
                            };
                        }),
                        scrollX: true, // Activer le défilement horizontal
                    });

                    // Affichez le modal
                    $("#excelModal").modal("show");
                };
                reader.readAsBinaryString(inputFile);
            },
            error: function(file, errorMessage) {
                // La fonction error est appelée en cas d'échec du téléchargement
                console.error("Erreur lors du téléchargement du fichier", file, errorMessage);
            }
        };


        $("#btnValider").click(function(e) {
            e.preventDefault();
            // alert('ok')
            // recuperer les données de la dataTable
            var tableData = dataTable.rows().data().toArray();

            // Convertissez les données en un tableau simple
            var formattedData = tableData.map(function(row) {
                return Object.values(row);
            });

            // console.log(formattedData);

            // Envoyez les données au contrôleur via une requête Ajax
            $.ajax({
                url: 'controllers/upload_western_union_controller.php', // Remplacez par le chemin réel vers votre contrôleur
                method: 'POST',
                data: {
                    upload_western_file: true,
                    // Ajoutez d'autres données si nécessaire
                    data: formattedData
                },
                dataType: 'json',
                success: function(response) {
                    // Affichez la réponse du contrôleur (message de succès ou d'erreur)
                    // console.log(response);
                    if (response.success === 'true') {
                        $("#excelModal").modal("hide");

                        // Réinitialisez Dropzone
                        var myDropzone = Dropzone.forElement("#dpz-single-file");
                        if (myDropzone) {
                            myDropzone.removeAllFiles();
                        }

                        // MESSAGE ALERT
                        swal_Alert_Sucess(response.message)
                    } else {
                        alert('Erreur : ' + response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });

        });
    </script>

    <script>
        $(document).ready(function() {

            // Dropzone.options.dpzRemoveAllThumb = {
            //     init: function() {
            //         this.on("success", function(file, response) {
            //             // Mettez à jour la valeur de l'input avec le nom du fichier téléchargé

            //             $("#inputFile").val(file.name);
            //         });
            //     }
            // };
            var dataTable;
            $("#btnEnregistrer").click(function() {
                // Lorsque le bouton est cliqué, récupérez le fichier sélectionné
                var inputFile = $("#inputFile")[0].files[0];

                var reader = new FileReader();
                reader.onload = function(e) {
                    var data = e.target.result;

                    // Utilisez SheetJS pour lire le fichier Excel ou CSV
                    var workbook;
                    if (inputFile.name.endsWith('.csv')) {

                        workbook = XLSX.read(data, {
                            type: 'binary',
                            header: 3,
                            delimiter: ','
                        });
                        // header: 3 pour commencer à partir de la 4e ligne
                    } else {
                        workbook = XLSX.read(data, {
                            type: 'binary',
                            header: 3
                        }); // header: 3 pour commencer à partir de la 4e ligne
                    }

                    // Récupérez la première feuille du classeur Excel
                    var sheetName = workbook.SheetNames[0];

                    // Définissez le range à partir de la 4e ligne
                    var range = {
                        s: {
                            c: 0,
                            r: 3
                        }, // start from 4th row
                        e: {
                            c: XLSX.utils.decode_range(workbook.Sheets[sheetName]['!ref']).e.c,
                            r: XLSX.utils.decode_range(workbook.Sheets[sheetName]['!ref']).e.r
                        } // jusqu'à la dernière cellule non vide
                    };

                    var excelData = XLSX.utils.sheet_to_json(workbook.Sheets[sheetName], {
                        range: range
                    });

                    // Affichez les données dans un DataTable
                    $("#excelDataTable").DataTable({
                        data: excelData,
                        columns: Object.keys(excelData[0]).map(function(col) {
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
                        data: excelData,
                        columns: Object.keys(excelData[0]).map(function(col) {
                            return {
                                data: col,
                                title: col
                            };
                        })
                    });

                    // Affichez le modal
                    $("#excelModal").modal("show");
                };
                reader.readAsBinaryString(inputFile);




            });


            // $("#btnValider").click(function(e) {
            //     e.preventDefault();
            //     alert('ok')
            //     // recuperer les données de la dataTable
            //     var tableData = dataTable.rows().data().toArray();

            //     // Convertissez les données en un tableau simple
            //     var formattedData = tableData.map(function(row) {
            //         return Object.values(row);
            //     });

            //     // console.log(formattedData);

            //     // Envoyez les données au contrôleur via une requête Ajax
            //     $.ajax({
            //         url: 'controllers/upload_western_union_controller.php', // Remplacez par le chemin réel vers votre contrôleur
            //         method: 'POST',
            //         data: {
            //             upload_western_file: true,
            //             // Ajoutez d'autres données si nécessaire
            //             data: formattedData
            //         },
            //         dataType: 'json',
            //         success: function(response) {
            //             // Affichez la réponse du contrôleur (message de succès ou d'erreur)
            //             console.log(response);
            //             aler
            //             if (response.success === 'true') {
            //                 alert('Enregistrement réussi : ' + response.message);
            //                 // MESSAGE ALERT
            //                 swal_Alert_Sucess(donnee['message'])
            //                 $('#form_ajouter')[0].reset();
            //             } else {
            //                 alert('Erreur : ' + response.message);
            //             }
            //         },
            //         error: function(xhr, status, error) {
            //             console.error(xhr.responseText);
            //         }
            //     });

            // });
        });
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

</html>