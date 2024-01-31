<?php include("views/components/alerts.php") ?>


<script>
    // MES LOGIQUES
    //  Vider les champs
    function vider_les_champs() {
        // dates
        $('#montant').val('');
        $('#montant').removeClass('is-invalid');
        $('#montantHelp').html('');
        $('#montantHelp').addClass('invisible');

        $('#client').val('');
        $('#client').removeClass('is-invalid');
        $('#clientHelp').html('');
        $('#clientHelp').addClass('invisible');


        $('#carte').val('');
        $('#carte').removeClass('is-invalid');
        $('#carteHelp').html('');
        $('#carteHelp').addClass('invisible');

        $('#date_v').val('');
        $('#date_v').removeClass('is-invalid');
        $('#date_vHelp').html('');
        $('#date_vHelp').addClass('invisible');

        $('#prix_u').val('');
        $('#prix_u').removeClass('is-invalid');
        $('#prix_uHelp').html('');
        $('#prix_uHelp').addClass('invisible');

        $('#quantite').val('');
        $('#quantite').removeClass('is-invalid');
        $('#quantiteHelp').html('');
        $('#quantiteHelp').addClass('invisible');

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

    $('#montant').on('change', function() {
        $('#montant').removeClass('is-invalid');
        $('#montantHelp').html('');
    });
    $('#client').on('change', function() {
        $('#client').removeClass('is-invalid');
        $('#clientHelp').html('');
    });

    // les options de carte en fonction de du type de carte
    $('#carte').on('change', function() {
        var type_carte = $('#carte').val();
        $.ajax({
            type: "GET",
            data: "type_carte=" + type_carte + "&get_by_type_carte=" + true,
            url: "controllers/vente_carte_controller.php",
            success: function(result) {
                donnee = JSON.parse(result);
                if (donnee['success'] === 'true') {
                    var types_cartes = donnee['types_cartes'];

                    var options = '';
                    for (var i = 0; i < types_cartes.length; i++) {
                        options += '<option value="' + types_cartes[i]['customer_id'] + '">' + types_cartes[i]['customer_id'] + '</option>';
                    }
                    $('#num_carte').html(options);
                } else if (donnee['success'] === 'false') {

                } else {

                }
            }
        })
    });

    $('#email').on('keydown', function() {
        $('#email').removeClass('is-invalid');
        $('#emailHelp').html('');
        $('#emailHelp').addClass('invisible');
    });

    $('#prix_u').on('change', function() {
        $('#prix_u').removeClass('is-invalid');
        $('#prix_uHelp').html('');
    });

    $('#quantite').on('change', function() {
        $('#quantite').removeClass('is-invalid');
        $('#quantiteHelp').html('');
    });

    $('#date_v').on('change', function() {
        $('#date_v').removeClass('is-invalid');
        $('#date_vHelp').html('');
    });



    $('#quantite').on('keyup', function() {
        var loyer = $('#quantite').val();
        if ($.isNumeric(loyer) === false) {
            formValide = false;
            $('#quantite').addClass('is-invalid');
            $('#quantiteHelp').html('Veuillez saisir une quantite  correcte');
            $('#quantiteHelp').removeClass('invisible');
            $('#quantite').val('')
            e.preventDefault()
        } else {
            formValide = true;
            $('#quantite').removeClass('is-invalid');
            $('#quantiteHelp').html('');
            $('#quantiteHelp').addClass('invisible');
        }
    });

    $('#prix_u').on('keyup', function() {
        var loyer = $('#prix_u').val();
        if ($.isNumeric(loyer) === false) {
            formValide = false;
            $('#prix_u').addClass('is-invalid');
            $('#prix_uHelp').html('Veuillez saisir un prix correcte');
            $('#prix_uHelp').removeClass('invisible');
            $('#tel_dest').val('')
            e.preventDefault()
        } else {
            formValide = true;
            $('#prix_u').removeClass('is-invalid');
            $('#prix_uHelp').html('');
            $('#prix_uHelp').addClass('invisible');
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


        let telephone = $('#telephone').val();
        if (telephone === '') {
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


        let prix_u = $('#prix_u').val();
        if (prix_u === '') {
            formValide = false;
            $('#prix_u').addClass('is-invalid');
            $('#prix_uHelp').html('Veuillez saisir le  prix unitaire.');
            $('#prix_uHelp').removeClass('invisible');
            e.preventDefault()
        } else

        {
            formValide = true;
            $('#prix_u').removeClass('is-invalid');
            $('#prix_uHelp').html('');
            $('#prix_uHelp').addClass('invisible');
        }

        let quantite = $('#quantite').val();
        if (quantite === '') {
            formValide = false;
            $('#quantite').addClass('is-invalid');
            $('#quantiteHelp').html('Veuillez saisir la quantité.');
            $('#quantiteHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#quantite').removeClass('is-invalid');
            $('#quantiteHelp').html('');
            $('#quantiteHelp').addClass('invisible');
        }
        let carte = $('#carte').val();
        if (carte === 'Choisir la carte') {
            formValide = false;
            $('#carte').addClass('is-invalid');
            // $('#carteHelp').html('Veuillez sélectionner la carte.');
            $('#carteHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#carte').removeClass('is-invalid');
            $('#carteHelp').html('');
            $('#carteHelp').addClass('invisible');
        }


        let num_carte = $('#carte').val();
        if (num_carte === 'Choisir la carte') {
            formValide = false;
            $('#num_carte').addClass('is-invalid');
            // $('#num_carteHelp').html('Veuillez sélectionner le numero de la carte.');
            $('#num_carteHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#num_carte').removeClass('is-invalid');
            $('#num_carteHelp').html('');
            $('#num_carteHelp').addClass('invisible');
        }


        // window.location.reload();


    });
    // MODIFICATION
    //Le prix unitaire ne doit contenir ds lettres
    $('#prix_u_modif').on('keyup', function() {
        var loyer = $('#prix_u').val();
        if ($.isNumeric(loyer) === false) {
            formValide = false;
            $('#prix_u_modif').addClass('is-invalid');
            $('#prix_u_modifHelp').html('Veuillez saisir un prix correcte');
            $('#tel_cli_modifHelp').removeClass('invisible');
            $('#tel_cli_modif').val('')
            e.preventDefault()
        } else {
            formValide = true;
            $('#prix_u_modif').removeClass('is-invalid');
            $('#prix_u_modifHelp').html('');
            $('#prix_u_modifHelp').addClass('invisible');
        }
    });

    //Le quantite  ne doit contenir ds lettres

    $('#quantite_modif').on('keyup', function() {
        var loyer = $('#quantite_modif').val();
        if ($.isNumeric(loyer) === false) {
            formValide = false;
            $('#quantite_modif').addClass('is-invalid');
            $('#quantite_modifHelp').html('Veuillez saisir une quantité correcte');
            $('#quantite_modifHelp').removeClass('invisible');
            $('#quantite_modif').val('')
            e.preventDefault()
        } else {
            formValide = true;
            $('#quantite_modif').removeClass('is-invalid');
            $('#quantite_modifHelp').html('');
            $('#quantite_modifHelp').addClass('invisible');
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

    //      Au click du boutton
    $('#bt_modifier').on('click', function(e) {

        var prix_u = $('#prix_u_modif').val();
        var client = $('#client_modif').val();
        var quantite = $('#quantite_modif').val();
        // var tel_dest = $('#tel_dest_modif').val();
        // var destinataire = $('#quantite_modif').val();
        var date_t = $('#date_v_modif').val();


        if (client === '' && quantite == '' && prix_u === '') {
            formValide = false;
            // $('#montant_modif').addClass('is-invalid');
            // $('#montant_modifHelp').html('Veillez saisir le libellé.');
            // $('#montant_modifHelp').removeClass('invisible');

            $('#client_modif').addClass('is-invalid');
            $('#client_modifHelp').html('Veillez saisir le client.');
            $('#client_modifHelp').removeClass('invisible');


            $('#quantite_modif').addClass('is-invalid');
            $('#quantite_modifHelp').html('Veillez saisir la quantité.');
            $('#quantite_modifHelp').removeClass('invisible');

            // $('#date_v_modif').addClass('is-invalid');
            // $('#date_v_modifHelp').html('Veillez sélectionner le date.');
            // $('#date_v_modifHelp').removeClass('invisible');


            $('#prix_u_modif').addClass('is-invalid');
            $('#prix_u_modifHelp').html('Veillez sélectionner le telephone du client.');
            $('#prix_u_modifHelp').removeClass('invisible');


            // $('#tel_dest_modif').addClass('is-invalid');
            // $('#tel_dest_modifHelp').html('Veillez sélectionner le telephone du destinataire.');
            // $('#tel_dest_modifHelp').removeClass('invisible');

            e.preventDefault()
        } else {
            formValide = true;
            // $('#montant_modif').removeClass('is-invalid');
            // $('#montant_modifHelp').html('');
            // $('#montant_modifHelp').addClass('invisible');

            $('#client_modif').removeClass('is-invalid');
            $('#client_modifHelp').html('');
            $('#client_modifHelp').addClass('invisible');

            $('#prix_u_modif').removeClass('is-invalid');
            $('#prix_u_modifHelp').html('');
            $('#prix_u_modifHelp').addClass('invisible');

            $('#date_v_modif').removeClass('is-invalid');
            $('#date_v_modifHelp').html('');
            $('#date_v_modifHelp').addClass('invisible');

            $('#quantitte_modif').removeClass('is-invalid');
            $('#quantitte_modifHelp').html('');
            $('#quantitte_modifHelp').addClass('invisible');

            // $('#tel_dest_modif').removeClass('is-invalid');
            // $('#tel_dest_modifHelp').html('');
            // $('#tel_dest_modifHelp').addClass('invisible');
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