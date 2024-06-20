<?php
//||******************************************************||
//||----------------- Kaspy Web Framework ----------------||
//||--- kaspy corporation, We're developing the future ---||
//||             Version: V1.0 ; Année : 2022             ||
//||******************************************************||


/**
 * Class Devise - Représente un(e) devise
 */

class devise
{
    public $id;
    public $libelle;
    public $symbole;
    public $type;
    public $taux_achat;
    public $taux_vente;
    public $pays;
    public $magasin;
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
     * devise constructor.
     *
     * @param $id
     */
    public function __construct($id)
    {
        global $db;
        $id = strSecur($id);

        $req = $db->prepare('SELECT * FROM devises WHERE id = ?');
        $req->execute([$id]);
        $data = $req->fetch();

        $this->id = $id;
        $this->libelle = $data['libelle'];
        $this->symbole = $data['symbole'];
        $this->type = $data['type'];
        $this->taux_achat = $data['taux_achat'];
        $this->taux_vente = $data['taux_vente'];
        $this->pays = $data['pays'];
        $this->magasin = $data['magasin'];


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
     * Renvoi la liste des devises.
     *
     * @return array
     */
    static function getAll()
    {
        global $db;
        $req = $db->prepare("SELECT * FROM devises ORDER BY id");
        $req->execute([]);
        return $req->fetchAll();
    }
    
    /**
     * Renvoi la liste des devises.
     *
     * @return array
     */
    static function getAllEtrangere()
    {
        global $db;
        $req = $db->prepare("SELECT * FROM devises WHERE type = étrangère ");
        $req->execute([]);
        return $req->fetchAll();
    }

    /**
     * Méthode pour récupérer un devise en fonction de son id.
     *
     * @param $id
     * @return mixed
     */
    static function getByID($id)
    {
        global $db;
        $req = $db->prepare("SELECT * FROM devises WHERE id = ?");
        $req->execute([$id]);
        return $req->fetch();
    }

        /**
     * Méthode pour récupérer un libelle en fonction de son id.
     *
     * @param $id
     * @return mixed
     */
    static function getLibelleByID($id)
    {
        global $db;
        $req = $db->prepare("SELECT libelle FROM devises WHERE id = ?");
        $req->execute([$id]);
        return $req->fetch()[0];
    }

    /**
     * Méthode de récupération du dernier element de la table devises.
     *
     * @return mixed
     */
    static function getLast()
    {
        global $db;
        $req = $db->prepare("SELECT * FROM devises ORDER BY id DESC LIMIT 1");
        $req->execute([]);
        return $req->fetch();
    }

    /**
     * Méthode de récupération du libellebre d'enregistrement de la table devises.
     *
     * @param $
     * @return mixed
     */
    static function getCount()
    {
        global $db;
        $req = $db->prepare("SELECT COUNT(*) FROM devises ");
        $req->execute([]);
        return $req->fetch()[0];
    }

    /**
     * Méthode de récupération de devises en fonction du libelle.
     *
     * @param $libelle
     * @return mixed
     */
    static function getByNom($libelle)
    {
        global $db;
        $req = $db->prepare("SELECT * FROM devises WHERE libelle = ?");
        $req->execute([$libelle]);
        return $req->fetch();
    }

    /**
     * Méthode de récupération de devises en fonction du type.
     *
     * @param $type
     * @return mixed
     */
    static function getByType($type)
    {
        global $db;
        $req = $db->prepare("SELECT * FROM devises WHERE type = ?");
        $req->execute([$type]);
        return $req->fetch();
    }

    //||**********************************||
    //||------------ INSERTIONS ------------||
    //||**********************************||
    /**
     * Méthode pour insérer un devises en base de données.
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
    static function Ajouter($libelle,$symbole, $type, $taux_achat,$taux_vente,$pays,$magasin, $date_creation, $user_creation, $navigateur_creation, $ordinateur_creation, $ip_creation, $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif)
    {    global $db;
        $req = $db->prepare('
            INSERT INTO devises(libelle,symbole, type, taux_achat,taux_vente, pays,magasin, date_creation,user_creation, navigateur_creation, ordinateur_creation, ip_creation, date_modif, user_modif, navigateur_modif, ordinateur_modif, ip_modif) 
            VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)      
        ');
        return $req->execute([$libelle,$symbole, $type, $taux_achat,$taux_vente,$pays,$magasin,  $date_creation, $user_creation, $navigateur_creation, $ordinateur_creation, $ip_creation, $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif]);
    }

    //||**********************************||
    //||------------ MODIFICATIONS ------------||
    //||**********************************||
    /**
     * Méthode pour modifier une devises en base de données.
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
    static function Modifier($libelle, $symbole, $type, $taux_achat, $taux_vente, $pays, $magasin, $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif, $id)
    {
        global $db;
        $req = $db->prepare('
            UPDATE devises SET libelle = ?, symbole = ?, type = ?, taux_achat = ?, taux_vente = ?, pays = ?, magasin = ?, date_modif = ?, user_modif = ?, navigateur_modif = ?, ordinateur_modif = ?, ip_modif = ? WHERE id = ?
        ');
        return $req->execute([$libelle, $symbole, $type, $taux_achat, $taux_vente, $pays,$magasin, $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif, $id]);
    }

    //||**********************************||
    //||----------- SUPPRESSIONS ----------||
    //||**********************************||

    /**
     * Méthode pour supprimer un devises
     *
     * @param $id
     * @return bool
     */
    static function Supprimer($id)
    {
        global $db;
        $req = $db->prepare('DELETE FROM devises WHERE id= ?');
        return $req->execute([$id]);
    }
}