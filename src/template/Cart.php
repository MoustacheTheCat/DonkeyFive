<?php ob_start(); ?>
<?php
$datas =$_SESSION['cart'];
var_dump($datas); 
?>
<div class="container-fluid cont">
    <section class="gradient-custom">
        <div class="container py-5 ">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <div class="mb-md-5 mt-md-4 pb-5">
                                <h2 class="fw-bold mb-2 text-uppercase">Cards</h2>
                                <p class="text-white-50 mb-5">...........</p>
                                <?php if (!empty($error)) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= $error ?>
                                    </div>
                                <?php elseif(!empty($success)) : ?>
                                    <div class="alert alert-success" role="alert">
                                        <?= $success ?>
                                    </div>
                                <?php endif; ?>
                                <div class="container mt-5">
                                    <table class="table table-responsive table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">Field Name</th>
                                                <th scope="col">Date Start</th>
                                                <th scope="col">Date End</th>
                                                <th scope="col">Hour Start</th>
                                                <th scope="col">Hour End</th>
                                                <th scope="col">Number Hour</th>
                                                <th scope="col">Number Option</th>
                                                <th scope="col">Cost HT</th>
                                                <th scope="col">Cost TTC</th>
                                                <th scope="col">Detail</th>
                                                <th scope="col">Edit</th>
                                                <th scope="col">Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($datas as $key => $data): ?>
                                                <tr>
                                                    <td><?= $datas[$key]['field']['fieldName'] ?></td>
                                                    <td><?= $datas[$key]['time']['dateStart'] ?></td>
                                                    <td><?= $datas[$key]['time']['dateEnd'] ?></td>
                                                    <td><?= $datas[$key]['time']['hourStart'] ?></td>
                                                    <td><?= $datas[$key]['time']['hourEnd'] ?></td>
                                                    <td><?= $datas[$key]['time']['nbHour'] ?></td>
                                                    <td><?= $datas[$key]['nbOp'] ?></td>
                                                    <td><?= $datas[$key]['totalHTField'] ?></td>
                                                    <td><?= $datas[$key]['totalTTCField'] ?></td>
                                                    <td><button class="btn btn-primary">Detail</button></td>
                                                    <td><button class="btn btn-primary">Edit</button></td>
                                                    <td><button class="btn btn-danger">Delete</button></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php $content = ob_get_clean();
require_once 'src/template/Layout.php';
?>
