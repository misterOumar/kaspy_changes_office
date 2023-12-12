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
    <title><?= APP_NAME ?> - Droits d'accès</title>

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
                            <h2 class="content-header-title float-start mb-0">Gestion des droits d'accès</h2>
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
                <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                    <div class="mb-1 breadcrumb-right">
                        <div class="dropdown">
                            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="grid"></i></button>
                            <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="app-todo.html"><i class="me-1" data-feather="check-square"></i><span class="align-middle">Todo</span></a><a class="dropdown-item" href="app-chat.html"><i class="me-1" data-feather="message-square"></i><span class="align-middle">Chat</span></a><a class="dropdown-item" href="app-email.html"><i class="me-1" data-feather="mail"></i><span class="align-middle">Email</span></a><a class="dropdown-item" href="app-calendar.html"><i class="me-1" data-feather="calendar"></i><span class="align-middle">Calendar</span></a></div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="content-body">
                <h3>Liste des rôles et permissions</h3>
                <p class="mb-2">
                    Un rôle donnait accès à des menus et fonctionnalités prédéfinis afin que, <br> selon
                    le rôle attribué, un utilisateur est accès à ce dont il a besoin.
                </p>

                <!-- Role cards -->
                <div class="row">
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <span>Total 4 users</span>
                                    <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Kim Merchent" class="avatar avatar-sm pull-up">
                                            <img class="rounded-circle" src="assets/images/users/user_default.jpg" alt="Avatar" />
                                        </li>
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Sam D'souza" class="avatar avatar-sm pull-up">
                                            <img class="rounded-circle" src="assets/images/users/user_default.jpg" alt="Avatar" />
                                        </li>
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Nurvi Karlos" class="avatar avatar-sm pull-up">
                                            <img class="rounded-circle" src="assets/images/users/user_default.jpg" alt="Avatar" />
                                        </li>
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Andrew Tye" class="avatar avatar-sm pull-up">
                                            <img class="rounded-circle" src="assets/images/users/user_default.jpg" alt="Avatar" />
                                        </li>

                                    </ul>
                                </div>
                                <div class="d-flex justify-content-between align-items-end mt-1 pt-25">
                                    <div class="role-heading">
                                        <h4 class="fw-bolder">Administrator</h4>
                                        <a href="javascript:;" class="role-edit-modal" data-bs-toggle="modal" data-bs-target="#addRoleModal">
                                            <small class="fw-bolder">Edit Role</small>
                                        </a>
                                    </div>
                                    <a href="javascript:void(0);" class="text-body"><i data-feather="copy" class="font-medium-5"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <span>7 utilisateurs</span>
                                    <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Kim Merchent" class="avatar avatar-sm pull-up">
                                            <img class="rounded-circle" src="assets/images/users/user_default.jpg" alt="Avatar" />
                                        </li>
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Sam D'souza" class="avatar avatar-sm pull-up">
                                            <img class="rounded-circle" src="assets/images/users/user_default.jpg" alt="Avatar" />
                                        </li>
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Nurvi Karlos" class="avatar avatar-sm pull-up">
                                            <img class="rounded-circle" src="assets/images/users/user_default.jpg" alt="Avatar" />
                                        </li>
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Andrew Tye" class="avatar avatar-sm pull-up">
                                            <img class="rounded-circle" src="assets/images/users/user_default.jpg" alt="Avatar" />
                                        </li>
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Rossie Kim" class="avatar avatar-sm pull-up">
                                            <img class="rounded-circle" src="assets/images/users/user_default.jpg" alt="Avatar" />
                                        </li>
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Rossie Kim" class="avatar avatar-sm pull-up">
                                            <img class="rounded-circle" src="assets/images/users/user_default.jpg" alt="Avatar" />
                                        </li>
                                    </ul>
                                </div>
                                <div class="d-flex justify-content-between align-items-end mt-1 pt-25">
                                    <div class="role-heading">
                                        <h4 class="fw-bolder">Manager</h4>
                                        <a href="javascript:;" class="role-edit-modal" data-bs-toggle="modal" data-bs-target="#addRoleModal">
                                            <small class="fw-bolder">Edit Role</small>
                                        </a>
                                    </div>
                                    <a href="javascript:void(0);" class="text-body"><i data-feather="copy" class="font-medium-5"></i></a>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <!-- <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <span>5 utilisateurs</span>
                                    <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Kim Merchent" class="avatar avatar-sm pull-up">
                                            <img class="rounded-circle" src="assets/images/users/user_default.jpg" alt="Avatar" />
                                        </li>
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Sam D'souza" class="avatar avatar-sm pull-up">
                                            <img class="rounded-circle" src="assets/images/users/user_default.jpg" alt="Avatar" />
                                        </li>
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Nurvi Karlos" class="avatar avatar-sm pull-up">
                                            <img class="rounded-circle" src="assets/images/users/user_default.jpg" alt="Avatar" />
                                        </li>
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Andrew Tye" class="avatar avatar-sm pull-up">
                                            <img class="rounded-circle" src="assets/images/users/user_default.jpg" alt="Avatar" />
                                        </li>
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Rossie Kim" class="avatar avatar-sm pull-up">
                                            <img class="rounded-circle" src="assets/images/users/user_default.jpg" alt="Avatar" />
                                        </li>
                                    </ul>
                                </div>
                                <div class="d-flex justify-content-between align-items-end mt-1 pt-25">
                                    <div class="role-heading">
                                        <h4 class="fw-bolder">Users</h4>
                                        <a href="javascript:;" class="role-edit-modal" data-bs-toggle="modal" data-bs-target="#addRoleModal">
                                            <small class="fw-bolder">Edit Role</small>
                                        </a>
                                    </div>
                                    <a href="javascript:void(0);" class="text-body"><i data-feather="copy" class="font-medium-5"></i></a>
                                </div>
                            </div>
                        </div>
                    </div> -->



                    <!-- <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <span>3 utilisateurs</span>
                                    <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Kim Merchent" class="avatar avatar-sm pull-up">
                                            <img class="rounded-circle" src="assets/images/users/user_default.jpg" alt="Avatar" />
                                        </li>
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Sam D'souza" class="avatar avatar-sm pull-up">
                                            <img class="rounded-circle" src="assets/images/users/user_default.jpg" alt="Avatar" />
                                        </li>
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Nurvi Karlos" class="avatar avatar-sm pull-up">
                                            <img class="rounded-circle" src="assets/images/users/user_default.jpg" alt="Avatar" />
                                        </li>

                                    </ul>
                                </div>
                                <div class="d-flex justify-content-between align-items-end mt-1 pt-25">
                                    <div class="role-heading">
                                        <h4 class="fw-bolder">Support</h4>
                                        <a href="javascript:;" class="role-edit-modal" data-bs-toggle="modal" data-bs-target="#addRoleModal">
                                            <small class="fw-bolder">Edit Role</small>
                                        </a>
                                    </div>
                                    <a href="javascript:void(0);" class="text-body"><i data-feather="copy" class="font-medium-5"></i></a>
                                </div>
                            </div>
                        </div>
                    </div> -->


                    <!-- <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <span>2 utilisateurs</span>
                                    <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Kim Merchent" class="avatar avatar-sm pull-up">
                                            <img class="rounded-circle" src="assets/images/users/user_default.jpg" alt="Avatar" />
                                        </li>
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Sam D'souza" class="avatar avatar-sm pull-up">
                                            <img class="rounded-circle" src="assets/images/users/user_default.jpg" alt="Avatar" />
                                        </li>

                                    </ul>
                                </div>
                                <div class="d-flex justify-content-between align-items-end mt-1 pt-25">
                                    <div class="role-heading">
                                        <h4 class="fw-bolder">Restricted User</h4>
                                        <a href="javascript:;" class="role-edit-modal" data-bs-toggle="modal" data-bs-target="#addRoleModal">
                                            <small class="fw-bolder">Edit Role</small>
                                        </a>
                                    </div>
                                    <a href="javascript:void(0);" class="text-body"><i data-feather="copy" class="font-medium-5"></i></a>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <!-- ne dois pas etre dans la boucle -->
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="card">
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="d-flex align-items-end justify-content-center h-100">
                                        <img src="assets/images/template/faq-illustrations.svg" class="img-fluid mt-2" alt="Image" width="85" />
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="card-body text-sm-end text-center ps-sm-0">
                                        <a href="javascript:void(0)" data-bs-target="#addRoleModal" data-bs-toggle="modal" class="stretched-link text-nowrap add-new-role">
                                            <span class="btn btn-primary mb-1">Ajouter nouveau</span>
                                        </a>
                                        <p class="mb-0">Ajouter un type de compte avec des droit d'accès</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Role cards -->

                <h3 class="mt-50">Liste des droits d'accès par utilisateur</h3>
                <p class="mb-2">Retrouvez tous les comptes de votre entreprise et leurs accès spécifiques associés.</p>

                <!--/ Basic table -->
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">

                            <div class="card">
                                <table class="datatables-basic table">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th>id</th>
                                            <th>Nom</th>
                                            <th>Type de salle</th>
                                            <th>Capacité</th>
                                            <th>Emplacement</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>

                        </div>
                    </div>
                </section>
                <!--/ Basic table -->


                <!-- Add Role Modal -->
                <div class="modal fade" id="addRoleModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-centered modal-add-new-role">
                        <div class="modal-content">
                            <div class="modal-header bg-transparent">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body px-5 pb-5">
                                <div class="text-center mb-4">
                                    <h1 class="role-title">Add New Role</h1>
                                    <p>Set role permissions</p>
                                </div>
                                <!-- Add role form -->
                                <form id="addRoleForm" class="row" onsubmit="return false">
                                    <div class="col-12">
                                        <label class="form-label" for="modalRoleName">Acces</label>
                                        <input type="text" id="modalRoleName" name="modalRoleName" class="form-control" placeholder="Entrez le libellé de l'accès" tabindex="-1" data-msg="Please enter role name" />
                                    </div>
                        
                                    <div class="col-12">
                                        <h4 class="mt-2 pt-50">Role Permissions</h4>
                                        
                                        <!-- Permission table -->
                                        
                                        
                                        <div class="table-responsive">
                                            <table class="table table-flush-spacing">
                                                <tbody>
                                                    <tr>
                                                        <td class="text-nowrap fw-bolder">
                                                            Administrator Access
                                                            <span data-bs-toggle="tooltip" data-bs-placement="top" title="Allows a full access to the system">
                                                                <i data-feather="info"></i>
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex">
                                                            <div class="form-check me-3 me-lg-5">
                                                                <input class="form-check-input" type="checkbox" id="selectAll" />
                                                                <label class="form-check-label" for="selectAll"> Select All </label>
                                                            </div>
                                                            <div class="form-check me-3 me-lg-5">
                                                                <input class="form-check-input" type="checkbox" id="selectAll" />
                                                                <label class="form-check-label" for="selectAll"> Select All </label>
                                                            </div>
                                                            <div class="form-check me-3 me-lg-5">
                                                                <input class="form-check-input" type="checkbox" id="selectAll" />
                                                                <label class="form-check-label" for="selectAll"> Select All </label>
                                                            </div>
                                                            <div class="form-check me-3 me-lg-5">
                                                                <input class="form-check-input" type="checkbox" id="selectAll" />
                                                                <label class="form-check-label" for="selectAll"> Select All </label>
                                                            </div>
                                                            <div class="form-check me-3 me-lg-5">
                                                                <input class="form-check-input" type="checkbox" id="selectAll" />
                                                                <label class="form-check-label" for="selectAll"> Select All </label>
                                                            </div>
                                                            <div class="form-check me-3 me-lg-5">
                                                                <input class="form-check-input" type="checkbox" id="selectAll" />
                                                                <label class="form-check-label" for="selectAll"> Select All </label>
                                                            </div>
                                                            <div class="form-check me-3 me-lg-5">
                                                                <input class="form-check-input" type="checkbox" id="selectAll" />
                                                                <label class="form-check-label" for="selectAll"> Select All </label>
                                                            </div>

                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="text-nowrap fw-bolder">User Management</td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementRead" />
                                                                    <label class="form-check-label" for="userManagementRead"> Lecture </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementWrite" />
                                                                    <label class="form-check-label" for="userManagementWrite"> Creation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementCreate" />
                                                                    <label class="form-check-label" for="userManagementCreate"> Modification </label>
                                                                </div>

                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementRead" />
                                                                    <label class="form-check-label" for="userManagementRead"> Suppression </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementWrite" />
                                                                    <label class="form-check-label" for="userManagementWrite"> Duplicata </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementCreate" />
                                                                    <label class="form-check-label" for="userManagementCreate"> Visualisation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementCreate" />
                                                                    <label class="form-check-label" for="userManagementCreate"> Exportation </label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-nowrap fw-bolder">Contrat de bail</td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementRead" />
                                                                    <label class="form-check-label" for="userManagementRead"> Lecture </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementWrite" />
                                                                    <label class="form-check-label" for="userManagementWrite"> Creation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementCreate" />
                                                                    <label class="form-check-label" for="userManagementCreate"> Modification </label>
                                                                </div>

                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementRead" />
                                                                    <label class="form-check-label" for="userManagementRead"> Suppression </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementWrite" />
                                                                    <label class="form-check-label" for="userManagementWrite"> Duplicata </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementCreate" />
                                                                    <label class="form-check-label" for="userManagementCreate"> Visualisation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementCreate" />
                                                                    <label class="form-check-label" for="userManagementCreate"> Exportation </label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-nowrap fw-bolder">Enregistrement fiscal</td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementRead" />
                                                                    <label class="form-check-label" for="userManagementRead"> Lecture </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementWrite" />
                                                                    <label class="form-check-label" for="userManagementWrite"> Creation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementCreate" />
                                                                    <label class="form-check-label" for="userManagementCreate"> Modification </label>
                                                                </div>

                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementRead" />
                                                                    <label class="form-check-label" for="userManagementRead"> Suppression </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementWrite" />
                                                                    <label class="form-check-label" for="userManagementWrite"> Duplicata </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementCreate" />
                                                                    <label class="form-check-label" for="userManagementCreate"> Visualisation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementCreate" />
                                                                    <label class="form-check-label" for="userManagementCreate"> Exportation </label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-nowrap fw-bolder">Recouvrements</td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementRead" />
                                                                    <label class="form-check-label" for="userManagementRead"> Lecture </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementWrite" />
                                                                    <label class="form-check-label" for="userManagementWrite"> Creation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementCreate" />
                                                                    <label class="form-check-label" for="userManagementCreate"> Modification </label>
                                                                </div>

                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementRead" />
                                                                    <label class="form-check-label" for="userManagementRead"> Suppression </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementWrite" />
                                                                    <label class="form-check-label" for="userManagementWrite"> Duplicata </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementCreate" />
                                                                    <label class="form-check-label" for="userManagementCreate"> Visualisation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementCreate" />
                                                                    <label class="form-check-label" for="userManagementCreate"> Exportation </label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-nowrap fw-bolder">Proprietaires</td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementRead" />
                                                                    <label class="form-check-label" for="userManagementRead"> Lecture </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementWrite" />
                                                                    <label class="form-check-label" for="userManagementWrite"> Creation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementCreate" />
                                                                    <label class="form-check-label" for="userManagementCreate"> Modification </label>
                                                                </div>

                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementRead" />
                                                                    <label class="form-check-label" for="userManagementRead"> Suppression </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementWrite" />
                                                                    <label class="form-check-label" for="userManagementWrite"> Duplicata </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementCreate" />
                                                                    <label class="form-check-label" for="userManagementCreate"> Visualisation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementCreate" />
                                                                    <label class="form-check-label" for="userManagementCreate"> Exportation </label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-nowrap fw-bolder">Batiments</td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementRead" />
                                                                    <label class="form-check-label" for="userManagementRead"> Lecture </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementWrite" />
                                                                    <label class="form-check-label" for="userManagementWrite"> Creation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementCreate" />
                                                                    <label class="form-check-label" for="userManagementCreate"> Modification </label>
                                                                </div>

                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementRead" />
                                                                    <label class="form-check-label" for="userManagementRead"> Suppression </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementWrite" />
                                                                    <label class="form-check-label" for="userManagementWrite"> Duplicata </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementCreate" />
                                                                    <label class="form-check-label" for="userManagementCreate"> Visualisation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementCreate" />
                                                                    <label class="form-check-label" for="userManagementCreate"> Exportation </label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-nowrap fw-bolder">Appartements</td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementRead" />
                                                                    <label class="form-check-label" for="userManagementRead"> Lecture </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementWrite" />
                                                                    <label class="form-check-label" for="userManagementWrite"> Creation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementCreate" />
                                                                    <label class="form-check-label" for="userManagementCreate"> Modification </label>
                                                                </div>

                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementRead" />
                                                                    <label class="form-check-label" for="userManagementRead"> Suppression </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementWrite" />
                                                                    <label class="form-check-label" for="userManagementWrite"> Duplicata </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementCreate" />
                                                                    <label class="form-check-label" for="userManagementCreate"> Visualisation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementCreate" />
                                                                    <label class="form-check-label" for="userManagementCreate"> Exportation </label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-nowrap fw-bolder">Locataires</td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementRead" />
                                                                    <label class="form-check-label" for="userManagementRead"> Lecture </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementWrite" />
                                                                    <label class="form-check-label" for="userManagementWrite"> Creation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementCreate" />
                                                                    <label class="form-check-label" for="userManagementCreate"> Modification </label>
                                                                </div>

                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementRead" />
                                                                    <label class="form-check-label" for="userManagementRead"> Suppression </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementWrite" />
                                                                    <label class="form-check-label" for="userManagementWrite"> Duplicata </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementCreate" />
                                                                    <label class="form-check-label" for="userManagementCreate"> Visualisation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementCreate" />
                                                                    <label class="form-check-label" for="userManagementCreate"> Exportation </label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-nowrap fw-bolder">Recouvreurs</td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementRead" />
                                                                    <label class="form-check-label" for="userManagementRead"> Lecture </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementWrite" />
                                                                    <label class="form-check-label" for="userManagementWrite"> Creation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementCreate" />
                                                                    <label class="form-check-label" for="userManagementCreate"> Modification </label>
                                                                </div>

                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementRead" />
                                                                    <label class="form-check-label" for="userManagementRead"> Suppression </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementWrite" />
                                                                    <label class="form-check-label" for="userManagementWrite"> Duplicata </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementCreate" />
                                                                    <label class="form-check-label" for="userManagementCreate"> Visualisation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementCreate" />
                                                                    <label class="form-check-label" for="userManagementCreate"> Exportation </label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-nowrap fw-bolder">Type de batiment</td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementRead" />
                                                                    <label class="form-check-label" for="userManagementRead"> Lecture </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementWrite" />
                                                                    <label class="form-check-label" for="userManagementWrite"> Creation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementCreate" />
                                                                    <label class="form-check-label" for="userManagementCreate"> Modification </label>
                                                                </div>

                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementRead" />
                                                                    <label class="form-check-label" for="userManagementRead"> Suppression </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementWrite" />
                                                                    <label class="form-check-label" for="userManagementWrite"> Duplicata </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementCreate" />
                                                                    <label class="form-check-label" for="userManagementCreate"> Visualisation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementCreate" />
                                                                    <label class="form-check-label" for="userManagementCreate"> Exportation </label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-nowrap fw-bolder">Type d'appartement</td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementRead" />
                                                                    <label class="form-check-label" for="userManagementRead"> Lecture </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementWrite" />
                                                                    <label class="form-check-label" for="userManagementWrite"> Creation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementCreate" />
                                                                    <label class="form-check-label" for="userManagementCreate"> Modification </label>
                                                                </div>

                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementRead" />
                                                                    <label class="form-check-label" for="userManagementRead"> Suppression </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementWrite" />
                                                                    <label class="form-check-label" for="userManagementWrite"> Duplicata </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementCreate" />
                                                                    <label class="form-check-label" for="userManagementCreate"> Visualisation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementCreate" />
                                                                    <label class="form-check-label" for="userManagementCreate"> Exportation </label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-nowrap fw-bolder">Type de locataire</td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementRead" />
                                                                    <label class="form-check-label" for="userManagementRead"> Lecture </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementWrite" />
                                                                    <label class="form-check-label" for="userManagementWrite"> Creation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementCreate" />
                                                                    <label class="form-check-label" for="userManagementCreate"> Modification </label>
                                                                </div>

                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementRead" />
                                                                    <label class="form-check-label" for="userManagementRead"> Suppression </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementWrite" />
                                                                    <label class="form-check-label" for="userManagementWrite"> Duplicata </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementCreate" />
                                                                    <label class="form-check-label" for="userManagementCreate"> Visualisation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementCreate" />
                                                                    <label class="form-check-label" for="userManagementCreate"> Exportation </label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-nowrap fw-bolder">Type de piece</td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementRead" />
                                                                    <label class="form-check-label" for="userManagementRead"> Lecture </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementWrite" />
                                                                    <label class="form-check-label" for="userManagementWrite"> Creation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementCreate" />
                                                                    <label class="form-check-label" for="userManagementCreate"> Modification </label>
                                                                </div>

                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementRead" />
                                                                    <label class="form-check-label" for="userManagementRead"> Suppression </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementWrite" />
                                                                    <label class="form-check-label" for="userManagementWrite"> Duplicata </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementCreate" />
                                                                    <label class="form-check-label" for="userManagementCreate"> Visualisation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementCreate" />
                                                                    <label class="form-check-label" for="userManagementCreate"> Exportation </label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-nowrap fw-bolder">Gestion utilisateurs</td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementRead" />
                                                                    <label class="form-check-label" for="userManagementRead"> Lecture </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementWrite" />
                                                                    <label class="form-check-label" for="userManagementWrite"> Creation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementCreate" />
                                                                    <label class="form-check-label" for="userManagementCreate"> Modification </label>
                                                                </div>

                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementRead" />
                                                                    <label class="form-check-label" for="userManagementRead"> Suppression </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementWrite" />
                                                                    <label class="form-check-label" for="userManagementWrite"> Duplicata </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementCreate" />
                                                                    <label class="form-check-label" for="userManagementCreate"> Visualisation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementCreate" />
                                                                    <label class="form-check-label" for="userManagementCreate"> Exportation </label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-nowrap fw-bolder">Role et permission</td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementRead" />
                                                                    <label class="form-check-label" for="userManagementRead"> Lecture </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementWrite" />
                                                                    <label class="form-check-label" for="userManagementWrite"> Creation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementCreate" />
                                                                    <label class="form-check-label" for="userManagementCreate"> Modification </label>
                                                                </div>

                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementRead" />
                                                                    <label class="form-check-label" for="userManagementRead"> Suppression </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementWrite" />
                                                                    <label class="form-check-label" for="userManagementWrite"> Duplicata </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementCreate" />
                                                                    <label class="form-check-label" for="userManagementCreate"> Visualisation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementCreate" />
                                                                    <label class="form-check-label" for="userManagementCreate"> Exportation </label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-nowrap fw-bolder">Details role et permission</td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementRead" />
                                                                    <label class="form-check-label" for="userManagementRead"> Lecture </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementWrite" />
                                                                    <label class="form-check-label" for="userManagementWrite"> Creation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementCreate" />
                                                                    <label class="form-check-label" for="userManagementCreate"> Modification </label>
                                                                </div>

                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementRead" />
                                                                    <label class="form-check-label" for="userManagementRead"> Suppression </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementWrite" />
                                                                    <label class="form-check-label" for="userManagementWrite"> Duplicata </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementCreate" />
                                                                    <label class="form-check-label" for="userManagementCreate"> Visualisation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementCreate" />
                                                                    <label class="form-check-label" for="userManagementCreate"> Exportation </label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-nowrap fw-bolder">Reglages</td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementRead" />
                                                                    <label class="form-check-label" for="userManagementRead"> Lecture </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementWrite" />
                                                                    <label class="form-check-label" for="userManagementWrite"> Creation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementCreate" />
                                                                    <label class="form-check-label" for="userManagementCreate"> Modification </label>
                                                                </div>

                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementRead" />
                                                                    <label class="form-check-label" for="userManagementRead"> Suppression </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementWrite" />
                                                                    <label class="form-check-label" for="userManagementWrite"> Duplicata </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementCreate" />
                                                                    <label class="form-check-label" for="userManagementCreate"> Visualisation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementCreate" />
                                                                    <label class="form-check-label" for="userManagementCreate"> Exportation </label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-nowrap fw-bolder">Logo et pied de page</td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementRead" />
                                                                    <label class="form-check-label" for="userManagementRead"> Lecture </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementWrite" />
                                                                    <label class="form-check-label" for="userManagementWrite"> Creation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementCreate" />
                                                                    <label class="form-check-label" for="userManagementCreate"> Modification </label>
                                                                </div>

                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementRead" />
                                                                    <label class="form-check-label" for="userManagementRead"> Suppression </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementWrite" />
                                                                    <label class="form-check-label" for="userManagementWrite"> Duplicata </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementCreate" />
                                                                    <label class="form-check-label" for="userManagementCreate"> Visualisation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementCreate" />
                                                                    <label class="form-check-label" for="userManagementCreate"> Exportation </label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-nowrap fw-bolder">Annees de gestion</td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementRead" />
                                                                    <label class="form-check-label" for="userManagementRead"> Lecture </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementWrite" />
                                                                    <label class="form-check-label" for="userManagementWrite"> Creation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementCreate" />
                                                                    <label class="form-check-label" for="userManagementCreate"> Modification </label>
                                                                </div>

                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementRead" />
                                                                    <label class="form-check-label" for="userManagementRead"> Suppression </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementWrite" />
                                                                    <label class="form-check-label" for="userManagementWrite"> Duplicata </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementCreate" />
                                                                    <label class="form-check-label" for="userManagementCreate"> Visualisation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementCreate" />
                                                                    <label class="form-check-label" for="userManagementCreate"> Exportation </label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-nowrap fw-bolder">Dossier entreprise</td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementRead" />
                                                                    <label class="form-check-label" for="userManagementRead"> Lecture </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementWrite" />
                                                                    <label class="form-check-label" for="userManagementWrite"> Creation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementCreate" />
                                                                    <label class="form-check-label" for="userManagementCreate"> Modification </label>
                                                                </div>

                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementRead" />
                                                                    <label class="form-check-label" for="userManagementRead"> Suppression </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementWrite" />
                                                                    <label class="form-check-label" for="userManagementWrite"> Duplicata </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementCreate" />
                                                                    <label class="form-check-label" for="userManagementCreate"> Visualisation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="userManagementCreate" />
                                                                    <label class="form-check-label" for="userManagementCreate"> Exportation </label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- Permission table -->
                                    </div>
                                    <div class="col-12 text-center mt-2">
                                        <button type="submit" class="btn btn-primary me-1">Submit</button>
                                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">
                                            Discard
                                        </button>
                                    </div>
                                </form>
                                <!--/ Add role form -->
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Add Role Modal -->

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

    <?php include 'js/logiques/reporting_logiques.php' ?>


    <!-- START: Footer-->
    <?php include 'includes/footer.php' ?>
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