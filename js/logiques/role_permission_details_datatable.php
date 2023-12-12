<script>
    $(function() {
        'use strict';

        // LECTURE DES ELEMENTS DE LA BASE DE DONNEES
        $.get('http://localhost:8080/kaspy_changes_office/index.php?page=api_role_permission_details', function(rep) {
            let data = JSON.parse(rep)
            console.log(data);
            data.map((champ_bd) => {

                dt_basic.row
                    .add({
                        responsive_id: champ_bd.id,
                        id: champ_bd.id,
                        role_permission: champ_bd.role_permission,
                        fonction: champ_bd.fonction,
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
        // if (dt_basic_table.length) {
        //     var dt_basic = dt_basic_table.DataTable({
        //         columns: [{
        //                 data: 'responsive_id'
        //             },
        //             {
        //                 data: 'id'
        //             },
        //             {
        //                 data: 'id'
        //             }, // used for sorting so will hide this column
        //             {
        //                 data: 'role_permission'
        //             },
        //             {
        //                 data: 'fonction'
        //             },
                    
        //             {
        //                 data: ''
        //             }
        //         ],
        //         columnDefs: [{
        //                 // For Responsive
        //                 className: 'control',
        //                 orderable: false,
        //                 responsivePriority: 4,
        //                 targets: 0
                        
        //             },
        //             {
        //                 // For Checkboxes
        //                 targets: 1,
        //                 orderable: false,
        //                 responsivePriority: 3,
        //                 render: function(data, type, full, meta) {
        //                     return (
        //                         "<div class='form-check'> <input class='form-check-input dt-checkboxes' type='checkbox' value='' id='checkbox" +
        //                         data +
        //                         "' /><label class='form-check-label' for='checkbox" +
        //                         data +
        //                         "'></label></div>"
        //                     );
        //                 },
        //                 checkboxes: {
        //                     selectAllRender: "<div class='form-check'> <input class='form-check-input' type='checkbox' value='' id='checkboxSelectAll' /><label class='form-check-label' for='checkboxSelectAll'></label></div>"
        //                 }
        //             },
        //             {
        //                 //ID
        //                 targets: 2,
        //                 visible: false
        //             },

        //             // Le badge ou l'image rond
        //             // {
        //             //     // Avatar image/badge, libelle and nom_pop
        //             //     targets: 3,
        //             //     responsivePriority: 1,
        //             //     render: function(data, type, full, meta) {
        //             //         var $user_img = full['avatar'],
        //             //             $libelle = full['libelle'],
        //             //             $type_batiment = full['type_batiment'];
        //             //         if ($user_img) {
        //             //             // For Avatar image
        //             //             var $output =
        //             //                 '<img src="' + assetPath + 'images/avatars/' + $user_img + '" alt="Avatar" width="32" height="32">';
        //             //         } else {
        //             //             // For Avatar badge
        //             //             var stateNum = full['status'];
        //             //             var states = ['success', 'danger', 'warning', 'info', 'dark', 'primary', 'secondary'];
        //             //             var $state = states[stateNum],
        //             //                 $libelle = full['libelle'],
        //             //                 $initials = $libelle.match(/\b\w/g) || [];
        //             //             $initials = (($initials.shift() || '') + ($initials.pop() || '')).toUpperCase();
        //             //             $output = '<span class="avatar-content">' + $initials + '</span>';
        //             //         }

        //             //         var colorClass = $user_img === '' ? ' bg-light-' + $state + ' ' : '';
        //             //         // Creates full output for row
        //             //         var $row_output =
        //             //             '<div class="d-flex justify-content-left align-items-center">' +
        //             //             '<div class="avatar ' +
        //             //             colorClass +
        //             //             ' me-1">' +
        //             //             $output +
        //             //             '</div>' +
        //             //             '<div class="d-flex flex-column">' +
        //             //             '<span class="emp_nom text-truncate fw-bold">' +
        //             //             $libelle +
        //             //             '</span>' +
        //             //             '<small class="emp_nom_pop text-truncate text-muted">' +
        //             //             $type_batiment +
        //             //             '</small>' +
        //             //             '</div>' +
        //             //             '</div>';
        //             //         return $row_output;
        //             //     }
        //             // },

        //             // fin du badge ou de l'image rond
        //             {
        //                 responsivePriority: 1,
        //                 targets: 4
        //             },


        //             // Actions
        //             {
        //                 targets: -1,
        //                 title: 'Actions',
        //                 orderable: false,
        //                 render: function(data, type, full, meta) {
        //                     return (
        //                         '<div class="d-inline-flex">' +
        //                         '<a class="pe-1 dropdown-toggle hide-arrow text-primary" data-bs-toggle="dropdown">' +
        //                         feather.icons['more-vertical'].toSvg({
        //                             class: 'font-small-4'
        //                         }) +
        //                         '</a>' +
        //                         '<div class="dropdown-menu dropdown-menu-end">' +
        //                         //Supprimer
        //                         '<a  href="javascript:;" class="dropdown-item delete-record">' +
        //                         feather.icons['trash-2'].toSvg({
        //                             class: 'font-small-4 me-50'
        //                         }) +
        //                         'Supprimer</a>' +

        //                         //Détails
        //                         '<a href="javascript:;" class="dropdown-item details" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottomD" aria-controls="offcanvasBottomD">' +
        //                         feather.icons['file-text'].toSvg({
        //                             class: 'font-small-4 me-50'
        //                         }) +
        //                         'Détails</a>' +
        //                         //Propriétés
        //                         '<a href="javascript:;" class="dropdown-item proprietes" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">' +
        //                         feather.icons['info'].toSvg({
        //                             class: 'font-small-4 me-50'
        //                         }) +
        //                         'Propriétés</a>' +

        //                         '</div>' +
        //                         '</div>' +
        //                         '<a href="javascript:;" class="item-edit" data-bs-target="#modal-modif" data-bs-toggle="modal">' +
        //                         feather.icons['edit'].toSvg({
        //                             class: 'font-small-4'
        //                         }) +
        //                         '</a>'
        //                     );
        //                 }
        //             }
        //         ],
        //         order: [
        //             [2, 'desc']
        //         ],


        //         // Les boutons d'action
        //         dom: "<'card-header border-bottom p-1'<'head-label'><'dt-action-buttons text-end'B>><'d-flex justify-content-between align-items-center mx-0 row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>t<'d-flex justify-content-between mx-0 row'<'col-sm-12 col-md-6'i><'col-sm-12 col-md-6'p>>",
        //         displayLength: 7,
        //         lengthMenu: [7, 10, 25, 50, 75, 100],
        //         buttons: [{
        //                 extend: 'collection',
        //                 className: 'btn btn-outline-secondary dropdown-toggle me-2',
        //                 text: feather.icons['share'].toSvg({
        //                     class: 'font-small-4 me-50'
        //                 }) + 'Exporter',
        //                 buttons: [{
        //                         extend: 'print',
        //                         text: feather.icons['printer'].toSvg({
        //                             class: 'font-small-4 me-50'
        //                         }) + 'Imprimer',
        //                         className: 'dropdown-item',
        //                         exportOptions: {
        //                             columns: [3, 4, 5, 6, 7]
        //                         }
        //                     },
        //                     {
        //                         extend: 'csv',
        //                         text: feather.icons['file-text'].toSvg({
        //                             class: 'font-small-4 me-50'
        //                         }) + 'Csv',
        //                         className: 'dropdown-item',
        //                         exportOptions: {
        //                             columns: [3, 4, 5, 6, 7]
        //                         }
        //                     },
        //                     {
        //                         extend: 'excel',
        //                         text: feather.icons['file'].toSvg({
        //                             class: 'font-small-4 me-50'
        //                         }) + 'Excel',
        //                         className: 'dropdown-item',
        //                         exportOptions: {
        //                             columns: [3, 4, 5, 6, 7]
        //                         }
        //                     },
        //                     {
        //                         extend: 'pdf',
        //                         text: feather.icons['clipboard'].toSvg({
        //                             class: 'font-small-4 me-50'
        //                         }) + 'Pdf',
        //                         className: 'dropdown-item',
        //                         exportOptions: {
        //                             columns: [3, 4, 5, 6, 7]
        //                         }
        //                     },
        //                     {
        //                         extend: 'copy',
        //                         text: feather.icons['copy'].toSvg({
        //                             class: 'font-small-4 me-50'
        //                         }) + 'Copier',
        //                         className: 'dropdown-item',
        //                         exportOptions: {
        //                             columns: [3, 4, 5, 6, 7]
        //                         }
        //                     }
        //                 ],
        //                 init: function(api, node, config) {
        //                     $(node).removeClass('btn-secondary');
        //                     $(node).parent().removeClass('btn-group');
        //                     setTimeout(function() {
        //                         $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
        //                     }, 50);
        //                 }
        //             },
        //             {
        //                 text: feather.icons['plus'].toSvg({
        //                     class: 'me-50 font-small-4'
        //                 }) + 'Ajouter nouveau',
        //                 className: 'create-new btn btn-primary',
        //                 attr: {
        //                     'id': 'bt_ajouter',
        //                     'data-bs-toggle': 'modal',
        //                     'data-bs-target': '#modals-slide-in'
        //                 },
        //                 init: function(api, node, config) {
        //                     $(node).removeClass('btn-secondary');
        //                 }
        //             }
        //         ],


        //         // RESPONSIVE - Sur téléphone
        //         responsive: {
        //             details: {
        //                 display: $.fn.dataTable.Responsive.display.modal({
        //                     header: function(row) {
        //                         var data = row.data();
        //                         return 'Détails de ' + data['libelle'];
        //                     }
        //                 }),
        //                 type: 'column',
        //                 renderer: function(api, rowIdx, columns) {
        //                     var data = $.map(columns, function(col, i) {
        //                         return col.title !== '' // ? Do not show row in modal popup if title is blank (for check box)
        //                             ?
        //                             '<tr data-dt-row="' +
        //                             col.rowIdx +
        //                             '" data-dt-column="' +
        //                             col.columnIndex +
        //                             '">' +
        //                             '<td>' +
        //                             col.title +
        //                             ':' +
        //                             '</td> ' +
        //                             '<td>' +
        //                             col.data +
        //                             '</td>' +
        //                             '</tr>' :
        //                             '';
        //                     }).join('');

        //                     return data ? $('<table class="table"/>').append('<tbody>' + data + '</tbody>') : false;
        //                 }
        //             }
        //         },
        //         language: {
        //             url: 'js/plugins/tables/language.french.json',
        //             paginate: {
        //                 // remove previous & next text from pagination
        //                 previous: '&nbsp;',
        //                 next: '&nbsp;'
        //             }
        //         }
        //     });
        //     $('div.head-label').html('<h6 class="mb-0">DataTable with Buttons</h6>');
        // }

        // Flat Date picker
        if (dt_date_table.length) {
            dt_date_table.flatpickr({
                monthSelectorType: 'static',
                dateFormat: 'm/d/Y'
            });
        }



        // lorsqu'on soumet le formulaire ajouter
        $('#form_ajouter').on('submit', function(e) {   
            var $new_role_permission = $('#role_permission').val(),
                $new_fonction = $('#fonction').val(),
                $new_lecture = $('#lecture').val(),
                $new_creation = $('#creation').val(),
                $new_modification = $('#modification').val(),
                $new_suppression = $('#suppression').val(),
                $new_duplicata = $('#duplicata').val(),
                $new_visualisation = $('#visualisation').val(),
                $new_exportation = $('#exportation').val();
               

            e.preventDefault()

            if ($new_fonction != '') {
                
                // alert('ok')
                // Ajout Back
                initializeFlash();
                alert('ok')
                var form = $('#form_ajouter');
                var method = form.prop('method');
                var url = form.prop('action');

                $.ajax({
                    type: method,
                    data: form.serialize() + "&bt_enregistrer=" + true,
                    url: url,
                    success: function(result) { 
                        
                        var donnee = JSON.parse(result);
                       
                        // alert(donnee['success'])

                        if (donnee['success'] === 'true') {
                            $('#role_permission').val("");
                            $('#role_permissionHelp').html("").addClass('invisible');

                            // MESSAGE ALERT
                            swal_Alert_Sucess(donnee['message'])

                            // Récupération de l'id de la ligne ajoutée
                            $.ajax({
                                type: "GET",
                                data: "idLast=" + true,
                                url: "controllers/role_permission_details_controller.php",
                                success: function(result) {
                                    var donnees = JSON.parse(result)
                                    if (donnees['last_role_permission_details'] !== 'null') {
                                        let last_role_permission_details = donnees['last_role_permission_details']
                                        let last_id = last_role_permission_details['id'];
                                        let total = donnees['total'];

                                        // Ajout Front et ajout de l'id de la dernière ligne crée
                                        dt_basic.row
                                            .add({
                                                responsive_id: last_id,
                                                id: last_id,
                                                role_permission: $new_role_permission,
                                                fonction: $new_fonction,
                                                
                                               
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
                    $('#libelleHelp').html(donnee['libelle']).removeClass('invisible');

                    initializeFlash();
                    $('.flash').addClass('alert-danger');
                    $('.flash').html('<i class="fas fa-exclamation-circle"></i> ' + donnee['message'])
                        .fadeIn(300).delay(2500).fadeOut(300);

                    e.preventDefault()
                }
            }
        });


        // MODIFIER UN ELEMENT

        // au clique du bouton editer
        var that
        $('.datatables-basic tbody').on('click', '.item-edit', function() {
            that = this
            var tr_id = dt_basic.row($(that).parents('tr')).data().id;

            $.ajax({
                type: "GET",
                data: "idProprietes=" + (dt_basic.row($(that).parents('tr')).data().id), //Envois de l'id selectionné
                url: "controllers/role_permission_details_controller.php",
                success: function(result) {
                    var donnees = JSON.parse(result);
                    // alert(result)
                    if (donnees['proprietes_role_permission_details'] != 'null') {


                        // Remplir le formulaire
                        let role_permission_details = donnees['proprietes_role_permission_details'];
                        $('#idModif').val(role_permission_details['id']);
                        
                        $('#role_permission_modif').val(role_permission_details['role_permission']);
                        $('#fonction_modif').val(role_permission_details['fonction']);
                       

                        if (role_permission_details['lecture'] == 1) {
                            $("#lecture_modif").prop('checked', true) // Desactiver input

                        }

                        if (role_permission_details['creation'] == 1) {
                            $("#creation_modif").prop('checked', true) // Desactiver input

                        }

                        if (role_permission_details['modification'] == 1) {
                            $("#modification_modif").prop('checked', true) // Desactiver input

                        }

                        if (role_permission_details['suppression'] == 1) {
                            $("#suppression_modif").prop('checked', true) // Desactiver input

                        }

                        if (role_permission_details['duplicata'] == 1) {
                            $("#duplicata_modif").prop('checked', true) // Desactiver input

                        }

                        if (role_permission_details['visualisation'] == 1) {
                            $("#visualisation_modif").prop('checked', true) // Desactiver input

                        }
                        if (role_permission_details['exportation'] == 1) {
                            $("#exportation_modif").prop('checked', true) // Desactiver input

                        }

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
                text: '< ' + (dt_basic.row($(this).parents('tr')).data().role_permission) + ' > sera supprimé définitivement',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Oui, Supprimer !',
                cancelButtonText: 'Annuler',
                customClass: {
                    confirmButton: 'btn btn-primary',
                    cancelButton: 'btn btn-outline-danger ms-1'
                },
                buttonsStyling: false
            }).then(function(result) {
                if (result.value) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Suppression éffectuée !',
                        text: "' " + (dt_basic.row($(that).parents('tr')).data().libelle) + " ' a été supprimée avec succès.",
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
                    url: "controllers/role_permission_details_controller.php",
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


                // Propriété
                $('.datatables-basic tbody').on('click', '.proprietes', function() {
            var that = this
            $.ajax({
                type: "GET",
                data: "idProprietes=" + (dt_basic.row($(that).parents('tr')).data().id), //Envois de l'id selectionné
                url: "controllers/batiments_controller.php",
                success: function(result) {
                    var donnees = JSON.parse(result);
                    if (donnees['proprietes_batiment'] !== 'null') {

                        let proprietes = donnees['proprietes_batiment']

                        let titre = proprietes['libelle'];
                        let date_creation = proprietes['date_creation'];
                        let user_creation = proprietes['user_creation'];
                        let navigateur_creation = proprietes['navigateur_creation'];
                        let ordinateur_creation = proprietes['ordinateur_creation'];
                        let ip_creation = proprietes['ip_creation'];
                        let annee_academique = proprietes['annee_academique'];
                        let ecole = proprietes['ecole'];
                        

                        $("#offcanvasBottomLabel").html("Propriété de « " + titre + " »");
                        $("#date_creation").html(date_creation);
                        $("#user_creation").html(user_creation);
                        $("#navigateur_creation").html(navigateur_creation);
                        $("#ordinateur_creation").html(ordinateur_creation);
                        $("#ip_creation").html(ip_creation);
                        $("#annee_academique").html(annee_academique);
                        $("#ecole").html(ecole);
                    }
                }
            })
        });

         // Details
         $('.datatables-basic tbody').on('click', '.details', function() {
            var that = this
            $.ajax({
                type: "GET",
                data: "idProprietes=" + (dt_basic.row($(that).parents('tr')).data().id), //Envois de l'id selectionné
                url: "controllers/batiments_controller.php",
                success: function(result) {
                    var donnees = JSON.parse(result);
                    if (donnees['proprietes_batiment'] !== 'null') {

                        let proprietes = donnees['proprietes_batiment']

                        let libelle = proprietes['libelle'];
                        let type_batiment = proprietes['type_batiment'];
                        let nombre_appartement = proprietes['nombre_appartement'];
                        let parking = proprietes['parking'];
                        let jardin = proprietes['jardin'];
                        let ascenseur = proprietes['ascenseur'];
                        let proprietaire = proprietes['nom_prenom'];
                        let cout_construction = proprietes['cout_construction'];
                       
                       
                        $("#offcanvasBottomLabelD").html("Details de « " + libelle + " »");
                        $("#offcanvasBottomLabelP").html("Propriété de « " + libelle + " »");
                        $("#libelleP").html(libelle);
                        $("#type_batimentP").html(type_batiment);
                        $("#nombre_appartementP").html(nombre_appartement);
                        $("#parkingP").html(parking == 0 ? 'non' : 'oui');
                        $("#jardinP").html(jardin == 0 ? 'non' : 'oui');
                        $("#ascenseurP").html(ascenseur == 0 ? 'non' : 'oui');
                        $("#proprietaireP").html(proprietaire);
                        $("#cout_constructionP").html(cout_construction);                       
                    }
                }
            })
        });





    });
</script>