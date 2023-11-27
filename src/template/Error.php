<?php $pageTitle = "Donkey Car"; ?>

<?php ob_start(); ?>
<p>Une erreur est survenue : <?= $errorMessage ?></p>
<?php $content = ob_get_clean(); ?>

<?php require('src/template/Layout.php') ?>