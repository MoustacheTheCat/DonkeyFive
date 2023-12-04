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
    <?php if(empty($user['userPicture'])) : ?>
        <img src="https://impulsecreative.com/hs-fs/hubfs/Cat%20typing.gif?width=513&name=Cat%20typing.gif" alt="User Image default" srcset="" class="card-img-top">
    <?php else:?>
        <img src="<?= '/src/public/img/user/'.$user['userPicture']; ?>" class="card-img-top" alt="User Image">
    <?php endif; ?>
        <div class="card-body">
            <h5 class="card-title"><?php echo $user['userFirstName'] . ' ' . $user['userLastName']; ?></h5>
            <p class="card-text">
                Email: <?php echo $user['userEmail']; ?><br>
                Phone: 0<?php echo $user['userNumber']; ?><br>
                Address: <?php echo $user['userAddress']; ?><br>
                Zip: <?php echo $user['userZip']; ?><br>
                City: <?php echo $user['userCity']; ?><br>
                Country: <?php echo $user['userCountry']; ?><br>
                Birthdate: <?php echo $user['userBirthDay']; ?>
            </p>
        </div>
        <div class="card-footer">
            <div class="row d-flex justify-content-center text-center">
                <div class="col-6">
                    <a href="/user/edit?id=<?=$user['userId']?>" class="btn btn-secondary">Edit</a>
                </div>
                <div class="col-6">
                    <a href="/user/delete?id=<?=$user['userId']?>" class="btn btn-secondary">Delete</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
$content = ob_get_clean(); 
require('src/template/Layout.php');
?>