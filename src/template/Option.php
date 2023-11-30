<?php ob_start(); ?>

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
</div>
<form action="field/option/check" method="POST">
 <button type="submit" class="form-check-input">Submit</button>
 </form>

<?php 
$content = ob_get_clean();
require('src/template/Layout.php');
?>

