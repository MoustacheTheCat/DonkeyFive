<?php ob_start(); ?>
<div class="container-fluid cont">
    <section class="gradient-custom">
        <div class="container py-5 ">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-12 ">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <div class="mb-md-5 mt-md-4 pb-5">
                            <?php if (!empty($error)) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= $error ?>
                                    </div>
                                <?php elseif (!empty($success)) : ?>
                                    <div class="alert alert-success" role="alert">
                                        <?= $success ?>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($center)): ?>
                                    <h2 class="fw-bold mb-2 text-uppercase"><?= $center[0]['centerName'] ?></h2>
                                    <p class="text-white-50 mb-5"><?= $center[0]['centerInfo'] ?></p>
                                    <div class="row">
                                        <div class="col-6">
                                            <h3>Coordonnée</h3>
                                            <p><?= $center[0]['centerEmail'] ?></p>
                                            <p><?= $center[0]['centerNumber'] ?></p>
                                        </div>
                                        <div class="col-6">
                                            <h3>Adresse</h3>
                                            <p><?= $center[0]['centerAddress'] ?></p>
                                            <p><?= $center[0]['centerZip'].' '.$center[0]['centerCity']?></p>
                                            <p><?= $center[0]['centerCountry'] ?></p>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php if(!empty($center)):?>
        <section class="gradient-custom">
            <div class="container py-5 ">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-12 ">
                        <div class="card bg-dark text-white" style="border-radius: 1rem;">
                            <div class="row p-5 text-center">
                                <div class="col-6">
                                    <a href="/center/edit?id=<?=$center[0]['centerId']?>" class="btn btn-outline-light btn-lg px-5">EDIT</a>
                                </div>
                                <div class="col-6">
                                    <a href="/center/delete?id=<?=$center[0]['centerId']?>" class="btn btn-outline-light btn-lg px-5">DELETE</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif;?>
    <?php if (!empty($center) && count($center) > 1) : ?>
        <section class="gradient-custom">
            <div class="container py-5 ">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-12 ">
                        <div class="card bg-dark text-white" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-center">
                                <div class="mb-md-5 mt-md-4 pb-5">
                                    <h2 class="fw-bold mb-2 text-uppercase"><?= $center[0]['centerName'] ?> Field</h2>
                                    <div class="row">
                                    <table class="table table-dark table-striped">
                                        <thead>
                                            <tr>
                                                <th>NAME</th>
                                                <th>DESCRIPTION</th>
                                                <th>VIEW</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($center as $field) : ?>
                                                <tr>
                                                    <td><?= $field['fieldName'] ?></td>
                                                    <td><?= $field['filedDescription'] ?></td>
                                                    <td><a href="/field?id=<?=$field['fieldId']?>">VIEW</a></td>
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
    <?php endif; ?>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('src/template/Layout.php') ?>

