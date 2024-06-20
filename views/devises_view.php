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
    <title><?= APP_NAME ?> - Dévises</title>

    <!-- Fichiers CSS par défaut (TEMPLATE) -->
    <?php include_once 'includes/head.php' ?>
    <!-- Fichier fenetre des differents Liste et journaux -->





    <!-- Fichiers CSS spécifiques a la page (TEMPLATE) -->
    <link rel="stylesheet" type="text/css" href="css/template/vendors.min.css">

    <link rel="stylesheet" type="text/css" href="css/plugins/tables/datatable/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="css/plugins/tables/datatable/responsive.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="css/plugins/tables/datatable/buttons.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="css/plugins/pickers/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="css/template/forms/select2.min.css">


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
                            <h2 class="content-header-title float-start mb-0">Gestion des dévises</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php?page=home">Accueil</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Structures</a>
                                    </li>
                                    <li class="breadcrumb-item active">Dévises
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
                                            <th>Libellé</th>
                                            <th>Taux d'achat</th>
                                            <th>Taux de vente</th>

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
                            <form id="form_ajouter" name="form_ajouter" class="add-new-record modal-content pt-0" action="controllers/devises_controller.php" method="POST">

                                <button type="button" class="btn-close" data-bs-disminomss="modal" aria-label="Close">×</button>
                                <div class="modal-header mb-1">
                                    <h5 class="modal-title" id="exampleModalLabel">Création d'une nouvelle Dévise </h5>
                                </div>
                                <button type="button" id="bt_vider" name="bt_vider" class="btn" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="bottom" class="avatar pull-up my-0" title="Vider les champs" style=" position: relative; height: 30px; width:30px; left: 340pX; padding:5px; margin-top:-10px;">
                                    <i data-feather='refresh-ccw'></i></button>

                                <div class="modal-body flex-grow-1">

                                    <!--- LIBELLE --->
                                    <div>
                                        <label class='form-label required' for='libelle'>Libellé</label>
                                        <input type='text' class='form-control dt-loyer' id='libelle' name='libelle' aria - Label='annee' maxlength='75' />
                                    </div>
                                    <div class='mb-1'><small id='libelleHelp' class='text-danger invisible'></small></div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <!--- SYMBOLE --->
                                            <div>
                                                <label class='form-label' for='symbole'>Symbole</label>
                                                <input type='text' class='form-control' id='symbole' name='symbole' placeholder="$" maxlength='5' />
                                            </div>
                                            <div class='mb-1'><small id='symboleHelp' class='text-danger invisible'></small></div>

                                        </div>
                                        <div class="col-md-6">
                                            <!--- TYPE --->
                                            <div>
                                                <label class='form-label' for='type'>Type</label>
                                                <select name='type' id='type' data-placeholder='Choisir...' Class='select2-icons form-select'>
                                                    <option selected data-icon='facebook'>Choisir...</Option>
                                                    <option>étrangère </option>
                                                    <option>locale</option>

                                                </select>
                                            </div>
                                            <div class='mb-1'><small id='typeHelp' class='text-danger invisible'></small></div>

                                        </div>
                                    </div>




                                    <!--- PAYS --->
                                    <div>
                                        <label class='form-label' for='pays'>Pays</label>
                                        <select name='pays' id='pays' Class='select2 select2-icons form-select' data-placeholder='Choisir...'>
                                            <option selected data-icon='facebook'>Choisir...</Option>
                                        </select>
                                    </div>
                                    <div class='mb-1'><small id='paysHelp' class='text-danger invisible'></small></div>


                                    <div class="row mb-2">
                                        <div class="col-md-6">
                                            <!--- TAUX D'ACHAT  --->
                                            <div>
                                                <label class='form-label' for='taux_achat'>Taux d'achat</label>
                                                <input type='text' class='form-control dt-taux_achat' id='taux_achat' name='taux_achat' />
                                            </div>
                                            <div class='mb-1'><small id='taux_achatHelp' class='text-danger invisible'></small></div>

                                        </div>
                                        <div class="col-md-6">
                                            <!--- TAUX DE VENTE  --->
                                            <div>
                                                <label class='form-label' for='taux_vente'>Taux de vente</label>
                                                <input type='text' class='form-control dt-montant_payer' id='taux_vente' name='taux_vente' />
                                            </div>
                                            <div class='mb-1'><small id='taux_venteHelp' class='text-danger invisible'></small></div>

                                        </div>
                                    </div>




                                    <div class="d-flex justify-content-between">
                                        <!--- ENREGISTREMENT --->
                                        <button type='reset' id='bt_annuler' name='annuler' class='btn btn-outline-secondary' data-bs-dismiss='modal'>Annuler</button>


                                        <button type="submit" id='bt_enregistrer' name='bt_enregistrer' class='btn btn-primary enregistrer '>Enregistrer</button>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>


                    <!--- Formulaire de modification --->
                    <div class="modal modal-slide-in fade" id="modal-modif">
                        <div class="modal-dialog sidebar-sm">
                            <form id="form_modif" name="form_modif" class="add-new-record modal-content pt-0" action="controllers/devises_controller.php" method="POST">

                                <button type="button" class="btn-close" data-bs-disminomss="modal" aria-label="Close">×</button>
                                <div class="modal-header mb-1">
                                    <h5 class="modal-title" id="exampleModalLabel">Modification de la Dévise</h5>
                                </div>
                                <button type="button" id="bt_vider" name="bt_vider" class="btn" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="bottom" class="avatar pull-up my-0" title="Vider les champs" style=" position: relative; height: 30px; width:30px; left: 300pX; padding:5px; margin-top:-10px;">
                                    <i data-feather='refresh-ccw'></i></button>


                                <div class="modal-body flex-grow-1">

                                    <!--- LIBELLE --->
                                    <div>
                                        <label class='form-label required' for='libelle_modif'>Libellé</label>
                                        <input type='text' class='form-control dt-loyer' id='libelle_modif' name='libelle_modif' aria - Label='annee' maxlength='75' />
                                    </div>
                                    <div class='mb-1'><small id='libelle_modifHelp' class='text-danger invisible'></small></div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <!--- SYMBOLE --->
                                            <div>
                                                <label class='form-label' for='symbole_modif'>Symbole</label>
                                                <input type='text' class='form-control' id='symbole_modif' name='symbole_modif' placeholder="$" maxlength='5' />
                                            </div>
                                            <div class='mb-1'><small id='symbole_modifHelp' class='text-danger invisible'></small></div>

                                        </div>
                                        <div class="col-md-6">
                                            <!--- TYPE --->
                                            <div>
                                                <label class='form-label' for='type_modif'>Type</label>
                                                <select name='type_modif' id='type_modif' data-placeholder='Choisir...' Class='select2-icons form-select'>
                                                    <option selected data-icon='facebook'>Choisir...</Option>
                                                    <option>étrangère </option>
                                                    <option>locale</option>

                                                </select>
                                            </div>
                                            <div class='mb-1'><small id='type_modifHelp' class='text-danger invisible'></small></div>

                                        </div>
                                    </div>




                                    <!--- PAYS --->
                                    <div>
                                        <label class='form-label' for='pays_modif'>Pays</label>
                                        <select name='pays_modif' id='pays_modif' Class='select2 select2-icons form-select' data-placeholder='Choisir...'>
                                            
                                        </select>
                                    </div>
                                    <div class='mb-1'><small id='pays_modifHelp' class='text-danger invisible'></small></div>


                                    <div class="row mb-2">
                                        <div class="col-md-6">
                                            <!--- TAUX D'ACHAT  --->
                                            <div>
                                                <label class='form-label' for='taux_achat_modif'>Taux d'achat</label>
                                                <input type='text' class='form-control dt-taux_achat_modif' id='taux_achat_modif' name='taux_achat_modif' />
                                            </div>
                                            <div class='mb-1'><small id='taux_achat_modifHelp' class='text-danger invisible'></small></div>

                                        </div>
                                        <div class="col-md-6">
                                            <!--- TAUX DE VENTE  --->
                                            <div>
                                                <label class='form-label' for='taux_vente_modif'>Taux de vente</label>
                                                <input type='text' class='form-control' id='taux_vente_modif' name='taux_vente_modif' />
                                            </div>
                                            <div class='mb-1'><small id='taux_vente_modifHelp' class='text-danger invisible'></small></div>

                                        </div>
                                    </div>



                                    <input type="hidden" id="idModif" name="idModif">
                                    <div class="d-flex justify-content-between">
                                        <!--- ENREGISTREMENT --->
                                        <button type='reset' id='bt_annuler' name='annuler' class='btn btn-outline-secondary' data-bs-dismiss='modal'>Annuler</button>
                                        <button type="submit" id='bt_modifier' name='bt_modifier' class='btn btn-primary modifier '>Modifier</button>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--- formulaire d importation des fichiers csv , excel  --->
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

    <!-- START: Footer-->
    <?php include 'includes/footer.php' ?>
    <!-- END: Footer-->


    <!-- <?php include 'js/flatpick_fr.js' ?>
     -->
    <?php include 'js/logiques/devises_datatable.php' ?>
    <?php include 'js/logiques/devises_logiques.php' ?>



    <script src="js/template/forms/select2.full.min.js"></script>
    <script src="js/template/forms/form-select2.js"></script>
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