<?php ob_start(); 
var_dump($_SESSION);
?>

kikou

<?php
$titre = 'accueil';
$content = ob_get_clean();
require 'template.php';