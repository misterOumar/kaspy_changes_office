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
       <link rel="stylesheet" type="text/css" href="css/template/pages/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="css/template/forms/select2.min.css">

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
                               <h2 class="content-header-title float-start mb-0">Gestion des cartes - Ventes</h2>
                               <div class="breadcrumb-wrapper">
                                   <ol class="breadcrumb">
                                       <li class="breadcrumb-item"><a href="index.php?page=home">Accueil</a>
                                       </li>
                                       <li class="breadcrumb-item"><a href="#">Cartes Visa </a>
                                       </li>
                                       <li class="breadcrumb-item active">Vente de carte
                                       </li>
                                   </ol>
                               </div>
                           </div>
                       </div>
                   </div>
                   <!-- Include Menu toggle droit vraie-->
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
                                               <th>Date</th>
                                               <th>Client</th>
                                               <th>Telephone</th>
                                               <th>Carte</th>
                                               <th>N° CARTE </th>
                                               <th>Quantité</th>
                                               <th>Prix Unitaire</th>
                                               <th>Montant</th>
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
                               <form id="form_ajouter" name="form_ajouter" class="add-new-record modal-content pt-0" action="controllers/vente_carte_controller.php" method="POST">

                                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                   <div class="modal-header mb-1">
                                       <h5 class="modal-title" id="exampleModalLabel">Enregistrmement d'une nouvelle vente</h5>
                                   </div>
                                   <button type="button" id="bt_vider" name="bt_vider" class="btn" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="bottom" class="avatar pull-up my-0" title="Vider les champs" style=" position: relative; height: 30px; width:30px; left: 300pX; padding:5px; margin-top:-10px;">
                                       <i data-feather='refresh-ccw'></i></button>
                                   <div class="modal-body flex-grow-1">
                                       <!--- NOM ET PRENOM OU RAISON SOCIALE --->
                                       <div>
                                           <label class='form-label' for='etablie_le'>Date</label>
                                           <input type='text' class='form-control dt-full-etablie_le' id='date_v' name='date_v' placeholder='La date' aria - Label='etablie_le' maxlength='75' />
                                       </div>
                                       <div class='mb-1'><small id='date_vHelp' class='text-danger invisible'></small></div>
                                       <!--- NUMERO --->
                                       <!--- DOMICILE --->
                                       <!-- COMPTE -->
                                       <div>
                                           <label class='form-label' for='contrat_bail'>Choisir la carte</label>
                                           <select name='carte' id='carte' data-placeholder="Choisir la carte..." Class='select2-icons form-select'>
                                               <option selected data-icon='facebook'>Choisir la carte</Option>
                                               <?php
                                                foreach ($liste_type_cartes as $cartes) {
                                                ?>
                                                   <option value="<?= $cartes['type_carte'] ?>">
                                                       <?= $cartes['type_carte'] ?>
                                                   </option>
                                               <?php
                                                }
                                                ?>
                                           </select>
                                       </div>
                                       <div class='mb-1'><small id='carteHelp' class='text-danger invisible'></small></div>


                                       <div class="">
                                            <label class="form-label" for="num_carte">Le numero de la carte</label>
                                            <select class="select2 form-select select2-icons" name='num_carte' id='num_carte'>
                                               <option selected disabled hidden data-icon='facebook'>Choisir le numero</Option>

                                            <?php
                                                foreach ($List_cartes as $cartes) {
                                                ?>
                                                   <option value="<?= $cartes['customer_id'] ?>">
                                                       <?= $cartes['customer_id'] ?>
                                                   </option>
                                               <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                       <div class='mb-1'><small id='num_carteHelp' class='text-danger invisible'></small></div>


                                       <!--- EMAIL --->
                                       <div>
                                           <label class='form-label' for='numero_telephone'>Client</label>
                                           <input type='text' class='form-control dt-full-numero_telephone' id='client' name='client' placeholder='Nom complet du client' aria - Label='numero_telephone' maxlength='75' />
                                       </div>
                                       <div class='mb-1'><small id='clientHelp' class='text-danger invisible'></small></div>
                                       <div>
                                           <label class='form-label' for='numero_telephone'>Téléphone</label>
                                           <input type='text' class='form-control dt-full-numero_telephone' id='telephone' name='telephone' placeholder='Telephone' aria - Label='numero_telephone' maxlength='75' />
                                       </div>
                                       <div class='mb-1'><small id='telephoneHelp' class='text-danger invisible'></small></div>
                                       <div>
                                           <label class='form-label' for='email'>Prix Unitaire</label>
                                           <input type='text' class='form-control dt-email' id='prix_u' name='prix_u' placeholder="Veuillez saisir le prix unitaire" aria - Label='email' maxlength='75' />
                                       </div>
                                       <div class='mb-1'><small id='prix_uHelp' class='text-danger invisible'></small></div>

                                       <!--- FONCTION --->
                                       <div>
                                           <label class='form-label' for='compte_contribuable'>Quantité</label>
                                           <input type='tel' class='form-control dt-full-compte_contribuable' value="1" id='quantite' name='quantite' placeholder="Veuillez saisir la quantite" aria - Label='compte_contribuable' maxlength='75' />
                                       </div>
                                       <div class='mb-1'><small id='quantiteHelp' class='text-danger invisible'></small></div>

                                       <!--- ENREGISTREMENT --->
                                       <button type="submit" id='bt_enregistrer' name='bt_enregistrer' class='btn btn-primary enregistrer me-5'>Enregistrer</button>
                                       <button type='reset' id='bt_annuler' name='annuler' class='btn btn-outline-secondary' data-bs-dismiss='modal'>Annuler</button>

                                   </div>
                               </form>
                           </div>
                       </div>

                       <!-- Modal de modification-->
                       <!-- Modal to update new record -->
                       <div class="modal modal-slide-in fade" id="modal-modif">
                           <div class="modal-dialog sidebar-sm">
                               <form id="form_modif" name="form_modif" class="add-new-record modal-content pt-0" action="controllers/vente_carte_controller.php" method="POST">

                                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                   <div class="modal-header mb-1">
                                       <h5 class="modal-title" id="exampleModalLabel">Modification de la vente</h5>
                                   </div>
                                   <button type="button" id="bt_vider" name="bt_vider" class="btn" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="bottom" class="avatar pull-up my-0" title="Vider les champs" style=" position: relative; height: 30px; width:30px; left: 300pX; padding:5px; margin-top:-10px;">
                                       <i data-feather='refresh-ccw'></i></button>
                                   <div class="modal-body flex-grow-1">
                                       <!--- NOM ET PRENOM OU RAISON SOCIALE --->

                                       <div>
                                           <label class='form-label' for='etablie_le'>Date</label>
                                           <input type='text' class='form-control dt-full-etablie_le' id='date_vmodif' name='date_vmodif' placeholder='La date' aria - Label='etablie_le' maxlength='75' />
                                       </div>
                                       <div class='mb-1'><small id='date_vmodifHelp' class='text-danger invisible'></small></div>
                                       <!--- NUMERO --->
                                       <div>
                                           <label class='form-label' for='numero_telephone'>Client</label>
                                           <input type='text' class='form-control dt-full-numero_telephone' id='client_modif' name='client_modif' placeholder='Nom complet du client' aria - Label='numero_telephone' maxlength='75' />
                                       </div>
                                       <div class='mb-1'><small id='client_modifHelp' class='text-danger invisible'></small></div>
                                       <div>
                                           <label class='form-label' for='numero_telephone'>Telephone</label>
                                           <input type='text' class='form-control dt-full-numero_telephone' id='telephone_modif' name='telephone_modif' placeholder='Nom complet du client' aria - Label='numero_telephone' maxlength='75' />
                                       </div>
                                       <div class='mb-1'><small id='telephone_modifHelp' class='text-danger invisible'></small></div>



                                       <!-- COMPTE -->
                                       <div>
                                           <label class='form-label' for='contrat_bail'>Choisir la carte</label>
                                           <select name='carte_modif' id='carte_modif' data-placeholder="Choisir la carte..." Class='select2-icons form-select'>
                                               <option selected data-icon='facebook'>Choisir la carte</Option>
                                               <?php
                                                foreach ($List_cartes as $cartes) {
                                                ?>
                                                   <option value="<?= $cartes['type_carte'] ?>">
                                                       <?= $cartes['type_carte'] ?>
                                                   </option>
                                               <?php
                                                }
                                                ?>
                                           </select>
                                       </div>
                                       <div class='mb-1'><small id='carte_modifHelp' class='text-danger invisible'></small></div>

                                       <!--- EMAIL --->
                                       <div>
                                           <label class='form-label' for='email'>Prix Unitaire</label>
                                           <input type='text' class='form-control dt-email' id='prix_u_modif' name='prix_u_modif' placeholder="Veuillez saisir le prix unitaire" aria - Label='email' maxlength='75' />
                                       </div>
                                       <div class='mb-1'><small id='prix_u_modifHelp' class='text-danger invisible'></small></div>

                                       <!--- FONCTION --->
                                       <div>
                                           <label class='form-label' for='compte_contribuable'>Quantité</label>
                                           <input type='tel' class='form-control dt-full-compte_contribuable' id='quantite_modif' name='quantite_modif' placeholder="Veuillez saisir la quantite" aria - Label='compte_contribuable' maxlength='75' />
                                       </div>
                                       <div class='mb-1'><small id='quantite_modifHelp' class='text-danger invisible'></small></div>

                                       <!--- ENREGISTREMENT --->
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
       <script src="js/template/forms/select2.full.min.js"></script>
       <script src="js/template/forms/form-select2.js"></script>

       <!-- START: Footer-->
       <?php include 'includes/footer.php' ?>
       <!-- END: Footer-->

       <?php include 'js/logiques/vente_carte_datatable.php' ?>
       <?php include 'js/logiques/vente_carte_logiques.php' ?>

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