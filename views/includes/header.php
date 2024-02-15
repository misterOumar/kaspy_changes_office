<?php include_once 'includes/licence_modal.php' ?>
<?php include_once 'components/journal_orange.php' ?>
<link rel="stylesheet" href="css/drop_menu_etats.css" />

<!-- BEGIN: Header-->
<nav
    class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
    <div class="navbar-container d-flex content">

        <div class="bookmark-wrapper d-flex align-items-center">
            <ul class="nav navbar-nav d-xl-none">
                <li class="nav-item"><a class="nav-link menu-toggle" href="#"><i class="ficon"
                            data-feather="menu"></i></a></li>
            </ul>
        </div>
        <div class="navbar-nav align-items-center navbar-expand">
            <div class="">
                <a class="btn btn-flat-primary dropdown-toggl d-sm-inline-block d-none" id="dropdownMenuButton100"
                    data-bs-toggle="dropdown" aria-expanded="false" style="left:-5px">
                    Fichier
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton100">
                    <a href="controllers/deconnexion.php?logout=true" class="dropdown-item">
                        <i class="fas fa-power-off mr-2"></i> Se déconnecter
                    </a>
                </div>
            </div>
            <div class="">
                <li class="nav-item drop-down01">
                    <a class="btn btn-flat-primary dropdown-toggl" id="dropdownMenuButton100" data-bs-toggle="dropdown"
                        aria-expanded="false" style="left:-20px">
                        Etats
                    </a>
                    <ul class="dropdown-menu sub-menu01" aria-labelledby="navbarDropdown">
                       <!-- GESTION DE L AFFICHAGE  MOBILE MONEY-->
                            <strong class="ms-2"> Mobile Money</strong>                          
                            <?php if (                          
                             intval($_SESSION['KaspyISS_user_details'][7]['lecture']) === 1
                        ) { ?>
                            <li><a class="dropdown-item" target="_blank" data-bs-target="#JournalOrange"
                                    data-bs-toggle="modal"><i class="fas fa-file-alt mr-2"> </i> Journal des transactions
                                    Orange Money</a></li>
                                    <?php
                        }
                        ; ?>
                         <?php if (                          
                             intval($_SESSION['KaspyISS_user_details'][5]['lecture']) === 1
                        ) { ?>
                            <li><a class="dropdown-item" target="_blank" data-bs-target="#JournalMoov"
                                    data-bs-toggle="modal" target="_blank"><i class="fas fa-file-alt mr-2"> </i> Journal des
                                    transactions Moov Money</a></li>       
                         <?php
                        }
                        ; ?>
                           <?php if (                          
                             intval($_SESSION['KaspyISS_user_details'][6]['lecture']) === 1
                        ) { ?>

                            <li><a class="dropdown-item" target="_blank" data-bs-target="#JournalMtn"
                                    data-bs-toggle="modal"><i class="fas fa-file-alt mr-2"> </i> Journal des transactions
                                    Mtn Money</a></li>      <?php
                        }
                        ; ?>
                        <!-- GESTION DE L AFFICHAGE  CARTE-->
                        <?php if (
                            intval($_SESSION['KaspyISS_user_details'][8]['lecture']) === 1
                            && intval($_SESSION['KaspyISS_user_details'][9]['lecture']) === 1
                        ) { ?>
                            <div class="dropdown-divider"></div>
                            <strong class="ms-2"> Cartes</strong>
                            <li><a class="dropdown-item" href="etats/EtatListeCarte.php" target="_blank"><i
                                        class="fas fa-file-alt mr-2"> </i>
                                    Liste des cartes</a> </li>
                            <li><a class="dropdown-item" href="etats/EtatListeVenteCarte.php" target="_blank"><i
                                        class="fas fa-file-alt mr-2"> </i>
                                    Journal des ventes de cartes</a> </li>
                            <li><a class="dropdown-item" href="etats/EtatStockDisponible.php" target="_blank"><i
                                        class="fas fa-file-alt mr-2"> </i>
                                    Stock de carte disponible</a> </li>
                            <?php
                        }
                        ; ?>
                        <!-- GESTION DE L AFFICHAGE  DES TRANSACTION -->                       
                            <div class="dropdown-divider"></div>
                            <strong class="ms-2"> Transactions</strong>
                            <?php if (                                                      
                            intval($_SESSION['KaspyISS_user_details'][10]['lecture']) === 1                        
                        ) { ?>
                            <li><a class="dropdown-item" href="etats/EtatListeOperationMoneyGram.php" target="_blank"><i
                                        class="fas fa-file-alt mr-2"> </i>
                                    Rapport de suivi des opérations Money Gram</a> </li>   
                                       <?php
                        }
                        ; ?>
                    <?php if (                                                      
                            intval($_SESSION['KaspyISS_user_details'][0]['lecture']) === 1                        
                        ) { ?>
                            <li><a class="dropdown-item" href="etats/EtatListeOperationRIA.php" target="_blank"><i
                                        class="fas fa-file-alt mr-2"> </i>
                                    Rapport de suivi des opérations RIA</a> </li> 
                                    <?php
                        }
                        ; ?>
                    <?php if (                                                      
                            intval($_SESSION['KaspyISS_user_details'][1]['lecture']) === 1                        
                        ) { ?>
                            <li><a class="dropdown-item" href="etats/EtatListeOperationWU.php" target="_blank"><i
                                        class="fas fa-file-alt mr-2"> </i>
                                    Rapport de suivi des opérations WU</a> </li>                          
                     
                            <li><a class="dropdown-item" href="etats/EtatCaisseTransactions.php" target="_blank"><i
                                        class="fas fa-file-alt mr-2"> </i>
                                    Rapport de la caisse des transactions</a> </li>           <?php
                        }
                        ; ?>
                 
                            <li>
                                <a class="dropdown-item" href="etats/EtatListeAllTransfert.php" target="_blank"><i
                                        class="fas fa-file-alt mr-2"> </i>
                                    Résumé de tous les transferts</a> </li>
                     
                        <div class="dropdown-divider"></div>
                        <?php if (
                            intval($_SESSION['KaspyISS_user_details'][2]['lecture']) === 1
                        ) { ?>
                            <li><a class="dropdown-item" href="etats/EtatListeChange.php" target="_blank"><i
                                        class="fas fa-file-alt mr-2"> </i>
                                    Liste des changes</a> </li>
                            <?php
                        }
                        ; ?>
                    </ul>
                </li>
            </div>
            <div class="">
                <a class="btn btn-flat-primary" id="dropdownMenuButton600" data-bs-toggle="dropdown"
                    aria-expanded="false" style="left:-20px">
                    ?
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton600">
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-info-circle mr-2"> </i>
                        <?= "A propos de " . APP_NAME ?>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-question-circle mr-2"> </i> Aide
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#licenceModal" class="dropdown-item" data-toggle="modal">
                        <i class="fas fa-award mr-2"> </i> Licence d'utilisation
                    </a>
                </div>
            </div>
        </div>

        <ul class="nav navbar-nav align-items-center ms-auto">
            <li id="Dark_Mode" class="nav-item d-none d-lg-block"><a class="nav-link nav-link-style"><i class="ficon"
                        data-feather="moon"></i></a></li>
            <li class="nav-item nav-search"><a class="nav-link nav-link-search"><i class="ficon"
                        data-feather="search"></i></a>
                <div class="search-input">
                    <div class="search-input-icon"><i data-feather="search"></i></div>
                    <input class="form-control input" type="text" placeholder="  <?= "Explorer " . APP_NAME . "..." ?>"
                        tabindex="-1" data-search="search">
                    <div class="search-input-close"><i data-feather="x"></i></div>
                    <ul class="search-list search-list-main"></ul>
                </div>
            </li>

            <li class="nav-item dropdown dropdown-notification me-25"><a class="nav-link" href="#"
                    data-bs-toggle="dropdown"><i class="ficon" data-feather="bell"></i><span
                        class="badge rounded-pill bg-danger badge-up">5</span></a>
                <ul class="dropdown-menu dropdown-menu-media dropdown-menu-end">
                    <li class="dropdown-menu-header">
                        <div class="dropdown-header d-flex">
                            <h4 class="notification-title mb-0 me-auto">Notifications</h4>
                            <div class="badge rounded-pill badge-light-primary">6 New</div>
                        </div>
                    </li>
                    <li class="scrollable-container media-list"><a class="d-flex" href="#">
                            <div class="list-item d-flex align-items-start">
                                <div class="me-1">
                                    <div class="avatar"><img src="" alt="avatar" width="32" height="32"></div>
                                </div>
                                <div class="list-item-body flex-grow-1">
                                    <p class="media-heading"><span class="fw-bolder">Congratulation Sam 🎉</span>winner!
                                    </p><small class="notification-text"> Won the monthly best seller badge.</small>
                                </div>
                            </div>
                        </a><a class="d-flex" href="#">
                            <div class="list-item d-flex align-items-start">
                                <div class="me-1">
                                    <div class="avatar"><img src="" alt="avatar" width="32" height="32"></div>
                                </div>
                                <div class="list-item-body flex-grow-1">
                                    <p class="media-heading"><span class="fw-bolder">New message</span>&nbsp;received
                                    </p><small class="notification-text"> You have 10 unread messages</small>
                                </div>
                            </div>
                        </a><a class="d-flex" href="#">
                            <div class="list-item d-flex align-items-start">
                                <div class="me-1">
                                    <div class="avatar bg-light-danger">
                                        <div class="avatar-content">MD</div>
                                    </div>
                                </div>
                                <div class="list-item-body flex-grow-1">
                                    <p class="media-heading"><span class="fw-bolder">Revised Order
                                            👋</span>&nbsp;checkout</p><small class="notification-text"> MD Inc. order
                                        updated</small>
                                </div>
                            </div>
                        </a>
                        <div class="list-item d-flex align-items-center">
                            <h6 class="fw-bolder me-auto mb-0">System Notifications</h6>
                            <div class="form-check form-check-primary form-switch">
                                <input class="form-check-input" id="systemNotification" type="checkbox" checked="">
                                <label class="form-check-label" for="systemNotification"></label>
                            </div>
                        </div><a class="d-flex" href="#">
                            <div class="list-item d-flex align-items-start">
                                <div class="me-1">
                                    <div class="avatar bg-light-danger">
                                        <div class="avatar-content"><i class="avatar-icon" data-feather="x"></i></div>
                                    </div>
                                </div>
                                <div class="list-item-body flex-grow-1">
                                    <p class="media-heading"><span class="fw-bolder">Server down</span>&nbsp;registered
                                    </p><small class="notification-text"> USA Server is down due to high CPU
                                        usage</small>
                                </div>
                            </div>
                        </a><a class="d-flex" href="#">
                            <div class="list-item d-flex align-items-start">
                                <div class="me-1">
                                    <div class="avatar bg-light-success">
                                        <div class="avatar-content"><i class="avatar-icon" data-feather="check"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-item-body flex-grow-1">
                                    <p class="media-heading"><span class="fw-bolder">Sales report</span>&nbsp;generated
                                    </p><small class="notification-text"> Last month sales report generated</small>
                                </div>
                            </div>
                        </a><a class="d-flex" href="#">
                            <div class="list-item d-flex align-items-start">
                                <div class="me-1">
                                    <div class="avatar bg-light-warning">
                                        <div class="avatar-content"><i class="avatar-icon"
                                                data-feather="alert-triangle"></i></div>
                                    </div>
                                </div>
                                <div class="list-item-body flex-grow-1">
                                    <p class="media-heading"><span class="fw-bolder">High memory</span>&nbsp;usage</p>
                                    <small class="notification-text"> BLR Server using high memory</small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="dropdown-menu-footer"><a class="btn btn-primary w-100" href="#">Read all
                            notifications</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link"
                    id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="user-nav d-sm-flex d-none"><span class="user-name fw-bolder">
                            <?= $_SESSION["KaspyISS_user"]['users'] ?>
                        </span><span class="user-status">
                            <?= $_SESSION["KaspyISS_user"]['type_compte_reel'] ?>
                        </span></div><span class="avatar"><img class="round"
                            src="<?= "assets/images/users/" . $_SESSION["KaspyISS_user"]['photo'] ?>" alt="avatar"
                            height="40" width="40"><span class="avatar-status-online"></span></span>
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user"><a class="dropdown-item"
                        href="index.php?page=profile"><i class="me-50" data-feather="user"></i> Mon profile</a>
                    <div class="dropdown-divider"></div><a class="dropdown-item" href="index.php?page=entreprise"><i
                            class="me-50" data-feather="settings"></i> Paramètres</a><a class="dropdown-item"
                        href="controllers/deconnexion.php?logout=true"><i class="me-50" data-feather="power"></i>
                        Déconnexion</a>
                </div>
            </li>
        </ul>
    </div>
</nav>

<!-- END: Header-->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        const body = document.querySelector(".vertical-layout");
        const darkModeToggle = document.getElementById("Dark_Mode");

        // Vérifiez l'état du mode sombre dans le stockage local lors du chargement de la page
        const darkModeEnabled = localStorage.getItem("darkMode") === "enabled";

        // Appliquer le mode sombre si activé
        if (darkModeEnabled) {
            body.classList.add("dark-layout");
        }

        // Gérer le clic sur le bouton de basculement du mode sombre
        darkModeToggle.addEventListener("click", function () {
            // Basculez entre activé et désactivé
            if (body.classList.contains("dark-layout")) {
                body.classList.remove("dark-layout");
                localStorage.setItem("darkMode", "disabled");
            } else {
                body.classList.add("dark-layout");
                localStorage.setItem("darkMode", "enabled");
            }
        });
    });
</script>