<?php include("views/components/alerts.php") ?>


<script>
    // MES LOGIQUES
    //  Vider les champs
    function vider_les_champs() {
        // dates
        $('#duree').val('');
        $('#duree').removeClass('is-invalid');
        $('#dureeHelp').html('Veuillez saisir la duree...');
        $('#dureeHelp').addClass('invisible');

        $('#libelle').val('');
        $('#libelle').removeClass('is-invalid');
        $('#libelleHelp').html('Veuillez saisir le libellé...');
        $('#libelleHelp').addClass('invisible');


        $('#prix_achat').val('');
        $('#prix_achat').removeClass('is-invalid');
        $('#prix_achatHelp').html('Veuillez saisir le prixd\' achat ...');
        $('#prix_achatHelp').addClass('invisible');

    }

    $('#bt_vider').on('click', function () {
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

    $('#duree').on('change', function () {
        $('#duree').removeClass('is-invalid');
        $('#dureeHelp').html('');
    });
    $('#libelle').on('change', function () {
        $('#libelle').removeClass('is-invalid');
        $('#libelleHelp').html('');
    });

    // Champ de la duree ne doit contenir des letters
    $('#duree').on('keyup', function () {
        var loyer = $('#duree').val();
        if ($.isNumeric(loyer) === false) {
            formValide = false;
            $('#duree').addClass('is-invalid');
            $('#dureeHelp').html('Veuillez saisir une durée correcte en année');
            $('#dureeHelp').removeClass('invisible');
            $('#duree').val('')
            e.preventDefault()
        } else {
            formValide = true;
            $('#duree').removeClass('is-invalid');
            $('#dureeHelp').html('');
            $('#dureeHelp').addClass('invisible');
        }
    });

    // Champ du prix vente detail ne doit contenir des letters
    $('#prix_vente_detail').on('keyup', function () {
        var prix_vente_detail = $('#prix_vente_detail').val();
        if ($.isNumeric(prix_vente_detail) === false) {
            formValide = false;
            $('#prix_vente_detail').addClass('is-invalid');
            $('#prix_vente_detailHelp').html('Veuillez saisir un montant correcte');
            $('#prix_vente_detailHelp').removeClass('invisible');
            $('#prix_vente_detail').val('')
            e.preventDefault()
        } else {
            formValide = true;
            $('#prix_vente_detail').removeClass('is-invalid');
            $('#prix_vente_detailHelp').html('');
            $('#prix_vente_detailHelp').addClass('invisible');
        }
    });

    // Champ du prix d achat ne doit contenir des letters
    $('#prix_achat').on('keyup', function () {
        var prix_achat = $('#prix_achat').val();
        if ($.isNumeric(prix_achat) === false) {
            formValide = false;
            $('#prix_achat').addClass('is-invalid');
            $('#prix_achatHelp').html('Veuillez saisir un montant correcte');
            $('#prix_achatHelp').removeClass('invisible');
            $('#prix_achat').val('')
            e.preventDefault()
        } else {
            formValide = true;
            $('#prix_achat').removeClass('is-invalid');
            $('#prix_achatHelp').html('');
            $('#prix_achatHelp').addClass('invisible');
        }
    });


    // Champ du prix vente detail ne doit contenir des letters
    $('#prix_vente_gros').on('keyup', function () {
        var prix_vente_gros = $('#prix_vente_gros').val();
        if ($.isNumeric(prix_vente_gros) === false) {
            formValide = false;
            $('#prix_vente_gros').addClass('is-invalid');
            $('#prix_vente_grosHelp').html('Veuillez saisir un montant correcte');
            $('#prix_vente_grosHelp').removeClass('invisible');
            $('#prix_vente_gros').val('')
            e.preventDefault()
        } else {
            formValide = true;
            $('#prix_vente_gros').removeClass('is-invalid');
            $('#prix_vente_grosHelp').html('');
            $('#prix_vente_grosHelp').addClass('invisible');
        }
    });

    // Champ du libelle ne doit contenir des chiffres

    $('#libelle').on('keyup', function () {
        var loyer = $('#libelle').val();

        for (var i = 0; i < loyer.length; i++) {
            if ($.isNumeric(loyer[i])) {
                $('#libelle').addClass('is-invalid');
                $('#libelleHelp').html('Veuillez saisir un libellé correcte');
                $('#libelleHelp').removeClass('invisible');
                $('#libelle').val('')
                e.preventDefault()
            }
        }

        if ($.isNumeric(loyer) === true) {
            formValide = false;
            $('#libelle').addClass('is-invalid');
            $('#libelleHelp').html('Veuillez saisir un libellé correcte');
            $('#libelleHelp').removeClass('invisible');
            $('#libelle').val('')
            e.preventDefault()
        }

        else {
            formValide = true;
            $('#libelle').removeClass('is-invalid');
            $('#libelleHelp').html('');
            $('#libelleHelp').addClass('invisible');
        }

    });





    //      Au click du boutton
    $('#bt_enregistrer').on('click', function (e) {

        // Cas de la duree
        let duree = $('#duree').val();
        if (duree === '') {
            formValide = false;
            $('#duree').addClass('is-invalid');
            $('#dureeHelp').html('Veuillez saisir la durée.');
            $('#dureeHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#duree').removeClass('is-invalid');
            $('#dureeHelp').html('');
            $('#dureeHelp').addClass('invisible');
        }

        //cas du libelle
        let libelle = $('#libelle').val();
        if (libelle === '') {
            formValide = false;
            $('#libelle').addClass('is-invalid');
            $('#libelleHelp').html('Veuillez saisir le libelle.');
            $('#libelleHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#libelle').removeClass('is-invalid');
            $('#libelleHelp').html('');
            $('#libelleHelp').addClass('invisible');
        }

        //cas du prix d achat 
        let prix_achat = $('#prix_achat').val();
        if (prix_achat === '') {
            formValide = false;
            $('#prix_achat').addClass('is-invalid');
            $('#prix_achatHelp').html('Veuillez saisir  le prix d\'achat.');
            $('#prix_achatHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#prix_achat').removeClass('is-invalid');
            $('#prix_achatHelp').html('');
            $('#prix_achatHelp').addClass('invisible');
        }

        //cas du prix de evente en details
        let prix_vente_detail = $('#prix_vente_detail').val();
        if (prix_vente_detail === '') {
            formValide = false;
            $('#prix_vente_detail').addClass('is-invalid');
            $('#prix_vente_detailHelp').html('Veuillez saisir  le prix de vente.');
            $('#prix_vente_detailHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#prix_vente_detail').removeClass('is-invalid');
            $('#prix_vente_detailHelp').html('');
            $('#prix_vente_detailHelp').addClass('invisible');
        }


        //cas du prix de vente en gros 
        let prix_vente_gros = $('#prix_vente_gros').val();
        if (prix_vente_gros === '') {
            formValide = false;
            $('#prix_vente_gros').addClass('is-invalid');
            $('#prix_vente_grosHelp').html('Veuillez saisir  le prix de vente en gros.');
            $('#prix_vente_grosHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#prix_vente_gros').removeClass('is-invalid');
            $('#prix_vente_grosHelp').html('');
            $('#prix_vente_grosHelp').addClass('invisible');
        }


    });





    // MODIFICATION
    //      Les événements en déhors du click du boutton de validation
    // $('#libellemodif').on('keydown', function() {
    //     $('#libellemodif').removeClass('is-invalid');
    //     $('#libellemodifHelp').html('');
    // });
    $('#libellemodif').on('keyup', function () {
        var loyer = $('#libellemodif').val();

        for (var i = 0; i < loyer.length; i++) {
            if ($.isNumeric(loyer[i])) {
                $('#libellemodif').addClass('is-invalid');
                $('#libellemodifHelp').html('Veuillez saisir un libellé correcte');
                $('#libellemodifHelp').removeClass('invisible');
                $('#libellemodif').val('')
                e.preventDefault()
            }
        }

        if ($.isNumeric(loyer) === true) {
            formValide = false;
            $('#libellemodif').addClass('is-invalid');
            $('#libellemodifHelp').html('Veuillez saisir un libellé correcte');
            $('#libellemodifHelp').removeClass('invisible');
            $('#libellemodif').val('')
            e.preventDefault()
        }

        else {
            formValide = true;
            $('#libellemodif').removeClass('is-invalid');
            $('#libellemodifHelp').html('');
            $('#libellemodifHelp').addClass('invisible');
        }

    });


        // Champ du prix achat ne doit contenir des letters lors de la Modification
        $('#prix_achat_modif').on('keyup', function () {
        var prix_achat = $('#prix_achat_modif').val();
        if ($.isNumeric(prix_achat) === false) {
            formValide = false;
            $('#prix_achat_modif').addClass('is-invalid');
            $('#prix_achat_modifHelp').html('Veuillez saisir un montant correcte ');
            $('#prix_achat_modifHelp').removeClass('invisible');
            $('#prix_achat_modif').val('')
            e.preventDefault()
        } else {
            formValide = true;
            $('#prix_achat_modif').removeClass('is-invalid');
            $('#prix_achat_modifHelp').html('');
            $('#prix_achat_modifHelp').addClass('invisible');
        }
    });

    // Champ de la duree ne doit contenir des letters lors de la Modification
    $('#dureemodif').on('keyup', function () {
        var loyer = $('#dureemodif').val();
        if ($.isNumeric(loyer) === false) {
            formValide = false;
            $('#dureemodif').addClass('is-invalid');
            $('#dureemodifHelp').html('Veuillez saisir une durée correcte en année');
            $('#dureemodifHelp').removeClass('invisible');
            $('#dureemodif').val('')
            e.preventDefault()
        } else {
            formValide = true;
            $('#dureemodif').removeClass('is-invalid');
            $('#dureemodifHelp').html('');
            $('#dureemodifHelp').addClass('invisible');
        }
    });

    // Champ du prix de vente en gros ne doit contenir des letters lors de la Modification
    $('#prix_vente_gros_modif').on('keyup', function () {
        var prix_vente = $('#prix_vente_gros_modif').val();
        if ($.isNumeric(prix_vente) === false) {
            formValide = false;
            $('#prix_vente_gros_modif').addClass('is-invalid');
            $('#prix_vente_gros_modifHelp').html('Veuillez saisir une montant correcte ');
            $('#prix_vente_gros_modifHelp').removeClass('invisible');
            $('#prix_vente_gros_modif').val('')
            e.preventDefault()
        } else {
            formValide = true;
            $('#prix_vente_gros_modif').removeClass('is-invalid');
            $('#prix_vente_gros_modifHelp').html('');
            $('#prix_vente_gros_modifHelp').addClass('invisible');
        }
    });


    // Champ du prix de vente detail ne doit contenir des letters lors de la Modification
    $('#prix_vente_detail_modif').on('keyup', function () {
        var prix_gros = $('#prix_vente_detail_modif').val();
        if ($.isNumeric(prix_gros) === false) {
            formValide = false;
            $('#prix_vente_detail_modif').addClass('is-invalid');
            $('#prix_vente_detail_modifHelp').html('Veuillez saisir un montant correcte');
            $('#prix_vente_detail_modifHelp').removeClass('invisible');
            $('#prix_vente_detail_modif').val('')
            e.preventDefault()
        } else {
            formValide = true;
            $('#prix_vente_detail_modif').removeClass('is-invalid');
            $('#prix_vente_detail_modifHelp').html('');
            $('#prix_vente_detail_modifHelp').addClass('invisible');
        }
    });


    //      Au click du boutton
    $('#bt_modifier').on('click', function (e) {
        // Cas de - libelle
        var libelle = $('#libellemodif').val();

        if (libelle === '') {
            formValide = false;
            $('#libellemodif').addClass('is-invalid');
            $('#libellemodifHelp').html('Veillez saisir le libellé.');
            $('#libellemodifHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#libellemodif').removeClass('is-invalid');
            $('#libellemodifHelp').html('');
            $('#libellemodifHelp').addClass('invisible');
        }


        // Cas de la durée
        var duree = $('#dureemodif').val();
        if (libelle === '') {
            formValide = false;
            $('#dureemodif').addClass('is-invalid');
            $('#dureemodifHelp').html('Veillez saisir la durée.');
            $('#dureemodifHelp').removeClass('sinvisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#dureemodif').removeClass('is-invalid');
            $('#dureemodifHelp').html('');
            $('#dureemodifHelp').addClass('invisible');
        }

        // Cas du prix de vente en details 
        var duree = $('#prix_vente_gros_modif').val();
        if (libelle === '') {
            formValide = false;
            $('#prix_vente_gros_modif').addClass('is-invalid');
            $('#prix_vente_gros_modifHelp').html('Veillez saisir le prix de vente en gros.');
            $('#prix_vente_gros_modifHelp').removeClass('sinvisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#prix_vente_gros_modif').removeClass('is-invalid');
            $('#prix_vente_gros_modifHelp').html('');
            $('#prix_vente_gros_modifHelp').addClass('invisible');
        }


        
        // Cas du prix de vente en gros
        var duree = $('#prix_vente_detail_modif').val();
        if (libelle === '') {
            formValide = false;
            $('#prix_vente_detail_modif').addClass('is-invalid');
            $('#prix_vente_detail_modifHelp').html('Veillez saisir le prix de vente en details.');
            $('#prix_vente_detail_modifHelp').removeClass('sinvisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#prix_vente_detail_modif').removeClass('is-invalid');
            $('#prix_vente_detail_modifHelp').html('');
            $('#prix_vente_detail_modifHelp').addClass('invisible');
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
                success: function (result) {
                    donnee = JSON.parse(result);
                    if (donnee['success'] === 'existe') {
                        $('#libellemodif').addClass('is-invalid');
                        $('#libellemodifHelp').html(donnee['message']);
                        $('#libellemodifHelp').removeClass('invisible');


                        $('#dureemodif').addClass('is-invalid');
                        $('#dureemodifHelp').html(donnee['message']);
                        $('#dureemodifHelp').removeClass('invisible');


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