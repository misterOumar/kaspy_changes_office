<!DOCTYPE html>
<html class="loading" lang="fr" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <title><?= APP_NAME ?> - Dossier entreprise</title>

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

    <link rel="stylesheet" type="text/css" href="css/template/forms/bs-stepper.min.css">
    <link rel="stylesheet" type="text/css" href="css/template/forms/form-wizard.css">


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
                            <h2 class="content-header-title float-start mb-0">Paramètres de la société</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php?page=home">Accueil</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Configuration</a>
                                    </li>
                                    <li class="breadcrumb-item active">Dossier entreprise
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
                <section class="modern-horizontal-wizard">
                    <div class="bs-stepper wizard-modern modern-wizard-example">
                        <!-- Entête de la tab -->
                        <div class="bs-stepper-header" role="tablist">
                            <div class="step" data-target="#account-details" role="tab" id="account-details-modern-trigger">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">
                                        <i data-feather="settings" class="font-medium-3"></i>
                                    </span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Générale</span>
                                        <span class="bs-stepper-subtitle">Paramètres généraux</span>
                                    </span>
                                </button>
                            </div>
                            <div class="line">
                                <i data-feather="chevron-right" class="font-medium-2"></i>
                            </div>
                            <div class="step" data-target="#personal-info" role="tab" id="personal-info-modern-trigger">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">
                                        <i data-feather="phone-call" class="font-medium-3"></i>
                                    </span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Communication</span>
                                        <span class="bs-stepper-subtitle">Nos contacts</span>
                                    </span>
                                </button>
                            </div>
                            <div class="line">
                                <i data-feather="chevron-right" class="font-medium-2"></i>
                            </div>
                            <div class="step" data-target="#billing" role="tab" id="billing-modern-trigger">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">
                                        <i data-feather="dollar-sign" class="font-medium-3"></i>
                                    </span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Comptabilité</span>
                                        <span class="bs-stepper-subtitle">Notre comptabilité</span>
                                    </span>
                                </button>
                            </div>
                        </div>

                        <!-- Corps de la tab -->
                        <div class="bs-stepper-content px-0 mt-10">
                            <form name="form_maj" id="form_maj" action="controllers/bureaux_controller.php" method="POST">
                                <!-- Paramètres généraux -->
                                <div id="account-details" class="content m-2" role="tabpanel" aria-labelledby="account-details-trigger">
                                    <div class="content-header mb-2">
                                        <h2 class="fw-bolder mb-75">Information généraux</h2>
                                        <span>Paramètres généraux</span>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <!--- LIBELLE --->
                                            <div class='mb-1'>
                                                <label class='form-label' for='libelle'>Libellé</label>
                                                <input type='text' class='form-control dt-full-libelle' id='libelle' name='libelle' value="<?= $info_bureau["libelle"] ?>"  readonly="readonly" placeholder='Veuillez saisir le Libelle' aria - Label='libelle' maxlength='50' />
                                            </div>
                                            <div class='mb-1'><small id='libelleHelp' class='text-danger invisible'></small></div>
                                        </div>
                                        <div class="col-md-4">
                                            <!--- RAISON_SOCIALE --->
                                            <div class='mb-1'>
                                                <label class='form-label' for='raison_sociale'>Raison sociale</label>
                                                <input type='text' class='form-control dt-raison_sociale' id='raison_sociale' name='raison_sociale' value="<?= $info_bureau["libelle"] ?>" placeholder='Veuillez saisir le Raison de sociale' aria - Label='raison_sociale' maxlength='150' />
                                            </div>
                                            <div class='mb-1'><small id='raison_socialeHelp' class='text-danger invisible'></small></div>
                                        </div>
                                        <div class="col-md-4">
                                            <!--- RESPONSABLE --->
                                            <div class='mb-1'>
                                                <label class='form-label' for='responsable'>Responsable</label>
                                                <input type='text' class='form-control dt-responsable' id='responsable' name='responsable' value="<?= $info_bureau["responsable"] ?>" placeholder='Veuillez saisir le Responsable' aria - Label='responsable' maxlength='70' />
                                            </div>
                                            <div class='mb-1'><small id='responsableHelp' class='text-danger invisible'></small></div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <!--- PAYS --->
                                            <div class=''>
                                                <label class='form-label' for='pays'>Pays</label>
                                                <select name='pays' id='pays' data-placeholder='Choisir le pays...'  Class='select2-icons form-select'>
                                                    <option data-icon='facebook'>Choisir le pays...</Option>
                                                    <?php
                                                    // chemin d'accès au fichier JSON
                                                    $file = 'assets/pays.json';
                                                    // mettre le contenu du fichier dans une variable
                                                    $data = file_get_contents($file);
                                                    // décoder et accéder aux flux JSON
                                                    $liste_Pays = json_decode($data, true);

                                                    foreach ($liste_Pays as $key => $pays) {
                                                    ?>
                                                        <option <?= $pays === $info_bureau["pays"] ? 'selected' : "" ?>>
                                                            <?= $pays; ?>
                                                        </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class=''><small id='paysHelp' class='text-danger invisible'></small></div>
                                        </div>
                                        <div class="col-md-4">
                                            <!--- VILLE --->
                                            <div class=''>
                                                <label class='form-label' for='ville'>Ville</label>
                                                <input type='text' class='form-control dt-ville' id='ville' name='ville' value="<?= $info_bureau["ville"] ?>" placeholder='Veuillez saisir le Ville' aria - Label='ville' maxlength='75' />
                                            </div>
                                            <div class=''><small id='villeHelp' class='text-danger invisible'></small></div>
                                        </div>
                                        <div class="col-md-4">
                                            <!--- ADRESSE --->
                                            <div class='mb-1'>
                                                <label class='form-label' for='adresse'>Adresse</label>
                                                <input type='text' class='form-control dt-adresse' id='adresse' name='adresse' value="<?= $info_bureau["adresse"] ?>" placeholder='Veuillez saisir le Adresse' aria - Label='adresse' maxlength='255' />
                                            </div>
                                            <div class='mb-1'><small id='adresseHelp' class='text-danger invisible'></small></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <!--- SIGLE --->
                                            <div class='mb-1'>
                                                <label class='form-label' for='sigle'>Sigle</label>
                                                <input type='text' class='form-control dt-sigle' id='sigle' name='sigle' value="<?= $info_bureau["sigle"] ?>" placeholder='Veuillez saisir le Sigle' aria - Label='sigle' maxlength='25' />
                                            </div>
                                            <div class='mb-1'><small id='sigleHelp' class='text-danger invisible'></small></div>
                                        </div>
                                        <div class="col-md-4">
                                            <!--- SLOGAN --->
                                            <div class='mb-1'>
                                                <label class='form-label' for='slogan'>Slogan</label>
                                                <input type='text' class='form-control dt-slogan' id='slogan' name='slogan' value="<?= $info_bureau["slogan"] ?>" placeholder='Veuillez saisir le Slogan' aria - Label='slogan' />
                                            </div>
                                            <div class='mb-1'><small id='sloganHelp' class='text-danger invisible'></small></div>
                                        </div>
                                    </div>

                                </div>

                                <!-- Communication | Nos contacts -->
                                <div id="personal-info" class="content m-2" role="tabpanel" aria-labelledby="personal-info-trigger">
                                    <div class="content-header mb-2">
                                        <h2 class="fw-bolder mb-75">Informations communication</h2>
                                        <span>Entrer vos informations de communication</span>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <!--- TEL1 --->
                                            <div class=''>
                                                <label class='form-label' for='tel1'>Contact 1</label>
                                                <input type='text' class='form-control dt-tel1' id='tel1' name='tel1' value="<?= $info_bureau["tel1"] ?>" placeholder='Veuillez saisir le téléphone' aria - Label='tel1' maxlength='25' />
                                            </div>
                                            <div class=''><small id='tel1Help' class='text-danger invisible'></small></div>
                                        </div>
                                        <div class="col-md-4">
                                            <!--- TEL2 --->
                                            <div class=''>
                                                <label class='form-label' for='tel2'>Contact 2</label>
                                                <input type='text' class='form-control dt-fax' id='tel2' name='tel2' value="<?= $info_bureau["tel2"] ?>" placeholder='Veuillez saisir le téléphone' aria - Label='tel2' maxlength='25' />
                                            </div>
                                            <div class=''><small id='tel2Help' class='text-danger invisible'></small></div>
                                        </div>
                                        <div class="col-md-4">
                                            <!--- EMAIL --->
                                            <div class='mb-1'>
                                                <label class='form-label' for='email'>Email</label>
                                                <input type='text' class='form-control dt-email' id='email' name='email' value="<?= $info_bureau["email"] ?>" placeholder='Veuillez saisir le Email' aria - Label='email' maxlength='75' />
                                            </div>
                                            <div class='mb-1'><small id='emailHelp' class='text-danger invisible'></small></div>
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <div class="col-md-4">
                                            <!--- FIXE --->
                                            <div class=''>
                                                <label class='form-label' for='fixe'>Fixe</label>
                                                <input type='text' class='form-control dt-fixe' id='fixe' name='fixe' value="<?= $info_bureau["fixe"] ?>" placeholder='Veuillez saisir le Fixe' aria - Label='fixe' maxlength='25' />
                                            </div>
                                            <div class=''><small id='fixeHelp' class='text-danger invisible'></small></div>
                                        </div>
                                        <div class="col-md-4">
                                            <!--- FAX --->
                                            <div class=''>
                                                <label class='form-label' for='fax'>Fax</label>
                                                <input type='text' class='form-control dt-fax' id='fax' name='fax' value="<?= $info_bureau["fax"] ?>" placeholder='Veuillez saisir le Fax' aria - Label='fax' maxlength='25' />
                                            </div>
                                            <div class=''><small id='faxHelp' class='text-danger invisible'></small></div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <!--- BP --->
                                            <div class='mb-1'>
                                                <label class='form-label' for='bp'>Bp</label>
                                                <input type='text' class='form-control dt-bp' id='bp' name='bp' value="<?= $info_bureau["bp"] ?>" placeholder='Veuillez saisir le Bp' aria - Label='bp' maxlength='75' />
                                            </div>
                                            <div class='mb-1'><small id='bpHelp' class='text-danger invisible'></small></div>
                                        </div>
                                        <div class="col-md-4">
                                            <!--- SITE_INTERNET --->
                                            <div class='mb-1'>
                                                <label class='form-label' for='site_internet'>Site_internet</label>
                                                <input type='text' class='form-control dt-site_internet' id='site_internet' value="<?= $info_bureau["site_internet"] ?>" name='site_internet' placeholder='Veuillez saisir le Site de internet' aria - Label='site_internet' maxlength='105' />
                                            </div>
                                            <div class='mb-1'><small id='site_internetHelp' class='text-danger invisible'></small></div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Les informations de comptabilité -->
                                <div id="billing" class="content m-2" role="tabpanel" aria-labelledby="billing-trigger">
                                    <div class="content-header mb-3">
                                        <h2 class="fw-bolder mb-75">Informations de la comptabilité</h2>
                                        <span>Vos informations sur la comptabilité</span>
                                    </div>

                                    <div class="row mb-1">
                                        <div class="col-md-4">
                                            <!--- ACTIVITES --->
                                            <div class=''>
                                                <label class='form-label' for='activites'>Activités</label>
                                                <input type='text' class='form-control dt-activites' id='activites' value="<?=$info_bureau["activites"] ?>" name='activites' placeholder='Veuillez saisir le Activites' aria - Label='activites' maxlength='105' />
                                            </div>
                                            <div class='mb-1'><small id='activitesHelp' class='text-danger invisible'></small></div>
                                        </div>
                                        <div class="col-md-4">
                                            <!--- FORME_JURIDIQUE --->
                                            <div class=''>
                                                <label class='form-label' for='forme_juridique'>Forme juridique</label>
                                                <select name='forme_juridique' id='forme_juridique' data-placeholder="Choisir la forme juridique..." Class='select2-icons form-select'>
                                                    <option data-icon='facebook'>Choisir la forme juridique...</Option>
                                                    <option <?= $info_bureau["forme_juridique"] === 'Individuelle' ? 'selected' : "" ?> data-icon='facebook'>Individuelle</Option>
                                                    <option <?= $info_bureau["forme_juridique"] === 'SA' ? 'selected' : "" ?> data-icon='facebook'>SA</Option>
                                                    <option <?= $info_bureau["forme_juridique"] === 'SARL' ? 'selected' : "" ?> data-icon='facebook'>SARL</Option>
                                                    <option <?= $info_bureau["forme_juridique"] === 'SPRL' ? 'selected' : "" ?> data-icon='facebook'>SPRL</Option>
                                                    <option <?= $info_bureau["forme_juridique"] === 'SAS' ? 'selected' : "" ?> data-icon='facebook'>SAS</Option>
                                                    <option <?= $info_bureau["forme_juridique"] === 'SNC' ? 'selected' : "" ?> data-icon='facebook'>SNC</Option>
                                                    <option <?= $info_bureau["forme_juridique"] === 'SCS' ? 'selected' : "" ?> data-icon='facebook'>SCS</Option>
                                                </select>
                                            </div>
                                            <div class='mb-1'><small id='forme_juridiqueHelp' class='text-danger invisible'></small></div>
                                        </div>
                                        <div class="col-md-4">
                                            <!--- RCCM --->
                                            <div class=''>
                                                <label class='form-label' for='rccm'>RCCM</label>
                                                <input type='text' class='form-control dt-rccm' id='rccm' name='rccm' value="<?= $info_bureau["rccm"] ?>" placeholder='Veuillez saisir le Rccm' aria - Label='rccm' maxlength='45' />
                                            </div>
                                            <div class='mb-1'><small id='rccmHelp' class='text-danger invisible'></small></div>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-md-4">
                                            <!--- COMPTE_CONTRIBUABLE --->
                                            <div class=''>
                                                <label class='form-label' for='compte_contribuable'>Compte contribuable</label>
                                                <input type='text' class='form-control dt-compte_contribuable' id='compte_contribuable' value="<?= $info_bureau["compte_contribuable"] ?>" name='compte_contribuable' placeholder='Veuillez saisir le Compte de contribuable' aria - Label='compte_contribuable' maxlength='45' />
                                            </div>
                                            <div class='mb-1'><small id='compte_contribuableHelp' class='text-danger invisible'></small></div>
                                        </div>
                                        <div class="col-md-4">
                                            <!--- REGIME_IMPOSITION --->
                                            <div class=''>
                                                <label class='form-label' for='regime_imposition'>Régime d'imposition</label>
                                                <select name='regime_imposition' id='regime_imposition' value="<?= $info_bureau["regime_imposition"] ?>" data-placeholder="Choisir le regime d' imposition..." Class='select2-icons form-select'>
                                                    <option selected data-icon='facebook'>Choisir le regime d'imposition...</Option>
                                                    <option <?= $info_bureau["regime_imposition"] === 'RNI' ? 'selected' : "" ?> data-icon='facebook'>RNI</Option>
                                                    <option <?= $info_bureau["regime_imposition"] === 'RSI' ? 'selected' : "" ?> data-icon='facebook'>RSI</Option>
                                                    <option <?= $info_bureau["regime_imposition"] === 'RME' ? 'selected' : "" ?> data-icon='facebook'>RME</Option>
                                                    <option <?= $info_bureau["regime_imposition"] === 'RE' ? 'selected' : "" ?> data-icon='facebook'>RE</Option>
                                                </select>
                                            </div>
                                            <div class='mb-1'><small id='regime_impositionHelp' class='text-danger invisible'></small></div>
                                        </div>
                                        <div class="col-md-4">
                                            <!--- CENTRE_IMPÔTS --->
                                            <div class=''>
                                                <label class='form-label' for='centre_impôts'>Centre d'impôts</label>
                                                <input type='text' class='form-control dt-centre_impôts' id='centre_impôts' name='centre_impôts' value="<?= $info_bureau["centre_impôts"] ?>" placeholder='Veuillez saisir le Centre de impôts' aria - Label='centre_impôts' maxlength='105' />
                                            </div>
                                            <div class='mb-1'><small id='centre_impôtsHelp' class='text-danger invisible'></small></div>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-md-4">
                                            <!--- CAPITAL_SOCIAL --->
                                            <div class='mb-1'>
                                                <label class='form-label' for='capital_social'>Capital social</label>
                                                <input type='text' class='form-control dt-capital_social' id='capital_social' name='capital_social' value="<?= $info_bureau["capital_social"] ?>" placeholder='Veuillez saisir le Capital de social' aria - Label='capital_social' />
                                            </div>
                                            <div class='mb-1'><small id='capital_socialHelp' class='text-danger invisible'></small></div>
                                        </div>
                                        <div class="col-md-4">
                                            <!--- COMPTE_BANCAIRE --->
                                            <div class='mb-1'>
                                                <label class='form-label' for='compte_Bancaire'>Compte Bancaire</label>
                                                <input type='text' class='form-control dt-compte_Bancaire' id='compte_Bancaire' value="<?= $info_bureau["compte_Bancaire"] ?>" name='compte_Bancaire' placeholder='Veuillez saisir le Compte de Bancaire' aria - Label='compte_Bancaire' maxlength='105' />
                                            </div>
                                            <div class='mb-1'><small id='compte_BancaireHelp' class='text-danger invisible'></small></div>
                                        </div>
                                        <div class="col-md-4">
                                            <!--- MONNAIE --->
                                            <div class='mb-1'>
                                                <label class='form-label' for='monnaie'>Monnaie</label>
                                                <input type='text' class='form-control dt-monnaie' id='monnaie' name='monnaie' value="<?= $info_bureau["monnaie"] ?>" placeholder='Veuillez saisir le Monnaie' aria - Label='monnaie' maxlength='45' />
                                            </div>
                                            <div class='mb-1'><small id='monnaieHelp' class='text-danger invisible'></small></div>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-md-4">
                                            <!--- N_AGREMENT_1 --->
                                            <div class=''>
                                                <label class='form-label' for='n_agrement_1'>N° d'agrement 1</label>
                                                <input type='text' class='form-control dt-n_agrement_1' id='n_agrement_1' name='n_agrement_1' value="<?= $info_bureau["n_agrement_1"] ?>" placeholder='Veuillez saisir le N de agrement de 1' aria - Label='n_agrement_1' maxlength='250' />
                                            </div>
                                            <div class='mb-1'><small id='n_agrement_1Help' class='text-danger invisible'></small></div>
                                        </div>
                                        <div class="col-md-4">
                                            <!--- N_AGREMENT_2 --->
                                            <div class=''>
                                                <label class='form-label' for='n_agrement_2'>N° d'agrement 2</label>
                                                <input type='text' class='form-control dt-n_agrement_2' id='n_agrement_2' name='n_agrement_2' value="<?= $info_bureau["n_agrement_2"] ?>" placeholder='Veuillez saisir le N de agrement de 2' aria - Label='n_agrement_2' maxlength='250' />
                                            </div>
                                            <div class='mb-1'><small id='n_agrement_2Help' class='text-danger invisible'></small></div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="pt-2">
                            <button name="bt_maj" id="bt_maj" class="btn btn-outline-primary">
                                Enregistrer
                            </button>
                        </div>
                    </div>
                </section>
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
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- BEGIN: FICHIERS JS DU TEMPLATE -->
    <script src="js/template/vendors.min.js"></script>
    <script src="js/template/app-menu.js"></script>
    <script src="js/template/app.js"></script>


    <!-- BEGIN: FICHIERS JS DES PAGES -->
    <script src="js/template/forms/wizard/bs-stepper.min.js"></script>
    <script src="js/template/forms/form-wizard.js"></script>

    <script src="js/template/forms/cleave/cleave.min.js"></script>
    <script src="js/template/forms/cleave/addons/cleave-phone.ci.js"></script>

    <script src="js/template/forms/pickers/flatpickr/flatpickr.min.js"></script>
    <script src="js/template/forms/pickers/form-pickers.js"></script>
    <script src="js/template/extensions/sweetalert2.all.min.js"></script>

    <!-- <script src="js/template/forms/select/form-select2.js"></script> -->
    <!-- <script src="js/template/forms/select/select2.full.min.js"></script> -->
    <!-- <script src="js/template/forms/validation/jquery.validate.min.js"></script> -->


    <!-- START: Footer-->
    <?php include 'includes/footer.php' ?>
    <!-- END: Footer-->

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


    <?php include 'js/logiques/bureaux_logiques.php' ?>
    <?php include 'js/droits_access/gestion_DroitsAccess_DossierEntreprise.php' ?>
    <?php include 'js/logiques/reporting_logiques.php' ?>


</body>
<!-- END: Body-->

</html>