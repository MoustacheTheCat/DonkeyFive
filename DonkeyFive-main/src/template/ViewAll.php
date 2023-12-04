<?php ob_start(); ?>
<div class="container-fluid cont">
    <section class="gradient-custom">
        <div class="container py-5 ">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-12 ">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <div class="mb-md-5 mt-md-4 pb-5">
                                <h2 class="fw-bold mb-2 text-uppercase"><?= $pageTitle;?></h2>
                                <p class="text-white-50 mb-5">List of <?= $pageTitle;?></p>
                                <?php if (!empty($error)) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= $error ?>
                                    </div>
                                <?php elseif (!empty($success)) : ?>
                                    <div class="alert alert-success" role="alert">
                                        <?= $success ?>
                                    </div>
                                <?php endif; ?>
                                <?php if (empty($datas)) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= $error ?>
                                    </div>
                                <?php else : ?>
                                    <table class="table table-dark table-striped">
                                        <thead>
                                            <tr>
                                                <?php if($pageTitle == "Users"):?>
                                                    <th>FIRSTNAME</th>
                                                    <th>LASTNAME</th>
                                                    <th>BIRTHDAY</th>
                                                    <th>EMAIL</th>
                                                    <th>NUMBER</th>
                                                    <th>ADDRESS</th>
                                                    <th>ZIPCODE</th>
                                                    <th>CITY</th>
                                                    <th>COUNTRY</th>
                                                <?php elseif( $pageTitle == "Admins"):?>
                                                    <th>FIRSTNAME</th>
                                                    <th>LASTNAME</th>
                                                    <th>BIRTHDAY</th>
                                                    <th>EMAIL</th>
                                                    <th>NUMBER</th>
                                                <?php elseif( $pageTitle == "Centers"):?>
                                                    <th>NAME</th>
                                                    <th>DESCRIPTION</th>
                                                    <th>EMAIL</th>
                                                    <th>NUMBER</th>
                                                    <th>ADDRESS</th>
                                                    <th>ZIPCODE</th>
                                                    <th>CITY</th>
                                                    <th>COUNTRY</th>
                                                <?php elseif($pageTitle == "Fields"):?>
                                                    <th>NAME</th>
                                                    <th>DESCRIPTION</th>
                                                    <th>CENTER ID</th>
                                                <?php endif;?>
                                                <th>DETAIL</th>
                                                <th>EDIT</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($datas as $data) : ?>
                                                <tr>
                                                    <?php if($pageTitle == "Users"):?>
                                                        <td><?= $data['userFirstName'] ?></td>
                                                        <td><?= $data['userLastName'] ?></td>
                                                        <td><?= $data['userBirthDay'] ?></td>
                                                        <td><?= $data['userEmail'] ?></td>
                                                        <td>0<?= $data['userNumber'] ?></td>
                                                        <td><?= $data['userAddress'] ?></td>
                                                        <td><?= $data['userZip'] ?></td>
                                                        <td><?= $data['userCity'] ?></td>
                                                        <td><?= $data['userCountry'] ?></td>
                                                        <td><a href="/user?id=<?=$data['userId']?>">VIEW</a></td>
                                                        <td><a href="/user/edit?id=<?=$data['userId']?>">EDIT</a></td>
                                                    <?php elseif($pageTitle == "Centers"):?>
                                                        <td><?= $data['centerName'] ?></td>
                                                        <td><?= $data['centerInfo'] ?></td>
                                                        <td><?= $data['centerEmail'] ?></td>
                                                        <td><?= $data['centerNumber'] ?></td>
                                                        <td><?= $data['centerAddress'] ?></td>
                                                        <td><?= $data['centerZip'] ?></td>
                                                        <td><?= $data['centerCity'] ?></td>
                                                        <td><?= $data['centerCountry'] ?></td>
                                                        <td><a href="/center?id=<?=$data['centerId']?>">VIEW</a></td>
                                                        <td><a href="/center/edit?id=<?=$data['centerId']?>">EDIT</a></td>
                                                    <?php elseif($pageTitle == "Fields"):?>
                                                        <td><?= $data['fieldName'] ?></td>
                                                        <td><?= $data['filedDescription'] ?></td>
                                                        <th><?= $data['centerId']?></th>
                                                        <td><a href="/field?id=<?=$data['fieldId']?>">VIEW</a></td>
                                                        <td><a href="/field/edit?id=<?=$data['fieldId']?>">EDIT</a></td>
                                                    <?php elseif($pageTitle == "Admins"):?>
                                                        <td><?= $data['userFirstName'] ?></td>
                                                        <td><?= $data['userLastName'] ?></td>
                                                        <td><?= $data['userBirthDay'] ?></td>
                                                        <td><?= $data['userEmail'] ?></td>
                                                        <td>0<?= $data['userNumber'] ?></td>
                                                        <td><a href="/admin?id=<?=$data['userId']?>">VIEW</a></td>
                                                        <td><a href="/admin/edit?id=<?=$data['userId']?>">EDIT</a></td> 
                                                    <?php endif;?>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                <?php endif; ?>
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