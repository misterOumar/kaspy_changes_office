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
    <title><?= APP_NAME ?> - Role et permission</title>

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
                    Un rôle donne accès à des menus et fonctionnalités prédéfinis afin que, <br> selon
                    les rôles et permissions attribués, un utilisateur est accès à son interface personnalisée.
                </p>

                <!-- Role cards -->
                <div class="row">
                    <?php
                    foreach ($Liste_Role_permission as $role) {
                    ?>
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <span>Total <?= Users::CompteAll($role['id']) ?> utilisateurs</span>
                                        <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                                            <?php 
                                            // include("models/Users.php");
                                            $ListeUser = Users::getAllByCompte($role['id']);
                                            foreach ($ListeUser as $user) {
                                                ?><li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title=<?php echo strSecur($user['users']) ?> class="avatar avatar-sm pull-up">
                                                <img class="rounded-circle" src="<?php echo 'assets/images/users/' .  $user["photo"] ?>" alt="Avatar" />
                                            </li><?php
                                            }                                       
                                            ?>
                                        </ul>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-end mt-1 pt-25">
                                        <div class="role-heading">
                                            <h4 class="fw-bolder"> <?= $role['libelle'] ?> </h4>
                                            <a href="javascript:;" class="role-edit-modal editmodal" data-id="<?= $role['id'] ?>" data-bs-toggle="modal" data-bs-target="#addRoleModalModifs">
                                                <small class="fw-bolder">Edit Role</small>
                                            </a>
                                        </div>
                                        <?php if( intval(Users::CompteAll($role['id'])) == 0){ ?>
                                        <a href="javascript:void(0);" class="text-body delete" data-id="<?= $role['id'] ?>"><i data-feather="trash" class="font-medium-5"></i></a>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    <!-- ne dois pas etre dans la boucle -->
                    <div class="col-xl-4 col-lg-6 col-md-6 addRole">
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
                                        <p class="mb-0">Ajouter un type de compte et y attribuer des droits d'accès</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Role cards -->

                <!-- Add Role Modal -->
                <div class="modal fade" id="addRoleModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-centered modal-add-new-role">
                        <div class="modal-content">
                            <div class="modal-header bg-transparent">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body px-5 pb-5">
                                <div class="text-center mb-4">
                                    <h1 class="role-title">Parametrage des droits d'accès</h1>
                                    <p>Creer un rôle et y affecter des permissions</p>
                                </div>
                                <!-- Add role form -->
                                <form id="form_ajouter" name="form_ajouter" class="row" action="controllers/role_permission_controller.php" method="POST">
                                    <div class="col-12">
                                            <div>
                                                <label class='form-label' for='libelle'>Libellé de type de compte</label>
                                                <input type='text' class='form-control dt-full-libelle' id='libelle' name='libelle' placeholder='Veuillez saisir le libellé du type de compte' aria - Label='libelle' maxlength='75' />
                                            </div>
                                      
                                        <div class='mb-1'><small id='libelleHelp' class='text-danger invisible'></small></div>
                                    </div>
                                    <div class="col-12">
                                        <h4 class="mt-2 pt-50">Fonctionnalités</h4>

                                        <!-- Permission table -->
                                        <div class="table-responsive">
                                            <table class="table table-flush-spacing" id="tableau">
                                                <tbody>
                                                <input type="hidden" name="tableRows" value="Nombre_de_lignes">
                                                    <tr>
                                                        <td class="text-nowrap fw-bolder" id="administrateur">
                                                            Selectionner tout
                                                            <span data-bs-toggle="tooltip" data-bs-placement="top" title="Cliquez pour selectionner toute la colonne">
                                                                <i data-feather="info"></i>
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="lectureAll" name="lectureAll" onchange="alerterSurCocheParIDlecture('lectureAll')"/>
                                                                    <label class="form-check-label" for="selectAll" style="color: white;">Lecture</label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="creationAll" name="creationAll" onchange="alerterSurCocheParIDcreation('creationAll')"/>
                                                                    <label class="form-check-label" for="selectAll" style="color: white;">Creation</label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="modificationAll" name="modificationAll" onchange="alerterSurCocheParIDmodif('modificationAll')"/>
                                                                    <label class="form-check-label" for="selectAll" style="color: white;">Modification</label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="suppressionAll" name="suppressionAll" onchange="alerterSurCocheParIDsupp('suppressionAll')"/>
                                                                    <label class="form-check-label" for="selectAll" style="color: white;">Suppression</label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="duplicataAll" name="duplicataAll" onchange="alerterSurCocheParIDduplicata('duplicataAll')"/>
                                                                    <label class="form-check-label" for="selectAll" style="color: white;">Duplicata</label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="visualisationAll" name="visualisationAll" onchange="alerterSurCocheParIDvisual('visualisationAll')"/>
                                                                    <label class="form-check-label" for="selectAll" style="color: white;">Visualisation</label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="exportationAll" name="exportationAll" onchange="alerterSurCocheParIDexport('exportationAll')"/>
                                                                    <label class="form-check-label" for="selectAll" style="color: white;">Exportation</label>
                                                                </div>

                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                         <td class="text-nowrap fw-bolder" id="contrat">                                                    
                                                        <input class="form-check-input" type="checkbox" id="ria" name="ria" onchange="alerterSurCocheByRowRia('ria')"/>                                                 
                                                        <i data-feather="airplay"  style="width: 20px; margin-left: 5px;"></i>Ria</td>
                                                        <input type="text" name="role1" id="contrat" hidden value="Ria">
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="lecture1" name="lecture1" />
                                                                    <label class="form-check-label" for="lecture1"> Lecture </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="creation1" name="creation1" />
                                                                    <label class="form-check-label" for="creation1"> Creation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="modification1" name="modification1" />
                                                                    <label class="form-check-label" for="modification1"> Modification </label>
                                                                </div>

                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="suppression1" name="suppression1" />
                                                                    <label class="form-check-label" for="suppression1"> Suppression </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="duplicata1" name="duplicata1" />
                                                                    <label class="form-check-label" for="duplicata1"> Duplicata </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="visualisation1" name="visualisation1" />
                                                                    <label class="form-check-label" for="visualisation1"> Visualisation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="exportation1" name="exportation1" />
                                                                    <label class="form-check-label" for="exportation1"> Exportation </label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-nowrap fw-bolder" id="enregistrement" name="role2">
                                                        <input class="form-check-input" type="checkbox" id="wu" name="wu" onchange="alerterSurCocheByRow_WU('wu')"/> 
                                                            <i data-feather="credit-card"  style="width: 20px;  margin-left: 5px;">
                                                            </i>Western Union  
                                                        <input type="text" name="role2" id="contrat" hidden value="Western Union">
                                                        </td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="lecture2" name="lecture2" />
                                                                    <label class="form-check-label" for="lecture2"> Lecture </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="creation2" name="creation2" />
                                                                    <label class="form-check-label" for="creation2"> Creation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="modification2" name="modification2" />
                                                                    <label class="form-check-label" for="modification2"> Modification </label>
                                                                </div>

                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="suppression2" name="suppression2" />
                                                                    <label class="form-check-label" for="suppression2"> Suppression </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="duplicata2" name="duplicata2" />
                                                                    <label class="form-check-label" for="duplicata2"> Duplicata </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="visualisation2" name="visualisation2" />
                                                                    <label class="form-check-label" for="visualisation2"> Visualisation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="exportation2" name="exportation2" />
                                                                    <label class="form-check-label" for="exportation2"> Exportation </label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-nowrap fw-bolder" id="recouvrements" name="role3">
                                                        <input class="form-check-input" type="checkbox" id="changes" name="changes" onchange="alerterSurCocheByRow_changes('changes')"/>
                                                            <i data-feather="check-circle"  style="width: 20px;  margin-left: 5px;"></i>Changes</td>
                                                        <input type="text" name="role3" id="contrat" hidden value="Changes">
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="lecture3" name="lecture3" />
                                                                    <label class="form-check-label" for="lecture3"> Lecture </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="creation3" name="creation3" />
                                                                    <label class="form-check-label" for="creation3"> Creation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="modification3" name="modification3" />
                                                                    <label class="form-check-label" for="modification3"> Modification </label>
                                                                </div>

                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="suppression3" name="suppression3" />
                                                                    <label class="form-check-label" for="suppression3"> Suppression </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="duplicata3" name="duplicata3" />
                                                                    <label class="form-check-label" for="duplicata3"> Duplicata </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="visualisation3" name="visualisation3" />
                                                                    <label class="form-check-label" for="visualisation3"> Visualisation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="exportation3" name="exportation3" />
                                                                    <label class="form-check-label" for="exportation3"> Exportation </label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-nowrap fw-bolder" id="proprietaires" name="role4">
                                                        <input class="form-check-input" type="checkbox" id="fournisseur" name="fournisseur" onchange="alerterSurCocheByRow_fournisseur('fournisseur')"/>
                                                            <i data-feather="user"  style="width: 20px;  margin-left: 5px;">
                                                            </i>Fournisseurs</td>
                                                        <input type="text" name="role4" id="contrat" hidden value="Fournisseurs">
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="lecture4" name="lecture4" />
                                                                    <label class="form-check-label" for="lecture4"> Lecture </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="creation4" name="creation4" />
                                                                    <label class="form-check-label" for="creation4"> Creation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="modification4" name="modification4" />
                                                                    <label class="form-check-label" for="modification4"> Modification </label>
                                                                </div>

                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="suppression4" name="suppression4" />
                                                                    <label class="form-check-label" for="suppression4"> Suppression </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="duplicata4" name="duplicata4" />
                                                                    <label class="form-check-label" for="duplicata4"> Duplicata </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="visualisation4" name="visualisation4" />
                                                                    <label class="form-check-label" for="visualisation4"> Visualisation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="exportation4" name="exportation4" />
                                                                    <label class="form-check-label" for="exportation4"> Exportation </label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-nowrap fw-bolder" id="batiments" name="role5">
                                                        <input class="form-check-input" type="checkbox" id="depenses" name="depenses" onchange="alerterSurCocheByRow_depenses('depenses')"/>
                                                            <i data-feather="shopping-cart"  style="width: 20px;  margin-left: 5px;">
                                                        </i>Dépenses</td>
                                                        <input type="text" name="role5" id="contrat" hidden value="Dépenses">
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="lecture5" name="lecture5" />
                                                                    <label class="form-check-label" for="lecture5"> Lecture </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="creation5" name="creation5" />
                                                                    <label class="form-check-label" for="creation5"> Creation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="modification5" name="modification5" />
                                                                    <label class="form-check-label" for="modification5"> Modification </label>
                                                                </div>

                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="suppression5" name="suppression5" />
                                                                    <label class="form-check-label" for="suppression5"> Suppression </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="duplicata5" name="duplicata5" />
                                                                    <label class="form-check-label" for="duplicata5"> Duplicata </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="visualisation5" name="visualisation5" />
                                                                    <label class="form-check-label" for="visualisation5"> Visualisation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="exportation5" name="exportation5" />
                                                                    <label class="form-check-label" for="exportation5"> Exportation </label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-nowrap fw-bolder" id="appartements" name="role6">
                                                        <input class="form-check-input" type="checkbox" id="moov" name="moov" onchange="alerterSurCocheByRow_moov('moov')"/>
                                                            <i data-feather="dollar-sign"  style="width: 20px; margin-left: 5px;"></i>Moov Money</td>
                                                        <input type="text" name="role6" id="contrat" hidden value="Moov Money">
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="lecture6" name="lecture6" />
                                                                    <label class="form-check-label" for="lecture6"> Lecture </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="creation6" name="creation6" />
                                                                    <label class="form-check-label" for="creation6"> Creation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="modification6" name="modification6" />
                                                                    <label class="form-check-label" for="modification6"> Modification </label>
                                                                </div>

                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="suppression6" name="suppression6" />
                                                                    <label class="form-check-label" for="suppression6"> Suppression </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="duplicata6" name="duplicata6" />
                                                                    <label class="form-check-label" for="duplicata6"> Duplicata </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="visualisation6" name="visualisation6" />
                                                                    <label class="form-check-label" for="visualisation6"> Visualisation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="exportation6" name="exportation6" />
                                                                    <label class="form-check-label" for="exportation6"> Exportation </label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-nowrap fw-bolder" id="locataires" name="role7">
                                                        <input class="form-check-input" type="checkbox" id="mtn" name="mtn" onchange="alerterSurCocheByRow_mtn('mtn')"/>
                                                            <i data-feather="dollar-sign"  style="width: 20px; margin-left: 5px;"></i>MTN Money</td>
                                                        <input type="text" name="role7" id="contrat" hidden value="MTN Money">
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="lecture7" name="lecture7" />
                                                                    <label class="form-check-label" for="lecture7"> Lecture </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="creation7" name="creation7" />
                                                                    <label class="form-check-label" for="creation7"> Creation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="modification7" name="modification7" />
                                                                    <label class="form-check-label" for="modification7"> Modification </label>
                                                                </div>

                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="suppression7" name="suppression7" />
                                                                    <label class="form-check-label" for="suppression7"> Suppression </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="duplicata7" name="duplicata7" />
                                                                    <label class="form-check-label" for="duplicata7"> Duplicata </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="visualisation7" name="visualisation7" />
                                                                    <label class="form-check-label" for="visualisation7"> Visualisation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="exportation7" name="exportation7" />
                                                                    <label class="form-check-label" for="exportation7"> Exportation </label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-nowrap fw-bolder" id="recouvreurs" name="role8">
                                                        <input class="form-check-input" type="checkbox" id="orange" name="orange" onchange="alerterSurCocheByRow_orange('orange')"/>
                                                            <i data-feather="dollar-sign"  style="width: 20px;  margin-left: 5px;"></i>Orange Money</td>
                                                        <input type="text" name="role8" id="contrat" hidden value="Orange Money">
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="lecture8" name="lecture8" />
                                                                    <label class="form-check-label" for="lecture8"> Lecture </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="creation8" name="creation8" />
                                                                    <label class="form-check-label" for="creation8"> Creation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="modification8" name="modification8" />
                                                                    <label class="form-check-label" for="modification8"> Modification </label>
                                                                </div>

                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="suppression8" name="suppression8" />
                                                                    <label class="form-check-label" for="suppression8"> Suppression </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="duplicata8" name="duplicata8" />
                                                                    <label class="form-check-label" for="duplicata8"> Duplicata </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="visualisation8" name="visualisation8" />
                                                                    <label class="form-check-label" for="visualisation8"> Visualisation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="exportation8" name="exportation8" />
                                                                    <label class="form-check-label" for="exportation8"> Exportation </label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-nowrap fw-bolder" id="type_batiment" name="role9">
                                                        <input class="form-check-input" type="checkbox" id="achat" name="achat" onchange="alerterSurCocheByRow_achatCarte('achat')"/>
                                                            <i data-feather="credit-card"  style="width: 20px;  margin-left: 5px;"></i>Achat de cartes</td>
                                                        <input type="text" name="role9" id="contrat" hidden value="Achat de cartes">
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="lecture9" name="lecture9" />
                                                                    <label class="form-check-label" for="lecture9"> Lecture </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="creation9" name="creation9" />
                                                                    <label class="form-check-label" for="creation9"> Creation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="modification9" name="modification9" />
                                                                    <label class="form-check-label" for="modification9"> Modification </label>
                                                                </div>

                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="suppression9" name="suppression9" />
                                                                    <label class="form-check-label" for="suppression9"> Suppression </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="duplicata9" name="duplicata9" />
                                                                    <label class="form-check-label" for="duplicata9"> Duplicata </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="visualisation9" name="visualisation9" />
                                                                    <label class="form-check-label" for="visualisation9"> Visualisation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="exportation9" name="exportation9" />
                                                                    <label class="form-check-label" for="exportation9"> Exportation </label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-nowrap fw-bolder" id="type_appartement" name="role10">
                                                        <input class="form-check-input" type="checkbox" id="venteCarte" name="venteCarte" onchange="alerterSurCocheByRow_venteCarte('venteCarte')"/>
                                                            <i data-feather="credit-card"  style="width: 20px;  margin-left: 5px;"></i>Vente de cartes</td>
                                                        <input type="text" name="role10" id="contrat" hidden value="Vente de cartes">
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="lecture10" name="lecture10" />
                                                                    <label class="form-check-label" for="lecture10"> Lecture </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="creation10" name="creation10" />
                                                                    <label class="form-check-label" for="creation10"> Creation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="modification10" name="modification10" />
                                                                    <label class="form-check-label" for="modification10"> Modification </label>
                                                                </div>

                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="suppression10" name="suppression10" />
                                                                    <label class="form-check-label" for="suppression10"> Suppression </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="duplicata10" name="duplicata10" />
                                                                    <label class="form-check-label" for="duplicata10"> Duplicata </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="visualisation10" name="visualisation10" />
                                                                    <label class="form-check-label" for="visualisation10"> Visualisation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="exportation10" name="exportation10" />
                                                                    <label class="form-check-label" for="exportation10"> Exportation </label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-nowrap fw-bolder" id="type_locataire" name="role11">
                                                        <input class="form-check-input" type="checkbox" id="gram" name="gram" onchange="alerterSurCocheByRow_gram('gram')"/>
                                                            <i data-feather="bar-chart-2"  style="width: 20px;  margin-left: 5px;"></i>Money Gram</td>
                                                        <input type="text" name="role11" id="contrat" hidden value="Money Gram">
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="lecture11" name="lecture11" />
                                                                    <label class="form-check-label" for="lecture11"> Lecture </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="creation11" name="creation11" />
                                                                    <label class="form-check-label" for="creation11"> Creation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="modification11" name="modification11" />
                                                                    <label class="form-check-label" for="modification11"> Modification </label>
                                                                </div>

                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="suppression11" name="suppression11" />
                                                                    <label class="form-check-label" for="suppression11"> Suppression </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="duplicata11" name="duplicata11" />
                                                                    <label class="form-check-label" for="duplicata11"> Duplicata </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="visualisation11" name="visualisation11" />
                                                                    <label class="form-check-label" for="visualisation11"> Visualisation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="exportation11" name="exportation11" />
                                                                    <label class="form-check-label" for="exportation11"> Exportation </label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-nowrap fw-bolder" id="type_piece" name="role12">
                                                        <input class="form-check-input" type="checkbox" id="uba" name="uba" onchange="alerterSurCocheByRow_rechargementUba('uba')"/>
                                                            <i data-feather="credit-card"  style="width: 20px;  margin-left: 5px;"></i>Rechargement UBA</td>
                                                        <input type="text" name="role12" id="contrat" hidden value="Rechargement UBA">
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="lecture12" name="lecture12" />
                                                                    <label class="form-check-label" for="lecture12"> Lecture </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="creation12" name="creation12" />
                                                                    <label class="form-check-label" for="creation12"> Creation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="modification12" name="modification12" />
                                                                    <label class="form-check-label" for="modification12"> Modification </label>
                                                                </div>

                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="suppression12" name="suppression12" />
                                                                    <label class="form-check-label" for="suppression12"> Suppression </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="duplicata12" name="duplicata12" />
                                                                    <label class="form-check-label" for="duplicata12"> Duplicata </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="visualisation12" name="visualisation12" />
                                                                    <label class="form-check-label" for="visualisation12"> Visualisation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="exportation12" name="exportation12" />
                                                                    <label class="form-check-label" for="exportation12"> Exportation </label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>


                                                    <tr>
                                                        <td class="text-nowrap fw-bolder" id="type_carte" name="role19">
                                                        <input class="form-check-input" type="checkbox" id="carte" name="carte" onchange="alerterSurCocheByRow_typeCarte('carte')"/>
                                                            <i data-feather="credit-card"  style="width: 20px;  margin-left: 5px;"></i>Type de cartes</td>
                                                        <input type="text" name="role19" id="contrat" hidden value="Type de cartes">
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="lecture19" name="lecture19" />
                                                                    <label class="form-check-label" for="lecture19"> Lecture </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="creation19" name="creation19" />
                                                                    <label class="form-check-label" for="creation19"> Creation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="modification19" name="modification19" />
                                                                    <label class="form-check-label" for="modification19"> Modification </label>
                                                                </div>

                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="suppression19" name="suppression19" />
                                                                    <label class="form-check-label" for="suppression19"> Suppression </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="duplicata19" name="duplicata19" />
                                                                    <label class="form-check-label" for="duplicata19"> Duplicata </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="visualisation19" name="visualisation19" />
                                                                    <label class="form-check-label" for="visualisation19"> Visualisation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="exportation19" name="exportation19" />
                                                                    <label class="form-check-label" for="exportation19"> Exportation </label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="text-nowrap fw-bolder" id="mode_reglement" name="role20">
                                                        <input class="form-check-input" type="checkbox" id="mode" name="mode" onchange="alerterSurCocheByRow_mode('mode')"/>
                                                            <i data-feather="bookmark"  style="width: 20px; margin-left: 5px;"></i>Mode de règlement</td>
                                                        <input type="text" name="role20" id="contrat" hidden value="Mode de règlement">
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="lecture20" name="lecture20" />
                                                                    <label class="form-check-label" for="lecture20"> Lecture </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="creation20" name="creation20" />
                                                                    <label class="form-check-label" for="creation20"> Creation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="modification20" name="modification20" />
                                                                    <label class="form-check-label" for="modification20"> Modification </label>
                                                                </div>

                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="suppression20" name="suppression20" />
                                                                    <label class="form-check-label" for="suppression20"> Suppression </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="duplicata20" name="duplicata20" />
                                                                    <label class="form-check-label" for="duplicata20"> Duplicata </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="visualisation20" name="visualisation20" />
                                                                    <label class="form-check-label" for="visualisation20"> Visualisation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="exportation20" name="exportation20" />
                                                                    <label class="form-check-label" for="exportation20"> Exportation </label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="text-nowrap fw-bolder" id="type_piece" name="role21">
                                                        <input class="form-check-input" type="checkbox" id="nature" name="nature" onchange="alerterSurCocheByRow_natureDepense('nature')"/>
                                                            <i data-feather="trello"  style="width: 20px; margin-left: 5px;"></i>Nature de dépenses</td>
                                                        <input type="text" name="role21" id="contrat" hidden value="Nature de depenses">
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="lecture21" name="lecture21" />
                                                                    <label class="form-check-label" for="lecture21"> Lecture </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="creation21" name="creation21" />
                                                                    <label class="form-check-label" for="creation21"> Creation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="modification21" name="modification21" />
                                                                    <label class="form-check-label" for="modification21"> Modification </label>
                                                                </div>

                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="suppression21" name="suppression21" />
                                                                    <label class="form-check-label" for="suppression21"> Suppression </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="duplicata21" name="duplicata21" />
                                                                    <label class="form-check-label" for="duplicata21"> Duplicata </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="visualisation21" name="visualisation21" />
                                                                    <label class="form-check-label" for="visualisation21"> Visualisation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="exportation21" name="exportation21" />
                                                                    <label class="form-check-label" for="exportation21"> Exportation </label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-nowrap fw-bolder" id="gestion_utilisateurs" name="role13">
                                                        <input class="form-check-input mr-3" type="checkbox" id="users" name="users" onchange="alerterSurCocheByRow_users('users')"/>
                                                        <i data-feather="tool" style="width: 20px; margin-left: 5px;"></i>Gestion utilisateurs</td>
                                                        <input type="text" name="role13" id="contrat" hidden value="Gestion utilisateurs">
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="lecture13" name="lecture13" />
                                                                    <label class="form-check-label" for="lecture13"> Lecture </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="creation13" name="creation13" />
                                                                    <label class="form-check-label" for="creation13"> Creation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="modification13" name="modification13" />
                                                                    <label class="form-check-label" for="modification13"> Modification </label>
                                                                </div>

                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="suppression13" name="suppression13" />
                                                                    <label class="form-check-label" for="suppression13"> Suppression </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="duplicata13" name="duplicata13" />
                                                                    <label class="form-check-label" for="duplicata13"> Duplicata </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="visualisation13" name="visualisation13" />
                                                                    <label class="form-check-label" for="visualisation13"> Visualisation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="exportation13" name="exportation13" />
                                                                    <label class="form-check-label" for="exportation13"> Exportation </label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-nowrap fw-bolder" id="Role et permission" name="role14">
                                                        <input class="form-check-input mr-3" type="checkbox" id="access" name="access" onchange="alerterSurCocheByRow_access('access')"/>
                                                            <i data-feather="shield"  style="width: 20px;"></i>Droit d'accès</td>
                                                        <input type="text" name="role14" id="contrat" hidden value="role et permission">
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="lecture14" name="lecture14" />
                                                                    <label class="form-check-label" for="lecture14"> Lecture </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="creation14" name="creation14" />
                                                                    <label class="form-check-label" for="creation14"> Creation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="modification14" name="modification14" />
                                                                    <label class="form-check-label" for="modification14"> Modification </label>
                                                                </div>

                                                                <div class="form-check me-3 me-lg-5" id="">
                                                                    <input class="form-check-input" type="checkbox" id="suppression14" name="suppression14" />
                                                                    <label class="form-check-label" for="suppression14"> Suppression </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="duplicata14" name="duplicata14" />
                                                                    <label class="form-check-label" for="duplicata14"> Duplicata </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="visualisation14" name="visualisation14" />
                                                                    <label class="form-check-label" for="visualisation14"> Visualisation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="exportation14" name="exportation14" />
                                                                    <label class="form-check-label" for="exportation14"> Exportation </label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                   
                                                    <tr>
                                                        <td class="text-nowrap fw-bolder" id="reglages" name="role15">
                                                        <input class="form-check-input mr-3" type="checkbox" id="reglage" name="reglage" onchange="alerterSurCocheByRow_reglage('reglage')"/>    
                                                        <i data-feather="settings"  style="width: 20px;"></i>Reglages</td>
                                                        <input type="text" name="role15" id="contrat" hidden value="Reglages">
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="lecture15" name="lecture15" />
                                                                    <label class="form-check-label" for="lecture15"> Lecture </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="creation15" name="creation15" />
                                                                    <label class="form-check-label" for="creation15"> Creation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="modification15" name="modification15" />
                                                                    <label class="form-check-label" for="modification15"> Modification </label>
                                                                </div>

                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="suppression15" name="suppression15" />
                                                                    <label class="form-check-label" for="suppression15"> Suppression </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="duplicata15" name="duplicata15" />
                                                                    <label class="form-check-label" for="duplicata15"> Duplicata </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="visualisation15" name="visualisation15" />
                                                                    <label class="form-check-label" for="visualisation15"> Visualisation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="exportation15" name="exportation15" />
                                                                    <label class="form-check-label" for="exportation15"> Exportation </label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-nowrap fw-bolder" id="logo_pied_page" name="role16">
                                                        <input class="form-check-input mr-3" type="checkbox" id="logo" name="logo" onchange="alerterSurCocheByRow_logo('logo')"/>
                                                        <i data-feather="package"  style="width: 20px;"></i>Logo et pied de page</td>
                                                        <input type="text" name="role16" id="contrat" hidden value="Logo et pied de page">
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="lecture16" name="lecture16" />
                                                                    <label class="form-check-label" for="lecture16"> Lecture </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="creation16" name="creation16" />
                                                                    <label class="form-check-label" for="creation16"> Creation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="modification16" name="modification16" />
                                                                    <label class="form-check-label" for="modification16"> Modification </label>
                                                                </div>

                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="suppression16" name="suppression16" />
                                                                    <label class="form-check-label" for="suppression16"> Suppression </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="duplicata16" name="duplicata16" />
                                                                    <label class="form-check-label" for="duplicata16"> Duplicata </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="visualisation16" name="visualisation16" />
                                                                    <label class="form-check-label" for="visualisation16"> Visualisation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="exportation16" name="exportation16" />
                                                                    <label class="form-check-label" for="exportation16"> Exportation </label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-nowrap fw-bolder" id="annees_de_gestion" name="role17">
                                                        <input class="form-check-input mr-3" type="checkbox" id="gestion" name="gestion" onchange="alerterSurCocheByRow_gestionAnnee('gestion')"/>
                                                        <i data-feather="folder"  style="width: 20px;"></i>Annees de gestion</td>
                                                        <input type="text" name="role17" id="contrat" hidden value="Annees de gestion">
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="lecture17" name="lecture17" />
                                                                    <label class="form-check-label" for="lecture17"> Lecture </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="creation17" name="creation17" />
                                                                    <label class="form-check-label" for="creation17"> Creation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="modification17" name="modification17" />
                                                                    <label class="form-check-label" for="modification17"> Modification </label>
                                                                </div>

                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="suppression17" name="suppression17" />
                                                                    <label class="form-check-label" for="suppression17"> Suppression </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="duplicata17" name="duplicata17" />
                                                                    <label class="form-check-label" for="duplicata17"> Duplicata </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="visualisation17" name="visualisation17" />
                                                                    <label class="form-check-label" for="visualisation17"> Visualisation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="exportation17" name="exportation17" />
                                                                    <label class="form-check-label" for="exportation17"> Exportation </label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-nowrap fw-bolder" id="dossier_entreprise" name="role18">
                                                        <input class="form-check-input mr-10" type="checkbox" id="entreprise" name="entreprise" onchange="alerterSurCocheByRow_entreprise('entreprise')"/>
                                                        <i data-feather="archive"  style="width: 20px;">
                                                        </i>Dossier entreprise
                                                        </td>
                                                        <input type="text" name="role18" id="contrat" hidden value="Dossier entreprise">
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="lecture18" name="lecture18" />
                                                                    <label class="form-check-label" for="lecture18"> Lecture </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="creation18" name="creation18" />
                                                                    <label class="form-check-label" for="creation18"> Creation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="modification18" name="modification18" />
                                                                    <label class="form-check-label" for="modification18"> Modification </label>
                                                                </div>

                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="suppression18" name="suppression18" />
                                                                    <label class="form-check-label" for="suppression18"> Suppression </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="duplicata18" name="duplicata18" />
                                                                    <label class="form-check-label" for="duplicata18"> Duplicata </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="visualisation18" name="visualisation18" />
                                                                    <label class="form-check-label" for="visualisation18"> Visualisation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="exportation18" name="exportation18" />
                                                                    <label class="form-check-label" for="exportation18"> Exportation </label>
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
                                        <button type="submit" class="btn btn-primary me-1" id="bt_enregistrer" name="bt_enregistrer">Enregistrer</button>
                                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">
                                            Annuler
                                        </button>
                                    </div>
                                </form>
                                <!--/ Add role form -->
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Add Role Modal -->


                <!-- Add Role Modal Modifs-->
                <div class="modal fade" id="addRoleModalModifs" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-centered modal-add-new-role">
                        <div class="modal-content">
                            <div class="modal-header bg-transparent">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="fermer"></button>
                            </div>
                            <div class="modal-body px-5 pb-5">
                                <div class="text-center mb-4">
                                    <h1 class="role-title">Parametrage des droits d'accès</h1>
                                    <p>Modifier un rôle et y affecter des permissions</p>
                                </div>
                                <!-- Add role form -->
                                <form id="form_modif" name="form_modif" class="row" action="controllers/role_permission_controller.php" method="POST">
                                    <div class="col-12">

                                        <!--- LIBELLE --->
                                        <div>
                                            <label class='form-label' for='libelle_modif'>Libellé de type de compte</label>
                                            <input type='text' class='form-control dt-full-libelle' id='libelle_modif' name='libelle_modif' placeholder='Veuillez saisir le libellé du type de compte' aria - Label='libelle' maxlength='75' />
                                        </div>
                                        <div class='mb-1'><small id='libelle_modifHelp' class='text-danger invisible'></small></div>
                                    </div>
                                    <div class="col-12">
                                        <h4 class="mt-2 pt-50">Fonctionnalités</h4>

                                        <!-- Permission table -->
                                        <div class="table-responsive">
                                            <table class="table table-flush-spacing" id="tableau">
                                                <tbody>
                                                <input type="hidden" name="tableRows" value="Nombre_de_lignes">
                                                    <tr>
                                                        <td class="text-nowrap fw-bolder" id="administrateur">
                                                            Administrator Access
                                                            <span data-bs-toggle="tooltip" data-bs-placement="top" title="Allows a full access to the system">
                                                                
                                                                <i data-feather="info"></i>
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="lectureAllmodif" onchange="alerterSurCocheParIDlecture_modif('lectureAllmodif')"/>
                                                                    <label class="form-check-label" for="selectAll" style="color: white;"> Lecture </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="creationAllmodif" onchange="alerterSurCocheParIDcreation_modif('creationAllmodif')"/>
                                                                    <label class="form-check-label" for="selectAll" style="color: white;"> Creation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="modificationAllmodif" onchange="alerterSurCocheParIDmodif_modif('modificationAllmodif')"/>
                                                                    <label class="form-check-label" for="selectAll" style="color: white;"> Modification </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="suppressionAllmodif" onchange="alerterSurCocheParIDsupp_modif('suppressionAllmodif')"/>
                                                                    <label class="form-check-label" for="selectAll" style="color: white;"> Suppression </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="duplicataAllmodif" onchange="alerterSurCocheParIDduplicata_modif('duplicataAllmodif')"/>
                                                                    <label class="form-check-label" for="selectAll" style="color: white;"> Duplicata </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="visualisationAllmodif" onchange="alerterSurCocheParIDvisual_modif('visualisationAllmodif')"/>
                                                                    <label class="form-check-label" for="selectAll" style="color: white;"> Visualisation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="exportationAllmodif" onchange="alerterSurCocheParIDexport_modif('exportationAllmodif')"/>
                                                                    <label class="form-check-label" for="selectAll" style="color: white;"> Exportation </label>
                                                                </div>

                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="text-nowrap fw-bolder" id="contrat">
                                                        <input class="form-check-input mr-10" type="checkbox" id="moR" name="moR" onchange="alerterSurCocheByRow_riaModif('moR')"/> 
                                                            
                                                        Ria</td>
                                                        <input type="text" name="role_modif1" id="contrat" hidden value="Ria">
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="lecture_modif1" name="lecture_modif1" />
                                                                    <label class="form-check-label" for="lecture_modif1"> Lecture </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="creation_modif1" name="creation_modif1" />
                                                                    <label class="form-check-label" for="creation_modif1"> Creation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="modification_modif1" name="modification_modif1" />
                                                                    <label class="form-check-label" for="modification_modif1"> Modification </label>
                                                                </div>

                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="suppression_modif1" name="suppression_modif1" />
                                                                    <label class="form-check-label" for="suppression_modif1"> Suppression </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="duplicata_modif1" name="duplicata_modif1" />
                                                                    <label class="form-check-label" for="duplicata_modif1"> Duplicata </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="visualisation_modif1" name="visualisation_modif1" />
                                                                    <label class="form-check-label" for="visualisation_modif1"> Visualisation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="exportation_modif1" name="exportation_modif1" />
                                                                    <label class="form-check-label" for="exportation_modif1"> Exportation </label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-nowrap fw-bolder" id="enregistrement" name="role_modif2">
                                                        <input class="form-check-input mr-10" type="checkbox" id="wuM" name="wuM" onchange="alerterSurCocheByRow_wuModif('wuM')"/>                                                        
                                                            Western Union</td>
                                                        <input type="text" name="role_modif2" id="contrat" hidden value="Western Union">
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="lecture_modif2" name="lecture_modif2" />
                                                                    <label class="form-check-label" for="lecture2"> Lecture </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="creation_modif2" name="creation_modif2" />
                                                                    <label class="form-check-label" for="creation2"> Creation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="modification_modif2" name="modification_modif2" />
                                                                    <label class="form-check-label" for="modification2"> Modification </label>
                                                                </div>

                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="suppression_modif2" name="suppression_modif2" />
                                                                    <label class="form-check-label" for="suppression2"> Suppression </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="duplicata_modif2" name="duplicata_modif2" />
                                                                    <label class="form-check-label" for="duplicata2"> Duplicata </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="visualisation_modif2" name="visualisation_modif2" />
                                                                    <label class="form-check-label" for="visualisation2"> Visualisation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="exportation_modif2" name="exportation_modif2" />
                                                                    <label class="form-check-label" for="exportation2"> Exportation </label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-nowrap fw-bolder" id="recouvrements" name="role_modif3">
                                                        <input class="form-check-input mr-10" type="checkbox" id="change" name="change" onchange="alerterSurCocheByRow_changesModif('change')"/>  
                                                        Changes</td>
                                                        <input type="text" name="role_modif3" id="contrat" hidden value="Changes">
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="lecture_modif3" name="lecture_modif3" />
                                                                    <label class="form-check-label" for="lecture3"> Lecture </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="creation_modif3" name="creation_modif3" />
                                                                    <label class="form-check-label" for="creation3"> Creation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="modification_modif3" name="modification_modif3" />
                                                                    <label class="form-check-label" for="modification3"> Modification </label>
                                                                </div>

                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="suppression_modif3" name="suppression_modif3" />
                                                                    <label class="form-check-label" for="suppression3"> Suppression </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="duplicata_modif3" name="duplicata_modif3" />
                                                                    <label class="form-check-label" for="duplicata3"> Duplicata </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="visualisation_modif3" name="visualisation_modif3" />
                                                                    <label class="form-check-label" for="visualisation3"> Visualisation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="exportation_modif3" name="exportation_modif3" />
                                                                    <label class="form-check-label" for="exportation3"> Exportation </label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-nowrap fw-bolder" id="proprietaires" name="role_modif4">
                                                        <input class="form-check-input" type="checkbox" id="four" name="four" onchange="alerterSurCocheByRow_fournisseurModif('four')"/>
                                                                                Fournisseurs</td>
                                                        <input type="text" name="role_modif4" id="contrat" hidden value="Fournisseurs">
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="lecture_modif4" name="lecture_modif4" />
                                                                    <label class="form-check-label" for="lecture4"> Lecture </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="creation_modif4" name="creation_modif4" />
                                                                    <label class="form-check-label" for="creation4"> Creation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="modification_modif4" name="modification_modif4" />
                                                                    <label class="form-check-label" for="modification4"> Modification </label>
                                                                </div>

                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="suppression_modif4" name="suppression_modif4" />
                                                                    <label class="form-check-label" for="suppression4"> Suppression </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="duplicata_modif4" name="duplicata_modif4" />
                                                                    <label class="form-check-label" for="duplicata4"> Duplicata </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="visualisation_modif4" name="visualisation_modif4" />
                                                                    <label class="form-check-label" for="visualisation4"> Visualisation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="exportation_modif4" name="exportation_modif4" />
                                                                    <label class="form-check-label" for="exportation4"> Exportation </label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-nowrap fw-bolder" id="batiments" name="role_modif5">
                                                        <input class="form-check-input" type="checkbox" id="depense" name="depense" onchange="alerterSurCocheByRow_depenseModif('depense')"/> 
                                                        
                                                        Dépenses</td>
                                                        <input type="text" name="role_modif5" id="contrat" hidden value="Dépenses">
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="lecture_modif5" name="lecture_modif5" />
                                                                    <label class="form-check-label" for="lecture5"> Lecture </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="creation_modif5" name="creation_modif5" />
                                                                    <label class="form-check-label" for="creation5"> Creation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="modification_modif5" name="modification_modif5" />
                                                                    <label class="form-check-label" for="modification5"> Modification </label>
                                                                </div>

                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="suppression_modif5" name="suppression_modif5" />
                                                                    <label class="form-check-label" for="suppression5"> Suppression </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="duplicata_modif5" name="duplicata_modif5" />
                                                                    <label class="form-check-label" for="duplicata5"> Duplicata </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="visualisation_modif5" name="visualisation_modif5" />
                                                                    <label class="form-check-label" for="visualisation5"> Visualisation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="exportation_modif5" name="exportation_modif5" />
                                                                    <label class="form-check-label" for="exportation5"> Exportation </label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-nowrap fw-bolder" id="appartements" name="role_modif6">
                                                        <input class="form-check-input mr-10" type="checkbox" id="mv" name="mv" onchange="alerterSurCocheByRow_moovModif('mv')"/>  
                                                            
                                                        Moov Money</td>
                                                        <input type="text" name="role_modif6" id="contrat" hidden value="Moov Money">
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="lecture_modif6" name="lecture_modif6" />
                                                                    <label class="form-check-label" for="lecture6"> Lecture </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="creation_modif6" name="creation_modif6" />
                                                                    <label class="form-check-label" for="creation6"> Creation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="modification_modif6" name="modification_modif6" />
                                                                    <label class="form-check-label" for="modification6"> Modification </label>
                                                                </div>

                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="suppression_modif6" name="suppression_modif6" />
                                                                    <label class="form-check-label" for="suppression6"> Suppression </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="duplicata_modif6" name="duplicata_modif6" />
                                                                    <label class="form-check-label" for="duplicata6"> Duplicata </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="visualisation_modif6" name="visualisation_modif6" />
                                                                    <label class="form-check-label" for="visualisation6"> Visualisation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="exportation_modif6" name="exportation_modif6" />
                                                                    <label class="form-check-label" for="exportation6"> Exportation </label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-nowrap fw-bolder" id="locataires" name="role_modif7">
                                                        <input class="form-check-input mr-10" type="checkbox" id="mto" name="mto" onchange="alerterSurCocheByRow_mtnModif('mto')"/>  
                                                        MTN Money</td>
                                                        <input type="text" name="role_modif7" id="contrat" hidden value="MTN Money">
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="lecture_modif7" name="lecture_modif7" />
                                                                    <label class="form-check-label" for="lecture7"> Lecture </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="creation_modif7" name="creation_modif7" />
                                                                    <label class="form-check-label" for="creation7"> Creation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="modification_modif7" name="modification_modif7" />
                                                                    <label class="form-check-label" for="modification7"> Modification </label>
                                                                </div>

                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="suppression_modif7" name="suppression_modif7" />
                                                                    <label class="form-check-label" for="suppression7"> Suppression </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="duplicata_modif7" name="duplicata_modif7" />
                                                                    <label class="form-check-label" for="duplicata7"> Duplicata </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="visualisation_modif7" name="visualisation_modif7" />
                                                                    <label class="form-check-label" for="visualisation7"> Visualisation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="exportation_modif7" name="exportation_modif7" />
                                                                    <label class="form-check-label" for="exportation7"> Exportation </label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-nowrap fw-bolder" id="recouvreurs" name="role_modif8">
                                                            
                                                        <input class="form-check-input mr-10" type="checkbox" id="mvO" name="mvO" onchange="alerterSurCocheByRow_orangeModif('mvO')"/>  Orange Money</td>
                                                        <input type="text" name="role_modif8" id="contrat" hidden value="Orange Money">
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="lecture_modif8" name="lecture_modif8" />
                                                                    <label class="form-check-label" for="lecture8"> Lecture </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="creation_modif8" name="creation_modif8" />
                                                                    <label class="form-check-label" for="creation8"> Creation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="modification_modif8" name="modification_modif8" />
                                                                    <label class="form-check-label" for="modification8"> Modification </label>
                                                                </div>

                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="suppression_modif8" name="suppression_modif8" />
                                                                    <label class="form-check-label" for="suppression8"> Suppression </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="duplicata_modif8" name="duplicata_modif8" />
                                                                    <label class="form-check-label" for="duplicata8"> Duplicata </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="visualisation_modif8" name="visualisation_modif8" />
                                                                    <label class="form-check-label" for="visualisation8"> Visualisation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="exportation_modif8" name="exportation_modif8" />
                                                                    <label class="form-check-label" for="exportation8"> Exportation </label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-nowrap fw-bolder" id="type_batiment" name="role_modif9">
                                                        <input class="form-check-input mr-10" type="checkbox" id="crte" name="crte" onchange="alerterSurCocheByRow_achatCarteModif('crte')"/>  
                                                        Achat de cartes</td>
                                                        <input type="text" name="role_modif9" id="contrat" hidden value="Achat de cartes">
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="lecture_modif9" name="lecture_modif9" />
                                                                    <label class="form-check-label" for="lecture9"> Lecture </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="creation_modif9" name="creation_modif9" />
                                                                    <label class="form-check-label" for="creation9"> Creation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="modification_modif9" name="modification_modif9" />
                                                                    <label class="form-check-label" for="modification9"> Modification </label>
                                                                </div>

                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="suppression_modif9" name="suppression_modif9" />
                                                                    <label class="form-check-label" for="suppression9"> Suppression </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="duplicata_modif9" name="duplicata_modif9" />
                                                                    <label class="form-check-label" for="duplicata9"> Duplicata </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="visualisation_modif9" name="visualisation_modif9" />
                                                                    <label class="form-check-label" for="visualisation9"> Visualisation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="exportation_modif9" name="exportation_modif9" />
                                                                    <label class="form-check-label" for="exportation9"> Exportation </label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-nowrap fw-bolder" id="type_appartement" name="role_modif10">
                                                            
                                                        <input class="form-check-input mr-10" type="checkbox" id="Vcrte" name="Vcrte" onchange="alerterSurCocheByRow_venteCarteModif('Vcrte')"/>Vente de cartes</td>
                                                        <input type="text" name="role_modif10" id="contrat" hidden value="Vente de cartes">
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="lecture_modif10" name="lecture_modif10" />
                                                                    <label class="form-check-label" for="lecture10"> Lecture </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="creation_modif10" name="creation_modif10" />
                                                                    <label class="form-check-label" for="creation10"> Creation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="modification_modif10" name="modification_modif10" />
                                                                    <label class="form-check-label" for="modification10"> Modification </label>
                                                                </div>

                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="suppression_modif10" name="suppression_modif10" />
                                                                    <label class="form-check-label" for="suppression10"> Suppression </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="duplicata_modif10" name="duplicata_modif10" />
                                                                    <label class="form-check-label" for="duplicata10"> Duplicata </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="visualisation_modif10" name="visualisation_modif10" />
                                                                    <label class="form-check-label" for="visualisation10"> Visualisation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="exportation_modif10" name="exportation_modif10" />
                                                                    <label class="form-check-label" for="exportation10"> Exportation </label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-nowrap fw-bolder" id="type_locataire" name="role_modif11">
                                                        <input class="form-check-input mr-10" type="checkbox" id="gram1" name="gram1" onchange="alerterSurCocheByRow_moneyGramModif('gram1')"/>
                                                        Money Gram</td>
                                                        <input type="text" name="role_modif11" id="contrat" hidden value="Money Gram">
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="lecture_modif11" name="lecture_modif11" />
                                                                    <label class="form-check-label" for="lecture11"> Lecture </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="creation_modif11" name="creation_modif11" />
                                                                    <label class="form-check-label" for="creation11"> Creation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="modification_modif11" name="modification_modif11" />
                                                                    <label class="form-check-label" for="modification11"> Modification </label>
                                                                </div>

                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="suppression_modif11" name="suppression_modif11" />
                                                                    <label class="form-check-label" for="suppression11"> Suppression </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="duplicata_modif11" name="duplicata_modif11" />
                                                                    <label class="form-check-label" for="duplicata11"> Duplicata </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="visualisation_modif11" name="visualisation_modif11" />
                                                                    <label class="form-check-label" for="visualisation11"> Visualisation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="exportation_modif11" name="exportation_modif11" />
                                                                    <label class="form-check-label" for="exportation11"> Exportation </label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-nowrap fw-bolder" id="type_piece" name="role_modif12">
                                                        <input class="form-check-input mr-10" type="checkbox" id="uba1" name="uba1" onchange="alerterSurCocheByRow_rechargementUbaModif('uba1')"/> 
                                                        Rechargement UBA</td>
                                                        <input type="text" name="role_modif12" id="contrat" hidden value="Rechargement UBA">
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="lecture_modif12" name="lecture_modif12" />
                                                                    <label class="form-check-label" for="lecture12"> Lecture </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="creation_modif12" name="creation_modif12" />
                                                                    <label class="form-check-label" for="creation12"> Creation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="modification_modif12" name="modification_modif12" />
                                                                    <label class="form-check-label" for="modification12"> Modification </label>
                                                                </div>

                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="suppression_modif12" name="suppression_modif12" />
                                                                    <label class="form-check-label" for="suppression12"> Suppression </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="duplicata_modif12" name="duplicata_modif12" />
                                                                    <label class="form-check-label" for="duplicata12"> Duplicata </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="visualisation_modif12" name="visualisation_modif12" />
                                                                    <label class="form-check-label" for="visualisation12"> Visualisation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="exportation_modif12" name="exportation_modif12" />
                                                                    <label class="form-check-label" for="exportation12"> Exportation </label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="text-nowrap fw-bolder" id="type_piece" name="role_modif19">
                                                        <input class="form-check-input mr-10" type="checkbox" id="tCrte" name="tCrte" onchange="alerterSurCocheByRow_typeCarteModif('tCrte')"/> 
                                                        Type de cartes</td>
                                                        <input type="text" name="role_modif19" id="contrat" hidden value="Type de cartes">
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="lecture_modif19" name="lecture_modif19" />
                                                                    <label class="form-check-label" for="lecture19"> Lecture </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="creation_modif19" name="creation_modif19" />
                                                                    <label class="form-check-label" for="creation19"> Creation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="modification_modif19" name="modification_modif19" />
                                                                    <label class="form-check-label" for="modification19"> Modification </label>
                                                                </div>

                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="suppression_modif19" name="suppression_modif19" />
                                                                    <label class="form-check-label" for="suppression19"> Suppression </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="duplicata_modif19" name="duplicata_modif19" />
                                                                    <label class="form-check-label" for="duplicata19"> Duplicata </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="visualisation_modif19" name="visualisation_modif19" />
                                                                    <label class="form-check-label" for="visualisation19"> Visualisation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="exportation_modif19" name="exportation_modif19" />
                                                                    <label class="form-check-label" for="exportation19"> Exportation </label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                
                                                     
                                                    <tr>
                                                        <td class="text-nowrap fw-bolder" id="type_piece" name="role_modif20">
                                                            
                                                        <input class="form-check-input mr-10" type="checkbox" id="regMode" name="regMode" onchange="alerterSurCocheByRow_modeReglementModif('regMode')"/>
                                                        Mode de règlement</td>
                                                        <input type="text" name="role_modif20" id="contrat" hidden value="Mode de reglement">
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="lecture_modif20" name="lecture_modif20" />
                                                                    <label class="form-check-label" for="lecture20"> Lecture </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="creation_modif20" name="creation_modif20" />
                                                                    <label class="form-check-label" for="creation20"> Creation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="modification_modif20" name="modification_modif20" />
                                                                    <label class="form-check-label" for="modification20"> Modification </label>
                                                                </div>

                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="suppression_modif20" name="suppression_modif20" />
                                                                    <label class="form-check-label" for="suppression20"> Suppression </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="duplicata_modif20" name="duplicata_modif20" />
                                                                    <label class="form-check-label" for="duplicata20"> Duplicata </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="visualisation_modif20" name="visualisation_modif20" />
                                                                    <label class="form-check-label" for="visualisation20"> Visualisation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="exportation_modif20" name="exportation_modif20" />
                                                                    <label class="form-check-label" for="exportation20"> Exportation </label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-nowrap fw-bolder" id="type_piece" name="role_modif21">
                                                        <input class="form-check-input mr-10" type="checkbox" id="nDepense" name="nDepense" onchange="alerterSurCocheByRow_natureDepenseModif('nDepense')"/>
                                                        
                                                        Nature de dépenses</td>
                                                        <input type="text" name="role_modif21" id="contrat" hidden value="Nature de dépenses">
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="lecture_modif21" name="lecture_modif21" />
                                                                    <label class="form-check-label" for="lecture21"> Lecture </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="creation_modif21" name="creation_modif21" />
                                                                    <label class="form-check-label" for="creation21"> Creation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="modification_modif21" name="modification_modif21" />
                                                                    <label class="form-check-label" for="modification21"> Modification </label>
                                                                </div>

                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="suppression_modif21" name="suppression_modif21" />
                                                                    <label class="form-check-label" for="suppression21"> Suppression </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="duplicata_modif21" name="duplicata_modif21" />
                                                                    <label class="form-check-label" for="duplicata21"> Duplicata </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="visualisation_modif21" name="visualisation_modif21" />
                                                                    <label class="form-check-label" for="visualisation21"> Visualisation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="exportation_modif21" name="exportation_modif21" />
                                                                    <label class="form-check-label" for="exportation21"> Exportation </label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-nowrap fw-bolder" id="gestion_utilisateurs" name="role_modif13">
                                                        <input class="form-check-input mr-10" type="checkbox" id="user" name="user" onchange="alerterSurCocheByRow_gestionUsersModif('user')"/>
                                                        
                                                        Gestion utilisateurs</td>
                                                        <input type="text" name="role_modif13" id="contrat" hidden value="Gestion utilisateurs">
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="lecture_modif13" name="lecture_modif13" />
                                                                    <label class="form-check-label" for="lecture13"> Lecture </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="creation_modif13" name="creation_modif13" />
                                                                    <label class="form-check-label" for="creation13"> Creation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="modification_modif13" name="modification_modif13" />
                                                                    <label class="form-check-label" for="modification13"> Modification </label>
                                                                </div>

                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="suppression_modif13" name="suppression_modif13" />
                                                                    <label class="form-check-label" for="suppression13"> Suppression </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="duplicata_modif13" name="duplicata_modif13" />
                                                                    <label class="form-check-label" for="duplicata13"> Duplicata </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="visualisation_modif13" name="visualisation_modif13" />
                                                                    <label class="form-check-label" for="visualisation13"> Visualisation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="exportation_modif13" name="exportation_modif13" />
                                                                    <label class="form-check-label" for="exportation13"> Exportation </label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-nowrap fw-bolder" id="Role_modif et permission" name="role_modif14">
                                                        <input class="form-check-input mr-10" type="checkbox" id="roles" name="roles" onchange="alerterSurCocheByRow_rolePermissionsModif('roles')"/>
                                                        role et permission</td>
                                                        <input type="text" name="role_modif14" id="contrat" hidden value="role_modif et permission">
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="lecture_modif14" name="lecture_modif14" />
                                                                    <label class="form-check-label" for="lecture14"> Lecture </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="creation_modif14" name="creation_modif14" />
                                                                    <label class="form-check-label" for="creation14"> Creation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="modification_modif14" name="modification_modif14" />
                                                                    <label class="form-check-label" for="modification14"> Modification </label>
                                                                </div>

                                                                <div class="form-check me-3 me-lg-5" id="">
                                                                    <input class="form-check-input" type="checkbox" id="suppression_modif14" name="suppression_modif14" />
                                                                    <label class="form-check-label" for="suppression14"> Suppression </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="duplicata_modif14" name="duplicata_modif14" />
                                                                    <label class="form-check-label" for="duplicata14"> Duplicata </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="visualisation_modif14" name="visualisation_modif14" />
                                                                    <label class="form-check-label" for="visualisation14"> Visualisation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="exportation_modif14" name="exportation_modif14" />
                                                                    <label class="form-check-label" for="exportation14"> Exportation </label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                   
                                                    <tr>
                                                        <td class="text-nowrap fw-bolder" id="reglages" name="role_modif15">
                                                        <input class="form-check-input mr-10" type="checkbox" id="manage" name="manage" onchange="alerterSurCocheByRow_reglageModif('manage')"/>
                                                            
                                                        Reglages</td>
                                                        <input type="text" name="role_modif15" id="contrat" hidden value="Reglages">
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="lecture_modif15" name="lecture_modif15" />
                                                                    <label class="form-check-label" for="lecture15"> Lecture </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="creation_modif15" name="creation_modif15" />
                                                                    <label class="form-check-label" for="creation15"> Creation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="modification_modif15" name="modification_modif15" />
                                                                    <label class="form-check-label" for="modification15"> Modification </label>
                                                                </div>

                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="suppression_modif15" name="suppression_modif15" />
                                                                    <label class="form-check-label" for="suppression15"> Suppression </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="duplicata_modif15" name="duplicata_modif15" />
                                                                    <label class="form-check-label" for="duplicata15"> Duplicata </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="visualisation_modif15" name="visualisation_modif15" />
                                                                    <label class="form-check-label" for="visualisation15"> Visualisation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="exportation_modif15" name="exportation_modif15" />
                                                                    <label class="form-check-label" for="exportation15"> Exportation </label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-nowrap fw-bolder" id="logo_pied_page" name="role_modif16">
                                                        <input class="form-check-input mr-10" type="checkbox" id="logoP" name="logoP" onchange="alerterSurCocheByRow_logoPiedPageModif('logoP')"/>
                                                            
                                                        Logo et pied de page</td>
                                                        <input type="text" name="role_modif16" id="contrat" hidden value="Logo et pied de page">
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="lecture_modif16" name="lecture_modif16" />
                                                                    <label class="form-check-label" for="lecture16"> Lecture </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="creation_modif16" name="creation_modif16" />
                                                                    <label class="form-check-label" for="creation16"> Creation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="modification_modif16" name="modification_modif16" />
                                                                    <label class="form-check-label" for="modification16"> Modification </label>
                                                                </div>

                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="suppression_modif16" name="suppression_modif16" />
                                                                    <label class="form-check-label" for="suppression16"> Suppression </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="duplicata_modif16" name="duplicata_modif16" />
                                                                    <label class="form-check-label" for="duplicata16"> Duplicata </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="visualisation_modif16" name="visualisation_modif16" />
                                                                    <label class="form-check-label" for="visualisation16"> Visualisation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="exportation_modif16" name="exportation_modif16" />
                                                                    <label class="form-check-label" for="exportation16"> Exportation </label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-nowrap fw-bolder" id="annees_de_gestion" name="role_modif17">
                                                        <input class="form-check-input mr-10" type="checkbox" id="year" name="year" onchange="alerterSurCocheByRow_anneeGestionModif('year')"/>
                                                        Annees de gestion</td>
                                                        <input type="text" name="role_modif17" id="contrat" hidden value="Annees de gestion">
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="lecture_modif17" name="lecture_modif17" />
                                                                    <label class="form-check-label" for="lecture17"> Lecture </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="creation_modif17" name="creation_modif17" />
                                                                    <label class="form-check-label" for="creation17"> Creation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="modification_modif17" name="modification_modif17" />
                                                                    <label class="form-check-label" for="modification17"> Modification </label>
                                                                </div>

                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="suppression_modif17" name="suppression_modif17" />
                                                                    <label class="form-check-label" for="suppression17"> Suppression </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="duplicata_modif17" name="duplicata_modif17" />
                                                                    <label class="form-check-label" for="duplicata17"> Duplicata </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="visualisation_modif17" name="visualisation_modif17" />
                                                                    <label class="form-check-label" for="visualisation17"> Visualisation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="exportation_modif17" name="exportation_modif17" />
                                                                    <label class="form-check-label" for="exportation17"> Exportation </label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-nowrap fw-bolder" id="dossier_entreprise" name="role_modif18">
                                                        <input class="form-check-input mr-10" type="checkbox" id="entre" name="entre" onchange="alerterSurCocheByRow_entrepriseGestionModif('entre')"/>
                                                        Dossier entreprise</td>
                                                        <input type="text" name="role_modif18" id="contrat" hidden value="Dossier entreprise">
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="lecture_modif18" name="lecture_modif18" />
                                                                    <label class="form-check-label" for="lecture18"> Lecture </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="creation_modif18" name="creation_modif18" />
                                                                    <label class="form-check-label" for="creation18"> Creation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="modification_modif18" name="modification_modif18" />
                                                                    <label class="form-check-label" for="modification18"> Modification </label>
                                                                </div>

                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="suppression_modif18" name="suppression_modif18" />
                                                                    <label class="form-check-label" for="suppression18"> Suppression </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="duplicata_modif18" name="duplicata_modif18" />
                                                                    <label class="form-check-label" for="duplicata18"> Duplicata </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="visualisation_modif18" name="visualisation_modif18" />
                                                                    <label class="form-check-label" for="visualisation18"> Visualisation </label>
                                                                </div>
                                                                <div class="form-check me-3 me-lg-5">
                                                                    <input class="form-check-input" type="checkbox" id="exportation_modif18" name="exportation_modif18" />
                                                                    <label class="form-check-label" for="exportation18"> Exportation </label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                       
                                        <!-- Permission table -->
                                    </div>

                                    <input type="hidden" id="idModif" name="idModif">
                                    
                                    <div class="col-12 text-center mt-2">
                                        <button type="submit" class="btn btn-primary me-1" id="bt_modifier" name="bt_modifier">Modifier</button>
                                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">
                                            Annuler
                                        </button>
                                    </div>
                                </form>
                                <!--/ Add role_modif form -->
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

    <script src="js/template/pages/app-user-list.js"></script>
    <script src="js/plugins/tables/datatable/buttons.html5.min.js"></script>
    <script src="js/plugins/tables/datatable/buttons.print.min.js"></script>

    <script src="js/template/app.js"></script>
    <script src="js/template/app-menu.js"></script>

    <?php include 'js/logiques/role_permission_datatable.php' ?>
    <?php include 'js/logiques/role_permission_logiques.php' ?>
    <?php include 'js/droits_access/gestion_DroitsAccess_DroitAcces.php' ?>
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