 <?php include("views/components/alerts.php") ?>
 <script src="functions/functions.js"></script>

 <script>
     // MES LOGIQUES
     //  Vider les champs
     function vider_les_champs() {
         // dates
         $('#montant').val('');
         $('#montant').removeClass('is-invalid');
         $('#montant_Help').html('Veuillez saisir le montant...');
         $('#montant_Help').addClass('invisible');

         $('#nouveau_solde').val('');
         $('#nouveau_solde').removeClass('is-invalid');
         $('#nouveau_soldeHelp').html('Veuillez saisir  le  solde total...');
         $('#nouveau_soldeHelp').addClass('invisible');

         $('#id_transaction').val('');
         $('#id_transaction').removeClass('is-invalid');
         $('#id_transactionHelp').html('Veuillez saisir  la transaction id...');
         $('#id_transactionHelp').addClass('invisible');

         $('#dates').val('');
         $('#dates').removeClass('is-invalid');
         $('#dates_Help').html('Veuillez sélectionner la date ...');
         $('#dates_Help').addClass('invisible');

         $('#numero_telephone').val('');
         $('#numero_telephone').removeClass('is-invalid');
         $('#numero_telephone_Help').html('Veuillez saisir le telephone du client...');
         $('#numero_telephone_Help').addClass('invisible');
     }

     $('#bt_vider').on('click', function() {
         vider_les_champs()
     });
     jQuery(function($) {
         $('#dates').flatpickr({
             defaultDate: 'today',
             dateFormat: "Y-m-d",
         })
     });

     flatpickr("#dates", {
         locale: 'fr',
         // defaultDate : 'today'
     });

     jQuery(function($) {
         $('#dates_modif').flatpickr({
             defaultDate: 'today',
             dateFormat: "Y-m-d",
         })
     });

     flatpickr("#dates_modif", {
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

     // Les événements en déhors du click du boutton de validation

     $('#montant').on('change', function() {
         $('#montant').removeClass('is-invalid');
         $('#montant_Help').html('');
     });


     $('#type').on('change', function() {
         $('#type').removeClass('is-invalid');
         $('#type_Help').html('');
     });


     $('#numero_telephone').on('change', function() {
         $('#numero_telephone').removeClass('is-invalid');
         $('#numero_telephone_Help').html('');
     });

     $('#nouveau_solde').on('change', function() {
         $('#nouveau_solde').removeClass('is-invalid');
         $('#nouveau_soldeHelp').html('');
     });


     $('#nouveau_solde').on('change', function() {
         $('#nouveau_solde').removeClass('is-invalid');
         $('#nouveau_soldeHelp').html('');
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
             $('#montant_Help').html('Veuillez saisir un  montant correcte');
             $('#montant_Help').removeClass('invisible');
             $('#montant').val('')
             e.preventDefault()
         } else {
             formValide = true;
             $('#montant').removeClass('is-invalid');
             $('#montant_Help').html('');
             $('#montant_Help').addClass('invisible');
         }
     });


     //GESTION DU SOLDE
     $('#nouveau_solde').on('keyup', function() {
         var loyer = $('#nouveau_solde').val();
         if ($.isNumeric(loyer) === false) {
             formValide = false;
             $('#nouveau_solde').addClass('is-invalid');
             $('#nouveau_soldeHelp').html('Veuillez saisir un  solde  correcte');
             $('#nouveau_soldeHelp').removeClass('invisible');
             $('#nouveau_solde').val('')
             e.preventDefault()
         } else {
             formValide = true;
             $('#nouveau_solde').removeClass('is-invalid');
             $('#nouveau_soldeHelp').html('');
             $('#nouveau_soldeHelp').addClass('invisible');
         }
     });


     if ($("#radio_depot").is(":checked") || $("#radio_retrait").is(":checked")) {
         formValide = true;
         $('#radio_depot').removeClass('is-invalid');
         $('#radio_retrait').removeClass('is-invalid');
         $('#type_Help').html("");
         $('#type_Help').removeClass('invisible');
     } else {
         formValide = false;
         $('#radio_depot').addClass('is-invalid');
         $('#radio_retrait').addClass('is-invalid');
         $('#type_Help').html("Veillez choisir le type de la transacion");
         $('#type_Help').removeClass('invisible');
         e.preventDefault()
     }


     $('#numero_telephone').on('keyup', function() {
         var loyer = $('#numero_telephone').val();
         if ($.isNumeric(loyer) === false) {
             formValide = false;
             $('#numero_telephone').addClass('is-invalid');
             $('#numero_telephone_Help').html('Veuillez saisir un numero correcte');
             $('#numero_telephone_Help').removeClass('invisible');
             $('#numero_telephone').val('')
             e.preventDefault()
         } else {
             formValide = true;
             $('#numero_telephone').removeClass('is-invalid');
             $('#numero_telephone_Help').html('');
             $('#numero_telephone_Help').addClass('invisible');
         }
     });


     //      Au click du boutton
     $('#bt_enregistrer').on('click', function(e) {

         // Cas du montant
         let montant = $('#montant').val();
         if (montant === '') {
             formValide = false;
             $('#montant').addClass('is-invalid');
             $('#montant_Help').html('Veuillez saisir le montant .');
             $('#montant_Help').removeClass('invisible');
             e.preventDefault()
         } else {
             formValide = true;
             $('#montant').removeClass('is-invalid');
             $('#montant_Help').html('');
             $('#montant_Help').addClass('invisible');
         }

         // Cas du solde total
         let nouveau_solde = $('#nouveau_solde').val();
         if (nouveau_solde === '') {
             formValide = false;
             $('#nouveau_solde').addClass('is-invalid');
             $('#nouveau_soldeHelp').html('Veuillez saisir le solde total .');
             $('#nouveau_soldeHelp').removeClass('invisible');
             e.preventDefault()
         } else {
             formValide = true;
             $('#nouveau_solde').removeClass('is-invalid');
             $('#nouveau_soldeHelp').html('');
             $('#nouveau_soldeHelp').addClass('invisible');
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
         let numero_telephone = $('#numero_telephone').val();
         if (numero_telephone === '') {
             formValide = false;
             $('#numero_telephone').addClass('is-invalid');
             $('#numero_telephone_Help').html('Veuillez saisir le  telephone du client.');
             $('#numero_telephone_Help').removeClass('invisible');
             e.preventDefault()
         } else

         {
             formValide = true;
             $('#numero_telephone').removeClass('is-invalid');
             $('#numero_telephone_Help').html('');
             $('#numero_telephone_Help').addClass('invisible');
         }

         let dates = $('#dates').val();
         if (dates === '') {
             formValide = false;
             $('#dates').addClass('is-invalid');
             $('#dates_Help').html('Veuillez selectionner  la date  .');
             $('#dates_Help').removeClass('invisible');
             e.preventDefault()
         } else {
             formValide = true;
             $('#dates').removeClass('is-invalid');
             $('#dates_Help').html('');
             $('#dates_Help').addClass('invisible');
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
     $('#numero_telephone_modif').on('keyup', function() {
         var loyer = $('#numero_telephone').val();
         if ($.isNumeric(loyer) === false) {
             formValide = false;
             $('#numero_telephone_modif').addClass('is-invalid');
             $('#numero_telephone_modifHelp').html('Veuillez saisir un numero correcte');
             $('#numero_telephone_modifHelp').removeClass('invisible');
             $('#numero_telephone_modif').val('')
             e.preventDefault()
         } else {
             formValide = true;
             $('#numero_telephone_modif').removeClass('is-invalid');
             $('#numero_telephone_modifHelp').html('');
             $('#numero_telephone_modifHelp').addClass('invisible');
         }
     });



     //      Au click du boutton
     $('#bt_modifier').on('click', function(e) {

         var montant = $('#montant_modif').val();

         var numero_telephone = $('#numero_telephone_modif').val();
         var tel_dest = $('#tel_dest_modif').val();
         var destinataire = $('#destinataire_modif').val();
         var dates = $('#dates_modif').val();


         if (montant === '' && numero_telephone == '') {
             formValide = false;
             $('#montant_modif').addClass('is-invalid');
             $('#montant_modifHelp').html('Veillez saisir le libellé.');
             $('#montant_modifHelp').removeClass('invisible');
             $('#numero_telephone_modif').addClass('is-invalid');
             $('#numero_telephone_modifHelp').html('Veillez sélectionner le telephone du client.');
             $('#numero_telephone_modifHelp').removeClass('invisible');
             e.preventDefault()
         } else {
             formValide = true;
             $('#montant_modif').removeClass('is-invalid');
             $('#montant_modifHelp').html('');
             $('#montant_modifHelp').addClass('invisible');
             $('#numero_telephone_modif').removeClass('is-invalid');
             $('#numero_telephone_modifHelp').html('');
             $('#numero_telephone_modifHelp').addClass('invisible');

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

             // CAS DE RETRAIT MTN
             if (valeur.includes("Le retrait initie le ")) {
                 // Extraction et analyse du texte
                 const ResultatExtraireInformations_RETRAIT = extraireInformations_RETRAIT(valeur);

                 $('#radio_retrait').prop('checked', true);
                 $('#dates').val(ResultatExtraireInformations_RETRAIT.dates);
                 $('#nouveau_solde').val(ResultatExtraireInformations_RETRAIT.solde);
                 $('#numero_telephone').val(ResultatExtraireInformations_RETRAIT.numero);
                 $('#montant').val(ResultatExtraireInformations_RETRAIT.montant);
                 $('#id_transaction').val(ResultatExtraireInformations_RETRAIT.idTransaction);

             } else if (valeur.includes("Votre nouveau solde est de:")) {
                 // Extraction et analyse du texte
                 const ResultatExtraireInformations_DEPOT = extraireInformations_DEPOT(valeur);

                 // Collage dans les cellules
                 $('#radio_depot').prop('checked', true);
                 $('#dates').val(ResultatExtraireInformations_RETRAIT.dates);
                 $('#nouveau_solde').val(ResultatExtraireInformations_DEPOT.solde);
                 $('#montant').val(ResultatExtraireInformations_DEPOT.montant);
                 $('#numero_telephone').val(ResultatExtraireInformations_DEPOT.numero);
                 $('#id_transaction').val(ResultatExtraireInformations_DEPOT.idTransaction);
             }
         } catch (error) {
             // Gérer l'erreur si nécessaire
             console.error("Une erreur s'est produite :", error);
         }
     });



     // Extration de Texte RETRAIT MTN MONEY
     function extraireInformations_RETRAIT(texte) {
         let contenuVariable = texte

         // Trouver la date
         let dateIndexDebut = contenuVariable.indexOf("initie le") + 9;
         let dateIndexFin = contenuVariable.indexOf(" a ete effectue.", dateIndexDebut);
         let dates = contenuVariable.substring(dateIndexDebut, dateIndexFin).trim();

         // Trouver le montant
         let montantIndexDebut = contenuVariable.indexOf("montant:") + 8;
         let montantIndexFin = contenuVariable.indexOf("FCFA", montantIndexDebut);
         let montant = contenuVariable.substring(montantIndexDebut, montantIndexFin).trim();
         montant = montant.replace(/\s/g, '');

         // Trouver le numéro
         let numeroIndexDebut = contenuVariable.indexOf("en especes au ") + 14;
         let numeroIndexFin = contenuVariable.indexOf(". Votre nouveau", numeroIndexDebut);
         let numero = contenuVariable.substring(numeroIndexDebut, numeroIndexFin).trim();
         numero = numero.replace(/\s/g, '');

         // Trouver le solde
         let soldeIndexDebut = contenuVariable.indexOf("Votre nouveau solde est de:") + 27;
         let soldeIndexFin = contenuVariable.indexOf("FCFA.", soldeIndexDebut);
         let solde = contenuVariable.substring(soldeIndexDebut, soldeIndexFin).trim();
         solde = solde.replace(/\s/g, '');

         // Trouver l'idTransaction
         let idTransactionIndexDebut = contenuVariable.indexOf("ID Transaction:") + 15;
         let idTransaction = contenuVariable.substring(idTransactionIndexDebut).trim();
         idTransaction = idTransaction.slice(0, -1)

         // Type de transaction
         let typeOperation = "Retrait"

         // Retourner les informations extraites
         return {
             dates,
             solde,
             typeOperation,
             numero,
             montant,
             idTransaction
         };
     }



     // Extration de Texte DEPOT MTN MONEY
     function extraireInformations_DEPOT(texte) {
         let contenuVariable = texte

         // Trouver la date
         let dateIndexDebut = contenuVariable.indexOf(" le ") + 4;
         let dateIndexFin = contenuVariable.indexOf(". Votre", dateIndexDebut);
         let dates = contenuVariable.substring(dateIndexDebut, dateIndexFin).trim();

         // Trouver le montant
         let montantIndexDebut = contenuVariable.indexOf("avez envoye") + 11;
         let montantIndexFin = contenuVariable.indexOf("FCFA", montantIndexDebut);
         let montant = contenuVariable.substring(montantIndexDebut, montantIndexFin).trim();
         montant = montant.replace(/\s/g, '');

         // Trouver le numéro
         let numeroIndexDebut = contenuVariable.indexOf("FCFA au") + 7;
         let numeroIndexFin = contenuVariable.indexOf(" le ", numeroIndexDebut);
         let numero = contenuVariable.substring(numeroIndexDebut, numeroIndexFin).trim();
         numero = numero.replace(/\s/g, '');

         // Trouver le solde
         let soldeIndexDebut = contenuVariable.indexOf("Votre nouveau solde est de:") + 27;
         let soldeIndexFin = contenuVariable.indexOf("FCFA.", soldeIndexDebut);
         let solde = contenuVariable.substring(soldeIndexDebut, soldeIndexFin).trim();
         solde = solde.replace(/\s/g, '');

         // Trouver l'idTransaction
         let idTransactionIndexDebut = contenuVariable.indexOf("ID Transaction:") + 15;
         let idTransaction = contenuVariable.substring(idTransactionIndexDebut).trim();
         idTransaction = idTransaction.slice(0, -1)

         // Type de transaction
         let typeOperation = "Dépôt"

         // Retourner les informations extraites
         return {
             dates,
             solde,
             typeOperation,
             numero,
             montant,
             idTransaction
         };
     }
 </script>