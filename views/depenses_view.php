<!DOCTYPE html>
<html class="loading" lang="fr" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <title><?= APP_NAME ?> - Dépenses</title>

    <!-- Fichiers CSS par défaut (TEMPLATE) -->
    <?php include_once 'includes/head.php' ?>

    <!-- Fichiers CSS spécifiques a la page (TEMPLATE) -->
    <link rel="stylesheet" type="text/css" href="css/template/vendors.min.css">

    <link rel="stylesheet" type="text/css" href="css/plugins/tables/datatable/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="css/plugins/tables/datatable/responsive.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="css/plugins/tables/datatable/buttons.bootstrap5.min.css">
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
                            <h2 class="content-header-title float-start mb-0">Gestion des dépenses</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php?page=home">Accueil</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Comptabilité</a>
                                    </li>
                                    <li class="breadcrumb-item active">Dépenses
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
                                            <th>Date</th> <!-- inclus de Depenses -->
                                            <th>Nature dépense</th>
                                            <th>Fournisseur</th>
                                            <th>Montant</th>
                                            <th>Mode règlement</th>
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
                            <form id="form_ajouter" name="form_ajouter" class="add-new-record modal-content pt-0" action="controllers/depenses_controller.php" method="POST">

                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                <div class="modal-header mb-1">
                                    <h5 class="modal-title" id="exampleModalLabel">Création d'une nouvelle dépense</h5>
                                </div>
                                <button type="button" id="bt_vider" name="bt_vider" class="btn" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="bottom" class="avatar pull-up my-0" title="Vider les champs" style=" position: relative; height: 30px; width:30px; left: 300pX; padding:5px; margin-top:-10px;">
                                    <i data-feather='refresh-ccw'></i></button>


                                <div class="modal-body flex-grow-1">
                                    <!--- DATE --->
                                    <div class='mb-1'>
                                        <label class='form-label' for='dates'>Date</label>
                                        <input type="datetime" id="dates" name="dates" class="form-control flatpickr-date-time" placeholder="YYYY-MM-DD HH:MM" />

                                    </div>
                                    <div class='mb-1'><small id='dateHelp' class='text-danger invisible'></small></div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <!--- NATURE DEPENSE --->
                                            <div class=''>
                                                <label class='form-label' for='nature_depense'>Nature de la dépense</label>
                                                <select name='nature_depense' id='nature_depense' data-placeholder='Choisir...' Class='select2-icons form-select'>
                                                    <option selected data-icon='facebook'>Choisir...</Option>
                                                    <?php
                                                    foreach ($nature_depenses as $key => $nature_depense) {
                                                    ?>
                                                        <option><?= $nature_depense['libelle'] ?> </option>
                                                    <?php

                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class='mb-1'><small id='nature_depenseHelp' class='text-danger invisible'></small></div>
                                        </div>

                                        <div class="col-md-6">
                                            <!--- NUMERO PIECE --->
                                            <div class=''>
                                                <label class='form-label' for='n_piece'>Numero pièce</label>
                                                <input type='text' class='form-control dt-full-nom' id='n_piece' name='n_piece' placeholder='Veuillez saisir le nom de numero pièce' aria - Label='nom' maxlength='75' />
                                            </div>
                                            <div class='mb-1'><small id='n_pieceHelp' class='text-danger invisible'></small></div>
                                        </div>
                                    </div>

                                    <!--- FOURNISSEUR --->
                                    <div class='mb-1'>
                                        <label class='form-label' for='fournisseur'>Fournisseur</label>
                                        <select name='fournisseur' id='fournisseur' data-placeholder='Choisir le fournisseur...' Class='select2-icons form-select'>
                                            <option selected data-icon='facebook'>Choisir le fournisseur...</Option>
                                            <?php
                                            foreach ($fournisseurs as $key => $fournisseur) {
                                            ?>
                                                <option><?= $fournisseur['raison_sociale'] ?> </option>
                                            <?php

                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class='mb-1'><small id='fournisseurHelp' class='text-danger invisible'></small></div>

                                    <!--- DESIGNATION --->
                                    <div class='mb-1'>
                                        <label class='form-label' for='designation'>Désignation</label>
                                        <textarea name="designation" id='designation' class="form-control" rows="2" placeholder="Désignation ici..."></textarea>

                                    </div>
                                    <div class='mb-1'><small id='designationHelp' class='text-danger invisible'></small></div>



                                    <!--- MONTANT --->
                                    <div class='mb-1'>
                                        <label class='form-label' for='montant'>Montant</label>
                                        <input type='text' class='form-control dt-montant' id='montant' name='montant' placeholder="Veuillez saisir le montant" aria - Label='emplacement' maxlength='75' />
                                    </div>
                                    <div class='mb-1'><small id='montantHelp' class='text-danger invisible'></small></div>

                                    <!--- MODE DE REGLEMENT --->
                                    <div class='mb-1'>
                                        <label class='form-label' for='mode_reglement'>Mode de règlement</label>
                                        <select name='mode_reglement' id='mode_reglement' data-placeholder='Choisir le mode de règlement...' Class='select2-icons form-select'>
                                            <option selected data-icon='facebook'>Choisir le mode de règlement...</Option>
                                            <?php
                                            foreach ($modes_reglements as $key => $mode_reglement) {
                                            ?>
                                                <option><?= $mode_reglement['nom'] ?> </option>
                                            <?php

                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class='mb-1'><small id='mode_reglementHelp' class='text-danger invisible'></small></div>

                                    <!--- ENREGISTREMENT --->
                                    <button type="submit" id='bt_enregistrer' name='bt_enregistrer' class='btn btn-primary enregistrer me-1'>Enregistrer</button>
                                    <button type='reset' id='bt_annuler' name='annuler' class='btn btn-outline-secondary' data-bs-dismiss='modal'>Annuler</button>

                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Modal modifier -->
                    <div class="modal modal-slide-in fade" id="modal-modifier">
                        <div class="modal-dialog sidebar-sm">
                            <form id="form_modifier" name="form_modifier" class="add-new-record modal-content pt-0" action="controllers/depenses_controller.php" method="POST">

                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                <div class="modal-header mb-1">
                                    <h5 class="modal-title" id="exampleModalLabel">Création d'une nouvelle dépense</h5>
                                </div>
                                <button type="button" id="bt_vider" name="bt_vider" class="btn" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="bottom" class="avatar pull-up my-0" title="Vider les champs" style=" position: relative; height: 30px; width:30px; left: 300pX; padding:5px; margin-top:-10px;">
                                    <i data-feather='refresh-ccw'></i></button>


                                <div class="modal-body flex-grow-1">
                                    <!--- DATE --->
                                    <div class='mb-1'>
                                        <label class='form-label' for='dates_modif'>Date</label>
                                        <input type="datetime" id="dates_modif" name="date_modifs" class="form-control flatpickr-date-time" placeholder="YYYY-MM-DD HH:MM" />

                                    </div>
                                    <div class='mb-1'><small id='date_modifHelp' class='text-danger invisible'></small></div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <!--- NATURE DEPENSE --->
                                            <div class=''>
                                                <label class='form-label' for='nature_depense_modif'>Nature de la dépense</label>
                                                <select name='nature_depense_modif' id='nature_depense_modif' data-placeholder='Choisir...' Class='select2-icons form-select'>
                                                    <option selected data-icon='facebook'>Choisir...</Option>
                                                    <?php
                                                    foreach ($nature_depenses as $key => $nature_depense) {
                                                    ?>
                                                        <option><?= $nature_depense['libelle'] ?> </option>
                                                    <?php

                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class='mb-1'><small id='nature_depense_modifHelp' class='text-danger invisible'></small></div>
                                        </div>

                                        <div class="col-md-6">
                                            <!--- NUMERO PIECE --->
                                            <div class=''>
                                                <label class='form-label' for='n_piece_modif'>Numero pièce</label>
                                                <input type='text' class='form-control dt-full-nom' id='n_piece_modif' name='n_piece_modif' placeholder='Veuillez saisir le nom de numero pièce' aria - Label='nom' maxlength='75' />
                                            </div>
                                            <div class='mb-1'><small id='n_piece_modifHelp' class='text-danger invisible'></small></div>
                                        </div>
                                    </div>

                                    <!--- FOURNISSEUR --->
                                    <div class='mb-1'>
                                        <label class='form-label' for='fournisseur_modif'>Fournisseur</label>
                                        <select name='fournisseur_modif' id='fournisseur_modif' data-placeholder='Choisir le fournisseur...' Class='select2-icons form-select'>
                                            <option selected data-icon='facebook'>Choisir le fournisseur...</Option>
                                            <?php
                                            foreach ($fournisseurs as $key => $fournisseur) {
                                            ?>
                                                <option><?= $fournisseur['raison_sociale'] ?> </option>
                                            <?php

                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class='mb-1'><small id='fournisseur_modifHelp' class='text-danger invisible'></small></div>

                                    <!--- DESIGNATION --->
                                    <div class='mb-1'>
                                        <label class='form-label' for='designation_modif'>Désignation</label>
                                        <textarea name="designation_modif" id='designation_modif' class="form-control" rows="2" placeholder="Désignation ici..."></textarea>

                                    </div>
                                    <div class='mb-1'><small id='designation_modifHelp' class='text-danger invisible'></small></div>



                                    <!--- MONTANT --->
                                    <div class='mb-1'>
                                        <label class='form-label' for='montant_modif'>Montant</label>
                                        <input type='text' class='form-control dt-montant' id='montant_modif' name='montant_modif' placeholder="Veuillez saisir le montant" aria - Label='emplacement' maxlength='75' />
                                    </div>
                                    <div class='mb-1'><small id='montant_modifHelp' class='text-danger invisible'></small></div>

                                    <!--- MODE DE REGLEMENT --->
                                    <div class='mb-1'>
                                        <label class='form-label' for='mode_reglement_modif'>Mode de règlement</label>
                                        <select name='mode_reglement_modif' id='mode_reglement_modif' data-placeholder='Choisir le mode de règlement...' Class='select2-icons form-select'>
                                            <option selected data-icon='facebook'>Choisir le mode de règlement...</Option>
                                            <?php
                                            foreach ($modes_reglements as $key => $mode_reglement) {
                                            ?>
                                                <option><?= $mode_reglement['nom'] ?> </option>
                                            <?php

                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class='mb-1'><small id='mode_reglement_modifHelp' class='text-danger invisible'></small></div>
                                    <input type="hidden" id="idModif" name="idModif">


                                    <!--- ENREGISTREMENT --->
                                    <button type='reset' id='bt_annuler' name='annuler' class='btn btn-outline-secondary' data-bs-dismiss='modal'>Annuler</button>
                                    <button type="submit" id='bt_modifier' name='bt_modifier' class='btn btn-primary enregistrer me-1'>Modifier</button>

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
    <script src="js/template/forms/pickers/flatpickr/flatpickr.min.js"></script>
    <!-- <script src="js/template/forms/pickers/form-pickers.js"></script> -->

    <!--<script src="js/template/ui/jquery.sticky.js"></script> -->
    <script src="js/template/forms/spinner/jquery.bootstrap-touchspin.js"></script>
    <script src="js/template/forms/form-number-input.js"></script>

    <script src="js/template/app.js"></script>
    <script src="js/template/app-menu.js"></script>

    <!-- START: Footer-->
    <?php include 'includes/footer.php' ?>
    <!-- END: Footer-->


    <?php include 'js/logiques/depenses_datatable.php' ?>
    <?php include 'js/logiques/depenses_logiques.php' ?>


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