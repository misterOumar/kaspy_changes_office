<link rel="stylesheet" type="text/css" href="css/plugins/extensions/ext-component-sweet-alerts.css">
<link rel="stylesheet" type="text/css" href="css/plugins/animate/animate.min.css">
<link rel="stylesheet" type="text/css" href="css/plugins/extensions/sweetalert2.min.css">

<script src="functions/functions.js"></script>

<script>
    //VERIFICATION
    var formValide = true;

    // Chargement de l'image logo
   
    //      logo
    $("#bt_charger_photo_2").click(function() {
        $("#photo_2").click();
    });
    $("#image_2").click(function() {
        $("#bt_charger_photo_2").click();
    });


    //  au click du bouton enregistrer
    $("#bt_maj").on('click', function() {
        // Photo de logo
        var uploadpath_2 = $("#image_2").attr('src');
        var fileExtension_2 = uploadpath_2.substring(uploadpath_2.lastIndexOf(".") + 1, uploadpath_2.length);
        var verfilextension_2 = false
        if (uploadpath_2.includes("data:image/png;base64,") === true || uploadpath_2.includes("data:image/jpg;base64,") === true || uploadpath_2.includes("data:image/jpeg;base64,") === true || uploadpath_2.includes("data:image/bmp;base64,") === true) {
            verfilextension_2 = true
        } else {
            verfilextension_2 = false
        }

        if (verfilextension_2 === true || fileExtension_2 === "png" || fileExtension_2 === "jpg" || fileExtension_2 === "jpeg" || fileExtension_2 === "bmp") {} else {
            //MessageBox - Toast
            $('.flash').addClass('alert-warning');
            $('.flash').html('<i class="fas fa-exclamation-triangle"></i> Veuillez charger une image valide (.png ; .jpg ; .jpeg ; .bmp)')
                .fadeIn(300).delay(2500).fadeOut(300);
            // MessageBox - Toast

            formValide = false;
            e.preventDefault()
        }

        //Si pas de photo alors choisir l'image de profile par défaut
        // cas de logo 
        var nom_image_logo
        if ($('#photo_2').val() === '') {
            nom_image_logo = "image_defaut.png"
        } else {
            nom_image_logo = $('#photo_2').val()
        }


        // Cas ou tout est OK
        if (formValide) {

            // Création dans la base de donnée
            var fd = new FormData();
            var files_2 = $('#photo_2')[0].files;
            fd.append('file_photo_2', files_2[0]);
            fd.append('pied_page', $('#pied_page').val());
            fd.append('photo_2', nom_image_logo);
            fd.append('bt_maj', '');


            //Initialisation des email et nom d'utilisateur

            $.ajax({
                url: 'controllers/logo_pied_page_controller.php',
                type: 'POST',
                data: fd,
                processData: false,
                contentType: false,
                success: function(result) {
                    var donnee = JSON.parse(result);


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

                        //Rédirection
                       // location.href = "index.php?page=logo_pied_page";
                    }
                }
            });
        }
    })
</script>

<script src="js/template/extensions/ext-component-sweet-alerts.js"></script>
<script src="js/template/extensions/sweetalert2.all.min.js"></script>