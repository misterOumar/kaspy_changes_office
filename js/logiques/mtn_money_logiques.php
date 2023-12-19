<?php include("views/components/alerts.php") ?>


<script>
    // MES LOGIQUES
    //  Vider les champs
    function vider_les_champs() {
        // dates
        $('#montant').val('');
        $('#montant').removeClass('is-invalid');
        $('#montantHelp').html('Veuillez saisir le montant...');
        $('#montantHelp').addClass('invisible');

        $('#client').val('');
        $('#client').removeClass('is-invalid');
        $('#clientHelp').html('Veuillez saisir le client...');
        $('#clientHelp').addClass('invisible');


        $('#destinataire').val('');
        $('#destinataire').removeClass('is-invalid');
        $('#destinataireHelp').html('Veuillez saisir le client...');
        $('#destinataireHelp').addClass('invisible');

        $('#date_t').val('');
        $('#date_t').removeClass('is-invalid');
        $('#date_tHelp').html('Veuillez sélectionner la date ...');
        $('#date_tHelp').addClass('invisible');

        $('#tel_cli').val('');
        $('#tel_cli').removeClass('is-invalid');
        $('#tel_cliHelp').html('Veuillez saisir le telephone du client...');
        $('#tel_cliHelp').addClass('invisible');

        $('#tel_dest').val('');
        $('#tel_dest').removeClass('is-invalid');
        $('#tel_destHelp').html('Veuillez saisir le telephone du destinataire...');
        $('#tel_destHelp').addClass('invisible');

    }

    $('#bt_vider').on('click', function() {
        vider_les_champs()
    });

    jQuery(function($) {
        $('#date_t').flatpickr({
            defaultDate: 'today',
            dateFormat: "d-m-Y",
        })
    });

    flatpickr("#date_t", {
        locale: 'fr',
        // defaultDate : 'today'
    });



    jQuery(function($) {
        $('#date_t_modif').flatpickr({
            defaultDate: 'today',
            dateFormat: "d-m-Y",
        })
    });

    flatpickr("#date_t_modif", {
        locale: 'fr',
        // defaultDate : 'today'
    });

    jQuery(function($) {
        $('#date_expiration_modif').flatpickr({
            defaultDate: 'today',
            dateFormat: "d-m-Y",
        })
    });

    flatpickr("#date_expiration_modif", {
        locale: 'fr',
        // defaultDate : 'today'
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

    $('#montant').on('change', function() {
        $('#montant').removeClass('is-invalid');
        $('#montantHelp').html('Veuillez saisir le montant...');
    });
    $('#client').on('change', function() {
        $('#client').removeClass('is-invalid');
        $('#clientHelp').html('');
    });
    $('#destinataire').on('change', function() {
        $('#destinataire').removeClass('is-invalid');
        $('#destinataireHelp').html('Veillez saisir le destinataire');
    });

    $('#tel_cli').on('change', function() {
        $('#tel_cli').removeClass('is-invalid');
        $('#tel_cliHelp').html('Veillez saisir le telephone du client ');
    });

    $('#tel_dest').on('change', function() {
        $('#tel_dest').removeClass('is-invalid');
        $('#tel_destHelp').html('Veillez saisir le telephone du destinataire');
    });

    $('#date_t').on('change', function() {
        $('#date_t').removeClass('is-invalid');
        $('#date_tHelp').html('Veillez selectionner  la date ');
    });
    // Champ de la duree ne doit contenir des letters
    $('#montant').on('keyup', function() {
        var loyer = $('#montant').val();
        if ($.isNumeric(loyer) === false) {
            formValide = false;
            $('#montant').addClass('is-invalid');
            $('#montantHelp').html('Veuillez saisir un  montant correcte');
            $('#montantHelp').removeClass('invisible');
            $('#montant').val('')
            e.preventDefault()
        } else {
            formValide = true;
            $('#montant').removeClass('is-invalid');
            $('#montantHelp').html('');
            $('#montantHelp').addClass('invisible');
        }
    });


    $('#tel_cli').on('keyup', function() {
        var loyer = $('#tel_cli').val();
        if ($.isNumeric(loyer) === false) {
            formValide = false;
            $('#tel_cli').addClass('is-invalid');
            $('#tel_cliHelp').html('Veuillez saisir un numero correcte');
            $('#tel_cliHelp').removeClass('invisible');
            $('#tel_cli').val('')
            e.preventDefault()
        } else {
            formValide = true;
            $('#tel_cli').removeClass('is-invalid');
            $('#tel_cliHelp').html('');
            $('#tel_cliHelp').addClass('invisible');
        }
    });

    $('#tel_dest').on('keyup', function() {
        var loyer = $('#tel_dest').val();
        if ($.isNumeric(loyer) === false) {
            formValide = false;
            $('#tel_dest').addClass('is-invalid');
            $('#tel_destHelp').html('Veuillez saisir un numero correcte');
            $('#tel_destHelp').removeClass('invisible');
            $('#tel_dest').val('')
            e.preventDefault()
        } else {
            formValide = true;
            $('#tel_dest').removeClass('is-invalid');
            $('#tel_destHelp').html('');
            $('#tel_destHelp').addClass('invisible');
        }
    });

    // Champ du libelle ne doit contenir des chiffres

    $('#client').on('keyup', function() {
        var loyer = $('#client').val();

        for (var i = 0; i < loyer.length; i++) {
            if ($.isNumeric(loyer[i])) {
                $('#client').addClass('is-invalid');
                $('#clientHelp').html('Veuillez saisir un nom correcte ');
                $('#clientHelp').removeClass('invisible');
                $('#client').val('')
                e.preventDefault()
            }
        }

        if ($.isNumeric(loyer) === true) {
            formValide = false;
            $('#client').addClass('is-invalid');
            $('#clientHelp').html('Veuillez saisir un nom correcte');
            $('#clientHelp').removeClass('invisible');
            $('#client').val('')
            e.preventDefault()
        } else {
            formValide = true;
            $('#client').removeClass('is-invalid');
            $('#clientHelp').html('');
            $('#clientHelp').addClass('invisible');
        }

    });

    $('#destinataire').on('keyup', function() {
        var loyer = $('#destinataire').val();

        for (var i = 0; i < loyer.length; i++) {
            if ($.isNumeric(loyer[i])) {
                $('#destinataire').addClass('is-invalid');
                $('#destinataireHelp').html('Veuillez saisir un nom correcte');
                $('#destinataireHelp').removeClass('invisible');
                $('#destinataire').val('')
                e.preventDefault()
            }
        }

        if ($.isNumeric(loyer) === true) {
            formValide = false;
            $('#destinataire').addClass('is-invalid');
            $('#destinataireHelp').html('Veuillez saisir un nom  correcte');
            $('#destinataireHelp').removeClass('invisible');
            $('#destinataire').val('')
            e.preventDefault()
        } else {
            formValide = true;
            $('#destinataire').removeClass('is-invalid');
            $('#destinataireHelp').html('');
            $('#destinataireHelp').addClass('invisible');
        }

    });



    //      Au click du boutton
    $('#bt_enregistrer').on('click', function(e) {

        // Cas de la duree
        let montant = $('#montant').val();
        if (montant === '') {
            formValide = false;
            $('#montant').addClass('is-invalid');
            $('#montantHelp').html('Veuillez saisir le montant .');
            $('#montantHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#montant').removeClass('is-invalid');
            $('#montantHelp').html('');
            $('#montantHelp').addClass('invisible');
        }

        //cas du libelle
        let client = $('#client').val();
        if (client === '') {
            formValide = false;
            $('#client').addClass('is-invalid');
            $('#clientHelp').html('Veuillez saisir le client.');
            $('#clientHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#client').removeClass('is-invalid');
            $('#clientHelp').html('');
            $('#clientHelp').addClass('invisible');
        }

        let tel_cli = $('#tel_cli').val();
        if (tel_cli === '') {
            formValide = false;
            $('#tel_cli').addClass('is-invalid');
            $('#tel_cliHelp').html('Veuillez saisir le  telephone du client.');
            $('#tel_cliHelp').removeClass('invisible');
            e.preventDefault()
        } else

        {
            formValide = true;
            $('#tel_cli').removeClass('is-invalid');
            $('#tel_cliHelp').html('');
            $('#tel_cliHelp').addClass('invisible');
        }

        let tel_dest = $('#tel_dest').val();
        if (tel_dest === '') {
            formValide = false;
            $('#tel_dest').addClass('is-invalid');
            $('#tel_destHelp').html('Veuillez saisir le  telephone du destinataire .');
            $('#tel_destHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#tel_dest').removeClass('is-invalid');
            $('#tel_destHelp').html('');
            $('#tel_destHelp').addClass('invisible');
        }


        let destinataire = $('#destinataire').val();
        if (destinataire === '') {
            formValide = false;
            $('#destinataire').addClass('is-invalid');
            $('#destinataireHelp').html('Veuillez saisir le  telephone du destinataire .');
            $('#destinataireHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#destinataire').removeClass('is-invalid');
            $('#destinataireHelp').html('');
            $('#destinataireHelp').addClass('invisible');
        }

        let date_t = $('#date_t').val();
        if (date_t === '') {
            formValide = false;
            $('#date_t').addClass('is-invalid');
            $('#date_tHelp').html('Veuillez selectionner  la date  .');
            $('#date_tHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#date_t').removeClass('is-invalid');
            $('#date_tHelp').html('');
            $('#date_tHelp').addClass('invisible');
        }

        // window.location.reload();


    });






























    // MODIFICATION



    //Le montant ne doit contenir ds lettres
    $('#montant_modif').on('keyup', function() {
        var loyer = $('#montant_modif').val();
        if ($.isNumeric(loyer) === false) {
            formValide = false;
            $('#montant_modif').addClass('is-invalid');
            $('#montant_modifHelp').html('Veuillez saisir un  montant correcte');
            $('#montant_modifHelp').removeClass('invisible');
            $('#montant_modif').val('')
            e.preventDefault()
        } else {
            formValide = true;
            $('#montant_modif').removeClass('is-invalid');
            $('#montant_modifHelp').html('');
            $('#montant_modifHelp').addClass('invisible');
        }
    });


    //Le telephone  ne doit contenir ds lettres
    $('#tel_cli_modif').on('keyup', function() {
        var loyer = $('#tel_cli').val();
        if ($.isNumeric(loyer) === false) {
            formValide = false;
            $('#tel_cli_modif').addClass('is-invalid');
            $('#tel_cli_modifHelp').html('Veuillez saisir un numero correcte');
            $('#tel_cli_modifHelp').removeClass('invisible');
            $('#tel_cli_modif').val('')
            e.preventDefault()
        } else {
            formValide = true;
            $('#tel_cli_modif').removeClass('is-invalid');
            $('#tel_cli_modifHelp').html('');
            $('#tel_cli_modifHelp').addClass('invisible');
        }
    });

    //Le telephone  ne doit contenir ds lettres

    $('#tel_dest_modif').on('keyup', function() {
        var loyer = $('#tel_dest_modif').val();
        if ($.isNumeric(loyer) === false) {
            formValide = false;
            $('#tel_dest_modif').addClass('is-invalid');
            $('#tel_dest_modifHelp').html('Veuillez saisir un numero correcte');
            $('#tel_dest_modifHelp').removeClass('invisible');
            $('#tel_dest_modif').val('')
            e.preventDefault()
        } else {
            formValide = true;
            $('#tel_dest_modif').removeClass('is-invalid');
            $('#tel_dest_modifHelp').html('');
            $('#tel_dest_modifHelp').addClass('invisible');
        }
    });

    // Champ du client ne doit contenir des chiffres

    $('#client_modif').on('keyup', function() {
        var loyer = $('#client_modif').val();

        for (var i = 0; i < loyer.length; i++) {
            if ($.isNumeric(loyer[i])) {
                $('#client_modif').addClass('is-invalid');
                $('#client_modifHelp').html('Veuillez saisir un nom correcte ');
                $('#client_modifHelp').removeClass('invisible');
                $('#client_modif').val('')
                e.preventDefault()
            }
        }

        if ($.isNumeric(loyer) === true) {
            formValide = false;
            $('#client_modif').addClass('is-invalid');
            $('#client_modifHelp').html('Veuillez saisir un nom correcte');
            $('#client_modifHelp').removeClass('invisible');
            $('#client_modif').val('')
            e.preventDefault()
        } else {
            formValide = true;
            $('#client_modif').removeClass('is-invalid');
            $('#client_modifHelp').html('');
            $('#client_modifHelp').addClass('invisible');
        }

    });

    $('#destinataire_modif').on('keyup', function() {
        var loyer = $('#destinataire_modif').val();

        for (var i = 0; i < loyer.length; i++) {
            if ($.isNumeric(loyer[i])) {
                $('#destinataire_modif').addClass('is-invalid');
                $('#destinataire_modifHelp').html('Veuillez saisir un nom correcte');
                $('#destinataire_modifHelp').removeClass('invisible');
                $('#destinataire_modif').val('')
                e.preventDefault()
            }
        }

        if ($.isNumeric(loyer) === true) {
            formValide = false;
            $('#destinataire_modif').addClass('is-invalid');
            $('#destinataire_modifHelp').html('Veuillez saisir un nom  correcte');
            $('#destinataire_modifHelp').removeClass('invisible');
            $('#destinataire_modif').val('')
            e.preventDefault()
        } else {
            formValide = true;
            $('#destinataire_modif').removeClass('is-invalid');
            $('#destinataire_modifHelp').html('');
            $('#destinataire_modifHelp').addClass('invisible');
        }

    });

    //      Au click du boutton
    $('#bt_modifier').on('click', function(e) {

        var montant = $('#montant_modif').val();
        var client = $('#client_modif').val();
        var tel_cli = $('#tel_cli_modif').val();
        var tel_dest = $('#tel_dest_modif').val();
        var destinataire = $('#destinataire_modif').val();
        var date_t = $('#date_t_modif').val();


        if (montant === '' && client === '' && destinataire === '' && tel_cli == '' && tel_dest === '' && date_t === '') {
            formValide = false;
            $('#montant_modif').addClass('is-invalid');
            $('#montant_modifHelp').html('Veillez saisir le libellé.');
            $('#montant_modifHelp').removeClass('invisible');

            $('#client_modif').addClass('is-invalid');
            $('#client_modifHelp').html('Veillez saisir le client.');
            $('#client_modifHelp').removeClass('invisible');


            $('#destinataire_modif').addClass('is-invalid');
            $('#destinataire_modifHelp').html('Veillez saisir le destinataire.');
            $('#destinataire_modifHelp').removeClass('invisible');

            $('#date_t_modif').addClass('is-invalid');
            $('#date_t_modifHelp').html('Veillez sélectionner le date.');
            $('#date_t_modifHelp').removeClass('invisible');


            $('#tel_cli_modif').addClass('is-invalid');
            $('#tel_cli_modifHelp').html('Veillez sélectionner le telephone du client.');
            $('#tel_cli_modifHelp').removeClass('invisible');


            $('#tel_dest_modif').addClass('is-invalid');
            $('#tel_dest_modifHelp').html('Veillez sélectionner le telephone du destinataire.');
            $('#tel_dest_modifHelp').removeClass('invisible');

            e.preventDefault()
        } else {
            formValide = true;
            $('#montant_modif').removeClass('is-invalid');
            $('#montant_modifHelp').html('');
            $('#montant_modifHelp').addClass('invisible');

            $('#client_modif').removeClass('is-invalid');
            $('#client_modifHelp').html('');
            $('#client_modifHelp').addClass('invisible');

            $('#destinataire_modif').removeClass('is-invalid');
            $('#destinataire_modifHelp').html('');
            $('#destinataire_modifHelp').addClass('invisible');

            $('#date_t_modif').removeClass('is-invalid');
            $('#date_t_modifHelp').html('');
            $('#date_t_modifHelp').addClass('invisible');

            $('#tel_cli_modif').removeClass('is-invalid');
            $('#tel_cli_modifHelp').html('');
            $('#tel_cli_modifHelp').addClass('invisible');

            $('#tel_dest_modif').removeClass('is-invalid');
            $('#tel_dest_modifHelp').html('');
            $('#tel_dest_modifHelp').addClass('invisible');
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


                    if (donnee['success'] === 'true') {
                        initializeFlash();
                        $('.flash').addClass('alert-success');
                        $('.flash').html('<i class="fas fa-check"></i> ' + donnee['message'])
                            .fadeIn(300).delay(2500).fadeOut(300);
                        swal_Alert_Sucess(donnee['message']);
                        $('.modal').modal('hide')

                        //  window.location.reload();
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