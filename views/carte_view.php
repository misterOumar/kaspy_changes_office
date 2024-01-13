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
     <title><?= APP_NAME ?> - cartes</title>

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
                             <h2 class="content-header-title float-start mb-0">Gestion des cartes - Achats  </h2>
                             <div class="breadcrumb-wrapper">
                                 <ol class="breadcrumb">
                                     <li class="breadcrumb-item"><a href="index.php?page=home">Accueil</a>
                                     </li>
                                     <li class="breadcrumb-item"><a href="#">Comptabilité</a>
                                     </li>
                                     <li class="breadcrumb-item active">Achats de Cartes
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
                 <div class="row">
                     <div class="col-lg-3 col-sm-6">
                         <div class="card">
                             <div class="card-body d-flex align-items-center justify-content-between">
                                 <div>
                                     <h3 class="fw-bolder mb-75"><?= $nbre_cartes_vendu ?>/<?= $nbre_cartes ?></h3>
                                     <span>Nombre total des cartes</span>
                                 </div>
                                 <div class="avatar bg-light-success p-50">
                                     <span class="avatar-content">
                                         <i data-feather='target'></i>
                                     </span>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <?php
                        foreach ($stat_carte as $carte) {
                        ?>
                         <div class="col-lg-3 col-sm-6">
                             <div class="card">
                                 <div class="card-body d-flex align-items-center justify-content-between">
                                     <div>
                                         <h3 class="fw-bolder mb-75"><?= $carte['nombre_vendu'] ?>/<?= $carte['nombre_total'] ?></h3>
                                         <span>Carte <?= $carte['libelle'] ?></span>
                                     </div>
                                     <div class="avatar bg-light-info p-50">
                                         <span class="avatar-content">
                                             <i data-feather='credit-card'></i>
                                         </span>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     <?php
                        }
                        ?>


                 </div>
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
                                             <th>CUSTOMER ID </th>
                                             <th>DATE D'ACTIVATION</th>
                                             <th>DATE D'EXPIRATION</th>
                                             <th>TYPE DE CARTE </th>
                                             <th>STATUS</th>
                                             <th>ACTIONS</th>
                                         </tr>
                                     </thead>
                                 </table>
                             </div>

                         </div>
                     </div>
                     <!-- Modal to add new record -->
                     <div class="modal modal-slide-in fade" id="modals-slide-in">
                         <div class="modal-dialog sidebar-sm">
                             <form id="form_ajouter" name="form_ajouter" class="add-new-record modal-content pt-0" action="controllers/carte_controller.php" method="POST">

                                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                 <div class="modal-header mb-1">
                                     <h5 class="modal-title" id="exampleModalLabel">Création d'une nouvelle carte</h5>
                                 </div>
                                 <button type="button" id="bt_vider" name="bt_vider" class="btn" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="bottom" class="avatar pull-up my-0" title="Vider les champs" style=" position: relative; height: 30px; width:30px; left: 300pX; padding:5px; margin-top:-10px;">
                                     <i data-feather='refresh-ccw'></i></button>

                                 <div class="modal-body flex-grow-1">
                                     <!--- Customer Id --->
                                     <div>
                                         <label class='form-label' for='annees'>Customer Id</label>
                                         <input type='text' id='customer_id' class='form-control dt-full-annees' name='customer_id' placeholder="Veuillez saisir le customer id" aria - Label='annees' maxlength='75' />
                                     </div>
                                     <div class='mb-1'><small id='customer_idHelp' class='text-danger invisible'></small></div>

                                     <!--- DATE ACTIVATION --->
                                     <div>
                                         <label class='form-label' for='date_fin'>Date d'activation</label>
                                         <input type='text' id='date_enregistrement' class='form-control dt-full-date_fin flatpickr-basic' name='date_enregistrement' placeholder="YYYY-MM-DD" aria - Label='date_fin' maxlength='75' />
                                     </div>
                                     <div class='mb-1'><small id='date_enregistrementHelp' class='text-danger invisible'></small></div>

                                     <!--- DATE EXPIRATION --->
                                     <div>
                                         <label class='form-label' for='date_debut'>Date d'expiration</label>
                                         <input type='text' id='date_expiration' class='form-control dt-full-date_debut flatpickr-basic' name='date_expiration' placeholder="YYYY-MM-DD" aria - Label='date_debut' maxlength='75' />
                                     </div>
                                     <div class='mb-1'><small id='date_expirationHelp' class='text-danger invisible'></small></div>

                                     <!--- TYPE DE CARTE --->
                                     <div>
                                         <label class='form-label' for='contrat_bail'>Type de carte</label>

                                         <select name='type' id='type' data-placeholder="Choisir le type de carte..." Class='select2-icons form-select'>
                                             <option selected data-icon='facebook'>Choisir le type de carte</Option>
                                             <?php
                                                foreach ($List_types_cartes as $types) {
                                                ?>
                                                 <option value="<?= $types['libelle'] ?>">
                                                     <?= $types['libelle'] ?>
                                                 </option>
                                             <?php
                                                }
                                                ?>
                                         </select>

                                     </div>
                                     <div class='mb-1'><small id='typeHelp' class='text-danger invisible'></small></div>

                                     <!--- ENREGISTREMENT --->
                                     <button type="submit" id='bt_enregistrer' name='bt_enregistrer' class='btn btn-primary enregistrer me-1'>Enregistrer</button>
                                     <button type='reset' id='bt_annuler' name='annuler' class='btn btn-outline-secondary' data-bs-dismiss='modal'>Annuler</button>
                                 </div>
                             </form>
                         </div>
                     </div>


                     <!-- Modal de modification-->
                     <div class="modal modal-slide-in fade" id="modal-modif">
                         <div class="modal-dialog sidebar-sm">
                             <form id="form_modifier" name="form_modifier" class="add-new-record modal-content pt-0" action="controllers/carte_controller.php" method="POST">

                                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                 <div class="modal-header mb-1">
                                     <h5 class="modal-title" id="exampleModalLabel">Modification de nouvelle carte</h5>
                                 </div>
                                 <button type="button" id="bt_vider" name="bt_vider" class="btn" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="bottom" class="avatar pull-up my-0" title="Vider les champs" style=" position: relative; height: 30px; width:30px; left: 300pX; padding:5px; margin-top:-10px;">
                                     <i data-feather='refresh-ccw'></i></button>
                                 <div class="modal-body flex-grow-1">
                                     <div class="row">
                                         <!--- ANNEES --->
                                         <div class='mb-1'>
                                             <label class='form-label' for='annees'>Customer Id</label>
                                             <input type='text' id='customer_idmodif' class='form-control dt-full-annees' name='customer_idmodif' placeholder="Veuillez saisir le customer id" aria - Label='annees' maxlength='75' />
                                         </div>
                                         <div class='mb-1'><small id='customer_idmodifHelp' class='text-danger invisible'></small></div>


                                         <!--- DATE ACTIVATION --->
                                         <div class='mb-1'>
                                             <label class='form-label' for='date_fin'>Date d'activation</label>
                                             <input type='text' id='date_enregistrementmodif' class='form-control dt-full-date_fin flatpickr-basic' name='date_enregistrementmodif' placeholder="YYYY-MM-DD" aria - Label='date_fin' maxlength='75' />
                                         </div>
                                         <div class='mb-1'><small id='date_enregistrementmodifHelp' class='text-danger invisible'></small></div>
                                         <!--- DATE EXPIRATION --->
                                         <div class='mb-1'>
                                             <label class='form-label' for='date_debut'>Date d'expiration</label>
                                             <input type='text' id='date_expirationmodif' class='form-control dt-full-date_debut flatpickr-basic' name='date_expirationmodif' placeholder="YYYY-MM-DD" aria - Label='date_debut' maxlength='75' />
                                         </div>
                                         <div class='mb-1'><small id='date_expirationmodifHelp' class='text-danger invisible'></small></div>
                                         <!--- TYPE DE CARTE --->
                                         <div class='mb-1'>
                                             <label class='form-label' for='contrat_bail'>Choisir le type de carte</label>
                                             <select name='typemodif' id='typemodif' data-placeholder="Choisir le type de carte..." Class='select2-icons form-select'>
                                                 <option selected data-icon='facebook'>Choisir le type de carte</Option>
                                                 <?php
                                                    foreach ($List_types_cartes as $types) {
                                                    ?>
                                                     <option value="<?= $types['libelle'] ?>">
                                                         <?= $types['libelle'] ?>
                                                     </option>
                                                 <?php
                                                    }
                                                    ?>
                                             </select>
                                         </div>
                                         <div class='mb-1'><small id='typemodifHelp' class='text-danger invisible'></small></div>
                                     </div>
                                     <input type="hidden" id="idModif" name="idModif">
                                     <button type="submit" id='bt_modifier' name='bt_modifier' class='btn btn-primary enregistrer me-5'>Modifier</button>
                                     <button type='reset' id='bt_annuler' name='annuler' class='btn btn-outline-secondary' data-bs-dismiss='modal'>Annuler</button>
                                 </div>
                             </form>
                         </div>
                     </div>
                     <!-- Fin des modifications-->
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

     <?php include 'js/logiques/carte_datatable.php' ?>
     <?php include 'js/logiques/carte_logiques.php' ?>



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