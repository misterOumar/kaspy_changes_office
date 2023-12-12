<?php
//||******************************************************||
//||----------------- Kaspy Web Framework ----------------||
//||--- kaspy corporation, We're developing the future ---||
//||             Version: V1.0 ; Année : 2022             ||
//||******************************************************||


/**
 * Class orange - Représente un(e) orange
 */
class orange
{
    public $id;
    public $montant;
    public $date;
    public $client;
    public $telephone_client;
    public $destinataire;
    public $telephone_destinataire;

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
     * orange constructor.
     *
     * @param $id
     */
    public function __construct($id)
    {
        global $db;
        $id = strSecur($id);

        $req = $db->prepare('SELECT * FROM orange WHERE id = ?');
        $req->execute([$id]);
        $data = $req->fetch();

        $this->id = $id;
        $this->montant = $data['montant'];
        $this->date = $data['date'];
        $this->client = $data['client'];
        $this->telephone_client = $data['telephone_client'];
        $this->destinataire = $data['destinataire'];
        $this->telephone_destinataire = $data['telephone_destinataire'];


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
     * Renvoi la liste des orange.
     *
     * @return array
     */
    static function getAll()
    {
        global $db;
        $req = $db->prepare("SELECT * FROM orange ORDER BY id");
        $req->execute([]);
        return $req->fetchAll();
    }

    /**
     * Méthode pour récupérer un(e) orange en fonction de son id.
     *
     * @param $id
     * @return mixed
     */
    static function getByID($id)
    {
        global $db;
        $req = $db->prepare("SELECT * FROM orange WHERE id = ?");
        $req->execute([$id]);
        return $req->fetch();
    }

    /**
     * Méthode de récupération du dernier element de la table orange.
     *
     * @return mixed
     */
    static function getLast()
    {
        global $db;
        $req = $db->prepare("SELECT * FROM orange  ORDER BY ID DESC LIMIT 1");
        $req->execute([]);
        return $req->fetch();
    }

    /**
     * Méthode de récupération du nombre d'enregistrement de la table orange.
     *
     * @param $
     * @return mixed
     */
    static function getCount()
    {
        global $db;
        $req = $db->prepare("SELECT COUNT(*) FROM orange ");
        $req->execute([]);
        return $req->fetch()[0];
    }

    /**
     * Méthode de récupération de orange en fonction du nom_prenom.
     *
     * @param $nom_prenom
     * @return mixed
     */
    static function getByNom($nom_prenom)
    {
        global $db;
        $req = $db->prepare("SELECT * FROM orange WHERE nom_prenom = ?");
        $req->execute([$nom_prenom]);
        return $req->fetch();
    }

    //||**********************************||
    //||------------ INSERTIONS ------------||
    //||**********************************||
    /**
     * Méthode pour insérer un(e) orange en base de données.
     *
     * @param $nom_prenom
     * @param $numero_telephone
     * @param $email
     * @param $fonction
     * @param $domicile
     * @param $type_carte
     * @param $numero_carte
     * @param $etablie_le
     * @param $compte_contribuable
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
        $montant,
        $date,
        $client,
        $telephone_client,
        $destinataire,
        $telephone_destinataire,
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
            INSERT INTO orange(montant, date,client, telephone_client,destinataire, telephone_destinataire, date_creation, user_creation, navigateur_creation, ordinateur_creation, ip_creation, date_modif, user_modif, navigateur_modif, ordinateur_modif, ip_modif) 
            VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)      
        ');
        return $req->execute([$montant, $date, $client, $telephone_client, $destinataire, $telephone_destinataire, $date_creation, $user_creation, $navigateur_creation, $ordinateur_creation, $ip_creation, $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif]);
    }


    //||**********************************||
    //||---------- MODIFICATIONS ----------||
    //||**********************************||
    /**
     * Méthode pour modifier un(e) orange en base de données.
     *
     * @param $nom_prenom
     * @param $numero_telephone
     * @param $email
     * @param $fonction
     * @param $domicile
     * @param $type_carte
     * @param $numero_carte
     * @param $etablie_le
     * @param $compte_contribuable
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
        $montant,
        $date,
        $client,
        $telephone_client,
        $destinataire,
        $telephone_destinataire,
        $date_modif,
        $user_modif,
        $navigateur_modif,
        $ordinateur_modif,
        $ip_modif,
        $id
    ) {
        global $db;
        $req = $db->prepare('
        UPDATE orange SET 
        montant = ?, 
        date = ?,
        client = ?,
        telephone_client = ?, 
        destinataire = ?,
        telephone_destinataire = ?,
        date_modif = ?,
        user_modif = ?, 
        navigateur_modif = ?,
        ordinateur_modif = ?,
        ip_modif = ?
        WHERE id = ?
    ');

        return $req->execute([
            $montant, $date, $client,
            $telephone_client, $destinataire,
            $telephone_destinataire, $date_modif, $user_modif,
            $navigateur_modif, $ordinateur_modif, $ip_modif, $id
        ]);
    }



    //||**********************************||
    //||----------- SUPPRESSIONS ----------||
    //||**********************************||

    /**
     * Méthode pour supprimer un(e) orange
     *
     * @param $id
     * @return bool
     */
    static function Supprimer($id)
    {
        global $db;
        $req = $db->prepare('DELETE FROM orange WHERE id= ?');
        return $req->execute([$id]);
    }
}
