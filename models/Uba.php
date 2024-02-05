<?php
//||******************************************************||
//||----------------- Kaspy Web Framework ----------------||
//||--- kaspy corporation, We're developing the future ---||
//||             Version: V1.0 ; Année : 2022             ||
//||******************************************************||


/**
 * Class uba - Représente un(e) uba
 */
class uba
{
    public $id;
    public $Trans_ID;
    public $Dates;
    public $Amount;
    public $Fees;
    public $Running_Bal;
    public $Description;
    public $Reference;
    public $Account_Id;
    public $Last_Name;
    public $ajouter_par;
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
     * uba constructor.
     *
     * @param $id
     */
    public function __construct($id)
    {
        global $db;
        $id = strSecur($id);

        $req = $db->prepare('SELECT * FROM transaction_uba WHERE id = ?');
        $req->execute([$id]);
        $data = $req->fetch();

        $this->id = $id;
        $this->Trans_ID = $data['Trans_ID'];
        $this->Dates = $data['Dates'];
        $this->Amount = $data['Amount'];
        $this->Fees = $data['Fees'];
        $this->Running_Bal = $data['Running_Bal'];
        $this->Description = $data['Description'];
        $this->Reference = $data['Reference'];
        $this->Account_Id = $data['Account_Id'];
        $this->Last_Name = $data['Last_Name'];
        $this->ajouter_par = $data['ajouter_par'];
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
     * Renvoi la liste des transaction_uba.
     *
     * @return array
     */
    static function getAll()
    {
        global $db;
        $req = $db->prepare("select transaction_uba.*,
        login.nom_prenom as nom_prenom from transaction_uba 
        left join login on transaction_uba.ajouter_par = login.id
        where transaction_uba.Trans_ID != 'Trans_ID' order by transaction_uba.id");
        $req->execute([]);
        return $req->fetchAll();
    }

    /**
     * Renvoi la la somme des montant, frais et total de transaction de la journee
     *
     * @return array
     */
    static function getStatByDay()
    {
        global $db;
        $req = $db->prepare("SELECT 
        SUM(Montant) AS somme_montant,
        SUM(Frais) AS somme_frais,
        SUM(Total) AS somme_total
    FROM transaction_uba
    WHERE DATE(date_creation) = CURDATE();
    ");
        $req->execute([]);
        return $req->fetchAll();
    }


    /**
     * Méthode de récupération de locataires en fonction du nom_prenom.
     *
     * @param $nom_prenom
     * @return mixed
     */
    static function getByDate($dates)
    {
        global $db;
        $req = $db->prepare("SELECT * FROM transaction_uba WHERE Dates = ?");
        $req->execute([$dates]);
        return $req->fetch();
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
        $sql = "SELECT * FROM transaction_uba WHERE Dates = ?";
        $req = $db->prepare($sql);
        $req->execute([$dates]);
        return $req->fetch();
    }
    /**
     * Méthode pour récupérer un(e) transaction_uba en fonction de son id.
     *
     * @param $id
     * @return mixed
     */
    static function getByID($id)
    {
        global $db;
        $req = $db->prepare("select transaction_uba.*,
        login.nom_prenom as nom_prenom from transaction_uba 
        left join login on transaction_uba.ajouter_par = login.id
        where transaction_uba.id = ? order by transaction_uba.id");
        $req->execute([$id]);
        return $req->fetch();
    }

    /**
     * Méthode de récupération du dernier element de la table transaction_uba.
     *
     * @return mixed
     */
    static function getLast()
    {
        global $db;
        $req = $db->prepare("SELECT * FROM transaction_uba  ORDER BY ID DESC LIMIT 1");
        $req->execute([]);
        return $req->fetch();
    }

    /**
     * Méthode de récupération du nombre d'enregistrement de la table transaction_uba.
     *
     * @param $
     * @return mixed
     */
    static function getCount()
    {
        global $db;
        $req = $db->prepare("SELECT COUNT(*) FROM transaction_uba");
        $req->execute([]);
        return $req->fetch()[0];
    }
    /**
     * Méthode de récupération du nombre de transaction transaction_uba par jour.
     *
     * @param $
     * @return mixed
     */
    static function getCountByDay()
    {
        global $db;
        $req = $db->prepare("SELECT COUNT(*) AS nombre_transaction
        FROM transaction_uba
        WHERE DATE(date_creation) = CURDATE();
        ");
        $req->execute([]);
        return $req->fetch()[0];
    }

    //||**********************************||
    //||------------ INSERTIONS ------------||
    //||**********************************||
    /**
     * Méthode pour insérer un(e) transaction_uba en base de données.
     *
     * @param $Trans_ID
     * @param $Dates
     * @param $Amount
     * @param $Fees
     * @param $Running_Bal
     * @param $Description
     * @param $Reference
     * @param $Account_Id
     * @param $Last_Name
     * @param $ajouter_par
     * @param $magasin

     
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
        $Trans_ID,
        $Dates,
        $Amount,
        $Fees,
        $Running_Bal,
        $Description,
        $Reference,
        $Account_Id,
        $Last_Name,
        $ajouter_par,
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
            INSERT INTO transaction_uba( Trans_ID, Dates, Amount, Fees, Running_Bal, Description, Reference, Account_Id, Last_Name, ajouter_par,magasin, date_creation, user_creation, navigateur_creation, ordinateur_creation, ip_creation, date_modif, user_modif, navigateur_modif, ordinateur_modif, ip_modif) 
            VALUES(? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,?, ?)
        ');
        return $req->execute([$Trans_ID, $Dates, $Amount, $Fees, $Running_Bal, $Description, $Reference, $Account_Id, $Last_Name, $ajouter_par,$magasin, $date_creation, $user_creation, $navigateur_creation, $ordinateur_creation, $ip_creation, $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif]);
    }


    //||**********************************||
    //||---------- MODIFICATIONS ----------||
    //||**********************************||
    /**
     * Méthode pour modifier un(e) transaction_uba en base de données.
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
    static function Modifier($libelle, $type_batiment, $nombre_appartement, $parking, $jardin, $ascenseur, $proprietaire, $cout_construction, $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif, $id)
    {
        global $db;
        $req = $db->prepare('
            UPDATE transaction_uba SET libelle = ?, type_batiment = ?, nombre_appartement = ?, parking = ?, jardin = ?, ascenseur = ?, proprietaire= ?, cout_construction= ?,  date_modif = ?, user_modif = ?, navigateur_modif = ?, ordinateur_modif = ?, ip_modif = ? WHERE id= ?
        ');
        return $req->execute([$libelle, $type_batiment, $nombre_appartement, $parking, $jardin, $ascenseur, $proprietaire, $cout_construction, $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif, $id]);
    }


    //||**********************************||
    //||----------- SUPPRESSIONS ----------||
    //||**********************************||

    /**
     * Méthode pour supprimer un(e) transaction_uba
     *
     * @param $id
     * @return bool
     */
    static function Supprimer($id)
    {
        global $db;
        $req = $db->prepare('DELETE FROM transaction_uba WHERE id= ?');
        return $req->execute([$id]);
    }
}
