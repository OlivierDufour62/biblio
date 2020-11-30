<?php ob_start(); ?>

<?= $msg ?>

<?php
$titre = 'Oupss!';
$content = ob_get_clean();
require 'template.php';