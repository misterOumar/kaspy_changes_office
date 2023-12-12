<?php include ("views/components/alerts.php") ?>

<script>
  // MES LOGIQUES
  //  Vider les champs
  function vider_les_champs() {
    // Annees
    $('#annees').val('');
    $('#annees').removeClass('is-invalid');
    $('#anneesHelp').html('');
    $('#anneesHelp').addClass('invisible');
    // Date debut
    $('#date_debut').val('');
    $('#date_debut').removeClass('is-invalid');
    $('#date_debutHelp').html('');
    $('#date_debutHelp').addClass('invisible');
    // Date Fin
    $('#date_fin').val('');
    $('#date_fin').removeClass('is-invalid');
    $('#date_finHelp').html('');
    $('#date_finHelp').addClass('invisible');


    $('#annees').focus();
  }

  $('#bt_vider').on('click', function() {
    vider_les_champs()
  });


  // VERIFICATIONS DU FORMULAIRE 
  var formValide = false;

  //      Les événements en déhors du click du boutton de validation
  $('#annees').on('keydown', function() {
    $('#annees').removeClass('is-invalid');
    $('#anneesHelp').html('');
    $('#anneesHelp').addClass('invisible');
  });
  $('#date_debut').on('click', function() {
    $('#date_debut').removeClass('is-invalid');
    $('#date_debutHelp').html('');
    $('#date_debutHelp').addClass('invisible');
  });
  $('#date_fin').on('click', function() {
    $('#date_fin').removeClass('is-invalid');
    $('#date_finHelp').html('');
    $('#date_finHelp').addClass('invisible');
  });

  //      Au click du boutton
  $('#bt_enregistrer').on('click', function() {
    // Cas de - Nom
    var annees = $('#annees').val();
    if (annees === '') {
      formValide = false;
      $('#annees').addClass('is-invalid');
      $('#anneesHelp').html("Veuillez saisir l'année de gestion");
      $('#anneesHelp').removeClass('invisible');
      e.preventDefault()
    } else {
      formValide = true;
      $('#annees').removeClass('is-invalid');
      $('#anneesHelp').html('');
      $('#anneesHelp').addClass('invisible');
    }


    // Cas de - DAte debut
    var date_debut = $('#date_debut').val();
    if (date_debut === '') {
      formValide = false;
      $('#date_debut').addClass('is-invalid');
      $('#date_debutHelp').html('Veuillez saisir la date du debut.');
      $('#date_debutHelp').removeClass('invisible');
      e.preventDefault()
    } else {
      formValide = true;
      $('#date_debut').removeClass('is-invalid');
      $('#date_debutHelp').html('');
      $('#date_debutHelp').addClass('invisible');
    }
    // Cas de - DAte Fin
    var date_fin = $('#date_fin').val();
    if (date_fin === '') {
      formValide = false;
      $('#date_fin').addClass('is-invalid');
      $('#date_finHelp').html('Veuillez saisir la date de fin.');
      $('#date_finHelp').removeClass('invisible');
      e.preventDefault()
    } else {
      formValide = true;
      $('#date_fin').removeClass('is-invalid');
      $('#date_finHelp').html('');
      $('#date_finHelp').addClass('invisible');
    }
  });


  // VERIFICATIONS DU FORMULAIRE POUR LA MODIFICATION
  var submitUpdate = false;

  //      Les événements en déhors du click du boutton de validation
  $('#annees_modif').on('keydown', function() {
    $('#annees_modif').removeClass('is-invalid');
    $('#annees_modifHelp').html('');
    $('#annees_modifHelp').addClass('invisible');
  });
  $('#date_debut_modif').on('click', function() {
    $('#date_debut_modif').removeClass('is-invalid');
    $('#date_debut_modifHelp').html('');
    $('#date_debut_modifHelp').addClass('invisible');
  });
  $('#date_fin_modif').on('click', function() {
    $('#date_fin_modif').removeClass('is-invalid');
    $('#date_fin_modifHelp').html('');
    $('#date_fin_modifHelp').addClass('invisible');
  });

  //      Au click du boutton
  $('#bt_modifier').on('click', function(e) {
    // Cas de - Nom
    var annees = $('#annees_modif').val();
    if (annees === '') {
      submitUpdate = false;
      $('#annees_modif').addClass('is-invalid');
      $('#annees_modifHelp').html("Veuillez saisir l'année de gestion");
      $('#annees_modifHelp').removeClass('invisible');
      e.preventDefault()
    } else {
      submitUpdate = true;
      $('#annees_modif').removeClass('is-invalid');
      $('#annees_modifHelp').html('');
      $('#annees_modifHelp').addClass('invisible');
    }


    // Cas de - DAte debut
    var date_debut = $('#date_debut_modif').val();
    if (date_debut === '') {
      submitUpdate = false;
      $('#date_debut_modif').addClass('is-invalid');
      $('#date_debut_modifHelp').html('Veuillez saisir la date du debut.');
      $('#date_debut_modifHelp').removeClass('invisible');
      e.preventDefault()
    } else {
      submitUpdate = true;
      $('#date_debut_modif').removeClass('is-invalid');
      $('#date_debut_modifHelp').html('');
      $('#date_debut_modifHelp').addClass('invisible');
    }
    // Cas de - DAte Fin
    var date_fin = $('#date_fin_modif').val();
    if (date_fin === '') {
      submitUpdate = false;
      $('#date_fin_modif').addClass('is-invalid');
      $('#date_fin_modifHelp').html('Veuillez saisir la date de fin.');
      $('#date_fin_modifHelp').removeClass('invisible');
      e.preventDefault()
    } else {
      submitUpdate = true;
      $('#date_fin_modif').removeClass('is-invalid');
      $('#date_fin_modifHelp').html('');
      $('#date_fin_modifHelp').addClass('invisible');
    }

    
    if (submitUpdate) {
            e.preventDefault();

            // initializeFlash();
            // $('.flash').addClass('alert-info');
            // $('.flash').html('<i class="fas fa-cog fa-spin"></i> Modification...').fadeIn(300);

            var form = $('#form_modif');
            var method = form.prop('method');
            var url = form.prop('action');

            $.ajax({
                type: method,
                data: form.serialize() + "&bt_modifier=" + true,
                url: url,
                success: function(result) {
                    donnee = JSON.parse(result);
                    // if (donnee['success'] === 'existe') {
                    //     $('#libelle_modif').addClass('is-invalid');
                    //     $('#libelle_modifHelp').html(donnee['message']);
                    //     $('#libelle_modifHelp').removeClass('invisible');

                    //     initializeFlash();
                    //     $('.flash').addClass('alert-info');
                    //     $('.flash').html('<i class="fas fa-exclamation-circle"></i> ' + donnee['message'])
                    //         .fadeIn(300).delay(2500).fadeOut(300);
                    // }
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




  //      Au click du boutton
  formValideInteroger = false;
  $('#bt_interoger_locataire').on('click', function(e) {
    var locataire = $('#locataire').val();
    if (locataire == 'Choisir le locataire...') {
      formValideInteroger = false;
      $('#locataire').addClass('is-invalid');
      $('#locataireHelp').html("Veuillez choisir le locataire");
      $('#locataireHelp').removeClass('invisible');
      e.preventDefault();
    } else {
      formValideInteroger = true;
      $('#locataire').removeClass('is-invalid');
      $('#locataireHelp').html('');
      $('#locataireHelp').addClass('invisible');
    }

  });

</script>