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


        $('#taux').val('');
        $('#taux').removeClass('is-invalid');
        $('#tauxHelp').html('Veuillez saisir  la taux...');
        $('#tauxHelp').addClass('invisible');


        
        $('#adresse').val('');
        $('#adresse').removeClass('is-invalid');
        $('#adresseHelp').html('Veuillez saisir  l\'adresse...');
        $('#adresseHelp').addClass('invisible');

        $('#date_v').val('');
        $('#date_v').removeClass('is-invalid');
        $('#date_vHelp').html('Veuillez sélectionner la date ...');
        $('#date_vHelp').addClass('invisible');

        
        $('#telephone').val('');
        $('#telephone').removeClass('is-invalid');
        $('#telephoneHelp').html('Veuillez saisir la telephone...');
        $('#telephoneHelp').addClass('invisible');

    }

    $('#bt_vider').on('click', function() {
        vider_les_champs()
    });
    jQuery(function($) {
        $('#date_v').flatpickr({
            defaultDate: 'today',
            dateFormat: "Y-m-d",
        })
    });

    flatpickr("#date_v", {
        locale: 'fr',
        // defaultDate : 'today'
    });



    jQuery(function($) {
        $('#date_v_modif').flatpickr({
            defaultDate: 'today',
            dateFormat: "Y-m-d",
        })
    });

    flatpickr("#date_v_modif", {
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

    $('#adresse').on('change', function() {
        $('#adresse').removeClass('is-invalid');
        $('#adresseHelp').html('');
    });

    $('#carte').on('change', function() {
        $('#taux').removeClass('is-invalid');
        $('#tauxHelp').html('Veillez selectionner la taux');
    });

   

    $('#telephone').on('change', function() {
        $('#telephone').removeClass('is-invalid');
        $('#telephoneHelp').html('Veillez saisir la telephone');
    });

    $('#date_v').on('change', function() {
        $('#date_v').removeClass('is-invalid');
        $('#date_vHelp').html('Veillez selectionner  la date ');
    });
    // Champ du montant ne doit contenir des letters
    // $('#montant').on('keyup', function() {
    //     var loyer = $('#montant').val();
    //     if ($.isNumeric(loyer) === false) {
    //         formValide = false;
    //         $('#montant').addClass('is-invalid');
    //         $('#montantHelp').html('Veuillez saisir un  montant correcte');
    //         $('#montantHelp').removeClass('invisible');
    //         $('#montant').val('')
    //         e.preventDefault()
    //     } else {
    //         formValide = true;
    //         $('#montant').removeClass('is-invalid');
    //         $('#montantHelp').html('');
    //         $('#montantHelp').addClass('invisible');
    //     }
    // });


    $('#montant').on('keyup', function() {
        var loyer = $('#montant').val();
        if ($.isNumeric(loyer) === false) {
            formValide = false;
            $('#montant').addClass('is-invalid');
            $('#montantHelp').html('Veuillez saisir une montant  correcte');
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
    $('#telephone').on('keyup', function() {
        var loyer = $('#telephone').val();
        if ($.isNumeric(loyer) === false) {
            formValide = false;
            $('#telephone').addClass('is-invalid');
            $('#telephoneHelp').html('Veuillez saisir un numero  correcte');
            $('#telephoneHelp').removeClass('invisible');
            $('#telephone').val('')
            e.preventDefault()
        } else {
            formValide = true;
            $('#telephone').removeClass('is-invalid');
            $('#telephoneHelp').html('');
            $('#telephoneHelp').addClass('invisible');
        }
    });
    $('#taux').on('keyup', function() {
        var loyer = $('#taux').val();
        if ($.isNumeric(loyer) === false) {
            formValide = false;
            $('#taux').addClass('is-invalid');
            $('#tauxHelp').html('Veuillez saisir un taux correcte');
            $('#tauxHelp').removeClass('invisible');
            $('#taux').val('')
            e.preventDefault()
        } else {
            formValide = true;
            $('#taux').removeClass('is-invalid');
            $('#tauxHelp').html('');
            $('#tauxHelp').addClass('invisible');
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

    //      Au click du boutton
    $('#bt_enregistrer').on('click', function(e) {

        // Cas de la duree
        
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


        let adresse = $('#adresse').val();
        if (client === '') {
            formValide = false;
            $('#adresse').addClass('is-invalid');
            $('#adresseHelp').html('Veuillez saisir l\'adresse.');
            $('#adresseHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#adresse').removeClass('is-invalid');
            $('#adresseHelp').html('');
            $('#adresseHelp').addClass('invisible');
        }


        let devise = $('#devise').val();
        if (devise =='Choisir la dévise') {
            formValide = false;
            $('#devise').addClass('is-invalid');
            $('#deviseHelp').html('Veuillez saisir la devise.');
            $('#deviseHelp').removeClass('invisible');
            e.preventDefault()
        } else if (devise !='Choisir la dévise') {
            formValide = true;
            $('#devise').removeClass('is-invalid');
            $('#deviseHelp').html('');
            $('#deviseHelp').addClass('invisible');
        }
        
    if ($("#radio_achat").is(":checked") || $("#radio_vente").is(":checked")) {
            formValide = true;
            $('#radio_achat').removeClass('is-invalid');
            $('#radio_vente').removeClass('is-invalid');
            $('#typeHelp').html("");
            $('#typeHelp').removeClass('invisible');
        } else {
            formValide = false;
            $('#radio_achat').addClass('is-invalid');
            $('#radio_vente').addClass('is-invalid');
            $('#typeHelp').html("Veillez choisir la devise la transacion");
            $('#typeHelp').removeClass('invisible');
            e.preventDefault()
        }

        let prix_u = $('#taux').val();
        if (prix_u === '') {
            formValide = false;
            $('#taux').addClass('is-invalid');
            $('#tauxHelp').html('Veuillez saisir le  taux.');
            $('#tauxHelp').removeClass('invisible');
            e.preventDefault()
        } else

        {
            formValide = true;
            $('#taux').removeClass('is-invalid');
            $('#tauxHelp').html('');
            $('#tauxHelp').addClass('invisible');
        }

        let montant = $('#montant').val();
        if (montant === '') {
            formValide = false;
            $('#montant').addClass('is-invalid');
            $('#montantHelp').html('Veuillez saisir la montant.');
            $('#montantHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#montant').removeClass('is-invalid');
            $('#montantHelp').html('');
            $('#montantHelp').addClass('invisible');
        }    
        let carte = $('#telephone').val();
        if (carte === '') {
            formValide = false;
            $('#telephone').addClass('is-invalid');
            $('#telephoneHelp').html('Veuillez saisir le telephone.');
            $('#telephoneHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#telephone').removeClass('is-invalid');
            $('#telephoneHelp').html('');
            $('#telephoneHelp').addClass('invisible');
        }    
         

        // window.location.reload();


    });






























    // MODIFICATION



   

    //Le telephone  ne doit contenir ds lettres
    // $('#taux_modif').on('keyup', function() {
    //     var loyer = $('#taux').val();
    //     if ($.isNumeric(loyer) === false) {
    //         formValide = false;
    //         $('#taux_modif').addClass('is-invalid');
    //         $('#taux_modifHelp').html('Veuillez saisir un taux correcte');
    //         $('#taux_modifHelp').removeClass('invisible');
    //         $('#taux_modif').val('')
    //         e.preventDefault()
    //     } else {
    //         formValide = true;
    //         $('#taux_modif').removeClass('is-invalid');
    //         $('#taux_modifHelp').html('');
    //         $('#taux_modifHelp').addClass('invisible');
    //     }
    // });

    //Le telephone  ne doit contenir ds lettres

    $('#montant_modif').on('keyup', function() {
        var loyer = $('#montant_modif').val();
        if ($.isNumeric(loyer) === false) {
            formValide = false;
            $('#montant_modif').addClass('is-invalid');
            $('#montant_modifHelp').html('Veuillez saisir une montant correcte');
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

    // $('#destinataire_modif').on('keyup', function() {
    //     var loyer = $('#destinataire_modif').val();

    //     for (var i = 0; i < loyer.length; i++) {
    //         if ($.isNumeric(loyer[i])) {
    //             $('#destinataire_modif').addClass('is-invalid');
    //             $('#destinataire_modifHelp').html('Veuillez saisir un nom correcte');
    //             $('#destinataire_modifHelp').removeClass('invisible');
    //             $('#destinataire_modif').val('')
    //             e.preventDefault()
    //         }
    //     }

    //     if ($.isNumeric(loyer) === true) {
    //         formValide = false;
    //         $('#destinataire_modif').addClass('is-invalid');
    //         $('#destinataire_modifHelp').html('Veuillez saisir un nom  correcte');
    //         $('#destinataire_modifHelp').removeClass('invisible');
    //         $('#destinataire_modif').val('')
    //         e.preventDefault()
    //     } else {
    //         formValide = true;
    //         $('#destinataire_modif').removeClass('is-invalid');
    //         $('#destinataire_modifHelp').html('');
    //         $('#destinataire_modifHelp').addClass('invisible');
    //     }

    // });

    //      Au click du boutton
    $('#bt_modifier').on('click', function(e) {

        var taux = $('#taux_modif').val();
        var client = $('#client_modif').val();
        var montant = $('#montant_modif').val();
        var telephone = $('#telephone_modif').val();       
        var date_v = $('#date_v_modif').val();


        if (  client === ''   && montant == '' && taux === '' && telephone === '') {
            formValide = false;
            
            $('#client_modif').addClass('is-invalid');
            $('#client_modifHelp').html('Veillez saisir le client.');
            $('#client_modifHelp').removeClass('invisible');


            $('#taux_modif').addClass('is-invalid');
            $('#taux_modifHelp').html('Veillez saisir la taux.');
            $('#taux_modifHelp').removeClass('invisible');


            $('#montant_modif').addClass('is-invalid');
            $('#montant_modifHelp').html('Veillez saisir le montant.');
            $('#montant_modifHelp').removeClass('invisible');


            $('#telephone_modif').addClass('is-invalid');
            $('#telephone_modifHelp').html('Veillez saisir le telephone du client.');
            $('#telephone_modifHelp').removeClass('invisible');

            e.preventDefault()
        } else {
            formValide = true;
            

            $('#client_modif').removeClass('is-invalid');
            $('#client_modifHelp').html('');
            $('#client_modifHelp').addClass('invisible');

            $('#taux_modif').removeClass('is-invalid');
            $('#taux_modifHelp').html('');
            $('#taux_modifHelp').addClass('invisible');

            $('#date_v_modif').removeClass('is-invalid');
            $('#date_v_modifHelp').html('');
            $('#date_v_modifHelp').addClass('invisible');

            $('#montant_modif').removeClass('is-invalid');
            $('#montant_modifHelp').html('');
            $('#montant_modifHelp').addClass('invisible');

            $('#telephone_modif').removeClass('is-invalid');
            $('#telephone_modifHelp').html('');
            $('#telephone_modifHelp').addClass('invisible');
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