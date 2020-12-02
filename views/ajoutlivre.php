<?php ob_start(); ?>

<form method="POST" action="<?= URL ?>livres/av" enctype="multipart/form-data">
    <div class="form-group">
        <label for="titre">titre : </label>
        <input type="text" class="form-control" id="titre" name="titre">
    </div>
    <div class="form-group">
        <label for="nbpage">nombre de page : </label>
        <input type="text" class="form-control" id="nbpage" name="nbpage">
    </div>
    <div class="form-group">
        <label for="image">Example file input</label>
        <input type="file" class="form-control-file" id="image" name="image">
    </div>
    <div class="form-group">
        <label for="select_format">Sélectionner un format</label>
        <select class="form-control" id="select_format">
            <option value="">1</option>
            <option value="">2</option>
            <option value="">3</option>
            <option value="">4</option>
            <option value="">5</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>

<?php
$titre = "ajout d'un livre";
$content = ob_get_clean();
require 'template.php';
