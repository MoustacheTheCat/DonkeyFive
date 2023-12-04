<?php ob_start(); ?>  
<div class="container-fluid cont">
    <section class="gradient-custom">
        <div class="container py-5 ">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-12 ">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <div class="mb-md-5 mt-md-4 pb-5">
                                <h2 class="fw-bold mb-2 text-uppercase">Edit Field</h2>
                                <p class="text-white-50 mb-5"></p>
                                <?php if (!empty($error)) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= $error ?>
                                    </div>
                                <?php elseif (!empty($success)) : ?>
                                    <div class="alert alert-success" role="alert">
                                        <?= $success ?>
                                    </div>
                                <?php endif; ?>
                                <div class="row">
                                    <form action="/field/edit/check" method="POST" enctype="multipart/form-data">
                                        <div class="form-outline form-white mb-4">
                                          <label class="form-label" for="fieldName">Nom du terrain</label>
                                          <input type="text" class="form-control form-control-lg" name="fieldName" id="fieldName" value="<?= $fieldsOptions[0]['fieldName'] ; ?>">
                                        </div>
                                        <div class="form-outline form-white mb-4">
                                            <label for="fieldTarifHourHT" class="form-label">Tarif par heure (HT)</label>
                                            <input type="text" class="form-control form-control-lg" name="fieldTarifHourHT" id="fieldTarifHourHT" value="<?= $fieldsOptions[0]['fieldTarifHourHT'] ; ?>">
                                        </div>
                                        <div class="form-outline form-white mb-4">
                                            <label for="fieldTarifDayHT" class="form-label">Tarif par jour (HT)</label>
                                            <input type="text" class="form-control form-control-lg" name="fieldTarifDayHT" id="fieldTarifDayHT" value="<?= $fieldsOptions[0]['fieldTarifDayHT'] ; ?>">
                                        </div>
                                        <div class="form-outline form-white mb-4">
                                          <label for="filedDescription" class="form-label">Photo du terrain</label>
                                          <textarea name="filedDescription" class="form-control form-control-lg" id="" cols="30" rows="10" value="<?= $fieldsOptions[0]['filedDescription'] ; ?>"></textarea>
                                        </div>
                                        <div class="form-outline form-white mb-4">
                                            <label class="form-label" for="centerId">Center</label>
                                            <select id="centerId" name="centerId" class="form-control form-control-lg">
                                                <?php foreach ($centers as $center) : ?>
                                                    <?php if ($center['centerId'] == $fieldsOptions[0]['centerId']) : ?>
                                                        <option value="<?=$center['centerId']?>" selected><?=$center['centerName']?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                                <?php foreach ($centers as $center) : ?>
                                                    <option value="<?=$center['centerId']?>"><?=$center['centerName']?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <button class="btn btn-outline-light btn-lg px-5" type="submit" name="register">Register</button>
                                    </form>
                                </div>
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
                                <h2 class="fw-bold mb-2 text-uppercase">Edit Field Picture</h2>
                                <p class="text-white-50 mb-5"></p>
                                <?php if (!empty($error)) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= $error ?>
                                    </div>
                                <?php elseif (!empty($success)) : ?>
                                    <div class="alert alert-success" role="alert">
                                        <?= $success ?>
                                    </div>
                                <?php endif; ?>
                                <?php if(!empty($field)):?>
                                    <div class="row">
                                        <div class="col-12">
                                            <img src="/src/public/img/field/<?= $fieldsOptions[0]['fieldPicture']?>" alt="" srcset="" style="width: 100%;height: 100%;">
                                        </div>
                                    </div>
                                <?php else:?>
                                    <div class="row">
                                        <div class="col-12">
                                            <img src="https://sport.universgazons.com/public/img/big/Foot-indoor-structure588b65252451e.JPG" alt="" srcset="" style="width: 100%;height: 100%;">
                                        </div>
                                    </div>
                                <?php endif;?>
                                <div class="row">
                                    <form action="/field/edit/picture" method="POST" enctype="multipart/form-data">
                                        <div class="form-outline form-white mb-4">
                                          <label for="fieldPicture" class="form-label">Photo du terrain</label>
                                          <input type="file" class="form-control form-control-lg" name="fieldPicture" id="fieldPicture" value="<?= $fieldsOptions[0]['fieldPicture'] ; ?>">
                                        </div>
                                        <button class="btn btn-outline-light btn-lg px-5" type="submit" name="register">Edit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php
$content = ob_get_clean();
require('src/template/Layout.php');
?>