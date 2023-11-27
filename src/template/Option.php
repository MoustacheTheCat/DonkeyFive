<?php ob_start(); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 mt-5">
            <h2 class="text-center">Donkey Five</h2>
        </div>
    </div>
</div>

<div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Cost</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($options as $option) : ?>
                <tr>
                    <td><?= $option['optionId']?></td>
                    <td><?= $option['optionName'] ?></td>
                    <td><?= $option['optionCostHT'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php 
$content = ob_get_clean();
require('src/template/Layout.php');
?>

