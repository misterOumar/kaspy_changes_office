<!-- Sécurité supplémentaire des pages, obligation de tooting via index-->
<?php

if (!isset($_SESSION["KaspyISS_user"])) {
    header("Location: index.php?page=login");
}
;
?>
<!-- End of the secure -->


<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <title>
        <?= APP_NAME ?> - Accueil
    </title>

    <!-- Fichiers CSS par défaut (TEMPLATE) -->
    <?php include_once 'includes/head.php' ?>
    <!-- Fichier fenetre des differents Liste et journaux -->
    <?php include_once 'components/journal_recouvrement.php' ?>
    <?php include_once 'components/batiment_par_proprietaire.php' ?>

    <!-- Fichiers CSS spécifiques a la page (TEMPLATE) -->
    <link rel="stylesheet" type="text/css" href="css/template/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="css/template/pages/dashboard-ecommerce.css">

    <link rel="stylesheet" type="text/css" href="css/plugins/charts/apexcharts.css">
    <link rel="stylesheet" type="text/css" href="css/plugins/charts/chart-apex.css">


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
                            <h2 class="content-header-title float-start mb-0">Accueil</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php?page=home">Accueil</a>
                                    </li>
                                    </li>
                                    <li class="breadcrumb-item active">Page d'accueil
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Include Menu toogle droit-->
            <?php include 'components/menu_toggle_droit.php' ?>
            </div>

            <div class="content-wrapper container-xxl p-0">
                <div class="content-header row">
                </div>
                <div class="content-body">
                    <!-- Dashboard Ecommerce Starts -->
                    <section id="dashboard-ecommerce">
                        <div class="row match-height">
                            <!-- AFFICHAGE RIA SUR LE HOME -->
                            <?php if (intval($_SESSION['KaspyISS_user_details'][0]['lecture']) === 1) { ?>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <a href="index.php?page=ria">
                                        <div class="card card-congratulation-medal">
                                            <div class="card-body d-flex align-items-center justify-content-between">
                                                <div>
                                                    <h5>Ria</h5>
                                                    <p class="card-text font-small-3"> Transactions </p>
                                                </div>
                                                <img src="assets/images/template/ria.png" class="img-fluid" alt="Medal Pic"
                                                    style="max-width:100px;" />
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                            <!-- AFFICHAGE WESTERN UNION SUR LE HOME -->
                            <?php if (intval($_SESSION['KaspyISS_user_details'][1]['lecture']) === 1) { ?>

                                <div class="col-xl-4 col-md-6 col-12">
                                    <a href="index.php?page=western_union">
                                        <div class="card card-congratulation-medal">
                                            <div class="card-body d-flex align-items-center justify-content-between">
                                                <div>
                                                    <h5>Western Union</h5>
                                                    <p class="card-text font-small-3"> Transactions </p>
                                                </div>
                                                <img src="assets/images/template/westernunion.png" class="img-fluid"
                                                    alt="Medal Pic"
                                                    style="width:7rem;height:7rem; border-radius:50%; object-fit:cover" />
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                            <!-- AFFICHAGE MONEYGRAM  SUR LE HOME -->
                            <?php if (intval($_SESSION['KaspyISS_user_details'][10]['lecture']) === 1) { ?>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <a href="index.php?page=money_gram">
                                        <div class="card card-congratulation-medal">
                                            <div class="card-body d-flex align-items-center justify-content-between">
                                                <div>
                                                    <h5>MoneyGram</h5>
                                                    <p class="card-text font-small-3"> Transactions </p>
                                                </div>
                                                <img src="assets/images/template/gram.png" class="img-fluid" alt="Medal Pic"
                                                    style="max-width:100px;" />
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <?php } ?>
                            </div>                    
                        <div class="row match-height">
                            <!-- AFFICHAGE ORANGE MONEY  SUR LE HOME -->
                            <?php if (intval($_SESSION['KaspyISS_user_details'][7]['lecture']) === 1) { ?>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <a href="index.php?page=orange_money">
                                        <div class="card card-congratulation-medal">
                                            <div class="card-body d-flex align-items-center justify-content-between">
                                                <div>
                                                    <h5>Orange money</h5>
                                                    <p class="card-text font-small-3"> Mobile Money </p>
                                                </div>
                                                <img src="assets/images/template/orm.png" class="img-fluid" alt="Medal Pic"
                                                    style="width:7rem;height:7rem; border-radius:50%; object-fit:cover" />
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                            <!-- AFFICHAGE MOOV MONEY  SUR LE HOME -->
                            <?php if (intval($_SESSION['KaspyISS_user_details'][5]['lecture']) === 1) { ?>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <a href="index.php?page=moov_money">
                                        <div class="card card-congratulation-medal">
                                            <div class="card-body d-flex align-items-center justify-content-between">
                                                <div>
                                                    <h5>Moov Money</h5>
                                                    <p class="card-text font-small-3"> Mobile Money </p>
                                                </div>
                                                <img src="assets/images/template/moov.png" class="img-fluid" alt="Medal Pic"
                                                    style="width:7rem;height:7rem; object-fit:cover" />
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                            <!-- AFFICHAGE MTN MONEY  SUR LE HOME -->
                            <?php if (intval($_SESSION['KaspyISS_user_details'][6]['lecture']) === 1) { ?>

                                <div class="col-xl-4 col-md-6 col-12">
                                    <a href="index.php?page=mtn_money">
                                        <div class="card card-congratulation-medal">
                                            <div class="card-body d-flex align-items-center justify-content-between">
                                                <div>
                                                    <h5>MTN Money</h5>
                                                    <p class="card-text font-small-3"> Mobile Money </p>
                                                </div>
                                                <img src="assets/images/template/mtn.png" class="img-fluid" alt="Medal Pic"
                                                    style="max-width:100px;" />
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="row match-height">
                            <!-- AFFICHAGE DES CARTES SUR LE HOME -->
                            <?php if (intval($_SESSION['KaspyISS_user_details'][8]['lecture']) === 1) { ?>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <a href="index.php?page=carte">
                                        <div class="card card-congratulation-medal">
                                            <div class="card-body d-flex align-items-center justify-content-between">
                                                <div>
                                                    <h5>Cartes VISA</h5>
                                                    <p class="card-text font-small-3"> Gestion des cartes | Caisse </p>
                                                </div>
                                                <img src="assets/images/template/cartes.png" class="img-fluid"
                                                    alt="Medal Pic" style="max-width:100px;" />
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                            <!-- AFFICHAGE DES RECHARGE UBA SUR LE HOME -->
                            <?php if (intval($_SESSION['KaspyISS_user_details'][11]['lecture']) === 1) { ?>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <a href="index.php?page=uba">
                                        <div class="card card-congratulation-medal">
                                            <div class="card-body d-flex align-items-center justify-content-between">
                                                <div>
                                                    <h5>Réchargements UBA</h5>
                                                    <p class="card-text font-small-3"> Rechargement des cartes </p>
                                                </div>
                                                <img src="assets/images/template/rechargement_uba.png" class="img-fluid"
                                                    alt="Medal Pic" style="max-width:145px;" />
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                            <!-- AFFICHAGE DES CHANGES SUR LE HOME -->
                            <?php if (intval($_SESSION['KaspyISS_user_details'][2]['lecture']) === 1) { ?>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <a href="index.php?page=changes">
                                        <div class="card card-congratulation-medal">
                                            <div class="card-body d-flex align-items-center justify-content-between">
                                                <div>
                                                    <h5>Changes</h5>
                                                    <p class="card-text font-small-3"> Transactions </p>
                                                </div>
                                                <!-- <a href="index.php?page=ria" class="btn btn-primary">Ria </a> -->
                                                <img src="assets/images/template/changes.png" class="img-fluid"
                                                    alt="Medal Pic" style="max-width:100px;" />
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="row match-height">
                            <div class="col-lg-4 col-12">
                                <div class="row match-height">
                                    <!--/ Earnings Card -->
                                </div>
                            </div>

                            <!-- Revenue Report Card -->
                            <!--div class="col-lg-4 col-2">
                                <div class="card card-revenue-budget">
                                    <div class="row mx-0">
                                        <div class="col-md-8 col-12 revenue-report-wrapper">
                                            <div class="d-sm-flex justify-content-between align-items-center mb-3">
                                                <h4 class="card-title mb-50 mb-sm-0">Points de l'année en cours</h4>
                                                <div class="d-flex align-items-center">
                                                    <div class="d-flex align-items-center me-2">
                                                        <span class="bullet bullet-primary font-small-3 me-50 cursor-pointer"></span>
                                                        <span>Profits</span>
                                                         
                                                    </div>
                                                    <div class="d-flex align-items-center ms-75">
                                                        <span class="bullet bullet-warning font-small-3 me-50 cursor-pointer"></span>
                                                        <span>Dépenses</span>
                                                         
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="revenue-report-chart"></div>
                                        </div>
                                        <div class="col-md-3 budget-wrapper">
                                            < <div class="dropdown-item mb-1">
                                                <select class="form-control" id="annee" name="annee" tabindex="3" required>
                                                    <?php
                                                    foreach ($annees as $key => $annee) {
                                                        if ($annee['annees'] === $_SESSION["KaspyISS_annee"]) {
                                                            ?>
                                                            <option selected><?= $annee['annees']; ?></option>
                                                        <?php
                                                        } else {
                                                            ?>
                                                            <option><?= $annee['annees']; ?></option>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                         
                                            <button type="button" class="btn btn-primary"> Cartes</button>
                                        </div>
                                    </div>
                                </div>
                            <div-->

                            <!--/ Revenue Report Card -->
                            </div->



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
            <script src="js/template/app.js"></script>
            <script src="js/template/app-menu.js"></script>
            <script src="js/plugins/charts/apexcharts.min.js"></script>

            <!-- BEGIN: FICHIERS JS DES PAGES -->
            <!-- <script src="js/template/pages/dashboard-ecommerce.js"></script> -->

            <!-- jQuery -->
            <script src="plugins/jquery/jquery.min.js"></script>

            <!-- START: Footer-->
            <!--?php include 'includes/footer.php' ?-->
            <!-- END: Footer-->
            <?php include 'js/logiques/reporting_logiques.php' ?>
            <?php include 'js/logiques/home_logiques.php' ?>



            <script>
                $(window).on('load', function () {
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