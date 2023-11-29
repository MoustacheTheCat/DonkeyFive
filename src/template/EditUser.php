

<?php ob_start(); ?>
<div class="container-fluid cont">
    <section class="gradient-custom">
        <div class="container py-5">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-10 col-lg-8 col-xl-7">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <div class="mb-md-5 mt-md-4 pb-5">
                                <h2 class="fw-bold mb-2 text-uppercase">Update your profil</h2>
                                <p class="text-white-50 mb-5">Please enter your details to create an account!</p>
                                <?php if (!empty($error)) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= $error ?>
                                    </div>
                                <?php elseif (!empty($result)) : ?>
                                    <div class="alert alert-success" role="alert">
                                        <?= $result ?>
                                    </div>
                                <?php endif; ?>
                                <form action="/user/edit/info" method="POST" enctype="multipart/form-data">
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="userFirstName">First Name</label>
                                        <input type="text" id="userFirstName" name="userFirstName" class="form-control form-control-lg" value="<?=$user['userFirstName']?>">
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="userLastName">Last Name</label>
                                        <input type="text" id="userLastName" name="userLastName" class="form-control form-control-lg" value="<?=$user['userLastName']?>">
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="userBirthdate">Birthdate</label>
                                        <input type="date" id="userBirthdate" name="userBirthdate" class="form-control form-control-lg" value="<?=$user['userBirthdate']?>">
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="userEmail">Email</label>
                                        <input type="email" id="userEmail" name="userEmail" class="form-control form-control-lg" value="<?=$user['userEmail']?>">
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="userNumber">Phone Number</label>
                                        <input type="tel" id="userNumber" name="userNumber" class="form-control form-control-lg" value="<?=$user['userNumber']?>">
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="userAddress">Address</label>
                                        <input type="text" id="userAddress" name="userAddress" class="form-control form-control-lg" value="<?=$user['userAddress']?>">
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="userZip">Zip Code</label>
                                        <input type="text" id="userZip" name="userZip" class="form-control form-control-lg" value="<?=$user['userZip']?>">
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="userCity">City</label>
                                        <input type="text" id="userCity" name="userCity" class="form-control form-control-lg" value="<?=$user['userCity']?>">
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="userCountry">Country</label>
                                        <select id="userCountry" name="userCountry" class="form-control form-control-lg">
                                            <option value="<?=$user['userCountry']?>"><?=$user['userCountry']?></option>
                                            <?php foreach ($pays as $pay) : ?>
                                                <option value="<?=$pay?>"><?=$pay?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <button class="btn btn-outline-light btn-lg px-5" type="submit" name="updateInfo">Update info</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="gradient-custom">
        <div class="container py-5">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-10 col-lg-8 col-xl-7">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <div class="mb-md-5 mt-md-4 pb-5">
                                <h2 class="fw-bold mb-2 text-uppercase">Update your Password</h2>
                                <p class="text-white-50 mb-5">Please enter your details to create an account!</p>
                                <?php if (!empty($error)) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= $error ?>
                                    </div>
                                <?php elseif (!empty($result)) : ?>
                                    <div class="alert alert-success" role="alert">
                                        <?= $result ?>
                                    </div>
                                <?php endif; ?>
                                <form action="/user/edit/password" method="POST" enctype="multipart/form-data">
                                <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="userPassword">Password</label>
                                        <input type="password" id="userPassword" name="userPassword" class="form-control form-control-lg" placeholder="Enter your password">
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="newUserPassword">New Password</label>
                                        <input type="password" id="newUserPassword" name="newUserPassword" class="form-control form-control-lg" placeholder="Enter new your password">
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="newUserPasswordConfirm">New Password Confirm</label>
                                        <input type="password" id="newUserPasswordConfirm" name="newUserPasswordConfirm" class="form-control form-control-lg" placeholder="Enter your new password confirm ">
                                    </div>
                                    <button class="btn btn-outline-light btn-lg px-5" type="submit" name="updatePassword">Update your password</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="gradient-custom">
        <div class="container py-5">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-10 col-lg-8 col-xl-7">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <div class="mb-md-5 mt-md-4 pb-5">
                                <h2 class="fw-bold mb-2 text-uppercase">Update your Picture</h2>
                                <?php if (!empty($error)) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= $error ?>
                                    </div>
                                <?php elseif (!empty($result)) : ?>
                                    <div class="alert alert-success" role="alert">
                                        <?= $result ?>
                                    </div>
                                <?php endif; ?>
                                <form action="/user/edit/picture" method="POST" enctype="multipart/form-data">
                                <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="userpicture">Profile Picture</label>
                                        <input type="file" id="userpicture" name="userpicture" class="form-control form-control-lg" placeholder="<?=$user['userPicture']?>">
                                    </div>
                                    <button class="btn btn-outline-light btn-lg px-5" type="submit" name="updatePicture">Update picture</button>
                                </form>
                            </div>
                            <div>
                                <p class="mb-0">Already have an account? <a href="/user/update" class="text-white-50 fw-bold">Update</a></p>
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