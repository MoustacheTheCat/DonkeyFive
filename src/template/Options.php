<?php ob_start(); ?>

<<<<<<< HEAD

<div class="container mt-5">
    <div class="row">
    <form action="field/option/check" method="POST">
        <?php foreach ($options as $option) : ?>
            <div class="col-md-3 mb-4">
                <div class="card" style="width: 100%;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $option['optionName']; ?></h5>
                        <img src="<?php echo $option['imageURL']; ?>" class="card-img-top" alt="Image Placeholder">
                        <p class="card-text"><?php echo $option['description']; ?></p>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck<?php echo $option['optionId']; ?>">
                            <label class="form-check-label" for="exampleCheck<?php echo $option['optionId']; ?>">Selectionner l'option</label>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <button type="submit" class="form-check-input">Submit</button>
        </form>
    </div>
=======
<div class="container mt-5">
    <form action="field/option/check" method="POST">
        <div class="row">
            <?php foreach ($options as $option) : ?>
                <div class="col-md-3 mb-3">
                    <div class="card" style="width: 100%;">
                        <div class="card-body">
                            <h5 class="card-title text-center"><?php echo $option['optionName']; ?></h5>
                            <img src="<?php echo $option['imageURL']; ?>" class="card-img-top" alt="Image Placeholder" style="height: 200px; object-fit: cover;">
                            <p class="card-text"><?php echo $option['description']; ?></p>
                            <p class="card-text">Prix : <?php echo $option['optionCostHT']; ?>$</p>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck<?php echo $option['optionId']; ?>">
                                <label class="form-check-label" for="exampleCheck<?php echo $option['optionId']; ?>">Sélectionner l'option</label>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
>>>>>>> f1854f31379a0cdc7246b0ae5194abc2ff5bb6b7
</div>

<?php 
$content = ob_get_clean();
require('src/template/Layout.php');
?>
<<<<<<< HEAD

=======
>>>>>>> f1854f31379a0cdc7246b0ae5194abc2ff5bb6b7
