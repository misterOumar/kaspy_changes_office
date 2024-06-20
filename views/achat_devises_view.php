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
        <title>Achat des dévises - <?= APP_NAME ?> </title>

        <!-- Fichiers CSS par défaut (TEMPLATE) -->
        <?php include_once 'includes/head.php' ?>
        <!-- Fichier fenetre des differents Liste et journaux -->

        <!-- Fichiers CSS spécifiques a la page (TEMPLATE) -->
        <link rel="stylesheet" type="text/css" href="css/template/vendors.min.css">

        <link rel="stylesheet" type="text/css" href="css/plugins/tables/datatable/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" type="text/css" href="css/plugins/tables/datatable/responsive.bootstrap5.min.css">
        <link rel="stylesheet" type="text/css" href="css/plugins/tables/datatable/buttons.bootstrap5.min.css">

        <link rel="stylesheet" type="text/css" href="css/template/forms/pickers/form-flat-pickr.css">

        <link rel="stylesheet" type="text/css" href="css/core/menu/menu-types/vertical-menu.css">

        <link rel="stylesheet" type="text/css" href="css/template/forms/bs-stepper.min.css">
        <link rel="stylesheet" type="text/css" href="css/template/forms/form-wizard.css">

        <link rel="stylesheet" type="text/css" href="css/template/forms/select2.min.css">

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
                                <h2 class="content-header-title float-start mb-0">Gestion des achats de dévise</h2>
                                <div class="breadcrumb-wrapper">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php?page=home">Accueil</a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="#">Changes</a>
                                        </li>
                                        <li class="breadcrumb-item active">Achats de dévise
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
                                                <th>Nom & Prenom(s)</th>
                                                <th>Taux</th>
                                                <th>Montant brut </th>
                                                <th>Montant net </th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>

                            </div>
                        </div>



                        <!-- Modal to add new record -->
                        <div class="modal modal-slide-in fade" id="modals-slide-in">
                            <div class="modal-dialog sidebar" style="width: 40%;">
                                <div class="add-new-record modal-content pt-0">

                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                    <div class="modal-header mb-1">
                                        <h5 class="modal-title" id="exampleModalLabel">Enregistrement d'un achat de dévise</h5>
                                    </div>

                                    <div class="modal-body flex-grow-1">

                                        <!-- Modern Horizontal Wizard -->
                                        <section class="modern-horizontal-wizard">
                                            <div class="bs-stepper wizard-modern modern-wizard-example">
                                                <div class="bs-stepper-header">
                                                    <div class="step" data-target="#account-details-modern" role="tab" id="account-details-modern-trigger">
                                                        <button type="button" class="step-trigger">
                                                            <span class="bs-stepper-box">
                                                                <i data-feather="user" class="font-medium-3"></i>
                                                            </span>
                                                            <span class="bs-stepper-label">
                                                                <span class="bs-stepper-title">Client</span>
                                                                <span class="bs-stepper-subtitle">Informations sur le client</span>
                                                            </span>
                                                        </button>
                                                    </div>

                                                    <div class="line">
                                                        <i data-feather="chevron-right" class="font-medium-2"></i>
                                                    </div>
                                                    <div class="step" data-target="#social-links-modern" role="tab" id="social-links-modern-trigger">
                                                        <button type="button" class="step-trigger">
                                                            <span class="bs-stepper-box">
                                                                <i data-feather="link" class="font-medium-3"></i>
                                                            </span>
                                                            <span class="bs-stepper-label">
                                                                <span class="bs-stepper-title">Facturation</span>
                                                                <span class="bs-stepper-subtitle">Add Social Links</span>
                                                            </span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="bs-stepper-content">
                                                    <div id="account-details-modern" class="content" role="tabpanel" aria-labelledby="account-details-modern-trigger">
                                                        <div class="content-header d-flex align-items-center justify-content-between">
                                                            <div>
                                                                <h5 class="mb-0">Client</h5>
                                                                <small class="text-muted">Informations sur le client</small>

                                                            </div>

                                                            <button type="button" id="bt_vider" name="bt_vider" class="btn" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="bottom" class="avatar pull-up my-0" title="Vider les champs" style=" position: relative; height: 30px; width:30px;  padding:5px;">
                                                                <i data-feather='refresh-ccw'></i></button>
                                                        </div>

                                                        <!--- CHOIX DU CLIENT --->
                                                        <div class="mb-2">
                                                            <label class='form-label' for='choix_client'>Client</label>
                                                            <select name='choix_client' id='choix_client' data-placeholder='Choisir le client' Class='select2 select2-icons form-select'>
                                                                <option selected data-icon='facebook'>Choisir le client</Option>
                                                                <?php foreach ($clients as $client) { ?>
                                                                    <option value=<?= $client['numero_de_piece'] ?>><?= $client['nom'] ?> </option>
                                                                <?php } ?>

                                                            </select>
                                                        </div>
                                                        <form name="form_client" id="form_client">


                                                            <div class="row">

                                                                <!--- CIVILITE --->
                                                                <div class="col-md-6">
                                                                    <div>
                                                                        <label class='form-label' for='civilite'>Civilité</label>
                                                                        <select name='civilite' id='civilite' data-placeholder='Choisir...' Class='form-select'>
                                                                            <option selected data-icon='facebook'>Choisir...</Option>
                                                                            <option>Monsieur </option>
                                                                            <option>Madame</option>
                                                                            <option>Mademoiselle</option>
                                                                            <option>Entreprise</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class='mb-1'><small id='civiliteHelp' class='text-danger invisible'></small></div>
                                                                </div>

                                                                <!--- TYPE --->
                                                                <div class="col-md-6">
                                                                    <div>
                                                                        <label class='form-label' for='type'>Type de client</label>
                                                                        <select name='type' id='type' data-placeholder='Choisir...' Class='form-select'>
                                                                            <option selected data-icon='facebook'>Choisir...</Option>
                                                                            <option>Clientèle</option>
                                                                            <option>Intermediare agrée</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class='mb-1'><small id='typeHelp' class='text-danger invisible'></small></div>
                                                                </div>
                                                            </div>

                                                            <!--- NOMS & PRENOMS --->
                                                            <div>
                                                                <label class='form-label' for='nom_prenom'>Nom & Prénom(s) du client</label>
                                                                <input type='text' class='form-control dt-full-numero_telephone' id='nom_prenom' name='nom_prenom' placeholder='Nom & prénom(s)' aria - Label='numero_telephone' maxlength='75' />
                                                            </div>
                                                            <div class='mb-1'><small id='nom_prenomHelp' class='text-danger invisible'></small></div>

                                                            <div class="row">

                                                                <!--- TYPE DE PIECE --->
                                                                <div class="col-md-6">
                                                                    <div>
                                                                        <label class='form-label' for='type_piece'>Type de pièce</label>
                                                                        <select name='type_piece' id='type_piece' data-placeholder='Choisir...' Class=' form-select'>
                                                                            <option selected data-icon='facebook'>Choisir...</Option>
                                                                            <?php foreach ($types_piece as $type_piece) { ?>
                                                                                <option><?= $type_piece['libelle'] ?> </option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class='mb-1'><small id='type_pieceHelp' class='text-danger invisible'></small></div>
                                                                </div>

                                                                <!--- NUMERO DE PIECE --->
                                                                <div class="col-md-6">
                                                                    <div>
                                                                        <label class='form-label' for='numero_piece'>Numéro de pièce</label>
                                                                        <input type='text' class='form-control dt-full-numero_telephone' id='numero_piece' name='numero_piece' placeholder='CI00225' maxlength='75' />
                                                                    </div>
                                                                    <div class='mb-1'><small id='numero_pieceHelp' class='text-danger invisible'></small></div>
                                                                </div>
                                                            </div>

                                                            <div class="row">

                                                                <!---TELEPHONE --->
                                                                <div class="col-md-6">
                                                                    <div>
                                                                        <label class='form-label' for='telephone'>Téléphone</label>
                                                                        <input type='text' class='form-control ' id='telephone' name='telephone' placeholder='Telephone' maxlength='75' />
                                                                    </div>
                                                                    <div class='mb-1'><small id='telephoneHelp' class='text-danger invisible'></small></div>

                                                                </div>

                                                                <!---EMAIL --->
                                                                <div class="col-md-6">
                                                                    <div>
                                                                        <label class='form-label' for='email'>Email</label>
                                                                        <input type='text' class='form-control ' id='email' name='email' placeholder='email@exemple.com' maxlength='75' />
                                                                    </div>
                                                                    <div class='mb-1'><small id='emailHelp' class='text-danger invisible'></small></div>
                                                                </div>
                                                            </div>

                                                            <!--- ADRESSE --->
                                                            <div>
                                                                <label class='form-label' for='adresse'>Adresse</label>
                                                                <input type='text' class='form-control dt-full-compte_contribuable' id='adresse' name='adresse' placeholder="Veuillez saisir l'adresse" aria - Label='compte_contribuable' maxlength='75' />
                                                            </div>
                                                            <div class='mb-1'><small id='adresseHelp' class='text-danger invisible'></small></div>

                                                            <input type="hidden" id="idModif" name="idModif" value="0">


                                                        </form>


                                                        <div class="d-flex justify-content-between">
                                                            <button class="btn btn-outline-secondary btn-prev" disabled>
                                                                <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                                                <span class="align-middle d-sm-inline-block d-none">Précédent</span>
                                                            </button>
                                                            <button class="btn btn-primary btn-next " id="btn-suivant">
                                                                <span class="align-middle d-sm-inline-block d-none">Suivant</span>
                                                                <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                                            </button>
                                                        </div>
                                                    </div>


                                                    <div id="social-links-modern" class="content" role="tabpanel" aria-labelledby="social-links-modern-trigger">
                                                        <div class="content-header">
                                                            <h5 class="mb-0">Facturation</h5>
                                                            <small>Entrer les informations de la facturation.</small>
                                                        </div>

                                                        <form id="form_facturation" name="form_facturation">

                                                            <!--- DATE --->
                                                            <div class="mb-1">
                                                                <label class='form-label' for='date_achat'>Date</label>
                                                                <input type='text' class='form-control' id='date_achat' name='date_achat' />
                                                            </div>

                                                            <div class="row">

                                                                <!--- DEVISE --->
                                                                <div class="col-md-6">
                                                                    <div>
                                                                        <label class='form-label' for='devise'>Dévise</label>
                                                                        <select name='devise' id='devise' data-placeholder='Choisir...' class=' form-select'>
                                                                            <option selected data-icon='facebook'>Choisir...</Option>
                                                                            <?php foreach ($devises as $devise) { ?>
                                                                                <option><?= $devise['libelle'] ?> </option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class='mb-1'><small id='deviseHelp' class='text-danger invisible'></small></div>
                                                                </div>

                                                                <!--- MODE DE REGLEMENT --->
                                                                <div class="col-md-6">
                                                                    <div>
                                                                        <label class='form-label' for='mode_reglement'>Mode de réglement</label>
                                                                        <select name='mode_reglement' id='mode_reglement' data-placeholder='Choisir...' class=' form-select'>                                                                           
                                                                            <option>Espèces</option>
                                                                            <option>Cheque</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class='mb-1'><small id='mode_reglementHelp' class='text-danger invisible'></small></div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <!--- QUANTITE --->
                                                                <div class="col-md-4">
                                                                    <div>
                                                                        <label class='form-label' for='quantite'>Quantité</label>
                                                                        <input type='text' class='form-control' id='quantite' name='quantite'  maxlength='75' />
                                                                    </div>
                                                                    <div class='mb-1'><small id='quantiteHelp' class='text-danger invisible'></small></div>
                                                                </div>

                                                                <!--- CONVERTISSEUR --->
                                                                <div class="col-md-2">
                                                                    <div>
                                                                        <label class='form-label' for=''> Convertir </label>
                                                                        <button type="button" class="btn btn-icon rounded-circle btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modal_convertisseur">
                                                                            <i data-feather='minimize-2'></i>
                                                                        </button>
                                                                    </div>
                                                                </div>

                                                                <!--- TAUX ACHAT --->
                                                                <div class="col-md-6">
                                                                    <div>
                                                                        <label class='form-label' for='taux_achat'>Taux à l'achat</label>
                                                                        <input type='text' class='form-control' id='taux_achat' name='taux_achat' placeholder="650" maxlength='75' />
                                                                    </div>
                                                                    <div class='mb-1'><small id='taux_achatHelp' class='text-danger invisible'></small></div>
                                                                </div>
                                                            </div>

                                                            <!--- REMISE --->
                                                            <div class="col-md-6">
                                                                <div>
                                                                    <label class='form-label' for='remise'>Remise</label>
                                                                    <input type='text' class='form-control' id='remise' name='remise' value="0" maxlength='75' />
                                                                </div>
                                                                <div class='mb-1'><small id='remiseHelp' class='text-danger invisible'></small></div>
                                                            </div>
                                                            <hr>


                                                            <div class="row">
                                                                <!--- TOTAL BRUT --->
                                                                <div class="col-md-6">
                                                                    <div>
                                                                        <label class='form-label' for='total_brut'>Total Brut</label>
                                                                        <input type='text' class='form-control bg-light-info fw-bold' id='total_brut' name='total_brut' placeholder="650" maxlength='75' />
                                                                    </div>
                                                                    <div class='mb-1'><small id='total_brutHelp' class='text-danger invisible'></small></div>
                                                                </div>

                                                                <!--- TOTAL NET --->
                                                                <div class="col-md-6">
                                                                    <div>
                                                                        <label class='form-label' for='total_net'>Total Net</label>
                                                                        <input type='text' class='form-control bg-light-info fw-bold' id='total_net' name='total_net' placeholder="650" maxlength='75' />
                                                                    </div>
                                                                    <div class='mb-1'><small id='total_netHelp' class='text-danger invisible'></small></div>
                                                                </div>
                                                            </div>


                                                            <!--- OBSERVATION --->
                                                            <div class="mb-1">
                                                                <label class="form-label" for="observation">Observation</label>
                                                                <textarea class="form-control" id="observation" name="observation" rows="3" placeholder="Observation ..."></textarea>
                                                            </div>
                                                        </form>



                                                        <div class="d-flex justify-content-between">
                                                            <button class="btn btn-primary btn-prev">
                                                                <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                                                <span class="align-middle d-sm-inline-block d-none">Précédent</span>
                                                            </button>
                                                            <button type="submit" id='bt_enregistrer' name='bt_enregistrer' class="btn btn-success ">Enregistrer</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                        <!-- /Modern Horizontal Wizard -->


                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal de modification-->
                        <div class="modal modal-slide-in fade" id="modal-modif">
                            <div class="modal-dialog sidebar" style="width: 40%;">
                                <div class="add-new-record modal-content pt-0">

                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                    <div class="modal-header mb-1">
                                        <h5 class="modal-title" id="exampleModalLabelModif">Modification de l'achat de dévise </h5>
                                    </div>
                                    <div class="modal-body flex-grow-1">

                                        <!-- Modern Horizontal Wizard -->
                                        <section class="modern-horizontal-wizard">
                                            <div class="bs-stepper horizontal wizard-modern modern-vertical-wizard-example">
                                                <div class="bs-stepper-header">
                                                    <div class="step" data-target="#stepper-client-modif" role="tab" id="stepper-client-modif-trigger">
                                                        <button type="button" class="step-trigger">
                                                            <span class="bs-stepper-box">
                                                                <i data-feather="user" class="font-medium-3"></i>
                                                            </span>
                                                            <span class="bs-stepper-label">
                                                                <span class="bs-stepper-title">Client</span>
                                                                <span class="bs-stepper-subtitle">Informations sur le client</span>
                                                            </span>
                                                        </button>
                                                    </div>

                                                    <div class="line">
                                                        <i data-feather="chevron-right" class="font-medium-2"></i>
                                                    </div>
                                                    <div class="step" data-target="#stepper-facturation-modif" role="tab" id="stepper-facturation-modif-trigger">
                                                        <button type="button" class="step-trigger">
                                                            <span class="bs-stepper-box">
                                                                <i data-feather="link" class="font-medium-3"></i>
                                                            </span>
                                                            <span class="bs-stepper-label">
                                                                <span class="bs-stepper-title">Facturation</span>
                                                                <span class="bs-stepper-subtitle">Add Social Links</span>
                                                            </span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="bs-stepper-content">
                                                    <div id="stepper-client-modif" class="content" role="tabpanel" aria-labelledby="stepper-client-modif-trigger">
                                                        <div class="content-header">
                                                            <h5 class="mb-0">Client</h5>
                                                            <small class="text-muted">Informations sur le client</small>                                                    
                                                        </div>

                                                     

                                                        <form name="form_client_modif" id="form_client_modif">


                                                            <div class="row">

                                                                <!--- CIVILITE --->
                                                                <div class="col-md-6">
                                                                    <div>
                                                                        <label class='form-label' for='civilite_modif'>Civilité</label>
                                                                        <select name='civilite_modif' id='civilite_modif' data-placeholder='Choisir...' Class=' select2-icons form-select'>
                                                                            <option selected data-icon='facebook'>Choisir...</Option>
                                                                            <option>Monsieur </option>
                                                                            <option>Madame</option>
                                                                            <option>Mademoiselle</option>
                                                                            <option>Entreprise</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class='mb-1'><small id='civilite_modifHelp' class='text-danger invisible'></small></div>
                                                                </div>

                                                                <!--- TYPE --->
                                                                <div class="col-md-6">
                                                                    <div>
                                                                        <label class='form-label' for='type_modif'>Type de client</label>
                                                                        <select name='type_modif' id='type_modif' data-placeholder='Choisir...' Class=' select2-icons form-select'>
                                                                            <option selected data-icon='facebook'>Choisir...</Option>
                                                                            <option>Clientèle</option>
                                                                            <option>Intermediare agrée</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class='mb-1'><small id='type_modifHelp' class='text-danger invisible'></small></div>
                                                                </div>
                                                            </div>

                                                            <!--- NOMS & PRENOMS --->
                                                            <div>
                                                                <label class='form-label' for='nom_prenom_modif'>Nom & Prénom(s) du client</label>
                                                                <input type='text' class='form-control dt-full-numero_telephone' id='nom_prenom_modif' name='nom_prenom_modif' placeholder='Nom & prénom(s)' aria - Label='numero_telephone' maxlength='75' />
                                                            </div>
                                                            <div class='mb-1'><small id='nom_prenom_modifHelp' class='text-danger invisible'></small></div>

                                                            <div class="row">

                                                                <!--- TYPE DE PIECE --->
                                                                <div class="col-md-6">
                                                                    <div>
                                                                        <label class='form-label' for='type_piece_modif'>Type de pièce</label>
                                                                        <select name='type_piece_modif' id='type_piece_modif' data-placeholder='Choisir...' Class=' select2-icons form-select'>
                                                                            <option selected data-icon='facebook'>Choisir...</Option>
                                                                            <?php foreach ($types_piece as $type_piece) { ?>
                                                                                <option><?= $type_piece['libelle'] ?> </option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class='mb-1'><small id='type_piece_modifHelp' class='text-danger invisible'></small></div>
                                                                </div>

                                                                <!--- NUMERO DE PIECE --->
                                                                <div class="col-md-6">
                                                                    <div>
                                                                        <label class='form-label' for='numero_piece_modif'>Numéro de pièce</label>
                                                                        <input type='text' class='form-control dt-full-numero_telephone' id='numero_piece_modif' name='numero_piece_modif' placeholder='CI00225' maxlength='75' />
                                                                    </div>
                                                                    <div class='mb-1'><small id='numero_piece_modifHelp' class='text-danger invisible'></small></div>
                                                                </div>
                                                            </div>

                                                            <div class="row">

                                                                <!---TELEPHONE --->
                                                                <div class="col-md-6">
                                                                    <div>
                                                                        <label class='form-label' for='telephone_modif'>Téléphone</label>
                                                                        <input type='text' class='form-control ' id='telephone_modif' name='telephone_modif' placeholder='Telephone' maxlength='75' />
                                                                    </div>
                                                                    <div class='mb-1'><small id='telephone_modifHelp' class='text-danger invisible'></small></div>

                                                                </div>

                                                                <!---EMAIL --->
                                                                <div class="col-md-6">
                                                                    <div>
                                                                        <label class='form-label' for='email_modif'>Email</label>
                                                                        <input type='text' class='form-control ' id='email_modif' name='email_modif' placeholder='email@exemple.com' maxlength='75' />
                                                                    </div>
                                                                    <div class='mb-1'><small id='email_modifHelp' class='text-danger invisible'></small></div>
                                                                </div>
                                                            </div>

                                                            <!--- ADRESSE --->
                                                            <div>
                                                                <label class='form-label' for='adresse_modif'>Adresse</label>
                                                                <input type='text' class='form-control dt-full-compte_contribuable' id='adresse_modif' name='adresse_modif' placeholder="Veuillez saisir l'adresse" aria - Label='compte_contribuable' maxlength='75' />
                                                            </div>
                                                            <div class='mb-1'><small id='adresse_modifHelp' class='text-danger invisible'></small></div>

                                                            <input type="hidden" id="id_client_modif" name="id_client_modif" >


                                                        </form>


                                                        <div class="d-flex justify-content-between">
                                                            <button class="btn btn-outline-secondary btn-prev" disabled>
                                                                <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                                                <span class="align-middle d-sm-inline-block d-none">Précédent</span>
                                                            </button>
                                                            <button class="btn btn-primary btn-next " id="btn-suivant-modif">
                                                                <span class="align-middle d-sm-inline-block d-none">Suivant</span>
                                                                <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                                            </button>
                                                        </div>
                                                    </div>


                                                    <div id="stepper-facturation-modif" class="content" role="tabpanel" aria-labelledby="stepper-facturation-modif-trigger">
                                                        <div class="content-header">
                                                            <h5 class="mb-0">Facturation</h5>
                                                            <small>Entrer les informations de la facturation.</small>
                                                        </div>

                                                        <form id="form_facturation_modif" name="form_facturation_modif">

                                                            <!--- DATE --->
                                                            <div class="mb-1">
                                                                <label class='form-label' for='date_achat_modif'>Date</label>
                                                                <input type='text' class='form-control' id='date_achat_modif' name='date_achat_modif' />
                                                            </div>

                                                            <div class="row">

                                                                <!--- DEVISE --->
                                                                <div class="col-md-6">
                                                                    <div>
                                                                        <label class='form-label' for='devise_modif'>Dévise</label>
                                                                        <select name='devise_modif' id='devise_modif' data-placeholder='Choisir...' Class=' select2-icons form-select'>
                                                                            <option selected data-icon='facebook'>Choisir...</Option>
                                                                            <?php foreach ($devises as $devise) { ?>
                                                                                <option><?= $devise['libelle'] ?> </option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class='mb-1'><small id='deviseHelp' class='text-danger invisible'></small></div>
                                                                </div>

                                                                <!--- MODE DE REGLEMENT --->
                                                                <div class="col-md-6">
                                                                    <div>
                                                                        <label class='form-label' for='mode_reglement_modif'>Mode de réglement</label>
                                                                        <select name='mode_reglement_modif' id='mode_reglement_modif' data-placeholder='Choisir...' Class=' select2-icons form-select'>
                                                                            <option selected data-icon='facebook'>Choisir...</Option>
                                                                            <option>Espèces</option>
                                                                            <option>Cheque</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class='mb-1'><small id='mode_reglement_modifHelp' class='text-danger invisible'></small></div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <!--- QUANTITE --->
                                                                <div class="col-md-6">
                                                                    <div>
                                                                        <label class='form-label' for='quantite_modif'>Quantité</label>
                                                                        <input type='text' class='form-control' id='quantite_modif' name='quantite_modif' placeholder="1" maxlength='75' />
                                                                    </div>
                                                                    <div class='mb-1'><small id='quantite_modifHelp' class='text-danger invisible'></small></div>
                                                                </div>

                                                                <!--- TAUX ACHAT --->
                                                                <div class="col-md-6">
                                                                    <div>
                                                                        <label class='form-label' for='taux_achat_modif'>Taux à l'achat</label>
                                                                        <input type='text' class='form-control' id='taux_achat_modif' name='taux_achat_modif' placeholder="650" maxlength='75' />
                                                                    </div>
                                                                    <div class='mb-1'><small id='taux_achat_modifHelp' class='text-danger invisible'></small></div>
                                                                </div>
                                                            </div>

                                                            <!--- REMISE --->
                                                            <div class="col-md-6">
                                                                <div>
                                                                    <label class='form-label' for='remise_modif'>Remise</label>
                                                                    <input type='text' class='form-control' id='remise_modif' name='remise_modif' value="0" maxlength='75' />
                                                                </div>
                                                                <div class='mb-1'><small id='remise_modifHelp' class='text-danger invisible'></small></div>
                                                            </div>

                                                            <div class="row">
                                                                <!--- TOTAL BRUT --->
                                                                <div class="col-md-6">
                                                                    <div>
                                                                        <label class='form-label' for='total_brut_modif'>Total Brut</label>
                                                                        <input type='text' class='form-control' id='total_brut_modif' name='total_brut_modif' placeholder="650" maxlength='75' />
                                                                    </div>
                                                                    <div class='mb-1'><small id='total_brut_modifHelp' class='text-danger invisible'></small></div>
                                                                </div>

                                                                <!--- TOTAL NET --->
                                                                <div class="col-md-6">
                                                                    <div>
                                                                        <label class='form-label' for='total_net_modif'>Total Net</label>
                                                                        <input type='text' class='form-control' id='total_net_modif' name='total_net_modif' placeholder="650" maxlength='75' />
                                                                    </div>
                                                                    <div class='mb-1'><small id='total_net_modifHelp' class='text-danger invisible'></small></div>
                                                                </div>
                                                            </div>                                                           


                                                            <!--- OBSERVATION --->
                                                            <div class="mb-1">
                                                                <label class="form-label" for="observation_modif">Observation</label>
                                                                <textarea class="form-control" id="observation_modif" name="observation_modif" rows="3" placeholder="Observation ..."></textarea>
                                                            </div>

                                                            <input type="hidden" id="id_achat_modif" name="id_achat_modif" >

                                                        </form>



                                                        <div class="d-flex justify-content-between">
                                                            <button class="btn btn-primary btn-prev">
                                                                <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                                                <span class="align-middle d-sm-inline-block d-none">Précédent</span>
                                                            </button>
                                                            <button type="submit" id='bt_modifier' name='bt_modifier' class="btn btn-success ">Modifier</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                        <!-- /Modern Horizontal Wizard -->







                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Fin des modifications-->

                        <!-- Modal CONVERTISSEUR -->
                        <div class="modal fade modal-info text-start" id="modal_convertisseur" tabindex="-1" aria-labelledby="myModalLabel130" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel130">Convertisseur de dévise</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <!--- DEVISE --->
                                        <div class="mb-1">
                                            <label class='form-label' for='devise_conversion'>Dévise</label>
                                            <select name='devise_conversion' id='devise_conversion' data-placeholder='Choisir...' Class=' select2-icons form-select'>
                                                <option selected data-icon='facebook'>Choisir...</Option>
                                                <?php foreach ($devises as $devise) { ?>
                                                    <option><?= $devise['libelle'] ?> </option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <!--- TAUX ACHAT --->
                                        <div class="mb-1">
                                            <label class='form-label' for='taux_achat_conversion'>Taux à l'achat</label>
                                            <input type='text' class='form-control' id='taux_achat_conversion' name='taux_achat_conversion' placeholder="650" maxlength='75' />

                                        </div>

                                        <!--- MONTANT --->
                                        <div class="mb-1">
                                            <label class='form-label' for='montant_conversion'>Montant à convertir</label>
                                            <input type='text' class='form-control' id='montant_conversion' name='montant_conversion' placeholder="1" maxlength='75' />
                                        </div>


                                        <!--- ARRONDIR --->
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="arrondir_conversion" name="arrondir_conversion" />
                                            <label class="form-check-label" for="arrondir_conversion">Arrondir le résultat</label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" id="bt_convertir" class="btn btn-info" data-bs-dismiss="modal">Convertir </button>
                                    </div>
                                </div>
                            </div>
                        </div>

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

        <!--<script src="js/template/ui/jquery.sticky.js"></script> -->
        <script src="js/template/forms/spinner/jquery.bootstrap-touchspin.js"></script>
        <script src="js/template/forms/form-number-input.js"></script>

        <!-- BEGIN: FICHIERS JS DES PAGES -->


        <script src="js/template/app.js"></script>
        <script src="js/template/app-menu.js"></script>

        <script src="js/template/forms/wizard/bs-stepper.min.js"></script>
        <script src="js/template/forms/form-wizard.js"></script>

        <!-- START: Footer-->
        <?php include 'includes/footer.php' ?>
        <!-- END: Footer-->

        <script src="http://ajax.aspnetcdn.com/ajax/modernizr/modernizr-2.8.3.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/PapaParse/5.3.0/papaparse.min.js"></script>
        <script src="http://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>



        <script src="js/template/forms/select2.full.min.js"></script>
        <script src="js/template/forms/form-select2.js"></script>

        <?php include 'components/modal_proprietes.php' ?>
        <?php include 'components/modal_details.php' ?>

        <?php include 'js/logiques/achat_devises_datatable.php' ?>
        <?php include 'js/logiques/achat_devises_logiques.php' ?>


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