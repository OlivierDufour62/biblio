<?php ob_start(); ?>

<table class="table text-center">
    <tr class="table-dark">
        <th>Nom de format</th>
        <th colspan="2">Actions</th>
    </tr>
    <?php
    for ($i = 0; $i < count($format); $i++) : ?>
        <tr>
            <td class="align-middle"><a href="<?= URL ?>formats/f/<?= $format[$i]->getId(); ?>"><?= $format[$i]->getName(); ?></a></td>
            <td class="align-middle"><a href="<?= URL ?>formats/m/<?= $format[$i]->getId(); ?>" class="btn btn-warning">Modifier</a></td>
            <td class="align-middle">
                <form method="POST" action="<?= URL ?>formats/s/<?= $format[$i]->getId(); ?>" onSubmit="return confirm('Voulez-vous vraiment supprimer ce livre ?')">
                    <button class="btn btn-danger" type="submit">Supprimer</button>
                </form>
            </td>
        </tr>
    <?php endfor; ?>
</table>

<?php
$titre = 'Format';
$content = ob_get_clean();
require 'template.php';