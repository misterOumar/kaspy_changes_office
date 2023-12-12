<script src="functions/functions.js"></script>
<?php include 'includes/toast.php' ?>
<?php include("views/components/alerts.php") ?>

<script src="functions/functions.js"></script>
<script>
    // VERIFICATIONS DU FORMULAIRE 
    // STEP 1
    var formValide = false;
    var NewCodeOTP = '';
    // Les événements en déhors du click
    $('#type_compte').on('change', function() {
        $('#type_compte').removeClass('is-invalid');
        $('#username').focus();
    });

    //      Gestion boutton radio
    $('#radio_homme').on('change', function() {
        $('#radio_homme').removeClass('is-invalid');
        $('#radio_femme').removeClass('is-invalid');
        $('#sexeHelp').html("");
        $('#sexeHelp').removeClass('invisible');
    });
    $('#radio_femme').on('change', function() {
        $('#radio_homme').removeClass('is-invalid');
        $('#radio_femme').removeClass('is-invalid');
        $('#sexeHelp').html("");
        $('#sexeHelp').removeClass('invisible');
    });

    //      Gestion OTP mail
    $('#code1').on('keyup', function() {
        $('#code2').focus();
        $('#code2').select();
    });
    $('#code2').on('keyup', function() {
        $('#code3').focus();
        $('#code3').select();
    });
    $('#code3').on('keyup', function() {
        $('#code4').focus();
        $('#code4').select();
    });
    $('#code4').on('keyup', function() {
        $('#code5').focus();
        $('#code5').select();
    });
    $('#code5').on('keyup', function() {
        $('#code6').focus();
        $('#code6').select();
    });


    formValide = true;
    //Au click du boutton
    $('#btn_next_1').on('click', function() {
        // Le type de compte
        let typecompte = $('#type_compte').val();
        if (typecompte === "Choisir un type de compte...") {
            formValide = false;
            $('#type_compte').addClass('is-invalid');

            // MessageBox - Toast
            $('.flash').addClass('alert-warning');
            $('.flash').html('<i class="fas fa-exclamation-triangle"></i> Veillez choisir un type de compte')
                .fadeIn(300).delay(2500).fadeOut(300);
            // MessageBox - Toast
            e.preventDefault()
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
            e.preventDefault()
        } else {
            formValide = true;
            $('#username').removeClass('is-invalid');
            $('#userHelp').addClass('invisible');
            $('#userHelp').html("");
        }

        // Le mot de passe
        var password = $('#password').val();
        if (password === '') {
            formValide = false;
            $('#password').addClass('is-invalid');
            $('#password').focus();
            $('#passwordHelp').html("Veillez saisir votre mot de passe.");
            $('#passwordHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#password').removeClass('is-invalid');
            $('#passwordHelp').addClass('invisible');
            $('#passwordHelp').html("");
        }

        // La comfirmation du mot de passe
        var confirmpassword = $('#confirm_password').val();
        if (confirmpassword === '') {
            formValide = false;
            $('#confirm_password').addClass('is-invalid');
            $('#confirm_password').focus();
            $('#confirmpasswordHelp').html("Veillez saisir votre mot de passe de confirmation.");
            $('#confirmpasswordHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#confirm_password').removeClass('is-invalid');
            $('#confirmpasswordHelp').addClass('invisible');
            $('#confirmpasswordHelp').html("");
        }

        // Les mots de passe différents
        if (password != confirmpassword) {
            formValide = false;
            $('#password').addClass('is-invalid');
            $('#confirm_password').addClass('is-invalid');

            // MessageBox - Toast
            $('.flash').addClass('alert-warning');
            $('.flash').html('<i class="fas fa-exclamation-triangle"></i> Les mots de passes sont différents')
                .fadeIn(300).delay(2500).fadeOut(300);
            // MessageBox - Toast
            e.preventDefault()
        } else {
            formValide = true;
            $('#password').removeClass('is-invalid');
            $('#confirm_password').removeClass('is-invalid');
        }

        // Le mots de passe doit contenir au moins 4 carractères
        if (confirmpassword.length < 4) {

            formValide = false;
            $('#password').addClass('is-invalid');
            $('#confirm_password').addClass('is-invalid');

            // MessageBox - Toast
            $('.flash').addClass('alert-warning');
            $('.flash').html('<i class="fas fa-exclamation-triangle"></i> Les mots de passes doivent contenir au moins 4 caratères')
                .fadeIn(300).delay(2500).fadeOut(300);
            // MessageBox - Toast
            e.preventDefault()
        } else {
            formValide = true;
            $('#password').removeClass('is-invalid');
            $('#confirm_password').removeClass('is-invalid');
        }
    });


    // STEP 2
    // Chargement de l'image de profile
    $("#bt_charger_photo").click(function() {
        $("#photo_profile").click();
    });
    $("#image_profile-img").click(function() {
        $("#photo_profile").click();
    });
    //Annulation de l'image de profile et chargement de l'image par défaut
    $("#photo_profile-reset").click(function() {
        $("#image_profile-img").attr('src', "assets/images/users/user_default.jpg")
    });


    $('#btn_next_2').on('click', function() {
        // Photo de profile
        var uploadpath = $("#image_profile-img").attr('src');
        var fileExtension = uploadpath.substring(uploadpath.lastIndexOf(".") + 1, uploadpath.length);
        var verfilextension = false
        if (uploadpath.includes("data:image/png;base64,") === true || uploadpath.includes("data:image/jpg;base64,") === true || uploadpath.includes("data:image/jpeg;base64,") === true || uploadpath.includes("data:image/bmp;base64,") === true) {
            verfilextension = true
        } else {
            verfilextension = false
        }

        if (verfilextension === true || fileExtension === "png" || fileExtension === "jpg" || fileExtension === "jpeg" || fileExtension === "bmp") {} else {
            //MessageBox - Toast
            $('.flash').addClass('alert-warning');
            $('.flash').html('<i class="fas fa-exclamation-triangle"></i> Veillez charger une image valide (.png ; .jpg ; .jpeg ; .bmp)')
                .fadeIn(300).delay(2500).fadeOut(300);
            // MessageBox - Toast

            formValide = false;
            e.preventDefault()
        }

        // Sexe
        if ($("#radio_homme").is(":checked") || $("#radio_femme").is(":checked")) {
            formValide = true;
            $('#radio_homme').removeClass('is-invalid');
            $('#radio_femme').removeClass('is-invalid');
            $('#sexeHelp').html("");
            $('#sexeHelp').removeClass('invisible');
        } else {
            formValide = false;
            $('#radio_homme').addClass('is-invalid');
            $('#radio_femme').addClass('is-invalid');
            $('#sexeHelp').html("Veillez choisir votre sexe");
            $('#sexeHelp').removeClass('invisible');
            e.preventDefault()
        }


        // Le nom et prénoms
        var user = $('#nom').val();
        if (user === '') {
            formValide = false;
            $('#nom').addClass('is-invalid');
            $('#nomHelp').html("Veillez saisir votre nom et prénom(s).");
            $('#nomHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#nom').removeClass('is-invalid');
            $('#nomHelp').addClass('invisible');
            $('#nomHelp').html("");
        }

        // Le contact
        var contact = $('#contact').val();
        if (contact != '' && validatePhone(contact) === false) {
            formValide = false;
            $('#contact').addClass('is-invalid');
            $('#contactHelp').html('Veillez saisir le Tel.');
            $('#contactHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#contact').removeClass('is-invalid');
            $('#contactHelp').html('');
            $('#contactHelp').addClass('invisible');
        }

        // L'email
        var email = $('#email').val();
        if (email != '' && isEmail(email) === false) {
            formValide = false;
            $('#email').addClass('is-invalid');
            $('#emailHelp').html('Veillez saisir un email valide');
            $('#emailHelp').removeClass('invisible');
            e.preventDefault()
        } else {
            formValide = true;
            $('#email').removeClass('is-invalid');
            $('#emailHelp').html('');
            $('#emailHelp').addClass('invisible');
        }

        // Vérification si le nom d'utilisateur existe déjà
        $.ajax({
            type: "GET",
            data: "Verif_user=" + user, //Envois de l'email pour test'
            url: "controllers/logon_controller.php",
            success: function(result) {
                var donneee = JSON.parse(result);
                console.log(result)
                console.log(donneee)
                if (donneee['success'] === 'true') {
                    initializeFlash();
                    $('.flash').addClass('alert-danger');
                    $('.flash').html('<i class="fas fa-check"></i> ' + donneee['message'])
                        .fadeIn(300).delay(2500).fadeOut(300);

                    $('#user').addClass('is-invalid');
                    $('#userHelp').html("Ce nom d'utilisateur exite déjà");
                    $('#userHelp').removeClass('invisible');

                    formValide = false;
                    e.preventDefault()
                } else {
                    formValide = true;
                    $('#user').removeClass('is-invalid');
                    $('#userHelp').addClass('invisible');
                    $('#userHelp').html("");
                }
            }
        })


        // Vérification si l'email existe déjà
        $.ajax({
            
            type: "GET",
            data: "Verif_email=" + email, //Envois de l'email pour test'
            url: "controllers/logon_controller.php",
            success: function(result) {
                var donneee = JSON.parse(result);

                if (donneee['success'] === 'true') {
                    initializeFlash();
                    $('.flash').addClass('alert-danger');
                    $('.flash').html('<i class="fas fa-check"></i> ' + donneee['message'])
                        .fadeIn(300).delay(2500).fadeOut(300);

                    $('#email').addClass('is-invalid');
                    $('#emailHelp').html("Ce email est déjà utilisé");
                    $('#emailHelp').removeClass('invisible');

                    formValide = false;
                    e.preventDefault()
                } else {
                    NewCodeOTP = donneee['otp'];
                    formValide = true;
                    $('#email').removeClass('is-invalid');
                    $('#emailHelp').addClass('invisible');
                    $('#emailHelp').html("");
                }
            }
        })

        //Cacher le mail
        var fakemail = $('#email').val().substring(0, 5);
        $('#cacher_email').html(fakemail + '*****');
    });



    // STEP 3
    $('#code6').on('keyup', function() {

    });
    // var NewCodeOTP = 123456;
    $('#bt_verifier_compte').on('click', function(e) {
        // Détermination du code otp saisi par l'utilisateur
        var codeopt_user
        codeopt_user = parseInt($('#code1').val() + $('#code2').val() + $('#code3').val() + $('#code4').val() + $('#code5').val() + $('#code6').val());
        // alert(codeopt_user);

        if (isNaN(codeopt_user)) { // Vérifi si c'est null
            // MessageBox - Toast
            $('.flash').addClass('alert-warning');
            $('.flash').html('<i class="fas fa-exclamation-triangle"></i> Veillez saisir le code de vérification transmit')
                .fadeIn(300).delay(2500).fadeOut(300);
            // MessageBox - Toast
            e.preventDefault();
        } else if (codeopt_user != NewCodeOTP) {

            // MessageBox - Toast
            $('.flash').addClass('alert-danger');
            $('.flash').html('<i class="fas fa-exclamation-triangle"></i> le code de vérification saisi est invalide ou à expiré')
                .fadeIn(300).delay(2500).fadeOut(300);
            // MessageBox - Toast
            e.preventDefault();
        } else if (codeopt_user == NewCodeOTP) {
            // alert('Super bon code');
            // MessageBox - Toast
            swal_Alert_Sucess('Compte vérifié avec succès')
            // MessageBox - Toast
            $('#bt_enregistrer').css('display', 'block');            
            e.preventDefault();
        }
    });


    // ENREGISTREMENT
    $('#bt_enregistrer').on('click', function(e) {
        // Définition du sexe et gestion de la valeur des radios
        var sexe;
        if ($("#radio_homme").is(":checked")) {
            sexe = $("#radio_homme").val();
        } else {
            sexe = $("#radio_femme").val();
        }


        //Si pas de photo alors choisir l'image de profile par défaut
        var nom_image_profile
        if ($('#photo_profile').val() === '') {
            nom_image_profile = "user_default.jpg"
        } else {
            nom_image_profile = $('#photo_profile').val()
        }


        if (formValide) {
            // Création dans la base de donnée
            var fd = new FormData();
            var files = $('#photo_profile')[0].files;
            fd.append('file_photo', files[0]);
            fd.append('nom_prenom', $('#nom').val());
            fd.append('users', $('#username').val());
            fd.append('password', $('#password').val());
            fd.append('type_compte', $('#type_compte').val());
            fd.append('sex', sexe);
            fd.append('adresse', $('#adresse').val());
            fd.append('tel1', $('#contact').val());
            fd.append('email', $('#email').val());
            fd.append('date_naissance', $('#date_naissance').val());
            fd.append('fonction', $('#fonction').val());
            fd.append('photo', nom_image_profile);
            fd.append('otp', "0000");
            fd.append('bt_enregistrer', '');


            //Initialisation des email et nom d'utilisateur
            $('#nom').removeClass('is-invalid');
            $('#nomHelp').addClass('invisible');
            $('#nomHelp').html("");
            $('#email').removeClass('is-invalid');
            $('#emailHelp').addClass('invisible');
            $('#emailHelp').html("");

            $.ajax({
                url: 'controllers/logon_controller.php',
                type: 'POST',
                data: fd,
                processData: false,
                contentType: false,
                success: function(result) {
                    var donnee = JSON.parse(result);

                    if (donnee['success'] === 'existe_user') {
                        $('#username').addClass('is-invalid');
                        $('#usernameHelp').html(donnee['message']);
                        $('#usernameHelp').removeClass('invisible');

                        $('.flash').html('<i class="fas fa-exclamation-circle"></i> ' + donnee['message'])
                            .fadeIn(300).delay(2500).fadeOut(300);

                        formValide = false;
                    }
                    if (donnee['success'] === 'existe_email') {
                        $('#email').addClass('is-invalid');
                        $('#emailHelp').html(donnee['message']);
                        $('#emailHelp').removeClass('invisible');

                        $('.flash').html('<i class="fas fa-exclamation-circle"></i> ' + donnee['message'])
                            .fadeIn(300).delay(2500).fadeOut(300);

                        formValide = false;
                    }
                    if (donnee['success'] === 'false') {
                        initializeFlash();
                        $('.flash').addClass('alert-danger');
                        $('.flash').html('<i class="fas fa-exclamation-circle"></i>' + donnee['message'])
                            .fadeIn(300).delay(2500).fadeOut(300);

                        formValide = false;
                        e.preventDefault();
                    }
                    if (donnee['success'] === 'true') {
                        formValide = true;

                        // Top End -- SWEET ALERT
                        Swal.fire({
                            //height:'100px',
                            width: '400px',
                            position: 'top-end',
                            icon: 'success',
                            title: donnee['message'],
                            showConfirmButton: false,
                            timer: 1500,
                            customClass: {
                                confirmButton: 'btn btn-primary'
                            },
                            buttonsStyling: false
                        });

                        //Rédirection vers login
                        location.href = "index.php?page=login";
                    }
                }
            });
        }
    });



    //********************************************************************* */
    //          GESTION DU STEPPER
    var wizardExample = document.querySelector('.Kaspy_Stepper')
    var numberedStepper = new Stepper(wizardExample)

    // Les bouttons suivant
    $('#btn_next_1').on('click', function(e) {
        if (formValide) {
            numberedStepper.next();
        } else {
            e.preventDefault();
        }
    })
    $('#btn_next_2').on('click', function(e) {
        console.log("je suis le boutton 2")
        console.log(formValide)
        if (formValide) {
            numberedStepper.next();
        } else {
            e.preventDefault();
        }
    })

    // Les bouttons précédent
    $('#btn_prev_1').on('click', function(e) {
        //Rédirection vers login
        location.href = "index.php?page=login";
    })
    $('#btn_prev_2').on('click', function(e) {
        numberedStepper.previous()
    })
    $('#btn_prev_3').on('click', function(e) {
        numberedStepper.previous()
    })
</script>