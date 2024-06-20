<?php include("views/components/alerts.php") ?>


<script>
    // MES LOGIQUES

    //  Vider les champs
    $('#bt_vider').on('click', function() {
        $('#form_ajouter').trigger("reset");
    });



    // Charger la liste des pays
    fetch('config/pays.json')
        .then(response => response.json())
        .then(data => {
            // Sélectionner l'élément de menu déroulant
            const pays = document.getElementById('pays');
            const pays_modif = document.getElementById('pays_modif');

            // Parcourir les données JSON et ajouter chaque pays comme une option
            for (const code in data) {
                const nom = data[code];
                const option = document.createElement('option');
                option.value = nom;
                option.textContent = nom;
                pays.appendChild(option);

            }

            // Parcourir les données JSON et ajouter chaque pays comme une option
            for (const code in data) {
                const nom = data[code];
                const option = document.createElement('option');
                option.value = nom;
                option.textContent = nom;
                pays_modif.appendChild(option);

            }
        })
        .catch(error => console.error('Erreur lors du chargement des pays:', error));




    // VERIFICATIONS DU FORMULAIRE 
    var formValide = false;

    //      Les événements en déhors du click du boutton de validation

    // Liste des identifiants des éléments à surveiller
    var ids = ['libelle', 'symbole', "type", "pays", 'taux_achat', 'taux_vente', "devise", "mode_reglement"];

    // Parcours de la liste des identifiants et application de la fonction clearValidation à chacun
    ids.forEach(function(id) {
        clearValidation(id);
    });


    function clearValidation(id) {
        $('#' + id).on('input', function() {
            $('#' + id).removeClass('is-invalid');
            $('#' + id + 'Help').html('');
        });
    }



    // Champ de la taux_achat ne doit contenir des letters
    $('#taux_achat').on('keyup', function() {
        var taux = $('#taux_achat').val();
        if ($.isNumeric(taux) === false) {
            formValide = false;
            $('#taux_achat').addClass('is-invalid');
            $('#taux_achatHelp').html('taux incorrecte');
            $('#taux_achatHelp').removeClass('invisible');
            $('#taux_achat').val('')
            e.preventDefault()
        } else {
            formValide = true;
            $('#taux_achat').removeClass('is-invalid');
            $('#taux_achatHelp').html('');
            $('#taux_achatHelp').addClass('invisible');
        }
    });

    $('#taux_vente').on('keyup', function() {
        var taux = $('#taux_vente').val();
        if ($.isNumeric(taux) === false) {
            formValide = false;
            $('#taux_vente').addClass('is-invalid');
            $('#taux_venteHelp').html('taux incorrecte');
            $('#taux_venteHelp').removeClass('invisible');
            $('#taux_vente').val('')
            e.preventDefault()
        } else {
            formValide = true;
            $('#taux_vente').removeClass('is-invalid');
            $('#taux_venteHelp').html('');
            $('#taux_venteHelp').addClass('invisible');
        }
    });



    //      Au click du boutton
    $('#bt_enregistrer').on('click', function() {

        //cas du libelle

        ids.forEach(function(input) {
            checkIsEmpty(input);
        });


        // Cas de - type
        var type = $('#type').val();
        if (type === 'Choisir...') {
            formValide = false;
            $('#type').addClass('is-invalid');
            $('#typeHelp').html('Veuillez choisir le type');
            $('#typeHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#type').removeClass('is-invalid');
            $('#typeHelp').html('');
            $('#typeHelp').addClass('invisible');
        }

        // Cas de - pays
        var pays = $('#pays').val();
        if (pays === 'Choisir...') {
            formValide = false;
            $('#pays').addClass('is-invalid');
            $('#paysHelp').html('Veuillez choisir le pays');
            $('#paysHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#pays').removeClass('is-invalid');
            $('#paysHelp').html('');
            $('#paysHelp').addClass('invisible');
        }





    });

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






    // MODIFICATION
    //      Les événements en déhors du click du boutton de validation
    var ids_modif = ['libelle_modif', 'symbole_modif', "type_modif", "pays_modif", 'taux_achat_modif', 'taux_vente_modif'];

    // Parcours de la liste des identifiants et application de la fonction clearValidation à chacun
    ids_modif.forEach(function(id) {
        clearValidation(id);
    });

      // Champ de la taux_achat ne doit contenir des letters
      $('#taux_achat_modif').on('keyup', function() {
        var taux = $('#taux_achat_modif').val();
        if ($.isNumeric(taux) === false) {
            formValide = false;
            $('#taux_achat_modif').addClass('is-invalid');
            $('#taux_achat_modifHelp').html('taux incorrecte');
            $('#taux_achat_modifHelp').removeClass('invisible');
            $('#taux_achat_modif').val('')
            e.preventDefault()
        } else {
            formValide = true;
            $('#taux_achat_modif').removeClass('is-invalid');
            $('#taux_achat_modifHelp').html('');
            $('#taux_achat_modifHelp').addClass('invisible');
        }
    });

    $('#taux_vente_modif').on('keyup', function() {
        var taux = $('#taux_vente_modif').val();
        if ($.isNumeric(taux) === false) {
            formValide = false;
            $('#taux_vente_modif').addClass('is-invalid');
            $('#taux_vente_modifHelp').html('taux incorrecte');
            $('#taux_vente_modifHelp').removeClass('invisible');
            $('#taux_vente_modif').val('')
            e.preventDefault()
        } else {
            formValide = true;
            $('#taux_vente_modif').removeClass('is-invalid');
            $('#taux_vente_modifHelp').html('');
            $('#taux_vente_modifHelp').addClass('invisible');
        }
    });


    //      Au click du boutton
    $('#bt_modifier').on('click', function(e) {
        // Cas de - libelle
        ids_modif.forEach(function(input) {
            checkIsEmpty(input);
        });

       
  // Cas de - type
  var type = $('#type_modif').val();
        if (type === 'Choisir...') {
            formValide = false;
            $('#type_modif').addClass('is-invalid');
            $('#type_modifHelp').html('Veuillez choisir le type');
            $('#type_modifHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#type_modif').removeClass('is-invalid');
            $('#type_modifHelp').html('');
            $('#type_modifHelp').addClass('invisible');
        }


        // Cas de - pays
        var pays = $('#pays_modif').val();
        if (pays === 'Choisir...') {
            formValide = false;
            $('#pays_modif').addClass('is-invalid');
            $('#pays_modifHelp').html('Veuillez choisir le pays');
            $('#pays_modifHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#pays_modif').removeClass('is-invalid');
            $('#pays_modifHelp').html('');
            $('#pays_modifHelp').addClass('invisible');
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
                        $('#libelle_modif').addClass('is-invalid');
                        $('#libelle_modifHelp').html(donnee['message']);
                        $('#libelle_modifHelp').removeClass('invisible');

                        initializeFlash();
                        $('.flash').addClass('alert-info');
                        $('.flash').html('<i class="fas fa-exclamation-circle"></i> ' + donnee['message'])
                            .fadeIn(300).delay(2500).fadeOut(300);
                    }

                    if (donnee['success'] === 'existe_devise_type_locale') {
                        $('#type_modif').addClass('is-invalid');
                        $('#type_modifHelp').html(donnee['message']);
                        $('#type_modifHelp').removeClass('invisible');

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