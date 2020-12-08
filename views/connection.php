<?php ob_start(); ?>

<div>
    <form action="" method="POST">
        <div class="form-control">
            <input type="text" placeholder="email" name="email">
        </div>
        <div class="form-control">
            <input type="text" placeholder="mot de passe" name="password">
        </div>
        <button type="submit">coucou</button>
    </form>
</div>

<?php
$titre = 'connection';
$content = ob_get_clean();
require 'template.php';
