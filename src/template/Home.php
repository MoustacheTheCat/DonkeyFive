
<?php ob_start(); ?>
<main class="row">
<div class="col-12">
        <section class="my-4">
            <h2 class="text-center">Vidéo en vedette</h2>
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="lien_vers_la_video" allowfullscreen></iframe>
            </div>
        </section>
        <section class="my-4">
            <h2 class="text-center">Recherche</h2>
            <form action="/filter" method="POST">
                <label for="city"></label>
                <select name="city">
                    <option value="city">--City--</option>
                    <?php foreach ($citys as $key => $city) : ?>
                        <option value="<?=$key?>"><?= $city ?></option>
                    <?php endforeach; ?>
                </select>
                <label for="dateStart"></label>
                <input type="dateStart" name="dateStart" min="<?=date('Y-m-d')?>" value="<?=date('Y-m-d')?>">
                <label for="dateEnd"></label>
                <input type="dateEnd" name="dateEnd" min="<?=date('Y-m-d')?>" value="<?=date('Y-m-d')?>">
                <label for="hourStart"></label>
                <input type="time" name="hourStart" id="" value="00:00">
                <label for="hourEnd"></label>
                <input type="time" name="hourEnd" id="" value="00:00">
                <input type="submit" value="Search" name="filterForRentalOrCountry">
            </form>
        </section>
        <section class="my-4">
                <?php $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);?>
                <?php if ($uri  == '/filter'):?>
                    <h2 class="text-center">Your result</h2>
                    <div class="row">
                        <table>
                            <thead>
                                <tr>
                                    <th>Field Name</th>
                                    <th>fieldTarifHourHT</th>
                                    <th>fieldTarifDayHT</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($fields as $field) : ?>
                                    <tr>
                                        <td><?= $field['fieldName']?></td>
                                        <td><?= $field['fieldTarifHourHT']?></td>
                                        <td><?= $field['fieldTarifDayHT'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php elseif($uri  == '/'):?>
                    <h2 class="text-center">Galerie ou Liste de Produits</h2>
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
        <section class="my-4">
            <h2 class="text-center">Autres Informations</h2>
            <p>
                Des informations supplémentaires peuvent être ajoutées ici, comme des détails sur les services, des images, des liens, etc.
            </p>
        </section>
    </div>
</main>
<

<?php $content = ob_get_clean(); ?>

<?php require('src/template/Layout.php') ?>