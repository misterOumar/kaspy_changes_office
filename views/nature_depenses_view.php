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
    <title><?= APP_NAME ?> - Nature Dépenses</title>

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
                            <h2 class="content-header-title float-start mb-0">Gestion des natures de dépense</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php?page=home">Accueil</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Structures</a>
                                    </li>
                                    <li class="breadcrumb-item active">Natures des dépenses
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
                                            <th>Libellé</th> <!-- inclus le type de salle -->
                                            <th>Fréquence</th>
                                            <th>Observations</th>
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
                            <form id="form_ajouter" name="form_ajouter" class="add-new-record modal-content pt-0" action="controllers/nature_depenses_controller.php" method="POST">

                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                <div class="modal-header mb-1">
                                    <h5 class="modal-title" id="exampleModalLabel">Création d'une nature de dépense</h5>
                                </div>
                                <button type="button" id="bt_vider" name="bt_vider" class="btn" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="bottom" class="avatar pull-up my-0" title="Vider les champs" style=" position: relative; height: 30px; width:30px; left: 300pX; padding:5px; margin-top:-10px;">
                                    <i data-feather='refresh-ccw'></i></button>


                                <div class="modal-body flex-grow-1">
                                    <!--- LIBELLE --->
                                    <div class='mb-1'>
                                        <label class='form-label' for='libelle'>Libellé de la dépense</label>
                                        <input type='text' class='form-control dt-full-nom' id='libelle' name='libelle' placeholder='Veuillez saisir le libellé de la dépense' aria - Label='nom' maxlength='75' />
                                    </div>
                                    <div class='mb-1'><small id='libelleHelp' class='text-danger invisible'></small></div>

                                    <!--- FREQUENCE --->
                                    <div class='mb-1'>
                                        <label class='form-label' for='frequence'>Fréquence</label>
                                        <select name='frequence' id='frequence' data-placeholder='Choisir la fréquence...' Class='select2-icons form-select'>
                                            <option selected data-icon='facebook'>Choisir la fréquence...</Option>
                                            <option data-icon='facebook'>Journalière</Option>
                                            <option data-icon='facebook'>Hebdomadaire</Option>
                                            <option data-icon='facebook'>Mensuelle</Option>
                                            <option data-icon='facebook'>Annuelle</Option>
                                            <option data-icon='facebook'>Autres</Option>
                                        </select>
                                    </div>
                                    <div class='mb-1'><small id='frequenceHelp' class='text-danger invisible'></small></div>

                                    <!--- OBSERVATION --->
                                    <div class='mb-1'>
                                        <label class='form-label' for='observations'>Observations</label>
                                        <textarea name="observations" id='observations' class="form-control" rows="3" placeholder="Votre observation ici..."></textarea>
                                    </div>
                                    <div class='mb-1'><small id='observationsHelp' class='text-danger invisible'></small></div>


                                    <!--- ENREGISTREMENT --->
                                    <button type="submit" id='bt_enregistrer' name='bt_enregistrer' class='btn btn-primary enregistrer me-1'>Enregistrer</button>
                                    <button type='reset' id='bt_annuler' name='annuler' class='btn btn-outline-secondary' data-bs-dismiss='modal'>Annuler</button>

                                </div>
                            </form>
                        </div>
                    </div>


                    <!-- Modal to add new record -->
                    <div class="modal modal-slide-in fade" id="modal-modifier">
                        <div class="modal-dialog sidebar-sm">
                            <form id="form_modifier" name="form_modifier" class="add-new-record modal-content pt-0" action="controllers/nature_depenses_controller.php" method="POST">

                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                <div class="modal-header mb-1">
                                    <h5 class="modal-title" id="exampleModalLabel">Modification d'une nature de dépense</h5>
                                </div>
                                <button type="button" id="bt_vider" name="bt_vider" class="btn" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="bottom" class="avatar pull-up my-0" title="Vider les champs" style=" position: relative; height: 30px; width:30px; left: 300pX; padding:5px; margin-top:-10px;">
                                    <i data-feather='refresh-ccw'></i></button>


                                <div class="modal-body flex-grow-1">
                                    <!--- LIBELLE --->
                                    <div class='mb-1'>
                                        <label class='form-label' for='libelle_modif'>Libellé de la dépense</label>
                                        <input type='text' class='form-control dt-full-nom' id='libelle_modif' name='libelle_modif' placeholder='Veuillez saisir le libellé de la dépense' aria - Label='nom' maxlength='75' />
                                    </div>
                                    <div class='mb-1'><small id='libelle_modifHelp' class='text-danger invisible'></small></div>

                                    <!--- FREQUENCE --->
                                    <div class='mb-1'>
                                        <label class='form-label' for='frequence_modif'>Fréquence</label>
                                        <select name='frequence_modif' id='frequence_modif' data-placeholder='Choisir la fréquence...' Class='select2-icons form-select'>
                                            <option selected data-icon='facebook'>Choisir la fréquence...</Option>
                                            <option data-icon='facebook'>Journalière</Option>
                                            <option data-icon='facebook'>Hebdomadaire</Option>
                                            <option data-icon='facebook'>Mensuelle</Option>
                                            <option data-icon='facebook'>Annuelle</Option>
                                            <option data-icon='facebook'>Autres</Option>
                                        </select>
                                    </div>
                                    <div class='mb-1'><small id='frequence_modifHelp' class='text-danger invisible'></small></div>

                                    <!--- OBSERVATION --->
                                    <div class='mb-1'>
                                        <label class='form-label' for='observations_modif'>Observations</label>
                                        <textarea name="observations_modif" id='observations_modif' class="form-control" rows="3" placeholder="Votre observation ici..."></textarea>
                                    </div>
                                    <div class='mb-1'><small id='observations_modifHelp' class='text-danger invisible'></small></div>
                                    <input type="hidden" id="idModif" name="idModif">


                                    <!--- ENREGISTREMENT --->
                                    <button type="submit" id='bt_modifier' name='bt_modifier' class='btn btn-primary enregistrer me-1'>Enregistrer</button>
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

    <!--<script src="js/template/ui/jquery.sticky.js"></script> -->
    <script src="js/template/forms/spinner/jquery.bootstrap-touchspin.js"></script>
    <script src="js/template/forms/form-number-input.js"></script>

    <script src="js/template/app.js"></script>
    <script src="js/template/app-menu.js"></script>

    <!-- START: Footer-->
    <?php include 'includes/footer.php' ?>
    <!-- END: Footer-->


    <?php include 'js/logiques/nature_depenses_datatable.php' ?>
    <?php include 'js/logiques/nature_depenses_logiques.php' ?>


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