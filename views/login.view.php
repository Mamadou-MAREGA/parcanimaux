<?php ob_start(); ?>


<?php
    $content = ob_get_clean();
    $titre = "Login";
    require_once ("views/commons/template.php");