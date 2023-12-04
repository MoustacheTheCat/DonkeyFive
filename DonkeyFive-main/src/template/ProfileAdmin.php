<?php ob_start(); ?>

<div class="container mt-4 d-flex justify-content-center align-item-center">
    <div class="card" style="width: 36rem;">
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
    <?php else:?>
        <img src="<?= '/src/public/img/user/'.$admin['userPicture']; ?>" class="card-img-top" alt="User Image">
    <?php endif; ?>
        <div class="card-body">
            <h5 class="card-title"><?php echo $admin['userFirstName'] . ' ' . $admin['userLastName']; ?></h5>
            <p class="card-text">
                Email: <?php echo $admin['userEmail']; ?><br>
                Phone: 0<?php echo $admin['userNumber']; ?><br>
                Birthdate: <?php echo $admin['userBirthDay']; ?>
            </p>
        </div>
        <div class="card-footer">
            <div class="row d-flex justify-content-center text-center">
                <div class="col-6">
                    <a href="/admin/edit?id=<?=$admin['userId']?>" class="btn btn-secondary">Edit</a>
                </div>
                <div class="col-6">
                    <a href="/admin/delete?id=<?=$admin['userId']?>" class="btn btn-secondary">Delete</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
$content = ob_get_clean(); 
require('src/template/Layout.php');
?>