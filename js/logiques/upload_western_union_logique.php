<script>
    // Fonction pour extraire les données d'une feuille Excel
    function extractTableFromExcel(data, startRow, endRow) {
        var workbook = XLSX.read(data, {
            type: 'binary'
        });
        var sheetName = workbook.SheetNames[0];
        var sheet = workbook.Sheets[sheetName];

        // Utilisez XLSX.utils.sheet_to_json pour convertir la feuille en tableau d'objets
        var tableData = XLSX.utils.sheet_to_json(sheet, {
            header: 1,
            range: startRow + ":" + endRow
        });

        return tableData;
    }


    // Configuration de Dropzone
    Dropzone.options.dpzSingleFile = {
        paramName: "file", // Le nom du paramètre qui contient le fichier dans la requête HTTP
        maxFilesize: 10, // Taille maximale du fichier en mégaoctets
        acceptedFiles: ".xls, .xlsx, .csv", // Types de fichiers acceptés
        success: function(file, response) {
            // La fonction success est appelée lorsque le téléchargement est réussi
            // console.log("Fichier téléchargé avec succès!", file, response);

            var inputFile = file;

            var reader = new FileReader();
            reader.onload = function(e) {
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

                // Définissez le range pour le premier tableau (de la 4e ligne à la dernière cellule non vide)
                var range1 = {
                    s: {
                        c: 0,
                        r: 3
                    }, // 4th row
                    e: {
                        // c: XLSX.utils.decode_range(workbook.Sheets[sheetName]['!ref']).e.c,
                        // r: XLSX.utils.decode_range(workbook.Sheets[sheetName]['!ref']).e.r

                        c: XLSX.utils.decode_range(workbook.Sheets[sheetName]['!ref']).e.c,
                        r: 9
                    }
                };

                // Déterminez la dernière ligne du premier tableau
                // var lastRowTable1 = XLSX.utils.decode_range(workbook.Sheets[sheetName]['!ref']).e.r;
                var lastRowTable1 = 9;

                console.log(lastRowTable1);

                // Calculez le point de départ pour le deuxième tableau (5 lignes après la dernière ligne du premier tableau)
                var startRowTable2 = lastRowTable1 + 17;

                // Définissez le range pour le second tableau (à partir de la 16e ligne après le 1er)
                var range2 = {
                    s: {
                        c: 0,
                        // r: startRowTable2
                        r: 16
                    }, // 16th row
                    e: {
                        c: XLSX.utils.decode_range(workbook.Sheets[sheetName]['!ref']).e.c,
                        r: XLSX.utils.decode_range(workbook.Sheets[sheetName]['!ref']).e.r
                        // r: 37
                    }
                };
                var excelData1 = XLSX.utils.sheet_to_json(workbook.Sheets[sheetName], {
                    range: range1
                });
                var excelData2 = XLSX.utils.sheet_to_json(workbook.Sheets[sheetName], {
                    range: range2
                });

                // // Ajoutez la colonne "Type" avec la valeur "envoyée" pour le premier tableau
                excelData1.forEach(function(row) {
                    row.Type = "envoyée";
                });

                // // Ajoutez la colonne "Type" avec la valeur "payée" pour le second tableau
                excelData2.forEach(function(row) {
                    // Vérifiez si la colonne "Type" existe déjà
                    if (!row.hasOwnProperty("Type")) {
                        row.Type = "payée";
                    }



                    // Remplacez les valeurs vides par 0 pour toutes les colonnes
                    Object.keys(row).forEach(function(col) {
                        if (row[col] === undefined || row[col] === "") {
                            row[col] = 0;
                        }
                    });

                    // Remplacez les valeurs vides dans la colonne "Taux de change" par 0
                    // if (row.hasOwnProperty("Taux de change") && (row["Taux de change"] === undefined || row["Taux de change"] === "")) {
                    //     row["Taux de change"] = 0;
                    // }
                    // if ( (row[19] === undefined || row[19] === "")) {
                    //     row[19] = 0;
                    // }
                });

                // Fusionnez les deux tableaux
                // var excelData = excelData1.map(function(row) {
                //     row.Type = "envoyée";
                //     return row;
                // }).concat(excelData2.map(function(row) {
                //     row.Type = "payée";
                //     return row;
                // }));

                // Fusionnez les deux tableaux
                var excelData = excelData1.concat(excelData2);
                // var excelData = excelData1
                console.log(excelData);

                // Affichez les données dans un DataTable
                $("#excelDataTable").DataTable({
                    data: excelData,
                    columns: Object.keys(excelData[0]).map(function(col) {
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
                    data: excelData,
                    columns: Object.keys(excelData[0]).map(function(col) {
                        return {
                            data: col,
                            title: col
                        };
                    }),
                    scrollX: true, // Activer le défilement horizontal
                });

                // Affichez le modal
                $("#excelModal").modal("show");
            };
            reader.readAsBinaryString(inputFile);
        },
        error: function(file, errorMessage) {
            // La fonction error est appelée en cas d'échec du téléchargement
            console.error("Erreur lors du téléchargement du fichier", file, errorMessage);
        }
    };


    $("#btnValider").click(function(e) {
        e.preventDefault();
        // alert('ok')
        // recuperer les données de la dataTable
        var tableData = dataTable.rows().data().toArray();

        // Convertissez les données en un tableau simple
        var formattedData = tableData.map(function(row) {
            return Object.values(row);
        });

        // console.log(formattedData);

        // Envoyez les données au contrôleur via une requête Ajax
        $.ajax({
            url: 'controllers/upload_western_union_controller.php', // Remplacez par le chemin réel vers votre contrôleur
            method: 'POST',
            data: {
                upload_western_file: true,
                // Ajoutez d'autres données si nécessaire
                data: formattedData
            },
            dataType: 'json',
            success: function(response) {
                // Affichez la réponse du contrôleur (message de succès ou d'erreur)
                // console.log(response);
                if (response.success === 'true') {
                    $("#excelModal").modal("hide");

                    // Réinitialisez Dropzone
                    var myDropzone = Dropzone.forElement("#dpz-single-file");
                    if (myDropzone) {
                        myDropzone.removeAllFiles();
                    }

                    // MESSAGE ALERT
                    swal_Alert_Sucess(response.message)
                } else {
                    alert('Erreur : ' + response.message);
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });

    });
</script>