<?php ob_start(); ?>

<form method="POST" action="<?= URL?>livres/mv" enctype="multipart/form-data">
    <div class="form-group">
        <label for="titre">titre : </label>
        <input type="text" class="form-control" id="titre" name="titre" value="<?= $livre['titre']?>">
    </div>
    <div class="form-group">
        <label for="nbpage">nombre de page : </label>
        <input type="text" class="form-control" id="nbpage" name="nbpage" value="<?= $livre['nbPages']?>">
    </div>
    <h3> Images : </h3>
    <img src="<?= URL ?>public/images/<?= $livre['image']?>" alt="">
    <div class="form-group">
        <label for="image">Changer l'image</label>
        <input type="file" class="form-control-file" id="image" name="image">
    </div>
    <input type="hidden" name="identifiant" value="<?= $livre['id']?>">
    <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>

<?php
$titre = 'modification d\'un livre: ' . $livre['id'];
$content = ob_get_clean();
require 'template.php';