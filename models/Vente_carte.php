 <?php
//||******************************************************||
//||----------------- Kaspy Web Framework ----------------||
//||--- kaspy corporation, We're developing the future ---||
//||             Version: V1.0 ; Année : 2022             ||
//||******************************************************||


/**
 * Class vente_carte - Représente un(e) vente_carte
 */
class vente_carte
{
    public $id;
    public $montant;
    public $client;
    public $telephone;
    public $email;
    public $carte;
    public $numero_carte;
    public $prix_unitaire;
    public $quantite;
    public $date;
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
     * vente_carte constructor.
     *
     * @param $id
     */
    public function __construct($id)
    {
        global $db;
        $id = strSecur($id);

        $req = $db->prepare('SELECT * FROM vente_carte WHERE id = ?');
        $req->execute([$id]);
        $data = $req->fetch();

        $this->id = $id;
        $this->montant = $data['montant'];
        $this->client = $data['client'];
        $this->telephone = $data['telephone']; 
        $this->email = $data['email']; 
        $this->carte = $data['carte'];
        $this->numero_carte = $data['numero_carte'];
        $this->prix_unitaire = $data['prix_unitaire'];
        $this->quantite = $data['quantite'];
        $this->date = $data['date'];
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
     * Renvoi la liste des vente_carte.
     *
     * @return array
     */
    static function getAll()
    {
        global $db;
        $req = $db->prepare("SELECT * FROM vente_carte ORDER BY id");
        $req->execute([]);
        return $req->fetchAll();
    }

    /**
     * Méthode pour récupérer un(e) vente_carte en fonction de son id.
     *
     * @param $id
     * @return mixed
     */
    static function getByID($id)
    {
        global $db;
        $req = $db->prepare("SELECT * FROM vente_carte WHERE id = ?");
        $req->execute([$id]);
        return $req->fetch();
    }

    /**
     * Méthode de récupération du dernier element de la table vente_carte.
     *
     * @return mixed
     */
    static function getLast()
    {
        global $db;
        $req = $db->prepare("SELECT * FROM vente_carte  ORDER BY ID DESC LIMIT 1");
        $req->execute([]);
        return $req->fetch();
    }

    /**
     * Méthode de récupération du nombre d'enregistrement de la table vente_carte.
     *
     * @param $
     * @return mixed
     */
    static function getCount()
    {
        global $db;
        $req = $db->prepare("SELECT COUNT(*) FROM vente_carte ");
        $req->execute([]);
        return $req->fetch()[0];
    }

    /**
     * Méthode de récupération de vente_carte en fonction du nom_prenom.
     *
     * @param $nom_prenom
     * @return mixed
     */
    static function getByClient($client)
    {
        global $db;
        $req = $db->prepare("SELECT * FROM vente_carte WHERE client = ?");
        $req->execute([$client]);
        return $req->fetch();
    }

    //||**********************************||
    //||------------ INSERTIONS ------------||
    //||**********************************||
    /**
     * Méthode pour insérer un(e) vente_carte en base de données.
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
        $montant,
        $client,
        $telephone,         
        $email,         
        $carte,
        $numero_carte,
        $prix_unitaire,
        $quantite,
        $date,
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
            INSERT INTO vente_carte( montant,client,telephone, email,  carte, numero_carte,prix_unitaire,
             quantite, date,  date_creation, user_creation,
              navigateur_creation, ordinateur_creation, ip_creation,
               date_modif, user_modif, navigateur_modif,
                ordinateur_modif, ip_modif) 
            VALUES( ?,?, ?,?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)      
        ');
        return $req->execute([
            $montant,
            $client,
            $telephone,     
            $email,    
            $carte,
            $numero_carte,
            $prix_unitaire, $quantite,  $date,
            $date_creation, $user_creation, $navigateur_creation,
            $ordinateur_creation, $ip_creation, $date_modif,
            $user_modif, $navigateur_modif,
            $ordinateur_modif, $ip_modif
        ]);
    }


    //||**********************************||
    //||---------- MODIFICATIONS ----------||
    //||**********************************||
    /**
     * Méthode pour modifier un(e) vente_carte en base de données.
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
    // static function Modifier($date, $date, $client, $carte, $prix_unitaire, $quantite,  $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif, $id)
    // {
    //     global $db;
    //     $req = $db->prepare('
    //         UPDATE vente_carte SET montant = ?, client= ?, carte = ?, prix_unitaire = ?,quantite =? date_modif = ?, user_modif = ?, navigateur_modif = ?, ordinateur_modif = ?, ip_modif = ? WHERE id= ?
    //     ');
    //     return $req->execute([$date, $date, $client, $carte, $prix_unitaire, $quantite,  $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif, $id]);
    // }
    static function Modifier(
        $montant,
        $client,
        $telephone,   
        $email, 
        $carte,
        $numero_carte,
        $prix_unitaire,
        $quantite,
        $date,
        $date_modif,
        $user_modif,
        $navigateur_modif,
        $ordinateur_modif,
        $ip_modif,
        $id
    ) {
        global $db;
        $req = $db->prepare('
        UPDATE vente_carte SET    
          montant = ?,        
        client = ?,
        telephone = ?,       
        email = ?,       
        carte = ?, 
        numero_carte = ?,
        prix_unitaire = ?,
        quantite = ?,
        date = ?,
        date_modif = ?,
        user_modif = ?, 
        navigateur_modif = ?,
        ordinateur_modif = ?,
        ip_modif = ?
        WHERE id = ?
    ');

        return $req->execute([
            $montant,
            $client,
            $telephone,            
            $email,            
            $carte, 
            $numero_carte, 
            $prix_unitaire,
            $quantite,
            $date, $date_modif, $user_modif,
            $navigateur_modif, $ordinateur_modif, $ip_modif, $id
        ]);
    }


    //||**********************************||
    //||----------- SUPPRESSIONS ----------||
    //||**********************************||

    /**
     * Méthode pour supprimer un(e) vente_carte
     *
     * @param $id
     * @return bool
     */
    static function Supprimer($id)
    {
        global $db;
        $req = $db->prepare('DELETE FROM vente_carte WHERE id= ?');
        return $req->execute([$id]);
    }
}
