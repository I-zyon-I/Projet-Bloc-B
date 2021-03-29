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
            return $this->pdo->query("SELECT
            sj.idSejour AS idSejour,
            sj.dateDebutSejour AS dateDebutSejour,
            sj.dureeJourSejour AS dureeJourSejour,
            sj.vestiaireSejour AS vestiaireSejour,
            sj.statutSejour AS statutSejour,
            cl.nomClient AS nomClient,
            cl.prenomClient AS prenomClient,
            cl.naissanceClient AS naissanceClient,
            cl.mailClient AS mailClient,
            sc.dateSeance AS dateSeance,
            sC.heureSeance AS heureSeance,
            so.nomSoin AS nomSoin,
            so.dureeMinuteSoin AS dureeMinuteSoin,
            ep.nomEspace AS nomEspace
        FROM Sejour AS sj
        LEFT JOIN Client AS cl
            ON sj.idClient = cl.idClient
        LEFT JOIN Seance AS sc
            ON sj.idSejour = sc.idSejour
        LEFT JOIN Soin AS so
            ON sc.idSoin = so.idSoin
        LEFT JOIN Espace as ep
            ON so.idEspace = ep.idEspace
        ORDER BY
            sj.dateDebutSejour ASC,
            sj.idSejour ASC,
            sc.dateSeance ASC,
            sc.heureSeance ASC;");
        } catch (PDOException $e) {
            echo "Erreur Query sur : " . $e->getMessage();
        }
    }
}
