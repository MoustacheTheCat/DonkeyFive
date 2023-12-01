

<?php ob_start(); ?>
<div class="container-fluid cont">
    <section class="gradient-custom">
        <div class="container py-5">
            <div class="row d-flex justify-content-center align-items-center    ">
                <div class="col-12 col-md-10 col-lg-8 col-xl-7">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <div class="mb-md-5 mt-md-4 pb-5">
                                <h2 class="fw-bold mb-2 text-uppercase">Sign Up</h2>
                                <p class="text-white-50 mb-5">Please enter your details to create an account!</p>
                                <?php if (!empty($error)) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= $error ?>
                                    </div>
                                <?php endif; ?>
                                <form action="/user/add/check" method="POST" enctype="multipart/form-data">
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="userFirstName">First Name</label>
                                        <input type="text" id="userFirstName" name="userFirstName" class="form-control form-control-lg" placeholder="Enter your first name" required>
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="userLastName">Last Name</label>
                                        <input type="text" id="userLastName" name="userLastName" class="form-control form-control-lg" placeholder="Enter your last name" required>
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="userBirthDay">Birthdate</label>
                                        <input type="date" id="userBirthDay" name="userBirthDay" class="form-control form-control-lg" required>
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="userEmail">Email</label>
                                        <input type="email" id="userEmail" name="userEmail" class="form-control form-control-lg" placeholder="Enter your email" required>
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="userNumber">Phone Number</label>
                                        <input type="tel" id="userNumber" name="userNumber" class="form-control form-control-lg" placeholder="Enter your phone number" required>
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="userPassword">Password</label>
                                        <input type="password" id="userPassword" name="userPassword" class="form-control form-control-lg" placeholder="Enter your password" required>
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="userPasswordConfirm">Password Confirm</label>
                                        <input type="password" id="userPasswordConfirm" name="userPasswordConfirm" class="form-control form-control-lg" placeholder="Enter your password again" required>
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="userAddress">Address</label>
                                        <input type="text" id="userAddress" name="userAddress" class="form-control form-control-lg" placeholder="Enter your address" required>
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="userZip">Zip Code</label>
                                        <input type="text" id="userZip" name="userZip" class="form-control form-control-lg" placeholder="Enter your zip code" required>
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="userCity">City</label>
                                        <input type="text" id="userCity" name="userCity" class="form-control form-control-lg" placeholder="Enter your city" required>
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="userCountry">Country</label>
                                        <select id="userCountry" name="userCountry" class="form-control form-control-lg" required>
                                            <option value="" disabled selected>Select your country</option>
                                            <?php foreach ($pays as $pay) : ?>
                                                <option value="<?=$pay?>"><?=$pay?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="userpicture">Profile Picture</label>
                                        <input type="file" id="userpicture" name="userpicture" class="form-control form-control-lg">
                                    </div>
                                    <button class="btn btn-outline-light btn-lg px-5" type="submit" name="register">Register</button>
                                </form>
                            </div>
                            <div>
                                <p class="mb-0">Already have an account? <a href="/login" class="text-white-50 fw-bold">Login</a></p>
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