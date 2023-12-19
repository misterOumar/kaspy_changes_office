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
    public $dates;
    public $elements;
    public $achats;
    public $taux;
    public $total;
    public $elements_1;
    public $ventes;
    public $taux_2;
    public $total_3;
    public $commission;
    public $montant;
    public $total_cms;
    public $ajouter_par;

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

        $req = $db->prepare('SELECT * FROM transaction_changes WHERE id = ?');
        $req->execute([$id]);
        $data = $req->fetch();

        $this->id = $id;
        $this->dates = $data['dates'];
        $this->elements = $data['elements'];
        $this->achats = $data['achats'];
        $this->taux = $data['taux'];
        $this->total = $data['total'];
        $this->elements_1 = $data['elements_1'];
        $this->ventes = $data['ventes'];
        $this->taux_2 = $data['taux_2'];
        $this->total_3 = $data['total_3'];
        $this->commission = $data['commission'];
        $this->montant = $data['montant'];
        $this->total_cms = $data['total_cms'];
        $this->ajouter_par = $data['ajouter_par'];

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
     * Renvoi la liste des transaction_changes.
     *
     * @return array
     */
    static function getAll()
    {
        global $db;
        $req = $db->prepare("select transaction_changes.*,
        login.nom_prenom as nom_prenom from transaction_changes 
        left join login on transaction_changes.ajouter_par = login.id
        where transaction_changes.elements != 'elements' order by transaction_changes.id");
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
    FROM transaction_changes
    WHERE DATE(date_creation) = CURDATE();
    ");
        $req->execute([]);
        return $req->fetchAll();
    }

    /**
     * Méthode pour récupérer un(e) transaction_changes en fonction de son id.
     *
     * @param $id
     * @return mixed
     */
    static function getByID($id)
    {
        global $db;
        $req = $db->prepare("select transaction_changes.*,
        login.nom_prenom as nom_prenom from transaction_changes 
        left join login on transaction_changes.ajouter_par = login.id
        where transaction_changes.id = ? order by transaction_changes.id");
        $req->execute([$id]);
        return $req->fetch();
    }

    /**
     * Méthode de récupération du dernier element de la table transaction_changes.
     *
     * @return mixed
     */
    static function getLast()
    {
        global $db;
        $req = $db->prepare("SELECT * FROM transaction_changes  ORDER BY ID DESC LIMIT 1");
        $req->execute([]);
        return $req->fetch();
    }

    /**
     * Méthode de récupération du nombre d'enregistrement de la table transaction_changes.
     *
     * @param $
     * @return mixed
     */
    static function getCount()
    {
        global $db;
        $req = $db->prepare("SELECT COUNT(*) FROM transaction_changes ");
        $req->execute([]);
        return $req->fetch()[0];
    }
    /**
     * Méthode de récupération du nombre de transaction transaction_changes par jour.
     *
     * @param $
     * @return mixed
     */
    static function getCountByDay()
    {
        global $db;
        $req = $db->prepare("SELECT COUNT(*) AS nombre_transaction
        FROM transaction_changes
        WHERE DATE(date_creation) = CURDATE();
        ");
        $req->execute([]);
        return $req->fetch()[0];
    }

    //||**********************************||
    //||------------ INSERTIONS ------------||
    //||**********************************||
    /**
     * Méthode pour insérer un(e) transaction_changes en base de données.
     *
     * @param $dates
     * @param $elements
     * @param $achats
     * @param $taux
     * @param $total
     * @param $elements_1
     * @param $ventes
     * @param $taux_2
     * @param $total_3
     * @param $commission
     * @param $montant
     * @param $total_cms
     * @param $ajouter_par
     
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
    static function Ajouter($id, $dates, $elements, $achats, $taux, $total, $elements_1, $ventes, $taux_2, $total_3, $commission, $montant, $total_cms, $ajouter_par, $date_creation, $user_creation, $navigateur_creation, $ordinateur_creation, $ip_creation, $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif)
    {
        global $db;

        $req = $db->prepare('
            INSERT INTO transaction_changes(id, dates, elements, achats, taux, total, elements_1, ventes, taux_2, total_3, commission, montant, total_cms, ajouter_par, date_creation, user_creation, navigateur_creation, ordinateur_creation, ip_creation, date_modif, user_modif, navigateur_modif, ordinateur_modif, ip_modif) 
            VALUES(? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,?, ?)
        ');
        return $req->execute([$id, $dates, $elements, $achats, $taux, $total, $elements_1, $ventes, $taux_2, $total_3, $commission, $montant, $total_cms, $ajouter_par, $date_creation, $user_creation, $navigateur_creation, $ordinateur_creation, $ip_creation, $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif]);
    }


    //||**********************************||
    //||---------- MODIFICATIONS ----------||
    //||**********************************||
    /**
     * Méthode pour modifier un(e) transaction_changes en base de données.
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
            UPDATE transaction_changes SET libelle = ?, type_batiment = ?, nombre_appartement = ?, parking = ?, jardin = ?, ascenseur = ?, proprietaire= ?, cout_construction= ?,  date_modif = ?, user_modif = ?, navigateur_modif = ?, ordinateur_modif = ?, ip_modif = ? WHERE id= ?
        ');
        return $req->execute([$libelle, $type_batiment, $nombre_appartement, $parking, $jardin, $ascenseur, $proprietaire, $cout_construction, $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif, $id]);
    }


    //||**********************************||
    //||----------- SUPPRESSIONS ----------||
    //||**********************************||

    /**
     * Méthode pour supprimer un(e) transaction_changes
     *
     * @param $id
     * @return bool
     */
    static function Supprimer($id)
    {
        global $db;
        $req = $db->prepare('DELETE FROM transaction_changes WHERE id= ?');
        return $req->execute([$id]);
    }
}
