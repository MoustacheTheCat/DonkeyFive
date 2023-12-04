<?php ob_start(); ?>
<div class="container-fluid cont">
    <section class="gradient-custom">
        <div class="container py-5 ">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-12 ">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <div class="mb-md-5 mt-md-4 pb-5">
                                <h2 class="fw-bold mb-2 text-uppercase">Add Center</h2>
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
                                    <form action="/center/add/check" method="POST" enctype="multipart/form-data">
                                        <div class="form-outline form-white mb-4">
                                            <label for="centerName" class="form-label">Name</label>
                                            <input type="text" name="centerName" class="form-control form-control-lg" placeholder="Center Name" required>
                                        </div>
                                        <div class="form-outline form-white mb-4">
                                            <label for="centerDescription" class="form-label">Description</label>
                                            <textarea name="centerDescription" id="" cols="30" rows="10" class="form-control form-control-lg" required>Description ...</textarea>
                                        </div>
                                        <div class="form-outline form-white mb-4">
                                            <label for="centerEmail" class="form-label">Email</label>
                                            <input type="email" name="centerEmail" class="form-control form-control-lg" placeholder="Email " required>
                                        </div>
                                        <div class="form-outline form-white mb-4">
                                            <label for="centerNumber" class="form-label">Number</label>
                                            <input type="tel" name="centerNumber" class="form-control form-control-lg" placeholder="Number " required>
                                        </div>
                                        <div class="form-outline form-white mb-4">
                                            <label for="centerAddress" class="form-label">Address</label>
                                            <input type="text" name="centerAddress" class="form-control form-control-lg" placeholder="Address " required>
                                        </div>
                                        <div class="form-outline form-white mb-4">
                                            <label for="centerCity" class="form-label">City</label>
                                            <input type="text" name="centerCity" class="form-control form-control-lg" placeholder="City" required>
                                        </div>
                                        <div class="form-outline form-white mb-4">
                                            <label for="centerZip" class="form-label">Zip Code</label>
                                            <input type="text" name="centerZip" class="form-control form-control-lg" placeholder="Zip code" required>
                                        </div>
                                        <div class="form-outline form-white mb-4">
                                            <label class="form-label" for="centerCountry">Country</label>
                                            <select id="centerCountry" name="centerCountry" class="form-control form-control-lg" required>
                                                <option value="" disabled selected>Select your country</option>
                                                <?php foreach ($pays as $pay) : ?>
                                                    <option value="<?=$pay?>"><?=$pay?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        </div>
                                        <div class="form-outline form-white mb-4">
                                            <label for="centerPicture" class="form-label">picture</label>
                                            <input type="file" name="centerPicture" class="form-control form-control-lg" placeholder="picture" >
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
</div>

<?php $content = ob_get_clean(); ?>

<?php require('src/template/Layout.php') ?>