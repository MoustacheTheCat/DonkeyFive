
<?php ob_start(); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 mt-5">
            <h2 class="text-center">Donkey Five</h2>
        </div>
    </div>
</div>
<div>
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
</div>
<?php $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);?>
<?php if ($uri  == '/filter'):?>
        <?phpvar_dump($fields);?>
        <div>
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
<?php endif; ?>

<?php $content = ob_get_clean(); ?>

<?php require('src/template/Layout.php') ?>