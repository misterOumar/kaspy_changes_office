<?php include("views/components/alerts.php") ?>
<script src="functions/functions.js"></script>

<script>
    // VERIFICATIONS DU FORMULAIRE 
    var formValide = true;
    //      Les événements en déhors du click du boutton de validation
    $('#libelle').on('keydown', function() {
        $('#libelle').removeClass('is-invalid');
        $('#libelleHelp').html('');
        $('#libelleHelp').addClass('invisible');
    });
    $('#raison_sociale').on('keydown', function() {
        $('#raison_sociale').removeClass('is-invalid');
        $('#raison_socialeHelp').html('');
        $('#raison_socialeHelp').addClass('invisible');
    });
    $('#email').on('keydown', function() {
        $('#email').removeClass('is-invalid');
        $('#emailHelp').html('');
        $('#emailHelp').addClass('invisible');
    });
    $('#tel1').on('keydown', function() {
        $('#tel1').removeClass('is-invalid');
        $('tel1Help').html('');
        $('#tel1Help').addClass('invisible');
    });

    // Champs numérique
    $('#capital_social').on('keyup', function() {
        var montant = $('#capital_social').val();
        if ($.isNumeric(montant) === false) {
            formValide = false;
            $('#capital_socialHelp').html('Valeur incorrecte');
            $('#capital_socialHelp').removeClass('invisible');
            $('#capital_social').val('')
            e.preventDefault()
        } else {
            formValide = true;
            $('#capital_social').removeClass('is-invalid');
            $('#capital_socialHelp').html('');
            $('#capital_socialHelp').addClass('invisible');
        }
    });



    //      Au click du boutton
    $('#bt_maj').on('click', function() {
        // Cas de - libelle
        var libelle = $('#libelle').val();
        if (libelle === '') {
            formValide = false;
            // à revoir
            $('.step-trigger').removeAttr("aria-selected");
            $('#account-details').removeClass("active");
            $('#tab_generale').attr("aria-selected", true);

            $('#libelle').addClass('is-invalid');
            $('#libelleHelp').html('Veuillez saisir le libelle.');
            $('#libelleHelp').removeClass('invisible');

            // MESSAGE ALERT
            swal_Alert_Danger("Veuillez saisir le libellé")
            e.preventDefault()
        } else {
            formValide = true;
            $('#libelle').removeClass('is-invalid');
            $('#libelleHelp').html('');
            $('#libelleHelp').addClass('invisible');
        }
         // Cas de - Raison sociale
         var libelle = $('#raison_sociale').val();
        if (libelle === '') {
            formValide = false;
            $('#raison_sociale').addClass('is-invalid');
            $('#raison_socialeHelp').html('Veuillez saisir la raison sociale.');
            $('#raison_socialeHelp').removeClass('invisible');

            // MESSAGE ALERT
            swal_Alert_Danger("Veuillez saisir la raison sociale")
            e.preventDefault()
        } else {
            formValide = true;
            $('#libelle').removeClass('is-invalid');
            $('#libelleHelp').html('');
            $('#libelleHelp').addClass('invisible');
        }

        // Cas de - Email
        var email = $('#email').val();
        if (email === '') {
            formValide = false;
            $('#email').addClass('is-invalid');
            $('#emailHelp').html("Veuillez saisir l'émail");
            $('#emailHelp').removeClass('invisible');

            // MESSAGE ALERT
            swal_Alert_Danger("Veuillez saisir l'émail")
            e.preventDefault()
        } else {
            formValide = true;
            $('#email').removeClass('is-invalid');
            $('#emailHelp').html('');
            $('#emailHelp').addClass('invisible');
        }
        // Cas de - tel1
        var tel1 = $('#tel1').val();
        if (tel1 === '') {
            formValide = false;
            $('#tel1').addClass('is-invalid');
            $('#tel1Help').html('Veuillez saisir le numero de téléphone.');
            $('#tel1Help').removeClass('invisible');

            // MESSAGE ALERT
            swal_Alert_Danger('Veuillez saisir le numero de téléphone.')
            e.preventDefault()
        } else {
            formValide = true;
            $('#tel1').removeClass('is-invalid');
            $('#tel1Help').html('');
            $('#tel1Help').addClass('invisible');
        }

        // Cas de - Contact
        var tel2 = $('#tel2').val();
        if (tel2 != '' && validatePhone(tel2) === false) {
            formValide = false;
            $('#tel2').addClass('is-invalid');
            $('#tel2Help').html('Veillez saisir le contact valide');
            $('#tel2Help').removeClass('invisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#tel2').removeClass('is-invalid');
            $('#tel2Help').html('');
            $('#tel2Help').addClass('invisible');
        }

        // Cas ou tout est OK
        if (formValide) {
            Swal.fire({
                title: "Voulez vous vraiment mettre à jour vos données d'entreprise?",
                text: 'Mofification des informations de la société',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Oui, mettre à jour !',
                cancelButtonText: 'Annuler',
                customClass: {
                    confirmButton: 'btn btn-primary',
                    cancelButton: 'btn btn-outline-danger ms-1'
                },
                buttonsStyling: false
            }).then(function(result) {
                if (result.value) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Mise à jour éffectuée !',
                        text: "Vos informations sont actuellement à jour.",
                        customClass: {
                            confirmButton: 'btn btn-success'
                        }
                    });
                }
            });
            $('.swal2-confirm').on('click', function() {
                var form = $('#form_maj');
                var method = form.prop('method');
                var url = form.prop('action');

                $.ajax({
                    type: method,
                    data: form.serialize() + "&bt_maj=" + true,
                    url: url,
                    success: function(result) {
                        var donnee = JSON.parse(result);
                        if (donnee['success'] === 'true') {
                            $('#libelle').val("");
                            $('#libelleHelp').html("").addClass('invisible');

                            //Rédirection vers login
                            location.href = "index.php?page=bureaux";
                        }

                        if (donnee['success'] === 'false') {
                            $('#libelleHelp').html(donnee['libelle']).removeClass('invisible');
                            initializeFlash();
                            $('.flash').addClass('alert-danger');
                            $('.flash').html('<i class="fas fa-exclamation-circle"></i> ' + donnee['message'])
                                .fadeIn(300).delay(2500).fadeOut(300);
                            e.preventDefault()
                        }
                    }
                });
            });
        }

    });
</script>