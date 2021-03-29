<?php

$pr = new SejourRepository($pdo);
$id = $_GET["id"];
$statement = $pr->afficheSejour($id);
$sejour = $statement->fetchAll();
