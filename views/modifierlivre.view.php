<?php ob_start(); ?>

<form method="POST" action="<?= URL?>livres/mv" enctype="multipart/form-data">
    <div class="form-group">
        <label for="titre">titre : </label>
        <input type="text" class="form-control" id="titre" name="titre" value="<?= $livre->getTitre()?>">
    </div>
    <div class="form-group">
        <label for="nbpage">nombre de page : </label>
        <input type="text" class="form-control" id="nbpage" name="nbpage" value="<?= $livre->getNbPages()?>">
    </div>
    <h3> Images : </h3>
    <img src="<?= URL ?>public/images/<?= $livre->getImage()?>" alt="">
    <div class="form-group">
        <label for="image">Changer l'image</label>
        <input type="file" class="form-control-file" id="image" name="image">
    </div>
    <input type="hidden" name="identifiant" value="<?= $livre->getId()?>">
    <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>

<?php
$titre = 'modification d\'un livre: ' . $livre->getId();
$content = ob_get_clean();
require 'template.php';