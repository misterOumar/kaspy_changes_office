<!DOCTYPE html>
<html lang="fr" data-textdirection="ltr">

<head>
    <title><?= APP_NAME ?> - changePassword</title>

    <!-- Fichiers CSS par défaut (TEMPLATE) -->
    <?php include_once 'includes/head.php' ?>
    <!-- Fichiers CSS spécifiques a la page (TEMPLATE) -->
    <link rel="stylesheet" type="text/css" href="css/template/forms/bs-stepper.min.css">
    <link rel="stylesheet" type="text/css" href="css/template/forms/form-wizard.css">
    <link rel="stylesheet" type="text/css" href="css/template/pages/authentication.css">

    <link rel="stylesheet" type="text/css" href="css/template/forms/pickers/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="css/template/forms/pickers/form-flat-pickr.css">

    <!-- Mes fichiers style CSS -->
</head>
<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static" data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-cover">
                    <div class="auth-inner row m-0">
                        <!-- Brand logo-->
                        <a class="brand-logo">
                            <div class="d-flex col-lg-3 align-items-center">
                                <img src="assets/images/logo.png" alt="" height="50px">
                                <h2 class="brand-text text-primary ms-0">Kaspy Holding <br> X7</h2>
                            </div>
                        </a>
                        <!-- /Brand logo-->
                        <!-- Left Text-->
                        <div class="col-lg-3 d-none d-lg-flex align-items-center p-0">
                            <div class="w-100 d-lg-flex align-items-center justify-content-center">
                                <img class="img-fluid w-100" src="assets/images/auth/logon.svg" alt="Création de compte utilisateur" />
                            </div>
                        </div>
                        <!-- /Left Text-->

                        <!-- Register-->
                        <div class="col-lg-9 d-flex align-items auth-bg px-2 px-sm-3 px-lg-5 pt-4">
                            <div class="width-700 mx-auto">
                                <div class="Kaspy_Stepper bs-stepper register-multi-steps-wizard shadow-none">


                                    <div class="bs-stepper-content px-0 mt-10">
                                        <div id="account-details" class="content" role="tabpanel" aria-labelledby="account-details-trigger">
                                            <div class="content-header mb-2">
                                                <h2 class="fw-bolder mb-75">Modification du mot de passe</h2>
                                                <span>Veuillez saisir votre nouveau mot de passe</span>
                                            </div>
                                            <form name="form1" id="form1">
                                                <div class="row">
                                                    <div class="col-md-6 mb-1">
                                                        <label class="form-label" for="password">Mot de passe</label>
                                                        <div class="input-group input-group-merge form-password-toggle">
                                                            <input type="password" name="password" id="password" class="form-control" placeholder="Saisir votre mot de passe" maxlength="255" minlength="4" />
                                                            <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                                        </div>
                                                        <div class="mb-1"><small id="passwordHelp" class="text-danger invisible"></small></div>
                                                    </div>

                                                    <div class="col-md-6 mb-1">
                                                        <label class="form-label" for="confirm_password">Comfirmer le mot de passe</label>
                                                        <div class="input-group input-group-merge form-password-toggle">
                                                            <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Saisir à nouveau votre mot de passe" maxlength="255" minlength="4" />
                                                            <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                                        </div>
                                                        <div class="mb-1"><small id="confirmpasswordHelp" class="text-danger invisible"></small></div>
                                                    </div>
                                                </div>

                                                <button type="submit" id='bt_change_password' name='bt_change_password' class='btn btn-primary enregistrer me-5'>Changer</button>
                                            </form>

                                            <!-- <div class="d-flex justify-content-between mt-2">
                                                <button name="btn_next_1" id="btn_next_1" class="btn btn-primary btn-next">
                                                    <span class="align-middle d-sm-inline-block d-none">Changer</span>
                                                    <i data-feather="chevron-right" class="align-middle ms-sm-25 ms-0"></i>
                                                </button>
                                            </div> -->
                                            
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- END: Content-->


    <?php include 'includes/toast.php' ?>

    <!-- ***************************************** FICHIERS JS ************************************************************** -->

    <!-- BEGIN: FICHIERS JS DU TEMPLATE -->
    <script src="js/template/vendors.min.js"></script>
    <script src="js/template/app-menu.js"></script>
    <script src="js/template/app.js"></script>


    <!-- BEGIN: FICHIERS JS DES PAGES -->
    <script src="js/template/forms/wizard/bs-stepper.min.js"></script>

    <script src="js/template/forms/cleave/cleave.min.js"></script>
    <script src="js/template/forms/cleave/addons/cleave-phone.ci.js"></script>

    <script src="js/template/pages/auth-register.js"></script>
    <script src="js/template/pages/page-account-settings-account.js"></script>
    <script src="js/template/forms/pickers/flatpickr/flatpickr.min.js"></script>
    <script src="js/template/forms/pickers/form-pickers.js"></script>
    <script src="js/template/extensions/sweetalert2.all.min.js"></script>

    <!-- <script src="js/template/forms/select/form-select2.js"></script> -->
    <!-- <script src="js/template/forms/select/select2.full.min.js"></script> -->
    <!-- <script src="js/template/forms/validation/jquery.validate.min.js"></script> -->


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

    <?php include 'js/logiques/logon_logiques.php' ?>
    <?php include 'js/logiques/reporting_logiques.php' ?>


</body>
<!-- END: Body-->

</html>