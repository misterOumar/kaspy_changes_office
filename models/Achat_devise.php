<?php
//||******************************************************||
//||----------------- Kaspy Web Framework ----------------||
//||--- kaspy corporation, We're developing the future ---||
//||             Version: V1.0 ; Année : 2022             ||
//||******************************************************||


/**
 * Class AchatDevise - Représente un(e) achat_devise
 */
class achat_devise
{
    public $id;
    public $dates;
    public $type_emetteur;
    public $emetteur_approvisionnement;
    public $numero_piece;
    public $devise;
    public $quantite;
    public $taux_achat;
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
     * achat_devises constructor.
     *
     * @param $id
     */
    public function __construct($id)
    {
        global $db;
        $id = strSecur($id);
        $req = $db->prepare('SELECT * FROM achat_devises WHERE id = ?');
        $req->execute([$id]);
        $data = $req->fetch();
        $this->id = $id;
        $this->dates = $data['dates'];
        $this->type_emetteur = $data['type_emetteur'];
        $this->emetteur_approvisionnement = $data['emetteur_approvisionnement'];
        $this->numero_piece = $data['numero_piece'];
        $this->devise = $data['devise'];
        $this->quantite = $data['quantite'];
        $this->taux_achat = $data['taux_achat'];
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



    /**
     * recuperer tous les achtats de devises
     */
    static function getAll()
    {
        global $db;
        $req = $db->prepare("SELECT * FROM achat_devises ORDER BY id");
        $req->execute([]);
        return $req->fetchAll();
    }

    /**
     * recuperer tous les achtats de devises avec le symbole des devises
     */
    static function getAllWithDeviseSymbole()
    {
        global $db;
        $req = $db->prepare(
            "SELECT 
            ad.*, 
            d.symbole AS devise_symbole 
        FROM 
            achat_devises ad
        JOIN 
            devises d ON ad.devise = d.libelle
        ORDER BY 
            ad.id"
        );
        $req->execute([]);
        return $req->fetchAll();
    }


    /**
     * recuperer tous les achtats de devises avec le symbole des devises
     */
    static function getByDateWithDeviseSymbole($date)
    {
        global $db;
        $req = $db->prepare(
            "SELECT 
            ad.*, 
            d.symbole AS devise_symbole 
        FROM 
            achat_devises ad 
        JOIN 
            devises d ON ad.devise = d.libelle WHERE dates = ?
        ORDER BY 
            ad.id"
        );
        $req->execute([$date]);
        return $req->fetchAll();
    }

    /**
     * recuperer tous le rapport des achtats et ventes de devises avec le symbole des devises
     */
    static function getRapportChanges()
    {
        global $db;
        $req = $db->prepare("SELECT * FROM resume_operations_changes ORDER BY dates");
        $req->execute([]);
        return $req->fetchAll();
    }


    /**
     * recuperer  le rapport des achats et ventes de devises en fonction de la date
     */
    static function getRapportChangesByDate($date)
    {
        global $db;
        $req = $db->prepare("SELECT * FROM resume_operations_changes WHERE dates = ? ORDER BY dates");
        $req->execute([$date]);
        return $req->fetchAll();
    }


    /**
     * Méthode pour récupérer un(e) achat_devises en fonction de son id.
     *
     * @param $id
     * @return mixed
     */
    static function getByID($id)
    {
        global $db;
        $req = $db->prepare("SELECT * FROM achat_devises WHERE id = ?");
        $req->execute([$id]);
        return $req->fetch();
    }


    /**
     * Méthode de récupération du dernier element de la table achat_devises.
     *
     * @return mixed
     */
    static function getLast()
    {
        global $db;
        $req = $db->prepare("SELECT * FROM achat_devises  ORDER BY id DESC LIMIT 1");
        $req->execute([]);
        return $req->fetch();
    }


    /**
     * Méthode de récupération du nombre d'enregistrement de la table achat_devises.
     *
     * @return mixed
     */
    static function getCount()
    {
        global $db;
        $req = $db->prepare("SELECT COUNT(*) FROM achat_devises");
        $req->execute([]);
        return $req->fetch()[0];
    }


    /**
     * Méthode de récupération de achat_devises en fonction du achat_devises.
     *
     * @param $achat_devises
     * @return mixed
     */
    static function getByClient($emetteur_approvisionnement)
    {
        global $db;
        $req = $db->prepare("SELECT * FROM achat_devises WHERE emetteur_approvisionnement= ? ");
        $req->execute([$emetteur_approvisionnement]);
        return $req->fetch();
    }


    //||**********************************||
    //||----------- INSERTIONS -----------||
    //||**********************************||
    /**
     * Méthode pour insérer un(e) achat_devises en base de données.
     *
     * @param $achat_devises
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
        $type_emetteur,
        $emetteur_approvisionnement,
        $numero_piece,
        $devise,
        $quantite,
        $taux_achat,
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
            INSERT INTO achat_devises(dates, type_emetteur, emetteur_approvisionnement, numero_piece, devise, quantite, taux_achat, montant_brut, remise, montant_net, mode_reglement, observation, exclus, montant_lettre,  agence, annee, date_creation,user_creation, navigateur_creation, ordinateur_creation, ip_creation, date_modif, user_modif, navigateur_modif, ordinateur_modif, ip_modif) 
            VALUES(?, ?, ? ,? ,? ,? , ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)      
        ');
        return $req->execute([$dates,  $type_emetteur, $emetteur_approvisionnement, $numero_piece, $devise,  $quantite, $taux_achat, $montant_brut, $remise,  $montant_net, $mode_reglement, $observation, $exclus, $montant_lettre,  $agence, $annee, $date_creation, $user_creation, $navigateur_creation, $ordinateur_creation, $ip_creation, $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif]);
    }


    //||**********************************||
    //||---------- MODIFICATIONS ---------||
    //||**********************************||
    /**
     * Méthode pour modifier un(e) achat_devises en base de données.
     *
     * @param $achat_devises
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
        $type_emetteur,
        $numero_piece,
        $quantite,
        $taux_achat,
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
            UPDATE achat_devises SET dates =?, type_emetteur=?,  numero_piece=?, quantite = ?, taux_achat = ?, montant_brut = ?, remise = ?, montant_net = ?, mode_reglement = ?, observation = ?, exclus = ?, montant_lettre = ?,  agence = ?, annee = ?, date_modif = ?,
             user_modif = ?, navigateur_modif = ?, ordinateur_modif = ?, ip_modif = ? WHERE id= ?
        ');
        return $req->execute([
            $dates,
            $type_emetteur,
            $numero_piece,
            $quantite,
            $taux_achat,
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
     * Méthode pour supprimer un(e) achat_devises
     *
     * @param $id
     * @return bool
     */
    static function Supprimer($id)
    {
        global $db;
        $req = $db->prepare('DELETE FROM achat_devises WHERE id= ?');
        return $req->execute([$id]);
    }
}
