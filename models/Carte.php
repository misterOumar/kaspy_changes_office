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
    public $status;
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
        $this->status = $data['status'];
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

    static function Carte_Nvendues()
    {
        global $db;
        $req = $db->prepare("SELECT * FROM cartes  WHERE status = 0 ");
        $req->execute([]);
        return $req->fetchAll();
    }

    static function Nb_carte()
    {
        global $db;
        $req = $db->prepare('SELECT  COUNT(*) FROM cartes');
        $req->execute();
        return $req->fetchColumn();
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
     * Méthode de récupération du nombre d'enregistrement vendu de la table cartes.
     *
     * @return mixed
     */
    static function getCountTypeCarte()
    {
        global $db;
        $req = $db->prepare("SELECT type_carte as libelle, COUNT(*) as nombre_total, SUM(CASE WHEN status = 1 THEN 1 ELSE 0 END) as nombre_vendu FROM cartes GROUP BY type_carte");
        $req->execute([]);
        return $req->fetchAll();
    }


    /**
     * Méthode de récupération du nombre d'enregistrement vendu de la table cartes.
     *
     * @return mixed
     */
    static function getCountVendu()
    {
        global $db;
        $req = $db->prepare("SELECT COUNT(*) FROM cartes WHERE status = 1");
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


    /**
     * Méthode de récupération des types de cartes unique.
     *
     * @param $cartes
     * @return mixed
     */
    static function getTypesCarte()
    {
        global $db;
        $req = $db->prepare("SELECT DISTINCT type_carte FROM cartes WHERE status = 0 ");
        $req->execute();
        return $req->fetchAll();
    }


    /**
     * Méthode de récupération des types de cartes unique en fonction du type de carte.
     *
     * @param $cartes
     * @return mixed
     */
    static function getByTypesCarte($type_carte)
    {
        global $db;
        $req = $db->prepare("SELECT DISTINCT customer_id  FROM cartes WHERE type_carte = ? AND status = 0 ");
        $req->execute([$type_carte]);
        return $req->fetchAll();
    }

    /**
     * Renvoi la liste des STOCKS DISPONIBLE.
     *
     * @return array
     */
    static function getStockDisponible()
    {
        global $db;
        $req = $db->prepare("SELECT type_carte, 
        COUNT(*) as entree,
        SUM(CASE WHEN status = 1 THEN 1 ELSE 0 END) as sortie,
        COUNT(*) - SUM(CASE WHEN status = 1 THEN 1 ELSE 0 END) as stock
        FROM cartes 
        GROUP BY type_carte 
        ORDER BY id
        ");
        $req->execute([]);
        return $req->fetchAll();
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
        $status,
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
            INSERT INTO cartes(customer_id,date_activation,date_expiration, type_carte , duree, status ,   date_creation,user_creation, navigateur_creation, ordinateur_creation, ip_creation, date_modif, user_modif, navigateur_modif, ordinateur_modif, ip_modif) 
            VALUES(?, ?,?,?,?,  ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)      
        ');
        return $req->execute([$customer_id, $date_activation, $date_expiration, $type_carte, $duree, $status, $date_creation, $user_creation, $navigateur_creation, $ordinateur_creation, $ip_creation, $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif]);
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
        $status,
        $date_modif,
        $user_modif,
        $navigateur_modif,
        $ordinateur_modif,
        $ip_modif,
        $id
    ) {
        global $db;
        $req = $db->prepare('
            UPDATE cartes SET   customer_id=?,date_activation=?,
            date_expiration=?,type_carte=? ,duree = ?, status = ? ,  date_modif = ?,
             user_modif = ?, navigateur_modif = ?,
              ordinateur_modif = ?,
               ip_modif = ? WHERE id= ?
        ');
        return $req->execute([$customer_id, $date_activation, $date_expiration, $type_carte, $duree, $status, $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif, $id]);
    }


    static function Carte_vendue(
        $customer_id,
        $date_modif,
        $user_modif,
        $navigateur_modif,
        $ordinateur_modif,
        $ip_modif,
    ) {
        global $db;
        $req = $db->prepare('
            UPDATE cartes SET   status = ? ,   date_modif = ?,
             user_modif = ?, navigateur_modif = ?,
              ordinateur_modif = ?,
               ip_modif = ? WHERE customer_id= ?
        ');
        return $req->execute([1, $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif, $customer_id]);
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
