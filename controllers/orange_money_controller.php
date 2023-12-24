  <!--  <?php
//||******************************************************||
//||----------------- Kaspy Web Framework ----------------||
//||--- kaspy corporation, We're developing the future ---||
//||             Version: V1.0 ; Année : 2022             ||
//||******************************************************||


// AFFICHER LA LISTE DES PROPRIETAIRE


// ENREGISTRER (AJOUTER) UN NOUVEAU Proprietaire
if (isset($_POST['bt_enregistrer'])) {
    // inclusion des fichiers ressources
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Orange.php');

    // Récupération des données postés dépuis le formulaire dans les variables respectives
    $type = strSecur($_POST["radio_type"]);
    $montant = strSecur($_POST["montant"]);    
    $tel_cli = strSecur($_POST["tel_cli"]);  
    // $date_t = strSecur($_POST["date_t"]);
    $date_t = strSecur($_POST["date_t"]);
    $date_t = date('Y-m-d', strtotime($date_t));

    // Déclaration et initialisation des variables d'erreur (e)
    $e_montant = $e_client   = $e_date_t = $e_tel_cli = "";
    $succes = true;

    // Vérifications
    if ($montant ==="") {
        $e_montant = "Ce champ ne doit pas être vide.";
        $succes = false;
    }  
 
    if ($tel_cli==="") {
        $e_tel_cli = "Ce champ ne doit pas être vide.";
        $succes = false;
    }
    // Cas ou tout est ok
    if ($succes) {

        $ip = getIp();
        $navigateur = getNavigateur();
        $us = $_SESSION["KaspyISS_user"]['users'];
        $pc = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $dt = date("Y-m-d H:i:s");
        if (orange::Ajouter(
            $date_t,
            $type,
            $tel_cli,     
            $montant,
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

        )) {
            $message = "Enregistrement de la transaction  éffectué avec succès.";
            echo json_encode([
                'success' => 'true',
                'message' => $message
            ]);
        } else {
            $message = "Erreur lors de l\'enregistrement  de la transaction.";
            echo json_encode([
                'success' => 'false',
                'message' => $message
            ]);
        }
    }
     else {
        echo json_encode([
            'success' => 'false',
            'message' => "Vérifier les champs",
            'montant' => $e_montant,                       
            'telephone_client' => $e_tel_cli,            

        ]);
    }
}








// MODIFIER UNE TRANSACTION
if (isset($_POST['bt_modifier'])) {

    // inclusion des fichiers ressources
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Orange.php');

    // Récupération des données postés dépuis le formulaire dans les variables respectives

 
    $montant = strSecur($_POST["montant_modif"]);
 
    $tel_cli = strSecur($_POST["tel_cli_modif"]);
    $type = strSecur($_POST["radio_type_modif"]);
    $date_t = strSecur($_POST["date_t_modif"]);

    $idModif = strSecur($_POST["idModif"]);

    $e_montant = $e_date_t = $e_client = $e_tel_cli   = $e_destinataire  = $e_tel_dest = " ";
    $succes = true;
    // Vérifications
    if (empty($montant)) {
        $e_montant = "Ce champ ne doit pas être vide.";
        $succes = false;
    }
 

    if (empty($tel_cli)) {
        $e_tel_cli = "Ce champ ne doit pas être vide.";
        $succes = false;
    }

    

   
    // Cas ou tout est ok
    if ($succes) {
        $ip = getIp();
        $navigateur = getNavigateur();
        $us = $_SESSION["KaspyISS_user"]['users'];
        $pc = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $dt = date("Y-m-d H:i:s");
        if (orange::Modifier(            
            $date_t, 
            $type,            
            $tel_cli,           
            $montant,
            $dt,
            $us,
            $navigateur,
            $pc,
            $ip,
            $idModif

        )) {
            $message = "Mise à jour de la transaction  éffectué avec succès.";
            echo json_encode([
                'success' => 'true',
                'message' => $message
            ]);
        } else {
            $message = "Erreur lors de la mise à jour de la transaction.";
            echo json_encode([
                'success' => 'false',
                'message' => $message
            ]);
        }
    } else {
        echo json_encode([
            'success' => 'false',
            'message' => "Vérifier les champs",
            'date' => $e_date_t,            
            'telephone_client' => $e_tel_cli,
            'montant' => $e_montant,
           

        ]);
    }
}




// RECUPERATION DES INFO DE LA DERNIERE LIGNE
if (isset($_GET['idLast'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Orange.php');

    $transactions = orange::getLast();

    if ($transactions) {
        $total = orange::getCount();
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


// RECUPERATION DES INFO POUR LA MODIFICATION

if (isset($_GET['idOrange'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Orange.php');

    $id = $_GET['idOrange'];
    $proprietes = orange::getByID($id);
    if ($proprietes) {
        echo json_encode([
            'transaction' => $proprietes,
        ]);
    } else {
        echo json_encode([
            'transaction' => 'null'
        ]);
    }
}


// RECUPERATION DES INFO POUR PROPRIETE D'UN ELEMENT 
if (isset($_GET['idProprietes'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Orange.php');
    $id = $_GET['idProprietes'];
    $transactions = orange::getByID($id);
    if ($transactions) {
        echo json_encode([
            'transactions' => $transactions,
        ]);
    } else {
        echo json_encode([
            'transaction' => 'null'
        ]);
    }
}


if (isset($_GET['idSuppr'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Orange.php');

    $id = strSecur($_GET['idSuppr']);
    if (orange::Supprimer($id)) {
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
