<?php
//||******************************************************||
//||----------------- Kaspy Web Framework ----------------||
//||--- kaspy corporation, We're developing the future ---||
//||             Version: V1.0 ; Année : 2022             ||
//||******************************************************||


/**
 * Class bureaux - Représente un(e) bureaux
 */
class bureaux
{
    public $id;
    public $libelle;
    public $responsable;
    public $raison_sociale;
    public $adresse;
    public $sigle;
    public $slogan;
    public $tel1;
    public $tel2;
    public $fixe;
    public $fax;
    public $email;
    public $bp;
    public $site_internet;
    public $pays;
    public $ville;
    public $activites;
    public $forme_juridique;
    public $rccm;
    public $compte_contribuable;
    public $regime_imposition;
    public $centre_impôts;
    public $capital_social;
    public $compte_Bancaire;
    public $monnaie;
    public $n_agrement_1;
    public $n_agrement_2;
    public $pied_page;
    public $logo_etats;
    public $logo_reçu_inscription;
    public $logo_pc;
    public $image_emblème;
    public $annee_academique;
    public $ecole;
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
     * bureaux constructeur.
     *
     * @param $id
     */
    public function __construct($id)
    {
        global $db;
        $id = strSecur($id);

        $req = $db->prepare('SELECT * FROM bureaux WHERE id = ?');
        $req->execute([$id]);
        $data = $req->fetch();

        $this->id = $id;
        $this->libelle = $data['libelle'];
        $this->responsable = $data['responsable'];
        $this->raison_sociale = $data['raison_sociale'];
        $this->adresse = $data['adresse'];
        $this->sigle = $data['sigle'];
        $this->slogan = $data['slogan'];
        $this->tel1 = $data['tel1'];
        $this->tel2 = $data['tel2'];
        $this->fixe = $data['fixe'];
        $this->fax = $data['fax'];
        $this->email = $data['email'];
        $this->bp = $data['bp'];
        $this->site_internet = $data['site_internet'];
        $this->pays = $data['pays'];
        $this->ville = $data['ville'];
        $this->activites = $data['activites'];
        $this->forme_juridique = $data['forme_juridique'];
        $this->rccm = $data['rccm'];
        $this->compte_contribuable = $data['compte_contribuable'];
        $this->regime_imposition = $data['regime_imposition'];
        $this->centre_impôts = $data['centre_impôts'];
        $this->capital_social = $data['capital_social'];
        $this->compte_Bancaire = $data['compte_Bancaire'];
        $this->monnaie = $data['monnaie'];
        $this->n_agrement_1 = $data['n_agrement_1'];
        $this->n_agrement_2 = $data['n_agrement_2'];
        $this->pied_page = $data['pied_page'];
        $this->logo_etats = $data['logo_etats'];
        $this->logo_reçu_inscription = $data['logo_reçu_inscription'];
        $this->logo_pc = $data['logo_pc'];
        $this->image_emblème = $data['image_emblème'];
        $this->annee_academique = $data['annee_academique'];
        $this->ecole = $data['ecole'];
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
     * Renvoi la liste des bureaux.
     *
     * @return array
     */
    static function getAll()
    {
        global $db;
        $req = $db->prepare("SELECT * FROM bureaux ORDER BY id");
        $req->execute([]);
        return $req->fetchAll();
    }

    /**
     * Méthode pour récupérer un(e) bureaux en fonction de son id.
     *
     * @param $id
     * @return mixed
     */
    static function getByID($id)
    {
        global $db;
        $req = $db->prepare("SELECT * FROM bureaux WHERE id = ?");
        $req->execute([$id]);
        return $req->fetch();
    }



    /**
     * Méthode de récupération du dernier element de la table bureaux.
     *
     * @return mixed
     */
    static function getLast()
    {
        global $db;
        $req = $db->prepare("SELECT * FROM bureaux  ORDER BY id DESC LIMIT 1");
        $req->execute([]);
        return $req->fetch();
    }


    /**
     * Méthode de récupération du nombre d'enregistrement de la table bureaux.
     *
     * @return mixed
     */
    static function getCount()
    {
        global $db;
        $req = $db->prepare("SELECT COUNT(*) FROM bureaux");
        $req->execute([]);
        return $req->fetch()[0];
    }


    /**
     * Méthode de récupération de bureaux en fonction du libelle.
     *
     * @param $libelle
     * @return mixed
     */
    static function getByNom($libelle)
    {
        global $db;
        $req = $db->prepare("SELECT * FROM bureaux WHERE libelle = ? ");
        $req->execute([$libelle]);
        return $req->fetch();
    }




    //||**********************************||
    //||----------- INSERTIONS -----------||
    //||**********************************||
    /**
     * Méthode pour insérer un(e) bureaux en base de données.
     *
     * @param $libelle
     * @param $responsable
     * @param $raison_sociale
     * @param $adresse
     * @param $sigle
     * @param $slogan
     * @param $tel1
     * @param $tel2
     * @param $fixe
     * @param $fax
     * @param $email
     * @param $bp
     * @param $site_internet
     * @param $pays
     * @param $ville
     * @param $activites
     * @param $forme_juridique
     * @param $rccm
     * @param $compte_contribuable
     * @param $regime_imposition
     * @param $centre_impôts
     * @param $capital_social
     * @param $compte_Bancaire
     * @param $monnaie
     * @param $n_agrement_1
     * @param $n_agrement_2
     * @param $pied_page
     * @param $logo_etats
     * @param $logo_reçu_inscription
     * @param $logo_pc
     * @param $image_emblème
     * @param $annee_academique
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
    static function Ajouter($id, $libelle, $responsable, $raison_sociale, $adresse, $sigle, $slogan, $tel1, $tel2, $fixe, $fax, $email, $bp, $site_internet, $pays, $ville, $activites, $forme_juridique, $rccm, $compte_contribuable, $regime_imposition, $centre_impôts, $capital_social, $compte_Bancaire, $monnaie, $n_agrement_1, $n_agrement_2, $pied_page, $logo_etats, $logo_reçu_inscription, $logo_pc, $image_emblème, $annee_academique, $ecole, $date_creation, $user_creation, $navigateur_creation, $ordinateur_creation, $ip_creation, $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif)
    {
        global $db;

        $req = $db->prepare('
            INSERT INTO bureaux(id, libelle, responsable, raison_sociale, adresse, sigle, slogan, tel1, tel2, fixe, fax, email, bp, site_internet, pays, ville, activites, forme_juridique, rccm, compte_contribuable, regime_imposition, centre_impôts, capital_social, compte_Bancaire, monnaie, n_agrement_1, n_agrement_2, pied_page, logo_etats, logo_reçu_inscription, logo_pc, image_emblème, annee_academique, ecole, date_creation, user_creation, navigateur_creation, ordinateur_creation, ip_creation, date_modif, user_modif, navigateur_modif, ordinateur_modif, ip_modif) 
            VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)      
        ');
        return $req->execute([$id, $libelle, $responsable, $raison_sociale, $adresse, $sigle, $slogan, $tel1, $tel2, $fixe, $fax, $email, $bp, $site_internet, $pays, $ville, $activites, $forme_juridique, $rccm, $compte_contribuable, $regime_imposition, $centre_impôts, $capital_social, $compte_Bancaire, $monnaie, $n_agrement_1, $n_agrement_2, $pied_page, $logo_etats, $logo_reçu_inscription, $logo_pc, $image_emblème, $annee_academique, $ecole, $date_creation, $user_creation, $navigateur_creation, $ordinateur_creation, $ip_creation, $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif]);
    }


    //||**********************************||
    //||---------- MODIFICATIONS ---------||
    //||**********************************||
    /**
     * Méthode pour modifier un(e) bureaux en base de données.
     *
     * @param $libelle
     * @param $responsable
     * @param $raison_sociale
     * @param $adresse
     * @param $sigle
     * @param $slogan
     * @param $tel1
     * @param $tel2
     * @param $fixe
     * @param $fax
     * @param $email
     * @param $bp
     * @param $site_internet
     * @param $pays
     * @param $ville
     * @param $activites
     * @param $forme_juridique
     * @param $rccm
     * @param $compte_contribuable
     * @param $regime_imposition
     * @param $centre_impôts
     * @param $capital_social
     * @param $compte_Bancaire
     * @param $monnaie
     * @param $n_agrement_1
     * @param $n_agrement_2
     * @param $pied_page
     * @param $logo_etats
     * @param $logo_reçu_inscription
     * @param $logo_pc
     * @param $image_emblème
     * @param $annee_academique
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
    static function Modifier($libelle, $responsable, $raison_sociale, $adresse, $sigle, $slogan, $tel1, $tel2, $fixe, $fax, $email, $bp, $site_internet, $pays, $ville, $activites, $forme_juridique, $rccm, $compte_contribuable, $regime_imposition, $centre_impôts, $capital_social, $compte_Bancaire, $monnaie, $n_agrement_1, $n_agrement_2,  $annee_academique, $ecole, $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif, $id)
    {
        global $db;
        $req = $db->prepare('
            UPDATE bureaux SET  libelle = ?, responsable = ?, raison_sociale = ?, adresse = ?, sigle = ?, slogan = ?, tel1 = ?, tel2 = ?, fixe = ?, fax = ?, email = ?, bp = ?, site_internet = ?, pays = ?, ville = ?, activites = ?, forme_juridique = ?, rccm = ?, compte_contribuable = ?, regime_imposition = ?, centre_impôts = ?, capital_social = ?, compte_Bancaire = ?, monnaie = ?, n_agrement_1 = ?, n_agrement_2 = ?, annee_academique = ?, ecole = ?,date_modif = ?, user_modif = ?, navigateur_modif = ?, ordinateur_modif = ?, ip_modif=? WHERE id= ?
        ');
        return $req->execute([$libelle, $responsable, $raison_sociale, $adresse, $sigle, $slogan, $tel1, $tel2, $fixe, $fax, $email, $bp, $site_internet, $pays, $ville, $activites, $forme_juridique, $rccm, $compte_contribuable, $regime_imposition, $centre_impôts, $capital_social, $compte_Bancaire, $monnaie, $n_agrement_1, $n_agrement_2,  $annee_academique, $ecole,  $date_modif, $user_modif, $navigateur_modif, $ordinateur_modif, $ip_modif, $id]);
    }

    static function update1($pied_page, $image_emblème,$logo_pc,  $id)
    {
        global $db;
        $req = $db->prepare('
            UPDATE bureaux SET pied_page = ?, image_emblème = ?, logo_pc = ? WHERE id = ?
        ');
        return $req->execute([$pied_page, $image_emblème,$logo_pc, $id]);
    }


    //||**********************************||
    //||----------- SUPPRESSIONS ---------||
    //||**********************************||

    /**
     * Méthode pour supprimer un(e) bureaux
     *
     * @param $id
     * @return bool
     */
    static function Supprimer($id)
    {
        global $db;

        $req = $db->prepare('DELETE FROM bureaux WHERE id= ?');
        return $req->execute([$id]);
    }
}


$info_bureau = bureaux::getByID(2);
