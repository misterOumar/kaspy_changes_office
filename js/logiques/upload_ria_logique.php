<?php include("views/components/alerts.php") ?>
<script src="https://cdn.jsdelivr.net/npm/lodash@4.17.21/lodash.min.js"></script>

<script>
    jQuery(function ($) {
        $('#dates').flatpickr({
            defaultDate: "today",
        })
    })
    var date_saisie = document.getElementById("dates");

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
                    const nonEmptyZRows = XLSX.utils.sheet_to_json(sheet, {
                        header: 1
                    }).map(row =>
                        row.slice(0, 22) // Sélection des colonnes de A à V (index de 0 à 21)
                    );
                    const keys = nonEmptyZRows.length > 0 ? nonEmptyZRows[0] : [];
                    const dataRows = nonEmptyZRows.slice(1);
                    jsonData = dataRows.map(row => {
                    const newRow = {};
                    keys.forEach((key, index) => {
                        const cellValue = row[index];
                        newRow[key] = cellValue !== undefined ? cellValue : 0; // Si la valeur de la cellule n'est pas undefined, utilisez-la, sinon utilisez 0
                        console.log(`Clé: ${key}, Valeur: ${newRow[key]}`); // Afficher la clé et la valeur de la cellule
                    });
                    console.log(JSON.stringify(newRow , null, 2)); // Ligne de journalisation
                    return newRow;
                });








                    console.log(JSON.stringify(jsonData, null, 2));
                    var date_saisie = document.getElementById("dates").value;
                    var dateColumnIndex = 'Date';// Assuming the date column is at index 17

                    if (jsonData.length > 0 && jsonData[0][dateColumnIndex]) {
                        var date_objet = jsonData[0][dateColumnIndex];
                        var parsedDate_objet = moment(date_objet, "DD/MM/YYYY HH:mm:ss").format("DD/MM/YYYY");
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


                    // STATS
                    var montant_envoyer = 0;
                    var nombre_transaction_envoyees = 0;

                    var nombre_total = 0;
                    var transfert_total = 0;
                    var frais_envoyees = 0;
                    var nombre_transaction_payees = 0;
                    var montant_collecte = 0;

                    var frais_payer = 0;

                    jsonData.forEach(function (item) {
                        if (item["Action"] === "Envoi") {
                            nombre_transaction_envoyees += 1;
                            montant_envoyer += item["Montant Envoye"];
                            frais_envoyees += item["Frais"];

                        } else {
                            nombre_transaction_payees += 1;
                            montant_collecte += item["false"];
                            if (item["Frais"] === '')
                                frais_payer = '0';
                        }
                    });
                    // Supprimez la première ligne de vos données JSON et utilisez-la comme titres de colonnes
                    const titles = jsonData.shift();
                    // Si elle a déjà été initialisée, détruisez-la avant de la réinitialiser
                    if ($.fn.DataTable.isDataTable("#excelDataTable")) {
                        $("#excelDataTable").DataTable().destroy();
                    }

                    // Création du DataTable avec les nouvelles clés
                    $("#excelDataTable").DataTable({
                        data: jsonData,
                        columns: Object.keys(jsonData[0]).map(function (col) {
                            return {
                                data: col,
                                title: col
                            };
                        }),
                        scrollX: true
                    });
                    var total_envoyees = montant_envoyer + frais_envoyees;
                    var nombre_total = nombre_transaction_payees + nombre_transaction_envoyees;
                    var transfert_total = montant_envoyer + montant_collecte;
                    var total_payees = montant_collecte + frais_payer;
                    $('#nombre_transaction_envoyees').text(nombre_transaction_envoyees);
                    $('#transfert_envoye').text(montant_envoyer.toLocaleString());
                    $('#frais_envoyees').text(frais_envoyees.toLocaleString());
                    $('#montant_total_envoye').text(total_envoyees.toLocaleString());
                    $('#montant_total_paye').text(total_payees.toLocaleString());
                    $('#transfert_paye').text(montant_collecte);
                    $('#nombre_transaction_payees').text(nombre_transaction_payees);
                    $('#frais_payees').text(frais_payer);
                    $('#transfert_total').text(transfert_total);
                    $('#nombre_total').text(nombre_total);
                    // Affichez le modal
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
    $("#btnValider1").click(function (e) {
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
        if ($.fn.DataTable.isDataTable("#excelDataTable1")) {
            $("#excelDataTable1").DataTable().destroy();
        }
    });

    // Fonction pour envoyer les données au contrôleur via AJAX
    function sendDataToController(jsonData) {
        $.ajax({
            url: 'controllers/upload_ria_controller.php', // Remplacez par le chemin réel vers votre contrôleur
            method: 'POST',
            data: {
                upload_ria_file: true,
                data: jsonData
            },
            dataType: 'json',
            success: function (response) {
                if (response.success === 'true') {
                    $("#excelModal").modal("hide");
                    // Réinitialisez Dropzone
                    // MESSAGE ALERT
                    swal_Alert_Sucess(response.message);
                    var myDropzone = Dropzone.forElement("#dpz-single-file");
                    if (myDropzone) {
                        myDropzone.removeAllFiles();
                    }
                } else if (response.success === 'existe') {                        // MESSAGE ALERT SI  EXISTE
                    $("#excelModal").modal("hide");
                    // Réinitialisez Dropzone
                    // MESSAGE ALERT
                    swal_Alert_Danger(response.message);
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
<script>
    $(window).on('load', function () {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    })
</script>