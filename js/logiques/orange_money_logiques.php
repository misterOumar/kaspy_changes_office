 <?php include("views/components/alerts.php") ?>
 <script src="functions/functions.js"></script>


 <script>
     // MES LOGIQUES
     //  Vider les champs
     function vider_les_champs() {
         // dates
         $('#montant').val('');
         $('#montant').removeClass('is-invalid');
         $('#montantHelp').html('Veuillez saisir le montant...');
         $('#montantHelp').addClass('invisible');

         $('#solde_t').val('');
         $('#solde_t').removeClass('is-invalid');
         $('#solde_tHelp').html('Veuillez saisir  le  solde total...');
         $('#solde_tHelp').addClass('invisible');


         $('#id_transaction').val('');
         $('#id_transaction').removeClass('is-invalid');
         $('#id_transactionHelp').html('Veuillez saisir  la transaction id...');
         $('#id_transactionHelp').addClass('invisible');

         $('#date_t').val('');
         $('#date_t').removeClass('is-invalid');
         $('#date_tHelp').html('Veuillez sélectionner la date ...');
         $('#date_tHelp').addClass('invisible');

         $('#tel_cli').val('');
         $('#tel_cli').removeClass('is-invalid');
         $('#tel_cliHelp').html('Veuillez saisir le telephone du client...');
         $('#tel_cliHelp').addClass('invisible');


     }

     $('#bt_vider').on('click', function() {
         vider_les_champs()
     });


     jQuery(function($) {
         $('#date_t').flatpickr({
             defaultDate: 'today',
             dateFormat: "Y-m-d",
         })
     });


     flatpickr("#date_t", {
         locale: 'fr',
         defaultDate: 'today'
     });


     jQuery(function($) {
         $('#date_t_modif').flatpickr({
             defaultDate: 'today',
             dateFormat: "Y-m-d",
         })
     });


     flatpickr("#date_t_modif", {
         locale: 'fr',
         // defaultDate : 'today'
     });


     $('.touch_pin_input').TouchSpin({
         min: 1,
         max: 500,
         step: 1,
         decimals: 0,
         boostat: 5,
         maxboostedstep: 10,
     });



     // VERIFICATIONS DU FORMULAIRE 
     var formValide = false;

     //      Les événements en déhors du click du boutton de validation

     $('#montant').on('change', function() {
         $('#montant').removeClass('is-invalid');
         $('#montantHelp').html('');
     });


     $('#type').on('change', function() {
         $('#type').removeClass('is-invalid');
         $('#typeHelp').html('');
     });


     $('#tel_cli').on('change', function() {
         $('#tel_cli').removeClass('is-invalid');
         $('#tel_cliHelp').html('');
     });

     $('#solde_t').on('change', function() {
         $('#solde_t').removeClass('is-invalid');
         $('#solde_tHelp').html('');
     });


     $('#solde_t').on('change', function() {
         $('#solde_t').removeClass('is-invalid');
         $('#solde_tHelp').html('');
     });

     $('#id_transaction').on('change', function() {
         $('#id_transaction').removeClass('is-invalid');
         $('#id_transactionHelp').html('');
     });

     // Champ de la duree ne doit contenir des letters
     $('#montant').on('keyup', function() {
         var loyer = $('#montant').val();
         if ($.isNumeric(loyer) === false) {
             formValide = false;
             $('#montant').addClass('is-invalid');
             $('#montantHelp').html('Veuillez saisir un  montant correcte');
             $('#montantHelp').removeClass('invisible');
             $('#montant').val('')
             e.preventDefault()
         } else {
             formValide = true;
             $('#montant').removeClass('is-invalid');
             $('#montantHelp').html('');
             $('#montantHelp').addClass('invisible');
         }
     });


     //GESTION DU SOLDE
     $('#solde_t').on('keyup', function() {
         var loyer = $('#solde_t').val();
         if ($.isNumeric(loyer) === false) {
             formValide = false;
             $('#solde_t').addClass('is-invalid');
             $('#solde_tHelp').html('Veuillez saisir un  solde  correcte');
             $('#solde_tHelp').removeClass('invisible');
             $('#solde_t').val('')
             e.preventDefault()
         } else {
             formValide = true;
             $('#solde_t').removeClass('is-invalid');
             $('#solde_tHelp').html('');
             $('#solde_tHelp').addClass('invisible');
         }
     });


     if ($("#radio_depot").is(":checked") || $("#radio_retrait").is(":checked")) {
         formValide = true;
         $('#radio_depot').removeClass('is-invalid');
         $('#radio_retrait').removeClass('is-invalid');
         $('#typeHelp').html("");
         $('#typeHelp').removeClass('invisible');
     } else {
         formValide = false;
         $('#radio_depot').addClass('is-invalid');
         $('#radio_retrait').addClass('is-invalid');
         $('#typeHelp').html("Veillez choisir le type de la transacion");
         $('#typeHelp').removeClass('invisible');
         e.preventDefault()
     }


     $('#tel_cli').on('keyup', function() {
         var loyer = $('#tel_cli').val();
         if ($.isNumeric(loyer) === false) {
             formValide = false;
             $('#tel_cli').addClass('is-invalid');
             $('#tel_cliHelp').html('Veuillez saisir un numero correcte');
             $('#tel_cliHelp').removeClass('invisible');
             $('#tel_cli').val('')
             e.preventDefault()
         } else {
             formValide = true;
             $('#tel_cli').removeClass('is-invalid');
             $('#tel_cliHelp').html('');
             $('#tel_cliHelp').addClass('invisible');
         }
     });


     //      Au click du boutton
     $('#bt_enregistrer').on('click', function(e) {

         // Cas du montant
         let montant = $('#montant').val();
         if (montant === '') {
             formValide = false;
             $('#montant').addClass('is-invalid');
             $('#montantHelp').html('Veuillez saisir le montant .');
             $('#montantHelp').removeClass('invisible');
             e.preventDefault()
         } else {
             formValide = true;
             $('#montant').removeClass('is-invalid');
             $('#montantHelp').html('');
             $('#montantHelp').addClass('invisible');
         }


         // Cas du solde total
         let solde_t = $('#solde_t').val();
         if (solde_t === '') {
             formValide = false;
             $('#solde_t').addClass('is-invalid');
             $('#solde_tHelp').html('Veuillez saisir le solde total .');
             $('#solde_tHelp').removeClass('invisible');
             e.preventDefault()
         } else {
             formValide = true;
             $('#solde_t').removeClass('is-invalid');
             $('#solde_tHelp').html('');
             $('#solde_tHelp').addClass('invisible');
         }

         // Cas de la transaction id
         let id_transaction = $('#id_transaction').val();
         if (id_transaction === '') {
             formValide = false;
             $('#id_transaction').addClass('is-invalid');
             $('#id_transactionHelp').html('Veuillez saisir la transaction  id .');
             $('#id_transactionHelp').removeClass('invisible');
             e.preventDefault()
         } else {
             formValide = true;
             $('#id_transaction').removeClass('is-invalid');
             $('#id_transactionHelp').html('');
             $('#id_transactionHelp').addClass('invisible');
         }


         //cas du telephone
         let tel_cli = $('#tel_cli').val();
         if (tel_cli === '') {
             formValide = false;
             $('#tel_cli').addClass('is-invalid');
             $('#tel_cliHelp').html('Veuillez saisir le  telephone du client.');
             $('#tel_cliHelp').removeClass('invisible');
             e.preventDefault()
         } else {
             formValide = true;
             $('#tel_cli').removeClass('is-invalid');
             $('#tel_cliHelp').html('');
             $('#tel_cliHelp').addClass('invisible');
         }

         let date_t = $('#date_t').val();
         if (date_t === '') {
             formValide = false;
             $('#date_t').addClass('is-invalid');
             $('#date_tHelp').html('Veuillez selectionner  la date  .');
             $('#date_tHelp').removeClass('invisible');
             e.preventDefault()
         } else {
             formValide = true;
             $('#date_t').removeClass('is-invalid');
             $('#date_tHelp').html('');
             $('#date_tHelp').addClass('invisible');
         }

         // window.location.reload();
     });



     // MODIFICATION

     //Le montant ne doit contenir ds lettres
     $('#montant_modif').on('keyup', function() {
         var loyer = $('#montant_modif').val();
         if ($.isNumeric(loyer) === false) {
             formValide = false;
             $('#montant_modif').addClass('is-invalid');
             $('#montant_modifHelp').html('Veuillez saisir un  montant correcte');
             $('#montant_modifHelp').removeClass('invisible');
             $('#montant_modif').val('')
             e.preventDefault()
         } else {
             formValide = true;
             $('#montant_modif').removeClass('is-invalid');
             $('#montant_modifHelp').html('');
             $('#montant_modifHelp').addClass('invisible');
         }
     });


     //Le telephone  ne doit contenir ds lettres
     $('#tel_cli_modif').on('keyup', function() {
         var loyer = $('#tel_cli').val();
         if ($.isNumeric(loyer) === false) {
             formValide = false;
             $('#tel_cli_modif').addClass('is-invalid');
             $('#tel_cli_modifHelp').html('Veuillez saisir un numero correcte');
             $('#tel_cli_modifHelp').removeClass('invisible');
             $('#tel_cli_modif').val('')
             e.preventDefault()
         } else {
             formValide = true;
             $('#tel_cli_modif').removeClass('is-invalid');
             $('#tel_cli_modifHelp').html('');
             $('#tel_cli_modifHelp').addClass('invisible');
         }
     });



     // Le telephone  ne doit contenir ds lettres
     // Champ du client ne doit contenir des chiffres

     //      Au click du boutton
     $('#bt_modifier').on('click', function(e) {

         var montant = $('#montant_modif').val();

         var tel_cli = $('#tel_cli_modif').val();
         var tel_dest = $('#tel_dest_modif').val();
         var destinataire = $('#destinataire_modif').val();
         var date_t = $('#date_t_modif').val();


         if (montant === '' && tel_cli == '') {
             formValide = false;
             $('#montant_modif').addClass('is-invalid');
             $('#montant_modifHelp').html('Veillez saisir le libellé.');
             $('#montant_modifHelp').removeClass('invisible');
             $('#tel_cli_modif').addClass('is-invalid');
             $('#tel_cli_modifHelp').html('Veillez sélectionner le telephone du client.');
             $('#tel_cli_modifHelp').removeClass('invisible');
             e.preventDefault()
         } else {
             formValide = true;
             $('#montant_modif').removeClass('is-invalid');
             $('#montant_modifHelp').html('');
             $('#montant_modifHelp').addClass('invisible');
             $('#tel_cli_modif').removeClass('is-invalid');
             $('#tel_cli_modifHelp').html('');
             $('#tel_cli_modifHelp').addClass('invisible');

         }

         if (formValide) {
             e.preventDefault();
             initializeFlash();
             $('.flash').addClass('alert-info');
             $('.flash').html('<i class="fas fa-cog fa-spin"></i> Modification...').fadeIn(300);

             var form = $('#form_modif');
             var method = form.prop('method');
             var url = form.prop('action');

             $.ajax({
                 type: method,
                 data: form.serialize() + "&bt_modifier=" + true,
                 url: url,
                 success: function(result) {
                     donnee = JSON.parse(result);
                     if (donnee['success'] === 'true') {
                         initializeFlash();
                         $('.flash').addClass('alert-success');
                         $('.flash').html('<i class="fas fa-check"></i> ' + donnee['message'])
                             .fadeIn(300).delay(2500).fadeOut(300);
                         swal_Alert_Sucess(donnee['message']);
                         $('.modal').modal('hide')

                         //  window.location.reload();
                     }

                     if (donnee['success'] === 'non') {
                         initializeFlash();
                         $('.flash').addClass('alert-danger');
                         $('.flash').html('<i class="fas fa-exclamation-circle"></i> ' + donnee['message'])
                             .fadeIn(300).delay(2500).fadeOut(300);
                     }
                     if (donnee['success'] === 'false') {
                         initializeFlash();
                         $('.flash').addClass('alert-danger');
                         $('.flash').html('<i class="fas fa-exclamation-circle"></i> Vérifiez les champs')
                             .fadeIn(300).delay(2500).fadeOut(300);
                     }
                 }
             });
         }

     });


     // CHARGEMENT AUTOMATIQUE DU MESSAGE DEPUIS LA BD
     const boutonLirePressePapier = document.getElementById('bt_charger');
     boutonLirePressePapier.addEventListener('click', async () => {
         try {

             // Récupération du contenu du presse papier
             const valeur = await obtenirValeurPressePapier();

             // CAS DE RETRAIT ORANGE
             if (valeur.includes("#145*61#")) {
                 // Extraction et analyse du texte
                 const ResultatExtraireInformations_RETRAIT_ORANGE = extraireInformations_RETRAIT_ORANGE(valeur);

                 $('#radio_retrait').prop('checked', true);
                 $('#solde_t').val(ResultatExtraireInformations_RETRAIT_ORANGE.solde);
                 $('#tel_cli').val(ResultatExtraireInformations_RETRAIT_ORANGE.numero);
                 $('#montant').val(ResultatExtraireInformations_RETRAIT_ORANGE.montant);
                 $('#id_transaction').val(ResultatExtraireInformations_RETRAIT_ORANGE.idTransaction);

             } else if (valeur.includes("Depot vers")) {
                 // Extraction et analyse du texte
                 const ResultatExtraireInformations_DEPOT_ORANGE = extraireInformations_DEPOT_ORANGE(valeur);

                 // Collage dans les cellules
                 $('#radio_depot').prop('checked', true);
                 $('#solde_t').val(ResultatExtraireInformations_DEPOT_ORANGE.solde);
                 $('#montant').val(ResultatExtraireInformations_DEPOT_ORANGE.montant);
                 $('#tel_cli').val(ResultatExtraireInformations_DEPOT_ORANGE.numero);
                 $('#id_transaction').val(ResultatExtraireInformations_DEPOT_ORANGE.idTransaction);
             }
         } catch (error) {
             // Gérer l'erreur si nécessaire
             console.error("Une erreur s'est produite :", error);
         }
     });




     // Extration de Texte RETRAIT ORANGE MONEY
     function extraireInformations_RETRAIT_ORANGE(texte) {
         // Utiliser une expression régulière pour extraire les informations nécessaires
         const regex = /Solde (\d+\.\d+) F.*Retrait de (\d+) effectue\. Montant (\d+\.\d+) F\.ID Transaction: (\w+\.\w+\.\w+)/;

         // Faire correspondre l'expression régulière avec le texte
         const correspondance = texte.match(regex);

         // Vérifier si une correspondance a été trouvée
         if (correspondance) {
             // Extraire les informations spécifiques
             let solde = correspondance[1];
             solde = solde.replace(/\s/g, '');

             let typeOperation = "Retrait";

             let numero = correspondance[2];
             numero = numero.replace(/\s/g, '');

             let montant = correspondance[3];
             montant = montant.replace(/\s/g, '');

             let idTransaction = correspondance[4];

             // Retourner les informations extraites
             return {
                 solde,
                 typeOperation,
                 numero,
                 montant,
                 idTransaction
             };
         } else {
             // Aucune correspondance trouvée
             return null;
         }
     }



     // Extration de Texte DEPOT ORANGE MONEY
     function extraireInformations_DEPOT_ORANGE(texte) {
         // Définir une expression régulière pour extraire les informations
         const regex = /Depot vers (\d+) reussi\. Montant (\d+\.\d+) F, Frais (\d+\.\d+) F, Commission (\d+\.\d+) F, ID Transaction: (\w+\.\w+\.\w+), Nouveau Solde (\d+\.\d+) F/;

         // Récupérer les correspondances avec la regex
         const correspondance = texte.match(regex);

         // Vérifier si une correspondance a été trouvée
         if (correspondance) {
             // Extraire les informations nécessaires
             let solde = correspondance[6];
             solde = solde.replace(/\s/g, '');

             let typeOperation = "Dépôt";

             let numero = correspondance[1];
             numero = numero.replace(/\s/g, '');

             let montant = correspondance[2];
             montant = montant.replace(/\s/g, '');

             let idTransaction = correspondance[5];

             // Retourner les informations extraites
             return {
                 numero,
                 montant,
                 solde,
                 idTransaction,
                 typeOperation
             };
         } else {
             // Aucune correspondance trouvée
             return null;
         }
     }
 </script>