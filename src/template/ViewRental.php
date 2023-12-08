<?php ob_start(); ?>

<div class="container-fluid cont">
    <section class="gradient-custom">
        <div class="container py-5 ">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 ">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <div class="mb-md-5 mt-md-4 pb-5">
                                <h2 class="fw-bold mb-2 text-uppercase">Rental</h2>
                                <p class="text-white-50 mb-5">List of Rental</p>
                                <?php if (empty($datas)) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= $error ?>
                                    </div>
                                <?php else : ?>
                                    <div class="row d-flex justify-content-center">
                                        <table class="text-white">
                                            <thead>
                                                <tr>
                                                    <th>Rental Number</th>
                                                    <th>Cost of TVA</th>
                                                    <th>Cost HT</th>
                                                    <th>Cost TTC</th>
                                                    <th>Status</th>
                                                    <th>Detail</th>
                                                    <th>Valide</th>
                                                    <th>Refuse</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($datas as $data) : ?>
                                                    <tr>
                                                        <td><?= $data['rentalNumber'] ?></td>
                                                        <td><?= $data['rentalCostOfTVA'] ?></td>
                                                        <td><?= $data['rentalTotalHT'] ?></td>
                                                        <td><?= $data['rentalTotalTTC'] ?></td>
                                                        <td><?= $data['rentalStatus'] ?></td>
                                                        <td><a href="/rental/detail?id=<?= $data['rentalId'] ?>" class="btn btn-info">DETAIL</a></td>
                                                        <?php if($data['rentalStatus'] === 1) :?>
                                                            <td><a href="/rental/valid?id=<?= $data['rentalId'] ?>" class="btn btn-info">VALIDE</a></td>
                                                            <td><a href="/rental/refused?id=<?= $data['rentalId'] ?>" class="btn btn-info">REFUSE</a></td>
                                                        <?php endif;?>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('src/template/Layout.php') ?>