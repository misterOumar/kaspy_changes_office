 <?php

    $List_cartes = null;
    if (isset($_GET['page']) and !empty($_GET['page']) and $_GET['page'] === "vente_carte") {
        include("models/Carte.php");
        $List_cartes = cartes::Carte_Nvendues();
        $stock = cartes::Nb_carte();
        $liste_type_cartes = cartes::getTypesCarte();
        // statistiques
        $nbre_cartes = cartes::getCount();
        $nbre_cartes_vendu = cartes::getCountVendu();
        $stat_carte = cartes::getCountTypeCarte();
    }

    // ENREGISTRER (AJOUTER) UN NOUVELLE ENREGISTREMENT FISCAL DE BAIL
    if (isset($_POST['bt_enregistrer'])) {
        // inclusion des fichiers ressources
        include('../functions/functions.php');
        include('../config/config.php');
        include('../config/db.php');
        include('../models/Vente_carte.php');
        include('../models/Carte.php');

        // Récupération des données postés dépuis le formulaire dans les variables respectives
        $type_enregistrement = strSecur($_POST['radio_type']);
        $carte = strSecur($_POST["carte"]);
        $num_carte = strSecur($_POST["num_carte"]);
        $quantite = ($_POST["quantite"]);
        $prix_u = ($_POST["prix_u"]);

        $customer_id_initial = ($_POST["customer_id_initial"]);
        $customer_id_final = ($_POST["customer_id_final"]);

        $client = strSecur($_POST["client"]);
        $telephone = strSecur($_POST["telephone"]);
        $email = strSecur($_POST["email"]);
        $date_v = date('Y-m-d H:i:s');

        $montant = $quantite * $prix_u;

        // Déclaration et initialisation des variables d'erreur (e)
        $e_client  =  $e_telephone =  $e_quantite = $e_date_v = $e_prix_u = $e_date_v = "";
        $succes = true;

        if ($type_enregistrement === "individuel") {

            // Vérifications
            if (empty($client)) {
                $e_client = "Ce champ ne doit pas être vide.";
                $succes = false;
            }
            if (empty($quantite)) {
                $e_quantite = "Ce champ ne doit pas être vide.";
                $succes = false;
            }

            if (empty($date_v)) {
                $e_date_v = "Ce champ ne doit pas être vide.";
                $succes = false;
            }

            if (empty($prix_u)) {
                $e_prix_u = "Ce champ ne doit pas être vide.";
                $succes = false;
            }

            if ($quantite <= $stock) $vente = true;

            do {

                if ($succes) {

                    $ip = getIp();
                    $navigateur = getNavigateur();
                    $us = $_SESSION["KaspyISS_user"]['users'];
                    $pc = gethostbyaddr($_SERVER['REMOTE_ADDR']);
                    $dt = date("Y-m-d H:i:s");
                    if (vente_carte::Ajouter(
                        $montant,
                        $client,
                        $telephone,
                        $email,
                        $carte,
                        $num_carte,
                        $prix_u,
                        $quantite,
                        $date_v,
                        $dt,
                        $dt,
                        $us,
                        $navigateur,
                        $pc,
                        $ip,
                        $dt,
                        $us,
                        $navigateur,
                        $pc,
                        $pc

                    )) {
                        cartes::Carte_vendue(
                            $num_carte,
                            $dt,
                            $us,
                            $navigateur,
                            $pc,
                            $pc
                        );
                        $message = "Enregistrement de la vente  éffectué avec succès.";
                        echo json_encode([
                            'success' => 'true',
                            'message' => $message
                        ]);
                    } else {
                        $message = "Erreur lors de l\'enregistrement de la vente.";
                        echo json_encode([
                            'success' => 'false',
                            'message' => $message
                        ]);
                    }
                } else {
                    echo json_encode([
                        'success' => 'false',
                        'message' => "Vérifier les champs",
                        'prix_u' => $e_prix_u,
                        'client' => $e_client,
                        'telephone' => $e_telephone,
                        'date' => $e_date_v,
                        'quantite' => $e_quantite,
                        'carte' => $e_carte

                    ]);
                }
            } while ($vente);
        } else {
            // Vente par lot
            $nombre_carte = $customer_id_final - $customer_id_initial + 1;

            $e_type = $e_customer_id_initial = $e_customer_id_final = "";
            $succes = true;

            if (empty($customer_id_initial)) {
                $e_customer_id_initial = "Ce champ ne doit pas être vide.";
                $succes = false;
            }
            if (empty($customer_id_final)) {
                $e_customer_id_final = "Ce champ ne doit pas être vide.";
                $succes = false;
            }

            if ($succes) {
                $result = enregistrerVenteLot($customer_id_initial, $customer_id_final, $montant, $client, $telephone, $email, $carte, $prix_u, $quantite, $date_v);
                echo json_encode($result);
            } else {
                echo json_encode([
                    'success' => 'false',
                    'message' => "Vérifier les champs",
                    'customer_id_initial' => $e_customer_id_initial,
                    'customer_id_final' => $e_customer_id_final,
                    'type_carte' => $e_type,
                ]);
            }

        }
    }
    
    // fonction - enregistrer plusieurs ventes
    function enregistrerVenteLot($customer_id_initial, $customer_id_final, $montant, $client, $telephone, $email, $carte, $prix_u, $quantite, $date_v)
    {

        // vérifier si toutes les cartes sont disponibles et en stock

        //enregistrer
        $ip = getIp();
        $navigateur = getNavigateur();
        $us = $_SESSION["KaspyISS_user"]['users'];
        $pc = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $dt = date("Y-m-d H:i:s");

        $succes = true;

        for ($i = 0; $i < $customer_id_final - $customer_id_initial + 1; $i++) {
            $customer_id_card = $customer_id_initial + $i;
            if (vente_carte::Ajouter(
                $montant,
                $client,
                $telephone,
                $email,
                $carte,
                $customer_id_card,
                $prix_u,
                $quantite,
                $date_v,
                $dt,
                $dt,
                $us,
                $navigateur,
                $pc,
                $ip,
                $dt,
                $us,
                $navigateur,
                $pc,
                $pc

            )) {
                cartes::Carte_vendue(
                    $customer_id_card,
                    $dt,
                    $us,
                    $navigateur,
                    $pc,
                    $pc
                );
            } else {
                $succes = false;
                break;
            }
        }

        if ($succes) {
            return ['success' => 'true', 'message' => "Ventes des cartes éffectuée avec succès."];
        } else {
            return ['success' => 'false', 'message' => "Erreur lors de la vente des cartes."];
        }
    }

    // MODIFIER UNE TRANSACTION
    if (isset($_POST['bt_modifier'])) {

        // inclusion des fichiers ressources
        include('../functions/functions.php');
        include('../config/config.php');
        include('../config/db.php');
        include('../models/Vente_carte.php');
        // Récupération des données postés dépuis le formulaire dans les variables respectives
        $client = strSecur($_POST["client_modif"]);
        $quantite = ($_POST["quantite_modif"]);
        $prix_u = ($_POST["prix_u_modif"]);
        $telephone = strSecur($_POST["telephone_modif"]);
        $email = strSecur($_POST["email_modif"]);

        $carte = strSecur($_POST["carte_modif"]);



        $date_v = strSecur($_POST["date_vmodif"]);
        $montant = $quantite * $prix_u;
        $idModif = strSecur($_POST["idModif"]);
        $e_client = $e_prix_u  = $e_quantite = $e_date_v = " ";
        $succes = true;
        // Vérifications


        if ($client === '') {
            $e_client = "Ce champ ne doit pas être vide.";
            $succes = false;
        }

        if ($prix_u === '') {
            $e_prix_u = "Ce champ ne doit pas être vide.";
            $succes = false;
        }

        if ($quantite === '') {
            $e_quantite = "Ce champ ne doit pas être vide.";
            $succes = false;
        }


        // Cas ou tout est ok
        if ($succes) {
            $ip = getIp();
            $navigateur = getNavigateur();
            $us = $_SESSION["KaspyISS_user"]['users'];
            $pc = gethostbyaddr($_SERVER['REMOTE_ADDR']);
            $dt = date("Y-m-d H:i:s");
            if (vente_carte::Modifier(
                $montant,
                $client,
                $telephone,
                $email,
                $carte,
                $num_carte,
                $prix_u,
                $quantite,
                $date_v,
                $dt,
                $us,
                $navigateur,
                $pc,
                $ip,
                $idModif

            )) {
                $message = "Mise à jour de la vente  éffectué avec succès.";
                echo json_encode([
                    'success' => 'true',
                    'message' => $message
                ]);
            } else {
                $message = "Erreur lors de la mise à jour de la  vente.";
                echo json_encode([
                    'success' => 'false',
                    'message' => $message
                ]);
            }
        } else {
            echo json_encode([
                'success' => 'false',
                'message' => "Vérifier les champs",
                'date' => $e_date_v,
                'client' => $e_client,
                'carte' => $e_carte,
                'quantite' => $e_quantite,
                'prix_u' => $e_prix_u
            ]);
        }
    }

    // RECUPERATION DES INFO DE LA DERNIERE LIGNE
    if (isset($_GET['idLast'])) {
        include('../functions/functions.php');
        include('../config/config.php');
        include('../config/db.php');
        include('../models/Vente_carte.php');

        $ventes = vente_carte::getLast();

        if ($ventes) {
            $total = vente_carte::getCount();
            echo json_encode([
                'last_vente' => $ventes,
                'total' => $total
            ]);
        } else {
            echo json_encode([
                'last_vente' => 'null'
            ]);
        }
    }


    // RECUPERATION DES INFO POUR LA MODIFICATION
    if (isset($_GET['idVcarte'])) {
        include('../functions/functions.php');
        include('../config/config.php');
        include('../config/db.php');
        include('../models/Vente_carte.php');

        $id = $_GET['idVcarte'];
        $proprietes = vente_carte::getByID($id);
        if ($proprietes) {
            echo json_encode([
                'vente' => $proprietes,
            ]);
        } else {
            echo json_encode([
                'vente' => 'null'
            ]);
        }
    }


    // RECUPERATION DES INFO EN FONCTION DU TYPE DE CARTE
    if (isset($_GET['get_by_type_carte'])) {
        include('../functions/functions.php');
        include('../config/config.php');
        include('../config/db.php');
        include('../models/Carte.php');
        include('../models/Type_carte.php');

        $type_carte = $_GET['type_carte'];
        $types_cartes = cartes::getByTypesCarte($type_carte);
        $type_carte = type_carte::getByNom($type_carte);

        if ($types_cartes) {
            echo json_encode([
                'types_cartes' => $types_cartes,
                'type_carte' => $type_carte,
                'success' => 'true',
            ]);
        } else {
            echo json_encode([
                'types_cartes' => 'null'
            ]);
        }
    }


    // RECUPERATION DES INFO POUR PROPRIETE D'UN ELEMENT 
    if (isset($_GET['idProprietes'])) {
        include('../functions/functions.php');
        include('../config/config.php');
        include('../config/db.php');
        include('../models/Vente_carte.php');
        $id = $_GET['idProprietes'];
        $transactions = vente_carte::getByID($id);
        if ($transactions) {
            echo json_encode([
                'ventes' => $transactions,
            ]);
        } else {
            echo json_encode([
                'ventes' => 'null'
            ]);
        }
    }


    if (isset($_GET['idSuppr'])) {
        include('../functions/functions.php');
        include('../config/config.php');
        include('../config/db.php');
        include('../models/Vente_carte.php');

        $id = strSecur($_GET['idSuppr']);
        if (vente_carte::Supprimer($id)) {
            $message = "vente   supprimée avec succès.";
            echo json_encode([
                'success' => 'true',
                'message' => $message
            ]);
        } else {
            $message = "Erreur impossible de supprimer cette vente.";
            echo json_encode([
                'success' => 'false',
                'message' => $message
            ]);
        }
    }
