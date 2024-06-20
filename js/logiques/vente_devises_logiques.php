<?php include("views/components/alerts.php") ?>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script src="functions/functions.js"></script>
<script>
    // MES LOGIQUES

    // Definition des fonctions pour ne pas se repeter dans le code : 
    // 1- lorsque la devise change afficher le taux 
    function handleDeviseChange(elementId, tauxVenteId) {
        $('#' + elementId).on('change', function() {
            var devise = $('#' + elementId).val();
            $.ajax({
                type: "GET",
                data: "devise=" + devise + "&get_devise_by_nom=" + true,
                url: "controllers/vente_devises_controller.php",
                success: function(result) {
                    var donnee = JSON.parse(result);
                    if (donnee['success'] === 'true') {
                        var devise = donnee['devise'];
                        $('#' + tauxVenteId).val(devise['taux_vente']);
                    }
                }
            });
        });
    }

    // 2- lorsque la quantite, taux ou la remise change
    function handleQuantiteTauxRemiseChange(quantiteId, tauxId, remiseId, totalBrutId, totalNetId) {
        $('#' + quantiteId + ', #' + tauxId + ', #' + remiseId).on('input', function() {
            var quantite = parseFloat($('#' + quantiteId).val());
            var taux_vente = parseFloat($('#' + tauxId).val());
            var remise = parseFloat($('#' + remiseId).val());
            let total_brut;
            let total_net;

            total_brut = quantite * taux_vente;
            total_net = total_brut - remise

            if (!isNaN(quantite) && !isNaN(taux_vente)) {
                $('#' + totalBrutId).val(total_brut.toFixed(2)); // afficher le montant avec deux décimales
                $('#' + totalNetId).val(total_net.toFixed(2)); // afficher le montant avec deux décimales
            }
        });
    }


    $('#bt_vider').on('click', function() {
        $('#form_client').trigger("reset");
    });


    $(" #date_vente , #date_vente_modif").flatpickr({
        defaultDate: 'today',
        dateFormat: "Y-m-d",
    })

    // charger taux vente lorsqu'on choisi la devise
    handleDeviseChange('devise', 'taux_vente');

    // actualiser les montant en cas de changement
    handleQuantiteTauxRemiseChange("quantite", "taux_vente", "remise", "total_brut", "total_net")


    // remplir les champs si on choisi le client
    $('#choix_client').on('change', function() {
        var numero_piece = $('#choix_client').val();

        if (numero_piece != "Choisir le client") {
            console.log(numero_piece);
            $.ajax({
                type: "GET",
                data: "numero_piece=" + numero_piece + "&get_client_by_numero_piece=" + true,
                url: "controllers/vente_devises_controller.php",
                success: function(result) {
                    donnee = JSON.parse(result);
                    if (donnee['success'] === 'true') {
                        var client = donnee['client'];

                        $('#civilite').val(client['civilite'])
                        $('#type').val(client['type'])
                        $('#nom_prenom').val(client['nom'])
                        $('#type_piece').val(client['type_de_piece'])
                        $('#numero_piece').val(client['numero_de_piece'])
                        $('#telephone').val(client['contact'])
                        $('#email').val(client['email'])
                        $('#adresse').val(client['adresse'])
                        $('#idModif').val(client['id'])
                    }
                }
            })

        }
    });

    // --- LOGIQUE DE LA CONVERSION
    // charger taux vente lorsqu'on choisi la devise
    $('#devise_conversion').on('change', function() {
        var devise_conversion = $('#devise_conversion').val();

        $.ajax({
            type: "GET",
            data: "devise=" + devise_conversion + "&get_devise_by_nom=" + true,
            url: "controllers/vente_devises_controller.php",
            success: function(result) {
                donnee = JSON.parse(result);
                if (donnee['success'] === 'true') {
                    var devise = donnee['devise'];

                    $('#taux_vente_conversion').val(devise['taux_vente'])
                    $('#devise').val(devise['libelle'])
                }
            }
        })
    });

    // au clique du bouton de la conversion
    $('#bt_convertir').on('click', function() {
        var taux_vente_conversion = parseFloat($('#taux_vente_conversion').val());
        var montant_conversion = parseFloat($('#montant_conversion').val());

        let total_brut;
        let quantite;
        let total_net;

        quantite = montant_conversion / taux_vente_conversion;
        total_net = total_brut - remise

        if (!isNaN(taux_vente_conversion) && !isNaN(montant_conversion)) {

            $('#taux_vente').val(taux_vente_conversion); // afficher le montant avec deux décimales
            $('#quantite').val(quantite.toFixed(2)); // afficher le montant avec deux décimales
            $('#total_net').val(montant_conversion); // afficher le montant avec deux décimales
            $('#total_brut').val(montant_conversion); // afficher le montant avec deux décimales
        }
    });


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

    $('#adresse').on('change', function() {
        $('#adresse').removeClass('is-invalid');
        $('#adresseHelp').html('');
    });

    $('#devise_unite').on('change', function() {
        $('#devise_unite').removeClass('is-invalid');
        $('#devise_uniteHelp').html('');
    });

    $('#telephone').on('change', function() {
        $('#telephone').removeClass('is-invalid');
        $('#telephoneHelp').html('');
    });

    $('#date_v').on('change', function() {
        $('#date_v').removeClass('is-invalid');
        $('#date_vHelp').html(' ');
    });


    $('#telephone, #telephone_modif').on('keyup', function() {
        var selectedId = $(this).attr('id');
        var telephone = $(this).val();
        if ($.isNumeric(telephone) === false) {
            formValide = false;
            $('#' + selectedId).addClass('is-invalid');
            $('#' + selectedId + 'Help').html('Veuillez saisir un numero  correcte');
            $('#' + selectedId + 'Help').removeClass('invisible');
            $('#' + selectedId).val('')
            e.preventDefault()
        } else {
            formValide = true;
            $('#' + selectedId).removeClass('is-invalid');
            $('#' + selectedId + 'Help').html('');
            $('#' + selectedId + 'Help').addClass('invisible');
        }
    });



    $('#taux, #taux_modif').on('keyup', function() {
        var selectedId = $(this).attr('id');
        var taux = $(this).val();
        if ($.isNumeric(taux) === false) {
            formValide = false;
            $('#' + selectedId).addClass('is-invalid');
            $('#' + selectedId + 'Help').html('Veuillez saisir un taux correcte');
            $('#' + selectedId + 'Help').removeClass('invisible');
            $('#' + selectedId).val('')
            e.preventDefault()
        } else {
            formValide = true;
            $('#' + selectedId).removeClass('is-invalid');
            $('#' + selectedId + 'Help').html('');
            $('#' + selectedId + 'Help').addClass('invisible');
        }
    });

    // Champ du libelle ne doit contenir des chiffres



    // liste des id du formulaires ajouter
    var ids = ["civilite", "type", "nom_prenom", "type_piece", "numero_piece", "telephone", "email", "adresse", ]

    ids.forEach(function(id) {
        clearValidation(id);
    });

    // Champ de la quantite ne doit contenir des letters
    $('#quantite, #quantite_modif').on('keyup', function() {
        var selectedId = $(this).attr('id');
        var quantite = $(this).val();
        if ($.isNumeric(quantite) === false) {
            formValide = false;
            $('#' + selectedId).addClass('is-invalid');
            $('#' + selectedId + 'Help').html('quantité incorrecte');
            $('#' + selectedId + 'Help').removeClass('invisible');
            $('#' + selectedId).val('')
            e.preventDefault()
        } else {
            formValide = true;
            $('#' + selectedId).removeClass('is-invalid');
            $('#' + selectedId + 'Help').html('');
            $('#' + selectedId + 'Help').addClass('invisible');
        }
    });

    // Champ de la taux_vente ne doit contenir des letters
    $('#taux_vente, #taux_vente_modif').on('keyup', function() {
        var selectedId = $(this).attr('id');
        var taux = $(this).val();
        if ($.isNumeric(taux) === false) {
            formValide = false;
            $('#' + selectedId).addClass('is-invalid');
            $('#' + selectedId + 'Help').html('taux incorrecte');
            $('#' + selectedId + 'Help').removeClass('invisible');
            $('#' + selectedId).val('')
            e.preventDefault()
        } else {
            formValide = true;
            $('#' + selectedId).removeClass('is-invalid');
            $('#' + selectedId + 'Help').html('');
            $('#' + selectedId + 'Help').addClass('invisible');
        }
    });

    // Champ de la taux_vente ne doit contenir des letters
    $('#remise, #remise_modif').on('keyup', function() {
        var selectedId = $(this).attr('id');
        var remise = $(this).val();
        if ($.isNumeric(taux) === false) {
            formValide = false;
            $('#' + selectedId).addClass('is-invalid');
            $('#' + selectedId + 'Help').html('taux incorrecte');
            $('#' + selectedId + 'Help').removeClass('invisible');
            $('#' + selectedId).val('')
            e.preventDefault()
        } else {
            formValide = true;
            $('#' + selectedId).removeClass('is-invalid');
            $('#' + selectedId + 'Help').html('');
            $('#' + selectedId + 'Help').addClass('invisible');
        }
    });

    function clearValidation(id) {
        $('#' + id).on('input', function() {
            $('#' + id).removeClass('is-invalid');
            $('#' + id + 'Help').html('');
        });
    }

    function checkIsEmpty(inputId) {
        let input = $('#' + inputId).val();
        if (input === '') {
            formValidate = false;
            $('#' + inputId).addClass('is-invalid');
            let message = 'Veuillez saisir le ' + inputId.replace(/_/g, ' ').replace(/_modif/g, ' ');
            $('#' + inputId + 'Help').html(message);
            $('#' + inputId + 'Help').removeClass('invisible');
            e.preventDefault();
        } else {
            formValidate = true;
            $('#' + inputId).removeClass('is-invalid');
            $('#' + inputId + 'Help').html('');
            $('#' + inputId + 'Help').addClass('invisible');
        }
    }

    //      Au click du boutton suivant
    $('#btn-suivant').on('click', function(e) {

        //cas de civilite
        var civilite = $('#civilite').val();
        if (civilite === 'Choisir...') {
            formValide = false;
            $('#civilite').addClass('is-invalid');
            $('#civiliteHelp').html('Veuillez choisir la civilité');
            $('#civiliteHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#civilite').removeClass('is-invalid');
            $('#civiliteHelp').html('');
            $('#civiliteHelp').addClass('invisible');
        }

        //cas du type de client
        var type = $('#type').val();
        if (type === 'Choisir...') {
            formValide = false;
            $('#type').addClass('is-invalid');
            $('#typeHelp').html('Veuillez choisir le type de client');
            $('#typeHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#type').removeClass('is-invalid');
            $('#typeHelp').html('');
            $('#typeHelp').addClass('invisible');
        }

        //cas du nom et prénom      
        checkIsEmpty("nom_prenom");

        //cas du type de pièce
        var type_piece = $('#type_piece').val();
        if (type_piece === 'Choisir...') {
            formValide = false;
            $('#type_piece').addClass('is-invalid');
            $('#type_pieceHelp').html('Veuillez choisir le type de pièce ');
            $('#type_pieceHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#type_piece').removeClass('is-invalid');
            $('#type_pieceHelp').html('');
            $('#type_pieceHelp').addClass('invisible');
        }

        //cas du numéro de pièce    
        checkIsEmpty("numero_piece");

        //cas du telephone  
        var telephone = $('#telephone').val();
        if (telephone === '' || validatePhone(telephone) === false) {
            formValide = false;
            $('#telephone').addClass('is-invalid');
            $('#telephoneHelp').html('Veillez saisir un contact valide');
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
        if (email === '' || isEmail(email) === false) {
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

        //cas de adresse    
        checkIsEmpty("adresse");











        // window.location.reload();


    });


    //      Au click du boutton enregistrer
    $('#bt_enregistrer').on('click', function() {

        //cas de devise
        var devise = $('#devise').val();
        if (devise === 'Choisir...') {
            formValide = false;
            $('#devise').addClass('is-invalid');
            $('#deviseHelp').html('Veuillez choisir la dévise');
            $('#deviseHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#devise').removeClass('is-invalid');
            $('#deviseHelp').html('');
            $('#deviseHelp').addClass('invisible');
        }

        //cas de - mode de réglement
        var mode_reglement = $('#mode_reglement').val();
        if (mode_reglement === 'Choisir...') {
            formValide = false;
            $('#mode_reglement').addClass('is-invalid');
            $('#mode_reglementHelp').html('Veuillez choisir le mode de réglement');
            $('#mode_reglementHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#mode_reglement').removeClass('is-invalid');
            $('#mode_reglementHelp').html('');
            $('#mode_reglementHelp').addClass('invisible');
        }

        //cas du nom et prénom      
        checkIsEmpty("quantite");

        //cas du type de pièce
        var type_piece = $('#type_piece').val();
        if (type_piece === 'Choisir...') {
            formValide = false;
            $('#type_piece').addClass('is-invalid');
            $('#type_pieceHelp').html('Veuillez choisir le type de pièce ');
            $('#type_pieceHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#type_piece').removeClass('is-invalid');
            $('#type_pieceHelp').html('');
            $('#type_pieceHelp').addClass('invisible');
        }

        if (formValide) {
            // Sérialiser les données des deux formulaires
            var formDataClient = $('#form_client').serialize();
            var formDataFacturation = $('#form_facturation').serialize();

            // Concaténer les données des deux formulaires
            var combinedFormData = formDataClient + '&' + formDataFacturation;

        
        }


    });


    // MODIFICATION D'UNE LIGNE

    // charger taux vente lorsqu'on choisi la devise
    handleDeviseChange('devise_modif', 'taux_vente_modif');

    // actualiser les montant en cas de changement
    handleQuantiteTauxRemiseChange("quantite_modif", "taux_vente_modif", "remise_modif", "total_brut_modif", "total_net_modif")


    var ids_modif = ["civilite_modif", "type_modif", "nom_prenom_modif", "type_piece_modif", "numero_piece_modif", "telephone_modif", "email_modif", "adresse_modif", ]

    ids_modif.forEach(function(id) {
        clearValidation(id);
    });



    //      Au click du boutton suivant
    $('#btn-suivant-modif').on('click', function(e) {

        //cas de civilite
        var civilite = $('#civilite_modif').val();
        if (civilite === 'Choisir...') {
            formValide = false;
            $('#civilite_modif').addClass('is-invalid');
            $('#civilite_modifHelp').html('Veuillez choisir la civilité');
            $('#civilite_modifHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#civilite_modif').removeClass('is-invalid');
            $('#civilite_modifHelp').html('');
            $('#civilite_modifHelp').addClass('invisible');
        }

        //cas du type de client
        var type = $('#type_modif').val();
        if (type === 'Choisir...') {
            formValide = false;
            $('#type_modif').addClass('is-invalid');
            $('#type_modifHelp').html('Veuillez choisir le type de client');
            $('#type_modifHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#type_modif').removeClass('is-invalid');
            $('#type_modifHelp').html('');
            $('#type_modifHelp').addClass('invisible');
        }

        //cas du nom et prénom      
        checkIsEmpty("nom_prenom_modif");

        //cas du type de pièce
        var type_piece = $('#type_piece_modif').val();
        if (type_piece === 'Choisir...') {
            formValide = false;
            $('#type_piece_modif').addClass('is-invalid');
            $('#type_piece_modifHelp').html('Veuillez choisir le type de pièce ');
            $('#type_piece_modifHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#type_piece_modif').removeClass('is-invalid');
            $('#type_piece_modifHelp').html('');
            $('#type_piece_modifHelp').addClass('invisible');
        }

        //cas du numéro de pièce    
        checkIsEmpty("numero_piece_modif");

        //cas du telephone  
        var telephone = $('#telephone_modif').val();
        if (telephone === '' || validatePhone(telephone) === false) {
            formValide = false;
            $('#telephone_modif').addClass('is-invalid');
            $('#telephone_modifHelp').html('Veillez saisir un contact valide');
            $('#telephone_modifHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#telephone_modif').removeClass('is-invalid');
            $('#telephon_modifeHelp').html('');
            $('#telephone_modifHelp').addClass('invisible');
        }

        // Cas de - Email
        var email = $('#email_modif').val();
        if (email === '' || isEmail(email) === false) {
            formValide = false;
            $('#email_modif').addClass('is-invalid');
            $('#email_modifHelp').html('Veillez saisir un email valide');
            $('#email_modifHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#email_modif').removeClass('is-invalid');
            $('#email_modifHelp').html('');
            $('#email_modifHelp').addClass('invisible');
        }

        //cas de adresse    
        checkIsEmpty("adresse_modif");
    });


    //      Au click du boutton modifier
    $('#bt_modifier').on('click', function() {

        //cas de devise
        var devise = $('#devise_modif').val();
        if (devise === 'Choisir...') {
            formValide = false;
            $('#devise_modif').addClass('is-invalid');
            $('#devise_modifHelp').html('Veuillez choisir la dévise');
            $('#devise_modifHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#devise_modif').removeClass('is-invalid');
            $('#devise_modifHelp').html('');
            $('#devise_modifHelp').addClass('invisible');
        }

        //cas de - mode de réglement
        var mode_reglement = $('#mode_reglement_modif').val();
        if (mode_reglement === 'Choisir...') {
            formValide = false;
            $('#mode_reglement_modif').addClass('is-invalid');
            $('#mode_reglement_modifHelp').html('Veuillez choisir le mode de réglement');
            $('#mode_reglement_modifHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#mode_reglement_modif').removeClass('is-invalid');
            $('#mode_reglement_modifHelp').html('');
            $('#mode_reglemen_modiftHelp').addClass('invisible');
        }

        //cas du nom et prénom      
        checkIsEmpty("quantite_modif");

        //cas du type de pièce
        var type_piece = $('#type_piece_modif').val();
        if (type_piece === 'Choisir...') {
            formValide = false;
            $('#type_piece_modif').addClass('is-invalid');
            $('#type_piece_modifHelp').html('Veuillez choisir le type de pièce ');
            $('#type_piece_modifHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#type_piece_modif').removeClass('is-invalid');
            $('#type_piece_modifHelp').html('');
            $('#type_piece_modifHelp').addClass('invisible');
        }

        if (formValide) {
            // Sérialiser les données des deux formulaires
            var formDataClient = $('#form_client_modif').serialize();
            var formDataFacturation = $('#form_facturation_modif').serialize();

            // Concaténer les données des deux formulaires
            var combinedFormData = formDataClient + '&' + formDataFacturation;


            $.ajax({
                type: 'POST',
                data: combinedFormData + "&bt_modifier=" + true,
                url: 'controllers/vente_devises_controller.php',
                success: function(result) {
                    var donnee = JSON.parse(result);

                    if (donnee['success'] === 'true') {
                        initializeFlash();
                        $('.flash').addClass('alert-success');
                        $('.flash').html('<i class="fas fa-check"></i> ' + donnee['message'])
                            .fadeIn(300).delay(2500).fadeOut(300);
                        swal_Alert_Sucess(donnee['message']);
                        $('.modal').modal('hide')

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