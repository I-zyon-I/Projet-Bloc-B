<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-3">
    <a class="navbar-brand" href="#"><?= $nameApp ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <?= $hbt->bt4Li("?page=home", "Accueil") ?>
            <?= $hbt->bt4Li("?page=contact", "Contact") ?>
            <?= $hbt->bt4Li("?page=sejour", "Séjour") ?>
        </ul>
    </div>
</nav>