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
        <title>Changes - <?= APP_NAME ?> </title>

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
                                <h2 class="content-header-title float-start mb-0">Gestion des opérations changes</h2>
                                <div class="breadcrumb-wrapper">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php?page=home">Accueil</a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="#">Transactions</a>
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
                                                <th>Date</th>
                                                <th>Dévise</th>
                                                <th>Montant Apporté</th>
                                                <th>Taux de change </th>
                                                <th>Montant Perçu</th>
                                                <th>Client</th>
                                                <th>Telephone</th>
                                                <th>Adresse</th>
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
                                <form id="form_ajouter" name="form_ajouter" class="add-new-record modal-content pt-0" action="controllers/changes_controller.php" method="POST">

                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                    <div class="modal-header mb-1">
                                        <h5 class="modal-title" id="exampleModalLabel">Enregistrmement d'une nouvelle transaction</h5>
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
                                        <!--- TYPE --->
                                        <div class="row mb-n2 pb-n2">
                                            <div class="demo-inline-spacing">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="radio_type" id="radio_vente" value="Vente" checked />
                                                    <label class="form-check-label" for="radio_vente">Vente</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="radio_type" id="radio_achat" value="Achat" />
                                                    <label class="form-check-label" for="radio_achat">Achat</label>
                                                </div>

                                            </div>
                                            <div class='mb-1'><small id='typeHelp' class='text-danger invisible'></small></div>
                                        </div>
                                       <div>
                                            <!--- DEVISE --->
                                            <label class='form-label' for='contrat_bail'>Devise </label>
                                            <select name='devise' id='devise' data-placeholder="Choisir le type de carte..." Class='select2-icons form-select'>
                                                <option selected data-icon='facebook'>Choisir la dévise</Option>

                                                <option value="EURO">
                                                    EURO
                                                </option>

                                                <option value="USD">
                                                    USD
                                                </option>

                                                <option value="CHF">
                                                    CHF
                                                </option>
                                                <option value="GBP">
                                                    GBP
                                                </option>
                                                <option value="JPY">
                                                    JPY
                                                </option>
                                            </select>

                                        </div>
                                        <div class='mb-1'><small id='deviseHelp' class='text-danger invisible'></small></div>
                                        <!--- NOMS & PRENOMS --->
                                        <div>
                                            <label class='form-label' for='numero_telephone'>Client</label>
                                            <input type='text' class='form-control dt-full-numero_telephone' id='client' name='client' placeholder='Nom complet du client' aria - Label='numero_telephone' maxlength='75' />
                                        </div>
                                        <div class='mb-1'><small id='clientHelp' class='text-danger invisible'></small></div>

                                        <!---TELEPHONE --->
                                        <div>
                                            <label class='form-label' for='numero_telephone'>Téléphone</label>
                                            <input type='text' class='form-control dt-full-numero_telephone' id='telephone' name='telephone' placeholder='Telephone' aria - Label='numero_telephone' maxlength='75' />
                                        </div>
                                        <div class='mb-1'><small id='telephoneHelp' class='text-danger invisible'></small></div>

                                        <!--- MONTANT --->
                                        <div>
                                            <label class='form-label' for='email'>Montant</label>
                                            <input type='text' class='form-control dt-email' id='montant' name='montant' placeholder="Veuillez saisir le prix unitaire" aria - Label='email' maxlength='75' />
                                        </div>
                                        <div class='mb-1'><small id='montantHelp' class='text-danger invisible'></small></div>
                                        <!--- TAUX --->
                                        <div>
                                            <label class='form-label' for='compte_contribuable'>Taux de change</label>
                                            <input type='tel' class='form-control dt-full-compte_contribuable' id='taux' name='taux' placeholder="Veuillez saisir la taux" aria - Label='compte_contribuable' maxlength='75' />
                                        </div>
                                        <div class='mb-1'><small id='tauxHelp' class='text-danger invisible'></small></div>

                                        <!--- ADRESSE --->
                                        <div>
                                            <label class='form-label' for='compte_contribuable'>Adresse</label>
                                            <input type='text' class='form-control dt-full-compte_contribuable' id='adresse' name='adresse' placeholder="Veuillez saisir l'adresse" aria - Label='compte_contribuable' maxlength='75' />
                                        </div>
                                        <div class='mb-1'><small id='adresseHelp' class='text-danger invisible'></small></div>
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
                                <form id="form_modif" name="form_modif" class="add-new-record modal-content pt-0" action="controllers/changes_controller.php" method="POST">

                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                    <div class="modal-header mb-1">
                                        <h5 class="modal-title" id="exampleModalLabel">Modification de la transaction </h5>
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
                                        <div class="row mb-n2 pb-n2">
                                            <div class="demo-inline-spacing">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="radio_type_modif" id="radio_achat_modif" value="Achat" />
                                                    <label class="form-check-label" for="radio_achat_modif">Achat</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="radio_type_modif" id="radio_vente_modif" value="Vente" />
                                                    <label class="form-check-label" for="radio_vente_modif">Vente</label>
                                                </div>
                                            </div>
                                            <div class='mb-1'><small id='typeHelp' class='text-danger invisible'></small></div>
                                        </div>
                                        <div>
                                            <!--- DEVISE --->
                                            <label class='form-label' for='contrat_bail'>Devise </label>

                                            <select name='devise_modif' id='devise_modif' data-placeholder="Choisir le type de carte..." Class='select2-icons form-select'>
                                                <option selected data-icon='facebook'>Choisir la dévise</Option>

                                                <option value="EURO">
                                                    EURO
                                                </option>

                                                <option value="USD">
                                                    USD
                                                </option>

                                                <option value="CHF">
                                                    CHF
                                                </option>
                                                <option value="GBP">
                                                    GBP
                                                </option>
                                                <option value="JPY">
                                                    JPY
                                                </option>

                                            </select>

                                        </div>
                                        <div class='mb-1'><small id='devise_modifHelp' class='text-danger invisible'></small></div>
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

                                        <!--- DOMICILE --->
                                        <!-- COMPTE -->
                                        <!--- EMAIL --->
                                        <div>
                                            <label class='form-label' for='email'>Montant Envoyé</label>
                                            <input type='text' class='form-control dt-email' id='montant_modif' name='montant_modif' placeholder="Veuillez saisir le montant" aria - Label='email' maxlength='75' />
                                        </div>
                                        <div class='mb-1'><small id='montant_modifHelp' class='text-danger invisible'></small></div>
                                        <!--- FONCTION --->
                                        <div>
                                            <label class='form-label' for='compte_contribuable'>Taux de change</label>
                                            <input type='tel' class='form-control dt-full-compte_contribuable' id='taux_modif' name='taux_modif' placeholder="Veuillez saisir le taux" aria - Label='compte_contribuable' maxlength='75' />
                                        </div>
                                        <div class='mb-1'><small id='taux_modifHelp' class='text-danger invisible'></small></div>

                                        <div>
                                            <label class='form-label' for='compte_contribuable'>Adresse</label>
                                            <input type='text' class='form-control dt-full-compte_contribuable' id='adresse_modif' name='adresse_modif' placeholder="Veuillez saisir l'adresse" aria - Label='compte_contribuable' maxlength='75' />
                                        </div>
                                        <div class='mb-1'><small id='adresse_modifHelp' class='text-danger invisible'></small></div>
                                        <!--- ENREGISTREMENT --->
                                        <!--- ENREGISTREMENT --->
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

        <?php include 'includes/footer.php' ?>


        <?php include 'js/logiques/change_datatable.php' ?>
        <?php include 'js/logiques/change_logiques.php' ?>

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