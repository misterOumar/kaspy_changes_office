<?php
//||******************************************************||
//||----------------- Kaspy Web Framework ----------------||
//||--- kaspy corporation, We're developing the future ---||
//||             Version: V1.0 ; Année : 2022             ||
//||******************************************************||


/**
 * Classmoneygram - Représente un(e)moneygram
 */
class moneygram
{
    public $id;
    public $date_heure;	
    public $num_ref;	
    public $code_aut;	
    public $id_user;	
    public $id_pvente;	
    public $montant;	
    public $frais;	
    public $total;	
    public $taxe;	
    public $type_operation;	
    public $dates;
    public $magasin;
   	
     
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
     *moneygram constructor.
     *
     * @param $id
     */
    public function __construct($id)
    {
        global $db;
        $id = strSecur($id);

        $req = $db->prepare('SELECT * FROM moneygram WHERE id = ?');
        $req->execute([$id]);
        $data = $req->fetch();

        $this->id = $id;
        $this->date_heure = $data['date_heure'];
        $this->num_ref = $data['num_ref'];
        $this->code_aut = $data['code_aut'];
        $this->id_user = $data['id_user'];
        $this->id_pvente = $data['id_pvente'];
        $this->montant = $data['montant'];
        $this->frais = $data['frais'];
        $this->total = $data['total'];
        $this->taxe = $data['taxe'];
        $this->type_operation = $data['type_operation'];
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
     * Renvoi la liste desmoneygram.
     *
     * @return array
     */
    static function getAll()
    {
        global $db;
        $req = $db->prepare("SELECT * from moneygram");
        $req->execute([]);
        return $req->fetchAll();
    }
    static function getFraisDepot()
    {
        global $db;
        $req = $db->prepare("SELECT SUM(frais) FROM moneygram");
        $req->execute([]);
        return $req->fetchColumn();
    }
     /**
     * Méthode pour comptes les transations.
     *
     * @param $code_aut
     * @return mixed
     */
    static function getRetrait()
    {
        global $db;
        $req = $db->prepare("SELECT SUM(montant) FROM moneygram ");
        $req->execute([]);
        return $req->fetchColumn();
    }
    

  /**
     * Méthode de récupération de western_union en fonction de la date.
     *
     * @param $date
     * @return mixed
     */
    static function getByDates($dates)
    {
        global $db;
        $sql = "SELECT * FROM moneygram WHERE date_heure = ?";
        $req = $db->prepare($sql);
        $req->execute([$dates]);
        return $req->fetch();
    }
    
    /**
     * Méthode pour récupérer un(e)moneygram en fonction de son id.
     *
     * @param $id
     * @return mixed
     */
    static function getByID($id)
    {
        global $db;
        $req = $db->prepare("SELECT * FROM moneygram WHERE id = ?");
        $req->execute([$id]);
        return $req->fetch();
    }

    /**
     * Méthode de récupération du dernier element de la tablemoneygram.
     *
     * @return mixed
     */
    static function getLast()
    {
        global $db;
        $req = $db->prepare("SELECT * FROM moneygram  ORDER BY ID DESC LIMIT 1");
        $req->execute([]);
        return $req->fetch();
    }

    /**
     * Méthode de récupération du nombre d'enregistrement de la tablemoneygram.
     *
     * @param $
     * @return mixed
     */
    static function getCount()
    {
        global $db;
        $req = $db->prepare("SELECT COUNT(*) FROM moneygram ");
        $req->execute([]);
        return $req->fetch()[0];
    }
    // Rappor UBA
    static function getAllRapport()
{
    global $db;
    $req = $db->prepare("SELECT * from operatio_money_gram");
    $req->execute([]);
    return $req->fetchAll();   
    
}

    //||**********************************||
    //||------------ INSERTIONS ------------||
    //||**********************************||
    /**
     * Méthode pour insérer un(e)moneygram en base de données.
     *
     * @param $date_heure
     * @param $num_ref
     * @param $id_user
     * @param $id_pvente
     * @param $montant
     * @param $frais
     * @param $total
          
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
    static function Ajouter( $date_heure, $num_ref,$code_aut,  $id_user, $id_pvente, $montant, $frais, $total,  $taxe,$type_operation, $dates, $magasin,  $date_creation, $user_creation, $navigateur_creation, $ordinateur_creation, $ip_creation, $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif)
    {
        global $db;
        $req = $db->prepare('
            INSERT INTO moneygram(date_heure, num_ref,code_aut, id_user, id_pvente,montant, frais, total,  taxe,type_operation, dates, magasin, date_creation, user_creation, navigateur_creation, ordinateur_creation, ip_creation, date_modif, user_modif, navigateur_modif, ordinateur_modif, ip_modif) 
            VALUES(?, ?,?,?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ');
        return $req->execute([$date_heure, $num_ref,$code_aut, $id_user, $id_pvente, $montant, $frais, $total,$taxe,$type_operation, $dates, $magasin, $date_creation, $user_creation, $navigateur_creation, $ordinateur_creation, $ip_creation, $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif]);
    }

    //||**********************************||
    //||---------- MODIFICATIONS ----------||
    //||**********************************||
    /**
     * Méthode pour modifier un(e)moneygram en base de données.
     *
     * @param $libelle
     * @param $type_batiment
     * @param $nombre_appartement
     * @param $parking
     * @param $jardin
     * @param $ascenseur
     * @param $proprietaire
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
    // static function Modifier($libelle, $type_batiment, $nombre_appartement, $parking, $jardin, $ascenseur, $proprietaire, $cout_construction, $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif, $id)
    // {
    //     global $db;
    //     $req = $db->prepare('
    //         UPDAT Emoneygram SET libelle = ?, type_batiment = ?, nombre_appartement = ?, parking = ?, jardin = ?, ascenseur = ?, proprietaire= ?, cout_construction= ?,  date_modif = ?, user_modif = ?, navigateur_modif = ?, ordinateur_modif = ?, ip_modif = ? WHERE id= ?
    //     ');
    //     return $req->execute([$libelle, $type_batiment, $nombre_appartement, $parking, $jardin, $ascenseur, $proprietaire, $cout_construction, $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif, $id]);
    // }


    //||**********************************||
    //||----------- SUPPRESSIONS ----------||
    //||**********************************||

    /**
     * Méthode pour supprimer un(e)moneygram
     *
     * @param $id
     * @return bool
     */
    static function Supprimer($id)
    {
        global $db;
        $req = $db->prepare('DELETE FROM moneygram WHERE id= ?');
        return $req->execute([$id]);
    }
}
