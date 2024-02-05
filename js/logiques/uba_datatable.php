<?php
include('../config/config.php');
$api_url = API_HOST . 'index.php?page=api_uba';
?>
<script>
  $(function() {
    'use strict';

    // LECTURE DES ELEMENTS DE LA BASE DE DONNEES
    $.get('<?= $api_url; ?>', function(rep) {
      let data = JSON.parse(rep)
      data.map((champ_bd) => {

        dt_basic.row
          .add({
            responsive_id: champ_bd.id,
            id: champ_bd.id,
            dates: champ_bd.Dates,
            trans_id: champ_bd.Trans_ID,
            running_bal: champ_bd.Running_Bal,
            amount: champ_bd.Amount,
            ajouter_par: champ_bd.ajouter_par,
            description: champ_bd.Description,
          })
          .draw();
      })
    })



    // CONSTRUCTION DE LA DATATABLE
    var dt_basic_table = $('.datatables-basic'),
      dt_date_table = $('.dt-date'),
      assetPath = '../../../js/';

    if ($('body').attr('data-framework') === 'laravel') {
      assetPath = $('body').attr('data-asset-path');
    }

    // DataTable with buttons
    // --------------------------------------------------------------------

    if (dt_basic_table.length) {
      var dt_basic = dt_basic_table.DataTable({
        columns: [{
            data: 'responsive_id'
          },
          {
            data: 'id'
          },
          {
            data: 'id'
          }, // used for sorting so will hide this column
          {
            data: 'dates'
          },

          {
            data: 'trans_id',

          },
          {
            data: 'running_bal'
          },
          {
            data: 'amount'
          },


          {
            data: ''
          }
        ],
        columnDefs: [{
            // For Responsive
            className: 'control',
            orderable: false,
            responsivePriority: 2,
            targets: 0
          },
          {
            // For Checkboxes
            targets: 1,
            orderable: false,
            responsivePriority: 3,
            render: function(data, type, full, meta) {
              return (
                '<div class="form-check"> <input class="form-check-input dt-checkboxes" type="checkbox" value="" id="checkbox' +
                data +
                '" /><label class="form-check-label" for="checkbox' +
                data +
                '"></label></div>'
              );
            },
            checkboxes: {
              selectAllRender: '<div class="form-check"> <input class="form-check-input" type="checkbox" value="" id="checkboxSelectAll" /><label class="form-check-label" for="checkboxSelectAll"></label></div>'
            }
          },
          {
            //ID
            targets: 2,
            visible: false
          },
          {
            responsivePriority: 1,
            targets: 4
          },
          {
            // Avatar image/badge, libelle and nom_pop
            targets: 3,
            responsivePriority: 1,
            render: function(data, type, full, meta) {
              var $user_img = full['avatar'],
                $libelle = full['libelle'],
                $duree = full['duree'],
                $type = full['description'];
              var bg;
              if ($type === 'Commission Revenu') {
                bg = 'bg-success'
              } else {
                bg = 'bg-info'

              }
              if ($user_img) {
                // For Avatar image
                var $output =
                  '<img src="' + assetPath + 'images/avatars/' + $user_img + '" alt="Avatar" width="32" height="32">';
              } else {
                // For Avatar badge
                var stateNum = full['status'];
                var states = ['success', 'danger', 'warning', 'info', 'dark', 'primary', 'secondary'];
                var $state = states[stateNum],
                  $expediteur = full['dates'],
                  $initials = $expediteur.match(/\b\w/g) || [];
                $initials = (($initials.shift() || '') + ($initials.pop() || '')).toUpperCase();
                $output = '<span class="avatar-content ' + bg + '" >' + $initials + '</span>';
              }

              var colorClass = $user_img === '' ? ' bg-light-' + $state + ' ' : '';
              // Creates full output for row
              var $row_output =
                '<div class="d-flex justify-content-left align-items-center">' +
                '<div class="avatar ' +
                colorClass +
                ' me-1">' +
                $output +
                '</div>' +
                '<div class="d-flex flex-column">' +
                '<span class="emp_nom text-truncate fw-bold">' +
                $expediteur +
                '</span>' +
                '<small class="emp_nom_pop text-truncate text-muted">' +
                $type +
                '</small>' +
                '</div>' +
                '</div>';
              return $row_output;
            }
          },

          {
            // Actions
            targets: -1,
            title: 'Actions',
            orderable: false,
            render: function(data, type, full, meta) {
              return (
                '<div class="d-inline-flex">' +
                '<a href="javascript:;" class="text-info me-1 proprietes" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">' +
                feather.icons['info'].toSvg({
                  class: 'font-small-4'
                }) +
                '</a>' +

                '</div>' +
                '<a href="javascript:;" class="details"  title="Détail transaction">' +
                feather.icons['eye'].toSvg({
                  class: 'font-small-4'
                }) +
                '</a>'
              );
            }
          }
        ],
        order: [
          [2, 'desc']
        ],


        // Les boutons d'action
        dom: '<"card-header border-bottom p-1"<"head-label"><"dt-action-buttons text-end"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
        displayLength: 7,
        lengthMenu: [7, 10, 25, 50, 75, 100],
        buttons: [{
            extend: 'collection',
            className: 'btn btn-outline-secondary dropdown-toggle me-2',
            text: feather.icons['share'].toSvg({
              class: 'font-small-4 me-50'
            }) + 'Exporter',
            buttons: [{
                extend: 'print',
                text: feather.icons['printer'].toSvg({
                  class: 'font-small-4 me-50'
                }) + 'Imprimer',
                className: 'dropdown-item',
                exportOptions: {
                  columns: [3, 4, 5, 6, 7]
                }
              },
              {
                extend: 'csv',
                text: feather.icons['file-text'].toSvg({
                  class: 'font-small-4 me-50'
                }) + 'Csv',
                className: 'dropdown-item',
                exportOptions: {
                  columns: [3, 4, 5, 6, 7]
                }
              },
              {
                extend: 'excel',
                text: feather.icons['file'].toSvg({
                  class: 'font-small-4 me-50'
                }) + 'Excel',
                className: 'dropdown-item',
                exportOptions: {
                  columns: [3, 4, 5, 6, 7]
                }
              },
              {
                extend: 'pdf',
                text: feather.icons['clipboard'].toSvg({
                  class: 'font-small-4 me-50'
                }) + 'Pdf',
                className: 'dropdown-item',
                exportOptions: {
                  columns: [3, 4, 5, 6, 7]
                }
              },
              {
                extend: 'copy',
                text: feather.icons['copy'].toSvg({
                  class: 'font-small-4 me-50'
                }) + 'Copier',
                className: 'dropdown-item',
                exportOptions: {
                  columns: [3, 4, 5, 6, 7]
                }
              }
            ],
            init: function(api, node, config) {
              $(node).removeClass('btn-secondary');
              $(node).parent().removeClass('btn-group');
              setTimeout(function() {
                $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
              }, 50);
            }
          },
          {
            text: feather.icons['download'].toSvg({
              class: 'me-50 font-small-4'
            }) + 'Faire le point',
            className: 'create-new btn btn-primary',
            attr: {
              'id': 'bt_importer',
              'onclick': 'window.location.href = "index.php?page=rechargement_uba"',
            },
            init: function(api, node, config) {
              $(node).removeClass('btn-secondary');
            }
          },

        ],
        // RESPONSIVE - Sur téléphone
        responsive: {
          details: {
            display: $.fn.dataTable.Responsive.display.modal({
              header: function(row) {
                var data = row.data();
                return 'Détails de ' + data['champ1'];
              }
            }),
            type: 'column',
            renderer: function(api, rowIdx, columns) {
              var data = $.map(columns, function(col, i) {
                return col.title !== '' // ? Do not show row in modal popup if title is blank (for check box)
                  ?
                  '<tr data-dt-row="' +
                  col.rowIdx +
                  '" data-dt-column="' +
                  col.columnIndex +
                  '">' +
                  '<td>' +
                  col.title +
                  ':' +
                  '</td> ' +
                  '<td>' +
                  col.data +
                  '</td>' +
                  '</tr>' :
                  '';
              }).join('');

              return data ? $('<table class="table"/>').append('<tbody>' + data + '</tbody>') : false;
            }
          }
        },
        language: {
          url: 'js/plugins/tables/language.french.json',
          paginate: {
            // remove previous & next text from pagination
            previous: '&nbsp;',
            next: '&nbsp;'
          }
        },

        // // Ajouter un événement de survol pour chaque ligne
        // rowCallback: function (row, data) {
        //   // Ajouter la classe 'datatable-clickable-row' uniquement à la ligne cliquée
        //   $(row).addClass('datatable-clickable-row');

        //   // Ajouter un événement de clic à la ligne
        //   $(row).on('click', function () {
        //     // Récupérer l'ID de la ligne
        //     var ligneID = data.id;

        //     // Rediriger vers la nouvelle page avec l'ID en paramètre
        //     $.ajax({
        //       type: "GET",
        //       data: "idInfonsTrans=" + ligneID,
        //       url: "controllers/infos_transactions_money_gram_controller.php",
        //       success: function (result) {
        //         // alert(result);
        //         var donnees = JSON.parse(result);

        //         if (donnees['success'] === true) {
        //           var infos_transactions_money_gram = donnees['infos_trans'];  

        //           // alert("Données bien arrivées");
        //           $('#id').html(infos_transactions_money_gram['id']);
        //           $('#Heure_et_date').html(infos_transactions_money_gram['Heure_et_date']);
        //           $('#Num_Ref').html(infos_transactions_money_gram['Num_Ref']);
        //           $('#Identifiant_utilisateur').html(infos_transactions_money_gram['Identifiant_utilisateur']);
        //           $('#ID_point_vente').html(infos_transactions_money_gram['ID_point_vente']);
        //           $('#Montant').html(infos_transactions_money_gram['Montant']);
        //           $('#Frais').html(infos_transactions_money_gram['Frais']);
        //           $('#Total').html(infos_transactions_money_gram['Total']);
        //           $('#ajouter_par').html(infos_transactions_money_gram['ajouter_par']);
        //           $('#date_creation').html(infos_transactions_money_gram['date_creation']);
        //           $('#user_creation').html(infos_transactions_money_gram['user_creation']);
        //           $('#navigateur_creation').html(infos_transactions_money_gram['navigateur_creation']);
        //           $('#ordinateur_creation').html(infos_transactions_money_gram['ordinateur_creation']);
        //           $('#ip_creation').html(infos_transactions_money_gram['ip_creation']);
        //           $('#date_modif').html(infos_transactions_money_gram['date_modif']);
        //           $('#user_modif').html(infos_transactions_money_gram['user_modif']);
        //           $('#navigateur_modif').html(infos_transactions_money_gram['navigateur_modif']);
        //           $('#ordinateur_modif').html(infos_transactions_money_gram['ordinateur_modif']);
        //           $('#ip_modif').html(infos_transactions_money_gram['ip_modif']);

        //           window.location.href = 'index.php?page=infos_transactions_money_gram';
        //         }
        //       }
        //     });
        //   });
        // }



      });
      $('div.head-label').html('<h6 class="mb-0">DataTable with Buttons</h6>');
    };

    // PROPRIETE D'UNE LIGNE
    $('.datatables-basic tbody').on('click', '.proprietes', function() {
      var that = this
      
      $.ajax({
        type: "GET",
        data: "idProprietes=" + (dt_basic.row($(that).parents('tr')).data().id), //Envois de l'id selectionné
        url: "controllers/uba_controller.php",        
        success: function(result) {
          var donnees = JSON.parse(result);          

          if (donnees['proprietes_rechargement'] !== 'null') {
            let proprietes = donnees['proprietes_rechargement']

            $("#offcanvasBottomLabel").html("Propriété du rechargement du « " + proprietes['Dates'] + " »");
            $("#date_creation").html(proprietes['date_creation']);
            $("#user_creation").html(proprietes['user_creation']);
            $("#navigateur_creation").html(proprietes['navigateur_creation']);
            $("#ordinateur_creation").html(proprietes['ordinateur_creation']);
            $("#ip_creation").html(proprietes['ip_creation']);
            $("#date_modification").html(proprietes['date_modif']);
            $("#user_modification").html(proprietes['user_modif']);
            $("#navigateur_modification").html(proprietes['navigateur_modif']);
            $("#ordinateur_modification").html(proprietes['ordinateur_modif']);
            $("#ip_modification").html(proprietes['ip_modif']);
            $("#ecole").html(proprietes['magasin']);
          }
        },
        error: function (error) {
          console.log(error);
        }
      })
    });

     // Details
     $('.datatables-basic tbody').on('click', '.details', function() {
            var that = this
            $.ajax({
                type: "GET",
                data: "idProprietes=" + (dt_basic.row($(that).parents('tr')).data().id), //Envois de l'id selectionné
                url: "controllers/uba_controller.php",
                success: function(result) {
                    var donnees = JSON.parse(result);
                    if (donnees['proprietes_rechargement'] !== 'null') {

                        let uba = donnees['proprietes_rechargement']

                        $('#titre_modal').text('Détail du rechargement uba')

                        // le tableau de la transaction
                        $('.modal_details .modal-body').html(`
                            <table class="table table-bordered text-nowrap text-center">             
                                <tbody class="details">
                                    <tr>
                                        <th scope="row" class="text-start">Date</th>                                      
                                        <td  class="text-start">${uba.Dates}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="text-start">ID Transaction</th>                                      
                                        <td  class="text-start">${uba.Trans_ID}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="text-start">Montant</th>                                      
                                        <td  class="text-start">${uba.Amount}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="text-start">honoraires</th>                                        
                                        <td  class="text-start">${uba.Fees}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="text-start">Running Bal</th>                                        
                                        <td  class="text-start">${uba.Running_Bal}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="text-start">Description</th>                                        
                                        <td  class="text-start">${uba.Description}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="text-start">Reference</th>                                        
                                        <td  class="text-start">${uba.Reference}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="text-start">Account Id</th>                                        
                                        <td  class="text-start">${uba.Account_Id}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="text-start">Last Name</th>                                      
                                        <td  class="text-start">${uba.Last_Name}</td>
                                    </tr>                                     
                                </tbody>
                            </table>
                        `);


                        // afficher le modal
                        $('.modal_details').modal('show')



                    }
                }
            })
        });





    // DRAG AND DROP POUR LE CHARGEMENT DES FICHIERS CSV
    $(document).ready(function() {

      //survole avec le fichier 
      // $('#importation').on('dragenter', function (e) {
      //   e.preventDefault();
      //   $('#importation').addClass('dragover');
      // });

      // //non survole avec le fichier 
      // $('#importation').on('dragleave', function (e) {
      //   e.preventDefault();
      //   $('#importation').removeClass('dragover');
      // });

      $('#importation').on('drop', function(e) {
        e.preventDefault();
        const file = e.originalEvent.dataTransfer.files[0];

        if (file) {
          $('#importation').addClass('dragover');
          const reader = new FileReader();
          reader.onload = function(e) {
            const csv = e.target.result;
            const rows = csv.split("\n");

            // Process rows (you can send them to the server using AJAX)
            for (let i = 0; i < rows.length; i++) {
              const cells = rows[i].split(",");
              // Do something with the cells, like sending them to the server
              console.log(cells);
              // sendDataToServer(cells);
              $("#ChangerImport").on('click', function() {
                // console.log(cells);
                sendDataToServer(cells);

              })
            }
            // Afficher le nom du fichier
            $('#importation').addClass('dragover');
            document.getElementById('file-name').innerText = 'Nom du fichier : ' + file.name;

            // alert("Fichier CSV traité avec succès!");
          };
          reader.readAsText(file);
        }
      });
    });

    // FONCTION POUR ENVOYER LES DONNEES CSV AU CONTROLLER 
    function sendDataToServer(data) {
      // Envoi des données au serveur via AJAX
      $.ajax({
        type: "POST",
        url: "controllers/uba_controller.php",
        data: {
          data: data
        },
        success: function(result) {
          // console.log(result);
          // Vous pouvez traiter la réponse du serveur ici

          var donnees = JSON.parse(result);
          if (donnees['success'] === true) {
            $('#importationModal').modal('hide');

            // MESSAGE ALERT      
            window.location.reload();
            swal_Alert_Sucess("Données chargées avec succès");

          }
        },
        error: function(error) {
          console.error(error);
        }
      });
    };

    // Réinitialiser tout lorsqu'on clique sur le bouton "Fermer"
    $('#fermerBtn').on('click', function() {
      // Réinitialiser la zone de glisser-déposer
      $('#importation').removeClass('dragover');

      // Réinitialiser le nom du fichier
      document.getElementById('file-name').innerText = '';
      // Réinitialiser d'autres états si nécessaire
      // Fermer la modal
      $('#importationModal').modal('hide');
    });






    // Gestionnaire d'événements click pour les liens avec la classe 'clickable-link'
    $(document).on('click', '.clickable-link', function() {
      showAlert($(this).attr('data-id'), $(this).text());
    });

    // Fonction showAlert
    function showAlert(id, data) {
      // alert('Vous avez cliqué sur l\'élément avec l\'ID : ' + id + ' et la valeur : ' + data);
      $.ajax({
        type: "GET",
        data: "idInfonsTrans=" + id,
        url: "controllers/infos_transactions_uba_controller.php",
        success: function(result) {
          // alert(result);
          var donnees = JSON.parse(result);
          if (donnees['success'] === true) {
            var infos_transactions_uba = donnees['infos_trans'];
            // alert("Données bien arrivées");

            // $('#id').html(infos_transactions_money_gram['id']);
            // $('#Heure_et_date').html(infos_transactions_money_gram['Heure_et_date']);
            // $('#Num_Ref').html(infos_transactions_money_gram['Num_Ref']);
            // $('#Identifiant_utilisateur').html(infos_transactions_money_gram['Identifiant_utilisateur']);
            // $('#ID_point_vente').html(infos_transactions_money_gram['ID_point_vente']);
            // $('#Montant').html(infos_transactions_money_gram['Montant']);
            // $('#Frais').html(infos_transactions_money_gram['Frais']);
            // $('#Total').html(infos_transactions_money_gram['Total']);
            // $('#ajouter_par').html(infos_transactions_money_gram['ajouter_par']);
            // $('#date_creation').html(infos_transactions_money_gram['date_creation']);
            // $('#user_creation').html(infos_transactions_money_gram['user_creation']);
            // $('#navigateur_creation').html(infos_transactions_money_gram['navigateur_creation']);
            // $('#ordinateur_creation').html(infos_transactions_money_gram['ordinateur_creation']);
            // $('#ip_creation').html(infos_transactions_money_gram['ip_creation']);
            // $('#date_modif').html(infos_transactions_money_gram['date_modif']);
            // $('#user_modif').html(infos_transactions_money_gram['user_modif']);
            // $('#navigateur_modif').html(infos_transactions_money_gram['navigateur_modif']);
            // $('#ordinateur_modif').html(infos_transactions_money_gram['ordinateur_modif']);
            // $('#ip_modif').html(infos_transactions_money_gram['ip_modif']);
            // window.location.href = 'index.php?page=infos_transactions_money_gram';

            // Construction de l'URL avec les données
            var url = 'index.php?page=infos_transactions_uba&';
            for (var key in infos_transactions_uba) {
              if (infos_transactions_uba.hasOwnProperty(key)) {
                url += encodeURIComponent(key) + '=' + encodeURIComponent(infos_transactions_uba[key]) + '&';
              }
            }

            // Supprimer le dernier '&'
            url = url.slice(0, -1);

            // Redirection avec les données dans l'URL
            window.location.href = url;
          }
        }
      });

    };

    // Ajoutez un gestionnaire d'événements clic à l'élément de menu
    document.getElementById('retourArriere').addEventListener('click', function() {
      // Effectue le retour en arrière
      history.back();
    });




  });
</script>