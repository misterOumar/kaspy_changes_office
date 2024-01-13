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
       /* $('#datesHelp').html('');
        $('#datesHelp').addClass('invisible');*/
     
       // $('#libelle').focus();
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
 
    $('#duree').on('change', function() {
        $('#duree').removeClass('is-invalid');
        $('#dureeHelp').html('');
    });
    $('#libelle').on('change', function() {
        $('#libelle').removeClass('is-invalid');
        $('#libelleHelp').html('');
    });
     
    // Champ de la duree ne doit contenir des letters
    $('#duree').on('keyup', function() {
        var loyer = $('#duree').val();
        if ($.isNumeric(loyer) === false) {
            formValide = false;
            $('#duree').addClass('is-invalid');
            $('#dureeHelp').html('Veuillez saisir une durée correcte');
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

    // Champ du libelle ne doit contenir des chiffres

    $('#libelle').on('keyup', function() {
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
        
        else{
            formValide = true;
            $('#libelle').removeClass('is-invalid');
            $('#libelleHelp').html('');
            $('#libelleHelp').addClass('invisible');
        }
    
    });





    //      Au click du boutton
    $('#bt_enregistrer').on('click', function(e) {

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
       
        

    });





      // MODIFICATION
    //      Les événements en déhors du click du boutton de validation
    // $('#libellemodif').on('keydown', function() {
    //     $('#libellemodif').removeClass('is-invalid');
    //     $('#libellemodifHelp').html('');
    // });
    $('#libellemodif').on('keyup', function() {
        var loyer = $('#libellemodif').val();

        for (var i = 0; i < loyer.length; i++) {
         if ($.isNumeric(loyer[i])) {       
            $('#libellemodif').addClass('is-invalid');
            $('#libelleHelp').html('Veuillez saisir un libellé correcte');
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
        
        else{
            formValide = true;
            $('#libellemodif').removeClass('is-invalid');
            $('#libellemodifHelp').html('');
            $('#libellemodifHelp').addClass('invisible');
        }
    
    });

    $('#dureemodif').on('keydown', function() {
        $('#dureemodif').removeClass('is-invalid');
        $('#dureemodifHelp').html('');
    });

    //      Au click du boutton
    $('#bt_modifier').on('click', function(e) {
        // Cas de - libelle
        var libelle = $('#libellemodif').val();
        var duree =$('#dureemodif').val();
     
        if (libelle === '' && duree === '') {
            formValide = false;
            $('#libellemodif').addClass('is-invalid');
            $('#libellemodifHelp').html('Veillez saisir le libellé.');
            $('#libellemodifHelp').removeClass('invisible');

            $('#dureemodif').addClass('is-invalid');
            $('#dureemodifHelp').html('Veillez saisir la duree.');
            $('#dureemodifHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#libellemodif').removeClass('is-invalid');
            $('#libellemodifHelp').html('');
            $('#libellemodifHelp').addClass('invisible');

            $('#dureemodif').removeClass('is-invalid');
            $('#dureemodifHelp').html('');
            $('#dureemodifHelp').addClass('invisible');
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