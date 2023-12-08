<?php ob_start(); ?>

<div class="container-fluid cont">
    <section class="gradient-custom">
        <div class="container py-5 ">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-12 col-md-9 col-lg-12 col-xl-12">
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
                        <?php if(empty($user['userPicture'])) : ?>
                            <img src="https://impulsecreative.com/hs-fs/hubfs/Cat%20typing.gif?width=513&name=Cat%20typing.gif" alt="User Image default" srcset="" class="card-img-top">
                        <?php elseif(!empty($user['userPicture'])):?>
                            <img src="<?= '/src/public/img/user/'.$user['userPicture']; ?>" class="card-img-top" alt="User Image">
                        <?php endif; ?>
                        <div class="mb-md-5 mt-md-4  text-center">
                            <h2 class="card-title"><?=$user['userFirstName'].' '.$user['userLastName']?></h2>
                        </div>
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
            </div>
        </div>
    </section>
    <?php if($dataRents != false) :?>
        <section class="gradient-custom">
            <div class="container py-5 ">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-dark text-white" style="border-radius: 1rem;">
                            
                            <div class="mb-md-5 mt-md-4  text-center">
                                <h2 class="card-title">Rent List</h2>
                            </div>
                            <div class="card-body pb-5 text-center">
                                <div class="row">
                                    <table>
                                        <thead>
                                            <th>Number</th>
                                            <th>Status</th>
                                            <th>Total TTC</th>
                                        </thead>
                                        <tbody>
                                            <?php foreach($dataRents as $dataRent) :?>
                                                <tr>
                                                    <td><a href="/rental/detail?id=<?=$dataRent['rentalId']?>"><?=$dataRent['rentalNumber']?></a></td>
                                                    <td><?=$dataRent['rentalStatus']?></td>
                                                    <td><?=$dataRent['rentalTotalTTC']?></td>
                                                </tr>
                                            <?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif;?>
</div>

<?php 
$content = ob_get_clean(); 
require('src/template/Layout.php');
?>

