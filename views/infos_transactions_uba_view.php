<!-- Sécurité supplémentaire des pages, obligation de tooting via index-->
<?php
if (!isset($_SESSION["KaspyISS_user"])) {
    header("Location: index.php?page=login");
}
;
?>
<!-- End of the secure -->


<!DOCTYPE html>
<html class="loading" lang="fr" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <title>
        <?= APP_NAME ?> - Informations de la transaction
    </title>

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
                            <h2 class="content-header-title float-start mb-0">Informations de la transaction</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php?page=home">Accueil</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Structures</a>
                                    </li>
                                    <li class="breadcrumb-item active">Informations
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Include Menu toogle droit-->

                <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                    <div class="mb-1 breadcrumb-right">
                            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="retourArriere"><i
                                    data-feather="corner-down-left"></i></button>
                    </div>
                </div>

                <div class="my-3 p-3 bg-body rounded shadow-sm" style="color: white">
                    <div class="majuscules">id : <span style="text-transform:lowercase; color:black; font-weight:bolder;" id="id"><?=$_GET['id']?></span></div>
                    <div class="majuscules">Trans_ID : <span style="text-transform:lowercase; color:black; font-weight:bolder;" id="Heure_et_date"><?=$_GET['Trans_ID']?></span></div>
                    <div class="majuscules">Dates : <span style="text-transform:lowercase; color:black; font-weight:bolder;" id="Num_Ref"><?=$_GET['Dates']?></span></div>
                    <div class="majuscules">Amount : <span id="Identifiant_utilisateur"><?=$_GET['Amount']?></span></div>

                    <div class="majuscules">Fees : <span style="text-transform:lowercase; color:black; font-weight:bolder;" id="ID_point_vente"><?=$_GET['Fees']?></span></div>
                    <div class="majuscules">Running_Bal : <span style="text-transform:lowercase; color:black; font-weight:bolder;" id="Montant"><?=$_GET['Running_Bal']?></span></div>
                    <div class="majuscules">Description: <span style="text-transform:lowercase; color:black; font-weight:bolder;" id="Frais"><?=$_GET['Description']?></span></div>
                    <div class="majuscules">Reference : <span style="text-transform:lowercase; color:black; font-weight:bolder;" id="Total"><?=$_GET['Reference']?></span></div>
                    <div class="majuscules">Account_id: <span style="text-transform:lowercase; color:black; font-weight:bolder;" id="Account_Id"><?=$_GET['Account_Id']?></span></div>
                    <div class="majuscules">Last_Name: <span style="text-transform:lowercase; color:black; font-weight:bolder;" id="Last_Name"><?=$_GET['Last_Name']?></span></div>
                    <div class="majuscules">Ajouter par : <span style="text-transform:lowercase; color:black; font-weight:bolder;" id="ajouter_par"><?=$_GET['nom_prenom']?></span></div>
                </div>
                <div class="my-3 p-3 bg-body rounded shadow-sm" style="color: white">

                    <div class="majuscules">date creation : <span style="text-transform:lowercase; color:black; font-weight:bolder;" id="date_creation"><?=$_GET['date_creation']?></span></div>
                    <div class="majuscules">user creation : <span style="text-transform:lowercase; color:black; font-weight:bolder;" id="user_creation"><?=$_GET['user_creation']?></span></div>
                    <div class="majuscules">navigateur creation : <span style="text-transform:lowercase; color:black; font-weight:bolder;" id="navigateur_creation"><?=$_GET['navigateur_creation']?></span></div>
                    <div class="majuscules">ordinateur creation : <span style="text-transform:lowercase; color:black; font-weight:bolder;" id="ordinateur_creation"><?=$_GET['ordinateur_creation']?></span></div>
                    <div class="majuscules">ip creation : <span style="text-transform:lowercase; color:black; font-weight:bolder;" id="ip_creation"><?=$_GET['ip_creation']?></span></div>
                    <div class="majuscules">date modif : <span style="text-transform:lowercase; color:black; font-weight:bolder;" id="date_modif"><?=$_GET['date_modif']?></span></div>
                    <div class="majuscules">user modif : <span style="text-transform:lowercase; color:black; font-weight:bolder;" id="user_modif"><?=$_GET['user_modif']?></span></div>
                    <div class="majuscules">navigateur modif : <span style="text-transform:lowercase; color:black; font-weight:bolder;" id="navigateur_modif"><?=$_GET['navigateur_modif']?></span></div>
                    <div class="majuscules">ordinateur modif : <span style="text-transform:lowercase; color:black; font-weight:bolder;" id="ordinateur_modif"><?=$_GET['ordinateur_modif']?></span></div>
                    <div class="majuscules">ip modif : <span style="text-transform:lowercase; color:black; font-weight:bolder;" id="ip_modif"><?=$_GET['ip_modif']?></span></div>
                </div>
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

    <script src="js/template/app.js"></script>
    <script src="js/template/app-menu.js"></script>

    <!-- START: Footer-->
    <?php include 'includes/footer.php' ?>
    <!-- END: Footer-->


    <?php include 'js/logiques/uba_datatable.php' ?>
    <?php include 'js/logiques/uba_logiques.php' ?>
    <?php include 'js/droits_access/gestion_DroitsAccess_Batiment.php' ?>
    <?php include 'js/logiques/reporting_logiques.php' ?>

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


    <style>
        /* Styles pour les lignes cliquables */
        .datatable-clickable-row {
            cursor: pointer;
            transition: background-color 0.3s;
        }

        /* Effet de survol */
        .datatable-clickable-row:hover {
            background-color: #f0f0f0;
            /* Couleur de fond au survol */
        }

        /*Mettre en Majuscules */
        .majuscules {
            text-transform: uppercase;
            font-weight: bold;
        }
    </style>
    </style>
</body>
<!-- END: Body-->

</html>