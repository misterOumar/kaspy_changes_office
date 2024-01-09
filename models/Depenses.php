<?php
//||******************************************************||
//||----------------- Kaspy Web Framework ----------------||
//||--- kaspy corporation, We're developing the future ---||
//||             Version: V1.0 ; Année : 2022             ||
//||******************************************************||


/**
 * Class depenses - Représente un(e) depenses
 */
class depenses
{
    public $id;
    public $dates;
    public $n_piece;
    public $nature_depense;
    public $designation;
    public $fournisseur;
    public $montant;
    public $mode_reglement;
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
     * depenses constructeur.
     *
     * @param $id
     */
    public function __construct($id)
    {
        global $db;
        $id = strSecur($id);

        $req = $db->prepare('SELECT * FROM depenses WHERE id = ?');
        $req->execute([$id]);
        $data = $req->fetch();

        $this->id = $id;
        $this->dates = $data['dates'];
        $this->n_piece = $data['n_piece'];
        $this->nature_depense = $data['nature_depense'];
        $this->designation = $data['designation'];
        $this->fournisseur = $data['fournisseur'];
        $this->montant = $data['montant'];
        $this->mode_reglement = $data['mode_reglement'];
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
     * Renvoi la liste des depenses.
     *
     * @return array
     */
    static function getAll()
    {
        global $db;
        $req = $db->prepare("SELECT * FROM depenses ORDER BY id");
        $req->execute([]);
        return $req->fetchAll();
    }

    /**
     * Méthode pour récupérer un(e) depenses en fonction de son id.
     *
     * @param $id
     * @return mixed
     */
    static function getByID($id)
    {
        global $db;
        $req = $db->prepare("SELECT * FROM depenses WHERE id = ?");
        $req->execute([$id]);
        return $req->fetch();
    }



    /**
     * Méthode de récupération du dernier element de la table depenses.
     *
     * @return mixed
     */
    static function getLast()
    {
        global $db;
        $req = $db->prepare("SELECT * FROM depenses  ORDER BY id DESC LIMIT 1");
        $req->execute([]);
        return $req->fetch();
    }


    /**
     * Méthode de récupération du nombre d'enregistrement de la table depenses.
     *
     * @return mixed
     */
    static function getCount()
    {
        global $db;
        $req = $db->prepare("SELECT COUNT(*) FROM depenses");
        $req->execute([]);
        return $req->fetch()[0];
    }


    /**
     * Méthode de récupération de depenses en fonction du dates.
     *
     * @param $dates
     * @return mixed
     */
    static function getByNom($n_piece)
    {
        global $db;
        $req = $db->prepare("SELECT * FROM depenses WHERE n_piece = ? ");
        $req->execute([$n_piece]);
        return $req->fetch();
    }




    //||**********************************||
    //||----------- INSERTIONS -----------||
    //||**********************************||
    /**
     * Méthode pour insérer un(e) depenses en base de données.
     *
     * @param $dates
     * @param $n_piece
     * @param $nature_depense
     * @param $designation
     * @param $fournisseur
     * @param $montant
     * @param $mode_reglement
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
    static function Ajouter($id, $dates, $n_piece, $nature_depense, $designation, $fournisseur, $montant, $mode_reglement, $annee_academique, $ecole, $date_creation, $user_creation, $navigateur_creation, $ordinateur_creation, $ip_creation, $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif)
    {
        global $db;

        $req = $db->prepare('
            INSERT INTO depenses(id, dates, n_piece, nature_depense, designation, fournisseur, montant, mode_reglement, annee_academique, ecole, date_creation, user_creation, navigateur_creation, ordinateur_creation, ip_creation, date_modif, user_modif, navigateur_modif, ordinateur_modif, ip_modif) 
            VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)      
        ');
        return $req->execute([$id, $dates, $n_piece, $nature_depense, $designation, $fournisseur, $montant, $mode_reglement, $annee_academique, $ecole, $date_creation, $user_creation, $navigateur_creation, $ordinateur_creation, $ip_creation, $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif]);
    }


    //||**********************************||
    //||---------- MODIFICATIONS ---------||
    //||**********************************||
    /**
     * Méthode pour modifier un(e) depenses en base de données.
     *
     * @param $dates
     * @param $n_piece
     * @param $nature_depense
     * @param $designation
     * @param $fournisseur
     * @param $montant
     * @param $mode_reglement
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
    static function Modifier($dates, $n_piece, $nature_depense, $designation, $fournisseur, $montant, $mode_reglement, $annee_academique, $ecole, $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif, $id)
    {
        global $db;
        $req = $db->prepare('
            UPDATE depenses SET dates = ?, n_piece = ?, nature_depense = ?, designation = ?, fournisseur = ?, montant = ?, mode_reglement = ?, annee_academique = ?, ecole = ?, date_modif = ?, user_modif = ?, navigateur_modif = ?, ordinateur_modif = ?, ip_modif = ? WHERE id= ?
        ');
        return $req->execute([$dates, $n_piece, $nature_depense, $designation, $fournisseur, $montant, $mode_reglement, $annee_academique, $ecole, $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif, $id]);
    }


    //||**********************************||
    //||----------- SUPPRESSIONS ---------||
    //||**********************************||

    /**
     * Méthode pour supprimer un(e) depenses
     *
     * @param $id
     * @return bool
     */
    static function Supprimer($id)
    {
        global $db;

        $req = $db->prepare('DELETE FROM depenses WHERE id= ?');
        return $req->execute([$id]);
    }
}
