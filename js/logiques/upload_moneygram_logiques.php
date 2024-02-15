<?php include("views/components/alerts.php") ?>
<script src="https://cdn.jsdelivr.net/npm/lodash@4.17.21/lodash.min.js"></script>


<script>
    var jsonData = [];
    var jsonData1 = [];
    var mergedData = [];
    // Configuration de Dropzone pour le téléversement de fichiers
    Dropzone.options.dpzSingleFile = {
        paramName: "file", // Nom du paramètre qui sera utilisé pour le téléversement du fichier
        maxFilesize: 10, // Taille maximale du fichier en mégaoctets
        acceptedFiles: ".xls, .xlsx, .csv", // Types de fichiers acceptés
        success: function (file, response) {
            // Fonction exécutée en cas de téléversement réussi

            // Récupération du fichier téléversé
            var inputFile = file;

            // Création d'un objet FileReader pour lire le contenu du fichier
            var reader = new FileReader();

            // Fonction appelée lorsque la lecture du fichier est terminée
            reader.onload = function (e) {
                try {
                    // Récupération des données du fichier
                    var data = e.target.result;
                    var workbook;

                    // Vérification du type de fichier (CSV ou Excel)
                    if (inputFile.name.endsWith('.csv')) {
                        // Lecture du fichier CSV avec délimiteur ","
                        workbook = XLSX.read(data, {
                            type: 'binary',
                            header: 3,
                            delimiter: ','
                        });
                    } else {
                        // Lecture du fichier Excel
                        workbook = XLSX.read(data, {
                            type: 'binary',
                            header: 3
                        });
                    }

                    // Sélection de la première feuille du classeur
                    var sheetName = workbook.SheetNames[0];
                    var sheet = workbook.Sheets[sheetName];

                    // Filtrage des lignes non vides
                    const nonEmptyZRows = XLSX.utils.sheet_to_json(sheet, {
                        header: 1
                    }).filter(row =>
                        row[0] !== undefined &&
                        row[0] !== null &&
                        row[0] !== '' &&
                        row[7] !== undefined &&
                        row[7] !== null &&
                        row[7] !== ''
                    );

                    // Filtrage des lignes non vides pour le deuxième tableau (tab2)
                    const nonEmptyZRows1 = XLSX.utils.sheet_to_json(sheet, {
                        header: 1
                    }).filter(row =>
                        row[0] !== undefined &&
                        row[0] !== null &&
                        row[0] !== '' &&
                        row[6] !== undefined &&
                        row[6] !== null &&
                        row[6] !== '' &&
                        row[7] === undefined
                    );

                    // Vérifiez si le nombre de clés est conforme
                    const keys = nonEmptyZRows.length > 0 ? nonEmptyZRows[0] : [];
                    if (keys.length !== 7) {
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
                    }

                    const dataRows = nonEmptyZRows.slice(1, -1);
                    const taxeInput = document.getElementById('taxe');
                    const taxeValue = taxeInput.value;
                    const datesInput = document.getElementById('dates');
                    const datesValue = datesInput.value;

                    // Ajoutez les clés Taxe et Dates à la liste des clés
                    const keysWithTaxeDates = [...keys, 'Taxe', 'Dates', 'Type'];

                    // Convertir les données en format JSON
                    const jsonData = dataRows.map(row => {
                        const obj = {};
                        keys.forEach((key, index) => {
                            obj[key] = row[index];
                        });
                        obj['Taxe'] = taxeValue;
                        obj['Dates'] = datesValue;
                        obj['Type'] = "Reçu";
                        return obj;
                    });


                    var date_saisie = document.getElementById("dates").value;
                    var dateColumnIndex = "Heure et date (locales)"; // Assuming the date column is at index 17
                    if (jsonData.length > 0 && jsonData[0][dateColumnIndex]) {
                        var date_objet = jsonData[0][dateColumnIndex];
                        var parsedDate_objet = moment(date_objet, "YYYY-MMM-DD HH:mm:ss").format("DD/MM/YYYY");
                        // var parsedDate_objet=  date_objet ;
                        var parsedDate_saisie = moment(date_saisie).format("DD/MM/YYYY"); // Adjust the format as needed

                        if (parsedDate_objet !== parsedDate_saisie) {
                            // / Display a customized alert box
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
                    console.log('Json Data 1:', jsonData);

                    // Traitement des données pour le deuxième tableau (tab2)
                    const keys1 = nonEmptyZRows1.length > 0 ? nonEmptyZRows1[0] : [];
                    const dataRows1 = nonEmptyZRows1.slice(1);
                    const keysWithTaxeDates1 = [...keys1, 'code d\'autorisation', 'Taxe', 'Dates', 'Type'];

                    jsonData1 = dataRows1.map(row =>
                        keys1.reduce((obj, key, index) => {
                            if (key === 'Num Réf') {
                                obj[key] = row[index];
                                obj['code d\'autorisation'] = 0; // Initialiser avec la valeur 0
                            } else {
                                obj[key] = row[index];
                            }
                            return obj;
                        }, {
                            Taxe: taxeValue, // Ajout de la clé Taxe avec sa valeur dans chaque objet
                            Dates: datesValue, // Ajoutez d'autres propriétés si nécessaire
                            Type: "Envoyé"
                        })
                    );
                    mergedData = jsonData.concat(jsonData1);




                    // STATS
                    var montant_envoyer = 0;
                    var frais_envoyees = 0;

                    var montant_total_envoyees = 0;
                    var nombre_transaction_envoyees = 0;

                    var nombre_transaction_payees = 0;



                    var montant_collecte = 0;
                    var frais_payer = 0;
                    var montant_total_payes = 0;
                    mergedData.forEach(function (item) {
                        if (item["code d'autorisation"] == 0) {
                            nombre_transaction_envoyees += 1;
                            montant_envoyer += item["Montant"];
                            frais_envoyees += item["Frais"];

                        } else {
                            nombre_transaction_payees += 1;
                            montant_collecte += item["Montant"];
                            frais_payer += item["Frais"];
                        }
                    });

                    // Affichage des données dans la console
                    console.log('Json Data 2:', jsonData1);

                    console.log('Json Data 1& 2:', mergedData);
                    // Initialisation de DataTable avec en-tête


                    // Création du DataTable avec les nouvelles clés
                    $("#excelDataTable1").DataTable({
                        data: mergedData,
                        columns: keysWithTaxeDates1.map(function (col) {
                            return {
                                data: col,
                                title: col
                            };
                        }),// Activer le défilement horizontal
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
                    })



                    var total_envoyees = montant_envoyer + frais_envoyees;
                    var total_payees = montant_collecte + frais_payer;

                    var total_general = total_payees + total_envoyees;

                    var total_general = total_payees + total_envoyees;
                    var frais_general = frais_envoyees + frais_payer;
                    var montant_general = montant_envoyer + montant_collecte;


                    var nombre_general = nombre_transaction_payees + nombre_transaction_envoyees;


                    $('#montant_envoyes').text(montant_envoyer.toLocaleString());
                    $('#frais_envoyees').text(frais_envoyees.toLocaleString());
                    $('#nombre_transaction_payees').text(nombre_transaction_payees);
                    $('#nombre_transaction_envoyees').text(nombre_transaction_envoyees);
                    $('#montant_total_envoye').text(total_envoyees.toLocaleString());
                    $('#montant_total_paye').text(total_payees.toLocaleString());
                    $('#montant_envoye').text(montant_envoyer);
                    $('#transfert_paye').text(montant_collecte.toLocaleString());
                    $('#frais_payes').text(frais_payer);
                    $('#nombre_general').text(nombre_general.toLocaleString());
                    $('#montant_general').text(montant_general);
                    $('#total_general').text(total_general.toLocaleString());
                    $('#frais_general').text(frais_general);



                    // Affichez le modal
                    $("#excelModal").modal("show");

                } catch (error) {
                    console.error('Erreur lors de la lecture du fichier Excel :', error);
                }
            };

            // Lecture du contenu du fichier en tant que chaîne binaire
            reader.readAsBinaryString(inputFile);
        },
        error: function (file, errorMessage) {
            // Fonction exécutée en cas d'erreur lors du téléversement du fichier
            console.error("Erreur lors du téléversement du fichier", file, errorMessage);
        }
    };
    // Fonction au clic du bouton "Enregistrer 1"
    $("#btnValider1").click(function (e) {
        e.preventDefault();
        // Appel de la fonction pour envoyer les données au contrôleur
        sendDataToController1(mergedData);
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


    // Fonction pour envoyer les données (1) au contrôleur via AJAX
    function sendDataToController1(mergedData) {
        $.ajax({
            url: 'controllers/upload_moneygram1_controller.php', // Remplacez par le chemin réel vers votre contrôleur
            method: 'POST',
            data: {
                upload_moneygram_file: true,
                data: mergedData
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