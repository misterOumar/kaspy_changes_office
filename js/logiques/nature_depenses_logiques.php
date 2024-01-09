<?php include("views/components/alerts.php") ?>

<script>
    // MES LOGIQUES
    //  Vider les champs
    function vider_les_champs() {
        // libelle
        $('#libelle').val('');
        $('#libelle').removeClass('is-invalid');
        $('#libelleHelp').html('');
        $('#libelleHelp').addClass('invisible');
        // frequence
        $('#frequence').val('Choisir la fréquence...');
        $('#frequence').removeClass('is-invalid');
        $('#frequenceHelp').html('');
        $('#frequenceHelp').addClass('invisible');
        // observations
        $('#observations').val('');
        $('#observations').removeClass('is-invalid');
        $('#observationsHelp').html('');
        $('#observationsHelp').addClass('invisible');


        $('#libelle').focus();
    }

    $('#bt_vider').on('click', function() {
        vider_les_champs()
    });



    // VERIFICATIONS DU FORMULAIRE 
    var formValide = false;

    //      Les événements en déhors du click du boutton de validation
    $('#frequence').on('change', function() {
        $('#frequence').removeClass('is-invalid');
        $('#frequenceHelp').html('');
    });

    $('#libelle').on('keydown', function() {
        $('#libelle').removeClass('is-invalid');
        $('#libelleHelp').html('');
    });


    //      Au click du boutton
    $('#bt_enregistrer').on('click', function() {
        // Cas de - Nom
        var libelle = $('#libelle').val();
        if (libelle === '') {
            formValide = false;
            $('#libelle').addClass('is-invalid');
            $('#libelleHelp').html('Veillez saisir la nature depense');
            $('#libelleHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#libelle').removeClass('is-invalid');
            $('#libelleHelp').html('');
            $('#libelleHelp').addClass('invisible');
        }
        // Cas de - Type de salle
        let frequence = $('#frequence').val();
        if (frequence === 'Choisir la fréquence...') {
            formValide = false;
            $('#frequence').addClass('is-invalid');
            $('#frequenceHelp').html('Veillez choisir la frequence.');
            $('#frequenceHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#frequence').removeClass('is-invalid');
            $('#frequenceHelp').html('');
            $('#frequenceHelp').addClass('invisible');
        }

    });

    // MODIFICATION
    //      Les événements en déhors du click du boutton de validation
    $('#frequence_modif').on('change', function() {
        $('#frequence_modif').removeClass('is-invalid');
        $('#frequence_modifHelp').html('');
    });

    $('#libelle_modif').on('keydown', function() {
        $('#libelle_modif').removeClass('is-invalid');
        $('#libelle_modifHelp').html('');
    });


    //      Au click du boutton
    $('#bt_modifier').on('click', function(e) {
        var submitUpdate = false;
        // Cas de - Nom
        var libelle = $('#libelle_modif').val();
        if (libelle === '') {
            submitUpdate = false;
            $('#libelle_modif').addClass('is-invalid');
            $('#libelle_modifHelp').html('Veillez saisir la nature depense');
            $('#libelle_modifHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            submitUpdate = true;
            $('#libelle_modif').removeClass('is-invalid');
            $('#libelle_modifHelp').html('');
            $('#libelle_modifHelp').addClass('invisible');
        }
        // Cas de - Type de salle
        let frequence = $('#frequence_modif').val();
        if (frequence === 'Choisir la fréquence...') {
            submitUpdate = false;
            $('#frequence_modif').addClass('is-invalid');
            $('#frequence_modifHelp').html('Veillez choisir la frequence.');
            $('#frequence_modifHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            submitUpdate = true;
            $('#frequence_modif').removeClass('is-invalid');
            $('#frequence_modifHelp').html('');
            $('#frequence_modifHelp').addClass('invisible');
        }


        if (submitUpdate) {

            e.preventDefault();

            initializeFlash();
            $('.flash').addClass('alert-info');
            $('.flash').html('<i class="fas fa-cog fa-spin"></i> Modification...').fadeIn(300);

            var form = $('#form_modifier');
            var method = form.prop('method');
            var url = form.prop('action');

            $.ajax({
                type: method,
                data: form.serialize() + "&bt_modifier=" + true,
                url: url,
                success: function(result) {
                    donnee = JSON.parse(result);
                    if (donnee['success'] === 'existe') {
                        $('#libelle_modif').addClass('is-invalid');
                        $('#libelle_modifHelp').html(donnee['message']);
                        $('#libelle_modifHelp').removeClass('invisible');

                        initializeFlash();
                        $('.flash').addClass('alert-info');
                        $('.flash').html('<i class="fas fa-exclamation-circle"></i> ' + donnee['message'])
                            .fadeIn(300).delay(2500).fadeOut(300);
                    }

                    if (donnee['success'] === 'true') {
                        initializeFlash();
                        $('.flash').addClass('alert-success');
                        $('.flash').html('<i class="fas fa-check"></i> ' + donnee['message'])
                            .fadeIn(300).delay(2500).fadeOut(300);
                        swal_Alert_Sucess(donnee['message'])
                        $('.modal').modal('hide');
                        window.location.reload();
                    }

                    if (donnee['success'] === 'non') {
                        initializeFlash();
                        $('.flash').addClass('alert-danger');
                        $('.flash').html('<i class="fas fa-exclamation-circle"></i> ' + donnee['message'])
                            .fadeIn(300).delay(2500).fadeOut(300);
                    }

                    if (donnee['success'] === 'false') {
                        initializeFlash();
                        $('.flash').addClass('alert-danger');
                        $('.flash').html('<i class="fas fa-exclamation-circle"></i> Vérifiez les champs')
                            .fadeIn(300).delay(2500).fadeOut(300);
                    }
                }
            });
        }

    });
</script>