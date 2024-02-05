<?php include("views/components/alerts.php") ?>
<script src="https://cdn.jsdelivr.net/npm/lodash@4.17.21/lodash.min.js"></script>




<script>
    // calendrier
    jQuery(function($) {
        $('#dates').flatpickr({
            defaultDate: "today",
        })

    })

    // rechargercher la page quand on clique sur annuler dans le modal
    $("#close_modal").click(function(e) {
        e.preventDefault();
        alert(1)
        location.reload;

    });


    let jsonData;

    Dropzone.options.dpzSingleFile = {
        paramName: "file",
        maxFilesize: 10,
        acceptedFiles: ".xls, .xlsx, .csv",
        success: function(file, response) {
            var inputFile = file;
            var reader = new FileReader();
            reader.onload = function(e) {
                try {
                    var data = e.target.result;
                    var workbook;
                    if (inputFile.name.endsWith('.csv')) {
                        workbook = XLSX.read(data, {
                            type: 'binary',
                            header: 3,
                            delimiter: ','
                        });
                    } else {
                        workbook = XLSX.read(data, {
                            type: 'binary',
                            header: 3
                        });
                    }
                    var sheetName = workbook.SheetNames[0];
                    var sheet = workbook.Sheets[sheetName];
                    const nonEmptyZRows = XLSX.utils.sheet_to_json(sheet, {
                        header: 1
                    }).filter(row =>
                        row[8] !== undefined && row[8] !== null && row[8] !== ''
                    );
                    const keys = nonEmptyZRows.length > 0 ? nonEmptyZRows[0] : [];
                    // Eliminer la première ligne 
                    const dataRows = nonEmptyZRows.slice(1);
                    jsonData = dataRows.map(row =>
                        keys.reduce((obj, key, index) => {
                            obj[key] = row[index];
                            return obj;
                        }, {})
                    );

                    // Vérifier les dates avant importation
                    var date_saisie = document.getElementById("dates").value;
                    var dates_correctes = true;
                    var dateColumnIndex = "Date";
                    if (jsonData.length > 0 && jsonData[0][dateColumnIndex]) {
                        var date_objet = jsonData[0][dateColumnIndex];
                        var parsedDate_objet = moment(date_objet, "DD-MMM-YYYY HH:mm:ss").format("DD/MM/YYYY");
                        // var parsedDate_objet=  date_objet ;
                        var parsedDate_saisie = moment(date_saisie).format("DD/MM/YYYY"); // Adjust the format as needed

                        if (parsedDate_objet !== parsedDate_saisie) {
                            // / Display a customized alert box
                            dates_correctes = false;
                            Swal.fire({
                                title: 'Les dates ne correspondent pas',
                                html: 'Date fichier: ' + parsedDate_objet + '<br>Date saisie: ' + parsedDate_saisie,
                                icon: 'error',
                                confirmButtonText: 'OK',
                            }).then((result) => {
                                // Reload the page after the user clicks "OK" on the alert
                                if (result.isConfirmed) {
                                    window.location.reload();
                                }
                            });

                        }
                    } else {
                        console.error('Aucune donnée disponible pour la vérification de la date.');
                    }



                    // STATS
                    var montant_envoyer = 0;

                    var totalElements = 0;
                    var revenue = 0;
                    var recharge = 0;

                    jsonData.forEach(function(item) {
                        if (item["Description"] === "Commission Revenu") {
                            var montant = parseFloat(item["Amount"]);

                            if (!isNaN(montant)) {
                                revenue += montant;
                            }
                        } else {
                            var montant1 = parseFloat(item["Amount"]);

                            if (!isNaN(montant1)) {
                                recharge += montant1;
                            }
                        }
                        totalElements = jsonData.length;
                    });



                    console.log(JSON.stringify(jsonData, null, 2));

                    // Affichez les données dans un DataTable
                    $("#excelDataTable").DataTable({
                        data: jsonData,
                        columns: Object.keys(jsonData[0]).map(function(col) {
                            return {
                                data: col,
                                title: col
                            };
                        })
                    });

                    // Si elle a déjà été initialisée, détruisez-la avant de la réinitialiser
                    if ($.fn.DataTable.isDataTable("#excelDataTable")) {
                        $("#excelDataTable").DataTable().destroy();
                    }

                    // (Re)initialisez la DataTable
                    dataTable = $("#excelDataTable").DataTable({
                        data: jsonData,
                        columns: Object.keys(jsonData[0]).map(function(col) {
                            return {
                                data: col,
                                title: col
                            };
                        }),
                        language: {
                            // Textes pour la pagination
                            paginate: {
                                previous: '&#10094; <span class="me-1"></span>',
                                next: '<span class="ms-1"></span> &#10095;',
                            },
                            // Textes pour l'affichage des informations
                            info: 'Affichage de _START_ à _END_ sur _TOTAL_ entrées',
                            // Texte pour le champ de recherche
                            search: 'Rechercher :',
                            // Textes pour la longueur de la page
                            lengthMenu: 'Afficher _MENU_ ',
                            // Texte lorsque la table est vide
                            emptyTable: 'Aucune donnée disponible dans le tableau',
                            // Texte lorsque les données sont en cours de chargement
                            loadingRecords: 'Chargement...',
                            // Texte lorsque la recherche ne trouve aucune correspondance
                            zeroRecords: 'Aucun enregistrement trouvé',
                            // Textes pour la sélection des colonnes
                            select: {
                                rows: {
                                    _: '%d lignes sélectionnées',
                                    0: 'Aucune ligne sélectionnée',
                                    1: '1 ligne sélectionnée'
                                }
                            }
                        }
                    });


                    var montant_general = recharge + revenue;

                    $('#montant_total').text(montant_envoyer);

                    $('#montant_general').text(montant_general);
                    $('#nombre_carte').text(totalElements);

                    $('#recharge').text(recharge);
                    $('#revenue').text(revenue);
                    $('#nombre_carte').text(totalElements);

                    if (dates_correctes) {

                        // Affichez le modal
                        $("#excelModal").modal("show");
                    }



                } catch (error) {
                    console.error('Erreur lors de la lecture du fichier Excel :', error);
                }
            };
            reader.readAsBinaryString(inputFile);
        },
        error: function(file, errorMessage) {
            console.error("Erreur lors du téléchargement du fichier", file, errorMessage);
        }
    };

    // Fonction au clic du bouton "Enregistrer"
    $("#btnValider").click(function(e) {
        e.preventDefault();

        // ... (votre code existant)

        // Appel de la fonction pour envoyer les données au contrôleur
        sendDataToController(jsonData);
    });
    // Fonction au clic du bouton "Annuler"
    $("#btnAnnuler").click(function(e) {
        e.preventDefault();
        // Réinitialisez Dropzone
        var myDropzone = Dropzone.forElement("#dpz-single-file");
        if (myDropzone) {
            myDropzone.removeAllFiles();
        }
        // Si elle a déjà été initialisée, détruisez-la avant de la réinitialiser
        if ($.fn.DataTable.isDataTable("#excelDataTable")) {
            $("#excelDataTable").DataTable().destroy();
        }
    });

    // Fonction pour envoyer les données au contrôleur via AJAX
    function sendDataToController(jsonData) {
        $.ajax({
            url: 'controllers/rechargement_uba_controller.php', // Remplacez par le chemin réel vers votre contrôleur
            method: 'POST',
            data: {
                uba_file: true,
                data: jsonData
            },
            dataType: 'json',
            success: function(response) {
                if (response.success === 'true') {
                    $("#excelModal").modal("hide");

                    // Réinitialisez Dropzone
                    var myDropzone = Dropzone.forElement("#dpz-single-file");
                    if (myDropzone) {
                        myDropzone.removeAllFiles();
                    }
                    // MESSAGE ALERT
                    swal_Alert_Sucess(response.message);
                }else if (response.success === 'existe') {
                    // MESSAGE ALERT SI  EXISTE
                    swal_Alert_Danger(response.message);
                    //FERMETURE DU MODAL
                    $("#excelModal").modal("hide");
                    // Réinitialisez Dropzone
                    var myDropzone = Dropzone.forElement("#dpz-single-file");
                    if (myDropzone) {
                        myDropzone.removeAllFiles();
                    }

                } else {
                    console.error('Erreur : ' + response.message);
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }
</script>