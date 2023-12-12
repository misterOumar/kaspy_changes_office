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
    <title><?= APP_NAME ?> - Utilisateurs</title>

    <!-- Fichiers CSS par défaut (TEMPLATE) -->
    <?php include_once 'includes/head.php' ?>

    <!-- Fichiers CSS spécifiques a la page (TEMPLATE) -->
    <link rel="stylesheet" type="text/css" href="css/template/vendors.min.css">

    <link rel="stylesheet" type="text/css" href="css/plugins/tables/datatable/buttons.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="css/core/menu/menu-types/vertical-menu.css">

    <link rel="stylesheet" type="text/css" href="css/template/forms/pickers/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="css/template/forms/pickers/form-flat-pickr.css">
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
                            <h2 class="content-header-title float-start mb-0">Mon profil utilisateur</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php?page=home">Accueil</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Compte utilisateur</a>
                                    </li>
                                    <li class="breadcrumb-item active">Profil
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
                <section class="app-user-view-account">
                    <div class="row">
                        <!-- User Sidebar -->
                        <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
                            <!-- User Card -->
                            <div class="card">
                                <div class="card-body">
                                    <div class="user-avatar-section">
                                        <div class="d-flex align-items-center flex-column">
                                            <img class="img-fluid rounded mt-3 mb-2" src="<?= "assets/images/users/"  . $_SESSION["KaspyISS_user"]['photo'] ?>" height="110" width="110" alt="User avatar" />
                                            <div class="user-info text-center">
                                                <h4><?= $_SESSION["KaspyISS_user"]['users'] ?></h4>
                                                <span class="badge bg-light-secondary"><?= $_SESSION["KaspyISS_user"]['type_compte_reel'] ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-around my-2 pt-75">

                                        <div class="d-flex align-items-start">
                                            <span class="badge bg-light-primary p-75 rounded">
                                                <i data-feather="calendar" class="font-medium-2"></i>
                                            </span>
                                            <div class="ms-75">
                                                <h6 class="mb-0"><?= $_SESSION["KaspyISS_user"]['date_connexion'] ?></h6>
                                                <small>Dernière connexion</small>
                                            </div>
                                        </div>
                                    </div>
                                    <h4 class="fw-bolder border-bottom pb-50 mb-1">Détails</h4>
                                    <div class="info-container">
                                        <ul class="list-unstyled">
                                            <li class="mb-75">
                                                <span class="fw-bolder me-25">Statut du compte:</span>
                                                <span class="badge bg-light-success">Activé</span>
                                            </li>
                                            <li class="mb-75">
                                                <span class="fw-bolder me-25">Nom et prénoms:</span>
                                                <span><?= $_SESSION["KaspyISS_user"]['nom_prenom'] ?></span>
                                            </li>
                                            <li class="mb-75">
                                                <span class="fw-bolder me-25">Contact:</span>
                                                <span><?= $_SESSION["KaspyISS_user"]['tel1'] ?></span>
                                            </li>
                                            <li class="mb-75">
                                                <span class="fw-bolder me-25">Email:</span>
                                                <span><?= $_SESSION["KaspyISS_user"]['email'] ?></span>
                                            </li>
                                            <li class="mb-75">
                                                <span class="fw-bolder me-25">Adresse:</span>
                                                <span><?= $_SESSION["KaspyISS_user"]['adresse'] ?></span>
                                            </li>
                                            <li class="mb-75">
                                                <span class="fw-bolder me-25">Fonction:</span>
                                                <span><?= $_SESSION["KaspyISS_user"]['fonction'] ?></span>
                                            </li>
                                            <li class="mb-75">
                                                <span class="fw-bolder me-25">Nationnalité</span>
                                                <span><?= $_SESSION["KaspyISS_user"]['nom_prenom'] ?></span>
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                            <!-- /User Card -->

                            <!-- Plan Card -->
                            <div class="card border-primary">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <span class="badge bg-light-primary">Mes activités</span>
                                        <div class="d-flex justify-content-center">
                                            <span class="fw-bolder display-5 mb-0 text-primary">99</span>
                                            <sub class="pricing-duration font-small-4 ms-25 mt-auto mb-2"> au total</sub>
                                        </div>
                                    </div>
                                    <ul class="ps-1 mb-2">
                                        <li class="mb-50">Inscriptions</li>
                                        <li class="mb-50">Versements</li>
                                        <li>Clients</li>
                                    </ul>
                                    <div class="d-flex justify-content-between align-items-center fw-bolder mb-50">
                                        <span>Mes performances</span>
                                        <span>4 of 30 Days</span>
                                    </div>
                                    <div class="progress mb-50" style="height: 8px">
                                        <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="65" aria-valuemax="100" aria-valuemin="80"></div>
                                    </div>
                                    <span>4 days remaining</span>
                                    <div class="d-grid w-100 mt-2">
                                        <button class="btn btn-primary" data-bs-target="#upgradePlanModal" data-bs-toggle="modal">
                                            Actualiser
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- /Plan Card -->
                        </div>
                        <!--/ User Sidebar -->


                        <!-- Tabs with Icon starts -->
                        <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1" style="margin-top: -15px; margin-left: -20px; width: 68%;">
                            <div class="card-body">
                                <ul class="nav nav-pills " role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="homeIcon-tab" data-bs-toggle="tab" href="#homeIcon" aria-controls="home" role="tab" aria-selected="true"> <i data-feather="user" class="font-medium-3 me-50"></i>Mon compte</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profileIcon-tab" data-bs-toggle="tab" href="#profileIcon" aria-controls="profile" role="tab" aria-selected="false"><i data-feather="lock" class="font-medium-3 me-50"></i>Sécurité du compte</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <!-- Mon compte -->
                                    <div class="tab-pane active" id="homeIcon" aria-labelledby="homeIcon-tab" role="tabpanel">
                                        <div class="card p-1">
                                            <div class="card-header">
                                                <h4 class="card-title">Informations personnelles</h4>
                                            </div>
                                            <div class="card-body">

                                                <form id="form_maj" name="form_maj" class="add-new-record modal-content pt-0 bg-transparent" action="controllers/profile_controller.php" method="POST">

                                                    <div class="row" style="margin-bottom:-17px">
                                                        <div class="mb-1 col-md-6">
                                                            <label class="form-label" for="nom_prenom">Nom et prénoms *</label>
                                                            <input type="text" name="nom_prenom" id="nom_prenom" class="form-control" value="<?= $_SESSION["KaspyISS_user"]['nom_prenom'] ?>" placeholder="Saisir votre nom et prénom(s)" maxlength="75" />
                                                            <div class='mb-1'><small id='nomHelp' class='text-danger invisible'></small></div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label" for="select2-icons">Sexe *</label>
                                                            <input type="text" class="form-control" name="sex" id="sex" readonly="readonly" value="<?= $_SESSION["KaspyISS_user"]['sex'] ?>">
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="mb-1 col-md-6">
                                                            <label class="form-label" for="date_naissance">Date de naissance</label>
                                                            <input type="text" id="date_naissance" name="date_naissance" class="form-control flatpickr-basic" value="<?= $_SESSION["KaspyISS_user"]['date_naissance'] ?>" placeholder="YYYY-MM-DD" />
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label" for="matricule">Matricule</label>
                                                            <input type="text" class="form-control" name="matricule" id="matricule" value="<?= $_SESSION["KaspyISS_user"]['matricule'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 mb-6">
                                                            <label class="form-label" for="tel1">Contact 1 *</label>
                                                            <input type="text" name="tel1" id="tel1" value="<?= $_SESSION["KaspyISS_user"]['tel1'] ?>" class="form-control mobile-number-mask " placeholder="Saisir votre contact, Ex : +225 .. .. .. .. .." maxlength="20" />
                                                            <div class='mb-1'><small id='contactHelp' class='text-danger invisible'></small></div>
                                                        </div>
                                                        <div class="col-md-6 mb-6">
                                                            <label class="form-label" for="tel2">Contact 2</label>
                                                            <input type="text" name="tel2" id="tel2" value="<?= $_SESSION["KaspyISS_user"]['tel2'] ?>" class="form-control mobile-number-mask " placeholder="Saisir votre contact, Ex : +225 .. .. .. .. .." maxlength="20" />
                                                            <div class='mb-1'><small id='contactHelp' class='text-danger invisible'></small></div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 mb-6">
                                                            <label class="form-label" for="email">Email *</label>
                                                            <input type="email" name="email" id="email" value="<?= $_SESSION["KaspyISS_user"]['email'] ?>" class="form-control" placeholder="Saisir votre email" maxlength="75" />
                                                            <div class='mb-1'><small id='emailHelp' class='text-danger invisible'></small></div>
                                                        </div>
                                                        <div class="col-6 mb-6">
                                                            <label class="form-label" for="adresse">Adresse</label>
                                                            <input type="text" name="adresse" id="adresse" value="<?= $_SESSION["KaspyISS_user"]['adresse'] ?>" class="form-control" placeholder="Saisir votre lieu d'habitation" maxlength="75" />
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="mb-1 col-md-6 ">
                                                            <label class="form-label" for="fonction">Fonction</label>
                                                            <input type="text" name="fonction" id="fonction" value="<?= $_SESSION["KaspyISS_user"]['fonction'] ?>" class="form-control" placeholder="Saisir votre fonction" maxlength="75" />
                                                        </div>
                                                        <div class="mb-1 col-md-6 ">
                                                            <label class="form-label" for="fonction">Details fonctions</label>
                                                            <input type="text" name="details_fonction" id="details_fonction" value="<?= $_SESSION["KaspyISS_user"]['details_fonction'] ?>" class="form-control" placeholder="Saisir votre fonction" maxlength="75" />
                                                        </div>
                                                    </div>
                                                    <div class="row pb-1">
                                                        <div class="col-md-6">
                                                            <label class="form-label" for="nationnalite">Nationnalité</label>
                                                            <input type="text" name="nationnalite" id="nationnalite" value="<?= $_SESSION["KaspyISS_user"]['nationnalite'] ?>" class="form-control" placeholder="Saisir votre fonction" maxlength="75" />
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label" for="n_piece">Numero de la pièce</label>
                                                            <input type="text" name="n_piece" id="n_piece" value="<?= $_SESSION["KaspyISS_user"]['n_piece'] ?>" class="form-control" placeholder="Saisir le numéro de votre pièce" maxlength="75" />
                                                        </div>
                                                    </div>
                                                    <div class="row pb-1">
                                                        <div class="col-md-6">
                                                            <label class="form-label" for="situation_matrimoniale">Situation matrimoniale</label>
                                                            <input type="text" name="situation_matrimoniale" id="situation_matrimoniale" value="<?= $_SESSION["KaspyISS_user"]['situation_matrimoniale'] ?>" class="form-control" placeholder="Saisir situation matrimoniale" maxlength="75" />
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label" for="nombre_enfants">Nombre d'enfant</label>
                                                            <input type="text" name="nombre_enfants" id="nombre_enfants" value="<?= $_SESSION["KaspyISS_user"]['nombre_enfants'] ?>" class="form-control" placeholder="Saisir votre nombre d'enfant" maxlength="75" />
                                                        </div>
                                                    </div>
                                                    <div class="row pb-2">
                                                        <div class="col-md-6">
                                                            <label class="form-label" for="permis_conduire">Permis conduire</label>
                                                            <input type="text" name="permis_conduire" id="permis_conduire" value="<?= $_SESSION["KaspyISS_user"]['permis_conduire'] ?>" class="form-control" placeholder="Saisir la catégorie du permis de conduire" maxlength="75" />
                                                        </div>

                                                    </div>
                                                </form>

                                                <div class="d-flex justify pt-2">
                                                    <button name="bt_maj" id="bt_maj" class="btn btn-outline-primary me-1">
                                                        Enregistrer
                                                    </button>
                                                    <a href="index.php?page=profile" class="btn btn-outline-dark suspend-user">Actualiser</a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>



                                    <!-- Sécurité du compte -->
                                    <div class="tab-pane" id="profileIcon" aria-labelledby="profileIcon-tab" role="tabpanel">
                                        <div class="card p-1">
                                            <div class="card-header">
                                                <h4 class="card-title">Modification du mot de passe</h4>
                                            </div>

                                            <div class="card-body">
                                                <form id="form_maj_mdp" name="form_maj_mdp" action="controllers/profile_controller.php" method="POST">
                                                    <div class="row pb-1">
                                                        <div class="col-md-6">
                                                            <label class="form-label" for="type_compte">Type de compte</label>
                                                            <input type="text" class="form-control" name="type_compte" id="type_compte" readonly="readonly" value="<?= $_SESSION["KaspyISS_user"]['type_compte_reel'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="">
                                                                <label class="form-label" for="username">Nom d'utilisateur</label>
                                                                <input name="username" id="username" type="text" class="form-control" readonly="readonly" placeholder="Saisir votre nom d'utilisateur" maxlength="30" value="<?= $_SESSION["KaspyISS_user"]['users'] ?>" />
                                                            </div>
                                                            <div class="mb-1"><small id="userHelp" class="text-danger invisible"></small></div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 mb-1">
                                                            <label class="form-label" for="password">Ancien mot de passe</label>
                                                            <div class="input-group input-group-merge form-password-toggle">
                                                                <input type="password" name="password" id="password" class="form-control" placeholder="Saisir votre mot de passe" maxlength="255" minlength="4" />
                                                                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                                            </div>
                                                            <div class="mb-1"><small id="passwordHelp" class="text-danger invisible"></small></div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 mb-1">
                                                            <label class="form-label" for="new_password">Nouveau mot de passe</label>
                                                            <div class="input-group input-group-merge form-password-toggle">
                                                                <input type="password" name="new_password" id="new_password" class="form-control" placeholder="Saisir votre mot de passe" maxlength="255" minlength="4" />
                                                                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                                            </div>
                                                            <div class="mb-1"><small id="new_passworddHelp" class="text-danger invisible"></small></div>
                                                        </div>

                                                        <div class="col-md-6 mb-1">
                                                            <label class="form-label" for="confirm_password">Comfirmer le nouveau mot de passe</label>
                                                            <div class="input-group input-group-merge form-password-toggle">
                                                                <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Saisir à nouveau votre mot de passe" maxlength="255" minlength="4" />
                                                                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                                            </div>
                                                            <div class="mb-1"><small id="confirmpasswordHelp" class="text-danger invisible"></small></div>
                                                        </div>
                                                    </div>
                                                </form>
                                                <?= $_SESSION["KaspyISS_user"]['users'] ?>
                                                <?= $info_login_user['users'] ?>

                                                <div class="d-flex justify pt-2">
                                                    <button name="bt_maj_mdp" id="bt_maj_mdp" class="btn btn-outline-primary me-1">
                                                        Enregistrer
                                                    </button>
                                                    <a href="index.php?page=profile" class="btn btn-outline-dark suspend-user">Actualiser</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- Tabs with Icon ends -->

                </section>
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <?php include 'includes/toast.php' ?>

    <!-- ***************************************** FICHIERS JS ************************************************************** -->
    <!-- BEGIN: FICHIERS JS DU TEMPLATE -->
    <script src="js/template/vendors.min.js"></script>


    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <script src="js/template/pages/app-user-list.js"></script>
    <script src="js/plugins/tables/datatable/buttons.html5.min.js"></script>
    <script src="js/plugins/tables/datatable/buttons.print.min.js"></script>
    <script src="js/template/forms/pickers/flatpickr/flatpickr.min.js"></script>
    <script src="js/template/forms/pickers/form-pickers.js"></script>

    <script src="js/template/app.js"></script>
    <script src="js/template/app-menu.js"></script>

    <!-- START: Footer-->
    <?php include 'includes/footer.php' ?>
    <!-- END: Footer-->

    <?php include 'js/logiques/profile_logiques.php' ?>
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