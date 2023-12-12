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
    <title><?= APP_NAME ?> - Changes</title>

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
                            <h2 class="content-header-title float-start mb-0">Gestion changes</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php?page=home">Accueil</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Structures</a>
                                    </li>
                                    <li class="breadcrumb-item active">Changes
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
                                            <th>Nombre appartement</th>
                                            <th>Propriétaire</th>
                                            <th>Coût construction</th>
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
                            <form id="form_ajouter" name="form_ajouter" class="add-new-record modal-content pt-0" action="controllers/batiments_controller.php" method="POST">

                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                <div class="modal-header mb-1">
                                    <h5 class="modal-title" id="exampleModalLabel">Création d'un nouveau bâtiment</h5>
                                </div>
                                <button type="button" id="bt_vider" name="bt_vider" class="btn" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="bottom" class="avatar pull-up my-0" title="Vider les champs" style=" position: relative; height: 30px; width:30px; left: 300pX; padding:5px; margin-top:-10px;">
                                    <i data-feather='refresh-ccw'></i></button>


                                <div class="modal-body flex-grow-1">
                                    <!--- LIBELLE --->
                                    <div>
                                        <label class='form-label' for='libelle'>Libellé (nom) du bâtiment</label>
                                        <input type='text' class='form-control dt-full-libelle' id='libelle' name='libelle' placeholder='Veuillez saisir le libellé du bâtiment' aria - Label='libelle' maxlength='75' />
                                    </div>
                                    <div class='mb-1'><small id='libelleHelp' class='text-danger invisible'></small></div>

                                    <!--- TYPE_BATIMENT--->
                                    <div>
                                        <label class='form-label' for='type_batiment'>Type de batiment</label>
                                        <select name='type_batiment' id='type_batiment' data-placeholder='Choisir le type de batiment...' Class='select2-icons form-select'>
                                            <option selected data-icon='facebook'>Choisir le type de batiment...</option>
                                            <?php
                                            foreach ($Liste_type_batiment as $type_batiment) {
                                            ?>
                                                <option value="<?= $type_batiment['id'] ?>">
                                                    <?= $type_batiment['libelle'] ?>
                                                </option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class='mb-1'><small id='type_batimentHelp' class='text-danger invisible'></small></div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <!--- NOMBRE_APPARTEMENT --->
                                            <div class='mb-1'>
                                                <label class='form-label' for='nombre_appartement'>Nombre d'appartements</label>

                                            </div>
                                            <div class='mb-1'><small id='nombre_appartementHelp' class='text-danger invisible'></small></div>
                                        </div>
                                        <div class="input-group">
                                            <input class="touch_pin_input" id='nombre_appartement' name='nombre_appartement' type="text" value="0" data-bts-button-down-class="btn btn-primary" data-bts-button-up-class="btn btn-primary" max="999999" />
                                        </div>
                                    </div> <br>
                                    <div class="row">
                                        <div class="col-md-6 d-flex align-items-center justify-content-center">
                                            <!--- PARKING--->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="parking" name="parking" />
                                                <label class="form-check-label" for="parking">Parking</label>
                                            </div>
                                            <div class='mb-1'><small id='parkingHelp' class='text-danger invisible'></small></div>
                                        </div>
                                        <div class="col-md-6 d-flex align-items-center justify-content-center">
                                            <!--- JARDIN --->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="jardin" name="jardin" />
                                                <label class="form-check-label" for="jardin">Jardin</label>
                                            </div>
                                            <div class='mb-1'><small id='jardinHelp' class='text-danger invisible'></small></div>
                                        </div>
                                    </div> <br>

                                    <div class="col-md-6 d-flex align-items-center justify-content-center">

                                        <!--- ASCENSEUR --->
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="ascenseur" name="ascenseur" />
                                            <label class="form-check-label" for="ascenseur">Ascenseur</label>
                                        </div>
                                        <div class='mb-1'><small id='ascenseurHelp' class='text-danger invisible'></small></div>
                                    </div> <br>


                                    <!--- PROPRIETAIRE --->
                                    <div>
                                        <label class='form-label' for='proprietaire'>Propriétaire</label>
                                        <select name='proprietaire' id='proprietaire' data-placeholder='Veuillez saisir le nom du propriétaire' Class='select2-icons form-select'>
                                            <option selected data-icon='facebook'>Choisir le proprietaire...</Option>
                                            <?php
                                            foreach ($Liste_proprietaires as $proprietaire) {
                                            ?>
                                                <option value="<?= $proprietaire['id'] ?>">
                                                    <?= $proprietaire['nom_prenom'] ?>
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
                                    <div class='mb-1'><small id='proprietaireHelp' class='text-danger invisible'></small></div>

                                    <!--- MONTANT --->
                                    <div class=''>
                                        <label class='form-label' for='cout_construction'>Coût de la construction</label>
                                        <input type='text' class='form-control dt-cout_construction' id='cout_construction' name='cout_construction' aria - Label='cout_construction' maxlength='75' />
                                    </div>
                                    <div class='mb-1'><small id='cout_constructionHelp' class='text-danger invisible'></small></div>




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
                            <form id="form_modif" name="form_modif" class="add-new-record modal-content pt-0" action="controllers/batiments_controller.php" method="POST">

                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                <div class="modal-header mb-1">
                                    <h5 class="modal-title" id="exampleModalLabel">Modification d'un nouveau bâtiment</h5>
                                </div>
                                <button type="button" id="btn_vider" name="btn_vider" class="btn" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="bottom" class="avatar pull-up my-0" title="Vider les champs" style=" position: relative; height: 30px; width:30px; left: 300pX; padding:5px; margin-top:-10px;">
                                    <i data-feather='refresh-ccw'></i></button>


                                <div class="modal-body flex-grow-1">
                                    <!--- LIBELLE --->
                                    <div>
                                        <label class='form-label' for='libelle_modif'>Libellé (nom) du bâtiment</label>
                                        <input type='text' class='form-control dt-full-libelle' id='libelle_modif' name='libelle_modif' placeholder='Veuillez saisir le libellé du bâtiment' aria - Label='libelle' maxlength='75' />
                                    </div>
                                    <div class='mb-1'><small id='libelle_modifHelp' class='text-danger invisible'></small></div>

                                    <!--- TYPE_BATIMENT--->
                                    <div>
                                        <label class='form-label' for='type_batiment_modif'>Type de batiment</label>
                                        <select name='type_batiment_modif' id='type_batiment_modif' data-placeholder='Choisir le type de batiment...' Class='select2-icons form-select'>
                                            <option selected data-icon='facebook'>Choisir le type de batiment...</option>
                                            <?php
                                            foreach ($Liste_type_batiment as $type_batiment) {
                                            ?>
                                                <option value="<?= $type_batiment['id'] ?>">
                                                    <?= $type_batiment['libelle'] ?>
                                                </option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class='mb-1'><small id='type_batiment_modifHelp' class='text-danger invisible'></small></div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <!--- NOMBRE_APPARTEMENT --->
                                            <div class='mb-1'>
                                                <label class='form-label' for='nombre_appartement_modif'>Nombre d'appartements</label>

                                            </div>
                                            <div class='mb-1'><small id='nombre_appartement_modifHelp' class='text-danger invisible'></small></div>
                                        </div>
                                        <div class="input-group">
                                            <input class="touch_pin_input" id='nombre_appartement_modif' name='nombre_appartement_modif' type="text" value="0" data-bts-button-down-class="btn btn-primary" data-bts-button-up-class="btn btn-primary" max="999999" />
                                        </div>
                                    </div> <br>
                                    <div class="row">
                                        <div class="col-md-6 d-flex align-items-center justify-content-center">
                                            <!--- PARKING--->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="parking_modif" name="parking_modif" />
                                                <label class="form-check-label" for="parking_modif">Parking</label>
                                            </div>
                                            <div class='mb-1'><small id='parking_modifHelp' class='text-danger invisible'></small></div>
                                        </div>
                                        <div class="col-md-6 d-flex align-items-center justify-content-center">
                                            <!--- JARDIN --->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="jardin_modif" name="jardin_modif" />
                                                <label class="form-check-label" for="jardin_modif">Jardin</label>
                                            </div>
                                            <div class='mb-1'><small id='jardin_modifHelp' class='text-danger invisible'></small></div>
                                        </div>
                                    </div> <br>

                                    <div class="col-md-6 d-flex align-items-center justify-content-center">

                                        <!--- ASCENSEUR --->
                                        <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="ascenseur_modif" name="ascenseur_modif" />
                                                <label class="form-check-label" for="ascenseur_modif">Ascenseur</label>
                                        </div>
                                        <div class='mb-1'><small id='ascenseur_modifHelp' class='text-danger invisible'></small></div>
                                    </div> <br>


                                    <!--- PROPRIETAIRE --->
                                    <div>
                                        <label class='form-label' for='proprietaire_modif'>Proprietaire</label>
                                        <select name='proprietaire_modif' id='proprietaire_modif' data-placeholder='Veuillez saisir le nom du propriétaire' Class='select2-icons form-select'>
                                            <option selected data-icon='facebook'>Choisir le proprietaire...</Option>
                                            <?php
                                            foreach ($Liste_proprietaires as $proprietaire) {
                                            ?>
                                                <option value="<?= $proprietaire['id'] ?>">
                                                    <?= $proprietaire['nom_prenom'] ?>
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
                                    <div class='mb-1'><small id='proprietaire_modifHelp' class='text-danger invisible'></small></div>




                                    <!--- MONTANT --->
                                    <div class=''>
                                        <label class='form-label' for='cout_construction_modif'>Coût de la construction</label>
                                        <input type='text' class='form-control dt-cout_construction' id='cout_construction_modif' name='cout_construction_modif' aria - Label='cout_construction' maxlength='75' />
                                    </div>
                                    <div class='mb-1'><small id='cout_construction_modifHelp' class='text-danger invisible'></small></div>

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


    <?php include 'js/logiques/batiments_datatable.php' ?>
    <?php include 'js/logiques/batiments_logiques.php' ?>
    <?php include 'js/droits_access/gestion_DroitsAccess_Batiment.php' ?>
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
