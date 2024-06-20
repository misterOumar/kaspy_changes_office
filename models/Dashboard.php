<?php
//||******************************************************||
//||----------------- Kaspy Web Framework ----------------||
//||--- kaspy corporation, We're developing the future ---||
//||             Version: V1.0 ; Année : 2022             ||
//||******************************************************||


/**
 * Class Dashboard - Représente un(e) dashboard
 */
class dashboard
{


    /**
     * dashboard constructor.
     *
     * @param $id
     */
    public function __construct($id)
    {
        global $db;
    }


    //||**********************************||
    //||------------ LECTURE -------------||
    //||**********************************||



    /**
     * Méthode pour récupérer les devises et montant des achats de devise.
     * 
     */
    static function getAllAchatDeviseMontant()
    {
        global $db;
        $req = $db->prepare(
            "SELECT devise, SUM(montant_net) AS total_montant_net
            FROM achat_devises
            GROUP BY devise;
        "
        );
        $req->execute([]);
        return $req->fetchAll();
    }


    /**
     * Méthode pour récupérer les devises et montant des ventes de devise.
     * 
     */
    static function getAllVenteDeviseMontant()
    {
        global $db;
        $req = $db->prepare(
            "SELECT devise, SUM(montant_net) AS total_montant_net
            FROM vente_devises
            GROUP BY devise;
        "
        );
        $req->execute([]);
        return $req->fetchAll();
    }



    static function getAll()
    {
        global $db;
        $req = $db->prepare("SELECT * FROM achat_devises ORDER BY id");
        $req->execute([]);
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
}
