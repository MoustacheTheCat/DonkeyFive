

<?php ob_start(); ?>
<div class="container-fluid cont">
    <section class="gradient-custom">
        <div class="container py-5 ">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <div class="mb-md-5 mt-md-4 pb-5">
                                <h2 class="fw-bold mb-2 text-uppercase">Delete your profile</h2>
                                <p class="text-white-50 mb-5">Please enter your password!</p>
                                <?php if (!empty($error)) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= $error ?>
                                    </div>
                                <?php elseif (!empty($result)) : ?>
                                    <div class="alert alert-success" role="alert">
                                        <?= $result ?>
                                    </div>
                                <?php endif; ?>
                                <form action="/delete/check?id=<?=$_GET['id']?>" method="POST">
                                    <div class="form-outline form-white mb-4">
                                        <label for="userPassword" class="form-label">Password:</label>
                                        <input type="password" class="form-control" id="userPassword" placeholder="Enter your Password" name="userPassword" class="form-control form-control-lg">
                                    </div>
                                    <button class="btn btn-outline-light btn-lg px-5" type="submit" name="send">Delete</button>
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