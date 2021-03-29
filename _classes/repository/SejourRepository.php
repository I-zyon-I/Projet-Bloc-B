<?php

class SejourRepository {
    // Attributs
    protected $pdo;

    // Constructeur
    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    // Méthode
    public function findAll() {
        try {
            return $this->pdo->query("SELECT * FROM sejour;");
        } catch (PDOException $e) {
            echo "Erreur Query sur : " . $e->getMessage();
        }
    }

    public function listeSejours($paging) {
        try {
            $offset = ($paging - 1) * 10;
            return $this->pdo->query("SELECT
            sj.idSejour AS idSejour,
            sj.dateDebutSejour AS dateDebutSejour,
            sj.dureeJourSejour AS dureeJourSejour,
            sj.vestiaireSejour AS vestiaireSejour,
            sj.statutSejour AS statutSejour,
            cl.nomClient AS nomClient,
            cl.prenomClient AS prenomClient,
            cl.naissanceClient AS naissanceClient,
            cl.mailClient AS mailClient
            -- sc.dateSeance AS dateSeance,
            -- sc.heureSeance AS heureSeance,
            -- so.nomSoin AS nomSoin,
            -- so.dureeMinuteSoin AS dureeMinuteSoin,
            -- ep.nomEspace AS nomEspace
        FROM sejour AS sj
            INNER JOIN client AS cl
                ON sj.idClient = cl.idClient
            -- LEFT JOIN seance AS sc
            --     ON sj.idSejour = sc.idSejour
            -- LEFT JOIN soin AS so
            --     ON sc.idSoin = so.idSoin
            -- LEFT JOIN espace as ep
            --     ON so.idEspace = ep.idEspace
        ORDER BY
            sj.dateDebutSejour ASC,
            sj.idSejour ASC
            -- sc.dateSeance ASC,
            -- sc.heureSeance ASC
        LIMIT $offset, 10;");
        } catch (PDOException $e) {
            echo "Erreur Query sur : " . $e->getMessage();
        }
    }

    public function afficheSejour($id) {
        try {
            return $this->pdo->query("SELECT
                    sj.idSejour AS idSejour,
                    sj.dateDebutSejour AS dateDebutSejour,
                    sj.dureeJourSejour AS dureeJourSejour,
                    sj.vestiaireSejour AS vestiaireSejour,
                    sj.statutSejour AS statutSejour,
                    cl.idClient AS idClient,
                    cl.nomClient AS nomClient,
                    cl.prenomClient AS prenomClient,
                    cl.naissanceClient AS naissanceClient,
                    cl.mailClient AS mailClient,
                    sc.dateSeance AS dateSeance,
                    sc.heureSeance AS heureSeance,
                    sc.statutSeance AS statutSeance,
                    so.idSoin AS idSoin,
                    so.nomSoin AS nomSoin,
                    so.dureeMinuteSoin AS dureeMinuteSoin,
                    ep.nomEspace AS nomEspace
                FROM sejour AS sj
                    LEFT JOIN client AS cl
                        ON sj.idClient = cl.idClient
                    LEFT JOIN seance AS sc
                        ON sj.idSejour = sc.idSejour
                    LEFT JOIN soin AS so
                        ON sc.idSoin = so.idSoin
                    LEFT JOIN espace as ep
                        ON so.idEspace = ep.idEspace
                WHERE sj.idSejour = $id
                ORDER BY
                    sc.dateSeance ASC,
                    sc.heureSeance ASC;"
            );
        } catch (PDOException $e) {
            echo "Erreur Query sur : " . $e->getMessage();
        }
    }
    
    public function editSejour($id) {
        try {
            return $this->pdo->query("SELECT *
                FROM sejour
                WHERE idSejour = $id;"
            );
        } catch (PDOException $e) {
            echo "Erreur Query sur : " . $e->getMessage();
        }
    }
    
}
