
<?php ob_start(); ?>

<div class="row">
<div class="col-6">
    <p>
        id: <?= $format['id']; ?>
    </p>
    <p>
        nom : <?= utf8_encode($format['name']); ?>
    </p>
</div>
</div>

<?php
$titre = 'format';
$content = ob_get_clean();
require 'template.php';