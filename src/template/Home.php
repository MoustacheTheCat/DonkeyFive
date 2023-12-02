<?php ob_start(); ?>
<main class="row">
    <div class="col-12">
        <section class="my-4 text-center">
            <h3>Toi aussi montre tes plus beaux skills</h3>
            <iframe width="1000" height="600" src="https://www.youtube.com/embed/kF6tg5TnxbA?si=CLcQyrcjvTu5wWGo&autoplay=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen class="mx-auto" muted></iframe>
        </section>
        <section class="my-4 container-fluid ">
            <h2 class="text-center">Recherche</h2>
            <form action="/filter" method="POST" class="form-control d-flex justify-content-center bg-dark text-white py-5">
                <label for="city"></label>
                <select name="city">
                    <option value="city">--City--</option>
                    <?php foreach ($citys as $key => $city) : ?>
                        <option value="<?=$key?>"><?= $city ?></option>
                    <?php endforeach; ?>
                </select>
                <label for="dateStart"></label>
                <input type="dateStart" name="dateStart" min="<?=date('Y-m-d')?>" value="<?=date('Y-m-d')?>" >
                <label for="dateEnd"></label>
                <input type="dateEnd" name="dateEnd" min="<?=date('Y-m-d')?>" value="<?=date('Y-m-d')?>" >
                <label for="hourStart"></label>
                <input type="time" name="hourStart" id="" value="00:00" >
                <label for="hourEnd"></label>
                <input type="time" name="hourEnd" id="" value="00:00" >
                <input type="submit" value="Search" name="filterForRentalOrCountry" >
            </form>
        </section>
        <section>
            <?php if (!empty($error)) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= $error ?>
                </div>
            <?php elseif(!empty($success)) : ?>
                <div class="alert alert-success" role="alert">
                    <?= $success ?>
                </div>
            <?php endif;?>
        </section>
        <section class="my-4">
        <?php $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); ?>
        <?php if ($uri  == '/filter' && $fields != false) : ?>
            <h2 class="text-center">Your result</h2>
            <div class="row ">
                <table>
                    <thead>
                        <tr>
                            <th>Field Name</th>
                            <th>fieldTarifHourHT</th>
                            <th>fieldTarifDayHT</th>
                            <th>View</th>
                            <th>Rent</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($fields as $field) : ?>
                            <tr>
                                <td><?= $field['fieldName'] ?></td>
                                <td><?= $field['fieldTarifHourHT'] ?></td>
                                <td><?= $field['fieldTarifDayHT'] ?></td>
                                <td><a href="/field?id=<?= $field['fieldId'] ?>">More</a></td>
                                <td><a href="/field/rent?id=<?= $field['fieldId'] ?>">Rent field</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
        </section>
        <section>
            <div class="container">
                <h2 class="text-center">Le top du top</h2>
                <div class="row d-flex justify-content-between">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="<?= '/src/public/img/donkey/'.$europe['image'] ?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><?= $europe['title'] ?></h5>
                            <p class="card-text"><?= $europe['description'] ?></p>
                            <a href="/card/home?id=<?= $europe['id'] ?>" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="<?='/src/public/img/donkey/'.$legende['image'] ?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><?= $legende['title'] ?></h5>
                            <p class="card-text"><?= $legende['description'] ?></p>
                            <a href="/card/home?id=<?= $legende['id'] ?>" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="<?='/src/public/img/donkey/'.$choix['image'] ?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><?= $choix['title'] ?></h5>
                            <p class="card-text"><?= $choix['description'] ?></p>
                            <a href="/card/home?id=<?= $choix['id'] ?>" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="<?='/src/public/img/donkey/'.$tournoi['image'] ?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><?= $tournoi['title'] ?></h5>
                            <p class="card-text"><?= $tournoi['description'] ?></p>
                            <a href="/card/home?id=<?= $tournoi['id'] ?>" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>
<

<?php $content = ob_get_clean(); ?>

<?php require('src/template/Layout.php') ?>