<?php
//||******************************************************||
//||----------------- Kaspy Web Framework ----------------||
//||--- kaspy corporation, We're developing the future ---||
//||             Version: V1.0 ; Année : 2022             ||
//||******************************************************||


/**
 * Class annees - Représente un(e) annees
 */
class annees
{
    public $id;
    public $annees;
    public $date_debut;
    public $date_fin;
    public $ecole;
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
     * annees constructor.
     *
     * @param $id
     */
    public function __construct($id)
    {
        global $db;
        $id = strSecur($id);

        $req = $db->prepare('SELECT * FROM annees WHERE id = ?');
        $req->execute([$id]);
        $data = $req->fetch();

        $this->id = $id;
        $this->annees = $data['annees'];
        $this->date_debut = $data['date_debut'];
        $this->date_fin = $data['date_fin'];
        $this->ecole = $data['ecole'];
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

    /**
     * Renvoi la liste des annees.
     *
     * @return array
     */
    static function getAll()
    {
        global $db;
        $req = $db->prepare("SELECT * FROM annees ORDER BY id");
        $req->execute([]);
        return $req->fetchAll();
    }
    /**
     * Méthode pour récupérer un(e) annees en fonction de son id.
     *
     * @param $id
     * @return mixed
     */
    static function getByID($id)
    {
        global $db;
        $req = $db->prepare("SELECT * FROM annees WHERE id = ?");
        $req->execute([$id]);
        return $req->fetch();
    }
        
    
        /**
     * Méthode de récupération du dernier element de la table annees.
     *
     * @return mixed
     */
    static function getLast()
    {
        global $db;
        $req = $db->prepare("SELECT * FROM annees  ORDER BY id DESC LIMIT 1");
        $req->execute([]);
        return $req->fetch();
    }


    /**
     * Méthode de récupération du nombre d'enregistrement de la table annees.
     *
     * @return mixed
     */
    static function getCount()
    {
        global $db;
        $req = $db->prepare("SELECT COUNT(*) FROM annees");
        $req->execute([]);
        return $req->fetch()[0];
    }
        
        
    /**
     * Méthode de récupération de annees en fonction du annees.
     *
     * @param $annees
     * @return mixed
     */
    static function getByNom($annees)
    {
        global $db;
        $req = $db->prepare("SELECT * FROM annees WHERE annees = ? ");
        $req->execute([$annees]);
        return $req->fetch();
    }


    //||**********************************||
    //||----------- INSERTIONS -----------||
    //||**********************************||
    /**
     * Méthode pour insérer un(e) annees en base de données.
     *
     * @param $annees
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
    static function Ajouter($id, $annees, $date_debut, $date_fin, $ecole, $date_creation, $user_creation, $navigateur_creation, $ordinateur_creation, $ip_creation, $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif)
    {
        global $db;

        $req = $db->prepare('
            INSERT INTO annees(id, annees, date_debut, date_fin, ecole, date_creation, user_creation, navigateur_creation, ordinateur_creation, ip_creation, date_modif, user_modif, navigateur_modif, ordinateur_modif, ip_modif) 
            VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)      
        ');
        return $req->execute([$id, $annees, $date_debut, $date_fin, $ecole, $date_creation, $user_creation, $navigateur_creation, $ordinateur_creation, $ip_creation, $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif]);
    }


    //||**********************************||
    //||---------- MODIFICATIONS ---------||
    //||**********************************||
    /**
     * Méthode pour modifier un(e) annees en base de données.
     *
     * @param $annees
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
    static function Modifier($annees, $date_debut, $date_fin, $ecole, $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif, $id)
    {
        global $db;
        $req = $db->prepare('
            UPDATE annees SET annees = ?, date_debut = ?, date_fin = ?, ecole = ?, date_modif = ?, user_modif = ?, navigateur_modif = ?, ordinateur_modif = ?, ip_modif = ? WHERE id= ?
        ');
        return $req->execute([$annees, $date_debut, $date_fin, $ecole, $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif, $id]);
    }


    //||**********************************||
    //||----------- SUPPRESSIONS ---------||
    //||**********************************||

    /**
     * Méthode pour supprimer un(e) annees
     *
     * @param $id
     * @return bool
     */
    static function Supprimer($id)
    {
        global $db;

        $req = $db->prepare('DELETE FROM annees WHERE id= ?');
        return $req->execute([$id]);
    }
}
