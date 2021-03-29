<?php
    $init = true;
    foreach ($sejour as $seance) {
        if ($init) {
            echo <<<HTML
                <div class="container">
                    <div class="card">
                        <div class="card-header">
                            <strong>Séjour :</strong><br>
                            N° de dossier : $seance->idSejour
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Client :</strong><br>$seance->idClient</li>
                            <li class="list-group-item">Séance(s) :
HTML;
        }
        echo "<br>$seance->idSoin";
        static $init = false;
    }
    echo "</li></ul></div></div>";