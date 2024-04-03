<!-- journal des recouvrement -->
<div class="modal fade" id="JournalMoov" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-add-new-role">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-2 pb-2">
                <div class="text-center mb-2">
                    <h4 class="role-title">Moov Money</h4>
                    <p>Previsualisation</p>
                </div>
                <!-- Add role form -->
                <form id="form_orange" name="form_orange" class="row" action="etats/EtatListeMoov.php" method="POST">
                    <div class="row" style="margin-left:5%">
                        <div class="col-md-5">
                            <!-- - DATE DEBUT - -->
                            <div>
                                <label class='form-label' for='date_debut'>Periode du</label>
                                <input type='text' class='form-control dt-full-libelle date_debut_filtre'  name='date_debut' placeholder='2024-01-12' />
                            </div>
                            <div class='mb-1'><small id='date_debutHelp' class='text-danger invisible'></small></div>
                        </div>
                        Au
                        <div class="col-md-5 ">
                            <!-- - DATE FIN - -->
                            <div>
                                <label class='form-label' for='date_fin'></label>
                                <input type='text' class='form-control dt-full-libelle date_fin_filtre'  name='date_fin' placeholder='2024-01-12' />
                            </div>
                            <div class='mb-1'><small id='date_finHelp' class='text-danger invisible'></small></div>
                        </div>
                    </div>
                    <div class="col-12 text-center mt-2">
                       <a href=""></a> <button type="submit" class="btn btn-primary me-1"   id="bt_moov" name="bt_moov">Visualiser</button>
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
<!-- journal des recouvrement -->
<?php include 'js/logiques/reporting_logiques.php' ?>

 <!-- Script JavaScript pour ouvrir le lien dans un nouvel onglet -->
<script>
         document.getElementById('btn_moov').addEventListener('click', function() {
        // Construisez l'URL de votre script PHP
        var url = 'etats/EtatListeMoov.php';
        // Ouvrez le lien dans un nouvel onglet
        window.open(url, '_blank');
    });
</script>
