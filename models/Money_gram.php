<?php
//||******************************************************||
//||----------------- Kaspy Web Framework ----------------||
//||--- kaspy corporation, We're developing the future ---||
//||             Version: V1.0 ; Année : 2022             ||
//||******************************************************||


/**
 * Class money_gram - Représente un(e) money_gram
 */
class money_gram
{
    public $id;
    public $Heure_et_date;
    public $Num_Ref;
    public $Identifiant_utilisateur;
    public $ID_point_vente;
    public $Montant;
    public $Frais;
    public $Total;
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
     * money_gram constructor.
     *
     * @param $id
     */
    public function __construct($id)
    {
        global $db;
        $id = strSecur($id);

        $req = $db->prepare('SELECT * FROM transaction_money_gram WHERE id = ?');
        $req->execute([$id]);
        $data = $req->fetch();

        $this->id = $id;
        $this->Heure_et_date = $data['Heure_et_date'];
        $this->Num_Ref = $data['Num_Ref'];
        $this->Identifiant_utilisateur = $data['Identifiant_utilisateur'];
        $this->ID_point_vente = $data['ID_point_vente'];
        $this->Montant = $data['Montant'];
        $this->Frais = $data['Frais'];
        $this->Total = $data['Total'];
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
     * Renvoi la liste des transaction_money_gram.
     *
     * @return array
     */
    static function getAll()
    {
        global $db;
        $req = $db->prepare("select transaction_money_gram.*,
        login.nom_prenom as nom_prenom from transaction_money_gram 
        left join login on transaction_money_gram.ajouter_par = login.id
       	where transaction_money_gram.Num_Ref != 'Num_Ref' order by transaction_money_gram.id");
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
    FROM transaction_money_gram
    WHERE DATE(date_creation) = CURDATE();
    ");
        $req->execute([]);
        return $req->fetchAll();
    }

    /**
     * Méthode pour récupérer un(e) transaction_money_gram en fonction de son id.
     *
     * @param $id
     * @return mixed
     */
    static function getByID($id)
    {
        global $db;
        $req = $db->prepare("select transaction_money_gram.*,
        login.nom_prenom as nom_prenom from transaction_money_gram 
        left join login on transaction_money_gram.ajouter_par = login.id
       	where transaction_money_gram.id = ? order by transaction_money_gram.id");
        $req->execute([$id]);
        return $req->fetch();
    }

    /**
     * Méthode de récupération du dernier element de la table transaction_money_gram.
     *
     * @return mixed
     */
    static function getLast()
    {
        global $db;
        $req = $db->prepare("SELECT * FROM transaction_money_gram  ORDER BY ID DESC LIMIT 1");
        $req->execute([]);
        return $req->fetch();
    }

    /**
     * Méthode de récupération du nombre d'enregistrement de la table transaction_money_gram.
     *
     * @param $
     * @return mixed
     */
    static function getCount()
    {
        global $db;
        $req = $db->prepare("SELECT COUNT(*) FROM transaction_money_gram ");
        $req->execute([]);
        return $req->fetch()[0];
    }
    /**
     * Méthode de récupération du nombre de transaction transaction_money_gram par jour.
     *
     * @param $
     * @return mixed
     */
    static function getCountByDay()
    {
        global $db;
        $req = $db->prepare("SELECT COUNT(*) AS nombre_transaction
        FROM transaction_money_gram
        WHERE DATE(date_creation) = CURDATE();
        ");
        $req->execute([]);
        return $req->fetch()[0];
    }

    //||**********************************||
    //||------------ INSERTIONS ------------||
    //||**********************************||
    /**
     * Méthode pour insérer un(e) transaction_money_gram en base de données.
     *
     * @param $Heure_et_date
     * @param $Num_Ref
     * @param $Identifiant_utilisateur
     * @param $ID_point_vente
     * @param $Montant
     * @param $Frais
     * @param $Total
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
    static function Ajouter($id, $Heure_et_date, $Num_Ref, $Identifiant_utilisateur, $ID_point_vente, $Montant, $Frais, $Total, $ajouter_par, $date_creation, $user_creation, $navigateur_creation, $ordinateur_creation, $ip_creation, $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif)
    {
        global $db;

        $req = $db->prepare('
            INSERT INTO transaction_money_gram(id, Heure_et_date, Num_Ref, Identifiant_utilisateur, ID_point_vente, Montant, Frais, Total, ajouter_par,  date_creation, user_creation, navigateur_creation, ordinateur_creation, ip_creation, date_modif, user_modif, navigateur_modif, ordinateur_modif, ip_modif) 
            VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ');
        return $req->execute([$id, $Heure_et_date, $Num_Ref, $Identifiant_utilisateur, $ID_point_vente, $Montant, $Frais, $Total, $ajouter_par, $date_creation, $user_creation, $navigateur_creation, $ordinateur_creation, $ip_creation, $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif]);
    }


    //||**********************************||
    //||---------- MODIFICATIONS ----------||
    //||**********************************||
    /**
     * Méthode pour modifier un(e) transaction_money_gram en base de données.
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
            UPDATE transaction_money_gram SET libelle = ?, type_batiment = ?, nombre_appartement = ?, parking = ?, jardin = ?, ascenseur = ?, proprietaire= ?, cout_construction= ?,  date_modif = ?, user_modif = ?, navigateur_modif = ?, ordinateur_modif = ?, ip_modif = ? WHERE id= ?
        ');
        return $req->execute([$libelle, $type_batiment, $nombre_appartement, $parking, $jardin, $ascenseur, $proprietaire, $cout_construction, $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif, $id]);
    }


    //||**********************************||
    //||----------- SUPPRESSIONS ----------||
    //||**********************************||

    /**
     * Méthode pour supprimer un(e) transaction_money_gram
     *
     * @param $id
     * @return bool
     */
    static function Supprimer($id)
    {
        global $db;
        $req = $db->prepare('DELETE FROM transaction_money_gram WHERE id= ?');
        return $req->execute([$id]);
    }
}
