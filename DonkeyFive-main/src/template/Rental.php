<?php ob_start(); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 mt-5">
            <h2 class="text-center">Donkey Five</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 mt-5">
            <h2 class="text-center">Donkey Five</h2>
        </div>

        <div class="col-md-12 mt-5">
            <h2 class="text-center">Donkey Five</h2>

<?php
$content = ob_get_clean();
require('src/template/Layout.php');
?>    
