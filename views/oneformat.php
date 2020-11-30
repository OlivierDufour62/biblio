
<?php ob_start(); ?>

<div class="row">
<div class="col-6">
    <p>
        id: <?= $format->getId(); ?>
    </p>
    <p>
        nom : <?= utf8_encode($format->getName()); ?>
    </p>
</div>
</div>

<?php
$titre = 'format';
$content = ob_get_clean();
require 'template.php';