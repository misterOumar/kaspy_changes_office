<?php
//||******************************************************||
//||----------------- Kaspy Web Framework ----------------||
//||--- kaspy corporation, We're developing the future ---||
//||             Version: V1.0 ; Année : 2022             ||
//||******************************************************||


/**
 * Class Users - Représente un compte utilisateur
 */
class Users
{
    public $id;
    public $nom_prenom;
    public $users;
    public $password;
    public $type_compte;
    public $sex;
    public $adresse;
    public $tel1;
    public $tel2;
    public $email;
    public $matricule;
    public $date_naissance;
    public $n_piece;
    public $nationnalite;
    public $situation_matrimoniale;
    public $fonction;
    public $details_fonction;
    public $nombre_enfants;
    public $permis_conduire;
    public $photo;
    public $connected;
    public $bloqued;
    public $valide_compte;
    public $otp;
    public $date_connexion;
    public $date_modif;
    public $ordinateur_modif;
    public $navigateur_modif;
    public $ip_modif;

    /**
     * Users constructor.
     *
     * @param $id
     */
    public function __construct($id)
    {
        global $db;
        $id = strSecur($id);

        $req = $db->prepare('SELECT * FROM login WHERE id = ?');
        $req->execute([$id]);
        $data = $req->fetch();

        $this->id = $id;
        $this->nom_prenom = $data['nom_prenom'];
        $this->users = $data['users'];
        $this->password = $data['password'];
        $this->type_compte = $data['type_compte'];
        $this->sex = $data['adresse'];
        $this->adresse = $data['nom'];
        $this->tel1 = $data['tel1'];
        $this->tel2 = $data['tel2'];
        $this->email = $data['email'];
        $this->matricule = $data['matricule'];
        $this->date_naissance = $data['date_naissance'];
        $this->n_piece = $data['n_piece'];
        $this->nationnalite = $data['nationnalite'];
        $this->situation_matrimoniale = $data['situation_matrimoniale'];
        $this->fonction = $data['fonction'];
        $this->details_fonction = $data['details_fonction'];
        $this->nombre_enfants = $data['nombre_enfants'];
        $this->permis_conduire = $data['permis_conduire'];
        $this->photo = $data['photo'];
        $this->connected = $data['connected'];
        $this->bloqued = $data['bloqued'];
        $this->valide_compte = $data['valide_compte'];
        $this->otp = $data['otp'];
        $this->date_connexion = $data['date_connexion'];
        $this->date_modif = $data['date_modif'];
        $this->ordinateur_modif = $data['ordinateur_modif'];
        $this->navigateur_modif = $data['navigateur_modif'];
        $this->ip_modif = $data['ip_modif'];
    }


    //||**********************************||
    //||------------ LECTURE -------------||
    //||**********************************||


    /**
     * Renvoi la liste des utilisateurs.
     *
     * @return array
     */
    static function getAll()
    {
        global $db;
        $req = $db->prepare("SELECT login.*, role_permission.libelle AS type_compte_reel
        FROM login
        LEFT JOIN role_permission ON login.type_compte = role_permission.id
        ORDER BY login.id");
        $req->execute([]);
        return $req->fetchAll();
    }

        /**
     * Renvoi la liste des utilisateurs.
     *
     * @return array
     */
    static function getAllByCompte($type_compte)
    {
        global $db;
        $req = $db->prepare("SELECT login.*, role_permission.libelle AS type_compte_reel
        FROM login
        LEFT JOIN role_permission ON login.type_compte = role_permission.id
        WHERE login.type_compte = ?");
        $req->execute([$type_compte]);
        return $req->fetchAll();
    }

    /**
     * Renvoi la liste des utilisateurs non bloqués.
     *
     * @return array
     */
    static function getAllBloquedFalse()
    {
        global $db;
        $req = $db->prepare("SELECT * FROM login WHERE bloqued = ? ORDER BY users");
        $req->execute([0]);
        return $req->fetchAll();
    }

        /**
     * Renvoi la liste des utilisateurs non bloqués.
     *
     * @return array
     */
    static function CompteAll($type_compte)
    {
        global $db;
        $req = $db->prepare("SELECT count(*) from login WHERE type_compte = ?");
        $req->execute([$type_compte]);
        return $req->fetch()[0];
    }

    /**
     * Renvoi la liste des utilisateurs bloqués.
     *
     * @return array
     */
    static function getAllBloquedTrue()
    {
        global $db;
        $req = $db->prepare("SELECT * FROM login WHERE bloqued = ? ORDER BY users");
        $req->execute([1]);
        return $req->fetchAll();
    }

    /**
     * Méthode pour récupérer un utilisateur en fonction de son email.
     *
     * @param $email
     * @return mixed
     */
    static function getByEmail($email)
    {
        global $db;
        $req = $db->prepare("SELECT * FROM login WHERE email = ?");
        $req->execute([$email]);
        return $req->fetch();
    }

    /**
     * Méthode pour récupérer un utilisateur en fonction de son ID.
     *
     * @param $id
     * @return mixed
     */
    static function getById($id)
    {
        global $db;
        $req = $db->prepare("SELECT login.*, role_permission.libelle AS type_compte_reel
        FROM login
        LEFT JOIN role_permission ON login.type_compte = role_permission.id
        WHERE login.id = ?");
        $req->execute([$id]);
        return $req->fetch();
    }

    /**
     * Méthode pour récupérer un utilisateur en fonction de son nom d'utilisateur.
     *
     * @param $users
     * @return mixed
     */
    static function getByUserName($users)
    {
        global $db;
        $req = $db->prepare("SELECT login.*, role_permission.libelle AS type_compte_reel
        FROM login
        LEFT JOIN role_permission ON login.type_compte = role_permission.id
        WHERE login.users = ?");
        $req->execute([$users]);
        return $req->fetch();
    }

    /**
     * Méthode pour verifier qu'un nom d'utilisateur n'existe pas déjà pour la modification.
     *
     * @param $users
     * @param $newusers
     * @return array
     */
    static function getByUserNameExiste($users, $newusers)
    {
        global $db;
        $req = $db->prepare("SELECT * FROM login WHERE users <> ? AND users = ?");
        $req->execute([$users, $newusers]);
        return $req->fetchAll();
    }

    /**
     * Méthode pour récupérer les utilisateurs connectés.
     *
     * @return array
     */
    static function getUserConnectedTrue()
    {
        global $db;
        $req = $db->prepare("SELECT * FROM login WHERE connected = ?");
        $req->execute([1]);
        return $req->fetchAll();
    }

    /**
     * Méthode pour récupérer les utilisateurs non connectés.
     *
     * @return array
     */
    static function getUserConnectedFalse()
    {
        global $db;
        $req = $db->prepare("SELECT * FROM login WHERE connected = ?");
        $req->execute([0]);
        return $req->fetchAll();
    }



    //||**********************************||
    //||----------- INSERTIONS -----------||
    //||**********************************||

    /**
     * Méthode pour insérer un utilisateur en base de données.
     * @param $nom
     * @param $type_salle
     * @param $capacite
     * @param $emplacement
     * @param $annee_academique
     * @param $ecole
     * @param $date_creation
     * @param $user_creation
     * @param $navigateur_creation
     * @param $ordinateur_creation
     * @param $ip_creation
     * @param $date_modif
     * @param $user_modif
     * @param $navigateur_modif
     * @param $ordinateur_modif
     * @param $ip_modif
     * @param $nom_prenom
     * @param $users
     * @param $password
     * @param $type_compte
     * @param $sex
     * @param $adresse
     * @param $tel1
     * @param $tel2
     * @param $email
     * @param $matricule
     * @param $date_naissance
     * @param $n_piece
     * @param $nationnalite
     * @param $situation_matrimoniale
     * @param $fonction
     * @param $details_fonction
     * @param $nombre_enfants
     * @param $permis_conduire
     * @param $photo
     * @param $connected
     * @param $bloqued
     * @param $valide_compte
     * @param $otp
     * @param $date_connexion
     * @param $date_modif
     * @param $ordinateur_modif
     * @param $navigateur_modif
     * @param $ip_modif

     * @return bool
     */
    static function Ajouter($nom_prenom, $users, $password, $type_compte, $sex, $adresse, $tel1, $tel2, $email, $matricule, $date_naissance, $n_piece, $nationnalite, $situation_matrimoniale, $fonction, $details_fonction, $nombre_enfants, $permis_conduire, $photo, $connected, $bloqued, $valide_compte, $otp, $date_connexion, $date_modif, $ordinateur_modif, $navigateur_modif, $ip_modif)
    {
        global $db;

        $req = $db->prepare("INSERT INTO login(nom_prenom, users, password, type_compte, sex, adresse, tel1, tel2, email, matricule, date_naissance, n_piece, nationnalite, situation_matrimoniale, fonction, details_fonction, nombre_enfants, permis_conduire, photo, connected, bloqued, valide_compte, otp, date_connexion, date_modif, ordinateur_modif, navigateur_modif, ip_modif) 
            VALUES( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        return $req->execute([$nom_prenom, $users, $password, $type_compte, $sex, $adresse, $tel1, $tel2, $email, $matricule, $date_naissance, $n_piece, $nationnalite, $situation_matrimoniale, $fonction, $details_fonction, $nombre_enfants, $permis_conduire, $photo, $connected, $bloqued, $valide_compte, $otp, $date_connexion, $date_modif, $ordinateur_modif, $navigateur_modif, $ip_modif]);
    }


    //***************************************************************************************************************** */

    //||**********************************||
    //||---------- MODIFICATIONS ---------||
    //||**********************************||
    /**
     * Méthode pour modifier un(e) login en base de données.
     *
     * @param $nom_prenom
     * @param $users
     * @param $type_compte
     * @param $sex
     * @param $adresse
     * @param $tel1
     * @param $tel2
     * @param $email
     * @param $matricule
     * @param $date_naissance
     * @param $n_piece
     * @param $nationnalite
     * @param $situation_matrimoniale
     * @param $fonction
     * @param $details_fonction
     * @param $nombre_enfants
     * @param $permis_conduire
     * @param $photo
     * @param $connected
     * @param $bloqued
     * @param $valide_compte
     * @param $otp
     * @param $date_connexion
     * @param $date_modif
     * @param $ordinateur_modif
     * @param $navigateur_modif
     * @param $ip_modif
     * @return bool
     */
    static function Modifier($nom_prenom, $sex, $adresse, $tel1, $tel2, $email, $matricule, $date_naissance, $n_piece, $nationnalite, $situation_matrimoniale, $fonction, $details_fonction, $nombre_enfants, $permis_conduire, $date_modif, $ordinateur_modif, $navigateur_modif, $ip_modif, $id)
    {
        global $db;
        $req = $db->prepare('
            UPDATE login SET nom_prenom = ?, sex = ?, adresse = ?, tel1 = ?, tel2 = ?, email = ?, matricule = ?, date_naissance = ?, n_piece = ?, nationnalite = ?, situation_matrimoniale = ?, fonction = ?, details_fonction = ?, nombre_enfants = ?, permis_conduire = ?, date_modif = ?, ordinateur_modif = ?, navigateur_modif = ?, ip_modif = ? WHERE id= ?
        ');
        return $req->execute([$nom_prenom, $sex, $adresse, $tel1, $tel2, $email, $matricule, $date_naissance, $n_piece, $nationnalite, $situation_matrimoniale, $fonction, $details_fonction, $nombre_enfants, $permis_conduire, $date_modif, $ordinateur_modif, $navigateur_modif, $ip_modif, $id]);
    }

    /**
     * Méthode pour modifier le mot de passe d'un utilisateur.
     *
     * @param $pwd
     * @param $date_connexion
     * @param $date_modif
     * @param $ordinateur_modif
     * @param $navigateur_modif
     * @param $ip_modif
     * @param $id
     * @return bool
     */
    static function Modifier_mdp($pwd, $date_modif, $ordinateur_modif, $navigateur_modif, $ip_modif, $id)
    {
        global $db;
        $req = $db->prepare('
            UPDATE login SET password = ?, date_modif = ?, ordinateur_modif = ?, navigateur_modif = ?, ip_modif = ? WHERE id = ?
        ');
        return $req->execute([$pwd, $date_modif, $ordinateur_modif, $navigateur_modif, $ip_modif, $id]);
    }

    /**
     * Méthode pour modifier un utilisateur sans le type de compte.
     *
     * @param $nom
     * @param $userName
     * @param $pwd
     * @param $email
     * @param $tel
     * @param $id
     * @return bool
     */
    static function update2($nom, $userName, $pwd, $email, $tel, $id)
    {
        global $db;
        $req = $db->prepare('
            UPDATE users SET nom = ?, username = ?, pwd = ?, email = ?, tel = ? WHERE id = ?
        ');
        return $req->execute([$nom, $userName, $pwd, $email, $tel, $id]);
    }

    /**
     * Méthode pour modifier un utilisateur sans le type de compte et le mot de passe.
     *
     * @param $nom
     * @param $userName
     * @param $email
     * @param $tel
     * @param $id
     * @return bool
     */
    static function update3($nom, $userName, $email, $tel, $id)
    {
        global $db;
        $req = $db->prepare('
            UPDATE users SET nom = ?, username = ?, email = ?, tel = ? WHERE id = ?
        ');
        return $req->execute([$nom, $userName, $email, $tel, $id]);
    }
    /**
     * Méthode pour deconnecté un utilisateur sans le type de compte et le mot de passe.
     *
     * @param $id
     * @return bool
     */
    static function disconnectUser($id)
    {
        global $db;
        $req = $db->prepare('
            UPDATE login SET connected = 0 WHERE id = ?
        ');
        return $req->execute([$id]);
    }


    //***************************************************************************************************************** */


    /**
     * Méthode pour modifier le statut de connexion à vrai (Connexion).
     *
     * @param $id
     * @return bool
     */
    static function updateStatusTrue($id)
    {
        global $db;

        $req = $db->prepare('UPDATE login SET connected = ?, date_connexion = ? WHERE id = ?');
        return $req->execute([1, date("Y-m-d H:i:s"), $id]);
    }

    /**
     * Méthode pour modifier le statut de connexion à faux (Déconnexion).
     *
     * @param $id
     * @return bool
     */
    static function updateStatusFalse($id)
    {
        global $db;
        $req = $db->prepare('UPDATE login SET connected = ?, date_connexion = ? WHERE id = ?');
        return $req->execute([1, date("Y-m-d H:i:s"), $id]);
    }

    /**
     * Méthode pour désactiver le compte d'un utilisateur.
     *
     * @param $id
     * @return bool
     */
    static function desableUser($id)
    {
        global $db;
        $req = $db->prepare('UPDATE login SET bloqued = ? WHERE id = ?');
        return $req->execute([1, $id]);
    }

    /**
     * Méthode pour activer le compte d'un utilisateur.
     *
     * @param $id
     * @return bool
     */
    static function activeUser($id)
    {
        global $db;
        $req = $db->prepare('UPDATE login SET bloqued = ? WHERE id = ?');
        return $req->execute([0, $id]);
    }

    /**
     * Méthode pour activer ou désactiver le compte d'un utilisateur.
     *
     * @param $id
     * @return bool
     */
    static function activeOrDesableUser($id)
    {
        global $db;
        $req = $db->prepare('UPDATE login SET bloqued = NOT bloqued WHERE id = ?');
        return $req->execute([$id]);
    }


    /**
     * Méthode pour modifier le statut de connexion à faux (Déconnexion).
     *
     * @param $id
     * @return bool
     */
    static function modifier_Type_Compte($type_compte, $id)
    {
        global $db;
        $req = $db->prepare('UPDATE login SET type_compte = ? WHERE id = ?');
        return $req->execute([$type_compte, $id]);
    }

    /**
     * Méthode pour supprimer un utilisateur.
     *
     * @param $id
     * @return bool
     */
    static function supprimer($id)
    {
        global $db;
        $req = $db->prepare('DELETE FROM login WHERE id = ?');
        return $req->execute([$id]);
    }

    // STATISTIQUES UTILISATEURS //

    /**
     * Méthode pour récupérer le nombre total d'utilisateurs.
     *
     * 
     * @return mixed
     */
    static function stats_Nbr_users()
    {
        global $db;
        $req = $db->prepare('SELECT COALESCE(COUNT(id), 0)FROM login');
        $req->execute();
        return $req->fetch();
    }

    /**
     * Méthode pour récupérer le nombre d'utilisateurs bloqué
     *
     * 
     * @return mixed
     */
    static function stats_users_bloqued()
    {
        global $db;
        $req = $db->prepare('SELECT COALESCE(COUNT(id),0) FROM login WHERE bloqued = ?');
        $req->execute([1]);
        return $req->fetch();
    }

    /**
     * Méthode pour récupérer le nombre d'utilisateurs en ligne (Connecté)
     *
     * 
     * @return mixed
     */
    static function stats_users_connected()
    {
        global $db;
        $req = $db->prepare('SELECT COALESCE(COUNT(id),0) FROM login WHERE connected = ?');
        $req->execute([1]);
        return $req->fetch();
    }

    /**
     * Méthode pour récupérer le nombre d'utilisateurs en ligne (Connecté)
     *
     * 
     * @return mixed
     */
    static function stats_users_disconnected()
    {
        global $db;
        $req = $db->prepare('SELECT COALESCE(COUNT(id),0) FROM login WHERE connected = ?');
        $req->execute([0]);
        return $req->fetch();
    }
}
