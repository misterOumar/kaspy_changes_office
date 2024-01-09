<?php include ("views/components/alerts.php") ?>

<script>
    // MES LOGIQUES
    //  Vider les champs
    function vider_les_champs() {
        // Nom
        $('#nom').val('');
        $('#nom').removeClass('is-invalid');
        $('#nomHelp').html('');
        $('#nomHelp').addClass('invisible');

        $('#nom').focus();
    }

    $('#bt_vider').on('click', function() {
        vider_les_champs()
    });



    // VERIFICATIONS DU FORMULAIRE 
    var formValide = false;

    //      Les événements en déhors du click du boutton de validation

    $('#nom').on('keydown', function() {
        $('#nom').removeClass('is-invalid');
        $('#nomHelp').html('');
        $('#nomHelp').addClass('invisible')
    });


    //      Au click du boutton
    $('#bt_enregistrer').on('click', function() {
        // Cas de - Nom
        var nom = $('#nom').val();
        if (nom === '') {
            formValide = false;
            $('#nom').addClass('is-invalid');
            $('#nomHelp').html('Veillez saisir le nom.');
            $('#nomHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#nom').removeClass('is-invalid');
            $('#nomHelp').html('');
            $('#nomHelp').addClass('invisible');
        }

    });

     // MODIFICATION
    //      Les événements en déhors du click du boutton de validation
    $('#nom_modif').on('keydown', function() {
        $('#nom_modif').removeClass('is-invalid');
        $('#nom_modifHelp').html('');
        $('#nom_modifHelp').addClass('invisible')
    });


    //      Au click du boutton
    $('#bt_modifier').on('click', function(e) {
        var submitUpdate = false;

        // Cas de - Nom
        var nom = $('#nom_modif').val();
        if (nom === '') {
            submitUpdate = false;
            $('#nom_modif').addClass('is-invalid');
            $('#nom_modifHelp').html('Veillez saisir le nom.');
            $('#nom_modifHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            submitUpdate = true;
            $('#nom_modif').removeClass('is-invalid');
            $('#nom_modifHelp').html('');
            $('#nom_modifHelp').addClass('invisible');
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
                        $('#nom_modif').addClass('is-invalid');
                        $('#nom_modifHelp').html(donnee['message']);
                        $('#nom_modifHelp').removeClass('invisible');

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