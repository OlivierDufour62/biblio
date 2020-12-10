<?php ob_start(); ?>

<table class="table text-center">
    <tr class="table-dark">
        <th>Nom de format</th>
        <th colspan="2">Actions</th>
    </tr>
    <?php
    foreach($editeurs as $result => $value){
    // for ($i = 0; $i < count($format); $i++) : ?>
        <tr>
            <td class="align-middle"><a href="<?= URL ?>formats/f/<?= $value['id'] ?>"><?= $value['name'] ?></a></td>
            <td class="align-middle"><a href="<?= URL ?>formats/m/<?= $value['id'] ?>" class="btn btn-warning">Modifier</a></td>
            <td class="align-middle">
                <form method="POST" action="<?= URL ?>formats/s/<?= $value['id'] ?>" onSubmit="return confirm('Voulez-vous vraiment supprimer ce livre ?')">
                    <button class="btn btn-danger" type="submit">Supprimer</button>
                </form>
            </td>
        </tr>
    <?php } ?>
</table>
<a href="<?= URL ?>formats/a" class="btn btn-success d-block">Ajouter</a>

<?php
$titre = 'Format';
$content = ob_get_clean();
require 'template.php';