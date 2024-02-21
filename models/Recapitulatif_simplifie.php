<?php

class RecapitulatifSimplifie
{
    public $id;
    public $date;
    public $agence;
    public $nombre_envois;
    public $montant_envois;
    public $frais_envois;
    public $nombre_receptions;
    public $montant_receptions;
    public $frais_receptions;
    public $nombre_rembourssements;
    public $montant_rembourssements;
    public $frais_rembourssements;

    public function __construct($id)
    {
        global $db;
        $id = strSecur($id);

        $req = $db->prepare('SELECT * FROM recapitulatif_simpliflie WHERE id = ?');
        $req->execute([$id]);
        $data = $req->fetch();

        $this-> id = $id;
        $this-> date = $data['date'];
        $this-> agence = $data['agence'];
        $this-> nombre_envois = $data['nombre_envois'];
        $this-> montant_envois = $data['montant_envois'];
        $this-> frais_envois = $data['frais_envois'];
        $this-> nombre_receptions = $data['nombre_receptions'];
        $this-> montant_receptions = $data['montant_receptions'];
        $this-> frais_receptions = $data['frais_receptions'];
        $this-> nombre_rembourssements = $data['nombre_rembourssements'];
        $this-> montant_rembourssements= $data['montant_rembourssements'];
        $this-> frais_rembourssements = $data['frais_rembourssements'];
    }

    static function getAll()
    {
        global $db;
        $req = $db->prepare(
            "SELECT
            date,
            agence,
            SUM(nombre_envoi) AS nombre_envois,
            SUM(montant_envoi) AS montant_envois,
            SUM(frais_envoi) AS frais_envois,
            SUM(nombre_reception) AS nombre_receptions,
            SUM(montant_reception) AS montant_receptions,
            SUM(nombre_rembourssement) AS nombre_rembourssements,
            SUM(montant_rembourssement) AS montant_rembourssements,
            SUM(frais_rembourssement) AS frais_rembourssements,
            SUM(montant_change) AS changes, 
            SUM(montant_tthu) AS tthu
        FROM (
            -- Requête pour western_union
            SELECT
                date,
                magasin AS agence,
                -- Envois
                SUM(CASE WHEN type_transaction = 'envoi' THEN 1 ELSE 0 END) AS nombre_envoi,
                SUM(CASE WHEN type_transaction = 'envoi' THEN montant_envoye ELSE 0 END) AS montant_envoi,
                SUM(CASE WHEN type_transaction = 'envoi' THEN total_frais ELSE 0 END) AS frais_envoi,
                -- Receptions
                SUM(CASE WHEN type_transaction != 'envoi' THEN 1 ELSE 0 END) AS nombre_reception,
                SUM(CASE WHEN type_transaction != 'envoi' THEN montant_paye_attendu ELSE 0 END) AS montant_reception,
                -- Remboursement
                0 AS nombre_rembourssement,
                0 AS montant_rembourssement,
                0 AS frais_rembourssement,
                0 AS montant_change,
                0 AS montant_tthu
            
            FROM western_union
            GROUP BY date, magasin

            UNION ALL

            -- Requête pour ria
            SELECT
                DATE_FORMAT(STR_TO_DATE(date, '%d/%m/%Y %H:%i'), '%d-%m-%Y') AS date_formattee,
                magasin AS agence,
                SUM(CASE WHEN actions = 'Envoi' THEN 1 ELSE 0 END) AS nombre_envoi,
                SUM(CASE WHEN actions = 'Envoi' THEN - montant_envoye ELSE 0 END) AS montant_envoi,
                SUM(CASE WHEN actions = 'Envoi' THEN frais ELSE 0 END) as frais_envoi,
                SUM(CASE WHEN actions != 'Envoi' THEN 1 ELSE 0 END) AS nombre_reception,
                SUM(CASE WHEN actions != 'Envoi' THEN montant_paye ELSE 0 END) AS montant_reception,
                -- rembourssements
                0 AS nombre_rembourssement,
                0 AS montant_rembourssement,
                0 AS frais_rembourssement,
                0 AS montant_change,
                SUM(tthu) AS montant_tthu
            FROM ria
            GROUP BY date_formattee, magasin
            
            UNION ALL
 
            -- Requête pour changes
            SELECT
                DATE_FORMAT(STR_TO_DATE(date, '%Y-%m-%d'), '%d-%m-%Y') AS date_formattee,
                magasin AS agence,
                0 AS nombre_envoi,
                SUM(montant2) AS montant_envoi,
                0 AS frais_envoi,
                0 AS nombre_reception,
                0 AS montant_reception,
                0 AS nombre_rembourssement,
                0 AS montant_rembourssement,
                0 AS frais_rembourssement,
                SUM(montant2) AS montant_change,
                0 AS montant_tthu

            FROM changes
            GROUP BY date_formattee, agence
        ) AS combined_data
        GROUP BY date, agence
        ORDER BY date DESC
        ;

                    "
        );
        $req->execute([]);
        return $req->fetchAll();
    }
}
