<?php include("views/components/alerts.php") ?>

<script>
    // MES LOGIQUES
    //  Vider les champs
    function vider_les_champs() {
        // N_piece
        $('#n_piece').val('');
        $('#n_piece').removeClass('is-invalid');
        $('#n_pieceHelp').html('');
        $('#n_pieceHelp').addClass('invisible');
        // Nature_depense
        $('#nature_depense').val('Choisir...');
        $('#nature_depense').removeClass('is-invalid');
        $('#nature_depenseHelp').html('');
        $('#nature_depenseHelp').addClass('invisible');
        // Designation
        $('#designation').val('');
        $('#designation').removeClass('is-invalid');
        $('#designationHelp').html('');
        $('#designationHelp').addClass('invisible');
        // Fournisseur
        $('#fournisseur').val('Choisir le fournisseur...');
        $('#fournisseur').removeClass('is-invalid');
        $('#fournisseurHelp').html('');
        $('#fournisseurHelp').addClass('invisible');
        // Montant
        $('#montant').val('');
        $('#montant').removeClass('is-invalid');
        $('#montantHelp').html('');
        $('#montantHelp').addClass('invisible');
        // Mode_reglement
        $('#mode_reglement').val('Choisir le mode de règlement...');
        $('#mode_reglement').removeClass('is-invalid');
        $('#mode_reglementHelp').html('');
        $('#mode_reglementHelp').addClass('invisible');

        $('#n_piece').focus();
    }

    $('#bt_vider').on('click', function() {
        vider_les_champs()
    });

    jQuery(function($) {
        $('#dates').flatpickr({
            defaultDate: "today",
            //  dateFormat: "d-m-Y",
            monthNames: ["Jan", "Feb", "Mar", "Avr", "Mai", "Juin", "Juil", "Aou", "Sept", "Oct", "Nov", "Dec"]
        })
        $('#dates_modif').flatpickr({
            defaultDate: "today",
            //  dateFormat: "d-m-Y",
            monthNames: ["Jan", "Feb", "Mar", "Avr", "Mai", "Juin", "Juil", "Aou", "Sept", "Oct", "Nov", "Dec"]
        })
    })

    // VERIFICATIONS DU FORMULAIRE 
    var formValide = false;

    //      Les événements en déhors du click du boutton de validation
    $('#n_piece').on('keydown', function() {
        $('#n_piece').removeClass('is-invalid');
        $('#n_pieceHelp').html('');
        $('#n_pieceHelp').addClass('invisible');
    });
    $('#nature_depense').on('change', function() {
        $('#nature_depense').removeClass('is-invalid');
        $('#nature_depenseHelp').html('');
        $('#nature_depenseHelp').addClass('invisible');
    });
    $('#fournisseur').on('change', function() {
        $('#fournisseur').removeClass('is-invalid');
        $('#fournisseurHelp').html('');
        $('#fournisseurHelp').addClass('invisible');

        $('#designation').focus();
    });
    $('#mode_reglement').on('change', function() {
        $('#mode_reglement').removeClass('is-invalid');
        $('#mode_reglementHelp').html('');
        $('#mode_reglementHelp').addClass('invisible');
    });

    // Champ numérique
    $('#montant').on('keyup', function() {
        var montant = $('#montant').val();
        if ($.isNumeric(montant) === false) {
            formValide = false;
            $('#montant').addClass('is-invalid');
            $('#montantHelp').html('Veillez saisir un montant correcte');
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


    //      Au click du boutton
    $('#bt_enregistrer').on('click', function(e) {
        // Cas de - Nature_depense
        var nature_depense = $('#nature_depense').val();
        if (nature_depense === 'Choisir...') {
            formValide = false;
            $('#nature_depense').addClass('is-invalid');
            $('#nature_depenseHelp').html('Saisir la nature.');
            $('#nature_depenseHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#nature_depense').removeClass('is-invalid');
            $('#nature_depenseHelp').html('');
            $('#nature_depenseHelp').addClass('invisible');
        }
        // Cas de - Fournisseur
        var fournisseur = $('#fournisseur').val();
        if (fournisseur === 'Choisir le fournisseur...') {
            formValide = false;
            $('#fournisseur').addClass('is-invalid');
            $('#fournisseurHelp').html('Veillez saisir le fournisseur.');
            $('#fournisseurHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#fournisseur').removeClass('is-invalid');
            $('#fournisseurHelp').html('');
            $('#fournisseurHelp').addClass('invisible');
        }
        // Cas de - Designation
        var designation = $('#designation').val();
        if (designation === '') {
            formValide = false;
            $('#designation').addClass('is-invalid');
            $('#designationHelp').html('Veillez saisir la désignation.');
            $('#designationHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#designation').removeClass('is-invalid');
            $('#designationHelp').html('');
            $('#designationHelp').addClass('invisible');
        }

        // Cas de - Montant
        var montant = $('#montant').val();
        if ($.isNumeric(montant) === false) {
            formValide = false;
            $('#montant').addClass('is-invalid');
            $('#montantHelp').html('Veillez saisir un montant correct');
            $('#montantHelp').removeClass('invisible');
            $('#montant').val('')
            e.preventDefault()
        } else {
            formValide = true;
            $('#montant').removeClass('is-invalid');
            $('#montantHelp').html('');
            $('#montantHelp').addClass('invisible');
        }

        // Cas de - Mode_reglement
        var mode_reglement = $('#mode_reglement').val();
        if (mode_reglement === 'Choisir le mode de règlement...') {
            formValide = false;
            $('#mode_reglement').addClass('is-invalid');
            $('#mode_reglementHelp').html('Veillez saisir le mode de reglement.');
            $('#mode_reglementHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#mode_reglement').removeClass('is-invalid');
            $('#mode_reglementHelp').html('');
            $('#mode_reglementHelp').addClass('invisible');
        }

    });


    //      MODIFICATION
    // VERIFICATIONS DU FORMULAIRE 
    var submitUpdate = false;

    //      Les événements en déhors du click du boutton de validation
    $('#n_piece_modif').on('keydown', function() {
        $('#n_piece_modif').removeClass('is-invalid');
        $('#n_piece_modifHelp').html('');
        $('#n_piece_modifHelp').addClass('invisible');
    });
    $('#nature_depense_modif').on('change', function() {
        $('#nature_depense_modif').removeClass('is-invalid');
        $('#nature_depense_modifHelp').html('');
        $('#nature_depense_modifHelp').addClass('invisible');
    });
    $('#fournisseur_modif').on('change', function() {
        $('#fournisseur_modif').removeClass('is-invalid');
        $('#fournisseur_modifHelp').html('');
        $('#fournisseur_modifHelp').addClass('invisible');

        $('#designation_modif').focus();
    });
    $('#mode_reglement_modif').on('change', function() {
        $('#mode_reglement_modif').removeClass('is-invalid');
        $('#mode_reglement_modifHelp').html('');
        $('#mode_reglement_modifHelp').addClass('invisible');
    });

    // Champ numérique
    $('#montant_modif').on('keyup', function() {
        var montant = $('#montant').val();
        if ($.isNumeric(montant) === false) {
            submitUpdate = false;
            $('#montant_modif').addClass('is-invalid');
            $('#montant_modifHelp').html('Veillez saisir un montant correcte');
            $('#montant_modifHelp').removeClass('invisible');
            $('#montant_modif').val('')
            e.preventDefault()
        } else {
            submitUpdate = true;
            $('#montant_modif').removeClass('is-invalid');
            $('#montant_modifHelp').html('');
            $('#montant_modifHelp').addClass('invisible');
        }
    });


    //      Au click du boutton
    $('#bt_modifier').on('click', function(e) {
        // Cas de - Nature_depense
        var nature_depense = $('#nature_depense_modif').val();
        if (nature_depense === 'Choisir...') {
            submitUpdate = false;
            $('#nature_depense_modif').addClass('is-invalid');
            $('#nature_depens_modifeHelp').html('Saisir la nature.');
            $('#nature_depense_modifHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            submitUpdate = true;
            $('#nature_depense_modif').removeClass('is-invalid');
            $('#nature_depense_modifHelp').html('');
            $('#nature_depense_modifHelp').addClass('invisible');
        }
        // Cas de - Fournisseur
        var fournisseur = $('#fournisseur_modif').val();
        if (fournisseur === 'Choisir le fournisseur...') {
            submitUpdate = false;
            $('#fournisseur_modif').addClass('is-invalid');
            $('#fournisseur_modifHelp').html('Veillez saisir le fournisseur.');
            $('#fournisseur_modifHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            submitUpdate = true;
            $('#fournisseur_modif').removeClass('is-invalid');
            $('#fournisseur_modifHelp').html('');
            $('#fournisseur_modifHelp').addClass('invisible');
        }
        // Cas de - Designation
        var designation = $('#designation_modif').val();
        if (designation === '') {
            submitUpdate = false;
            $('#designation_modif').addClass('is-invalid');
            $('#designation_modifHelp').html('Veillez saisir la désignation.');
            $('#designation_modifHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            submitUpdate = true;
            $('#designation_modif').removeClass('is-invalid');
            $('#designation_modifHelp').html('');
            $('#designation_modifHelp').addClass('invisible');
        }

        // Cas de - Montant
        var montant = $('#montant_modif').val();
        if ($.isNumeric(montant) === false) {
            submitUpdate = false;
            $('#montant_modif').addClass('is-invalid');
            $('#montant_modifHelp').html('Veillez saisir un montant correct');
            $('#montant_modifHelp').removeClass('invisible');
            $('#montant_modif').val('')
            e.preventDefault()
        } else {
            submitUpdate = true;
            $('#montant_modif').removeClass('is-invalid');
            $('#montant_modifHelp').html('');
            $('#montant_modifHelp').addClass('invisible');
        }

        // Cas de - Mode_reglement
        var mode_reglement = $('#mode_reglement_modif').val();
        if (mode_reglement === 'Choisir le mode de règlement...') {
            submitUpdate = false;
            $('#mode_reglement_modif').addClass('is-invalid');
            $('#mode_reglement_modifHelp').html('Veillez saisir le mode de reglement.');
            $('#mode_reglement_modifHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            submitUpdate = true;
            $('#mode_reglement_modif').removeClass('is-invalid');
            $('#mode_reglemen_modiftHelp').html('');
            $('#mode_reglement_modifHelp').addClass('invisible');
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