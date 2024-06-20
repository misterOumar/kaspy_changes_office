<?php
//||******************************************************||
//||----------------- Kaspy Web Framework ----------------||
//||--- kaspy corporation, We're developing the future ---||
//||             Version: V1.0 ; Année : 2022             ||
//||******************************************************||


/**
 * Class VenteDevise - Représente un(e) vente_devise
 */
class vente_devise
{
    public $id;
    public $dates;
    public $type_client;
    public $client;
    public $numero_piece;
    public $devise;
    public $quantite;
    public $taux_vente;
    public $montant_brut;
    public $remise;
    public $montant_net;
    public $mode_reglement;
    public $observation;
    public $exclus;
    public $montant_lettre;
    public $agence;
    public $annee;
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
     * vente_devises constructor.
     *
     * @param $id
     */
    public function __construct($id)
    {
        global $db;
        $id = strSecur($id);
        $req = $db->prepare('SELECT * FROM vente_devises WHERE id = ?');
        $req->execute([$id]);
        $data = $req->fetch();
        $this->id = $id;
        $this->dates = $data['dates'];
        $this->type_client = $data['type_client'];
        $this->client = $data['client'];
        $this->numero_piece = $data['numero_piece'];
        $this->devise = $data['devise'];
        $this->quantite = $data['quantite'];
        $this->taux_vente = $data['taux_vente'];
        $this->montant_brut = $data['montant_brut'];
        $this->remise = $data['remise'];
        $this->montant_net = $data['montant_net'];
        $this->mode_reglement = $data['mode_reglement'];
        $this->observation = $data['observation'];
        $this->exclus = $data['exclus'];
        $this->montant_lettre = $data['montant_lettre'];
        $this->agence = $data['agence'];
        $this->annee = $data['annee'];
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
        $req = $db->prepare("SELECT * FROM vente_devises ORDER BY id");
        $req->execute([]);
        return $req->fetchAll();
    }


    /**
     * recuperer tous les ventes de devises avec le symbole des devises
     */
    static function getAllWithDeviseSymbole()
    {
        global $db;
        $req = $db->prepare(
            "SELECT 
            vd.*, 
            d.symbole AS devise_symbole 
        FROM 
            vente_devises vd
        JOIN 
            devises d ON vd.devise = d.libelle
        ORDER BY 
            vd.id"
        );
        $req->execute([]);
        return $req->fetchAll();
    }

    /**
     * recuperer tous les ventes de devises avec le symbole des devises en fonction de la date
     * @param date
     */
    static function getByDateWithDeviseSymbole($date)
    {
        global $db;
        $req = $db->prepare(
            "SELECT 
            vd.*, 
            d.symbole AS devise_symbole 
        FROM 
            vente_devises vd
        JOIN 
            devises d ON vd.devise = d.libelle WHERE dates = ?
        ORDER BY 
            vd.id"
        );
        $req->execute([$date]);
        return $req->fetchAll();
    }


    /**
     * Méthode pour récupérer un(e) vente_devises en fonction de son id.
     *
     * @param $id
     * @return mixed
     */
    static function getByID($id)
    {
        global $db;
        $req = $db->prepare("SELECT * FROM vente_devises WHERE id = ?");
        $req->execute([$id]);
        return $req->fetch();
    }


    /**
     * Méthode de récupération du dernier element de la table vente_devises.
     *
     * @return mixed
     */
    static function getLast()
    {
        global $db;
        $req = $db->prepare("SELECT * FROM vente_devises  ORDER BY id DESC LIMIT 1");
        $req->execute([]);
        return $req->fetch();
    }


    /**
     * Méthode de récupération du nombre d'enregistrement de la table vente_devises.
     *
     * @return mixed
     */
    static function getCount()
    {
        global $db;
        $req = $db->prepare("SELECT COUNT(*) FROM vente_devises");
        $req->execute([]);
        return $req->fetch()[0];
    }


    /**
     * Méthode de récupération de vente_devises en fonction du vente_devises.
     *
     * @param $vente_devises
     * @return mixed
     */
    static function getByClient($client)
    {
        global $db;
        $req = $db->prepare("SELECT * FROM vente_devises WHERE client= ? ");
        $req->execute([$client]);
        return $req->fetch();
    }


    //||**********************************||
    //||----------- INSERTIONS -----------||
    //||**********************************||
    /**
     * Méthode pour insérer un(e) vente_devises en base de données.
     *
     * @param $vente_devises
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
        $dates,
        $type_client,
        $client,
        $numero_piece,
        $devise,
        $quantite,
        $taux_vente,
        $montant_brut,
        $remise,
        $montant_net,
        $mode_reglement,
        $observation,
        $exclus,
        $montant_lettre,

        $agence,
        $annee,
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
            INSERT INTO vente_devises(dates, type_client, client, numero_piece, devise, quantite, taux_vente, montant_brut, remise, montant_net, mode_reglement, observation, exclus, montant_lettre,  agence, annee, date_creation,user_creation, navigateur_creation, ordinateur_creation, ip_creation, date_modif, user_modif, navigateur_modif, ordinateur_modif, ip_modif) 
            VALUES(?, ?, ? ,? ,? ,? , ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)      
        ');
        return $req->execute([$dates,  $type_client, $client, $numero_piece, $devise,  $quantite, $taux_vente, $montant_brut, $remise,  $montant_net, $mode_reglement, $observation, $exclus, $montant_lettre,  $agence, $annee, $date_creation, $user_creation, $navigateur_creation, $ordinateur_creation, $ip_creation, $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif]);
    }


    //||**********************************||
    //||---------- MODIFICATIONS ---------||
    //||**********************************||
    /**
     * Méthode pour modifier un(e) vente_devises en base de données.
     *
     * @param $vente_devises
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
        $dates,
        $type_client,
        $numero_piece,
        $quantite,
        $taux_vente,
        $montant_brut,
        $remise,
        $montant_net,
        $mode_reglement,
        $observation,
        $exclus,
        $montant_lettre,
        $agence,
        $annee,
        $date_modif,
        $user_modif,
        $navigateur_modif,
        $ordinateur_modif,
        $ip_modif,
        $id
    ) {
        global $db;
        $req = $db->prepare('
            UPDATE vente_devises SET dates =?, type_client=?,  numero_piece=?, quantite = ?, taux_vente = ?, montant_brut = ?, remise = ?, montant_net = ?, mode_reglement = ?, observation = ?, exclus = ?, montant_lettre = ?,  agence = ?, annee = ?, date_modif = ?,
             user_modif = ?, navigateur_modif = ?, ordinateur_modif = ?, ip_modif = ? WHERE id= ?
        ');
        return $req->execute([
            $dates,
            $type_client,
            $numero_piece,
            $quantite,
            $taux_vente,
            $montant_brut,
            $remise,
            $montant_net,
            $mode_reglement,
            $observation,
            $exclus,
            $montant_lettre,
            $agence,
            $annee,
            $date_modif,
            $user_modif,
            $navigateur_modif,
            $ordinateur_modif,
            $ip_modif, $id
        ]);
    }


    //||**********************************||
    //||----------- SUPPRESSIONS ---------||
    //||**********************************||

    /**
     * Méthode pour supprimer un(e) vente_devises
     *
     * @param $id
     * @return bool
     */
    static function Supprimer($id)
    {
        global $db;
        $req = $db->prepare('DELETE FROM vente_devises WHERE id= ?');
        return $req->execute([$id]);
    }
}
