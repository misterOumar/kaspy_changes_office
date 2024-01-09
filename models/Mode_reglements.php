<?php
//||******************************************************||
//||----------------- Kaspy Web Framework ----------------||
//||--- kaspy corporation, We're developing the future ---||
//||             Version: V1.0 ; Année : 2022             ||
//||******************************************************||


/**
 * Class Groupe_matiere - Représente un groupe de matiere
 */

class mode_reglements
{
    public $id;
    public $nom;
    public $annee_academique;
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
     * groupe matiere constructor.
     *
     * @param $id
     */
    public function __construct($id)
    {
        global $db;
        $id = strSecur($id);

        $req = $db->prepare('SELECT * FROM mode_reglements WHERE id = ?');
        $req->execute([$id]);
        $data = $req->fetch();

        $this->id = $id;
        $this->nom = $data['nom'];
        $this->annee_academique = $data['annee_academique'];
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


        //||**********************************||
        //||------------ LECTURE -------------||
        //||**********************************||
    }

    /**
     * Renvoi la liste des mode_reglements.
     *
     * @return array
     */
    static function getAll()
    {
        global $db;
        $req = $db->prepare("SELECT * FROM mode_reglements ORDER BY id");
        $req->execute([]);
        return $req->fetchAll();
    }

    /**
     * Méthode pour récupérer un mode_reglements en fonction de son id.
     *
     * @param $id
     * @return mixed
     */
    static function getByID($id)
    {
        global $db;
        $req = $db->prepare("SELECT * FROM mode_reglements WHERE id = ?");
        $req->execute([$id]);
        return $req->fetch();
    }

    /**
     * Méthode de récupération du dernier element de la table mode_reglements.
     *
     * @return mixed
     */
    static function getLast()
    {
        global $db;
        $req = $db->prepare("SELECT * FROM mode_reglements  ORDER BY ID DESC LIMIT 1");
        $req->execute([]);
        return $req->fetch();
    }

    /**
     * Méthode de récupération du nombre d'enregistrement de la table mode_reglements.
     *
     * @param $
     * @return mixed
     */
    static function getCount()
    {
        global $db;
        $req = $db->prepare("SELECT COUNT(*) FROM mode_reglements ");
        $req->execute([]);
        return $req->fetch()[0];
    }

    /**
     * Méthode de récupération de mode_reglements en fonction du nom.
     *
     * @param $nom
     * @return mixed
     */
    static function getByNom($nom)
    {
        global $db;
        $req = $db->prepare("SELECT * FROM mode_reglements WHERE nom = ?");
        $req->execute([$nom]);
        return $req->fetch();
    }



    // VERIFICATIONS AVANT SUPPRESSIONS
    /**
     * Méthode de vérification si le mode_reglement est déja utilisé pour créer une dépense.
     *
     * @param $nom
     * @return mixed
     */
    static function getByDepensesByMode_regelementNom($nom)
    {
        global $db;
        $req = $db->prepare("SELECT * FROM depenses WHERE mode_reglement = ?");
        $req->execute([$nom]);
        return $req->fetch();
    }



    //||**********************************||
    //||------------ INSERTIONS ------------||
    //||**********************************||
    /**
     * Méthode pour insérer un mode_reglements en base de données.
     *
     * @param $id
     * @param $nom
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
     * @return bool
     */
    static function Ajouter($id, $nom, $annee_academique, $ecole, $date_creation, $user_creation, $navigateur_creation, $ordinateur_creation, $ip_creation, $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif)
    {
        global $db;

        $req = $db->prepare('
            INSERT INTO mode_reglements(id,nom, annee_academique, ecole, date_creation, user_creation, navigateur_creation, ordinateur_creation, ip_creation, date_modif, user_modif, navigateur_modif, ordinateur_modif, ip_modif) 
            VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)      
        ');
        return $req->execute([$id, $nom, $annee_academique, $ecole, $date_creation, $user_creation, $navigateur_creation, $ordinateur_creation, $ip_creation, $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif]);
    }

    //||**********************************||
    //||------------ MODIFICATIONS ------------||
    //||**********************************||
    /**
     * Méthode pour modifier un mode_reglements en base de données.
     *
     * @param $id
     * @param $nom
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
     * @return bool
     */
    static function Modifier($nom, $annee_academique, $ecole, $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif,$id)
    {
        global $db;
        $req = $db->prepare('
            UPDATE mode_reglements SET nom = ?, annee_academique = ?, ecole = ?, date_modif = ?, user_modif = ?, navigateur_modif = ?, ordinateur_modif = ?, ip_modif = ? WHERE id = ? 
                  
        ');
        return $req->execute([$nom, $annee_academique, $ecole, $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif,$id]);
    }

    //||**********************************||
    //||----------- SUPPRESSIONS ----------||
    //||**********************************||

    /**
     * Méthode pour supprimer un mode_reglements
     *
     * @param $id
     * @return bool
     */
    static function Supprimer($id)
    {
        global $db;
        $req = $db->prepare('DELETE FROM mode_reglements WHERE id= ?');
        return $req->execute([$id]);
    }
}
