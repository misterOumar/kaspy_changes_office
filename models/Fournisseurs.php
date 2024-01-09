<?php
//||******************************************************||
//||----------------- Kaspy Web Framework ----------------||
//||--- kaspy corporation, We're developing the future ---||
//||             Version: V1.0 ; Année : 2022             ||
//||******************************************************||


/**
 * Class fournisseurs - Représente un(e) fournisseurs
 */
class fournisseurs
{
    public $id;
    public $raison_sociale;
    public $adresse;
    public $email;
    public $tel;
    public $interlocuteur;
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
     * fournisseurs constructeur.
     *
     * @param $id
     */
    public function __construct($id)
    {
        global $db;
        $id = strSecur($id);

        $req = $db->prepare('SELECT * FROM fournisseurs WHERE id = ?');
        $req->execute([$id]);
        $data = $req->fetch();

        $this->id = $id;
        $this->raison_sociale = $data['raison_sociale'];
        $this->adresse = $data['adresse'];
        $this->email = $data['email'];
        $this->tel = $data['tel'];
        $this->interlocuteur = $data['interlocuteur'];
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
     * Renvoi la liste des fournisseurs.
     *
     * @return array
     */
    static function getAll()
    {
        global $db;
        $req = $db->prepare("SELECT * FROM fournisseurs ORDER BY id");
        $req->execute([]);
        return $req->fetchAll();
    }

    /**
     * Méthode pour récupérer un(e) fournisseurs en fonction de son id.
     *
     * @param $id
     * @return mixed
     */
    static function getByID($id)
    {
        global $db;
        $req = $db->prepare("SELECT * FROM fournisseurs WHERE id = ?");
        $req->execute([$id]);
        return $req->fetch();
    }

    /**
     * Méthode de récupération du dernier element de la table fournisseurs.
     *
     * @return mixed
     */
    static function getLast()
    {
        global $db;
        $req = $db->prepare("SELECT * FROM fournisseurs  ORDER BY id DESC LIMIT 1");
        $req->execute([]);
        return $req->fetch();
    }

    /**
     * Méthode de récupération du nombre d'enregistrement de la table fournisseurs.
     *
     * @return mixed
     */
    static function getCount()
    {
        global $db;
        $req = $db->prepare("SELECT COUNT(*) FROM fournisseurs");
        $req->execute([]);
        return $req->fetch()[0];
    }

    /**
     * Méthode de récupération de fournisseurs en fonction du raison_sociale.
     *
     * @param $raison_sociale
     * @return mixed
     */
    static function getByNom($raison_sociale)
    {
        global $db;
        $req = $db->prepare("SELECT * FROM fournisseurs WHERE raison_sociale = ? ");
        $req->execute([$raison_sociale]);
        return $req->fetch();
    }



    // VERIFICATIONS AVANT SUPPRESSIONS
    /**
     * Méthode de vérification si le fournisseur est déja utilisé pour créer une dépense.
     *
     * @param $nom
     * @return mixed
     */
    static function getByDepensesByFournisseurNom($nom)
    {
        global $db;
        $req = $db->prepare("SELECT * FROM depenses WHERE fournisseur = ?");
        $req->execute([$nom]);
        return $req->fetch();
    }


    //||**********************************||
    //||----------- INSERTIONS -----------||
    //||**********************************||
    /**
     * Méthode pour insérer un(e) fournisseurs en base de données.
     *
     * @param $raison_sociale
     * @param $adresse
     * @param $email
     * @param $tel
     * @param $interlocuteur
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
    static function Ajouter($id, $raison_sociale, $adresse, $email, $tel, $interlocuteur, $annee_academique, $ecole, $date_creation, $user_creation, $navigateur_creation, $ordinateur_creation, $ip_creation, $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif)
    {
        global $db;

        $req = $db->prepare('
            INSERT INTO fournisseurs(id, raison_sociale, adresse, email, tel, interlocuteur, annee_academique, ecole, date_creation, user_creation, navigateur_creation, ordinateur_creation, ip_creation, date_modif, user_modif, navigateur_modif, ordinateur_modif, ip_modif) 
            VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)      
        ');
        return $req->execute([$id, $raison_sociale, $adresse, $email, $tel, $interlocuteur, $annee_academique, $ecole, $date_creation, $user_creation, $navigateur_creation, $ordinateur_creation, $ip_creation, $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif]);
    }


    //||**********************************||
    //||---------- MODIFICATIONS ---------||
    //||**********************************||
    /**
     * Méthode pour modifier un(e) fournisseurs en base de données.
     *
     * @param $raison_sociale
     * @param $adresse
     * @param $email
     * @param $tel
     * @param $interlocuteur
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
    static function Modifier($raison_sociale, $adresse, $email, $tel, $interlocuteur, $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif, $id)
    {
        global $db;
        $req = $db->prepare('
            UPDATE fournisseurs SET  raison_sociale = ?, adresse = ?, email = ?, tel = ?, interlocuteur = ?,  date_modif = ?, user_modif = ?, navigateur_modif = ?, ordinateur_modif = ?, ip_modif = ? WHERE id= ?
        ');
        return $req->execute([$raison_sociale, $adresse, $email, $tel, $interlocuteur, $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif, $id]);
    }


    //||**********************************||
    //||----------- SUPPRESSIONS ---------||
    //||**********************************||

    /**
     * Méthode pour supprimer un(e) fournisseurs
     *
     * @param $id
     * @return bool
     */
    static function Supprimer($id)
    {
        global $db;

        $req = $db->prepare('DELETE FROM fournisseurs WHERE id= ?');
        return $req->execute([$id]);
    }
}
