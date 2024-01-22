

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

        $('#libelle').val('');
        $('#libelle').removeClass('is-invalid');
        $('#libelleHelp').html('Veuillez saisir  le libellé ...');
        $('#libelleHelp').addClass('invisible');
 
        $('#date_t').val('');
        $('#date_t').removeClass('is-invalid');
        $('#date_tHelp').html('Veuillez sélectionner la date ...');
        $('#date_tHelp').addClass('invisible');
 
 

    }

    $('#bt_vider').on('click', function() {
        vider_les_champs()
    });
    jQuery(function($) {
        $('#date_t').flatpickr({
            defaultDate: 'today',
            dateFormat: "Y-m-d",
        })
    });

    flatpickr("#date_t", {
        locale: 'fr',
        // defaultDate : 'today'
    });



    jQuery(function($) {
        $('#date_t_modif').flatpickr({
            defaultDate: 'today',
            dateFormat: "Y-m-d",
        })
    });

    flatpickr("#date_t_modif", {
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
        $('#montantHelp').html('');
    });


    $('#type').on('change', function() {
        $('#type').removeClass('is-invalid');
        $('#typeHelp').html('');
    });
  

    $('#libelle').on('change', function() {
        $('#libelle').removeClass('is-invalid');
        $('#libelleHelp').html('');
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

 

//GESTION DE TRANSACTION ID
 


    if ($("#radio_sortie").is(":checked") || $("#radio_entree").is(":checked")) {
            formValide = true;
            $('#radio_sortie').removeClass('is-invalid');
            $('#radio_entree').removeClass('is-invalid');
            $('#typeHelp').html("");
            $('#typeHelp').removeClass('invisible');
        } else {
            formValide = false;
            $('#radio_sortie').addClass('is-invalid');
            $('#radio_entree').addClass('is-invalid');
            $('#typeHelp').html("Veillez choisir le type de la transacion");
            $('#typeHelp').removeClass('invisible');
            e.preventDefault()
        }
         
    
        $('#libelle').on('keyup', function() {
        var loyer = $('#libelle').val();
            if ($.isNumeric(loyer) === true) {
            formValide = false;
            $('#libelle').addClass('is-invalid');
            $('#libelleHelp').html('Veuillez saisir un libelle correcte');
            $('#libelleHelp').removeClass('invisible');
            $('#libelle').val('')
            e.preventDefault()
        } else {
            formValide = true;
            $('#libelle').removeClass('is-invalid');
            $('#libelleHelp').html('');
            $('#libelleHelp').addClass('invisible');
        }

    });

        //      Au click du boutton
    $('#bt_enregistrer').on('click', function(e) {

        // Cas du montant
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




         // Cas du solde total
         let libelle = $('#libelle').val();
        if (libelle === '') {
            formValide = false;
            $('#libelle').addClass('is-invalid');
            $('#libelleHelp').html('Veuillez saisir le libellé .');
            $('#libelleHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#libelle').removeClass('is-invalid');
            $('#libelleHelp').html('');
            $('#libelleHelp').addClass('invisible');
        }
            //cas du telephone
       

        
    
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
    $('#libelle_modif').on('keyup', function() {
        var loyer = $('#libelle_modif').val();
        if ($.isNumeric(loyer) === true) {
            formValide = false;
            $('#libelle_modif').addClass('is-invalid');
            $('#libelle_modifHelp').html('Veuillez saisir un libellé correcte');
            $('#libelle_modifHelp').removeClass('invisible');
            $('#libelle_modif').val('')
            e.preventDefault()
        } else {
            formValide = true;
            $('#libelle_modif').removeClass('is-invalid');
            $('#libelle_modifHelp').html('');
            $('#libelle_modifHelp').addClass('invisible');
        }
    });

    // Le telephone  ne doit contenir ds lettres
  
    //      Au click du boutton
    $('#bt_modifier').on('click', function(e) {

        var montant = $('#montant_modif').val();       
        var libelle = $('#libelle_modif').val();
       
        var date_t = $('#date_t_modif').val();

        if (montant === ''   && libelle == '' ) {
            formValide = false;
            $('#montant_modif').addClass('is-invalid');
            $('#montant_modifHelp').html('Veillez saisir le montant.');
            $('#montant_modifHelp').removeClass('invisible');         
            $('#libelle_modif').addClass('is-invalid');
            $('#libelle_modifHelp').html('Veillez sélectionner le libellé.');
            $('#libelle_modifHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#montant_modif').removeClass('is-invalid');
            $('#montant_modifHelp').html('');
            $('#montant_modifHelp').addClass('invisible');
            $('#libelle_modif').removeClass('is-invalid');
            $('#libelle_modifHelp').html('');
            $('#libelle_modifHelp').addClass('invisible');
 
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