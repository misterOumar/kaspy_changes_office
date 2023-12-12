<?php include("views/components/alerts.php") ?>
<script src="functions/functions.js"></script>

<script>
  /**
   * Vérifie que si l'élément est vide.
   *
   * @param phone
   * @returns {boolean}
   */
  function verf_Vide(input, texte_erreur, aff_alert) {
    var libelle = $(input).val();
    if (libelle === '') {
      formValide = false;
      $(input).addClass('is-invalid');
      $('#libelleHelp').html(texte_erreur);
      $('#libelleHelp').removeClass('invisible');

      if (aff_alert === true) {
        // MESSAGE ALERT
        swal_Alert_Danger(texte_erreur)
      }
      return false;
    } else {
      $(input).removeClass('is-invalid');
      $('#libelleHelp').html('');
      $('#libelleHelp').addClass('invisible');
      return true;
    }
  }
</script>