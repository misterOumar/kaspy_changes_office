<?php
//||******************************************************||
//||----------------- Kaspy Web Framework ----------------||
//||--- kaspy corporation, We're developing the future ---||
//||             Version: V1.0 ; Année : 2022             ||
//||******************************************************||


/**
* Class inscriptions - Représente un(e) inscriptions
*/
class inscriptions
 {
   public $id;
   public $dates;
   public $matricule;
   public $etudiant;
   public $status;
   public $type_cours;
   public $filiere;
   public $niveau;
   public $classe;
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
     * inscriptions constructeur.
     *
     * @param $id
     */
    public function __construct($id)
    {
        global $db;
        $id = strSecur($id);

        $req = $db->prepare('SELECT * FROM inscriptions WHERE id = ?');
        $req->execute([$id]);
        $data = $req->fetch();

 $this->id = $id;
   $this->dates = $data['dates'];
   $this->matricule = $data['matricule'];
   $this->etudiant = $data['etudiant'];
   $this->status = $data['status'];
   $this->type_cours = $data['type_cours'];
   $this->filiere = $data['filiere'];
   $this->niveau = $data['niveau'];
   $this->classe = $data['classe'];
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
 } 


//||**********************************||
//||------------ LECTURE -------------||
//||**********************************||

        
    /**
     * Renvoi la liste des inscriptions.
     *
     * @return array
     */
    static function getAll()
    {
        global $db;
        $req = $db->prepare("SELECT * FROM inscriptions ORDER BY id");
        $req->execute([]);
        return $req->fetchAll();
    }

 /**
     * Méthode pour récupérer un(e) inscriptions en fonction de son id.
     *
     * @param $id
     * @return mixed
     */
    static function getByID($id)
    {
        global $db;
        $req = $db->prepare("SELECT * FROM inscriptions WHERE id = ?");
        $req->execute([$id]);
        return $req->fetch();
    }
        
        
    
        /**
     * Méthode de récupération du dernier element de la table inscriptions.
     *
     * @return mixed
     */
    static function getLast()
    {
        global $db;
        $req = $db->prepare("SELECT * FROM inscriptions  ORDER BY id DESC LIMIT 1");
        $req->execute([]);
        return $req->fetch();
    }


    /**
     * Méthode de récupération du nombre d'enregistrement de la table inscriptions.
     *
     * @return mixed
     */
    static function getCount()
    {
        global $db;
        $req = $db->prepare("SELECT COUNT(*) FROM inscriptions");
        $req->execute([]);
        return $req->fetch()[0];
    }
        
        
    /**
     * Méthode de récupération de inscriptions en fonction du dates.
     *
     * @param $dates
     * @return mixed
     */
    static function getByNom($dates)
    {
        global $db;
        $req = $db->prepare("SELECT * FROM inscriptions WHERE dates = ? ");
        $req->execute([$dates]);
        return $req->fetch();
    }

        


//||**********************************||
//||----------- INSERTIONS -----------||
//||**********************************||
   /**
     * Méthode pour insérer un(e) inscriptions en base de données.
     *
    * @param $dates
    * @param $matricule
    * @param $etudiant
    * @param $status
    * @param $type_cours
    * @param $filiere
    * @param $niveau
    * @param $classe
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
static function Ajouter($id, $dates, $matricule, $etudiant, $status, $type_cours, $filiere, $niveau, $classe, $annee_academique, $ecole, $date_creation, $user_creation, $navigateur_creation, $ordinateur_creation, $ip_creation, $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif)
    {
        global $db;

        $req = $db->prepare('
            INSERT INTO inscriptions(id, dates, matricule, etudiant, status, type_cours, filiere, niveau, classe, annee_academique, ecole, date_creation, user_creation, navigateur_creation, ordinateur_creation, ip_creation, date_modif, user_modif, navigateur_modif, ordinateur_modif, ip_modif) 
            VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)      
        ');
        return $req->execute([$id, $dates, $matricule, $etudiant, $status, $type_cours, $filiere, $niveau, $classe, $annee_academique, $ecole, $date_creation, $user_creation, $navigateur_creation, $ordinateur_creation, $ip_creation, $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif]);
    }


//||**********************************||
//||---------- MODIFICATIONS ---------||
//||**********************************||
/**
     * Méthode pour modifier un(e) inscriptions en base de données.
     *
    * @param $dates
    * @param $matricule
    * @param $etudiant
    * @param $status
    * @param $type_cours
    * @param $filiere
    * @param $niveau
    * @param $classe
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
static function Modifier($id, $dates, $matricule, $etudiant, $status, $type_cours, $filiere, $niveau, $classe, $annee_academique, $ecole, $date_creation, $user_creation, $navigateur_creation, $ordinateur_creation, $ip_creation, $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif)
    {
        global $db;
        $req = $db->prepare('
            UPDATE inscriptions SET id = ?, dates = ?, matricule = ?, etudiant = ?, status = ?, type_cours = ?, filiere = ?, niveau = ?, classe = ?, annee_academique = ?, ecole = ?, date_creation = ?, user_creation = ?, navigateur_creation = ?, ordinateur_creation = ?, ip_creation = ?, date_modif = ?, user_modif = ?, navigateur_modif = ?, ordinateur_modif = ?, ip_modif WHERE id= ?
        ');
        return $req->execute([$id, $dates, $matricule, $etudiant, $status, $type_cours, $filiere, $niveau, $classe, $annee_academique, $ecole, $date_creation, $user_creation, $navigateur_creation, $ordinateur_creation, $ip_creation, $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif]);
    }


//||**********************************||
//||----------- SUPPRESSIONS ---------||
//||**********************************||

    /**
     * Méthode pour supprimer un(e) inscriptions
     *
     * @param $id
     * @return bool
     */
    static function Supprimer($id)
    {
        global $db;

        $req = $db->prepare('DELETE FROM inscriptions WHERE id= ?');
        return $req->execute([$id]);
    }
 }
