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
    <title><?= APP_NAME ?> - Importation MTN </title>

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
                            <h2 class="content-header-title float-start mb-0">Point Journalier MTN MONEY</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php?page=home">Accueil</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Structures</a>
                                    </li>
                                    <li class="breadcrumb-item active"> MTN Money
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
                                        <div class="dz-message">Déposez le fichier MTN MONEY ici ou cliquez pour le télécharger.</div>
                                        <div class="fallback">
                                            <input type='file' class='form-control me-1' name="fileInput" id="fileInput" style="width: 350px;" />
                                        </div>
                                    </form>
                                </div>
                                <div class="d-flex align-items-end justify-content-end me-2 mb-2">
                                    <a id='btnEnregistrer' href="index.php?page=mtn_money" class=' btn btn-outline-primary '>
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
                                    <h4 class="modal-title" id="myModalLabel16">Point du jour MTN MONEY</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="d-flex mb-2">                                                                                
                                    </div>
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
    <?php include 'js/logiques/upload_mtn_logiques.php' ?>
    <?php include("views/components/alerts.php") ?>
    


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