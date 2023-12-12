<?php
//||******************************************************||
//||----------------- Kaspy Web Framework ----------------||
//||--- kaspy corporation, We're developing the future ---||
//||             Version: V1.0 ; Année : 2022             ||
//||******************************************************||


/**
 * Class role_permission_details - Représente un(e) role_permission_details
 */
class role_permission_details
{
    public $id;
    public $role_permission;
    public $fonction;

    public $lecture;
    public $creation;
    public $modification;
    public $suppression;
    public $duplicata;
    public $visualisation;
    public $exportation;

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
     * role_permission_details constructor.
     *
     * @param $id
     */
    public function __construct($id)
    {
        global $db;
        $id = strSecur($id);

        $req = $db->prepare('SELECT * FROM role_permission_details WHERE id = ?');
        $req->execute([$id]);
        $data = $req->fetch();

        $this->id = $id;
        $this->role_permission = $data['role_permission'];
        $this->fonction = $data['fonction'];
        $this->lecture = $data['lecture'];
        $this->creation = $data['creation'];
        $this->modification = $data['modification'];
        $this->suppression = $data['suppression'];
        $this->duplicata = $data['duplicata'];
        $this->visualisation = $data['visualisation'];
        $this->exportation = $data['exportation'];

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
     * Renvoi la liste des role_permission_details.
     *
     * @return array
     */
    static function getAll()
    {
        global $db;
        $req = $db->prepare("SELECT * FROM role_permission_details order by id");
        $req->execute([]);
        return $req->fetchAll();
    }


    /**
     * Méthode pour récupérer un(e) role_permission_details en fonction de son id.
     *
     * @param $id
     * @return mixed
     */
    static function getByID($id)
    {
        global $db;
        $req = $db->prepare("SELECT * FROM role_permission_details WHERE id = ?");
        $req->execute([$id]);
        return $req->fetch();
    }

        /**
     * Méthode pour récupérer un(e) role_permission_details en fonction de son id.
     *
     * @param $id
     * @return mixed
     */
    static function getDetailsByID($id)
    {
        global $db;
        $req = $db->prepare("SELECT * FROM role_permission_details WHERE role_permission = ? ORDER BY id");
        $req->execute([$id]);
        return $req->fetchAll();
    }


    /**
     * Méthode de récupération du dernier element de la table role_permission_details.
     *
     * @return mixed
     */
    static function getLast()
    {
        global $db;
        $req = $db->prepare("SELECT * FROM role_permission_details  ORDER BY ID DESC LIMIT 1");
        $req->execute([]);
        return $req->fetch();
    }

    

    /**
     * Méthode de récupération du nombre d'enregistrement de la table role_permission_details.
     *
     * @return mixed
     */
    static function getCount()
    {
        global $db;
        $req = $db->prepare("SELECT COUNT(*) FROM role_permission_details ");
        $req->execute([]);
        return $req->fetch()[0];
    }



    //||**********************************||
    //||------------ INSERTIONS ------------||
    //||**********************************||
    /**
     * Méthode pour insérer un(e) role_permission_details en base de données.
     *
     * @param $role_permission
     * @param $fonction
     * @param $lecture
     * @param $creation
     * @param $modification
     * @param $suppression
     * @param $duplicata
     * @param $visualisation
     * @param $exportation
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
    static function Ajouter($id, $role_permission, $fonction, $lecture, $creation, $modification, $suppression, $duplicata, $visualisation, $exportation, $date_creation, $user_creation, $navigateur_creation, $ordinateur_creation, $ip_creation, $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif)
    {
        global $db;

        $req = $db->prepare('
            INSERT INTO role_permission_details(id, role_permission, fonction, lecture, creation, modification, suppression, duplicata, visualisation, exportation, date_creation, user_creation, navigateur_creation, ordinateur_creation, ip_creation, date_modif, user_modif, navigateur_modif, ordinateur_modif, ip_modif) 
            VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)      
        ');
        return $req->execute([$id, $role_permission, $fonction, $lecture,$creation,$modification, $suppression, $duplicata,$visualisation,$exportation, $date_creation, $user_creation, $navigateur_creation, $ordinateur_creation, $ip_creation, $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif]);
    }


    //||**********************************||
    //||---------- MODIFICATIONS ----------||
    //||**********************************||
    /**
     * Méthode pour modifier un(e) role_permission_details en base de données.
     *
     * @param $role_permission
     * @param $fonction
     * @param $lecture
     * @param $creation
     * @param $modification
     * @param $suppression
     * @param $duplicata
     * @param $visualisation
     * @param $exportation
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
    static function Modifier($role_permission, $fonction, $lecture,$creation,$modification, $suppression, $duplicata,$visualisation,$exportation, $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif, $id)
    {
        global $db;
        $req = $db->prepare('
            UPDATE role_permission_details SET role_permission = ?, fonction = ?, lecture = ?, creation = ?, modification = ?, suppression= ?, duplicata= ?, visualisation= ?, exportation= ?,  date_modif = ?, user_modif = ?, navigateur_modif = ?, ordinateur_modif = ?, ip_modif = ? WHERE id= ?
        ');
        return $req->execute([$role_permission, $fonction, $lecture,$creation,$modification, $suppression, $duplicata,$visualisation,$exportation, $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif, $id]);
    }


    //||**********************************||
    //||----------- SUPPRESSIONS ----------||
    //||**********************************||

    /**
     * Méthode pour supprimer un(e) role_permission_details
     *
     * @param $id
     * @return bool
     */
    static function Supprimer($role_permission)
    {
        global $db;
        $req = $db->prepare('DELETE FROM role_permission_details WHERE role_permission = ?');
        return $req->execute([$role_permission]);
    }
}
