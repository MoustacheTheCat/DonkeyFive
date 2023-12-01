<?php ob_start(); ?>
<main class="row">
    <div class="col-12">
        <section class="my-4 text-center">
            <h3>Toi aussi montre tes plus beaux skills</h3>
            <iframe width="1000" height="600" src="https://www.youtube.com/embed/kF6tg5TnxbA?si=CLcQyrcjvTu5wWGo&autoplay=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen class="mx-auto" muted></iframe>
        </section>
    </div>
    <section class="my-4">
    <h2 class="text-center">Recherche</h2>
    <div class="row justify-content-center">
        <div class="col-md-6 text-center">
            <form action="/filter" method="POST">
                <div class="form-outline form-white mb-4">
                    <label for="city"></label>
                    <select name="city">
                        <option value="city">--City--</option>
                        <?php foreach ($citys as $key => $city) : ?>
                            <option value="<?= $key ?>"><?= $city ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label for="dateStart"></label>
                    <input type="dateStart" name="dateStart" min="<?= date('Y-m-d') ?>" value="<?= date('Y-m-d') ?>">
                    <label for="dateEnd"></label>
                    <input type="dateEnd" name="dateEnd" min="<?= date('Y-m-d') ?>" value="<?= date('Y-m-d') ?>">
                    <label for="hourStart"></label>
                    <input type="time" name="hourStart" id="" value="00:00">
                    <label for="hourEnd"></label>
                    <input type="time" name="hourEnd" id="" value="00:00">
                    <input type="submit" value="Search" name="filterForRentalOrCountry">
                </div>
            </form>
        </div>
    </div>
</section>
    <section>
        <?php if (!empty($error)) : ?>
            <div class="alert alert-danger" role="alert">
                <?= $error ?>
            </div>
        <?php elseif (!empty($success)) : ?>
            <div class="alert alert-success" role="alert">
                <?= $success ?>
            </div>
        <?php endif; ?>
    </section>
    <section class="my-4">
        <?php $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); ?>
        <?php if ($uri  == '/filter' && $fields != false) : ?>
            <h2 class="text-center">Your result</h2>
            <div class="row">
                <table>
                    <thead>
                        <tr>
                            <th>Field Name</th>
                            <th>fieldTarifHourHT</th>
                            <th>fieldTarifDayHT</th>
                            <th></th>
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
        <?php elseif ($uri  == '/' || ($uri  == '/filter' && $fields === false)) : ?>
            <h2 class="text-center">Jouez partout en Europe</h2>
            <div class="row">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="..." alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="..." alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="..." alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        </div>
    </section>
    <div class="container-fluid">
        <div class="row bg-light py-4">
            <div class="container">
                <h2 class="text-center mb-4">Nos Partenaires</h2>
                <div class="row justify-content-center">
                    <div class="col-md-2 col-6 text-center mb-3">
                        <img src="logo1.png" alt="Partenaire 1">
                    </div>
                    <div class="col-md-2 col-6 text-center mb-3">
                        <img src="logo2.png" alt="Partenaire 2">
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
< <?php $content = ob_get_clean(); ?> <?php require('src/template/Layout.php') ?>