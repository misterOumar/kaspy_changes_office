<script src="functions/functions.js"></script>
<script>
    // VERIFICATIONS SUPPLEMENTAIRE AVANT DE RENDRE DISPONIBLE LE BOUTTON SE CONNECTER
    var formValide = false;
    var user
    var password
    var bureau
    var annee

    $('#login_form').on('mouseover', function() {
        user = $('#login_user').val();
        password = $('#login_password').val();
        bureau = $('#bureau').val();
        annee = $('#annee').val();

        if (user === '' || password === '' || bureau === "Choisir le bien" || annee === "Choisir l'année ...") {
            formValide = false;
            $('#bt_login').attr('disabled', true);
        } else {
            formValide = true;
            $('#bt_login').attr('disabled', false);
        }
    });


    // VERIFICATIONS DU FORMULAIRE
    $('#bt_login').on('click', (function() {
        //Le nom d'utilisateur
        if (user === '') {
            formValide = false;
            $('#login_user').addClass('is-invalid');
            $('#userHelp').html("Veillez saisir votre nom d'utilisateur.");
            $('#userHelp').removeClass('invisible');
        } else {
            formValide = true;
            $('#login_user').removeClass('is-invalid');
            $('#userHelp').addClass('invisible');
            $('#userHelp').html("");
        }

        // Le mot de passe
        if (password === '') {
            formValide = false;
            $('#login-password').addClass('is-invalid');
            $('#passwordHelp').html("Veillez saisir votre mot de passe.");
            $('#passwordHelp').removeClass('invisible');
        } else {
            formValide = true;
            $('#login-password').removeClass('is-invalid');
            $('#passwordHelp').addClass('invisible');
            $('#passwordHelp').html("");
        }

        // L'école
        if (bureau === "Choisir le bien...") {
            formValide = false;

            // MessageBox - Toast
            $('.flash').addClass('alert-danger');
            $('.flash').html('<i class="fas fa-exclamation-triangle" style="color:orange;"></i> Veuillez choisir le bien')
                .fadeIn(300).delay(2500).fadeOut(300);
            // MessageBox - Toast
        } else {
            formValide = true;
        }

        // L'année de gestion
        if (annee === "Choisir l'année...") {
            formValide = false;

            // MessageBox - Toast
            $('.flash').addClass('alert-danger');
            $('.flash').html('<i class="fas fa-exclamation-triangle" style="color:orange;"></i> Veuillez choisir l\'année de gestion')
                .fadeIn(300).delay(2500).fadeOut(300);
            // MessageBox - Toast
        } else {
            formValide = true;
        }
    }))


    // CONNEXION DE L'UTILISATEUR
    $('#login_form').on('submit', function(e) {
        e.preventDefault(); // Annuler le comportement par defaut du formulaire
        initializeFlash();

        if (formValide === true) {
            $('.flash').addClass('alert-info');
            $('.flash').html('<i class="fas fa-cog fa-spin"></i> Authentification...').fadeIn(300);

            var form = $(this);
            var method = form.prop('method');
            var url = form.prop('action');

            $.ajax({
                type: method,
                data: form.serialize() + "&bt_login=" + true,
                url: url,
                success: function(result) {
                    donnee = JSON.parse(result);
                    if (donnee['result'] === 'ok') {
                        $('#userdHelp').html("");
                        $('#passwordHelp').html("");
                        $('#userIdHelp').addClass('invisible');

                        // MessageBox - Toast
                        $('.flash').removeClass('alert-info').addClass('alert-success');
                        $('.flash').html('<i class="fas fa-spinner fa-spin"></i> Connexion établie, redirection...')
                            .fadeIn(300).delay(2500).fadeOut(300);
                        // MessageBox - Toast

                        window.location.href = "index.php?page=home";
                    } else {
                        $('#loginIdHelp').html(donnee['erreur']);
                        $('#loginIdHelp').removeClass('invisible');

                        // MessageBox - Toast
                        $('.flash').removeClass('alert-info').addClass('alert-danger');
                        $('.flash').html('<i class="fas fa-exclamation-circle"></i> ' + donnee['erreur'])
                            .fadeIn(300).delay(2500).fadeOut(300);
                        // MessageBox - Toast
                    }
                }
            });
        }
    })


    // GESTION DU ROOTING ET DES BUREAUX
    $('#bureau').on('change', function() {
        var bureauchoisi = $('#bureau').val();
        $.ajax({
            type: "GET",
            data: "rooting_bureau=" + bureauchoisi,
            url: "controllers/actions.php",
            success: function(result) {
                var donnees = JSON.parse(result)
                if (donnees['success'] === 'true') {

                    //Rédirection vers home
                    // location.href = "index.php?page=home";
                    $('#bureau').val(bureauchoisi);
                }
            }
        });
    });
</script>