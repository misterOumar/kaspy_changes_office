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

    $('#date_achat').flatpickr({
        defaultDate: 'today',
        dateFormat: "Y-m-d",
    })

    // logique pour la vente par lot
    // Ecoutez l'événement de changement du radio bouton
    var type_enregistrement = "individuel"
    $('input[name="radio_type"]').change(function() {
        // Vérifiez la valeur du radio bouton sélectionné
        if ($(this).val() === 'individuel') {
             type_enregistrement = "individuel"
            // Si c'est individuel, affichez le bloc_vente_detail et masquez le bloc_vente_gros
            $('#bloc_vente_detail').removeClass('d-none');
            $('#bloc_vente_gros').addClass('d-none');
        } else {
             type_enregistrement = "lot"
            // Sinon, affichez le bloc_vente_gros et masquez le bloc_vente_detail
            $('#bloc_vente_gros').removeClass('d-none');
            $('#bloc_vente_detail').addClass('d-none');
        }
    });


    // Fonction pour calculer la différence entre les valeurs et afficher le résultat
    function calculerDifference() {
        // Récupérer les valeurs des champs
        var customer_id_initial = parseInt($('#customer_id_initial').val()) || 0;
        var customer_id_final = parseInt($('#customer_id_final').val()) || 0;

        // Calculer la différence
        var difference = customer_id_final - customer_id_initial + 1;

        // Afficher la différence dans #nombre_carte
        if (difference > 0) {
            $('#nombre_carte').val(difference);
        } else {
            $('#nombre_carte').val(0);
        }
    }

    // Attacher la fonction au changement des champs
    $('#customer_id_initial, #customer_id_final').on('input', calculerDifference);



    // VERIFICATIONS DU FORMULAIRE 
    var formValide = false;

    //      Les événements en déhors du click du boutton de validation

    $('#customer_id').on('change', function() {
        $('#customer_id').removeClass('is-invalid');
        $('#customer_idHelp').html('');
    });
    $('#customer_id_initial').on('change', function() {
        $('#customer_id_initial').removeClass('is-invalid');
        $('#customer_id_initialHelp').html('');
    });
    $('#customer_id_final').on('change', function() {
        $('#customer_id_final').removeClass('is-invalid');
        $('#customer_id_finalHelp').html('');
    });


    $('#date_enregistrement').on('change', function() {
        $('#date_enregistrement').removeClass('is-invalid');
        $('#date_enregistrementHelp').html('');
    });

    $('#type').on('change', function() {
        $('#type').removeClass('is-invalid');
        $('#typeHelp').html('');
    });


    //      Au click du boutton
    $('#bt_enregistrer').on('click', function(e) {


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

        // vérifiaction par type d'enregistrement
        if (type_enregistrement == 'individuel') {
            
            // Cas de customer id
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
        } else {
            // Cas de customer id initial
            let customer_id_initial = $('#customer_id_initial').val();
            if (customer_id_initial === '') {
                formValide = false;
                $('#customer_id_initial').addClass('is-invalid');
                $('#customer_id_initialHelp').html('Veuillez saisir le customer id initial');
                $('#customer_id_initialHelp').removeClass('invisible');
                e.preventDefault()
            } else {
                formValide = true;
                $('#customer_id_initial').removeClass('is-invalid');
                $('#customer_id_initialHelp').html('');
                $('#customer_id_initialHelp').addClass('invisible');
            }

            // Cas de customer id final
            let customer_id_final = $('#customer_id_final').val();
            if (customer_id_final === '') {
                formValide = false;
                $('#customer_id_final').addClass('is-invalid');
                $('#customer_id_finalHelp').html('Veuillez saisir le customer id final');
                $('#customer_id_finalHelp').removeClass('invisible');
                e.preventDefault()
            } else {
                formValide = true;
                $('#customer_id_final').removeClass('is-invalid');
                $('#customer_id_finalHelp').html('');
                $('#customer_id_finalHelp').addClass('invisible');
            }

        }



    });





    // MODIFICATION
    //      Les événements en déhors du click du boutton de validation
    $('#libellemodif').on('keydown', function() {
        $('#libellemodif').removeClass('is-invalid');
        $('#libellemodifHelp').html('');
    });

    //  Au click du boutton
    $('#bt_modifier').on('click', function(e) {

        var customer_id = $('#customer_idmodif').val();
        var type = $('#typemodif').val();
        var date_expiration = $('#date_expirationmodif').val();
        var date_enregistrement = $('#date_enregistrementmodif').val();

        if (customer_id === '' && type === '' && date_enregistrement === '', date_expiration == '') {
            formValide = false;
            $('#customer_idmodif').addClass('is-invalid');
            $('#customer_idmodifHelp').html('Veillez saisir le customer_id.');
            $('#customer_idmodifHelp').removeClass('invisible');

            $('#typemodif').addClass('is-invalid');
            $('#typemodifHelp').html('Veillez sélectionner le type de carte.');
            $('#typemodifHelp').removeClass('invisible');

            $('#date_expirationmodif').addClass('is-invalid');
            $('#date_expirationmodifHelp').html('Veillez selectionner la date d\'expiration.');
            $('#date_expirationmodifHelp').removeClass('invisible');

            $('#date_enregistrementmodif').addClass('is-invalid');
            $('#date_enregistrementmodifHelp').html('Veillez selectionner la date d\'enregistrement.');
            $('#date_enregistrementmodifHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#customer_idmodif').removeClass('is-invalid');
            $('#customer_idmodifHelp').html('');
            $('#customer_idmodifHelp').addClass('invisible');

            $('#date_expirationmodif').removeClass('is-invalid');
            $('#date_expirationmodifHelp').html('');
            $('#date_expirationmodifHelp').addClass('invisible');

            $('#typemodif').removeClass('is-invalid');
            $('#typemodifHelp').html('');
            $('#typemodifHelp').addClass('invisible');

            $('#date_enregistrementmodif').removeClass('is-invalid');
            $('#date_enregistrementmodifHelp').html('');
            $('#date_enregistrementmodifHelp').addClass('invisible');
        }

        if (formValide) {
            e.preventDefault();

            initializeFlash();
            $('.flash').addClass('alert-info');
            $('.flash').html('<i class="fas fa-cog fa-spin"></i> Modification...').fadeIn(300);

            var form = $('#form_modif');
            var method = form.prop('method');
            var url = form.prop('action');

            $.ajax({
                type: method,
                data: form.serialize() + "&bt_modifier=" + true,
                url: url,
                success: function(result) {
                    donnee = JSON.parse(result);
                    if (donnee['success'] === 'existe') {
                        $('#customer_idmodif').addClass('is-invalid');
                        $('#customer_idmodifHelp').html(donnee['message']);
                        $('#customer_idmodifHelp').removeClass('invisible');

                        $('#typemodif').addClass('is-invalid');
                        $('#typemodifHelp').html(donnee['message']);
                        $('#typemodifHelp').removeClass('invisible');


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
                        swal_Alert_Sucess(donnee['message']);
                        $('.modal').modal('hide')

                        // window.location.reload();
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