<?php
//||******************************************************||
//||----------------- Kaspy Web Framework ----------------||
//||--- kaspy corporation, We're developing the future ---||
//||             Version: V1.0 ; Année : 2022             ||
//||******************************************************||


/**
 * Class changes - Représente un(e) changes
 */
class changes
{
    public $id;
    public $montant1;
    public $taux;
    public $montant2;
    public $client;
    public $telephone;
    public $date;
    public $devise;
    public $adresse;
    public $type_operation;
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
     * changes constructor.
     *
     * @param $id
     */
    public function __construct($id)
    {
        global $db;
        $id = strSecur($id);
        $req = $db->prepare('SELECT * FROM changes WHERE id = ?');
        $req->execute([$id]);
        $data = $req->fetch();
        $this->id = $id;
        $this->montant1 = $data['montant1'];     
        $this->taux = $data['taux'];
        $this->montant2 = $data['montant2'];
        $this->client = $data['client'];
        $this->telephone = $data['telephone'];
        $this->date = $data['date'];
        $this->type_operation = $data['type_operation'];
        $this->devise = $data['devise'];
        $this->adresse = $data['adresse'];
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
        $req = $db->prepare("SELECT * FROM changes ORDER BY id");
        $req->execute([]);
        return $req->fetchAll();
    }


    /**
     * Méthode pour récupérer un(e) changes en fonction de son id.
     *
     * @param $id
     * @return mixed
     */

    // static function getAllByID($id)
    // {
    //     global $db;
    //     $req = $db->prepare("SELECT changes.*,
    //     type_carte.libelle AS type_carte,
    //     FROM changes
    //     LEFT JOIN type_carte ON changes.type_carte = type_carte.id
    //     WHERE changes.id = ?");
    //     $req->execute([$id]);
    //     return $req->fetch();
    // }
    static function getByID($id)
    {
        global $db;
        $req = $db->prepare("SELECT * FROM changes WHERE id = ?");
        $req->execute([$id]);
        return $req->fetch();
    }
    /**
     * Méthode pour récupérer un(e) changes en fonction du type de carte.
     *
     * @param $id
     * @return mixed
     */

     

    /**
     * Méthode de récupération du dernier element de la table changes.
     *
     * @return mixed
     */
    static function getLast()
    {
        global $db;
        $req = $db->prepare("SELECT * FROM changes  ORDER BY id DESC LIMIT 1");
        $req->execute([]);
        return $req->fetch();
    }


    /**
     * Méthode de récupération du nombre d'enregistrement de la table changes.
     *
     * @return mixed
     */
    static function getCount()
    {
        global $db;
        $req = $db->prepare("SELECT COUNT(*) FROM changes");
        $req->execute([]);
        return $req->fetch()[0];
    }


    /**
     * Méthode de récupération de changes en fonction du changes.
     *
     * @param $changes
     * @return mixed
     */
    static function getByClient($client)
    {
        global $db;
        $req = $db->prepare("SELECT * FROM changes WHERE client= ? ");
        $req->execute([$client]);
        return $req->fetch();
    }


    //||**********************************||
    //||----------- INSERTIONS -----------||
    //||**********************************||
    /**
     * Méthode pour insérer un(e) changes en base de données.
     *
     * @param $changes
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
        $date, 
       
        $devise,
        $type_operation,
        $montant1,
        $taux,
        $montant2,
        $client,
        $telephone,
      
        $adresse,
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
            INSERT INTO changes(date ,devise,type,montant1,taux,montant2, client ,telephone, adresse,date_creation,user_creation, navigateur_creation, ordinateur_creation, ip_creation, date_modif, user_modif, navigateur_modif, ordinateur_modif, ip_modif) 
            VALUES(?, ?, ?,?,?,?,?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)      
        ');
        return $req->execute([$date,$devise, $type_operation,$montant1, $taux, $montant2, $client, $telephone,
         $adresse, $date_creation, $user_creation, $navigateur_creation, $ordinateur_creation, $ip_creation, $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif]);
    }


    //||**********************************||
    //||---------- MODIFICATIONS ---------||
    //||**********************************||
    /**
     * Méthode pour modifier un(e) changes en base de données.
     *
     * @param $changes
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
        $date, 
       
        $devise,
        $type_operation,
        $montant1,
        $taux,
        $montant2,
        $client,
        $telephone,
     
        $adresse,
        $date_modif,
        $user_modif,
        $navigateur_modif,
        $ordinateur_modif,
        $ip_modif,
        $id
    ) {
        global $db;
        $req = $db->prepare('
            UPDATE changes SET date =?,devise=? ,type=?,  montant1=?,taux=?,
            montant2=?,client=? ,telephone = ?, adresse =?, date_modif = ?,
             user_modif = ?, navigateur_modif = ?,
              ordinateur_modif = ?,
               ip_modif = ? WHERE id= ?
        ');
        return $req->execute([$date, $devise,  $type_operation,
       $montant1, $taux, $montant2, $client, $telephone,
        $adresse,   $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif, $id]);
    }


    //||**********************************||
    //||----------- SUPPRESSIONS ---------||
    //||**********************************||

    /**
     * Méthode pour supprimer un(e) changes
     *
     * @param $id
     * @return bool
     */
    static function Supprimer($id)
    {
        global $db;
        $req = $db->prepare('DELETE FROM changes WHERE id= ?');
        return $req->execute([$id]);
    }
}
