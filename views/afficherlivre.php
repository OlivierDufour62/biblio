<?php ob_start(); 
?>


<div class="row">
    
<div class="col-6">
    <img src="<?= URL ?>public/images/<?= $livre['image'];?>" alt="">
</div>
<div class="col-6">
    <p>
        titre: <?= utf8_encode($livre['titre']); ?>
    </p>
    <p>
        nombre de page : <?= $livre['nbPages']; ?>
    </p>
</div>
</div>


<?php
$content = ob_get_clean();
$titre = utf8_encode($livre['titre']);
require "template.php";
?>