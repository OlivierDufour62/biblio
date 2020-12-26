<?php ob_start(); ?>

<form method="POST" id="testurl" class="coucou" action="" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">Nom : </label>
        <input type="text" class="form-control" id="name" name="name">
    </div>
    <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>

<?php

$titre = 'Ajout d\'un ';
$content = ob_get_clean();
require 'template.php';