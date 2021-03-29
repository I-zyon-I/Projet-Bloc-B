<div class="container">
    <h1>Liste des séjours</h1>

    <!-- Liste des dossiers -->
    <?php

    // Test de l'existence des dossiers
    if ($sejours) {

        // Création d'un accordéon
        echo "<div class='accordion' id='accordionExample'>";

        // $i l'indice de $arraySeances correspondant à chaque $sejour
        $i = 0;

        // Création d'un cadre pour chaque séjour
        foreach ($sejours as $sejour) {
            $id = $sejour->idSejour;
            echo <<<HTML
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading$id">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse$id" aria-expanded="false" aria-controls="collapse$id">
                            [$sejour->statutSejour] Dossier n° $id : $sejour->nomClient $sejour->prenomClient, séjour du $sejour->dateDebutSejour au ...
                        </button>
                    </h2>
                    <div id="collapse$id" class="accordion-collapse collapse" aria-labelledby="heading$id" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong>Séjour :</strong><br>
                            Début : $sejour->dateDebutSejour<br>
                            Durée du séjour : $sejour->dureeJourSejour jour(s)<br>
                            Vestiaire n°$sejour->vestiaireSejour<br>
                            <strong>Client :</strong><br>
                            Nom : $sejour->nomClient<br>
                            Prénom : $sejour->prenomClient<br>
                            <strong>Séance(s) :</strong><br>
HTML;
            $seances = $arraySeances[$i];

            // Test de l'existence de séances dans le dossier
            if ($seances) {
                
                // Affichage de chaque séance
                $jour = "";
                foreach ($seances as $seance) {

                    // Création d'une ligne 'date' pour chaque nouvelle journée
                    if ($seance->dateSeance != $jour) {
                        echo "$seance->dateSeance<br>";
                    }
                    echo "$seance->heureSeance : $seance->nomSoin ($seance->dureeMinuteSoin min), espace $seance->nomEspace<br>";
                    $jour = $seance->dateSeance;
                }
            } else {
                echo "Aucune séance";
            }
            echo "<a class='btn btn-primary mt-2' href='?page=afficheSejour&id=$id'>Afficher</a></div></div></div>";
        $i++;
        }
        echo "</div>";

        // Pagination
        if (isset($_GET['paging'])) {
            $paging = $_GET['paging'];
        } else {
            $paging = 1;
        }
        $previous = $paging - 1;
        $liClass = ($previous > 0) ? "" : " disabled";
        $next = $paging + 1;
        
        echo <<<HTML
        <nav aria-label="Page navigation example" class="mt-2">
            <ul class="pagination justify-content-center">
                <li class="page-item$liClass">
                    <a class="page-link" href="?page=listeSejours&paging=$previous">Previous</a>
                </li>
                <li class="page-item disabled">
                    <a class="page-link" aria-disabled="true">Page $paging</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="?page=listeSejours&paging=$next">Next</a>
                </li>
            </ul>
        </nav>
HTML;
    } else {
        echo "Aucun séjour";
    }
    ?>
</div>