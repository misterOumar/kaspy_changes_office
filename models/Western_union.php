<?php
//||******************************************************||type_cartewestern_union
//||----------------- Kaspy Web Framework ----------------||
//||--- kaspy corporation, We're developing the future ---||
//||             Version: V1.0 ; Année : 2022             ||
//||******************************************************||


/**
 * Class western_union - Représente un(e) western_union
 */
class western_union
{
    public $id;
    public $code_pays_origine;
    public $code_devise_pays_origine;
    public $identifiant_terminal;
    public $identité_opérateur;
    public $super_op_identifiant;
    public $nom_utilisateur;
    public $mtncn;
    public $receveur;
    public $expediteur;
    public $code_pays_destination;
    public $code_devise_pays_destination;
    public $type_de_transaction;
    public $date;
    public $heure;
    public $montant_envoye;
    public $frais_de_transfert;
    public $montant_total_recueilli;
    public $taux_de_change;
    public $montant_paye_attendu;
    public $destinataire;
    public $total_frais;
    public $total_taxes;
    public $type_paiement;
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
     * western_union constructor.
     *
     * @param $id
     */
    public function __construct($id)
    {
        global $db;
        $id = strSecur($id);

        $req = $db->prepare('SELECT * FROM western_union WHERE id = ?');
        $req->execute([$id]);
        $data = $req->fetch();

        $this->id = $id;
        $this->code_pays_origine = $data['code_pays_origine'];
        $this->code_devise_pays_origine = $data['code_devise_pays_origine'];
        $this->identifiant_terminal = $data['identifiant_terminal'];
        $this->identité_opérateur = $data['identité_opérateur'];
        $this->super_op_identifiant = $data['super_op_identifiant'];
        $this->nom_utilisateur = $data['nom_utilisateur'];
        $this->mtncn = $data['mtncn'];
        $this->receveur = $data['receveur'];
        $this->expediteur = $data['expediteur'];
        $this->code_pays_destination = $data['code_pays_destination'];
        $this->code_devise_pays_destination = $data['code_devise_pays_destination'];
        $this->type_de_transaction = $data['type_de_transaction'];
        $this->date = $data['date'];
        $this->heure = $data['heure'];
        $this->montant_envoye = $data['montant_envoye'];
        $this->frais_de_transfert = $data['frais_de_transfert'];
        $this->montant_total_recueilli = $data['montant_total_recueilli'];
        $this->taux_de_change = $data['taux_de_change'];
        $this->montant_paye_attendu = $data['montant_paye_attendu'];
        $this->destinataire = $data['destinataire'];
        $this->total_frais = $data['total_frais'];
        $this->total_taxes = $data['total_taxes'];
        $this->type_paiement = $data['type_paiement'];

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
     * Renvoi la liste des western_union.
     *
     * @return array
     */
    static function getAll()
    {
        global $db;
        $req = $db->prepare("SELECT  * FROM western_union ORDER BY id");
        $req->execute([]);
        return $req->fetchAll();
    }
   
    
    /**
     * Méthode pour récupérer un(e) western_union en fonction de son id.
     *
     * @param $id
     * @return mixed
     */
    static function getByID($id)
    {
        global $db;
        $req = $db->prepare("SELECT * FROM western_union WHERE id = ?");
        $req->execute([$id]);
        return $req->fetch();
    }

    /**
     * Méthode de récupération du dernier element de la table western_union.
     *
     * @return mixed
     */
    static function getLast()
    {
        global $db;
        $req = $db->prepare("SELECT * FROM western_union  ORDER BY ID DESC LIMIT 1");
        $req->execute([]);
        return $req->fetch();
    }

    /**
     * Méthode de récupération du nombre d'enregistrement de la table western_union.
     *
     * @param $
     * @return mixed
     */
    static function getCount()
    {
        global $db;
        $req = $db->prepare("SELECT COUNT(*) FROM western_union ");
        $req->execute([]);
        return $req->fetch()[0];
    }

    /**
     * Méthode de récupération de western_union en fonction du nom_prenom.
     *
     * @param $nom_prenom
     * @return mixed
     */
    static function getByNom($nom_prenom)
    {
        global $db;
        $req = $db->prepare("SELECT * FROM western_union WHERE nom_prenom = ?");
        $req->execute([$nom_prenom]);
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
        SUM(CASE WHEN type_transaction = 'envoi' THEN total_frais ELSE 0 END) as frais_envoi,
        SUM(CASE WHEN type_transaction = 'envoi' THEN total_taxes ELSE 0 END) as taxe_envoi,
        SUM(CASE WHEN type_transaction = 'envoi' THEN montant_envoye ELSE 0 END) as montant_envoye,
        SUM(CASE WHEN type_transaction = 'envoi' THEN total_taxes +  montant_envoye ELSE 0 END) as total_envoi,
        SUM(CASE WHEN type_transaction != 'envoi' THEN  montant_envoye ELSE 0 END) as montant_paye,
        SUM(CASE WHEN type_transaction = 'envoi' THEN montant_envoye ELSE 0 END) as montant_payer_envoi
        FROM western_union GROUP BY magasin, date
        ORDER BY id");
        $req->execute([]);
        return $req->fetchAll();
    }

    //||**********************************||
    //||------------ INSERTIONS ------------||
    //||**********************************||
    /**
     * Méthode pour insérer un(e) western_union en base de données.
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
    static function Ajouter($code_pays_origine, $code_devise_pays_origine, $identifiant_terminal, $identité_opérateur, $super_op_identifiant, $nom_utilisateur, $mtncn, $receveur, $expediteur, $code_pays_destination, $code_devise_pays_destination, $type_de_transaction, $date, $heure, $montant_envoye, $frais_de_transfert, $montant_total_recueilli, $taux_de_change, $montant_paye_attendu, $total_frais,  $total_taxes, $type_de_paiement, $type_transaction, $magasin, $date_creation, $user_creation, $navigateur_creation, $ordinateur_creation, $ip_creation, $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif)
    {
        global $db;

        $req = $db->prepare('
            INSERT INTO western_union(code_pays_origine,code_devise_pays_origine,identifiant_terminal, identite_operateur,super_op_identifiant,nom_utilisateur,mtn_cn,receveur,expediteur,code_pays_destination,code_devise_pays_destination,type_de_transaction,date,heure,montant_envoye,frais_de_transfert,  montant_total_recueilli,taux_de_change, montant_paye_attendu, total_frais,total_taxes, type_de_paiement, type_transaction, magasin, date_creation, user_creation, navigateur_creation, ordinateur_creation, ip_creation, date_modif, user_modif, navigateur_modif, ordinateur_modif, ip_modif) 
            VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)      
        ');
        return $req->execute([$code_pays_origine, $code_devise_pays_origine, $identifiant_terminal, $identité_opérateur, $super_op_identifiant, $nom_utilisateur, $mtncn, $receveur, $expediteur, $code_pays_destination, $code_devise_pays_destination, $type_de_transaction, $date, $heure, $montant_envoye, $frais_de_transfert, $montant_total_recueilli, $taux_de_change, $montant_paye_attendu , $total_frais, $total_taxes, $type_de_paiement,$type_transaction, $magasin, $date_creation, $user_creation, $navigateur_creation, $ordinateur_creation, $ip_creation, $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif]);
    }


    //||**********************************||
    //||---------- MODIFICATIONS ----------||
    //||**********************************||
    /**
     * Méthode pour modifier un(e) western_union en base de données.
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
    static function Modifier($montant, $date, $client, $telephone_client, $destinataire, $telephone_destinataire,  $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif, $id)
    {
        global $db;
        $req = $db->prepare('
            UPDATE western_union SET montant = ?, client= ?, telephone_client = ?, destinataire = ?,telephone_destinataire =? date_modif = ?, user_modif = ?, navigateur_modif = ?, ordinateur_modif = ?, ip_modif = ? WHERE id= ?
        ');
        return $req->execute([$montant, $date, $client, $telephone_client, $destinataire, $telephone_destinataire,  $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif, $id]);
    }


    //||**********************************||
    //||----------- SUPPRESSIONS ----------||
    //||**********************************||

    /**
     * Méthode pour supprimer un(e) western_union
     *
     * @param $id
     * @return bool
     */
    static function Supprimer($id)
    {
        global $db;
        $req = $db->prepare('DELETE FROM western_union WHERE id= ?');
        return $req->execute([$id]);
    }
}
