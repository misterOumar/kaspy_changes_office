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
    <title><?= APP_NAME ?> - Details role et permission</title>

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
                            <h2 class="content-header-title float-start mb-0">Gestion des Details de role</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php?page=home">Accueil</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Structures</a>
                                    </li>
                                    <li class="breadcrumb-item active">Details role
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
                                            <th>Role et permission</th>
                                            <th>Fonction</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>

                        </div>
                    </div>

                    <!-- Modal to add new record -->
                    <div class="modal modal-slide-in fade" id="modals-slide-in">
                        <div class="modal-dialog sidebar-sm">
                            <form id="form_ajouter" name="form_ajouter" class="add-new-record modal-content pt-0" action="controllers/role_permission_details_controller.php" method="POST">

                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                <div class="modal-header mb-1">
                                    <h5 class="modal-title" id="exampleModalLabel">Création d'un nouveau details de role</h5>
                                </div>
                                <button type="button" id="bt_vider" name="bt_vider" class="btn" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="bottom" class="avatar pull-up my-0" title="Vider les champs" style=" position: relative; height: 30px; width:30px; left: 300pX; padding:5px; margin-top:-10px;">
                                    <i data-feather='refresh-ccw'></i></button>


                                <div class="modal-body flex-grow-1">

                                    <!--- role permission --->
                                    <div>
                                        <label class='form-label' for='type_batiment'>Role et permission </label>
                                        <select name='role_permission' id='role_permission' data-placeholder='Choisir de role...' Class='select2-icons form-select'>
                                            <option selected data-icon='facebook'>Choisir le role...</Option>
                                            <?php
                                            foreach ($Liste_Role_permission as $role) {
                                            ?>
                                                <option value="<?= $role['id'] ?>">
                                                    <?= $role['libelle'] ?>
                                                </option>
                                            <?php
                                            }
                                            ?>
                                            <!-- <option data-icon='facebook'>Résidentiel</Option>
                                            <option data-icon='facebook'>Commercial</Option>
                                            <option data-icon='facebook'>Industriel</Option>
                                            <option data-icon='facebook'>Institutionnel</Option> -->
                                        </select>
                                    </div>
                                    <div class='mb-1'><small id='role_permissionHelp' class='text-danger invisible'></small></div>
                                    <!--- Fonction --->
                                    <div>
                                        <label class='form-label' for='fonction'>Fonction</label>
                                        <input type='text' class='form-control dt-full-fonction' id='fonction' name='fonction' placeholder='Veuillez saisir la Fonction' aria - Label='fonction' maxlength='75' />
                                    </div>
                                    <div class='mb-1'><small id='fonctionHelp' class='text-danger invisible'></small></div>



                                    <div class="row">
                                        <div class="col-md-6 d-flex align-items-center justify-content-center">
                                            <!--- lecture--->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="lecture" name="lecture" />
                                                <label class="form-check-label" for="lecture">Lecture</label>
                                            </div>
                                            <div class='mb-1'><small id='lectureHelp' class='text-danger invisible'></small></div>
                                        </div>

                                        <div class="col-md-6 d-flex align-items-center justify-content-center">
                                            <!--- creation --->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="creation" name="creation" />
                                                <label class="form-check-label" for="creation">Creation</label>
                                            </div>
                                            <div class='mb-1'><small id='creationHelp' class='text-danger invisible'></small></div>
                                        </div>

                                    </div> <br>

                                    <div class="row">
                                        <div class="col-md-6 d-flex align-items-center justify-content-center">
                                            <!--- modification --->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="modification" name="modification" />
                                                <label class="form-check-label" for="modification">Modification</label>
                                            </div>
                                            <div class='mb-1'><small id='modificationHelp' class='text-danger invisible'></small></div>
                                        </div>

                                        <div class="col-md-6 d-flex align-items-center justify-content-center">
                                            <!--- Suppression --->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="suppression" name="suppression" />
                                                <label class="form-check-label" for="suppression">Suppression</label>
                                            </div>
                                            <div class='mb-1'><small id='suppressionHelp' class='text-danger invisible'></small></div>
                                        </div>
                                    </div> <br>
                                    
                                    <div class="row">
                                        <div class="col-md-6 d-flex align-items-center justify-content-center">
                                            <!--- Duplicata --->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="duplicata" name="duplicata" />
                                                <label class="form-check-label" for="duplicata">Duplicata</label>
                                            </div>
                                            <div class='mb-1'><small id='duplicataHelp' class='text-danger invisible'></small></div>
                                        </div>

                                        <div class="col-md-6 d-flex align-items-center justify-content-center">
                                            <!--- visualisation --->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="visualisation" name="visualisation" />
                                                <label class="form-check-label" for="visualisation">Visualisation</label>
                                            </div>
                                            <div class='mb-1'><small id='visualisationHelp' class='text-danger invisible'></small></div>
                                        </div>

                                    </div> <br>

                                    <div class="row">
                                        <div class="col-md-6 d-flex align-items-center justify-content-center">
                                            <!--- exportation --->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="exportation" name="exportation" />
                                                <label class="form-check-label" for="exportation">Exportation</label>
                                            </div>
                                            <div class='mb-1'><small id='exportationHelp' class='text-danger invisible'></small></div>
                                        </div>
                                    </div> <br>
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
                            <form id="form_modif" name="form_modif" class="add-new-record modal-content pt-0" action="controllers/role_permission_details_controller.php" method="POST">

                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                <div class="modal-header mb-1">
                                    <h5 class="modal-title" id="exampleModalLabel">Modification details de role</h5>
                                </div>
                                <button type="button" id="bt_vider" name="bt_vider" class="btn" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="bottom" class="avatar pull-up my-0" title="Vider les champs" style=" position: relative; height: 30px; width:30px; left: 300pX; padding:5px; margin-top:-10px;">
                                    <i data-feather='refresh-ccw'></i></button>


                                <div class="modal-body flex-grow-1">

                                    <!--- role permission --->
                                    <div>
                                        <label class='form-label' for='role_permission_modif'>Role et permission </label>
                                        <select name='role_permission_modif' id='role_permission_modif' data-placeholder='Choisir le type de role...' Class='select2-icons form-select'>
                                            <option selected data-icon='facebook'>Choisir le role...</Option>
                                            <?php
                                            foreach ($Liste_Role_permission as $role) {
                                            ?>
                                                <option value="<?= $role['id'] ?>">
                                                    <?= $role['libelle'] ?>
                                                </option>
                                            <?php
                                            }
                                            ?>
                                            <!-- <option data-icon='facebook'>Résidentiel</Option>
                                            <option data-icon='facebook'>Commercial</Option>
                                            <option data-icon='facebook'>Industriel</Option>
                                            <option data-icon='facebook'>Institutionnel</Option> -->
                                        </select>
                                    </div>
                                    <div class='mb-1'><small id='role_permission_modifHelp' class='text-danger invisible'></small></div>
                                    <!--- Fonction --->
                                    <div>
                                        <label class='form-label' for='fonction_modif'>Fonction</label>
                                        <input type='text' class='form-control dt-full-fonction' id='fonction_modif' name='fonction_modif' placeholder='Veuillez saisir la Fonction' aria - Label='fonction' maxlength='75' />
                                    </div>
                                    <div class='mb-1'><small id='fonction_modifHelp' class='text-danger invisible'></small></div>



                                    <div class="row">
                                        <div class="col-md-6 d-flex align-items-center justify-content-center">
                                            <!--- lecture--->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="lecture_modif" name="lecture_modif" />
                                                <label class="form-check-label" for="lecture_modif">Lecture</label>
                                            </div>
                                            <div class='mb-1'><small id='lecture_modifHelp' class='text-danger invisible'></small></div>
                                        </div>

                                        <div class="col-md-6 d-flex align-items-center justify-content-center">
                                            <!--- creation --->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="creation_modif" name="creation_modif" />
                                                <label class="form-check-label" for="creation_modif">Creation</label>
                                            </div>
                                            <div class='mb-1'><small id='creation_modifHelp' class='text-danger invisible'></small></div>
                                        </div>

                                    </div> <br>

                                    <div class="row">
                                        <div class="col-md-6 d-flex align-items-center justify-content-center">
                                            <!--- modification --->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="modification_modif" name="modification_modif" />
                                                <label class="form-check-label" for="modification_modif">Modification</label>
                                            </div>
                                            <div class='mb-1'><small id='modification_modifHelp' class='text-danger invisible'></small></div>
                                        </div>

                                        <div class="col-md-6 d-flex align-items-center justify-content-center">
                                            <!--- Suppression --->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="suppression_modif" name="suppression_modif" />
                                                <label class="form-check-label" for="suppression_modif">Suppression</label>
                                            </div>
                                            <div class='mb-1'><small id='suppression_modifHelp' class='text-danger invisible'></small></div>
                                        </div>
                                    </div> <br>
                                    
                                    <div class="row">
                                        <div class="col-md-6 d-flex align-items-center justify-content-center">
                                            <!--- Duplicata --->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="duplicata_modif" name="duplicata_modif" />
                                                <label class="form-check-label" for="duplicata_modif">Duplicata</label>
                                            </div>
                                            <div class='mb-1'><small id='duplicata_modifHelp' class='text-danger invisible'></small></div>
                                        </div>

                                        <div class="col-md-6 d-flex align-items-center justify-content-center">
                                            <!--- visualisation --->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="visualisation_modif" name="visualisation_modif" />
                                                <label class="form-check-label" for="visualisation_modif">Visualisation</label>
                                            </div>
                                            <div class='mb-1'><small id='visualisation_modifHelp' class='text-danger invisible'></small></div>
                                        </div>

                                    </div> <br>

                                    <div class="row">
                                        <div class="col-md-6 d-flex align-items-center justify-content-center">
                                            <!--- exportation --->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="exportation_modif" name="exportation_modif" />
                                                <label class="form-check-label" for="exportation_modif">Exportation</label>
                                            </div>
                                            <div class='mb-1'><small id='exportation_modifHelp' class='text-danger invisible'></small></div>
                                        </div>
                                    </div> <br>

                                    <input type="hidden" id="idModif" name="idModif">


                                    <!--- ENREGISTREMENT --->
                                    <button type="submit" id='bt_modifier' name='bt_modifier' class='btn btn-primary enregistrer me-5 '>Modifier</button>
                                    <button type='reset' id='bt_annuler' name='annuler' class='btn btn-outline-secondary' data-bs-dismiss='modal'>Annuler</button>

                                </div>
                            </form>
                        </div>
                    </div>




                    <!-- Modal pour les propriétés -->
                    <?php include 'components/modal_proprietes.php' ?>
                    <?php include 'components/modal_details_batiments.php' ?>
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


    <?php include 'js/logiques/role_permission_details_datatable.php' ?>
    <?php include 'js/logiques/role_permission_details_logiques.php' ?>
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