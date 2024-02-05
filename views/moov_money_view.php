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

    <!-- Incluez le JS de SlickGrid et de jQuery -->


    <!-- Incluez également le CSS de Bootstrap si vous utilisez les modales Bootstrap -->


    <title><?= APP_NAME ?> - Moov Money</title>

    <!-- Fichiers CSS par défaut (TEMPLATE) -->

    <?php include_once 'includes/head.php' ?>

    <!-- Fichiers CSS spécifiques a la page (TEMPLATE) -->
    <link rel="stylesheet" type="text/css" href="css/template/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="css/plugins/tables/datatable/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="css/plugins/tables/datatable/responsive.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="css/plugins/tables/datatable/buttons.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="css/plugins/pickers/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="css/core/menu/menu-types/vertical-menu.css">
    <!-- Mes fichiers style CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <?php
    //    include_once 'includes/headExcel.php' 
    ?>
</head>

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
                            <h2 class="content-header-title float-start mb-0">Transactions Moov Money</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php?page=home">Accueil</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Structures</a>
                                    </li>
                                    <li class="breadcrumb-item active">moov money
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
                    <div class="row">
                        <div class="col-12">

                            <div class="card">
                                <table class="datatables-basic table">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th>id</th>
                                            <th>Date</th>

                                            <th>telephone destinataire</th>
                                            <th>Montant</th>
                                            <th> Nouveau Solde</th>
                                            <th>ID TRANSACTION</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Modal to add new record -->
                    <!-- Modal to add new record -->
                    <div class="modal modal-slide-in fade" id="modals-slide-in">
                        <div class="modal-dialog sidebar-sm">
                            <form id="form_ajouter" name="form_ajouter" class="add-new-record modal-content pt-0" action="controllers/moov_money_controller.php" method="POST">

                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                <div class="modal-header mb-1">
                                    <h5 class="modal-title" id="exampleModalLabel">Enregistrmement d'une nouvelle transaction Moov money</h5>
                                </div>

                                <div class="modal-body flex-grow-1">
                                    <div style="display: flex; justify-content: space-between; align-items: center;" class="pb-2">
                                        <button type="button" id="bt_charger" name="bt_charger" style="height: 40px; width: 40px; padding: 5px; margin-top: -10px; display: flex; justify-content: center; align-items: center; background-color: #28C76F;;" class="btn" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="bottom" title="Chargement automatique">
                                            <i data-feather='download' style="color: white; height: 20px; width: 20px"></i>
                                        </button>

                                        <button type="button" id="bt_vider" name="bt_vider" style="height: 40px; width: 40px; padding: 5px; margin-top: -10px; display: flex; justify-content: center; align-items: center; margin-left: auto; background-color: transparent;" class="btn" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="bottom" title="Vider les champs">
                                            <i data-feather='refresh-ccw' style="color: black;" style="color: white; height: 20px; width: 20px"></i>
                                        </button>
                                    </div>


                                    <!--- NOM ET PRENOM OU RAISON SOCIALE --->
                                    <div>
                                        <label class='form-label' for='etablie_le'>Date</label>
                                        <input type='text' class='form-control dt-full-etablie_le' id='date_t' name='date_t' placeholder='La date' aria - Label='etablie_le' maxlength='75' />
                                    </div>
                                    <div class='mb-1'><small id='date_tHelp' class='text-danger invisible'></small></div>
                                    <!-- COMPTE -->
                                    <div class="row mb-n2 pb-n2">
                                        <div class="demo-inline-spacing">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="radio_type" id="radio_depot" checked value="Dépot" />
                                                <label class="form-check-label" for="radio_depot">Dépot</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="radio_type" id="radio_retrait" value="Retrait" />
                                                <label class="form-check-label" for="radio_retrait">Retrait</label>
                                            </div>
                                        </div>
                                        <div class='mb-1'><small id='typeHelp' class='text-danger invisible'></small></div>
                                    </div>

                                    <div>
                                        <label class='form-label' for='compte_contribuable'>Numéro de Téléphone</label>
                                        <input type='tel' class='form-control dt-full-compte_contribuable' id='tel_cli' name='tel_cli' placeholder="" aria - Label='compte_contribuable' maxlength='75' />
                                    </div>
                                    <div class='mb-1'><small id='tel_cliHelp' class='text-danger invisible'></small></div>


                                    <div>
                                        <label class='form-label' for='nom_prenom'>Montant </label>
                                        <input type='text' class='form-control dt-full-nom_prenom' id='montant' name='montant' placeholder='' aria - Label='nom_prenom' maxlength='75' />
                                    </div>
                                    <div class='mb-1'><small id='montantHelp' class='text-danger invisible'></small></div>

                                    <div>
                                        <label class='form-label' for='nom_prenom'>Nouveau Solde </label>
                                        <input type='text' class='form-control dt-full-nom_prenom' id='solde_t' name='solde_t' placeholder='' aria - Label='nom_prenom' maxlength='75' />
                                    </div>
                                    <div class='mb-1'><small id='solde_tHelp' class='text-danger invisible'></small></div>


                                    <div>
                                        <label class='form-label' for='nom_prenom'>ID Transaction </label>
                                        <input type='text' class='form-control dt-full-nom_prenom' id='id_transaction' name='id_transaction' placeholder='' aria - Label='nom_prenom' maxlength='75' />
                                    </div>
                                    <div class='mb-1'><small id='id_transactionHelp' class='text-danger invisible'></small></div>




                                    <!--- ENREGISTREMENT --->
                                    <button type="submit" id='bt_enregistrer' name='bt_enregistrer' class='btn btn-primary enregistrer me-5'>Enregistrer</button>
                                    <button type='reset' id='bt_annuler' name='annuler' class='btn btn-outline-secondary' data-bs-dismiss='modal'>Annuler</button>

                                </div>
                            </form>
                        </div>
                    </div>


                    <!-- Modal to update new record -->
                    <div class="modal modal-slide-in fade" id="modal-modif">
                        <div class="modal-dialog sidebar-sm">
                            <form id="form_modif" name="form_modif" class="add-new-record modal-content pt-0" action="controllers/moov_money_controller.php" method="POST">

                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                <div class="modal-header mb-1">
                                    <h5 class="modal-title" id="exampleModalLabel">Modification de la transaction moov money </h5>
                                </div>
                                <button type="button" id="bt_vider" name="bt_vider" class="btn" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="bottom" class="avatar pull-up my-0" title="Vider les champs" style=" position: relative; height: 30px; width:30px; left: 300pX; padding:5px; margin-top:-10px;">
                                    <i data-feather='refresh-ccw'></i></button>
                                <div class="modal-body flex-grow-1">
                                    <!--- DATE--->
                                    <div>
                                        <label class='form-label' for='domicile'>Date</label>
                                        <input type='date' class='form-control dt-full-domicile' id='date_t_modif' name='date_t_modif' placeholder='Nom complet du locataire' aria - Label='domicile_modif' maxlength='75' />
                                    </div>
                                    <div class='mb-1'><small id='date_t_modifHelp' class='text-danger invisible'></small></div>

                                    <!--- TYPE DE TRANSACTION--->
                                    <div class="row mb-n2 pb-n2">
                                        <div class="demo-inline-spacing">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="radio_type_modif" id="radio_depot_modif" value="Dépot" />
                                                <label class="form-check-label" for="radio_depot_modif">Dépot</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="radio_type_modif" id="radio_retrait_modif" value="Retrait" />
                                                <label class="form-check-label" for="radio_retrait_modif">Retrait</label>
                                            </div>
                                        </div>
                                        <div class='mb-1'><small id='type_modifHelp' class='text-danger invisible'></small></div>
                                    </div>

                                    <!-- TELEPHONE -->
                                    <div>
                                        <label class='form-label' for='compte_contribuable_modif'>Numéro de Téléphone</label>
                                        <input type='tel' class='form-control dt-full-compte_contribuable' id='tel_cli_modif' name='tel_cli_modif' placeholder="" aria - Label='compte_contribuable_modif' maxlength='75' />
                                    </div>
                                    <div class='mb-1'><small id='tel_cli_modif' class='text-danger invisible'></small></div>

                                    <div>
                                        <label class='form-label' for='nom_prenom_modif'>Montant</label>
                                        <input type='text' class='form-control dt-full-nom_prenom' id='montant_modif' name='montant_modif' placeholder='' aria - Label='nom_prenom_modif' maxlength='75' />
                                    </div>
                                    <div class='mb-1'><small id='montant_modifHelp' class='text-danger invisible'></small></div>

                                    <!--- NOUVEAU SOLDE--->
                                    <div>
                                        <label class='form-label' for='nom_prenom_modif'> Nouveau Solde </label>
                                        <input type='text' class='form-control dt-full-nom_prenom' id='solde_t_modif' name='solde_t_modif' placeholder='' aria - Label='nom_prenom_modif' maxlength='75' />
                                    </div>
                                    <div class='mb-1'><small id='solde_t_modifHelp' class='text-danger invisible'></small></div>

                                    <!--- ID TRANSACTION--->
                                    <div>
                                        <label class='form-label' for='nom_prenom_modif'>Id Transaction</label>
                                        <input type='text' class='form-control dt-full-nom_prenom' id='id_transaction_modif' name='id_transaction_modif' placeholder='' aria - Label='nom_prenom_modif' maxlength='75' />
                                    </div>
                                    <div class='mb-1'><small id='id_transaction_modifHelp' class='text-danger invisible'></small></div>
                                    <input type="hidden" id="idModif" name="idModif">
                                    <!--- ENREGISTREMENT --->
                                    <button type="submit" id='bt_modifier' name='bt_modifier' class='btn btn-primary enregistrer me-5'>Modifier</button>
                                    <button type='reset' id='bt_annuler' name='annuler' class='btn btn-outline-secondary' data-bs-dismiss='modal'>Annuler</button>

                                </div>
                            </form>
                        </div>
                    </div>


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

    <!-- START: Footer-->
    <?php include 'includes/footer.php' ?>
    <!-- END: Footer-->

    <script src="http://ajax.aspnetcdn.com/ajax/modernizr/modernizr-2.8.3.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/PapaParse/5.3.0/papaparse.min.js"></script>
    <script src="http://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="http://cdn-na.infragistics.com/igniteui/2023.1/latest/js/infragistics.core.js"></script>
    <script type="text/javascript" src="http://cdn-na.infragistics.com/igniteui/2023.1/latest/js/infragistics.lob.js"></script>
    <script type="text/javascript" src="http://cdn-na.infragistics.com/igniteui/2023.1/latest/js/modules/infragistics.ext_core.js"></script>
    <script type="text/javascript" src="http://cdn-na.infragistics.com/igniteui/2023.1/latest/js/modules/infragistics.ext_collections.js"></script>
    <script type="text/javascript" src="http://cdn-na.infragistics.com/igniteui/2023.1/latest/js/modules/infragistics.ext_text.js"></script>
    <script type="text/javascript" src="http://cdn-na.infragistics.com/igniteui/2023.1/latest/js/modules/infragistics.ext_io.js"></script>
    <script type="text/javascript" src="http://cdn-na.infragistics.com/igniteui/2023.1/latest/js/modules/infragistics.ext_ui.js"></script>
    <script type="text/javascript" src="http://cdn-na.infragistics.com/igniteui/2023.1/latest/js/modules/infragistics.documents.core_core.js"></script>
    <script type="text/javascript" src="http://cdn-na.infragistics.com/igniteui/2023.1/latest/js/modules/infragistics.ext_collectionsextended.js"></script>
    <script type="text/javascript" src="http://cdn-na.infragistics.com/igniteui/2023.1/latest/js/modules/infragistics.excel_core.js"></script>
    <script type="text/javascript" src="http://cdn-na.infragistics.com/igniteui/2023.1/latest/js/modules/infragistics.ext_threading.js"></script>
    <script type="text/javascript" src="http://cdn-na.infragistics.com/igniteui/2023.1/latest/js/modules/infragistics.ext_web.js"></script>
    <script type="text/javascript" src="http://cdn-na.infragistics.com/igniteui/2023.1/latest/js/modules/infragistics.xml.js"></script>
    <script type="text/javascript" src="http://cdn-na.infragistics.com/igniteui/2023.1/latest/js/modules/infragistics.documents.core_openxml.js"></script>
    <script type="text/javascript" src="http://cdn-na.infragistics.com/igniteui/2023.1/latest/js/modules/infragistics.excel_serialization_openxml.js"></script>
    <!-- <?php include 'js/flatpick_fr.js' ?>
     -->
    <?php include 'js/logiques/moov_money_datatable.php' ?>
    <?php include 'js/logiques/moov_money_logiques.php' ?>
    <?php include 'js/logiques/reporting_logiques.php' ?>
    <?php include 'js/logiques/moov_modal_logiques.php' ?>


    <script>
        //    $(function() {
        //        $("#input").on("change", function() {
        //            var excelFile,
        //                fileReader = new FileReader();
        //            $("#result").hide();

        //            fileReader.onload = function(e) {
        //                var buffer = new Uint8Array(fileReader.result);
        //                $.ig.excel.Workbook.load(
        //                    buffer,
        //                    function(workbook) {
        //                        var column,
        //                            row,
        //                            cellValue,
        //                            columnIndex,
        //                            i,
        //                            worksheet = workbook.worksheets(0),
        //                            columnsNumber = 0,
        //                            data = [],
        //                            worksheetRowsCount = worksheet.rows.length, // Utilisez .length au lieu de .count
        //                            headerRows = 1;

        //                        // Trouver le nombre maximum de colonnes
        //                        for (i = 0; i < headerRows; i++) {
        //                            var currentColumns = worksheet.rows[i].cells.length; // Utilisez .cells.length au lieu de .count
        //                            if (currentColumns > columnsNumber) {
        //                                columnsNumber = currentColumns;
        //                            }
        //                        }

        //                        // Construire les données
        //                        // 

        //                        for (i = headerRows; i < worksheetRowsCount; i++) 
        //                        {
        //                            var rowData = {};
        //                            row = worksheet.rows[i];
        //                            for (columnIndex = 0; columnIndex < columnsNumber; columnIndex++) {
        //                                column = worksheet.rows[headerRows - 1].getCellText(columnIndex);
        //                                cellValue = row.getCellText(columnIndex);
        //                                if (!rowData[column]) {
        //                                    rowData[column] = [];
        //                                }
        //                                rowData[column].push(cellValue);
        //                            }
        //                            data.push(rowData);
        //                        }

        //                        // Log des données dans la console

        //                        console.log("Data:", data);

        //                        // Affichage des données dans un tableau ou autre structure

        //                        displayDataInTable(data);

        //                        // Afficher le modal ou autre action

        //                        $("#offcanvasBottom1").modal("show");
        //                    },
        //                    function(error) {
        //                        $("#result").text("The excel file is corrupted.");
        //                        $("#result").show(1000);
        //                    }
        //                );
        //            }
        //            if (this.files.length > 0) {
        //                excelFile = this.files[0];
        //                if (
        //                    excelFile.type === "application/vnd.ms-excel" ||
        //                    excelFile.type === "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" ||
        //                    (excelFile.type === "" &&
        //                        (excelFile.name.endsWith("xls") || excelFile.name.endsWith("xlsx")))
        //                ) {
        //                    fileReader.readAsArrayBuffer(excelFile);
        //                } else {
        //                    $("#result").text(
        //                        "The format of the file you have selected is not supported. Please select a valid Excel file ('.xls, *.xlsx')."
        //                    );
        //                    $("#result").show(1000);
        //                }
        //            }
        //        });
        //    function displayDataInTable(data) {
        //        // Construction du tableau HTML
        //        var tableHtml = "<table class='styled-table'><thead><tr>";
        //        // Ajouter les en-têtes de colonnes
        //        for (var key in data[0]) {
        //            if (data[0].hasOwnProperty(key)) {
        //                tableHtml += "<th>" + key + "</th>";
        //            }
        //        }
        //        tableHtml += "</tr></thead><tbody>";
        //        // Ajouter les données
        //        for (var i = 0; i < data.length; i++) {
        //            tableHtml += "<tr>";
        //            for (var key in data[i]) {
        //                if (data[i].hasOwnProperty(key)) {
        //                    tableHtml += "<td>" + data[i][key] + "</td>";
        //                }
        //            }
        //            tableHtml += "</tr>";
        //        }
        //        tableHtml += "</tbody></table>";

        //        // Ajouter le tableau au conteneur HTML
        //        $("#S").html(tableHtml);
        //    }

        //    });

        $(function() {
            $("#input").on("change", function() {
                var excelFile,
                    fileReader = new FileReader();
                $("#result").hide();
                fileReader.onload = function(e) {
                    var buffer = new Uint8Array(fileReader.result);
                    $.ig.excel.Workbook.load(
                        buffer,
                        function(workbook) {
                            var column,
                                row,
                                cellValue,
                                columnIndex,
                                i,
                                worksheet = workbook.worksheets(0),
                                columnsNumber = 0,
                                data = [],
                                worksheetRowsCount = worksheet.rows.length,
                                headerRows = 1;

                            // Trouver le nombre maximum de colonnes

                            for (i = 0; i < headerRows; i++) {
                                var currentColumns = worksheet.rows[i].cells.length;
                                if (currentColumns > columnsNumber) {
                                    columnsNumber = currentColumns;
                                }
                            }

                            // Construire les données

                            for (i = headerRows; i < worksheetRowsCount; i++) {
                                var rowData = {};
                                row = worksheet.rows[i];
                                for (columnIndex = 0; columnIndex < columnsNumber; columnIndex++) {
                                    column = worksheet.rows[headerRows - 1].getCellText(columnIndex);
                                    cellValue = row.getCellText(columnIndex);
                                    if (!rowData[column]) {
                                        rowData[column] = [];
                                    }
                                    rowData[column].push(cellValue);
                                }
                                data.push(rowData);
                            }
                            // Filtrer et trier les données
                            var filteredData = filterAndSortData(data);
                            // Log des données dans la console
                            console.log("Data:", filteredData);
                            // Affichage des données dans un tableau ou autre structure
                            displayDataInTable(filteredData);
                            // Afficher le modal ou autre action
                            $("#offcanvasBottom1").modal("show");
                        },
                        function(error) {
                            $("#result").text("The excel file is corrupted.");
                            $("#result").show(1000);
                        }
                    );
                };

                if (this.files.length > 0) {
                    excelFile = this.files[0];
                    if (
                        excelFile.type === "application/vnd.ms-excel" ||
                        excelFile.type === "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" ||
                        (excelFile.type === "" &&
                            (excelFile.name.endsWith("xls") || excelFile.name.endsWith("xlsx")))
                    ) {
                        fileReader.readAsArrayBuffer(excelFile);
                    } else {
                        $("#result").text(
                            "The format of the file you have selected is not supported. Please select a valid Excel file ('.xls, *.xlsx')."
                        );
                        $("#result").show(1000);
                    }
                }
            });

            function filterAndSortData(data) {
                var uniqueRows = [];
                var seenRows = {};
                // Filtrer et trier les données
                data.forEach(function(row) {
                    var key = row["MONTANT"] + row["DATE"] + row["CLIENT"] + row["TELEPHONE CLIENT"] + row["DESTINATAIRE"] + row["TELEPHONE DESTINATAIRE"];
                    // Vérifier si la clé a déjà été vue
                    if (!seenRows[key]) {
                        seenRows[key] = true;
                        uniqueRows.push(row);
                    }
                });
                // Trier les données
                uniqueRows.sort(function(a, b) {
                    // Vous pouvez personnaliser l'ordre de tri en fonction de vos besoins
                    // Par exemple, trier par date
                    return new Date(a["DATE"]) - new Date(b["DATE"]);
                });
                return uniqueRows;
            }

            function displayDataInTable(data) {
                // Construction du tableau HTML
                var tableHtml = "<table class='styled-table'><thead><tr>";
                // Ajouter les en-têtes de colonnes
                for (var key in data[0]) {
                    if (data[0].hasOwnProperty(key)) {
                        tableHtml += "<th>" + key + "</th>";
                    }
                }
                tableHtml += "</tr></thead><tbody>";
                // Ajouter les données
                for (var i = 0; i < data.length; i++) {
                    tableHtml += "<tr>";
                    for (var key in data[i]) {
                        if (data[i].hasOwnProperty(key)) {
                            tableHtml += "<td>" + data[i][key] + "</td>";
                        }
                    }
                    tableHtml += "</tr>";
                }
                tableHtml += "</tbody></table>";
                // Ajouter le tableau au conteneur HTML
                $("#S").html(tableHtml);
            }

        });
        $('#bt_enregistrer').on('click', function() {
            // Enregistrez les données actuelles de la table dans la base de données
            saveToDatabase($('#S').DataTable().data().toArray());
            //    location.reload();
            $('#input').val('');
            // window.location.reload();
        });

        $('#bt_annuler').on('click', function() {
            // Enregistrez les données actuelles de la table dans la base de données
            //    window.location.reload();
        });

        function saveToDatabase(data) {
            // Extraire les données de la table
            var dataToSave = data;
            // Assurez-vous d'avoir le bon chemin pour le script PHP qui gère l'insertion dans la base de données
            var insertScript = 'controllers/save_moov_money_controller.php';
            // Effectuer la requête AJAX
            $.ajax({
                type: 'POST',
                url: insertScript,
                data: {
                    data: JSON.stringify(dataToSave)
                }, // Passer les données à insérer
                success: function(response) {
                    console.log('Data inserted successfully:', response);
                },
                error: function(error) {
                    console.error('Error inserting data:', error);
                }
            });
        }
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
<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th,
    td {
        /* border: 1px solid #ddd; */
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #f5f5f5;
    }
</style>