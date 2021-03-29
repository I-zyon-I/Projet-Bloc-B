<?php

$pr = new SejourRepository($pdo);
$statement = $pr->findAll();
$sejour = $statement->fetchAll();