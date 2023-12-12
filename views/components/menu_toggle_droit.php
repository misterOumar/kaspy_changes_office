<?php
$bureaux = null;
if (isset($_GET['page']) and !empty($_GET['page'])) {
    include("models/Bureaux.php");
    $bureaux = bureaux::getAll();
    // require_once('models/Locataires.php');

    if ($_GET['page'] !== 'annees') {
        include("models/Annees.php");

    }
    $annees = annees::getAll();
    // $liste_locataires = locataires::getAll();
}
?>
<div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
    <div class="mb-1 breadcrumb-right">
        <div class="dropdown">
            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="grid"></i></button>
            <div class="dropdown-menu dropdown-menu-end">
                <!-- <div class="dropdown-item mb-1">
                    <label class='form-label' for='type_salle'>Choisir une école</label>
                    <select class="form-control" id="bureau" name="bureau" tabindex="3" required>
                        <?php
                        foreach ($bureaux as $key => $bureau) {
                            if ($bureau['libelle'] === $_SESSION["KaspyISS_bureau"]) {
                        ?>
                                <option selected><?= $bureau['libelle']; ?></option>
                            <?php
                            } else {
                            ?>
                                <option><?= $bureau['libelle']; ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                </div> -->

                <div class="dropdown-item mb-1">
                    <label class='form-label' for='type_salle'>Choisir l'année de gestion</label>
                    <select class="form-control" id="annee" name="annee" tabindex="3" required>
                        <?php
                        foreach ($annees as $key => $annee) {
                            if ($annee['annees'] === $_SESSION["KaspyISS_annee"]) {
                        ?>
                                <option selected><?= $annee['annees']; ?></option>
                            <?php
                            } else {
                            ?>
                                <option><?= $annee['annees']; ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                </div>
                <a class="dropdown-item" href="javascript:void(0)" class="stretched-link text-nowrap add-new-role" data-bs-target="#InterogerLocataire" data-bs-toggle="modal">
                    <i class="me-1" data-feather="message-square"></i>
                    <span class="align-middle">Intéroger un locataire</span>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- INTERROGER UN LOCATAIRE -->

<div class="modal fade" id="InterogerLocataire" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-add-new-role">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-5 pb-5">
                <div class="text-center mb-4">
                    <h3 class="role-title">Intéroger un locataire</h3>
                    <p>Recuperer les informations</p>
                </div>
                <!-- Add role form -->
                <form id="interoger_locataire" name="interoger_locataire" class="row" action="controllers/annees_controller.php" method="POST">
                    <div class="col-12">

                        <!-- LISTE ELEMENT -->
                        <div>
                            <label class='form-label' for='locataire'>Choisir le locataire</label>
                            <select name='locataire' id='locataire' data-placeholder="Choisir le locataire..." class='select2-icons form-select'>
                                <option selected>Choisir le locataire...</option>
                                <?php
                                foreach ($liste_locataires as $key => $locataires) { ?>
                                    <option value="<?= $locataires["id"] ?>"><?= $locataires["nom_prenom"] ?></option>
                                <?php
                                }

                                ?>
                            </select>
                        </div>

                        <div class='mb-1'><small id='locataireHelp' class='text-danger invisible'></small></div>

                        <!-- <div class="row">
                            <div class="col-md-5">
                                - DATE DEBUT -
                                <div>
                                    <label class='form-label' for='date_debut'>Du</label>
                                    <input type='text' class='form-control dt-full-libelle' id='date_debut' name='date_debut' placeholder='Veuillez saisir le date_signature' />

                                </div>
                                <div class='mb-1'><small id='date_debutHelp' class='text-danger invisible'></small></div>
                            </div>
                            Au
                            <div class="col-md-5">
                                - DATE FIN -
                                <div>
                                    <label class='form-label' for='date_fin'></label>
                                    <input type='text' class='form-control dt-full-libelle' id='date_fin' name='date_fin' placeholder='Veuillez saisir le date_signature' />
                                </div>
                                <div class='mb-1'><small id='date_finHelp' class='text-danger invisible'></small></div>
                            </div>
                        </div> -->
                    </div>
                    <div class="col-12 text-center mt-2">
                        <button type="submit" class="btn btn-primary me-1" id="bt_interoger_locataire" name="bt_interoger_locataire">Enregistrer</button>
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

<!-- Fin liste des batiments par proprietaire -->
<?php include 'js/logiques/reporting_logiques.php' ?>
<?php include 'js/logiques/annees_logiques.php' ?>



<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<script>
    $('#annee').on('change', function() {
        var anneechoisi = $('#annee').val();
        location.href = "controllers/actions.php?Changer_annee=" + anneechoisi;
    });

    $('#bureau').on('change', function() {
        var bureauchoisi = $('#bureau').val();
        $.ajax({
            type: "GET",
            data: "Changer_bureau=" + bureauchoisi,
            url: "controllers/actions.php",
            success: function(result) {
                var donnees = JSON.parse(result)
                if (donnees['success'] === 'true') {
                    //Rédirection vers home
                    location.href = "index.php?page=home";
                }
            }
        });
    });
</script>