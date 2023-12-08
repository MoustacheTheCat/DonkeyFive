<?php ob_start(); ?>
<div class="container-fluid cont">
    <section class="gradient-custom">
        <div class="container py-5 ">
            <div class="row d-flex justify-content-center align-items-center">
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
                        <?php if(!empty($admin['userPicture']) && $admin['userPicture'] != 'default.png'):?>
                            <img src="<?= '/src/public/img/admin/'.$admin['userPicture']; ?>" class="card-img-top" alt="User Image">
                        <?php elseif(!empty($user['userPicture']) && $user['userPicture'] != 'default.png'):?>
                            <img src="<?= '/src/public/img/user/'.$user['userPicture']; ?>" class="card-img-top" alt="User Image">
                        <?php else : ?>
                            <img src="https://impulsecreative.com/hs-fs/hubfs/Cat%20typing.gif?width=513&name=Cat%20typing.gif" alt="User Image default" srcset="" class="card-img-top">
                        <?php endif; ?>
                        <div class="mb-md-5 mt-md-4  text-center">
                            <?php if(!empty($admin)):?>
                                <h2 class="card-title"><?=$admin['userFirstName'].' '.$admin['userLastName']?></h2>
                            <?php elseif(!empty($user['userFirstName'])):?>
                                <h2 class="card-title"><?=$user['userFirstName'].' '.$user['userLastName']?></h2>
                            <?php endif;?>
                        </div>
                        <?php if(!empty($admin)):?>
                            <div class="card-body pb-5 text-center">
                                <p class="card-text">
                                    Email: <?= $admin['userEmail']; ?><br>
                                    Phone: 0<?= $admin['userNumber']; ?><br>
                                    Birthdate: <?= $admin['userBirthDay']; ?>
                                </p>
                            </div>
                        <?php elseif(!empty($user)):?>
                            <div class="card-body pb-5 text-center">
                                <p class="card-text">
                                    Email: <?= $user['userEmail']; ?><br>
                                    Phone: 0<?= $user['userNumber']; ?><br>
                                    Birthdate: <?= $user['userBirthDay']; ?><br>
                                    Address: <?= $user['userAddress']; ?>
                                    City: <?= $user['userCity']; ?>
                                    Zipcode: <?= $user['userZip']; ?>
                                    Country: <?= $user['userCountry']; ?>
                                </p>
                            </div>
                        <?php endif;?>
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