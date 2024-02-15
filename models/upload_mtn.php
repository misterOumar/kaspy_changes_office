<?php
//||******************************************************||type_carteupload_mtn
//||----------------- Kaspy Web Framework ----------------||
//||--- kaspy corporation, We're developing the future ---||
//||             Version: V1.0 ; Année : 2022             ||
//||******************************************************||


/**
 * Class upload_mtn - Représente un(e) upload_mtn
 */
class upload_mtn
{
    public $id;
    public $identifiant; 
    public $numero_expediteur;
    public $agence;
    public $numero_recepteur;
    public $nom_recepteur;
    public $montant;
    public $frais;
    public $solde;
    public $devise;
    public $dates;


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
     * upload_mtn constructor.
     *
     * @param $id
     */
    public function __construct($id)
    {
        global $db;
        $id = strSecur($id);
        $req = $db->prepare('SELECT * FROM upload_mtn WHERE id = ?');
        $req->execute([$id]);
        $data = $req->fetch();

        $this->id = $id;
        $this->identifiant = $data['identifiant'];    
        $this->numero_expediteur = $data['numero_expediteur'];
        $this->agence = $data['agence'];
        $this->numero_recepteur = $data['numero_recepteur'];
        $this->nom_recepteur = $data['nom_recepteur'];
        $this->montant = $data['montant'];
        $this->frais = $data['frais'];
        $this->solde = $data['solde'];
        $this->devise = $data['Devise'];
        $this->dates = $data['dates'];
        $this->magasin = $data['magasin'];




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
     * Renvoi la liste des upload_mtn.
     *
     * @return array
     */
    static function getAll()
    {
        global $db;
        $req = $db->prepare("SELECT  * FROM upload_mtn ORDER BY id");
        $req->execute([]);
        return $req->fetchAll();
    }


    /**
     * Méthode pour récupérer un(e) upload_mtn en fonction de son id.
     *
     * @param $id
     * @return mixed
     */
    static function getByID($id)
    {
        global $db;
        $req = $db->prepare("SELECT * FROM upload_mtn WHERE id = ?");
        $req->execute([$id]);
        return $req->fetch();
    }

    /**
     * Méthode de récupération du dernier element de la table upload_mtn.
     *
     * @return mixed
     */
    static function getLast()
    {
        global $db;
        $req = $db->prepare("SELECT * FROM upload_mtn  ORDER BY ID DESC LIMIT 1");
        $req->execute([]);
        return $req->fetch();
    }

    /**
     * Méthode de récupération du nombre d'enregistrement de la table upload_mtn.
     *
     * @param $
     * @return mixed
     */
    static function getCount()
    {
        global $db;
        $req = $db->prepare("SELECT COUNT(*) FROM upload_mtn ");
        $req->execute([]);
        return $req->fetch()[0];
    }

    /**
     * Méthode de récupération de upload_mtn en fonction du nom_prenom.
     *
     * @param $nom_prenom
     * @return mixed
     */
    static function getByNom($nom_prenom)
    {
        global $db;
        $req = $db->prepare("SELECT * FROM upload_mtn WHERE nom_prenom = ?");
        $req->execute([$nom_prenom]);
        return $req->fetch();
    }

    /* Méthode de récupération de upload_mtn en fonction de la date.
     *
     * @param $date
     * @return mixed
     */
    static function getByDates($dates)
    {
        global $db;
        $sql = "SELECT * FROM upload_mtn WHERE dates = ?";
        $req = $db->prepare($sql);
        $req->execute([$dates]);
        return $req->fetch();
    }

    /**
     * Renvoi la liste des ria pour le rapport.
     *
     * @return array
     */
    static function getAllRapport()
    {
        global $db;
        $req = $db->prepare("SELECT  *, 
        SUM(CASE WHEN type_transaction = 'envoi' THEN 1 ELSE 0 END) as nbre_operation_envoi, 
        SUM(CASE WHEN type_transaction != 'envoi' THEN 1 ELSE 0 END) as nbre_operation_payer,
        SUM(CASE WHEN type_transaction = 'envoi' THEN external_fx_rate ELSE 0 END) as frais_envoi,
        SUM(CASE WHEN type_transaction = 'envoi' THEN external_service_Provider ELSE 0 END) as taxe_envoi,
        SUM(CASE WHEN type_transaction = 'envoi' THEN initiepar ELSE 0 END) as initiepar,
        SUM(CASE WHEN type_transaction = 'envoi' THEN external_service_Provider +  initiepar ELSE 0 END) as total_envoi,
        SUM(CASE WHEN type_transaction != 'envoi' THEN  initiepar ELSE 0 END) as montant_paye,
        SUM(CASE WHEN type_transaction = 'envoi' THEN initiepar ELSE 0 END) as montant_payer_envoi
        FROM upload_mtn GROUP BY magasin, date
        ORDER BY id");
        $req->execute([]);
        return $req->fetchAll();
    }

    //||**********************************||
    //||------------ INSERTIONS ------------||
    //||**********************************||
    /**
     * Méthode pour insérer un(e) upload_mtn en base de données.
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
        $identifiant, 
        $numero_expediteur,
        $agence,
        $numero_recepteur,
        $nom_recepteur,
        $montant,
        $frais,
        $solde,
        $devise,
        $dates,

        $magasin,
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
            INSERT INTO upload_mtn(identifiant,  
            numero_expediteur,
            agence,
            numero_recepteur,
            nom_recepteur,
            montant,
            frais,
            solde,
            devise,
            dates,
             
             
             magasin, date_creation, user_creation, navigateur_creation, 
             ordinateur_creation, ip_creation, date_modif, user_modif,
              navigateur_modif, ordinateur_modif, ip_modif) 
            VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?,?,?)      
        ');
        return $req->execute([
            $identifiant,      
            $numero_expediteur,
            $agence,
            $numero_recepteur,
            $nom_recepteur,
            $montant,
            $frais,
            $solde,
            $devise,
            $dates,
            $magasin,
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
        ]);
    }


    //||**********************************||
    //||---------- MODIFICATIONS ----------||
    //||**********************************||
    /**
     * Méthode pour modifier un(e) upload_mtn en base de données.
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
        $identifiant,
        $recepteur,
        $numero_expediteur,
        $agence,
        $numero_ecepteur,
        $nom_recepteur,
        $montant,
        $frais,
        $solde,
        $devise,
        $dates,
        $date_modif,
        $user_modif,
        $navigateur_modif,
        $ordinateur_modif,
        $ip_modif,
        $id
    ) {
        global $db;
        $req = $db->prepare('
            UPDATE upload_mtn SET montant = ?, client= ?, telephone_client = ?, devise_deux = ?,
            telephone_devise_deux =? date_modif = ?, user_modif = ?, navigateur_modif = ?,
             ordinateur_modif = ?, ip_modif = ? WHERE id= ?
        ');
        return $req->execute([
            $identifiant,
            $recepteur,
            $numero_expediteur,
            $agence,
            $numero_ecepteur,
            $nom_recepteur,
            $montant,
            $frais,
            $solde,
            $devise,
            $dates,
            $date_modif,
            $user_modif,
            $navigateur_modif,
            $ordinateur_modif,
            $ip_modif,
            $id
        ]);
    }
    //||**********************************||
    //||----------- SUPPRESSIONS ----------||
    //||**********************************||

    /**
     * Méthode pour supprimer un(e) upload_mtn
     *
     * @param $id
     * @return bool
     */
    static function Supprimer($id)
    {
        global $db;
        $req = $db->prepare('DELETE FROM upload_mtn WHERE id= ?');
        return $req->execute([$id]);
    }
}
