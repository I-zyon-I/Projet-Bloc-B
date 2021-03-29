<?php

// Création des dépôts
$sejourRepository = new SejourRepository($pdo);
$seanceRepository = new SeanceRepository($pdo);

// Affectation de la variable de pagination
if (isset($_GET['paging'])) {
    $paging = $_GET['paging'];
} else {
    $paging = 1;
}

// Récupération de la liste des dossiers
$sejours = $sejourRepository->listeSejours($paging)->fetchAll();

// Récupération de la liste des séance par dossier
foreach ($sejours as $sejour) {
    $arraySeances[] = $seanceRepository->findBy($sejour->idSejour)->fetchAll();
}