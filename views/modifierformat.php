<?php ob_start(); ?>

<form method="POST" action="<?= URL?>formats/mfv" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">nombre de page : </label>
        <input type="text" class="form-control" id="name" name="name" value="<?= $format['name']?>">
    </div>
    <input type="hidden" name="identifiant" value="<?= $format['id']?>">
    <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>

<?php
$titre = 'modification d\'un format: ' . $format['id'];
$content = ob_get_clean();
require 'template.php';