

<script>
    // DATE
    jQuery(function($) {
        $('#date_debut').flatpickr({
            defaultDate: 'today',
            dateFormat: "d-m-Y",
        })
    });

    flatpickr("#date_debut", {
        locale: 'fr',
        // defaultDate : 'today'
    });
    // DATE
    jQuery(function($) {
        $('#date_fin').flatpickr({
            defaultDate: 'today',
            dateFormat: "d-m-Y",
        })
    });

    flatpickr("#date_fin", {
        locale: 'fr',
        // defaultDate : 'today'
    });

    // verification batiments par proprietaire
    $('#bt_batiment_proprietaire').on('click', function(e) {

        // VERIFICATIONS DU FORMULAIRE 
        var formValide = false;
        let proprietaire = $('#proprietaire').val();
        if (proprietaire === 'Choisir le proprietaire...') {
            formValide = false;
            $('#proprietaire').addClass('is-invalid');
            $('#proprietaireHelp').html('Veuillez choisir le propriétaire.');
            $('#proprietaireHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#proprietaire').removeClass('is-invalid');
            $('#proprietaireHelp').html('');
            $('#proprietaireHelp').addClass('invisible');
        }

        // var date_debut = $('#date_debut').val();
        // if (date_debut === '') {
        //     formValide = false;
        //     $('#date_debut').addClass('is-invalid');
        //     $('#date_debutHelp').html("Veuillez saisir le date de debut.");
        //     $('#date_debutHelp').removeClass('invisible');
        //     e.preventDefault()
        // } else {
        //     formValide = true;
        //     $('#date_debut').removeClass('is-invalid');
        //     $('#date_debutHelp').html('');
        //     $('#date_debutHelp').addClass('invisible');
        // }

        // var date_fin = $('#date_fin').val();
        // if (date_fin === '') {
        //     formValide = false;
        //     $('#date_fin').addClass('is-invalid');
        //     $('#date_finHelp').html("Veuillez saisir le date de fin");
        //     $('#date_finHelp').removeClass('invisible');
        //     e.preventDefault()
        // } else {
        //     formValide = true;
        //     $('#date_fin').removeClass('is-invalid');
        //     $('#date_finHelp').html('');
        //     $('#date_finHelp').addClass('invisible');
        // }
    });



































</script>