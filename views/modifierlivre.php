<?php ob_start(); ?>

<form method="POST" action="<?= URL?>livres/mv" enctype="multipart/form-data">
    <div class="form-group">
        <label for="titre">titre : </label>
        <input type="text" class="form-control" id="titre" name="titre" value="<?= $livre['titre']?>">
    </div>
    <div class="form-group">
        <label for="nbPages">nombre de page : </label>
        <input type="text" class="form-control" id="nbPages" name="nbPages" value="<?= $livre['nbPages']?>">
    </div>
    <div class="form-group">
        <label for="format">Sélectionner un format</label>
        <select class="form-control" id="select_format" name="format">
            <?php foreach ($formats as $format) { ?>
                <option <?php if(isset($_POST['format'])){echo 'selected'; }?> value=<?= $format['id'] ?>> <?= $format['name'] ?> </option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="select_editeurs">Sélectionner un éditeurs</label>
        <select class="form-control" id="select_editeurs" name="select_editeurs">
            <?php foreach ($editeurs as $editeur) { ?>
                <option <?php if(isset($_POST['select_editeurs'])){echo 'selected'; }?> value=<?= $editeur['id'] ?>> <?= $editeur['name'] ?> </option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="select_authors">Sélectionner un éditeurs</label>
        <select class="form-control" id="select_authors" name="select_authors">
            <?php foreach ($authors as $author) { ?>
                <option <?php if(isset($_POST['select_authors'])){echo 'selected'; }?> value=<?= $author['id'] ?>> <?= $author['name'] ?> </option>
            <?php } ?>
        </select>
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