<?php
//||******************************************************||type_carteria
//||----------------- Kaspy Web Framework ----------------||
//||--- kaspy corporation, We're developing the future ---||
//||             Version: V1.0 ; Année : 2022             ||
//||******************************************************||


/**
 * Class ria - Représente un(e) ria
 */
class ria
{
    public $id;
    public $num_transfert;
    public $pin;
    public $mode_livraison;
    public $caissier;
    public $agence;
    public $code_agence;
    public $agence_recon;
    public $code_agence_recon;
    public $montant_envoye;
    public $devise_envoye;
    public $pays_envoi;
    public $pays_destination;
    public $montant_paye;
    public $devise_paiement;
    public $montant_commission;
    public $devise_commission;
    public $date;
    public $taux;
    public $tob;
    public $tthu;
    public $frais;
    public $actions;
    public $total_taxes;
    public $type_paiement;
    public $date_creation;
    public $magasin;
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
     * ria constructor.
     *
     * @param $id
     */
    public function __construct($id)
    {
        global $db;
        $id = strSecur($id);

        $req = $db->prepare('SELECT * FROM ria WHERE id = ?');
        $req->execute([$id]);
        $data = $req->fetch();

        $this->id = $id;
        $this->num_transfert = $data['num_transfert'];
        $this->pin = $data['pin'];
        $this->mode_livraison = $data['mode_livraison'];
        $this->caissier = $data['caissier'];
        $this->agence = $data['agence'];
        $this->code_agence = $data['code_agence'];
        $this->code_agence_recon = $data['code_agence_recon'];
        $this->montant_envoye = $data['montant_envoye'];
        $this->devise_envoye = $data['devise_envoye'];
        $this->pays_envoi = $data['pays_envoi'];
        $this->pays_destination = $data['pays_destination'];
        $this->montant_paye = $data['montant_paye'];
        $this->devise_paiement = $data['devise_paiement'];
        $this->montant_commission = $data['montant_commission'];
        $this->devise_commission = $data['devise_commission'];
        $this->date = $data['date'];
        $this->taux = $data['taux'];
        $this->tob = $data['tob'];
        $this->tthu = $data['tthu'];
        $this->frais = $data['frais'];
        $this->actions = $data['actions'];
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
     * Renvoi la liste des ria.
     *
     * @return array
     */
    static function getAll()
    {
        global $db;
        $req = $db->prepare("SELECT  * FROM ria ORDER BY id");
        $req->execute([]);
        return $req->fetchAll();
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
        SUM(CASE WHEN actions = 'Envoi' THEN 1 ELSE 0 END) as operation_envoi, 
        SUM(CASE WHEN actions != 'Envoi' THEN 1 ELSE 0 END) as operation_payer,
        SUM(CASE WHEN actions = 'Envoi' THEN frais ELSE 0 END) as frais_envoi,
        SUM(CASE WHEN actions = 'Envoi' THEN montant_paye ELSE 0 END) as montant_payer_envoi
        FROM ria GROUP BY magasin, date_creation 
        ORDER BY id");
        $req->execute([]);
        return $req->fetchAll();
    }


    /**
     * Méthode pour récupérer un(e) ria en fonction de son id.
     *
     * @param $id
     * @return mixed
     */
    static function getByID($id)
    {
        global $db;
        $req = $db->prepare("SELECT * FROM ria WHERE id = ?");
        $req->execute([$id]);
        return $req->fetch();
    }

    /**
     * Méthode de récupération du dernier element de la table ria.
     *
     * @return mixed
     */
    static function getLast()
    {
        global $db;
        $req = $db->prepare("SELECT * FROM ria  ORDER BY ID DESC LIMIT 1");
        $req->execute([]);
        return $req->fetch();
    }

    /**
     * Méthode de récupération du nombre d'enregistrement de la table ria.
     *
     * @param $
     * @return mixed
     */
    static function getCount()
    {
        global $db;
        $req = $db->prepare("SELECT COUNT(*) FROM ria ");
        $req->execute([]);
        return $req->fetch()[0];
    }

    static function getRetrait()
    {
        global $db;
        $req = $db->prepare("SELECT SUM(montant_paye) FROM ria where pays_envoi !='Cote d Ivoire' ");
        $req->execute([]);
        return $req->fetchColumn();
    }
        static function getDepot()
    {
        global $db;
        $req = $db->prepare("SELECT SUM(montant_paye) FROM ria where pays_envoi ='Cote d Ivoire' ");
        $req->execute([]);
        return $req->fetchColumn();
    } 



    static function getFraisRetrait()
    {
        global $db;
        $req = $db->prepare("SELECT SUM(frais) FROM ria where pays_envoi !='Cote d Ivoire' ");
        $req->execute([]);
        return $req->fetchColumn();
    }
        static function getFraisDepot()
    {
        global $db;
        $req = $db->prepare("SELECT SUM(frais) FROM ria where pays_envoi ='Cote d Ivoire' ");
        $req->execute([]);
        return $req->fetchColumn();
    } 


    static function getTauxRetrait()
    {
        global $db;
        $req = $db->prepare("SELECT SUM(taux) FROM ria where pays_envoi !='Cote d Ivoire' ");
        $req->execute([]);
        return $req->fetchColumn();
    }
        static function getTauxDepot()
    {
        global $db;
        $req = $db->prepare("SELECT SUM(taux) FROM ria where pays_envoi ='Cote d Ivoire' ");
        $req->execute([]);
        return $req->fetchColumn();
    } 
    /**
     * Méthode de récupération de ria en fonction du nom_prenom.
     *
     * @param $nom_prenom
     * @return mixed
     */


    //||**********************************||
    //||------------ INSERTIONS ------------||
    //||**********************************||
    /**
     * Méthode pour insérer un(e) ria en base de données.
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
        $num_transfert,
        $pin,
        $mode_livraison,
        $caissier,
        $agence,
        $code_agence,
        $agence_recon,
        $code_agence_recon,
        $montant_envoye,
        $devise_envoye,
        $pays_envoi,
        $pays_destination,
        $montant_paye,
        $devise_paiement,
        $montant_commission,
        $devise_commission,
        $date,
        $taux,
        $tob,
        $tthu,
        $frais,
        $actions,
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
            INSERT INTO ria( num_transfert, pin, mode_livraison,caissier,agence,code_agence, agence_recon,code_agence_recon, montant_envoye,devise_envoye,  pays_envoi,pays_destination,  montant_paye,devise_paiement,  montant_commission, devise_commission, date,taux,tob,  tthu, frais,  actions, magasin, date_creation, user_creation, navigateur_creation, ordinateur_creation, ip_creation,   date_modif, user_modif, navigateur_modif, ordinateur_modif, ip_modif) 
            VALUES(?, ?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?)      
        ');
        return $req->execute([

            $num_transfert,
            $pin,
            $mode_livraison,
            $caissier,
            $agence,
            $code_agence,
            $agence_recon,
            $code_agence_recon,
            $montant_envoye,
            $devise_envoye,
            $pays_envoi,
            $pays_destination,
            $montant_paye,
            $devise_paiement,
            $montant_commission,
            $devise_commission,
            $date,
            $taux,
            $tob,
            $tthu,
            $frais,
            $actions,
            $magasin,
            $date_creation, $user_creation, $navigateur_creation, $ordinateur_creation, $ip_creation, $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif
        ]);
    }


    //||**********************************||
    //||---------- MODIFICATIONS ----------||
    //||**********************************||
    /**
     * Méthode pour modifier un(e) ria en base de données.
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
     * @param $  date_modif
     * @param $user_modif
     * @param $navigateur_modif
     * @param $ordinateur_modif
     * @param $ip_modif
     * @return bool
     */
    // static function Modifier($montant, $montant_paye, $client, $telephone_client, $frais, $telephone_frais,  $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif, $id)
    // {
    //     global $db;
    //     $req = $db->prepare('
    //         UPDATE ria SET montant = ?, client= ?, telephone_client = ?, frais = ?,telephone_frais =?   date_modif = ?, user_modif = ?, navigateur_modif = ?, ordinateur_modif = ?, ip_modif = ? WHERE id= ?
    //     ');
    //     return $req->execute([$montant, $montant_paye, $client, $telephone_client, $frais, $telephone_frais,  $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif, $id]);
    // }


    //||**********************************||
    //||----------- SUPPRESSIONS ----------||
    //||**********************************||

    /**
     * Méthode pour supprimer un(e) ria
     *
     * @param $id
     * @return bool
     */
    static function Supprimer($id)
    {
        global $db;
        $req = $db->prepare('DELETE FROM ria WHERE id= ?');
        return $req->execute([$id]);
    }
}
