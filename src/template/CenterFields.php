<?php ob_start();


foreach ($fields as $field) : ?>
    <div>
        <h2><?= htmlspecialchars($field['fieldName']) ?></h2>
        <p>Field ID: <?= htmlspecialchars($field['fieldId']) ?></p>
        <p>Tarif per Hour (HT): <?= htmlspecialchars($field['fieldTarifHourHT']) ?></p>
        <p>Tarif per Day (HT): <?= htmlspecialchars($field['fieldTarifDayHT']) ?></p>
    </div>
<?php endforeach; ?>

<?php $content = ob_get_clean(); ?>

<?php require('src/template/Layout.php') ?>