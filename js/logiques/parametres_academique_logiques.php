<link rel="stylesheet" type="text/css" href="css/plugins/extensions/ext-component-sweet-alerts.css">
<link rel="stylesheet" type="text/css" href="css/plugins/animate/animate.min.css">
<link rel="stylesheet" type="text/css" href="css/plugins/extensions/sweetalert2.min.css">

<script src="functions/functions.js"></script>

<script>
    // VERIFICATIONS DU FORMULAIRE 
    var formValide = false;
    //      Les événements en déhors du click du boutton de validation
    $('#type_ets').on('change', function() {
        $('#type_ets').removeClass('is-invalid');
        $('#type_etsHelp').addClass('invisible');
        $('#type_etsHelp').html('');
    });
    $('#format_matricule').on('change', function() {
        $('#format_matricule').removeClass('is-invalid');
        $('#format_matriculeHelp').addClass('invisible');
        $('#format_matriculeHelp').html('');
    });
    $('#devise_pays').on('keydown', function() {
        $('#devise_pays').removeClass('is-invalid');
        $('#devise_paysHelp').addClass('invisible');
        $('#devise_paysHelp').html('');
    });
    $('#parametre_matricule').on('change', function() {
        $('#parametre_matricule').removeClass('is-invalid');
        $('#parametre_matriculeHelp').addClass('invisible');
        $('#parametre_matriculeHelp').html('');
    });
    $('#conduite_manuel').on('change', function() {
        $('#mode_conduite_auto').removeClass('d-block')
        $('#mode_conduite_auto').addClass('d-none');
    })
    $('#conduite_automatique').on('change', function() {
        $('#mode_conduite_auto').removeClass('d-none')
        $('#mode_conduite_auto').addClass('d-block');
    })



    $('#format_matricule').on('change', function() {
        let format_matricule = $('#format_matricule').val();
        if (format_matricule === "Format paramétrable") {
            $('#formats_defaut').removeClass('d-none');
            $('#formats_defaut').addClass('d-block');
        } else {
            $('#formats_defaut').addClass('d-none');
            $('#formats_defaut').removeClass('d-block');
        }

        var text = format_matricule;
        text = text.replace("PréfixeAnnée", "22");
        text = text.replace("Années", "2022");
        text = text.replace("IndexNumérotationGlobal", "0001");
        text = text.replace("CodeMatriculeFilière", "FC");
        text = text.replace("IndexNumérotationAnnuel", "0001");
        text = text.replace("CodeMatriculeNiveau", "L1");
        text = text.replace("LettreAléatoire", "K");
        text = text.replace("Filières", "FCGE");
        $('#parametre_matricule').val(text)
    });
    $(document).ready(function() {
        $(".chkbx").click(function() {
            var separe = $("#separateur").val();
            var list_format = [];
            if (separe === "Choisir le séparateur...") {
                separe = ""
            }
            let texte = "";
            $(".chkbx:checked").each(function() {
                texte += $(this).val() + separe;
                // text = text.substring(0, text.length)
                // list_format.push(texte)
            });

            $('#parametre_matricule').val(texte)
        })
    });


    $('#moy_max_conduite').TouchSpin({
        min: 10,
        max: 20,
        step: 0.5,
        decimals: 1,
        boostat: 5,
        maxboostedstep: 10,
    });

    $('#correspondance_conduite').TouchSpin({
        min: 0,
        max: 20,
        step: 0.5,
        decimals: 1,
        boostat: 5,
        maxboostedstep: 10,
    });
    $('#retrait_conduite').TouchSpin({
        min: 0,
        max: 20,
        step: 0.5,
        decimals: 1,
        boostat: 5,
        maxboostedstep: 10,
    });




    //      Au click du boutton MAJ
    $('#bt_maj_form1').on('click', function() {
        // Le type d'établissement
        let typeets = $('#type_ets').val();
        if (typeets === "Choisir le type d'établissement...") {
            formValide = false;
            $('#type_ets').addClass('is-invalid');
            $('#type_etsHelp').removeClass('invisible');
            $('#type_etsHelp').html("Veuillez choisir le type d'établissement");
            e.preventDefault()
        } else {
            formValide = true;
            $('#type_ets').removeClass('is-invalid');
            $('#type_etsHelp').addClass('invisible');
            $('#type_etsHelp').html('');
        }

        // La devise du pays
        var devise = $('#devise_pays').val();
        if (devise === '') {
            formValide = false;
            $('#devise_pays').addClass('is-invalid');
            $('#devise_paysHelp').html("Veillez saisir la devise du pays.");
            $('#devise_paysHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#devise_pays').removeClass('is-invalid');
            $('#devise_paysHelp').addClass('invisible');
            $('#devise_paysHelp').html("");
        }


        // Cas ou tout est OK
        if (formValide === true) {

            Swal.fire({
                title: 'Voulez vous vraiment mettre à jour votre bureau?',
                text: 'Une reconnexion sera néccessaire',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Oui, mettre à jour !',
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
                        title: 'Mise à jour éffectuée !',
                        text: "Votre bureau est actuellement à jour.",
                        customClass: {
                            confirmButton: 'btn btn-success'
                        }
                    });
                }
            });
            $('.swal2-confirm').on('click', function() {

                var form = $('#form1_maj');
                var method = form.prop('method');
                var url = form.prop('action');

                $.ajax({
                    type: method,
                    data: form.serialize() + "&bt_maj_form1=" + true,
                    url: url,
                    success: function(result) {
                        var donnee = JSON.parse(result);



                        if (donnee['success'] === 'true') {

                            $('#type_ets').val("Choisir le type d'établissement...");
                            $('#type_etsHelp').html("").addClass('invisible');

                            //Rédirection vers login
                            location.href = "index.php?page=parametres_academique";
                        }
                    }
                });

                if (donnee['success'] === 'false') {
                    $('#type_etsHelp').html(donnee['type_ets']).removeClass('invisible');
                    initializeFlash();
                    $('.flash').addClass('alert-danger');
                    $('.flash').html('<i class="fas fa-exclamation-circle"></i> ' + donnee['message'])
                        .fadeIn(300).delay(2500).fadeOut(300);
                    e.preventDefault()
                }
            });
        }
    });



    //      Au click du boutton bt_maj_form2
    $('#bt_matricule_conduite').on('click', function() {
        var mode_incrementation_mat
        if ($("#homeIcon-tab").hasClass("active")) {
            mode_incrementation_mat = "Automatique"
        } else {
            mode_incrementation_mat = "Manuel"
        }
        var mode_conduite;
        if ($("#conduite_automatique").is(":checked")) {
            mode_conduite = $("#conduite_automatique").val();
        } else {
            mode_conduite = $("#conduite_manuel").val();
        }

        // Le format_matricule
        let format_matricule = $('#format_matricule').val();
        if (format_matricule === "Choisir le format des matricules par défaut...") {
            formValide = false;
            $('#format_matricule').addClass('is-invalid');
            $('#format_matriculeHelp').removeClass('invisible');
            $('#format_matriculeHelp').html("Veuillez choisir choisir un format");
            e.preventDefault()
        } else {
            formValide = true;
            $('#format_matricule').removeClass('is-invalid');
            $('#format_matriculeHelp').addClass('invisible');
            $('#tformat_matriculeHelp').html('');
        }
        // La parametre matricule
        var parametre_matricule = $('#parametre_matricule').val();
        if (parametre_matricule === '') {
            formValide = false;
            $('#parametre_matricule').addClass('is-invalid');
            $('#parametre_matriculeHelp').html("Veuillez selectionner un format svp !");
            $('#parametre_matriculeHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#parametre_matricule').removeClass('is-invalid');
            $('#parametre_matriculeHelp').addClass('invisible');
            $('#parametre_matriculeHelp').html("");
        }

        // Cas ou tout est OK
        if (formValide === true) {

            Swal.fire({
                title: 'Voulez vous vraiment mettre à jour votre bureau?',
                text: 'Une reconnexion sera néccessaire',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Oui, mettre à jour !',
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
                        title: 'Mise à jour éffectuée !',
                        text: "Votre bureau est actuellement à jour.",
                        customClass: {
                            confirmButton: 'btn btn-success'
                        }
                    });
                }
            });
            $('.swal2-confirm').on('click', function() {

                var form = $('#form_matricule_conduite');
                var method = form.prop('method');
                var url = form.prop('action');

                $.ajax({
                    type: method,
                    data: form.serialize() + "&mode_inc_mat=" + mode_incrementation_mat + "&mode_conduite=" + mode_conduite + "&bt_matricule_conduite=" + true,
                    url: url,
                    success: function(result) {
                        var donnee = JSON.parse(result);

                        if (donnee['success'] === 'true') {
                            //Rédirection vers login
                            // location.href = "index.php?page=parametres_academique";
                        }
                    }
                });

                if (donnee['success'] === 'false') {
                    $('#parametre_matriculeHelp').html(donnee['type_ets']).removeClass('invisible');
                    initializeFlash();
                    $('.flash').addClass('alert-danger');
                    $('.flash').html('<i class="fas fa-exclamation-circle"></i> ' + donnee['message'])
                        .fadeIn(300).delay(2500).fadeOut(300);
                    e.preventDefault()
                }
            });
        }
    })

</script>

<script src="js/template/extensions/ext-component-sweet-alerts.js"></script>
<script src="js/template/extensions/sweetalert2.all.min.js"></script>
<script src="js/template/extensions/extensions/polyfill.min.js"></script>