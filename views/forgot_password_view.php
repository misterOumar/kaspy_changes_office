<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
<!DOCTYPE html>
<html lang="fr" data-textdirection="ltr">

<head>
    <title><?= APP_NAME ?> - Mot de passe oublié</title>

    <!-- Fichiers CSS par défaut (TEMPLATE) -->
    <?php include_once 'includes/head.php' ?>

    <!-- Fichiers CSS spécifiques a la page (TEMPLATE) -->
    <link rel="stylesheet" type="text/css" href="css/template/pages/authentication.css">

    <!-- Mes fichiers style CSS -->
</head>


<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
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
                                <h2 class="brand-text text-primary ms-0">Kaspy Holding <br> X7</h2>
                            </div>
                        </a>
                        <!-- /Brand logo-->

                        <!-- Left Text-->
                        <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                            <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img class="img-fluid" src="assets/images/auth/forgot-password.svg" alt="Mot de passe oublié" /></div>
                        </div>
                        <!-- /Left Text-->

                        <!-- Forgot password-->
                        <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                                <h2 class="card-title fw-bold mb-1">Mot de passe oublié ? 🔒</h2>
                                <p class="card-text mb-2">Entrez votre email et nous vous enverrons des instructions pour réinitialiser votre mot de passe</p>
                                <form id="forgot_form" name="forgot_form" class="auth-forgot-password-form mt-2" action="controllers/forgot_password_controller.php" method="POST">
                                    <div class="mb-1">
                                        <label class="form-label" for="forgot-password-email">Email</label>
                                        <input id="forgot_email" name="forgot_email" class="form-control"  type="text" placeholder="Veuillez saisir votre email" aria-describedby="forgot-password-email" autofocus="" tabindex="1" />
                                    </div>
                                    <div class="mb-1">
                                        <small id="emailHelp" class="text-danger invisible"></small>
                                    </div>

                                    <button id="btn_valider" name="btn_valider"  type="submit" class="btn btn-primary w-100" tabindex="2" disabled >Envoyer le lien de réinitialisation</button>
                                </form>
                                <p class="text-center mt-2"><a href="index.php?page=login"><i data-feather="chevron-left"></i> Retour à la page de connexion</a></p>
                            </div>
                        </div>
                        <!-- /Forgot password-->
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


    <!-- *************************************** LOGIQUE **************************************************************** -->
    <script type="text/javascript">
        function Vider() {
            $('#btn_valider').attr('disabled', false);
            $('#forgot_email').removeClass('is-invalid');
            $('#emailHelp').addClass('invisible');
            $('#emailHelp').html("");
            formValide = false;
        }


        // VERIFICATIONS DU FORMULAIRE
        var formValide = false;
        $('#forgot_email').on('keyup', function() {
            var user = $(this).val();
            if (user === '') {
                formValide = false;
                $('#btn_valider').attr('disabled', true);
                $('#forgot_email').addClass('is-invalid');
                $('#emailHelp').html("Veillez saisir un email de récupération");
                $('#emailHelp').removeClass('invisible');
            } else {
                formValide = true;
                $('#btn_valider').attr('disabled', false);
                $('#forgot_email').removeClass('is-invalid');
                $('#emailHelp').addClass('invisible');
                $('#emailHelp').html("");
            }
        });


        $('#forgot_form').on('submit', function(e) {
            e.preventDefault(); // Annuler le comportement par defaut du formulaire
            initializeFlash();
          
            let email = $('#forgot_email').val();
            if (email === "") {
                formValide = false;

                // MessageBox - Toast
                $('.flash').addClass('alert-warning');
                $('.flash').html('<i class="fas fa-exclamation-triangle"></i> Veuillez saisir votre email de récupération')
                    .fadeIn(300).delay(2500).fadeOut(300);
                // MessageBox - Toast

            } else {
                formValide = true;
            }


            // VALIDATION DU FORMULAIRE
            if (formValide === true) {
                $('.flash').addClass('alert-info');
                $('.flash').html('<i class="fas fa-cog fa-spin"></i> Verification...').fadeIn(300);

                var form = $(this);
                var method = form.prop('method');
                var url = form.prop('action');

                $.ajax({
                    type: method,
                    data: form.serialize() + "&btn_valider=" + true,
                    url: url,
                    success: function(result) {
                        donnee = JSON.parse(result);
                        if (donnee['result'] === 'ok') {
                            //vider()

                            // MessageBox - Toast
                            $('.flash').removeClass('alert-info').addClass('alert-success');
                            $('.flash').html('<i class="fas fa-spinner fa-spin"></i> Verification terminé, vérifié votre email...')
                                .fadeIn(300).delay(2500).fadeOut(300);
                            // MessageBox - Toast

                            window.location.href = "index.php?page=home";
                        } else {
                            $('#loginIdHelp').html(donnee['erreur']);
                            $('#loginIdHelp').removeClass('invisible');

                            // MessageBox - Toast
                            $('.flash').removeClass('alert-info').addClass('alert-danger');
                            $('.flash').html('<i class="fas fa-exclamation-circle"></i> ' + donnee['erreur'])
                                .fadeIn(300).delay(2500).fadeOut(300);
                            // MessageBox - Toast
                        }
                    }
                });
            }
        })
    </script>

</body>
<!-- END: Body-->

</html>