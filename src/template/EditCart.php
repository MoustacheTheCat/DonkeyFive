<?php
ob_start();
$datas = $_SESSION['cart'];
$id = $_GET['id'];
$dataOptions = $datas[$id]['options'];
$dataOps = $dataOptions['costs']['totalHT'];
?>
<div class="container bg-dark pt-5 mt-5 mb-5">
    <h2 class="fw-bold mb-2 text-uppercase text-center text-white">Détails de mon Panier</h2>
    <p class="text-white-50 mb-5 text-center">...........</p>
    <?php foreach ($datas as $key => $data) : ?>
    <div class="row">
        <div class="col-6 text-center">
            <p class="text-white mb-5">Nom du Terrain : <?= $datas[$key]['field']['fieldName'] ?></p>
            <p class="text-white mb-5">Date de debut : <?= $datas[$key]['time']['dateStart'] ?></p>
            <p class="text-white mb-5">Date de fin : <?= $datas[$key]['time']['dateEnd'] ?></p>
            <p class="text-white mb-5">Heure de debut : <?= $datas[$key]['time']['hourStart'] ?></p>
            <p class="text-white mb-5">Heure de fin : <?= $datas[$key]['time']['hourEnd'] ?></p>
            <p class="text-white mb-5">Nombre d'heures : <?= $datas[$key]['time']['nbHour'] ?></p>
        </div>
        <div class="col-6 text-center">
            <p class="text-white mb-5">Nombre d'option : <?= $datas[$key]['nbOp'] ?></p>
            <p class="text-white mb-5">Nom de des options :</p>
            <table class="table bg-dark">
                <thead>
                    <tr>
                    <th class="text-dark">Nom de l'option</th>
                    <th class="text-dark">Prix HT</th>
                    <th class="text-dark">Prix TTC</th>
                    <th class="text-dark">DELETE</th>
                    </tr>
                </thead>
                <tbody>
                    <form action="/cart/delete/option?id=<?=$id?>" method="POST">
                    <?php $arrayIdOption = []; ?>
                    <?php foreach ($dataOptions as $key => $value) : ?>
                        <?php if(is_int($key)) :?>
                        <?php $arrayIdOption[] = $key; ?>
                        <tr>
                            <td class="text-dark"><?= $value['names'] ?></td>
                            <td class="text-dark"><?= $value['prices'].' €'?></td>
                            <td class="text-dark"><?= ($value['prices']*1.2).' €'?></td>
                            <td class="text-dark">
                                <label for="do_<?=$key?>"></label>
                                <input type="checkbox" name="do_<?=$key?>" id="do_<?=$key?>" value="<?=$key?>">
                            </td>
                        </tr>
                    <?php endif;?>
                    <?php endforeach; ?>
                        <tr>
                            <td colspan="3"></td>
                            <td><button type="submit">Delete</button></td>
                        </tr>
                    </form>
                </tbody>
            </table>
            <?php $costTTC = $dataOps*1.2;?>
            <p class="text-white mb-5">Coût des options TTC : <?= $costTTC.' €' ?></p>
            <p class="text-white mb-5">Coût du terrain TTC : <?= $datas[$id]['field']['totalTTC'].' €' ?></p>
            <p class="text-white mb-5">Prix total TTC : <?= $costTTC + $datas[$id]['field']['totalTTC'].' €'?></p>
            <table class="table bg-dark">
                <thead>
                    <tr>
                        <th class="text-dark">Nom de l'option</th>
                        <th class="text-dark">Prix HT</th>
                        <th class="text-dark">Prix TTC</th>
                        <th class="text-dark">ADD</th>
                    </tr>
                </thead>
                <tbody>
                    <form action="/cart/add/option?id=<?=$id?>" method="POST">
                        <?php foreach ($datasFieldOptions as $key => $value) : ?>
                            <?php if(!in_array($key, $arrayIdOption)) :?>
                                <tr>
                                    <td class="text-dark"><?= $value['optionName'] ?></td>
                                    <td class="text-dark"><?= $value['optionCostHT'].' €'?></td>
                                    <td class="text-dark"><?= ($value['optionCostHT']*1.2).' €'?></td>
                                    <td class="text-dark">
                                        <label for="ado<?=$value['optionId']?>"></label>
                                        <input type="checkbox" name="ado<?=$value['optionId']?>" id="ado<?=$value['optionId']?>" value="<?=$value['optionId']?>">
                                    </td>
                                </tr>
                            <?php endif;?>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="3"></td>
                            <td><button type="submit">ADD</button></td>
                        </tr>
                    </form>
                </tbody>
            </table>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<?php
$content = ob_get_clean();
require_once 'src/template/Layout.php';
?>