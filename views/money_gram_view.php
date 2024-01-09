<!-- Sécurité supplémentaire des pages, obligation de tooting via index-->
<?php
if (!isset($_SESSION["KaspyISS_user"])) {
    header("Location: index.php?page=login");
}
;
?>
<!-- End of the secure -->


<!DOCTYPE html>
<html class="loading" lang="fr" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <title>
        <?= APP_NAME ?> - Money Gram
    </title>

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

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


    <link rel="stylesheet" type="text/css" href="css/core/menu/menu-types/vertical-menu.css">

    <!-- Mes fichiers style CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<!-- END: Head-->


<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click"
    data-menu="vertical-menu-modern" data-col="">
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
                            <h2 class="content-header-title float-start mb-0">Transactions Money Gram</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php?page=home">Accueil</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Transactions</a>
                                    </li>
                                    <li class="breadcrumb-item active">Money Gram
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
                                            <th>Numero de reference</th>
                                            <th>code autorisation</th>
                                            <th>Id Utilisateur</th>                                        
                                             <th>id point vente </th>
                                            <th>Montant</th>
                                            <th>Frais</th>
                                            <th>Total</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>

                        </div>
                    </div>

                    <!-- Modal to add new record -->
                    <!-- <div class="modal modal-slide-in fade" id="modals-slide-in">
                        <div class="modal-dialog sidebar-sm">
                            <form id="form_ajouter" name="form_ajouter" class="add-new-record modal-content pt-0"
                                action="controllers/batiments_controller.php" method="POST">

                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close">×</button>
                                <div class="modal-header mb-1">
                                    <h5 class="modal-title" id="exampleModalLabel">Nouvelle transaction</h5>
                                </div>
                                <button type="button" id="bt_vider" name="bt_vider" class="btn" data-bs-toggle="tooltip"
                                    data-popup="tooltip-custom" data-bs-placement="bottom" class="avatar pull-up my-0"
                                    title="Vider les champs"
                                    style=" position: relative; height: 30px; width:30px; left: 300pX; padding:5px; margin-top:-10px;">
                                    <i data-feather='refresh-ccw'></i></button>


                                <div class="modal-body flex-grow-1"> -->
                    <!--- MONTANT --->
                    <!-- <div class=''>
                                        <label class='form-label' for='montant'>Montant transaction</label>
                                        <input type='text' class='form-control dt-montant' id='montant' name='montant'
                                            aria - Label='montant' maxlength='75' />
                                    </div>
                                    <div class='mb-1'><small id='montantHelp' class='text-danger invisible'></small>
                                    </div> -->

                    <!--- DATE TRANSACTION --->
                    <!-- <div class=''>
                                        <label class='form-label' for='date_transaction'>Date transaction</label>
                                        <input type='text' class='form-control dt-full-libelle' id='date_transaction'
                                            name='date_transaction' placeholder='Veuillez saisir le date_transaction'
                                            aria - Label='date_transaction' maxlength='75' />
                                    </div>
                                    <div class='mb-1'><small id='date_transactionHelp'
                                            class='text-danger invisible'></small></div> -->

                    <!--- NATURE --->
                    <!-- <div class=''>
                                        <label class='form-label' for='nature'>Nature de la transaction</label>
                                        <input type='text' class='form-control dt-nature' id='nature' name='nature' aria
                                            - Label='nature' maxlength='75' value="Money gram" readonly />
                                    </div>
                                    <div class='mb-1'><small id='natureHelp' class='text-danger invisible'></small>
                                    </div>
 -->

                    <!--- ENREGISTREMENT --->
                    <!-- <button type="submit" id='bt_enregistrer' name='bt_enregistrer'
                                        class='btn btn-primary enregistrer me-5'>Enregistrer</button>
                                    <button type='reset' id='bt_annuler' name='annuler'
                                        class='btn btn-outline-secondary' data-bs-dismiss='modal'>Annuler</button>

                                </div>
                            </form>
                        </div>
                    </div>  -->


                    <!-- Modal to update new record -->
                    <!-- <div class="modal modal-slide-in fade" id="modal-modif">
                        <div class="modal-dialog sidebar-sm">
                            <form id="form_modif" name="form_modif" class="add-new-record modal-content pt-0"
                                action="controllers/batiments_controller.php" method="POST">

                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close">×</button>
                                <div class="modal-header mb-1">
                                    <h5 class="modal-title" id="exampleModalLabel">Modifier une transaction
                                    </h5>
                                </div>
                                <button type="button" id="btn_vider" name="btn_vider" class="btn"
                                    data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="bottom"
                                    class="avatar pull-up my-0" title="Vider les champs"
                                    style=" position: relative; height: 30px; width:30px; left: 300pX; padding:5px; margin-top:-10px;">
                                    <i data-feather='refresh-ccw'></i></button>


                                <div class="modal-body flex-grow-1"> -->
                    <!--- MONTANT --->
                    <!-- <div class=''>
                                        <label class='form-label' for='montant_modif'>Montant transaction</label>
                                        <input type='text' class='form-control dt-montant_modif' id='montant_modif' name='montant_modif'
                                            aria - Label='montant_modif' maxlength='75' />
                                    </div>
                                    <div class='mb-1'><small id='montant_modifHelp' class='text-danger invisible'></small>
                                    </div> -->

                    <!--- DATE TRANSACTION --->
                    <!-- <div class=''>
                                        <label class='form-label' for='date_transaction_modif'>Date transaction</label>
                                        <input type='text' class='form-control dt-full-libelle' id='date_transaction_modif'
                                            name='date_transaction_modif' placeholder='Veuillez saisir le date_transaction_modif'
                                            aria - Label='date_transaction_modif' maxlength='75' />
                                    </div>
                                    <div class='mb-1'><small id='date_transaction_modifHelp'
                                            class='text-danger invisible'></small></div> -->

                    <!--- NATURE --->
                    <!-- <div class=''>
                                        <label class='form-label' for='nature_modif'>Nature de la transaction</label>
                                        <input type='text' class='form-control dt-nature_modif' id='nature_modif' name='nature_modif' aria
                                            - Label='nature_modif' maxlength='75' value="Money gram" readonly />
                                    </div>
                                    <div class='mb-1'><small id='nature_modifHelp' class='text-danger invisible'></small>
                                    </div>
     -->

                    <!--- ENREGISTREMENT --->
                    <!-- <button type="submit" id='bt_modifier' name='bt_modifier'
                                        class='btn btn-primary enregistrer me-5 '>Modifier</button>
                                    <button type='reset' id='bt_annuler' name='annuler'
                                        class='btn btn-outline-secondary' data-bs-dismiss='modal'>Annuler</button>

                                </div>
                            </form>
                        </div>
                    </div> -->

                    <!-- Modal pour IMPORTATION-->
                    <div class="modal fade" id="importationModal" tabindex="-1" aria-labelledby="importationLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="importationLabel">Importer votre fichier csv</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body" id="importation">
                                    Glisser et deposer votre fichier csv dans la fenetre.

                                    <img src="https://cdn-icons-png.flaticon.com/512/60/60746.png" alt="" width="100">

                                    <div id="file-name" style="margin-top: 10px;"></div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal" id="fermerBtn">Fermer</button>
                                    <button type="button" class="btn btn-primary" id="ChangerImport">Charger</button>
                                </div>
                            </div>
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


    <?php include 'js/logiques/money_gram_datatable.php' ?>
    <?php include 'js/logiques/money_gram_logiques.php' ?>
    <?php include 'js/droits_access/gestion_DroitsAccess_Batiment.php' ?>
  

    <script>
        $(window).on('load', function () {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            };
        });
    </script>


    <style>
        /* Styles pour les lignes cliquables */
        .datatable-clickable-row {
            cursor: pointer;
            transition: background-color 0.3s;
        }

        /* Effet de survol */
        .datatable-clickable-row:hover {
            background-color: #f0f0f0;
            /* Couleur de fond au survol */
        }

        #importation {
            display: flex;
            flex-direction: column;
            align-items: center;
            border: 10px dashed #ccc;
            padding: 20px;
            margin-top: 20px;
            transition: border 0.3s ease-in-out;
        }

        #importation img {
            margin-top: 10px;
        }

        /* #importation:hover{
            border-color: red;

        } */

        .dragover {
            border-color: red;
        }
    </style>

    </style>
</body>
<!-- END: Body-->

</html>