<?php include("views/components/alerts.php") ?>
<script src="https://cdn.jsdelivr.net/npm/lodash@4.17.21/lodash.min.js"></script>
<script src="functions/functions.js"></script>



<script>
    jQuery(function($) {
        $('#dates').flatpickr({
            defaultDate: "today",
            dateFormat: "d-m-Y",
        })
        $('#dates_modif').flatpickr({
            defaultDate: "today",
            //  dateFormat: "d-m-Y",
        })
    })


    let transactions;


    // Configuration de Dropzone pour le téléversement de fichiers
    Dropzone.options.dpzSingleFile = {
        paramName: "file", // Nom du paramètre qui sera utilisé pour le téléversement du fichier
        maxFilesize: 10, // Taille maximale du fichier en mégaoctets
        acceptedFiles: ".xls, .xlsx, .csv", // Types de fichiers acceptés
        success: function(file, response) {
            // Récupération du fichier téléversé
            var inputFile = file;
            var reader = new FileReader();
            reader.onload = function(e) {
                try {
                    // Récupération des données du fichier
                    var data = e.target.result;
                    var workbook;

                    // Vérification du type de fichier (CSV ou Excel)
                    if (inputFile.name.endsWith('.csv')) {
                        workbook = XLSX.read(data, {
                            type: 'binary',
                            header: 3,
                            encoding: "UTF-8",
                            delimiter: ','
                        });
                    } else {
                        workbook = XLSX.read(data, {
                            type: 'binary',
                            header: 3
                        });
                    }

                    // Récupération de la feuille de calcul
                    var sheetName = workbook.SheetNames[0];
                    var sheet = workbook.Sheets[sheetName];

                    // Vérifier si le nombre de colonnes correspond à votre attente
                    var expectedColumnCount = 10;
                    var range = XLSX.utils.decode_range(sheet['!ref']);
                    var actualColumnCount = range.e.c - range.s.c + 1;

                    if (actualColumnCount !== expectedColumnCount && actualColumnCount !== (expectedColumnCount - 1)) {
                        Swal.fire({
                            title: 'Mauvais fihchier',
                            html: 'Veuillez sélectionner le bon fichier !',
                            icon: 'error',
                            confirmButtonText: 'OK',
                        }).then((result) => {
                            // Rechargez la page après que l'utilisateur a cliqué sur "OK" sur l'alerte
                            if (result.isConfirmed) {
                                window.location.reload();
                            }
                        });
                        return;
                    }

                    // Parcourir toutes les cellules de la feuille et convertir en UTF8
                    for (var key in sheet) {
                        if (!sheet.hasOwnProperty(key)) continue;
                        if (key[0] === '!') continue; // Ignorer les clés spéciales comme '!ref'
                        var cell = sheet[key];
                        if (cell.t === 's') { // Si la cellule contient une chaîne de caractères
                            cell.v = fixEncoding(cell.v);
                        }
                    }

                    // TRANSACTIONS ENVOYEES

                    // Récupération des données des transactions envoyées
                    var rangeEnvoyees = XLSX.utils.decode_range(sheet['!ref']);
                    var debutRangeEnvoyees = 0;
                    var finRangeEnvoyees = 0;
                    for (var R = rangeEnvoyees.s.r; R <= rangeEnvoyees.e.r; ++R) {
                        var cellule = XLSX.utils.encode_cell({
                            r: R,
                            c: rangeEnvoyees.s.c
                        });
                        var valeurCellule = sheet[cellule] ? sheet[cellule].v : '';
                        if (valeurCellule === 'Détails des envois - XOF') {
                            debutRangeEnvoyees = R + 1;
                            break;
                        }
                    }
                    finRangeEnvoyees = debutRangeEnvoyees;
                    while (true) {
                        var cellule = XLSX.utils.encode_cell({
                            r: finRangeEnvoyees,
                            c: rangeEnvoyees.s.c
                        });
                        var valeurCellule = sheet[cellule] ? sheet[cellule].v : '';
                        if (!valeurCellule) break; // Cellule vide, fin des transactions envoyées
                        finRangeEnvoyees++;
                    }

                    // Récupération des données des transactions envoyées
                    var dataEnvoyees = [];
                    for (var R = debutRangeEnvoyees; R < finRangeEnvoyees; ++R) {
                        var row = [];
                        for (var C = rangeEnvoyees.s.c; C <= rangeEnvoyees.e.c; ++C) {
                            var cellule = XLSX.utils.encode_cell({
                                r: R,
                                c: C
                            });
                            var valeurCellule = sheet[cellule] ? sheet[cellule].v : '';
                            row.push(valeurCellule);
                        }
                        dataEnvoyees.push(row);
                    }

                    // Ajouter la colonne "Type de transaction" à dataEnvoyees
                    dataEnvoyees[0].push("Type de transaction");
                    for (var i = 1; i < dataEnvoyees.length; i++) {
                        dataEnvoyees[i].push("Envoyé");
                    }


                    // TRANSACTIONS PAYEES

                    // Récupération des données des transactions payees
                    var rangePayees = XLSX.utils.decode_range(sheet['!ref']);
                    var debutRangePayees = 0;
                    var finRangePayees = 0;
                    for (var R = rangePayees.s.r; R <= rangePayees.e.r; ++R) {
                        var cellule = XLSX.utils.encode_cell({
                            r: R,
                            c: rangePayees.s.c
                        });
                        var valeurCellule = sheet[cellule] ? sheet[cellule].v : '';
                        if (valeurCellule === 'DÉTAILS DES RÉCEPTIONS - XOF') {
                            debutRangePayees = R + 1;
                            break;
                        }
                    }
                    finRangePayees = debutRangePayees;
                    while (true) {
                        var cellule = XLSX.utils.encode_cell({
                            r: finRangePayees,
                            c: rangePayees.s.c
                        });
                        var valeurCellule = sheet[cellule] ? sheet[cellule].v : '';
                        if (valeurCellule == "DÉTAILS DU REMBOURSEMENT - XOF") break; // Cellule vide, fin des transactions payees
                        finRangePayees++;
                    }

                    // Récupération des données des transactions payees
                    var dataPayees = [];
                    for (var R = debutRangePayees; R < finRangePayees; ++R) {
                        var row = [];
                        for (var C = rangePayees.s.c; C <= rangePayees.e.c; ++C) {
                            var cellule = XLSX.utils.encode_cell({
                                r: R,
                                c: C
                            });
                            var valeurCellule = sheet[cellule] ? sheet[cellule].v : '';
                            row.push(valeurCellule);
                        }
                        dataPayees.push(row);
                    }

                    // Ajouter la colonne "Type de transaction" à dataPayees
                    dataPayees[0].push("Type de transaction");
                    for (var i = 1; i < dataPayees.length; i++) {
                        dataPayees[i].push("Reçu");
                    }

                    // TOUTES LES TRANSACTIONS
                    // concaténer les données transactions envoyées et les transactions payées 
                    transactions = dataEnvoyees.concat(dataPayees.slice(1));

                    // Ajouter la colonne "Taxe" à dataPayees
                    transactions[0].push("Taxe");
                    var taxeInput = document.getElementById('taxe');
                    let taxeValue = taxeInput.value;
                    for (var i = 1; i < transactions.length; i++) {

                        transactions[i].push(taxeValue);
                    }

                    // Retirer la première ligne de transactions et la stocker dans une autre variable
                    var entetesTransactions = transactions.shift();

                    // // Parcourir toutes les données
                    transactions.forEach(function(item) {
                        // Remplacé les celulle vide de [0] Tender Type par 0
                        if (item[2] == '') {
                            item[2] = 0
                        }

                        // formatee la date
                        if (item[0]) {
                            // Convertir la valeur en nombre de millisecondes depuis le 1er janvier 1970
                            var timestamp = (item[0] - 25569) * 86400 * 1000;

                            // Créer une nouvelle date à partir du timestamp
                            var date = new Date(timestamp);

                            // Formater la date en format YYYY-MM-DD HH:mm:ss
                            var formattedDate = date.toISOString().slice(0, 19).replace('T', ' ');

                            // Remplacer la valeur d'origine par la date formatée
                            item[0] = formattedDate;
                        }

                        // Supprimer les colonnes null ou vide
                        // delete item[8];    
                    });



                    var date_saisie = document.getElementById("dates").value;
                    var dateColumnIndex = 0; // Assuming the date column is at index 17
                    if (transactions.length > 0 && transactions[1][dateColumnIndex]) {
                        var date_objet = transactions[1][dateColumnIndex];
                        var parsedDate_objet = moment(date_objet, "YYYY-MM-DD HH:mm:ss").format("DD/MM/YYYY");

                        // var parsedDate_objet=  date_objet ;
                        var parsedDate_saisie = moment(date_saisie, "DD-MM-YYYY").format("DD/MM/YYYY"); // Adjust the format as needed

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
                            return;

                        }
                    } else {
                        console.error('Aucune donnée disponible pour la vérification de la date.');
                    }

                    // STATS
                    var montant_envoyer = 0;
                    var frais_envoyees = 0;
                    var montant_total_envoyees = 0;
                    var nombre_transaction_envoyees = 0;
                    var nombre_transaction_payees = 0;

                    var montant_collecte = 0;
                    var frais_payer = 0;
                    var montant_total_payes = 0;
                    transactions.forEach(function(item) {
                        if (item[9] == "Envoyé") {
                            nombre_transaction_envoyees += 1;
                            montant_envoyer += item[5];
                            frais_envoyees += item[6];

                        } else {
                            nombre_transaction_payees += 1;
                            montant_collecte += item[5];
                            frais_payer += item[6];
                        }
                    });


                    // Affichez les données dans un DataTable
                    $("#excelDataTable1").DataTable({
                        data: transactions,
                        columns: entetesTransactions.map(function(header) {
                            return {
                                title: header
                            };
                        })
                    });

                    // Si elle a déjà été initialisée, détruisez-la avant de la réinitialiser
                    if ($.fn.DataTable.isDataTable("#excelDataTable1")) {
                        $("#excelDataTable").DataTable().destroy();
                    }


                    // (Re)initialisez la DataTable
                    dataTable = $("#excelDataTable").DataTable({
                        data: transactions,
                        columns: entetesTransactions.map(function(header) {
                            return {
                                title: header
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
        error: function(file, errorMessage) {
            // Fonction exécutée en cas d'erreur lors du téléversement du fichier
            console.error("Erreur lors du téléversement du fichier", file, errorMessage);
        }
    };

    // Fonction au clic du bouton "Enregistrer 1"
    $("#btnValider1").click(function(e) {
        e.preventDefault();
        // Appel de la fonction pour envoyer les données au contrôleur
        sendDataToController1(transactions);
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
        if ($.fn.DataTable.isDataTable("#excelDataTable1")) {
            $("#excelDataTable1").DataTable().destroy();
        }
    });


    // Fonction pour envoyer les données (1) au contrôleur via AJAX
    function sendDataToController1(transactions) {
        $.ajax({
            url: 'controllers/upload_moneygram_controller.php', // Remplacez par le chemin réel vers votre contrôleur
            method: 'POST',
            data: {
                upload_moneygram_file: true,
                data: transactions
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

                    // Si elle a déjà été initialisée, détruisez-la avant de la réinitialiser
                    if ($.fn.DataTable.isDataTable("#excelDataTable")) {
                        $("#excelDataTable").DataTable().destroy();
                    }
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