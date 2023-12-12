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
    <!-- Fichier fenetre des differents Liste et journaux -->
    <?php include_once 'components/journal_recouvrement.php' ?>
    <?php include_once 'components/batiment_par_proprietaire.php' ?>

    <!-- Fichiers CSS spécifiques a la page (TEMPLATE) -->
    <link rel="stylesheet" type="text/css" href="css/template/vendors.min.css">

    <link rel="stylesheet" type="text/css" href="css/plugins/tables/datatable/buttons.bootstrap5.min.css">
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
                            <h2 class="content-header-title float-start mb-0">Gestion des Utilisateurs</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php?page=home">Accueil</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Configurations</a>
                                    </li>
                                    <li class="breadcrumb-item active">Utilisateurs
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Include Menu toogle droit-->
                <?php include 'components/menu_toggle_droit.php' ?>
            </div>


            <div class="header-navbar-shadow"></div>
            <div class="content-wrapper container-xxl p-0">
                <div class="content-header row">
                </div>
                <div class="content-body">
                    <!-- users list start -->
                    <section class="app-user-list">
                        <div class="row">
                            <div class="col-lg-3 col-sm-6">
                                <div class="card">
                                    <div class="card-body d-flex align-items-center justify-content-between">
                                        <div>
                                            <h3 class="fw-bolder mb-75"><?php echo $Nbr_user_Total[0] ?></h3>
                                            <span>Nombre utilisateurs</span>
                                        </div>
                                        <div class="avatar bg-light-primary p-50">
                                            <span class="avatar-content">
                                                <i data-feather="user" class="font-medium-4"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="card">
                                    <div class="card-body d-flex align-items-center justify-content-between">
                                        <div>
                                            <h3 class="fw-bolder mb-75"><?php echo $Nbr_user_Bloqued[0]  ?></h3>
                                            <span>Utilisateurs bloqués</span>
                                        </div>
                                        <div class="avatar bg-light-danger p-50">
                                            <span class="avatar-content">
                                                <i data-feather="user-plus" class="font-medium-4"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="card">
                                    <div class="card-body d-flex align-items-center justify-content-between">
                                        <div>
                                            <h3 class="fw-bolder mb-75"><?php echo $Nbr_user_Connected[0] ?></h3>
                                            <span>Utilisateurs connectés</span>
                                        </div>
                                        <div class="avatar bg-light-success p-50">
                                            <span class="avatar-content">
                                                <i data-feather="user-check" class="font-medium-4"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="card">
                                    <div class="card-body d-flex align-items-center justify-content-between">
                                        <div>
                                            <h3 class="fw-bolder mb-75"><?php echo $Nbr_user_disConnected[0]  ?></h3>
                                            <span>Utilisateurs déconnectés</span>
                                        </div>
                                        <div class="avatar bg-light-warning p-50">
                                            <span class="avatar-content">
                                                <i data-feather="user-x" class="font-medium-4"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Hoverable rows start -->
                        <div class="row" id="table-hover-row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Liste des utilisateurs (Groupware)</h4>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th style="width: 5%">Photo</th>
                                                    <th>Utilisateur</th>
                                                    <th>Type de compte</th>
                                                    <th style="width: 30%">Status</th>
                                                    <th style="width: 20%">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                // On récupère les données
                                                for ($j = 0; $j < count($users); $j++) {
                                                ?>
                                                    <tr>
                                                        <td>
                                                            <div data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar pull-up my-0" title=<?php echo strSecur($users[$j]['users']) ?>>
                                                                <img src="<?php echo 'assets/images/users/' .  $users[$j]["photo"] ?>" alt="" height="40" width="40" />
                                                            </div>
                                                        </td>

                                                        <td> <?php echo strSecur($users[$j]['users']); ?> </td>
                                                        <td> <a class="modif_type_compte" id=<?= strSecur($users[$j]['id']); ?> href="#" data-bs-toggle="modal" data-bs-target="#primary"> <span data-bs-toggle="tooltip" title="Modifier le type de compte"> <?php echo strSecur($users[$j]['type_compte_reel']); ?> </span> </a></td>

                                                        <!-- STATUT -->
                                                        <td>
                                                            <span class="badge bg-info"> <?php echo $users[$j]["valide_compte"] == 1 ? "Compte validé" : "Compte non validé"; ?>
                                                            </span>

                                                            <span class="badge bg-warning"> <?php echo $users[$j]["bloqued"] == 1 ? "Compte désactivé" : "Compte activé"; ?>
                                                            </span>

                                                            <span class="<?php echo strSecur($users[$j]["connected"]) == 1 ? "badge bg-success" : "badge bg-danger"; ?>">
                                                                <?php echo $users[$j]["connected"] == 1 ? "Connecté" : "Déconnecté"; ?>
                                                            </span>
                                                        </td>

                                                        <td>
                                    </div class="btn-group-horizontal">
                                    <a class="btn btn-warning" href="index.php?page=gestion_users&idBloquerActiver=<?= strSecur($users[$j]['id']); ?>" data-bs-toggle="tooltip" title="<?php echo strSecur($users[$j]["bloqued"]) == 1 ? "Activer" : "Désactiver" ?>">

                                        <span class="<?php echo strSecur($users[$j]["bloqued"]) == '1' ? "fas fa-unlock-alt" : "fas fa-lock"; ?>"></span>
                                    </a>

                                    <a class="btn btn-danger link-delete-button" id=<?= strSecur($users[$j]['id']); ?> name="<?= strSecur($users[$j]['users']) ?>" data-bs-toggle="tooltip" title="Supprimer"><span class="fas fa-trash"></span>
                                    </a>
                                    <a class="btn btn-danger disconnect" id=<?= strSecur($users[$j]['id']); ?> name="<?= strSecur($users[$j]['users']) ?>" data-bs-toggle="tooltip" title="Deconnecter"><span class="fas fa-window-close"></span>
                                    </a>
                                </div>
                                </td>
                                </tr>

                            <?php
                                                }
                            ?>

                            </tbody>
                            </table>
                            </div>
                        </div>
                </div>
            </div>
            <!-- Hoverable rows end -->

        </div>
    </div>
    </div>
    </div>



    <!-- Modal -->
    <div class="modal fade text-start modal-primary" id="primary" tabindex="-1" aria-labelledby="myModalLabel160" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel160">Modification du type de compte</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col mb-1">
                        <label class="form-label" for="select2-icons">Type de compte</label>
                        <select name="type_compte" id="type_compte" data-placeholder="Choisir un type de compte..." class="select2-icons form-select">
                            <option selected data-icon="facebook">Choisir un type de compte...</option>

                            <?php
                            foreach ($Liste_Role_permission as $role) {
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
                <div class="modal-footer">
                    <button type="button" id="bt_enregistrer" class="btn btn-primary" data-bs-dismiss="modal">Enregistrer</button>
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

    <script src="js/template/pages/app-user-list.js"></script>
    <script src="js/plugins/tables/datatable/buttons.html5.min.js"></script>
    <script src="js/plugins/tables/datatable/buttons.print.min.js"></script>

    <script src="js/template/app.js"></script>
    <script src="js/template/app-menu.js"></script>

    <!-- START: Footer-->
    <?php include 'includes/footer.php' ?>
    <!-- END: Footer-->

    <?php include 'js/logiques/gestion_users_logiques.php' ?>
    <?php include 'js/droits_access/gestion_DroitsAccess_GestionUtilisateur.php' ?>
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