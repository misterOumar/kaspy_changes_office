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
            // -------------------TYPE PIECE-------------------------------------------------
            //Creation
            if(parseInt(droits_access[13]['creation'], 10) == 0) {
              $(".addRole").addClass("hidden");  
            }else{
              $(".addRole").removeClass("hidden");
            }

                    // Modification
             if(parseInt(droits_access[13]['modification'], 10) == 0) {
              $(".editmodal").addClass("hidden");
            }else{
              $(".editmodal").removeClass("hidden");
            }

            //  //        suppression
             if(parseInt(droits_access[13]['suppression'], 10) == 0) {
              $(".delete").addClass("hidden");
            }else{
              $(".delete").removeClass("hidden");
            }

            //  //        Duplicata
            //  if(intval(droits_access[13]['duplicata']) === 0) {
            //   $("#bt_ajouter").addClass("hidden");
            // }else{
            //   $("#bt_ajouter").removeClass("hidden");
            // }

            //  //        Visualisation
            //  if(intval(droits_access[13]['visualisation']) === 0) {
            //   $("#bt_ajouter").addClass("hidden");
            // }else{
            //   $("#bt_ajouter").removeClass("hidden");
            // }

            //  //        Exportation
             if(parseInt(droits_access[13]['exportation'], 10) == 0) {
              $(".export").addClass("hidden");
            }else{
              $(".export").removeClass("hidden");
            }

          }
        }
      })
    });
  
 


</script>


