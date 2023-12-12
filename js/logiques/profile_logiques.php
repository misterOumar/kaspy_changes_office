<link rel="stylesheet" type="text/css" href="css/plugins/extensions/ext-component-sweet-alerts.css">
<link rel="stylesheet" type="text/css" href="css/plugins/animate/animate.min.css">
<link rel="stylesheet" type="text/css" href="css/plugins/extensions/sweetalert2.min.css">

<script src="functions/functions.js"></script>

<script>
    // VERIFICATIONS DU FORMULAIRE 
    var formValide = false;

    //      Les événements en déhors du click du boutton de validation
    $('#nom_prenom').on('keydown', function() {
        $('#nom_prenom').removeClass('is-invalid');
        $('#nomHelp').html('');
        $('#nomHelp').addClass('invisible');
    });
    $('#tel1').on('keydown', function() {
        $('#tel1').removeClass('is-invalid');
        $('#contactHelp').html('');
        $('#contactHelp').addClass('invisible');
    });
    $('#email').on('keydown', function() {
        $('#email').removeClass('is-invalid');
        $('#emailHelp').html('');
        $('#emailHelp').addClass('invisible');
    });

    $('#type_compte').on('change', function() {
        $('#type_compte').removeClass('is-invalid');
        $('#username').focus();
        $('#type_compteHelp').addClass('invisible');
    });
    $('#password').on('keydown', function() {
        $('#password').removeClass('is-invalid');
        $('#password').focus();
        $('#passwordHelp').addClass('invisible');
    });
    $('#new_password').on('keydown', function() {
        $('#new_password').removeClass('is-invalid');
        $('#new_password').focus();
        $('#new_passwordHelp').addClass('invisible');
    });
    $('#confirm_password').on('keydown', function() {
        $('#confirm_password').removeClass('is-invalid');
        $('#confirm_password').focus();
        $('#confirm_passwordHelp').addClass('invisible');
    });

    //      Au click du boutton MAJ
    $('#bt_maj').on('click', function() {
        // Cas de - Nom
        var nom = $('#nom_prenom').val();
        if (nom === '') {
            formValide = false;
            $('#nom_prenom').addClass('is-invalid');
            $('#nomHelp').html('Veillez saisir vitre nom et prénom.');
            $('#nomHelp').removeClass('invisible');
        } else {
            formValide = true;
            $('#nom_prenom').removeClass('is-invalid');
            $('#nomHelp').html('');
            $('#nomHelp').addClass('invisible');
        }
        // Cas de - Contact
        var contact = $('#tel1').val();
        if (contact != '' && validatePhone(contact) === false) {
            formValide = false;
            $('#tel1').addClass('is-invalid');
            $('#contactHelp').html('Veillez saisir le contact valide');
            $('#contactHelp').removeClass('invisible');
        } else {
            formValide = true;
            $('#contact').removeClass('is-invalid');
            $('#contactHelp').html('');
            $('#contactHelp').addClass('invisible');
        }
        // Cas de - Email
        var email = $('#email').val();
        if (email != '' && isEmail(email) === false) {
            formValide = false;
            $('#email').addClass('is-invalid');
            $('#emailHelp').html('Veillez saisir un email valide');
            $('#emailHelp').removeClass('invisible');
        } else {
            formValide = true;
            $('#email').removeClass('is-invalid');
            $('#emailHelp').html('');
            $('#emailHelp').addClass('invisible');
        }

        // Cas ou tout est OK
        if (formValide === true) {
            Swal.fire({
                title: 'Voulez vous vraiment mettre à jour votre profile ?',
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
                        text: "Votre profil est actuellement à jour.",
                        customClass: {
                            confirmButton: 'btn btn-success'
                        }
                    });
                }
            });
            $('.swal2-confirm').on('click', function() {
                var form = $('#form_maj');
                var method = form.prop('method');
                var url = form.prop('action');

                $.ajax({
                    type: method,
                    data: form.serialize() + "&bt_maj=" + true,
                    url: url,
                    success: function(result) {
                        var donnee = JSON.parse(result);
                        if (donnee['success'] === 'existe') {
                            $('#nom_prenom').addClass('is-invalid');
                            $('#nomHelp').html(donnee['message']);
                            $('#nomHelp').removeClass('invisible');
                        }

                        if (donnee['success'] === 'true') {
                            $('#nom_prenom').val("");
                            $('#nomHelp').html("").addClass('invisible');

                            //Rédirection vers login
                            location.href = "index.php?page=login";
                        }
                    }
                });

                if (donnee['success'] === 'false') {
                    $('#nomHelp').html(donnee['nom_prenom']).removeClass('invisible');
                    initializeFlash();
                    $('.flash').addClass('alert-danger');
                    $('.flash').html('<i class="fas fa-exclamation-circle"></i> ' + donnee['message'])
                        .fadeIn(300).delay(2500).fadeOut(300);
                    e.preventDefault()
                }
            });
        }
    });




    //      Au click du boutton MAJ MDP
    $('#bt_maj_mdp').on('click', function() {
        // Le type de compte
        let typecompte = $('#type_compte').val();
        if (typecompte === "Choisir un type de compte...") {
            formValide = false;
            $('#type_compte').addClass('is-invalid');
        } else {
            formValide = true;
            $('#type_compte').removeClass('is-invalid');
        }

        // Le nom d'utilisateur
        var user = $('#username').val();
        if (user === '') {
            formValide = false;
            $('#username').addClass('is-invalid');
            $('#userHelp').html("Veillez saisir votre nom d'utilisateur.");
            $('#userHelp').removeClass('invisible');
        } else {
            formValide = true;
            $('#username').removeClass('is-invalid');
            $('#userHelp').addClass('invisible');
            $('#userHelp').html("");
        }

        // L'ancien mot de passe
        var password = $('#password').val();
        if (password === '') {
            formValide = false;
            $('#password').addClass('is-invalid');
            $('#password').focus();
            $('#passwordHelp').html("Veillez saisir votre ancien mot de passe.");
            $('#passwordHelp').removeClass('invisible');
            e.preventDefault();

        } else {
            formValide = true;
            $('#password').removeClass('is-invalid');
            $('#passwordHelp').addClass('invisible');
            $('#passwordHelp').html("");
        }

        // Le nouveau mot de passe
        var newpassword = $('#new_password').val();
        if (newpassword === '') {
            formValide = false;
            $('#new_password').addClass('is-invalid');
            $('#new_password').focus();
            $('#new_passwordHelp').html("Veillez saisir votre mot de passe.");
            $('#new_passwordHelp').removeClass('invisible');
            e.preventDefault();

        } else {
            formValide = true;
            $('#new_password').removeClass('is-invalid');
            $('#new_passwordHelp').addClass('invisible');
            $('#new_passwordHelp').html("");
        }

        // La comfirmation du mot de passe
        var confirmpassword = $('#confirm_password').val();
        if (confirmpassword === '') {
            formValide = false;
            $('#confirm_password').addClass('is-invalid');
            $('#confirm_password').focus();
            $('#confirmpasswordHelp').html("Veillez saisir votre mot de passe de confirmation.");
            $('#confirmpasswordHelp').removeClass('invisible');
            e.preventDefault();

        } else {
            formValide = true;
            $('#confirm_password').removeClass('is-invalid');
            $('#confirmpasswordHelp').addClass('invisible');
            $('#confirmpasswordHelp').html("");
        }

        // Le mots de passe doit contenir au moins 4 carractères
        if (confirmpassword.length < 4) {
            formValide = false;
            $('#new_password').addClass('is-invalid');
            $('#confirm_password').addClass('is-invalid');


            Swal.fire({
                //height:'100px',
                width: '400px',
                position: 'top-end',
                icon: 'success',
                title: 'Les mots de passes doivent contenir au moins 4 carractères',
                showConfirmButton: false,
                timer: 1500,
                customClass: {
                    confirmButton: 'btn btn-primary'
                },
                buttonsStyling: false
            });

        } else {
            formValide = true;
            $('#password').removeClass('is-invalid');
            $('#confirm_password').removeClass('is-invalid');
        }

        // Les mots de passe différents
        if (newpassword !== confirmpassword) {
            formValide = false;
            $('#new_password').addClass('is-invalid');
            $('#confirm_password').addClass('is-invalid');

            Swal.fire({
                //height:'100px',
                width: '400px',
                position: 'top-end',
                icon: 'success',
                title: 'Les mots de passes dsont différents',
                showConfirmButton: false,
                timer: 1500,
                customClass: {
                    confirmButton: 'btn btn-primary'
                },
                buttonsStyling: false
            });

        } else {
            formValide = true;
            $('#new_password').removeClass('is-invalid');
            $('#confirm_password').removeClass('is-invalid');
        }



        // Cas ou tout est OK
        if (formValide === true) {
            Swal.fire({
                title: 'Voulez vous vraiment modifier votre mot de passe ?',
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
            });
            $('.swal2-confirm').on('click', function() {
                var form = $('#form_maj_mdp');
                var method = form.prop('method');
                var url = form.prop('action');

                $.ajax({
                    type: method,
                    data: form.serialize() + "&bt_maj_mdp=" + true,
                    url: url,
                    success: function(result) {
                        var donnee = JSON.parse(result);
                        if (donnee['success'] === 'true') {
                            $('#nom_prenom').val("");
                            $('#nomHelp').html("").addClass('invisible');

                            Swal.fire({
                                icon: 'success',
                                title: 'Mise à jour éffectuée !',
                                text: "Votre profil est actuellement à jour.",
                                customClass: {
                                    confirmButton: 'btn btn-success'
                                }
                            });

                            //Rédirection vers login
                            //location.href = "index.php?page=login";
                        } else if (donnee['success'] === 'false') {
                            if (donnee['verf'] === 'false') {
                                $('#loginIdHelp').html(donnee['erreur']);
                                $('#loginIdHelp').removeClass('invisible');

                                Swal.fire({
                                    icon: 'danger',
                                    title: 'Mise à jour éffectuée !',
                                    text: donnee['erreur'],
                                    customClass: {
                                        confirmButton: 'btn btn-success'
                                    }
                                });

                            } else {
                                Swal.fire({
                                    icon: 'danger',
                                    title: 'Mise à jour éffectuée !',
                                    text: donnee['message'],
                                    customClass: {
                                        confirmButton: 'btn btn-success'
                                    }
                                });
                            }
                        }
                    }
                });
            });
        }
    });
</script>

<script src="js/template/extensions/ext-component-sweet-alerts.js"></script>
<script src="js/template/extensions/sweetalert2.all.min.js"></script>
<script src="js/template/extensions/extensions/polyfill.min.js"></script>