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

       <!-- Incluez le JS de SlickGrid et de jQuery -->
       <!-- Incluez également le CSS de Bootstrap si vous utilisez les modales Bootstrap -->
       <title><?= APP_NAME ?> - Transaction mtn money</title>
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
       <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
       <?php
        //    include_once 'includes/headExcel.php' 
        ?>
   </head>
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
                               <h2 class="content-header-title float-start mb-0">Transactions Mtn Money</h2>
                               <div class="breadcrumb-wrapper">
                                   <ol class="breadcrumb">
                                       <li class="breadcrumb-item"><a href="index.php?page=home">Accueil</a>
                                       </li>
                                       <li class="breadcrumb-item"><a href="#">Structures</a>
                                       </li>
                                       <li class="breadcrumb-item active">mtn money
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
                                                                               
                                               <th>téléphone Client</th>
                                               <th>Montant</th>   
                                               <th> Nouveau Solde</th>
                                               <th>ID TRANSACTION</th>                                           
                                               <th>Actions</th>
                                           </tr>
                                       </thead>
                                   </table>
                               </div>

                           </div>
                       </div>
                       <!-- Modal to add new record -->
                       <!-- Modal to add new record -->
                       <div class="modal modal-slide-in fade" id="modals-slide-in">
                           <div class="modal-dialog sidebar-sm">
                               <form id="form_ajouter" name="form_ajouter" class="add-new-record modal-content pt-0" action="controllers/mtn_money_controller.php" method="POST">

                                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                   <div class="modal-header mb-1">
                                       <h5 class="modal-title" id="exampleModalLabel">Enregistrmement d'une nouvelle transaction MTN money</h5>
                                   </div>
                                   <button type="button" id="bt_vider" name="bt_vider" class="btn" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="bottom" class="avatar pull-up my-0" title="Vider les champs" style=" position: relative; height: 30px; width:30px; left: 300pX; padding:5px; margin-top:-10px;">
                                       <i data-feather='refresh-ccw'></i></button>
                                   <div class="modal-body flex-grow-1">
                                       <!--- NOM ET PRENOM OU RAISON SOCIALE --->

                                       <div>
                                           <label class='form-label' for='etablie_le'>Date</label>
                                           <input type='text' class='form-control dt-full-etablie_le' id='date_t' name='date_t' placeholder='La date' aria - Label='etablie_le' maxlength='75' />
                                       </div>
                                       <div class='mb-1'><small id='date_tHelp' class='text-danger invisible'></small></div>
                                                                   
                                            <div class="row mb-n2 pb-n2">
                                                    <div class="demo-inline-spacing">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="radio_type" id="radio_depot" checked  value="Dépot" />
                                                            <label class="form-check-label" for="radio_depot">Dépot</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="radio_type" id="radio_retrait" value="Retrait" />
                                                            <label class="form-check-label" for="radio_retrait">Retrait</label>
                                                        </div>
                                                    </div>
                                                    <div class='mb-1'><small id='typeHelp' class='text-danger invisible'></small></div>
                                            </div>
                                  
                                       <!-- COMPTE -->
                                       <div>
                                           <label class='form-label' for='compte_contribuable'>Téléphone</label>
                                           <input type='tel' class='form-control dt-full-compte_contribuable' id='tel_cli' name='tel_cli' placeholder="Veuillez saisir le numéro du client" aria - Label='compte_contribuable' maxlength='75' />
                                       </div>
                                       <div class='mb-1'><small id='tel_cliHelp' class='text-danger invisible'></small></div>

                                       <!--- EMAIL --->
                                       <div>
                                           <label class='form-label' for='nom_prenom'>Montant </label>
                                           <input type='text' class='form-control dt-full-nom_prenom' id='montant' name='montant' placeholder='Montant' aria - Label='nom_prenom' maxlength='75' />
                                       </div>
                                       <div class='mb-1'><small id='montantHelp' class='text-danger invisible'></small></div>
                                       <!--- FONCTION --->
                                       

                                       <div>
                                           <label class='form-label' for='nom_prenom'>Nouveau Solde </label>
                                           <input type='text' class='form-control dt-full-nom_prenom' id='solde_t' name='solde_t' placeholder='Solde Total' aria - Label='nom_prenom' maxlength='75' />
                                       </div>
                                       <div class='mb-1'><small id='solde_tHelp' class='text-danger invisible'></small></div>


                                       <div>
                                           <label class='form-label' for='nom_prenom'>ID Transaction  </label>
                                           <input type='text' class='form-control dt-full-nom_prenom' id='id_transaction' name='id_transaction' placeholder='Id Transaction' aria - Label='nom_prenom' maxlength='75' />
                                       </div>
                                       <div class='mb-1'><small id='id_transactionHelp' class='text-danger invisible'></small></div>
                                     

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
                               <form id="form_modif" name="form_modif" class="add-new-record modal-content pt-0" action="controllers/mtn_money_controller.php" method="POST">
                                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                   <div class="modal-header mb-1">
                                       <h5 class="modal-title" id="exampleModalLabel">Modification de la transaction mtn money </h5>
                                   </div>
                                   <button type="button" id="bt_vider" name="bt_vider" class="btn" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="bottom" class="avatar pull-up my-0" title="Vider les champs" style=" position: relative; height: 30px; width:30px; left: 300pX; padding:5px; margin-top:-10px;">
                                       <i data-feather='refresh-ccw'></i></button>
                                   <div class="modal-body flex-grow-1">
                                    
                                       <div>
                                           <label class='form-label' for='domicile'>Date</label>
                                           <input type='date' class='form-control dt-full-domicile' id='date_t_modif' name='date_t_modif' placeholder='Nom complet du locataire' aria - Label='domicile_modif' maxlength='75' />
                                       </div>
                                       <div class='mb-1'><small id='date_t_modifHelp' class='text-danger invisible'></small></div>

                                       <div class="row mb-n2 pb-n2">
                                                    <div class="demo-inline-spacing">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="radio_type_modif" id="radio_depot_modif" value="Dépot" />
                                                            <label class="form-check-label" for="radio_homme">Dépot</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="radio_type_modif" id="radio_retrait_modif" value="Retrait" />
                                                            <label class="form-check-label" for="radio_femme">Retrait</label>
                                                        </div>
                                                    </div>
                                                    <div class='mb-1'><small id='type_modifHelp' class='text-danger invisible'></small></div>
                                            </div>

                                       <div>
                                           <label class='form-label' for='compte_contribuable_modif'>Téléphone</label>
                                           <input type='tel' class='form-control dt-full-compte_contribuable' id='tel_cli_modif' name='tel_cli_modif' placeholder="Veuillez saisir le numéro téléphone" aria - Label='compte_contribuable_modif' maxlength='75' />
                                       </div>
                                       <div class='mb-1'><small id='tel_cli_modifHelp' class='text-danger invisible'></small></div>
                                                                       

                                       <!-- TELEPHONE -->
                                       <div>
                                           <label class='form-label' for='nom_prenom_modif'>Montant</label>
                                           <input type='text' class='form-control dt-full-nom_prenom' id='montant_modif' name='montant_modif' placeholder='Montant' aria - Label='nom_prenom_modif' maxlength='75' />
                                       </div>
                                       <div class='mb-1'><small id='montant_modifHelp' class='text-danger invisible'></small></div>


                                  <!--- SOLDE--->
                                  <div>
                                           <label class='form-label' for='nom_prenom_modif'>Nouveau Solde</label>
                                           <input type='text' class='form-control dt-full-nom_prenom' id='solde_t_modif' name='solde_t_modif' placeholder='Montant' aria - Label='nom_prenom_modif' maxlength='75' />
                                       </div>
                                       <div class='mb-1'><small id='solde_t_modifHelp' class='text-danger invisible'></small></div>


                                       <!--- ID TRANSACTION--->
                                       <div>
                                           <label class='form-label' for='nom_prenom_modif'>Id Transaction</label>
                                           <input type='text' class='form-control dt-full-nom_prenom' id='id_transaction_modif' name='id_transaction_modif' placeholder='Montant' aria - Label='nom_prenom_modif' maxlength='75' />
                                       </div>
                                       <div class='mb-1'><small id='id_transaction_modifHelp' class='text-danger invisible'></small></div>




                                       <!--- FONCTION --->

                                       <input type="hidden" id="idModif" name="idModif">

                                       <!--- ENREGISTREMENT --->
                                       <button type="submit" id='bt_modifier' name='bt_modifier' class='btn btn-primary enregistrer me-5'>Modifier</button>
                                       <button type='reset' id='bt_annuler' name='annuler' class='btn btn-outline-secondary' data-bs-dismiss='modal'>Annuler</button>

                                   </div>
                               </form>
                           </div>
                       </div>

                       <!--- formulaire d importation des fichiers csv , excel  --->

                       <div class="modal modal-slide-in fade" id="modal-import">
                           <div class="modal-dialog sidebar-sm">
                               <form id="form_ajouter" name="form_ajouter" class="add-new-record modal-content pt-0" action="" enctype="multipart/form-data" method="POST">

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
                                               <!-- <input type='file' class='form-control dt-montant_payermodif' name="fiche" id="fiche" accept=".xls, .xlsx, .csv" aria - Label='montant_payermodif' maxlength='75' /> -->
                                               <input type="file" id="input" maxlength='75' accept="application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" />
                                           </div>

                                           <div class=' mb-1'><small id='ficheHelp' class='text-danger invisible'></small>
                                           </div>
                                       </div>
                                       <!--- Modification --->
                                       <!-- Ajouter ce bouton dans votre formulaire où vous souhaitez l'afficher -->
                                       <button type="submit" id="open-modal" class="btn btn-primary">Afficher les données</button>

                                       <!-- <button type="submit" id='bt_import' name='bt_import' class='btn btn-primary enregistrer me-5' onclick="openModal()">Importer</button> -->
                                       <button type='reset' id='bt_annuler' name='annuler' class='btn btn-outline-secondary' data-bs-dismiss='modal'>Annuler</button>
                                   </div>
                               </form>
                           </div>
                       </div>

                       <?php include 'components/modal_proprietes.php' ?>
                       <?php include 'components/modal_excel.php' ?>


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

       <script src="http://ajax.aspnetcdn.com/ajax/modernizr/modernizr-2.8.3.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/PapaParse/5.3.0/papaparse.min.js"></script>
       <script src="http://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
       <script type="text/javascript" src="http://cdn-na.infragistics.com/igniteui/2023.1/latest/js/infragistics.core.js"></script>
       <script type="text/javascript" src="http://cdn-na.infragistics.com/igniteui/2023.1/latest/js/infragistics.lob.js"></script>
       <script type="text/javascript" src="http://cdn-na.infragistics.com/igniteui/2023.1/latest/js/modules/infragistics.ext_core.js"></script>
       <script type="text/javascript" src="http://cdn-na.infragistics.com/igniteui/2023.1/latest/js/modules/infragistics.ext_collections.js"></script>
       <script type="text/javascript" src="http://cdn-na.infragistics.com/igniteui/2023.1/latest/js/modules/infragistics.ext_text.js"></script>
       <script type="text/javascript" src="http://cdn-na.infragistics.com/igniteui/2023.1/latest/js/modules/infragistics.ext_io.js"></script>
       <script type="text/javascript" src="http://cdn-na.infragistics.com/igniteui/2023.1/latest/js/modules/infragistics.ext_ui.js"></script>
       <script type="text/javascript" src="http://cdn-na.infragistics.com/igniteui/2023.1/latest/js/modules/infragistics.documents.core_core.js"></script>
       <script type="text/javascript" src="http://cdn-na.infragistics.com/igniteui/2023.1/latest/js/modules/infragistics.ext_collectionsextended.js"></script>
       <script type="text/javascript" src="http://cdn-na.infragistics.com/igniteui/2023.1/latest/js/modules/infragistics.excel_core.js"></script>
       <script type="text/javascript" src="http://cdn-na.infragistics.com/igniteui/2023.1/latest/js/modules/infragistics.ext_threading.js"></script>
       <script type="text/javascript" src="http://cdn-na.infragistics.com/igniteui/2023.1/latest/js/modules/infragistics.ext_web.js"></script>
       <script type="text/javascript" src="http://cdn-na.infragistics.com/igniteui/2023.1/latest/js/modules/infragistics.xml.js"></script>
       <script type="text/javascript" src="http://cdn-na.infragistics.com/igniteui/2023.1/latest/js/modules/infragistics.documents.core_openxml.js"></script>
       <script type="text/javascript" src="http://cdn-na.infragistics.com/igniteui/2023.1/latest/js/modules/infragistics.excel_serialization_openxml.js"></script>
       <!-- <?php include 'js/flatpick_fr.js' ?>
     -->
       <?php include 'js/logiques/mtn_money_datatable.php' ?>
       <?php include 'js/logiques/mtn_money_logiques.php' ?>
       <?php include 'js/logiques/reporting_logiques.php' ?>
       <?php include 'js/logiques/moov_modal_logiques.php' ?>


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
   <style>
       table {
           width: 100%;
           border-collapse: collapse;
           margin-top: 20px;
       }

       th,
       td {
           /* border: 1px solid #ddd; */
           padding: 8px;
           text-align: left;
       }

       th {
           background-color: #f2f2f2;
       }

       tr:hover {
           background-color: #f5f5f5;
       }
   </style>