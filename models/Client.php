<?php
//||******************************************************||
//||----------------- Kaspy Web Framework ----------------||
//||--- kaspy corporation, We're developing the future ---||
//||             Version: V1.0 ; Année : 2022             ||
//||******************************************************||


/**
 * Class Client - Représente un(e) client
 */
class client
{
    public $id;
    public $civilite;
    public $nom;
    public $type;
    public $type_de_piece;
    public $numero_de_piece;
    public $contact;
    public $email;
    public $adresse;
    public $agence;
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
     * clients constructor.
     *
     * @param $id
     */
    public function __construct($id)
    {
        global $db;
        $id = strSecur($id);
        $req = $db->prepare('SELECT * FROM clients WHERE id = ?');
        $req->execute([$id]);
        $data = $req->fetch();
        $this->id = $id;
        $this->civilite = $data['civilite'];
        $this->nom = $data['nom'];
        $this->type = $data['type'];
        $this->type_de_piece = $data['type_de_piece'];
        $this->numero_de_piece = $data['numero_de_piece'];
        $this->contact = $data['contact'];
        $this->email = $data['email'];
        $this->adresse = $data['adresse'];
        $this->agence = $data['agence'];
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




    static function getAll()
    {
        global $db;
        $req = $db->prepare("SELECT * FROM clients ORDER BY id");
        $req->execute([]);
        return $req->fetchAll();
    }


    /**
     * Méthode pour récupérer un(e) clients en fonction de son id.
     *
     * @param $id
     * @return mixed
     */
    static function getByID($id)
    {
        global $db;
        $req = $db->prepare("SELECT * FROM clients WHERE id = ?");
        $req->execute([$id]);
        return $req->fetch();
    }


    /**
     * Méthode de récupération du dernier element de la table clients.
     *
     * @return mixed
     */
    static function getLast()
    {
        global $db;
        $req = $db->prepare("SELECT * FROM clients  ORDER BY id DESC LIMIT 1");
        $req->execute([]);
        return $req->fetch();
    }


    /**
     * Méthode de récupération du nombre d'enregistrement de la table clients.
     *
     * @return mixed
     */
    static function getCount()
    {
        global $db;
        $req = $db->prepare("SELECT COUNT(*) FROM clients");
        $req->execute([]);
        return $req->fetch()[0];
    }


    /**
     * Méthode de récupération de clients en fonction du clients.
     *
     * @param $clients
     * @return mixed
     */
    static function getByClient($nom)
    {
        global $db;
        $req = $db->prepare("SELECT * FROM clients WHERE nom= ? ");
        $req->execute([$nom]);
        return $req->fetch();
    }


    /**
     * Méthode de récupération de clients en fonction du numero_piece.
     *
     * @param $numero_piece
     * @return mixed
     */
    static function getByNumeroPiece($numero_de_piece)
    {
        global $db;
        $req = $db->prepare("SELECT * FROM clients WHERE numero_de_piece = ? ");
        $req->execute([$numero_de_piece]);
        return $req->fetch();
    }


    //||**********************************||
    //||----------- INSERTIONS -----------||
    //||**********************************||
    /**
     * Méthode pour insérer un(e) clients en base de données.
     *
     * @param $clients
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
        $civilite,
        $nom,
        $type,
        $type_de_piece,
        $numero_de_piece,
        $contact,
        $email,
        $adresse,

        $agence,
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
            INSERT INTO clients(civilite, nom, type, type_de_piece, numero_de_piece, contact, email, adresse,  agence, date_creation,user_creation, navigateur_creation, ordinateur_creation, ip_creation, date_modif, user_modif, navigateur_modif, ordinateur_modif, ip_modif) 
            VALUES(?, ?, ? ,? ,? ,? , ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)      
        ');
        return $req->execute([$civilite, $nom, $type, $type_de_piece, $numero_de_piece,  $contact, $email, $adresse,  $agence, $date_creation, $user_creation, $navigateur_creation, $ordinateur_creation, $ip_creation, $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif]);
    }


    //||**********************************||
    //||---------- MODIFICATIONS ---------||
    //||**********************************||
    /**
     * Méthode pour modifier un(e) clients en base de données.
     *
     * @param $clients
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
        $civilite,
        $nom,
        $type,
        $type_de_piece,
        $numero_de_piece,
        $contact,
        $email,
        $adresse,
        $agence,
        $date_modif,
        $user_modif,
        $navigateur_modif,
        $ordinateur_modif,
        $ip_modif,
        $id
    ) {
        global $db;
        $req = $db->prepare('
            UPDATE clients SET civilite =?, nom=?, type=?, type_de_piece=?, numero_de_piece = ?, contact = ?, email = ?, adresse = ?, agence= ?, date_modif = ?,
             user_modif = ?, navigateur_modif = ?, ordinateur_modif = ?, ip_modif = ? WHERE id= ?
        ');
        return $req->execute([
            $civilite,
            $nom,
            $type,
            $type_de_piece,
            $numero_de_piece,
            $contact,
            $email,
            $adresse,
            $agence,
            $date_modif,
            $user_modif,
            $navigateur_modif,
            $ordinateur_modif,
            $ip_modif, 
            $id
        ]);
    }


    //||**********************************||
    //||----------- SUPPRESSIONS ---------||
    //||**********************************||

    /**
     * Méthode pour supprimer un(e) clients
     *
     * @param $id
     * @return bool
     */
    static function Supprimer($id)
    {
        global $db;
        $req = $db->prepare('DELETE FROM clients WHERE id= ?');
        return $req->execute([$id]);
    }
}
