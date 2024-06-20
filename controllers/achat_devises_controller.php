<?php

//OPTIONS DE SELECT DYNAMIQUE
if (isset($_GET['page']) and !empty($_GET['page']) and $_GET['page'] === 'achat_devises') {

    include('./models/Types_piece.php');
    include('./models/Devise.php');
    include('./models/Emetteur_appro.php');

    // Liste des options dynamique
    $types_piece = types_piece::getAll();
    $devises = devise::getAll();
    $clients = emetteur_appro::getAll();
}

// ENREGISTRER (AJOUTER) UN NOUVELLE ENREGISTREMENT FISCAL DE BAIL
if (isset($_POST['bt_enregistrer'])) {

    // inclusion des fichiers ressources
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Emetteur_appro.php');
    include('../models/Achat_devise.php');

    // RECUPERATION LES DONNEES POSTEES
    // information du client
    $civilite = strSecur($_POST["civilite"]);
    $type = strSecur($_POST["type"]);
    $nom_prenom = strSecur($_POST["nom_prenom"]);
    $type_piece = strSecur($_POST["type_piece"]);
    $numero_piece = strSecur($_POST["numero_piece"]);
    $telephone = strSecur($_POST["telephone"]);
    $email = strSecur($_POST["email"]);
    $adresse = strSecur($_POST["adresse"]);
    $id_modif = strSecur($_POST["idModif"]);

    // informations de la facturation
    $date_achat = strSecur($_POST["date_achat"]);
    $devise = strSecur($_POST["devise"]);
    $mode_reglement = strSecur($_POST["mode_reglement"]);
    $quantite = strSecur($_POST["quantite"]);
    $taux_achat = strSecur($_POST["taux_achat"]);
    $remise = strSecur($_POST["remise"]);
    $total_brut = strSecur($_POST["total_brut"]);
    $total_net = strSecur($_POST["total_net"]);
    $observation = strSecur($_POST["observation"]);
    $montant_lettre = convertirNombreEnLettres($total_net);



    // Déclaration et initialisation des variables d'erreur (e)
    $e_civilite  =  $e_type = $e_telephone = $e_nom_prenom = $e_type_piece = $e_numero_piece = $e_email = $e_adresse =  "";
    $succes = true;

    // Vérifications   
    if ($civilite == "Choisir...") {
        $e_civilite = "Ce champ ne doit pas être vide.";
        $succes = false;
    }

    if ($type == "Choisir...") {
        $e_type = "Ce champ ne doit pas être vide.";
        $succes = false;
    }

    if ($type_piece == "Choisir...") {
        $e_type_piece = "Ce champ ne doit pas être vide.";
        $succes = false;
    }

    if (empty($numero_piece)) {
        $e_numero_piece = "Ce champ ne doit pas être vide.";
        $succes = false;
    }


    if (empty($nom_prenom)) {
        $e_nom_prenom = "Ce champ ne doit pas être vide.";
        $succes = false;
    }

    if (empty($adresse)) {
        $e_adresse = "Ce champ ne doit pas être vide.";
        $succes = false;
    }

    if ($succes) {
        $ip_creation = getIp();
        $navigateur_creation = getNavigateur();
        $user_creation = $_SESSION["KaspyISS_user"]['users'];
        $ordinateur_creation = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $magasin = $_SESSION["KaspyISS_bureau"];
        $annee = $_SESSION["KaspyISS_annee"];
        $date_creation = date("Y-m-d H:i:s");
        if ($id_modif == 0) {

            if (emetteur_appro::Ajouter(
                $civilite,
                $nom_prenom,
                $type,
                $type_piece,
                $numero_piece,
                $telephone,
                $email,
                $adresse,
                $magasin,
                $date_creation,
                $user_creation,
                $navigateur_creation,
                $ordinateur_creation,
                $ip_creation,
                $date_creation,
                $user_creation,
                $navigateur_creation,
                $ordinateur_creation,
                $ip_creation
            )) {
                $last_emetteur = emetteur_appro::getLast();
                if (achat_devise::Ajouter(
                    $date_achat,
                    $type,
                    $last_emetteur['nom'],
                    $numero_piece,
                    $devise,
                    $quantite,
                    $taux_achat,
                    $total_brut,
                    $remise,
                    $total_net,
                    $mode_reglement,
                    $observation,
                    0,
                    $montant_lettre,
                    $magasin,
                    $annee,
                    $date_creation,
                    $user_creation,
                    $navigateur_creation,
                    $ordinateur_creation,
                    $ip_creation,
                    $date_creation,
                    $user_creation,
                    $navigateur_creation,
                    $ordinateur_creation,
                    $ip_creation
                )) {
                    $message = "Enregistrement de l'achat de dévise éffectué avec succès.";
                    echo json_encode([
                        'success' => 'true',
                        'message' => $message
                    ]);
                }
            } else {
                $message = "Erreur lors de l\'enregistrement de l\'achat de dévise.";
                echo json_encode([
                    'success' => 'false',
                    'message' => $message
                ]);
            }
        } else {

            if (emetteur_appro::Modifier(
                $civilite,
                $nom_prenom,
                $type,
                $type_piece,
                $numero_piece,
                $telephone,
                $email,
                $adresse,
                $magasin,
                $date_creation,
                $user_creation,
                $navigateur_creation,
                $ordinateur_creation,
                $ip_creation,
                $id_modif
            )) {
                $last_emetteur = emetteur_appro::getByID($id_modif);
                if (achat_devise::Ajouter(
                    $date_achat,
                    $type,
                    $last_emetteur['nom'],
                    $numero_piece,
                    $devise,
                    $quantite,
                    $taux_achat,
                    $total_brut,
                    $remise,
                    $total_net,
                    $mode_reglement,
                    $observation,
                    0,
                    $montant_lettre,
                    $magasin,
                    $annee,
                    $date_creation,
                    $user_creation,
                    $navigateur_creation,
                    $ordinateur_creation,
                    $ip_creation,
                    $date_creation,
                    $user_creation,
                    $navigateur_creation,
                    $ordinateur_creation,
                    $ip_creation
                )) {
                    $message = "Enregistrement de l'achat de dévise éffectué avec succès.";
                    echo json_encode([
                        'success' => 'true',
                        'message' => $message
                    ]);
                }
            } else {
                $message = "Erreur lors de l\'enregistrement de l\'achat de dévise.";
                echo json_encode([
                    'success' => 'false',
                    'message' => $message
                ]);
            }
        }
    } else {
        echo json_encode([
            'success' => 'false',
            'message' => "Vérifier les champs",
            'montant_envoye' => $e_montant_envoye,
            'client' => $e_client,
            'telephone' => $e_telephone,
            'taux' => $e_taux,
            'date' => $e_date_v,
        ]);
    }
}

// MODIFIER UNE TRANSACTION
if (isset($_POST['bt_modifier'])) {

    // inclusion des fichiers ressources
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Emetteur_appro.php');
    include('../models/Achat_devise.php');
  

    // RECUPERATION LES DONNEES POSTEES
    // information du client
    $civilite = strSecur($_POST["civilite_modif"]);
    $type = strSecur($_POST["type_modif"]);
    $nom_prenom = strSecur($_POST["nom_prenom_modif"]);
    $type_piece = strSecur($_POST["type_piece_modif"]);
    $numero_piece = strSecur($_POST["numero_piece_modif"]);
    $telephone = strSecur($_POST["telephone_modif"]);
    $email = strSecur($_POST["email_modif"]);
    $adresse = strSecur($_POST["adresse_modif"]);
    $id_client_modif = strSecur($_POST["id_client_modif"]);

    // informations de la facturation
    $date_achat = strSecur($_POST["date_achat_modif"]);
    $devise = strSecur($_POST["devise"]);
    $mode_reglement = strSecur($_POST["mode_reglement_modif"]);
    $quantite = strSecur($_POST["quantite_modif"]);
    $taux_achat = strSecur($_POST["taux_achat_modif"]);
    $remise = strSecur($_POST["remise_modif"]);
    $total_brut = strSecur($_POST["total_brut_modif"]);
    $total_net = strSecur($_POST["total_net_modif"]);
    $observation = strSecur($_POST["observation_modif"]);
    $montant_lettre = convertirNombreEnLettres($total_net);
    $id_achat_modif = strSecur($_POST["id_achat_modif"]);



    // Déclaration et initialisation des variables d'erreur (e)
    $e_civilite  =  $e_type = $e_telephone = $e_nom_prenom = $e_type_piece = $e_numero_piece = $e_email = $e_adresse =  "";
    $succes = true;

    if ($civilite == "Choisir...") {
        $e_civilite = "Ce champ ne doit pas être vide.";
        $succes = false;
    }

    if ($type == "Choisir...") {
        $e_type = "Ce champ ne doit pas être vide.";
        $succes = false;
    }

    if ($type_piece == "Choisir...") {
        $e_type_piece = "Ce champ ne doit pas être vide.";
        $succes = false;
    }

    if (empty($numero_piece)) {
        $e_numero_piece = "Ce champ ne doit pas être vide.";
        $succes = false;
    }


    if (empty($nom_prenom)) {
        $e_nom_prenom = "Ce champ ne doit pas être vide.";
        $succes = false;
    }

    if (empty($adresse)) {
        $e_adresse = "Ce champ ne doit pas être vide.";
        $succes = false;
    }


    // Cas ou tout est ok
    if ($succes) {
        $ip_modif = getIp();
        $navigateur_modif = getNavigateur();
        $user_modif = $_SESSION["KaspyISS_user"]['users'];
        $ordinateur_modif = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $magasin = $_SESSION["KaspyISS_bureau"];
        $date_modif = date("Y-m-d H:i:s");
        $annee = $_SESSION["KaspyISS_annee"];
        if (emetteur_appro::Modifier(
            $civilite,
            $nom_prenom,
            $type,
            $type_piece,
            $numero_piece,
            $telephone,
            $email,
            $adresse,
            $magasin,
            $date_modif,
            $user_modif,
            $navigateur_modif,
            $ordinateur_modif,
            $ip_modif,
            $id_client_modif

        )) {
            $emetteur = emetteur_appro::getByID($id_client_modif);
            if (achat_devise::Modifier(
                $date_achat,
                $type,
                $numero_piece,
                $quantite,
                $taux_achat,
                $total_brut,
                $remise,
                $total_net,
                $mode_reglement,
                $observation,
                0,
                $montant_lettre,
                $magasin,
                $annee,
                $date_modif,
                $user_modif,
                $navigateur_modif,
                $ordinateur_modif,
                $ip_modif,
                $id_achat_modif
            )) {

                $message = "Mise à jour de l\'achat de dévise  éffectué avec succès.";
                echo json_encode([
                    'success' => 'true',
                    'message' => $message
                ]);
            } else {
                $message = "Erreur lors de la mise à jour de l\'achat de dévise.";
                echo json_encode([
                    'success' => 'false',
                    'message' => $message
                ]);
            }
        }
    } else {
        echo json_encode([
            'success' => 'false',
            'message' => "Vérifier les champs",
            'type' => $e_type,
            'type_piece' => $e_type_piece,
            'numero' => $e_numero,
            'nom_prenom' => $e_nom_prenom,
            'adresse' => $e_adresse,

        ]);
    }
}


// RECUPERATION UNE DEVISE PAR SON NOM
if (isset($_GET['get_devise_by_nom'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Devise.php');

    $devise = $_GET['devise'];
    $devise = devise::getByNom($devise);

    if ($devise) {
        echo json_encode([
            'devise' => $devise,
            'success' => 'true',
        ]);
    } else {
        echo json_encode([
            'devise' => 'null'
        ]);
    }
}


// RECUPERATION D'UN CLIENT EN FONCTION DE SON NUMERO DE PIECE
if (isset($_GET['get_client_by_numero_piece'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Emetteur_appro.php');

    $numero_piece = $_GET['numero_piece'];
    $client = emetteur_appro::getByNumeroPiece($numero_piece);

    if ($client) {
        echo json_encode([
            'client' => $client,
            'success' => 'true',
        ]);
    } else {
        echo json_encode([
            'client' => 'null'
        ]);
    }
}






// RECUPERATION DES INFO DE LA DERNIERE LIGNE
if (isset($_GET['idLast'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Achat_devise.php');

    $transactions = achat_devise::getLast();

    if ($transactions) {
        $total = achat_devise::getCount();
        echo json_encode([
            'last_transaction' => $transactions,
            'total' => $total
        ]);
    } else {
        echo json_encode([
            'last_transaction' => 'null'
        ]);
    }
}




// RECUPERATION DES INFO POUR PROPRIETE D'UN ELEMENT 
if (isset($_GET['idProprietes'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Achat_devise.php');
    include('../models/Emetteur_appro.php');

    $id = $_GET['idProprietes'];

    $achat_devise = achat_devise::getByID($id);
    $nom_client = $achat_devise["emetteur_approvisionnement"];
    $client = emetteur_appro::getByClient($nom_client);
    if ($achat_devise) {
        echo json_encode([
            'achat_devise' => $achat_devise,
            'client' => $client,
        ]);
    } else {
        echo json_encode([
            'achat_devise' => 'null'
        ]);
    }
}






if (isset($_GET['idSuppr'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Achat_devise.php');
    include('../models/Emetteur_appro.php');

    $id = strSecur($_GET['idSuppr']);
    if (achat_devise::Supprimer($id)) {
        $message = "transaction  supprimée avec succès.";
        echo json_encode([
            'success' => 'true',
            'message' => $message
        ]);
    } else {
        $message = "Erreur impossible de supprimer cette transaction.";
        echo json_encode([
            'success' => 'false',
            'message' => $message
        ]);
    }
}
