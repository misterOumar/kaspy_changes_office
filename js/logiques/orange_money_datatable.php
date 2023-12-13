 <!-- <script>
     $(function() {
         'use strict';

         // LECTURE DES ELEMENTS DE LA BASE DE DONNEES
         $.get('http://localhost:8080/kaspy_changes_office/index.php?page=api_orange_money', function(rep) {
             let data = JSON.parse(rep)
             data.map((champ_bd) => {
                 var imageUrl = champ_bd.logo;
                 dt_basic.row
                     .add({
                         responsive_id: champ_bd.id,
                         id: champ_bd.id,
                         montant: champ_bd.montant,
                         date: champ_bd.date,
                         client: champ_bd.client,
                         telephone_client: champ_bd.telephone_client,
                         destinataire: champ_bd.destinataire,
                         telephone_destinataire: champ_bd.telephone_destinataire,
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
         //Construction des colonnes de la datatable
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
                     },
                     // used for sorting so will hide this column
                     {
                         data: 'montant'
                     },
                     {
                         data: 'date'
                     },
                     {
                         data: 'client'
                     },
                     {
                         data: 'telephone_client'
                     },
                     {
                         data: 'destinataire'
                     },
                     {
                         data: 'telephone_destinataire'
                     },

                     {
                         data: ''
                     }
                 ],
                 columnDefs: [{
                         // For Responsive
                         className: 'control',
                         orderable: false,
                         responsivePriority: 4,
                         targets: 0
                     },

                     {
                         // For Checkboxes
                         targets: 1,
                         orderable: false,
                         responsivePriority: 3,
                         render: function(data, type, full, meta) {
                             return (
                                 "<div class='form-check'> <input class='form-check-input dt-checkboxes' type='checkbox' value='' id='checkbox" +
                                 data +
                                 "' /><label class='form-check-label' for='checkbox" +
                                 data +
                                 "'></label></div>"
                             );
                         },
                         checkboxes: {
                             selectAllRender: "<div class='form-check'> <input class='form-check-input' type='checkbox' value='' id='checkboxSelectAll' /><label class='form-check-label' for='checkboxSelectAll'></label></div>"
                         }
                     },

                     {
                         //ID
                         targets: 2,
                         visible: false
                     },

                     // Le badge ou l'image rond
                     {
                         // Avatar image/badge, libelle and nom_pop
                         targets: 3,
                         responsivePriority: 1,
                         render: function(data, type, full, meta) {
                             var $user_img = full['avatar'],
                                 $libelle = full['client'],
                                 $duree = full['montant'];
                             if ($user_img) {
                                 // For Avatar image
                                 var $output =
                                     '<img src="' + assetPath + 'images/avatars/' + $user_img + '" alt="Avatar" width="32" height="32">';
                             } else {
                                 // For Avatar badge
                                 var stateNum = full['status'];
                                 var states = ['success', 'danger', 'warning', 'info', 'dark', 'primary', 'secondary'];
                                 var $state = states[stateNum],
                                     $libelle = full['montant'],
                                     $initials = $libelle.match(/\b\w/g) || [];
                                 $initials = (($initials.shift() || '') + ($initials.pop() || '')).toUpperCase();
                                 $output = '<span class="avatar-content">' + $initials + '</span>';
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
                                 $libelle + ' ' + 'FCFA' +
                                 '</span>' +
                                 '</div>' +
                                 '</div>';
                             return $row_output;
                         }
                     },
                     // fin du badge ou de l'image rond

                     // ActionsVoulez vous vraiment supprimer ?
                     {
                         targets: -1,
                         title: 'Actions',
                         orderable: false,
                         render: function(data, type, full, meta) {
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
                                 '<a href="javascript:;" class="item-edit bt_modifier" data-bs-target="#modal-modif" data-bs-toggle="modal">' +
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
                 dom: "<'card-header border-bottom p-1'<'head-label'><'dt-action-buttons text-end'B>><'d-flex justify-content-between align-items-center mx-0 row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>t<'d-flex justify-content-between mx-0 row'<'col-sm-12 col-md-6'i><'col-sm-12 col-md-6'p>>",
                 displayLength: 7,
                 lengthMenu: [7, 10, 25, 50, 75, 100],
                 buttons: [{
                         extend: 'collection',
                         className: 'btn btn-outline-secondary dropdown-toggle me-2 export',
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
                         }) + 'importer un fichier',
                         className: 'btn btn-outline-secondary',
                         attr: {
                             'id': 'bt_importer',
                             'name': 'bt_importer',
                             'data-bs-toggle': 'modal',
                             'data-bs-target': '#modal-import'
                         },
                         init: function(api, node, config) {
                             $(node).removeClass('btn-success');
                         }
                     },
                     {
                         text: feather.icons['plus'].toSvg({
                             class: 'me-50 font-small-4'
                         }) + 'Ajouter nouveau',
                         className: 'create-new btn btn-primary',
                         attr: {
                             'id': 'bt_ajouter',
                             'data-bs-toggle': 'modal',
                             'data-bs-target': '#modals-slide-in'
                         },
                         init: function(api, node, config) {
                             $(node).removeClass('btn-secondary');
                         }
                     }
                 ],
                 // RESPONSIVE - Sur téléphone
                 responsive: {
                     details: {
                         display: $.fn.dataTable.Responsive.display.modal({
                             header: function(row) {
                                 var data = row.data();
                                 return 'Détails de ' + data['nom_prenom'];
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
                 }
             });
             $('div.head-label').html('<h6 class="mb-0">DataTable with Buttons</h6>');
         }

         // Flat Date picker
         if (dt_date_table.length) {
             dt_date_table.flatpickr({
                 monthSelectorType: 'static',
                 dateFormat: 'm/d/Y'
             });
         }
         // MODIFIER UN ELEMENT
         $('#form_ajouter').on('submit', function(e) {
             var $new_montant = $('#montant').val(),
                 $new_client = $('#client').val(),
                 $new_date_t = $('#date_t').val(),
                 $new_destinataire = $('#destinataire').val(),
                 $new_tel_cli = $('#tel_cli').val(),
                 $new_tel_dest = $('#tel_dest').val();
             e.preventDefault()

             if ($new_montant != '') {
                 // Ajout Back
                 initializeFlash();

                 var form = $('#form_ajouter');
                 var method = form.prop('method');
                 var url = form.prop('action');

                 $.ajax({
                     type: method,
                     data: form.serialize() + "&bt_enregistrer=" + true,
                     url: url,
                     success: function(result) {
                         //console.log(result);
                         var donnee = JSON.parse(result);
                         if (donnee['success'] === 'existe') {
                             $('#montant').addClass('is-invalid');
                             $('#montantHelp').html(donnee['message']);
                             $('#montantHelp').removeClass('invisible');

                             $('.flash').html('<i class="fas fa-exclamation-circle"></i> ' + donnee['message'])
                                 .fadeIn(300).delay(2500).fadeOut(300);
                         }
                         if (donnee['success'] === 'true') {
                             $('#montant').val("");
                             $('#montantHelp').html("").addClass('invisible');

                             // MESSAGE ALERT
                             swal_Alert_Sucess(donnee['message'])

                             // Récupération de l'id de la ligne ajoutée
                             $.ajax({
                                 type: "GET",
                                 data: "idLast=" + true,
                                 url: "controllers/moov_money_controller.php",
                                 success: function(result) {
                                     var donnees = JSON.parse(result)
                                     if (donnees['last_transaction'] !== 'null') {
                                         let last_transactions = donnees['last_transaction'];
                                         let last_id = transactions['id'];
                                         let total = donnees['total'];

                                         // Ajout Front et ajout de l'id de la dernière ligne crée
                                         dt_basic.row
                                             .add({
                                                 responsive_id: last_id,
                                                 id: last_id,
                                                 montant: $new_montant,
                                                 date: $new_date_t,
                                                 client: $new_client,
                                                 telephone_client: $new_tel_cli,
                                                 destinataire: $new_destinataire,
                                                 telephone_destinataire: $new_tel_dest,
                                                 status: 5

                                             })
                                             .draw();
                                         $('.modal').modal('hide');
                                     }
                                 }
                             });
                         }
                     }
                 });

                 if (donnee['success'] === 'false') {
                     $('#montantHelp').html(donnee['montant']).removeClass('invisible');

                     initializeFlash();
                     $('.flash').addClass('alert-danger');
                     $('.flash').html('<i class="fas fa-exclamation-circle"></i> ' + donnee['message'])
                         .fadeIn(300).delay(2500).fadeOut(300);

                     e.preventDefault()
                 }
             }
         });



         // MODIFIER UN ELEMENT
         var that
         $('.datatables-basic tbody').on('click', '.item-edit', function() {
             that = this
             $.ajax({
                 type: "GET",
                 data: "idOrange=" + (dt_basic.row($(that).parents('tr')).data().id), //Envois de l'id selectionné
                 url: "controllers/orange_money_controller.php",
                 success: function(result) {
                     var donnees = JSON.parse(result);
                     if (donnees['orange'] !== 'null') {
                         // Remplir le formulaire

                         let orange = donnees['orange'];

                         $('#idModif').val(orange['id']);

                         $('#montant_modif').val(orange['montant']);

                         $('#date_t_modif').val(orange['date']);

                         $('#client_modif').val(orange['client']);

                         $('#tel_cli_modif').val(orange['telephone_client']);

                         $('#destinataire_modif').val(orange['destinataire']);

                         $('#tel_dest_modif').val(orange['telephone_destinataire']);

                     }
                 }
             })
         });

         // SUPPRIMER UNE LIGNE
         $('.datatables-basic tbody').on('click', '.delete-record', function() {
             // Suppression Front
             var that = this
             //--------------- Confirm Options SWEET ALERT ---------------
             Swal.fire({
                 title: 'Voulez vous vraiment supprimer ?',
                 text: 'la transaction de < ' + (dt_basic.row($(this).parents('tr')).data().client) + ' :' + (dt_basic.row($(this).parents('tr')).data().montant) +
                     '> sera supprimé définitivement',
                 icon: 'warning',
                 showCancelButton: true,
                 confirmButtonText: 'Oui, Supprimer !',
                 cancelButtonText: 'Annuler',
                 customClass: {
                     confirmButton: 'btn btn-primary',
                     cancelButton: 'btn btn-outline-danger ms-1'
                 },
                 buttonsStyling: false,
             }).then(function(result) {
                 if (result.value) {
                     Swal.fire({
                         icon: 'success',
                         title: 'Suppression éffectuée !',
                         text: "'la transaction de  " + (dt_basic.row($(that).parents('tr')).data().client) + " ' a été supprimée avec succès.",
                         showConfirmButton: false,
                         timer: 1300,
                         customClass: {
                             confirmButton: 'btn btn-success'
                         }
                     });
                 }
             });
             $('.swal2-confirm').on('click', function() {

                 //Suppression Back
                 $.ajax({
                     type: "GET",
                     data: "idSuppr=" + (dt_basic.row($(that).parents('tr')).data().id), //Envois de l'id selectionné
                     url: "controllers/orange_money_controller.php",
                     success: function(result) {
                         var donneee = JSON.parse(result);
                         if (donneee['success'] === 'true') {
                             dt_basic.row($(that).parents('tr')).remove().draw() //Suppression de la ligne selectionnée
                         } else if (donneee['success'] === 'false') {
                             initializeFlash();
                             $('.flash').addClass('alert-danger');
                             $('.flash').html('<i class="fas fa-exclamation-circle"></i> ' + donneee['message'])
                                 .fadeIn(300).delay(2500).fadeOut(300);
                         } else {
                             initializeFlash();
                             $('.flash').addClass('alert-danger');
                             $('.flash').html('<i class="fas fa-exclamation-circle"></i> Erreur inconnue')
                                 .fadeIn(300).delay(2500).fadeOut(300);
                         }
                     }
                 })

             });
         });



     });
 </script> -->

 <script>
     $(function() {
         'use strict';

         // LECTURE DES ELEMENTS DE LA BASE DE DONNEES
         $.get('http://localhost:8080/kaspy_changes_office/index.php?page=api_orange_money', function(rep) {
             let data = JSON.parse(rep)
             data.map((champ_bd) => {
                 var imageUrl = champ_bd.logo;
                 dt_basic.row
                     .add({
                         responsive_id: champ_bd.id,
                         id: champ_bd.id,
                         montant: champ_bd.montant,
                         date: champ_bd.date,
                         client: champ_bd.client,
                         telephone_client: champ_bd.telephone_client,
                         destinataire: champ_bd.destinataire,
                         telephone_destinataire: champ_bd.telephone_destinataire,
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
         //Construction des colonnes de la datatable
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
                     },
                     // used for sorting so will hide this column
                     {
                         data: 'montant'
                     },
                     {
                         data: 'date'
                     },
                     {
                         data: 'client'
                     },
                     {
                         data: 'telephone_client'
                     },
                     {
                         data: 'destinataire'
                     },
                     {
                         data: 'telephone_destinataire'
                     },

                     {
                         data: ''
                     }
                 ],
                 columnDefs: [{
                         // For Responsive
                         className: 'control',
                         orderable: false,
                         responsivePriority: 4,
                         targets: 0
                     },

                     {
                         // For Checkboxes
                         targets: 1,
                         orderable: false,
                         responsivePriority: 3,
                         render: function(data, type, full, meta) {
                             return (
                                 "<div class='form-check'> <input class='form-check-input dt-checkboxes' type='checkbox' value='' id='checkbox" +
                                 data +
                                 "' /><label class='form-check-label' for='checkbox" +
                                 data +
                                 "'></label></div>"
                             );
                         },
                         checkboxes: {
                             selectAllRender: "<div class='form-check'> <input class='form-check-input' type='checkbox' value='' id='checkboxSelectAll' /><label class='form-check-label' for='checkboxSelectAll'></label></div>"
                         }
                     },

                     {
                         //ID
                         targets: 2,
                         visible: false
                     },
                     // Le badge ou l'image rond
                     {
                         // Avatar image/badge, libelle and nom_pop
                         targets: 3,
                         responsivePriority: 1,
                         render: function(data, type, full, meta) {
                             var $user_img = full['avatar'],
                                 $libelle = full['client'],
                                 $duree = full['montant'];
                             if ($user_img) {
                                 // For Avatar image
                                 var $output =
                                     '<img src="' + assetPath + 'images/avatars/' + $user_img + '" alt="Avatar" width="32" height="32">';
                             } else {
                                 // For Avatar badge
                                 var stateNum = full['status'];
                                 var states = ['success', 'danger', 'warning', 'info', 'dark', 'primary', 'secondary'];
                                 var $state = states[stateNum],
                                     $libelle = full['montant'],
                                     $initials = $libelle.match(/\b\w/g) || [];
                                 $initials = (($initials.shift() || '') + ($initials.pop() || '')).toUpperCase();
                                 $output = '<span class="avatar-content">' + $initials + '</span>';
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
                                 $libelle + ' ' + 'FCFA' +
                                 '</span>' +
                                 '</div>' +
                                 '</div>';
                             return $row_output;
                         }
                     },
                     // fin du badge ou de l'image rond

                     // ActionsVoulez vous vraiment supprimer ?
                     {
                         targets: -1,
                         title: 'Actions',
                         orderable: false,
                         render: function(data, type, full, meta) {
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
                                 '<a href="javascript:;" class="item-edit bt_modifier" data-bs-target="#modal-modif" data-bs-toggle="modal">' +
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
                 dom: "<'card-header border-bottom p-1'<'head-label'><'dt-action-buttons text-end'B>><'d-flex justify-content-between align-items-center mx-0 row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>t<'d-flex justify-content-between mx-0 row'<'col-sm-12 col-md-6'i><'col-sm-12 col-md-6'p>>",
                 displayLength: 7,
                 lengthMenu: [7, 10, 25, 50, 75, 100],
                 buttons: [{
                         extend: 'collection',
                         className: 'btn btn-outline-secondary dropdown-toggle me-2 export',
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
                         }) + 'importer un fichier',
                         className: 'btn btn-outline-secondary',
                         attr: {
                             'id': 'bt_importer',
                             'name': 'bt_importer',
                             'data-bs-toggle': 'modal',
                             'data-bs-target': '#modal-import'
                         },
                         style: {
                             'margin-right': '10px' // Ajoutez la marge à droite
                         },
                         init: function(api, node, config) {
                             $(node).removeClass('btn-success');
                         }
                     }, {
                         text: feather.icons['plus'].toSvg({
                             class: 'me-50 font-small-4'
                         }) + 'Ajouter nouveau',
                         className: 'create-new btn btn-primary',
                         attr: {
                             'id': 'bt_ajouter',
                             'data-bs-toggle': 'modal',
                             'data-bs-target': '#modals-slide-in'
                         },
                         init: function(api, node, config) {
                             $(node).removeClass('btn-secondary');
                         }
                     }
                 ],
                 // RESPONSIVE - Sur téléphone
                 responsive: {
                     details: {
                         display: $.fn.dataTable.Responsive.display.modal({
                             header: function(row) {
                                 var data = row.data();
                                 return 'Détails de ' + data['nom_prenom'];
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
                 }
             });
             $('div.head-label').html('<h6 class="mb-0">DataTable with Buttons</h6>');
         }

         // Flat Date picker
         if (dt_date_table.length) {
             dt_date_table.flatpickr({
                 monthSelectorType: 'static',
                 dateFormat: 'm/d/Y'
             });
         }
         // MODIFIER UN ELEMENT
         $('#form_ajouter').on('submit', function(e) {
             var $new_montant = $('#montant').val(),
                 $new_client = $('#client').val(),
                 $new_date_t = $('#date_t').val(),
                 $new_destinataire = $('#destinataire').val(),
                 $new_tel_cli = $('#tel_cli').val(),
                 $new_tel_dest = $('#tel_dest').val();
             e.preventDefault()

             if ($new_montant != '') {
                 // Ajout Back
                 initializeFlash();

                 var form = $('#form_ajouter');
                 var method = form.prop('method');
                 var url = form.prop('action');

                 $.ajax({
                     type: method,
                     data: form.serialize() + "&bt_enregistrer=" + true,
                     url: url,
                     success: function(result) {
                         //console.log(result);
                         var donnee = JSON.parse(result);
                         if (donnee['success'] === 'existe') {
                             $('#montant').addClass('is-invalid');
                             $('#montantHelp').html(donnee['message']);
                             $('#montantHelp').removeClass('invisible');

                             $('.flash').html('<i class="fas fa-exclamation-circle"></i> ' + donnee['message'])
                                 .fadeIn(300).delay(2500).fadeOut(300);
                         }
                         if (donnee['success'] === 'true') {
                             $('#montant').val("");
                             $('#montantHelp').html("").addClass('invisible');

                             // MESSAGE ALERT
                             swal_Alert_Sucess(donnee['message'])

                             // Récupération de l'id de la ligne ajoutée
                             $.ajax({
                                 type: "GET",
                                 data: "idLast=" + true,
                                 url: "controllers/orange_money_controller.php",
                                 success: function(result) {
                                     var donnees = JSON.parse(result)
                                     if (donnees['last_transaction'] !== 'null') {
                                         let transactions = donnees['last_transaction'];
                                         let last_id = transactions['id'];
                                         let total = donnees['total'];

                                         // Ajout Front et ajout de l'id de la dernière ligne crée
                                         dt_basic.row
                                             .add({
                                                 responsive_id: last_id,
                                                 id: last_id,
                                                 montant: $new_montant,
                                                 date: $new_date_t,
                                                 client: $new_client,
                                                 telephone_client: $new_tel_cli,
                                                 destinataire: $new_destinataire,
                                                 telephone_destinataire: $new_tel_dest,
                                                 status: 5

                                             })
                                             .draw();
                                         $('.modal').modal('hide');
                                     }
                                 }
                             });
                         }
                     }
                 });

                 if (donnee['success'] === 'false') {
                     $('#montantHelp').html(donnee['montant']).removeClass('invisible');

                     initializeFlash();
                     $('.flash').addClass('alert-danger');
                     $('.flash').html('<i class="fas fa-exclamation-circle"></i> ' + donnee['message'])
                         .fadeIn(300).delay(2500).fadeOut(300);

                     e.preventDefault()
                 }
             }
         });
         var that
         $('.datatables-basic tbody').on('click', '.item-edit', function() {
             that = this
             $.ajax({
                 type: "GET",
                 data: "idOrange=" + (dt_basic.row($(that).parents('tr')).data().id), //Envois de l'id selectionné
                 url: "controllers/orange_money_controller.php",
                 success: function(result) {
                     var donnees = JSON.parse(result);
                     if (donnees['transaction'] !== 'null') {
                         // Remplir le formulaire
                         let transaction = donnees['transaction'];
                         $('#idModif').val(transaction['id']);
                         $('#montant_modif').val(transaction['montant']);
                         $('#date_t_modif').val(transaction['date']);
                         $('#client_modif').val(transaction['client']);
                         $('#tel_cli_modif').val(transaction['telephone_client']);
                         $('#destinataire_modif').val(transaction['destinataire']);
                         $('#tel_dest_modif').val(transaction['telephone_destinataire']);

                     }
                 }
             })
         });

         // SUPPRIMER UNE LIGNE
         $('.datatables-basic tbody').on('click', '.delete-record', function() {
             // Suppression Front
             var that = this
             //--------------- Confirm Options SWEET ALERT ---------------
             Swal.fire({
                 title: 'Voulez vous vraiment supprimer ?',
                 text: 'la transaction de < ' + (dt_basic.row($(this).parents('tr')).data().client) + ' :' + (dt_basic.row($(this).parents('tr')).data().montant) +
                     '> sera supprimé définitivement',
                 icon: 'warning',
                 showCancelButton: true,
                 confirmButtonText: 'Oui, Supprimer !',
                 cancelButtonText: 'Annuler',
                 customClass: {
                     confirmButton: 'btn btn-primary',
                     cancelButton: 'btn btn-outline-danger ms-1'
                 },
                 buttonsStyling: false,
             }).then(function(result) {
                 if (result.value) {
                     Swal.fire({
                         icon: 'success',
                         title: 'Suppression éffectuée !',
                         text: "'la transaction de  " + (dt_basic.row($(that).parents('tr')).data().client) + " ' a été supprimée avec succès.",
                         showConfirmButton: false,
                         timer: 1300,
                         customClass: {
                             confirmButton: 'btn btn-success'
                         }
                     });
                 }
             });
             $('.swal2-confirm').on('click', function() {

                 //Suppression Back
                 $.ajax({
                     type: "GET",
                     data: "idSuppr=" + (dt_basic.row($(that).parents('tr')).data().id), //Envois de l'id selectionné
                     url: "controllers/orange_money_controller.php",
                     success: function(result) {
                         var donneee = JSON.parse(result);
                         if (donneee['success'] === 'true') {
                             dt_basic.row($(that).parents('tr')).remove().draw() //Suppression de la ligne selectionnée

                         } else if (donneee['success'] === 'false') {
                             initializeFlash();
                             $('.flash').addClass('alert-danger');
                             $('.flash').html('<i class="fas fa-exclamation-circle"></i> ' + donneee['message'])
                                 .fadeIn(300).delay(2500).fadeOut(300);
                         } else {
                             initializeFlash();
                             $('.flash').addClass('alert-danger');
                             $('.flash').html('<i class="fas fa-exclamation-circle"></i> Erreur inconnue')
                                 .fadeIn(300).delay(2500).fadeOut(300);
                         }
                     }
                 })

             });
         });



     });
 </script>