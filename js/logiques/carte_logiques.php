<?php include("views/components/alerts.php") ?>


<script>
    // MES LOGIQUES
    //  Vider les champs
    function vider_les_champs() {
        // dates
        $('#customer_id').val('');
        $('#customer_id').removeClass('is-invalid');
        $('#customer_idHelp').html('Veuillez saisir le customer id ...');
        $('#customer_idHelp').addClass('invisible');

        $('#date_expiration').val('');
        $('#date_expiration').removeClass('is-invalid');
        $('#date_expirationHelp').html('Veuillez saisir la date d\' expiration...');
        $('#date_expirationHelp').addClass('invisible');


        $('#date_enregistrement').val('');
        $('#date_enregistrement').removeClass('is-invalid');
        $('#date_enregistrementHelp').html('Veuillez saisir la date d\' enregistrement...');
        $('#date_enregistrementHelp').addClass('invisible');

        $('#type').val('');
        $('#type').removeClass('is-invalid');
        $('#typeHelp').html('Veuillez selectionner le  type...');
        $('#typeHelp').addClass('invisible');
    }

    $('#bt_vider').on('click', function() {
        vider_les_champs()
    });

    $('.touch_pin_input').TouchSpin({
        min: 1,
        max: 500,
        step: 1,
        decimals: 0,
        boostat: 5,
        maxboostedstep: 10,
    });



    // VERIFICATIONS DU FORMULAIRE 
    var formValide = false;

    //      Les événements en déhors du click du boutton de validation

    $('#customer_id').on('change', function() {
        $('#customer_id').removeClass('is-invalid');
        $('#customer_idHelp').html('Veuillez saisir le customer id ...');
    });
    $('#date_expiration').on('change', function() {
        $('#date_expiration').removeClass('is-invalid');
        $('#date_expirationHelp').html('Veuillez selectionner la date d\'expiration ...');
    });

    $('#date_enregistrement').on('change', function() {
        $('#date_enregistrement').removeClass('is-invalid');
        $('#date_enregistrementHelp').html('Veuillez selectionner la date d\'enregistrement ...');
    });

    $('#type').on('change', function() {
        $('#type').removeClass('is-invalid');
        $('#typeHelp').html('Veuillez selectionner le type ...');
    });


    //      Au click du boutton
    $('#bt_enregistrer').on('click', function(e) {

        // Cas de la duree
        let customer_id = $('#customer_id').val();
        if (customer_id === '') {
            formValide = false;
            $('#customer_id').addClass('is-invalid');
            $('#customer_idHelp').html('Veuillez saisir le customer id ...');
            $('#customer_idHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#customer_id').removeClass('is-invalid');
            $('#customer_idHelp').html('');
            $('#customer_idHelp').addClass('invisible');
        }
        let type = $('#type').val();
        if (type == 'Choisir le type de carte') {
            formValide = false;

            $('#type').addClass('is-invalid');
            $('#typeHelp').html('Veuillez sélectionner  le type de carte ...');
            $('#typeHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#type').removeClass('is-invalid');
            $('#typeHelp').html('');
            $('#typeHelp').addClass('invisible');
        }

        //cas du libelle
        let date_expiration = $('#date_expiration').val();
        if (date_expiration === '') {
            formValide = false;
            $('#date_expiration').addClass('is-invalid');
            $('#date_expirationHelp').html('Veuillez selectionner la date d\'expiration .');
            $('#date_expirationHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#date_expiration').removeClass('is-invalid');
            $('#date_expirationHelp').html('');
            $('#date_expirationelp').addClass('invisible');
        }

        let date_enregistrement = $('#date_enregistrement').val();
        if (date_enregistrement === '') {
            formValide = false;
            $('#date_enregistrement').addClass('is-invalid');
            $('#date_enregistrementHelp').html('Veuillez selectionner la date d\'enregistrement .');
            $('#date_enregistrementHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#date_enregistrement').removeClass('is-invalid');
            $('#date_nregistrementnHelp').html('');
            $('#date_enregistrementHelp').addClass('invisible');
        }

    });





    // MODIFICATION
    //      Les événements en déhors du click du boutton de validation
    // $('#libellemodif').on('keydown', function() {
    //     $('#libellemodif').removeClass('is-invalid');
    //     $('#libellemodifHelp').html('');
    // });

    //      Au click du boutton
    // $('#bt_modifier').on('click', function(e) {

    //     var customer_id = $('#customer_idmodif').val();
    //     var type = $('#typemodif').val();
    //     var date_expiration = $('#date_expirationmodif').val();
    //     var date_enregistrement = $('#date_enregistrementmodif').val();

    //     if (customer_id === '' && type === '' && date_enregistrement === '', date_expiration == '') {
    //         formValide = false;
    //         $('#customer_idmodif').addClass('is-invalid');
    //         $('#customer_idmodifHelp').html('Veillez saisir le customer_id.');
    //         $('#customer_idmodifHelp').removeClass('invisible');

    //         $('#typemodif').addClass('is-invalid');
    //         $('#typemodifHelp').html('Veillez sélectionner le type de carte.');
    //         $('#typemodifHelp').removeClass('invisible');

    //         $('#date_expirationmodif').addClass('is-invalid');
    //         $('#date_expirationmodifHelp').html('Veillez selectionner la date d\'expiration.');
    //         $('#date_expirationmodifHelp').removeClass('invisible');

    //         $('#date_enregistrementmodif').addClass('is-invalid');
    //         $('#date_enregistrementmodifHelp').html('Veillez selectionner la date d\'enregistrement.');
    //         $('#date_enregistrementmodifHelp').removeClass('invisible');
    //         e.preventDefault()
    //     } else {
    //         formValide = true;
    //         $('#customer_idmodif').removeClass('is-invalid');
    //         $('#customer_idmodifHelp').html('');
    //         $('#customer_idmodifHelp').addClass('invisible');

    //         $('#date_expirationmodif').removeClass('is-invalid');
    //         $('#date_expirationmodifHelp').html('');
    //         $('#date_expirationmodifHelp').addClass('invisible');

    //         $('#typemodif').removeClass('is-invalid');
    //         $('#typemodifHelp').html('');
    //         $('#typemodifHelp').addClass('invisible');

    //         $('#date_enregistrementmodif').removeClass('is-invalid');
    //         $('#date_enregistrementmodifHelp').html('');
    //         $('#date_enregistrementmodifHelp').addClass('invisible');
    //     }

    //     if (formValide) {
    //         e.preventDefault();

    //         initializeFlash();
    //         $('.flash').addClass('alert-info');
    //         $('.flash').html('<i class="fas fa-cog fa-spin"></i> Modification...').fadeIn(300);

    //         var form = $('#form_modif');
    //         var method = form.prop('method');
    //         var url = form.prop('action');

    //         $.ajax({
    //             type: method,
    //             data: form.serialize() + "&bt_modifier=" + true,
    //             url: url,
    //             success: function(result) {
    //                 donnee = JSON.parse(result);
    //                 // if (donnee['success'] === 'existe') {
    //                 //     $('#customer_idmodif').addClass('is-invalid');
    //                 //     $('#customer_idmodifHelp').html(donnee['message']);
    //                 //     $('#customer_idmodifHelp').removeClass('invisible');

    //                 //     $('#typemodif').addClass('is-invalid');
    //                 //     $('#typemodifHelp').html(donnee['message']);
    //                 //     $('#typemodifHelp').removeClass('invisible');


    //                 //     initializeFlash();
    //                 //     $('.flash').addClass('alert-info');
    //                 //     $('.flash').html('<i class="fas fa-exclamation-circle"></i> ' + donnee['message'])
    //                 //         .fadeIn(300).delay(2500).fadeOut(300);
    //                 // }


    //                 if (donnee['success'] === 'true') {
    //                     initializeFlash();
    //                     $('.flash').addClass('alert-success');
    //                     $('.flash').html('<i class="fas fa-check"></i> ' + donnee['message'])
    //                         .fadeIn(300).delay(2500).fadeOut(300);
    //                     swal_Alert_Sucess(donnee['message']);
    //                     $('.modal').modal('hide')

    //                     window.location.reload();
    //                 }

    //                 if (donnee['success'] === 'non') {
    //                     initializeFlash();
    //                     $('.flash').addClass('alert-danger');
    //                     $('.flash').html('<i class="fas fa-exclamation-circle"></i> ' + donnee['message'])
    //                         .fadeIn(300).delay(2500).fadeOut(300);
    //                 }
    //                 if (donnee['success'] === 'false') {

    //                     initializeFlash();
    //                     $('.flash').addClass('alert-danger');
    //                     $('.flash').html('<i class="fas fa-exclamation-circle"></i> Vérifiez les champs')
    //                         .fadeIn(300).delay(2500).fadeOut(300);
    //                 }
    //             }
    //         });
    //     }

    // });
</script>