<script>
    jQuery(function ($) {
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
    $("#close_modal").click(function (e) {
        e.preventDefault();
        alert(1)
        location.reload;

    });


    let jsonData;

    Dropzone.options.dpzSingleFile = {
        paramName: "file",
        maxFilesize: 10,
        acceptedFiles: ".xls, .xlsx, .csv",
        success: function (file, response) {
            var inputFile = file;
            var reader = new FileReader();
            reader.onload = function (e) {
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
                        row[25] !== undefined && row[25] !== null && row[25] !== ''
                    );

                    // Extrayez les clés
                    const keys = nonEmptyZRows.length > 0 ? nonEmptyZRows[0] : [];

                    // Vérifiez si le nombre de clés est inférieur ou supérieur à 22
                    if (keys.length !== 26) {
                        Swal.fire({
                            title: 'Mauvais fichier',
                            html: 'Veillez sélectionner le bon fichier !',
                            icon: 'error',
                            confirmButtonText: 'OK',
                        }).then((result) => {
                            // Rechargez la page après que l'utilisateur a cliqué sur "OK" sur l'alerte
                            if (result.isConfirmed) {
                                window.location.reload();
                            }
                        });
                    } else {
                        // Eliminer la première ligne 
                        const dataRows = nonEmptyZRows.slice(1);
                        // Convertir les données en format JSON en utilisant les clés
                        jsonData = dataRows.map(row =>
                            keys.reduce((obj, key, index) => {
                                obj[key] = row[index];
                                return obj;
                            }, {})
                        );
                    }

                    var date_saisie = document.getElementById("dates").value;
                    var dateColumnIndex = "Date"; // Assuming the date column is at index 17

                    if (jsonData.length > 0 && jsonData[0][dateColumnIndex]) {
                        var date_objet = jsonData[0][dateColumnIndex];
                        var parsedDate_objet = moment(date_objet, "DD-MM-YYYY").format("DD/MM/YYYY");
                        // var parsedDate_objet = date_objet;
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
                        console.error('Aucune donnée disponible pour la vérification de la date.');
                    }
                    // Parcourir toutes les données
                    jsonData.forEach(function (item) {
                        // Vérifier si la propriété "Type de paiement" est égale à "CASH"
                        if (item["Type de paiement"] === "CASH") {
                            // Si c'est le cas, remplacer la valeur de la propriété "null" par "envoi"
                            item["Type de transaction"] = "envoi";
                            // Supprimer la propriété "null" si nécessaire
                            delete item["null"];
                        } else {
                            // Sinon, remplacer la valeur de la propriété "null" par "payer"
                            item["Type de transaction"] = "payer";
                            // Supprimer la propriété "null" si nécessaire
                            delete item["null"];
                        }

                        if (item["Taux de change"] == null) {
                            item["Taux de change"] = 0;
                        }

                        if (item["Type de paiement"] == null) {
                            item["Type de paiement"] = 'Inconnu';
                        }

                        delete item["Superv. Op. Identifiant"];
                    });

                    // STATS
                    var montant_envoyer = 0;
                    var nombre_transaction_envoyees = 0;
                    var frais_envoyees = 0;
                    var frais_message_envoyees = 0;
                    var frais_livraison_envoyees = 0;
                    var impots_envoyees = 0;

                    var nombre_transaction_payees = 0;
                    var montant_collecte = 0;
                    var frais_envoyer = 0;
                    var frais_payer = 0;
                    var impots_payees = 0;
                    jsonData.forEach(function (item) {
                        if (item["Type de transaction"] === "envoi") {
                            nombre_transaction_envoyees += 1;
                            montant_envoyer += item["Montant envoyé"];
                            frais_envoyees += item["Frais de Transfert"];
                            frais_message_envoyees += item["Frais du message"];
                            frais_livraison_envoyees += item["Frais de livraison"];
                            impots_envoyees += item["Total des taxes"];

                        } else {
                            nombre_transaction_payees += 1;
                            montant_collecte += item["Montant payé attendu"];
                            frais_payer += item["Frais de Transfert"];
                            impots_payees += item["Total des taxes"];

                        }
                    });

                    console.log(JSON.stringify(jsonData, null, 2));

                    // Affichez les données dans un DataTable
                    $("#excelDataTable").DataTable({

                        data: jsonData,
                        columns: Object.keys(jsonData[0]).map(function (col) {
                            return {
                                data: col,
                                title: col
                            };
                        }),



                    });

                    // Si elle a déjà été initialisée, détruisez-la avant de la réinitialiser
                    if ($.fn.DataTable.isDataTable("#excelDataTable")) {
                        $("#excelDataTable").DataTable().destroy();
                    }

                    // (Re)initialisez la DataTable
                    dataTable = $("#excelDataTable").DataTable({
                        data: jsonData,
                        columns: Object.keys(jsonData[0]).map(function (col) {
                            return {
                                data: col,
                                title: col
                            };
                        }),
                        scrollX: true, // Activer le défilement horizontal
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
                    var total_envoyees = montant_envoyer + frais_envoyees + frais_message_envoyees + frais_livraison_envoyees + impots_envoyees;
                    var total_payees = montant_collecte + impots_payees;
                    $('#nombre_transaction_envoyees').text(nombre_transaction_envoyees);
                    $('#montant_envoyees').text(montant_envoyer.toLocaleString());
                    $('#frais_envoyees').text(frais_envoyees.toLocaleString());
                    $('#frais_message_envoyees').text(frais_message_envoyees.toLocaleString());
                    $('#frais_livraison_envoyees').text(frais_livraison_envoyees.toLocaleString());
                    $('#impots_envoyees').text(impots_envoyees.toLocaleString());
                    $('#montant_total_envoye').text(total_envoyees.toLocaleString());
                    $('#montant_envoye').text(montant_envoyer);
                    $('#nombre_transaction_payees').text(nombre_transaction_payees);
                    $('#frais_envoye').text(frais_envoyer);
                    $('#montant_collecte').text(montant_collecte.toLocaleString());
                    $('#impots_payees').text(impots_payees.toLocaleString());
                    $('#traditionnel').text(total_payees.toLocaleString());
                    $('#frais_paye').text(frais_payer);
                    // Affichez le modal
                    $("#excelModal").modal("show");
                } catch (error) {
                    console.error('Erreur lors de la lecture du fichier Excel :', error);
                }
            };
            reader.readAsBinaryString(inputFile);
        },
        error: function (file, errorMessage) {
            console.error("Erreur lors du téléchargement du fichier", file, errorMessage);
        }
    };

    // Fonction au clic du bouton "Enregistrer"
    $("#btnValider").click(function (e) {
        e.preventDefault();

        // ... (votre code existant)

        // Appel de la fonction pour envoyer les données au contrôleur
        sendDataToController(jsonData);
    });

    // Fonction au clic du bouton "Annuler"
    $("#btnAnnuler").click(function (e) {
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
            url: 'controllers/upload_western_union_controller.php', // Remplacez par le chemin réel vers votre contrôleur
            method: 'POST',
            data: {
                upload_western_file: true,
                data: jsonData
            },
            dataType: 'json',
            success: function (response) {
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
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }
</script>