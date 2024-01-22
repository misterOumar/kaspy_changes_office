<?php
include('../config/config.php');
$api_url = API_HOST . 'index.php?page=api_western_union';
?>
<script>
    $(function() {
        'use strict';

        // LECTURE DES ELEMENTS DE LA BASE DE DONNEES
        $.get('<?= $api_url; ?>', function(rep) {
            let data = JSON.parse(rep)
           
            data.map((champ_bd) => {
                var imageUrl = champ_bd.logo;
                dt_basic.row
                    .add({
                        responsive_id: champ_bd.id,
                        id: champ_bd.id,
                        date: champ_bd.date,
                        expediteur: champ_bd.expediteur,
                        receveur: champ_bd.receveur,
                        montant_envoye: champ_bd.montant_envoye,
                        total_frais: champ_bd.total_frais,
                        type_transaction : champ_bd.type_transaction ,
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
                    }, // used for sorting so will hide this column
                    {
                        data: 'date'
                    },
                    {
                        data: 'expediteur'
                    },
                    {
                        data: 'receveur'
                    },
                    {
                        data: 'montant_envoye'
                    },
                    {
                        data: 'total_frais'
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
                                $libelle = full['libelle'],
                                $duree = full['duree'],
                                $type = full['type_transaction'];
                            var bg;
                            if ($type == "envoi") {
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
                                    $expediteur = full['date'],
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
                    // fin du badge ou de l'image rond

                    // ActionsVoulez vous vraiment supprimer ?
                    {
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
                        }) + 'Importer un fichier',
                        className: 'create-new btn btn-primary',
                        attr: {
                            'id': 'bt_importer',
                            'onclick': 'window.location.href = "index.php?page=upload_western_union"',
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




        // AJOUTER UN ELEMENT
        $('#form_ajouter').on('submit', function(e) {
            var $new_libelle = $('#libelle').val(),
                $new_duree = $('#duree').val();


            e.preventDefault()

            if ($new_libelle != '') {
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
                            $('#libelle').addClass('is-invalid');
                            $('#libelleHelp').html(donnee['message']);
                            $('#libelleHelp').removeClass('invisible');

                            $('.flash').html('<i class="fas fa-exclamation-circle"></i> ' + donnee['message'])
                                .fadeIn(300).delay(2500).fadeOut(300);
                        }

                        if (donnee['success'] === 'true') {
                            $('#libelle').val("");
                            $('#libelleHelp').html("").addClass('invisible');

                            // MESSAGE ALERT
                            swal_Alert_Sucess(donnee['message'])
                            $('#form_ajouter')[0].reset();

                            // Récupération de l'id de la ligne ajoutée
                            $.ajax({
                                type: "GET",
                                data: "idLast=" + true,
                                url: "controllers/type_carte_controller.php",
                                success: function(result) {
                                    var donnees = JSON.parse(result)
                                    if (donnees['last_libelle'] !== 'null') {
                                        let last_carte = donnees['last_libelle'];
                                        let last_id = last_carte['id'];
                                        let total = donnees['total'];

                                        // Ajout Front et ajout de l'id de la dernière ligne crée
                                        dt_basic.row
                                            .add({
                                                responsive_id: last_id,
                                                id: last_id,
                                                libelle: $new_libelle,
                                                duree: $new_duree,
                                                logo: $newlogo,
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



        // Propriété
        $('.datatables-basic tbody').on('click', '.proprietes', function() {
            var that = this
            $.ajax({
                type: "GET",
                data: "idProprietes=" + (dt_basic.row($(that).parents('tr')).data().id), //Envois de l'id selectionné
                url: "controllers/western_union_controller.php",
                success: function(result) {
                    var donnees = JSON.parse(result);
                    if (donnees['proprietes_western_union'] !== 'null') {

                        let proprietes = donnees['proprietes_western_union']

                       
                        $("#offcanvasBottomLabel").html("Propriété de « " + proprietes['nom_utilisateur'] + " »");
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

           // Details
           $('.datatables-basic tbody').on('click', '.details', function() {
            var that = this
            $.ajax({
                type: "GET",
                data: "idProprietes=" + (dt_basic.row($(that).parents('tr')).data().id), //Envois de l'id selectionné
                url: "controllers/western_union_controller.php",
                success: function(result) {
                    var donnees = JSON.parse(result);
                    if (donnees['proprietes_western_union'] !== 'null') {

                        let wu = donnees['proprietes_western_union']

                        $('#titre_modal').text('Détail de la transaction WU')

                        // le tableau de la transaction
                        $('.modal_details .modal-body').html(`
                            <table class="table table-bordered text-nowrap text-center">             
                                <tbody class="details">
                                    <tr>
                                        <th scope="row" class="text-start">Type de transaction</th>                                      
                                        <td  class="text-start">${wu.type_transaction}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="text-start">Code du Pays d'Origine</th>                                      
                                        <td  class="text-start">${wu.code_pays_origine}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="text-start">Code de la Devise d'Origine</th>                                        
                                        <td  class="text-start">${wu.code_devise_pays_origine}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="text-start">Identifiant du terminal</th>                                        
                                        <td  class="text-start">${wu.identifiant_terminal}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="text-start">Identité de l'opérateur</th>                                        
                                        <td  class="text-start">${wu.identite_operateur}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="text-start">Superv. Op. Identifiant</th>                                        
                                        <td  class="text-start">${wu.super_op_identifiant}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="text-start">Nom d'utilisateur</th>                                        
                                        <td  class="text-start">${wu.nom_utilisateur}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="text-start">MTCN</th>                                      
                                        <td  class="text-start">${wu.mtn_cn}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="text-start">Receveur</th>
                                        <td  class="text-start">${wu.receveur}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="text-start">Expéditeur</th>
                                        <td  class="text-start">${wu.expediteur}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="text-start">Code du Pays de Destination</th>
                                        <td  class="text-start">${wu.code_pays_destination}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="text-start">Code de la Devise de Destination</th>
                                        <td  class="text-start">${wu.code_devise_pays_destination}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="text-start">Type de Transaction</th>
                                        <td  class="text-start">${wu.type_de_transaction}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="text-start">Date</th>
                                        <td  class="text-start">${wu.date}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="text-start">Heure</th>
                                        <td  class="text-start">${wu.heure}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="text-start">Montant envoyé</th>
                                        <td  class="text-start">${wu.montant_envoye}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="text-start">Frais de Transfert</th>
                                        <td  class="text-start">${wu.frais_de_transfert}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="text-start">Frais de livraison</th>
                                        <td  class="text-start">${wu.taux}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="text-start">Frais du message</th>
                                        <td  class="text-start">${wu.tob}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="text-start">Descuento Promoción</th>
                                        <td  class="text-start">${wu.tthu}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="text-start">Montant total recueilli</th>
                                        <td  class="text-start">${wu.montant_total_recueilli}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="text-start">Taux de change</th>
                                        <td  class="text-start">${wu.taux_de_change}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="text-start">Montant payé attendu</th>
                                        <td  class="text-start">${wu.montant_paye_attendu}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="text-start">Total des frais</th>
                                        <td  class="text-start">${wu.total_frais}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="text-start">Total des taxes</th>
                                        <td  class="text-start">${wu.total_taxes}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="text-start">Type de paiement</th>
                                        <td  class="text-start">${wu.type_de_paiement}</td>
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
    });
</script>