<script>
  $(function () {
    'use strict';

    // LECTURE DES ELEMENTS DE LA BASE DE DONNEES
    $.get('http://localhost:8080/kaspy_changes_office/index.php?page=api_money_gram', function (rep) {
      let data = JSON.parse(rep)
      data.map((champ_bd) => {

        dt_basic.row
          .add({
            responsive_id: champ_bd.id,
            id: champ_bd.id,
            Date: champ_bd.Heure_et_date,
            ajouter_par: champ_bd.ajouter_par,
            Num_Ref: champ_bd.Num_Ref,
            Montant: champ_bd.Montant,
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
          data: 'Date'
        },
        {
          data: 'ajouter_par'
        },
        {
          data: 'Num_Ref',
          render: function (data, type, row) {
            // Assurez-vous que la colonne "Num_Ref" contient du texte
            if (type === 'display' && data) {
              // Ajout d'un gestionnaire d'événements click avec une alerte
              return '<a href="#" data-id="' + row['id'] + '" class="clickable-link" style="font-weight:bolder">' + data + '</a>';
            } else {
              return data; // Si la colonne est vide ou si le type n'est pas 'display', renvoyer simplement la valeur existante
            }
          }
        },

        {
          data: 'Montant'
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
          render: function (data, type, full, meta) {
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
          // Actions
          targets: -1,
          title: 'Actions',
          orderable: false,
          render: function (data, type, full, meta) {
            return (
              '<div class="d-inline-flex">' +
              '<a class="pe-1 dropdown-toggle hide-arrow text-primary" data-bs-toggle="dropdown">' +
              feather.icons['more-vertical'].toSvg({
                class: 'font-small-4'
              }) +
              '</a>' +
              '<div class="dropdown-menu dropdown-menu-end">' +
              //Supprimer
              '<a  href="javascript:;" class="dropdown-item delete-record">' +
              feather.icons['trash-2'].toSvg({
                class: 'font-small-4 me-50'
              }) +
              'Supprimer</a>' +

              //Détails
              '<a href="javascript:;" class="dropdown-item">' +
              feather.icons['file-text'].toSvg({
                class: 'font-small-4 me-50'
              }) +
              'Détails</a>' +
              //Propriétés
              '<a href="javascript:;" class="dropdown-item proprietes" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">' +
              feather.icons['info'].toSvg({
                class: 'font-small-4 me-50'
              }) +
              'Propriétés</a>' +

              '</div>' +
              '</div>' +
              '<a href="javascript:;" class="item-edit" data-bs-target="#modal-modif" data-bs-toggle="modal">' +
              feather.icons['edit'].toSvg({
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
          init: function (api, node, config) {
            $(node).removeClass('btn-secondary');
            $(node).parent().removeClass('btn-group');
            setTimeout(function () {
              $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
            }, 50);
          }
        },
        {
          text: feather.icons['plus'].toSvg({
            class: 'me-50 font-small-4'
          }) + 'Importer',
          className: 'create-new btn btn-primary',
          attr: {
            'id': 'bt_ajouter',
            'data-bs-toggle': 'modal',
            'data-bs-target': '#importationModal'
          },
          init: function (api, node, config) {
            $(node).removeClass('btn-secondary');
          }
        }
        ],


        // RESPONSIVE - Sur téléphone
        responsive: {
          details: {
            display: $.fn.dataTable.Responsive.display.modal({
              header: function (row) {
                var data = row.data();
                return 'Détails de ' + data['champ1'];
              }
            }),
            type: 'column',
            renderer: function (api, rowIdx, columns) {
              var data = $.map(columns, function (col, i) {
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
        //       url: "controllers/infos_transactions_controller.php",
        //       success: function (result) {
        //         // alert(result);
        //         var donnees = JSON.parse(result);

        //         if (donnees['success'] === true) {
        //           var infos_transactions = donnees['infos_trans'];  

        //           // alert("Données bien arrivées");
        //           $('#id').html(infos_transactions['id']);
        //           $('#Heure_et_date').html(infos_transactions['Heure_et_date']);
        //           $('#Num_Ref').html(infos_transactions['Num_Ref']);
        //           $('#Identifiant_utilisateur').html(infos_transactions['Identifiant_utilisateur']);
        //           $('#ID_point_vente').html(infos_transactions['ID_point_vente']);
        //           $('#Montant').html(infos_transactions['Montant']);
        //           $('#Frais').html(infos_transactions['Frais']);
        //           $('#Total').html(infos_transactions['Total']);
        //           $('#ajouter_par').html(infos_transactions['ajouter_par']);
        //           $('#date_creation').html(infos_transactions['date_creation']);
        //           $('#user_creation').html(infos_transactions['user_creation']);
        //           $('#navigateur_creation').html(infos_transactions['navigateur_creation']);
        //           $('#ordinateur_creation').html(infos_transactions['ordinateur_creation']);
        //           $('#ip_creation').html(infos_transactions['ip_creation']);
        //           $('#date_modif').html(infos_transactions['date_modif']);
        //           $('#user_modif').html(infos_transactions['user_modif']);
        //           $('#navigateur_modif').html(infos_transactions['navigateur_modif']);
        //           $('#ordinateur_modif').html(infos_transactions['ordinateur_modif']);
        //           $('#ip_modif').html(infos_transactions['ip_modif']);

        //           window.location.href = 'index.php?page=infos_transactions';
        //         }
        //       }
        //     });
        //   });
        // }

      });
      $('div.head-label').html('<h6 class="mb-0">DataTable with Buttons</h6>');
    };





    // DRAG AND DROP POUR LE CHARGEMENT DES FICHIERS CSV
    $(document).ready(function () {

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

      $('#importation').on('drop', function (e) {
        e.preventDefault();
        const file = e.originalEvent.dataTransfer.files[0];

        if (file) {
          $('#importation').addClass('dragover');
          const reader = new FileReader();
          reader.onload = function (e) {
            const csv = e.target.result;
            const rows = csv.split("\n");

            // Process rows (you can send them to the server using AJAX)
            for (let i = 0; i < rows.length; i++) {
              const cells = rows[i].split(",");
              // Do something with the cells, like sending them to the server
              // console.log(cells);
              // sendDataToServer(cells);
              $("#ChangerImport").on('click', function () {
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
        url: "controllers/money_gram_controller.php",
        data: { data: data },
        success: function (result) {
          console.log(result);
          // Vous pouvez traiter la réponse du serveur ici
        },
        error: function (error) {
          console.error(error);
        }
      });
    };

    // Réinitialiser tout lorsqu'on clique sur le bouton "Fermer"
    $('#fermerBtn').on('click', function () {
      // Réinitialiser la zone de glisser-déposer
      $('#importation').removeClass('dragover');

      // Réinitialiser le nom du fichier
      document.getElementById('file-name').innerText = '';
      // Réinitialiser d'autres états si nécessaire
      // Fermer la modal
      $('#importationModal').modal('hide');
    });






    // Gestionnaire d'événements click pour les liens avec la classe 'clickable-link'
    $(document).on('click', '.clickable-link', function () {
      showAlert($(this).attr('data-id'), $(this).text());
    });

    // Fonction showAlert
    function showAlert(id, data) {
      // alert('Vous avez cliqué sur l\'élément avec l\'ID : ' + id + ' et la valeur : ' + data);
      $.ajax({
        type: "GET",
        data: "idInfonsTrans=" + id,
        url: "controllers/infos_transactions_controller.php",
        success: function (result) {
          // alert(result);
          var donnees = JSON.parse(result);
          if (donnees['success'] === true) {
            var infos_transactions = donnees['infos_trans'];
            // alert("Données bien arrivées");

            // $('#id').html(infos_transactions['id']);
            // $('#Heure_et_date').html(infos_transactions['Heure_et_date']);
            // $('#Num_Ref').html(infos_transactions['Num_Ref']);
            // $('#Identifiant_utilisateur').html(infos_transactions['Identifiant_utilisateur']);
            // $('#ID_point_vente').html(infos_transactions['ID_point_vente']);
            // $('#Montant').html(infos_transactions['Montant']);
            // $('#Frais').html(infos_transactions['Frais']);
            // $('#Total').html(infos_transactions['Total']);
            // $('#ajouter_par').html(infos_transactions['ajouter_par']);
            // $('#date_creation').html(infos_transactions['date_creation']);
            // $('#user_creation').html(infos_transactions['user_creation']);
            // $('#navigateur_creation').html(infos_transactions['navigateur_creation']);
            // $('#ordinateur_creation').html(infos_transactions['ordinateur_creation']);
            // $('#ip_creation').html(infos_transactions['ip_creation']);
            // $('#date_modif').html(infos_transactions['date_modif']);
            // $('#user_modif').html(infos_transactions['user_modif']);
            // $('#navigateur_modif').html(infos_transactions['navigateur_modif']);
            // $('#ordinateur_modif').html(infos_transactions['ordinateur_modif']);
            // $('#ip_modif').html(infos_transactions['ip_modif']);
            // window.location.href = 'index.php?page=infos_transactions';

            // Construction de l'URL avec les données
            var url = 'index.php?page=infos_transactions&';
            for (var key in infos_transactions) {
              if (infos_transactions.hasOwnProperty(key)) {
                url += encodeURIComponent(key) + '=' + encodeURIComponent(infos_transactions[key]) + '&';
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
    document.getElementById('retourArriere').addEventListener('click', function () {
      // Effectue le retour en arrière
      history.back();
    });

  });
</script>