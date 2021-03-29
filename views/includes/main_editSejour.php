<?php
$id = $sejour[0]->idSejour;
echo <<<HTML
        <div class="container">
            <div class="card">
                <div class="card-header mb-3">
                    <strong>N° de dossier : </strong>$id
                </div>
                <form action="?page=afficheSejour&id=$id" method="post">
                    Date de début : <input type="date" name="dateDebutSejour" value="{$sejour[0]->dateDebutSejour}" class="form-control mb-2">
                    Durée : <input type="number" name="dureeJourSejour" value="{$sejour[0]->dureeJourSejour}" class="form-control mb-2">
                    Vestiaire : <input type="text" name="vestiaireSejour" value="{$sejour[0]->vestiaireSejour}" class="form-control mb-2">
                    Statut :
                    <select class="form-control mb-3" name="statutSejour">
                        <option>VAL</option>
                        <option>CLO</option>
                        <option>DEL</option>
                    </select>
                    <input type="submit" class="btn btn-success">
                </form>
            </div>
        </div>
HTML;
