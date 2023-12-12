<?php include("views/components/alerts.php") ?>


<script>


// selectAll
function alerterSurCocheParIDlecture(idCase) { 
    var caseCochee = document.getElementById(idCase);

    if (caseCochee.checked) {
        $("#lecture1").prop('checked', true)
        $("#lecture2").prop('checked', true)
        $("#lecture3").prop('checked', true)
        $("#lecture4").prop('checked', true)
        $("#lecture5").prop('checked', true)
        $("#lecture6").prop('checked', true)
        $("#lecture7").prop('checked', true)
        $("#lecture8").prop('checked', true)
        $("#lecture9").prop('checked', true)
        $("#lecture10").prop('checked', true)
        $("#lecture11").prop('checked', true)
        $("#lecture12").prop('checked', true)
        $("#lecture13").prop('checked', true)
        $("#lecture14").prop('checked', true)
        $("#lecture15").prop('checked', true)
        $("#lecture16").prop('checked', true)
        $("#lecture17").prop('checked', true)
        $("#lecture18").prop('checked', true)

    } else {
        $("#lecture1").prop('checked', false)
        $("#lecture2").prop('checked', false)
        $("#lecture3").prop('checked', false)
        $("#lecture4").prop('checked', false)
        $("#lecture5").prop('checked', false)
        $("#lecture6").prop('checked', false)
        $("#lecture7").prop('checked', false)
        $("#lecture8").prop('checked', false)
        $("#lecture9").prop('checked', false)
        $("#lecture10").prop('checked', false)
        $("#lecture11").prop('checked', false)
        $("#lecture12").prop('checked', false)
        $("#lecture13").prop('checked', false)
        $("#lecture14").prop('checked', false)
        $("#lecture15").prop('checked', false)
        $("#lecture16").prop('checked', false)
        $("#lecture17").prop('checked', false)
        $("#lecture18").prop('checked', false)
    }
}
function alerterSurCocheParIDcreation(idCase) {
    var caseCochee = document.getElementById(idCase);

    if (caseCochee.checked) {
        $("#creation1").prop('checked', true)
        $("#creation2").prop('checked', true)
        $("#creation3").prop('checked', true)
        $("#creation4").prop('checked', true)
        $("#creation5").prop('checked', true)
        $("#creation6").prop('checked', true)
        $("#creation7").prop('checked', true)
        $("#creation8").prop('checked', true)
        $("#creation9").prop('checked', true)
        $("#creation10").prop('checked', true)
        $("#creation11").prop('checked', true)
        $("#creation12").prop('checked', true)
        $("#creation13").prop('checked', true)
        $("#creation14").prop('checked', true)
        $("#creation15").prop('checked', true)
        $("#creation16").prop('checked', true)
        $("#creation17").prop('checked', true)
        $("#creation18").prop('checked', true)

    } else {
        $("#creation1").prop('checked', false)
        $("#creation2").prop('checked', false)
        $("#creation3").prop('checked', false)
        $("#creation4").prop('checked', false)
        $("#creation5").prop('checked', false)
        $("#creation6").prop('checked', false)
        $("#creation7").prop('checked', false)
        $("#creation8").prop('checked', false)
        $("#creation9").prop('checked', false)
        $("#creation10").prop('checked', false)
        $("#creation11").prop('checked', false)
        $("#creation12").prop('checked', false)
        $("#creation13").prop('checked', false)
        $("#creation14").prop('checked', false)
        $("#creation15").prop('checked', false)
        $("#creation16").prop('checked', false)
        $("#creation17").prop('checked', false)
        $("#creation18").prop('checked', false)
    }
}
function alerterSurCocheParIDmodif(idCase) {
    var caseCochee = document.getElementById(idCase);

    if (caseCochee.checked) {
        $("#modification1").prop('checked', true)
        $("#modification2").prop('checked', true)
        $("#modification3").prop('checked', true)
        $("#modification4").prop('checked', true)
        $("#modification5").prop('checked', true)
        $("#modification6").prop('checked', true)
        $("#modification7").prop('checked', true)
        $("#modification8").prop('checked', true)
        $("#modification9").prop('checked', true)
        $("#modification10").prop('checked', true)
        $("#modification11").prop('checked', true)
        $("#modification12").prop('checked', true)
        $("#modification13").prop('checked', true)
        $("#modification14").prop('checked', true)
        $("#modification15").prop('checked', true)
        $("#modification16").prop('checked', true)
        $("#modification17").prop('checked', true)
        $("#modification18").prop('checked', true)

    } else {
        $("#modification1").prop('checked', false)
        $("#modification2").prop('checked', false)
        $("#modification3").prop('checked', false)
        $("#modification4").prop('checked', false)
        $("#modification5").prop('checked', false)
        $("#modification6").prop('checked', false)
        $("#modification7").prop('checked', false)
        $("#modification8").prop('checked', false)
        $("#modification9").prop('checked', false)
        $("#modification10").prop('checked', false)
        $("#modification11").prop('checked', false)
        $("#modification12").prop('checked', false)
        $("#modification13").prop('checked', false)
        $("#modification14").prop('checked', false)
        $("#modification15").prop('checked', false)
        $("#modification16").prop('checked', false)
        $("#modification17").prop('checked', false)
        $("#modification18").prop('checked', false)
    }
}
function alerterSurCocheParIDsupp(idCase) {
    var caseCochee = document.getElementById(idCase);

    if (caseCochee.checked) {
        $("#suppression1").prop('checked', true)
        $("#suppression2").prop('checked', true)
        $("#suppression3").prop('checked', true)
        $("#suppression4").prop('checked', true)
        $("#suppression5").prop('checked', true)
        $("#suppression6").prop('checked', true)
        $("#suppression7").prop('checked', true)
        $("#suppression8").prop('checked', true)
        $("#suppression9").prop('checked', true)
        $("#suppression10").prop('checked', true)
        $("#suppression11").prop('checked', true)
        $("#suppression12").prop('checked', true)
        $("#suppression13").prop('checked', true)
        $("#suppression14").prop('checked', true)
        $("#suppression15").prop('checked', true)
        $("#suppression16").prop('checked', true)
        $("#suppression17").prop('checked', true)
        $("#suppression18").prop('checked', true)

    } else {
        $("#suppression1").prop('checked', false)
        $("#suppression2").prop('checked', false)
        $("#suppression3").prop('checked', false)
        $("#suppression4").prop('checked', false)
        $("#suppression5").prop('checked', false)
        $("#suppression6").prop('checked', false)
        $("#suppression7").prop('checked', false)
        $("#suppression8").prop('checked', false)
        $("#suppression9").prop('checked', false)
        $("#suppression10").prop('checked', false)
        $("#suppression11").prop('checked', false)
        $("#suppression12").prop('checked', false)
        $("#suppression13").prop('checked', false)
        $("#suppression14").prop('checked', false)
        $("#suppression15").prop('checked', false)
        $("#suppression16").prop('checked', false)
        $("#suppression17").prop('checked', false)
        $("#suppression18").prop('checked', false)
    }
}
function alerterSurCocheParIDduplicata(idCase) {
    var caseCochee = document.getElementById(idCase);

    if (caseCochee.checked) {
        $("#duplicata1").prop('checked', true)
        $("#duplicata2").prop('checked', true)
        $("#duplicata3").prop('checked', true)
        $("#duplicata4").prop('checked', true)
        $("#duplicata5").prop('checked', true)
        $("#duplicata6").prop('checked', true)
        $("#duplicata7").prop('checked', true)
        $("#duplicata8").prop('checked', true)
        $("#duplicata9").prop('checked', true)
        $("#duplicata10").prop('checked', true)
        $("#duplicata11").prop('checked', true)
        $("#duplicata12").prop('checked', true)
        $("#duplicata13").prop('checked', true)
        $("#duplicata14").prop('checked', true)
        $("#duplicata15").prop('checked', true)
        $("#duplicata16").prop('checked', true)
        $("#duplicata17").prop('checked', true)
        $("#duplicata18").prop('checked', true)

    } else {
        $("#duplicata1").prop('checked', false)
        $("#duplicata2").prop('checked', false)
        $("#duplicata3").prop('checked', false)
        $("#duplicata4").prop('checked', false)
        $("#duplicata5").prop('checked', false)
        $("#duplicata6").prop('checked', false)
        $("#duplicata7").prop('checked', false)
        $("#duplicata8").prop('checked', false)
        $("#duplicata9").prop('checked', false)
        $("#duplicata10").prop('checked', false)
        $("#duplicata11").prop('checked', false)
        $("#duplicata12").prop('checked', false)
        $("#duplicata13").prop('checked', false)
        $("#duplicata14").prop('checked', false)
        $("#duplicata15").prop('checked', false)
        $("#duplicata16").prop('checked', false)
        $("#duplicata17").prop('checked', false)
        $("#duplicata18").prop('checked', false)
    }
}
function alerterSurCocheParIDvisual(idCase) {
    var caseCochee = document.getElementById(idCase);

    if (caseCochee.checked) {
        $("#visualisation1").prop('checked', true)
        $("#visualisation2").prop('checked', true)
        $("#visualisation3").prop('checked', true)
        $("#visualisation4").prop('checked', true)
        $("#visualisation5").prop('checked', true)
        $("#visualisation6").prop('checked', true)
        $("#visualisation7").prop('checked', true)
        $("#visualisation8").prop('checked', true)
        $("#visualisation9").prop('checked', true)
        $("#visualisation10").prop('checked', true)
        $("#visualisation11").prop('checked', true)
        $("#visualisation12").prop('checked', true)
        $("#visualisation13").prop('checked', true)
        $("#visualisation14").prop('checked', true)
        $("#visualisation15").prop('checked', true)
        $("#visualisation16").prop('checked', true)
        $("#visualisation17").prop('checked', true)
        $("#visualisation18").prop('checked', true)

    } else {
        $("#visualisation1").prop('checked', false)
        $("#visualisation2").prop('checked', false)
        $("#visualisation3").prop('checked', false)
        $("#visualisation4").prop('checked', false)
        $("#visualisation5").prop('checked', false)
        $("#visualisation6").prop('checked', false)
        $("#visualisation7").prop('checked', false)
        $("#visualisation8").prop('checked', false)
        $("#visualisation9").prop('checked', false)
        $("#visualisation10").prop('checked', false)
        $("#visualisation11").prop('checked', false)
        $("#visualisation12").prop('checked', false)
        $("#visualisation13").prop('checked', false)
        $("#visualisation14").prop('checked', false)
        $("#visualisation15").prop('checked', false)
        $("#visualisation16").prop('checked', false)
        $("#visualisation17").prop('checked', false)
        $("#visualisation18").prop('checked', false)
    }
}
function alerterSurCocheParIDexport(idCase) {
    var caseCochee = document.getElementById(idCase);

    if (caseCochee.checked) {
        $("#exportation1").prop('checked', true)
        $("#exportation2").prop('checked', true)
        $("#exportation3").prop('checked', true)
        $("#exportation4").prop('checked', true)
        $("#exportation5").prop('checked', true)
        $("#exportation6").prop('checked', true)
        $("#exportation7").prop('checked', true)
        $("#exportation8").prop('checked', true)
        $("#exportation9").prop('checked', true)
        $("#exportation10").prop('checked', true)
        $("#exportation11").prop('checked', true)
        $("#exportation12").prop('checked', true)
        $("#exportation13").prop('checked', true)
        $("#exportation14").prop('checked', true)
        $("#exportation15").prop('checked', true)
        $("#exportation16").prop('checked', true)
        $("#exportation17").prop('checked', true)
        $("#exportation18").prop('checked', true)

    } else {
        $("#exportation1").prop('checked', false)
        $("#exportation2").prop('checked', false)
        $("#exportation3").prop('checked', false)
        $("#exportation4").prop('checked', false)
        $("#exportation5").prop('checked', false)
        $("#exportation6").prop('checked', false)
        $("#exportation7").prop('checked', false)
        $("#exportation8").prop('checked', false)
        $("#exportation9").prop('checked', false)
        $("#exportation10").prop('checked', false)
        $("#exportation11").prop('checked', false)
        $("#exportation12").prop('checked', false)
        $("#exportation13").prop('checked', false)
        $("#exportation14").prop('checked', false)
        $("#exportation15").prop('checked', false)
        $("#exportation16").prop('checked', false)
        $("#exportation17").prop('checked', false)
        $("#exportation18").prop('checked', false)
    }
}


function alerterSurCocheParIDlecture_modif(idCase) { 
    var caseCochee = document.getElementById(idCase);

    if (caseCochee.checked) {
        $("#lecture_modif1").prop('checked', true)
        $("#lecture_modif2").prop('checked', true)
        $("#lecture_modif3").prop('checked', true)
        $("#lecture_modif4").prop('checked', true)
        $("#lecture_modif5").prop('checked', true)
        $("#lecture_modif6").prop('checked', true)
        $("#lecture_modif7").prop('checked', true)
        $("#lecture_modif8").prop('checked', true)
        $("#lecture_modif9").prop('checked', true)
        $("#lecture_modif10").prop('checked', true)
        $("#lecture_modif11").prop('checked', true)
        $("#lecture_modif12").prop('checked', true)
        $("#lecture_modif13").prop('checked', true)
        $("#lecture_modif14").prop('checked', true)
        $("#lecture_modif15").prop('checked', true)
        $("#lecture_modif16").prop('checked', true)
        $("#lecture_modif17").prop('checked', true)
        $("#lecture_modif18").prop('checked', true)

    } else {
        $("#lecture_modif1").prop('checked', false)
        $("#lecture_modif2").prop('checked', false)
        $("#lecture_modif3").prop('checked', false)
        $("#lecture_modif4").prop('checked', false)
        $("#lecture_modif5").prop('checked', false)
        $("#lecture_modif6").prop('checked', false)
        $("#lecture_modif7").prop('checked', false)
        $("#lecture_modif8").prop('checked', false)
        $("#lecture_modif9").prop('checked', false)
        $("#lecture_modif10").prop('checked', false)
        $("#lecture_modif11").prop('checked', false)
        $("#lecture_modif12").prop('checked', false)
        $("#lecture_modif13").prop('checked', false)
        $("#lecture_modif14").prop('checked', false)
        $("#lecture_modif15").prop('checked', false)
        $("#lecture_modif16").prop('checked', false)
        $("#lecture_modif17").prop('checked', false)
        $("#lecture_modif18").prop('checked', false)
    }
}
function alerterSurCocheParIDcreation_modif(idCase) {
    var caseCochee = document.getElementById(idCase);

    if (caseCochee.checked) {
        $("#creation_modif1").prop('checked', true)
        $("#creation_modif2").prop('checked', true)
        $("#creation_modif3").prop('checked', true)
        $("#creation_modif4").prop('checked', true)
        $("#creation_modif5").prop('checked', true)
        $("#creation_modif6").prop('checked', true)
        $("#creation_modif7").prop('checked', true)
        $("#creation_modif8").prop('checked', true)
        $("#creation_modif9").prop('checked', true)
        $("#creation_modif10").prop('checked', true)
        $("#creation_modif11").prop('checked', true)
        $("#creation_modif12").prop('checked', true)
        $("#creation_modif13").prop('checked', true)
        $("#creation_modif14").prop('checked', true)
        $("#creation_modif15").prop('checked', true)
        $("#creation_modif16").prop('checked', true)
        $("#creation_modif17").prop('checked', true)
        $("#creation_modif18").prop('checked', true)

    } else {
        $("#creation_modif1").prop('checked', false)
        $("#creation_modif2").prop('checked', false)
        $("#creation_modif3").prop('checked', false)
        $("#creation_modif4").prop('checked', false)
        $("#creation_modif5").prop('checked', false)
        $("#creation_modif6").prop('checked', false)
        $("#creation_modif7").prop('checked', false)
        $("#creation_modif8").prop('checked', false)
        $("#creation_modif9").prop('checked', false)
        $("#creation_modif10").prop('checked', false)
        $("#creation_modif11").prop('checked', false)
        $("#creation_modif12").prop('checked', false)
        $("#creation_modif13").prop('checked', false)
        $("#creation_modif14").prop('checked', false)
        $("#creation_modif15").prop('checked', false)
        $("#creation_modif16").prop('checked', false)
        $("#creation_modif17").prop('checked', false)
        $("#creation_modif18").prop('checked', false)
    }
}
function alerterSurCocheParIDmodif_modif(idCase) {
    var caseCochee = document.getElementById(idCase);

    if (caseCochee.checked) {
        $("#modification_modif1").prop('checked', true)
        $("#modification_modif2").prop('checked', true)
        $("#modification_modif3").prop('checked', true)
        $("#modification_modif4").prop('checked', true)
        $("#modification_modif5").prop('checked', true)
        $("#modification_modif6").prop('checked', true)
        $("#modification_modif7").prop('checked', true)
        $("#modification_modif8").prop('checked', true)
        $("#modification_modif9").prop('checked', true)
        $("#modification_modif10").prop('checked', true)
        $("#modification_modif11").prop('checked', true)
        $("#modification_modif12").prop('checked', true)
        $("#modification_modif13").prop('checked', true)
        $("#modification_modif14").prop('checked', true)
        $("#modification_modif15").prop('checked', true)
        $("#modification_modif16").prop('checked', true)
        $("#modification_modif17").prop('checked', true)
        $("#modification_modif18").prop('checked', true)

    } else {
        $("#modification_modif1").prop('checked', false)
        $("#modification_modif2").prop('checked', false)
        $("#modification_modif3").prop('checked', false)
        $("#modification_modif4").prop('checked', false)
        $("#modification_modif5").prop('checked', false)
        $("#modification_modif6").prop('checked', false)
        $("#modification_modif7").prop('checked', false)
        $("#modification_modif8").prop('checked', false)
        $("#modification_modif9").prop('checked', false)
        $("#modification_modif10").prop('checked', false)
        $("#modification_modif11").prop('checked', false)
        $("#modification_modif12").prop('checked', false)
        $("#modification_modif13").prop('checked', false)
        $("#modification_modif14").prop('checked', false)
        $("#modification_modif15").prop('checked', false)
        $("#modification_modif16").prop('checked', false)
        $("#modification_modif17").prop('checked', false)
        $("#modification_modif18").prop('checked', false)
    }
}
function alerterSurCocheParIDsupp_modif(idCase) {
    var caseCochee = document.getElementById(idCase);

    if (caseCochee.checked) {
        $("#suppression_modif1").prop('checked', true)
        $("#suppression_modif2").prop('checked', true)
        $("#suppression_modif3").prop('checked', true)
        $("#suppression_modif4").prop('checked', true)
        $("#suppression_modif5").prop('checked', true)
        $("#suppression_modif6").prop('checked', true)
        $("#suppression_modif7").prop('checked', true)
        $("#suppression_modif8").prop('checked', true)
        $("#suppression_modif9").prop('checked', true)
        $("#suppression_modif10").prop('checked', true)
        $("#suppression_modif11").prop('checked', true)
        $("#suppression_modif12").prop('checked', true)
        $("#suppression_modif13").prop('checked', true)
        $("#suppression_modif14").prop('checked', true)
        $("#suppression_modif15").prop('checked', true)
        $("#suppression_modif16").prop('checked', true)
        $("#suppression_modif17").prop('checked', true)
        $("#suppression_modif18").prop('checked', true)

    } else {
        $("#suppression_modif1").prop('checked', false)
        $("#suppression_modif2").prop('checked', false)
        $("#suppression_modif3").prop('checked', false)
        $("#suppression_modif4").prop('checked', false)
        $("#suppression_modif5").prop('checked', false)
        $("#suppression_modif6").prop('checked', false)
        $("#suppression_modif7").prop('checked', false)
        $("#suppression_modif8").prop('checked', false)
        $("#suppression_modif9").prop('checked', false)
        $("#suppression_modif10").prop('checked', false)
        $("#suppression_modif11").prop('checked', false)
        $("#suppression_modif12").prop('checked', false)
        $("#suppression_modif13").prop('checked', false)
        $("#suppression_modif14").prop('checked', false)
        $("#suppression_modif15").prop('checked', false)
        $("#suppression_modif16").prop('checked', false)
        $("#suppression_modif17").prop('checked', false)
        $("#suppression_modif18").prop('checked', false)
    }
}
function alerterSurCocheParIDduplicata_modif(idCase) {
    var caseCochee = document.getElementById(idCase);

    if (caseCochee.checked) {
        $("#duplicata_modif1").prop('checked', true)
        $("#duplicata_modif2").prop('checked', true)
        $("#duplicata_modif3").prop('checked', true)
        $("#duplicata_modif4").prop('checked', true)
        $("#duplicata_modif5").prop('checked', true)
        $("#duplicata_modif6").prop('checked', true)
        $("#duplicata_modif7").prop('checked', true)
        $("#duplicata_modif8").prop('checked', true)
        $("#duplicata_modif9").prop('checked', true)
        $("#duplicata_modif10").prop('checked', true)
        $("#duplicata_modif11").prop('checked', true)
        $("#duplicata_modif12").prop('checked', true)
        $("#duplicata_modif13").prop('checked', true)
        $("#duplicata_modif14").prop('checked', true)
        $("#duplicata_modif15").prop('checked', true)
        $("#duplicata_modif16").prop('checked', true)
        $("#duplicata_modif17").prop('checked', true)
        $("#duplicata_modif18").prop('checked', true)

    } else {
        $("#duplicata_modif1").prop('checked', false)
        $("#duplicata_modif2").prop('checked', false)
        $("#duplicata_modif3").prop('checked', false)
        $("#duplicata_modif4").prop('checked', false)
        $("#duplicata_modif5").prop('checked', false)
        $("#duplicata_modif6").prop('checked', false)
        $("#duplicata_modif7").prop('checked', false)
        $("#duplicata_modif8").prop('checked', false)
        $("#duplicata_modif9").prop('checked', false)
        $("#duplicata_modif10").prop('checked', false)
        $("#duplicata_modif11").prop('checked', false)
        $("#duplicata_modif12").prop('checked', false)
        $("#duplicata_modif13").prop('checked', false)
        $("#duplicata_modif14").prop('checked', false)
        $("#duplicata_modif15").prop('checked', false)
        $("#duplicata_modif16").prop('checked', false)
        $("#duplicata_modif17").prop('checked', false)
        $("#duplicata_modif18").prop('checked', false)
    }
}
function alerterSurCocheParIDvisual_modif(idCase) {
    var caseCochee = document.getElementById(idCase);

    if (caseCochee.checked) {
        $("#visualisation_modif1").prop('checked', true)
        $("#visualisation_modif2").prop('checked', true)
        $("#visualisation_modif3").prop('checked', true)
        $("#visualisation_modif4").prop('checked', true)
        $("#visualisation_modif5").prop('checked', true)
        $("#visualisation_modif6").prop('checked', true)
        $("#visualisation_modif7").prop('checked', true)
        $("#visualisation_modif8").prop('checked', true)
        $("#visualisation_modif9").prop('checked', true)
        $("#visualisation_modif10").prop('checked', true)
        $("#visualisation_modif11").prop('checked', true)
        $("#visualisation_modif12").prop('checked', true)
        $("#visualisation_modif13").prop('checked', true)
        $("#visualisation_modif14").prop('checked', true)
        $("#visualisation_modif15").prop('checked', true)
        $("#visualisation_modif16").prop('checked', true)
        $("#visualisation_modif17").prop('checked', true)
        $("#visualisation_modif18").prop('checked', true)

    } else {
        $("#visualisation_modif1").prop('checked', false)
        $("#visualisation_modif2").prop('checked', false)
        $("#visualisation_modif3").prop('checked', false)
        $("#visualisation_modif4").prop('checked', false)
        $("#visualisation_modif5").prop('checked', false)
        $("#visualisation_modif6").prop('checked', false)
        $("#visualisation_modif7").prop('checked', false)
        $("#visualisation_modif8").prop('checked', false)
        $("#visualisation_modif9").prop('checked', false)
        $("#visualisation_modif10").prop('checked', false)
        $("#visualisation_modif11").prop('checked', false)
        $("#visualisation_modif12").prop('checked', false)
        $("#visualisation_modif13").prop('checked', false)
        $("#visualisation_modif14").prop('checked', false)
        $("#visualisation_modif15").prop('checked', false)
        $("#visualisation_modif16").prop('checked', false)
        $("#visualisation_modif17").prop('checked', false)
        $("#visualisation_modif18").prop('checked', false)
    }
}
function alerterSurCocheParIDexport_modif(idCase) {
    var caseCochee = document.getElementById(idCase);

    if (caseCochee.checked) {
        $("#exportation_modif1").prop('checked', true)
        $("#exportation_modif2").prop('checked', true)
        $("#exportation_modif3").prop('checked', true)
        $("#exportation_modif4").prop('checked', true)
        $("#exportation_modif5").prop('checked', true)
        $("#exportation_modif6").prop('checked', true)
        $("#exportation_modif7").prop('checked', true)
        $("#exportation_modif8").prop('checked', true)
        $("#exportation_modif9").prop('checked', true)
        $("#exportation_modif10").prop('checked', true)
        $("#exportation_modif11").prop('checked', true)
        $("#exportation_modif12").prop('checked', true)
        $("#exportation_modif13").prop('checked', true)
        $("#exportation_modif14").prop('checked', true)
        $("#exportation_modif15").prop('checked', true)
        $("#exportation_modif16").prop('checked', true)
        $("#exportation_modif17").prop('checked', true)
        $("#exportation_modif18").prop('checked', true)

    } else {
        $("#exportation_modif1").prop('checked', false)
        $("#exportation_modif2").prop('checked', false)
        $("#exportation_modif3").prop('checked', false)
        $("#exportation_modif4").prop('checked', false)
        $("#exportation_modif5").prop('checked', false)
        $("#exportation_modif6").prop('checked', false)
        $("#exportation_modif7").prop('checked', false)
        $("#exportation_modif8").prop('checked', false)
        $("#exportation_modif9").prop('checked', false)
        $("#exportation_modif10").prop('checked', false)
        $("#exportation_modif11").prop('checked', false)
        $("#exportation_modif12").prop('checked', false)
        $("#exportation_modif13").prop('checked', false)
        $("#exportation_modif14").prop('checked', false)
        $("#exportation_modif15").prop('checked', false)
        $("#exportation_modif16").prop('checked', false)
        $("#exportation_modif17").prop('checked', false)
        $("#exportation_modif18").prop('checked', false)
    }
}

    // MES LOGIQUES
    //  Vider les champs
    function vider_les_champs() {
        // Libelle
        $('#libelle').val('');
        $('#libelle').removeClass('is-invalid');
        $('#libelleHelp').html('');
        $('#libelleHelp').addClass('invisible');

        $('#libelle').focus();
    }

    $('#bt_vider').on('click', function() {
        vider_les_champs()
    });

    $('#fermer').on('click', function() {
        window.location.reload();
    });


    // VERIFICATIONS DU FORMULAIRE 
    var formValide = false;

    //      Les événements en déhors du click du boutton de validation

    $('#libelle').on('keydown', function() {
        $('#libelle').removeClass('is-invalid');
        $('#libelleHelp').html('');
    });


    //      Au click du boutton
    $('#bt_enregistrer').on('click', function() {
        // Cas de - libelle
        var libelle = $('#libelle').val();
        if (libelle === '') {
            formValide = false;
            $('#libelle').addClass('is-invalid');
            $('#libelleHelp').html('Veuillez saisir le libellé du role');
            $('#libelleHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#libelle').removeClass('is-invalid');
            $('#libelleHelp').html('');
            $('#libelleHelp').addClass('invisible');
        }

    });




    // VERIFICATIONS DU FORMULAIRE 
    var formValide = false;

    //      Les événements en déhors du click du boutton de validation

    $('#libelle_modif').on('keydown', function() {
        $('#libelle_modif').removeClass('is-invalid');
        $('#libelle_modifHelp').html('');
    });

    // Propriété d'un role
    // MODIFIER UN ELEMENT
    //      Au click du boutton modifier
    $('#bt_modifier').on('click', function(e) {
        var submitUpdate = true;
        // Cas de - libelle
        var libelle = $('#libelle_modif').val();
        if (libelle === '') {
            submitUpdate = false;
            $('#libelle_modif').addClass('is-invalid');
            $('#libelle_modifHelp').html('Veuillez saisir le libellé du role');
            $('#libelle_modifHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            submitUpdate = true;
            $('#libelle_modif').removeClass('is-invalid');
            $('#libelle_modifHelp').html('');
            $('#libelle_modifHelp').addClass('invisible');
        }

        if (submitUpdate === true) {
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


    // Recuperer les informations du role et remplir le formulaire
    var that
    $('.editmodal').on('click', function() {
        that = this
        var id = $(this).attr('data-id');
        // alert(id);
        $.ajax({
            type: "GET",
            data: "idProprietes=" + id, //Envois de l'id selectionné
            url: "controllers/role_permission_controller.php",
            success: function(result) {
                var donnees = JSON.parse(result);
                if (donnees['proprietes_role_permission'] != 'null') {

                    // Remplir le formulaire
                    let role_permission = donnees['proprietes_role_permission'];
                    let role_permission_details = donnees['proprietes_role_permission_details'];
                    console.log(role_permission_details)

                    $('#libelle_modif').val(role_permission['libelle']);
                    $('#idModif').val(role_permission['id']);



                    // for (var j = 0; j < (role_permission_details.length)+1; j++) {
                            // alert(j+1  )   ;                     
                        
                            // premier
                        if (role_permission_details[0]['lecture'] == 1) {
                                $("#lecture_modif" + 1).prop('checked', true)

                            }
                            if (role_permission_details[0]['creation'] == 1) {
                                $("#creation_modif" + 1).prop('checked', true)

                            }
                            if (role_permission_details[0]['modification'] == 1) {
                                $("#modification_modif" + 1).prop('checked', true)

                            }

                            if (role_permission_details[0]['suppression'] == 1) {
                                $("#suppression_modif" + 1).prop('checked', true)

                            }

                            if (role_permission_details[0]['duplicata'] == 1) {
                                $("#duplicata_modif" + 1).prop('checked', true)

                            }

                            if (role_permission_details[0]['visualisation'] == 1) {
                                $("#visualisation_modif" + 1).prop('checked', true)

                            }

                            if (role_permission_details[0]['exportation'] == 1) {
                                $("#exportation_modif" + 1).prop('checked', true)

                            }


                            // Deuxieme
                            if (role_permission_details[1]['lecture'] == 1) {
                                $("#lecture_modif2").prop('checked', true)

                            }
                            if (role_permission_details[1]['creation'] == 1) {
                                $("#creation_modif2").prop('checked', true)

                            }
                            if (role_permission_details[1]['modification'] == 1) {
                                $("#modification_modif2").prop('checked', true)

                            }

                            if (role_permission_details[1]['suppression'] == 1) {
                                $("#suppression_modif2").prop('checked', true)

                            }

                            if (role_permission_details[1]['duplicata'] == 1) {
                                $("#duplicata_modif2").prop('checked', true)

                            }

                            if (role_permission_details[1]['visualisation'] == 1) {
                                $("#visualisation_modif2").prop('checked', true)

                            }

                            if (role_permission_details[1]['exportation'] == 1) {
                                $("#exportation_modif2").prop('checked', true)

                            }
                            // Troisieme
                            if (role_permission_details[2]['lecture'] == 1) {
                                $("#lecture_modif3").prop('checked', true)

                            }
                            if (role_permission_details[2]['creation'] == 1) {
                                $("#creation_modif3").prop('checked', true)

                            }
                            if (role_permission_details[2]['modification'] == 1) {
                                $("#modification_modif3").prop('checked', true)

                            }

                            if (role_permission_details[2]['suppression'] == 1) {
                                $("#suppression_modif3").prop('checked', true)

                            }

                            if (role_permission_details[2]['duplicata'] == 1) {
                                $("#duplicata_modif3").prop('checked', true)

                            }

                            if (role_permission_details[2]['visualisation'] == 1) {
                                $("#visualisation_modif3").prop('checked', true)

                            }

                            if (role_permission_details[2]['exportation'] == 1) {
                                $("#exportation_modif3").prop('checked', true)

                            }
                            // Quatrieme
                            if (role_permission_details[3]['lecture'] == 1) {
                                $("#lecture_modif4").prop('checked', true)

                            }
                            if (role_permission_details[3]['creation'] == 1) {
                                $("#creation_modif4").prop('checked', true)

                            }
                            if (role_permission_details[3]['modification'] == 1) {
                                $("#modification_modif4").prop('checked', true)

                            }

                            if (role_permission_details[3]['suppression'] == 1) {
                                $("#suppression_modif4").prop('checked', true)

                            }

                            if (role_permission_details[3]['duplicata'] == 1) {
                                $("#duplicata_modif4").prop('checked', true)

                            }

                            if (role_permission_details[3]['visualisation'] == 1) {
                                $("#visualisation_modif4").prop('checked', true)

                            }

                            if (role_permission_details[3]['exportation'] == 1) {
                                $("#exportation_modif4").prop('checked', true)

                            }
                            // Cinquieme
                            if (role_permission_details[4]['lecture'] == 1) {
                                $("#lecture_modif5").prop('checked', true)

                            }
                            if (role_permission_details[4]['creation'] == 1) {
                                $("#creation_modif5").prop('checked', true)

                            }
                            if (role_permission_details[4]['modification'] == 1) {
                                $("#modification_modif5").prop('checked', true)

                            }

                            if (role_permission_details[4]['suppression'] == 1) {
                                $("#suppression_modif5").prop('checked', true)

                            }

                            if (role_permission_details[4]['duplicata'] == 1) {
                                $("#duplicata_modif5").prop('checked', true)

                            }

                            if (role_permission_details[4]['visualisation'] == 1) {
                                $("#visualisation_modif5").prop('checked', true)

                            }

                            if (role_permission_details[4]['exportation'] == 1) {
                                $("#exportation_modif5").prop('checked', true)

                            }
                            // Sixieme
                            if (role_permission_details[5]['lecture'] == 1) {
                                $("#lecture_modif6").prop('checked', true)

                            }
                            if (role_permission_details[5]['creation'] == 1) {
                                $("#creation_modif6").prop('checked', true)

                            }
                            if (role_permission_details[5]['modification'] == 1) {
                                $("#modification_modif6").prop('checked', true)

                            }

                            if (role_permission_details[5]['suppression'] == 1) {
                                $("#suppression_modif6").prop('checked', true)

                            }

                            if (role_permission_details[5]['duplicata'] == 1) {
                                $("#duplicata_modif6").prop('checked', true)

                            }

                            if (role_permission_details[5]['visualisation'] == 1) {
                                $("#visualisation_modif6").prop('checked', true)

                            }

                            if (role_permission_details[5]['exportation'] == 1) {
                                $("#exportation_modif6").prop('checked', true)

                            }
                            // Septieme
                            if (role_permission_details[6]['lecture'] == 1) {
                                $("#lecture_modif7").prop('checked', true)

                            }
                            if (role_permission_details[6]['creation'] == 1) {
                                $("#creation_modif7").prop('checked', true)

                            }
                            if (role_permission_details[6]['modification'] == 1) {
                                $("#modification_modif7").prop('checked', true)

                            }

                            if (role_permission_details[6]['suppression'] == 1) {
                                $("#suppression_modif7").prop('checked', true)

                            }

                            if (role_permission_details[6]['duplicata'] == 1) {
                                $("#duplicata_modif7").prop('checked', true)

                            }

                            if (role_permission_details[6]['visualisation'] == 1) {
                                $("#visualisation_modif7").prop('checked', true)

                            }

                            if (role_permission_details[6]['exportation'] == 1) {
                                $("#exportation_modif7").prop('checked', true)

                            }

                            // Huitieme
                            if (role_permission_details[7]['lecture'] == 1) {
                                $("#lecture_modif8").prop('checked', true)

                            }
                            if (role_permission_details[7]['creation'] == 1) {
                                $("#creation_modif8").prop('checked', true)

                            }
                            if (role_permission_details[7]['modification'] == 1) {
                                $("#modification_modif8").prop('checked', true)

                            }

                            if (role_permission_details[7]['suppression'] == 1) {
                                $("#suppression_modif8").prop('checked', true)

                            }

                            if (role_permission_details[7]['duplicata'] == 1) {
                                $("#duplicata_modif8").prop('checked', true)

                            }

                            if (role_permission_details[7]['visualisation'] == 1) {
                                $("#visualisation_modif8").prop('checked', true)

                            }

                            if (role_permission_details[7]['exportation'] == 1) {
                                $("#exportation_modif8").prop('checked', true)

                            }
                            // Neuvieme
                            if (role_permission_details[8]['lecture'] == 1) {
                                $("#lecture_modif9").prop('checked', true)

                            }
                            if (role_permission_details[8]['creation'] == 1) {
                                $("#creation_modif9").prop('checked', true)

                            }
                            if (role_permission_details[8]['modification'] == 1) {
                                $("#modification_modif9").prop('checked', true)

                            }

                            if (role_permission_details[8]['suppression'] == 1) {
                                $("#suppression_modif9").prop('checked', true)

                            }

                            if (role_permission_details[8]['duplicata'] == 1) {
                                $("#duplicata_modif9").prop('checked', true)

                            }

                            if (role_permission_details[8]['visualisation'] == 1) {
                                $("#visualisation_modif9").prop('checked', true)

                            }

                            if (role_permission_details[8]['exportation'] == 1) {
                                $("#exportation_modif9").prop('checked', true)

                            }
                            // Dixieme
                            if (role_permission_details[9]['lecture'] == 1) {
                                $("#lecture_modif10").prop('checked', true)

                            }
                            if (role_permission_details[9]['creation'] == 1) {
                                $("#creation_modif10").prop('checked', true)

                            }
                            if (role_permission_details[9]['modification'] == 1) {
                                $("#modification_modif10").prop('checked', true)

                            }

                            if (role_permission_details[9]['suppression'] == 1) {
                                $("#suppression_modif10").prop('checked', true)

                            }

                            if (role_permission_details[9]['duplicata'] == 1) {
                                $("#duplicata_modif10").prop('checked', true)

                            }

                            if (role_permission_details[9]['visualisation'] == 1) {
                                $("#visualisation_modif10").prop('checked', true)

                            }

                            if (role_permission_details[9]['exportation'] == 1) {
                                $("#exportation_modif10").prop('checked', true)

                            }
                            // Onzieme
                            if (role_permission_details[10]['lecture'] == 1) {
                                $("#lecture_modif11").prop('checked', true)

                            }
                            if (role_permission_details[10]['creation'] == 1) {
                                $("#creation_modif11").prop('checked', true)

                            }
                            if (role_permission_details[10]['modification'] == 1) {
                                $("#modification_modif11").prop('checked', true)

                            }

                            if (role_permission_details[10]['suppression'] == 1) {
                                $("#suppression_modif11").prop('checked', true)

                            }

                            if (role_permission_details[10]['duplicata'] == 1) {
                                $("#duplicata_modif11").prop('checked', true)

                            }

                            if (role_permission_details[10]['visualisation'] == 1) {
                                $("#visualisation_modif11").prop('checked', true)

                            }

                            if (role_permission_details[10]['exportation'] == 1) {
                                $("#exportation_modif11").prop('checked', true)

                            }
                            // Douzieme
                            if (role_permission_details[11]['lecture'] == 1) {
                                $("#lecture_modif12").prop('checked', true)

                            }
                            if (role_permission_details[11]['creation'] == 1) {
                                $("#creation_modif12").prop('checked', true)

                            }
                            if (role_permission_details[11]['modification'] == 1) {
                                $("#modification_modif12").prop('checked', true)

                            }

                            if (role_permission_details[11]['suppression'] == 1) {
                                $("#suppression_modif12").prop('checked', true)

                            }

                            if (role_permission_details[11]['duplicata'] == 1) {
                                $("#duplicata_modif12").prop('checked', true)

                            }

                            if (role_permission_details[11]['visualisation'] == 1) {
                                $("#visualisation_modif12").prop('checked', true)

                            }

                            if (role_permission_details[11]['exportation'] == 1) {
                                $("#exportation_modif12").prop('checked', true)

                            }
                            // Treizieme
                            if (role_permission_details[12]['lecture'] == 1) {
                                $("#lecture_modif13").prop('checked', true)

                            }
                            if (role_permission_details[12]['creation'] == 1) {
                                $("#creation_modif13").prop('checked', true)

                            }
                            if (role_permission_details[12]['modification'] == 1) {
                                $("#modification_modif13").prop('checked', true)

                            }

                            if (role_permission_details[12]['suppression'] == 1) {
                                $("#suppression_modif13").prop('checked', true)

                            }

                            if (role_permission_details[12]['duplicata'] == 1) {
                                $("#duplicata_modif13").prop('checked', true)

                            }

                            if (role_permission_details[12]['visualisation'] == 1) {
                                $("#visualisation_modif13").prop('checked', true)

                            }

                            if (role_permission_details[12]['exportation'] == 1) {
                                $("#exportation_modif13").prop('checked', true)

                            }
                            // Quatorze
                            if (role_permission_details[13]['lecture'] == 1) {
                                $("#lecture_modif14").prop('checked', true)

                            }
                            if (role_permission_details[13]['creation'] == 1) {
                                $("#creation_modif14").prop('checked', true)

                            }
                            if (role_permission_details[13]['modification'] == 1) {
                                $("#modification_modif14").prop('checked', true)

                            }

                            if (role_permission_details[13]['suppression'] == 1) {
                                $("#suppression_modif14").prop('checked', true)

                            }

                            if (role_permission_details[13]['duplicata'] == 1) {
                                $("#duplicata_modif14").prop('checked', true)

                            }

                            if (role_permission_details[13]['visualisation'] == 1) {
                                $("#visualisation_modif14").prop('checked', true)

                            }

                            if (role_permission_details[13]['exportation'] == 1) {
                                $("#exportation_modif14").prop('checked', true)

                            }
                            // Quinzieme
                            if (role_permission_details[14]['lecture'] == 1) {
                                $("#lecture_modif15").prop('checked', true)

                            }
                            if (role_permission_details[14]['creation'] == 1) {
                                $("#creation_modif15").prop('checked', true)

                            }
                            if (role_permission_details[14]['modification'] == 1) {
                                $("#modification_modif15").prop('checked', true)

                            }

                            if (role_permission_details[14]['suppression'] == 1) {
                                $("#suppression_modif15").prop('checked', true)

                            }

                            if (role_permission_details[14]['duplicata'] == 1) {
                                $("#duplicata_modif15").prop('checked', true)

                            }

                            if (role_permission_details[14]['visualisation'] == 1) {
                                $("#visualisation_modif15").prop('checked', true)

                            }

                            if (role_permission_details[14]['exportation'] == 1) {
                                $("#exportation_modif15").prop('checked', true)

                            }
                            // Seize
                            if (role_permission_details[15]['lecture'] == 1) {
                                $("#lecture_modif16").prop('checked', true)

                            }
                            if (role_permission_details[15]['creation'] == 1) {
                                $("#creation_modif16").prop('checked', true)

                            }
                            if (role_permission_details[15]['modification'] == 1) {
                                $("#modification_modif16").prop('checked', true)

                            }

                            if (role_permission_details[15]['suppression'] == 1) {
                                $("#suppression_modif16").prop('checked', true)

                            }

                            if (role_permission_details[15]['duplicata'] == 1) {
                                $("#duplicata_modif16").prop('checked', true)

                            }

                            if (role_permission_details[15]['visualisation'] == 1) {
                                $("#visualisation_modif16").prop('checked', true)

                            }

                            if (role_permission_details[15]['exportation'] == 1) {
                                $("#exportation_modif16").prop('checked', true)

                            }
                            // Dix-septieme
                            if (role_permission_details[16]['lecture'] == 1) {
                                $("#lecture_modif17").prop('checked', true)

                            }
                            if (role_permission_details[16]['creation'] == 1) {
                                $("#creation_modif17").prop('checked', true)

                            }
                            if (role_permission_details[16]['modification'] == 1) {
                                $("#modification_modif17").prop('checked', true)

                            }

                            if (role_permission_details[16]['suppression'] == 1) {
                                $("#suppression_modif17").prop('checked', true)

                            }

                            if (role_permission_details[16]['duplicata'] == 1) {
                                $("#duplicata_modif17").prop('checked', true)

                            }

                            if (role_permission_details[16]['visualisation'] == 1) {
                                $("#visualisation_modif17").prop('checked', true)

                            }

                            if (role_permission_details[16]['exportation'] == 1) {
                                $("#exportation_modif17").prop('checked', true)

                            }
                            // Dix-Huitieme (dossier et pieds de page)
                            if (role_permission_details[17]['lecture'] == 1) {
                                $("#lecture_modif18").prop('checked', true)

                            }
                            if (role_permission_details[17]['creation'] == 1) {
                                $("#creation_modif18").prop('checked', true)

                            }
                            if (role_permission_details[17]['modification'] == 1) {
                                $("#modification_modif18").prop('checked', true)

                            }

                            if (role_permission_details[17]['suppression'] == 1) {
                                $("#suppression_modif18").prop('checked', true)

                            }

                            if (role_permission_details[17]['duplicata'] == 1) {
                                $("#duplicata_modif18").prop('checked', true)

                            }

                            if (role_permission_details[17]['visualisation'] == 1) {
                                $("#visualisation_modif18").prop('checked', true)

                            }

                            if (role_permission_details[17]['exportation'] == 1) {
                                $("#exportation_modif18").prop('checked', true)

                            }

                    // }

                }
            }
        })
    });


    // suppression d'un role permission
    var that
    $('.text-body').on('click', function() {

        that = this
        var id = $(this).attr('data-id');

        //--------------- Confirm Options SWEET ALERT ---------------
        Swal.fire({
                title: 'Voulez vous vraiment supprimer ?',
                // text: '< ' + (dt_basic.row($(this).parents('tr')).data().numero_contrat) + ' > sera supprimé définitivement',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Oui, Supprimer !',
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
                        title: 'Suppression éffectuée !',
                        text: "' " + (dt_basic.row($(that).parents('tr')).data().libelle) + " ' a été supprimée avec succès.",
                        showConfirmButton: false,
                        timer: 1300,
                        customClass: {
                            confirmButton: 'btn btn-success'
                        }
                    });
                }
            });
            $('.swal2-confirm').on('click', function() {
                //Suppression Back
                $.ajax({
                    type: "GET",
                    data: "idSuppr=" + id, //Envois de l'id selectionné
                    url: "controllers/role_permission_controller.php",
                    success: function(result) {
                        var donneee = JSON.parse(result);
                        if (donneee['success'] === 'true') {
                            dt_basic.row($(that).parents('tr')).remove().draw() //Suppression de la ligne selectionnée

                        } else if (donneee['success'] === 'false') {
                            initializeFlash();
                            $('.flash').addClass('alert-danger');
                            $('.flash').html('<i class="fas fa-exclamation-circle"></i> ' + donneee['message'])
                                .fadeIn(300).delay(2500).fadeOut(300);
                        } else {
                            initializeFlash();
                            $('.flash').addClass('alert-danger');
                            $('.flash').html('<i class="fas fa-exclamation-circle"></i> Erreur inconnue')
                                .fadeIn(300).delay(2500).fadeOut(300);
                        }
                    }
                })
                window.location.reload();

            });    
    });

</script>