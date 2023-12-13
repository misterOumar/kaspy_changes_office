<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <!-- Brand logo-->
            <a class="brand-logo" href="index.php">
                <div class="d-flex col-lg-10 align-items-center">
                    <img src="assets/images/logo.png" alt="" style="max-width: 30px;">
                    <h5 class="brand-text text-primary ms-1">Kaspy Changes Office</h5>
                </div>
            </a>
            <!-- /Brand logo-->
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
        </ul>
    </div>

    <div class="shadow-bottom"></div>

    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <!---
               <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">ANALYSES</span><i data-feather="more-horizontal"></i>
               </li>
                -->
            <li class="<?= $_GET['page'] === 'home' ? "nav-item active" : "nav-item" ?>"><a class="d-flex align-items-center" href="index.php?page=home"><i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboards">Accueil</span></a>
            </li>
            <li class="<?= $_GET['page'] === 'dashboard' ? "nav-item active" : "nav-item" ?>"><a class="d-flex align-items-center" href="index.php?page=dashboard"><i data-feather="pie-chart"></i><span class="menu-title text-truncate" data-i18n="Dashboards">Tableau de bord</span></a>
            </li>
            <!-- <li class="<?= $_GET['page'] === 'stats' ? "nav-item active" : "nav-item" ?>"><a class="d-flex align-items-center" href="index.html"><i data-feather="bar-chart-2"></i><span class="menu-title text-truncate" data-i18n="Dashboards">Statistiques</span></a>
               </li> -->

            <?php
            //   include("models/Role_permission_details.php");
            //    $details = role_permission_details::getDetailsByID($_SESSION['KaspyISS_user']['type_compte']);
            ?>

            <li class=" navigation-header" style="margin-top:15px;"><span data-i18n="Apps &amp; Pages">COMPTABILITE</span><i data-feather="more-horizontal"></i>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="sliders"></i><span class="menu-title text-truncate" data-i18n="Invoice">Transactions</span></a>
                <ul class="menu-content">


                    <li class="<?= $_GET['page'] === 'changes' ? "active" : "" ?>"><a class="d-flex align-items-center" href="index.php?page=changes"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Changes</span></a>
                    </li>
                    <?php if (intval($_SESSION['KaspyISS_user_details'][4]['lecture']) === 1) { ?>
                        <li class="<?= $_GET['page'] === 'orange_money' ? "active" : "" ?>"><a class="d-flex align-items-center" href="index.php?page=orange_money"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Orange money</span></a>
                        </li>
                    <?php
                    }; ?>
                    <li class="<?= $_GET['page'] === 'money_gram' ? "active" : "" ?>"><a class="d-flex align-items-center" href="index.php?page=money_gram"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Money Gram</span></a>
                    </li>

                    <?php if (intval($_SESSION['KaspyISS_user_details'][5]['lecture']) === 1) { ?>
                        <li class="<?= $_GET['page'] === 'mtn_money' ? "active" : "" ?>"><a class="d-flex align-items-center" href="index.php?page=mtn_money"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List"> MTN money</span></a>
                        </li>
                    <?php
                    }; ?>




                    <?php if (intval($_SESSION['KaspyISS_user_details'][8]['lecture']) === 1) { ?>
                        <li class="<?= $_GET['page'] === 'type_batiment' ? "active" : "" ?>"><a class="d-flex align-items-center" href="index.php?page=uba"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Edit">UBA</span></a>
                        </li>
                    <?php
                    }; ?>

                    <?php if (intval($_SESSION['KaspyISS_user_details'][9]['lecture']) === 1) { ?>
                        <li class="<?= $_GET['page'] === 'upload_western_union' ? "active" : "" ?>"><a class="d-flex align-items-center" href="index.php?page=upload_western_union"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Edit">Wersten Union</span></a>
                        </li>
                    <?php
                    }; ?>

                    <?php if (intval($_SESSION['KaspyISS_user_details'][10]['lecture']) === 1) { ?>
                        <li class="<?= $_GET['page'] === 'upload_ria' ? "active" : "" ?>"><a class="d-flex align-items-center" href="index.php?page=upload_ria"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Edit">RIA</span></a>
                        </li>
                    <?php
                    }; ?>

                </ul>
            </li>



       

            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M470.1 231.3s7.6 37.2 9.3 45H446c3.3-8.9 16-43.5 16-43.5-.2 .3 3.3-9.1 5.3-14.9l2.8 13.4zM576 80v352c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48h480c26.5 0 48 21.5 48 48zM152.5 331.2L215.7 176h-42.5l-39.3 106-4.3-21.5-14-71.4c-2.3-9.9-9.4-12.7-18.2-13.1H32.7l-.7 3.1c15.8 4 29.9 9.8 42.2 17.1l35.8 135h42.5zm94.4 .2L272.1 176h-40.2l-25.1 155.4h40.1zm139.9-50.8c.2-17.7-10.6-31.2-33.7-42.3-14.1-7.1-22.7-11.9-22.7-19.2 .2-6.6 7.3-13.4 23.1-13.4 13.1-.3 22.7 2.8 29.9 5.9l3.6 1.7 5.5-33.6c-7.9-3.1-20.5-6.6-36-6.6-39.7 0-67.6 21.2-67.8 51.4-.3 22.3 20 34.7 35.2 42.2 15.5 7.6 20.8 12.6 20.8 19.3-.2 10.4-12.6 15.2-24.1 15.2-16 0-24.6-2.5-37.7-8.3l-5.3-2.5-5.6 34.9c9.4 4.3 26.8 8.1 44.8 8.3 42.2 .1 69.7-20.8 70-53zM528 331.4L495.6 176h-31.1c-9.6 0-16.9 2.8-21 12.9l-59.7 142.5H426s6.9-19.2 8.4-23.3H486c1.2 5.5 4.8 23.3 4.8 23.3H528z"/></svg><span class="menu-title text-truncate" data-i18n="Invoice">Cartes VISA</span></a>
                <ul class="menu-content">


                    <?php if (intval($_SESSION['KaspyISS_user_details'][10]['lecture']) === 1) { ?>
                        <li class="<?= $_GET['page'] === 'vente_carte' ? "active" : "" ?>"><a class="d-flex align-items-center" href="index.php?page=vente_carte"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Edit">Vente de carte</span></a>
                        </li>
                    <?php
                    }; ?>
                    
                    <?php if (intval($_SESSION['KaspyISS_user_details'][10]['lecture']) === 1) { ?>
                        <li class="<?= $_GET['page'] === 'carte' ? "active" : "" ?>"><a class="d-flex align-items-center" href="index.php?page=carte"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Edit">Achat de carte</span></a>
                        </li>
                    <?php
                    }; ?>



                </ul>
            </li>







            <?php if (intval($_SESSION['KaspyISS_user_details'][2]['lecture']) === 1) { ?>
                <li class="<?= $_GET['page'] === 'recouvrements' ? "nav-item active" : "nav-item" ?>"><!--a class="d-flex align-items-center" href="index.php?page=recouvrements"><i data-feather="check-circle"></i><span class="menu-title text-truncate" data-i18n="refresh">Recouvrements</span></a-->
                </li>

            <?php
            }; ?>



            </li>
            <li class=" navigation-header" style="margin-top:15px;"><span data-i18n="Apps &amp; Pages">CONFIGURATION</span><i data-feather="more-horizontal"></i>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="sliders"></i><span class="menu-title text-truncate" data-i18n="Invoice">Structure</span></a>
                <ul class="menu-content">


                    <?php if (intval($_SESSION['KaspyISS_user_details'][10]['lecture']) === 1) { ?>
                        <li class="<?= $_GET['page'] === 'type_carte' ? "active" : "" ?>"><a class="d-flex align-items-center" href="index.php?page=type_carte"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Edit">Type de cartes</span></a>
                        </li>
                    <?php
                    }; ?>



                </ul>
            </li>

            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="user-check"></i><span class="menu-title text-truncate" data-i18n="Invoice">Utilisateurs</span></a>
                <ul class="menu-content">
                    <!-- <li class="<?= $_GET['page'] === 'droits_access' ? "active" : "" ?>"><a class="d-flex align-items-center" href="index.php?page=droits_access"><i data-feather="shield"></i><span class="menu-item text-truncate" data-i18n="List">Droits d'accès</span></a> -->
            </li>

            <?php if (intval($_SESSION['KaspyISS_user_details'][12]['lecture']) === 1) { ?>
                <li class="<?= $_GET['page'] === 'gestion_users' ? "active" : "" ?>"><a class="d-flex align-items-center" href="index.php?page=gestion_users"><i data-feather="tool"></i><span class="menu-item text-truncate" data-i18n="Preview">Gestion utilisateurs</span></a>
                </li>
            <?php
            }; ?>
        </ul>
        </li>

        <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="monitor"></i><span class="menu-title text-truncate" data-i18n="Invoice">Application</span></a>
            <ul class="menu-content">

                <!-- <?php if (intval($_SESSION['KaspyISS_user_details'][14]['lecture']) === 1) { ?>
                       <li class="<?= $_GET['page'] === 'reglages' ? "active" : "" ?>"><a class="d-flex align-items-center" href="app-invoice-list.html"><i data-feather="settings"></i><span class="menu-item text-truncate" data-i18n="List">Réglages</span></a>
                       </li>
                   <?php
                        }; ?> -->

                <?php if (intval($_SESSION['KaspyISS_user_details'][15]['lecture']) === 1) { ?>
                    <li class="<?= $_GET['page'] === 'logo_pied_page' ? "active" : "" ?>"><a class="d-flex align-items-center" href="index.php?page=logo_pied_page"><i data-feather="package"></i><span class="menu-item text-truncate" data-i18n="List">Logo et
                                pied de page</span></a>
                    </li>
                <?php
                }; ?>

                <?php if (intval($_SESSION['KaspyISS_user_details'][16]['lecture']) === 1) { ?>
                    <li class="<?= $_GET['page'] === 'annees' ? "active" : "" ?>"><a class="d-flex align-items-center" href="index.php?page=annees"><i data-feather="folder"></i><span class="menu-item text-truncate" data-i18n="Preview">Années de gestion</span></a>
                    </li>
                <?php
                }; ?>
                <?php if (intval($_SESSION['KaspyISS_user_details'][17]['lecture']) === 1) { ?>
                    <li class="<?= $_GET['page'] === 'bureaux' ? "active" : "" ?>"><a class="d-flex align-items-center" href="index.php?page=bureaux"><i data-feather="archive"></i><span class="menu-item text-truncate" data-i18n="Preview">Dossier entreprise</span></a>
                    </li>
                <?php
                }; ?>
            </ul>
        </li>
        </ul>
    </div>
</div>
<!-- END: Main Menu-->