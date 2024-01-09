<?php include("views/components/alerts.php") ?>

<script src="functions/functions.js"></script>
<script>
    // MES LOGIQUES
    //  Vider les champs
    function vider_les_champs() {
        // Raison_sociale
        $('#raison_sociale').val('');
        $('#raison_sociale').removeClass('is-invalid');
        $('#raison_socialeHelp').html('');
        $('#raison_socialeHelp').addClass('invisible');
        // Adresse
        $('#adresse').val('');
        $('#adresse').removeClass('is-invalid');
        $('#adresseHelp').html('');
        $('#adresseHelp').addClass('invisible');
        // Email
        $('#email').val('');
        $('#email').removeClass('is-invalid');
        $('#emailHelp').html('');
        $('#emailHelp').addClass('invisible');
        // Tel
        $('#tel').val('');
        $('#tel').removeClass('is-invalid');
        $('#telHelp').html('');
        $('#telHelp').addClass('invisible');
        // Interlocuteur
        $('#interlocuteur').val('');
        $('#interlocuteur').removeClass('is-invalid');
        $('#interlocuteurHelp').html('');
        $('#interlocuteurHelp').addClass('invisible');

        $('#raison_sociale').focus();
    }

    $('#bt_vider').on('click', function() {
        vider_les_champs()
    });



    // VERIFICATIONS DU FORMULAIRE 
    var formValide = false;

    //      Les événements en déhors du click du boutton de validation
    $('#raison_sociale').on('keydown', function() {
        $('#raison_sociale').removeClass('is-invalid');
        $('#raison_socialeHelp').html('');
    });
    $('#email').on('keydown', function() {
        $('#email').removeClass('is-invalid');
        $('#emailHelp').html('');
    });
    $('#tel').on('keydown', function() {
        $('#tel').removeClass('is-invalid');
        $('#telHelp').html('');
    });


    //      Au click du boutton
    $('#bt_enregistrer').on('click', function() {


        // Cas de - Raison_sociale
        var raison_sociale = $('#raison_sociale').val();
        if (raison_sociale === '') {
            formValide = false;
            $('#raison_sociale').addClass('is-invalid');
            $('#raison_socialeHelp').html('Veillez saisir la raison sociale.');
            $('#raison_socialeHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#raison_sociale').removeClass('is-invalid');
            $('#raison_socialeHelp').html('');
            $('#raison_socialeHelp').addClass('invisible');
        }
        // Cas de - Email
        var email = $('#email').val();
        if (email != '' && isEmail(email) === false) {
            formValide = false;
            $('#email').addClass('is-invalid');
            $('#emailHelp').html('Veillez saisir un email valide');
            $('#emailHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#email').removeClass('is-invalid');
            $('#emailHelp').html('');
            $('#emailHelp').addClass('invisible');
        }
        // Cas de - Tel
        var tel = $('#tel').val();
        if (tel != '' && validatePhone(tel) === false) {
            formValide = false;
            $('#tel').addClass('is-invalid');
            $('#telHelp').html('Veillez saisir un contact valide');
            $('#telHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#tel').removeClass('is-invalid');
            $('#telHelp').html('');
            $('#telHelp').addClass('invisible');
        }
    });


    //  MODIFICATION
    // VERIFICATIONS DU FORMULAIRE 
    var formValide = false;

    //      Les événements en déhors du click du boutton de validation
    $('#raison_sociale_modif').on('keydown', function() {
        $('#raison_sociale_modif').removeClass('is-invalid');
        $('#raison_sociale_modifHelp').html('');
    });
    $('#email_modif').on('keydown', function() {
        $('#email_modif').removeClass('is-invalid');
        $('#email_modifHelp').html('');
    });
    $('#tel_modif').on('keydown', function() {
        $('#tel_modif').removeClass('is-invalid');
        $('#tel_modifHelp').html('');
    });


    //      Au click du boutton
    $('#bt_modifier').on('click', function(e) {


        // Cas de - Raison_sociale
        var raison_sociale = $('#raison_sociale_modif').val();
        if (raison_sociale === '') {
            formValide = false;
            $('#raison_sociale_modif').addClass('is-invalid');
            $('#raison_sociale_modifHelp').html('Veillez saisir la raison sociale.');
            $('#raison_sociale_modifHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#raison_sociale_modif').removeClass('is-invalid');
            $('#raison_sociale_modifHelp').html('');
            $('#raison_sociale_modifHelp').addClass('invisible');
        }
        // Cas de - Email
        var email = $('#email_modif').val();
        if (email != '' && isEmail(email) === false) {
            formValide = false;
            $('#email_modif').addClass('is-invalid');
            $('#email_modifHelp').html('Veillez saisir un email valide');
            $('#email_modifHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#email_modif').removeClass('is-invalid');
            $('#email_modifHelp').html('');
            $('#email_modifHelp').addClass('invisible');
        }
        // Cas de - Tel
        var tel = $('#tel_modif').val();
        if (tel != '' && validatePhone(tel) === false) {
            formValide = false;
            $('#tel_modif').addClass('is-invalid');
            $('#tel_modifHelp').html('Veillez saisir un contact valide');
            $('#tel_modifHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#tel_modif').removeClass('is-invalid');
            $('#tel_modifHelp').html('');
            $('#tel_modifHelp').addClass('invisible');
        }

        if (formValide) {

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