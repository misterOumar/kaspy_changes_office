<!-- Sécurité supplémentaire des pages, obligation de tooting via index-->
<?php

if (!isset($_SESSION["KaspyISS_user"])) {
    header("Location: index.php?page=login");
};
?>
<!-- End of the secure -->


<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <title>Tableau de bord - <?= APP_NAME ?> </title>

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
                            <h2 class="content-header-title float-start mb-0">Tableau de bord</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php?page=home">Accueil</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Analyse</a>
                                    </li>
                                    <li class="breadcrumb-item active">Tableau de bord
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


                            <!-- Statistics Card -->
                            <div class="col-xl-12 col-md-6 col-12">
                                <div class="card card-statistics">
                                    <div class="card-header">
                                        <h4 class="card-title">Statistiques</h4>
                                        <div class="d-flex align-items-center">
                                            <p class="card-text font-small-2 me-25 mb-0">Stats</p>
                                        </div>
                                    </div>
                                    <div class="card-body statistics-body">
                                        <div class="row">

                                            <!-- Statistics Cartes Visa -->
                                            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                                <div class="d-flex flex-row">
                                                    <div class="avatar bg-light-info  me-2">
                                                        <span class="avatar-content">
                                                            <i data-feather='credit-card' class="avatar-icon"></i>
                                                        </span>
                                                    </div>
                                                    <div class="my-auto">
                                                        <h4 class="fw-bolder mb-0"><?= $nbre_cartes_vendu ?>/<?= $nbre_cartes ?></h4>
                                                        <p class="card-text font-small-3 mb-0">Cartes Visa (en stock)</p>
                                                    </div>
                                                </div>
                                            </div>


                                            <!-- Statistics Mobile Money -->
                                            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                                <div class="d-flex flex-row">
                                                    <div class="avatar bg-light-primary  me-2">
                                                        <span class="avatar-content">
                                                            <i data-feather='minimize-2' class="avatar-icon"></i>
                                                        </span>
                                                    </div>
                                                    <div class="my-auto">
                                                        <h4 class="fw-bolder mb-0 "><?= $nbre_transaction_mobile_money ?></h4>
                                                        <p class="card-text font-small-3 mb-0"> Transactions Mobile Money</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                                <div class="d-flex flex-row">
                                                    <div class="avatar bg-light-success me-2">
                                                        <div class="avatar-content">
                                                            <i data-feather='activity' class="avatar-icon"></i>

                                                        </div>
                                                    </div>
                                                    <div class="my-auto">
                                                        <h4 class="fw-bolder mb-0"><?= $nbre_operation; ?></h4>
                                                        <p class="card-text font-small-3 mb-0">Opérations (WU, RIA, MG)</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
                                                <div class="d-flex flex-row">
                                                    <div class="avatar bg-light-danger me-2">
                                                        <div class="avatar-content">
                                                            <i data-feather="trending-down" class="avatar-icon"></i>

                                                        </div>
                                                    </div>
                                                    <div class="my-auto">
                                                        <h4 class="fw-bolder mb-0"><?= $nbre_depense; ?></h4>
                                                        <p class="card-text font-small-3 mb-0">Dépenses</p>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/ Statistics Card -->
                        </div>

                        <!--
                        <div id="chart">
                        </div> 
                        -->




                    </section>
                    <!-- Dashboard Ecommerce ends -->

                </div>
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


    <!-- BEGIN: FICHIERS JS DES PAGES -->
    <!-- <script src="js/template/pages/dashboard-ecommerce.js"></script>

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- START: Footer-->
    <?php include 'includes/footer.php' ?>
    <!-- END: Footer-->
    <?php include 'js/logiques/reporting_logiques.php' ?>
    <?php include 'js/logiques/home_logiques.php' ?>

    <script src="js/plugins/charts/apexcharts.min.js"></script>
    <script src="js/plugins/charts/apexcharts.m.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script>
        var options = {
            chart: {
                type: 'bar'
            },
            series: [{
                name: 'sales',
                data: [30, 40, 45, 50, 49, 60, 70, 91, 125]
            }],
            xaxis: {
                categories: [1991, 1992, 1993, 1994, 1995, 1996, 1997, 1998, 1999]
            }
        }

        var chart = new ApexCharts(document.querySelector("#chart"), options);

        chart.render();
    </script>


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