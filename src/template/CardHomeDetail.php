<?php ob_start(); ?>
    <h2><?= $cardHome['title']?></h2>
<?php
$content = ob_get_clean(); 
require('src/template/Layout.php'); 
?>