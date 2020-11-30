<?php ob_start(); ?>

kikou

<?php
$titre = 'accueil';
$content = ob_get_clean();
require 'template.php';