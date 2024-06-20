<?php include ("views/components/alerts.php") ?>

<script>
    // MES LOGIQUES
    //  Vider les champs
    function vider_les_champs() {
        // libelle
        $('#libelle').val('');
        $('#libelle').removeClass('is-invalid');
        $('#libelleHelp').html('');
        $('#libelleHelp').addClass('invisible');

        $('#libelle').focus();
    }

    $('#bt_vider').on('click', function() {
        vider_les_champs()
    });



    // VERIFICATIONS DU FORMULAIRE 
    var formValide = false;

    //      Les événements en déhors du click du boutton de validation

    $('#libelle').on('keydown', function() {
        $('#libelle').removeClass('is-invalid');
        $('#libelleHelp').html('');
        $('#libelleHelp').addClass('invisible')
    });


    //      Au click du boutton
    $('#bt_enregistrer').on('click', function() {
        // Cas de - libelle
        var libelle = $('#libelle').val();
        if (libelle === '') {
            formValide = false;
            $('#libelle').addClass('is-invalid');
            $('#libelleHelp').html('Veillez saisir le libelle.');
            $('#libelleHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#libelle').removeClass('is-invalid');
            $('#libelleHelp').html('');
            $('#libelleHelp').addClass('invisible');
        }

    });

     // MODIFICATION
    //      Les événements en déhors du click du boutton de validation
    $('#libelle_modif').on('keydown', function() {
        $('#libelle_modif').removeClass('is-invalid');
        $('#libelle_modifHelp').html('');
        $('#libelle_modifHelp').addClass('invisible')
    });


    //      Au click du boutton
    $('#bt_modifier').on('click', function(e) {
        var submitUpdate = false;

        // Cas de - libelle
        var libelle = $('#libelle_modif').val();
        if (libelle === '') {
            submitUpdate = false;
            $('#libelle_modif').addClass('is-invalid');
            $('#libelle_modifHelp').html('Veillez saisir le libelle.');
            $('#libelle_modifHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            submitUpdate = true;
            $('#libelle_modif').removeClass('is-invalid');
            $('#libelle_modifHelp').html('');
            $('#libelle_modifHelp').addClass('invisible');
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