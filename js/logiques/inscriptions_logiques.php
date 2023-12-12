<?php include ("views/components/alerts.php") ?>

<script>
    // MES LOGIQUES
    //  Vider les champs
    function vider_les_champs() {
        // Nom
        $('#nom').val('');
        $('#nom').removeClass('is-invalid');
        $('#nomHelp').html('');
        $('#nomHelp').addClass('invisible');
        // Groupe de matiere
        $('#groupe_matiere').val('Choisir le groupe de matière...');
        $('#groupe_matiere').removeClass('is-invalid');
        $('#groupe_matiereHelp').html('');
        $('#groupe_matiereHelp').addClass('invisible');
        // Filieres
        $('#filieres').val('Choisir la filière...');
        $('#filieres').removeClass('is-invalid');
        $('#filieresHelp').html('');
        $('#filieresHelp').addClass('invisible');
        // Specificite de salle
        $('#specificite_salle').val('Choisir la specificité...');
        $('#specificite_salle').removeClass('is-invalid');
        $('#specificite_salleHelp').html('');
        $('#specificite_salleHelp').addClass('invisible');
        // Coeficient
        $('#coeficient').val('0');
        $('#coeficient').removeClass('is-invalid');
        $('#coeficientHelp').html('');
        $('#coeficientHelp').addClass('invisible');
        // Heure de seances
        $('#heure_seances').val('0');
        $('#heure_seances').removeClass('is-invalid');
        $('#heure_seancesHelp').html('');
        $('#heure_seancesHelp').addClass('invisible');

        $('#nom').focus();
    }

    $('#bt_vider').on('click', function() {
        vider_les_champs()
    });


    $('#heure_seances').TouchSpin({
        min: 0,
        max: 100,
        step: 0.5,
        decimals: 1,
        boostat: 5,
        maxboostedstep: 10,
    });
    $('#coeficient').TouchSpin({
        min: 0,
        max: 100,
        step: 1,
        decimals: 1,
        boostat: 5,
        maxboostedstep: 10,
    });


    // VERIFICATIONS DU FORMULAIRE 
    var formValide = false;

    //      Les événements en déhors du click du boutton de validation
    $('#nom').on('input', function() {
        $('#nom').removeClass('is-invalid');
        $('#nomHelp').html('');
        $('#nomHelp').addClass('invisible');
    });
    $('#groupe_matiere').on('change', function() {
        $('#groupe_matiere').removeClass('is-invalid');
        $('#groupe_matiereHelp').html('');
        $('#groupe_matiereHelp').addClass('invisible');
    });
    $('#filieres').on('change', function() {
        $('#filieres').removeClass('is-invalid');
        $('#filieresHelp').html('');
        $('#filieresHelp').addClass('invisible');
    });
    $('#specificite_salle').on('change', function() {
        $('#specificite_salle').removeClass('is-invalid');
        $('#specificite_salleHelp').html('');
        $('#specificite_salleHelp').addClass('invisible');
    });



    //      Au click du boutton
    $('#bt_enregistrer').on('click', function() {
        // Cas de - Nom
        var nom = $('#nom').val();
        if (nom === '') {
            formValide = false;
            $('#nom').addClass('is-invalid');
            $('#nomHelp').html('Veillez saisir le nom.');
            $('#nomHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#nom').removeClass('is-invalid');
            $('#nomHelp').html('');
            $('#nomHelp').addClass('invisible');
        }
        // Cas de - Groupe de matiere
        let groupe_matiere = $('#groupe_matiere').val();
        if (groupe_matiere === 'Choisir le groupe de matière...') {
            formValide = false;
            $('#groupe_matiere').addClass('is-invalid');
            $('#groupe_matiereHelp').html('Veuillez choisir le groupe de matière.');
            $('#groupe_matiereHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#groupe_matiere').removeClass('is-invalid');
            $('#groupe_matiereHelp').html('');
            $('#groupe_matiereHelp').addClass('invisible');
        }

        // Cas de - Filieres
        let filieres = $('#filieres').val();
        if (filieres === 'Choisir la filière...') {
            formValide = false;
            $('#filieres').addClass('is-invalid');
            $('#filieresHelp').html('Veillez choisir le filieres.');
            $('#filieresHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#filieres').removeClass('is-invalid');
            $('#filieresHelp').html('');
            $('#filieresHelp').addClass('invisible');
        }

        // Cas de - Specificite de salle
        var specificite_salle = $('#specificite_salle').val();
        if (specificite_salle === 'Choisir la specificité...') {
            formValide = false;
            $('#specificite_salle').addClass('is-invalid');
            $('#specificite_salleHelp').html('Veuillez saisir le specificite de salle.');
            $('#specificite_salleHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#specificite_salle').removeClass('is-invalid');
            $('#specificite_salleHelp').html('');
            $('#specificite_salleHelp').addClass('invisible');
        }
        // Cas de - coeficient
        var coeficient = $('#coeficient').val();
        if (coeficient === '') {
            formValide = false;
            $('#coeficient').addClass('is-invalid');
            $('#coeficientHelp').html('Veuillez saisir le coeficient.');
            $('#coeficientHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#coeficient').removeClass('is-invalid');
            $('#coeficientHelp').html('');
            $('#coeficientHelp').addClass('invisible');
        }

    });
</script>