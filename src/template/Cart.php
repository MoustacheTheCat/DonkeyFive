<?php ob_start(); ?>
<?php
$datas = $_SESSION['cart'];

?>

<div class="container mt-5 mb-5 pb-5 pt-5 bg-dark text-light text-center">
    <h2 class="fw-bold mb-2 text-uppercase">Mon Panier</h2>
    <p class="text-white-50 mb-5">...........</p>

    <?php if (!empty($error)) : ?>
        <div class="alert alert-danger" role="alert">
            <?= $error ?>
        </div>
    <?php elseif (!empty($success)) : ?>
        <div class="alert alert-success" role="alert">
            <?= $success ?>
        </div>
    <?php endif; ?>



    <div class="container mt-5 bg-dark">
        <table class="table table-responsive table-hover table-striped" style="border-radius: 10px;">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Nom du terrain</th>
                    <th scope="col">Date de debut et de fin </th>
                    <th scope="col">Heure de debut et de fin</th>
                    <th scope="col">Nombre d'heures</th>
                    <th scope="col">Nombre d'option</th>
                    <th scope="col">Coût des options TTC</th>
                    <th scope="col">Coût du terrain TTC</th>
                    <th scope="col">Détails</th>
                    <th scope="col">Modifier</th>
                    <th scope="col">Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datas as $key => $data) : ?>
                    <tr>
                        <td><?= $datas[$key]['field']['fieldName'] ?></td>
                        <td><?= $datas[$key]['time']['dateStart'] ?> <br> <?= $datas[$key]['time']['dateEnd'] ?></td>

                        <td><?= $datas[$key]['time']['hourStart'] ?> <br> <?= $datas[$key]['time']['hourEnd'] ?></td>

                        <td><?= $datas[$key]['time']['nbHour'] ?></td>
                        <td><?= $datas[$key]['nbOp'] ?></td>
                        <td><?= $datas[$key]['options']['totalCostTTC'] ?></td>
                        <td><?= $datas[$key]['field']['totalTTCField'] ?></td>
                        <td><a href="/cart/details" class="btn btn-secondary">Détails</a></td>
                        <td><button class="btn btn-secondary">Edit</button></td>
                        <td><button class="btn btn-danger">Delete</button></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="text-right">
            <h4>Prix total TTC : <?= $datas[$key]['totalTTC'] ?> €</h4>
            <button class="btn btn-primary">Passer la commande</button>
        </div>
    </div>
</div>

<?php $content = ob_get_clean();
require_once 'src/template/Layout.php';
?>