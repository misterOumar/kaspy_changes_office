<script>
    jQuery(function($) {
        $('#dates').flatpickr({
            defaultDate: "today",
            //  dateFormat: "d-m-Y",
            monthNames: ["Jan", "Feb", "Mar", "Avr", "Mai", "Juin", "Juil", "Aou", "Sept", "Oct", "Nov", "Dec"]
        })
        $('#dates_modif').flatpickr({
            defaultDate: "today",
            //  dateFormat: "d-m-Y",
            monthNames: ["Jan", "Feb", "Mar", "Avr", "Mai", "Juin", "Juil", "Aou", "Sept", "Oct", "Nov", "Dec"]
        })
    })
</script>
<script>
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
                    // Convertir la feuille en JSON
                    const nonEmptyZRows = XLSX.utils.sheet_to_json(sheet, {
                        header: 1
                    }).filter(row =>
                        row[30] !== undefined && row[30] !== null && row[30] !== '');
                    // Extrayez les clés
                    const keys = nonEmptyZRows.length > 0 ? nonEmptyZRows[0].map((_, index) => index + 1) : [];
                    const dataRows = nonEmptyZRows.slice(1);

                    // Convertir les données en format JSON en utilisant les clés
                    jsonData = dataRows.map(row =>
                        keys.reduce((obj, key, index) => {
                            obj[key] = row[index];
                            return obj;
                        }, {})
                    );
                    // Extraction des numeros
                    jsonData = jsonData.map(obj => {
                        if (obj['9']) {
                            const extractedPart9 = obj['9'].split(':')[1].split('/')[0];
                            obj['9'] = extractedPart9;
                        }
                        if (obj['12']) {
                            const match = obj['12'].match(/FRI:(\d+)/);
                            if (match) {
                                const extractedPart12 = match[1];
                                obj['12'] = extractedPart12;
                            }
                        }
                        return obj;
                    });


                    if (inputFile.name.endsWith('.csv')) {

                    }


                    jsonData.forEach(function(item) {
                        // Vérifie si la clé "3" existe dans l'élément
                        if (item["3"]) {
                            // Convertir la valeur en nombre de millisecondes depuis le 1er janvier 1970
                            var timestamp = (item["3"] - 25569) * 86400 * 1000;

                            // Créer une nouvelle date à partir du timestamp
                            var date = new Date(timestamp);

                            // Formater la date en format YYYY-MM-DD HH:mm:ss
                            var formattedDate = date.toISOString().slice(0, 19).replace('T', ' ');

                            // Remplacer la valeur d'origine par la date formatée
                            item["3"] = formattedDate;
                        }
                    });



                    console.log(JSON.stringify(jsonData, null, 2));
                    // FIN DU TRAITEMENT DU FICHIER IMPORTER
                    var date_saisie = document.getElementById("dates").value;

                    var dateColumnIndex = 3; // Assuming the date column is at index 17
                    if (jsonData.length > 0 && jsonData[0][dateColumnIndex]) {
                        var date_objet = jsonData[0][dateColumnIndex];

                        var parsedDate_objet = moment(date_objet, "YYYY-MM-DD HH:mm:ss").format("DD/MM/YYYY");


                        var parsedDate_saisie = moment(date_saisie).format("DD/MM/YYYY");
                        if (parsedDate_objet !== parsedDate_saisie) {
                            Swal.fire({
                                title: 'Les dates ne correspondent pas',
                                html: 'Date du fichier: ' + parsedDate_objet + '<br>Date saisie: ' + parsedDate_saisie,
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
                        console.error('Aucune donnée disponible pour la vérification de la date.', dateColumnIndex);
                    }
                    jsonData.forEach(function(item) {
                        if (parseFloat(item["17"]) < 0) {

                            item["5"] = "Retrait";

                        } else {
                            item["5"] = "Dépot";
                        }

                    });


                    // Si elle a déjà été initialisée, détruisez-la avant de la réinitialiser
                    if ($.fn.DataTable.isDataTable("#excelDataTable")) {
                        $("#excelDataTable").DataTable().destroy();
                    }
                    // (Re)initialisez la DataTable
                    dataTable = $("#excelDataTable").DataTable({
                        data: jsonData,
                        columns: [{
                                data: '1',
                                title: 'Identifiant'
                            },
                            {
                                data: '3',
                                title: 'Date'
                            },
                            {
                                data: '9',
                                title: 'Numero Expediteur'
                            },
                            {
                                data: '11',
                                title: 'Agence'
                            },
                            {
                                data: '12',
                                title: 'Numero Recepteur'
                            },
                            {
                                data: '13',
                                title: 'Nom Recepteur'
                            },
                            {
                                data: '17',
                                title: 'Monatnt'
                            },
                            {
                                data: '23',
                                title: 'Frais'
                            },
                            {
                                data: '31',
                                title: 'Solde'
                            },
                            {
                                data: '5',
                                title: 'Type'
                            },

                        ],
                        scrollX: true, //         //  Activer le défilement horizontal
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
                    // Affichez le modal
                    $("#excelModal").modal("show");
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
            url: 'controllers/upload_mtn_controller.php', // Remplacez par le chemin réel vers votre contrôleur
            method: 'POST',
            data: {
                upload_mtn: true,
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
                } else if (response.success === 'existe') {
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