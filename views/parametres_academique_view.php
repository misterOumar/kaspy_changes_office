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
    <title><?= APP_NAME ?> - Entreprise</title>

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
                                        <span class="bs-stepper-subtitle">paramètres généraux</span>
                                    </span>
                                </button>
                            </div>
                            <div class="line">
                                <i data-feather="chevron-right" class="font-medium-2"></i>
                            </div>
                            <div class="step" data-target="#matricule-conduite" role="tab" id="matricule-conduite-modern-trigger">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">
                                        <i data-feather="settings" class="font-medium-3"></i>
                                    </span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Matricule-conduite</span>
                                        <span class="bs-stepper-subtitle">Ministère des tutels</span>
                                    </span>
                                </button>
                            </div>
                            <div class="line">
                                <i data-feather="chevron-right" class="font-medium-2"></i>
                            </div>
                            <div class="step" data-target="#personal-info" role="tab" id="personal-info-modern-trigger">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">
                                        <i data-feather="calendar" class="font-medium-3"></i>
                                    </span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Découpage académique</span>
                                        <span class="bs-stepper-subtitle">Période d'évaluation</span>
                                    </span>
                                </button>
                            </div>
                        </div>

                        <!-- Corps de la tab -->
                        <div class="bs-stepper-content px-0 mt-10">
                            <!-- Paramètres généraux -->
                            <div id="account-details" class="content m-2" role="tabpanel" aria-labelledby="account-details-trigger">
                                <div class="content-header mb-2">
                                    <h2 class="fw-bolder mb-75">Informations généraux</h2>
                                    <span>Paramètres généraux</span>
                                </div>
                                <form name="form1_maj" id="form1_maj" action="controllers/parametres_academique_controller.php" method="POST">
                                    <div class="row">
                                        <div class="col-md-3 mb-1">
                                            <label class="form-label" for="type_ets">Type d'établissement</label>
                                            <select name="type_ets" id="type_ets" data-placeholder="Choisir le type d'établissement..." class="select2-icons form-select">
                                                <option data-icon='facebook'>Choisir le type d'établissement...</Option>
                                                <option <?= $info_entreprise["type_etablissement"] === 'Grande école' ? 'selected' : "" ?> data-icon='facebook'>Grande école</Option>
                                                <option <?= $info_entreprise["type_etablissement"] === 'Université' ? 'selected' : "" ?> data-icon='facebook'>Université</Option>
                                                <option <?= $info_entreprise["type_etablissement"] === 'Collège' ? 'selected' : "" ?> data-icon='facebook'>Collège</Option>
                                                <option <?= $info_entreprise["type_etablissement"] === 'Lycée' ? 'selected' : "" ?> data-icon='facebook'>Lycée</Option>
                                                <option <?= $info_entreprise["type_etablissement"] === 'Ecole primaire' ? 'selected' : "" ?> data-icon='facebook'>Ecole primaire</Option>
                                                <option <?= $info_entreprise["type_etablissement"] === 'Ecole maternelle' ? 'selected' : "" ?> data-icon='facebook'>Ecole maternelle</Option>
                                            </select>
                                            <div class="mb-1"><small id="type_etsHelp" class="text-danger invisible"></small></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-1">
                                            <div class="">
                                                <label class="form-label" for="devise_pays">Devise du pays</label>
                                                <input name="devise_pays" id="devise_pays" value="<?= $info_entreprise["devise"] ?>" type="text" class="form-control" placeholder="Saisir la devise du pays" maxlength="50" />
                                            </div>
                                            <div class="mb-1"><small id="devise_paysHelp" class="text-danger invisible"></small></div>
                                        </div>
                                        <div class="col-md-6 mb-1">
                                            <div class="">
                                                <label class="form-label" for="ministere_tutelle">Ministère de tutelle</label>
                                                <input name="ministere_tutelle" id="ministere_tutelle" value="<?= $info_entreprise["ministere_tutelle"] ?>" type="text" class="form-control" placeholder="Saisir le ministère de tutel" maxlength="30" />
                                            </div>
                                            <div class="mb-1"><small id="ministere_tutelleHelp" class="text-danger invisible"></small></div>
                                        </div>
                                    </div>
                                </form>
                                <div class="d-flex mt-2">
                                    <button name="bt_maj_form1" id="bt_maj_form1" class="btn btn-outline-primary">
                                        Enregistrer
                                    </button>
                                </div>
                            </div>

                            <!-- Matricule et conduite -->
                            <div id="matricule-conduite" class="content m-2" role="tabpanel" aria-labelledby="matricule-conduite-trigger">
                                <div class="content-header mb-2">
                                    <h2 class="fw-bolder mb-75">Paramétrage matricules et conduites</h2>
                                    <span>Paramètres matricules et conduites</span>
                                </div>
                                <form name="form_matricule_conduite" id="form_matricule_conduite" action="controllers/parametres_academique_controller.php" method="POST">
                                    <div class="col-xl-10 col-lg-10 col-md-10 order-0 order-md-1">
                                        <div class="card-body">

                                            <ul class="nav nav-pills " role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="homeIcon-tab" data-bs-toggle="tab" href="#homeIcon" aria-controls="home" role="tab" aria-selected="true">
                                                        <i data-feather="user" class="font-medium-3 me-50"></i>
                                                        Automatique
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="profileIcon-tab" data-bs-toggle="tab" href="#profileIcon" aria-controls="profile" role="tab" aria-selected="false">
                                                        <i data-feather="lock" class="font-medium-3 me-50"></i>
                                                        manuel
                                                    </a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <!-- Mon compte -->
                                                <div class="tab-pane active" id="homeIcon" aria-labelledby="homeIcon-tab" role="tabpanel">
                                                    <div class="card p-1">
                                                        <div class="card-header">
                                                            <h4 class="card-title">Incrémentation automatique des matricules</h4>
                                                        </div>
                                                        <div class="card-body">
                                                            <form name="form_matricule_conduite" id="form_matricule_conduite" action="controllers/parametres_academique_controller.php" method="POST">
                                                                <div class=''>
                                                                    <label class='form-label' for='format_matricule'>Format des matricules par défaut</label>
                                                                    <select name='format_matricule' id='format_matricule' data-placeholder="Choisir le format des matricules par défaut..." Class='select2-icons form-select'>
                                                                        <option selected>Choisir le format des matricules par défaut...</Option>
                                                                        <option <?= $info_entreprise["format_matricule"] === 'PréfixeAnnéeCodeMatriculeFilièreIndexNumérotationAnnuel' ? 'selected' : "" ?> data-icon='facebook'>PréfixeAnnéeCodeMatriculeFilièreIndexNumérotationAnnuel</Option>
                                                                        <option <?= $info_entreprise["format_matricule"] === 'CodeMatriculeNiveau-IndexNumérotationAnnuel-CodeMatriculeFilièrePréfixeAnnée' ? 'selected' : "" ?> data-icon='facebook'>CodeMatriculeNiveau-IndexNumérotationAnnuel-CodeMatriculeFilièrePréfixeAnnée</Option>
                                                                        <option <?= $info_entreprise["format_matricule"] === 'PréfixeAnnéeLettreAléatoireIndexNumérotationAnnuel' ? 'selected' : "" ?> data-icon='facebook'>PréfixeAnnéeLettreAléatoireIndexNumérotationAnnuel</Option>
                                                                        <option <?= $info_entreprise["format_matricule"] === 'Années-Filières-IndexNumérotationAnnuel' ? 'selected' : "" ?> data-icon='facebook'>Années-Filières-IndexNumérotationAnnuel</Option>
                                                                        <option <?= $info_entreprise["format_matricule"] === 'Années-Filières-IndexNumérotationGlobal' ? 'selected' : "" ?> data-icon='facebook'>Années-Filières-IndexNumérotationGlobal</Option>
                                                                        <option <?= $info_entreprise["format_matricule"] === 'PréfixeAnnéeFilièresIndexNumérotationAnnuel' ? 'selected' : "" ?> data-icon='facebook'>PréfixeAnnéeFilièresIndexNumérotationAnnuel</Option>
                                                                        <option <?= $info_entreprise["format_matricule"] === 'Format paramétrable' ? 'selected' : "" ?> data-icon='facebook'>Format paramétrable</Option>
                                                                    </select>
                                                                </div>
                                                                <div class='mb-1'><small id='format_matriculeHelp' class='text-danger invisible'></small></div>
                                                                <div class="d-none p-1 " id="formats_defaut">
                                                                    <div class="row mb-2 d-flex">
                                                                        <div class="form-check form-check col-md-4">
                                                                            <input class="form-check-input chkbx" type="checkbox" id="prefixannee" value="22" />
                                                                            <label class="form-check-label" for="prefixannee">PrefixAnnée</label>
                                                                        </div>
                                                                        <div class="form-check form-check col-md-4">
                                                                            <input class="form-check-input chkbx" type="checkbox" id="codematriculefiliere" value="FC" />
                                                                            <label class="form-check-label" for="codematriculefiliere">CodeMatriculeFilière</label>
                                                                        </div>
                                                                        <div class="form-check form-check col-md-4">
                                                                            <input class="form-check-input chkbx" type="checkbox" id="codematriculeniveaux" value="L1" />
                                                                            <label class="form-check-label" for="codematriculeniveaux">CodeMatriculeNiveaux</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-1">
                                                                        <div class="form-check form-check col-md-4">
                                                                            <input class="form-check-input chkbx" type="checkbox" id="annees" value="2022" />
                                                                            <label class="form-check-label" for="annees">Années</label>
                                                                        </div>
                                                                        <div class="form-check form-check col-md-4">
                                                                            <input class="form-check-input chkbx" type="checkbox" id="filiere" value="FCGE" />
                                                                            <label class="form-check-label" for="filiere">Filière</label>
                                                                        </div>
                                                                        <div class="form-check form-check col-md-4">
                                                                            <input class="form-check-input chkbx" type="checkbox" id="letrealeatoire" value="C" />
                                                                            <label class="form-check-label" for="letrealeatoire">LettreAléatoire</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row d-flex flex-column justify-content-end">
                                                                        <div class="form-check form-check col-md-4 mb-1">
                                                                            <input class="form-check-input chkbx" type="checkbox" id="indexnumerotationannuel" value="0001" />
                                                                            <label class="form-check-label" for="indexnumerotationannuel">IndexNumerotationAnnuel</label>
                                                                        </div>
                                                                        <div class='mb-1 col-md-4'>
                                                                            <label class='form-label ' for='separateur'>Séparateur</label>
                                                                            <select name='separateur' id='separateur' data-placeholder="Choisir le séparateur..." Class='select2-icons form-select chkbx'>
                                                                                <option selected hidden>Choisir le séparateur...</Option>
                                                                                <option value="">Aucun</option>
                                                                                <option value=" ">Espace</option>
                                                                                <option value="-">-</option>
                                                                                <option value="_">_</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class='mb-1'>
                                                                        <label class='form-label fw-bold' for='parametre_matricule'>Apperçu</label>
                                                                        <input type='text' class='form-control dt-habitation fw-bolder' id='parametre_matricule' name='parametre_matricule' value="<?= $info_entreprise['parametres_matricule'] ?>" placeholder="Apperçu du modèle de matricule" />
                                                                        <div class="mb-1"><small id="parametre_matriculeHelp" class="text-danger invisible"></small></div>
                                                                    </div>
                                                                </div>

                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>



                                                <!-- Sécurité du compte -->
                                                <div class="tab-pane" id="profileIcon" aria-labelledby="profileIcon-tab" role="tabpanel">
                                                    <div class="card p-1">
                                                        <div class="card-header">
                                                            <h4 class="card-title">Mode manuelle</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card p-1">
                                                <div class="card-body">
                                                    <h4 class="card-title">Note de conduite</h4>
                                                    <div class="card-subtitle text-muted mb-1">Mode d'évaluation des conduite</div>
                                                    <div class="row">
                                                        <div class="demo-inline-spacing">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="mode_conduite" id="conduite_automatique" value="automatique" checked />
                                                                <label class="form-check-label" for="conduite_automatique">Automatique</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="mode_conduite" id="conduite_manuel" value="manuel" />
                                                                <label class="form-check-label" for="conduite_manuel">Manuel</label>
                                                            </div>
                                                        </div>
                                                        <div class='mb-1'><small id='mode_conduiteHelp' class='text-danger invisible'></small></div>
                                                    </div>
                                                    <div class="d-block row " id="mode_conduite_auto">
                                                        <p>Programmation de la note de conduite</p>
                                                        <div class="mb-1 row mb-2">
                                                            <div class="col-4">
                                                                <label class="col-form-label" for="moy_max_conduite">Moyenne maximale de conduite</label>
                                                            </div>
                                                            <div class='col-3'>
                                                                <div class="input-group">
                                                                    <input id='moy_max_conduite' name='moy_max_conduite' value="<?= $info_entreprise['moy_max_conduite'] ?>" type="text" class="" data-bts-button-down-class="btn btn-primary" data-bts-button-up-class="btn btn-primary" max="999999" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <div class="input-group">
                                                                <input id='correspondance_conduite' name='correspondance_conduite' value="<?= $info_entreprise['correspondance_conduite'] ?>" type="text" class="" value="0" data-bts-button-down-class="btn btn-primary" data-bts-button-up-class="btn btn-primary" max="999999" />
                                                            </div>
                                                            <p>heure(s) d'absence équivaut à un retrait de</p>
                                                            <div class="input-group">
                                                                <input id='retrait_conduite' name='retrait_conduite' type="text" class="" value="<?= $info_entreprise['retrait_conduite'] ?>" data-bts-button-down-class="btn btn-primary" data-bts-button-up-class="btn btn-primary" max="999999" />
                                                            </div>
                                                            <p>de moyenne(s)</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="d-flex">
                                    <button name="bt_matricule_conduite" id="bt_matricule_conduite" class="btn btn-outline-primary">
                                        Enregistrer
                                    </button>
                                </div>
                            </div>

                            <!-- Période d'évaluation ou découpage académique -->
                            <div id="personal-info" class="content m-2" role="tabpanel" aria-labelledby="personal-info-trigger">
                                <div class="content-header mb-2">
                                    <h2 class="fw-bolder mb-75">Informations personnelles</h2>
                                    <span>Entrer vos informations d'identification</span>
                                </div>
                                <form name="form2" id="form2">


                                </form>
                            </div>


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

    <!--<script src="js/template/ui/jquery.sticky.js"></script> -->
    <script src="js/template/forms/spinner/jquery.bootstrap-touchspin.js"></script>
    <script src="js/template/forms/form-number-input.js"></script>


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


    <?php include 'js/logiques/parametres_academique_logiques.php' ?>
    <?php include 'js/logiques/reporting_logiques.php' ?>


</body>
<!-- END: Body-->

</html>