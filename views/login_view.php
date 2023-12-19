<!DOCTYPE html>
<html lang="fr" data-textdirection="ltr">

<head>
    <title><?= APP_NAME ?> - Connexion</title>

    <!-- Fichiers CSS par défaut (TEMPLATE) -->
    <?php include_once 'includes/head.php' ?>

    <!-- Fichiers CSS spécifiques a la page (TEMPLATE) -->
    <link rel="stylesheet" type="text/css" href="css/template/pages/authentication.css">
    <link rel="stylesheet" type="text/css" href="css/template/vendors.min.css">

    <!-- Mes fichiers style CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>



<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
    <?php include('views/includes/toast.php'); ?>

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
                            <div class="d-flex col-lg-10 align-items-center">
                                <img src="assets/images/logo.png" alt="" height="50px">
                                <h2 class="brand-text text-primary ms-1">Kaspy Changes Office</h2>
                            </div>
                        </a>
                        <!-- /Brand logo-->

                        <!-- Left Text-->
                        <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                            <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img class="img-fluid" src="assets/images/auth/login.svg" alt="Connexion" /></div>
                        </div>
                        <!-- /Left Text-->

                        <!-- Login-->
                        <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                                <h2 class="card-title fw-bold mb-1">Bienvenue sur Kaspy Changes Office, votre plateforme de gestion de transactions 👋</h2>
                                <p class="card-text mb-2">Connectez vous pour démarrer</p>
                                <form id="login_form" name="login_form" action="controllers/login_controller.php" method="POST">
                                    <div class="mb-1">
                                        <label class="form-label" for="login_user">Nom d'utilisateur</label>
                                        <input class="form-control" name="login_user" id="login_user" type="text" placeholder="Saisir votre nom d'utilisateur" autofocus="" tabindex="1" autocomplete="off" maxlength="100" required />
                                    </div>
                                    <div class="mb-1">
                                        <small id="userHelp" class="text-danger invisible"></small>
                                    </div>

                                    <div class="mb-1">
                                        <div class="d-flex justify-content-between">
                                            <label class="form-label" for="login_password">Mot de passe</label><a href="index.php?page=forgot_password"><small>Mot de passe oublié ?</small></a>
                                        </div>
                                        <div class="input-group input-group-merge form_password-toggle">
                                            <input class="form-control form-control-merge" id="login_password" type="password" name="login_password" placeholder="Saisir votre mot de passe" tabindex="2" maxlength="100" required /><span id="cacher_mdp" class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                        </div>
                                    </div>
                                    <div class="mb-1"><small id="passwordHelp" class="text-danger invisible"></small></div>


                                    <div class="form-group input-group mb-1">
                                        <select class="form-control" id="bureau" name="bureau" tabindex="3" required>
                                            <option selected="selected">Choisir le magasin...</option>
                                            <?php
                                            // chemin d'accès au fichier JSON
                                            $file = 'config/bureaux.json';
                                            // mettre le contenu du fichier dans une variable
                                            $data = file_get_contents($file);
                                            // décoder et accéder aux flux JSON
                                            $listesRoot_Bureau = json_decode($data, true);

                                            foreach ($listesRoot_Bureau as $key => $bureau) {
                                            ?>
                                                <option><?= $bureau['nom']; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group input-group mb-3">
                                        <select class="form-control" id="annee" name="annee" tabindex="4" required>
                                            <option selected="selected">Choisir l'année...</option>
                                            <?php
                                            foreach ($annees as $key => $annee) {
                                            ?>
                                                <option><?= $annee['annees']; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="mb-1">
                                        <div class="form-check">
                                            <input class="form-check-input" id="UserResterConnecte" name="UserResterConnecte" type="checkbox" tabindex="5" />
                                            <label class="form-check-label" for="UserResterConnecte"> Rester connecter</label>
                                        </div>
                                    </div>

                                    <button id="bt_login" type="submit" class="btn btn-primary w-100" tabindex="6" name="btn_login" disabled>Se connecter</button>
                                </form>
                                <p class="text-center mt-2"><span>Pas encore de compte ?</span><a href="index.php?page=logon"><span>&nbsp;S'inscrire</span></a></p>

                            </div>
                        </div>
                        <!-- /Login-->
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
    <script src="js/template/app.js"></script>


    <!-- BEGIN: FICHIERS JS DES PAGES -->


    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>


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

    <?php include 'js/logiques/login_logiques.php' ?>

    <?php include 'js/logiques/reporting_logiques.php' ?>




    <script>
        // CACHER ET MONTRER LE MOT DE PASSE
        $('#cacher_mdp').on('click', function(e) {
            e.preventDefault();
            if ($('#login_password').attr('type') === 'text') {
                $('#login_password').attr('type', 'password');
                if (feather) {
                    $('#cacher_mdp').find('svg').replaceWith(feather.icons['eye'].toSvg({
                        class: 'font-small-4'
                    }));
                }

            } else if ($('#login_password').attr('type') === 'password') {
                $('#login_password').attr('type', 'text');
                if (feather) {
                    $('#cacher_mdp').find('svg').replaceWith(feather.icons['eye-off'].toSvg({
                        class: 'font-small-4'
                    }));
                }
            }
        });
    </script>
</body>
<!-- END: Body-->

</html>