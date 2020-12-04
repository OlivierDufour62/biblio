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
    <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>

<?php
$titre = "ajout d'un livre";
$content = ob_get_clean();
require 'template.php';
