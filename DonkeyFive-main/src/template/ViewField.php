<?php ob_start(); ?>

<div class="container-fluid cont">
    <section class="gradient-custom">
        <div class="container py-5 ">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-12 ">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <div class="mb-md-5 mt-md-4 pb-5">
                                <?php if (empty( $fieldsOptions)) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= $error ?>
                                    </div>
                                </div>
                                <?php else : ?>
                                    <h2 class="fw-bold mb-2 text-uppercase"><?= $fieldsOptions[0]['fieldName'] ?></h2>
                                    <p class="text-white-50 mb-5"><?= $fieldsOptions[0]['filedDescription'] ?></p>
                                    <div class="row">
                                        <div class="col-12">
                                            <p>Tarif Hour (HT): <?= $fieldsOptions[0]['fieldTarifHourHT'] ?></p>
                                            <p>Tarif Hour (TTC): <?= $fieldsOptions[0]['fieldTarifHourHT']*1.2 ?></p>
                                            <p>Tarif Day (HT): <?= $fieldsOptions[0]['fieldTarifDayHT'] ?></p>
                                            <p>Tarif Day (TTC): <?= $fieldsOptions[0]['fieldTarifDayHT']*1.2 ?></p>
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
    <?php if (!empty($fieldsOptions)) : ?>
        <section class="gradient-custom">
            <div class="container py-5 ">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-12 ">
                        <div class="card bg-dark text-white" style="border-radius: 1rem;">
                            <div class="row p-5 text-center">
                                <div class="col-6">
                                    <a href="field/edit?id=<?=$fieldsOptions[0]['fieldId']?>" class="btn btn-outline-light btn-lg px-5">EDIT</a>
                                </div>
                                <div class="col-6">
                                    <a href="field/delete?id=<?=$fieldsOptions[0]['fieldId']?>" class="btn btn-outline-light btn-lg px-5">DELETE</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="gradient-custom">
            <div class="container py-5 ">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-12 ">
                        <div class="card bg-dark text-white" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-center">
                                <div class="mb-md-5 mt-md-4 pb-5">
                                <h2 class="fw-bold mb-2 text-uppercase"><?= $fieldsOptions[0]['fieldName'] ?> Option</h2>
                                    <div class="row">
                                        <?php foreach ($fieldsOptions as $fieldsOption) : ?>
                                            <div class="col-md-3 mb-4">
                                                <div class="card" style="width: 100%; height:100%">
                                                    <div class="card-body">
                                                        <h5 class="card-title"><?php echo $fieldsOption['optionName']; ?></h5>
                                                        <img src="<?php echo $fieldsOption['imageURL']; ?>" class="card-img-top" alt="Image Placeholder"> 
                                                        <p class="card-text"><?php echo $fieldsOption['description']; ?></p> 
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
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


<?php $content = ob_get_clean();
require('src/template/Layout.php');
?>