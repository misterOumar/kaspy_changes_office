<?php
include('../config/config.php');
$api_url = API_HOST . 'index.php?page=api_types_piece';
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
                        date_creation: champ_bd.date_creation,
                        libelle: champ_bd.libelle,
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
                        data: 'libelle'
                    },
                    {
                        data: 'date_creation'
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
                        // Avatar image/badge, champ1 and champ1_pop
                        targets: 3,
                        responsivePriority: 1,
                        render: function(data, type, full, meta) {
                            var $user_img = full['avatar'],
                                $libelle = full['libelle'],
                                $champ1_pop = full['champ1_pop'];
                            if ($user_img) {
                                // For Avatar image
                                var $output =
                                    '<img src="' + assetPath + 'images/avatars/' + $user_img + '" alt="Avatar" width="32" height="32">';
                            } else {
                                // For Avatar badge
                                var stateNum = full['status'];
                                var states = ['success', 'danger', 'warning', 'info', 'dark', 'primary', 'secondary'];
                                var $state = states[stateNum],
                                    $libelle = full['libelle'],
                                    $abreviation = full['abreviation'],
                                    $code_matricule = full['code_matricule'],
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
                                '<span class="emp_champ1 text-truncate fw-bold">' +
                                $libelle +
                                '</span>' +
                                '<small class="emp_champ1_pop text-truncate text-muted">'
                            $champ1_pop +
                                '</small>' +
                                '</div>' +
                                '</div>';
                            return $row_output;
                        }
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


                                //Propriétés
                                '<a href="javascript:;" class="dropdown-item proprietes" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">' +
                                feather.icons['info'].toSvg({
                                    class: 'font-small-4 me-50'
                                }) +
                                'Propriétés</a>' +

                                '</div>' +
                                '</div>' +
                                '<a href="javascript:;" class="item-edit" data-bs-target="#modal-modifier" data-bs-toggle="modal">' +
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
                        init: function(api, node, config) {
                            $(node).removeClass('btn-secondary');
                            $(node).parent().removeClass('btn-group');
                            setTimeout(function() {
                                $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
                            }, 50);
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


        // AJOUTER UN ELEMENT
        $('#form_ajouter').on('submit', function(e) {

            var $new_libelle = $('#libelle').val();

            e.preventDefault()

            if ($new_libelle != '') {
                // Ajout Back

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
                            $('#libelle').addClass('is-invalid');
                            $('#libelleHelp').html(donnee['message']);
                            $('#libelleHelp').removeClass('invisible');

                        }
                        if (donnee['success'] === 'true') {
                            $('#libelle').val("");
                            $('#libelleHelp').html("").addClass('invisible');

                            // MESSAGE ALERT
                            swal_Alert_Sucess(donnee['message'])

                            // Récupération de l'id de la ligne ajoutée
                            $.ajax({
                                type: "GET",
                                data: "idLast=" + true,
                                url: "controllers/types_piece_controller.php",
                                success: function(result) {
                                    var donnees = JSON.parse(result)
                                    if (donnees['last_types_piece'] !== 'null') {
                                        let last_types_piece = donnees['last_types_piece']
                                        let last_id = last_types_piece['id'];
                                        let new_date_creation = last_types_piece['date_creation'];
                                        let total = donnees['total'];


                                        // Ajout Front et ajout de l'id de la dernière ligne crée
                                        dt_basic.row
                                            .add({
                                                responsive_id: last_id,
                                                id: last_id,
                                                libelle: $new_libelle,
                                                date_creation: new_date_creation,

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
        // au clique de la ligne selectionnée
        // Propriété
        $('.datatables-basic tbody').on('click', '.item-edit', function() {
            var that = this
            $.ajax({
                type: "GET",
                data: "idProprietes=" + (dt_basic.row($(that).parents('tr')).data().id), //Envois de l'id selectionné
                url: "controllers/types_piece_controller.php",
                success: function(result) {
                    var donnees = JSON.parse(result);
                    if (donnees['type_piece'] !== 'null') {
                        let type_piece = donnees['type_piece']

                        alert(decodeURIComponent(type_piece['libelle']))

                        $("#idModif").val(type_piece['id']);
                        $("#libelle_modif").val( decodeURIComponent(type_piece['libelle']) );

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
                text: "' " + (dt_basic.row($(this).parents('tr')).data().libelle) + " ' sera supprimé définitivement",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Oui, Supprimer !',
                cancelButtonText: 'Annuler',
                customClass: {
                    confirmButton: 'btn btn-primary',
                    cancelButton: 'btn btn-outline-danger ms-1'
                },
                buttonsStyling: false
            });


            $('.swal2-confirm').on('click', function() {
                //Suppression Back

                $.ajax({
                    type: "GET",
                    data: "idSuppr=" + (dt_basic.row($(that).parents('tr')).data().id), //Envois de l'id selectionné
                    url: "controllers/types_piece_controller.php",
                    success: function(result) {
                        var donnee = JSON.parse(result);
                        if (donnee['success'] === 'true') {

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

                            dt_basic.row($(that).parents('tr')).remove().draw() //Suppression de la ligne selectionnée

                        } else if (donnee['success'] === 'impossible_liens') {
                            swal_Alert_Danger(donnee['message'])

                        } else if (donnee['success'] === 'false') {
                            swal_Alert_Danger(donnee['message'])

                        } else {
                            swal_Alert_Danger("Erreur inconnue");
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
                url: "controllers/types_piece_controller.php",
                success: function(result) {
                    var donnees = JSON.parse(result);
                    if (donnees['type_piece'] !== 'null') {

                        let proprietes = donnees['type_piece']

                        $("#offcanvasBottomLabel").html("Propriété du mode « " + proprietes['customer_id'] + " »");
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
                }
            })
        });

    });
</script>