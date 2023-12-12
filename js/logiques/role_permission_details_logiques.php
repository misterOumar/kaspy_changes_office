<?php include("views/components/alerts.php") ?>


<script>
    // MES LOGIQUES
    //  Vider les champs
    function vider_les_champs() {

        // role_permission
        $('#role_permission').val('Choisir le role...');
        $('#role_permission').removeClass('is-invalid');
        $('#role_permissionHelp').html('');
        $('#role_permissionHelp').addClass('invisible');
        
        // fonction
        $('#fonction').val('');
        $('#fonction').removeClass('is-invalid');
        $('#fonctionHelp').html('');
        $('#fonctionHelp').addClass('invisible');

        $('#lecture').val('non');
        $('#lecture').removeClass('is-invalid');
        $('#lectureHelp').html('');
        $('#lectureHelp').addClass('invisible');

        $('#creation').val('non');
        $('#creation').removeClass('is-invalid');
        $('#creationHelp').html('');
        $('#creationHelp').addClass('invisible');

        $('#modification').val('non');
        $('#modification').removeClass('is-invalid');
        $('#modificationHelp').html('');
        $('#modificationHelp').addClass('invisible');

        $('#suppression').val('non');
        $('#suppression').removeClass('is-invalid');
        $('#suppressionHelp').html('');
        $('#suppressionHelp').addClass('invisible');

        $('#duplicata').val('non');
        $('#duplicata').removeClass('is-invalid');
        $('#duplicataHelp').html('');
        $('#duplicataHelp').addClass('invisible');

        $('#visualisation').val('non');
        $('#visualisation').removeClass('is-invalid');
        $('#visualisationHelp').html('');
        $('#visualisationHelp').addClass('invisible');

        $('#exportation').val('non');
        $('#exportation').removeClass('is-invalid');
        $('#exportationHelp').html('');
        $('#exportationHelp').addClass('invisible');


        $('#fonction').focus();
    }

    $('#bt_vider').on('click', function() {
        vider_les_champs()
    });





    // VERIFICATIONS DU FORMULAIRE 
    // var formValide = false;

    //      Les événements en déhors du click du boutton de validation
    // $('#role_permission').on('change', function() {
    //     $('#role_permission').removeClass('is-invalid');
    //     $('#role_permissionHelp').html('');
    // });
    // $('#fonction').on('keydown', function() {
    //     $('#fonction').removeClass('is-invalid');
    //     $('#fonctionHelp').html('');
    // });
    

    //Au click du boutton
    // $('#bt_enregistrer').on('click', function() {

    //     // Cas de - Type du role_permission
    //     // let role_permission = $('#role_permission').val();
    //     // if (role_permission === 'Choisir le role...') {
    //     //     formValide = false;
    //     //     $('#role_permission').addClass('is-invalid');
    //     //     $('#role_permissionHelp').html('Veuillez choisir le roles.');
    //     //     $('#role_permissionHelp').removeClass('invisible');
    //     //     e.preventDefault()
    //     // } else {
    //     //     formValide = true;
    //     //     $('#role_permission').removeClass('is-invalid');
    //     //     $('#role_permissionHelp').html('');
    //     //     $('#role_permissionHelp').addClass('invisible');
    //     // }

    //             // Cas de - libelle
    //     // var fonction = $('#fonction').val();
    //     // if (fonction === '') {
    //     //     formValide = false;
    //     //     $('#fonction').addClass('is-invalid');
    //     //     $('#fonctionHelp').html('Veuillez saisir la fonction');
    //     //     $('#fonctionHelp').removeClass('invisible');
    //     //     e.preventDefault()
    //     // } else {
    //     //     formValide = true;
    //     //     $('#fonction').removeClass('is-invalid');
    //     //     $('#fonctionHelp').html('');
    //     //     $('#fonctionHelp').addClass('invisible');
    //     // }
        
    // });




    // VERIFICATIONS DU FORMULAIRE 
    var formValide = false;

    //      Les événements en déhors du click du boutton de validation
    // $('#role_permission_modif').on('change', function() {
    //     $('#role_permission_modif').removeClass('is-invalid');
    //     $('#role_permission_modifHelp').html('');
    // });
    // $('#fonction_modif').on('keydown', function() {
    //     $('#fonction_modif').removeClass('is-invalid');
    //     $('#fonction_modifHelp').html('');
    // });


    // Propriété d'un role permission details
    // MODIFIER UN ELEMENT


    //      Au click du boutton modifier
    // $('#bt_modifier').on('click', function() {

    //     var submitUpdate = true;

    //             // Cas de - Type du bâtiment
    //     let role_permission = $('#role_permission_modif').val();
    //     if (role_permission === 'Choisir le role...') {
    //         submitUpdate = false;
    //         $('#role_permission_modif').addClass('is-invalid');
    //         $('#role_permission_modifHelp').html('Veuillez choisir le role...');
    //         $('#role_permission_modifHelp').removeClass('invisible');
    //         e.preventDefault()
    //     } else {
    //         submitUpdate = true;
    //         $('#role_permission_modif').removeClass('is-invalid');
    //         $('#role_permission_modifHelp').html('');
    //         $('#role_permission_modifHelp').addClass('invisible');
    //     }

        // Cas de - libelle
    //     var fonction = $('#fonction_modif').val();
    //     if (fonction === '') {
    //         submitUpdate = false;
    //         $('#fonction_modif').addClass('is-invalid');
    //         $('#fonction_modifHelp').html('Veuillez saisir le libellé du bâtiment');
    //         $('#fonction_modifHelp').removeClass('invisible');
    //         e.preventDefault()
    //     } else {
    //         submitUpdate = true;
    //         $('#fonction_modif').removeClass('is-invalid');
    //         $('#fonction_modifHelp').html('');
    //         $('#fonction_modifHelp').addClass('invisible');
    //     }

    //     if (submitUpdate === true) {

    //         initializeFlash();
    //         $('.flash').addClass('alert-info');
    //         $('.flash').html('<i class="fas fa-cog fa-spin"></i> Modification...').fadeIn(300);

    //         var form = $('#form_modif');
    //         var method = form.prop('method');
    //         var url = form.prop('action');

    //         $.ajax({
    //             type: method,
    //             data: form.serialize() + "&bt_modifier=" + true,
    //             url: url,
    //             success: function(result) {
    //                 donnee = JSON.parse(result);
    //                 if (donnee['success'] === 'existe') {
    //                     $('#libelle_modif').addClass('is-invalid');
    //                     $('#libelle_modifHelp').html(donnee['message']);
    //                     $('#libelle_modifHelp').removeClass('invisible');

    //                     initializeFlash();
    //                     $('.flash').addClass('alert-info');
    //                     $('.flash').html('<i class="fas fa-exclamation-circle"></i> ' + donnee['message'])
    //                         .fadeIn(300).delay(2500).fadeOut(300);
    //                 }
    //                 if (donnee['success'] === 'true') {



    //                     initializeFlash();
    //                     $('.flash').addClass('alert-success');
    //                     $('.flash').html('<i class="fas fa-check"></i> ' + donnee['message'])
    //                         .fadeIn(300).delay(2500).fadeOut(300);
    //                     swal_Alert_Sucess(donnee['message'])
    //                     $('.modal').modal('hide');

    //                     window.location.reload();


    //                 }
    //                 if (donnee['success'] === 'non') {
    //                     initializeFlash();
    //                     $('.flash').addClass('alert-danger');
    //                     $('.flash').html('<i class="fas fa-exclamation-circle"></i> ' + donnee['message'])
    //                         .fadeIn(300).delay(2500).fadeOut(300);
    //                 }
    //                 if (donnee['success'] === 'false') {


    //                     initializeFlash();
    //                     $('.flash').addClass('alert-danger');
    //                     $('.flash').html('<i class="fas fa-exclamation-circle"></i> Vérifiez les champs')
    //                         .fadeIn(300).delay(2500).fadeOut(300);
    //                 }
    //             }
    //         });
    //     }

    // });


    // Recuperer les informations du role permission details et remplir le formulaire
    var that
    $('.datatables-basic tbody').on('click', '.item-edit', function() {
        that = this

        $.ajax({
            type: "GET",
            data: "idProprietes=" + (dt_basic.row($(that).parents('tr')).data().id), //Envois de l'id selectionné
            url: "controllers/role_permission_details_controller.php",
            success: function(result) {
                var donnees = JSON.parse(result);
                if (donnees['proprietes_role_permission_details'] != 'null') {


                    // Remplir le formulaire
                    let role_permission_details = donnees['proprietes_role_permission_details'];
                    $('#role_permission_modif').val(role_permission_details['role_permission']);
                    $('#fonction_modif').val(role_permission_details['fonction']);
                  

                    if (role_permission_details['lecture'] == 1) {
                        $("#lecture_modif").prop('checked', true) // Desactiver input

                    }

                    if (role_permission_details['creation'] == 1) {
                        $("#creation_modif").prop('checked', true) // Desactiver input

                    }

                    if (role_permission_details['modification'] == 1) {
                        $("#modification_modif").prop('checked', true) // Desactiver input

                    }

                    if (role_permission_details['suppression'] == 1) {
                        $("#suppression_modif").prop('checked', true) // Desactiver input

                    }

                    if (role_permission_details['duplicata'] == 1) {
                        $("#duplicata_modif").prop('checked', true) // Desactiver input

                    }

                    if (role_permission_details['visualisation'] == 1) {
                        $("#visualisation_modif").prop('checked', true) // Desactiver input

                    }

                    if (role_permission_details['exportation'] == 1) {
                        $("#exportation_modif").prop('checked', true) // Desactiver input

                    }

                }
            }
        })
    });
</script>