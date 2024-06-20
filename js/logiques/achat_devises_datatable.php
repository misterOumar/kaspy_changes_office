<?php
include('../config/config.php');
$api_url = API_HOST . 'index.php?page=api_achat_devises';
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
                        dates: champ_bd.dates,
                        type_emetteur: champ_bd.type_emetteur,
                        emetteur_approvisionnement: champ_bd.emetteur_approvisionnement,
                        numero_piece: champ_bd.numero_piece,
                        devise: champ_bd.devise,
                        quantite: champ_bd.quantite,
                        taux_achat: champ_bd.taux_achat,
                        montant_brut: champ_bd.montant_brut,
                        montant_net: champ_bd.montant_net,
                        status: 5



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
                        data: 'dates'
                    },

                    {
                        data: 'emetteur_approvisionnement'
                    },
                    {
                        data: 'taux_achat'
                    },
                    {
                        data: 'montant_brut'
                    },
                    {
                        data: 'montant_net'
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
                                $type = full['type_emetteur'];
                            var bg;
                            if ($type == "Clientèle") {
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
                                    $nom_prenom = full['emetteur_approvisionnement'],
                                    $dates = full['dates'],
                                    $initials = $nom_prenom.match(/\b\w/g) || [];
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
                                $dates +
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
                                //Détail
                                '<a href="javascript:;" class="dropdown-item details ">' +
                                feather.icons['eye'].toSvg({
                                    class: 'font-small-4 me-50'
                                }) +
                                'Voir détails</a>' +

                                //Propriétés
                                '<a href="javascript:;" class="dropdown-item proprietes " data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">' +
                                feather.icons['info'].toSvg({
                                    class: 'font-small-4 me-50'
                                }) +
                                'Propriétés</a>' +

                                //Supprimer
                                '<a  href="javascript:;" class="dropdown-item delete-record bg-light-danger">' +
                                feather.icons['trash-2'].toSvg({
                                    class: 'font-small-4 me-50'
                                }) +
                                'Supprimer</a>' +

                                '</div>' +
                                '</div>' +
                                '<a href="javascript:;" class="item-edit bt_modifier pe-1" data-bs-target="#modal-modif" data-bs-toggle="modal">' +
                                feather.icons['edit'].toSvg({
                                    class: 'font-small-4'
                                }) +

                                // imprimer
                                '</a>' +
                                '<a href="javascript:;" class="bt_imprimer" name="imprimerRecuAchat" >' +
                                feather.icons['printer'].toSvg({
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

        // MODIFIER UN ELEMENT
        $('#bt_enregistrer').on('click', function(e) {


            var $new_date = $('#date_achat').val(),
                $new_type = $("#type").val(),
                $new_nom_prenom = $('#nom_prenom').val(),
                $new_numero_piece = $('#numero_piece').val(),
                $new_devise = $('#devise').val(),
                $new_quantite = ($('#quantite').val()),
                $new_taux_achat = $('#taux_achat').val(),
                $new_montant_brut = $('#total_brut').val(),
                $new_montant_net = $('#total_net').val();
            e.preventDefault()

            if ($new_nom_prenom != '') {
                // Ajout Back
                initializeFlash();

                // Sérialiser les données des deux formulaires
                var formDataClient = $('#form_client').serialize();
                var formDataFacturation = $('#form_facturation').serialize();

                // Concaténer les données des deux formulaires
                var combinedFormData = formDataClient + '&' + formDataFacturation;

                // console.log(combinedFormData);

                $.ajax({
                    url: 'controllers/achat_devises_controller.php',
                    type: 'POST',
                    data: combinedFormData + "&bt_enregistrer=" + true,
                    success: function(result) {
                        //console.log(result);
                        var donnee = JSON.parse(result);

                        if (donnee['success'] === 'true') {

                            // reset forms
                            $('#form_client').trigger("reset");
                            $('#form_facturation').trigger("reset");



                            // MESSAGE ALERT
                            swal_Alert_Sucess(donnee['message'])

                            // Récupération de l'id de la ligne ajoutée
                            $.ajax({
                                type: "GET",
                                data: "idLast=" + true,
                                url: "controllers/achat_devises_controller.php",
                                success: function(result) {
                                    var donnees = JSON.parse(result)
                                    if (donnees['last_transaction'] !== 'null') {
                                        let achat = donnees['last_transaction'];
                                        let last_id = achat['id'];
                                        let total = donnees['total'];

                                        // Ouvrir un nouvel onglet pour afficher le reçu PDF
                                        window.open('etats/RecuAchatDevises.php?idRecuImprimer=' + last_id, '_blank');

                                        // Ajout Front et ajout de l'id de la dernière ligne crée
                                        dt_basic.row
                                            .add({
                                                responsive_id: last_id,
                                                id: last_id,
                                                dates: $new_date,
                                                type_emetteur: $new_type,
                                                emetteur_approvisionnement: $new_nom_prenom,
                                                numero_piece: $new_numero_piece,
                                                devise: $new_devise,
                                                quantite: $new_quantite,
                                                taux_achat: $new_taux_achat,
                                                montant_brut: $new_montant_brut,
                                                montant_net: $new_montant_net,
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

        // EDITER UNE LIGNE
        var that
        $('.datatables-basic tbody').on('click', '.item-edit', function() {
            that = this
            $.ajax({
                type: "GET",
                data: "idProprietes=" + (dt_basic.row($(that).parents('tr')).data().id), //Envois de l'id selectionné
                url: "controllers/achat_devises_controller.php",
                success: function(result) {
                    var donnees = JSON.parse(result);
                    if (donnees['achat_devise'] !== 'null') {

                        let achat_devise = donnees['achat_devise']
                        let client = donnees['client']

                        // Remplir le formulaire du client 
                        $('#civilite_modif').val(client['civilite']);
                        $('#type_modif').val(client['type']);
                        $('#nom_prenom_modif').val(client['nom']);
                        $('#type_piece_modif').val(client['type_de_piece']);
                        $('#numero_piece_modif').val(client['numero_de_piece']);
                        $('#telephone_modif').val(client['contact']);
                        $('#email_modif').val(client['email']);
                        $('#adresse_modif').val(client['adresse']);
                        $('#id_client_modif').val(client['id']);

                        // Remplir le formulaire de la facturation
                        $('#date_achat_modif').val(achat_devise['dates']);
                        $('#devise_modif').val(achat_devise['devise']);
                        $('#mode_reglement_modif').val(achat_devise['mode_reglement']);
                        $('#quantite_modif').val(achat_devise['quantite']);
                        $('#taux_achat_modif').val(achat_devise['taux_achat']);
                        $('#remise_modif').val(achat_devise['remise']);
                        $('#total_brut_modif').val(achat_devise['montant_brut']);
                        $('#total_net_modif').val(achat_devise['montant_net']);
                        $('#observation_modif').val(achat_devise['observation']);
                        $('#id_achat_modif').val(achat_devise['id']);


                    }
                }
            })
        });

        // PROPRIETE D'UNE LIGNE
        $('.datatables-basic tbody').on('click', '.proprietes', function() {
            var that = this
            $.ajax({
                type: "GET",
                data: "idProprietes=" + (dt_basic.row($(that).parents('tr')).data().id), //Envois de l'id selectionné
                url: "controllers/achat_devises_controller.php",
                success: function(result) {

                    var donnees = JSON.parse(result);
                    if (donnees['achat_devise'] !== 'null') {

                        let proprietes = donnees['achat_devise']
                        console.log(proprietes);
                        $("#offcanvasBottomLabel").html("Propriété de la transaction MTN Money « " + proprietes['date_creation'] + " »");
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
                        $("#ecole").html(proprietes['agence']);


                    }
                }
            })
        });

        // DETAIL D'UNE LIGNE
        $('.datatables-basic tbody').on('click', '.details', function() {
            var that = this
            $.ajax({
                type: "GET",
                data: "idProprietes=" + (dt_basic.row($(that).parents('tr')).data().id), //Envois de l'id selectionné
                url: "controllers/achat_devises_controller.php",
                success: function(result) {
                    var donnees = JSON.parse(result);
                    if (donnees['achat_devise'] !== 'null') {

                        let achat_devise = donnees['achat_devise']
                        let client = donnees['client']

                        console.table(achat_devise);


                        $('#titre_modal').text("Détail de l'achat de devise du " + achat_devise.date_creation)

                        // le tableau de la transaction
                        $('.modal_details .modal-body').html(`
                            <table class="table table-bordered text-nowrap text-center table-hover">             
                                <tbody class="details">
                                    <tr>
                                        <th colspan="2" class="text-center bg-light-primary">Informations sur le client</th>  
                                    </tr>
                                    <tr>
                                        <td  class="text-start" style="with:30%">Civilité</td>                                      
                                        <th  class="text-start">${client.civilite}</th>
                                    </tr>
                                    <tr>
                                        <td class="text-start" style="with:30%">Nom & Prénom(s)</td>                                      
                                        <th  class="text-start">${client.nom}</th>
                                    </tr>
                                    <tr>
                                        <td class="text-start" style="with:30%">Type</td>                                      
                                        <th  class="text-start">${client.type}</th>
                                    </tr>
                                    <tr>
                                        <td class="text-start" style="with:30%">Type de pièce</td>                                      
                                        <th  class="text-start">${client.type_de_piece}</th>
                                    </tr>
                                    <tr>
                                        <td class="text-start" style="with:30%">Numéro de pièce</td>                                      
                                        <th  class="text-start">${client.numero_de_piece}</th>
                                    </tr>
                                    <tr>
                                        <td class="text-start" style="with:30%">Contact</td>                                      
                                        <th  class="text-start">${client.contact}</th>
                                    </tr>
                                    <tr>
                                        <td class="text-start" style="with:30%">Email</td>                                      
                                        <th  class="text-start">${client.email}</th>
                                    </tr>
                                    <tr>
                                        <td class="text-start" style="with:30%">Adresse</td>                                      
                                        <th  class="text-start">${client.adresse}</th>
                                    </tr>
                                    <tr>
                                        <th colspan="2" class="text-center bg-light-primary">Informations sur la facturation</th>  
                                    </tr>
                                    <tr>
                                        <td class="text-start" style="with:30%">Devise</td>                                      
                                        <th  class="text-start">${achat_devise.devise}</th>
                                    </tr>
                                    <tr>
                                        <td class="text-start" style="with:30%">Quantite</td>                                      
                                        <th  class="text-start">${achat_devise.quantite}</th>
                                    </tr>
                                    <tr>
                                        <td class="text-start" style="with:30%">Taux achat</td>                                      
                                        <th  class="text-start">${achat_devise.taux_achat}</th>
                                    </tr>
                                    <tr>
                                        <td class="text-start" style="with:30%">Montant Brut</td>                                      
                                        <th  class="text-start">${achat_devise.montant_brut}</th>
                                    </tr>
                                    <tr>
                                        <td class="text-start" style="with:30%">Remise</td>                                      
                                        <th  class="text-start">${achat_devise.remise}</th>
                                    </tr>
                                    <tr>
                                        <td class="text-start" style="with:30%">Montant Net</td>                                      
                                        <th  class="text-start">${achat_devise.montant_net}</th>
                                    </tr>
                                    <tr>
                                        <td class="text-start" style="with:30%">Montant en lettre</td>                                      
                                        <th  class="text-start">${achat_devise.montant_lettre}</th>
                                    </tr>
                                    <tr>
                                        <td class="text-start" style="with:30%">Mode de réglement</td>                                      
                                        <th  class="text-start">${achat_devise.mode_reglement}</th>
                                    </tr>
                                    <tr>
                                        <td class="text-start" style="with:30%">Observation</td>                                      
                                        <th  class="text-start">${achat_devise.observation}</th>
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

        // IMPRIMER UN RECU
        $('.datatables-basic tbody').on('click', '.bt_imprimer', function() {
            var that = this
            var idRecu = (dt_basic.row($(that).parents('tr')).data().id)
            // Ouvrir un nouvel onglet pour afficher le reçu PDF
            window.open('etats/RecuAchatDevises.php?idRecuImprimer=' + idRecu, '_blank');
        });

        // SUPPRIMER UNE LIGNE
        $('.datatables-basic tbody').on('click', '.delete-record', function() {
            // Suppression Front
            var that = this
            //--------------- Confirm Options SWEET ALERT ---------------
            Swal.fire({
                title: 'Voulez vous vraiment supprimer ?',
                text: 'l\'achat de < ' + (dt_basic.row($(this).parents('tr')).data().client) + ' :' + (dt_basic.row($(this).parents('tr')).data().montant1) +
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
                        text: "'l\'achat de  " + (dt_basic.row($(that).parents('tr')).data().client) + " ' a été supprimée avec succès.",
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
                    url: "controllers/achat_devises_controller.php",
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