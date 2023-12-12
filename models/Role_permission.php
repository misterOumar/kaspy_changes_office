<?php
//||******************************************************||
//||----------------- Kaspy Web Framework ----------------||
//||--- kaspy corporation, We're developing the future ---||
//||             Version: V1.0 ; Année : 2022             ||
//||******************************************************||


/**
 * Class role_permission - Représente un(e) role_permission
 */
class role_permission
{
    public $id;
    public $libelle;

    public $ascenseur;
    public $proprietaire;
    public $cout_construction;
    public $date_creation;
    public $user_creation;
    public $navigateur_creation;
    public $ordinateur_creation;
    public $ip_creation;
    public $date_modif;
    public $user_modif;
    public $navigateur_modif;
    public $ordinateur_modif;
    public $ip_modif;

    /**
     * batiments constructor.
     *
     * @param $id
     */
    public function __construct($id)
    {
        global $db;
        $id = strSecur($id);

        $req = $db->prepare('SELECT * FROM role_permission WHERE id = ?');
        $req->execute([$id]);
        $data = $req->fetch();

        $this->id = $id;
        $this->libelle = $data['libelle'];
        
        $this->date_creation = $data['date_creation'];
        $this->user_creation = $data['user_creation'];
        $this->navigateur_creation = $data['navigateur_creation'];
        $this->ordinateur_creation = $data['ordinateur_creation'];
        $this->ip_creation = $data['ip_creation'];
        $this->date_modif = $data['date_modif'];
        $this->user_modif = $data['user_modif'];
        $this->navigateur_modif = $data['navigateur_modif'];
        $this->ordinateur_modif = $data['ordinateur_modif'];
        $this->ip_modif = $data['ip_modif'];


        //||**********************************||
        //||------------ LECTURE -------------||
        //||**********************************||
    }

    /**
     * Renvoi la liste des role_permission.
     *
     * @return array
     */
    static function getAll()
    {
        global $db; 
        $req = $db->prepare("SELECT * FROM role_permission");
        $req->execute([]);
        return $req->fetchAll();
    }


    /**
     * Méthode pour récupérer un(e) role_permission en fonction de son id.
     *
     * @param $id
     * @return mixed
     */
    static function getByID($id)
    {
        global $db;
        $req = $db->prepare("SELECT * FROM role_permission WHERE id = ?");
        $req->execute([$id]);
        return $req->fetch();
    }


    /**
     * Méthode de récupération du dernier element de la table role_permission.
     *
     * @return mixed
     */
    static function getLast()
    {
        global $db;
        $req = $db->prepare("SELECT * FROM role_permission  ORDER BY ID DESC LIMIT 1");
        $req->execute([]);
        return $req->fetch();
    }

        /**
     * Méthode de récupération du dernier element de la table role_permission.
     *
     * @return mixed
     */
    static function getLastRole()
    {
        global $db;
        $req = $db->prepare("SELECT id FROM role_permission  ORDER BY ID DESC LIMIT 1");
        $req->execute([]);
        return $req->fetch()['id'];
    }

        /**
     * Méthode de récupération de role_permission en fonction du libelle.
     *
     * @param $libelle
     * @return mixed
     */
    static function getByNom($libelle)
    {
        global $db;
        $req = $db->prepare("SELECT * FROM role_permission WHERE libelle = ?");
        $req->execute([$libelle]);
        return $req->fetch();
    }

    /**
     * Méthode de récupération du nombre d'enregistrement de la table role_permission.
     *
     * @param $
     * @return mixed
     */
    static function getCount()
    {
        global $db;
        $req = $db->prepare("SELECT COUNT(*) FROM role_permission ");
        $req->execute([]);
        return $req->fetch()[0];
    }


    //||**********************************||
    //||------------ INSERTIONS ------------||
    //||**********************************||
    /**
     * Méthode pour insérer un(e) batiments en base de données.
     *
     * @param $libelle
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
     * @return bool
     */
    static function Ajouter($id, $libelle, $date_creation, $user_creation, $navigateur_creation, $ordinateur_creation, $ip_creation, $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif)
    {
        global $db;

        $req = $db->prepare('
            INSERT INTO role_permission(id, libelle, date_creation, user_creation, navigateur_creation, ordinateur_creation, ip_creation, date_modif, user_modif, navigateur_modif, ordinateur_modif, ip_modif) 
            VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)      
        ');
        return $req->execute([$id, $libelle, $date_creation, $user_creation, $navigateur_creation, $ordinateur_creation, $ip_creation, $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif]);
    }


    //||**********************************||
    //||---------- MODIFICATIONS ----------||
    //||**********************************||
    /**
     * Méthode pour modifier un(e) batiments en base de données.
     *
     * @param $libelle
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
     * @return bool
     */
    static function Modifier($libelle, $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif, $id)
    {
        global $db;
        $req = $db->prepare('
            UPDATE role_permission SET libelle = ?, date_modif = ?, user_modif = ?, navigateur_modif = ?, ordinateur_modif = ?, ip_modif = ? WHERE id= ?
        ');
        return $req->execute([$libelle, $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif, $id]);
    }


    //||**********************************||
    //||----------- SUPPRESSIONS ----------||
    //||**********************************||

    /**
     * Méthode pour supprimer un(e) batiments
     *
     * @param $id
     * @return bool
     */
    static function Supprimer($id)
    {
        global $db;
        $req = $db->prepare('DELETE FROM role_permission WHERE id= ?');
        return $req->execute([$id]);
    }
}
