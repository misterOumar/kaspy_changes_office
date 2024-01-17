<?php
//AFFICHAGE DES UTILISATEURS
$users = null;
if (isset($_GET['page']) and !empty($_GET['page'])) {
    include("models/Role_permission.php");
    include("models/Role_permission_details.php");
    $Liste_Role_permission = role_permission::getAll();
    $Liste_Role_permission_details = role_permission_details::getAll();
    $users = Users::getAll();

}


        // GESTION DES UTILISATEURS
        if (isset($_GET['idBloquerActiver'])) {
            $id = $_GET['idBloquerActiver'];
            $user = Users::getById($id);
            
            if ($user['user'] === $_SESSION["user"]['username']) {
                $alerteType = "alert-danger";
                $display = "block";
                $alerteMessage = "Vous avez tenté de bloquer l'utilisateur actuellement connecté sur cette machine !";
            } else {
                $actionOk = Users::activeOrDesableUser($id);
                if ($actionOk) {
                    $alerteType = "alert-success";
                    $display = "block";
                    $alerteMessage = "Statut de connexion mis à jour avec succès !";
                    $users = Users::getAll();
                } else {
                    $alerteType = "alert-danger";
                    $display = "block";
                    $alerteMessage = "Erreur lors de la modification du statut de connexion !";
                }
            }
        }

        //SUPPRESSION DES UTILISATEURS
        // if (isset($_GET['idSupprim'])) 
        // {
        //     include('../functions/functions.php');
        //     include('../config/config.php');
        //     include('../config/db.php');
        //     include('../models/Users.php');
        //     include('../models/login.php');          
        //     $id =$_GET['idSupprim'] ;
        //     $user = Users::getById($id);
        //     var_dump($user);
        //     Users::supprimer($id);
        //     // if ($user['user'] === $_SESSION["user"]['username']) {
        //     //     $alerteType = "alert-danger";
        //     //     $display = "block";
        //     //     $alerteMessage = "Vous avez tenté de supprimer l'utilisateur actuellement connecté sur cette machine !";
            // } else {
            //     $actionOk = Users::supprimer($id);
            //     var_dump($actionOk);
            //     if ($actionOk) {
            //         $alerteType = "alert-success";
            //         $display = "block";
            //         $alerteMessage = "Utilisateur supprimé avec succès !";
            //         $users = Users::getAll();                   
            //     } else {
            //         $alerteType = "alert-danger";
            //         $display = "block";
            //         $alerteMessage = "Erreur lors de la suppression de l'utilisateur !";
            //     }
            // }
        // }


        if (isset($_GET['idSupprim'])) {
            include('../functions/functions.php');
            include('../config/config.php');
            include('../config/db.php');
            include('../models/Users.php');
            include('../models/login.php');


            $id =$_GET['idSupprim'] ;
            $user = Users::getById($id);
            $user['user'] === $_SESSION["user"]['username'];
            var_dump( $user['user'] );
            var_dump($user); 
             if (Users::Supprimer($id)){
                $message = "user supprimé avec succès.";
                echo json_encode([
                    'success' => 'true',
                    'message' => $message
                ]);
            }else {
                $message = "Erreur impossible de supprimer ce user.";
                echo json_encode([
                    'success' => 'false',
                    'message' => $message
                ]);
            }
        }

        //STATISTIQUES DE NOMBRE D'UTILISATEURS
        // Nombre total d'utilisateur
        $Nbr_user_Bloqued = null;
        if (isset($_GET['page']) and !empty($_GET['page']) and $_GET['page'] === 'gestion_users') {
            $Nbr_user_Bloqued = Users::stats_users_bloqued();
        }
        // Nombre d'uilisateur bloqué
        $Nbr_user_Total = 0;
        if (isset($_GET['page']) and !empty($_GET['page']) and $_GET['page'] === 'gestion_users') {
            $Nbr_user_Total = Users::stats_Nbr_users();
        }
        //Nombre d'ulisateur connecté
        $Nbr_user_Connected = null;
        if (isset($_GET['page']) and !empty($_GET['page']) and $_GET['page'] === 'gestion_users') {
            $Nbr_user_Connected = Users::stats_users_connected();
        }
        //Nombre d'ulisateur déconnecté
        $Nbr_user_disConnected = null;
        if (isset($_GET['page']) and !empty($_GET['page']) and $_GET['page'] === 'gestion_users') {
            $Nbr_user_disConnected = Users::stats_users_disconnected();
        }

        //BLOQUER ET DEBLOQUER UN UTILISATEUR
        if (isset($_GET['idBloquerActiver'])) {
            $id = $_GET['idBloquerActiver'];
            $user = Users::getById($id);
            if ($user['users'] === $_SESSION["KaspyISS_user"]['username']) {
                $alerteType = "alert-danger";
                $display = "block";
                $alerteMessage = "Vous avez tenté de bloquer l'utilisateur actuellement connecté sur cette machine !";
            } else {
                $actionOk = Users::activeOrDesableUser($id);
                header('Location: index.php?page=gestion_users');
                if ($actionOk) {
                    $alerteType = "alert-success";
                    $display = "block";
                    $alerteMessage = "Statut de connexion mis à jour avec succès !";
                    $users = Users::getAll();
                } else {
                    $alerteType = "alert-danger";
                    $display = "block";
                    $alerteMessage = "Erreur lors de la modification du statut de connexion !";
                }
            }
        }


        //DECCONEXION UN UTILISATEUR
        if (isset($_GET['idDisconnect'])) {
            $id = $_GET['idDisconnect'];
            $user = Users::getById($id);
            if ($user['users'] === $_SESSION["KaspyISS_user"]['users']) {

                $alerteMessage = "Vous avez tenté de deconnecté l'utilisateur actuellement connecté sur cette machine !";
            } else {
                $actionOk = Users::disconnectUser($id);
                header('Location: index.php?page=gestion_users');
                if ($actionOk) {

                    $alerteMessage = "Utilisateur deconnecté avec succès !";
                    $users = Users::getAll();
                } else {
                    $alerteMessage = "Erreur lors de la deconnexion de l'utilisateur !";
                }
            }
        }


if (isset($_GET['id_modif_type_compte']) && isset($_GET['type_compte'])){
    $id = $_GET['id_modif_type_compte'];
    $type_compte = $_GET['type_compte'];

    $actionOk = Users::modifier_Type_Compte($type_compte, $id);
    header('Location: index.php?page=gestion_users');
    if ($actionOk) {
        $alerteMessage = "Type de compte modifié avec succès !";
        $users = Users::getAll();
    } else {
        $alerteMessage = "Erreur lors de la modification du type de compte !";
    }
}
