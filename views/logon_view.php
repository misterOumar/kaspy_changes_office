<!DOCTYPE html>
<html lang="fr" data-textdirection="ltr">

<head>
    <title><?= APP_NAME ?> - Inscription</title>

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
                                    <div class="bs-stepper-header px-0" role="tablist">
                                        <div class="step" data-target="#account-details" role="tab" id="account-details-trigger">
                                            <button type="button" class="step-trigger">
                                                <span class="bs-stepper-box">
                                                    <i data-feather="lock" class="font-medium-3"></i>
                                                </span>
                                                <span class="bs-stepper-label">
                                                    <span class="bs-stepper-title">Compte</span>
                                                    <span class="bs-stepper-subtitle">Info de connexion</span>
                                                </span>
                                            </button>
                                        </div>
                                        <div class="line">
                                            <i data-feather="chevron-right" class="font-medium-2"></i>
                                        </div>
                                        <div class="step" data-target="#personal-info" role="tab" id="personal-info-trigger">
                                            <button type="button" class="step-trigger">
                                                <span class="bs-stepper-box">
                                                    <i data-feather="user" class="font-medium-3"></i>
                                                </span>
                                                <span class="bs-stepper-label">
                                                    <span class="bs-stepper-title">Identité</span>
                                                    <span class="bs-stepper-subtitle">info personnelle</span>
                                                </span>
                                            </button>
                                        </div>
                                        <div class="line">
                                            <i data-feather="chevron-right" class="font-medium-2"></i>
                                        </div>
                                        <div class="step" data-target="#billing" role="tab" id="billing-trigger">
                                            <button type="button" class="step-trigger">
                                                <span class="bs-stepper-box">
                                                    <i data-feather="user-check" class="font-medium-3"></i>
                                                </span>
                                                <span class="bs-stepper-label">
                                                    <span class="bs-stepper-title">Confirmation</span>
                                                    <span class="bs-stepper-subtitle">Validation du compte</span>
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="bs-stepper-content px-0 mt-10">
                                        <div id="account-details" class="content" role="tabpanel" aria-labelledby="account-details-trigger">
                                            <div class="content-header mb-2">
                                                <h2 class="fw-bolder mb-75">Information du compte utilisateur</h2>
                                                <span>Entrer vos paramètres de connexion</span>
                                            </div>
                                            <form name="form1" id="form1">
                                                <div class="row">
                                                    <div class="col-md-6 mb-1">
                                                        <label class="form-label" for="select2-icons">Type de compte</label>
                                                        <select name="type_compte" id="type_compte" data-placeholder="Choisir un type de compte..." class="select2-icons form-select">
                                                            <option selected data-icon="facebook">Choisir un type de compte...</option>
                                                            <?php
                                            foreach ($Liste_role as $role) {
                                            ?>
                                                <option value="<?= $role['id'] ?>">
                                                    <?= $role['libelle'] ?>
                                                </option>
                                            <?php
                                            }
                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 mb-1">
                                                        <label class="form-label" for="username">Nom d'utilisateur</label>
                                                        <input name="username" id="username" type="text" class="form-control" placeholder="Saisir votre nom d'utilisateur" maxlength="30" />
                                                    </div>
                                                    <div class="mb-1"><small id="userHelp" class="text-danger invisible"></small></div>
                                                </div>
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
                                            </form>

                                            <div class="d-flex justify-content-between mt-2">
                                                <button id="btn_prev_1" class="btn btn-outline-secondary btn-prev">
                                                    <i data-feather="chevron-left" class="align-middle me-sm-25 me-0"></i>
                                                    <span class="align-middle d-sm-inline-block d-none">Connexion</span>
                                                </button>
                                                <button name="btn_next_1" id="btn_next_1" class="btn btn-primary btn-next">
                                                    <span class="align-middle d-sm-inline-block d-none">Suivant</span>
                                                    <i data-feather="chevron-right" class="align-middle ms-sm-25 ms-0"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div id="personal-info" class="content" role="tabpanel" aria-labelledby="personal-info-trigger">
                                            <div class="content-header mb-2">
                                                <h2 class="fw-bolder mb-75">Informations personnelles</h2>
                                                <span>Entrer vos informations d'identification</span>
                                            </div>
                                            <form name="form2" id="form2">

                                                <div class="d-flex">
                                                    <a href="#" class="me-25">
                                                        <img src="assets/images/users/user_default.jpg" id="image_profile-img" class="uploadedAvatar rounded me-50" alt="Photo profile" height="100" width="100" />
                                                    </a>

                                                    <!-- upload and reset button -->
                                                    <div class="d-flex align-items-end mt-75 ms-1">
                                                        <div>
                                                            <label id="bt_charger_photo" for="photo_profile" class="btn btn-sm btn-primary mb-75 me-75">Charger</label>
                                                            <input type="file" name="photo_profile" id="photo_profile" hidden accept=".jpg, .png, .jpeg,|image/*" onchange="VoirFichier(this, '#image_profile-img');" />
                                                            <button type="button" id="photo_profile-reset" class="btn btn-sm btn-outline-secondary mb-75">Annuler</button>
                                                            <p class="mb-0">Charger une images de type: png, jpg, jpeg.</p>
                                                        </div>
                                                    </div>
                                                    <!--/ upload and reset button -->
                                                </div>

                                                <!-- Radio SEXE -->
                                                <div class="row mb-n2 pb-n2">
                                                    <div class="demo-inline-spacing">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="radio_sexe" id="radio_homme" value="Homme" />
                                                            <label class="form-check-label" for="radio_homme">Homme</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="radio_sexe" id="radio_femme" value="Femme" />
                                                            <label class="form-check-label" for="radio_femme">Femme</label>
                                                        </div>
                                                    </div>
                                                    <div class='mb-1'><small id='sexeHelp' class='text-danger invisible'></small></div>
                                                </div>

                                                <div class="row" style="margin-bottom:-17px">
                                                    <div class="mb-1 col-md-6">
                                                        <label class="form-label" for="nom">Nom et prénoms *</label>
                                                        <input type="text" name="nom" id="nom" class="form-control" placeholder="Saisir votre nom et prénom(s)" required maxlength="75" />
                                                        <div class='mb-1'><small id='nomHelp' class='text-danger invisible'></small></div>
                                                    </div>

                                                    <div class="col-md-6 mb-1">
                                                        <label class="form-label" for="date_naissance">Date de naissance</label>
                                                        <input type="text" id="date_naissance" name="date_naissance" class="form-control flatpickr-basic" placeholder="YYYY-MM-DD" />
                                                    </div>
                                                </div>

                                                <div class="row" style="margin-bottom:-17px">
                                                    <div class="col-md-6 mb-1">
                                                        <label class="form-label" for="contact">Contact *</label>
                                                        <input type="text" name="contact" id="contact" class="form-control mobile-number-mask " placeholder="Saisir votre contact, Ex : +225 .. .. .. .. .." required maxlength="20" />
                                                        <div class='mb-1'><small id='contactHelp' class='text-danger invisible'></small></div>
                                                    </div>

                                                    <div class="col-md-6 mb-1">
                                                        <label class="form-label" for="email">Email *</label>
                                                        <input type="email" name="email" id="email" class="form-control" placeholder="Saisir votre email" required maxlength="75" />
                                                        <div class='mb-1'><small id='emailHelp' class='text-danger invisible'></small></div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="mb-1 col-md-6 ">
                                                        <label class="form-label" for="fonction">Fonction</label>
                                                        <input type="text" name="fonction" id="fonction" class="form-control" placeholder="Saisir votre fonction" maxlength="75" />
                                                    </div>

                                                    <div class="col-6 mb-1">
                                                        <label class="form-label" for="adresse">Adresse</label>
                                                        <input type="text" name="adresse" id="adresse" class="form-control" placeholder="Saisir votre lieu d'habitation" maxlength="75" />
                                                    </div>
                                                </div>

                                            </form>

                                            <div class="d-flex justify-content-between mt-2">
                                                <button name="btn_prev_2" id="btn_prev_2" class="btn btn-primary btn-prev2">
                                                    <i data-feather="chevron-left" class="align-middle me-sm-25 me-0"></i>
                                                    <span class="align-middle d-sm-inline-block d-none">Précédent</span>
                                                </button>
                                                <button name="btn_next_2" id="btn_next_2" class="btn btn-primary btn-next">
                                                    <span class="align-middle d-sm-inline-block d-none">Suivant</span>
                                                    <i data-feather="chevron-right" class="align-middle ms-sm-25 ms-0"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div id="billing" class="content" role="tabpanel" aria-labelledby="billing-trigger">
                                            <form name="form3" id="form3">
                                                <!-- two steps verification v2-->
                                                <div class="d-flex ">
                                                    <div class="">
                                                        <h2 class="card-title fw-bolder mb-1">Veuillez confirmer votre code &#x1F4AC;</h2>
                                                        <p class="card-text mb-75">Nous vous avons envoyé un code de vérification par email. <br>Veuillez entrez le code dans le champ ci-dessous.</p>
                                                        <p id="cacher_email" class="card-text fw-bolder mb-2">******0789</p>
                                                        <form class="mt-2">
                                                            <h6>Tapez votre code de sécurité à 6 chiffres</h6>
                                                            <div class="auth-input-wrapper d-flex align-items-center justify-content-between">
                                                                <input id="code1" class="form-control auth-input height-50 text-center numeral-mask mx-25 mb-1" type="text" maxlength="1" autocomplete="off" autofocus="" />
                                                                <input id="code2" class="form-control auth-input height-50 text-center numeral-mask mx-25 mb-1" type="text" maxlength="1" autocomplete="off" />
                                                                <input id="code3" class="form-control auth-input height-50 text-center numeral-mask mx-25 mb-1" type="text" maxlength="1" autocomplete="off" />
                                                                <input id="code4" class="form-control auth-input height-50 text-center numeral-mask mx-25 mb-1" type="text" maxlength="1" autocomplete="off" />
                                                                <input id="code5" class="form-control auth-input height-50 text-center numeral-mask mx-25 mb-1" type="text" maxlength="1" autocomplete="off" />
                                                                <input id="code6" class="form-control auth-input height-50 text-center numeral-mask mx-25 mb-1" type="text" maxlength="1" autocomplete="off" />
                                                            </div>
                                                            <button type="button" id="bt_verifier_compte" name="bt_verifier_compte" class="btn btn-primary w-100" tabindex="4">Vérifier mon compte</button>
                                                        </form>
                                                        <p class="text-center mt-2"><span>Vous n'avez pas reçu le code ?</span><a href="Javascript:void(0)"><span>&nbsp;Renvoyer</span></a><span> ou</span><a href="Javascript:void(0)"><span>&nbsp;Contactez nous</span></a></p>
                                                    </div>
                                                </div>

                                            </form>
                                            <div class="d-flex justify-content-between mt-1">
                                                <button name="btn_prev_3" id="btn_prev_3" class="btn btn-primary btn-prev">
                                                    <i data-feather="chevron-left" class="align-middle me-sm-25 me-0"></i>
                                                    <span class="align-middle d-sm-inline-block d-none">Précédent</span>
                                                </button>
                                                <button id="bt_enregistrer" name="bt_enregistrer" class="btn btn-success bt_enregistrer" style="display: none;">
                                                    <i data-feather="check" class="align-middle me-sm-25 me-0"></i>
                                                    <span class="align-middle d-sm-inline-block d-none">Terminer votre inscription</span>
                                                </button>
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