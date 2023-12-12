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
    <title><?= APP_NAME ?> - Années académiques</title>

    <!-- Fichiers CSS par défaut (TEMPLATE) -->
    <?php include_once 'includes/head.php' ?>
    <!-- Fichier fenetre des differents Liste et journaux -->
    <?php include_once 'components/journal_recouvrement.php' ?>
    <?php include_once 'components/batiment_par_proprietaire.php' ?>

    <!-- Fichiers CSS spécifiques a la page (TEMPLATE) -->
    <link rel="stylesheet" type="text/css" href="css/template/vendors.min.css">

    <link rel="stylesheet" type="text/css" href="css/plugins/tables/datatable/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="css/plugins/tables/datatable/responsive.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="css/plugins/tables/datatable/buttons.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="css/plugins/pickers/flatpickr/flatpickr.min.css">

    <link rel="stylesheet" type="text/css" href="css/template/forms/pickers/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="css/template/forms/pickers/form-flat-pickr.css">

    <link rel="stylesheet" type="text/css" href="css/core/menu/menu-types/vertical-menu.css">

    <!-- Mes fichiers style CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<!-- END: Head-->


<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">
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
                            <h2 class="content-header-title float-start mb-0">Gestion des années</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php?page=home">Accueil</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Configuration</a>
                                    </li>
                                    <li class="breadcrumb-item active">Années académiques
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
                                            <th>Annees</th>
                                            <th>Date debut</th>
                                            <th>Date fin</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>

                        </div>
                    </div>

                    <!-- Modal to add new record -->
                    <div class="modal modal-slide-in fade" id="modals-slide-in">
                        <div class="modal-dialog sidebar-sm">
                            <form id="form_ajouter" name="form_ajouter" class="add-new-record modal-content pt-0" action="controllers/annees_controller.php" method="POST">

                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                <div class="modal-header mb-1">
                                    <h5 class="modal-title" id="exampleModalLabel">Création d'une nouvelle année</h5>
                                </div>
                                <button type="button" id="bt_vider" name="bt_vider" class="btn" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="bottom" class="avatar pull-up my-0" title="Vider les champs" style=" position: relative; height: 30px; width:30px; left: 300pX; padding:5px; margin-top:-10px;">
                                    <i data-feather='refresh-ccw'></i></button>

                                <div class="modal-body flex-grow-1">
                                    <!--- ANNEES --->
                                    <div class='mb-1'>
                                        <label class='form-label' for='annees'>Année de gestion</label>
                                        <input type='text' id='annees' class='form-control dt-full-annees' name='annees' placeholder="Veuillez saisir l'année" aria - Label='annees' maxlength='75' />
                                    </div>
                                    <div class='mb-1'><small id='anneesHelp' class='text-danger invisible'></small></div>

                                    <!--- DATE DEBUT --->
                                    <div class='mb-1'>
                                        <label class='form-label' for='date_debut'>Date début</label>
                                        <input type='text' id='date_debut' class='form-control dt-full-date_debut flatpickr-basic' name='date_debut' placeholder="YYYY-MM-DD" aria - Label='date_debut' maxlength='75' />
                                    </div>
                                    <div class='mb-1'><small id='date_debutHelp' class='text-danger invisible'></small></div>

                                    <!--- DATE FIN --->
                                    <div class='mb-1'>
                                        <label class='form-label' for='date_fin'>Date fin</label>
                                        <input type='text' id='date_fin' class='form-control dt-full-date_fin flatpickr-basic' name='date_fin' placeholder="YYYY-MM-DD" aria - Label='date_fin' maxlength='75' />
                                    </div>
                                    <div class='mb-1'><small id='date_finHelp' class='text-danger invisible'></small></div>



                                    <!-- flatpickr-basic -->

                                    <!--- ENREGISTREMENT --->
                                    <button type="submit" id='bt_enregistrer' name='bt_enregistrer' class='btn btn-primary enregistrer me-1'>Enregistrer</button>
                                    <button type='reset' id='bt_annuler' name='annuler' class='btn btn-outline-secondary' data-bs-dismiss='modal'>Annuler</button>
                                </div>
                            </form>
                        </div>
                    </div>


                    <!-- Modal to add new record MODIFICATION-->
                    <div class="modal modal-slide-in fade" id="modal-modif">
                        <div class="modal-dialog sidebar-sm">
                            <form id="form_modif" name="form_modif" class="add-new-record modal-content pt-0" action="controllers/annees_controller.php" method="POST">

                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                <div class="modal-header mb-1">
                                    <h5 class="modal-title" id="exampleModalLabel">Création d'une nouvelle année</h5>
                                </div>
                                <button type="button" id="bt_vider" name="bt_vider" class="btn" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="bottom" class="avatar pull-up my-0" title="Vider les champs" style=" position: relative; height: 30px; width:30px; left: 300pX; padding:5px; margin-top:-10px;">
                                    <i data-feather='refresh-ccw'></i></button>

                                <div class="modal-body flex-grow-1">
                                    <!--- ANNEES --->
                                    <div class='mb-1'>
                                        <label class='form-label' for='annees_modif'>Année de gestion</label>
                                        <input type='text' id='annees_modif' class='form-control dt-full-annees_modif' name='annees_modif' placeholder="Veuillez saisir l'année" aria - Label='annees_modif' maxlength='75' />
                                    </div>
                                    <div class='mb-1'><small id='annees_modifHelp' class='text-danger invisible'></small></div>

                                    <!--- DATE DEBUT --->
                                    <div class='mb-1'>
                                        <label class='form-label' for='date_debut_modif'>Date début</label>
                                        <input type='text' id='date_debut_modif' class='form-control dt-full-date_debut_modif flatpickr-basic' name='date_debut_modif' placeholder="YYYY-MM-DD" aria - Label='date_debut_modif' maxlength='75' />
                                    </div>
                                    <div class='mb-1'><small id='date_debut_modifHelp' class='text-danger invisible'></small></div>

                                    <!--- DATE FIN --->
                                    <div class='mb-1'>
                                        <label class='form-label' for='date_fin_modif'>Date fin</label>
                                        <input type='text' id='date_fin_modif' class='form-control dt-full-date_fin_modif flatpickr-basic' name='date_fin_modif' placeholder="YYYY-MM-DD" aria - Label='date_fin_modif' maxlength='75' />
                                    </div>
                                    <div class='mb-1'><small id='date_fin_modifHelp' class='text-danger invisible'></small></div>


                                    <input type="hidden" id="idModif" name="idModif">
                                    <!-- flatpickr-basic -->

                                    <!--- ENREGISTREMENT --->
                                    <button type="submit" id='bt_modifier' name='bt_modifier' class='btn btn-primary enregistrer me-5'>Modifier</button>
                                    <button type='reset' id='bt_annuler' name='annuler' class='btn btn-outline-secondary' data-bs-dismiss='modal'>Annuler</button>
                                </div>
                            </form>
                        </div>
                    </div>


                    <!-- Modal pour les propriétés -->
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

    <script src="js/template/forms/pickers/flatpickr/flatpickr.min.js"></script>
    <script src="js/template/forms/pickers/form-pickers.js"></script>

    <!--<script src="js/template/ui/jquery.sticky.js"></script> -->
    <script src="js/template/forms/spinner/jquery.bootstrap-touchspin.js"></script>
    <script src="js/template/forms/form-number-input.js"></script>

    <script src="js/template/app.js"></script>
    <script src="js/template/app-menu.js"></script>

    <!-- START: Footer-->
    <?php include 'includes/footer.php' ?>
    <!-- END: Footer-->


    <?php include 'js/logiques/annees_datatable.php' ?>
    <?php include 'js/logiques/annees_logiques.php' ?>
    <?php include 'js/droits_access/gestion_DroitsAccess_AnneeGestion.php' ?>

    <?php include 'js/logiques/reporting_logiques.php' ?>



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
<!-- END: Body-->

</html>