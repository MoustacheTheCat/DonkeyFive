<?php ob_start(); ?>

<div class="container mt-5">
    <form action="field/option/check" method="POST">
        <div class="row">
            <?php foreach ($options as $option) : ?>
                <div class="col-md-3 mb-3">
                    <div class="card" style="width: 100%;">
                        <div class="card-body">
                            <h5 class="card-title text-center"><?= $option['optionName']; ?></h5>
                            <img src="<?= $option['imageURL']; ?>" class="card-img-top" alt="Image Placeholder" style="height: 200px; object-fit: cover;">
                            <p class="card-text"><?= $option['description']; ?></p>
                            <p class="card-text">Prix : <?= $option['optionCostHT']; ?>$</p>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck<?= $option['optionId']; ?>">
                                <label class="form-check-label" for="exampleCheck<?= $option['optionId']; ?>">Sélectionner l'option</label>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php 
$content = ob_get_clean();
require('src/template/Layout.php');
?>
