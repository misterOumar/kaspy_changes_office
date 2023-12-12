<?php
//||******************************************************||
//||----------------- Kaspy Web Framework ----------------||
//||--- kaspy corporation, We're developing the future ---||
//||             Version: V1.0 ; Année : 2022             ||
//||******************************************************||


/**
 * Class bureaux - Représente un(e) bureaux
 */
class parametres_admin
{
    public $id;
    public $type_etablissement;
    public $devise;
    public $ministere_tutelle;
    public $mode_incementation_matricule;
    public $format_matricule;
    public $parametres_matricule;
    public $separateur;
    public $mode_conduite;
    public $moy_max_conduite;
    public $correspondance_conduite;
    public $retrait_conduite;
    public $ip_modif;

    /**
     * parametres_admin constructeur.
     *
     * @param $id
     */
    public function __construct($id)
    {
        global $db;
        $id = strSecur($id);

        $req = $db->prepare('SELECT * FROM parametres_admin WHERE id = ?');
        $req->execute([$id]);
        $data = $req->fetch();

        $this->id = $id;
        $this->type_etablissement = $data['type_etablissement'];
        $this->devise = $data['devise'];
        $this->ministere_tutelle = $data['ministere_tutelle'];
        $this->mode_incementation_matricule = $data['mode_incementation_matricule'];
        $this->format_matricule = $data['format_matricule'];
        $this->parametres_matricule = $data['parametres_matricule'];
        $this->separateur = $data['separateur'];
        $this->mode_conduite = $data['mode_conduite'];
        $this->moy_max_conduite = $data['moy_max_conduite'];
        $this->correspondance_conduite = $data['correspondance_conduite'];
        $this->retrait_conduite = $data['retrait_conduite'];
        $this->ip_modif = $data['ip_modif'];
    }


    //||**********************************||
    //||------------ LECTURE -------------||
    //||**********************************||


    /**
     * Renvoi la liste des parametres_admin.
     *
     * @return array
     */
    static function getAll()
    {
        global $db;
        $req = $db->prepare("SELECT * FROM parametres_admin ORDER BY id");
        $req->execute([]);
        return $req->fetchAll();
    }

    /**
     * Méthode pour récupérer un(e) parametres_admin en fonction de son id.
     *
     * @param $id
     * @return mixed
     */
    static function getByID($id)
    {
        global $db;
        $req = $db->prepare("SELECT * FROM parametres_admin WHERE id = ?");
        $req->execute([$id]);
        return $req->fetch();
    }



    /**
     * Méthode de récupération du dernier element de la table parametres_admin.
     *
     * @return mixed
     */
    static function getLast()
    {
        global $db;
        $req = $db->prepare("SELECT * FROM parametres_admin  ORDER BY id DESC LIMIT 1");
        $req->execute([]);
        return $req->fetch();
    }


    /**
     * Méthode de récupération du nombre d'enregistrement de la table parametres_admin.
     *
     * @return mixed
     */
    static function getCount()
    {
        global $db;
        $req = $db->prepare("SELECT COUNT(*) FROM parametres_admin");
        $req->execute([]);
        return $req->fetch()[0];
    }


    /**
     * Méthode de récupération de parametres_admin en fonction du libelle.
     *
     * @param $libelle
     * @return mixed
     */
    static function getByNom($type_etablissement)
    {
        global $db;
        $req = $db->prepare("SELECT * FROM parametres_admin WHERE type_etablissement = ? ");
        $req->execute([$type_etablissement]);
        return $req->fetch();
    }




    //||**********************************||
    //||----------- INSERTIONS -----------||
    //||**********************************||
    /**
     * Méthode pour insérer un(e) parametres_admin en base de données.
     *
     * @param $id
     * @param $type_etablissement
     * @param $devise
     * @param $ministere_tutelle
     * @param $mode_incementation_matricule
     * @param $format_matricule
     * @param $parametres_matricule
     * @param $separateur
     * @param $mode_conduite
     * @param $moy_max_conduite
     * @param $correspondance_conduite
     * @param $retrait_conduite
     * @return bool
     */
    static function Ajouter($id, $type_etablissement, $devise, $ministere_tutelle, $mode_incementation_matricule, $format_matricule, $parametres_matricule, $separateur, $mode_conduite, $moy_max_conduite, $correspondance_conduite, $retrait_conduite)
    {
        global $db;

        $req = $db->prepare('
            INSERT INTO parametres_admin(id, type_etablissement, devise, ministere_tutelle, mode_incementation_matricule, format_matricule, parametres_matricule, separateur, mode_conduite, moy_max_conduite, correspondance_conduite, retrait_conduite) 
            VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)      
        ');
        return $req->execute([$id, $type_etablissement, $devise, $ministere_tutelle, $mode_incementation_matricule, $format_matricule, $parametres_matricule, $separateur, $mode_conduite, $moy_max_conduite, $correspondance_conduite, $retrait_conduite]);
    }


    //||**********************************||
    //||---------- MODIFICATIONS ---------||
    //||**********************************||
    /**
     * Méthode pour modifier un(e) parametres_admin en base de données.
     *
     * @param $id
     * @param $type_etablissement
     * @param $devise
     * @param $ministere_tutelle
     * @param $mode_incementation_matricule
     * @param $format_matricule
     * @param $parametres_matricule
     * @param $separateur
     * @param $mode_conduite
     * @param $moy_max_conduite
     * @param $correspondance_conduite
     * @param $retrait_conduite
     * @return bool
     */
    static function Modifier($id, $type_etablissement, $devise, $ministere_tutelle, $mode_incementation_matricule, $format_matricule, $parametres_matricule, $separateur, $mode_conduite, $moy_max_conduite, $correspondance_conduite, $retrait_conduite)
    {
        global $db;
        $req = $db->prepare('
            UPDATE parametres_admin SET id = ?, type_etablissement = ?, devise = ?, ministere_tutelle = ?, mode_incementation_matricule = ?, format_matricule = ?, parametres_matricule = ?, separateur = ?, mode_conduite = ?, moy_max_conduite = ?, correspondance_conduite = ?, retrait_conduite WHERE = ?
        ');
        return $req->execute([$id, $type_etablissement, $devise, $ministere_tutelle, $mode_incementation_matricule, $format_matricule, $parametres_matricule, $separateur, $mode_conduite, $moy_max_conduite, $correspondance_conduite, $retrait_conduite]);
    }

    /**
     * Méthode pour ajouter un type d'établissement,la devise et le ministère de tutelle
     *
     * @param $type_etablissement
     * @param $devise
     * @param $ministère de tutelle
     * @return bool
     */
    static function update1($type_etablissement, $devise, $ministere_tutelle, $id)
    {
        global $db;
        $req = $db->prepare('
            UPDATE parametres_admin SET type_etablissement = ?, devise = ?, ministere_tutelle = ? WHERE id = ?
        ');
        return $req->execute([$type_etablissement, $devise, $ministere_tutelle,  $id]);
    }


    /**
     * Méthode pour ajouter un type d'établissement,la devise et le ministère de tutelle
     *
     * @param $type_etablissement
     * @param $devise
     * @param $ministère de tutelle
     * @return bool
     */
    static function update2($mode_incrementation_matricule, $format_matricule, $parametre_matricule, $separateur, $mode_conduite, $moy_max_conduite, $correspondance_conduite, $retrait_conduite,  $id)
    {
        global $db;
        $req = $db->prepare('
            UPDATE parametres_admin SET mode_incrementation_matricule = ? , format_matricule = ? , parametres_matricule = ? , separateur = ? , mode_conduite = ?, moy_max_conduite = ? , correspondance_conduite = ? , retrait_conduite = ? WHERE id = ?
        ');
        return $req->execute([$mode_incrementation_matricule, $format_matricule, $parametre_matricule, $separateur, $mode_conduite, $moy_max_conduite, $correspondance_conduite, $retrait_conduite, $id]);
    }


    //||**********************************||
    //||----------- SUPPRESSIONS ---------||
    //||**********************************||

    /**
     * Méthode pour supprimer un(e) parametres_admin
     *
     * @param $id
     * @return bool
     */
    static function Supprimer($id)
    {
        global $db;

        $req = $db->prepare('DELETE FROM parametres_admin WHERE id= ?');
        return $req->execute([$id]);
    }
}
