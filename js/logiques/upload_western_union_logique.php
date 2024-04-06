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

    // rechargercher la page quand on clique sur annuler dans le modal
    $("#close_modal").click(function(e) {
        e.preventDefault();
        location.reload;

    });


    let transactions;

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
                    var expectedColumnCount = 27;
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


                    // Parcourir toutes les cellules de la feuille
                    for (var key in sheet) {
                        if (!sheet.hasOwnProperty(key)) continue;
                        if (key[0] === '!') continue; // Ignorer les clés spéciales comme '!ref'
                        var cell = sheet[key];
                        if (cell.t === 's') { // Si la cellule contient une chaîne de caractères
                            cell.v = fixEncoding(cell.v);
                        }
                    }

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
                        if (valeurCellule === 'Transactions envoyées') {
                            debutRangeEnvoyees = R + 3;
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
                        dataEnvoyees[i].push("envoi");
                    }


                    // TRANSACTIONS PAYEES

                    // Récupération des données des transactions payées
                    var rangePayees = XLSX.utils.decode_range(sheet['!ref']);
                    var debutRangePayees = 0;
                    var finRangePayees = 0;
                    for (var R = rangePayees.s.r; R <= rangePayees.e.r; ++R) {
                        var cellule = XLSX.utils.encode_cell({
                            r: R,
                            c: rangePayees.s.c
                        });
                        var valeurCellule = sheet[cellule] ? sheet[cellule].v : '';
                        if (valeurCellule === 'Transactions Payées') {
                            debutRangePayees = R + 3;
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
                        if (!valeurCellule) break; // Cellule vide, fin des transactions payées
                        finRangePayees++;
                    }

                    // Récupération des données des transactions payées
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
                        dataPayees[i].push("payer");
                    }


                    // TOUTES LES TRANSACTIONS

                    // concaténer les données transactions envoyées et les transactions payées 
                    transactions = dataEnvoyees.concat(dataPayees.slice(1));

                    var date_saisie = document.getElementById("dates").value;
                    var dateColumnIndex = 12; // Assuming the date column is at index 17

                    if (transactions.length > 0 && transactions[1][dateColumnIndex]) {
                        var date_objet = transactions[1][dateColumnIndex];
                        var parsedDate_objet = moment(date_objet, "DD-MM-YYYY").format("DD/MM/YYYY");
                        // var parsedDate_objet = date_objet;
                        var parsedDate_saisie = moment(date_saisie, "DD-MM-YYYY").format("DD/MM/YYYY");
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
                            return;
                        }
                    } else {
                        console.error('Aucune donnée disponible pour la vérification de la date.');
                    }

                    // // Parcourir toutes les données
                    // transactions.forEach(function(item) {
                    //     // Supprimer les colonnes null ou vide
                    //     delete item[4];
                    //     delete item[25];
                    // });



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

                    // Retirer la première ligne de transactions et la stocker dans une autre variable
                    var entetesTransactions = transactions.shift();

                    transactions.forEach(function(item) {
                        if (item[26] === "envoi") {
                            nombre_transaction_envoyees += 1;
                            montant_envoyer += item[14];
                            frais_envoyees += item[15];
                            frais_livraison_envoyees += item[16];
                            frais_message_envoyees += item[17];
                            impots_envoyees += item[23];

                        } else {
                            nombre_transaction_payees += 1;
                            montant_collecte += item[21];
                            frais_payer += item[15];
                            impots_payees += item[23];

                        }
                    });


                    // Affichez les données dans un DataTable
                    $("#excelDataTable").DataTable({
                        data: transactions,
                        columns: entetesTransactions.map(function(header) {
                            return {
                                title: header
                            };
                        })
                    });


                    // Si elle a déjà été initialisée, détruisez-la avant de la réinitialiser
                    if ($.fn.DataTable.isDataTable("#excelDataTable")) {
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
        error: function(file, errorMessage) {
            console.error("Erreur lors du téléchargement du fichier", file, errorMessage);
        }
    };



    //  au clic du bouton "Enregistrer"
    $("#btnValider").click(function(e) {
        e.preventDefault();
        sendDataToController(transactions);
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
    function sendDataToController(transactions) {
        $.ajax({
            url: 'controllers/upload_western_union_controller.php', // Remplacez par le chemin réel vers votre contrôleur
            method: 'POST',
            data: {
                upload_western_file: true,
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