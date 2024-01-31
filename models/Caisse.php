<?php
//||******************************************************||
//||----------------- Kaspy Web Framework ----------------||
//||--- kaspy corporation, We're developing the future ---||
//||             Version: V1.0 ; Année : 2022             ||
//||******************************************************||


/**
 * Class caisse - Représente un(e) caisse
 */
class caisse
{
    public $id;
    public $date;
    public $type_operation;
    public $libelle;
    public $montant;
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
     * caisse constructor.
     *
     * @param $id
     */
    public function __construct($id)
    {
        global $db;
        $id = strSecur($id);

        $req = $db->prepare('SELECT * FROM caisse WHERE id = ?');
        $req->execute([$id]);
        $data = $req->fetch();

        $this->id = $id;
        $this->montant = $data['montant'];
        $this->date = $data['date'];
        $this->type_operation = $data['type_operation'];
        $this->libelle = $data['libelle'];
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
     * Renvoi la liste des caisse.
     *
     * @return array
     */
    static function getAll($magasin)
    {
        global $db;
        $req = $db->prepare("SELECT * FROM caisse WHERE magasin =? ORDER BY id");
        $req->execute([$magasin]);
        return $req->fetchAll();
    }

    /**
     * Méthode pour récupérer un(e) caisse en fonction de son id.
     *
     * @param $id
     * @return mixed
     */
    static function getByID($id)
    {
        global $db;
        $req = $db->prepare("SELECT * FROM caisse WHERE id = ?");
        $req->execute([$id]);
        return $req->fetch();
    }

    /**
     * Méthode de récupération du dernier element de la table caisse.
     *
     * @return mixed
     */
    static function getLast()
    {
        global $db;
        $req = $db->prepare("SELECT * FROM caisse  ORDER BY ID DESC LIMIT 1");
        $req->execute([]);
        return $req->fetch();
    }

    /**
     * Méthode de récupération du nombre d'enregistrement de la table caisse.
     *
     * @param $
     * @return mixed
     */
    static function getCount()
    {
        global $db;
        $req = $db->prepare("SELECT COUNT(*) FROM caisse ");
        $req->execute([]);
        return $req->fetch()[0];
    }

    /**
     * Méthode de récupération de caisse en fonction du nom_prenom.
     *
     * @param $nom_prenom
     * @return mixed
     */
    static function getByClient($client)
    {
        global $db;
        $req = $db->prepare("SELECT * FROM caisse WHERE client = ?");
        $req->execute([$client]);
        return $req->fetch();
    }


    /**
     * Méthode de récupération du rapport de caisse des transactions.
     *
     * @param $nom_prenom
     * @return mixed
     */
    static function getAllRapport()
    {
        global $db;
        $req = $db->prepare(
            "SELECT `caisse`.`date` AS `date`,
            'Caisse' AS `op`,
        `caisse`.`type_operation` AS `type_transaction`,
        `caisse`.`libelle` AS 'Libelle',
        sum((case when (`caisse`.`type_operation` = 'Entrée') then `caisse`.`montant` else 0 end)) AS `ENTREE`,
        sum((case when (`caisse`.`type_operation` = 'Sortie') then `caisse`.`montant` else 0 end)) AS `SORTIE`,
        (sum((case when (`caisse`.`type_operation` = 'Entrée') then `caisse`.`montant` else 0 end)) - sum((case when (`caisse`.`type_operation` = 'Sortie') then `caisse`.`montant` else 0 end))) AS 'SOLDE'        
        FROM caisse GROUP BY `caisse`.`type_operation` UNION ALL SELECT * FROM `caisse_interne_transactions` GROUP BY `date`, `type_transaction` ORDER BY `date` ;"
        );
        $req->execute([]);
        return $req->fetchAll();
    }

    //||**********************************||
    //||------------ INSERTIONS ------------||
    //||**********************************||
    /**
     * Méthode pour insérer un(e) caisse en base de données.
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
        $date,
        $type_operation,
        $libelle,
        $montant,
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
            INSERT INTO caisse( date,type_operation, libelle,montant , magasin,  date_creation, user_creation, navigateur_creation, ordinateur_creation, ip_creation, date_modif, user_modif, navigateur_modif, ordinateur_modif, ip_modif) 
            VALUES(?,?,?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)      
        ');
        return $req->execute([$date, $type_operation, $libelle, $montant, $magasin, $date_creation, $user_creation, $navigateur_creation, $ordinateur_creation, $ip_creation, $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif]);
    }


    //||**********************************||
    //||---------- MODIFICATIONS ----------||
    //||**********************************||
    /**
     * Méthode pour modifier un(e) caisse en base de données.
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
    // static function Modifier($montant, $date, $client, $telephone_client, $destinataire, $telephone_destinataire,  $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif, $id)
    // {
    //     global $db;
    //     $req = $db->prepare('
    //         UPDATE caisse SET montant = ?, client= ?, libelle= ?, destinataire = ?,telephone_destinataire =? date_modif = ?, user_modif = ?, navigateur_modif = ?, ordinateur_modif = ?, ip_modif = ? WHERE id= ?
    //     ');
    //     return $req->execute([$montant, $date, $client, $telephone_client, $destinataire, $telephone_destinataire,  $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif, $id]);
    // }
    static function Modifier(

        $date,
        $type_operation,
        $libelle,
        $montant,
        $date_modif,
        $user_modif,
        $navigateur_modif,
        $ordinateur_modif,
        $ip_modif,
        $id
    ) {
        global $db;
        $req = $db->prepare('
        UPDATE caisse SET 
       
        date = ?,
        type_operation = ?,    
        libelle=?,
        montant = ?, 
        
        date_modif = ?,
        user_modif = ?, 
        navigateur_modif = ?,
        ordinateur_modif = ?,
        ip_modif = ?
        WHERE id = ?
    ');

        return $req->execute([
            $date, $type_operation,
            $libelle, $montant,
            $date_modif, $user_modif,
            $navigateur_modif, $ordinateur_modif, $ip_modif, $id
        ]);
    }


    //||**********************************||
    //||----------- SUPPRESSIONS ----------||
    //||**********************************||

    /**
     * Méthode pour supprimer un(e) caisse
     *
     * @param $id
     * @return bool
     */
    static function Supprimer($id)
    {
        global $db;
        $req = $db->prepare('DELETE FROM caisse WHERE id= ?');
        return $req->execute([$id]);
    }


    // caisse interne de transactions
}
