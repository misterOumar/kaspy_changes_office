<script>
// DROITS D'ACCES CONTRATS DE BAIL
$(function () {
  
  // alert('dd');

  $.ajax({
        type: "GET",
        data: "DroitAccess='0'",  //Envois de l'attribu GET de la requette
        url: "controllers/role_permission_controller.php",
        success: function(result) {
          var donnees = JSON.parse(result);
          if (donnees['DroisAcces_ActifUser'] !== 'null') {
            let droits_access = donnees['DroisAcces_ActifUser']

            // alert(droits_access[0]['creation'])
            // -------------------PROPRIETAIRE-------------------------------------------------
            //Creation
            if(parseInt(droits_access[3]['creation'], 10) == 0) {
              $("#bt_ajouter").addClass("hidden");  
            }else{
              $("#bt_ajouter").removeClass("hidden");
            }

                    // Modification
             if(parseInt(droits_access[3]['modification'], 10) == 0) {
              $(".item-edit").addClass("hidden");
            }else{
              $(".item-edit").removeClass("hidden");
            }

            //  //        suppression
             if(parseInt(droits_access[3]['suppression'], 10) == 0) {
              $(".delete-record").addClass("hidden");
            }else{
              $(".delete-record").removeClass("hidden");
            }

            //  //        Duplicata
            //  if(intval(droits_access[3]['duplicata']) === 0) {
            //   $("#bt_ajouter").addClass("hidden");
            // }else{
            //   $("#bt_ajouter").removeClass("hidden");
            // }

            //  //        Visualisation
            //  if(intval(droits_access[3]['visualisation']) === 0) {
            //   $("#bt_ajouter").addClass("hidden");
            // }else{
            //   $("#bt_ajouter").removeClass("hidden");
            // }

            //  //        Exportation
             if(parseInt(droits_access[3]['exportation'], 10) == 0) {
              $(".export").addClass("hidden");
            }else{
              $(".export").removeClass("hidden");
            }

          }
        }
      })
    });
  
 


</script>


