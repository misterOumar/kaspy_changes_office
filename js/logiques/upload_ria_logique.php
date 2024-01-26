<?php include("views/components/alerts.php") ?>


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
                    }).filter(row =>
                        row[21] !== undefined && row[21] !== null && row[21] !== ''
                    );
                    const keys = nonEmptyZRows.length > 0 ? nonEmptyZRows[0].map((value, index) => index + 1) : [];
                    const dataRows = nonEmptyZRows.slice(1);

                    jsonData = dataRows.map(row =>
                        keys.reduce((obj, key, index) => {
                            obj[key] = row[index];
                            return obj;
                        }, {})
                    );


                    // console.log(JSON.stringify(jsonData, null, 2));
                    var date_saisie = document.getElementById("dates").value;
                    var dateColumnIndex = 17; // Assuming the date column is at index 17

                    if (jsonData.length > 0 && jsonData[0][dateColumnIndex]) {
                         var date_objet = jsonData[0][dateColumnIndex];
                        var parsedDate_objet = moment(date_objet,"DD/MM/YYYY HH:mm:ss").format("DD/MM/YYYY"); 
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


                    console.log(JSON.stringify(jsonData, null, 2));
                    const table = document.createElement('table');
                    table.classList.add('table', 'table-bordered', 'table-striped');
                    for (let i = 0; i < nonEmptyZRows.length; i++) {
                        const rowData = nonEmptyZRows[i];
                        const tableRow = document.createElement('tr');
                        for (let j = 0; j < rowData.length; j++) {
                            const cellData = rowData[j];
                            const cell = document.createElement('td');
                            cell.textContent = cellData;
                            tableRow.appendChild(cell);
                        }
                        table.appendChild(tableRow);
                    }
                    const tableContainer = document.getElementById('tableContainer');
                    tableContainer.innerHTML = '';
                    tableContainer.appendChild(table);
                    const dataModal = new bootstrap.Modal(document.getElementById('dataModal'));
                    dataModal.show();
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
    $("#btn_save").click(function (e) {
        e.preventDefault();
        // ... (votre code existant)
        // Appel de la fonction pour envoyer les données au contrôleur
        sendDataToController(jsonData);
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
                    $("#dataModal").modal("hide");
                    // Réinitialisez Dropzone
                    // MESSAGE ALERT
                    swal_Alert_Sucess(response.message);
                    var myDropzone = Dropzone.forElement("#dpz-single-file");
                    if (myDropzone) {
                        myDropzone.removeAllFiles();
                    }
                }  else if(response.success === 'existe') 
                {                        // MESSAGE ALERT SI  EXISTE
                        $("#dataModal").modal("hide");
                    // Réinitialisez Dropzone
                    // MESSAGE ALERT
                    swal_Alert_Danger(response.message);
                    var myDropzone = Dropzone.forElement("#dpz-single-file");
                    if (myDropzone) {
                        myDropzone.removeAllFiles();
                    }
               }else {
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