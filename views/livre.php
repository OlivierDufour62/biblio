<?php
ob_start();

if (!empty($_SESSION['alert'])) :
?>
    <div class="alert alert-<?= $_SESSION['alert']['type'] ?>" role="alert">
        <?= $_SESSION['alert']['msg'] ?>
    </div>
<?php
    unset($_SESSION['alert']);
endif;
?>
<table class="table text-center">
    <tr class="table-dark">
        <th>Image</th>
        <th>Titre</th>
        <th>Nombre de pages</th>
        <th colspan="2">Actions</th>
    </tr>
    <?php
    foreach ($livres as $livre) {
    ?>
        <tr>
            <td class="align-middle"><img src="public/images/<?= $livre['image']; ?>" width="60px;"></td>
            <td class="align-middle"><a href="<?= URL ?>livres/l/<?= $livre['id']; ?>"><?= $livre['titre']; ?></a></td>
            <td class="align-middle"><?= $livre['nbPages']; ?></td>
            <td class="align-middle"><a href="<?= URL ?>livres/m/<?= $livre['id']; ?>" class="btn btn-warning">Modifier</a></td>
            <td class="align-middle">
                <form method="POST" action="<?= URL ?>livres/s/<?= $livre['id']; ?>" onSubmit="return confirm('Voulez-vous vraiment supprimer ce livre ?')">
                    <button class="btn btn-danger" type="submit">Supprimer</button>
                </form>
            </td>
        </tr>
    <?php } ?>
</table>
<a href="<?= URL ?>livres/a" class="btn btn-success d-block">Ajouter</a>

<?php
$content = ob_get_clean();
$titre = "Les livres de la bibliothèque";
require "template.php";
?>