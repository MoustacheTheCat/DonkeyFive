<?php ob_start(); ?>
<section>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="<?=('/src/public/img/donkey/'.$cardHome['image']) ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?= $cardHome['title'] ?></h5>
                    <p class="card-text"><?= $cardHome['description'] ?></p>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
$content = ob_get_clean(); 
require('src/template/Layout.php'); 
?>