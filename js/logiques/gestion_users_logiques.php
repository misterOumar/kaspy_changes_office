<link rel="stylesheet" type="text/css" href="css/plugins/extensions/ext-component-sweet-alerts.css">
<link rel="stylesheet" type="text/css" href="css/plugins/animate/animate.min.css">
<link rel="stylesheet" type="text/css" href="css/plugins/extensions/sweetalert2.min.css">

<script>
  //--------------- Confirm Options SWEET ALERT ---------------
  $('.link-delete-button').on('click', function () {
    var that = this;

//     // POPUP de validation de suppression
//     Swal.fire({
//         title: 'Voulez vous vraiment supprimer ?',
//         text: '< ' + $(that).attr('name') + ' > sera supprimé définitivement',
//         icon: 'warning',
//         showCancelButton: true,
//         confirmButtonText: 'Oui, Supprimer !',
//         cancelButtonText: 'Annuler',
//         customClass: {
//             confirmButton: 'btn btn-primary',
//             cancelButton: 'btn btn-outline-danger ms-1'
//         },
//         buttonsStyling: false
//     }).then(function (result) {
//         if (result.value) {
//             // Utilisez `that` au lieu de `$(this)`
//             Swal.fire({
//                 icon: 'success',
//                 title: 'Suppression effectuée !',
//                 text: "'" + ($(that).attr('name')) + "' a été supprimée avec succès.",
//                 customClass: {
//                     confirmButton: 'btn btn-success'
//                 }
//             });

//             // Suppression Back
//             $.ajax({
//                 type: "GET",
//                 data: "idSupprim=" + (dt_basic.row($(that).parents('tr')).data().id), // Envoi de l'id sélectionné
//                 url: "controllers/gestions_users_controller.php",
//                 success: function (result) {
//                     var donnee = JSON.parse(result);
//                     if (donnee['success'] === 'true') {
//                         dt_basic.row($(that).parents('tr')).remove().draw(); // Suppression de la ligne sélectionnée
//                     } else if (donnee['success'] === 'false') {
//                         initializeFlash();
//                         $('.flash').addClass('alert-danger');
//                         $('.flash').html('<i class="fas fa-exclamation-circle"></i> ' + donnee['message'])
//                             .fadeIn(300).delay(2500).fadeOut(300);
//                     } else {
//                         initializeFlash();
//                         $('.flash').addClass('alert-danger');
//                         $('.flash').html('<i class="fas fa-exclamation-circle"></i> Erreur inconnue')
//                             .fadeIn(300).delay(2500).fadeOut(300);
//                     }
//                 }
//             });
//         }
//     });
// });

  
            //--------------- Confirm Options SWEET ALERT --------------
    var that = this;
    var userId = $(that).attr('id'); // Récupère l'ID de l'utilisateur

    // POPUP de validation de suppression
    Swal.fire({
        title: 'Voulez-vous vraiment supprimer ?',
        text: '< ' + $(that).attr('name') + ' > sera supprimé définitivement',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Oui, Supprimer !',
        cancelButtonText: 'Annuler',
        customClass: {
            confirmButton: 'btn btn-primary',
            cancelButton: 'btn btn-outline-danger ms-1'
        },
        buttonsStyling: false,
    }).then(function (result) {
        if (result.value) {
            // Utilisez userId au lieu de $(that).attr('id')
            Swal.fire({
                icon: 'success',
                title: 'Suppression effectuée !',
                text: "'" + ($(that).attr('name')) + "' a été supprimée avec succès.",
                customClass: {
                    confirmButton: 'btn btn-success'
                }
            });
        }
    });

    $('.swal2-confirm').on('click', function () {
        // Utilisez userId au lieu de $(that).attr('id') pour récupérer l'ID
        $.ajax({
            type: "GET",
            data: "idSupprim=" + userId, // Envoi de l'ID sélectionné
            url: "controllers/gestion_users_controller.php",
            success: function (result) {
                var donnee = JSON.parse(result);
                if (donnee['success'] === 'true') {
                    dt_basic.row($(that).parents('tr')).remove().draw(); // Suppression de la ligne sélectionnée
                } else if (donnee['success'] === 'false') {
                    initializeFlash();
                    $('.flash').addClass('alert-danger');
                    $('.flash').html('<i class="fas fa-exclamation-circle"></i> ' + donnee['message'])
                        .fadeIn(300).delay(2500).fadeOut(300);
                } else {
                    initializeFlash();
                    $('.flash').addClass('alert-danger');
                    $('.flash').html('<i class="fas fa-exclamation-circle"></i> Erreur inconnue')
                        .fadeIn(300).delay(2500).fadeOut(300);
                }
            }
        });
    });
});

        


 

  // MODIFICATION DU TYPE DE COMPTE

  $('.modif_type_compte').on('click', function() {
    var that = this
    $('#bt_enregistrer').on('click', function() {
      var type_compte = $('#type_compte').val()
      if (type_compte === 'Choisir un type de compte...') {
        Swal.fire({
          icon: 'warning',
          title: 'Erreur',
          text: "Veuillez choisir le type de compte",
          customClass: {
            confirmButton: 'btn btn-warning'
          }
        });

      } else {

        //modification Back
        location.href = "index.php?page=gestion_users&type_compte=" + type_compte + "&id_modif_type_compte=" + ($(that).attr('id'));
      }
    })
  });


    //--------------- Confirm Options SWEET ALERT ---------------
    $('.disconnect').on('click', function() {
    var that = this
    // POPUP de validation de deconnexion d'un utilisateur
    Swal.fire({
      title: 'Voulez vous vraiment deconnecter cet utilisateur ?',
      text: '< ' + $(this).attr('name') + ' > sera deconnecté(e)',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Oui, deconnecter !',
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
          title: 'Deconnexion effectué éffectuée !',
          text: "' " + ($(this).attr('name')) + " ' a été deconnecté avec succès.",
          customClass: {
            confirmButton: 'btn btn-success'
          }
        });
      }
    });
    $('.swal2-confirm').on('click', function() {

      //Deconnexion Back
      location.href = "index.php?page=gestion_users&idDisconnect=" + ($(that).attr('id'));

    });
  });
</script>


<script src="js/template/extensions/ext-component-sweet-alerts.js"></script>
<script src="js/template/extensions/sweetalert2.all.min.js"></script>
<script src="js/template/extensions/extensions/polyfill.min.js"></script>