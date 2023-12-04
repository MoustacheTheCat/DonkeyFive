

<?php ob_start(); ?>
<div class="container-fluid cont">
    <section class="gradient-custom">
        <div class="container py-5">
            <div class="row d-flex justify-content-center align-items-center">
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
                                <?php elseif(!empty($success)) : ?>
                                    <div class="alert alert-success" role="alert">
                                        <?= $success ?>
                                    </div>
                                <?php endif; ?>
                                <form action="/admin/add/check" method="POST" enctype="multipart/form-data">
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="adminFirstName">First Name</label>
                                        <input type="text" id="adminFirstName" name="adminFirstName" class="form-control form-control-lg" placeholder="Enter your first name" required>
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="adminLastName">Last Name</label>
                                        <input type="text" id="adminLastName" name="adminLastName" class="form-control form-control-lg" placeholder="Enter your last name" required>
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="adminBirthDay">Birthdate</label>
                                        <input type="date" id="adminBirthDay" name="adminBirthDay" class="form-control form-control-lg" required>
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="adminEmail">Email</label>
                                        <input type="email" id="adminEmail" name="adminEmail" class="form-control form-control-lg" placeholder="Enter your email" required>
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="adminNumber">Phone Number</label>
                                        <input type="tel" id="adminNumber" name="adminNumber" class="form-control form-control-lg" placeholder="Enter your phone number" required>
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="adminPassword">Password</label>
                                        <input type="password" id="adminPassword" name="adminPassword" class="form-control form-control-lg" placeholder="Enter your password" required>
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="adminPasswordConfirm">Password Confirm</label>
                                        <input type="password" id="adminPasswordConfirm" name="adminPasswordConfirm" class="form-control form-control-lg" placeholder="Enter your password again" required>
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="adminpicture">Profile Picture</label>
                                        <input type="file" id="adminpicture" name="adminpicture" class="form-control form-control-lg">
                                    </div>
                                    <button class="btn btn-outline-light btn-lg px-5" type="submit" name="register">Register</button>
                                </form>
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