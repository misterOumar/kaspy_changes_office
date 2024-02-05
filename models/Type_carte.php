<?php
//||******************************************************||
//||----------------- Kaspy Web Framework ----------------||
//||--- kaspy corporation, We're developing the future ---||
//||             Version: V1.0 ; Année : 2022             ||
//||******************************************************||


/**
 * Class type_carte - Représente un(e) type_carte
 */

class type_carte
{
    public $id;
    public $libelle;
    public $duree;
    public $prix_achat;
    public $prix_vente_detail;
    public $prix_vente_gros;
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
     * type_carte constructor.
     *
     * @param $id
     */
    public function __construct($id)
    {
        global $db;
        $id = strSecur($id);

        $req = $db->prepare('SELECT * FROM type_carte WHERE id = ?');
        $req->execute([$id]);
        $data = $req->fetch();

        $this->id = $id;
        $this->libelle = $data['libelle'];
        $this->duree = $data['duree'];
        $this->prix_vente_detail = $data['prix_vente_detail'];

        $this->prix_achat = $data['prix_achat'];
        $this->prix_vente_gros = $data['prix_vente_gros'];

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
     * Renvoi la liste des type_carte.
     *
     * @return array
     */
    static function getAll()
    {
        global $db;
        $req = $db->prepare("SELECT * FROM type_carte ORDER BY id");
        $req->execute([]);
        return $req->fetchAll();
    }

    /**
     * Méthode pour récupérer un type_carte en fonction de son id.
     *
     * @param $id
     * @return mixed
     */
    static function getByID($id)
    {
        global $db;
        $req = $db->prepare("SELECT * FROM type_carte WHERE id = ?");
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
        $req = $db->prepare("SELECT libelle FROM type_carte WHERE id = ?");
        $req->execute([$id]);
        return $req->fetch()[0];
    }

    /**
     * Méthode de récupération du dernier element de la table type_carte.
     *
     * @return mixed
     */
    static function getLast()
    {
        global $db;
        $req = $db->prepare("SELECT * FROM type_carte ORDER BY id DESC LIMIT 1");
        $req->execute([]);
        return $req->fetch();
    }

    /**
     * Méthode de récupération du libellebre d'enregistrement de la table type_carte.
     *
     * @param $
     * @return mixed
     */
    static function getCount()
    {
        global $db;
        $req = $db->prepare("SELECT COUNT(*) FROM type_carte ");
        $req->execute([]);
        return $req->fetch()[0];
    }

    /**
     * Méthode de récupération de type_carte en fonction du libelle.
     *
     * @param $libelle
     * @return mixed
     */
    static function getByNom($libelle)
    {
        global $db;
        $req = $db->prepare("SELECT * FROM type_carte WHERE libelle = ?");
        $req->execute([$libelle]);
        return $req->fetch();
    }

    //||**********************************||
    //||------------ INSERTIONS ------------||
    //||**********************************||
    /**
     * Méthode pour insérer un type_carte en base de données.
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
    static function Ajouter($libelle,$duree,$prix_achat,$prix_vente_detail,$prix_vente_gros, $date_creation, $user_creation, $navigateur_creation, $ordinateur_creation, $ip_creation, $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif)
    {    global $db;
        $req = $db->prepare('
            INSERT INTO type_carte(libelle,duree,prix_achat,prix_vente_detail, prix_vente_gros, date_creation,user_creation, navigateur_creation, ordinateur_creation, ip_creation, date_modif, user_modif, navigateur_modif, ordinateur_modif, ip_modif) 
            VALUES(?,?,?, ?,?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?)      
        ');
        return $req->execute([$libelle,$duree,$prix_achat,$prix_vente_detail,$prix_vente_gros,  $date_creation, $user_creation, $navigateur_creation, $ordinateur_creation, $ip_creation, $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif]);
    }

    //||**********************************||
    //||------------ MODIFICATIONS ------------||
    //||**********************************||
    /**
     * Méthode pour modifier un type_carte en base de données.
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
    static function Modifier($libelle, $duree,$prix_achat, $prix_vente_detail, $prix_vente_gros, $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif, $id)
    {
        global $db;
        $req = $db->prepare('
            UPDATE type_carte SET libelle = ?, duree = ?,  prix_achat= ?,prix_vente_detail = ?, prix_vente_gros = ?, date_modif = ?, user_modif = ?, navigateur_modif = ?, ordinateur_modif = ?, ip_modif = ? WHERE id= ?
        ');
        return $req->execute([$libelle,$duree, $prix_achat, $prix_vente_detail, $prix_vente_gros, $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif, $id]);
    }

    //||**********************************||
    //||----------- SUPPRESSIONS ----------||
    //||**********************************||

    /**
     * Méthode pour supprimer un type_carte
     *
     * @param $id
     * @return bool
     */
    static function Supprimer($id)
    {
        global $db;
        $req = $db->prepare('DELETE FROM type_carte WHERE id= ?');
        return $req->execute([$id]);
    }
}