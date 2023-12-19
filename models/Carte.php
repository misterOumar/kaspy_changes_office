<?php
//||******************************************************||
//||----------------- Kaspy Web Framework ----------------||
//||--- kaspy corporation, We're developing the future ---||
//||             Version: V1.0 ; Année : 2022             ||
//||******************************************************||


/**
 * Class cartes - Représente un(e) cartes
 */
class cartes
{
    public $id;
    public $customer_id;
    public $date_activation;
    public $date_expiration;
    public $type_carte;
    public $duree;
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
     * cartes constructor.
     *
     * @param $id
     */
    public function __construct($id)
    {
        global $db;
        $id = strSecur($id);
        $req = $db->prepare('SELECT * FROM cartes WHERE id = ?');
        $req->execute([$id]);
        $data = $req->fetch();
        $this->id = $id;
        $this->customer_id = $data['customer_id'];
        $this->date_activation = $data['date_activation'];
        $this->date_expiration = $data['date_expiration'];
        $this->type_carte = $data['type_carte'];
        $this->duree = $data['duree'];
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
    }


    //||**********************************||
    //||------------ LECTURE -------------||
    //||**********************************||


    // static function getAll()
    // {
    //     global $db;
    //     $req = $db->prepare("SELECT cartes.*,
    //     type_carte.libelle AS type_carte, 
    //     FROM cartes
    //     LEFT JOIN type_carte ON cartes.type_carte = type_carte.id               
    //     ORDER BY cartes.id ");
    //     $req->execute([]);
    //     return $req->fetchAll();
    // }

    static function getAll()
    {
        global $db;
        $req = $db->prepare("SELECT * FROM cartes ORDER BY id");
        $req->execute([]);
        return $req->fetchAll();
    }


    /**
     * Méthode pour récupérer un(e) cartes en fonction de son id.
     *
     * @param $id
     * @return mixed
     */

    // static function getAllByID($id)
    // {
    //     global $db;
    //     $req = $db->prepare("SELECT cartes.*,
    //     type_carte.libelle AS type_carte,
    //     FROM cartes
    //     LEFT JOIN type_carte ON cartes.type_carte = type_carte.id
    //     WHERE cartes.id = ?");
    //     $req->execute([$id]);
    //     return $req->fetch();
    // }
    static function getByID($id)
    {
        global $db;
        $req = $db->prepare("SELECT * FROM cartes WHERE id = ?");
        $req->execute([$id]);
        return $req->fetch();
    }
    /**
     * Méthode pour récupérer un(e) cartes en fonction du type de carte.
     *
     * @param $id
     * @return mixed
     */

    static function getAllByType($type_carte)
    {
        global $db;
        $req = $db->prepare("SELECT cartes.*,
        type_carte.libelle AS type_carte,    
        FROM cartes
        LEFT JOIN type_carte ON cartes.type_carte = type_carte.id
        WHERE cartes.type_carte = ?");
        $req->execute([$type_carte]);
        return $req->fetch();
    }

    /**
     * Méthode de récupération du dernier element de la table cartes.
     *
     * @return mixed
     */
    static function getLast()
    {
        global $db;
        $req = $db->prepare("SELECT * FROM cartes  ORDER BY id DESC LIMIT 1");
        $req->execute([]);
        return $req->fetch();
    }


    /**
     * Méthode de récupération du nombre d'enregistrement de la table cartes.
     *
     * @return mixed
     */
    static function getCount()
    {
        global $db;
        $req = $db->prepare("SELECT COUNT(*) FROM cartes");
        $req->execute([]);
        return $req->fetch()[0];
    }


    /**
     * Méthode de récupération de cartes en fonction du cartes.
     *
     * @param $cartes
     * @return mixed
     */
    static function getByNum($customer_id)
    {
        global $db;
        $req = $db->prepare("SELECT * FROM cartes WHERE customer_id= ? ");
        $req->execute([$customer_id]);
        return $req->fetch();
    }


    //||**********************************||
    //||----------- INSERTIONS -----------||
    //||**********************************||
    /**
     * Méthode pour insérer un(e) cartes en base de données.
     *
     * @param $cartes
     * @param $date_debut
     * @param $date_fin
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
     * @return bool
     */
    static function Ajouter(
        $customer_id,
        $date_activation,
        $date_expiration,
        $type_carte,
        $duree,
        $date_creation,
        $user_creation,
        $navigateur_creation,
        $ordinateur_creation,
        $ip_creation,
        $date_modif,
        $user_modif,
        $navigateur_modif,
        $ordinateur_modif,
        $ip_modif
    ) {
        global $db;
        $req = $db->prepare('
            INSERT INTO cartes(customer_id,date_activation,date_expiration, type_carte , duree,  date_creation,user_creation, navigateur_creation, ordinateur_creation, ip_creation, date_modif, user_modif, navigateur_modif, ordinateur_modif, ip_modif) 
            VALUES(?, ?,?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)      
        ');
        return $req->execute([$customer_id, $date_activation, $date_expiration, $type_carte, $duree, $date_creation, $user_creation, $navigateur_creation, $ordinateur_creation, $ip_creation, $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif]);
    }


    //||**********************************||
    //||---------- MODIFICATIONS ---------||
    //||**********************************||
    /**
     * Méthode pour modifier un(e) cartes en base de données.
     *
     * @param $cartes
     * @param $date_debut
     * @param $date_fin
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
     * @return bool
     */


    static function Modifier(
        $customer_id,
        $date_activation,
        $date_expiration,
        $type_carte,
        $duree,
        $date_modif,
        $user_modif,
        $navigateur_modif,
        $ordinateur_modif,
        $ip_modif,
        $id
    ) {
        global $db;
        $req = $db->prepare('
            UPDATE cartes SET cartes = ?,  customer_id=?,date_activation=?,
            date_expiration=?,type_carte=? ,duree = ?, date_modif = ?,
             user_modif = ?, navigateur_modif = ?,
              ordinateur_modif = ?,
               ip_modif = ? WHERE id= ?
        ');
        return $req->execute([$customer_id, $date_activation, $date_expiration, $type_carte, $duree,   $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif, $id]);
    }


    //||**********************************||
    //||----------- SUPPRESSIONS ---------||
    //||**********************************||

    /**
     * Méthode pour supprimer un(e) cartes
     *
     * @param $id
     * @return bool
     */
    static function Supprimer($id)
    {
        global $db;
        $req = $db->prepare('DELETE FROM cartes WHERE id= ?');
        return $req->execute([$id]);
    }
}