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
    <title><?= APP_NAME ?> - Western Union</title>

    <!-- Fichiers CSS par défaut (TEMPLATE) -->
    <?php include_once 'includes/head.php' ?>
    <!-- Fichier fenetre des differents Liste et journaux -->





    <!-- Fichiers CSS spécifiques a la page (TEMPLATE) -->
    <link rel="stylesheet" type="text/css" href="css/template/vendors.min.css">

    <link rel="stylesheet" type="text/css" href="css/plugins/tables/datatable/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="css/plugins/tables/datatable/responsive.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="css/plugins/tables/datatable/buttons.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="css/plugins/pickers/flatpickr/flatpickr.min.css">

    <link rel="stylesheet" type="text/css" href="css/core/menu/menu-types/vertical-menu.css">

    <!-- Mes fichiers style CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
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
                            <h2 class="content-header-title float-start mb-0">Transactions Western Union</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php?page=home">Accueil</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Structures</a>
                                    </li>
                                    <li class="breadcrumb-item active">Opérations Western Union
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
                                            <th>Expéditeur</th>
                                            <th>Receveur</th>
                                            <th>Montant envoyé</th>
                                            <th>Total frais</th>

                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>

                        </div>
                    </div>

                    <!-- Modal to add new record -->
                    <div class="modal modal-slide-in fade" id="modals-slide-in">
                        <div class="modal-dialog sidebar-large">
                            <form id="form_ajouter" name="form_ajouter" class="add-new-record modal-content pt-0" action="controllers/type_carte_controller.php" method="POST">

                                <button type="button" class="btn-close" data-bs-disminomss="modal" aria-label="Close">×</button>
                                <div class="modal-header mb-1">
                                    <h5 class="modal-title" id="exampleModalLabel">Création d'un nouveau type de carte </h5>
                                </div>
                                <button type="button" id="bt_vider" name="bt_vider" class="btn" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="bottom" class="avatar pull-up my-0" title="Vider les champs" style=" position: relative; height: 30px; width:30px; left: 340pX; padding:5px; margin-top:-10px;">
                                    <i data-feather='refresh-ccw'></i></button>

                                <div class="modal-body flex-grow-1">

                                    <div>
                                        <label class='form-label' for='recouvreur'>Libellé</label>
                                        <input type='text' class='form-control dt-loyer' id='libelle' name='libelle' aria - Label='annee' maxlength='75' />
                                    </div>
                                    <div class='mb-1'><small id='libelleHelp' class='text-danger invisible'></small></div>

                                    <!--- APPARTEMENT --->
                                    <div>
                                        <label class='form-label' for='appartement'>Durée</label>
                                        <input type='text' class='form-control dt-montant_payer' id='duree' name='duree' aria - Label='annee' maxlength='75' />
                                    </div>
                                    <div class='mb-1'><small id=' dureeHelp' class='text-danger invisible'></small></div>
                                    <div>
                                        <label class='form-label' for='appartement'>Choisir le logo</label>
                                        <input type='file' class='form-control dt-montant_payer' id='photo_2' name='photo_2' aria - Label='annee' maxlength='75' />
                                    </div>
                                    <div class='mb-1'><small id=' logoHelp' class='text-danger invisible'></small></div>


                                    <!--- ENREGISTREMENT --->
                                    <button type="submit" id='bt_enregistrer' name='bt_enregistrer' class='btn btn-primary enregistrer me-5'>Enregistrer</button>
                                    <button type='reset' id='bt_annuler' name='annuler' class='btn btn-outline-secondary' data-bs-dismiss='modal'>Annuler</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal modal-slide-in fade" id="modals-">
                        <div class="modal-dialog sidebar-large">
                            <form id="form_ajouter" name="form_ajouter" class="add-new-record modal-content pt-0" action="controllers/type_carte_controller.php" method="POST">

                                <button type="button" class="btn-close" data-bs-disminomss="modal" aria-label="Close">×</button>
                                <div class="modal-header mb-1">
                                    <h5 class="modal-title" id="exampleModalLabel">Création d'un nouveau type de carte </h5>
                                </div>
                                <button type="button" id="bt_vider" name="bt_vider" class="btn" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="bottom" class="avatar pull-up my-0" title="Vider les champs" style=" position: relative; height: 30px; width:30px; left: 340pX; padding:5px; margin-top:-10px;">
                                    <i data-feather='refresh-ccw'></i></button>

                                <div class="modal-body flex-grow-1">

                                    <div>
                                        <label class='form-label' for='recouvreur'>Libellé</label>
                                        <input type='text' class='form-control dt-loyer' id='libelle' name='libelle' aria - Label='annee' maxlength='75' />
                                    </div>
                                    <div class='mb-1'><small id='libelleHelp' class='text-danger invisible'></small></div>

                                    <!--- APPARTEMENT --->
                                    <div>
                                        <label class='form-label' for='appartement'>Durée</label>
                                        <input type='text' class='form-control dt-montant_payer' id='duree' name='duree' aria - Label='annee' maxlength='75' />
                                    </div>
                                    <div class='mb-1'><small id=' dureeHelp' class='text-danger invisible'></small></div>
                                    <div>
                                        <label class='form-label' for='appartement'>Choisir le logo</label>
                                        <input type='file' class='form-control dt-montant_payer' id='photo_2' name='photo_2' aria - Label='annee' maxlength='75' />
                                    </div>
                                    <div class='mb-1'><small id=' logoHelp' class='text-danger invisible'></small></div>
                                    <!--- ENREGISTREMENT --->
                                    <button type="submit" id='bt_enregistrer' name='bt_enregistrer' class='btn btn-primary enregistrer me-5'>Enregistrer</button>
                                    <button type='reset' id='bt_annuler' name='annuler' class='btn btn-outline-secondary' data-bs-dismiss='modal'>Annuler</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!--- Formulaire de modification --->

                    <div class="modal modal-slide-in fade" id="modal-modif">
                        <div class="modal-dialog sidebar-sm">
                            <form id="form_modif" name="form_modif" class="add-new-record modal-content pt-0" action="controllers/type_carte_controller.php" method="POST">

                                <button type="button" class="btn-close" data-bs-disminomss="modal" aria-label="Close">×</button>
                                <div class="modal-header mb-1">
                                    <h5 class="modal-title" id="exampleModalLabel">Modification du Type de carte</h5>
                                </div>
                                <button type="button" id="bt_vider" name="bt_vider" class="btn" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="bottom" class="avatar pull-up my-0" title="Vider les champs" style=" position: relative; height: 30px; width:30px; left: 300pX; padding:5px; margin-top:-10px;">
                                    <i data-feather='refresh-ccw'></i></button>

                                <div class="modal-body flex-grow-1">
                                    <div class="row">
                                        <div class=''>
                                            <label class='form-label' for='libellemodif'>Libellé</label>
                                            <input type='text' class='form-control dt-loyermodif' id='libellemodif' name='libellemodif' aria - Label='loyermodif' maxlength='75' />
                                        </div>
                                        <div class='mb-1'><small id='loyermodifHelp' class='text-danger invisible'></small></div>

                                        <div class=''>
                                            <label class='form-label' for='montant_payermodif'>Durée</label>
                                            <input type='text' class='form-control dt-montant_payermodif' id='dureemodif' name='dureemodif' aria - Label='montant_payermodif' maxlength='75' />
                                        </div>
                                        <div class='mb-1'><small id='dureemodifHelp' class='text-danger invisible'></small></div>
                                    </div>
                                    <input type="hidden" id="idModif" name="idModif">
                                    <!--- Modification --->
                                    <button type="submit" id='bt_modifier' name='bt_modifier' class='btn btn-primary enregistrer me-5'>Modifier</button>
                                    <button type='reset' id='bt_annuler' name='annuler' class='btn btn-outline-secondary' data-bs-dismiss='modal'>Annuler</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--- formulaire d importation des fichiers csv , excel  --->

                    <div class="modal modal-slide-in fade" id="modal-import">
                        <div class="modal-dialog sidebar-sm">
                            <form id="form_modif" name="form_modif" class="add-new-record modal-content pt-0" action="type_carte_import_controller.php" enctype="multipart/form-data" method="POST">

                                <button type="button" class="btn-close" data-bs-disminomss="modal" aria-label="Close">×</button>
                                <div class="modal-header mb-1">
                                    <h5 class="modal-title" id="exampleModalLabel">Importez ici vos données</h5>
                                </div>
                                <button type="button" id="bt_vider" name="bt_vider" class="btn" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="bottom" class="avatar pull-up my-0" title="Vider les champs" style=" position: relative; height: 30px; width:30px; left: 300pX; padding:5px; margin-top:-10px;">
                                    <i data-feather='refresh-ccw'></i></button>

                                <div class="modal-body flex-grow-1">
                                    <div class="row">

                                        <div class=''>
                                            <label class='form-label' for='montant_payermodif'>Importer ici</label>
                                            <input type='file' class='form-control dt-montant_payermodif' name="fiche" id="fiche" accept=".xls, .xlsx, .csv" aria - Label='montant_payermodif' maxlength='75' />
                                        </div>
                                        <div class='mb-1'><small id='ficheHelp' class='text-danger invisible'></small></div>
                                    </div>
                                    <!--- Modification --->
                                    <button type="submit" id='bt_import' name='bt_import' class='btn btn-primary enregistrer me-5'>Importer</button>
                                    <button type='reset' id='bt_annuler' name='annuler' class='btn btn-outline-secondary' data-bs-dismiss='modal'>Annuler</button>
                                </div>
                            </form>
                        </div>
                    </div>




                    <?php include 'components/modal_proprietes.php' ?>
                    <?php include 'components/modal_details.php' ?>

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

    <!--<script src="js/template/ui/jquery.sticky.js"></script> -->
    <script src="js/template/forms/spinner/jquery.bootstrap-touchspin.js"></script>
    <script src="js/template/forms/form-number-input.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script src="js/template/app.js"></script>
    <script src="js/template/app-menu.js"></script>

    <!-- START: Footer-->
    <?php include 'includes/footer.php' ?>
    <!-- END: Footer-->


    <!-- <?php include 'js/flatpick_fr.js' ?>
     -->
    <?php include 'js/logiques/western_union_datatable.php' ?>
    <?php include 'js/logiques/type_carte_logiques.php' ?>
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

</html>