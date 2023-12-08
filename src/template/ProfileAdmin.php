<?php ob_start(); ?>

<div class="container-fluid cont">
    <section class="gradient-custom">
        <div class="container py-5 ">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <?php if (!empty($error)) : ?>
                            <div class="alert alert-danger" role="alert">
                                <?= $error ?>
                            </div>
                        <?php elseif (!empty($result)) : ?>
                            <div class="alert alert-success" role="alert">
                                <?= $result ?>
                            </div>
                        <?php endif; ?>
                        <?php if(empty($admin['userPicture'])) : ?>
                            <img src="https://impulsecreative.com/hs-fs/hubfs/Cat%20typing.gif?width=513&name=Cat%20typing.gif" alt="User Image default" srcset="" class="card-img-top">
                        <?php elseif(!empty($admin['userPicture'])):?>
                            <img src="<?= '/src/public/img/admin/'.$admin['userPicture']; ?>" class="card-img-top" alt="User Image">
                        <?php endif; ?>
                        <div class="mb-md-5 mt-md-4  text-center">
                            <h2 class="card-title"><?=$admin['userFirstName'].' '.$admin['userLastName']?></h2>
                        </div>
                        <div class="card-body pb-5 text-center">
                            <p class="card-text">
                                Email: <?= $admin['userEmail']; ?><br>
                                Phone: 0<?= $admin['userNumber']; ?><br>
                                Birthdate: <?= $admin['userBirthDay']; ?>
                            </p>
                        </div>
                        <div class="card-footer">
                            <div class="row d-flex justify-content-center text-center">
                                <div class="col-6 p-4">
                                    <a href="/admin/edit?id=<?=$admin['userId']?>" class="btn btn-secondary">Edit</a>
                                </div>
                                <div class="col-6 p-4">
                                    <a href="/admin/delete?id=<?=$admin['userId']?>" class="btn btn-secondary">Delete</a>
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