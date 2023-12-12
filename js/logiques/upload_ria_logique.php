<script>
 

 $(document).ready(function () {
    $('#form_upload_ria').submit(function (e) {
        e.preventDefault();

        var form = $(this);
        var formData = new FormData(form[0]);

        console.log(formData);

        $.ajax({
            type: form.prop('method'),
            url: form.prop('action'),
            data: formData,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function (response) {
        $('#modal_show_upload').modal('show')

                console.log('Réponse du serveur :', response);
                alert(response)
                // if (response.success === 'true') {
                //     console.log('Téléchargement réussi. Données:', response.data);
                // } else {
                //     console.error('Erreur lors du téléchargement :', response.message);
                // }
            },
            error: function (xhr, textStatus, errorThrown) {
                console.log('Erreur AJAX :', errorThrown);
            }
        });
    });
});




</script>
