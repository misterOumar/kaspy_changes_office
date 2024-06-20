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
    <title><?= APP_NAME ?> - Accueil</title>

    <!-- Fichiers CSS par défaut (TEMPLATE) -->
    <?php include_once 'includes/head.php' ?>
    <!-- Fichier fenetre des differents Liste et journaux -->

    <!-- Fichiers CSS spécifiques a la page (TEMPLATE) -->
    <link rel="stylesheet" type="text/css" href="css/template/vendors.min.css">
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
                        <div class="row">
                            <!-- Medal Card -->
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
                                                <img src="assets/images/template/ria.png" class="img-fluid" alt="Medal Pic" style="max-width:100px;" />
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
                                                <img src="assets/images/template/westernunion.png" class="img-fluid" alt="Medal Pic" style="width:7rem;height:7rem; border-radius:50%; object-fit:cover" />
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
                                                <img src="assets/images/template/gram.png" class="img-fluid" alt="Medal Pic" style="max-width:100px;" />
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>



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
                                                <img src="assets/images/template/orm.png" class="img-fluid" alt="Medal Pic" style="width:7rem;height:7rem; border-radius:50%; object-fit:cover" />
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
                                                <img src="assets/images/template/moov.png" class="img-fluid" alt="Medal Pic" style="width:7rem;height:7rem; object-fit:cover" />
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
                                                <img src="assets/images/template/mtn.png" class="img-fluid" alt="Medal Pic" style="max-width:100px;" />
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>



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
                                                <img src="assets/images/template/cartes.png" class="img-fluid" alt="Medal Pic" style="max-width:100px;" />
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
                                                <img src="assets/images/template/rechargement_uba.png" class="img-fluid" alt="Medal Pic" style="max-width:145px;" />
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                            <!-- AFFICHAGE DES CHANGES SUR LE HOME -->
                            <?php if (intval($_SESSION['KaspyISS_user_details'][2]['lecture']) === 1) { ?>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <a href="index.php?page=achat_devises">
                                        <div class="card card-congratulation-medal">
                                            <div class="card-body d-flex align-items-center justify-content-between">
                                                <div>
                                                    <h5>Achat de dévise</h5>
                                                    <p class="card-text font-small-3"> Transactions </p>
                                                </div>
                                                <!-- <a href="index.php?page=ria" class="btn btn-primary">Ria </a> -->
                                                <img src="assets/images/template/changes.png" class="img-fluid" alt="Medal Pic" style="max-width:100px;" />
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
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

            <!-- jQuery -->
            <script src="plugins/jquery/jquery.min.js"></script>

            <!-- START: Footer-->
            <!--?php include 'includes/footer.php' ?-->
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
</body>
<!-- END: Body-->

</html>