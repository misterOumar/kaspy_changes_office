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
    <title><?= APP_NAME ?> - Logo et pied de page</title>

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

    <link rel="stylesheet" type="text/css" href="css/core/menu/menu-types/vertical-menu.css">

    <link rel="stylesheet" type="text/css" href="css/template/forms/bs-stepper.min.css">
    <link rel="stylesheet" type="text/css" href="css/template/forms/form-wizard.css">


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
                            <h2 class="content-header-title float-start mb-0">Paramètres de la société</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php?page=home">Accueil</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Configuration</a>
                                    </li>
                                    <li class="breadcrumb-item active">Logo et pied de page
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Include Menu toogle droit-->
                <?php include 'includes/menu_toggle_droit.php' ?>
            </div>


            <div class="content-body">
                <section class="modern-horizontal-wizard">
                    <div class="card">

                        <!-- Logos et pieds de pages des documents et états -->
                        <div id="billing" class="content m-2" role="tabpanel" aria-labelledby="billing-trigger">
                            <form name="form_maj" id="form_maj">
                                <div class="content-header mb-3">
                                    <h2 class="fw-bolder mb-75">Paramétrage des logos</h2>
                                    <span>Logos en entête et en filigram des documents et états</span>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <a href="#" class="" style="margin-left:27px">
                                            <img src="assets/images/<?= $embleme_actuelle ?>" id="image_embleme" class="rounded me-50" height="150" width="150" />

                                        </a>

                                        <div class="row">
                                            <div class="d-flex align-items-end mt-75 ms-1">
                                                <label id="bt_charger_photo_embleme" for="photo_embleme" class="btn btn-sm btn-primary mb-75 me-75">Charger</label>
                                                <input type="file" name="photo_embleme" id="photo_embleme" hidden accept=".jpg, .png, .jpeg,|image/*" onchange="VoirFichier(this, '#image_embleme');" />
                                                <button type="button" id="photo_embleme_reset" class="btn btn-sm btn-outline-secondary mb-75">Annuler</button>
                                                <!-- <h4 class="mb-4">Emblème du pays</h4> -->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <a href="#" class="" style="margin-left:27px">
                                            <img src="assets/images/<?= $logo_actuel ?>" id="image_2" class="rounded me-50" height="150" width="150" />
                                        </a>

                                        <div class="d-flex align-items-end mt-75 ms-1">
                                            <div>
                                                <label id="bt_charger_photo_2" for="photo_2" class="btn btn-sm btn-primary mb-75 me-75">Charger</label>
                                                <input type="file" name="photo_2" id="photo_2" hidden accept=".jpg, .png, .jpeg,|image/*" onchange="VoirFichier2(this, '#image_2');" />
                                                <button type=" button" id="photo_2_reset" class="btn btn-sm btn-outline-secondary mb-75">Annuler</button>
                                                <!-- <h4 class="mb-4">Logo de l'entreprise</h4> -->
                                            </div>
                                        </div>
                                    </div>




                                    <div class="content-header mb-2">
                                        <h2 class="fw-bolder mb-75">Paramétrage des pieds de page</h2>
                                        <span>Pied de page des documents et états</span>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="piedPage">Editer le pied de page à afficher à l'impression des
                                                    documents et états</label>
                                                <div class="form-group input-group mb-4">
                                                    <textarea class="form-control browser-default" name="pied_page" id="pied_page" rows="4"><?= $info_bureau['pied_page'] ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="d-flex justify-content-end">
                                <button name="bt_maj" id="bt_maj" class="btn btn-outline-primary">
                                    Enregistrer
                                </button>
                            </div>

                        </div>
                    </div>

                </section>
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
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- BEGIN: FICHIERS JS DU TEMPLATE -->
    <script src="js/template/vendors.min.js"></script>
    <script src="js/template/app-menu.js"></script>
    <script src="js/template/app.js"></script>


    <!-- BEGIN: FICHIERS JS DES PAGES -->
    <script src="js/template/forms/wizard/bs-stepper.min.js"></script>
    <script src="js/template/forms/form-wizard.js"></script>

    <script src="js/template/forms/cleave/cleave.min.js"></script>
    <script src="js/template/forms/cleave/addons/cleave-phone.ci.js"></script>

    <script src="js/template/forms/pickers/flatpickr/flatpickr.min.js"></script>
    <script src="js/template/forms/pickers/form-pickers.js"></script>
    <script src="js/template/extensions/sweetalert2.all.min.js"></script>

    <!--<script src="js/template/ui/jquery.sticky.js"></script> -->
    <script src="js/template/forms/spinner/jquery.bootstrap-touchspin.js"></script>
    <script src="js/template/forms/form-number-input.js"></script>


    <!-- <script src="js/template/forms/select/form-select2.js"></script> -->
    <!-- <script src="js/template/forms/select/select2.full.min.js"></script> -->
    <!-- <script src="js/template/forms/validation/jquery.validate.min.js"></script> -->


    <!-- START: Footer-->
    <?php include 'includes/footer.php' ?>
    <!-- END: Footer-->

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


    <?php include 'js/logiques/logo_pied_page_logiques.php' ?>
    <?php include 'js/droits_access/gestion_DroitsAccess_LogoPiedsPage.php' ?>
    <?php include 'js/logiques/reporting_logiques.php' ?>

</body>
<!-- END: Body-->

</html>